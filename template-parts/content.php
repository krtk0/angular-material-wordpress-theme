<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package angular-material-theme
 */

$utility = new \angular\theme\utility(); ?>

<md-card flex-gt-md="30" flex-md="48" flex-xs="100">
	<md-card-header>
		<md-card-avatar><?php
			echo get_avatar($post->post_author, 96, 'Mystery Man', false, array( 'class' => 'md-user-avatar' ));?>
		</md-card-avatar>
		<md-card-header-text>
			<span class="md-title"><?php echo get_the_author();?></span>
			<span class="md-subhead"><?php echo $utility->getPostedTime();?></span>
		</md-card-header-text>
	</md-card-header>
	<md-card-title>
		<md-card-title-text>
			<span class="md-headline">
				<a href="<?php echo get_permalink();?>"><?php the_title(); ?></a>
			</span>
		</md-card-title-text>
	</md-card-title>
	<md-card-content layout="column">
		<div layout="column" layout-gt-md="row">
			<div class="md-media-large card-media"><?php the_post_thumbnail('thumbnail'); ?></div>
			<div layout-padding><?php
				the_excerpt();?>
			</div><?php
			wp_link_pages(array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'angular-material'),
				'after' => '</div>',
			)); ?>
		</div>
		<md-button aria-label="Read More" href="<?php echo esc_url(get_permalink());?>">
			Read More
		</md-button>
	</md-card-content>
</md-card>
