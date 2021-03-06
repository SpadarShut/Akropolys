
  <?php

      $links = array(
        array(type=>'karnizy', title=>'Карнизы', img => 'karniz.jpg'),
        array(type=>'moldingi', title=>'Молдинги', img => 'moldingi.jpg'),
        array(type=>'obramleniya', title=>'Обрамления', img => 'obramlenia.jpg'),
        array(type=>'rozetki', title=>'Розетки', img => 'thingy.jpg'),
        array(type=>'kronshteyny', title=>'Кронштейны', img => 'kronshteiny.jpg'),
        array(type=>'kolonny', title=>'Колонны', img => 'cols-sm.jpg'),
        array(type=>'pilyastry', title=>'Пилястры', img => 'pilastry.jpg'),
        array(type=>'ornamenty', title=>'Орнаменты', img => 'ornament.jpg'),
        array(type=>'elementy-fasada', title=>'Элементы фасада', img => 'fasad.jpg'),
        array(type=>'balyasinyi-iz-betona', title=>'Балясины', img => 'balasiny.jpg', url => home_url() . '/balyasinyi-iz-betona'),
        array(type=>'kolonny-i-pilyastry', title=>'Фасадные колонны и пилястры', img => 'fasad-kolonny-pilastry.jpg'),
      );
  ?>
	<ul class="products_list group">
    <?php foreach ($links as $link) :
     $url = $link[url] ? $link[url] : home_url() . '/product_type/' . $link[type] . '/';
     ?>
    <li>
      <a href="<?php echo $url; ?>">
        <h2><?php echo $link[title]; ?></h2>
        <img src="<?php bloginfo('template_directory'); ?>/images/207x128/<?php echo $link[img]; ?>" alt="<?php echo $link[title]; ?>">
      </a>
    </li>
    <?php endforeach; ?>
	</ul>
