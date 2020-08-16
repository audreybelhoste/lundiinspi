<?php

function get_image_from_field($field_name, $thumbnail_size = null, $option = false, $post_id = null, $term_id = null) {

	if ($option)
		$image = get_field($field_name, 'option');
	elseif ($post_id)
		$image = get_field($field_name, $post_id);
	elseif ($term_id)
		$image = get_field($field_name, $term_id);
	else 
		$image = get_field($field_name);

	if (!$image)
		$image = get_sub_field($field_name);

	$thumbnail_size = ($thumbnail_size) ? $thumbnail_size : $field_name;

	if (is_numeric($image)) {
		$image = wp_get_attachment_image_src($image, $thumbnail_size);

		if ($image && isset($image[0]))
			return $image[0];
	}

	if (!$image)
		return false;

	return (isset($image['sizes'][$thumbnail_size])) ? $image['sizes'][$thumbnail_size] : false;

}

function prepare_term_link($cat, $current_cat, $get_parameters, $param_url, $term){

	if(!empty($get_parameters)){
		$temp_get_parameters = $get_parameters;

		if($current_cat == $cat){
			if(in_array($term->slug, $temp_get_parameters)){
				unset($temp_get_parameters[array_search($term->slug, $temp_get_parameters)]);
			}else{
				array_push($temp_get_parameters, $term->slug);
			}
		}

		if(count($temp_get_parameters) > 0){
			if(strlen($param_url)<1){
				$param_url .= '?' . $current_cat . '=';
			}else{
				$param_url .= '&' . $current_cat . '=';
			}

			$i=0;
			foreach($temp_get_parameters as $temp_get_parameter){
				if($i++ > 0){ $param_url .= ','; }
				$param_url .= $temp_get_parameter;
			}
		}

	}elseif($current_cat == $cat){

		if(strlen($param_url)<1){
			$param_url .= '?' . $current_cat . '=' . $term->slug;
		}else{
			$param_url .= '&' . $current_cat . '=' . $term->slug;
		}

	}

	return $param_url;

}

function repeater_sub_field_empty ($field = false) {
	if($field) {
		$sub_field_count = false;
		$sub_field_count_empty = 0;
		if(have_rows($field)) {
			$fields_list = get_field($field);
			$fields_list = $fields_list[0];
			$sub_field_count = count($fields_list);

			foreach ($fields_list as $sub_field) {
				if(empty($sub_field)) {
					$sub_field_count_empty++;
				}
			}
		}

		if($sub_field_count_empty === $sub_field_count) {
			return false;
		} else {
			return true;
		}

	} else {
		return false;
	}
}

/**
 * function from Woocommerce documentation
 * Set a cookie - wrapper for setcookie using WP constants.
 *
 * @param  string  $name   Name of the cookie being set.
 * @param  string  $value  Value of the cookie.
 * @param  integer $expire Expiry of the cookie.
 * @param  bool    $secure Whether the cookie should be served only over https.
 */
function ci_setcookie( $name, $value, $expire = 0, $secure = false ) {
    if ( ! headers_sent() ) {
        setcookie( $name, $value, $expire, COOKIEPATH ? COOKIEPATH : '/', COOKIE_DOMAIN, $secure);
    } elseif ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
        trigger_error( $name . "cookie cannot be set - headers already sent", E_USER_NOTICE ); // WPCS: XSS ok.
    }
}


/**
 * Convert UTF8 String to ASCII String equivalent
 * Usefull for email encoding
 */
function string_to_ascii_string($string)
{
    $ascii_string = "";
    $n = strlen($string);
    for ($i = 0; $i < $n; $i++) {
        $ascii_string .= "&#".ord( $string[$i]).";";
    }
    return $ascii_string;
}