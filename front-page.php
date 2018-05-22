<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Sheldon
 */

get_header();

$main_image = ( !get_theme_mod( 'main_image' ) ) ? get_template_directory_uri() . '/assets/img/tshirt.jpg': get_theme_mod( 'main_image' );
?>

<section id="primary" class="container-fluid" style="background: url('<?php echo $main_image; ?>') no-repeat;background-position: center center;background-size: cover;">
	<main id="main" class="site-main">
		<span class="arrow-message">
			<span class="bold-message">Welcome to BlackOwned U.S.</span>
		</main><!-- #main -->
</section><!-- #primary -->
<section class="container-fluid content-section">
	<h1 class="section-title">FootWear</h1>
</section> <!-- .container-fluid contemt-section -->
	
<?php
get_footer();
