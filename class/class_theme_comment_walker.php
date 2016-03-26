<?php

namespace angular\theme;

class themeCommentWalker extends \Walker_Comment
{
    var $tree_type = 'comment';
    var $db_fields = array('parent' => 'comment_parent', 'id' => 'comment_ID');

    // constructor – wrapper for the comments list
    function __construct()
    {?>
        <div class="comments-list"><?php
    }

    // start_lvl – wrapper for child comments list
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth + 2; ?>

        <div class="child-comments comments-list"><?php
    }

    // end_lvl – closing wrapper for child comments list
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth + 2; ?>
        </div><?php
    }

    // start_el – HTML for comment template
    function start_el(&$output, $comment, $depth = 0, $args = array(), $id = 0)
    {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = (empty($args['has_children']) ? '' : 'parent');
        if('article' == $args['style']){
            $tag = 'article';
            $add_below = 'comment';
        }else{
            $tag = 'article';
            $add_below = 'comment';
        }?>
        <md-card <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
            <md-card-header>
                <md-card-avatar><?php
                    echo get_avatar($comment, 65);?>
                </md-card-avatar>
                <md-card-header-text>
                    <span class="md-title">
                        <a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php
                            comment_author(); ?>
                        </a>
                    </span>
                    <span class="md-subhead">
                        <time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php
                            comment_date('jS F Y') ?>, <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time() ?></a>
                        </time>
                    </span>
                </md-card-header-text>
            </md-card-header>
            <md-card-content><?php
                edit_comment_link('<div class="comment-meta-item">Edit this comment</div>', '', '');
                if ($comment->comment_approved == '0'):?>
                    <div class="comment-meta-item">Your comment is awaiting moderation.</div><?php
                endif;?>
                <div class="comment-content post-content" itemprop="text"><?php
                    comment_text();
                    comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])));?>
                </div>
            </md-card-content><?php
    }

    // end_el – closing HTML for comment template
    function end_el(&$output, $comment, $depth = 0, $args = array()){ ?>
        </md-card><?php
    }

    // destructor – closing wrapper for the comments list
    function __destruct()
    { ?>
        </div><?php
    }
}
?>