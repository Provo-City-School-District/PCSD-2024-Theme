<?php
defined('ABSPATH') or die('No script kiddies please!');

// Enable Featured Images
add_theme_support('post-thumbnails');

// Add Menu Support
add_theme_support('menus');
// Wordpress Menus Registration
register_nav_menus(
	array(
		'header-menu' => __('Header Menu'),
		'frontpage-categories' => __('Front Page Categories')
	)
);
/*==========================================================================================
removes the welcome panel from the dashboard page since
most users cant do the things it references anyway
============================================================================================*/
function pcsd_auto_hide_welcome()
{
	remove_action('welcome_panel', 'wp_welcome_panel');
	$user_id = get_current_user_id();
	if (1 == get_user_meta($user_id, 'show_welcome_panel', true))
		update_user_meta($user_id, 'show_welcome_panel', 0);
}
add_action('load-index.php', 'pcsd_auto_hide_welcome');

/*==========================================================================================
Remove non needed meta boxes from the dashboard page.
============================================================================================*/
function pcsd_dashboard_setup()
{

	remove_meta_box('dashboard_primary', 'dashboard', 'side'); //Wordpress Blog info
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); //At a Glance
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //Quick Draft
	remove_meta_box('tinypng_dashboard_widget', 'dashboard', 'side'); //remove compressions widget
}
add_action('wp_dashboard_setup', 'pcsd_dashboard_setup');

/*==========================================================================================
Dashboard Widgets

Can be used to announce new things to the users of the site once they Log in
============================================================================================*/

function add_custom_dashboard_widgets()
{
	$site = get_bloginfo('name');
	wp_add_dashboard_widget(
		'wpexplorer_dashboard_widget', // Widget slug.
		'Welcome to the ' . $site . ' website', // Title.
		'custom_dashboard_widget_content' // Display function.
	);
}

add_action('wp_dashboard_setup', 'add_custom_dashboard_widgets');

/**
 * Create the function to output the contents of your Dashboard Widget.
 */

function custom_dashboard_widget_content()
{
	// Display whatever it is you want to show.
	$tutorialspage = get_bloginfo('url') . '/wp-admin/admin.php?page=pcsd_tutorial-admin-page.php';
	echo "Check out our new <a href=\"" . $tutorialspage . "\">Tutorials page</a> for helpful hints on how to accomplish your desired task.";
}

/*==========================================================================================
puts a note on each dashboard page to let content managers how to contact us.
============================================================================================*/
function pcsd_change_admin_footer()
{
	echo '<span id="footer-note">For any questions don\'t hesitate to contact the District Web Team Rob Francom(robertf@provo.edu).</span>';
}
add_filter('admin_footer_text', 'pcsd_change_admin_footer');

/*==========================================================================================
Remove Version Number from WP
============================================================================================*/
remove_action('wp_head', 'wp_generator');
function wpt_remove_version()
{
	return '';
}
add_filter('the_generator', 'wpt_remove_version');

function wpbeginner_remove_version()
{
	return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');


/*==========================================================================================
add Tutorials page
============================================================================================*/
add_action('admin_menu', 'pcsd_tut_admin_menu');
function pcsd_tut_admin_menu()
{
	add_menu_page('Tutorials Dashboard', 'Tutorials', 'read', 'pcsd_tutorial-admin-page.php', 'pcsd_tutorial_admin_page', 'https://globalassets.provo.edu/image/icons/pcsd-icon-16x16.png', 4);
}
function pcsd_tutorial_admin_page()
{
	$tuts_page = curl_init();
	// set URL and other appropriate options
	curl_setopt($tuts_page, CURLOPT_URL, 'https://globalassets.provo.edu/globalpages/tutorials-page.php');
	curl_setopt($tuts_page, CURLOPT_HEADER, 0);
	// grab URL and pass it to the browser
	curl_exec($tuts_page);
	// close cURL resource, and free up system resources
	curl_close($tuts_page);
}

/*==========================================================================================
File Upload Tips
============================================================================================*/

//use post-upload-ui hook for after upload box, use pre-upload-ui hook for before upload box
add_action('post-upload-ui', 'pcsd_media_upload_tips');

function pcsd_media_upload_tips()
{
?>
	<h2>Your file will be processed by the server. This may take a few minutes depending on the size of the file.</h2>
<?php
};

/*==========================================================================================
Editor Changes
============================================================================================*/
//turn on paste_as_text by default
function change_paste_as_text($mceInit, $editor_id)
{
	//NB this has no effect on the browser's right-click context menu's paste!
	$mceInit['paste_as_text'] = true;
	return $mceInit;
}
add_filter('tiny_mce_before_init', 'change_paste_as_text', 1, 2);
