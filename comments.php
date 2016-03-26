<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package angular-material-theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
require_once get_template_directory().'/class/class_theme_comment_walker.php';

if(post_password_required())
    return; ?>

<div id="comments" class="comments-area" layout="column" style="margin-top: 10px;"><?php
    if(have_comments()):?>
        <md-subheader class="comments-title"><?php
        printf( // WPCS: XSS OK.
            esc_html(_nx('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'angular-material')),
            number_format_i18n(get_comments_number()),
            '<span>' . get_the_title() . '</span>'
        );?>
        </md-subheader><?php
        if (get_comment_pages_count() > 1 && get_option('page_comments')):?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'angular-material'); ?></h2>
                <div class="nav-links">
                    <div class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments', 'angular-material')); ?></div>
                    <div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments', 'angular-material')); ?></div>
                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-above --><?php
        endif; // Check for comment navigation.
        $comment_walker = new \angular\theme\themeCommentWalker();
        $args = array(
            'walker'            => $comment_walker,
//            'max_depth'         => '',
            'style'             => 'div',
//            'callback'          => null,
//            'end-callback'      => null,
//            'type'              => 'all',
//            'reply_text'        => 'Reply',
//            'page'              => '',
//            'per_page'          => '',
//            'avatar_size'       => 32,
//            'reverse_top_level' => null,
//            'reverse_children'  => '',
//            'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
//            'short_ping'        => false,   // @since 3.6
//            'echo'              => true     // boolean, default is true
        );
        wp_list_comments($args);
        if (get_comment_pages_count() > 1 && get_option('page_comments')):?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'angular-material'); ?></h2>
                <div class="nav-links">

                    <div
                        class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments', 'angular-material')); ?></div>
                    <div
                        class="nav-next"><?php next_comments_link(esc_html__('Newer Comments', 'angular-material')); ?></div>

                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-below --><?php
        endif; // Check for comment navigation.
    endif; // Check for have_comments().

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')):?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'angular-material'); ?></p><?php
    endif;
    comment_form(); ?>
</div><!-- #comments -->
