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
