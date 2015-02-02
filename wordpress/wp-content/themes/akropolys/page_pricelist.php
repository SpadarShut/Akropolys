<?php /* Template Name: Прайс-лист */ ?>

<?php get_header(); ?>

<?php get_template_part( 'cats_list' ); ?>

    <div class="main_column group">
	
        <?php get_sidebar(); ?>

        <div class="main_content">
				
            <div class="frameblock_top"><div class="frameblock_bot">
                <div class="frameblock_cont">
					
					<div class="price_list_block">

                        <h2><?php the_title(); ?></h2>

						 <?php
						 $terms = get_terms("product_type");
						 $count = count($terms);
						 
						 if ( $count > 0 ){
							 foreach ( $terms as $term ) {
							 
							 echo '<table class="price_list_table"><thead><tr><th class="pricelist_title_cell">Название</th><th class="pricelist_price_cell">Цена, $</th><th class="pricelist_img_cell">Миниатюра</th></tr></thead><tbody>';
							   	
								$args = array(
									'orderby' => 'title',
									'order' => ASC,
									'tax_query' => array(
										array(
											'taxonomy' => 'product_type',
											'field' => 'slug',
											'terms' => $term->slug
										)
									),
									'posts_per_page' => -1
								);

								$wp_query = new WP_Query( $args );
								
								while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
								
								
								$product_price = get_field('product_price');
								?>

									<tr>
										<td class="pricelist_title_cell">
											<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										</td>
										<td class="pricelist_price_cell">
											<?php if($product_price){ 
												$str = array(' у.е. за пог. м.', ' у.е. за шт.');
												echo str_replace($str, '', $product_price);
											} ?>
										</td>
										<td class="pricelist_img_cell">
											<a class="price_list_img" href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail()) : ?><?php the_post_thumbnail('thumbnail'); ?><?php endif; ?></a>
										</td>
									</tr>

								<?php endwhile;

								// Reset Post Data
								wp_reset_postdata();

							 echo '</tbody></table>';
							 }
						 }
						 ?>
					</div><!-- /.price_list_block -->

                </div>
            </div></div>

        </div><!-- /.main_content -->

    </div><!-- /.main_column -->
	
<?php get_footer(); ?>