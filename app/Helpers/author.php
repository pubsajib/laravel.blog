<?php 
function userType($user_level) {
	return $user_level ? 'User' : 'Admin';
}
function fullName($first_name, $last_name) {
	return ucfirst($first_name .' '. $last_name);
}