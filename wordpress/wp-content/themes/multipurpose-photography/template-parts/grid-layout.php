<?php
/**
 * The template part for displaying grid layout
 * @package Multipurpose Photography
 * @subpackage multipurpose_photography
 * @since 1.0
 */
?>
<div class="col-lg-4 col-md-4">
    <article class="blog-sec">
        <?php if(has_post_thumbnail()) { ?>
          <?php the_post_thumbnail(); ?> 
        <?php }?>
        <h2><a href="<?php echo esc_url(get_permalink() ); ?>"><?php esc_html(the_title()); ?><span class="screen-reader-text"><?php esc_html(the_title()); ?></span></a></h2>
        <?php if(get_the_excerpt()) { ?>
            <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( multipurpose_photography_string_limit_words( $excerpt, esc_attr(get_theme_mod('multipurpose_photography_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('multipurpose_photography_button_excerpt_suffix','...') ); ?></p></div>
        <?php }?>
        <?php if ( get_theme_mod('multipurpose_photography_blog_button_text','Read Full') != '' ) {?>
            <div class="blogbtn">
                <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" ><?php echo esc_html( get_theme_mod('multipurpose_photography_blog_button_text',__('Read Full', 'multipurpose-photography')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('multipurpose_photography_blog_button_text',__('Read Full', 'multipurpose-photography')) ); ?></span></a>
            </div>
        <?php }?>
    </article>
</div>