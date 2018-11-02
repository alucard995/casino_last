$(document).ready(function() {
	$('.bx_item_slider').bxSlider({
    	mode: 'fade',
    	captions: true,
	});	
	$('.get_prizes_btn.get').click(function(e){
		e.preventDefault();
		Prizes.getUserPrize();	
	})
	$('.get_prizes_btn.delete').click(function(e){
		e.preventDefault();
		Prizes.deleteUserPrize();	
	})
	$('.get_prizes_btn.save').click(function(e){
		e.preventDefault();
		Prizes.saveUserPrize();	
	})
	
})