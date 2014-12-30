<?php get_header(); ?>

<?php get_template_part( 'four_cats' ); ?>

    <div class="main_column group">
	
        <?php get_sidebar(); ?>

        <div class="main_content">
				
            <div class="frameblock_top"><div class="frameblock_bot">
                <div class="frameblock_cont">
					
					
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								
				<h1 class="single_heading"><?php the_title(); ?></h1>

						<?php
							$product_price = get_field('product_price');
							$product_dimentions = get_field('product_dimentions');
							$product_sizes = get_field('product_sizes');
							$product_kapitel = get_field('kapitel');
							$product_stvol = get_field('stvol');
							$product_baza = get_field('baza');
							$product_pedestal = get_field('pedestal');
						?>

						<div class="excerpt_block">
							<?php the_excerpt(); ?>
						</div>

					<?php if( has_term( array('karnizy', 'moldingi', ''), 'product_type' ) ) { ?>

						<div class="products_area">

							<div <?php post_class(array('product', 'group')); ?>>
								<div class="full_imagery group">
									<?php if ( has_post_thumbnail()) : ?><span><?php the_post_thumbnail('horis_thumb'); ?></span><?php endif; ?>
									
										<?php if($product_sizes){
											echo '<div class="full_dimentions">
													<img src="' . $product_sizes . '">
												  </div>';
										} ?>

								</div>
							</div>

						</div><!-- /.products_area -->

						<div class="full_product_desc">
							<span><strong>Модель:</strong> <?php the_title(); ?></span>
							<?php if($product_dimentions){ echo '<span><strong>Размер:</strong> ' . $product_dimentions . ', допустимы расхождения до 3 мм. Возможно изготовление по вашим размерам.</span>' ; } ?>
							<span class="product_price"><?php if($product_price){ echo '<strong>Стоимость:</strong> от ' . $product_price ; } ?></span>
						</div>

					<?php }
					
						else if( has_term( 'kronshteyny', 'product_type' ) ) { ?>
					
						<div class="products_area">

							<div <?php post_class(array('product', 'group')); ?>>
								<div class="floated_imagery group">
									<div class="full_product_desc">
										<span><strong>Модель:</strong> <?php the_title(); ?></span>
										<span><?php if($product_dimentions){ echo '<strong>Размер:</strong> ' . $product_dimentions . ', допустимы расхождения до 3 мм. Возможно изготовление по вашим размерам.' ; } ?></span>
										<span class="product_price"><?php if($product_price){ echo '<strong>Стоимость:</strong> от ' . $product_price ; } ?></span>
									</div>
									<?php if ( has_post_thumbnail()) : ?><span><?php the_post_thumbnail('horis_thumb'); ?></span><?php endif; ?>
								</div>
							</div>

						</div><!-- /.products_area -->
						
					<?php }
					
					else { ?>

						<div class="products_area">

							<div <?php post_class(array('product', 'group')); ?>>
								<div class="single_imagery">
									<?php if ( has_post_thumbnail()) : ?><?php the_post_thumbnail('full'); ?><?php endif; ?>
									<?php if($product_sizes){
										echo '<div class="full_dimentions">
												<img src="' . $product_sizes . '">
											  </div>';
									} ?>
								</div>
							</div>

						</div><!-- /.products_area -->
						
						<div class="full_product_desc">
							<span><strong>Модель:</strong> <?php the_title(); ?></span>
							<span><?php if($product_dimentions){ echo '<strong>Размер:</strong> ' . $product_dimentions . ', допустимы расхождения до 3 мм. Возможно изготовление по вашим размерам.' ; } ?></span>
							<?php if($product_kapitel){ echo '<span><strong>Капитель:</strong> ' . $product_kapitel . '</span>' ; } ?>
							<?php if($product_stvol){ echo '<span><strong>Ствол:</strong> ' . $product_stvol . '</span>' ; } ?>
							<?php if($product_baza){ echo '<span><strong>База:</strong> ' . $product_baza . '</span>' ; } ?>
							<?php if($product_pedestal){ echo '<span><strong>Пьедестал:</strong> ' . $product_pedestal . '</span>' ; } ?>
							<span class="product_price"><?php if($product_price){ echo '<strong>Стоимость:</strong> от ' . $product_price ; } ?></span>
						</div>
						
					<?php } ?>

						<?php the_content(); ?>

						<p class="contact">Заказать этот товар или получить справочную информацию можно по тел. velcom +375 (29) 321-00-85</p>
						
						<?php edit_post_link('Редактировать этот товар','<p>','</p>'); ?>
						
				<?php endwhile; endif; ?>

                </div>
            </div></div>

        </div><!-- /.main_content -->

    </div><!-- /.main_column -->
	
<?php get_footer(); ?>