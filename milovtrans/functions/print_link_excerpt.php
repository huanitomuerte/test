<?php 

//
function print_content_excerpt_home_za_nas( $id ) {
   
	 //
	$post = get_page($id); 
	$content = apply_filters('the_content', $post->post_content);  
	$sjc_excerpt = explode( '<!--more-->', $post->post_content); 
	return  $sjc_excerpt[0]; 
} 
// content home 2 // 
function print_content_excerpt_home( $id ) {
	 
	  $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $id));
	  return $excerpt;
    /* $rpl1 = array("<li>", "</li>", "<p>", "</p>", "<br>", "</br>", "<ul>", "</ul>");
	 $rpl2 = array("", ", ", "", "", "", "", "", "");
	 //
	$post = get_page($id); 
	$content = apply_filters('the_content', $post->post_content);  
	$sjc_excerpt = explode( '<!--more-->', $post->post_content); 
	return str_replace( $rpl1, $rpl2, wpautop( $sjc_excerpt[0] ) ) ; */
} 
// title home
function print_tille_excerpt_home( $id ) { 
	$page = get_post($id);
	return $page->post_title;
}
// lins home
function print_link_excerpt_home( $id, $button ) {
  
  if($button == 1){
		return '<a href="' . get_page_link($id) . '" class="button">Виж още</a>';
	}else if($button == 0){
		return '<a href="' . get_page_link($id) . '">Виж още...</a>';
	} 
}
?>