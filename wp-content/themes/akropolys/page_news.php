<?php /* Template Name: Новости*/ ?>

<?php get_header(); ?>
						
	<?php get_template_part( 'index', 'fader' ); ?>

    <div class="main_column group">

        <?php get_sidebar(); ?>

        <div class="main_content">

            <div class="frameblock_top"><div class="frameblock_bot">
                <div class="frameblock_cont">
					
					<div class="index_news_block">

                        <h2>Последние события</h2>

                        <div class="group">
						<?php
							$args = array(
								'order' => DESC,
								'post_type' => 'news',
								'posts_per_page' => -1
							);

							$the_query = new WP_Query( $args );

							while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							
							<div class="index_news">
								<span><?php the_time('d M Y'); ?></span>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<a href="<?php the_permalink(); ?>" class="news_img"><?php if ( has_post_thumbnail()) : ?><?php the_post_thumbnail('news_thumb'); ?><?php endif; ?></a>
								<?php the_excerpt(); ?>
							</div>
								
							<?php endwhile;

							// Reset Post Data
							wp_reset_postdata();
						?>
                        </div>

					</div><!-- /.index_news_block -->

                </div>
            </div></div>

        </div><!-- /.main_content -->

    </div><!-- /.main_column -->

	<?php get_template_part( 'four_cats' ); ?>
	
<?php get_footer(); ?>