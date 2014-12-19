<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route['default_controller'] = "frontend";
$route['scaffolding_trigger'] = "";

$route['404_override'] = '';
$route['admin'] = 'backend';
$route['admin/(:any)'] = 'backend/$1';
$route['(:num)/(:any)/(:any)-(:num).html'] = 'frontend/index/$1/$4'; 
$route['(:num)/(:any).html'] = 'frontend/index/$1';
$route['user/(:any)'] = 'frontend/index/user/$1';
$route['spage/(:any)-(:num).html'] = 'frontend/index/spage/view_item/$2';
$route['feedback'] = 'frontend/index/feedback/send_feedback';
$route['orders/(:any)'] = 'frontend/index/orders/$1';
$route['cards/(:any)'] = 'frontend/index/cards/$1';
$route['search-products'] = 'frontend/index/products/search';
$route['search'] = 'frontend/index/news/search';

$route['ajax-cart/(:any)'] = 'cart/$1';
$route['cart/(:any)'] = 'frontend/index/cart/$1';
//$route['(:any)'] = 'frontend';


/* End of file routes.php */
/* Location: ./application/config/routes.php */