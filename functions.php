<?php

use \Estrutura\Model\User;
use \Estrutura\Model\Cart;

function formatPrice($vlprice)
{

	return number_format((float) $vlprice, 2, ",", ".");

}

function formatDate($date)
{

	return date('d/m/Y', strtotime($date));

}

function checkLogin($inadmin = true)
{

	return User::checkLogin($inadmin);

}

function getUserName()
{

	$user = User::getFromSession();

	return $user->getdesperson();

}

function getCartNrQtd(){

	$cart = Cart::getFromSession();

	$total  = $cart->getProductsTotals();

	return $total['nrqtd'];

}

function getCartVlSubTotal(){

	$cart = Cart::getFromSession();

	$total  = $cart->getProductsTotals();

	return formatPrice($total['vlprice']);

}


?>