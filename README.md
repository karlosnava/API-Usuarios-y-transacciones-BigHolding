
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
# Prueba teórica | Carlos Rodriguez - BigHolding

*¿Cuál es el objetivo de la inyección de dependencias en la programación orientada a objetos?*
```
Consiste en delegar la responsabilidad de creación de instancias de una clase a otra, esto para
hacerla más flexible, abierta a expansión. Ejemplo, tenemos una clase “Persona” y tiene dos
atributos, genero y profesión; en el método constructor le podríamos poner “Mujer” y
“Arquitecta”.
¿Pero qué pasa si queremos que sea “Mujer” y “Programadora”? Pues es aquí donde la
inyección de dependencias cobra sentido, pues desde la instancia de la clase “Persona”
podemos pasarle como parámetro cualquier otro objeto que queramos, un ejemplo podría
ser: $nikol = new Persona (Mujer, Programadora);
```

*¿Qué mecanismo usa Laravel para procesar las peticiones http, filtrarlas y dar una respuesta de acuerdo con estas peticiones? Un ejemplo de este mecanismo sería: impedir el acceso a un usuario a la ruta /borrar-usuario si no tiene el rol de administrado*
```
Los conocidos Middleware encargados de primero procesar la solicitud http y verificar si
existe alguna validación que le permita continuar con la solicitud o devolver código de
error 403 – No autorizado. Los middlewares funcionan como muros, donde al intentar
pasar primero preguntan a la petición si cumplen ciertos parámetros / reglas de
validación, de ser verdadero lo deja pasar, de lo contrario, no.
```

*¿Qué mecanismo usa Laravel para proteger las peticiones al servidor de ataques XSS?*
```
Usa el token CSRF, este token se debe incluir sí o sí en todas las peticiones HTTP POST que
se vayan a hacer en el sistema, de lo contrario la respuesta será de “formulario vencido”
¿Cómo funciona? Es muy sencillo pero eficaz, cada vez que entres a una página (donde se
incluya la directiva de Blade @csrf) Laravel cargará un token aleatorio en una variable de
sesión y en in input oculto, cuando envíes el formulario ambos tokens deben coincidir, si
el token no existe o no coincide se trata de un intento de XSS.
```

*Según la estructura que genera Laravel para los proyectos ¿Cuál carpeta es la más indicada para
contener las clases personalizadas creadas por el desarrollador?*
```
La carpeta app/ ubicada en la raíz del proyecto, pues ahí se almacenan los controladores,
modelos, ServiceProvider, etc. Pues ahí podríamos bien sea crear una carpeta como
“Helpers”, “Customs” o como consideremos más indicado el nombre (asegurarse cuidar
del namespace de la clase).
```

*En la programación orientada a objetos ¿Qué herramienta permite crear y establecer los
métodos que van a hacer implementados por una clase?*
```
Todo dependerá de la necesidad del sistema, si tengo una clase “Usuarios” y ese usuario
solo podrá ser creado y editado, solo tendremos dos métodos en nuestra clase, create() y
update(), en el caso de Laravel se extendería a 4 para mostrar las vistas. Pero en todo caso
el análisis y buen planteamiento del sistema a desarrollar es fundamental para establecer
los métodos que serán implementados, pues lo ideal es no tener información redundante
en las clases, ni tener dos o más métodos con la misma o similar funcionalidad, aquí nos
podríamos extender a la conocida “Sobrecarga de métodos”.
```

*¿En el Framework Laravel que nos permite crear nuevas tablas o alterar tablas existentes en una
base datos?*
```
Las migraciones, almacenadas en la carpeta database/migrations gracias al objeto
Schema podemos crear bases de datos completas sin una sola línea SQL, un ejemplo para
crear una columna sería:
```
`$table->string('email')->unique();`

*¿En el Framework Laravel que nos permite poblar una base de datos con información genérica
para pruebas o configuraciones base?*
```
Sí es posible, esto con el conocido Laravel Faker, que con las factorys de Laravel le
podemos pasar datos aleatorios o ya establecidos, dependiendo la necesidad del
sistema, podemos poblar la base de datos con absolutamente cualquier dato, texto,
números, imágenes, direcciones, etc.
```
## Correr localmente

Clone el proyecto

```bash
  git clone https://github.com/karlosnava/API-Usuarios-y-transacciones-BigHolding.git
```

Vaya al directorio del proyecto

```bash
  cd API-Usuarios-y-transacciones-BigHolding
```

Instale dependencias

```bash
  composer install
  npm install
```

Cree una base de datos llamada *bigholding_test* y corra las migraciones

```bash
  php artisan migrate --seed
```

Inicie el servidor

```bash
  php artisan serve
```



# Uso de la API
Para listar todos los usuarios haga una petición GET a la ruta
```bash
  http://127.0.0.1:8000/api/
```

Para listar todas las transacciones de un usuario haga una petición GET a la ruta (aquí se implementa inyección implicita de modelos)
```bash
  http://127.0.0.1:8000/api/transactions/{user_id}
```