<?php get_header(); ?>

<?php get_template_part( 'four_cats' ); ?>

    <div class="main_column group">
	
        <?php get_sidebar(); ?>

        <div class="main_content">
				
            <div class="frameblock_top"><div class="frameblock_bot">
                <div class="frameblock_cont">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<h1 class="single_heading"><?php the_title(); ?></h1>
					
					<div class="entry-content">
						
						<?php the_content(); ?>
					
					</div>
						
					<?php edit_post_link('Редактировать эту новость','<p>','</p>'); ?>
						
				<?php endwhile; endif; ?>
				
                </div>
            </div></div>

        </div><!-- /.main_content -->

    </div><!-- /.main_column -->
	
<?php get_footer(); ?>