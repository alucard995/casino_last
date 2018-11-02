<?
namespace core\route;
use core\config as config;
use core\controllers as controllers;
/*
|--------------------------------------------------------------------------
| Route class.
|--------------------------------------------------------------------------
|
| This class is for routes in the app.
| Этот класс предназначен для создания ЧПУ.
*/


class route{

	// Метод инициализирует маршруты приложения.
	public static function startRoutes( string $currentRoute = 'index', array $routesList){
		if(!empty($routesList[$currentRoute][0])){
			$routesSpreaded = explode('/', $routesList[$currentRoute]['0']);

			if($routesSpreaded[0] != 'controller'){
				if(file_exists($_SERVER['DOCUMENT_ROOT'].'/apps/'.$routesList[$currentRoute]['0'])){
					require_once($_SERVER['DOCUMENT_ROOT'].'/apps/'.$routesList[$currentRoute]['0']);
				}
				else{
					echo config\config::getError('route_not_found');
				}	
			}
			else{
				controllers\controllers::startController($routesSpreaded[1], $routesSpreaded[2], $routesList[$currentRoute]['1']);
			}	
		}
		else{
			require_once($_SERVER['DOCUMENT_ROOT'].'/apps/main.php');
		}
	}
}