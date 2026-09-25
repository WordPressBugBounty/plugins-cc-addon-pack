=== Saitama Addon Pack ===
Contributors: Communitycom
Donate link:
Tags: google-analytics, seo, widgets, facebook, og-tags
Requires at least: 4.7
Tested up to: 7.1
Stable tag: 1.0.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plug-in is an integrated plug-in with a variety of features that make it powerful your web site.

== Description ==

This plug-in is an integrated plug-in with a variety of features that make it powerful your web site.

[ Powerful　Widgets ]

*   Recent Posts - display the link text and the date of the latest article title.
*   FB Page Plugin - display the Facebook Page Plugin.
*   topic area - display the topic area.
*   Contact widget - display contact area.

[ Social media ]

*   Print OG Tags

[ Others ]

*   Print Google Analytics tag
*   Print meta keyword tag
*   Print meta description tag
*	Set Default Thumbnail
*   Set Favicon

and more.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates

== Frequently Asked Questions ==



== Screenshots ==

1. Feature can be stopped individually.
2. This is an example of SNS cooperation setting screen.

== Changelog ==

= 1.0.9 =
* Security fix: escape Meta Keywords / Meta Description values in the post-editor metaboxes (esc_attr/esc_textarea) to prevent a Contributor+ stored XSS. Sanitize input on save (sanitize_text_field/sanitize_textarea_field). Credit: security researcher testoun.
* Escape all remaining dynamic output across widgets, admin settings screen, and front-end meta/OG tags (esc_html/esc_attr/esc_url).
* Add missing text-domain arguments and translator comments for translation strings.
* Add direct-file-access protection to all PHP files.
* Bundle Bootstrap and Font Awesome locally instead of loading them from a third-party CDN.
* Register the Google Analytics script properly via wp_enqueue_script()/wp_add_inline_script() instead of printing a raw <script> tag.
* Replace discouraged functions (strip_tags(), wp_reset_query()) with their recommended equivalents.
* Prefix global variable names, and other WordPress Plugin Check / coding-standards cleanup.

= 1.0.8 =
* Change Google Analitics version

= 1.0.7 =
* Change function's name

= 1.0.4 =
* Update Bootstrap version
* Update FontAwesome version

= 1.0.3 =
* Change plugin name

= 1.0.2 =
* Add class tag
* Change function's name

= 1.0.1 =
* Author fixed.

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0.9 =
Security fix: patches a stored XSS vulnerability in the Meta Keywords / Meta Description post metaboxes, plus a broader security/coding-standards cleanup. Update immediately.
