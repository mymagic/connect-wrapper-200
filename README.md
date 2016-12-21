# MaGIC Connect 2.0 Wrapper

MaGIC Connect 2.0 Wrapper

First install,

`composer require mymagic/connect
`

Then add this providers to config/app.php : 

 ```php 
     'providers' => [
             // Other service providers...
         
            MyMagic\Connect\ConnectServiceProvider::class,
         ], 
         
         
         'aliases' => [
                  'Connect' => MyMagic\Connect\Facades\Connect::class,
          
              ],
```
Now, we you fetch the data from MaGIC Connect API : 
      
```php
use Connect;

Connect::init($request); // initialize connect
Connect::getFirstName(); // Get users first name
Connect::getLastName(); // Get users last name
Connect::getAvatar(); // Get users avatar
Connect::getEmail(); // Get users email address
Connect::getGender(); // Get users gender
```
Don't forget to add this in .env file. Get the client ID and client Secret from MaGIC Connect 2.0
```php
CONNECT_SERVER=
CONNECT_CLIENT=
CONNECT_CLIENT_ID=
CONNECT_CLIENT_SECRET=
```
