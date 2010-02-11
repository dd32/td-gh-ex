This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.


---------------------------------------------------------------------


Please respect that we have put a healthy amount of time in the development, testing and the maintenance of this theme. You can use this theme free of charge according to the GPL license. However, we ask a small, yet completely optional, favor of you: If you like the theme, we would appreciate if you keep the credits in the footer of the theme intact. We have intentionally made them small and not intrusive. It's a small favor for a project that, had you hired someone to design and develop this theme for you, cost several thousand dollars. 


Translation
---------------------------------------------------


Help and how to translate Arjuna into your own language can be found here: http://192.168.2.100/srssolutions.com/en/downloads/arjuna_wordpress_theme#faq

Currently available translations:

- Italian (thanks to Gianni Diurno, gidibao.net)
- Lithuanian (thanks to Vaidas Juknevicius aka SeniZ)
- Chinese (thanks to Liuyue, liuyue.asia)
- French (thanks to Laurent Measson and Sebastien Violet)
- Brazilian (thanks to Pedro Spoladore)
- Spanish (thanks to José Marín)
- German (thanks to Frank Weichbrodt and Markus Liebl)
- Czech (thanks to Jirka Knapek and Ivan)


More Information and Support
---------------------------------------------------


Changelog: http://www.srssolutions.com/en/downloads/arjuna_wordpress_theme#changelog
FAQ: http://www.srssolutions.com/en/downloads/arjuna_wordpress_theme#faq
Report Bug: http://www.srssolutions.com/en/downloads/bug_report


Important notes about this theme:
---------------------------------------------------

* The two menus that are supported by this theme do NOT extend to more than one line. If you have more menu items and they don't fit, the theme has to be customized to accommodate your needs. Generally speaking, it is good practice to keep the options that a user of your website has limited. If you find that you have too many top categories, we advise to minimize the amount of top categories and create your category logic more intelligently and *user-friendly*. Besides, if you use sub categories, they will be shown in a dropdown menu as supported by Arjuna.


About IE6 Support:
---------------------------------------------------

Obviously, the IE6 version of this theme looks a little different than the version displayed in modern browsers. We had tried to simulate the modern version as much as possible but due to the nature of the IE6 rendering engine, we had to make certain decisions to cut down on some visual elements (layout remains completely the same!). The only alternative that we considered for a short time was to use GIF transparency, however, the graphics looked jagged at many areas so we decided to create an IE6 only version of the theme with a simpler background than the original. We believe the result is more than acceptable. Remember the horribly designed websites that had been created back in the days where IE6 was launched? This is definitely not one of them.
Nonetheless, we still hope that IE6 will rest in peace soon.


Changelog:
---------------------------------------------------

