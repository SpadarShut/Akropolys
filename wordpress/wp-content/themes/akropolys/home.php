<?php /* Template Name: Главная страница*/ ?>

<?php get_header(); ?>
						
	<?php get_template_part( 'index', 'fader' ); ?>

    <div class="main_column group">

        <?php get_sidebar(); ?>

        <div class="main_content">

            <div class="frameblock_top"><div class="frameblock_bot">
                <div class="frameblock_cont">
                    <h2>Приветствуем вас на нашем сайте!</h2>

                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>

                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                </div>
            </div></div>

        </div><!-- /.main_content -->

    </div><!-- /.main_column -->

    <div class="main_cats_block">

        <ul class="four_cats group">
            <li>
                <a href="#">
                    <h2>Карнизы</h2>
                    <img src="img/cat1.jpg" alt="Карнизы">
                </a>
            </li>
            <li>
                <a href="#">
                    <h2>Молдинги</h2>
                    <img src="img/cat2.jpg" alt="Молдинги">
                </a>
            </li>
            <li>
                <a href="#">
                    <h2>Пилястры</h2>
                    <img src="img/cat3.jpg" alt="Пилястры">
                </a>
            </li>
            <li>
                <a href="#">
                    <h2>Обрамления</h2>
                    <img src="img/cat4.jpg" alt="Обрамления">
                </a>
            </li>
        </ul>

    </div><!-- /.main_cats_block -->
	
<?php get_footer(); ?>