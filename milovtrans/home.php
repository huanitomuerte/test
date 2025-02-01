<?php
/*
Template Name: Начало/Home Page
*/
get_header();

// ################################################ ACF
$text_title_1 = get_field( 'text_title_1' );
$text_title_2 = get_field( 'text_title_2' );
$text_title_3 = get_field( 'text_title_3' );

$text_1 = get_field( 'text_1' );
$text_2 = get_field( 'text_2' );
$text_3 = get_field( 'text_3' );

$url_1 = get_field('url_1');
$url_2 = get_field('url_2');
$url_3 = get_field('url_3');
?>

<!-- home -->

<section class="content">
  <div id="page_cnt" class="container">
    
    <!-- CNT-->
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="home_row_text" class="row">
      <div class="col-md-4">
        <article class="height_1">
          <?php if( !empty( $text_title_1 ) ){ ?>
          <h3 class="letter_spacing"><?php echo $text_title_1; ?></h3>
          <?php } ?>
          <?php if( !empty( $text_1 ) ){ ?>
          <p><?php echo $text_1; ?></p>
          <?php } ?>
          <?php 
  			if( $url_1 ): ?>
          <a class="btn" href="<?php echo $url_1; ?>">Виж още</a>
          <?php endif; ?>
        </article>
      </div>
      <div class="col-md-4">
        <article class="height_1">
          <?php if( !empty( $text_title_2 ) ){ ?>
          <h3 class="letter_spacing"><?php echo $text_title_2; ?></h3>
          <?php } ?>
          <?php if( !empty( $text_2 ) ){ ?>
          <p><?php echo $text_2; ?></p>
          <?php } ?>
          <?php 
  			if( $url_2 ): ?>
          <a class="btn" href="<?php echo $url_2; ?>">Виж още</a>
          <?php endif; ?>
        </article>
      </div>
      <div class="col-md-4">
        <article class="height_1">
          <?php if( !empty( $text_title_3 ) ){ ?>
          <h3 class="letter_spacing"><?php echo $text_title_3; ?></h3>
          <?php } ?>
          <?php if( !empty( $text_3 ) ){ ?>
          <p><?php echo $text_3; ?></p>
          <?php } ?>
          <?php 
  			if( $url_3 ): ?>
          <a class="btn" href="<?php echo $url_3; ?>">Виж още</a>
          <?php endif; ?>
        </article>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</section>
<?php get_footer(); ?>
