<?php

get_header(); ?>

<!--	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">-->
			
	<div class="main-container">
		<div class="wrapper clearfix">
			<main>
				<?php if ( have_posts() ) : ?>

					<?php if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
					<?php endif; ?>

					<?php
					// Start the loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );

					// End the loop.
					endwhile;

					// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => __( 'Назад' ),
						'next_text'          => __( 'Вперед' ),
						'end_size'     => 1,     // количество страниц на концах
						'mid_size'     => 5,     // количество страниц вокруг текущей
						'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница"
						'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
						'screen_reader_text' => '',
					) );

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'content', 'none' );

				endif;
				?>
			</main>

			<?php get_sidebar(); ?>

		</div><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
