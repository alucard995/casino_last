<? 
$prizeID = $arResult['user_prizes']['prize_id'] ?? '';
$prizeType = $arResult['user_prizes']['type'] ?? '';
$error = $arResult['error'] ?? '';
?>
<?if(!$error):?>
	<div class="prizes_wrapper clearfix">
		<div class="prizes_title">Розыгрыш призов</div>
		<div class="prize_item">
			<div class="bx_item_slider">
				<?foreach($arResult['items'] as $key => $item):?>
					<div class="prize_item_slide prize_item_slide_<?=$item['thing_id'];?>">
						<div class="prize_img_wrapper">
							<img class="prize_img" src="<?=core\files\includer::getIMG('img/'.$item['thing_photo']);?>">
						</div>
						<div class="prize_name"><?=$item['thing_name'];?></div>
						<div class="prize_description"><?=$item['thing_description'];?></div>
						<div class="prize_quantity"><?=$item['thing_quantity'];?></div>	
					</div>
				<?endforeach;?>
			</div>
		</div>
		<div class="prize_item">
			<div class="prize_img_wrapper">
				<img class="prize_img" src="<?=core\files\includer::getIMG('img/money.png');?>">
			</div>
			<div class="prize_name">Денежный приз</div>
			<div class="prize_description">Денежные средства будут зачислены на ваш счёт и вы можете в любой момент обменять их на внутреннюю валюту казино, либо вывести на сторонний счёт.</div>
			<div class="casino_balance">Доступно: <span class="casino_balance_val_js"><?=$arResult['casino_balance'];?></span> р.</div>
		</div>
		<div class="prize_item">
			<div class="prize_img_wrapper">
				<img class="prize_img" src="<?=core\files\includer::getIMG('img/bonuse.png');?>">
			</div>
			<div class="prize_name">Бонусные баллы</div>
			<div class="prize_description">Бонусы можно потратить как в казино, так и конвертировать в валюту и вывести.</div>
		</div>
		<?if(!$arResult['user_prizes']['user_price_id']){
			$getPrizeBtnClass = 'show';
		}
		?>
			<div class="prizes_btn_wrapper top <?=$getPrizeBtnClass;?>">
				<button type="submit" class="get_prizes_btn get">Получить приз</button>
			</div>
	</div>
	<?if($arResult['user_prizes']['user_price_id']){
		$showAreaClass = 'show';
		if($arResult['user_prizes']['prize_type_id'] == '3'){
			$bonusesClass = 'show';
			$bonusesValue = $arResult['user_prizes']['prize_detail_info']['bonuse_value'];
		}
		elseif($arResult['user_prizes']['prize_type_id'] == '2'){
			$moneyClass = 'show';
			$moneyValue = $arResult['user_prizes']['prize_detail_info']['money_value'];
		}

		elseif($arResult['user_prizes']['prize_type_id'] == '1'){
			$thingClass = 'show';
			$thingPhoto = core\files\includer::getIMG('img/'.$arResult['user_prizes']['prize_detail_info']['thing_photo']);
			$thingName = $arResult['user_prizes']['prize_detail_info']['thing_name'];
			$thingDescription = $arResult['user_prizes']['prize_detail_info']['thing_description'];
		}

	}?>
	<div class="total_prizes_area clearfix <?=$showAreaClass;?>">
		<div class="prizes_title">Ваш выигрыш:</div>
			<div class="prize_item thing <?=$thingClass;?>">
				<div class="prize_item_slide">
					<div class="prize_img_wrapper">
						<img class="prize_img prize_thing_img_js" src="<?=$thingPhoto ?? '/local/templates/default/img/house.png';?>">
					</div>
					<div class="prize_name prize_name"><span class="thing_name_value_js"><?=$thingName ?? 'Название приза';?></span></div>
					<div class="prize_description"><span class="thing_description_value_js"><?=$thingDescription ?? 'Описание приза';?></span></div>
				</div>
			</div>
			<div class="prize_item bonuses <?=$bonusesClass;?>">
				<div class="prize_img_wrapper">
					<img class="prize_img" src="<?=core\files\includer::getIMG('img/bonuse.png');?>">
				</div>
				<div class="prize_name">Бонусные баллы</div>
				<div class="prize_description"><span class="bonuses_value_js"><?=$bonusesValue ?? '999999999';?></span> баллов.</div>
			</div>
			<div class="prize_item money <?=$moneyClass;?>">
				<div class="prize_img_wrapper">
					<img class="prize_img" src="<?=core\files\includer::getIMG('img/money.png');?>">
				</div>
				<div class="prize_name">Денежный приз</div>
				<div class="prize_description"><span class="money_value_js"><?=$moneyValue ?? '999999999';?></span> рублей.</div>
			</div>
		<div class="prizes_btn_wrapper">
			<?if($arResult['user_prizes']['prize_status'] == 0):?>
					<div><button type="submit" class="get_prizes_btn save">Забрать приз</button></div>
					<div><button type="submit" class="get_prizes_btn delete">Хочу другой</button></div>
					
				<div class="prizes_form saved">
					Ваш приз успешно сохранён. Перейдите в <a class="cabinet_a" href="/profile/">профиль</a> и оставьте заявку на выдачу приза.
				</div>
			<?else:?>
				<button type="submit" class="get_prizes_btn delete">Хочу другой</button>
				<div class="prizes_form saved show">
					Ваш приз успешно сохранён. Перейдите в <a class="cabinet_a" href="/profile/">профиль</a> и оставьте заявку на выдачу приза.
				</div>
			<?endif;?>
		</div>
	</div>
<?else:?>
	<div class="error_message"><?=$error;?></div>
<?endif;?>