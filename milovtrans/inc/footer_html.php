<?php 
//
$kontakti_ID = 11;
//
$adress = get_field( 'adress', $kontakti_ID );
$iban_1 = get_field( 'iban_1', $kontakti_ID );

$tel_1 = get_field( 'tel_1', $kontakti_ID );
$tel_2 = get_field( 'tel_2', $kontakti_ID );
$e_maill = get_field( 'e-mail', $kontakti_ID );
 
?><footer id="footer">
  <div class="container">
    <div class="row">
      <?php if( !empty( $adress ) ){ ?>
      <div class="col-md-4">
       <?php echo $adress; ?>
      </div>
      <?php } ?>
      <div class="col-md-4">
      <?php if( !empty( $tel_1 ) ){ ?>
        <span class="fcol"> <span class="a"> Телефон </span> <span class="b"><?php echo $tel_1; ?></span></span><br>
      <?php } ?>
      <?php if( !empty( $e_maill ) ){ ?>
        <span class="fcol"><span class="a">Email</span> <a href="mailto:<?php echo $e_maill; ?>"><span class="b"><?php echo $e_maill; ?></span></a></span>
      <?php } ?>  
      </div>
      <div class="col-md-4 sitebar_advans">
      <?php if( !empty( $tel_2 ) ){ ?>
       <span class="fcol"> <span class="a"> Телефон </span> <span class="b"><?php echo $tel_2; ?></span></span><br>
        <?php } ?>
      <?php if( !empty( $iban_1 ) ){ ?>
        IBAN <?php echo $iban_1; ?>
        <?php } ?>
      </div>
    </div>
  </div>
  <div id="footer-bottom">
    <div class="site-info">
      &copy; <a href="http://huanito.vivacatering.bg/" target="_blank">huanitomuerte</a>
    </div>
  </div>
</footer>
