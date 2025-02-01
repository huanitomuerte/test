<?php

require_once('functions/get_page_thumbnail.php');   

 
//...............................................................................................
//...............................................................................................
//...............................................................................................
//...............................................................................................
//...............................................................................................
/*
....................................................................... REGISTER TOP MENU
*/
register_nav_menu('header-menu',__( 'Header Menu' ));
/*
....................................................................... REGISTER sec
*/
register_nav_menu('sec_menu',__( 'Sec Menu' )); 

//...............................................................................................

/*
#######################################################   remove li class & id for menu items and pages list
*/

// menu-item-has-children
 
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) { 
	//
	$a = is_array($var) ? array_intersect($var, array( 
													'current-menu-item', 
													'current-post-ancestor',
													'current-menu-ancestor', 
													'menu-item-has-children', // has_chaild
													'sub-menu' 
												)) : '';
	//
	$a = str_replace('current-menu-item', 'active', $a);
	$a = str_replace('current-post-ancestor', 'active', $a);
	$a = str_replace('menu-item-has-children', 'has_chaild', $a);
	//
	return $a;
}
 
//...............................................................................................
//...............................................................................................
//...............................................................................................
// ###################################################################### CUSTOM THUMP IMAGE SIZE
add_image_size( 'slideshow_top', 1920, 720, array( 'center', 'center' ) ); //
//
add_image_size( '400x490', 400, 490, array( 'center', 'center' ) ); //
//
add_image_size( 'size_640_480', 640, 480, array( 'center', 'center' ) ); //
//
add_image_size( 'square_1000', 1000, 1000, array( 'center', 'center' ) ); //


// ........................................................................... GALLERY
add_image_size( 'size_1000_750', 1000, 750, array( 'center', 'center' ) ); //  x_crop_position accepts ‘left’ ‘center’, or ‘right’  //// y_crop_position accepts ‘top’, ‘center’, or ‘bottom’.



// ###################################################################### add_action
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

 
/*
#######################################################   show_admin_bar
*/
add_filter( 'show_admin_bar', '__return_false' );
show_admin_bar(false);
remove_action('init', 'wp_admin_bar_init');  
 
//
function get_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}
 
// 
add_filter( 'comment_text', 'wp_filter_nohtml_kses' );
add_filter( 'comment_text_rss', 'wp_filter_nohtml_kses' );
add_filter( 'comment_excerpt', 'wp_filter_nohtml_kses' );
//
add_filter( 'fee_rich_clean', '__return_false' );

//
if (!current_user_can('edit_users')) {
	add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
	add_filter('pre_option_update_core', create_function('$a', "return null;"));
}
 
 
// Disabling the filter <br> <p>
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99 );
add_filter( 'the_content', 'shortcode_unautop', 100 );

// CUSTOM MAIN FUNCTIONS
 
//
 

//........................................................................ ТЕСТ ТЕСТ ТЕСТ ТЕСТ ТЕСТ ТЕСТ 

function create_big_front_menu( $menu_name ){
	
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
 
    $menu_items = wp_get_nav_menu_items($menu->term_id);
 
    $menu_list = '<div class="row no_margin">'; // OPEN TAG CONTAINER
	//.....................................................
	//.....................................................
	//.....................................................
	$i = 0; 
	//.....................................................
	//.....................................................
	//.....................................................
 
    foreach ( (array) $menu_items as $key => $menu_item ) {
		
		$i++;   
		//.................................................
		
		if ( $i % 2 === 0) {
			//echo '</div><div class="row no_margin">';
			$class = 'col_right'; 
		}
		else{ 
			$class = 'col_left';	
		}
		 
	
		
        $title             = $menu_item->title;
        $url               = $menu_item->url;
		$menu_item_classes = $menu_item->classes[0];
			
		//
		if( empty($menu_item_classes) ){
			$menu_item_classes = 'menu';
		}
			
			
		$menu_list .= '<div id="' . $menu_name . '" class="col-md-6 screen_50 no_margin animated collor_3_hover ' .$class . '">';
		$menu_list .= '<a class="prod_title animated absolute-center wasabi_garden" href="' . $url . '" title="' . $title . '">';
		$menu_list .= '<i class="icon icon_middle sishi-black-2"></i>';
		$menu_list .= '<h3 class="black">' . $title . '</h3>';
		$menu_list .= '</a>';
		$menu_list .= '</div>'; 
		 
    }
    //
	$menu_list .= '</div>'; // CLOSE TAG CONTAINER
	
} else {
	// ALERT EMPTY!!!
    //$menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
}
// $menu_list now ready to output

return  $menu_list;
}


//........................................................................ ТЕСТ ТЕСТ ТЕСТ ТЕСТ ТЕСТ ТЕСТ 

function create_front_module_menu( $menu_name ){
	
	$menu_list = '';
	$num_chaild = 9;
	$count = 0;
	$count_parts = 1;
	//.....................................................
	//.....................................................
	//.....................................................
	
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	 
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		
		$start = '<div class="owl-item product-item"><ul class="h_sub screen_100">';
		$end = '</ul></div>';
		
		
		//.................... ADD HTML 
	 
		$menu_list .= $start; // OPEN TAG CONTAINER
		//.....................................................
		//.....................................................
		//.....................................................
 	 
		foreach ( (array) $menu_items as $key => $menu_item ) {
			
			$count++;   
			//.................................................
 			
			$title             = $menu_item->title;
			$url               = $menu_item->url;
			$menu_item_classes = $menu_item->classes[0];
			
			//.....................................................................................................
				
			$menu_list .= '<li><a class="collor_2_hover" href="' . $url . '"><span>' . $title . '</span></a></li>';
			
			
			if ( $count % $num_chaild === 0) { // $num_chaild
				
				$count = 0;
				$count_parts++; 
				
				$menu_list .= $end . $start;
			
			}
 			 
			 
		}
		
		//...........................................................................................
		if ( sizeof($menu_items)  < ( $count_parts * $num_chaild )  ) {  
			 
			  for( $count; $count < $num_chaild; $count++ ){
				  
				   $menu_list .= '<li><a class="collor_2_hover"></a></li>';
				   
			  }
		} 
			
		//
		$menu_list .= $end; // CLOSE TAG CONTAINER
		
	} else {
		// ALERT EMPTY!!! 
	}
// $menu_list now ready to output

	return  $menu_list; // sizeof( $menu_items ) ; //
}
?>