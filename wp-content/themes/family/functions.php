<?php
/**
 * Family functions and definitions
 *
 * @package Family
 */

function family_setup() {

	remove_action( 'omega_before_header', 'omega_get_primary_menu' );	
	add_action( 'omega_after_header', 'omega_get_primary_menu' );

	/* Add support for a custom header image. */
	add_theme_support(
		'custom-header',
		array( 'header-text' => false,
			// Set height and width, with a maximum value for the width.
			'height'                 => 380,
			'width'                  => 980,
			'max-width'              => 1000,

			// Support flexible height and width.
			'flex-height'            => true,
			'flex-width'             => true,
			'uploads'       => true,
			'default-image' => get_stylesheet_directory_uri() . '/images/header.jpg' ,
			'admin-head-callback'    => 'family_admin_header_style',
			'admin-preview-callback' => 'family_admin_header_image'
			));



	add_theme_support( 'color-palette', array( 'callback' => 'family_register_colors' ) );

	add_filter( 'loop_pagination_args', 'family_loop_pagination_args' );

	remove_action( 'omega_home_before_entry', 'omega_entry_header' );

	add_action( 'omega_after_header', 'family_banner' );

	add_action('init', 'family_init', 1);

	add_action('custom_header_options', 'family_header_image_option');
	add_action('admin_head', 'family_header_image_option_save');

	add_theme_support( 'omega-footer-widgets', 3 );

}

add_action( 'after_setup_theme', 'family_setup', 11  );

function family_loop_pagination_args( $args ) {
	/* Set up some default arguments for the paginate_links() function. */
	$args = array(
		'end_size'     => 5,
		'mid_size'     => 4
	);
	return $args;
}

function family_get_header_image() {
	if (get_header_image()) {
		if (get_theme_mod( 'family_header_link' )) {
			echo '<a href="'.get_theme_mod( 'family_header_link' ).'"><img class="header-image" src="' . esc_url( get_header_image() ) . '" alt="' . get_bloginfo( 'description' ) . '" /></a>';
		} else {
			echo '<img class="header-image" src="' . esc_url( get_header_image() ) . '" alt="' . get_bloginfo( 'description' ) . '" />';
		}
	}
}

function family_banner() {
	
?>
	<div class="banner">
		<div class="wrap">
			<?php
			if(is_front_page()) {
				family_get_header_image();
			} elseif ( !is_front_page() && get_theme_mod( 'family_header_home' ) ) {
					echo '';
			} else {	
				// get title		
				$id = get_option('page_for_posts');

				if (( 'posts' == get_option( 'show_on_front' )) && (is_day() || is_month() || is_year() || is_tag() || is_category() || is_singular('post' ) || is_home())) {
						family_get_header_image();
				} elseif(is_home() || is_singular('post' ) ) {
					if ( has_post_thumbnail($id) ) {
						echo get_the_post_thumbnail( $id, 'full' );
					} else {
						family_get_header_image();
					}
				} elseif ( has_post_thumbnail() && is_singular('page' ) ) {	
						the_post_thumbnail();
				} else {
					family_get_header_image();
				}
			}
			?>
		</div><!-- .wrap -->
  	</div><!-- .banner -->
<?php  	
}

/**
 * Registers colors for the Color Palette extension.
 *
 * @since  0.1.0
 * @access public
 * @param  object  $color_palette
 * @return void
 */

function family_register_colors( $color_palette ) {

	/* Add custom colors. */
	$color_palette->add_color(
		array( 'id' => 'primary', 'label' => __( 'Primary Color', 'family' ), 'default' => '232323' )
	);
	$color_palette->add_color(
		array( 'id' => 'link', 'label' => __( 'Link Color', 'family' ), 'default' => '858585' )
	);

	/* Add rule sets for colors. */

	$color_palette->add_rule_set(
		'primary',
		array(
			'color'               => 'h1.site-title a, .site-description, .entry-meta',
			'background-color'    => '.tinynav, input[type="button"], input[type="reset"], input[type="submit"]'
		)
	);
	$color_palette->add_rule_set(
		'link',
		array(
			'color'    => '.site-inner .entry-meta a, .site-inner .entry-content a, .site-inner .sidebar a'
		)
	);
}

function family_init() {
	if(!is_admin()){
		wp_enqueue_script("tinynav", get_stylesheet_directory_uri() . '/js/tinynav.js', array('jquery'));
	} 
}

function family_header_image_option() {
?>
<table class="form-table">
	<tbody>
		<tr valign="top">
			<th scope="row"><?php _e( 'Header Image Link' ); ?></th>
			<td>
				<p>
					<input type="input" class="regular-text code" name="family_header_link" id="family_header_link" value="<?php echo get_theme_mod( 'family_header_link' ); ?>" />
				</p>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e( 'Show image on front page only:' ); ?></th>
			<td>
				<p>
					<input type="checkbox" name="family_header_home" id="family_header_home" value="1" <?php checked( get_theme_mod( 'family_header_home', false ) ); ?> />
				</p>
			</td>
		</tr>
	</tbody>
</table>
<input type="hidden" name="custom_header_option" value="1" />
<?php
}

function family_header_image_option_save() {
	if ( isset( $_POST['custom_header_option'] ) ) {
		// validate the request itself by verifying the _wpnonce-custom-header-options nonce
		// (note: this nonce was present in the normal Custom Header form already, so we didn't have to add our own)
		check_admin_referer( 'custom-header-options', '_wpnonce-custom-header-options' );

		// be sure the user has permission to save theme options (i.e., is an administrator)
		if ( current_user_can('manage_options') ) {
			// NOTE: Add your own validation methods here
			set_theme_mod( 'family_header_link', esc_url($_POST['family_header_link']) );
			if ( isset($_POST['family_header_home'])) {
				set_theme_mod( 'family_header_home', $_POST['family_header_home'] );
			} else {
				set_theme_mod( 'family_header_home', 0 );
			}
			
		}
	}
	return;
}

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see family_custom_header_setup().
 */
function family_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
	</style>
<?php
}

/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see family_custom_header_setup().
 */
function family_admin_header_image() {
	$header_image = get_header_image();
?>
	<div id="headimg">
		<?php if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php
}

?>