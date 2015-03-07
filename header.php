<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>" type="text/css" />
		<script src="<?php echo get_template_directory_uri(); ?>/bower_components/webcomponentsjs/webcomponents.js"></script>

		<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/core-header-panel/core-header-panel.html">
		<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/core-icons/core-icons.html">
		<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/core-icons/communication-icons.html">
		<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/core-icons/device-icons.html">
		<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/core-toolbar/core-toolbar.html">
		<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/font-roboto/roboto.html">
		<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/paper-tabs/paper-tabs.html">
		<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/paper-button/paper-button.html">
		<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/paper-icon-button/paper-icon-button.html">
		<?php wp_head(); ?>
		<style shim-shadowdom>
		body {
			font-family: 'RobotoDraft', 'Helvetica Neue', Helvetica, Arial;
			color: #333;
			background-color: #E5E5E5;
		}

		core-header-panel {
			overflow: auto;
			-webkit-overflow-scrolling: touch;
		}

		core-toolbar h1:before {
			content: "";
			display: inline-block;
			margin-right: -8px;
		}

		core-toolbar h1 {
			font-size: 1em;
			font-weight: normal;
		}

		core-toolbar,
		paper-tabs {
			text-decoration: none;
			background-color: #00bcd4;
			color: #fff;
			box-shadow: 0px 3px 2px rgba(0, 0, 0, 0.2);
		}

		core-toolbar paper-tabs {
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
	<body fullbleed layout vertical unresolved>
		<core-header-panel flex mode="waterfall-tall" tallClass="medium-tall">
			<core-toolbar class="medium-tall">
				<core-icon icon="device:developer-mode"></core-icon>
				<h1 flex><?php bloginfo( 'name' ); ?></h1>
				<h2><?php bloginfo( 'description' ); ?></h2>
				<div class="bottom fit" horizontal layout>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'header-menu',
								'depth'          => 1,
								'container'      => false,
								'items_wrap'     => '<paper-tabs id="%1$s" class="%2$s" flex scrollable link>%3$s</paper-tabs>',
								'walker'         => new wordpolymer_walker_nav_menu(),
							)
						);
					?>
				</div>
			</core-toolbar>
