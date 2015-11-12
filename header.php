<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<style is="custom-style">
	body {
		font-family: 'RobotoDraft', 'Helvetica Neue', Helvetica, Arial;
		color: #333;
		background-color: #E5E5E5;
	}

	paper-toolbar,
	paper-tabs {
		text-decoration: none;
		background-color: var(--paper-light-blue-500);
		color: #fff;
		box-shadow: 0px 3px 2px rgba(0, 0, 0, 0.2);
	}

	paper-toolbar paper-tabs {
		box-shadow: none;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		text-transform: uppercase;
	}

	.container {
		width: 80%;
		margin: 50px auto;
	}

	article {
		display: block;
		position: relative;
		background-color: white;
		padding: 20px;
		width: 100%;
		font-size: 1.2rem;
		font-weight: 300;
		margin-bottom: 30px;
	}
	</style>
</head>
<body class="fullbleed layout vertical" unresolved>
	<paper-header-panel class="flex" mode="waterfall-tall" tall-class="medium-tall">
		<paper-toolbar class="medium-tall">
			<div class="flex"><?php bloginfo( 'name' ); ?></div>
			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ): ?>
			<span><?php echo $description; ?></span>
			<?php endif; ?>

			<div class="bottom fit">
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<?php
					wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu scrollable',
							'depth'          => 1,
							'container'      => false,
							'items_wrap'     => '<paper-tabs id="%1$s" class="%2$s">%3$s</paper-tabs>',
							'walker'         => new wordpolymer_walker_nav_menu(),
					) );
				?>
				<?php endif; ?>
			</div>
		</paper-toolbar>
