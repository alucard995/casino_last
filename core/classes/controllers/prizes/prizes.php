<?
namespace controllers\prizes;
use Model\Prizes as mPrizes;
use Model\Casino as mCasino;


/*
|--------------------------------------------------------------------------
| Users prizes class | Базовый класс призов.
|--------------------------------------------------------------------------
|
| This class manages app's prizes. 
| This class can add, delete prizes and return prizes info.
|
| Этот класс обеспечивает базовый функционал работы с призами.
| Он создаёт и удаляет призы, добавляет приз пользователю, а так же, возвращает информацию о призе.
| От данного класса наследуется функционал для дочерних классов.
*/


class prizes{
	public static function getPrize(){
		$userId = \core\auth\auth::authCheck();
		if($userId != ''){
			$items = mPrizes\Prizes::getAllThingsInfo();
			$bonuses = [];
			$money = [];
			$maxMoneyForPrize = mCasino\Casino::getCasinoBalance()*0.6;
			foreach($items as $key => $value){
				$items[$key]['type'] = '1';
			}
			for($i = 0; $i < count($items); $i++){
				if($maxMoneyForPrize > 1000){
					$money[] = ['value' => rand(1000, $maxMoneyForPrize), 'type' => '2'];	
				}
				$bonuses[] = [ 'value' => rand(1000, 100000), 'type' => '3'];
			}
			$totalPrizesArray = array_merge($items, $bonuses);
			if($maxMoneyForPrize > 1000){
				$totalPrizesArray = array_merge($totalPrizesArray, $money);
			}
			$getPrize = $totalPrizesArray[ rand(0, count($totalPrizesArray)-1)];
			$newPrizeId = $getPrize['prize_id'] ?? $getPrize['thing_id'];
			mPrizes\Prizes::addUserPrize($userId, $getPrize['type'], $newPrizeId, $getPrize['value']);
			$arResult['items'] = $items;
			$userPrizes2 = mPrizes\Prizes::getUserPrizes($userId);
			$arResult['user_prizes'] = $userPrizes2;
			$arResult['user_prizes']['balance'] = mCasino\Casino::getCasinoBalance();

			$result = json_encode($arResult);
			echo $result;
		}
		
	}
	public static function savePrize(){
		$userId = \core\auth\auth::authCheck();
		$savePrize = mPrizes\Prizes::saveUserPrize($userId);
		echo json_encode('saved');
	}
	public static function deletePrize(){
		$userId = \core\auth\auth::authCheck();
		$userPrizes = mPrizes\Prizes::getUserPrizes($userId);
		$deletePrize = mPrizes\Prizes::deleteUserPrize($userId, $userPrizes['prize_id']);
		echo json_encode($deletePrize);
	}
	public static function prizesGetter(array $params){
		if($params['action'] == 'getPrize'){
			self::getPrize($params);
		}
		elseif($params['action'] == 'savePrize'){
			self::savePrize();
		}
		elseif($params['action'] == 'deletePrize'){
			self::deletePrize();
		}
	}
}