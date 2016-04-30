<?php

spl_autoload_register("autoloader");

function autoloader($classe) {
	// Substitui a barra \ pela barra /
	$path = str_replace("\\", DIRECTORY_SEPARATOR, $classe);
	include_once $path.".php";
}