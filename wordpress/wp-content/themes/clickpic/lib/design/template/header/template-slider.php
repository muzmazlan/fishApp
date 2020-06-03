<section id="banner" class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="row">
      <?php if ( is_front_page() || is_home() ) {?>
        <?php if ( get_header_image() ) : ?>
        <div class="homeslider">
          <img class="img-responsive" src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" >
          <?php
            $banner_heading = get_theme_mod('banner_heading');
            $banner_sub_heading = get_theme_mod('banner_sub_heading');
            if( !empty($banner_heading) || !empty($banner_sub_heading)){ ?>
              <div class="carousel-caption hidden-xs">
                <div class="banner_heading"><h3><?php echo esc_html($banner_heading); ?></h3></div><!--banner_heading-->
                <div class="banner_sub_heading captiontext"><?php echo esc_html($banner_sub_heading); ?></div><!--banner_heading-->
              </div><!--carousel-caption hidden-xs-->
          <?php } ?>
        </div>  <!--homeslider-->
      <?php endif; ?>
      <?php }elseif(is_page()){?>
          <?php if ( has_post_thumbnail() ) {
            ?> 
            <?php the_post_thumbnail('full');?>           
            <?php }else{?>
              <img class="img-responsive" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/innerpage.jpg" alt="<?php bloginfo('name'); ?>">   
          <?php } ?>
    <?php }?>
  </div><!--row-->
</div><!--col-sm-12-->
</div><!--row-->
</section><!--banner-->