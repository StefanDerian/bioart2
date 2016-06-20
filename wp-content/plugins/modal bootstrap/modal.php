<?php
/*
 Plugin Name: Post Modal Bootstrap
 Description:Add modal to wordpress.
 Author :Stefan Derian Hartono
 */

 function the_modal(){
 	echo"<div class = 'modal fade' id= 'postModal' aria-hidden='true' aria-labelledby='basicModal'role = 'dialog' tabindex = -1>
<div class = 'modal-dialog'>
<div class = 'modal-content'>
<div class = 'modal-header'>
<button type = 'button' class = 'close' data-dismiss='modal' aria-hidden = 'true'>&amp;times;</button>
<h4 class = 'modal-title' id='postModalLabel'></h4>
</div>
<div class = 'modal-body'>
<iframe>
</iframe>

</div>
<div class = 'modal-footer'>
<button type = 'button' class = 'btn btn-default' data-dismiss='modal' aria-hidden = 'true'>close</button>
</div>
</div>
</div>

 </div>";
}
add_action('wp_footer','the_modal');

