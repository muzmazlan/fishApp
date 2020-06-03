<?php
/**
 * The template for displaying the footer.
 * @package Multipurpose Photography
 */
?>
<?php if( get_theme_mod( 'multipurpose_photography_hide_scroll',true) != '') { ?>
  <?php $multipurpose_photography_scroll_align = get_theme_mod( 'multipurpose_photography_back_to_top','Right');
  if($multipurpose_photography_scroll_align == 'Left'){ ?>
    <a href="#content" class="back-to-top scroll-left"><?php esc_html_e('Top', 'multipurpose-photography'); ?><span class="screen-reader-text"><?php esc_html_e('Back to Top', 'multipurpose-photography'); ?></span></a>
  <?php }else if($multipurpose_photography_scroll_align == 'Center'){ ?>
    <a href="#content" class="back-to-top scroll-center"><?php esc_html_e('Top', 'multipurpose-photography'); ?><span class="screen-reader-text"><?php esc_html_e('Back to Top', 'multipurpose-photography'); ?></span></a>
  <?php }else{ ?>
    <a href="#content" class="back-to-top scroll-right"><?php esc_html_e('Top', 'multipurpose-photography'); ?><span class="screen-reader-text"><?php esc_html_e('Back to Top', 'multipurpose-photography'); ?></span></a>
  <?php }?>
<?php }?>
<footer role="contentinfo" id="footer">
  <?php //Set widget areas classes based on user choice
    $multipurpose_photography_footer_columns = get_theme_mod('multipurpose_photography_footer_widget', '4');
    if ($multipurpose_photography_footer_columns == '3') {
      $cols = 'col-lg-4 col-md-4';
    } elseif ($multipurpose_photography_footer_columns == '4') {
      $cols = 'col-lg-3 col-md-3';
    } elseif ($multipurpose_photography_footer_columns == '2') {
      $cols = 'col-lg-6 col-md-6';
    } else {
      $cols = 'col-lg-12 col-md-12';
    }
  ?>
  <?php
  if ( is_active_sidebar( 'footer-1' ) ||
     is_active_sidebar( 'footer-2' ) ||
     is_active_sidebar( 'footer-3' ) ||
     is_active_sidebar( 'footer-4' ) ) :
  ?>
  <div class="footerinner">
    <div class="container">
      <div class="row">
        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-1'); ?>
          </div>
        <?php endif; ?> 
        <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-2'); ?>
          </div>
        <?php endif; ?> 
        <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-3'); ?>
          </div>
        <?php endif; ?> 
        <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-4'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <div class="inner">
    <div class="container">
      <div class="copyright">
        <p><?php multipurpose_photography_credit_link(); ?> <?php echo esc_html(get_theme_mod('multipurpose_photography_text',__('By Themesglance','multipurpose-photography'))); ?> </p>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>