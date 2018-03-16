=== LinkedInclude ===
Contributors: era404
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JE3VMPUQ6JRTN
Tags: LinkedIn
Requires at least: 3.2.1
Tested up to: 4.9.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Import your LinkedIn posts into a WordPress widget.

== Description ==

LinkedIn discontinued support for personalized RSS feeds in December 2013.
Previous versions of this plugin operated by scraping your Author Post Activity page: https://www.linkedin.com/today/author/[author]. 
Posts are sanitized and saved to a new table in WordPress, preparing them for output into your widget. 
The widget can be positioned in sidebars or footers like any other feed.


**Boost the Traffic to your LinkedIn Articles**

* Industry Leaders using LinkedIn for their social or news broadcasts can direct their blog traffic back to LinkedIn. 
* Plugin can import LinkedIn articles from any number of authors.
* Separate widgets can be placed into the templates to show articles by one author, or all author articles sorted by newest.
* Additional widget controls built in for number of articles, module title and excerpt length.
* Imported articles can be individually toggled for visibility. 

== Installation ==

1. Install LinkedInclude either via the WordPress.org plugin directory, or by uploading the files to your server (in the `/wp-content/plugins/` directory).
2. Activate the plugin.
3. Visit Tools > LinkedInclude to find the import utility.
4. Enter a permalink to a LinkedIn article and click **[ TEST ]**.
    1. This feature will open a browser window for that permalink's Related Content feed from LinkedIn.
    2. If the feed begins with **reason: PUBLISHED_POSTS_REASON_DEFAULT**, then LinkedIn *is* returning your Related Content and this plugin will likely achieve the desired results.
    3. If the feed begins with **reason: EDITORS_PICKS**, then LinkedIn *is not* returning your Related Content, but rather unrelated articles selected by them. 
5. If you wish to continue, click **[ FETCH ARTICLES ]** and LinkedInclude will attempt to import into WordPress all of the articles shown in the previous test operation.  
6. These articles will be listed for your moderation, all hidden by default.
    1. Click the checkbox beside each article to attempt fetching the HTML content from the LinkedIn permalink page.
    2. Activated articles will be shown in your LinkedInclude widget(s). Hidden articles will not.
7. Add a LinkedInclude Widget to your sidebar, footer, etc. through the Appearance > Widgets page.
8. Configure the display of the LinkedInclude feed by setting properties in the widget: Title, Source/Author (or All Sources), # Posts to Show, Excerpt Length.
9. Add as many widgets as needed.

== Screenshots ==

1. How your LinkedIn Articles feed will appear on the front end
2. Enter a permalink to an article on LinkedIn to fetch Related Content
3. Activate an article to fetch the content and include the article among those displayed in the widget
4. The widget gives you control over how the feed is displayed
5. Test first whether LinkedIn's Related Content feed will return your own articles

== Frequently Asked Questions ==

= Are there any new features planned? =
Not at this time.

= Can i propose a feature? =
If you wish. Sure.

== Changelog ==
= 2.0.0 =
* Plugin rewritten to use Related Content, in place of the Author Post Activity. 
* **This version will drop & replace your data table**, effectively starting fresh. Consequently, any articles you may have imported with previous versions of the plugin will be cleared to prepare for the new operation of the plugin. 
* Please note that this plugin is to be considered *experimental* and not guaranteed to function consistently for all LinkedIn authors. As such, a tester function is built into the plugin to help you identify whether your content can be imported properly.
* In its current state of rewrite, only article images at 360x120 will be imported. This size is provided by the Related Content feed, and conveniently works well for a sidebar or footer.  
* You are welcome to rate this plugin poorly if your content is not capable of being imported, however it would be much more informative/beneficial to the plugin authors and other WordPress users if you document the difficulties you experience.

= 1.0.1 =
* LinkedInclude now uses [guzzlehttp](http://docs.guzzlephp.org/en/latest/) to fetch articles list and [fabpot/goutte](https://packagist.org/packages/fabpot/goutte) to read article properties
* Author ID now resembles a LinkedIn hash ( e.g.: [https://www.linkedin.com/today/author/0_3O4HsOCdgaCMqMujqsA8Yb](https://www.linkedin.com/today/author/0_3O4HsOCdgaCMqMujqsA8Yb) ) instead of a simple integer User ID. Please see the [installation instructions](https://wordpress.org/plugins/linkedinclude/installation/) for steps to find your Author ID hash, or the [screenshot](https://wordpress.org/plugins/linkedinclude/screenshots/)
* Because the table structure has changed, you will need to deactivate and reactivate this plugin if you have been using older versions of this plugin, before installation.

= 0.9.1 =
* Suppressed warnings about linkedIn articles published without body copy

= 0.9.0 =
* Plugin-out only in beta, currently. Standby for official release.