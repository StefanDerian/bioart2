jQuery(document).ready(function(){
	jQuery('.ajax-action-button').click(function(){
		var link = jQuery(this).data('readmore');
		var postId = jQuery(this).data('id');
		var data = {
			'action':'single_post',
			'postId':postId

		};
		jQuery.post(ajax_object.ajax_url,data,function(response){
			console.log(response);
			jQuery('#postModal .modal-title').html(response.data.title);
			jQuery('#postModal .modal-body').html(response.data.content);
		},'json');



		jQuery('#postModal').modal();

		







	});


});