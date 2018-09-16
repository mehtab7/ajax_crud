$(function(){
	loadData();
});

$(function(){
	$('.form').on('submit', function(event){
		event.preventDefault();

		$form = $(this);

		if(isValid($form)){
			crudRequest($form);

		}else{
			console.log('Missing');
		}
	});
});
$(document).ready(function(){
	$("#btn").click(function(){
		/* Single line Reset function executes on click of Reset Button */
		$("#form")[0].reset();
	});
});

$(function(){
	$('.table').on('click',function(event){
		event.preventDefault();
		var $anchor = $(event.target).parent('.icon');
		var id = $anchor.attr('data-id');
		
		if($anchor.hasClass('icon')){
			// console.log($anchor.attr('id'))
			get_record($anchor.attr('id'), id);
		}

	});
});

function get_record(actionName , id){
	var $modal = '';
	var $form  = '';
	$.ajax({
		url : 'get_record.php',
		method : 'post',
		data : {id: id},
		success : function(response){
			response = $.parseJSON(response);
			if(response.status == 'success'){

				if(actionName == 'update'){
					var $modal = $('#update-modal');
					 

				}else if(actionName == 'delete'){
					var $modal = $('#delete-modal');
				}
				// console.log($modal.find('.form').html())
				
				$form = $modal.find('.form');
				$form.find('.id').val( response.id );
				$form.find('.fname').val( response.fname );
				$form.find('.lname').val( response.lname );
				$form.find('.email').val( response.email );

				 $modal.modal('show');
			}
		}
	});
}

function crudRequest($form) {
	resetMessages();
	$.ajax({
		url : $form.attr('action'),
		method : $form.attr('method'),
		data : $form.serialize(),
		success: function(response){
			response = $.parseJSON(response);

			if(response.status == 'success'){
				showSuccessMessage($form, response.message);
			}else if(response.status == 'error'){
				showErrorMessage($form, response.message);
			}
			loadData();
			console.log(response)
		}
	});
	// console.log($form.serialize())
}

function isValid(){
	var inputTagtList = $form.find('input');

	for(var i=0; i<inputTagtList.length; i++ ){
		if(inputTagtList[i].value == '' || inputTagtList[i].value == null){
			return false;
		}

	}
	return true;
}

function loadData() {
	$('.table').html( '<tr colspan="5" style="text-align:center;"><td><img src="public/images/ajax-loader.gif"></td></tr>');
	$.ajax({
		url : 'read.php', 
		method : 'get' ,
		success : function(response){
			response = $.parseJSON(response);

			if(response.status == 'success'){
				$('.table').html(response.html);
				$('.modal').modal('hide');

				resetMessages();

			}
			// console.log(response);

		}
	});
}

function showErrorMessage($form, message){
	var $alert =  $form.find('.status');

	$alert.addClass('alert');
	$alert.addClass('alert-danger');
	$alert.html(message)
}

function showSuccessMessage($form, message){
	var $alert =  $form.find('.status');

	$alert.addClass('alert');
	$alert.addClass('alert-success');
	$alert.html(message)
}

function resetMessages(){
	$('.status').removeClass('alert');
	$('.status').removeClass('alert-danger');
	$('.status').removeClass('alert-success');
	$('.status').html('');
	
}