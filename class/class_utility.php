<?php
namespace angular\theme;

class utility{

    public function __construct()
    {

    }

    public function registerActions()
    {
        add_action('edit_category', array($this, 'categoryTransientFlusher'));
        add_action('save_post', array($this, 'categoryTransientFlusher'));
    }

    /**
     * Custom template tags for this theme.
     *
     * Eventually, some of the functionality here could be replaced by core features.
     *
     * @package angular-material-theme
     */


    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function postedOn() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( 'c' ) ),
            esc_html( get_the_modified_date() )
        );

        $posted_on = sprintf(
            esc_html_x( 'Posted on %s', 'post date', 'angular-material' ),
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );

        $byline = sprintf(
            esc_html_x( 'by %s', 'post author', 'angular-material' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

    }

    function getPostedTime(){
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="updated" datetime="%1$s">%2$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_modified_date( 'c' ) ),
            esc_html( get_the_modified_date() )
        );
        return $time_string;
    }

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function entryFooter() {
        $utility = new \angular\theme\utility();
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( ', ', 'angular-material' ) );
            if ( $categories_list && $utility->categorizedBlog() ) {
                printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'angular-material' ) . '</span>', $categories_list ); // WPCS: XSS OK.
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', esc_html__( ', ', 'angular-material' ) );
            if ( $tags_list ) {
                printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'angular-material' ) . '</span>', $tags_list ); // WPCS: XSS OK.
            }
        }

        if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            comments_popup_link( esc_html__( 'Leave a comment', 'angular-material' ), esc_html__( '1 Comment', 'angular-material' ), esc_html__( '% Comments', 'angular-material' ) );
            echo '</span>';
        }

        edit_post_link(
            sprintf(
            /* translators: %s: Name of current post */
                esc_html__( 'Edit %s', 'angular-material' ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }

    /**
     * Returns true if a blog has more than 1 category.
     *
     * @return bool
     */
    function categorizedBlog() {
        if ( false === ( $all_the_cool_cats = get_transient( 'angular_material_categories' ) ) ) {
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories( array(
                'fields'     => 'ids',
                'hide_empty' => 1,

                // We only need to know if there is more than one category.
                'number'     => 2,
            ) );

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count( $all_the_cool_cats );

            set_transient( 'angular_material_categories', $all_the_cool_cats );
        }

        if ( $all_the_cool_cats > 1 ) {
            // This blog has more than 1 category so return true.
            return true;
        } else {
            // This blog has only 1 category so return false.
            return false;
        }
    }

    /**
     * Flush out the transients used in angular_material_categorized_blog.
     */
    function categoryTransientFlusher() {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        // Like, beat it. Dig?
        delete_transient( 'angular_material_categories' );
    }
}