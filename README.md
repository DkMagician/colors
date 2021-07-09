# Colors

Es una API REST CRUD que muestra los colores de acuerdo con el código hexadecimal insertado y muestra la información que normalmente usan en el departamento de diseño.La información se maneja con envíos de objetos JSON que son recibidos por el front end y se encarga de mostrar los datos y viceversa,se leen objetos JSON para hacer cambios.

La interfaz es muy simple para su fácil uso y cumple con su rol de administrar y mostrar colores. También posee una interfaz de logueo para controlar la seguridad de la información del sistema y solo los administradores puedan hacer cambios.

### interfaz de logueo
 
### interfaz de aplicación vista de administrador
 
### interfaz de aplicación vista de usuario
 

## Tecnologías usadas

```
[MYSQL]( https://dev.mysql.com/downloads/installer/)
[Composer]( https://getcomposer.org/download/)
[JWT]( https://github.com/firebase/php-jwt)
[XAMPP]( https://www.apachefriends.org/es/index.html)
[Boostrap]( https://getbootstrap.com/docs/4.5/getting-started/download/)
[FontAwesome]( https://kit.fontawesome.com/cbe7593911.js)
[JQuery]( https://jquery.com/download/)
PHP
AJAX
JSON
HTML
CSS
JAVASCRIPT
```

## Versiones de las tecnologías usadas

```
PHP version 7.4
MYSQL version 8.0
Composer versión 2.1.3
JWT versión RFC 7519
XAMPP versión 7.4.20
Boostrap versión 4.5
FontAwesome versión 5
JQuery versión 3.6.0
AJAX versión 3.5.0
JSON versión 2020-12
HTML versión 5
CSS versión 2.1
JAVASCRIPT version ECMAScript 2018 (ES9 2018)
```


## Comenzando 🚀

Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local y/o servidor


### Pre-Requisitos 📋

### Instalar Xampp

