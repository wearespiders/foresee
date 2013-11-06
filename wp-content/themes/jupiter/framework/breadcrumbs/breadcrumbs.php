<?php
/**
 * Plugin Name: Breadcumbs Plus
 * Plugin URI: http://snippets-tricks.org/proyectos/breadcrumbs-plus-plugin/
 * Description: Breadcrumbs Plus provide links back to each previous page the user navigated through to get to the current page or-in hierarchical site structures-the parent pages of the current one.
 * Version: 0.4
 * Author: Luis Alberto Ochoa Esparza
 * Author URI: http://luisalberto.org
 * License: GPL2
 * 
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume 
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write 
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 * 
 * @package Breadcrumbs Plus
 * @version 0.4
 * @author Luis Alberto Ochoa Esparza <soy@luisalberto.org>
 * @copyright Copyright (c) 2010-2011, Luis Alberto Ochoa
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Poedit is a good tool to for translating.
 * 
 * @link http://poedit.net
 * @since 0.1
 */

/**
 * Shows a breadcrumb for all types of pages.
 *
 * @since 0.1
 * @param array $args
 * @return string
 */
function mk_breadcrumbs_plus( $args = '' ) {

	/* Set up the default arguments for the breadcrumb. */
	$defaults = array(
		'prefix' => '<p>',
		'suffix' => '</p>',
		'title' => __( 'You are here: ', 'mk_framework' ),
		'home' => __( 'Home', 'mk_framework' ),
		'separator' => '',
		'front_page' => false,
		'show_blog' => true,
		'singular_post_taxonomy' => 'category',
		'echo' => true,
	);



	$args = apply_filters( 'breadcrumbs_plus_args', $args );

	$args = wp_parse_args( $args, $defaults );

	if ( is_front_page() && !$args['front_page'] )
		return apply_filters( 'mk_breadcrumbs_plus', false );

	/* Format the title. */
	$title = ( !empty( $args['title'] ) ? '<span class="breadcrumbs-title">' . $args['title'] . '</span>': '' );

	$separator = "<span class='separator'>/</span>";

	/* Get the items. */
	$items = breadcrumbs_plus_get_items( $args );

	$breadcrumbs = '<div id="mk-breadcrumbs">';
	$breadcrumbs .= $args['prefix'];
	$breadcrumbs .= $title;
	$breadcrumbs .= join( " {$separator} ", $items );
	$breadcrumbs .= $args['suffix'];
	$breadcrumbs .= '</div>';

	$breadcrumbs = apply_filters( 'mk_breadcrumbs_plus', $breadcrumbs );

	if ( !$args['echo'] )
		return $breadcrumbs;
	else
		echo $breadcrumbs;
}

/**
 * Gets the items for the breadcrumbs plus.
 *
 * @since 0.4
 */
