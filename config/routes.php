<?php

return [
   'contact' => 'ContactController@index',
   'about' => 'AboutController@index',
   'blog' => 'BlogController@index',
   'guest' => 'GuestbookController@index',
   'admin' => 'Admin\DashboardController@index',
   'admin/categories' => 'Admin\CategoryController@index',
   'admin/categories/create' => 'Admin\CategoryController@create',
   
   'admin/categories/show/{id}' => 'Admin\CategoryController@show',
   'admin/categories/edit/{id}' => 'Admin\CategoryController@edit',
   'admin/categories/delete/{id}' => 'Admin\CategoryController@delete',
   
   'admin/products' => 'Admin\ProductController@index',
   'admin/products/create' => 'Admin\ProductController@create',
   '404' => 'PagesController@notFound',
   
   //Главаня страница
   'index.php' => 'HomeController@index',
   '' => 'HomeController@index',
];
