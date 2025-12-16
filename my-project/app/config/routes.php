<?php

use app\controllers\ApiExampleController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;
use app\controllers\ListeApiController;
use app\models\TrajetModele;
use app\controllers\VoitureApiController;
use app\controllers\BeneficeApiController;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {
	// Example route without parameters
	$listecontroller = new ListeApiController();
	$router->get('/', [ $listecontroller, 'getListeParJour' ]);

	$beneficeController = new BeneficeApiController();
	$router->get('/benefice_par_jour', [ $beneficeController, 'getBeneficeParJour' ]);
	$router->get('/trajets_rentables', [ $beneficeController, 'getTrajetsRentablesParJour' ]);
	// Example route with a parameter
	
	$router->get('/Benefice_vehicule/@vehicule_id', function($vehicule_id) use ($app) {
		$vehiculecontroller = new VoitureApiController();
	    return $vehiculecontroller->getBeneficeParVehicule($vehicule_id);
	});

	$router->get('/voitures_disponibles', function() use ($app) {
		$vehiculecontroller = new VoitureApiController();
	    return $vehiculecontroller->getDisponibles();
	});
	


	
	
}, [ SecurityHeadersMiddleware::class ]);