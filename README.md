Esta aplicacion es creada con el fin de desarrollar una calculadora empleando
para ello Php Nativo y MVC que permite a los usuarios resolver operaciones 
matematicas basicas como:

1. sumar
2. restar
3. dividir
4. multiplicar

procedimiento de uso:

para reali?ar dichas operaciones debemos digitar un (numero A), luego
elegiremos la operacion deseada (+,-,*/) de las ya mencionadas luego elegiremos
un (numero B) y finalmente pulsaremos la tecla (=) para calcular y mostrar su resultado.

entorno local:

Luego de clonar el repositorio y alojarlo en nuestro servidor local

1. Configurar hostvirtual desde Windows:

vamos a Disco local C:/xampp/apache/conf/extra/httpd-vhosts 
y pegamos la siguiente configuracion para nuestro hostvirtual 
de manera que a punte a la carpeta rai? y no a public 
por motivo que nuestro router gestiona las peticiones desde aqui 
para nuestra Api:

<VirtualHost *:80> 
    DocumentRoot "C:/xampp/htdocs/Calculadora"
    ServerName Calculadora.test
    ServerAlias *.Calculadora.test
    <Directory "C:/xampp/htdocs/Calculadora">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>


Dominio Local: calculadora.test
2. Abrimos bloc de Nota como Administradores, una ve? a bierto damos la opcion abrir archivo
y buscamos el siguiente: C:/Windows/System32/drivers/etc/hosts

Ubicados debajo de una seccion parecida a esta dentro del archivo 
pegaremos el siguiente dominio calculadora.test:

# localhost name resolution is handled ...
127.0.0.1          calculadora.test


Importante:

Reiniciar el Servidor!!

3.Una ve? configurado el host y dominio local, o si al igual que yo usas laragon solo nos percatamos 
que apunte a la carpeta rai? del proyecto y no a public, nos aseguramos de descargar las 
depencias del proyecto como lo es el autoload, desde el composer dado que para este proyecto
hacemos uso de carga automatica de clases y archivos ya que empleamos el patron MVC.

4. Luego de descargar las dependencias del proyecto, podremos dirigirnos a la ruta: http://calculadora.test/
para observar las bondades de nuestro proyecto o si es de nuestra preferencia reali?sar un test 
a traves de postman o similares a las siguientes rutas:


IMPORTANTE:

Headers
Content-Type application/json

Body en la opcion de Form deben e?istir 2 Varibles con clave o nombres 
como se muestra a continuacion ejemplo:

numeroA = 2
numeroB = 5

http://calculadora.test/suma
http://calculadora.test/resta
http://calculadora.test/multiplicacion
http://calculadora.test/division



