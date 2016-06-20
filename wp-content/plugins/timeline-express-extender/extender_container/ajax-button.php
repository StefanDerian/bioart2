<?php
function ajax_buttons(){
	$permalinks = get_permalink();
	$postId = get_the_id();
	$button = "<button class = 'ajax-action-button' data-id = $postId data-readmore = $permalinks>Press Here</button>";
	echo $button;
}