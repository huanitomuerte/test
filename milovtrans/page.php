<?php 
get_header();
// 
?>

<!-- PAGE -->

<div id="page" class="content">
  <div class="container no_padding page_gallery"> 
    
    <!-- CNT-->
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="row">
      <div class="col-md-8">
      	<h2 class="title" title="<?php bloginfo( 'name' ); ?> - <?php the_title(); ?>">
            <?php the_title(); ?>
          </h2>
        <section class="cnt_ex eq">
          
          <?php the_content(); ?>
        </section>
      </div>
      <div class="col-md-4">
        <h3 class="title" title="<?php bloginfo( 'name' ); ?> - <?php the_title(); ?>">
            Виж още:
        </h3>
        <nav id="sec_menu" class="clearfix eq">
          <?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => 18, //$post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order',
	'post__not_in' => array( get_the_ID() )
 );


$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>
          <ul>
            <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php the_title(); ?>
              </a></li>
            <?php endwhile; ?>
          </ul>
          <?php  endif;?>
          <?php  wp_reset_postdata(); ?>
        </nav>
      </div>
    </div>
    
    <!-- /page_cnt -->
    <?php endwhile; ?>
  </div>
</div>
<?php get_footer(); ?>
