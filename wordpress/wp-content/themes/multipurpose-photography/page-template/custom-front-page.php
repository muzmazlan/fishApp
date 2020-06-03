<?php
/**
 * Template Name: Custom home page
 */
get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action('multipurpose_photography_above_slider_section'); ?>
  
  <?php if( get_theme_mod('multipurpose_photography_slider_hide_show') != ''){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php $multipurpose_photography_content_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'multipurpose_photography_slidersettings_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $multipurpose_photography_content_pages[] = $mod;
            }
          }
          if( !empty($multipurpose_photography_content_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $multipurpose_photography_content_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php the_post_thumbnail(); ?>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <?php if ( get_theme_mod('multipurpose_photography_slider_title',true) != '' ) {?>
                  <h1><?php esc_html(the_title()); ?></h1> 
                <?php }?>
                <?php if ( get_theme_mod('multipurpose_photography_slider_content',true) != '' ) {?>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( multipurpose_photography_string_limit_words( $excerpt, esc_attr(get_theme_mod('multipurpose_photography_slider_excerpt','25')))); ?></p>
                <?php }?>
                <?php if ( get_theme_mod('multipurpose_photography_slider_button_label','READ MORE') != '' && get_theme_mod('multipurpose_photography_slider_button',true) != '') {?>
                  <div class ="read-more">
                    <a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html( get_theme_mod('multipurpose_photography_slider_button_label',__('READ MORE','multipurpose-photography')) ); ?><i class="fas fa-caret-right"></i><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('multipurpose_photography_slider_button_label',__('READ MORE','multipurpose-photography')) ); ?></span></a>
                  </div>  
                <?php }?>                  
              </div>
            </div>
          </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php if( get_theme_mod('multipurpose_photography_slider_indicator',true) != ''){ ?>
          <ol class="carousel-indicators">
            <?php for($i=0;$i<count($multipurpose_photography_content_pages);$i++) { ?>
              <li data-target="#carouselExampleIndicators" data-slide-to="<?php esc_attr($i); ?>" <?php if($i==0) { ?>class="active"<?php } ?>></li>
            <?php } ?>
          </ol>
        <?php }?>
        <?php else : ?>
          <div class="no-postfound"></div>
          <?php endif;
          endif;?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-caret-left"></i></span>
            <span class="screen-reader-text"><?php esc_html_e('Previous','multipurpose-photography'); ?></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-caret-right"></i></span>
            <span class="screen-reader-text"><?php esc_html_e('Next','multipurpose-photography'); ?></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section> 
  <?php }?>

  <?php do_action('multipurpose_photography_below_slider_section'); ?>

  <div class="header-nav">
    <?php get_template_part( 'template-parts/header/navigation' ); ?> 
  </div>

  <?php if( get_theme_mod('multipurpose_photography_services_title') != '' || get_theme_mod('multipurpose_photography_services_category') != ''){ ?>
    <section id="services">
      <div class="container">
        <?php if( get_theme_mod('multipurpose_photography_services_title') != ''){ ?>
          <h2 class="btn--corners"><span><?php echo esc_html(get_theme_mod('multipurpose_photography_services_title','')); ?></span></h2>
        <?php }?>
        <div class="row">
          <?php 
          $multipurpose_photography_catData=  get_theme_mod('multipurpose_photography_services_category');
          if($multipurpose_photography_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html( $multipurpose_photography_catData ,'multipurpose-photography')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="col-lg-3 col-md-3">
                <div class="service-content">
                  <h3><a href="<?php echo esc_url( get_permalink() );?>"><?php esc_html(the_title()); ?><span class="screen-reader-text"><?php esc_html(the_title()); ?></span></a></h3>
                  <?php the_post_thumbnail(); ?>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();
          } ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action('multipurpose_photography_after_service_section'); ?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>