<?php
/*
 Plugin Name: ajax load more Extender
 Description: extends ajax load more.
 Author :Stefan Derian Hartono
 */
 function enqueue_ajax_scripts1(){
 	wp_register_script('ajax-script2',plugins_url('/js/ajax-action.js',__FILE__),array('jquery'));
 	wp_enqueue_script('ajax-script2');
 	wp_localize_script( 'ajax-script2', 'ajax_object',
 		array( 'ajax_url' => admin_url( 'admin-ajax.php' )));
 }
 add_action('wp_enqueue_scripts','enqueue_ajax_scripts1');


 add_action('wp_ajax_single_post1','single_post_callback1');
 add_action('wp_ajax_nopriv_single_post1','single_post_callback1');

 function single_post_callback1(){

 	$return = array();
 	$post_id = intval($_POST['postId'] );
 	
 	$post_result = new WP_Query(array('p' =>  intval($_POST['postId'] ),
 		'post_type'              => array( 'post' )
 		)
 	);

 	if ( $post_result->have_posts() ) {

 		while ( $post_result->have_posts() ) {
 			$post_result->the_post();
 			

 			$return['image'] = get_the_post_thumbnail(null,'large');
 			$return['title']= get_the_title();
 			$return['content']=get_the_content();
 		}
 		
 	} else {
	// no posts found
 		$return['title']='not found';
 		$return['content']='not found';
 	}
 	/* Restore original Post Data */
 	wp_reset_postdata();
 	

 	wp_send_json_success($return);
 	die();
 }