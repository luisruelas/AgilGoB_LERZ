BIENVENIDO A LA PRUEBA DE ENTRADA PARA LA COMPAÑIA AGILGOB DEL DR LUIS ESTEBAN RUELAS ZARAGOZA.

Para correr esta aplicación siga los siguientes pasos:

Si usted ya tiene docker y docker compose instalados, por favor pase al paso 3.

Paso 1 Obtener docker:
Instale la herramienta Docker siguiendo las instrucciones de la página: https://docs.docker.com/install/

Paso 2 Obtener docker compose: 
Instale la herramienta Docker Compose siguiendo las instrucciones de la página: https://docs.docker.com/compose/install/

Paso 3 Obtener el repositorio:
Por favor entre a https://github.com/luisruelas/AgilGoB_LERZ y descargue el repositorio. Si está utilizando una distribución de linux, también puede usar "git pull https://github.com/luisruelas/AgilGoB_LERZ"

Paso 4 Inicializar los contendores:
Con su herramienta de Docker (o la terminal en caso de Linux o Mac), entre a la ruta donde descargó la aplicación. Una vez en la carpeta AgilGob (raíz) ejecute el comando: 

```docker-compose up -d```

Paso 5 Descargar dependencias e inicializar base de datos:
Una vez creados los contenedores, ejecute en la misma herramienta el comando:

	```docker exec -ti agilgob_lerz bash``` 

Posteriormente ejecute:

	```cd AgilGob```

Para inicializar el repositorio usted debe descargar las dependencias. Por favor ejecute:

	```composer dump-autoload```

Posteriormente hay que correr las migraciones que crean las tablas correspondientes:

	```php artisan migrate```

Por último, podemos cargar los datos de prueba (y los datos de tipo de usuario) con el siguiente comando:

	```php artisan db:seed```

