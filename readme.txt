=== VS Event List ===
Contributors: Guido07111975
Version: 16.6
License: GNU General Public License v3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Requires PHP: 7.1
Requires at least: 5.3
Tested up to: 6.3
Stable tag: 16.6
Tags: simple, event, events, event list, event manager


This is a lightweight plugin to create a customized event list. Add the shortcode on a page or use the widget to display your events.


== Description ==
= About =
This is a lightweight plugin to create a customized event list.

Add the shortcode on a page or use the widget to display your events.

You can personalize your event list via the settings page or by adding attributes to the shortcode or the widget.

= How to use =
After installation go to menu item "Events" and start adding your events.

Create a page and add shortcode:

* `[vsel]` to display upcoming events (with today)
* `[vsel-future-events]` to display future events (without today)
* `[vsel-current-events]` to display current events (today)
* `[vsel-past-events]` to display past events (before today)
* `[vsel-all-events]` to display all events

Or go to Appearance > Widgets and use the widget to display your events.

= Settings page =
You can personalize your event list via the settings page. This page is located at Settings > VS Event List.

Several settings can be overridden when using the relevant (shortcode) attributes below.

This can be useful when having multiple event lists on your website.

= Shortcode attributes =
You can also personalize your event list by adding attributes to the shortcodes mentioned above. Attributes will override the settings page.

* Add custom CSS class to event list: `class="your-class-here"`
* Change the number of events per page: `posts_per_page="5"`
* Pass over one or multiple events: `offset="1"`
* Change date format: `date_format="j F Y"`
* Display events from a certain category: `event_cat="your-category-slug"`
* Display events from multiple categories: `event_cat="your-category-slug-1, your-category-slug-2"`
* Reverse order of upcoming, future and current events list: `order="DESC"`
* Reverse order of past and all events list: `order="ASC"`
* Change no events are found text: `no_events_text="your text here"`
* Disable event title link: `title_link="false"`
* Disable featured image link: `featured_image_link="false"`
* Disable featured image caption: `featured_image_caption="false"`
* Disable featured image: `featured_image="false"`
* Disable read more link: `read_more="false"`
* Disable pagination: `pagination="false"`
* Display all event info: `event_info="all"`
* Display summary: `event_info="summary"`

About the offset attribute: pagination is being disabled when using offset.

Examples:

* One attribute: `[vsel posts_per_page="5"]`
* Multiple attributes: `[vsel posts_per_page="5" event_cat="your-category-slug" event_info="summary"]`

= Widget attributes =
The widget supports the same attributes. Don't add the main shortcode tag or the brackets.

Examples:

* One attribute: `posts_per_page="5"`
* Multiple attributes: `posts_per_page="5" event_cat="your-category-slug" event_info="summary"`

= Featured image =
The featured image will be used as primary image for every event.

By default the "post thumbnail" is being used as source for the featured image. The size of the post thumbnail may vary by theme.

WordPress creates duplicate images in different sizes upon upload. These sizes can be set via Settings > Media. In case the post thumbnail doesn't look nice you can choose a different size via the settings page.

Besides this you can also change the width of the featured image.

The featured image on the single event page is handled by your theme.

= Default support =
Plugin supports the single event page, the event category page, the post type (event) archive page and the search results page. It hooks into the theme template file that is being used by these pages.

Support for the single event page is needed. Support for the other pages is added to make VS Event List compatible with page builder plugins. Events on default WP pages are not ordered by event date.

Plugin activates the post attributes box in the editor. In the post attributes box you can set a custom order for events with the same date. Events are ordered automatically when having start time and end time.

Plugin supports the menu page. Support is added to make VS Event List compatible with page builder plugins.

= Advanced Custom Fields =
You can add extra fields to the event details by using the [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields) plugin. The most commonly used fields are supported.

Create a field group for post type "event" and add fields to this group. This field group will be added to the editor.

= RSS and iCal feed =
You can share your upcoming events via an RSS feed.

The default RSS widget will display events from future to upcoming. To reverse this order I recommend using a RSS feed plugin.

You can share your upcoming and past events with an external calendar via an iCal feed.

To activate both feeds go to the settings page.

= Question? =
Please take a look at the FAQ section.

= Translation =
Not included but plugin supports WordPress language packs.

