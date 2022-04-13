<?php
$arr = array(
    'index/([0-9]+)' => 'index/view/$1',

    'index' => 'index/index', //actionIndex в IndexController
    'delivery' => 'info/delivery', //actionDelivery в InfoController
    'payment' => 'info/payment',    //actionPayment в InfoController
    'guarantee' => 'info/guarantee', //actionGuarantee в InfoController
    'credit' => 'info/credit', //actionCredit в InfoController
    'about' => 'info/about', //actionAbout в InfoController
    'contacts' => 'info/contacts', //actionContacts в InfoController

    'motorcycles' => 'product/motorcycles',  //actionMotorcycles в ProductController
    'pitbikes' => 'product/pitbikes', //actionPitbikes в ProductController
    'atvs' => 'product/atvs', //actionAtvs в ProductController

    'view/([0-9]+)' => 'product/view/$1',  //actionView в ProductController c Выбором товара по id

    'reg' => 'user/register',  //actionRegister в UserController
    'login' => 'user/login',   //actionLogin в UserController
    'logout' => 'user/logout', //actionLogout в UserController

    'cabinet' => 'user/login', //actionLogin в UserController
    'edit_personal_info' => 'cabinet/edit',  //actionEdit в CabinetController
    'order_history' => 'cabinet/history',  //actionHistory в CabinetController
    'orderHistoryView/([0-9]+)' => 'cabinet/view/$1',  //actionHistory в CabinetController
    
    'cart/add/([0-9]+)' => 'cart/add/$1', //actionAdd в CartController с выбором товара по Id
    'cart' => 'cart/index', //actionIndex в CartController
    'delete/([0-9]+)?' => 'cart/delete/$1', //actionDelete В CartController
    'checkout' => 'cart/checkout', //actionCheckout в CartController

    /*Админ-панель управление товарами*/
    'admin/product' => 'adminProduct/index',
    'admin/Createproduct' => 'adminProduct/create',
    'admin/Updateproduct/([0-9]+)' => 'adminProduct/update/$1',
    'admin/Deleteproduct/([0-9]+)' => 'adminProduct/delete/$1',

    /*Админ-панель управление заказами*/
    'admin/order' => 'adminOrder/index',
    'admin/Updateorder/([0-9]+)' => 'adminOrder/update/$1',
    'admin/Deleteorder/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/Vieworder/([0-9]+)' => 'adminOrder/view/$1',

    /*Админ-панель управление пользователями*/
    'admin/user' => 'adminUser/index',
    'admin/Updateuser/([0-9]+)' => 'adminUser/update/$1',
    'admin/Deleteuser/([0-9]+)' => 'adminUser/delete/$1',

    'admin' => 'admin/index', //actionIndex в AdminController
);
//Проверяем, авторизован ли пользователь
if ($_SESSION['is_auth'] == true)
{
    $arr['cabinet'] = 'cabinet/index'; //actionIndex в CabinetController
}
return $arr;
