<?php 


function nerdy_get_images($size = 'thumbnail', $limit = '0', $offset = '0') {
	global $post;

	$images = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );

	if ($images) {

		$num_of_images = count($images);

		if ($offset > 0) : $start = $offset--; else : $start = 0; endif;
		if ($limit > 0) : $stop = $limit+$start; else : $stop = $num_of_images; endif;

		$i = 0;
		foreach ($images as $image) {
			if ($start <= $i and $i < $stop) {
			$img_title = $image->post_title;   // title.
			$img_description = $image->post_content; // description.
			$img_caption = $image->post_excerpt; // caption.
			$img_url = wp_get_attachment_url($image->ID); // url of the full size image.
			$preview_array = image_downsize( $image->ID, $size );
 			$img_preview = $preview_array[0]; // thumbnail or medium image to use for preview.

 			///////////////////////////////////////////////////////////
			// This is where you'd create your custom image/link/whatever tag using the variables above.
			// This is an example of a basic image tag using this method.
			?>
  <a class="pop_up" title="<?php echo $img_caption; ?>" href="<?php echo $img_url ?>"> 
  	<img src="<?php echo $img_preview; ?>" alt="<?php echo $img_caption; ?>" title="<?php echo $img_title; ?>"> 
  </a>
  <?
			// End custom image tag. Do not edit below here.
			///////////////////////////////////////////////////////////

			}
			$i++;
		}

	}
}
// За да се появяват в админ панела...
add_theme_support( 'post-thumbnails' ); 
//

?>