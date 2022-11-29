<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source product development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

if (!function_exists('get_settings')) {
    function get_settings($key = '')
    {
        $CI    = &get_instance();
        $CI->load->database();

        $CI->db->where('key', $key);
        $result = $CI->db->get('settings')->row()->value;
        return $result;
    }
}

if (!function_exists('get_smtp_settings')) {
    function get_smtp_settings($key = '')
    {
        $CI    = &get_instance();
        $CI->load->database();

        $CI->db->where('key', $key);
        $result = $CI->db->get('smtp_settings')->row()->value;
        return $result;
    }
}

if (!function_exists('slugify')) {
    function slugify($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = strtolower($text);
        //$text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text))
            return 'n-a';
        return $text;
    }
}

if (!function_exists('get_video_extension')) {
    // Checks if a video is youtube, vimeo or any other
    function get_video_extension($url)
    {
        if (strpos($url, '.mp4') > 0) {
            return 'mp4';
        } elseif (strpos($url, '.webm') > 0) {
            return 'webm';
        } else {
            return 'unknown';
        }
    }
}

if (!function_exists('ellipsis')) {
    // Checks if a video is youtube, vimeo or any other
    function ellipsis($long_string, $max_character = 30)
    {
        $short_string = strlen($long_string) > $max_character ? substr($long_string, 0, $max_character) . "..." : $long_string;
        return $short_string;
    }
}

if (!function_exists('trimmer')) {
    function trimmer($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text))
            return 'n-a';
        return $text;
    }
}

if (!function_exists('get_doc_url')) {
    function get_doc_url($topic_id)
    {
        $CI    = &get_instance();
        $CI->load->database();
        $first_article = $CI->frontend_model->get_articles($topic_id)->row_array();
        return site_url('docs/' . slugify($first_article['article']) . '-' . $first_article['id']);
    }
}

// This function returns the article id from the seo friendy url
if (!function_exists('get_article_id')) {
    function get_article_id($url_friendly_slug)
    {
        $CI    = &get_instance();
        $CI->load->database();
        $exploded_article_slug = explode('-', $url_friendly_slug);
        return $exploded_article_slug[(count($exploded_article_slug) - 1)];
    }
}


// This function returns the image paths from documentation which is being written on texteditor
if (!function_exists('reformat_image_path')) {
    function reformat_image_path($html, $is_blog = false, $export = false)
    {   
        $image_title;
        preg_match_all('@img src="([^"]+)"@', $html, $match);
        $sources = array_pop($match);
        foreach ($sources as $key => $source) {
            $exploded_source = explode('/', $source);
            if ($is_blog) {
                $blog_title = $exploded_source[(count($exploded_source) - 2)];
                $image_name = $exploded_source[(count($exploded_source) - 1)];
                $image_actual_path = base_url() . 'uploads/blog/' .  $blog_title . '/' . $image_name;
            } elseif($export){
                
                $product = $exploded_source[(count($exploded_source) - 3)];
                $topic = $exploded_source[(count($exploded_source) - 2)];
                $image_name = $exploded_source[(count($exploded_source) - 1)];
                $image_actual_path = 'uploads/documentation/' . $product . '/' . $topic . '/' . $image_name;
                $type = pathinfo($image_actual_path, PATHINFO_EXTENSION);
                $data = file_get_contents($image_actual_path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                $image_actual_path = $base64;
                
            } else {
                $product = $exploded_source[(count($exploded_source) - 3)];
                $topic = $exploded_source[(count($exploded_source) - 2)];
                $image_name = $exploded_source[(count($exploded_source) - 1)];
                $image_actual_path = base_url() . 'uploads/documentation/' . $product . '/' . $topic . '/' . $image_name;
            }
            
            $path_parts = pathinfo($image_actual_path);
            $image_title = ucwords(str_replace("-"," ",str_replace("_"," ",$path_parts['filename'])));

            $image_actual_path .= '" title="'.$image_title.'" alt="'.$image_title.'" style="max-width : 100%;"';
            
            if (strpos($html, $source) !== false) {
                $html = str_replace($source, $image_actual_path, $html);
            }
        }
        
        return $html;
    }
}

// RANDOM NUMBER GENERATOR FOR ELSEWHERE
if (!function_exists('random')) {
    function random($length_of_string)
    {
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        // Shufle the $str_result and returns substring
        // of specified length
        return substr(str_shuffle($str_result), 0, $length_of_string);
    }
}

// GET CURRENCY
if (!function_exists('currency')) {
    function currency($price = "")
    {
        $CI    = &get_instance();
        $CI->load->database();
        if ($price != "") {
            $CI->db->where('key', 'system_currency');
            $currency_code = $CI->db->get('settings')->row()->value;

            $CI->db->where('code', $currency_code);
            $symbol = $CI->db->get('currency')->row()->symbol;

            $CI->db->where('key', 'currency_position');
            $position = $CI->db->get('settings')->row()->value;

            if ($position == 'right') {
                return $price . $symbol;
            } elseif ($position == 'right-space') {
                return $price . ' ' . $symbol;
            } elseif ($position == 'left') {
                return $symbol . $price;
            } elseif ($position == 'left-space') {
                return $symbol . ' ' . $price;
            }
        }
    }
}

// RANDOM LICENSE CODE GENERATOR
if (!function_exists('license_code')) {
    function license_code()
    {
        $CI    = &get_instance();
        $CI->load->database();

        $str_to_insert = '-';
        $random_license_code = random(25);

        $formatted_license_code = substr_replace($random_license_code, $str_to_insert, 8, 0);
        $formatted_license_code = substr_replace($formatted_license_code, $str_to_insert, 17, 0);

        $CI->db->where('license_code', $formatted_license_code);
        $prev_data = $CI->db->get('payments')->num_rows();
        if ($prev_data > 0) {
            license_code();
        } else {
            return $formatted_license_code;
        }
    }
}
// ------------------------------------------------------------------------
/* End of file user_helper.php */


if (! function_exists('get_time_ago')) {
    function get_time_ago( $time ) {
        $time_difference = time() - $time;

        if( $time_difference < 1 ) { return 'less than 1 second ago'; }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  get_phrase('year'),
                    30 * 24 * 60 * 60       =>  get_phrase('month'),
                    24 * 60 * 60            =>  get_phrase('day'),
                    60 * 60                 =>  get_phrase('hour'),
                    60                      =>  get_phrase('minute'),
                    1                       =>  get_phrase('second')
        );

        foreach( $condition as $secs => $str )
        {
            $d = $time_difference / $secs;

            if( $d >= 1 )
            {
                $t = round( $d );
                return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) .' '. get_phrase('ago');
            }
        }
    }
}
/* Location: ./system/helpers/common.php */
