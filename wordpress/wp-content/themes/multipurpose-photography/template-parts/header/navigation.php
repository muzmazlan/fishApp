<?php
/**
 * Header Navigation File
 *
 * @package multipurpose-photography
 */
?>

<div id="header" class="<?php if( get_theme_mod( 'multipurpose_photography_sticky_header') != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
	<div class="container">
	    <div class="row">
	    	<div class="col-lg-11 col-md-11 col-10">
	    		<div class="toggle-menu responsive-menu">
					<button role="tab" onclick="multipurpose_photography_resMenu_open()"><i class="fas fa-bars"></i><?php esc_html_e('Menu','multipurpose-photography'); ?><span class="screen-reader-text"><?php esc_html_e('Menu','multipurpose-photography'); ?></span></button>
		        </div>
                <div id="sidelong-menu" class="nav side-nav">
					<nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'multipurpose-photography' ); ?>">
						<?php 
						  wp_nav_menu( array( 
						    'theme_location' => 'primary',
						    'container_class' => 'main-menu-navigation clearfix' ,
						    'menu_class' => 'clearfix',
						    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
						    'fallback_cb' => 'wp_page_menu',
						  ) ); 
						?>
						<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="multipurpose_photography_resMenu_close()"><?php esc_html_e('Close Menu','multipurpose-photography'); ?><i class="fas fa-times-circle"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','multipurpose-photography'); ?></span></a>
					</nav>
                </div>
	    	</div>
	    	<div class="search-box col-lg-1 col-md-1 col-2 pl-0">
	           <div class="wrap"><?php get_search_form(); ?></div>
	        </div>
	    </div>
	</div>
</div>