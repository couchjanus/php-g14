<?php

// return [
//    'contact' => 'ContactController@index',
//    'about' => 'AboutController@index',
//    'blog' => 'BlogController@index',
//    'guest' => 'GuestbookController@index',

//    'api/shop'=> 'HomeController@getProducts',
//    'api/shop/{id}'=> 'HomeController@getProduct',
//    'api/product/{id}'=> 'HomeController@getProductItem',
   
//    'admin' => 'Admin\DashboardController@index',
//    'admin/categories' => 'Admin\CategoryController@index',
//    'admin/categories/create' => 'Admin\CategoryController@create',
   
//    'admin/categories/show/{id}' => 'Admin\CategoryController@show',
//    'admin/categories/edit/{id}' => 'Admin\CategoryController@edit',
//    'admin/categories/delete/{id}' => 'Admin\CategoryController@delete',
   
//    'admin/products' => 'Admin\ProductController@index',
//    'admin/products/create' => 'Admin\ProductController@create',

//    'admin/roles' => 'Admin\RoleController@index',
//    'admin/roles/create' => 'Admin\RoleController@create',
   
//    'admin/roles/show/{id}' => 'Admin\RoleController@show',
//    'admin/roles/edit/{id}' => 'Admin\RoleController@edit',
//    'admin/roles/delete/{id}' => 'Admin\RoleController@delete',

//    'admin/users' => 'Admin\UserController@index',
//    'admin/users/create' => 'Admin\UserController@create',
   
//    'admin/users/show/{id}' => 'Admin\UserController@show',
//    'admin/users/edit/{id}' => 'Admin\UserController@edit',
//    'admin/users/delete/{id}' => 'Admin\UserController@delete',

//    'auth' => 'AuthController@signup',
//    'register' => 'AuthController@signup',
//    'login' => 'AuthController@signin',
//    'logout' => 'AuthController@logout',

//    'profile'=>'ProfileController@index',

//    '404' => 'PagesController@notFound',
   
//    //Главаня страница
//    'index.php' => 'HomeController@index',
//    '' => 'HomeController@index',
// ];

$router->define([
   'contact' => 'ContactController@index',
   'about' => 'AboutController@index',
   'blog' => 'BlogController@index',
   'guest' => 'GuestbookController@index',

   'api/shop'=> 'HomeController@getProducts',
   'api/shop/{id}'=> 'HomeController@getProduct',
   'api/product/{id}'=> 'HomeController@getProductItem',
   
   'admin' => 'Admin\DashboardController@index',
   'admin/categories' => 'Admin\CategoryController@index',
   'admin/categories/create' => 'Admin\CategoryController@create',
   
   'admin/categories/show/{id}' => 'Admin\CategoryController@show',
   'admin/categories/edit/{id}' => 'Admin\CategoryController@edit',
   'admin/categories/delete/{id}' => 'Admin\CategoryController@delete',
   
   'admin/products' => 'Admin\ProductController@index',
   'admin/products/create' => 'Admin\ProductController@create',

   'admin/roles' => 'Admin\RoleController@index',
   'admin/roles/create' => 'Admin\RoleController@create',
   
   'admin/roles/show/{id}' => 'Admin\RoleController@show',
   'admin/roles/edit/{id}' => 'Admin\RoleController@edit',
   'admin/roles/delete/{id}' => 'Admin\RoleController@delete',

   'admin/users' => 'Admin\UserController@index',
   'admin/users/create' => 'Admin\UserController@create',
   
   'admin/users/show/{id}' => 'Admin\UserController@show',
   'admin/users/edit/{id}' => 'Admin\UserController@edit',
   'admin/users/delete/{id}' => 'Admin\UserController@delete',

   'auth' => 'AuthController@signup',
   'register' => 'AuthController@signup',
   'login' => 'AuthController@signin',
   'logout' => 'AuthController@logout',

   'profile'=>'ProfileController@index',

   '404' => 'PagesController@notFound',
   
   //Главаня страница
   'index.php' => 'HomeController@index',
   '' => 'HomeController@index',
]);

