<?php
/**
 * The template for displaying 404 pages (Not Found).
 * @package Multipurpose Photography
 */
get_header(); ?>

<div class="container">
	<main id="maincontent" role="main" class="notfound">
		<?php if(get_theme_mod('multipurpose_photography_404_title','404 Not Found')){ ?>
			<h1><?php echo esc_html( get_theme_mod('multipurpose_photography_404_title',__('404 Not Found', 'multipurpose-photography' )) ); ?></h1>
		<?php }?>
		<?php if(get_theme_mod('multipurpose_photography_404_button_label','404 Not Found')){ ?>
			<div class="read-moresec">
        		<a href="<?php echo esc_url( home_url() ); ?>" class="button"><?php echo esc_html( get_theme_mod('multipurpose_photography_404_button_label',__('Return to the home page', 'multipurpose-photography' )) ); ?><span class="screen-reader-text"><?php esc_html_e('Return to the home page','multipurpose-photography'); ?></span></a>
			</div>
		<?php }?>
	</main>
	<div class="clearfix"></div>
</div>
	
<?php get_footer(); ?>