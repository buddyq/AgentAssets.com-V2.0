<?php   
/**
* A unique identifier is defined to store the options in the database and reference them from the theme.
* By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
* If the identifier changes, it'll appear as if the options have been reset.
*
*/

function aveone_option_name() {

// This gets the theme name from the stylesheet (lowercase and without spaces)
$themename = wp_get_theme();
$themename = $themename['Name'];
$themename = preg_replace("/\W/", "", strtolower($themename) );

$aveone_settings = get_option('aveone');
$aveone_settings['id'] = 'aveone-theme';
update_option('aveone', $aveone_settings); 

}

/**
* Defines an array of options that will be used to generate the settings page and be saved in the database.
* When creating the "id" fields, make sure to use all lowercase and no spaces.
*
*/

function aveone_options() {


// Pull all the categories into an array
$options_categories = array();
$options_categories_obj = get_categories();
foreach ($options_categories_obj as $category) {
$options_categories[$category->cat_ID] = $category->cat_name;
}

// Pull all the pages into an array
$options_pages = array();
$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
$options_pages[''] = 'Select a page:';
foreach ($options_pages_obj as $page) {
$options_pages[$page->ID] = $page->post_title;
}

// If using image radio buttons, define a directory path
$imagepath = get_template_directory_uri() . '/library/functions/images/';
$imagepathfolder = get_template_directory_uri() . '/library/media/images/';
$aveone_shortname = "evl";
$template_url = get_template_directory_uri();

$options = array();


// Layout
/*
$options[] = array( "name" => $aveone_shortname."-tab-1", "id" => $aveone_shortname."-tab-1",
"type" => "open-tab");

// Favicon Option @since 3.1.5
$options['evl_favicon'] = array(
"name" => __( 'Custom Favicon', 'aveone' ),
"desc" => __( 'Upload custom favicon.', 'aveone' ),
"id" => $aveone_shortname."_favicon",
"type" => "upload"
);

$options['evl_layout'] = array( 
"name" => __( 'Select a layout', 'aveone' ),
"desc" => __( 'Select main content and sidebar alignment.', 'aveone' ),
"id" => $aveone_shortname."_layout",
"std" => "2cl",
"type" => "images",
"options" => array(
'1c' => $imagepath . '1c.png',
'2cl' => $imagepath . '2cl.png',
'2cr' => $imagepath . '2cr.png',
'3cm' => $imagepath . '3cm.png',
'3cr' => $imagepath . '3cr.png',
'3cl' => $imagepath . '3cl.png'
)
);

$options['evl_width_layout'] = array( 
"name" => __( 'Layout Style', 'aveone' ),
"desc" => __( '<strong>Boxed version</strong> automatically enables custom background', 'aveone' ),
"id" => $aveone_shortname."_width_layout",
"std" => "fixed",
"type" => "select",
"options" => array(
'fixed' => __( 'Boxed &nbsp;&nbsp;&nbsp;(default)', 'aveone' ),
'fluid' => __( 'Wide', 'aveone' )
)
);

$options['evl_width_px'] = array( 
"name" => __( 'Layout Width', 'aveone' ),
"desc" => __( 'Select the width for your website', 'aveone' ),
"id" => $aveone_shortname."_width_px",
"std" => "1200",
"type" => "text",

);



$options[] = array( "name" => $aveone_shortname."-tab-1", "id" => $aveone_shortname."-tab-1",
"type" => "close-tab" );



// Posts

$options[] = array( "name" => $aveone_shortname."-tab-2", "id" => $aveone_shortname."-tab-2",
"type" => "open-tab");



$options['evl_post_layout'] = array( "name" => __( 'Blog layout', 'aveone' ),
"desc" => __( 'Grid layout with <strong>3</strong> posts per row is recommended to use with disabled <strong>Sidebar(s)</strong>', 'aveone' ),
"id" => $aveone_shortname."_post_layout",
"type" => "images",
"std" => "two",
"options" => array(
'one' => $imagepath . 'one-post.png',
'two' => $imagepath . 'two-posts.png',
'three' => $imagepath . 'three-posts.png',
));

$options['evl_excerpt_thumbnail'] = array( "name" => __( 'Enable post excerpts', 'aveone' ),
"desc" => __( 'Check this box if you want to display post excerpts on one column blog layout', 'aveone' ),
"id" => $aveone_shortname."_excerpt_thumbnail",
"type" => "checkbox",
"std" => "0");

$options['evl_featured_images'] = array( "name" => __( 'Enable featured images', 'aveone' ),
"desc" => __( 'Check this box if you want to display featured images', 'aveone' ),
"id" => $aveone_shortname."_featured_images",
"type" => "checkbox",
"std" => "1");

$options['evl_blog_featured_image'] = array( "name" => __( 'Enable featured image on Single Blog Posts', 'aveone' ),
"desc" => __( 'Check this box if you want to display featured image on Single Blog Posts', 'aveone' ),
"id" => $aveone_shortname."_blog_featured_image",
"type" => "checkbox",
"std" => "0");
    
$options['evl_thumbnail_default_images'] = array( "name" => __( 'Hide default thumbnail images', 'aveone' ),
"desc" => __( 'Check this box if you don\'t want to display default thumbnail images', 'aveone' ),
"id" => $aveone_shortname."_thumbnail_default_images",
"type" => "checkbox",
"std" => "0");
    

$options['evl_author_avatar'] = array( "name" => __( 'Enable post author avatar', 'aveone' ),
"desc" => __( 'Check this box if you want to display post author avatar', 'aveone' ),
"id" => $aveone_shortname."_author_avatar",
"type" => "checkbox",
"std" => "0");

$options['evl_posts_excerpt_title_length'] = array( "name" => __( 'Post Title Excerpt Length', 'aveone' ),
"desc" => __( 'Enter number of characters for Post Title Excerpt. This works only if a grid layout is enabled.', 'aveone' ),
"id" => $aveone_shortname."_posts_excerpt_title_length",
"type" => "text",
"std" => "40"
);   

$options['evl_header_meta'] = array( "name" => __( 'Post meta header placement', 'aveone' ),
"desc" => __( 'Choose placement of the post meta header - Date, Author, Comments', 'aveone' ),
"id" => $aveone_shortname."_header_meta",
"type" => "select",
"std" => "single_archive",
"options" => array(
'single_archive' => __( 'Single posts + Archive pages &nbsp;&nbsp;&nbsp;(default)', 'aveone' ),
'single' => __( 'Single posts', 'aveone' ),
'disable' => __( 'Disable', 'aveone' )
));

$options['evl_category_page_title'] = array( "name" => __( 'Category Page Title', 'aveone' ),
"desc" => __( 'Enable page title in category pages ?', 'aveone' ),
"id" => $aveone_shortname."_category_page_title",
"type" => "select",
"std" => "1",
"options" => array(
"1" => __( 'Enable', 'aveone' ),
"0" => __( 'Disable', 'aveone' )
));

$options['evl_share_this'] = array( "name" => __( '\'Share This\' buttons placement', 'aveone' ),
"desc" => __( 'Choose placement of the \'Share This\' buttons', 'aveone' ),
"id" => $aveone_shortname."_share_this",
"type" => "select",
"std" => "single",
"options" => array(
'single' => __( 'Single posts &nbsp;&nbsp;&nbsp;(default)', 'aveone' ),
'single_archive' => __( 'Single posts + Archive pages', 'aveone' ),
'all' => __( 'All pages', 'aveone' ),
'disable' => __( 'Disable', 'aveone' )
));

$options['evl_post_links'] = array( "name" => __( 'Position of previous/next posts links', 'aveone' ),
"desc" => __( 'Choose the position of the <strong>Previous/Next Post</strong> links', 'aveone' ),
"id" => $aveone_shortname."_post_links",
"type" => "select",
"std" => "after",
"options" => array(
'after' => __( 'After posts &nbsp;&nbsp;&nbsp;(default)', 'aveone' ),
'before' => __( 'Before posts', 'aveone' ),
'both' => __( 'Both', 'aveone' )
));

$options['evl_similar_posts'] = array( "name" => __( 'Display Similar posts', 'aveone' ),
"desc" => __( 'Choose if you want to display <strong>Similar posts</strong> in articles', 'aveone' ),
"id" => $aveone_shortname."_similar_posts",
"type" => "select",
"std" => "disable",
"options" => array(
'disable' => __( 'Disable &nbsp;&nbsp;&nbsp;(default)', 'aveone' ),
'category' => __( 'Match by categories', 'aveone' ),
'tag' => __( 'Match by tags', 'aveone' )
));

$options['evl_pagination_type'] = array( "name" => __( 'Pagination Type', 'aveone' ),
"desc" => __( 'Select the pagination type for the assigned blog page in Settings > Reading.', 'aveone' ),
"id" => $aveone_shortname."_pagination_type",
"type" => "select",
"std" => "pagination",
"options" => array(
'pagination' => __( 'Pagination', 'aveone' ),
'infinite' => __( 'Infinite Scroll', 'aveone' )
));

$options[] = array( "name" => $aveone_shortname."-tab-2", "id" => $aveone_shortname."-tab-2",
"type" => "close-tab" );
*/

// Subscribe buttons

$options[] = array( "name" => $aveone_shortname."-tab-2", "id" => $aveone_shortname."-tab-2",
"type" => "open-tab");

$options['evl_social_media_note'] = array( "name" => __( 'Note:', 'aveone' ),
"desc" => "Click Here to add social media links.",
"id" => $aveone_shortname."_social_media_note",
"type" => "note-for-social-media",
"std" => ''
);

/*
// Facebook

$options['evl_facebook'] = array( "name" => __( 'Facebook', 'aveone' ),
"desc" => __( 'Insert your Facebook URL', 'aveone' ),
"id" => $aveone_shortname."_facebook",
"type" => "text",
"std" => "");

// Twitter

$options['evl_twitter_id'] = array( "name" => __( 'Twitter', 'aveone' ),
"desc" => __( 'Insert your Twitter URL', 'aveone' ),
"id" => $aveone_shortname."_twitter_id",
"type" => "text",
"std" => "");

// Google Plus

$options['evl_googleplus'] = array( "name" => __( 'Google Plus', 'aveone' ),
"desc" => __( 'Insert your Google Plus profile URL', 'aveone' ),
"id" => $aveone_shortname."_googleplus",
"type" => "text",
"std" => "");

// Pinterest

$options['evl_pinterest'] = array( "name" => __( 'Pinterest', 'aveone' ),
"desc" => __( 'Insert your Pinterest profile URL', 'aveone' ),
"id" => $aveone_shortname."_pinterest",
"type" => "text",
"std" => "");
*/
$options[] = array( "name" => $aveone_shortname."-tab-2", "id" => $aveone_shortname."-tab-2",
"type" => "close-tab" );


// Header content

$options[] = array( "name" => $aveone_shortname."-tab-1", "id" => $aveone_shortname."-tab-1",
"type" => "open-tab");

// Favicon Option @since 3.1.5
$options['evl_favicon'] = array(
"name" => __( 'Custom Favicon', 'aveone' ),
"desc" => __( 'Upload custom favicon.', 'aveone' ),
"id" => $aveone_shortname."_favicon",
"type" => "upload"
);

$options['evl_header_logo'] = array( "name" => __( 'Custom logo', 'aveone' ),
"desc" => __( 'Upload a logo for your theme, or specify an image URL directly.', 'aveone' ),
"id" => $aveone_shortname."_header_logo",
"type" => "upload",
"std" => "");
/*
$options['evl_pos_logo'] = array( "name" => __( 'Logo position', 'aveone' ),
"desc" => __( 'Choose the position of your custom logo', 'aveone' ),
"id" => $aveone_shortname."_pos_logo",
"type" => "select",
"std" => "left",
"options" => array(
'left' => __( 'Left &nbsp;&nbsp;&nbsp;(default)', 'aveone' ),
'center' => __( 'Center', 'aveone' ),    
'right' => __( 'Right', 'aveone' ),
'disable' => __( 'Disable', 'aveone' )
));

$options['evl_blog_title'] = array( "name" => __( 'Disable Blog Title', 'aveone' ),
"desc" => __( 'Check this box if you don\'t want to display title of your blog', 'aveone' ),
"id" => $aveone_shortname."_blog_title",
"type" => "checkbox",
"std" => "0");

$options['evl_tagline_pos'] = array( "name" => __( 'Blog Tagline position', 'aveone' ),
"desc" => __( 'Choose the position of blog tagline', 'aveone' ),
"id" => $aveone_shortname."_tagline_pos",
"type" => "select",
"std" => "next",
"options" => array(
'next' => __( 'Next to blog title &nbsp;&nbsp;&nbsp;(default)', 'aveone' ),
'above' => __( 'Above blog title', 'aveone' ),
'under' => __( 'Under blog title', 'aveone' ),
'disable' => __( 'Disable', 'aveone' )
));

$options['evl_main_menu'] = array( "name" => __( 'Disable main menu', 'aveone' ),
"desc" => __( 'Check this box if you don\'t want to display main menu', 'aveone' ),
"id" => $aveone_shortname."_main_menu",
"type" => "checkbox",
"std" => "0");
    
$options['evl_main_menu_hover_effect'] = array( "name" => __( 'Disable main menu Hover Effect', 'aveone' ),
"desc" => __( 'Check this box if you don\'t want to display main menu hover effect', 'aveone' ),
"id" => $aveone_shortname."_main_menu_hover_effect",
"type" => "checkbox",
"std" => "0");
    
    

$options['evl_sticky_header'] = array( "name" => __( 'Enable sticky header', 'aveone' ),
"desc" => __( 'Check this box if you want to display sticky header', 'aveone' ),
"id" => $aveone_shortname."_sticky_header",
"type" => "checkbox",
"std" => "1");

$options['evl_searchbox'] = array( "name" => __( 'Enable searchbox in main menu', 'aveone' ),
"desc" => __( 'Check this box if you want to display searchbox in main menu', 'aveone' ),
"id" => $aveone_shortname."_searchbox",
"type" => "checkbox",
"std" => "1");

$options['evl_widgets_header'] = array( "name" => __( 'Number of widget cols in header', 'aveone' ),
"desc" => __( 'Select how many header widget areas you want to display.', 'aveone' ),
"id" => $aveone_shortname."_widgets_header",
"type" => "images",
"std" => "disable",
"options" => array(
'disable' => $imagepath . '1c.png',
'one' => $imagepath . 'header-widgets-1.png',
'two' => $imagepath . 'header-widgets-2.png',
'three' => $imagepath . 'header-widgets-3.png',
'four' => $imagepath . 'header-widgets-4.png',
));

$options['evl_header_widgets_placement'] = array(
"name" => __( 'Header widgets placement', 'aveone' ),
"desc" => __( 'Choose where to display header widgets', 'aveone' ),
"id" => $aveone_shortname."_header_widgets_placement",
"std" => "home",
"type" => "select",
"options" => array(
'home' => __( 'Home page &nbsp;&nbsp;&nbsp;(default)', 'aveone' ),
'single' => __( 'Single Post', 'aveone' ),
'page' => __( 'Pages', 'aveone' ),
'all' => __( 'All pages', 'aveone' ),
'custom' => __( 'Select Per Post/Page', 'aveone' )
)
);*/

$options[] = array( "name" => $aveone_shortname."-tab-1", "id" => $aveone_shortname."-tab-1",
"type" => "close-tab" );


// Footer content
/*
$options[] = array( "name" => $aveone_shortname."-tab-2", "id" => $aveone_shortname."-tab-2",
"type" => "open-tab");

$options['evl_widgets_num'] = array( "name" => __( 'Number of widget cols in footer', 'aveone' ),
"desc" => __( 'Select how many footer widget areas you want to display.', 'aveone' ),
"id" => $aveone_shortname."_widgets_num",
"type" => "images",
"std" => "disable",
"options" => array(
'disable' => $imagepath . '1c.png',
'one' => $imagepath . 'footer-widgets-1.png',
'two' => $imagepath . 'footer-widgets-2.png',
'three' => $imagepath . 'footer-widgets-3.png',
'four' => $imagepath . 'footer-widgets-4.png',
));

$options['evl_footer_content'] = array( "name" => __( 'Custom footer', 'aveone' ),
"desc" => __( 'Available <strong>HTML</strong> tags and attributes:<br /><br /> <code> &lt;b&gt; &lt;i&gt; &lt;a href="" title=""&gt; &lt;blockquote&gt; &lt;del datetime=""&gt; <br /> &lt;ins datetime=""&gt; &lt;img src="" alt="" /&gt; &lt;ul&gt; &lt;ol&gt; &lt;li&gt; <br /> &lt;code&gt; &lt;em&gt; &lt;strong&gt; &lt;div&gt; &lt;span&gt; &lt;h1&gt; &lt;h2&gt; &lt;h3&gt; &lt;h4&gt; &lt;h5&gt; &lt;h6&gt; <br /> &lt;table&gt; &lt;tbody&gt; &lt;tr&gt; &lt;td&gt; &lt;br /&gt; &lt;hr /&gt;</code>', 'aveone' ),
"id" => $aveone_shortname."_footer_content",
"type" => "textarea",
"std" => "<p id=\"copyright\"><span class=\"credits\"><a href=\"http://theme4press.com/aveone-multipurpose-wordpress-theme/\">aveone</a> theme by Theme4Press&nbsp;&nbsp;&bull;&nbsp;&nbsp;Powered by <a href=\"http://wordpress.org\">WordPress</a></span></p>"
); 

$options[] = array( "name" => $aveone_shortname."-tab-2", "id" => $aveone_shortname."-tab-2",
"type" => "close-tab" );

*/
// Typography

$options[] = array( "id" => $aveone_shortname."-tab-8",
"type" => "open-tab");

$options['evl_title_font'] = array( "name" => __( 'Blog Title font', 'aveone' ),
"desc" => __( 'Select the typography you want for your blog title. * non web-safe font.', 'aveone' ),
"id" => $aveone_shortname."_title_font",
"type" => "typography",
"std" => array('size' => '39px', 'face' => 'Roboto','style' => 'bold','color' => '')
);

$options['evl_tagline_font'] = array( "name" => __( 'Blog tagline font', 'aveone' ),
"desc" => __( 'Select the typography you want for your blog tagline. * non web-safe font.', 'aveone' ),
"id" => $aveone_shortname."_tagline_font",
"type" => "typography",
"std" => array('size' => '13px', 'face' => 'Roboto','style' => 'normal','color' => '')
);

$options['evl_menu_font'] = array( "name" => __( 'Main menu font', 'aveone' ),
"desc" => __( 'Select the typography you want for your main menu. * non web-safe font.', 'aveone' ),
"id" => $aveone_shortname."_menu_font",
"type" => "typography",
"std" => array('size' => '14px', 'face' => 'Roboto','style' => 'normal','color' => '')
);

$options['evl_post_font'] = array( "name" => __( 'Post title font', 'aveone' ),
"desc" => __( 'Select the typography you want for your post titles. * non web-safe font.', 'aveone' ),
"id" => $aveone_shortname."_post_font",
"type" => "typography",
"std" => array('size' => '28px', 'face' => 'Roboto','style' => 'normal','color' => '')
);

$options['evl_content_font'] = array( "name" => __( 'Content font', 'aveone' ),
"desc" => __( 'Select the typography you want for your blog content. * non web-safe font.', 'aveone' ),
"id" => $aveone_shortname."_content_font",
"type" => "typography",
"std" => array('size' => '16px', 'face' => 'Roboto','style' => 'normal','color' => '')
);

$options['evl_heading_font'] = array( "name" => __( 'Headings font', 'aveone' ),
"desc" => __( 'Select the typography you want for your blog headings (H1, H2, H3, H4, H5, H6). * non web-safe font.', 'aveone' ),
"id" => $aveone_shortname."_heading_font",
"type" => "typography",
"std" => array('size' => 'none', 'face' => 'Roboto','style' => 'normal','color' => '')
);

$options[] = array( "name" => $aveone_shortname."-tab-8", "id" => $aveone_shortname."-tab-8",
"type" => "close-tab" );

/*
// Extra Options

$options[] = array( "id" => $aveone_shortname."-tab-7",
"type" => "open-tab");

$options['evl_breadcrumbs'] = array( "name" => __( 'Enable Breadcrumbs Navigation', 'aveone' ),
"desc" => __( 'Check this box if you want to enable breadcrumbs navigation', 'aveone' ),
"id" => $aveone_shortname."_breadcrumbs",
"type" => "checkbox",
"std" => "1");

$options['evl_nav_links'] = array( "name" => __( 'Position of navigation links', 'aveone' ),
"desc" => __( 'Choose the position of the <strong>Older/Newer Posts</strong> links', 'aveone' ),
"id" => $aveone_shortname."_nav_links",
"type" => "select",
"std" => "after",
"options" => array(
'after' => __( 'After posts &nbsp;&nbsp;&nbsp;(default)', 'aveone' ),
'before' => __( 'Before posts', 'aveone' ),
'both' => __( 'Both', 'aveone' )
));

$options['evl_pos_button'] = array( "name" => __( 'Position of \'Back to Top\' button', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_pos_button",
"type" => "select",
"std" => "right",
"options" => array(
'disable' => __( 'Disable', 'aveone' ),
'left' => __( 'Left', 'aveone' ),
'right' => __( 'Right &nbsp;&nbsp;&nbsp;(default)', 'aveone' ),
'middle' => __( 'Middle', 'aveone' )
));

$options['evl_parallax_slider_support'] = array( "name" => __( 'Enable Parallax Slider support', 'aveone' ),
"desc" => __( 'Check this box if you want to enable Parallax Slider support', 'aveone' ),
"id" => $aveone_shortname."_parallax_slider_support",
"type" => "checkbox",
"std" => "1");

$options['evl_carousel_slider'] = array( "name" => __( 'Enable Carousel Slider support', 'aveone' ),
"desc" => __( 'Check this box if you want to enable Carousel Slider support', 'aveone' ),
"id" => $aveone_shortname."_carousel_slider",
"type" => "checkbox",
"std" => "1");

$options['evl_status_gmap'] = array( "name" => __( 'Enable Google Map Scripts', 'aveone' ),
"desc" => __( 'Check this box if you want to enable Google Map Scripts', 'aveone' ),
"id" => $aveone_shortname."_status_gmap",
"type" => "checkbox",
"std" => "1");

$options['evl_animatecss'] = array( "name" => __( 'Enable Animate.css plugin support', 'aveone' ),
"desc" => __( 'Check this box if you want to enable Animate.css plugin support - (menu hover effect, featured image hover effect, button hover effect, etc.)', 'aveone' ),
"id" => $aveone_shortname."_animatecss",
"type" => "checkbox",
"std" => "1");

$options[] = array( "name" => $aveone_shortname."-tab-7", "id" => $aveone_shortname."-tab-7",
"type" => "close-tab" );

*/
// General Styling


$options[] = array( "name" => $aveone_shortname."-tab-9", "id" => $aveone_shortname."-tab-9",
"type" => "open-tab");


$options['evl_content_back'] = array( "name" => __( 'Content color', 'aveone' ),
"desc" => __( 'Background color of content', 'aveone' ),
"id" => $aveone_shortname."_content_back",
"type" => "select",
"std" => "light",
"options" => array(
'light' => __( 'Light', 'aveone' ),
'dark' => __( 'Dark', 'aveone' )
));

$options['evl_menu_back'] = array( "name" => __( 'Menu color', 'aveone' ),
"desc" => __( 'Background color of main menu', 'aveone' ),
"id" => $aveone_shortname."_menu_back",
"type" => "select",
"std" => "light",
"options" => array(
'light' => __( 'Light', 'aveone' ),
'dark' => __( 'Dark', 'aveone' )
));


$options['evl_menu_back_color'] = array( "name" => __( 'Or custom menu color', 'aveone' ),
"desc" => __( 'Custom background color of main menu. <strong>Dark menu must be enabled.</strong>', 'aveone' ),
"id" => $aveone_shortname."_menu_back_color",
"type" => "color",
"std" => ""
);

$options['evl_disable_menu_back'] = array( "name" => __( 'Disable Menu Background', 'aveone' ),
"desc" => __( 'Check this box if you want to disable menu background', 'aveone' ),
"id" => $aveone_shortname."_disable_menu_back",
"type" => "checkbox",
"std" => "0");

$options['evl_header_footer_back_color'] = array( "name" => __( 'Header and Footer color', 'aveone' ),
"desc" => __( 'Custom background color of header and footer', 'aveone' ),
"id" => $aveone_shortname."_header_footer_back_color",
"type" => "color",
"std" => ""
);

$options['evl_pattern'] = array( "name" => __( 'Header and Footer pattern', 'aveone' ),
"desc" => __( 'Choose the pattern for header and footer background', 'aveone' ),
"id" => $aveone_shortname."_pattern",
"type" => "images",
"std" => "pattern_8.png",
"options" => array(
'none' => $imagepathfolder . '/header-two/none.jpg',
'pattern_1.png' => $imagepathfolder . '/pattern/pattern_1_thumb.png',
'pattern_2.png' => $imagepathfolder . '/pattern/pattern_2_thumb.png',
'pattern_3.png' => $imagepathfolder . '/pattern/pattern_3_thumb.png',
'pattern_4.png' => $imagepathfolder . '/pattern/pattern_4_thumb.png',
'pattern_5.png' => $imagepathfolder . '/pattern/pattern_5_thumb.png',
'pattern_6.png' => $imagepathfolder . '/pattern/pattern_6_thumb.png',
'pattern_7.png' => $imagepathfolder . '/pattern/pattern_7_thumb.png',
'pattern_8.png' => $imagepathfolder . '/pattern/pattern_8_thumb.png'
));


$options['evl_scheme_widgets'] = array( "name" => __( 'Background Color', 'aveone' ),
"desc" => __( 'Choose the color scheme for the background', 'aveone' ),
"id" => $aveone_shortname."_scheme_background_color",
"type" => "color",
"std" => "#000000"
);

$options['evl_scheme_background'] = array( "name" => __( 'Background Image', 'aveone' ),
"desc" => __( 'Upload an image for the area below header menu', 'aveone' ),
"id" => $aveone_shortname."_scheme_background",
"type" => "upload",
"std" => '',
);

$options['evl_scheme_background_100'] = array( "name" => __( '100% Background Image', 'aveone' ),
"desc" => __( 'Have background image always at 100% in width and height and scale according to the browser size.', 'aveone' ),
"id" => $aveone_shortname."_scheme_background_100",
"type" => "checkbox",
"std" => "0");

$options['evl_scheme_background_repeat'] = array( "name" => __( 'Background Repeat', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_scheme_background_repeat",
"type" => "select",
"std" => "no-repeat",
"options" => array(
'repeat' => __( 'repeat', 'aveone' ),
'repeat-x' => __( 'repeat-x', 'aveone' ),
'repeat-y' => __( 'repeat-y', 'aveone' ),
'no-repeat' => __( 'no-repeat &nbsp;&nbsp;&nbsp;(default)', 'aveone' )
));

$options['evl_general_link'] = array( "name" => __( 'General Link Color', 'aveone' ),
"desc" => __( 'Custom color for links', 'aveone' ),
"id" => $aveone_shortname."_general_link",
"type" => "color",
"std" => "#7a9cad"
);

$options['evl_button_1'] = array( "name" => __( 'Buttons 1 Color', 'aveone' ),
"desc" => __( 'Custom color for buttons: Read more, Reply', 'aveone' ),
"id" => $aveone_shortname."_button_1",
"type" => "color",
"std" => ""
);

$options['evl_button_2'] = array( "name" => __( 'Buttons 2 Color', 'aveone' ),
"desc" => __( 'Custom color for buttons: Post Comment, Submit', 'aveone' ),
"id" => $aveone_shortname."_button_2",
"type" => "color",
"std" => ""
);

$options['evl_widget_background'] = array( "name" => __( 'Enable Widget Title Black Background', 'aveone' ),
"desc" => __( 'Check this box if you want to enable black background for widget titles', 'aveone' ),
"id" => $aveone_shortname."_widget_background",
"type" => "checkbox",
"std" => "0");

$options['evl_widget_background_image'] = array( "name" => __( 'Disable Widget Background', 'aveone' ),
"desc" => __( 'Check this box if you want to disable widget background', 'aveone' ),
"id" => $aveone_shortname."_widget_background_image",
"type" => "checkbox",
"std" => "0");

$options[] = array( "name" => $aveone_shortname."-tab-10", "id" => $aveone_shortname."-tab-10",
"type" => "close-tab" );


// Custom CSS
/*
$options[] = array( "id" => $aveone_shortname."-tab-11",
"type" => "open-tab");

$options['evl_css_content'] = array( "name" => __( 'Custom CSS', 'aveone' ),
"desc" => '<strong>'.__( 'For advanced users only', 'aveone' ).'</strong>: '.__( 'insert custom CSS, default', 'aveone' ).' <a href="'.$template_url.'/style.css" target="_blank">style.css</a> '.__( 'file', 'aveone' ).'',
"id" => $aveone_shortname."_css_content",
"type" => "textarea",
"std" => "");

$options[] = array( "name" => $aveone_shortname."-tab-11", "id" => $aveone_shortname."-tab-11",
"type" => "close-tab" );


// Parallax Slider

$options[] = array( "id" => $aveone_shortname."-tab-8",
"type" => "open-tab");


$options['evl_parallax_slider'] = array( "name" => __( 'Parallax Slider placement', 'aveone' ),
"desc" => __( 'Display Parallax Slider on the homepage, all pages or select the slider in the post/page edit mode.', 'aveone' ),
"id" => $aveone_shortname."_parallax_slider",
"type" => "select",
"std" => "post",
"options" => array(
'homepage' => __( 'Homepage only', 'aveone' ),
'post' => __( 'Manually select in a Post/Page edit mode &nbsp;&nbsp;&nbsp;(default)', 'aveone' ),
'all' => __( 'All pages', 'aveone' )
));

$options['evl_parallax_speed'] = array( "name" => __( 'Parallax Speed', 'aveone' ),
"desc" => __( 'Input the time between transitions (Default: 4000);', 'aveone' ),
"id" => $aveone_shortname."_parallax_speed",
"type" => "text",
"std" => "4000");

$options['evl_parallax_slide_title_font'] = array( "name" => __( 'Slider Title font', 'aveone' ),
"desc" => __( 'Select the typography you want for the slide title. * non web-safe font.', 'aveone' ),
"id" => $aveone_shortname."_parallax_slide_title_font",
"type" => "typography",
"std" => array('size' => '36px', 'face' => 'Roboto','style' => 'normal','color' => '')
);

$options['evl_parallax_slide_desc_font'] = array( "name" => __( 'Slider Description font', 'aveone' ),
"desc" => __( 'Select the typography you want for the slide description. * non web-safe font.', 'aveone' ),
"id" => $aveone_shortname."_parallax_slide_desc_font",
"type" => "typography",
"std" => array('size' => '18px', 'face' => 'Roboto','style' => 'normal','color' => '')
);

$options['evl_show_slide1'] = array( "name" => __( 'Enable Slide 1', 'aveone' ),
"desc" => __( 'Check this box to enable Slide 1', 'aveone' ),
"id" => $aveone_shortname."_show_slide1",
"type" => "checkbox",
"std" => "1");

$options['evl_slide1_img'] = array( "name" => __( 'Slide 1 Image', 'aveone' ),
"desc" => __( 'Upload an image for the Slide 1, or specify an image URL directly.', 'aveone' ),
"id" => $aveone_shortname."_slide1_img",
"type" => "upload",
"class" => "hidden",
"std" => $imagepathfolder . 'parallax/6.png');

$options['evl_slide1_title'] = array( "name" => __( 'Slide 1 Title', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide1_title",
"type" => "text",
"class" => "hidden",
"std" => __( 'Super Awesome WP Theme', 'aveone' ));

$options['evl_slide1_desc'] = array( "name" => __( 'Slide 1 Description', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide1_desc",
"type" => "textarea",
"class" => "hidden",
"std" => __( 'Absolutely free of cost theme with amazing design and premium features which will impress your visitors', 'aveone' ));

$options['evl_slide1_button'] = array( "name" => __( 'Slide 1 Button', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide1_button",
"type" => "textarea",
"class" => "hidden",
"std" => '<a class="da-link" href="#">'.__( 'Learn more', 'aveone' ).'</a>' );

$options['evl_show_slide2'] = array( "name" => __( 'Enable Slide 2', 'aveone' ),
"desc" => __( 'Check this box to enable Slide 2', 'aveone' ),
"id" => $aveone_shortname."_show_slide2",
"type" => "checkbox",
"std" => "1");

$options['evl_slide2_img'] = array( "name" => __( 'Slide 2 Image', 'aveone' ),
"desc" => __( 'Upload an image for the Slide 2, or specify an image URL directly.', 'aveone' ),
"id" => $aveone_shortname."_slide2_img",
"type" => "upload",
"class" => "hidden",
"std" => $imagepathfolder . 'parallax/5.png');

$options['evl_slide2_title'] = array( "name" => __( 'Slide 2 Title', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide2_title",
"type" => "text",
"class" => "hidden",
"std" => __( 'Bootstrap and Font Awesome Ready', 'aveone' ));

$options['evl_slide2_desc'] = array( "name" => __( 'Slide 2 Description', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide2_desc",
"type" => "textarea",
"class" => "hidden",
"std" => __( 'Built-in Bootstrap Elements and Font Awesome let you do amazing things with your website', 'aveone' ));

$options['evl_slide2_button'] = array( "name" => __( 'Slide 2 Button', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide2_button",
"type" => "textarea",
"class" => "hidden",
"std" => '<a class="da-link" href="#">'.__( 'Learn more', 'aveone' ).'</a>');

$options['evl_show_slide3'] = array( "name" => __( 'Enable Slide 3', 'aveone' ),
"desc" => __( 'Check this box to enable Slide 3', 'aveone' ),
"id" => $aveone_shortname."_show_slide3",
"type" => "checkbox",
"std" => "1");

$options['evl_slide3_img'] = array( "name" => __( 'Slide 3 Image', 'aveone' ),
"desc" => __( 'Upload an image for the Slide 3, or specify an image URL directly.', 'aveone' ),
"id" => $aveone_shortname."_slide3_img",
"type" => "upload",
"class" => "hidden",
"std" => $imagepathfolder . 'parallax/4.png');

$options['evl_slide3_title'] = array( "name" => __( 'Slide 3 Title', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide3_title",
"type" => "text",
"class" => "hidden",
"std" => __( 'Easy to use control panel', 'aveone' ));

$options['evl_slide3_desc'] = array( "name" => __( 'Slide 3 Description', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide3_desc",
"type" => "textarea",
"class" => "hidden",
"std" => __( 'Select of 500+ Google Fonts, choose layout as you need, set up your social links', 'aveone' ));

$options['evl_slide3_button'] = array( "name" => __( 'Slide 3 Button', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide3_button",
"type" => "textarea",
"class" => "hidden",
"std" => '<a class="da-link" href="#">'.__( 'Learn more', 'aveone' ).'</a>' );

$options['evl_show_slide4'] = array( "name" => __( 'Enable Slide 4', 'aveone' ),
"desc" => __( 'Check this box to enable Slide 4', 'aveone' ),
"id" => $aveone_shortname."_show_slide4",
"type" => "checkbox",
"std" => "1");

$options['evl_slide4_img'] = array( "name" => __( 'Slide 4 Image', 'aveone' ),
"desc" => __( 'Upload an image for the Slide 4, or specify an image URL directly.', 'aveone' ),
"id" => $aveone_shortname."_slide4_img",
"type" => "upload",
"class" => "hidden",
"std" => $imagepathfolder . 'parallax/1.png');

$options['evl_slide4_title'] = array( "name" => __( 'Slide 4 Title', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide4_title",
"type" => "text",
"class" => "hidden",
"std" => __( 'Fully responsive theme', 'aveone' ));

$options['evl_slide4_desc'] = array( "name" => __( 'Slide 4 Description', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide4_desc",
"type" => "textarea",
"class" => "hidden",
"std" => __( 'Adaptive to any screen depending on the device being used to view the site', 'aveone' ));

$options['evl_slide4_button'] = array( "name" => __( 'Slide 4 Button', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide4_button",
"type" => "textarea",
"class" => "hidden",
"std" => '<a class="da-link" href="#">'.__( 'Learn more', 'aveone' ).'</a>' );

$options['evl_show_slide5'] = array( "name" => __( 'Enable Slide 5', 'aveone' ),
"desc" => __( 'Check this box to enable Slide 5', 'aveone' ),
"id" => $aveone_shortname."_show_slide5",
"type" => "checkbox",
"std" => "1");

$options['evl_slide5_img'] = array( "name" => __( 'Slide 5 Image', 'aveone' ),
"desc" => __( 'Upload an image for the Slide 5, or specify an image URL directly.', 'aveone' ),
"id" => $aveone_shortname."_slide5_img",
"type" => "upload",
"class" => "hidden",
"std" => $imagepathfolder . 'parallax/3.png');

$options['evl_slide5_title'] = array( "name" => __( 'Slide 5 Title', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide5_title",
"type" => "text",
"class" => "hidden",
"std" => __( 'Unlimited color schemes', 'aveone' ));

$options['evl_slide5_desc'] = array( "name" => __( 'Slide 5 Description', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide5_desc",
"type" => "textarea",
"class" => "hidden",
"std" => __( 'Upload your own logo, change background color or images, select links color which you love - it\'s limitless', 'aveone' ));

$options['evl_slide5_button'] = array( "name" => __( 'Slide 5 Button', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_slide5_button",
"type" => "textarea",
"class" => "hidden",
"std" => '<a class="da-link" href="#">'.__( 'Learn more', 'aveone' ).'</a>' );


$options[] = array( "name" => $aveone_shortname."-tab-9", "id" => $aveone_shortname."-tab-9",
"type" => "close-tab" );*/
/*

// Posts Slider

$options[] = array( "id" => $aveone_shortname."-tab-9",
"type" => "open-tab");

$options['evl_posts_slider'] = array( "name" => __( 'Posts Slider placement', 'aveone' ),
"desc" => __( 'Display Posts Slider on the homepage, all pages or select the slider in the post/page edit mode.', 'aveone' ),
"id" => $aveone_shortname."_posts_slider",
"type" => "select",
"std" => "post",
"options" => array(
'homepage' => __( 'Homepage only', 'aveone' ),
'post' => __( 'Manually select in a Post/Page edit mode &nbsp;&nbsp;&nbsp;(default)', 'aveone' ),
'all' => __( 'All pages', 'aveone' )
));

$options['evl_posts_number'] = array( "name" => __( 'Number of posts to display', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_posts_number",
"type" => "select",
"std" => "5",
"options" => array(
'1' => '1',
'2' => '2',
'3' => '3',
'4' => '4',
'5' => '5 &nbsp;&nbsp;&nbsp;'.__( '(default)', 'aveone' ),
'6' => '6',
'7' => '7',
'8' => '8',
'9' => '9',
'10' => '10',
));

$options['evl_posts_slider_content'] = array( "name" => __( 'Slideshow content', 'aveone' ),
"desc" => __( 'Choose to display latest posts or posts of a category.', 'aveone' ),
"id" => $aveone_shortname."_posts_slider_content",
"type" => "select",
"std" => "recent",
"options" => array(
'recent' => __( 'Recent posts &nbsp;&nbsp;&nbsp;(default)', 'aveone' ),
'category' => __( 'Posts in category', 'aveone' )
));

$options['evl_posts_slider_id'] = array( "name" => __( 'Category ID(s)', 'aveone' ),
"desc" => __( 'Enter category ID(s) of posts separated by commas, e.g. 1,6,59,86. <strong>Posts in category</strong> option must be enabled', 'aveone' ),
"id" => $aveone_shortname."_posts_slider_id",
"type" => "text",
"std" => ""
);

$options['evl_carousel_speed'] = array( "name" => __( 'Slider Speed', 'aveone' ),
"desc" => __( 'Input the time between transitions (Default: 3500);', 'aveone' ),
"id" => $aveone_shortname."_carousel_speed",
"type" => "text",
"std" => "7000");

$options['evl_carousel_slide_title_font'] = array( "name" => __( 'Slider Title font', 'aveone' ),
"desc" => __( 'Select the typography you want for the slide title. * non web-safe font.', 'aveone' ),
"id" => $aveone_shortname."_carousel_slide_title_font",
"type" => "typography",
"std" => array('size' => '36px', 'face' => 'Roboto','style' => 'normal','color' => '')
);

$options['evl_carousel_slide_desc_font'] = array( "name" => __( 'Slider Description font', 'aveone' ),
"desc" => __( 'Select the typography you want for the slide description. * non web-safe font.', 'aveone' ),
"id" => $aveone_shortname."_carousel_slide_desc_font",
"type" => "typography",
"std" => array('size' => '18px', 'face' => 'Roboto','style' => 'normal','color' => '')
);

$options[] = array( "name" => $aveone_shortname."-tab-9", "id" => $aveone_shortname."-tab-9",
"type" => "close-tab" );

// Back Up Options

$options[] = array( "id" => $aveone_shortname."-tab-12",
"type" => "open-tab");

$options[] = array( "name" => __( 'Backup Options', 'aveone' ),
"type" => "backup",
"id" => $aveone_shortname."_backup"
);

$options[] = array( "name" => $aveone_shortname."-tab-12", "id" => $aveone_shortname."-tab-12",
"type" => "close-tab" );

*/
// Contact Options

$options[] = array( "id" => $aveone_shortname."-tab-6",
"type" => "open-tab");

$options['evl_contact_image'] = array( "name" => __( 'Contact Image', 'aveone' ),
"desc" => __( 'Select the you want to upload on the contact page.', 'aveone' ),
"id" => $aveone_shortname."_contact_image",
"std" => "",
"type" => "upload" );

$options['evl_contact_shortcode'] = array( "name" => __( 'Contact Form Shortcode', 'aveone' ),
"desc" => __( 'Copy/Paste Contact form shortcode.', 'aveone' ),
"id" => $aveone_shortname."_contact_shortcode",
"std" => "",
"type" => "text" );

$options['evl_gmap_type'] = array( "name" => __( 'Google Map Type', 'aveone' ),
"desc" => __( 'Select the type of google map to show on the contact page.', 'aveone' ),
"id" => $aveone_shortname."_gmap_type",
"std" => "hybrid",
"options" => array(
'roadmap' => __( 'roadmap', 'aveone' ), 
'satellite' => __( 'satellite', 'aveone' ),
'hybrid' => __( 'hybrid (default)', 'aveone' ),
'terrain' => __( 'terrain', 'aveone' ),
"type" => "select" ));

$options['evl_gmap_width'] = array( "name" => __( 'Google Map Width', 'aveone' ),
"desc" => __( '(in pixels or percentage, e.g.:100% or 100px)', 'aveone' ),
"id" => $aveone_shortname."_gmap_width",
"std" => "100%",
"type" => "text");

$options['evl_gmap_height'] = array( "name" => __( 'Google Map Height', 'aveone' ),
"desc" => __( '(in pixels, e.g.: 100px)', 'aveone' ),
"id" => $aveone_shortname."_gmap_height",
"std" => "415px",
"type" => "text");

$options['evl_gmap_address'] = array( "name" => __( 'Google Map Address', 'aveone' ),
"desc" => __( 'Example: 775 New York Ave, Brooklyn, Kings, New York 11203.<br /> For multiple markers, separate the addresses with the | symbol. ex: Address 1|Address 2|Address 3.', 'aveone' ),
"id" => $aveone_shortname."_gmap_address",
"std" => "Via dei Fori Imperiali",
"type" => "text");

$options['evl_bubble_marker_address'] = array( "name" => __( 'Google Map Bubble Marker Address', 'aveone' ),
"desc" => __( 'Example: 775 New York Ave, Brooklyn, Kings, New York 11203.<br /> For multiple markers, separate the addresses with the | symbol. ex: Address 1|Address 2|Address 3.', 'aveone' ),
"id" => $aveone_shortname."_bubble_marker_address",
"std" => "Via dei Fori Imperiali",
"type" => "text");

$options['evl_bubble_marker_city_state'] = array( "name" => __( 'Google Map Bubble Marker City/State', 'aveone' ),
"desc" => __( 'Displays City/State in Google Map Bubble Marker', 'aveone' ),
"id" => $aveone_shortname."_bubble_marker_city_state",
"std" => "",
"type" => "text");

$options['evl_bubble_marker_price'] = array( "name" => __( 'Google Map Bubble Marker Price', 'aveone' ),
"desc" => __( 'Displays Price in Google Map Bubble Marker', 'aveone' ),
"id" => $aveone_shortname."_bubble_marker_price",
"std" => "",
"type" => "text");

$options['evl_bubble_marker_agent'] = array( "name" => __( 'Google Map Bubble Marker Agent Name', 'aveone' ),
"desc" => __( 'Displays Agent Name in Google Map Bubble Marker', 'aveone' ),
"id" => $aveone_shortname."_bubble_marker_agent",
"std" => "",
"type" => "text");

$options['evl_sent_email_header'] = array( "name" => __( 'Sent Email Header (From)', 'aveone' ),
"desc" => __( 'Insert name of header which will be in the header of sent email.', 'aveone' ),
"id" => $aveone_shortname."_sent_email_header", 
"std" => get_bloginfo('name'), 
"type" => "text"); 

$options['evl_email_address'] = array( "name" => __( 'Email Address', 'aveone' ),
"desc" => __( 'Enter the email adress the form will be sent to.', 'aveone' ),
"id" => $aveone_shortname."_email_address",
"std" => "",
"type" => "text");

$options['evl_map_zoom_level'] = array( "name" => __( 'Map Zoom Level', 'aveone' ),
"desc" => __( 'Higher number will be more zoomed in.', 'aveone' ),
"id" => $aveone_shortname."_map_zoom_level",
"std" => "18",
"type" => "text");


$options[] = array( "name" => $aveone_shortname."-tab-6", "id" => $aveone_shortname."-tab-6",
"type" => "close-tab" );

/*
// Bootstrap Slider

$options[] = array( "id" => $aveone_shortname."-tab-14",
"type" => "open-tab");

$options['evl_bootstrap_slider'] = array( "name" => __( 'Bootstrap Slider placement', 'aveone' ),
"desc" => __( 'Display Bootstrap Slider on the homepage, all pages or select the slider in the post/page edit mode.', 'aveone' ),
"id" => $aveone_shortname."_bootstrap_slider",
"type" => "select",
"std" => "homepage",
"options" => array(
'homepage' => __( 'Homepage only &nbsp;&nbsp;&nbsp;(default)', 'aveone' ),
'post' => __( 'Manually select in a Post/Page edit mode', 'aveone' ),
'all' => __( 'All pages', 'aveone' )
));

$options['evl_bootstrap_speed'] = array( "name" => __( 'Speed', 'aveone' ),
"desc" => __( 'Input the time between transitions (Default: 7000);', 'aveone' ),
"id" => $aveone_shortname."_bootstrap_speed",
"type" => "text",
"std" => "7000");

$options['evl_bootstrap_slide_title_font'] = array( "name" => __( 'Slider Title font', 'aveone' ),
"desc" => __( 'Select the typography you want for the slide title. * non web-safe font.', 'aveone' ),
"id" => $aveone_shortname."_bootstrap_slide_title_font",
"type" => "typography",
"std" => array('size' => '36px', 'face' => 'Roboto','style' => 'normal','color' => '')
);

$options['evl_bootstrap_slide_desc_font'] = array( "name" => __( 'Slider Description font', 'aveone' ),
"desc" => __( 'Select the typography you want for the slide description. * non web-safe font.', 'aveone' ),
"id" => $aveone_shortname."_bootstrap_slide_desc_font",
"type" => "typography",
"std" => array('size' => '18px', 'face' => 'Roboto','style' => 'normal','color' => '')
);

$options['evl_bootstrap_slide1'] = array( "name" => __( 'Enable Slide 1', 'aveone' ),
"desc" => __( 'Check this box to enable Slide 1', 'aveone' ),
"id" => $aveone_shortname."_bootstrap_slide1",
"type" => "checkbox",
"std" => "1");

$options['evl_bootstrap_slide1_img'] = array( "name" => __( 'Slide 1 Image', 'aveone' ),
"desc" => __( 'Upload an image for the Slide 1, or specify an image URL directly.', 'aveone' ),
"id" => $aveone_shortname."_bootstrap_slide1_img",
"type" => "upload",
"class" => "hidden",
"std" => $imagepathfolder . 'bootstrap-slider/1.jpg');

$options['evl_bootstrap_slide1_title'] = array( "name" => __( 'Slide 1 Title', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide1_title",
"type" => "text",
"class" => "hidden",
"std" => __( 'Super Awesome WP Theme', 'aveone' ));

$options['evl_bootstrap_slide1_desc'] = array( "name" => __( 'Slide 1 Description', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide1_desc",
"type" => "textarea",
"class" => "hidden",
"std" => __( 'Absolutely free of cost theme with amazing design and premium features which will impress your visitors', 'aveone' ));

$options['evl_bootstrap_slide1_button'] = array( "name" => __( 'Slide 1 Button', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide1_button",
"type" => "textarea",
"class" => "hidden",
"std" => '<a class="button" href="#">'.__( 'Learn more', 'aveone' ).'</a>' );

$options['evl_bootstrap_slide2'] = array( "name" => __( 'Enable Slide 2', 'aveone' ),
"desc" => __( 'Check this box to enable Slide 2', 'aveone' ),
"id" => $aveone_shortname."_bootstrap_slide2",
"type" => "checkbox",
"std" => "1");

$options['evl_bootstrap_slide2_img'] = array( "name" => __( 'Slide 2 Image', 'aveone' ),
"desc" => __( 'Upload an image for the Slide 2, or specify an image URL directly.', 'aveone' ),
"id" => $aveone_shortname."_bootstrap_slide2_img",
"type" => "upload",
"class" => "hidden",
"std" => $imagepathfolder . 'bootstrap-slider/2.jpg');

$options['evl_bootstrap_slide2_title'] = array( "name" => __( 'Slide 2 Title', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide2_title",
"type" => "text",
"class" => "hidden",
"std" => __( 'Bootstrap and Font Awesome Ready', 'aveone' ));

$options['evl_bootstrap_slide2_desc'] = array( "name" => __( 'Slide 2 Description', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide2_desc",
"type" => "textarea",
"class" => "hidden",
"std" => __( 'Built-in Bootstrap Elements and Font Awesome let you do amazing things with your website', 'aveone' ));

$options['evl_bootstrap_slide2_button'] = array( "name" => __( 'Slide 2 Button', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide2_button",
"type" => "textarea",
"class" => "hidden",
"std" => '<a class="button" href="#">'.__( 'Learn more', 'aveone' ).'</a>' );

$options['evl_bootstrap_slide3'] = array( "name" => __( 'Enable Slide 3', 'aveone' ),
"desc" => __( 'Check this box to enable Slide 3', 'aveone' ),
"id" => $aveone_shortname."_bootstrap_slide3",
"type" => "checkbox",
"std" => "1");

$options['evl_bootstrap_slide3_img'] = array( "name" => __( 'Slide 3 Image', 'aveone' ),
"desc" => __( 'Upload an image for the Slide 3, or specify an image URL directly.', 'aveone' ),
"id" => $aveone_shortname."_bootstrap_slide3_img",
"type" => "upload",
"class" => "hidden",
"std" => $imagepathfolder . 'bootstrap-slider/3.jpg');

$options['evl_bootstrap_slide3_title'] = array( "name" => __( 'Slide 3 Title', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide3_title",
"type" => "text",
"class" => "hidden",
"std" => __( 'Easy to use control panel', 'aveone' ));

$options['evl_bootstrap_slide3_desc'] = array( "name" => __( 'Slide 3 Description', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide3_desc",
"type" => "textarea",
"class" => "hidden",
"std" => __( 'Select of 500+ Google Fonts, choose layout as you need, set up your social links', 'aveone' ));

$options['evl_bootstrap_slide3_button'] = array( "name" => __( 'Slide 3 Button', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide3_button",
"type" => "textarea",
"class" => "hidden",
"std" => '<a class="button" href="#">'.__( 'Learn more', 'aveone' ).'</a>' );

$options['evl_bootstrap_slide4'] = array( "name" => __( 'Enable Slide 4', 'aveone' ),
"desc" => __( 'Check this box to enable Slide 4', 'aveone' ),
"id" => $aveone_shortname."_bootstrap_slide4",
"type" => "checkbox",
"std" => "1");

$options['evl_bootstrap_slide4_img'] = array( "name" => __( 'Slide 4 Image', 'aveone' ),
"desc" => __( 'Upload an image for the Slide 4, or specify an image URL directly.', 'aveone' ),
"id" => $aveone_shortname."_bootstrap_slide4_img",
"type" => "upload",
"class" => "hidden",
"std" => $imagepathfolder . 'bootstrap-slider/4.jpg');

$options['evl_bootstrap_slide4_title'] = array( "name" => __( 'Slide 4 Title', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide4_title",
"type" => "text",
"class" => "hidden",
"std" => __( 'Fully responsive theme', 'aveone' ));

$options['evl_bootstrap_slide4_desc'] = array( "name" => __( 'Slide 4 Description', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide4_desc",
"type" => "textarea",
"class" => "hidden",
"std" => __( 'Adaptive to any screen depending on the device being used to view the site', 'aveone' ));

$options['evl_bootstrap_slide4_button'] = array( "name" => __( 'Slide 4 Button', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide4_button",
"type" => "textarea",
"class" => "hidden",
"std" => '<a class="button" href="#">'.__( 'Learn more', 'aveone' ).'</a>' );

$options['evl_bootstrap_slide5'] = array( "name" => __( 'Enable Slide 5', 'aveone' ),
"desc" => __( 'Check this box to enable Slide 5', 'aveone' ),
"id" => $aveone_shortname."_bootstrap_slide5",
"type" => "checkbox",
"std" => "1");

$options['evl_bootstrap_slide5_img'] = array( "name" => __( 'Slide 5 Image', 'aveone' ),
"desc" => __( 'Upload an image for the Slide 5, or specify an image URL directly.', 'aveone' ),
"id" => $aveone_shortname."_bootstrap_slide5_img",
"type" => "upload",
"class" => "hidden",
"std" => $imagepathfolder . 'bootstrap-slider/5.jpg');

$options['evl_bootstrap_slide5_title'] = array( "name" => __( 'Slide 5 Title', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide5_title",
"type" => "text",
"class" => "hidden",
"std" => __( 'Unlimited color schemes', 'aveone' ));

$options['evl_bootstrap_slide5_desc'] = array( "name" => __( 'Slide 5 Description', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide5_desc",
"type" => "textarea",
"class" => "hidden",
"std" => __( 'Upload your own logo, change background color or images, select links color which you love - it\'s limitless', 'aveone' ));

$options['evl_bootstrap_slide5_button'] = array( "name" => __( 'Slide 5 Button', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_bootstrap_slide5_button",
"type" => "textarea",
"class" => "hidden",
"std" => '<a class="button" href="#">'.__( 'Learn more', 'aveone' ).'</a>', 'aveone' );

$options[] = array( "name" => $aveone_shortname."-tab-14", "id" => $aveone_shortname."-tab-14",
"type" => "close-tab" );

*/
// Agent Information

$options[] = array( "id" => $aveone_shortname."-tab-7", "type" => "open-tab");

$options['evl_agent_info_note'] = array( "name" => __( 'Note:', 'aveone' ),
"desc" => "Click the Link to add Agent Information.",
"id" => $aveone_shortname."_agent_information_note",
"type" => "note-for-agent-information",
"std" => ''
);


/*
echo get_current_user_id();
$usertitle = get_user_meta(get_current_user_id(),'first_name',true);
$options['evl_agent_title'] = array( "name" => __( 'Agent Title', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_agent_title",
"type" => "text",
"std" => $usertitle
);

$designation = get_user_meta(get_current_user_id(),'designation',true);
$options['evl_agent_designation'] = array( "name" => __( 'Agent Designation', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_agent_designation",
"type" => "text",
"std" => $designation
);

$options['evl_agent_phone1'] = array( "name" => __( 'Agent Phone 1', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_agent_phone1",
"type" => "text",
"std" => '(512) 794-6644'
);

$options['evl_agent_phone2'] = array( "name" => __( 'Agent Phone 2', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_agent_phone2",
"type" => "text",
"std" => '(512) 555-2222'
);

$options['evl_agent_email'] = array( "name" => __( 'Agent Email', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_agent_email",
"type" => "text",
"std" => 'agent@website.com'
);

$options['evl_agent_image'] = array( "name" => __( 'Agent Image', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_agent_image",
"type" => "upload",
"std" => ''
);

$options['evl_agent_company_logo'] = array( "name" => __( 'Agent Company Logo', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_agent_company_logo",
"type" => "upload",
"std" => ''
);
*/
$options[] = array( "name" => $aveone_shortname."-tab-7", 
"id" => $aveone_shortname."-tab-7",
"type" => "close-tab" );


// Printable Info

$options[] = array( "id" => $aveone_shortname."-tab-4",
"type" => "open-tab");

$options['evl_printable_info_picture'] = array( "name" => __( 'Intro Picture', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_printable_info_picture",
"type" => "upload",
"std" => ''
);

$options['evl_printable_info_text'] = array( "name" => __( 'Intro Text', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_printable_info_text",
"type" => "editor",
"std" => ''
);

$options['evl_printable_info_note'] = array( "name" => __( 'Note:', 'aveone' ),
"desc" => "Click the Link to add attachments to Printable Info.",
"id" => $aveone_shortname."_printable_info_note",
"type" => "note-for-printables",
"std" => ''
);



$options[] = array( "name" => $aveone_shortname."-tab-4", 
"id" => $aveone_shortname."-tab-4",
"type" => "close-tab" );


// Property Details

$options[] = array( "id" => $aveone_shortname."-tab-3",
"type" => "open-tab");

$options['evl_property_price_type'] = array( "name" => __( 'Price Type', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_price_type",
"type" => "select",
"std" => 'fixed',
"options" => array('fixed'=>'Fixed','range'=>'Range')    
);

$options['evl_property_price'] = array( "name" => __( 'Price', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_price",
"type" => "text",
"std" => '',
);

$options['evl_property_price1'] = array( "name" => __( 'Min Price', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_price1",
"type" => "text",
"std" => '',
);

$options['evl_property_price2'] = array( "name" => __( 'Max Price', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_price2",
"type" => "text",
"std" => '',
);

$options['evl_property_type'] = array( "name" => __( 'Type', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_type",
"type" => "select",
"std" => '',
"options" => array(
    '' => 'Select Type',
    'House' => 'House',
    'Condo' => 'Condo',
    'Ranch' => 'Ranch',
    'Lot' => 'Lot',
    'Townhouse' => 'Townhouse',
    'Commercial' => 'Commercial',
    'Duplex' => 'Duplex',
    'Loft' => 'Loft',
    'Land' => 'Land',
    'Multi-Family' => 'Multi-Family',
    'Single-Family' => 'Single-Family',
    'Office' => 'Office',
    'Retail' => 'Retail',
    'Mixed Development' => 'Mixed Development',
)
);

$options['evl_property_mls'] = array( "name" => __( 'MLS#', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_mls",
"type" => "text",
"std" => '',
);

$options['evl_property_area'] = array( "name" => __( 'Area', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_area",
"type" => "select",
"std" => '',
"options" => array(
    '' => 'N/A',
    '1B' => '1B',
    '1N' => '1N',
    '2' => '2',
    '3' => '4',
    '6' => '6',
    '7' => '7',
    'DT' => 'DT',
    'UT' => 'UT',
    '3' => '3',
    '5' => '5',
    '3E' => '3E',
    '5E' => '5E',
    'NE' => 'NE',
    '1A' => '1A',
    '2N' => '2N',
    'N' => 'N',
    'NW' => 'NW',
    '10N' => '10N',
    '10S' => '10S',
    'SWE' => 'SWE',
    'SWW' => 'SWW',
    '11' => '11',
    '9' => '9',
    'SC' => 'SC',
    'SE' => 'SE',
    '8W' => '8W',
    'RN' => 'RN',
    'W' => 'W',
    'CLN' => 'CLN',
    'LN' => 'LN',
    'MA' => 'MA',
    'BL' => 'BL',
    'HD' => 'HD',
    'LS' => 'LS',
    'GTE' => 'GTE',
    'GTW' => 'GTW',
    'HU' => 'HU',
    'JA' => 'JA',
    'PF' => 'PF',
    'RRE' => 'RRE',
    'RRW' => 'RRW',
    '8E' => '8E',
)
);

$options['evl_property_bedrooms'] = array( "name" => __( 'Bedrooms', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_bedrooms",
"type" => "text",
"std" => '',
);

$options['evl_property_baths'] = array( "name" => __( 'Baths', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_baths",
"type" => "text",
"std" => '',
);

$options['evl_property_living_areas'] = array( "name" => __( 'Living Areas', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_living_areas",
"type" => "text",
"std" => '',
);

$options['evl_property_square_feet'] = array( "name" => __( 'Square Feet', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_square_feet",
"type" => "text",
"std" => '',
);

$options['evl_property_school_district'] = array( "name" => __( 'School District', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_school_district",
"type" => "text",
"std" => '',
);

$options['evl_property_view'] = array( "name" => __( 'View', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_view",
"type" => "text",
"std" => '',
);

$options['evl_property_garages'] = array( "name" => __( 'Garages', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_garages",
"type" => "text",
"std" => '',
);

$options['evl_property_year_built'] = array( "name" => __( 'Year Built', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_year_built",
"type" => "text",
"std" => '',
);

$options['evl_property_lot_size'] = array( "name" => __( 'Lot Size', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_lot_size",
"type" => "text",
"std" => '',
);

$options['evl_property_acreage'] = array( "name" => __( 'Acreage', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_acreage",
"type" => "text",
"std" => '',
);

$options['evl_property_tour_link1'] = array( "name" => __( 'Tour Link 1', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_tour_link1",
"type" => "text",
"std" => '',
);

$options['evl_property_tour_link2'] = array( "name" => __( 'Tour Link 2', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_tour_link2",
"type" => "text",
"std" => '',
);

$options['evl_property_description'] = array( "name" => __( 'Property Description', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_property_description",
"type" => "editor",
"std" => '',
);

$options[] = array( "name" => $aveone_shortname."-tab-3", 
"id" => $aveone_shortname."-tab-3",
"type" => "close-tab" );

// Meta Information

$options[] = array( "id" => $aveone_shortname."-tab-5",
"type" => "open-tab");

$options['evl_meta_keywords'] = array( "name" => __( 'Meta Keywords', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_meta_keywords",
"type" => "textarea",
"std" => '',
);

$options['evl_meta_description'] = array( "name" => __( 'Meta Description', 'aveone' ),
"desc" => "",
"id" => $aveone_shortname."_meta_description",
"type" => "textarea",
"std" => '',
);

$options[] = array( "name" => $aveone_shortname."-tab-5", 
"id" => $aveone_shortname."-tab-5",
"type" => "close-tab" );




return $options;
}

/**
 * Front End Customizer
 *
 * WordPress 3.4 Required
 */
add_action( 'customize_register', 'aveone_customizer_register' );
        
function aveone_customizer_register( $wp_customize ) {
    /**
     * This is optional, but if you want to reuse some of the defaults
     * or values you already have built in the options panel, you
     * can load them into $options for easy reference
     */
	get_template_part('library/functions/customizer-class') ; 
    $customizer_array = array(
        'layout' => array(
            'name' => __( 'General', 'aveone'),
            'priority' => 101,
            'settings' => array(
				'evl_favicon',
                'evl_layout',            
                'evl_width_layout',
                'evl_width_px',
                )
        ),
        'header' => array(
            'name' => __( 'Header', 'aveone'),
            'priority' => 102,
            'settings' => array(
                'evl_header_logo',
                'evl_pos_logo',
                'evl_blog_title',
                'evl_tagline_pos',
                'evl_main_menu',
                'evl_sticky_header',
                'evl_searchbox',
                'evl_widgets_header',                
                'evl_header_widgets_placement',
            )
        ),
        'footer' => array(
            'name' => __( 'Footer', 'aveone'),
            'priority' => 103,
            'settings' => array(
                'evl_widgets_num',
                'evl_footer_content',
            )
        ),   
        'typography' => array(
            'name' => __( 'Typography', 'aveone'),
            'priority' => 104,
            	'settings' => array(
                'evl_title_font',
                'evl_tagline_font',
                'evl_menu_font',
                'evl_post_font',
                'evl_content_font',
                'evl_heading_font',
         
            )
        ),    
        'styling' => array(
            'name' => __( 'Styling', 'aveone'),
            'priority' => 105,
            'settings' => array(
                'evl_content_back',
                'evl_menu_back',
                'evl_menu_back_color',
                'evl_disable_menu_back',
                'evl_header_footer_back_color',
                'evl_pattern',
                'evl_scheme_widgets',
                'evl_scheme_background',
                'evl_scheme_background_100',
                'evl_scheme_background_repeat',
                'evl_general_link',
                'evl_button_1',
                'evl_button_2',
                'evl_widget_background',
                'evl_widget_background_image',
            )
        ),      
        'blog' => array(
            'name' => __( 'Blog', 'aveone'),
            'priority' => 106,
            'settings' => array(
                'evl_post_layout',
                'evl_excerpt_thumbnail',
                'evl_featured_images',
                'evl_blog_featured_image',                
                'evl_author_avatar',
                'evl_header_meta',
				'evl_category_page_title',
                'evl_posts_excerpt_title_length',                
                'evl_share_this',
                'evl_post_links',
                'evl_similar_posts',
				'evl_pagination_type'
            )
        ),   
        'social' => array(
            'name' => __( 'Social Media Links', 'aveone'),
            'priority' => 107,
            'settings' => array(
                'evl_social_links',
                'evl_social_color_scheme',
                'evl_social_icons_size',
                'evl_show_rss',                
                'evl_rss_feed',
                'evl_newsletter',
                'evl_facebook',
                'evl_twitter_id',
                'evl_instagram',
                'evl_skype',
                'evl_youtube',
                'evl_flickr',
                'evl_linkedin',
                'evl_googleplus',
                'evl_pinterest',                
            )
        ),   
        'boxes' => array(
            'name' => __( 'Front Page Content Boxes', 'aveone'),
            'priority' => 108,
            'settings' => array(
               'evl_content_boxes',
               'evl_content_box1_title',
               'evl_content_box1_icon',
               'evl_content_box1_icon_color',
               'evl_content_box1_desc',
               'evl_content_box1_button',
               'evl_content_box2_title',
               'evl_content_box2_icon',
               'evl_content_box2_icon_color',
               'evl_content_box2_desc',
               'evl_content_box2_button',
               'evl_content_box3_title',
               'evl_content_box3_icon',
               'evl_content_box3_icon_color',
               'evl_content_box3_desc',
               'evl_content_box3_button',
			   'evl_content_box4_title',
			   'evl_content_box4_icon',
			   'evl_content_box4_icon_color',
			   'evl_content_box4_desc',
			   'evl_content_box4_button',
            )
        ),    
        'bootstrap' => array(
            'name' => __( 'Bootstrap Slider', 'aveone'),
            'priority' => 109,
            'settings' => array(
               'evl_bootstrap_slider',
               'evl_bootstrap_speed',
               'evl_bootstrap_slide_title_font',
               'evl_bootstrap_slide_desc_font',
               'evl_bootstrap_slide1',
               'evl_bootstrap_slide1_img',
               'evl_bootstrap_slide1_title',
               'evl_bootstrap_slide1_desc',
               'evl_bootstrap_slide1_button',
               'evl_bootstrap_slide2',
               'evl_bootstrap_slide2_img',
               'evl_bootstrap_slide2_title',
               'evl_bootstrap_slide2_desc',
               'evl_bootstrap_slide2_button',
               'evl_bootstrap_slide3',
               'evl_bootstrap_slide3_img',
               'evl_bootstrap_slide3_title',
               'evl_bootstrap_slide3_desc',
               'evl_bootstrap_slide3_button',
               'evl_bootstrap_slide4',
               'evl_bootstrap_slide4_img',
               'evl_bootstrap_slide4_title',
               'evl_bootstrap_slide4_desc',
               'evl_bootstrap_slide4_button',
               'evl_bootstrap_slide5',
               'evl_bootstrap_slide5_img',
               'evl_bootstrap_slide5_title',
               'evl_bootstrap_slide5_desc',
               'evl_bootstrap_slide5_button',
            )
        ),        
        'parallax' => array(
            'name' => __( 'Parallax Slider', 'aveone'),
            'priority' => 110,
            'settings' => array(        
               'evl_parallax_slider',
               'evl_parallax_speed',
               'evl_parallax_slide_title_font',
               'evl_parallax_slide_desc_font',
               'evl_show_slide1',
               'evl_slide1_img',
               'evl_slide1_title',
               'evl_slide1_desc',
               'evl_slide1_button',
               'evl_show_slide2',
               'evl_slide2_img',
               'evl_slide2_title',
               'evl_slide2_desc',
               'evl_slide2_button',
               'evl_show_slide3',
               'evl_slide3_img',
               'evl_slide3_title',
               'evl_slide3_desc',
               'evl_slide3_button',
               'evl_show_slide4',
               'evl_slide4_img',
               'evl_slide4_title',
               'evl_slide4_desc',
               'evl_slide4_button',
               'evl_show_slide5',
               'evl_slide5_img',
               'evl_slide5_title',
               'evl_slide5_desc',
               'evl_slide5_button',
            )
        ),   
        'posts' => array(
            'name' => __( 'Posts Slider', 'aveone'),
            'priority' => 111,
            'settings' => array(        
               'evl_posts_slider',
               'evl_posts_number',
               'evl_posts_slider_content',
               'evl_posts_slider_id',
               'evl_carousel_speed',
               'evl_carousel_slide_title_font',
               'evl_carousel_slide_desc_font',
            )
        ),   
        'contact' => array(
            'name' => __( 'Contact', 'aveone'),
            'priority' => 112,
            'settings' => array(        
               'evl_gmap_type',
               'evl_gmap_width',
               'evl_gmap_height',
               'evl_gmap_address',
               'evl_sent_email_header',
               'evl_email_address',
               'evl_map_zoom_level',
               'evl_map_pin',
               'evl_map_popup',
               'evl_map_scrollwheel',
               'evl_map_scale',
               'evl_map_zoomcontrol',
            )
        ),    
        'extra' => array(
            'name' => __( 'Extra', 'aveone'),
            'priority' => 113,
            'settings' => array(        
               'evl_breadcrumbs',
               'evl_nav_links',
               'evl_pos_button',
               'evl_parallax_slider_support',
               'evl_carousel_slider',
               'evl_status_gmap',
               'evl_animatecss',
            )
        ),   
        'css' => array(
            'name' => __( 'Custom CSS', 'aveone'),
            'priority' => 114,
            'settings' => array(        
               'evl_css_content',
            )
        ),          
                                                                      
    );
	global $my_image_controls;
	$my_image_controls = array();
    $options = aveone_options();
    $i = 0;
    foreach ( $customizer_array as $name => $val ) {
        $wp_customize->add_section( "aveone-theme_$name", array(
            'title' => $val['name'],
            'priority' => $val['priority']
        ) );
        foreach ( $val['settings'] as $setting ) {

			$options[$setting]['std']	= isset( $options[$setting]['std'] ) ? $options[$setting]['std'] : '';
			$options[$setting]['type']	= isset( $options[$setting]['type'] ) ? $options[$setting]['type'] : '';

			//aveone_sanitize_typography
        	if ( $options[$setting]['type'] == 'typography' ){
        		$wp_customize->add_setting( "aveone-theme[$setting]", array(
	                'default' => $options[$setting]['std'],
	                'type' => 'option',
	                'sanitize_callback' => 'aveone_sanitize_typography',
	            ) );
        	}

        	else{
                
                
               /*             
	            $wp_customize->add_setting( "aveone-theme[$setting]", array(
	                'default' => $options[$setting]['std'],
	                'type' => 'option'
	            ) );
                 */
                
                 //sanitize everything else
                
                switch($options[$setting]['id'])
                {
                   
                       
                    /* image sanitization start */
                    case "evl_favicon":
                    case "evl_header_logo":
                    case "evl_scheme_background":
                    case "evl_bootstrap_slide1_img":
                    case "evl_bootstrap_slide2_img":
                    case "evl_bootstrap_slide3_img":
                    case "evl_bootstrap_slide4_img":
                    case "evl_bootstrap_slide5_img":
                    case "evl_slide1_img":
                    case "evl_slide2_img":
                    case "evl_slide3_img":
                    case "evl_slide4_img":
                    case "evl_slide5_img":
                    case "evl_scheme_background":
                    
                       $wp_customize->add_setting( "aveone-theme[$setting]", array(
	                       'default' => $options[$setting]['std'],
                           'type' => 'option',
                           'sanitize_callback' => 'aveone_sanitize_upload'
	                    ));
                    
                       break;
                 
                    // image sanitization end
                    
                   
                    // hex color sanitization start
                    
                    case "evl_menu_back_color":
                    case "evl_header_footer_back_color":
                    case "evl_scheme_widgets":
                    case "evl_general_link":
                    case "evl_button_1":
                    case "evl_button_2":
                    case "evl_social_color_scheme":
                    case "evl_content_box1_icon_color":
                    case "evl_content_box2_icon_color":
                    case "evl_content_box3_icon_color":
					case "evl_content_box4_icon_color":
                    
                    
                        $wp_customize->add_setting( "aveone-theme[$setting]", array(
	                       'default' => $options[$setting]['std'],
                           'type' => 'option',
                           'sanitize_callback' => 'aveone_sanitize_hex'
	                    ));
                    
                    break;
                    
                    
                  
                    // hex color sanitization end 
                    
            
                    
                    // select sanitization start 
                    case "evl_layout":
                    case "evl_width_layout":
                    case "evl_post_links":
                    case "evl_pos_logo":
                    case "evl_tagline_pos":
                    case "evl_widgets_header":
                    case "evl_header_widgets_placement":
                    case "evl_widgets_num":
                    case "evl_content_back":
                    case "evl_menu_back":
                    case "evl_pattern":
                    case "evl_scheme_background_repeat":
                    case "evl_post_layout":
                    case "evl_header_meta":
                    case "evl_share_this":
                    case "evl_similar_posts":
					case "evl_pagination_type":
                    case "evl_social_icons_size":
                    case "evl_bootstrap_slider":
                    case "evl_parallax_slider":
                    case "evl_posts_slider":
                    case "evl_posts_number":
                    case "evl_posts_slider_content":
                    case "evl_gmap_type":
                    case "evl_nav_links":
                    case "evl_pos_button":
                    
                        $wp_customize->add_setting( "aveone-theme[$setting]", array(
	                       'default' => $options[$setting]['std'],
                           'type' => 'option',
                           'sanitize_callback' => 'aveone_sanitize_choices'
	                    ));
                    
                    break;
                    
                  
                    // select sanitization end 
                 
                    
                    // numerical text sanitization start 
                    
                    case "evl_bootstrap_speed":
                    case "evl_parallax_speed":
                    case "evl_carousel_speed":
                    case "evl_map_zoom_level":
                    case "evl_width_px":
                    case "evl_posts_excerpt_title_length":  
					case "evl_category_page_title":
                        $wp_customize->add_setting( "aveone-theme[$setting]", array(
	                       'default' => $options[$setting]['std'],
                           'type' => 'option',
                           'sanitize_callback' => 'aveone_sanitize_numbers'
	                    ));
                    
                    break;
                    
                    // numerical text sanitization end 
                    
                    
                    // pixel sanitization start 
                    
                    case "evl_gmap_width":
                    case "evl_gmap_height":
                        $wp_customize->add_setting( "aveone-theme[$setting]", array(
	                       'default' => $options[$setting]['std'],
                           'type' => 'option',
                           'sanitize_callback' => 'aveone_sanitize_pixel'
	                    ));
                    
                    break;
                    
                    // pixel sanitization end 
                    
                    
                    
                    
                    // text url sanitization start 
                                      
                    case "evl_newsletter":
                    case "evl_facebook":
                    case "evl_rss_feed":
                    case "evl_twitter_id":
                    case "evl_instagram":
                    case "evl_skype":
                    case "evl_youtube":
                    case "evl_flickr":
                    case "evl_linkedin":
                    case "evl_googleplus":
                    case "evl_pinterest":
                    
                        $wp_customize->add_setting( "aveone-theme[$setting]", array(
	                       'default' => $options[$setting]['std'],
                           'type' => 'option',
                           'sanitize_callback' => 'esc_url_raw'
	                    ));
                    
                      break;
                    
                            
                    // text url sanitization end 
                    
                    
                    
                    // text field sanitization start 
                    
                    case "evl_content_box1_title":
                    case "evl_bootstrap_slide1_title":
                    case "evl_bootstrap_slide2_title":
                    case "evl_bootstrap_slide3_title":
                    case "evl_bootstrap_slide4_title":
                    case "evl_bootstrap_slide5_title":
                    case "evl_content_box2_title":
                    case "evl_content_box3_title":
					case "evl_content_box4_title":
                    case "evl_slide1_title":
                    case "evl_slide2_title":
                    case "evl_slide3_title":
                    case "evl_slide4_title":
                    case "evl_slide5_title":
                    case "evl_posts_slider_id":
                    case "evl_gmap_address":
                    case "evl_sent_email_header":
                        $wp_customize->add_setting( "aveone-theme[$setting]", array(
	                       'default' => $options[$setting]['std'],
                           'type' => 'option',
                           'sanitize_callback' => 'aveone_sanitize_text_field'
	                    ));
                    
                    break;
                    
                     // text field sanitization end 
                    
                    
                    
                    // fontawesome fields sanitization start 
                     
                    case "evl_content_box1_icon":
                    case "evl_content_box2_icon":
                    case "evl_content_box3_icon":
					case "evl_content_box4_icon":
                    
                        $wp_customize->add_setting( "aveone-theme[$setting]", array(
	                       'default' => $options[$setting]['std'],
                           'type' => 'option',
                           'sanitize_callback' => 'aveone_sanitize_text_field'
	                    ));
                    
                    break;
                    
                   // fontawesome fields sanitization end 
                    
                    
                    
                    // text email field sanitization start 
                    
                    case "evl_email_address":
                    
                        $wp_customize->add_setting( "aveone-theme[$setting]", array(
	                       'default' => $options[$setting]['std'],
                           'type' => 'option',
                           'sanitize_callback' => 'sanitize_email'
	                    ));
                    
                    break;
                    
                    
                    // text email field sanitization end 
                    
                    
                    
                    
                    
                   
                    
                    // textarea sanitization start 
                    
                    case "evl_footer_content":
                    case "evl_content_box1_desc":
                    case "evl_content_box1_button":
                    case "evl_content_box2_desc":
                    case "evl_content_box2_button":
                    case "evl_content_box3_desc":
                    case "evl_content_box3_button":
					case "evl_content_box4_desc":
					case "evl_content_box4_button":
                    case "evl_bootstrap_slide1_desc":
                    case "evl_bootstrap_slide1_button":
                    case "evl_bootstrap_slide2_desc":
                    case "evl_bootstrap_slide2_button":
                    case "evl_bootstrap_slide3_desc":
                    case "evl_bootstrap_slide3_button":
                    case "evl_bootstrap_slide4_desc":
                    case "evl_bootstrap_slide4_button":
                    case "evl_bootstrap_slide5_desc":
                    case "evl_bootstrap_slide5_button":
                    case "evl_slide1_desc":
                    case "evl_slide1_button":
                    case "evl_slide2_desc":
                    case "evl_slide2_button":
                    case "evl_slide3_desc":
                    case "evl_slide3_button":
                    case "evl_slide4_desc":
                    case "evl_slide4_button":
                    case "evl_slide5_desc":
                    case "evl_slide5_button":
                    case "evl_css_content":
                     
                        $wp_customize->add_setting( "aveone-theme[$setting]", array(
	                       'default' => $options[$setting]['std'],
                           'type' => 'option',
                           'sanitize_callback' => 'aveone_sanitize_textarea'
	                    ));
                    
                        break;
                  
                    // textarea sanitization end 
                    
                    
                    
                    // checkbox sanitization start 
                    
                    case "evl_blog_title":
                    case "evl_main_menu":
                    case "evl_disable_menu_back":
                    case "evl_scheme_background_100":
                    case "evl_widget_background":
                    case "evl_widget_background_image":
					case "evl_pagination_type":
                    case "evl_excerpt_thumbnail":
                    case "evl_author_avatar":
                    case "evl_map_pin":
                    case "evl_map_popup":
                    case "evl_map_scrollwheel":
                    case "evl_map_scale":
                    case "evl_map_zoomcontrol":
                    // Following has 1 by default for the checkbox 
                    case "evl_sticky_header":
                    case "evl_searchbox":
                    case "evl_featured_images":
                    case "evl_blog_featured_image":                    
                    case "evl_social_links":
                    case "evl_show_rss":
                    case "evl_content_boxes":
                    case "evl_bootstrap_slide1":
                    case "evl_bootstrap_slide2":
                    case "evl_bootstrap_slide3":
                    case "evl_bootstrap_slide4":
                    case "evl_bootstrap_slide5":
                    case "evl_show_slide1":
                    case "evl_show_slide2":
                    case "evl_show_slide3":
                    case "evl_show_slide4":
                    case "evl_show_slide5":
                    case "evl_breadcrumbs":
                    case "evl_parallax_slider_support":
                    case "evl_carousel_slider":
                    case "evl_status_gmap":
                    case "evl_animatecss":
                   
                       $wp_customize->add_setting( "aveone-theme[$setting]", array(
	                       'default' => $options[$setting]['std'],
                           'type' => 'option',
                           'sanitize_callback' => 'aveone_sanitize_checkbox'
	                    ));
                       break;
                    
                    // checkbox sanitization end
                    
                    
                    
                }                
        	}

            
            if ( $options[$setting]['type'] == 'radio' || $options[$setting]['type'] == 'select' ) {
                $wp_customize->add_control( "aveone-theme_$setting", array(
                    'label' => $options[$setting]['name'],
                    'section' => "aveone-theme_$name",
                    'settings' => "aveone-theme[$setting]",
                    'type' => $options[$setting]['type'],
                    'choices' => $options[$setting]['options'],
                    'priority' => $i
                ) );
            } elseif ( $options[$setting]['type'] == 'text' || $options[$setting]['type'] == 'checkbox' ) {
                $wp_customize->add_control( "aveone-theme_$setting", array(
                    'label' => $options[$setting]['name'],
                    'section' => "aveone-theme_$name",
                    'settings' => "aveone-theme[$setting]",
                    'type' => $options[$setting]['type'],
                    'priority' => $i
                ) );
            } elseif ( $options[$setting]['type'] == 'color' ) {
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "aveone-theme_$setting", array(
                            'label' => $options[$setting]['name'],
                            'section' => "aveone-theme_$name",
                            'settings' => "aveone-theme[$setting]",
                            'type' => $options[$setting]['type'],
                            'priority' => $i
                                ) ) );

            /********************************************
            *
            * Typography add new by ddo
            *
            * code cho class aveone_Customize_Typography_Control dat o :
            * library/functions/customizer-class.php
            *
            *********************************************/
            
            } elseif ( $options[$setting]['type'] == 'typography' ) {
            	
                $wp_customize->add_control( new aveone_Customize_Typography_Control( $wp_customize, "aveone-theme_$setting", array(
                            'label' => $options[$setting]['name'],
                            'section' => "aveone-theme_$name",
                            'settings' => "aveone-theme[$setting]",
                             
                            'priority' => $i
                                ) ) );    

            } elseif ( $options[$setting]['type'] == 'upload' ) {
				$my_image_controls["aveone-theme_$setting"] =  aveone_add_image_control($options,$setting, $name,$i);

				
			} elseif ( $options[$setting]['type'] == 'images' ) {
                $wp_customize->add_control( new aveone_Customize_Image_Control( $wp_customize, "aveone-theme_$setting", array(
                            'label' => $options[$setting]['name'],
                            'section' => "aveone-theme_$name",
                            'settings' => "aveone-theme[$setting]",
							'type' => $options[$setting]['type'],
							'choices' => $options[$setting]['options'],
							'priority' => $i
                                ) ) );
            } elseif ( $options[$setting]['type'] == 'textarea' ) {
                $wp_customize->add_control( new aveone_Customize_Textarea_Control( $wp_customize, "aveone-theme_$setting", array(
                            'label' => $options[$setting]['name'],
                            'section' => "aveone-theme_$name",
                            'settings' => "aveone-theme[$setting]",
							'type' => $options[$setting]['type'],
							'priority' => $i
                                ) ) );
            }
            $i++;
        }
    }
    foreach ($my_image_controls as $id => $control) {
				   $control->add_tab( 'library',   __( 'Media Library', 'aveone' ), 'aveone_library_tab' );
            
     }     

} 

function aveone_library_tab() {
	
    global $my_image_controls;
    static $tab_num = 0; // Sync tab to each image control
   
    $control = array_slice($my_image_controls, $tab_num, 1);
      
    ?>
    <a class="choose-from-library-link button"
        data-controller = "<?php printf ('%s', esc_attr( key($control) )); ?>">
        <?php _e( 'Open Library', 'aveone' ); ?>
    </a>
     
    <?php
    $tab_num++;

}   

function aveone_add_image_control( $options,$setting, $name,$i) {
    global $wp_customize;
    $control =
    new WP_Customize_Image_Control( $wp_customize, "aveone-theme_$setting",
        array(
        'label'         => $options[$setting]['name'],
        'section'       => "aveone-theme_$name",
        'priority'      => $i,
        'settings'      => "aveone-theme[$setting]"// "aveone-theme[$setting]"
        )
    );
   
    $wp_customize->add_control($control);
    return $control;
}