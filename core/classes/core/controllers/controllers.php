<?
namespace core\controllers;
/*
|--------------------------------------------------------------------------
| Route class.
|--------------------------------------------------------------------------
|
| This class is for routes in the app.
| Этот класс предназначен для создания ЧПУ.
*/


class controllers{

	// Метод инициализирует контроллеры приложения.
	public static function startController($controllerName, $controllerMethod, array $params){
		$controllerClass = 'controllers\\'.$controllerName.'\\'.$controllerName;
		$controllerClass::$controllerMethod($params);
		
	}
}