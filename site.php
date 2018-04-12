<?php

use \Estrutura\Page;
use \Estrutura\Model\Product;
use \Estrutura\Model\Category;

$app->get('/', function() {

	$products = Product::listAll();
    
	//echo "OK";
	$page = new Page();

	$page->setTpl("index", array(
		'products'=>Product::checkList($products)
	));

});

$app->get("/categories/:idcategory", function($idcategory){

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new Page();

	$page->setTpl("category", array(
		'category'=>$category->getValues(),
		'products'=>Product::checkList($category->getProducts())
	));

});


?>