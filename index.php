<?php 

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Estrutura\Page;
use \Estrutura\PageAdmin;
use \Estrutura\Model\User;

//app = new \Slim\Slim();

$app = new Slim();

$app->config('debug', true);


//Rota
$app->get('/', function() {
    
	//echo "OK";
	$page = new Page();

	$page->setTpl("index");

});

//Rota
$app->get('/admin', function() {

	User::verifyLogin();
    
	//echo "OK";
	$page = new PageAdmin();

	$page->setTpl("index");

});

//Rota
$app->get('/admin/login',function(){

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

});

$app->post('/admin/login',function(){

	User::login($_POST["login"], $_POST["password"]);

	header("Location: /admin");

	exit;

});

$app->get('/admin/logout', function(){

	User::logout();

	header("Location: /admin/login");
	exit;
});

$app->run();

 ?>