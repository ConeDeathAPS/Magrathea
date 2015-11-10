<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "displays";
$route['Display/get_products_by_page/(:num)'] = "displays/get_products_by_page/$1";
$route['Display/sort_by_category/(:num)'] = "displays/sort_by_category/$1";
$route['Display/sort_products/(:any)'] = "displays/sort_products/$1";
$route['Display/search/(:any)'] = "displays/sort_by_search/$1";
$route['products/edit_product/(:any)'] = "/products/edit_product/$1";
$route['products/delete_product/(:any)'] = "/products/delete_product/$1";
$route['products/confirm_delete/(:any)'] = "/products/confirm_delete/$1";
$route['planets/show_planet/(:any)/(:any)'] = "/planets/show_planet/$1/$2";
$route['carts/show_cart/(:any)'] = "/carts/show_cart/$1";
$route['carts/delete/(:any)/(:any)'] = "/carts/delete/$1/$1";
$route['admins'] = "admins";
$route['admins/logout'] = "/admins/logout";
$route['orders/update_status'] = "/orders/update_status";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */