<?php 
function excerpt($value, $size = 50, $moreText = '...') {
	$value = strip_tags($value);
	$text = substr( $value, 0, $size);
	$more = strlen($value) > $size ? ' '.$moreText : '';

	return $text.$more;
}

function formatedDate($value) {
	return date( 'M j, Y h:i A', strtotime($value) );
}