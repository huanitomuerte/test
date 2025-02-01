<?php
/*
Template Name: Контакти
*/
get_header();  
//
// ---------------------- STINGS 
$form_name = 'Име'; 
$form_mail = 'E-Mail';
$form_tel  = 'Телефон';
$subject   = 'Тема';
$send_str  = "Изпрати";
$massage_str  = "Вашето запитване";

//
$required_field = 'Това поле е задължително!'; 
$error_email    = 'Това не е валиден ' . $form_mail . '!';
//
$error_number = 'Моля въведете само цифри!'; 
$success      = '<p><strong>Благодарим за Вашето запитване!</strong><br>Наш оператор ще се свърже с Вас на посочените данни за връзка.<br>За допълнителни въпроси, моля използвайте посочените телефони (Веселин Милов)</p>
<p><a id="back_form" class="btn"><span>Обратно към формата</span></a></p>'; 
?>

<div id="ex-contact" class="section_page">
  <?php 

if ( have_posts() ){
 	
	 while ( have_posts() ) : the_post(); 
	 
	 //..............................................
	 $latitude = get_field('latitude');
	 $longitude = get_field('longitude');
	 $pin_title = get_field('pin_title');
	 //
	 $latitude_str  = ' data-latitude="42.701557"';   // = 42.1234;
	 $longitude_str = ' data-longitude="23.359715"'; // = 12.34567;
	 $pin_title_str = ' data-title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '"';  
	 //
	 if( !empty( $latitude ) ){
		 
		 $latitude_str = ' data-latitude="' . $latitude . '"';
	 }
	 
	 if( !empty( $longitude ) ){
		 
		 $longitude_str = ' data-longitude="' . $longitude . '"';
	 }
	 
	 if( !empty( $pin_title ) ){
		 
		 $pin_title_str = ' data-title="' . $pin_title . '"';
	 }
	 
	 $str = $latitude_str . $longitude_str . $pin_title_str;
	 
	 ?>
  <section id="gmaps-container" data-img="<?php echo get_template_directory_uri(); ?>/assets/images/maxPin.png"<?php echo $str; ?>>
    <div id="map_canvas" class="page_header">
    </div>
  </section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="Rosa_Marena">С нетърпение очакваме обратна връзка с Вас!</h2>
      </div>
    </div>
    <div class="row">
      <div id="left_contacts" class="col-md-4">
       	<div class="info">
         <?php 
			$tel_1 = get_field('tel_1');
			$tel_2 = get_field('tel_2');
			$tel_3 = get_field('tel_3');
			$e_mail = get_field('e-mail'); 
		  ?> 
          <?php if( !empty( $tel_1 ) ){ ?>
        <h3 class="phone"><?php echo $tel_1; ?></h3>
            <?php }?>
             <?php if( !empty( $tel_2 ) ){ ?>
        <h3 class="phone"><?php echo $tel_2; ?></h3>
            <?php }?>
             <?php if( !empty( $tel_3 ) ){ ?>
        <h3 class="phone"><?php echo $tel_3; ?></h3>
            <?php }?>
             <?php if( !empty( $e_mail ) ){ ?>
            <p class="e_mail"><a href="mailto:<?php echo $e_mail; ?>"><?php echo $e_mail; ?></a></p>
          <?php }?>
          
       </div>
          <!-- ///////////////////////////// -->
           <?php 
		$img_c = get_field('img_c');
		$size = '400x490'; //  
		$thumb = $img_c['sizes'][ $size ];
		
		 if( !empty( $img_c ) ){ ?>
        <figure><img src="<?php echo $thumb; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="img-responsive"></figure>
        <?php }?>
        
      </div>
      
      <!-- ...................////.................. -->
      
      <div class="col-md-8">
        <?php 
		 $text_1 = get_field('text_1');  
	     if( !empty( $text_1 ) ){
		?>
        <h3 title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> &raquo; <?php the_title(); ?>">За контакти с Милов Транс:</h3>
        <blockquote>
        	
            <!-- ////// -->
        	<p><?php echo $text_1; ?></p>
            <!-- ////// -->
             
        </blockquote>
        <?php } ?>
        <?php 
		 $dostavka_addr = get_field('dostavka_addr');  
	     if( !empty( $dostavka_addr ) ){
		   ?>
        <h3 title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> &raquo; <?php the_title(); ?>">Райони за доставка:</h3>
        <blockquote class="spacing"> <?php echo $dostavka_addr; ?> </blockquote>
        <?php } ?>
        <hr>
        <div id="form_cnt">
          <form id="contact_form" method="post" enctype="multipart/form-data" action="/assets/mail/mail_contact.php">
            <fieldset>
              <input id="required_field" type="hidden" value="<?php echo $required_field; ?>">
              <input id="error_email" type="hidden" value="<?php echo $error_email; ?>">
              <input id="error_number" type="hidden" value="<?php echo $error_number; ?>">
              <div class="form-group">
                <input type="text" name="sbgj" id="subject" class="form-control input-lg" aria-invalid="false" placeholder="<?php echo $subject; ?>">
              </div>
              <div class="form-group">
                <input type="text" id="name" name="name_c" class="form-control required input-lg" placeholder="<?php echo $form_name; ?>*">
              </div>
              <div class="form-group">
                <input type="email" id="email" name="email_c" class="form-control required input-lg" placeholder="<?php echo $form_mail; ?>*">
              </div>
              <div class="form-group">
                <input type="tel" name="tel_c" class="form-control required numbers input-lg" id="phone" placeholder="<?php echo $form_tel; ?>*">
              </div>
              <div class="form-group">
                <textarea id="message" name="message_c" rows="3" class="form-control required input-lg" placeholder="<?php echo $massage_str; ?>*"></textarea>
              </div>
              <div class="butons">
                <a id="f_send" class="btn" href="#"> <span><?php echo $send_str; ?></span> </a>
              </div>
            </fieldset>
          </form>
          <div id="success">
            <?php echo trim($success); ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="person-wrapper" style="text-align:center; margin:50px 0 !important; display:block">
            <h4 class="bolder" style="text-align:center"><strong><?php echo $adress; ?></strong></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php  endwhile; ?>
  <?php  } // end if ?>
</div>
<?php  
//
get_footer();
?>
