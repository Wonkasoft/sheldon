<?php
/**
 * Sheldon Theme Customizer
 *
 * @package Sheldon
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sheldon_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'sheldon_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'sheldon_customize_partial_blogdescription',
		) );
	}
	/**
	 * Theme options
	 * @since  1.0.0 [Theme options for the homepage ]
	 */
	$wp_customize->add_panel( 'ft_theme_options', array(
		'priority'			=> 1,
		'capability'		=> 'edit_theme_options',
		'theme_support'		=> '',
		'title'				=> __( 'Theme Options', 'sheldon' ),
		'description' 		=> __( 'Theme Settings', 'sheldon' )
		) );
	/**
	 * Putting in the main image
	 * @since  1.0.0 [Adding in main image]
	 */
	$wp_customize->add_section( 'main_section', array(
		'capability'		=> 'edit_theme_options',
		'theme_support'	=> '',
		'priority'			=> 11,
		'title'				=> __( 'Main Section', 'sheldon' ),
		'description'		=> __( 'Main Section Options', 'sheldon' ),
		'panel'				=> 'ft_theme_options'
	) ); 
	/**
	 * Heading image setting
	 * @since  1.0.0 [Main Image Setting]
	 */
	$wp_customize->add_setting( 'main_image', array(
		'default'	=> '',
		'transport'	=> 'refresh',
	) );
	/**
	 * Controller
	 * @since  1.0.0 [add control]
	 */
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'main_image',
		array(
			'label'			=> __( 'Main Image'. 'sheldon' ),
			'section'		=> 'main_section',
			'setting'		=> 'image',
			'description'	=> __( 'Chose Main Image', 'sheldon' )
		)
		) );
	/**
	 * Footer Section
	 * @since  1.0.0 [adding footer section]
	 */
	$wp_customize->add_section( 'footer_section', array(
		'capability'		=> 'edit_theme_options',
		'theme_support'		=> '',
		'priority'			=> 15,
		'title'				=> __( ' Footer Section', 'sheldon' ),
		'description'		=> __( 'Footer Section Options', 'sheldon' ),
		'panel'				=> 'ft_theme_options'
	) );
	/**
	 * Footer Logo settings
	 * @since 1.0.0 [footer logo settings]
	 */
	$wp_customize->add_setting( 'footer_logo', array(
		'default'		=> '',
		'transport'		=> 'refresh'
	) );
	/**
	 * Footer Logo Controller
	 * @since  1.0.0 [Controller for footer logo]
	 */
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'footer_logo',
		array(
			'label'			=>__( 'Footer Logo', 'sheldon' ),
			'section'		=> 'footer_section',
			'setting'		=> 'footer_logo',
			'type'			=>	'image',
			'description'	=> __( 'Select a Logo recommended size 300px x 150px', 'sheldon' )
		)
	) );
	/**
	 * Footer copyright settings
	 * @since  1.0.0 [copyright settings]
	 */
	$wp_customize->add_setting( 'copyright', array(
		'default'	=> '',
		'transport'	=> 'refresh'
	) );
	/**
	 * Footer design credits controller
	 * @since 1.0.0 [design credits]
	 */
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'design_credits',
		array(
			'label'			=> __( 'Design credit', 'sheldon' ),
			'section'		=> 'footer_section',
			'setting'		=> 'design_credits',
			'type'			=> 'text',
			'description'	=> __( 'Input design credits text', 'sheldon')
		)
	) );
	/**
	 *Social Section
	 *@since  1.0.0 [adding social settings]
	 */
	$wp_customize->add_section( 'social_section', array(
		'capability'			=> 'edit_theme_options',
		'theme_support'			=> '',
		'priority'				=> 16,
		'title'					=> __( 'Social Section', 'sheldon' ),
		'description'			=> __( 'Input Social links', 'sheldon' ),
		'panel'					=> 'ft_theme_options'
	) );
	/**
	 * Social Settings 
	 * @since 1.0.0 [social settings]
	 */
	$wp_customize->add_setting( 'snapchat', array(
		'default'		=> '',
		'transport'		=> 'refresh'
	) );
	/**
	 * Social control
	 * @since  1.0.0 [control for social links]
	 */
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'snapchat',
		array(
			'label'			=> __( 'Snapchat', 'sheldon' ),
			'section'		=> 'social_section',
			'setting'		=> 'snapchat',
			'type'			=> 'text',
			'description'	=>__( 'Input Snapchat Link', 'sheldon')
		)
	) );
	$wp_customize->add_setting( 'instagram', array(
		'default'		=>'',
		'transport'		=> 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'instagram',
		array(
			'label'				=> __( 'Instagram', 'sheldon' ),
			'section'			=> 'social_section',
			'setting'			=> 'instagram',
			'type'				=> 'text',
			'description'		=>	__( 'Input Instagram Link', 'sheldon' )
		)
	) );
	$wp_customize->add_setting( 'facebook', array(
		'default'		=>'',
		'transport'		=> 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'facebook',
		array(
			'label'				=>__( 'Facebook', 'sheldon' ),
			'section'			=> 'social_section',
			'setting'			=> 'facebook',
			'type'				=>	'text',
			'description'		=> __( 'Input Facebook Link', 'sheldon' )
		)
	) );
	$wp_customize->add_setting( 'twitter', array(
		'default'			=> '',
		'transport'			=> 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'twitter',
		array(
			'label'				=>__( 'Twitter', 'sheldon' ),
			'section'			=> 'social_section',
			'setting'			=> 'twitter',
			'type'				=> 'text',
			'description'		=> __( 'Input Twitter Link', 'sheldon')
		)
	) );
	$wp_customize->add_setting( 'yelp', array(
		'default'			=> '',
		'transport'			=>	'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yelp',
		array(
			'label'				=> __( 'Yelp', 'sheldon' ),
			'section'			=> 'social_section',
			'setting'			=>	'yelp',
			'type'				=>	'text',
			'description'		=> __( 'Input Yelp Link', 'sheldon' )
		)
	) );
}
add_action( 'customize_register', 'sheldon_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function sheldon_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function sheldon_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sheldon_customize_preview_js() {
	wp_enqueue_script( 'sheldon-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'sheldon_customize_preview_js' );
