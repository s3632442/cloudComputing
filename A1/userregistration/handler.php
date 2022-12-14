<?php

ini_set('allow_url_fopen',1);
switch (@parse_url($_SERVER['REQUEST_URI'])['path']){
	case '/login.php':
		require 'login.php';
		break;
	case '/validation.php':
		require 'validation.php';
		break;
	case '/registration.php':
		require 'registration.php';
		break;
	case '/home.php':
		require 'home.php';
		break;
	case '/index.php':
		require 'index.php';
		break;
	case '/':
		require 'index.php';
		break;
	case '/logout.php':
		require 'logout.php';
		break;
	case '/signup.php':
		require 'signup.php';
		break;
	default :
		http_response_code(404);
		echo @parse_url($_SERVER['REQUEST_URI'])['path'];
		exit('Not Found');
}