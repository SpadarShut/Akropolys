<div class="products_double_layout">			<?php		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;		$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );		$args = array(			'orderby' => 'title',			'order' => ASC,			'tax_query' => array(				array(					'taxonomy' => 'product_type',					'field' => 'slug',					'terms' => $current_term				)			),			'posts_per_page' => 40,			'paged' => $paged		);		$wp_query = new WP_Query( $args );				while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>				<?php      $product_price = render_in_BYR (get_field('product_price'));			$product_dimentions = get_field('product_dimentions');			$product_kapitel = get_field('kapitel');			$product_stvol = get_field('stvol');			$product_baza = get_field('baza');		?>			<div class="double_product group">				<div class="product_imagery">					<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail()) : ?><?php the_post_thumbnail('double_prod_thumb'); ?><?php endif; ?></a>				</div>				<div class="product_desc">				<span><strong>Модель:</strong> <?php the_title();?></span>				<?php if($product_dimentions){ echo '<span><strong>Размер:</strong> ' . $product_dimentions . '</span>' ; } ?>				<?php if($product_price){ echo '<span class="product_price"><strong>Цена:</strong>' . $product_price . '</span>'; } ?>				<?php if($product_kapitel){ echo '<span><strong>Капитель:</strong>' . $product_kapitel . '</span>'; } ?>				<?php if($product_stvol){ echo '<span><strong>Ствол:</strong>' . $product_stvol . '</span>'; } ?>				<?php if($product_baza){ echo '<span><strong>База:</strong>' . $product_baza . '</span>'; } ?>									<a class="moar" href="<?php the_permalink(); ?>">Подробнее</a>				</div>			</div>		<?php endwhile;		// Reset Post Data		wp_reset_postdata();	?></div><!-- /.products_double_layout -->