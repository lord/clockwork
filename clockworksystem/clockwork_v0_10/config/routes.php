<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| 	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['scaffolding_trigger'] = 'scaffolding';
|
| This route lets you set a "secret" word that will trigger the
| scaffolding feature for added security. Note: Scaffolding must be
| enabled in the controller in which you intend to use it.   The reserved 
| routes must come before any wildcard or regular expression routes.
|
*/

$route['default_controller'] = "welcome";
$route['scaffolding_trigger'] = "";

//game page redirection
$route['games/(:num)/settings/(:any)/(:any)/(:any)'] = "games/settings/$2/$1/$3/$4";
$route['games/(:num)/settings/(:any)/(:any)'] = "games/settings/$2/$1/$3";
$route['games/(:num)/settings/(:any)'] = "games/settings/$2/$1";
$route['games/(:num)/(:any)/(:any)/(:any)'] = "games/$2/index/$1/$3/$4";
$route['games/(:num)/(:any)/(:any)'] = "games/$2/index/$1/$3";
$route['games/(:num)/(:any)'] = "games/$2/index/$1";
$route['games/(:num)'] = "games/welcome/index/$1";
$route['games/(:any)'] = "error";


/* End of file routes.php */
/* Location: ./system/application/config/routes.php */
