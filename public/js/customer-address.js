$(document).ready(function(){
	//update address
	$(".address-form").on('submit', function(e){
		e.preventDefault()
		let form = $(this);
		let url = form.attr('action');
		let type = form.attr('method');

		let form_data = form.serialize();

			$.ajax({
				url: url,
				data: form_data,
				method: type,
				dataType: 'JSON',
				cache: false,
				beforeSend:function(){
					$(".address-form button").attr('disabled', true)
				},
				success: function(response){
					$(".address-form button").attr('disabled', false)
					if (response.success === true){
						alert('SUCCESS\n'+response.msg)
						window.location.reload(true)
					}else{
						alert('SORRY\nSomething went wrong')
						window.location.reload(true)
					}
										
				},
				error: function (jqXHR, textStatus, errorThrown) {
					$(".address-form button").attr('disabled', false)
					if (jqXHR.status === 422) {
	                  	$('.show-errors').html(jqXHR.responseText)
	                }else if(jqXHR.status === 422){
	                	$('.show-errors').html(jqXHR.responseText)
	                	window.location.reload(true)
	                }else{
	                  	alert('Sorry\n Something unknown problem')
	                  	window.location.reload(true)
	                }

	            },
	            complete:function(){
	            	$(".address-form button").attr('disabled', false)
	            }
	        });
	})
})