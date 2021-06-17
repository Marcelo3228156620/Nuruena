<?php

	//Llamado a la clase de conexión
	require 'PDO/Database.php';

	//Inicializar la variable de almacenamiento del controlador base
	$controller = 'UserController';

	//Determinar las acciones a tomar
	if (!isset($_REQUEST['controller'])) {
		//Llamado a la clase controlador a usar
		require 'controllers/'.$controller.'.php';

		//Hacer uso de la clase 
		//Reasignar la variable 
		$controller = ucwords($controller);
		//Realizar una instancia 
		$controller = new $controller;
		//Redireccion al metodo index
		$controller->index();
	} else {
		//Cuando existe una solicitud desde el navegador
		$controller = ucwords($_REQUEST['controller']. 'Controller');
		//Condicional ternario  Condicion           si es verdad		si es falso
		$method		= isset($_REQUEST['method']) ? $_REQUEST['method'] : 'index';

		require 'controllers/'.$controller.'.php';
		$controller = new $controller;

		//Realizar el llamado o la ejecucion del metodo en el controlador
		call_user_func(array($controller, $method));
	}
?>