<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'pages';

/**
 * Authentication Routes
 */
$route['login'] = 'auth/show_login';
$route['login/user'] = 'auth/login';
$route['register'] = 'auth/show_register';
$route['register/user'] = 'auth/register';
$route['profile'] = 'profile/index';
$route['profile/update/user'] = 'profile/update_user';
$route['profile/update/address'] = 'profile/update_address';
$route['profile/update/security'] = 'profile/update_security';
$route['logout'] = 'auth/logout';

// Admin Auth Routes
$route['admin/login'] = 'admin/show_login';
$route['admin/login/user'] = 'admin/login';
$route['admin/register'] = 'admin/show_register';
$route['admin/register/user'] = 'admin/register';

// Admin Routes
$route['dashboard'] = 'admin/index';
$route['admin/users/admins'] = 'admin/show_admins';
$route['admin/fetch/admins'] = 'admin/fetch_admins';
$route['admin/fetch/admins/(:any)/(:any)'] = 'admin/fetch_admins/$1/$2';
$route['admin/fetch/admin/(:any)'] = 'admin/show/$1';
$route['admin/fetch/admin/(:any)/edit'] = 'admin/update/$1';
$route['admin/add/admin'] = 'admin/store';
$route['admin/delete/admin/(:any)'] = 'admin/destroy/$1';
$route['admin/users/users'] = 'admin/show_users';
$route['admin/fetch/users/(:any)/(:any)'] = 'admin/fetch_users/$1/$2';
$route['admin/fetch/user/(:any)'] = 'user/show/$1';
$route['admin/fetch/user/(:any)/edit'] = 'user/update_security/$1';
$route['admin/transaction'] = 'transaction/index';

// Misc Routes
$route['admin/fetch/active'] = 'admin/count_active_admins';
$route['user/fetch/active'] = 'user/count_active_admins';


//Book Routes
$route['admin/books'] = 'book/index';
$route['book/add'] = 'book/create';
$route['book/store'] = 'book/store';
$route['book/fetch'] = 'book/fetch';
$route['book/fetch/(:any)'] = 'book/fetch/$1';
$route['book/borrow']  = 'book/borrow';
$route['book/(:any)'] = 'book/show/$1';
$route['book/(:any)/edit'] = 'book/update/$1';
$route['book/(:any)/delete'] = 'book/destroy/$1';
$route['fetch/book/subjects'] = 'book/count_books_by_subject';
$route['fetch/book/authors'] = 'book/count_books_by_author';
$route['fetch/book/publishers'] = 'book/count_books_by_publisher';

// User Side Routes
$route['api/book/fetch'] = 'book/book_fetch';
$route['api/book/fetch/(:any)'] = 'book/book_fetch/$1';
$route['collections/book/(:any)'] = 'book/book_fetch_show/$1';
// Author Routes
$route['filter/author'] = 'author/filter';
$route['filter/subject'] = 'subject/filter';
$route['filter/publisher'] = 'publisher/filter';

//Transaction Routes
$route['transaction/fetch'] = 'transaction/fetch';
$route['transaction/fetch/(:any)'] = 'transaction/fetch/$1';
$route['transaction/return/book/(:any)'] = 'transaction/update_return_status/$1';
$route['transaction/(:any)'] = 'transaction/show/$1';

// Admin Profile Routes
$route['admin/profile'] = 'admin/show_profile';
$route['admin/profile/update/user'] = 'admin/update_user';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
