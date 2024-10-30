<?php

/*
Plugin Name: BuddyPress Custom Profile Filters
Plugin URI: http://wp.antonchanning.com/buddypress-custom-profile-filters
Description: Changes the way that profile data fields get filtered into clickable URLs. 
Version: 1.1
Author: Anton Channing
Author URI: http://wp.antonchanning.com
*/

// Forked from a 'CUNY Academic Commons' plugin by Boone Gorges

// TO DO: Replace this hard coded list with one that can be managed by admin
$social_networking_fields = array( 
// Enter the field ID of any field that prompts for the username to a social networking site, followed by the URL format for profiles on that site, with *** in place of the user name. Thus, since the URL for the profile of awesometwitteruser is twitter.com/awesometwitteruser, you should enter 'Twitter' => 'twitter.com/***'. Don't forget: 1) Leave out the 'http://', 2) Separate items with commas

	'Twitter' =>'twitter.com/***' ,
	'Delicious ID' => 'delicious.com/***' ,
	'YouTube ID ' => 'youtube.com/***' ,
	'Flickr ID ' =>'flickr.com/***' ,
	'FriendFeed ID' => 'friendfeed.com/***'

	);


/* Only load the BuddyPress plugin functions if BuddyPress is loaded and initialized. */
function buddypress_custom_profile_filters_init() {
	require( dirname( __FILE__ ) . '/buddypress-custom-profile-filters-bp-functions.php' );
	
}
add_action( 'bp_init', 'buddypress_custom_profile_filters_init' );

?>
