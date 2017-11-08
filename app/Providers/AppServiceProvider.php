<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            'App\Repositories\common\users\UsersContract',
            'App\Repositories\common\users\EloquentUsersRepository'
        );

        $this->app->bind(
            'App\Repositories\common\authorization\roles\RolesContract',
            'App\Repositories\common\authorization\roles\EloquentRolesRepository'
        );


        $this->app->bind(
            'App\Repositories\common\email\email_template\EmailTemplateContract',
            'App\Repositories\common\email\email_template\EloquentEmailTemplateRepository'
        );
        $this->app->bind(
            'App\Repositories\common\email\email_mass_template\EmailMassTemplateContract',
            'App\Repositories\common\email\email_mass_template\EloquentEmailMassTemplateRepository'
        );
        $this->app->bind(
            'App\Repositories\common\email\email_mass_queue\EmailMassQueueContract',
            'App\Repositories\common\email\email_mass_queue\EloquentEmailMassQueueRepository'
        );
        $this->app->bind(
            'App\Repositories\common\email\email_group\EmailGroupContract',
            'App\Repositories\common\email\email_group\EloquentEmailGroupRepository'
        );
        $this->app->bind(
            'App\Repositories\common\email\email_group_users\EmailGroupUsersContract',
            'App\Repositories\common\email\email_group_users\EloquentEmailGroupUsersRepository'
        );













        $this->app->bind(
            'App\Repositories\admin\governorate\GovernorateContract',
            'App\Repositories\admin\governorate\EloquentGovernorateRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\area\AreaContract',
            'App\Repositories\admin\area\EloquentAreaRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\restaurant\RestaurantContract',
            'App\Repositories\admin\restaurant\EloquentRestaurantRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\category\CategoryContract',
            'App\Repositories\admin\category\EloquentCategoryRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\cuisine\CuisineContract',
            'App\Repositories\admin\cuisine\EloquentCuisineRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\delivery_menu\DeliveryMenuContract',
            'App\Repositories\admin\delivery_menu\EloquentDeliveryMenuRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\restaurant_rate\RestaurantRateContract',
            'App\Repositories\admin\restaurant_rate\EloquentRestaurantRateRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\restaurant_cuisine\RestaurantCuisineContract',
            'App\Repositories\admin\restaurant_cuisine\EloquentRestaurantCuisineRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\menu_section\MenuSectionContract',
            'App\Repositories\admin\menu_section\EloquentMenuSectionRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\dish\DishContract',
            'App\Repositories\admin\dish\EloquentDishRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\dish_rate\DishRateContract',
            'App\Repositories\admin\dish_rate\EloquentDishRateRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\restaurant_area\RestaurantAreaContract',
            'App\Repositories\admin\restaurant_area\EloquentRestaurantAreaRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\operation_hour\OperationHourContract',
            'App\Repositories\admin\operation_hour\EloquentOperationHourRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\order\OrderContract',
            'App\Repositories\admin\order\EloquentOrderRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\banner\BannerContract',
            'App\Repositories\admin\banner\EloquentBannerRepository'
        );

        $this->app->bind(
            'App\Repositories\admin\payment\PaymentContract',
            'App\Repositories\admin\payment\EloquentPaymentRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\cart\CartContract',
            'App\Repositories\admin\cart\EloquentCartRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\address\AddressContract',
            'App\Repositories\admin\address\EloquentAddressRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\order_driver\OrderDriverContract',
            'App\Repositories\admin\order_driver\EloquentOrderDriverRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\users\UsersContract',
            'App\Repositories\admin\users\EloquentUsersRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\service_company\ServiceCompanyContract',
            'App\Repositories\admin\service_company\EloquentServiceCompanyRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\service_boy\ServiceBoyContract',
            'App\Repositories\admin\service_boy\EloquentServiceBoyRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\service_company_order\ServiceCompanyOrderContract',
            'App\Repositories\admin\service_company_order\EloquentServiceCompanyOrderRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\cms\CmsContract',
            'App\Repositories\admin\cms\EloquentCmsRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\contact_us\ContactUsContract',
            'App\Repositories\admin\contact_us\EloquentContactUsRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\restaurant_users\RestaurantUsersContract',
            'App\Repositories\admin\restaurant_users\EloquentRestaurantUsersRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\audit_track\AuditTrackContract',
            'App\Repositories\admin\audit_track\EloquentAuditTrackRepository'
        );

        $this->app->bind(
            'App\Repositories\admin\service\ServiceContract',
            'App\Repositories\admin\service\EloquentServiceRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\service_company_order_service\ServiceCompanyOrderServiceContract',
            'App\Repositories\admin\service_company_order_service\EloquentServiceCompanyOrderServiceRepository'
        );

        $this->app->bind(
            'App\Repositories\admin\deliver_package\DeliverPackageContract',
            'App\Repositories\admin\deliver_package\EloquentDeliverPackageRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\offer\OfferContract',
            'App\Repositories\admin\offer\EloquentOfferRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\restaurant_offer\RestaurantOfferContract',
            'App\Repositories\admin\restaurant_offer\EloquentRestaurantOfferRepository'
        );
        $this->app->bind(
            'App\Repositories\admin\restaurant_notification\RestaurantNotificationContract',
            'App\Repositories\admin\restaurant_notification\EloquentRestaurantNotificationRepository'
        );


        $this->app->bind(
            'App\Repositories\admin\knet\KnetContract',
            'App\Repositories\admin\knet\EloquentKnetRepository'
        );

        $this->app->bind(
            'App\Repositories\admin\payment_way\PaymentWayContract',
            'App\Repositories\admin\payment_way\EloquentPaymentWayRepository'
        );











        /*____________________________________________________________________________________________website__*/


        $this->app->bind(
            'App\Repositories\website\governorate\GovernorateContract',
            'App\Repositories\website\governorate\EloquentGovernorateRepository'
        );
        $this->app->bind(
            'App\Repositories\website\area\AreaContract',
            'App\Repositories\website\area\EloquentAreaRepository'
        );
        $this->app->bind(
            'App\Repositories\website\restaurant\RestaurantContract',
            'App\Repositories\website\restaurant\EloquentRestaurantRepository'
        );
        $this->app->bind(
            'App\Repositories\website\category\CategoryContract',
            'App\Repositories\website\category\EloquentCategoryRepository'
        );
        $this->app->bind(
            'App\Repositories\website\cuisine\CuisineContract',
            'App\Repositories\website\cuisine\EloquentCuisineRepository'
        );
        $this->app->bind(
            'App\Repositories\website\delivery_menu\DeliveryMenuContract',
            'App\Repositories\website\delivery_menu\EloquentDeliveryMenuRepository'
        );
        $this->app->bind(
            'App\Repositories\website\restaurant_rate\RestaurantRateContract',
            'App\Repositories\website\restaurant_rate\EloquentRestaurantRateRepository'
        );
        $this->app->bind(
            'App\Repositories\website\restaurant_cuisine\RestaurantCuisineContract',
            'App\Repositories\website\restaurant_cuisine\EloquentRestaurantCuisineRepository'
        );
        $this->app->bind(
            'App\Repositories\website\menu_section\MenuSectionContract',
            'App\Repositories\website\menu_section\EloquentMenuSectionRepository'
        );
        $this->app->bind(
            'App\Repositories\website\dish\DishContract',
            'App\Repositories\website\dish\EloquentDishRepository'
        );
        $this->app->bind(
            'App\Repositories\website\dish_rate\DishRateContract',
            'App\Repositories\website\dish_rate\EloquentDishRateRepository'
        );
        $this->app->bind(
            'App\Repositories\website\restaurant_area\RestaurantAreaContract',
            'App\Repositories\website\restaurant_area\EloquentRestaurantAreaRepository'
        );
        $this->app->bind(
            'App\Repositories\website\operation_hour\OperationHourContract',
            'App\Repositories\website\operation_hour\EloquentOperationHourRepository'
        );
        $this->app->bind(
            'App\Repositories\website\order\OrderContract',
            'App\Repositories\website\order\EloquentOrderRepository'
        );
        $this->app->bind(
            'App\Repositories\website\banner\BannerContract',
            'App\Repositories\website\banner\EloquentBannerRepository'
        );

        $this->app->bind(
            'App\Repositories\website\payment\PaymentContract',
            'App\Repositories\website\payment\EloquentPaymentRepository'
        );
        $this->app->bind(
            'App\Repositories\website\cart\CartContract',
            'App\Repositories\website\cart\EloquentCartRepository'
        );
        $this->app->bind(
            'App\Repositories\website\address\AddressContract',
            'App\Repositories\website\address\EloquentAddressRepository'
        );
        $this->app->bind(
            'App\Repositories\website\order_driver\OrderDriverContract',
            'App\Repositories\website\order_driver\EloquentOrderDriverRepository'
        );
        $this->app->bind(
            'App\Repositories\website\users\UsersContract',
            'App\Repositories\website\users\EloquentUsersRepository'
        );
        $this->app->bind(
            'App\Repositories\website\service_company\ServiceCompanyContract',
            'App\Repositories\website\service_company\EloquentServiceCompanyRepository'
        );
        $this->app->bind(
            'App\Repositories\website\service_boy\ServiceBoyContract',
            'App\Repositories\website\service_boy\EloquentServiceBoyRepository'
        );
        $this->app->bind(
            'App\Repositories\website\service_company_order\ServiceCompanyOrderContract',
            'App\Repositories\website\service_company_order\EloquentServiceCompanyOrderRepository'
        );
        $this->app->bind(
            'App\Repositories\website\cms\CmsContract',
            'App\Repositories\website\cms\EloquentCmsRepository'
        );
        $this->app->bind(
            'App\Repositories\website\contact_us\ContactUsContract',
            'App\Repositories\website\contact_us\EloquentContactUsRepository'
        );
        $this->app->bind(
            'App\Repositories\website\restaurant_users\RestaurantUsersContract',
            'App\Repositories\website\restaurant_users\EloquentRestaurantUsersRepository'
        );
        $this->app->bind(
            'App\Repositories\website\audit_track\AuditTrackContract',
            'App\Repositories\website\audit_track\EloquentAuditTrackRepository'
        );


        $this->app->bind(
            'App\Repositories\website\knet\KnetContract',
            'App\Repositories\website\knet\EloquentKnetRepository'
        );

        $this->app->bind(
            'App\Repositories\website\deliver_package\DeliverPackageContract',
            'App\Repositories\website\deliver_package\EloquentDeliverPackageRepository'
        );
        $this->app->bind(
            'App\Repositories\website\offer\OfferContract',
            'App\Repositories\website\offer\EloquentOfferRepository'
        );
        $this->app->bind(
            'App\Repositories\website\restaurant_offer\RestaurantOfferContract',
            'App\Repositories\website\restaurant_offer\EloquentRestaurantOfferRepository'
        );
        $this->app->bind(
            'App\Repositories\website\restaurant_notification\RestaurantNotificationContract',
            'App\Repositories\website\restaurant_notification\EloquentRestaurantNotificationRepository'
        );


        /*__________________________________________________________________________________________END_____website__*/

    }
}
