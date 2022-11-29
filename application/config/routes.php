<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'site';
$route['404_override'] = 'site/error_404';
$route['404'] = 'site/error_404';
$route['translate_uri_dashes'] = false;

$route['how-it-works'] = "site/how_it_works";
$route['admin-features'] = "site/admin_features";
$route['instructor-features'] = "site/instructor_features";
$route['student-features'] = "site/student_features";
$route['features'] = "site/features";
$route['themes'] = "site/themes";
$route['addons'] = "site/addons";
$route['mobile-apps'] = "site/mobile_apps";
$route['flutter-mobile-app'] = "site/flutter_mobile_app";
$route['pricing'] = "site/pricing";
$route['reviews'] = "site/reviews";
$route['blog'] = "site/blog";
$route['blog/(:any)'] = "site/blog_details/$1";

$route['docs'] = "site/docs";
$route['docs/(:any)'] = "site/documentation_details/$1";
$route['docs/(:any)/(:any)'] = "site/documentation_details/$1/$2";

$route['mitxen'] = "site/mitxen";
$route['learny'] = "site/learny";
$route['ekattor'] = "site/ekattor";
$route['academy'] = "site/academy";
$route['neoflex'] = "site/neoflex";
$route['mastery'] = "site/mastery";
$route['checkout'] = "site/checkout";
$route['ekushey'] = "site/ekushey";
$route['bayanno'] = "site/bayanno";
$route['atlas'] = "site/atlas";
$route['support-policy'] = "site/support_policy";
$route['terms-and-condition'] = "site/terms_and_condition";
$route['privacy-policy'] = "site/privacy_policy";
$route['license-policy'] = "site/license_policy";
$route['products'] = "site/products";
