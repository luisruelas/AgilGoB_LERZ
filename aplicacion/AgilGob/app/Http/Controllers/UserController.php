<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserType;
use Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('CRUD_user.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CRUD_user.create')->with('user_types',UserType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::extendImplicit('alpha_custom', function ($attribute, $value, $parameters, $validator){
                $first_char=$value[0];
                //primer dígito
                 if(!$first_char !== '_'  &&
                    !ctype_alpha($first_char))
                    return false;
                else
                    return ctype_alnum($value);
             });
        $messages=[
            'nick.required'=>'El nick es requerido',
            'nick.unique'=>'El nick ya existe, por favor escoge otro',
            'name.required'=>'El nombre es requerido',
            'email.required'=>'El email es requerido',
            'password.required'=>'Se requiere una contraseña',
            'user_type_id.required'=>'Se requiere un rol',
            'user_type_id.numeric'=>'El rol debe ser un número',
            'user_type_id.min'=>'La opción de rol no es correcta',
            'user_type_id.max'=>'La opción de rol no es correcta',
            'email.required'=>'El email se requiere',
            'nick.alpha_custom'=>'El nick debe empezar con  letra o guión bajo, y solo contener letras o guiones bajos',
        ];
        Validator::make($request->all(),[
                'nick' => 'required|unique:users|alpha_custom',
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'user_type_id' => 'required|numeric|min:1|max:3',
                'email' => 'required|email',
            ],$messages)->validate();
        $A_user = $request->all();
        unset($A_user["_token"]);
        $user = new User($A_user);
        $user->save();
        return redirect(action('UserController@index'))->with('message','¡Usuario creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('CRUD_user.create')->with('user_types',UserType::all())->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->nick=$request->nick;
        $user->name=$request->name;
        $user->last_name=$request->last_name;
        $user->user_type_id=$request->user_type_id;
        if(!empty($request->password))
            $user->password=Hash::make($request->password);
        $user->email=$request->email;
        $user->save();
        return redirect(action('UserController@index'))->with('message','¡El usuario ha sido modificado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(action('UserController@index'))->with('message', '¡El usuario ha sido eliminado con éxito');
    }
}
