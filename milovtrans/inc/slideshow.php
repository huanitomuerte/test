<?php 

$text_row_1 = get_field('text_row_1', get_the_ID() );
$text_row_2 = get_field('text_row_2', get_the_ID() );
$duty_phone = get_field('tel_1', 11 ); // ID KONTAKTI - 11

?><div class="container size_img_H"> 
    <h2 class="letter_spacing">
      <?php 
 		if( !empty( $text_row_1 ) ){
			echo '<span class="s_line_3">' . $text_row_1 . '</span>';
		}
		if( !empty( $text_row_2 ) ){
			echo '<span class="s_line_3">' . $text_row_2 . '</span>';
		}
		if( !empty( $duty_phone ) ){
			echo '<span class="s_line_1"><a href="tel:' . $duty_phone . '" title="' . $duty_phone . '">' . $duty_phone . '</a></span>';
		}
    ?>  
    </h2>
</div>
<div id="img_cnt" class="size_img_H owl-carousel owl-theme carousel">

<?php 
$img_1 = get_field('img_1', get_the_ID() ); 
if( !empty( $img_1 ) ){
?>
<?php 
 
for( $i = 1; $i <= 4; $i++ ){
	
	//
	$img = get_field('img_' . $i, get_the_ID() );
	$tmb = $img['sizes'][ 'slideshow_top' ];
	//
	if( empty($img) ){
		break; 
	}
	else{
		echo '<figure class="size_img_H item" style="background-image: url(' . $tmb . ')"></figure>';
	}
	//
	
?>
  
<?php }

}else{
	echo '<figure class="size_img_H item" style="background-image: url(/assets/img/no_slsh.jpg)"></figure>';
}
 ?>   
</div>
