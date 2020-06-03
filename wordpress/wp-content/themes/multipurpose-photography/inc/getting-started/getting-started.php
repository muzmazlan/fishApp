<?php
//about theme info
add_action( 'admin_menu', 'multipurpose_photography_gettingstarted' );
function multipurpose_photography_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'multipurpose-photography'), esc_html__('Get Started', 'multipurpose-photography'), 'edit_theme_options', 'multipurpose_photography_guide', 'multipurpose_photography_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function multipurpose_photography_admin_theme_style() {
   wp_enqueue_style('multipurpose-photography-custom-admin-style', get_template_directory_uri() . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'multipurpose_photography_admin_theme_style');

//guidline for about theme
function multipurpose_photography_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'multipurpose-photography' );
?>
<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Multipurpose Photography WordPress Theme', 'multipurpose-photography' ); ?></h3>
		</div>
		<div class="color_bg_blue">
			<p>Version: <?php echo esc_html($theme['Version']);?></p>
			<p class="intro_version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'multipurpose-photography' ); ?></p>
			<div class="blink">
				<h4><?php esc_html_e( 'Theme Created By Themesglance', 'multipurpose-photography' ); ?></h4>
			</div>
			<div class="intro-text"><img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/themesglance-logo.png" alt="" /></div>
			<div class="coupon-code"><?php esc_html_e( 'Get', 'multipurpose-photography' ); ?> 
				<span><?php esc_html_e( '20% off', 'multipurpose-photography' ); ?></span> <?php esc_html_e( 'on Premium Theme with the discount code: ', 'multipurpose-photography' ); ?> <span><?php esc_html_e( '" Get20 "', 'multipurpose-photography' ); ?></span>
			</div>
		</div>
		<div class="started">
			<h3><?php esc_html_e( 'Lite Theme Info', 'multipurpose-photography' ); ?></h3>
			<p><?php esc_html_e( 'Multipurpose Photography is an impressive, colourful, fresh and lively WordPress photography theme to showcase your creative skill to the world. It is an ideal theme for professional photographers, photo bloggers, portfolio makers, travel enthusiasts, adventure travel bloggers, wedding, wildlife and all types of photographers, graphic designers, magazines, newspapers and similar websites and profession. With its welcoming slider on the homepage, website will have a great impact on onlookers. Its layout is optimized for all devices whether it is mobile, tablet or desktop and it loads seamlessly on all the leading browsers. This photography theme is multilingual, SEO friendly and supports RTL writing. It is retina ready to show sharp and crisp images in different gallery layouts to make an awe-inspiring website that visitors will get hooked to it at the very first sight. There are several niche oriented sections designed making it a complete theme in all respect. It is based on the recently launched WordPress version to keep website updated. It comes with multiple website layouts, two blog layouts and some amazing portfolio layouts. This theme is fully customizable to give personalized touch to website. ', 'multipurpose-photography')?></p>
			<hr>
			<h3><?php esc_html_e( 'Help Docs', 'multipurpose-photography' ); ?></h3>
			<ul>
				<p><?php esc_html_e( 'Multipurpose Photography', 'multipurpose-photography' ); ?> <a href="<?php echo esc_url( MULTIPURPOSE_PHOTOGRAPHY_THEMESGLANCE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'multipurpose-photography' ); ?></a></p>
			</ul>
			<hr>
			<h3><?php esc_html_e( 'Get started with Photography Theme', 'multipurpose-photography' ); ?></h3>
			<div class="col-left-inner"> 
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>		
			<div class="col-right-inner">
				<p><?php esc_html_e( 'Go to', 'multipurpose-photography' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'multipurpose-photography' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'multipurpose-photography' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Easily customizable ', 'multipurpose-photography' ); ?> </li>
					<li><?php esc_html_e( 'Absolutely free', 'multipurpose-photography' ); ?> </li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'multipurpose-photography'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/responsive-tg.png" alt="" />
			<hr class="firsthr">
			<a href="<?php echo esc_url( MULTIPURPOSE_PHOTOGRAPHY_THEMESGLANCE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'multipurpose-photography'); ?></a>
			<a href="<?php echo esc_url( MULTIPURPOSE_PHOTOGRAPHY_THEMESGLANCE_PRO_THEME_URL ); ?>"><?php esc_html_e('Buy Pro', 'multipurpose-photography'); ?></a>
			<a href="<?php echo esc_url( MULTIPURPOSE_PHOTOGRAPHY_THEMESGLANCE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'multipurpose-photography'); ?></a>
			<hr class="secondhr">
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'multipurpose-photography'); ?></h3>
		<ul>
		 	<li><?php esc_html_e( 'Theme options using customizer API', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'Inbuilt BMI Calculator', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'Responsive Design', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'Advanced Color Options and Color Pallets', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( '100+ Font Family Options', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'RTL & Translation Ready', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'Support to Add Custom CSS/JS', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'SEO Friendly', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'Pagination Option', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'Footer Customization Options', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'Fully Integrated with Font Awesome Icon', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'Short Codes', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'Woo Commerce Compatible', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'Multiple Inner Page Templates', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'Customizable Home Page', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'Advance Social Media Feature', 'multipurpose-photography'); ?></li>
		 	<li><?php esc_html_e( 'Left and Right Sidebar', 'multipurpose-photography'); ?></li>
		</ul>
	</div>
	<div class="service">
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-media-document"></span> <?php esc_html_e('Get Support', 'multipurpose-photography'); ?></h3>
			<ol>
				<li>
				<a href="<?php echo esc_url( MULTIPURPOSE_PHOTOGRAPHY_THEMESGLANCE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'multipurpose-photography'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-welcome-widgets-menus"></span> <?php esc_html_e('Getting Started', 'multipurpose-photography'); ?></h3>
			<ol>
				<li> <?php esc_html_e('Start', 'multipurpose-photography'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'multipurpose-photography'); ?></a> <?php esc_html_e('your website.', 'multipurpose-photography'); ?></li>
			</ol>
		</div>
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e('Rate This Theme', 'multipurpose-photography'); ?></h3>
			<ol>
				<li>
					<a href="<?php echo esc_url( MULTIPURPOSE_PHOTOGRAPHY_THEMESGLANCE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Rate it here', 'multipurpose-photography'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-editor-help"></span> <?php esc_html_e( 'Help Docs', 'multipurpose-photography' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'Multipurpose Photography Lite', 'multipurpose-photography' ); ?> <a href="<?php echo esc_url( MULTIPURPOSE_PHOTOGRAPHY_THEMESGLANCE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'multipurpose-photography' ); ?></a></li>
			</ol>
		</div>
	</div>
</div>
<?php } ?>