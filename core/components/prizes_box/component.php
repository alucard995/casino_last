<?
use Model\Prizes as Prizes;
use Model\Casino as Casino;
/*
|--------------------------------------------------------------------------
| Prizes component | Компонент розыгрыша призов.
|--------------------------------------------------------------------------
|
| This component shows, deletes and adds prizes for user.
| Этот компонент добавляет, удаляет и показывает призы пользователя.
*/
// Если авторизован
if(core\auth\auth::authCheck()){
	$userId = $_SESSION['user_id'] ?? '';
	$action = $_POST['action'] ?? '';
	$items = Prizes\Prizes::getAllThingsInfo();
	foreach($items as $key => $value){
		$items[$key]['type'] = 1;
		$items[$key]['prize_id'] = $items[$key]['thing_id'];
		$items[$key]['value'] = '';
	}
	$arResult['items'] = $items;
	$arResult['casino_balance'] = Casino\Casino::getCasinoBalance();
	$userPrizes = Prizes\Prizes::getUserPrizes($userId);
	$userPrizesId = $userPrizes['prize_id'] ?? '';

	$userPrizes = Prizes\Prizes::getUserPrizes($userId);
	$arResult['user_prizes'] = $userPrizes;
}
// Требуем авторизацию, если не авторизован.
else{
	$arResult['error'] = core\config\config::getError('need_auth');
}
?>