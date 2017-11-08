<?php
/*
  |--------------------------------------------------------------------------
  | Fxwebkit General Config
  |--------------------------------------------------------------------------
  |
  |	* Theme Colors:
  |		default, asphalt, purple-hills,
  |		adminflare, dust, frost, fresh,
  |		silver, clean, white
 */

return [
    'app_name' => env('APP_NAME', 'app'),
   'pagination_size' => env('PAGINATION_SIZE', 25),
'deliver_charge'=>'1',
    'deliver_period'=>'15',
      'senderEmail' => 'm.hashim@mqplanet.com',
    'displayName' => 'Mqplanet',
    'layoutAssetsFolder'=>'elite',


    'adminEmail' => 'mag@mqplanet.com',
    'pagination_size' => env('PAGINATION_SIZE', 25),
    'theme' => [
        'color' => 'default',
        'navbarFixed' => true,
        'menuFixed' => true,
        'menuAnimated' =>true,
    ],



    'adminEmail' => 'manager@fintolog.com',

    'facebookLoginCallback' => 'http://localhost:8000/facebook-callback-login',
    'facebookLoginProvider' => 'facebook',
    'facebookLoginDriver' => 'Facebook',
    'facebookLoginIdentifier' => '134086637144806',
    'facebookLoginApp_id' => '134086637144806',
    'facebookLoginSecret' => '6674265d12c68857fec46db83b6d71ee',
    'EnableFacebookRegister'=>false,
    'facebookLoginScopes' => ['email'],

    'googleCallback' => 'http://localhost:8000/google-callback-login',
    'googleProvider' => 'google',
    'googleDriver' => 'Google',
    'googleIdentifier' => '723816850274-o395qrmm75m7ljpc1r3a65tb7rgg04gp.apps.googleusercontent.com',
    'googleSecret' => 'EMuCoSfKGINQXQpTd--SRdRL',
    'EnableGoogleRegister'=>false,
    'googleScopes' => ['email'],

    'linkedinCallback' => 'http://localhost:8000/linkedin-callback-login',
    'linkedinProvider' => 'linkedin',
    'linkedinDriver' => 'LinkedIn',
    'linkedinIdentifier' => '779y8ism8ovwns',
    'EnableLinkedinRegister'=>false,
    'linkedinSecret' => 'l9paUw3eQJgtYRRV',

    'client_menu' => [


       [
           'route' => 'dashboard.index',
           'title' => 'dashboard',
           'icon' => 'fa fa-dashboard',
           'subMenus' => [

               [
                   'route' => 'dashboard.index',
                   'title' => 'dashboard',
                   'icon' => 'fa fa-dashboard',
               ],
           ]
       ],



       /*_______________________________________________________admin_menu*/


       [
           'route' => 'admin.governorate.index',
           'title' => 'governorate',
           'icon' => 'fa  fa-globe',
           'subMenus' => [

               [
                   'route' => 'admin.governorate.index',
                   'title' => 'governorate',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.governorate.create',
                   'title' => 'governorateCreate',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.area.index',
                   'title' => 'area',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.area.create',
                   'title' => 'areaCreate',
                   'icon' => 'fa fa-gears',
               ]
           ]
       ],

//       [
//           'route' => 'admin.area.index',
//           'title' => 'area',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.area.index',
//                   'title' => 'area',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.area.create',
//                   'title' => 'areaCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

       [
           'route' => 'admin.restaurant.index',
           'title' => 'restaurant',
           'icon' => 'fa  fa-cutlery',
           'subMenus' => [
               [
                   'route' => 'admin.cuisine.index',
                   'title' => 'cuisine',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.cuisine.index',
                   'title' => 'bestCuisine',
                   'icon' => 'fa fa-gears',
                   'parameter'=>'?bestCuisine=1'
               ],
               [
                   'route' => 'admin.restaurant.index',
                   'title' => 'restaurant',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.restaurant.index',
                   'title' => 'bestRestaurant',
                   'icon' => 'fa fa-gears',
                   'parameter'=>'?bestRestaurant=1'
               ],


               [
                   'route' => 'admin.restaurant.index',
                   'title' => 'newRestaurant',
                   'icon' => 'fa fa-gears',
                   'parameter'=>'?newRestaurant=1'
               ],


               [
                   'route' => 'admin.payment_way.index',
                   'title' => 'payment_way',
                   'icon' => 'fa fa-gears',
               ],
               [
               'route' => 'admin.restaurant_users.index',
               'title' => 'restaurant_users',
               'icon' => 'fa fa-gears',
           ],



//               [
//                   'route' => 'admin.category.index',
//                   'title' => 'category',
//                   'icon' => 'fa fa-gears',
//               ],
//
//               [
//                   'route' => 'admin.delivery_menu.index',
//                   'title' => 'delivery_menu',
//                   'icon' => 'fa fa-gears',
//               ],


               [
                   'route' => 'admin.restaurant_rate.index',
                   'title' => 'restaurant_rate',
                   'icon' => 'fa fa-gears',
               ],

               [
                   'route' => 'admin.restaurant_cuisine.index',
                   'title' => 'restaurant_cuisine',
                   'icon' => 'fa fa-gears',
               ],

               [
                   'route' => 'admin.menu_section.index',
                   'title' => 'menu_section',
                   'icon' => 'fa fa-gears',
               ],

               [
                   'route' => 'admin.dish.index',
                   'title' => 'dish',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.dish.index',
                   'title' => 'bestDishes',
                   'icon' => 'fa fa-gears',
                   'parameter'=>'?best=1',
               ],
               [
                   'route' => 'admin.dish.create',
                   'title' => 'dishCreate',
                   'icon' => 'fa fa-gears',
               ], [
                   'route' => 'admin.restaurant_area.index',
                   'title' => 'restaurant_area',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.restaurant_area.create',
                   'title' => 'restaurant_areaCreate',
                   'icon' => 'fa fa-gears',
               ],


               [
                   'route' => 'admin.operation_hour.index',
                   'title' => 'operation_hour',
                   'icon' => 'fa fa-gears',
               ],


           ]
       ],

//       [
//           'route' => 'admin.category.index',
//           'title' => 'category',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.category.index',
//                   'title' => 'category',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.category.create',
//                   'title' => 'categoryCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

//       [
//           'route' => 'admin.cuisine.index',
//           'title' => 'cuisine',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.cuisine.index',
//                   'title' => 'cuisine',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.cuisine.create',
//                   'title' => 'cuisineCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

//       [
//           'route' => 'admin.delivery_menu.index',
//           'title' => 'delivery_menu',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.delivery_menu.index',
//                   'title' => 'delivery_menu',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.delivery_menu.create',
//                   'title' => 'delivery_menuCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

//       [
//           'route' => 'admin.restaurant_rate.index',
//           'title' => 'restaurant_rate',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.restaurant_rate.index',
//                   'title' => 'restaurant_rate',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.restaurant_rate.create',
//                   'title' => 'restaurant_rateCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

//       [
//           'route' => 'admin.restaurant_cuisine.index',
//           'title' => 'restaurant_cuisine',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.restaurant_cuisine.index',
//                   'title' => 'restaurant_cuisine',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.restaurant_cuisine.create',
//                   'title' => 'restaurant_cuisineCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

//       [
//           'route' => 'admin.menu_section.index',
//           'title' => 'menu_section',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.menu_section.index',
//                   'title' => 'menu_section',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.menu_section.create',
//                   'title' => 'menu_sectionCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],
//
//       [
//           'route' => 'admin.dish.index',
//           'title' => 'dish',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.dish.index',
//                   'title' => 'dish',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.dish.create',
//                   'title' => 'dishCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

//       [
//           'route' => 'admin.dish_rate.index',
//           'title' => 'dish_rate',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.dish_rate.index',
//                   'title' => 'dish_rate',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.dish_rate.create',
//                   'title' => 'dish_rateCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

//       [
//           'route' => 'admin.restaurant_area.index',
//           'title' => 'restaurant_area',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.restaurant_area.index',
//                   'title' => 'restaurant_area',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.restaurant_area.create',
//                   'title' => 'restaurant_areaCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],
//
//       [
//           'route' => 'admin.operation_hour.index',
//           'title' => 'operation_hour',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.operation_hour.index',
//                   'title' => 'operation_hour',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.operation_hour.create',
//                   'title' => 'operation_hourCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

        [
            'route' => 'admin.order.index',
            'title' => 'order',
            'icon' => 'fa  fa-shopping-cart',
            'subMenus' => [

                [
                    'route' => 'admin.order.index',
                    'title' => 'order',
                    'icon' => 'fa fa-gears',
                ],
                [
                    'route' => 'admin.order.index',
                    'title' => 'currentOrders',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?'. http_build_query(['status'=>config('array.order_status_in_progress_group'),'period_type'=>'daily']),
                ],
                [
                    'route' => 'admin.order.index',
                    'title' => 'pendingOrders',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?'. http_build_query(['status'=>config('array.order_status_payed_index')]),
                ],


                [
                    'route' => 'admin.order.bill',
                    'title' => 'bill',
                    'icon' => 'fa fa-gears',
                ],

                [
                    'route' => 'admin.order.create',
                    'title' => 'orderCreate',
                    'icon' => 'fa fa-gears',
                ],

                [
                    'route' => 'admin.cart.index',
                    'title' => 'cart',
                    'icon' => 'fa fa-gears',
                ],
                [
                    'route' => 'admin.cart.create',
                    'title' => 'cartCreate',
                    'icon' => 'fa fa-gears',
                ] ,
                [
                    'route' => 'admin.order_driver.index',
                    'title' => 'order_driver',
                    'icon' => 'fa fa-gears',
                ],




//           [
//               'route' => 'admin.order_driver.create',
//               'title' => 'order_driverCreate',
//               'icon' => 'fa fa-gears',
//           ],
                [
                    'route' => 'admin.payment.index',
                    'title' => 'payment',
                    'icon' => 'fa fa-gears',
                ],
                [
                    'route' => 'admin.payment.index',
                    'title' => 'cashPayment',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?type='.config('array.payment_type_cash_index'),
                ],
                [
                    'route' => 'admin.payment.index',
                    'title' => 'knetPayment',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?type='.config('array.payment_type_knet_index'),
                ],
                [
                    'route' => 'admin.payment.index',
                    'title' => 'visaPayment',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?type='.config('array.payment_type_visa_index'),
                ],
                [
                    'route' => 'admin.knet.index',
                    'title' => 'knet',
                    'icon' => 'fa fa-gears',
                ],




            ]
        ],



        [
            'route' => 'admin.order.index',
            'title' => 'orderDriverChart',
            'icon' => 'fa  fa-area-chart',
            'subMenus' => [


                [
                    'route' => 'admin.order_driver.chart.barChart',
                    'title' => 'successDeliverTask',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?chartName=successDeliverTaskChart'
                ],
                [
                    'route' => 'admin.order_driver.chart.barChart',
                    'title' => 'unsuccessDeliverTask',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?chartName=unsuccessDeliverTaskChart'
                ],
                [
                    'route' => 'admin.order_driver.chart.barChart',
                    'title' => 'successDistanceDeliverTask',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?chartName=successDistanceDeliverTaskChart'
                ],
                [
                    'route' => 'admin.order_driver.chart.barChart',
                    'title' => 'unsuccessDistanceDeliverTask',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?chartName=unsuccessDistanceDeliverTaskChart'
                ],

                [
                    'route' => 'admin.order_driver.chart.barChart',
                    'title' => 'successTimeDeliverTask',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?chartName=successTimeDeliverTaskChart'
                ],
                [
                    'route' => 'admin.order_driver.chart.barChart',
                    'title' => 'unsuccessTimeDeliverTask',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?chartName=unsuccessTimeDeliverTaskChart'
                ],
                [
                    'route' => 'admin.order_driver.chart.pieChart',
                    'title' => 'successAreaOrder',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?chartName=successAreaChart'
                ],
                [
                    'route' => 'admin.order_driver.chart.pieChart',
                    'title' => 'unsuccessAreaOrder',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?chartName=unsuccessAreaChart'
                ],
                [
                    'route' => 'admin.order_driver.chart.barChart',
                    'title' => 'distanceWithReturn',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?chartName=distanceWithReturnChart'
                ],
                [
                    'route' => 'admin.order_driver.chart.barChart',
                    'title' => 'timeWithReturn',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?chartName=timeWithReturnChart'
                ],
                [
                    'route' => 'admin.order_driver.chart.barChart',
                    'title' => 'totalDutyTime',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?chartName=totalDutyTime'
                ],
                [
                    'route' => 'admin.order_driver.chart.attendChart',
                    'title' => 'dutyTime',
                    'icon' => 'fa fa-gears',
                    'parameter'=>''
                ],





            ]
        ],



//       [
//           'route' => 'admin.payment.index',
//           'title' => 'payment',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.payment.index',
//                   'title' => 'payment',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.payment.create',
//                   'title' => 'paymentCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

//       [
//           'route' => 'admin.cart.index',
//           'title' => 'cart',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//
//               [
//                   'route' => 'admin.cart.index',
//                   'title' => 'cart',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.cart.create',
//                   'title' => 'cartCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

       [
           'route' => 'admin.address.index',
           'title' => 'address',
           'icon' => 'fa  fa-map-marker',
           'subMenus' => [

               [
                   'route' => 'admin.address.index',
                   'title' => 'address',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.address.create',
                   'title' => 'addressCreate',
                   'icon' => 'fa fa-gears',
               ]
           ]
       ],

//       [
//           'route' => 'admin.order_driver.index',
//           'title' => 'order_driver',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.order_driver.index',
//                   'title' => 'order_driver',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.order_driver.create',
//                   'title' => 'order_driverCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

//       [
//           'route' => 'admin.users.index',
//           'title' => 'users',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.users.index',
//                   'title' => 'users',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.users.create',
//                   'title' => 'usersCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

       [
           'route' => 'admin.service_company.index',
           'title' => 'service_company',
           'icon' => 'fa fa-truck',
           'subMenus' => [

               [
                   'route' => 'admin.service_company_order.index',
                   'title' => 'service_company_order',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.service_company_order.create',
                   'title' => 'service_company_orderCreate',
                   'icon' => 'fa fa-gears',
               ],

               [
                   'route' => 'admin.service_company.index',
                   'title' => 'service_company',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.service_company.create',
                   'title' => 'service_companyCreate',
                   'icon' => 'fa fa-gears',
               ],

               [
                   'route' => 'admin.service_boy.index',
                   'title' => 'service_boy',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.service_boy.create',
                   'title' => 'service_boyCreate',
                   'icon' => 'fa fa-gears',
               ],

               [
                   'route' => 'admin.service.index',
                   'title' => 'service',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.service.create',
                   'title' => 'serviceCreate',
                   'icon' => 'fa fa-gears',
               ]
           ]
       ],

//       [
//           'route' => 'admin.service_boy.index',
//           'title' => 'service_boy',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.service_boy.index',
//                   'title' => 'service_boy',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.service_boy.create',
//                   'title' => 'service_boyCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

//       [
//           'route' => 'admin.service_company_order.index',
//           'title' => 'service_company_order',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.service_company_order.index',
//                   'title' => 'service_company_order',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.service_company_order.create',
//                   'title' => 'service_company_orderCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

       [
           'route' => 'admin.cms.index',
           'title' => 'cms',
           'icon' => 'fa  fa-wordpress',
           'subMenus' => [

               [
                   'route' => 'admin.cms.index',
                   'title' => 'cms',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.cms.create',
                   'title' => 'cmsCreate',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.contact_us.index',
                   'title' => 'contact_us',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.contact_us.create',
                   'title' => 'contact_usCreate',
                   'icon' => 'fa fa-gears',
               ],

               [
                   'route' => 'admin.banner.index',
                   'title' => 'banner',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.banner.create',
                   'title' => 'bannerCreate',
                   'icon' => 'fa fa-gears',
               ]
           ]
       ],
//
//       [
//           'route' => 'admin.contact_us.index',
//           'title' => 'contact_us',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.contact_us.index',
//                   'title' => 'contact_us',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.contact_us.create',
//                   'title' => 'contact_usCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

//       [
//           'route' => 'admin.restaurant_users.index',
//           'title' => 'restaurant_users',
//           'icon' => 'fa fa-gears',
//           'subMenus' => [
//
//               [
//                   'route' => 'admin.restaurant_users.index',
//                   'title' => 'restaurant_users',
//                   'icon' => 'fa fa-gears',
//               ],
//               [
//                   'route' => 'admin.restaurant_users.create',
//                   'title' => 'restaurant_usersCreate',
//                   'icon' => 'fa fa-gears',
//               ]
//           ]
//       ],

       [
           'route' => 'admin.audit_track.index',
           'title' => 'audit_track',
           'icon' => 'fa fa-eye',
           'subMenus' => [

               [
                   'route' => 'admin.audit_track.index',
                   'title' => 'audit_track',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'admin.audit_track.create',
                   'title' => 'audit_trackCreate',
                   'icon' => 'fa fa-gears',
               ]
           ]
       ],


        [
            'route' => 'admin.deliver_package.index',
            'title' => 'deliver_package',
            'icon' => 'fa fa-gears',
            'subMenus' => [

                [
                    'route' => 'admin.deliver_package.index',
                    'title' => 'deliver_package',
                    'icon' => 'fa fa-gears',
                ],
                [
                    'route' => 'admin.deliver_package.create',
                    'title' => 'deliver_packageCreate',
                    'icon' => 'fa fa-gears',
                ]
            ]
        ],

        [
            'route' => 'admin.offer.index',
            'title' => 'offer',
            'icon' => 'fa fa-gears',
            'subMenus' => [

                [
                    'route' => 'admin.offer.index',
                    'title' => 'offer',
                    'icon' => 'fa fa-gears',
                ],
                [
                    'route' => 'admin.offer.create',
                    'title' => 'offerCreate',
                    'icon' => 'fa fa-gears',
                ],
                [
                    'route' => 'admin.restaurant_offer.index',
                    'title' => 'restaurant_offer',
                    'icon' => 'fa fa-gears',
                ],
                [
                    'route' => 'admin.restaurant_offer.create',
                    'title' => 'restaurant_offerCreate',
                    'icon' => 'fa fa-gears',
                ],
                [
                    'route' => 'admin.restaurant_notification.index',
                    'title' => 'restaurant_notification',
                    'icon' => 'fa fa-gears',
                ],
                [
                    'route' => 'admin.restaurant_notification.create',
                    'title' => 'restaurant_notificationCreate',
                    'icon' => 'fa fa-gears',
                ]
            ]
        ],



        /*____________________________________________________________-end___ admin ____ menu ___*/




       [
           'route' => 'common.email_template.index',
           'title' => 'email_template',
           'icon' => 'fa  fa-envelope-o',
           'subMenus' => [

               [
                   'route' => 'common.email_template.index',
                   'title' => 'email_template',
                   'icon' => 'fa fa-gears',
               ],


               [
                   'route' => 'common.email_mass_template.index',
                   'title' => 'email_mass_template',
                   'icon' => 'fa fa-gears',
               ],

//               [
//                   'route' => 'common.email_mass_queue.index',
//                   'title' => 'email_mass_queue',
//                   'icon' => 'fa fa-gears',
//               ],


               [
                   'route' => 'common.email_group.index',
                   'title' => 'email_group',
                   'icon' => 'fa fa-gears',
               ],

               [
                   'route' => 'admin.notification.index',
                   'title' => 'notification',
                   'icon' => 'fa fa-bell',
               ],



//               [
//                   'route' => 'common.email_group_users.index',
//                   'title' => 'email_group_users',
//                   'icon' => 'fa fa-gears',
//               ],


           ]
       ],





       [
           'route' => 'common.roles.index',
           'title' => 'settings',
           'icon' => 'fa fa-gears',
           'subMenus' => [

               [
                   'route' => 'common.roles.index',
                   'title' => 'rolesList',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'common.roles.create',
                   'title' => 'rolesCreate',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'common.language.translate',
                   'title' => 'language',
                   'icon' => 'fa fa-language',
               ],
               [
                   'route' => 'admin.edit_config.create',
                   'title' => 'edit_config',
                   'icon' => 'fa fa-gears',
               ],
           ]
       ],


       [
           'route' => 'common.users.index',
           'title' => 'users',
           'icon' => 'fa fa-users',
           'subMenus' => [

               [
                   'route' => 'common.users.index',
                   'title' => 'users',
                   'icon' => 'fa fa-gears',
               ],
               [
                   'route' => 'common.users.create',
                   'title' => 'usersCreate',
                   'icon' => 'fa fa-gears',
               ]
           ]
       ],



























   ],




];




