function breadcrumbs_plus_get_items( $args ) {
	global $wp_query;
	$item = array();

	$show_on_front = get_option( 'show_on_front' );

	/* Front page. */
	if ( is_front_page() ) {
		$item['last'] = $args['home'];
	}

	/* Link to front page. */
	if ( !is_front_page() )
		$item[] = '<a href="'. home_url( '/' ) .'" class="home">' . $args['home'] . '</a>';


	/* If bbPress is installed and we're on a bbPress page. */
	if ( function_exists( 'is_bbpress' ) && is_bbpress() )
		$item = array_merge( $item, breadcrumbs_plus_get_bbpress_items() );

	/* If viewing a home/post page. */
	elseif ( is_home() ) {
		$home_page = get_page( $wp_query->get_queried_object_id() );
		$item = array_merge( $item, breadcrumbs_plus_get_parents( $home_page->post_parent ) );
		$item['last'] = get_the_title( $home_page->ID );
	}

	/* If viewing a singular post. */
	elseif ( is_singular() ) {

		$post = $wp_query->get_queried_object();
		$post_id = (int) $wp_query->get_queried_object_id();
		$post_type = $post->post_type;

		$post_type_object = get_post_type_object( $post_type );

		
		if ( 'page' !== $wp_query->post->post_type ) {

			/* If there's an archive page, add it. */
			if ( function_exists( 'get_post_type_archive_link' ) && !empty( $post_type_object->has_archive ) )
				$item[] = '<a href="' . get_post_type_archive_link( $post_type ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '">' . $post_type_object->labels->name . '</a>';

			if ( isset( $args["singular_{$wp_query->post->post_type}_taxonomy"] ) && is_taxonomy_hierarchical( $args["singular_{$wp_query->post->post_type}_taxonomy"] ) ) {
				$terms = wp_get_object_terms( $post_id, $args["singular_{$wp_query->post->post_type}_taxonomy"] );
				$item = array_merge( $item, breadcrumbs_plus_get_term_parents( $terms[0], $args["singular_{$wp_query->post->post_type}_taxonomy"] ) );
			}

			elseif ( isset( $args["singular_{$wp_query->post->post_type}_taxonomy"] ) )
				$item[] = get_the_term_list( $post_id, $args["singular_{$wp_query->post->post_type}_taxonomy"], '', ', ', '' );
		}

		if ( ( is_post_type_hierarchical( $wp_query->post->post_type ) || 'attachment' === $wp_query->post->post_type ) && $parents = breadcrumbs_plus_get_parents( $wp_query->post->post_parent ) ) {
			$item = array_merge( $item, $parents );
		}

		$item['last'] = get_the_title();
	}

	/* If viewing any type of archive. */
	else if ( is_archive() ) {
		
		
		if ( is_category() || is_tag() || is_tax() ) {

			$term = $wp_query->get_queried_object();
			$taxonomy = get_taxonomy( $term->taxonomy );

			if ( ( is_taxonomy_hierarchical( $term->taxonomy ) && $term->parent ) && $parents = breadcrumbs_plus_get_term_parents( $term->parent, $term->taxonomy ) )
				$item = array_merge( $item, $parents );

			$item['last'] = $term->name;
		}

		else if ( function_exists( 'is_post_type_archive' ) && is_post_type_archive() ) {
			$post_type_object = get_post_type_object( get_query_var( 'post_type' ) );
			$item['last'] = $post_type_object->labels->name;
		}

		else if ( is_date() ) {

			if(is_numeric(get_query_var('w') && 0 !== get_query_var('w') ))
				$item['last'] =  sprintf( __('Weekly Archive for: "%s"','mk_framework'),get_the_time('W'));
			elseif ( is_day() )
				$item['last'] = sprintf( __('Daily Archive for: "%s"','mk_framework'),get_the_time('F jS, Y'));
			elseif ( is_month() )
				$item['last'] =  sprintf( __('Monthly Archive for: "%s"','mk_framework'),get_the_time('F jS, Y'));
			elseif ( is_year() )
				$item['last'] =  sprintf(__('Yearly Archive for: "%s"','mk_framework'),get_the_time('Y'));
		}

		else if ( is_author() )
			$item['last'] =  sprintf(__('Author Archive for: "%s"','mk_framework'),get_the_author_meta( 'display_name', $wp_query->post->post_author ));
	}

	/* If viewing search results. */
	else if ( is_search() )
		$item['last'] =  sprintf(__('Search Results for: "%s"','mk_framework'),stripslashes( strip_tags( get_search_query() ) ));

	/* If viewing a 404 error page. */
	else if ( is_404() )
		$item['last'] = __( 'Page Not Found', 'mk_framework' );


	return apply_filters( 'breadcrumbs_plus_items', $item );
}

/**
 * Gets the items for the breadcrumb item if bbPress is installed.
 *
 * @since 0.4
 *
 * @param array $args Mixed arguments for the menu.
 * @return array List of items to be shown in the item.
 */
function breadcrumbs_plus_get_bbpress_items( $args = array() ) {

	$item = array();

	$post_type_object = get_post_type_object( bbp_get_forum_post_type() );

	if ( !empty( $post_type_object->has_archive ) && !bbp_is_forum_archive() )
		$item[] = '<a href="' . get_post_type_archive_link( bbp_get_forum_post_type() ) . '">' . bbp_get_forum_archive_title() . '</a>';

	if ( bbp_is_forum_archive() )
		$item[] = bbp_get_forum_archive_title();

	elseif ( bbp_is_topic_archive() )
		$item[] = bbp_get_topic_archive_title();

	elseif ( bbp_is_single_view() )
		$item[] = bbp_get_view_title();

	elseif ( bbp_is_single_topic() ) {

		$topic_id = get_queried_object_id();

		$item = array_merge( $item, breadcrumbs_plus_get_parents( bbp_get_topic_forum_id( $topic_id ) ) );

		if ( bbp_is_topic_split() || bbp_is_topic_merge() || bbp_is_topic_edit() )
			$item[] = '<a href="' . bbp_get_topic_permalink( $topic_id ) . '">' . bbp_get_topic_title( $topic_id ) . '</a>';
		else
			$item[] = bbp_get_topic_title( $topic_id );

		if ( bbp_is_topic_split() )
			$item[] = __( 'Split', 'mk_framework' );

		elseif ( bbp_is_topic_merge() )
			$item[] = __( 'Merge', 'mk_framework' );

		elseif ( bbp_is_topic_edit() )
			$item[] = __( 'Edit', 'mk_framework' );
	}

	elseif ( bbp_is_single_reply() ) {

		$reply_id = get_queried_object_id();

		$item = array_merge( $item, breadcrumbs_plus_get_parents( bbp_get_reply_topic_id( $reply_id ) ) );

		if ( !bbp_is_reply_edit() ) {
			$item[] = bbp_get_reply_title( $reply_id );

		} else {
			$item[] = '<a href="' . bbp_get_reply_url( $reply_id ) . '">' . bbp_get_reply_title( $reply_id ) . '</a>';
			$item[] = __( 'Edit', 'mk_framework' );
		}

	}

	elseif ( bbp_is_single_forum() ) {

		$forum_id = get_queried_object_id();
		$forum_parent_id = bbp_get_forum_parent_id( $forum_id );

		if ( 0 !== $forum_parent_id)
			$item = array_merge( $item, breadcrumbs_plus_get_parents( $forum_parent_id ) );

		$item[] = bbp_get_forum_title( $forum_id );
	}

	elseif ( bbp_is_single_user() || bbp_is_single_user_edit() ) {

		if ( bbp_is_single_user_edit() ) {
			$item[] = '<a href="' . bbp_get_user_profile_url() . '">' . bbp_get_displayed_user_field( 'display_name' ) . '</a>';
			$item[] = __( 'Edit', 'mk_framework'  );
		} else {
			$item[] = bbp_get_displayed_user_field( 'display_name' );
		}
	}

	return apply_filters( 'breadcrumbs_plus_get_bbpress_items', $item, $args );
}

/**
 * Gets parent pages of any post type.
 *
 * @since 0.1
 * @param int $post_id ID of the post whose parents we want.
 * @param string $separator.
 * @return string $html String of parent page links.
 */
function breadcrumbs_plus_get_parents( $post_id = '', $separator = '/' ) {

	$parents = array();

	if ( $post_id == 0 )
		return $parents;

	while ( $post_id ) {
		$page = get_page( $post_id );
		$parents[]  = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . get_the_title( $post_id ) . '</a>';
		$post_id = $page->post_parent;
	}

	if ( $parents )
		$parents = array_reverse( $parents );

	return $parents;
}

/**
 * Searches for term parents of hierarchical taxonomies.
 *
 * @since 0.1
 * @param int $parent_id The ID of the first parent.
 * @param object|string $taxonomy The taxonomy of the term whose parents we want.
 * @return string $html String of links to parent terms.
 */
function breadcrumbs_plus_get_term_parents( $parent_id = '', $taxonomy = '', $separator = '/' ) {

	$html = array();
	$parents = array();

	if ( empty( $parent_id ) || empty( $taxonomy ) )
		return $parents;

	while ( $parent_id ) {
		$parent = get_term( $parent_id, $taxonomy );
		$parents[] = '<a href="' . get_term_link( $parent, $taxonomy ) . '" title="' . esc_attr( $parent->name ) . '">' . $parent->name . '</a>';
		$parent_id = $parent->parent;
	}

	if ( $parents )
		$parents = array_reverse( $parents );

	return $parents;
}
