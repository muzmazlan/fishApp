<?php
 $clickpic_copyright = get_theme_mod('clickpic_copyright');
 $clickpic_design = get_theme_mod('clickpic_design');  
?>
<?php if($clickpic_copyright || $clickpic_design){?>
<div class="footer-bottom">

  <div class="container">

    <div class="row">

      <div class="col-sm-6 col-xs-12">

        <div class="copyright text-left">

          
            <?php if(get_theme_mod('clickpic_copyright')){?>
              <?php echo esc_html($clickpic_copyright);?>
            <?php }?>         
        </div><!--copyright-->

      </div>

      <div class="col-sm-6 col-xs-12">

        <div class="design text-right">
          
            <?php if(get_theme_mod('clickpic_design')){?>
              <?php echo esc_html($clickpic_design);?>
            <?php }?>

        </div><!--design-->

      </div><!--col-sm-6-->

    </div><!--row-->

  </div><!--container-->

</div><!--footer-bottom-->
<?php }?>