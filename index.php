<? require_once($_SERVER['DOCUMENT_ROOT'].'/core/prolog.php');

$routesList = [
'/index' => [ '0' => 'main.php'],
'/index.php' => [ '0' => 'main.php'],
'/' => [ '0' => 'main.php'],
'' => [ '0' => 'main.php'],
'/profile' => [ '0' => 'profile.php'],
'/profile/' => [ '0' => 'profile.php'],
'/profile.php' => [ '0' => 'profile.php'],
'/cabinet' => [ '0' => 'cabinet.php'],
'/cabinet.php' => [ '0' => 'cabinet.php'],
'/cabinet/' => [ '0' => 'cabinet.php'],
'/getPrize/' => [ 
					'0' => 'controller/prizes/prizesGetter',
					'1' => $_POST,
				],
'/deletePrize/' => [ 
					'0' => 'controller/prizes/prizesGetter',
					'1' => $_POST,
				],
'/savePrize/' => [ 
					'0' => 'controller/prizes/prizesGetter',
					'1' => $_POST,
				],
];
core\route\route::startRoutes($_SERVER['REQUEST_URI'], $routesList);

?>
