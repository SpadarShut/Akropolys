
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
        array(type=>'balyasinyi-iz-betona, title=>'Балясины', img => 'balasiny.jpg'),
        array(type=>'kolonny-i-pilyastry', title=>'Фасадные колонны и пилястры', img => 'fasad-kolonny-pilastry.jpg'),
      );
  ?>
  <!--
    X Карнизы
    X Колонны
    X Розетки
    X Обрамления
    X Кронштейны
    X Молдинги
    X Пилястры
    X Орнаменты
    X элементы фасада
    X Балясины
  -->
	<ul class="products_list group">
    <?php foreach ($links as $link) : ?>
    <li>
      <a href="<?php echo home_url(); ?>/product_type/<?php echo $link[type]; ?>/">
        <h2><?php echo $link[title]; ?></h2>
        <img src="<?php bloginfo('template_directory'); ?>/images/207x128/<?php echo $link[img]; ?>" alt="<?php echo $link[title]; ?>">
      </a>
    </li>
    <?php endforeach; ?>
	</ul>
