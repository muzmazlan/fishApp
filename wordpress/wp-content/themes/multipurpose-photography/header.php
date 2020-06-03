<?php
/**
 * The Header for our theme.
 * @package Multipurpose Photography
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'multipurpose-photography' ) ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	
	<?php if(get_theme_mod('multipurpose_photography_preloader',true)){ ?>
	    <div id="overlayer"></div>
	    <span class="tg-loader">
	    	<span class="tg-loader-inner"></span>
	    </span>
	<?php }?>
	<header role="banner">
		<a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'multipurpose-photography' ); ?><span class="screen-reader-text"><?php esc_html_e('Skip to content','multipurpose-photography'); ?></span></a>
		<div class="top-bar">
		  	<div class="container">
			    <div class="row">
			      	<div class="col-lg-4 col-md-4">
				        <div class="call">
				          	<?php if ( get_theme_mod('multipurpose_photography_call','') != "" ) {?>
				            	<span><i class="fas fa-phone-volume"></i><?php echo esc_html(get_theme_mod('multipurpose_photography_call','')); ?></span>
				          	<?php }?>
				        </div>
			      	</div>
			      	<div class="col-lg-4 col-md-4">
				        <div class="logo">
				          	<?php if ( has_custom_logo() ) : ?>
				              <div class="site-logo"><?php the_custom_logo(); ?></div>
				            <?php else: ?>
				              <?php $blog_info = get_bloginfo( 'name' ); ?>
				              <?php if ( ! empty( $blog_info ) ) : ?>
				                <?php if ( is_front_page() && is_home() ) : ?>
				                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				                <?php else : ?>
				                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				                <?php endif; ?>
				              <?php endif; ?>
				              <?php
				              $description = get_bloginfo( 'description', 'display' );
				              if ( $description || is_customize_preview() ) :
				                ?>
				                <p class="site-description">
				                  <?php echo esc_html($description); ?>
				                </p>
				              <?php endif; ?>
				            <?php endif; ?>
				        </div>
			      	</div>
			      	<div class="col-lg-4 col-md-4">
				        <div class="social-icon">
				          	<?php if( get_theme_mod( 'multipurpose_photography_facebook_url') != '') { ?>
				            	<a href="<?php echo esc_url( get_theme_mod( 'multipurpose_photography_facebook_url','' ) ); ?>"><i class="flaticon-facebook" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e('Facebook','multipurpose-photography'); ?></span></a>
				          	<?php } ?>
				          	<?php if( get_theme_mod( 'multipurpose_photography_twitter_url') != '') { ?>
				            	<a href="<?php echo esc_url( get_theme_mod( 'multipurpose_photography_twitter_url','' ) ); ?>"><i class="flaticon-twitter"></i><span class="screen-reader-text"><?php esc_html_e('Twitter','multipurpose-photography'); ?></span></a>
				          	<?php } ?>
				          	<?php if( get_theme_mod( 'multipurpose_photography_insta_url') != '') { ?>
				            	<a href="<?php echo esc_url( get_theme_mod( 'multipurpose_photography_insta_url','' ) ); ?>"><i class="flaticon-instagram"></i><span class="screen-reader-text"><?php esc_html_e('Instagram','multipurpose-photography'); ?></span></a>
				          	<?php } ?>
				          	<?php if( get_theme_mod( 'multipurpose_photography_youtube_url') != '') { ?>
				            	<a href="<?php echo esc_url( get_theme_mod( 'multipurpose_photography_youtube_url','' ) ); ?>"><i class="fab flaticon-follow"></i><span class="screen-reader-text"><?php esc_html_e('Youtube','multipurpose-photography'); ?></span></a>
				          	<?php } ?>
				          	<?php if( get_theme_mod( 'multipurpose_photography_linkedin_url') != '') { ?>
				            	<a href="<?php echo esc_url( get_theme_mod( 'multipurpose_photography_linkedin_url','' ) ); ?>"><i class="flaticon-linkedin"></i><span class="screen-reader-text"><?php esc_html_e('Linkedin','multipurpose-photography'); ?></span></a>
				         	<?php } ?> 
				          	<?php if( get_theme_mod( 'multipurpose_photography_pinterest_url') != '') { ?>
				            	<a href="<?php echo esc_url( get_theme_mod( 'multipurpose_photography_pinterest_url','' ) ); ?>"><i class="flaticon-pinterest"></i><span class="screen-reader-text"><?php esc_html_e('Pinterest','multipurpose-photography'); ?></span></a>
				          	<?php } ?> 
				          	<?php if( get_theme_mod( 'multipurpose_photography_tumblr_url') != '') { ?>
				            	<a href="<?php echo esc_url( get_theme_mod( 'multipurpose_photography_tumblr_url','' ) ); ?>"><i class="flaticon-tumblr"></i><span class="screen-reader-text"><?php esc_html_e('Tumblr','multipurpose-photography'); ?></span></a>
				         	<?php } ?> 
				          	<?php if( get_theme_mod( 'multipurpose_photography_google_url') != '') { ?>
				            	<a href="<?php echo esc_url( get_theme_mod( 'multipurpose_photography_google_url','' ) ); ?>"><i class="flaticon-follow-1"></i><span class="screen-reader-text"><?php esc_html_e('Google','multipurpose-photography'); ?></span></a>
				          	<?php } ?> 
				          	<?php if( get_theme_mod( 'multipurpose_photography_rss_url') != '') { ?>
				           		<a href="<?php echo esc_url( get_theme_mod( 'multipurpose_photography_rss_url','' ) ); ?>"><i class="flaticon-follow-me"></i><span class="screen-reader-text"><?php esc_html_e('RSS','multipurpose-photography'); ?></span></a>
				          	<?php } ?> 
				        </div>
			      	</div>
			    </div>
		  	</div>
		</div>
	</header>
<?php get_template_part( 'template-parts/header/navigation' ); ?> 