Si estamos usando Windows debemos ir a la pagina de [XAMPP]( https://www.apachefriends.org/es/index.html) ya que este programa contiene php y nos permitirá trabajar de inmediato con php, vamos a dar click al botón de descargar para Windows
```

 
```
Nos descargara un archivo .exe, nos aparecerá la siguiente ventana
```
 
```
Nos aseguramos que tenga todas las casillas seleccionadas y le damos en siguiente hasta llegar a la siguiente ventana
```
 
```

### Instalar MYSQL
Para descargar [MYSQL]( https://dev.mysql.com/downloads/installer/, debemos ir al link mostrado y darle click al primer instalador
```
 ```
Una vez descargado el .exe, lo ejecutamos y nos aparecerá una ventana de la licencia de mysql, la cual vamos a darle check a aceptar y daremos click en siguiente
```
 
```
Después vamos a ver una pantalla de opciones de instalación, nosotros vamos a seleccionar la primera opción que es la mas completa y recomendada
```
 
```
Y nos mandara a la pantalla de instalación, lo único que haremos es presionar el botón de Execute y dejaremos que el instlador haga su trabajo
```
 
```
Cuando se termine la instalación debemos asegurarnos que las siguientes ventanas sean iguales a las que se muestran a configuración, vienen por default pero no esta mal asegurarse de que todo este bien.

```
 
 
En esta ultima debemos colocar como contraseña root
 
```
Al finalizar nos aparecerá un resumen de lo que se va a configurar, le daremos click a Execute para finalizar la instalación de mysql

```
 
```
### Instalar Boostrap 4

Para instlarlo debemos ir a la pagina de [Boostrap]( https://getbootstrap.com/docs/4.5/getting-started/download/) y vamos a darle click al botón que dice Download de la categoría Css y Js
```
 
```
Una vez hecho click nos descargara un archivo.zip el cual vamos a descomprimir donde se encuentran las librerías de nuestro proyecto

```
 
 

```

### Instalar Jquery
Para instalarlo debemos ir al link de [JQuery]( https://jquery.com/download/) y vamos a darle click al enlace que a continuación se muestra

```
 
```


Cuando le demos click nos llevara a un script en la web, lo que tenemos que hacer es dar click derecho y seleccionar “guardar como”
```
 
```
Y vamos a guardar el archivo en la carpeta de nuestro proyecto

```
 
```


### Instalar Composer
Composer es una herramienta que permite descargar e instalar librerías externas de php a nuestro proyecto, para descargarlo debemos ir al link de [Composer]( https://getcomposer.org/download/) y vamos a descargar la opción que dice: Composer.exe

```
 

```





Una vez que se descargue procedemos a ejecutarlo y nos aparecerá una ventana preguntándonos la ruta en la que se ejecutara composer, viene una ruta por default así que le daremos click en siguiente

```
 

```
Y a continuación nos muestra lo que se va a instalar, solo daremos clic a instalar y dejaremos que el instlador termine de instlarlo

```
 
```

### Instalar JWT

Para instalar el jwt debemos ir al link de [JWT]( https://github.com/firebase/php-jwt) es un repositorio de Github pero lo que haremos a continuación es abrir cmd y dirigirnos a la carpeta de nuestro proyecto

```
 
```
Una vez ubicados en nuestra carpeta de proyecto, debemos ejecutar el siguiente comando que se muestra en el link mencionado:
 

Cuando se ejecute el comando, composer instalara la librería en un formato json que el php puede acceder.



### Instrucciones 🔧

Para poder ejecutar el proyecto sin POSTMAN necesitan colocar o crear la carpeta colors que contiene las carpetas api y aplication dentro de la carpeta de XAMPP/htdocs con el nombre

```
 
```

Una vez hecho esto, debemos abrir nuestro panel de XAMPP y activar los servicios de Apache y Mysql

```
 
```
Ahora lo que haremos será recuperar la base de datos de colors que esta ubicada dentro de la carpeta de core con el nombre colors.sql

```
 
```
Lo que haremos es abrir mysql workbench y crearemos una base de datos que se llame practica, la seleccionamos y seleccionamos la opción de la barra de herramientas que dice server y damos clic en import data

```
 
```

Una vez hecho esto, ahora procedemos a recuperar la base de datos con el asistente de mysqlWorkbench, seleccionamos la opción que dice: import from self-containedfile y vamos a buscar nuestro archivo colors.sql. Una vez hecho esto lo que haremos es dar clic al botón Start import

```
 
 
```
Con esto hemos finalizado de configurar lo que necesitamos para hacer que funcione la aplicación

El siguiente paso es acceder al navegador y escribir http://localhost/colors/aplication/index.php para poder acceder a la aplicación y con esto hemos logrado correr nuestra aplicación.

Ahora la interfaz principal es una pantalla de logueo, esto para tener un control de perfiles y permisos de la aplicación
 
Introduciendo los datos correctos de acceso podremos accesar y veremos la siguiente pantalla
 
En este caso estamos como administradores, asi podemos editar, crear y eliminar.
Para añadir un nuevo color le damos clic al boton de “+” y nos aparecera un formulario pidiendo la informacion para crear nuestro nuevo color:
 
La interfaz esta programada para que el sistema ilumine la tarjeta del color que el administrador coloque siempre y cuando exista su codigo hexadecimal
 
El paginado de los colores es de 6 por color
Para editar el color, solo basta con darle clic al lapiz que se ve en cada tarjeta, y nos mostrara los datos que actualmente tiene, y nosotros podremos modificarlo
 
  

Para eliminar una tarjeta de color, solo debemos darle clic en el icono de delete, el sistema preguntara al usuario si realmente desea eliminar el color, esto para evitar accidentes.
 
Si se da clic en Eliminar, se eliminara el color de forma correcta y ya no se vera en la vista
 
La vista del usuario es totalmente diferente, pues solo se le permite ver pero no hacer cambios
 

### URL de repositorio Github

### Credenciales de acceso
Administrador:
Nombre de usuario: admin
Contraseña: #58gt3@
Usuario: 
Nombre de usuario: user01
Contraseña: itb25.



