<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */



Route::get('/', 'ChrevadminController@dashboard_1');
Route::get('/index', 'ChrevadminController@dashboard_1');
Route::get('/coin-details', 'ChrevadminController@coin_details');
Route::get('/market-capital', 'ChrevadminController@market_capital');
Route::get('/my-wallet', 'ChrevadminController@my_wallet');
Route::get('/portfolio', 'ChrevadminController@portfolio');
Route::get('/transactions', 'ChrevadminController@transactions');
Route::get('/app-calender', 'ChrevadminController@app_calender');
Route::get('/app-profile', 'ChrevadminController@app_profile');
Route::get('/chart-chartist', 'ChrevadminController@chart_chartist');
Route::get('/chart-chartjs', 'ChrevadminController@chart_chartjs');
Route::get('/chart-flot', 'ChrevadminController@chart_flot');
Route::get('/chart-morris', 'ChrevadminController@chart_morris');
Route::get('/chart-peity', 'ChrevadminController@chart_peity');
Route::get('/chart-sparkline', 'ChrevadminController@chart_sparkline');
Route::get('/ecom-checkout', 'ChrevadminController@ecom_checkout');
Route::get('/ecom-customers', 'ChrevadminController@ecom_customers');
Route::get('/ecom-invoice', 'ChrevadminController@ecom_invoice');
Route::get('/ecom-product-detail', 'ChrevadminController@ecom_product_detail');
Route::get('/ecom-product-grid', 'ChrevadminController@ecom_product_grid');
Route::get('/ecom-product-list', 'ChrevadminController@ecom_product_list');
Route::get('/ecom-product-order', 'ChrevadminController@ecom_product_order');
Route::get('/email-compose', 'ChrevadminController@email_compose');
Route::get('/email-inbox', 'ChrevadminController@email_inbox');
Route::get('/email-read', 'ChrevadminController@email_read');
Route::get('/form-editor-summernote', 'ChrevadminController@form_editor_summernote');
Route::get('/form-element', 'ChrevadminController@form_element');
Route::get('/form-pickers', 'ChrevadminController@form_pickers');
Route::get('/form-validation-jquery', 'ChrevadminController@form_validation_jquery');
Route::get('/form-wizard', 'ChrevadminController@form_wizard');
Route::get('/map-jqvmap', 'ChrevadminController@map_jqvmap');
Route::get('/page-error-400', 'ChrevadminController@page_error_400');
Route::get('/page-error-403', 'ChrevadminController@page_error_403');
Route::get('/page-error-404', 'ChrevadminController@page_error_404');
Route::get('/page-error-500', 'ChrevadminController@page_error_500');
Route::get('/page-error-503', 'ChrevadminController@page_error_503');
Route::get('/page-forgot-password', 'ChrevadminController@page_forgot_password');
Route::get('/page-lock-screen', 'ChrevadminController@page_lock_screen');
Route::get('/page-register', 'ChrevadminController@page_register');
Route::get('/table-bootstrap-basic', 'ChrevadminController@table_bootstrap_basic');
Route::get('/table-datatable-basic', 'ChrevadminController@table_datatable_basic');
Route::get('/uc-nestable', 'ChrevadminController@uc_nestable');
Route::get('/uc-noui-slider', 'ChrevadminController@uc_noui_slider');
Route::get('/uc-select2', 'ChrevadminController@uc_select2');
Route::get('/uc-sweetalert', 'ChrevadminController@uc_sweetalert');
Route::get('/uc-toastr', 'ChrevadminController@uc_toastr');
Route::get('/ui-accordion', 'ChrevadminController@ui_accordion');
Route::get('/ui-alert', 'ChrevadminController@ui_alert');
Route::get('/ui-badge', 'ChrevadminController@ui_badge');
Route::get('/ui-button', 'ChrevadminController@ui_button');
Route::get('/ui-button-group', 'ChrevadminController@ui_button_group');
Route::get('/ui-card', 'ChrevadminController@ui_card');
Route::get('/ui-carousel', 'ChrevadminController@ui_carousel');
Route::get('/ui-dropdown', 'ChrevadminController@ui_dropdown');
Route::get('/ui-grid', 'ChrevadminController@ui_grid');
Route::get('/ui-list-group', 'ChrevadminController@ui_list_group');
Route::get('/ui-media-object', 'ChrevadminController@ui_media_object');
Route::get('/ui-modal', 'ChrevadminController@ui_modal');
Route::get('/ui-pagination', 'ChrevadminController@ui_pagination');
Route::get('/ui-popover', 'ChrevadminController@ui_popover');
Route::get('/ui-progressbar', 'ChrevadminController@ui_progressbar');
Route::get('/ui-tab', 'ChrevadminController@ui_tab');
Route::get('/ui-typography', 'ChrevadminController@ui_typography');
Route::get('/widget-basic', 'ChrevadminController@widget_basic');
