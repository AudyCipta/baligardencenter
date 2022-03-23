function formAni(x) {
	var values = $('#'+x).find('.form').val();
	if (values.length > 0) {
		$('#'+x).find('.inputBoxLabel').addClass('inputBoxLabel2');
	}
	else{
		$('#'+x).find('.inputBoxLabel').removeClass('inputBoxLabel2');	
	}
}function formAni2(x) {
	$('#'+x).find('.inputBoxLabel').addClass('inputBoxLabel2');
}

	