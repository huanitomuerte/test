<?php 
get_header();
/*
Template Name: Галерия
*/
?>
<!-- PAGE -->

<div id="page" class="content">
  <div class="container no_padding page_gallery">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="row">
      <div class="col-md-12">
        <h2 class="title" title="<?php bloginfo( 'name' ); ?> - <?php the_title(); ?>">
          <?php the_title(); ?>
        </h2>
      </div>
    </div>
    <section id="gallery_page" class="cnt_ex eq">
      <div class="row">
        <?php
    //Get the images ids from the post_metadata
    $images = acf_photo_gallery('gallery', $post->ID);
    //Check if return array has anything in it
    if( count($images) ):
        //Cool, we got some data so now let's loop over it
        foreach($images as $image):
			$id = $image['id']; // The attachment id of the media
			$title = $image['title']; //The title
			$caption= $image['caption']; //The caption
			// $full_image_url= $image['full_image_url']; //Full size image url
			// $full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
			// $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
			$url= $image['url']; //Goto any link when clicked
			$target = $image['target']; //Open normal or new tab
			$alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
			$class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
 			
			// size_640_480
			$thumbnail_image_url = wp_get_attachment_image_src( $id, 'thumbnail' );
			// full_galery
			$full_image_url   = wp_get_attachment_image_src( $id, 'full_galery' );
 			
			$html .= '<div class="col-md-3 thumbnail_gall">';
			
			// get_bloginfo( 'name' )
			$html .= '<a class="strip" data-strip-caption="' . get_bloginfo( 'name' ) . ' &raquo; ' . get_the_title() . '" data-strip-group="group" href="' . $full_image_url[0] . '" >';
			//$html .= '<a class="strip" data-strip-caption="' . get_bloginfo( 'name' ) . ' &raquo; ' . get_the_title() . ' &raquo; ' . $title .  '" data-strip-group="group" href="' . $full_image_url[0] . '" >';
			$html .= '<figure class="img_cover square" style="background-image: url(' . $thumbnail_image_url[0] . ');"></figure>';
			$html .= '</a>';
			$html .= '</div>'; 

	
	  //===================================================================
	  endforeach; 
	  
	  //
	  echo $html;
	  
	  endif; 
	  
	  
	  ?>
      </div>
    </section>
    <?php endwhile; ?>
  </div>
</div>
<?php get_footer(); ?>
