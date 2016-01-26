<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<header class="entry-header">
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title">', '</h2>' );
				endif;
			?>
				<p class="date"> <?php echo get_the_date(); ?> </p>
			<?php	if ( $link = get_post_meta($post->ID, 'Ссылка', 1) ) : ?>
					<p class="source"><b>Источник:</b> 
						<a href="<?php echo "/away.php?page=$link"; ?>">
							<?php 
								if ( $source = get_post_meta($post->ID, 'Источник', 1) ) :
									echo $source; 
								else :
									echo $link;
								endif;
							?></a>
					</p>
			 <?php endif; ?>
			 
			 <?php if ( $author = get_post_meta($post->ID, 'Автор', 1) ) : ?>
					<p class="author"><b>Автор:</b> <?php echo $author ?> </p>
			 <?php endif; ?>

		</header><!-- .entry-header -->

		<section class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_post_thumbnail();
				the_content( sprintf(
					__( 'Continue reading %s', 'netreforme' ),
					the_title( '<span class="screen-reader-text">', '</span>', true )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
		</section><!-- .entry-content -->

		<footer class="entry-footer">
			<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->

	</article><!-- #post-## -->
