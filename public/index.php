<?php 
chdir(dirname(__DIR__));

require 'vendor/autoload.php';

use Silex\Application;

$app = new Application();

$app['debug'] = true;

$app->get('/', function(Application $app){
	$products = $app['pdo'];
	$products = $products->query("SELECT * FROM products");
	var_dump($products->fetchAll());
	return '-';
});

$app->mount("/admin", function($admin) use($app){
	$admin->mount("/users", require "src/Controllers/UserController.php");
	$admin->mount("/posts", require "src/Controllers/PostController.php");
	
	$admin->before(function(){
		print 'Ok <br>';
	});
});
$app->register(new SilexCasts\Provider\ConnectionServiceProvider(), array(
	'db.name' => 'formacao_php',
	'db.host' => '127.0.0.1',
	'db.user' => 'root',
	'db.password' => '123456'
));

$app->mount('/nanao', require "src/Controllers/TestController.php");

$app->run();