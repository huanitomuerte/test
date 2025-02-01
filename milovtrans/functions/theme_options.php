<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'sample_options', 'sample_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options' ), __( 'Theme Options' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Zero' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'One' )
	),
	'2' => array(
		'value' => '2',
		'label' => __( 'Two' )
	),
	'3' => array(
		'value' => '3',
		'label' => __( 'Three' )
	),
	'4' => array(
		'value' => '4',
		'label' => __( 'Four' )
	),
	'5' => array(
		'value' => '3',
		'label' => __( 'Five' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No' )
	),
	'maybe' => array(
		'value' => 'maybe',
		'label' => __( 'Maybe' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'sample_options' ); ?>
			<?php $options = get_option( 'sample_theme_options' ); ?>

			<table class="form-table">
 

				<?php
				/**
				 * A sample text input option
				 */
				?>
                <tr valign="top"><th scope="row"><?php _e( 'Текст над Телефона BG', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext_BG_text]" class="regular-text" type="text" name="sample_theme_options[sometext_BG_text]" value="<?php esc_attr_e( $options['sometext_BG_text'] ); ?>" />
						 
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Телефон BG', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext_BG]" class="regular-text" type="text" name="sample_theme_options[sometext_BG]" value="<?php esc_attr_e( $options['sometext_BG'] ); ?>" />
						 
					</td>
				</tr>
                  
                <tr valign="top"><th scope="row"><?php _e( 'Текст над Телефона EN', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext_EN_text]" class="regular-text" type="text" name="sample_theme_options[sometext_EN_text]" value="<?php esc_attr_e( $options['sometext_EN_text'] ); ?>" />
						 
					</td>
				</tr>
                
                <tr valign="top"><th scope="row"><?php _e( 'Телефон EN', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext_EN]" class="regular-text" type="text" name="sample_theme_options[sometext_EN]" value="<?php esc_attr_e( $options['sometext_EN'] ); ?>" />
						 
					</td>
				</tr>
                
                <tr > 
					<td colspan="2">
                    <hr> 
					</td>
				</tr>
                
                <tr valign="top"><th scope="row"><?php _e( 'Текст Резервация БГ', 'sampletheme' ); ?></th>
					<td>
<input id="sample_theme_options[text_res_bg_1]" class="regular-text" type="text" name="sample_theme_options[text_res_bg_1]" value="<?php esc_attr_e( $options['text_res_bg_1'] ); ?>" /> &nbsp; <input style="width:100px;" id="sample_theme_options[text_res_click]" class="regular-text" type="text" name="sample_theme_options[text_res_click]" value="<?php esc_attr_e( $options['text_res_click'] ); ?>" /> &nbsp; <input id="sample_theme_options[text_res_bg_2]" class="regular-text" type="text" name="sample_theme_options[text_res_bg_2]" value="<?php esc_attr_e( $options['text_res_bg_2'] ); ?>" />
						 
					</td>
				</tr>
                
                <tr valign="top"><th scope="row"><?php _e( 'Text Reservation EN', 'sampletheme' ); ?></th>
					<td>
<input id="sample_theme_options[text_res_en_1]" class="regular-text" type="text" name="sample_theme_options[text_res_en_1]" value="<?php esc_attr_e( $options['text_res_en_1'] ); ?>" /> &nbsp; <input style="width:100px;" id="sample_theme_options[text_res_click_en]" class="regular-text" type="text" name="sample_theme_options[text_res_click_en]" value="<?php esc_attr_e( $options['text_res_click_en'] ); ?>" /> &nbsp; <input id="sample_theme_options[text_res_en_2]" class="regular-text" type="text" name="sample_theme_options[text_res_en_2]" value="<?php esc_attr_e( $options['text_res_en_2'] ); ?>" />
						 
					</td>
				</tr>
                  
                <tr > 
					<td colspan="2">
                    <hr> 
					</td>
				</tr>
                
                <tr valign="top"><th scope="row"><?php _e( 'Текст - Слайдшоу БГ', 'sampletheme' ); ?></th>
					<td> 
<textarea id="sample_theme_options[text_s_bg]" name="sample_theme_options[text_s_bg]" rows="1" cols="40" style="width:100%; height:50px;"><?php  esc_attr_e( $options['text_s_bg'] ); ?></textarea>
						 
						 
					</td>
				</tr>
                
                <tr valign="top"><th scope="row"><?php _e( 'Text - Slideshow EN', 'sampletheme' ); ?></th>
					<td>
<textarea id="sample_theme_options[text_s_en]" name="sample_theme_options[text_s_en]" rows="1" cols="40" style="width:100%; height:50px;"><?php  esc_attr_e( $options['text_s_en'] ); ?></textarea>
  
					</td>
				</tr>
 
 
				 
			</table>
            

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options' ); ?>" />
			</p>
		</form>
	</div>
<?php  
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}?>