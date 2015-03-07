<?php get_header(); ?>
<div class="container" layout vertical center>
<?php if ( have_posts() ): ?>
<?php while ( have_posts() ): the_post(); ?>

				<article>
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
					<?php edit_post_link(); ?>
				</article>

<?php endwhile; ?>

<?php
        if ( get_next_posts_link() ) {
            next_posts_link();
        }
?>
<?php
        if ( get_previous_posts_link() ) {
            previous_posts_link();
        }
?>

<?php else: ?>

				<p>No posts found. :(</p>

<?php endif; ?>
			</div>
<?php get_footer(); ?>