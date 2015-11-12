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
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<style shim-shadowdom>
	body {
		font-family: 'RobotoDraft', 'Helvetica Neue', Helvetica, Arial;
		color: #333;
		background-color: #E5E5E5;
	}

	paper-header-panel {
		overflow: auto;
		-webkit-overflow-scrolling: touch;
	}

	paper-toolbar h1:before {
		content: "";
		display: inline-block;
		margin-right: -8px;
	}

	paper-toolbar h1 {
		font-size: 1em;
		font-weight: normal;
	}

	paper-toolbar,
	paper-tabs {
		text-decoration: none;
		background-color: #00bcd4;
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
	<paper-header-panel class="flex" mode="waterfall-tall" tallClass="medium-tall">
		<paper-toolbar class="medium-tall">
			<h1 flex><?php bloginfo( 'name' ); ?></h1>
			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ): ?>
			<h2><?php echo $description; ?></h2>
			<?php endif; ?>

			<div class="bottom fit" horizontal layout>
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<?php
					wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
							'depth'          => 1,
							'container'      => false,
							'items_wrap'     => '<paper-tabs id="%1$s" class="%2$s" flex scrollable link>%3$s</paper-tabs>',
							'walker'         => new wordpolymer_walker_nav_menu(),
					) );
				?>
				<?php endif; ?>
			</div>
		</paper-toolbar>
