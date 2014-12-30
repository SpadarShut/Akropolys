<?php get_header(); ?>

<?php get_template_part( 'four_cats' ); ?>

    <div class="main_column group">
	
        <?php get_sidebar(); ?>

        <div class="main_content">
				
            <div class="frameblock_top"><div class="frameblock_bot">
                <div class="frameblock_cont">
					
				<h1 class="single_heading"><?php

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					single_cat_title();

					if ($paged > 1) {
					  echo " - страница " . $paged;
					}

				?></h1>
					
					<?php $category_description = category_description();
						if ( ! empty( $category_description ) && $paged == 1)
						echo '<div class="cat_description_text">' . $category_description . '</div>';
					?>

					<div class="products_area">

						<?php if ( is_tax( 'product_type', array('karnizy', 'moldingi')) ) {
							get_template_part( 'product_type', 'horisontal' );
						}
						else if ( is_tax( 'product_type', array('kolonny', 'pilyastry')) ) {
							get_template_part( 'product_type', 'tripple' );
						}
						else {
							get_template_part( 'product_type', 'double' );
						}?>

					</div><!-- /.products_area -->
					
					<?php include (TEMPLATEPATH . '/_/inc/nav.php' ); ?>
						

                </div>
            </div></div>

        </div><!-- /.main_content -->

    </div><!-- /.main_column -->
	
<?php get_footer(); ?>