<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package angular-material-theme
 */

$utility = new \angular\theme\utility();
$format = get_post_format($post->ID);
switch($format){
	case 'image':?>
		<div layout="row" layout-align="center center">
			<div class="md-whiteframe-1dp" layout="column">
				<img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>"/>
				<md-subheader><?php the_title() ?></md-subheader>
			</div>
		</div><?php
		break;
	default:?>
		<article id="post-<?php the_ID();?>" <?php post_class();?>>
			<header class="entry-header"><?php
				the_title( '<h1 class="entry-title">', '</h1>' );?>
				<div class="entry-meta"><?php
					$utility->postedOn();?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

			<div class="entry-content"><?php
				the_content();
				wp_link_pages(array(
					'before' => '<div class="page-links">'.esc_html__('Pages:', 'angular-material'),
					'after' => '</div>',
				));?>
			</div><!-- .entry-content -->

			<footer class="entry-footer"><?php
				$utility->entryFooter();?>
			</footer><!-- .entry-footer -->
		</article><!-- #post-## --><?php
		break;
}?>



