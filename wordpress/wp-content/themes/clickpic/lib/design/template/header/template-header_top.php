<div id="maintopdiv">

  <div class="header-top">
  <div class="container" >
  <div class="row">  
            <div class="col-sm-4 leftlogo">            
                <?php if (display_header_text()==true){?>
                  <div class="logotxt">
                    <h1><a href="<?php echo esc_url( home_url( '/') ); ?>"><?php bloginfo('name'); ?></a></h1>
                    <p><?php bloginfo('description'); ?></p>
                  </div>
                <?php } ?>
            </div> <!--col-sm-3--> 
            <div class="col-md-4  col-lg-4 header_middle headercommon">
              <ul> 
                <li>
                  <?php $clickpic_phone = get_theme_mod('clickpic_phone'); ?>
                  <?php if(get_theme_mod('clickpic_phone')){?>
                    <i class="fa fa-phone"></i>&nbsp;&nbsp;<?php echo esc_html($clickpic_phone);?>
                  <?php }?>
                </li>
                <li class="lastemail">
                  <?php $clickpic_email = get_theme_mod('clickpic_address'); ?>
                  <?php if(get_theme_mod('clickpic_address')){?>
                    <i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo esc_html($clickpic_email);?>
                  <?php }?>                             
                </li>
              </ul>
            <div class="clear"></div>
            </div><!--col-md-4 header_middle-->
            <div class="col-md-4 col-lg-4 social-icons headercommon">
              <ul>
                <?php if(get_theme_mod('clickpic_fb')){?>
                  <li><a title="<?php esc_attr_e('Facebook','clickpic'); ?>" class="fa fa-facebook" target="_blank" href="<?php echo esc_url(get_theme_mod('clickpic_fb')); ?>"></a> </li>
                <?php }?>
                <?php if(get_theme_mod('clickpic_twitter')){?>
                  <li><a title="<?php esc_attr_e('twitter','clickpic'); ?>" class="fa fa-twitter" target="_blank" href="<?php echo esc_url(get_theme_mod('clickpic_twitter')); ?>"></a></li>
                <?php }?>
                <?php if(get_theme_mod('clickpic_glplus')){?>
                  <li><a title="<?php esc_attr_e('googleplus','clickpic'); ?>" class="fa fa-google-plus" target="_blank" href="<?php echo esc_url(get_theme_mod('clickpic_glplus')); ?>"></a></li>
                <?php }?>
                <?php if(get_theme_mod('clickpic_in')){?>
                  <li><a title="<?php esc_attr_e('linkedin','clickpic'); ?>" class="fa fa-linkedin" target="_blank" href="<?php echo esc_url(get_theme_mod('clickpic_in')); ?>"></a></li>
                <?php }?>
              </ul>
              <div class="clear"></div>
          </div><!--col-md-34 col-lg-4 header_right-->
            <div class="clearfix"></div>
        </div><!--row-->
  </div><!--container-->
</div><!--main-navigations-->
<section id="main_navigation">
  <div class="container" >
  <div class="row"> 
  <div class="main-navigation-inner col-sm-12 rightmenu">
    <div class="toggle">
              <a class="togglemenu" href="#"><?php esc_html_e('Menu','clickpic'); ?></a>
    </div><!-- toggle --> 
    <div class="sitenav">
        <?php
        wp_nav_menu( array(
        'theme_location' => 'primary'
        ) );
        ?>
    </div><!-- site-nav -->
  </div><!--<div class=""main-navigation-inner">-->
  </div><!--row-->
</div><!--container-->
</section><!--main_navigation-->
</div><!--maintopdiv-->