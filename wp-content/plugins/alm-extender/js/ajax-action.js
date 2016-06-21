jQuery(document).ready(function(){
	
	
	jQuery('body').on('click','.blog-list',function(){

		var postId = jQuery(this).data('id');
		var data = {
			'action':'single_post1',
			'postId':postId

		};
		jQuery.post(ajax_object.ajax_url,data,function(response){
			
			jQuery('#postModal .modal-title').html('<h2><b>'+response.data.title+'</b></h2>');
			jQuery('#postModal .modal-body').html(response.data.image+"<br>"+response.data.content);
		},'json',function(){

		});



		jQuery('#postModal').modal();









	});
	
	


});