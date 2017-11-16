<?php 

use Cart\App;
use Illuminate\Database\Capsule\Manager as Capsule;

session_start();

require __DIR__ . '/../vendor/autoload.php';


$app = new App;

$capsule = new Capsule;//Illuminate Database using Eloquent from laravel 

$capsule->addConnection([

    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'marronja01',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation'=> 'utf8_unicode_ci',
    'prefix'=> '' 

]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

require __DIR__ . '/../app/routes.php';
?>