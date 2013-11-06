<?php

/**
 * Whether the current request is in theme options pages
 * 
 * @param mixed $post_types
 * @return bool True if inside theme options pages.
 */
function theme_is_options() {
	if ('admin.php' == basename($_SERVER['PHP_SELF'])) {
		return true;
	}
	// to be add some check code for validate only in theme options pages
	return false;
}


function theme_is_menus() {
	if ('nav-menus.php' == basename($_SERVER['PHP_SELF'])) {
		return true;
	}
	// to be add some check code for validate only in theme options pages
	return false;
}



function theme_is_masterkey() {
	if(isset($_GET['page']) && $_GET['page'] == 'masterkey') {
		return true;
	}
	return false;
}
/**
 * Whether the current request is in post type pages
 * 
 * @param mixed $post_types
 * @return bool True if inside post type pages
 */
function theme_is_post_type($post_types = ''){
	if(theme_is_post_type_list($post_types) || theme_is_post_type_new($post_types) || theme_is_post_type_edit($post_types) || theme_is_post_type_post($post_types) || theme_is_post_type_taxonomy($post_types)){
		return true;
	}else{
		return false;
	}
}






/**
 * Whether the current request is in post type list page
 * 
 * @param mixed $post_types
 * @return bool True if inside post type list page
 */
function theme_is_post_type_list($post_types = '') {
	if ('edit.php' != basename($_SERVER['PHP_SELF'])) {
		return false;
	}
	if ($post_types == '') {
		return true;
	} else {
		$check = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_POST['post_type']) ? $_POST['post_type'] : 'post');
		if (is_string($post_types) && $check == $post_types) {
			return true;
		} elseif (is_array($post_types) && in_array($check, $post_types)) {
			return true;
		}
		return false;
	}
}

/**
 * Whether the current request is in post type new page
 * 
 * @param mixed $post_types
 * @return bool True if inside post type new page
 */
function theme_is_post_type_new($post_types = '') {
	if ('post-new.php' != basename($_SERVER['PHP_SELF'])) {
		return false;
	}
	if ($post_types == '') {
		return true;
	} else {
		$check = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_POST['post_type']) ? $_POST['post_type'] : 'post');
		if (is_string($post_types) && $check == $post_types) {
			return true;
		} elseif (is_array($post_types) && in_array($check, $post_types)) {
			return true;
		}
		return false;
	}
}
/**
 * Whether the current request is in post type post page
 * 
 * @param mixed $post_types
 * @return bool True if inside post type post page
 */
function theme_is_post_type_post($post_types = '') {
	if ('post.php' != basename($_SERVER['PHP_SELF'])) {
		return false;
	}
	if ($post_types == '') {
		return true;
	} else {
		$post = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post']) ? $_POST['post'] : false);
		$check = get_post_type($post);
		
		if (is_string($post_types) && $check == $post_types) {
			return true;
		} elseif (is_array($post_types) && in_array($check, $post_types)) {
			return true;
		}
		return false;
	}
}
/**
 * Whether the current request is in post type edit page
 * 
 * @param mixed $post_types
 * @return bool True if inside post type edit page
 */
function theme_is_post_type_edit($post_types = '') {
	if ('post.php' != basename($_SERVER['PHP_SELF'])) {
		return false;
	}
	$action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');
	if ('edit' != $action) {
		return false;
	}
	
	if ($post_types == '') {
		return true;
	} else {
		$post = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post']) ? $_POST['post'] : false);
		$check = get_post_type($post);
		
		if (is_string($post_types) && $check == $post_types) {
			return true;
		} elseif (is_array($post_types) && in_array($check, $post_types)) {
			return true;
		}
		return false;
	}
}
/**
 * Whether the current request is in post type taxonomy pages
 * 
 * @param mixed $post_types
 * @return bool True if inside post type taxonomy pages
 */
function theme_is_post_type_taxonomy($post_types = '') {
	if ('edit-tags.php' != basename($_SERVER['PHP_SELF'])) {
		return false;
	}
	if ($post_types == '') {
		return true;
	} else {
		$check = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_POST['post_type']) ? $_POST['post_type'] : 'post');
		if (is_string($post_types) && $check == $post_types) {
			return true;
		} elseif (is_array($post_types) && in_array($check, $post_types)) {
			return true;
		}
		return false;
	}
}


/**
 * If we go beyond the last page and request a page that doesn't exist,
 * force WordPress to return a 404.
 * See http://core.trac.wordpress.org/ticket/15770
 */
function custom_paged_404_fix( ) {
    global $wp_query;
    if ( is_404() || !is_paged() || 0 != count( $wp_query->posts ) )
        return;
    $wp_query->set_404();
    status_header( 404 );
    nocache_headers();
}
add_action( 'wp', 'custom_paged_404_fix' );