1.2.1
- Fixed bug: The Edit in Admin button always appeared even if nobody was logged in. It now only appears if you are logged in into the WordPress admin.
- Fixed bug: If you chose to display pages in the second header menu, the items could not be sorted in descending order. Instead Arjuna always switched back to ascending.
- Fixed minor bugs in the admin.
- Updated localizations: German, French
1.2
- New feature: Native support for pagination has been added.
- New feature: It's now possible to enable links to previous and next posts on permalink pages, i.e. the URL where one single post/page is displayed.
- New feature: The RSS button in the sidebar can now be disabled.
- New feature: Arjuna now integrates a simple Twitter icon, which will appear right next to the RSS icon in the sidebar.
- Localization added: Czech (1.2)
- Localizations updated: Lithuanian, Spanish, French, Brazilian, German (1.2)
- Improved feature: The custom CSS now also works even if Arjuna has no write permissions to the theme directory. The CSS rules will be included in the HTML HEAD. This ensures maximum compatibility with a variety of setups.
- Some minor performance optimizations.
- Fixed bug: When the display of time in posts is disabled in the admin, the date would inaccurately append the time without any space or words in between.
- Fixed bug: When the date format of comments was set to the default date format (showing a date instead of the elapsed time), the date was not correctly translated by WordPress. This only occured in non-English WordPress installations.
- Fixed bug: When users had to be logged in to post a comment, the sidebar would be placed below the whole post.
- Fixed IE6 display bugs: There had been some IE6 bugs since version 1.1.3, that appeared with and without IE6 optimization enabled.
1.1.4
- Localization updated: Brazilian (1.1.3)
- Fixed bug: When displaying the elapsed time of a comment, there was an error with handling time zones. That way, some comments showed a negative number of seconds.
- Fixed bug: The feature to add custom CSS is now only enabled if the application has sufficient write permissions to create a user-style.css file.
1.1.3
- New feature: It's now possible to add your custom CSS rules via the admin. This will ensure that your custom CSS is not overwritten when you update Arjuna automatically.
- New feature: Posts and pages can now show not only the date but also the time of when the post/page has been published.
- Included support for H1 tags in posts.
- Optimized Arjuna for SEO purposes. The titles of single pages/posts are now H1 tags, while the titles on archive pages remain in H2 elements.
- New localization: Brazilian
- New localization: German
- Localization updated: French
- Localization updated: Spanish
- Updated .POT localization file.
- Fixed bug: When someone submitted a comment and did not enter a website URL, the comment author would link to http://Yourwebsite.
- Fixed bug: Full-width page templates still did not work properly on some setups.
- Fixed display bug: If an item in the first header menu had a dropdown of more than four items, then the dropdown would get cut at the bottom.
- Fixed some minor things in header.php to make it W3C compliant.
1.1.2
- Designed the Edit link to look similar to the other buttons.
- Updated .POT file.
- New localization: French
- Localization updated: Italian
- Fixed bug: When using Arjuna with WPML, the Home link would always link to the default language (the WordPress root). It now displays the localized home.
- Fixed bug: When some IE8 browsers emulate IE6 for compatibility reasons and Arjuna was set to use IE6 optimization, the website's layout would have some issues. 
1.1.1
- New feature: It's now possible to disable default widgets in the sidebar when the widget bars are empty. This allows for more flexibility in choosing which sidebars to use. For example, you can now disable default widgets and exclusively use the two-column or single-column sidebar, if you wish so.
- Improved the backend and the way options are retrieved.
- Added default styles for headings in posts (heading 2 to 4).
- Fixed bug: When some IE7 browsers emulate IE6 for compatibility reasons and Arjuna was set to use IE6 optimization, the website's layout would have some issues.
- Fixed bug: Full-width pages did not work any longer for layouts other than the Arjuna default.
1.1
- New feature: The first header menu can now be extended over two rows of links.
- New feature: The buttons in the second header menu can now be visually separated.
- New feature: You can now select between two different header images. More will become available in the future. NOTE: As of this version, the layout and structure of the header has undergone significant changes.
- New feature: The Home button in the second header bar can now be disabled. In addition, the Home button shows an icon now.
- New localization: Chinese
- Localization updated: Italian
- Optimized JavaScript and reduced its file size.
- Fixed bug: There were some non-localized strings in functions.php as well as some that PoEdit could not parse properly.
- Fixed bug: If pagination is provided by the plugin "WP-paginate", it did not work correctly on archive pages.
- Fixed display bug: Bold text, italic text and lists (ordered and unordered) within a post did not display correctly.
- Fixed display bug: A two-level dropdown menu in a left-aligned first header menu was displaying incorrectly.
- Fixed IE6 display bug: IE6 displayed a considerably larger font size for widget bars that used the default font size, e.g. the WP calendar.
1.0.5
- New feature: It's now possible to display the author of a post in the post header.
- Changed the display of dates to use the default date format specified in Settings > General instead of using a theme-based, localized date format. This allows for grammatically correct date formats in languages other than English where there is no translation available for Arjuna yet.
- New localization: Italian
- New localization: Lithuanian
1.0.4
- The bug from version 1.0.2 introduced another bug. We reverted the bug and would kindly refer you to the note in the README.txt file.
1.0.3
- Fixed issues with the sidebars when widget bars are deactivated.
- Fixed bug in admin: When you select custom for "Append to page title" and leave the field empty, it would use the old value again. Arjuna now does not append anything.
- Fixed display bug: When the first header menu had been disabled, the space between the header and the content would have been twice as large.
- Fixed bug in admin: Disabling the IE6 optimization feature was not possible.
- Fixed IE6 display bug: When the first header menu was displayed, the second header menu was slightly shifted upwards.
- Fixed IE6 display bug: The bottom of the sidebar rendered a small part of the RSS icon.
- Fixed IE6 display bug: If the content of a widget bar in the sidebar explicitly extended over the width of the sidebar, e.g. in the case of an image, the sidebar would break completely.
1.0.2
- Fixed a small issue with the header bars where they would over run the header area if too many items were shown.

