<?php 
/**
 * bootpad
 * Build with love by Eky Fauzi
 * Currently version 1.0.0
 */


session_start();
ob_start();

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     production
 *
 */
define( 'ENVIRONMENT', 'development' );

/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
if (defined('ENVIRONMENT')){

	switch (ENVIRONMENT){

		case 'development':
			error_reporting(E_ALL);
		break;
	
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');

	}

}

/*
 *---------------------------------------------------------------
 * PATH
 *---------------------------------------------------------------
 *
 * set the path of your basepath, system path, and application path
 *
 * BASEPATH : 
 *		Directory where you install bootpad (root)
 * 		eg: 'http://yoursite.com/' or 'http://localhost/bootpad/'
 *
 * SYSTEM_PATH : 
 *		Directory that you place the bootpad core system 
 * 		by default set to 'system'
 *
 * APPLICATION_PATH : 
 *		Directory that you place the 
 * 		bootpad application (models, views, cotroller, etc.) by default set to 'application'
 *			
 */

function get_base_path(){

	# Get the server protocol (http or https)
	$server_protocol = strtolower(preg_replace("/[^a-zA-Z+]/", '', $_SERVER['SERVER_PROTOCOL']));

	# Add (://) to server protocol, so can use as URL
	$server_protocol = rtrim($server_protocol, '://').'://';

	# Get server name (eg: localhost or www.yoursite.com)
	# Make sure the server name has trailing slash
	$server_name = rtrim($_SERVER['SERVER_NAME'], '/').'/';

	# Get the root directory your aplication
	# Make sure the directory has trailing slash
	$path_info = rtrim(pathinfo(__DIR__, PATHINFO_BASENAME), '/').'/';

	# Combine them
	$base_path = $server_protocol.$server_name.$path_info;

	# Return them as one URL
	return $base_path;
}

define( 'BASEPATH', get_base_path() ); //must include 'http://' before url and '/' (slash) in the end of url
define( 'SYSTEM_PATH', 'system' );
define( 'APPLICATION_PATH', 'application' );


/*
 * defined first page that opened first time (welcome page)
 */
define( 'CONTROLLER', 'home' );

/*
 * defined first method that opened when opened page. eg: www.site.com/welcome/index
 */
define( 'METHOD', 'index' );


/*
 * including the autoload and start the application
 */
require_once SYSTEM_PATH .'/autoload.php';

$bootpad = new bootpad;

?>