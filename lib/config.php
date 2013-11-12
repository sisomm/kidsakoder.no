<?php
/**
 * Enable theme features
 */
add_theme_support('root-relative-urls');    // Enable relative URLs
add_theme_support('bootstrap-gallery');     // Enable Bootstrap's thumbnails component on [gallery]
add_theme_support('nice-search');           // Enable /?s= to /search/ redirect
add_theme_support('jquery-cdn');            // Enable to load jQuery from the Google CDN

/**
 * Configuration values
 */
define('GOOGLE_ANALYTICS_ID', ''); // UA-XXXXX-Y (Note: Universal Analytics only, not Classic Analytics)
define('POST_EXCERPT_LENGTH', 40); // Length in words for excerpt_length filter (http://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_length)


/**
 * .mobile_header classes
 */

function lkk_mobile_header_class() {
  return 'visible-xs';
}


/**
 * .side_header classes
 */

function lkk_side_header_class() {
  return 'hidden-xs col-sm-3 col-md-3 col-lg-2';
}

/**
 * .main classes
 */
function lkk_main_class() {
  if (roots_display_sidebar()) {
    // Classes on pages with the sidebar
    $class = 'col-sm-9 col-md-6 col-lg-7';
  } else {
    // Classes on full width pages
    $class = 'col-sm-9 col-md-9 col-lg-8';
  }

  return $class;
}

/**
 * .sidebar classes
 */
function lkk_sidebar_class() {
  return 'hidden-xs hidden-sm col-md-3 col-lg-3';
}

/**
 * .index classes
 */
function lkk_index_class() {
  return 'col-lg-6';
}

/**
 * Define which pages shouldn't have the sidebar
 *
 * See lib/sidebar.php for more details
 */
function roots_display_sidebar() {
  $sidebar_config = new Roots_Sidebar(
    /**
     * Conditional tag checks (http://codex.wordpress.org/Conditional_Tags)
     * Any of these conditional tags that return true won't show the sidebar
     *
     * To use a function that accepts arguments, use the following format:
     *
     * array('function_name', array('arg1', 'arg2'))
     *
     * The second element must be an array even if there's only 1 argument.
     */
    array(
      'is_404',
/*       'is_front_page' */
    ),
    /**
     * Page template checks (via is_page_template())
     * Any of these page templates that return true won't show the sidebar
     */
    array(
      'template-custom.php'
    )
  );

  return apply_filters('roots_display_sidebar', $sidebar_config->display);
}

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if (!isset($content_width)) { $content_width = 1140; }
