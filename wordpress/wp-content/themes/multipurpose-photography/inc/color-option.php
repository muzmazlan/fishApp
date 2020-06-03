<?php
	
	$multipurpose_photography_first_theme_color = get_theme_mod('multipurpose_photography_first_theme_color');

	$multipurpose_photography_second_theme_color = get_theme_mod('multipurpose_photography_second_theme_color');

	$multipurpose_photography_custom_css = '';

	if($multipurpose_photography_first_theme_color != false){
		$multipurpose_photography_custom_css .=' #footer input[type="submit"], input[type="submit"], .nav-menu ul ul a, .top-bar .logo, .read-more a:hover, .post-info, h1.page-title, h1.search-title, .blogbtn a, .inner, .footerinner .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, #comments input[type="submit"].submit, #sidebar h3, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, span.meta-nav, #comments a.comment-reply-link, .tags a:hover, a.button, .back-to-top, #slider .carousel-indicators .active, .woocommerce-product-search button, .woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle{, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current';
			$multipurpose_photography_custom_css .='background-color: '.esc_html($multipurpose_photography_first_theme_color).';';
		$multipurpose_photography_custom_css .='}';
	}
	if($multipurpose_photography_first_theme_color != false){
		$multipurpose_photography_custom_css .=' .nav-menu ul li a:active, .nav-menu ul li a:hover, #sidebar ul li a:hover, a, a:hover, .nav-menu a:hover, .call i, .social-icon i:hover, input.search-field, .blog-sec h2 a, .woocommerce-message::before, #sidebar .tagcloud a, .title-box h1, #wrapper h1, span.post-title, .comment-meta.commentmetadata a, .tags a i, #wrapper .related-posts h3 a, #wrapper .related-posts h2.related-posts-main-title, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span {';
			$multipurpose_photography_custom_css .='color: '.esc_html($multipurpose_photography_first_theme_color).';';
		$multipurpose_photography_custom_css .='}';
	}
	if($multipurpose_photography_first_theme_color != false){
		$multipurpose_photography_custom_css .='  input.search-field, .blog-sec, #services .service-content:hover  a, .btn--corners, .woocommerce-message, .pagination a:hover, .pagination .current, #sidebar .widget, .nav-menu ul ul, .tags a:hover, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span{';
			$multipurpose_photography_custom_css .='border-color: '.esc_html($multipurpose_photography_first_theme_color).';';
		$multipurpose_photography_custom_css .='}';
	}
	if($multipurpose_photography_first_theme_color != false){
		$multipurpose_photography_custom_css .=' .nav-menu ul ul a:hover{';
			$multipurpose_photography_custom_css .='border-left-color: '.esc_html($multipurpose_photography_first_theme_color).';';
		$multipurpose_photography_custom_css .='}';
	}
	if($multipurpose_photography_first_theme_color != false){
		$multipurpose_photography_custom_css .=' .back-to-top::before{';
			$multipurpose_photography_custom_css .='border-bottom-color: '.esc_html($multipurpose_photography_first_theme_color).';';
		$multipurpose_photography_custom_css .='}';
	}
	if($multipurpose_photography_first_theme_color != false){
		$multipurpose_photography_custom_css .='
		@media screen and (max-width:1000px){
			.nav-menu ul li a:hover{';
			$multipurpose_photography_custom_css .='border-left-color: '.esc_html($multipurpose_photography_first_theme_color).';';
		$multipurpose_photography_custom_css .='} }';
	}
	if($multipurpose_photography_first_theme_color != false){
		$multipurpose_photography_custom_css .='
		@media screen and (max-width:1000px){
			.nav-menu .current_page_item > a, .nav-menu .current-menu-item > a, .nav-menu .current_page_ancestor > a, .nav-menu ul li a:hover{';
			$multipurpose_photography_custom_css .='color: '.esc_html($multipurpose_photography_first_theme_color).';';
		$multipurpose_photography_custom_css .='} }';
	}

	if($multipurpose_photography_second_theme_color != false){
		$multipurpose_photography_custom_css .=' a.button:hover, span.page-number,span.page-links-title, .nav-menu ul ul a:hover, .read-more a, .blogbtn a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .bradcrumbs a, #comments input[type="submit"].submit:hover, #comments a.comment-reply-link:hover, .footerinner, .top-bar, .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content{';
			$multipurpose_photography_custom_css .='background-color: '.esc_html($multipurpose_photography_second_theme_color).';';
		$multipurpose_photography_custom_css .='}';
	}
	if($multipurpose_photography_second_theme_color != false){
		$multipurpose_photography_custom_css .=' span.cart-value, .service-content h4 a, #services h3, #services h2 span, #sidebar ul li a, .search-box i, .nav-menu li a{';
			$multipurpose_photography_custom_css .='color: '.esc_html($multipurpose_photography_second_theme_color).';';
		$multipurpose_photography_custom_css .='}';
	}
	if($multipurpose_photography_second_theme_color != false){
		$multipurpose_photography_custom_css .=' .pagination span, .pagination a{';
			$multipurpose_photography_custom_css .='border-color: '.esc_html($multipurpose_photography_second_theme_color).';';
		$multipurpose_photography_custom_css .='}';
	}
	if($multipurpose_photography_second_theme_color != false){
		$multipurpose_photography_custom_css .=' .back-to-top::after{';
			$multipurpose_photography_custom_css .='border-bottom-color: '.esc_html($multipurpose_photography_second_theme_color).';';
		$multipurpose_photography_custom_css .='}';
	}
	if($multipurpose_photography_second_theme_color != false){
		$multipurpose_photography_custom_css .='
		@media screen and (max-width:1000px){
			.page-template-custom-front-page .top-bar{';
			$multipurpose_photography_custom_css .='background-color: '.esc_html($multipurpose_photography_second_theme_color).';';
		$multipurpose_photography_custom_css .='} }';
	}


	// Layout Options
	$multipurpose_photography_theme_layout = get_theme_mod( 'multipurpose_photography_theme_layout_options','Default Theme');
    if($multipurpose_photography_theme_layout == 'Default Theme'){
		$multipurpose_photography_custom_css .='body{';
			$multipurpose_photography_custom_css .='max-width: 100%;';
		$multipurpose_photography_custom_css .='}';
	}else if($multipurpose_photography_theme_layout == 'Container Theme'){
		$multipurpose_photography_custom_css .='body{';
			$multipurpose_photography_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$multipurpose_photography_custom_css .='}';
		$multipurpose_photography_custom_css .='header{';
			$multipurpose_photography_custom_css .='position: relative;';
		$multipurpose_photography_custom_css .='}';
	}else if($multipurpose_photography_theme_layout == 'Box Container Theme'){
		$multipurpose_photography_custom_css .='body{';
			$multipurpose_photography_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$multipurpose_photography_custom_css .='}';
		$multipurpose_photography_custom_css .='header{';
			$multipurpose_photography_custom_css .='position: relative;';
		$multipurpose_photography_custom_css .='}';
	}


	/*--------------------------- Slider Opacity -------------------*/

	$multipurpose_photography_slider_layout = get_theme_mod( 'multipurpose_photography_slider_opacity','0.7');
	if($multipurpose_photography_slider_layout == '0'){
		$multipurpose_photography_custom_css .='#slider img{';
			$multipurpose_photography_custom_css .='opacity:0';
		$multipurpose_photography_custom_css .='}';
	}else if($multipurpose_photography_slider_layout == '0.1'){
		$multipurpose_photography_custom_css .='#slider img{';
			$multipurpose_photography_custom_css .='opacity:0.1';
		$multipurpose_photography_custom_css .='}';
	}else if($multipurpose_photography_slider_layout == '0.2'){
		$multipurpose_photography_custom_css .='#slider img{';
			$multipurpose_photography_custom_css .='opacity:0.2';
		$multipurpose_photography_custom_css .='}';
	}else if($multipurpose_photography_slider_layout == '0.3'){
		$multipurpose_photography_custom_css .='#slider img{';
			$multipurpose_photography_custom_css .='opacity:0.3';
		$multipurpose_photography_custom_css .='}';
	}else if($multipurpose_photography_slider_layout == '0.4'){
		$multipurpose_photography_custom_css .='#slider img{';
			$multipurpose_photography_custom_css .='opacity:0.4';
		$multipurpose_photography_custom_css .='}';
	}else if($multipurpose_photography_slider_layout == '0.5'){
		$multipurpose_photography_custom_css .='#slider img{';
			$multipurpose_photography_custom_css .='opacity:0.5';
		$multipurpose_photography_custom_css .='}';
	}else if($multipurpose_photography_slider_layout == '0.6'){
		$multipurpose_photography_custom_css .='#slider img{';
			$multipurpose_photography_custom_css .='opacity:0.6';
		$multipurpose_photography_custom_css .='}';
	}else if($multipurpose_photography_slider_layout == '0.7'){
		$multipurpose_photography_custom_css .='#slider img{';
			$multipurpose_photography_custom_css .='opacity:0.7';
		$multipurpose_photography_custom_css .='}';
	}else if($multipurpose_photography_slider_layout == '0.8'){
		$multipurpose_photography_custom_css .='#slider img{';
			$multipurpose_photography_custom_css .='opacity:0.8';
		$multipurpose_photography_custom_css .='}';
	}else if($multipurpose_photography_slider_layout == '0.9'){
		$multipurpose_photography_custom_css .='#slider img{';
			$multipurpose_photography_custom_css .='opacity:0.9';
		$multipurpose_photography_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/

	$multipurpose_photography_slider_layout = get_theme_mod( 'multipurpose_photography_slider_alignment_option','Center Align');
    if($multipurpose_photography_slider_layout == 'Left Align'){
		$multipurpose_photography_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$multipurpose_photography_custom_css .='text-align:left;';
		$multipurpose_photography_custom_css .='}';
		$multipurpose_photography_custom_css .='#slider .carousel-caption{';
		$multipurpose_photography_custom_css .='left:15%; right:30%;';
		$multipurpose_photography_custom_css .='}';
	}else if($multipurpose_photography_slider_layout == 'Center Align'){
		$multipurpose_photography_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$multipurpose_photography_custom_css .='text-align:center;';
		$multipurpose_photography_custom_css .='}';
		$multipurpose_photography_custom_css .='#slider .carousel-caption{';
		$multipurpose_photography_custom_css .='left:25%; right:25%;';
		$multipurpose_photography_custom_css .='}';
	}else if($multipurpose_photography_slider_layout == 'Right Align'){
		$multipurpose_photography_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$multipurpose_photography_custom_css .='text-align:right;';
		$multipurpose_photography_custom_css .='}';
		$multipurpose_photography_custom_css .='#slider .carousel-caption{';
		$multipurpose_photography_custom_css .='left:35%; right:15%;';
		$multipurpose_photography_custom_css .='}';
	}

	/*--------- Preloader Color Option -------*/
	$multipurpose_photography_preloader_color = get_theme_mod('multipurpose_photography_preloader_color');

	if($multipurpose_photography_preloader_color != false){
		$multipurpose_photography_custom_css .=' .tg-loader{';
			$multipurpose_photography_custom_css .='border-color: '.esc_html($multipurpose_photography_preloader_color).';';
		$multipurpose_photography_custom_css .='} ';
		$multipurpose_photography_custom_css .=' .tg-loader-inner{';
			$multipurpose_photography_custom_css .='background-color: '.esc_html($multipurpose_photography_preloader_color).';';
		$multipurpose_photography_custom_css .='} ';
	}

	$multipurpose_photography_preloader_bg_color = get_theme_mod('multipurpose_photography_preloader_bg_color');

	if($multipurpose_photography_preloader_bg_color != false){
		$multipurpose_photography_custom_css .=' #overlayer{';
			$multipurpose_photography_custom_css .='background-color: '.esc_html($multipurpose_photography_preloader_bg_color).';';
		$multipurpose_photography_custom_css .='} ';
	}

	/*------------ Button Settings option-----------------*/

	$multipurpose_photography_top_button_padding = get_theme_mod('multipurpose_photography_top_button_padding');
	$multipurpose_photography_bottom_button_padding = get_theme_mod('multipurpose_photography_bottom_button_padding');
	$multipurpose_photography_left_button_padding = get_theme_mod('multipurpose_photography_left_button_padding');
	$multipurpose_photography_right_button_padding = get_theme_mod('multipurpose_photography_right_button_padding');
	if($multipurpose_photography_top_button_padding != false || $multipurpose_photography_bottom_button_padding != false || $multipurpose_photography_left_button_padding != false || $multipurpose_photography_right_button_padding != false){
		$multipurpose_photography_custom_css .='.read-more a, .blogbtn a, #comments input[type="submit"].submit{';
			$multipurpose_photography_custom_css .='padding-top: '.esc_html($multipurpose_photography_top_button_padding).'px; padding-bottom: '.esc_html($multipurpose_photography_bottom_button_padding).'px; padding-left: '.esc_html($multipurpose_photography_left_button_padding).'px; padding-right: '.esc_html($multipurpose_photography_right_button_padding).'px; display:inline-block;';
		$multipurpose_photography_custom_css .='}';
	}

	$multipurpose_photography_button_border_radius = get_theme_mod('multipurpose_photography_button_border_radius');
	$multipurpose_photography_custom_css .='.read-more a, .blogbtn a, #comments input[type="submit"].submit{';
		$multipurpose_photography_custom_css .='border-radius: '.esc_html($multipurpose_photography_button_border_radius).'px;';
	$multipurpose_photography_custom_css .='}';

	/*----------- Copyright css -----*/
	$multipurpose_photography_copyright_top_padding = get_theme_mod('multipurpose_photography_top_copyright_padding');
	$multipurpose_photography_copyright_bottom_padding = get_theme_mod('multipurpose_photography_bottom_copyright_padding');
	if($multipurpose_photography_copyright_top_padding != false || $multipurpose_photography_copyright_bottom_padding != false){
		$multipurpose_photography_custom_css .='.inner{';
			$multipurpose_photography_custom_css .='padding-top: '.esc_html($multipurpose_photography_copyright_top_padding).'px; padding-bottom: '.esc_html($multipurpose_photography_copyright_bottom_padding).'px; ';
		$multipurpose_photography_custom_css .='}';
	} 

	$multipurpose_photography_copyright_alignment = get_theme_mod('multipurpose_photography_copyright_alignment', 'center');
	if($multipurpose_photography_copyright_alignment == 'center' ){
		$multipurpose_photography_custom_css .='#footer .copyright p{';
			$multipurpose_photography_custom_css .='text-align: '. $multipurpose_photography_copyright_alignment .';';
		$multipurpose_photography_custom_css .='}';
	}elseif($multipurpose_photography_copyright_alignment == 'left' ){
		$multipurpose_photography_custom_css .='#footer .copyright p{';
			$multipurpose_photography_custom_css .=' text-align: '. $multipurpose_photography_copyright_alignment .';';
		$multipurpose_photography_custom_css .='}';
	}elseif($multipurpose_photography_copyright_alignment == 'right' ){
		$multipurpose_photography_custom_css .='#footer .copyright p{';
			$multipurpose_photography_custom_css .='text-align: '. $multipurpose_photography_copyright_alignment .';';
		$multipurpose_photography_custom_css .='}';
	}

	$multipurpose_photography_copyright_font_size = get_theme_mod('multipurpose_photography_copyright_font_size');
	$multipurpose_photography_custom_css .='#footer .copyright p{';
		$multipurpose_photography_custom_css .='font-size: '.esc_html($multipurpose_photography_copyright_font_size).'px;';
	$multipurpose_photography_custom_css .='}';

	/*------ Slider Show/Hide ------*/
	$multipurpose_photography_slider = get_theme_mod('multipurpose_photography_slider_hide_show');
	if($multipurpose_photography_slider == false ){
		$multipurpose_photography_custom_css .='.page-template-custom-front-page .top-bar{';
			$multipurpose_photography_custom_css .='position: static; background-color: #222d34; padding-bottom: 10px;';
		$multipurpose_photography_custom_css .='}';
	}