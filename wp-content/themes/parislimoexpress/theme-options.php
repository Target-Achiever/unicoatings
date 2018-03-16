<?php
/**
	Theme Name: Paris Limo Express Theme
*/
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'ple_theme_options', 'ple_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'pletheme' ), __( 'Theme Options', 'pletheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}
/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Options', 'pletheme' ) . "</h2>"; ?>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
			<div class="updated fade"><p><strong><?php _e( 'Options saved', 'pletheme' ); ?></strong></p></div>
		<?php endif; ?>
		<form method="post" action="options.php">
			<?php settings_fields( 'ple_theme_options' ); ?>
			<?php $options = get_option( 'ple_theme_options' ); ?>
			<table class="form-table">
				<?php
				/**
				 * Top Menu Link Options
				 */
				?>	
				<tr valign="top"><th scope="row"><?php _e( 'Dribbble Login URL', 'pletheme' ); ?></th>
					<td>
						<input id="ple_theme_options[ple_dribbble]" class="regular-text" type="text" name="ple_theme_options[ple_dribbble]" value="<?php esc_attr_e( $options['ple_dribbble'] ); ?>" />
						<label class="description" for="ple_theme_options[ple_dribbble]"><?php _e( 'This will create link for Dribbble social media button', 'pletheme' ); ?></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Twitter Login URL', 'pletheme' ); ?></th>
					<td>
						<input id="ple_theme_options[ple_twitter]" class="regular-text" type="text" name="ple_theme_options[ple_twitter]" value="<?php esc_attr_e( $options['ple_twitter'] ); ?>" />
						<label class="description" for="ple_theme_options[ple_twitter]"><?php _e( 'This will create link for Twitter social media button', 'pletheme' ); ?></label>
					</td>
				</tr>
                <tr valign="top"><th scope="row"><?php _e( 'Email Login URL', 'pletheme' ); ?></th>
					<td>
						<input id="ple_theme_options[ple_email]" class="regular-text" type="text" name="ple_theme_options[ple_email]" value="<?php esc_attr_e( $options['ple_email'] ); ?>" />
						<label class="description" for="ple_theme_options[ple_email]"><?php _e( 'This will create link for Email button', 'pletheme' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Phone Number', 'pletheme' ); ?></th>
					<td>
						<input id="ple_theme_options[ple_phonenumber]" class="regular-text" type="text" name="ple_theme_options[ple_phonenumber]" value="<?php esc_attr_e( $options['ple_phonenumber'] ); ?>" />
						<label class="description" for="ple_theme_options[ple_phonenumber]"><?php _e( 'Displays on bottom of the page', 'pletheme' ); ?></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Gmail', 'pletheme' ); ?></th>
					<td>
						<input id="ple_theme_options[ple_gmail]" class="regular-text" type="text" name="ple_theme_options[ple_gmail]" value="<?php esc_attr_e( $options['ple_gmail'] ); ?>" />
						<label class="description" for="ple_theme_options[ple_gmail]"><?php _e( 'Displays on bottom of the page', 'pletheme' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row"><?php _e( 'Address', 'pletheme' ); ?></th>
					<td>
						<input id="ple_address" class="regular-text" type="text" name="ple_theme_options[ple_address]" value="<?php esc_attr_e( $options['ple_address'] ); ?>" />
						<label class="description" for="ple_theme_options[ple_address]"><?php _e( 'isplays on bottom of the page', 'pletheme' ); ?></label>
					</td>
				</tr>
			</table>			
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'pletheme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	// Say our text option must be safe text with no HTML tags
	$input['ple_dribbble'] 			= wp_filter_nohtml_kses( $input['ple_dribbble'] );
	$input['ple_twitter'] 			= wp_filter_nohtml_kses( $input['ple_twitter'] );
	$input['ple_email'] 			= wp_filter_nohtml_kses( $input['ple_email'] );
	$input['ple_phonenumber'] 		= wp_filter_nohtml_kses( $input['ple_phonenumber'] );
	$input['ple_gmail'] 			= wp_filter_nohtml_kses( $input['ple_gmail'] );
	$input['ple_address'] 	= wp_filter_nohtml_kses( $input['ple_address'] );
	return $input;
}