More [translations](https://translate.wordpress.org/projects/wp-plugins/very-simple-event-list) are very welcome!

The translation folder inside this plugin is redundant but kept for reference.

= Credits =
Without the WordPress codex and help from the WordPress community I was not able to develop this plugin, so: thank you!

Enjoy!


== Frequently Asked Questions ==
= About the FAQ =
The FAQ are updated regularly to include support for newly added or changed plugin features.

= How do I set plugin language? =
Plugin will use the website language, set in Settings > General.

If plugin isn't translated into this language, language fallback will be English.

= How do I set date format and time format? =
By default plugin uses date format and time format from Settings > General.

The datepicker and date input field only support 2 numeric date formats: "day-month-year" (30-01-2016) and "year-month-day" (2016-01-30).

If date format does not match, it will be changed into 1 of the 2 above.

You can change date format and time format for the frontend of your website via the settings page. You can also change date format by using an attribute.

The date icon only supports 2 date formats: "day-month-year" (30 Jan 2016) and "year-month-day" (2016 Jan 30).

If date format does not match, it will be changed into 1 of the 2 above.

= Which timezone does plugin use? =
Events are saved in database and displayed throughout your website without timezone offset.

= Can I change the colors of the date icon? =
You should use custom CSS for that.

Examples:

Change background and text color of whole icon: `.vsel-start-icon, .vsel-end-icon {background:#eee; color:#f26535;}`

Change background and text color of top part: `.vsel-day-top, .vsel-month-top {background:#f26535; color:#eee;}`

= Can I override plugin template files via my (child) theme? =
You can only override the single event page via your (child) theme.

In most cases PHP file "single" is being used for the single event page. This file is located in your theme folder.

Create a duplicate of file "single" and rename it "single-event", add this file to your (child) theme folder and customize it to your needs.

= How does plugin hook into theme template files? =
Plugin hooks into the `the_content()` and `the_excerpt()` function. These functions are being used by most themes.

In some cases there's a conflict with your theme or page builder plugin. That's why you can disable the use of theme template files via the settings page.

= Why no pagination in widget? =
Pagination is not working properly in a widget.

But you can set a link to a page with all events.

= Why no pagination when using the offset attribute? =
Offset breaks pagination, so that's why pagination is being disabled when using offset.

= Why does the offset attribute have no effect? =
Offset is being ignored when attribute "posts_per_page" has value "-1" (display all events).

= Why is the page with all events not displayed properly? =
This only applies to pages with a shortcode based event list.

When using the block editor, open the page in the editor and check the shortcode in "Edit as HTML" mode.

When using the classic editor, open the page in the editor and check the shortcode in "Text" mode.

It might be accidentally wrapped in HTML tags, such as: `<script>[vsel]</script>`

Please remove the HTML tags and resave the page.

= Can I have "Event" as page title? =
Having "Event" as page (or post) title is no problem, but having "event" as slug (end of URL) will cause a conflict with the post type (event) archive page.

You should change this slug into something else. This can be done by changing the permalink of this page (or post).

= Why a 404 (nothing found) when I click the title link? =
This is mostly caused by the permalink settings. Please resave the permalink via Settings > Permalinks.

= Why a 404 (nothing found) when I click the event category link? =
This is mostly caused by the permalink settings. Please resave the permalink via Settings > Permalinks.

= Can I add multiple shortcodes on the same page? =
This is possible but to avoid a conflict you should disable pagination. This can be done via the settings page or by using an attribute.

= Why no event details or event categories box in the editor? =
When using the block editor, click the options icon and select "Preferences".

When using the classic editor, click the "Screen Options" tab.

Probably the checkbox to display the relevant box in the editor is not checked.

= Why no featured image box in the editor? =
When using the block editor, click the options icon and select "Preferences".

When using the classic editor, click the "Screen Options" tab.

Probably the checkbox to display the relevant box in the editor is not checked.

But sometimes your theme does not support featured images. Or only for posts and pages. In that case you must manually add this support for events.

= Why no Advanced Custom Fields field group in the editor? =
When using the block editor, click the options icon and select "Preferences".

When using the classic editor, click the "Screen Options" tab.

Probably the checkbox to display the relevant box in the editor is not checked.

= Does this plugin have its own block? =
No, plugin doesn't have its own block in the editor and there are no plans to add this anytime soon.

= Why does my RSS or iCal feed not refresh? =
When visiting your feed via the subscription URL and feed isn't refreshed, empty your browser cache.

When using the default RSS widget you can force a refresh via Settings > Reading, by changing the number of items in feed.

= No Semantic versioning? =
Version number doesn't give you info about the type of update (major, minor, patch). You should check changelog for that.

= How can I make a donation? =
You like my plugin and you're willing to make a donation? Thanks, I really appreciate that! There's a PayPal donate link at my website.

= Other question or comment? =
Please open a topic in plugin forum.


== Changelog ==
= Version 16.6 =
* Minor changes in code

= Version 16.5 =
* Fix: mistake in main plugin file
* Previous version causes fatal error in some cases

= Version 16.4 =
* Changed CSS class of the event info container
* Class "vsel-image-info" becomes "vsel-info-block"
* Added 2 CSS classes for alignment: "vsel-left" and "vsel-right"
* Removed old alignment classes (these classes end with left and right)
* Because of these changes you may have to clear your browser cache
* Updated stylesheet
* Minor changes in code
* Textual changes

= Version 16.3 =
* New: featured image caption
* Added attribute to disable featured image caption per event list
* Fix: alt text for ACF image field
* Minor changes in code

= Version 16.2 =
* Textual changes

= Version 16.1 =
* New: display read more link after event info
* Added attribute to disable read more link per event list
* Fix: alt text for featured image and ACF image field
* Textual changes
* Minor changes in code

= Version 16.0 =
* Updated RSS and iCal feed

= Version 15.9 =
* New: RSS feed
* For users with iCal feed: subscription URL is changed
* Check settings page for more info
* Updated settings page
* Changed several fields from checkbox into select (Date, Event info and Pagination)
* This means you may have to set these settings again

= Version 15.8 =
* New: setting for numeric pagination
* Minor changes in code

= Version 15.7 =
* New: display date icon next to other event details
* In previous versions you could only display date icon next to title
* Textual changes

For all versions please check file changelog.


== Screenshots ==
1. Shortcode event list (GeneratePress theme)
2. Shortcode event list (GeneratePress theme)
3. Widget event list (GeneratePress theme)
4. Single event (GeneratePress theme)
5. Events page (dashboard)
6. Single event (dashboard)
7. Widget (dashboard)
8. Settings page (dashboard)
9. Settings page (dashboard)
10. Settings page (dashboard)
11. Settings page (dashboard)
12. Settings page (dashboard)
13. Settings page (dashboard)
14. Settings page (dashboard)
15. Settings page (dashboard)