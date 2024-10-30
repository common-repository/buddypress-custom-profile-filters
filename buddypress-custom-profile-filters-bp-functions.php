<?php
// Turns off autolinking for all fields so we can format with bbCode.
remove_filter( 'bp_get_the_profile_field_value', 'xprofile_filter_link_profile_data', 9, 2 );

// Turns on manual linking using curly brackets: {search-term}
function bcp_add_brackets( $field_value ) {
	// We use curly brackets instead of square to prevent possible conflicts with bbcodes...
	if ( strpos( $field_value, '{' ) | strpos( $field_value, '}' ) ) { 
		while ( strpos( $field_value, '}') ) {
			$open_delin_pos = strpos( $field_value, '{' );
			$close_delin_pos = strpos( $field_value, '}' );
			$field_value =  substr($field_value, 0, $open_delin_pos) . '<a href="' . site_url( BP_MEMBERS_SLUG ) . '/?s=' . substr($field_value, $open_delin_pos+1, $close_delin_pos - $open_delin_pos - 1) . '">' . substr($field_value, $open_delin_pos+1, $close_delin_pos - $open_delin_pos - 1) . '</a>' . substr($field_value, $close_delin_pos+1);
		}
	}
	
	return $field_value;
}
add_filter( 'bp_get_the_profile_field_value', 'bcp_add_brackets', 999, 1 );

// Adds social networking links
function bcp_add_social_networking_links( $field_value ) {
	global $bp, $social_networking_fields;

	$bp_this_field_name = bp_get_the_profile_field_name();
	
	if ( isset ( $social_networking_fields[$bp_this_field_name] ) ) {
		$sp = strpos ( $field_value, $social_networking_fields[$bp_this_field_name] );
		if ( $sp === false ) {
			$url = str_replace( '***', strip_tags( $field_value ), $social_networking_fields[$bp_this_field_name] );
			$field_value = '<a href="http://' . $url . '">' . $field_value . '</a>';
			}
		return $field_value;
	}
	
	return $field_value;
}
add_filter( 'bp_get_the_profile_field_value', 'bcp_add_social_networking_links', 1 );

// Checks to see if we can allow bbcode and if so applies it, otherwise leaves field unchanged
function bcp_check_safe_shortcodes( $field_value ) {
	if (function_exists('bbp_whitelist_do_shortcode')) {
		$field_value = bbp_whitelist_do_shortcode($field_value);
	}
	
	return $field_value;		
}
add_filter( 'bp_get_the_profile_field_value', 'bcp_check_safe_shortcodes', 998, 1 );
?>
