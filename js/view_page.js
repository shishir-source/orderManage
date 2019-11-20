var booking_views_js = (function(){
	return {
		init: function(){
			$('#normal-btn-success').delay(5000).fadeOut( "slow", function() {
			    $('.close').prop("disabled", false);
			});
			$('.increase_field').addClass('hidden');
			$('input[name="ipo_or_mrf"]').on('click',function () {
		        var value = $(this).val();
		        if(value == 'ipo'){
		            $('.increase_field').removeClass('hidden');
		        }else{
		            $('.increase_field').addClass('hidden');
		        }
		    });

		    var $checked = $('.view_table tbody tr').find('input[type="checkbox"]');
			if($checked.prop("checked") == true){
	        	$('.view_table tbody .checked_class').css('background-color','#C4d1FF');
	        }

		    $('.view_table tbody tr').on('click', function (e) {

		    	if($(e.target).prop('name') == "order_no[]" || $(e.target).prop('name') == "quantity[]") {
		    		return false;
		    	}
		    	
		        var checked= $(this).find('input[type="checkbox"]');
		        if(checked.prop('disabled') != true){
			        checked.prop('checked', !checked.is(':checked'));
			        if(checked.prop("checked") == true){
			        	$(this).css('background-color','#C4d1FF');
			        }else{
			        	$(this).css('background-color','');
			        }
		    	}else{
		    		alert('Please check.');
		    	}
		    });

		    $('#select_check input[type="checkbox"]').on('click',function () {
		        $(this).prop('checked', !$(this).is(':checked'));
		    });
		}
	}
})();

$(document).ready(function(){
	booking_views_js.init();
});