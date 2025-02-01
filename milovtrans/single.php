<?php 
get_header();
// 
?>

<!-- PAGE -->

<section class="content">
  <div id="page_cnt" class="container">
    <h1 class="h-section" title="<?php bloginfo( 'name' ); ?> - <?php the_title(); ?>">
      <?php the_title(); ?>
    </h1>
    <div class="container no_padding page_gallery">
      
      <!-- CNT-->
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      single 
      
      <!-- /page_cnt -->
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
