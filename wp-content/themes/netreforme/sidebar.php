<aside>

	<form method="get" name="searchform" id="searchform">
		<input type="search" placeholder="Поиск" title="Поиск" name="s" id="s" class=srch_query value='' />
		<button type="submit"></button>
	</form>

	<div class="writealetter"><a href="/anketa/"><span>Присоединиться</span></a></div>

	<?php

	/**
	 * The sidebar containing the main widget area
	 *
	 * @package WordPress
	 * @subpackage Twenty_Fifteen
	 * @since Twenty Fifteen 1.0
	 */

	if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) || is_active_sidebar( 'sidebar' )  ) : ?>


		<div id="widget-area" class="widget-area" role="complementary">

			<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>

					<?php dynamic_sidebar( 'sidebar' ); ?>

			<?php endif; ?>
			
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<?php
						// Primary navigation menu.
/*						wp_nav_menu( array(
							'menu_class'     => 'nav-menu',
//							'theme_location' => 'primary',
							'menu_id'        => 'accordion',
							'depth'          => 2,
						) );*/
					?>

			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<h2>Следите за нами в соцсетях</h2>
					<?php
						// Social links navigation menu.
						wp_nav_menu( array(
							'theme_location' => 'social',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
					?>

			<?php endif; ?>

		</div><!-- .widget-area -->

	<?php endif; ?>

</aside>