// $router->get('', 'HomeController@index');
// $router->get('api/shop', 'HomeController@getProducts');
// $router->get('api/shop/{id}', 'HomeController@getProduct');
// $router->get('api/product/{id}', 'HomeController@getProductItem');

// $router->get('about', 'AboutController@index');
// $router->get('contact', 'ContactController@index');
// $router->get('guestbook', 'GuestbookController@index');
// $router->get('blog', 'BlogController@index');
// $router->get('blog/{slug}', 'BlogController@show');
// $router->get('404', 'PagesController@notFound');


// $router->get('admin', 'Admin\DashboardController@index');
// $router->get('admin/products', 'Admin\ProductController@index');
// $router->get('admin/products/create', 'Admin\ProductController@create');
// $router->post('admin/products/save', 'Admin\ProductController@save');
// $router->get('admin/products/edit/{id}', 'Admin\ProductController@edit');
// $router->post('admin/products/edit/{id}', 'Admin\ProductController@edit');
// $router->get('admin/products/delete/{id}', 'Admin\ProductController@delete');
// $router->post('admin/products/delete/{id}', 'Admin\ProductController@delete');
// $router->get('admin/products/show/{id}', 'Admin\ProductController@show');

// $router->get('admin/categories', 'Admin\CategoryController@index');
// $router->get('admin/categories/create', 'Admin\CategoryController@create');
// $router->post('admin/categories/create', 'Admin\CategoryController@create');
// $router->get('admin/categories/edit/{id}', 'Admin\CategoryController@edit');
// $router->post('admin/categories/edit/{id}', 'Admin\CategoryController@edit');
// $router->get('admin/categories/delete/{id}', 'Admin\CategoryController@delete');
// $router->post('admin/categories/delete/{id}', 'Admin\CategoryController@delete');

// $router->get('admin/posts', 'Admin\PostController@index');
// $router->get('admin/posts/create', 'Admin\PostController@create');
// $router->get('admin/posts/edit/{id}', 'Admin\PostController@edit');
// $router->get('admin/posts/delete/{id}', 'Admin\PostController@delete');
// $router->post('admin/posts/create', 'Admin\PostController@store');
// $router->post('admin/posts/update/{id}', 'Admin\PostController@update');
// $router->post('admin/posts/delete/{id}', 'Admin\PostController@delete');

// $router->get('admin/roles', 'Admin\RoleController@index');
// $router->get('admin/roles/create', 'Admin\RoleController@create');
// $router->post('admin/roles/create', 'Admin\RoleController@save');

// $router->get('admin/roles/edit/{id}', 'Admin\RoleController@edit');
// $router->get('admin/roles/delete/{id}', 'Admin\RoleController@delete');

// $router->post('admin/roles/edit/{id}', 'Admin\RoleController@edit');
// $router->post('admin/roles/delete/{id}', 'Admin\RoleController@delete');

// $router->get('admin/users', 'Admin\UserController@index');
// $router->get('admin/users/create', 'Admin\UserController@create');
// $router->post('admin/users/create', 'Admin\UserController@create');

// $router->get('admin/users/edit/{id}', 'Admin\UserController@edit');
// $router->post('admin/users/edit/{id}', 'Admin\UserController@edit');

// $router->get('admin/users/delete/{id}', 'Admin\UserController@delete');
// $router->post('admin/users/delete/{id}', 'Admin\UserController@delete');

// $router->get('auth', 'AuthController@signup');
// $router->post('register', 'AuthController@signup');

// $router->get('login', 'AuthController@signin');
// $router->post('login', 'AuthController@signin');
// $router->get('logout', 'AuthController@logout');
// $router->post('logout', 'AuthController@logout');

// $router->get('profile', 'ProfileController@index');

// $router->get('profile/edit', 'ProfileController@edit');
// $router->post('profile/edit', 'ProfileController@edit');
