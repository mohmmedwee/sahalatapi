<?php
//App::setLocale('ar');

require_once __DIR__ . "/Routes/common/files.php";

require_once __DIR__ . "/Routes/common/authentication.php";

require_once __DIR__ . "/Routes/common/Dashboard.php";
require_once __DIR__ . "/Routes/common/email.php";
require_once __DIR__ . "/Routes/common/authorization.php";
require_once __DIR__ . "/Routes/common/language.php";

require_once __DIR__ . "/Routes/common/users.php";
require_once __DIR__ . "/Routes/common/json.php";
//dd(route('common.json.jsonFromUrl'));

require_once __DIR__ . "/Routes/website/Dashboard.php";
require_once __DIR__ . "/Routes/website/restaurant.php";
require_once __DIR__ . "/Routes/website/users.php";
require_once __DIR__ . "/Routes/website/address.php";
require_once __DIR__ . "/Routes/website/contact_us.php";
require_once __DIR__ . "/Routes/website/cart.php";
require_once __DIR__ . "/Routes/website/restaurant_rate.php";
require_once __DIR__ . "/Routes/website/dish_rate.php";
require_once __DIR__ . "/Routes/website/cuisine.php";
require_once __DIR__ . "/Routes/admin/cashondelivery.php";

require_once __DIR__ . "/Routes/admin/governorate.php";
require_once __DIR__ . "/Routes/admin/cms.php";
require_once __DIR__ . "/Routes/admin/address.php";
require_once __DIR__ . "/Routes/admin/area.php";
require_once __DIR__ . "/Routes/admin/audit_track.php";
require_once __DIR__ . "/Routes/admin/cart.php";
require_once __DIR__ . "/Routes/admin/category.php";
require_once __DIR__ . "/Routes/admin/contact_us.php";
require_once __DIR__ . "/Routes/admin/cuisine.php";
require_once __DIR__ . "/Routes/admin/delivery_menu.php";
require_once __DIR__ . "/Routes/admin/dish.php";
require_once __DIR__ . "/Routes/admin/dish_rate.php";
require_once __DIR__ . "/Routes/admin/menu_section.php";
require_once __DIR__ . "/Routes/admin/operation_hour.php";
require_once __DIR__ . "/Routes/admin/order.php";
require_once __DIR__ . "/Routes/admin/order_driver.php";
require_once __DIR__ . "/Routes/admin/payment.php";
require_once __DIR__ . "/Routes/admin/service_company_order.php";
require_once __DIR__ . "/Routes/admin/service_company.php";
require_once __DIR__ . "/Routes/admin/service_boy.php";
require_once __DIR__ . "/Routes/admin/restaurant_users.php";
require_once __DIR__ . "/Routes/admin/restaurant_rate.php";
require_once __DIR__ . "/Routes/admin/restaurant_cuisine.php";
require_once __DIR__ . "/Routes/admin/restaurant_area.php";
require_once __DIR__ . "/Routes/admin/restaurant.php";
require_once __DIR__ . "/Routes/admin/banner.php";
require_once __DIR__ . "/Routes/admin/service.php";
require_once __DIR__ . "/Routes/admin/deliver_package.php";
require_once __DIR__ . "/Routes/admin/offer.php";
require_once __DIR__ . "/Routes/admin/restaurant_offer.php";
require_once __DIR__ . "/Routes/admin/restaurant_notification.php";

require_once __DIR__ . "/Routes/admin/knet.php";
require_once __DIR__ . "/Routes/admin/payment_way.php";


require_once __DIR__ . "/Routes/website/cms.php";



require_once __DIR__ . "/Routes/api/Auth.php";










//Event::listen('illuminate.query', function($query)
//{
//    print_r($query);
//    echo '<br><br><br>
//';
//});


//$root = get_class(Form::getFacadeRoot());
//dd($root);