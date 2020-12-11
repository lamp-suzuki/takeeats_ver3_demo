<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::domain('{account}.'.config('app.domain'))->group(function ($account) {

// 管理画面
    Route::prefix('manage')->namespace('Manage')->name('manage.')->group(function () {
        Auth::routes(); // ログイン・ログアウト
        Route::middleware(['auth:manage'])->group(function () {
            // ダッシュボード
            Route::get('/home', 'HomeController@index')->name('home');
            // Route::post('/change-hide', 'HomeController@change_hide')->name('changehide');

            // 受注管理
            Route::prefix('order')->namespace('Order')->name('order.')->group(function () {
                Route::any('/', 'IndexController@index')->name('index'); // 一覧
                // Route::get('/detail/{id}', 'DetailController@index')->name('detail'); // 詳細
                // Route::post('/detail/{id}/cancel', 'DetailController@cancel')->name('cancel'); // 詳細
                // Route::post('/download', 'IndexController@download')->name('download'); // ダウンロード
            });

            // 商品管理
            Route::prefix('product')->namespace('Product')->name('product.')->group(function () {
                Route::get('/', 'IndexController@index')->name('index');
                // Route::post('/sort', 'IndexController@sort_products')->name('sort'); // 並び替え
                // // メニュー
                // Route::prefix('item')->namespace('Item')->name('item.')->group(function () {
                //     Route::get('/add', 'AddController@index')->name('add'); // 新規追加
                //     Route::post('/confirm', 'ConfirmController@index')->name('confirm'); // 確認
                //     Route::post('/save', 'SaveController@index')->name('save'); // 公開
                //     Route::get('/edit/{id}', 'EditController@index')->name('edit'); // 編集
                //     Route::post('/delete', 'DeleteController@index')->name('delete'); // 削除

                // // 在庫系
                //     Route::get('/get-stock', 'StockController@get_stock')->name('get.stock');
                //     Route::post('/set-stock', 'StockController@set_stock')->name('set.stock');
                // });
                // // カテゴリー
                // Route::prefix('category')->namespace('Category')->name('category.')->group(function () {
                //     Route::get('/', 'IndexController@index')->name('index');
                //     Route::post('/add', 'IndexController@add')->name('add');
                //     Route::post('/edit', 'IndexController@edit')->name('edit');
                //     Route::post('/delete', 'IndexController@delete')->name('delete');
                //     Route::post('/sort', 'IndexController@sort_cat')->name('sort'); // 並び替え
                // });
                // // オプション
                // Route::prefix('option')->namespace('Option')->name('option.')->group(function () {
                //     Route::get('/', 'IndexController@index')->name('index');
                //     Route::post('/add', 'IndexController@add')->name('add');
                //     Route::post('/edit', 'IndexController@edit')->name('edit');
                //     Route::post('/delete', 'IndexController@delete')->name('delete');
                // });
            });

            // お知らせ
            Route::prefix('post')->namespace('Post')->name('post.')->group(function () {
                Route::get('/', 'IndexController@index')->name('index'); // 一覧
                // Route::get('/add', 'AddController@index')->name('add'); // 新規追加
                // Route::post('/confirm', 'ConfirmController@index')->name('confirm'); // 確認
                // Route::post('/save', 'SaveController@index')->name('save'); // 公開
                // Route::post('/edit', 'EditController@index')->name('edit'); // 編集
                // Route::post('/delete', 'DeleteController@index')->name('delete'); // 削除

                // // スライドショー
                Route::get('/slide', 'SlideController@index')->name('slide');
                // Route::post('/slide/update', 'SlideController@update')->name('slide.update');

                // // ご利用ガイド
                Route::get('/guide', 'GuideController@index')->name('guide');
                // Route::post('/guide/update', 'GuideController@update')->name('guide.update');
            });

            // マーケティング
            Route::prefix('marketing')->namespace('Marketing')->name('marketing.')->group(function () {
                Route::get('/sales', 'MarketingController@sales')->name('sales'); // 売上データ

                // 顧客データ
                Route::prefix('customer')->name('customer.')->group(function () {
                    Route::any('/', 'MarketingController@customer')->name('index');
                    Route::get('/{orderid}', 'MarketingController@customer_detail')->name('detail');
                    Route::get('/download', 'MarketingController@customer_download')->name('download');

                    Route::post('/group/add', 'MarketingController@group_add')->name('group.add');
                    Route::get('/group/delete/{id}', 'MarketingController@group_delete')->name('group.delete');
                });

                // クーポン
                Route::prefix('coupon')->name('coupon.')->group(function () {
                    Route::get('/', 'CouponController@index')->name('index');
                    Route::get('/add', 'CouponController@add')->name('add');
                    Route::post('/confirm', 'CouponController@confirm')->name('confirm');
                });

                // コミュケーション
                Route::prefix('communication')->name('communication.')->group(function () {
                    Route::get('/', 'CommunicationController@index')->name('index');
                    Route::get('/add', 'CommunicationController@add')->name('add');
                    Route::post('/confirm', 'CommunicationController@confirm')->name('confirm');
                });
            });

            // 分析
            // Route::prefix('data')->namespace('Data')->name('data.')->group(function () {
            //     Route::get('/order', 'DataController@order')->name('order');
            //     Route::get('/member', 'DataController@member')->name('member');
            // });

            // 設定
            Route::prefix('setting')->namespace('Setting')->name('setting.')->group(function () {
                Route::get('/', 'BasicController@index')->name('basic');
                // Route::post('/update', 'BasicController@update')->name('update');

                // 店舗管理
                Route::prefix('shop')->namespace('Shop')->name('shop.')->group(function () {
                    Route::get('/', 'IndexController@index')->name('index');
                    // Route::get('/add', 'AddController@index')->name('add');
                    // Route::post('/confirm', 'ConfirmController@index')->name('confirm');
                    // Route::post('/save', 'SaveController@index')->name('save');
                    // Route::post('/edit', 'EditController@index')->name('edit');
                    // Route::post('/delete', 'DeleteController@index')->name('delete');
                });

                // サービス設定
                Route::prefix('service')->name('service.')->group(function () {
                    Route::get('/', 'ServiceController@index')->name('index');
                    // Route::post('/takeout/update', 'ServiceController@takeout_update')->name('takeout.update');
                    // Route::post('/delivery/update', 'ServiceController@delivery_update')->name('delivery.update');
                    // Route::post('/ec/update', 'ServiceController@ec_update')->name('ec.update');
                });

                // その他設定
                Route::prefix('transaction')->namespace('Transaction')->name('transaction.')->group(function () {
                    Route::get('/', 'EditController@index')->name('index');
                    // Route::post('/update', 'EditController@update')->name('update');
                });
            });

            Route::view('/manual', 'manage.manual')->name('manual'); // マニュアル
            Route::view('/consultation', 'manage.consultation')->name('consultation'); // 相談会
        });
    });
});
