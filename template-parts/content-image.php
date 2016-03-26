<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package angular-material-theme
 */

$utility = new \angular\theme\utility();
$image_url = esc_attr(wp_get_attachment_url(get_post_thumbnail_id($post->ID)));?>
<md-card flex-xs="100">
    <md-card-header>
        <md-card-avatar><?php
            echo get_avatar($post->post_author, 96, 'Mystery Man', false, array( 'class' => 'md-user-avatar' ));?>
        </md-card-avatar>
        <md-card-header-text>
            <span class="md-title"><?php echo get_the_author();?></span>
            <span class="md-subhead"><?php echo $utility->getPostedTime();?></span>
        </md-card-header-text>
    </md-card-header>
    <div layout="row" layout-align="center center">
        <a href="<?php echo the_permalink();?>"><img src="<?php echo $image_url;?>" alt="" class="md-card-image" /></a>
    </div>
    <md-card-title>
        <md-card-title-text>
            <span class="md-headline"><a href="<?php echo the_permalink();?>"><?php echo $post->post_title;?></a></span>
        </md-card-title-text>
    </md-card-title>
</md-card>

