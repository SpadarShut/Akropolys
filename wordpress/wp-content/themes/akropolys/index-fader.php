<div class="index_fader">
	<div class="fader_block">

        <div class="slides_container group">
		<?php
			$args = array(
			'order' => ASC,
			'post_type' => 'slides'
			);

			$the_query = new WP_Query( $args );

			while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
																	
            <div class="slide">
                <strong><a href="<?php the_field('slide_link', $page->ID); ?>"><?php the_title(); ?></a></strong>
                <span></span>
                <?php if ( has_post_thumbnail()) : ?><?php the_post_thumbnail('slides_thumb'); ?><?php endif; ?>
            </div>
				
			<?php endwhile;

			// Reset Post Data
			wp_reset_postdata();
		?>

        </div>

    </div>
	
	<ol class="pagination"></ol>
</div><!-- /.index_fader -->