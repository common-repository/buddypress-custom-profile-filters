=== Custom Profile Filters for BuddyPress ===
Contributors: antonchanning
Tags: buddypress, profile, filter, bbcode, shortcode
Requires at least: 2.5
Tested up to: 3.5.1
Stable tag: 1.1

Allows users to take control of the way that the links in their Buddypress profiles are handled.

== Description ==

Out of the box, BuddyPress automatically turns some words and phrases in the fields of a user's profile into links that, when clicked, search the user's community for other profiles containing those phrases. It also removes any attempts at formatting with new lines.

When activated, this plugin allows users to have more control over these links, in the following ways:

1. Auto generated links are completely disabled.
1. By using curly brackets in a profile field, users can specify which words or phrases in their profile turn into links. For example: under Interests, I might list "Cartoons about dogs". Without this plugin, Buddypress will turn the entire phrase into a link that searches the community for others who like 'cartoons about cats'. If I instead type "{Cartoons} about {cats}", then the two words in brackets will turn into independent links.
1. If the 'bbPress2 shortcode whitelist' plugin is activated, then users can also apply admin approved shortcodes to their profile fields. 
1. Administrators can specify certain profile fields that link to social networking profiles. If I enter my Twitter handle 'antonchanning' into a field labeled 'Twitter', for example, this plugin will bypass the default link to a BuddyPress search on 'antonchanning' and instead link to http://twitter.com/antonchanning. (Currently this list is hardcoded, but I plan to add an admin screen in future versions. See buddypress-custom-profile-filters-bp-functions.php to configure this setting for now).

This plugin is forked from a similar plugin from CUNY Academic Commons of the City University of New York.


== Installation ==

1. Upload the `buddypress-custom-profile-filters` directory to your plugins folder
1. Activate the plugin
1. Edit buddypress-custom-profile-filters.php to configure



== Notes ==

The plugin checks each profile for curly brackets and activates if it finds any. If the 'bbPress2 shortcode whitelist' plugin
is installed, any shortcodes approved by admin can be used in profile fields. For example, codes from the 'bbPress BBCode'
plugin.

You might want to insert a small explanation into your BP profile edit template (/wp-content/bp-themes/[your-member-theme]/profile/edit.php that tells your site's users how to use these brackets. For example: 
	
"Words or phrases in your profile can be linked to the profiles of other members that contain the same phrases. To specify which words or phrases should be linked, add square brackets: e.g. "[b]Life's a beach![/b] I love {icecream} and {swimming}."."

Future features include: admin tab with toggle switch; ability to tweak BP's automatic profile filter (e.g. to parse semi-colon separated lists in addition to commas).

== Changelog ==

= 1.1 =
* Mainly corrected errors in the readme.txt

= 1.0 =
* Changed to use curly brackets instead of square.
* Added detection of shortcode whitelist

= Versions below refer to the 'Custom Profile Filters for BuddyPress' plugin from which this plugin was forked. =
= 0.3 =
* Conforms to BP 1.2 standards for loading order
* Most functionality moved to proper filters in order to inherit BP native code

= 0.3.1 =
* Moved globals back to main plugin file
* Fixed error regarding missing function arguments (thanks for reporting them, Mike!)
