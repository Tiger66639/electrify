<?php

/**
 * Registers required/recommended plugins via the TGM Acitvation library.
 *
 * @return void
 * @author Ryan
 */
require dirname( __FILE__ ) . '/_lib/tgm-dependencies/class-tgm-plugin-activation.php';

function electrify_plugins()
{
	$plugins = array(
		
		// bbPress
		array(
			'name' => 'bbPress',
			'slug' => 'bbpress',
			'required' => false,
			'version' => '2.5.4',
		),
		
		// Advanced Automatic Updates
		array(
			'name' => 'Advanced Automatic Updates',
			'slug' => 'automatic-updater',
			'required' => false,
			'version' => '1.0.0',
		),
		
	);
	
	$config = array(
		
		'has_notices' => true,
		'is_automatic' => true,
		
	);
	
	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'electrify_plugins' );

/**
 * Adds the Advanced Custom Fields plugin (dependency)
 */

define( 'ACF_LITE', true );
require_once dirname( __FILE__ ) . '/_lib/advanced-custom-fields/acf.php';

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_blocks',
		'title' => 'Blocks',
		'fields' => array (
			array (
				'key' => 'field_538fe89e47b44',
				'label' => 'Display',
				'name' => 'display',
				'type' => 'radio',
				'instructions' => 'Choose the display mode for this block. "Full" makes the block occupy all of the screen\'s vertical space; "Half" makes it occupy half. "Auto" lets it occupy however much it needs. "Slider" will put the block in the slider and make it occupy the entire screen.',
				'choices' => array (
					'slider' => 'Slider',
					'whole' => 'Full',
					'half' => 'Half',
					'' => 'Auto',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_52ed8ab502e93',
				'label' => 'H1 text',
				'name' => 'h1',
				'type' => 'text',
				'instructions' => 'The main header for the slide. Set to "blog" to show the latest blog post.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52ed8ae531d9b',
				'label' => 'H1 color',
				'name' => 'h1_color',
				'type' => 'color_picker',
				'instructions' => 'Select the color that you want the primary header to appear in. Defaults to yellow.',
				'default_value' => '#ffdd00',
			),
			array (
				'key' => 'field_52ed8ac931d9a',
				'label' => 'H2 text',
				'name' => 'h2',
				'type' => 'text',
				'instructions' => 'The second header for the slide.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52ed8b2231d9c',
				'label' => 'H2 color',
				'name' => 'h2_color',
				'type' => 'color_picker',
				'instructions' => 'Select the color that the secondary header will appear in. Defaults to light gray.',
				'default_value' => '#cccccc',
			),
			array (
				'key' => 'field_52ed8b5dc31d6',
				'label' => 'Paragraph text',
				'name' => 'p',
				'type' => 'textarea',
				'instructions' => 'The paragraph content for the slide. Recommended, but not required.',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_52ed8b93c31d7',
				'label' => 'Paragraph color',
				'name' => 'p_color',
				'type' => 'color_picker',
				'instructions' => 'Select the color that you want the paragraph to appear in. Defaults to white.',
				'default_value' => '#ffffff',
			),
			array (
				'key' => 'field_530a76df9c0fa',
				'label' => 'Paragraph position',
				'name' => 'p_position',
				'type' => 'radio',
				'instructions' => 'Select where you want the paragraph content to display.',
				'choices' => array (
					'headers' => 'Header',
					'content' => 'Main Content',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_52ed8bd7c6df7',
				'label' => 'Background color',
				'name' => 'background_color',
				'type' => 'color_picker',
				'instructions' => 'Select the background color for the slide. Defaults to black. Ignored if the background photo is set.',
				'default_value' => '#000000',
			),
			array (
				'key' => 'field_52ed8bfec6df8',
				'label' => 'Background image',
				'name' => 'background_image',
				'type' => 'image',
				'instructions' => 'Upload an image to use for the background. The image will be sized to completely fill the background of the slide, clipping it if necessary. Make sure to test the image that you plan to use before you actually use it, as the header and UI may be invisible with one photo but look great on the other. Overrides the background color.',
				'save_format' => 'url',
				'preview_size' => 'large',
				'library' => 'all',
			),
			array (
				'key' => 'field_52ed8cc93c533',
				'label' => 'Scheme',
				'name' => 'scheme',
				'type' => 'radio',
				'instructions' => 'Based on the other colors, determine if your color scheme is light or dark. This will determine how the header and slider UI will be displayed.',
				'required' => 1,
				'choices' => array (
					'light' => 'Light',
					'dark' => 'Dark',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_52ed92c3c6636',
				'label' => 'Content: Image',
				'name' => 'image',
				'type' => 'image',
				'instructions' => 'Select an image to feature as the slide content. Ignored if an embed is specified.',
				'save_format' => 'url',
				'preview_size' => 'large',
				'library' => 'all',
			),
			array (
				'key' => 'field_52ed9309c6637',
				'label' => 'Content: Embed',
				'name' => 'embed',
				'type' => 'text',
				'instructions' => 'Paste an embed code from an external site. Overrides the featured image. If you use this, it\'s recommended that you also fill out the Embed Mobile fields.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52ed9386c6638',
				'label' => 'Content: Embed - mobile (text)',
				'name' => 'embed_mobile',
				'type' => 'text',
				'instructions' => 'This button will be displayed on mobile screens as a replacement for the embed. Add the text that you\'d like to display for the button into this field.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52ed93edc6639',
				'label' => 'Content: Embed - mobile (URL)',
				'name' => 'embed_mobile_link',
				'type' => 'text',
				'instructions' => 'Add the link/URL for the mobile embed button.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52ed943db428d',
				'label' => 'Content: Button',
				'name' => 'button',
				'type' => 'text',
				'instructions' => 'Enter the text for a button to display at the bottom of the slide. If you decide on this option, remember to add a link/URL to the object you want to display with the next option.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52ed945bb428e',
				'label' => 'Content: Button (URL)',
				'name' => 'button_link',
				'type' => 'text',
				'instructions' => 'Enter the target URL for the button.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_530a77159c0fb',
				'label' => 'Fade In',
				'name' => 'fade_in',
				'type' => 'true_false',
				'instructions' => 'Do you want the block to fade in? Only effective for blocks that are first in position.',
				'message' => 'Fade In',
				'default_value' => 0,
			),
			array (
				'key' => 'field_52ed94a3b428f',
				'label' => 'Code',
				'name' => 'code',
				'type' => 'text',
				'instructions' => 'Hand-code a slide and paste it in this field for a completely customized slide.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slide',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'showcase_block',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'format',
				9 => 'featured_image',
				10 => 'tags',
				11 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_showcase-blocks',
		'title' => 'Showcase Blocks',
		'fields' => array (
			array (
				'key' => 'field_539213b0ef441',
				'label' => 'Page',
				'name' => 'page',
				'type' => 'text',
				'instructions' => 'The slug of the showcase page you want this block to appear on.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'showcase_block',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_showcase-pages',
		'title' => 'Showcase Pages',
		'fields' => array (
			array (
				'key' => 'field_539212b7cbf11',
				'label' => 'Slug',
				'name' => 'showcase_slug',
				'type' => 'text',
				'instructions' => 'Used to determine the showcase blocks to pull in.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_539212e0cbf12',
				'label' => 'Menu',
				'name' => 'menu',
				'type' => 'text',
				'instructions' => 'The navigation menu you want to use for this showcase. Pass in an ID first, a slug second, and a name third.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'showcase.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

/**
 * Registers navigation menus.
 *
 * @return void
 * @author Ryan
 **/
function electrify_nav_menus() {

	$menus = array(
		'nav_primary' => __( 'Primary Navigation' ),
		'nav_mobile' => __( 'Mobile Navigation' ),
	);

	register_nav_menus( $menus );

}

add_action( 'init', 'electrify_nav_menus' );


/**
 * Registers sidebars
 *
 * @return void
 * @author Ryan
 **/
function electrify_register_sidebar( $name, $id, $description ) {
	$args = array(
		'name'			=> __( $name ),
		'id'            => $id,
		'description'   => $description,
		'before_widget' => '<section class="widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	);

	register_sidebar( $args );
}

function electrify_create_sidebars() {

	electrify_register_sidebar( 'Footer - left column', 'footer_left', 'Displays in the footer, in the left column.' );
	electrify_register_sidebar( 'Footer - center column', 'footer_center', 'Displays in the footer, in the center column.' );
	electrify_register_sidebar( 'Footer - right column', 'footer_right', 'Displays in the footer, in the right column.' );
	
	electrify_register_sidebar( 'Showcase Footer - left column', 'footer_showcase_left', 'Displays in the showcase footer only, in the left column.' );
	electrify_register_sidebar( 'Showcase Footer - center column', 'footer_showcase_center', 'Displays in the showcase footer only, in the center column.' );
	electrify_register_sidebar( 'Showcase Footer - right column', 'footer_showcase_right', 'Displays in the showcase footer only, in the right column.' );
	
	electrify_register_sidebar( 'Sidebar', 'sidebar', 'Displays in the sidebar on every page that has a sidebar.' );
	
}

add_action( 'widgets_init', 'electrify_create_sidebars' );

/**
 * Registers and enqueues theme dependencies.
 *
 * @return void
 * @author Ryan
 **/
function electrify_lib()
{
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/_lib/reset.css' );
	wp_enqueue_style( 'font', 'http://fonts.googleapis.com/css?family=Raleway:200' );
	
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/_lib/modernizr-2.8.2.min.js', array(), '', false );
	
	wp_register_script( 'gsap', '//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js', array(), '', true );
	wp_register_script( 'slidesjs', get_template_directory_uri() . '/_lib/jquery.slidesjs.min.js', array( 'jquery', 'gsap' ), '', true );
	wp_register_script( 'jquery_gsap', get_template_directory_uri() . '/_lib/jquery.gsap.min.js', array( 'jquery', 'gsap' ), '', true );
	if ( is_front_page() || is_page_template( 'showcase.php' ) )
	{
		wp_enqueue_script( 'slidesjs' );
		wp_enqueue_script( 'gsap' );
	}
	
}

/**
 * Registers and enqueues theme styling.
 *
 * @return void
 * @author Ryan
 **/
function electrify_css()
{
	wp_enqueue_style( 'master', get_template_directory_uri() . '/_scss/style.css' );
	
	wp_register_style( 'listing', get_template_directory_uri() . '/_scss/components/listing.css' );
	if ( is_home() || is_archive() || is_search() )
	{
		wp_enqueue_style( 'listing' );
	}
	
	wp_register_style( 'singular', get_template_directory_uri() . '/_scss/components/singular.css' );
	if ( ( is_singular() && ! is_page_template( 'showcase.php' ) ) || is_404() )
	{
		wp_enqueue_style( 'singular' );
	}
	
	wp_register_style( 'single', get_template_directory_uri() . '/_scss/components/single.css' );
	if ( is_single() )
	{
		wp_enqueue_style( 'single' );
	}
	
	wp_register_style( 'blocks', get_template_directory_uri() . '/_scss/components/blocks.css' );
	if ( is_front_page() || is_page_template( 'showcase.php' ) )
	{
		wp_enqueue_style( 'blocks' );
	}
	
	wp_register_style( 'showcase', get_template_directory_uri() . '/_scss/components/showcase.css' );
	if ( is_page_template( 'showcase.php' ) )
	{
		wp_enqueue_style( 'showcase' );
	}
}

/**
 * Registers and enqueues theme scripts.
 *
 * @return void
 * @author Ryan
 **/
function electrify_js()
{
	
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/_coffee/nav.js', array( 'jquery' ), '', true );
	
	wp_register_script( 'slider', get_template_directory_uri() . '/_coffee/slider.js', array( 'jquery', 'gsap', 'jquery_gsap', 'modernizr', 'slidesjs' ), '', true );
	if ( is_front_page() || is_page_template( 'showcase.php' ) )
	{
		wp_enqueue_script( 'slider' );
	}
	
	wp_register_script( 'comments_reveal', get_template_directory_uri() . '/_coffee/comments-reveal.js', array( 'jquery' ), '', true );
	if ( is_single() )
	{
		wp_enqueue_script( 'comments_reveal' );
	}
	
}

add_action( 'wp_enqueue_scripts', 'electrify_lib' );
add_action( 'wp_enqueue_scripts', 'electrify_css' );
add_action( 'wp_enqueue_scripts', 'electrify_js' );


/**
 * Lengthens the excerpt.
 *
 * @return void
 * @author Ryan
 **/
function excerpt_lengthen() {
	return 100;
}
add_action( 'excerpt_length', 'excerpt_lengthen' );

