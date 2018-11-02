;
Prizes = {};

Prizes.userPrizes;

Prizes.getUserPrize = function(){
	$.ajax({
		type: "POST",
		url:"/getPrize/",
		data: {
			 'action':'getPrize',
		},
		success: function(data){
	    	Prizes.userPrizes = jQuery.parseJSON(data)['user_prizes'];
			Prizes.drawUserPrize();
		}
	})
}

Prizes.deleteUserPrize = function(){
	$.ajax({
		type: "POST",
		url:"/deletePrize/",
		data: {
			 'action':'deletePrize',
		},
		success: function(data){
	    	Prizes.userPrizes = jQuery.parseJSON(data);
			Prizes.clearPrizesArea();
		}
	})
}

Prizes.saveUserPrize = function(){
	$.ajax({
		type: "POST",
		url:"/savePrize/",
		data: {
			 'action':'savePrize',
		},
		success: function(data){
	    	Prizes.userPrizes = jQuery.parseJSON(data);
			Prizes.saveUserPrizeShow();
		}
	})
}

Prizes.drawUserPrize = function(){
	$('.total_prizes_area').addClass('show');
	$('.prizes_btn_wrapper.top').removeClass('show');
	$('.get_prizes_btn.save').css('display', 'inline-block');
	$('.prize_item.'+Prizes.userPrizes['type']).addClass('show');
	if(Prizes.userPrizes['type'] == 'money'){
		$('.money_value_js').html(Prizes.userPrizes['prize_detail_info']['money_value']);
	}
	else if(Prizes.userPrizes['type'] == 'bonuses'){
		$('.bonuses_value_js').html(Prizes.userPrizes['prize_detail_info']['bonuse_value']);
	}
	else if(Prizes.userPrizes['type'] == 'thing'){
		$('.thing_name_value_js').html(Prizes.userPrizes['prize_detail_info']['thing_name']);
		$('.thing_description_value_js').html(Prizes.userPrizes['prize_detail_info']['thing_description']);
		$('.prize_thing_img_js').attr('src', '/local/templates/default/img/'+Prizes.userPrizes['prize_detail_info']['thing_photo']);
	}
	Prizes.updatePrizesCounts(Prizes.userPrizes);
}

Prizes.updatePrizesCounts = function(counts){
	console.log(counts);
	$('.casino_balance_val_js').html(counts['balance']);
	if(counts['type'] == 'thing'){
		$('.prize_item_slide_'+Prizes.userPrizes['prize_detail_info']['thing_id']+' .prize_quantity').html(counts['prize_detail_info']['thing_quantity']);
	}
}

Prizes.saveUserPrizeShow = function(){
	$('.prizes_form.saved').css('display', 'block');
	$('.get_prizes_btn.save').css('display', 'none');
}

Prizes.clearPrizesArea = function(){
	$('.total_prizes_area').removeClass('show');
	$('.total_prizes_area .prize_item').removeClass('show');
	$('.prizes_btn_wrapper').addClass('show');
	$('.prizes_form.saved').css('display', 'none');
}
