<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package angular-material-theme
 */
require_once 'class/class_theme_menu_walker.php';
global $material;?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!-- Angular Material style sheet -->
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.css">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> ng-app="MaterialThemeApp">
<div id="page" layout="column">
	<md-toolbar layout="row" layout-align="space-between center">
		<div class="site-branding" layout="column" layout-margin>
			<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			<div class="site-description"><?php bloginfo( 'description' ); ?></div>
		</div><!-- .site-branding -->
		<div ng-controller="MenuCtrl as ctrl"><?php
			$menu_walker = new \angular\theme\themeMenuWalker();
			// use the custom walker without wrapping items and return the items rather than echo
			$menu = wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container' => '',
					'menu_class' => '',
					'items_wrap' => '%3$s',
					'walker' => $menu_walker,
					'echo' => false
				)
			); ?>
			<md-menu>
				<md-button aria-label="Open primary menu" ng-click="ctrl.openMenu($mdOpenMenu, $event)">
					Primary Menu
				</md-button>
				<md-menu-content width="4">
					<?php echo $menu;?>
				</md-menu-content>
			</md-menu>

		</div><!-- #site-navigation -->
	</md-toolbar>

	<md-content id="content" class="site-content" layout-padding>


