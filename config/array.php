<?php
return [
    'days' => [
        0 => 'sunday',
        1 => 'monday',
        2 => 'tuesday',
        3 => 'wednesday',
        4 => 'thursday',
        5 => 'friday',
        6 => 'saturday',
    ],
    'rate' => [
        0 => 0,
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
    ],
    'payment_type' => [
        0 => 'cash',
        1 => 'knet',
        2 => 'visa',

    ],
    'payment_type_cash_index'=>0,
    'payment_type_knet_index'=>1,
    'payment_type_visa_index'=>2,


    'address_type' => ['appartment', 'house', 'Office'],
    'address_default' => ['no', 'yes'],
    'address_notification' => ['yes', 'no'],
    'banner_status' => ['show', 'hide'],
    'banner_status_show_index' => 0,
    'banner_status_hide_index' => 1,


    'banner_type'=>['home banner','advertisement','inner banner'],
    'banner_type_home_banner_index'=>0,
    'banner_type_advertisement_index'=>1,
    'banner_type_inner_banner_index'=>2,


    'cuisine_status' => ['show', 'hide'],
    'cuisine_status_show_index' => 0,
    'cuisine_status_hide_index' => 1,
    'delivery_menu_status' => ['show', 'hide'],
    'dish_status' => ['available', 'not available'],
    'dish_rate_status' => ['pending', 'accepted', 'reject'],

    'dish_rate_status_pending_index' => 0,
    'dish_rate_status_accepted_index' => 1,
    'dish_rate_status_rejected_index' => 2,


    'dish_rate_notification' => ['yes', 'no'],
    'menu_section_status' => ['show', 'hide'],
    'order_status_color' => ['#e4e7ea', '#00c292', '#00c292', '#a198e7', '#e798aa', '#fec107'],
    'order_status' => ['pending', 'payed', 'delivered', 'delivering', 'reject', 'delay'],
    'order_status_pending_index' => 0,
    'order_status_payed_index' => 1,
    'order_status_delivered_index' => 2,
    'order_status_delivering_index' => 3,
    'order_status_reject_index' => 4,
    'order_status_delay_index' => 5,

    'order_status_success_group'=>[2],
    'order_status_unsuccess_group'=>[1,3,4,5],

    'order_status_in_progress_group'=>[1,3,5],

    'order_notification' => ['yes', 'no'],
    'order_driver_status' => ['pending', 'accepted', 'rejected', 'delay'],



    'order_driver_notification' => ['yes', 'no'],
    'payment_notification' => ['yes', 'no'],
    'restaurant_area_status' => ['open', 'close'],
    'restaurant_rate_status' => ['pending', 'accepted', 'rejected'],
    'restaurant_rate_status_pending_index' => 0,
    'restaurant_rate_status_accepted_index' => 1,
    'restaurant_rate_status_rejected_index' => 2,

    'restaurant_rate_notification' => ['yes', 'noe'],
    'service_boy_status' => ['online', 'offline'],
    'service_company_order_status' => ['pending', 'accepted', 'rejected', 'completed', 'delay'],
    'service_company_order_status_pending_index' => 0,
    'service_company_order_status_accepted_index' => 1,
    'service_company_order_status_rejected_index' => 2,
    'service_company_order_status_completed_index' => 3,
    'service_company_order_status_delay_index' => 4,
    'service_company_order_notification' => ['yes', 'no'],
    'users_mobile_company' => ['zain', 'ooredoo', 'viva'],
    'users_gender' => ['male', 'female'],
    'users_occupation' => ['employee', 'self-employee', 'other'],
    'restaurant_status' => ['pending', 'open', 'close'],
    'restaurant_status_pending_index' => 0,
    'restaurant_status_open_index' => 1,
    'restaurant_status_close_index' => 2,
    'restaurant_available_payment' => ['Knet', 'visa', 'masterCard', 'cash on delivery'],
    'restaurant_offline_order' => ['disable', 'enable'],
    'restaurant_commission_type' => ['fixed', 'percentage'],

    'restaurant_discount_type' => ['fixed', 'percentage'],
    'restaurant_discount_type_fixed_index' => 0,
    'restaurant_discount_type_percentage_index' => 1,


    'payment_way_commission_type' => ['fixed', 'percentage'],
    'payment_way_commission_type_fixed_index' => 0,
    'payment_way_commission_type_percentage_index' => 1,

    'restaurant_follow_us' => ['yes', 'no'],
    'restaurant_notification_status'=>['yes', 'no'],

    'restaurant_notification' => ['yes', 'no'],
    'payment_status' => ['pending', 'canceled', 'completed'],
    'payment_status_pending_index' => 0,
    'payment_status_canceled_index' => 1,
    'payment_status_completed_index' => 2,

    'delivery_menu_status' => ['hide', 'show'],
    'banner_status' => ['Publish', 'UnPublish'],
    'banner_status_enable_index' => 0,
    'cuisine_status' => ['show', 'hide'],
    'cuisine_status_show_index' => 0,
    'cuisine_status_hide_index' => 1,
    'order_driver_status' => ['pending', 'assigned', 'reject_by_driver', 'deliverd'],
    'order_driver_status_pending_index' => 0,
    'order_driver_status_assigned_index' => 1,
    'order_driver_status_reject_index' => 2,
    'order_driver_status_deliverd_index' => 3,

    'users_gender' => ['male', 'female'],
    'restaurant_users_status' => ['online', 'offline'],
    'restaurant_users_type' => ['admin', 'call Center', 'service', 'dispatcher', 'driver', 'review comments'],
    'restaurant_users_type_driver_index' => 4,
    'users_type' => [0 => 'registered', 1 => 'guest'],
    'users_type_registered_index' => 0,
    'users_type_guest_index' => 1,
    'category_status' => [
        0 => 'active',
        1 => 'not active',
        2 => 'deleted'

    ],
    
    'category_place' => [
        0 => 'None',
        1 => 'top',
        2 => 'bottom'

    ],

    'chartColor'=>['#cc5621','#3e2f7d','#ebf34f','#5166b7','#152e8e','#ee9479'],
'order_driver_chart'=>[
    'successDeliverTaskChart'=>'Success Deliver Task Chart',
         'unsuccessDeliverTaskChart'=>'Un-Success Deliver TaskChart',
         'successDistanceDeliverTaskChart'=>'Success Distance Deliver Task Chart',
         'unsuccessDistanceDeliverTaskChart'=>'Unsuccess Distance Deliver Task Chart',
         'successTimeDeliverTaskChart'=>'Success Time Deliver Task Chart',
         'unsuccessTimeDeliverTaskChart'=>'Unsuccess Time Deliver Task Chart',
         'distanceWithReturnChart'=>'Distance With Return Chart',
         'timeWithReturnChart'=>'Time With Return Chart',
         'totalDutyTime'=>'Total Duty Time',


],
    'restaurant_offer_status'=>[0=>"Not Active",1=>"Active"],
    'restaurant_offer_status_active_index'=>1,
];