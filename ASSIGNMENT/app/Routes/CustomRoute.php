<?php
namespace App\Routes;

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

class CustomRoute
{
	public static function init($url){
		$router = new RouteCollector();

		/**
		 * Danh sách các filter
		 */
		$router->filter('auth', function(){
		    if(!isset($_SESSION['user']))
		    {
		        header('Location: ' . getClientUrl('login', [
					'msg' => "Đăng nhập trước!"
				]));

		        return false;
		    }
		});

		$router->get('/login', ['App\Controllers\HomeController', "login"]);
		$router->post('/post-login', ['App\Controllers\HomeController', "postLogin"]);
		$router->get('/logout', ['App\Controllers\HomeController', "logout"]);

		// $router->get('/detail/{id}', ['App\Controllers\HomeController', "productDetail"]);

		$router->group(['before' => 'auth'], function($router){
			// tất cả các request nằm trong group này thì cần phải login
			// Dashboard routes
			$router->get('/', ['App\Controllers\HomeController', "index"]);

			// User routes
			$router->get('user', ['App\Controllers\UserController', "index"]);
			$router->get('user/remove', ['App\Controllers\UserController', "remove"]);
			$router->get('user/create', ['App\Controllers\UserController', "create"]);
			$router->post('user/save-create', ['App\Controllers\UserController', "saveCreate"]);
			$router->get('user/edit', ['App\Controllers\UserController', "edit"]);
			$router->post('user/save-edit', ['App\Controllers\UserController', "saveEdit"]);

			// Product routes
			$router->get('product', ['App\Controllers\ProductController', "index"]);
			$router->get('product/remove', ['App\Controllers\ProductController', "remove"]);
			$router->get('product/create', ['App\Controllers\ProductController', "create"]);
			$router->post('product/save-create', ['App\Controllers\ProductController', "saveCreate"]);
			$router->get('product/edit', ['App\Controllers\ProductController', "edit"]);
			$router->post('product/save-edit', ['App\Controllers\ProductController', "saveEdit"]);

			// Category routes
			$router->get('category', ['App\Controllers\CategoryController', "index"]);
			$router->get('category/remove', ['App\Controllers\CategoryController', "remove"]);
			$router->get('category/create', ['App\Controllers\CategoryController', "create"]);
			$router->post('category/save-create', ['App\Controllers\CategoryController', "saveCreate"]);
			$router->get('category/edit', ['App\Controllers\CategoryController', "edit"]);
			$router->post('category/save-edit', ['App\Controllers\CategoryController', "saveEdit"]);

			// Invoice routes
			$router->get('invoice', ['App\Controllers\InvoiceController', "index"]);
			$router->get('invoice/remove', ['App\Controllers\InvoiceController', "remove"]);
			$router->get('invoice/create', ['App\Controllers\InvoiceController', "create"]);
			$router->post('invoice/save-create', ['App\Controllers\InvoiceController', "saveCreate"]);
			$router->get('invoice/edit', ['App\Controllers\InvoiceController', "edit"]);
			$router->post('invoice/save-edit', ['App\Controllers\InvoiceController', "saveEdit"]);

			// Invoice Detail routes
			$router->get('invoice-detail', ['App\Controllers\InvoiceDetailController', "index"]);
			$router->get('invoice-detail/remove', ['App\Controllers\InvoiceDetailController', "remove"]);
			$router->get('invoice-detail/create', ['App\Controllers\InvoiceDetailController', "create"]);
			$router->post('invoice-detail/save-create', ['App\Controllers\InvoiceDetailController', "saveCreate"]);
			$router->get('invoice-detail/edit', ['App\Controllers\InvoiceDetailController', "edit"]);
			$router->post('invoice-detail/save-edit', ['App\Controllers\InvoiceDetailController', "saveEdit"]);

			// $router->get('/remove/{id}', ["App\Controllers\ProductController", "remove"]);
		});

		$dispatcher = new Dispatcher($router->getData());

		$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));

		// Print out the value returned from the dispatched function
		echo $response;
	}

}
