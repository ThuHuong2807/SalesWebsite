<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
//frontend
Route::get('','frontend\IndexController@GetIndex' );
Route::get('about.html','frontend\IndexController@GetAbout' );
Route::get('contact.html','frontend\IndexController@GetContact' );
Route::post('contact.html','backend\QuestionController@PostQuestion' );
Route::get('registered', function () {
    return redirect()->back();
});
Route::post('registered','backend\RegisteredController@PostAddRegistered' );

Route::group(['prefix' => 'product','namespace'=>'frontend'], function () {
    Route::get('','ProductController@GetListProduct' );
    Route::get('product-detail/{product_id}/{product_slug}.html','ProductController@GetProductDetail' );
    Route::get('addcart','ProductController@AddCart' );
    Route::get('cart.html','ProductController@GetCart' );
    Route::get('removecart/{id}','ProductController@GetRemoveCart' );
    Route::get('update-cart/{rowId}/{id}','ProductController@UpdateCart' );
    Route::get('checkout.html','ProductController@GetCheckout' );
    Route::post('checkout.html','ProductController@PostCheckout' );
    Route::get('order-complete.html','ProductController@GetOrder' );
    // Route::get('order-complete/{customer_id}/{customer_slug}','ProductController@GetOrderComplete' );
});







//backend
Route::get('login', 'backend\LoginController@GetLogin')->middleware('CheckLogout') ; //->middleware('CheckLogin');
Route::post('login', 'backend\LoginController@PostLogin');
Route::group(['prefix' => 'admin','middleware' => 'CheckLogin','namespace'=>'backend'], function () {
    Route::get('', 'IndexController@GetIndex');
    Route::get('logout', 'LoginController@LogOut');
    
    Route::group(['prefix' => 'attr'], function () {
        Route::get('', 'AttrController@GetAttr');
        Route::post('', 'AttrController@PostAddAttr');
        Route::post('add-value', 'AttrController@PostAddValue');
        Route::get('delete-value/{values_id}', 'AttrController@DeleteValue');
        Route::get('edit-attr/{attribute_id}', 'AttrController@GetEditAttr');
        Route::post('edit-attr/{attribute_id}', 'AttrController@PostEditAttr');
        Route::get('delete-attr/{attribute_id}', 'AttrController@DeleteAttr');
       
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'CategoryController@GetCategory');
        Route::post('', 'CategoryController@PostAddCategory');

        Route::get('edit-category/{category_id}', 'CategoryController@GetEditCategory');
        Route::post('edit-category/{category_id}', 'CategoryController@PostEditCategory');
        Route::get('delete-category/{category_id}', 'CategoryController@DeleteCategory');
    });
    Route::group(['prefix' => 'comment'], function () {
        Route::get('', 'CommentController@GetComment');
        Route::get('edit-comment', 'CommentController@GetEditComment');

    });
    Route::group(['prefix' => 'order'], function () {
        Route::get('', 'OrderController@GetOrder');
        Route::get('processed', 'OrderController@GetProcessed');
        Route::get('detail-order/{customer_id}', 'OrderController@GetDetailOrder');
        Route::get('active/{customer_id}', 'OrderController@GetActiveOrder');
        Route::get('history-order/{customer_id}', 'OrderController@GetHistoryOrder');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'ProductController@GetProduct');
        Route::get('add-product','ProductController@GetAddProduct');
        Route::post('add-product','ProductController@PostAddProduct');
        Route::get('edit-product/{product_id}', 'ProductController@GetEditProduct');
        Route::post('edit-product/{product_id}', 'ProductController@PostEditProduct');
        Route::get('delete-product/{product_id}', 'ProductController@GetDeleteProduct');
    });
    
    Route::group(['prefix' => 'user','middleware' => 'CheckUser'], function() {
        Route::get('', 'UserController@ListUser');
        Route::get('add-user','UserController@AddUser');
        Route::post('add-user','UserController@PostAddUser');
        Route::get('edit-user/{user_id}','UserController@EditUser');
        Route::post('edit-user/{user_id}','UserController@PostEditUser');
        Route::get('delete-user/{user_id}','UserController@DeleteUser');
    });
    Route::group(['prefix' => 'variant'], function () {
        Route::get('/{product_id}','VariantController@GetAddVariant');
        Route::post('/{product_id}','VariantController@PostAddVariant');
        Route::get('delete-variant/{product_id}','VariantController@DeleteVariant');
    });
    Route::group(['prefix' => 'user-registered'], function () {
          Route::get('','RegisteredController@GetRegistered');
          Route::get('delete-registered/{users_registered_id}','RegisteredController@DeleteRegistered');
    });
    Route::group(['prefix' => 'user-question'], function () {
          Route::get('','QuestionController@GetQuestion');
          Route::get('delete-user-question/{user_question_id}','QuestionController@DeleteQuestion');
    });
    Route::group(['prefix' => 'meta'], function () {
        Route::get('/{product_id}','MetaController@GetListMeta');
        Route::post('add-meta','MetaController@PostAddMeta');
        Route::post('edit-meta','MetaController@PostEditMeta');
        Route::get('delete-meta/{product_meta_id}','MetaController@DeleteMeta');
    });
    
});