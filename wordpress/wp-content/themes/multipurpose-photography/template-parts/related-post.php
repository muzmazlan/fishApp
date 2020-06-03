<?php $related_posts = multipurpose_photography_related_posts_function(); ?>

<?php if ( $related_posts->have_posts() ): ?>

	<div class="related-posts clearfix">
		<?php if ( get_theme_mod('multipurpose_photography_related_posts_title','You May Also Like') != '' ) {?>
			<h2 class="related-posts-main-title"><?php echo esc_html( get_theme_mod('multipurpose_photography_related_posts_title',__('You May Also Like','multipurpose-photography')) ); ?></h2>
		<?php }?>
		<div class="row">
			<?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>

				<div class="col-lg-4 col-md-4">
				    <article class="blog-sec">
				        <?php if(has_post_thumbnail()) { ?>
				          <?php the_post_thumbnail(); ?> 
				        <?php }?>
				        <h3><a href="<?php echo esc_url(get_permalink() ); ?>"><?php esc_html(the_title()); ?><span class="screen-reader-text"><?php esc_html(the_title()); ?></span></a></h3>
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

			<?php endwhile; ?>
		</div>

	</div><!--/.post-related-->
<?php endif; ?>

<?php wp_reset_postdata(); ?>