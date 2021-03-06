<?php get_header(); ?>

    <div class="main_column group">
	
        <?php get_sidebar(); ?>

        <div class="main_content">
				
            <div class="frameblock_top"><div class="frameblock_bot">
                <div class="frameblock_cont group">
					
                    <div class="text_page_block group">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <div class="entry-content">

                          <?php the_content(); ?>

                        </div>

                        <?php edit_post_link('Редактировать эту страницу','<p class="clear">','</p>'); ?>

                        <?php endwhile; endif; ?>

                    </div><!-- /.text_page_block -->

                </div>
            </div></div>

        </div><!-- /.main_content -->

    </div><!-- /.main_column -->

    <div class="main_cats_block by_4">
      <?php get_template_part( 'cats_list' ); ?>
    </div>


<?php get_footer(); ?>