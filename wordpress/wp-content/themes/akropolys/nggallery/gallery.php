<?php 
/**
Template Page for the gallery overview

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>

<div class="gallery_block">

	<a class="next" href="#" title="Следующее фото">Следующее фото</a>
	<a class="prev" href="#" title="Предыдущее фото">Предыдущее фото</a>
	
<div class="slides">
	<div class="slides_container" >
		<?php foreach ( $images as $image ) : ?>
		
			<?php if ( !$image->hidden ) { ?>
				<div class="inline_block"><img title="<?php echo $image->description ?>" alt="<?php echo $image->alttext ?>" src="<?php echo $image->imageURL ?>" /></div>
			<?php } ?>
			
		<?php endforeach; ?>
	</div>
</div>
	
</div><!-- /.gallery_block -->
<?php endif; ?>