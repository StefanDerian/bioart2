jQuery(document).ready(function(){
	jQuery('.ajax-action-button').click(function(){
		var link = jQuery(this).data('readmore');
		var postId = jQuery(this).data('id');
		var data = {
			'action':'single_post',
			'postId':postId

		};
		jQuery.post(ajax_object.ajax_url,data,function(response){
			var image  =  response.image
			jQuery('#postModal .modal-title').html('<h2><b>'+response.data.title+'</b></h2>');
			jQuery('#postModal .modal-body').html(response.data.image+"<br>"+response.data.content);
		},'json',function(){

		});



		jQuery('#postModal').modal();

		







	});


});