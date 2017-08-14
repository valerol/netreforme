<?php get_header(); ?>
<div class="main-container">
	<div class="wrapper clearfix">
		<main>
			<h1><?php the_title(); ?></h1>
			<?php if (have_posts()): while (have_posts()): the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</main>
		<?php get_sidebar(); ?>
	</div> <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer(); ?>
