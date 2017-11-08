
CREATE TABLE `address` ( `id` INT NOT NULL AUTO_INCREMENT ,`users_id` INT  (11)  NOT NULL , `area_id` INT  (11)  NOT NULL , `name` VARCHAR  (255)  NULL , `type` INT  (11)  NULL , `first_name` VARCHAR  (255)  NULL , `last_name` VARCHAR  (255)  NULL , `pacl_number` VARCHAR  (20)  NULL , `block` VARCHAR  (255)  NULL , `street` VARCHAR  (255)  NULL , `judda` VARCHAR  (255)  NULL , `avenue` VARCHAR  (255)  NULL , `building` VARCHAR  (255)  NULL , `floor` VARCHAR  (255)  NULL , `apartment_number` VARCHAR  (255)  NULL , `mobile` VARCHAR  (20)  NULL , `phone` VARCHAR  (20)  NULL , `long` VARCHAR  (255)  NULL , `lat` VARCHAR  (255)  NULL , `directions` VARCHAR  (255)  NULL , `default` INT  (11)  NULL , `notification` INT  (11)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (users_id) REFERENCES users (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (area_id) REFERENCES area (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;


CREATE TABLE `area` ( `id` INT NOT NULL AUTO_INCREMENT ,`name_en` VARCHAR  (255)  NULL , `name_ar` VARCHAR  (255)  NULL , `governorate_id` INT  (11)  NOT NULL , `description_en` VARCHAR  (255)  NULL , `description_ar` VARCHAR  (255)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (governorate_id) REFERENCES governorate (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;

CREATE TABLE `restaurant` ( `id` INT NOT NULL AUTO_INCREMENT ,`name_en` VARCHAR  (255)  NULL , `name_ar` VARCHAR  (255)  NULL , `Owner_first_name` VARCHAR  (255)  NULL , `Owner_last_name` VARCHAR  (255)  NULL , `email` VARCHAR  (255)  NULL , `available_payment` VARCHAR  (25)  NULL , `telephone` VARCHAR  (25)  NULL , `address_en` VARCHAR  (255)  NULL , `address_ar` VARCHAR  (255)  NULL , `description_en` VARCHAR  (255)  NULL , `description_ar` VARCHAR  (255)  NULL , `status` INT  (11)  NULL , `min_amount` VARCHAR  (255)  NULL , `working_hour_from` VARCHAR  (20)  NULL , `working_hour_to` VARCHAR  (20)  NULL , `deliver_time_from` VARCHAR  (20)  NULL , `deliver_time_to` VARCHAR  (20)  NULL , `deliver_charge` VARCHAR  (255)  NULL , `rating` INT  (11)  NULL , `show_menu` INT  (11)  NULL , `order_accept_days` INT  (11)  NULL , `offline_order` INT  (11)  NULL , `summary_en` VARCHAR  (255)  NULL , `summary_ar` VARCHAR  (255)  NULL , `url` VARCHAR  (255)  NULL , `img` VARCHAR  (255)  NULL , `commission_type` INT  (11)  NULL , `discount_type` INT  (11)  NULL , `discount` VARCHAR  (255)  NULL , `area_id` INT  (11)  NOT NULL , `follow_us` INT  (11)  NULL , `notification` INT  (11)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (area_id) REFERENCES area (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;


CREATE TABLE `cart` ( `id` INT NOT NULL AUTO_INCREMENT ,`users_id` INT  (11)  NOT NULL , `restaurant_id` INT  (11)  NOT NULL , `dish_id` INT  (11)  NOT NULL , `order_id` INT  (11)  NOT NULL , `deliver_charge` VARCHAR  (255)  NULL , `quantity` INT  (11)  NULL , `unit_price` VARCHAR  (255)  NULL , `total_price` VARCHAR  (255)  NULL , `special_request` VARCHAR  (255)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (users_id) REFERENCES users (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (dish_id) REFERENCES dish (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (order_id) REFERENCES order (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;


CREATE TABLE `category` ( `id` INT NOT NULL AUTO_INCREMENT ,`name_en` VARCHAR  (255)  NULL , `name_ar` VARCHAR  (255)  NULL , `min_quantity` VARCHAR  (255)  NULL , `max_quantity` VARCHAR  (255)  NULL , `restaurant_id` INT  (11)  NOT NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;


CREATE TABLE `cuisine` ( `id` INT NOT NULL AUTO_INCREMENT ,`name_en` VARCHAR  (255)  NULL , `name_ar` VARCHAR  (255)  NULL , `status` INT  (11)  NULL , `description_en` VARCHAR  (255)  NULL , `description_ar` VARCHAR  (255)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ) ENGINE = InnoDB;

CREATE TABLE `delivery_menu` ( `id` INT NOT NULL AUTO_INCREMENT ,`name_en` VARCHAR  (255)  NULL , `name_ar` VARCHAR  (255)  NULL , `restaurant_id` INT  (11)  NOT NULL , `status` INT  (11)  NULL , `description_en` VARCHAR  (255)  NULL , `description_ar` VARCHAR  (255)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;

CREATE TABLE `dish` ( `id` INT NOT NULL AUTO_INCREMENT ,`name_en` VARCHAR  (255)  NULL , `name_ar` VARCHAR  (255)  NULL , `restaurant_id` INT  (11)  NOT NULL , `cuisine_id` INT  (11)  NOT NULL , `menu_section_id` INT  (11)  NOT NULL , `category_id` INT  (11)  NOT NULL , `delivery_menu_id` INT  (11)  NOT NULL , `parent_id` INT  (11)  NULL , `price` VARCHAR  (255)  NULL , `quantity` INT  (11)  NULL , `img` VARCHAR  (255)  NULL , `discount` VARCHAR  (255)  NULL , `available_from` VARCHAR  (20)  NULL , `available_to` VARCHAR  (20)  NULL , `description_en` VARCHAR  (255)  NULL , `description_ar` VARCHAR  (255)  NULL , `status` INT  (11)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (cuisine_id) REFERENCES cuisine (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (menu_section_id) REFERENCES menu_section (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (category_id) REFERENCES category (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (delivery_menu_id) REFERENCES delivery_menu (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;

CREATE TABLE `dish_rate` ( `id` INT NOT NULL AUTO_INCREMENT ,`users_id` INT  (11)  NOT NULL , `restaurant_id` INT  (11)  NOT NULL , `rate` INT  (11)  NULL , `description` VARCHAR  (255)  NULL , `status` INT  (11)  NULL , `notification` INT  (11)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (users_id) REFERENCES users (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;

CREATE TABLE `governorate` ( `id` INT NOT NULL AUTO_INCREMENT ,`name_en` VARCHAR  (50)  NULL , `name_ar` VARCHAR  (50)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ) ENGINE = InnoDB;


CREATE TABLE `menu_section` ( `id` INT NOT NULL AUTO_INCREMENT ,`name_en` VARCHAR  (255)  NULL , `name_ar` VARCHAR  (255)  NULL , `restaurant_id` INT  (11)  NOT NULL , `status` INT  (11)  NULL , `description_en` VARCHAR  (255)  NULL , `description_ar` VARCHAR  (255)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;

CREATE TABLE `operation_hour` ( `id` INT NOT NULL AUTO_INCREMENT ,`restaurant_area_id` INT  (11)  NOT NULL , `restaurant_id` INT  (11)  NOT NULL , `day` VARCHAR  (20)  NULL , `shift1_from` VARCHAR  (20)  NULL , `shift1_to` VARCHAR  (20)  NULL , `shift2_from` VARCHAR  (20)  NULL , `shift2_to` VARCHAR  (20)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (restaurant_area_id) REFERENCES restaurant_area (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;



CREATE TABLE `order` ( `id` INT NOT NULL AUTO_INCREMENT ,`img` VARCHAR  (255)  NULL , `order` INT  (11)  NULL , `status` INT  (11)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ) ENGINE = InnoDB;

CREATE TABLE `order_driver` ( `id` INT NOT NULL AUTO_INCREMENT ,`users_id` INT  (11)  NOT NULL , `order_id` INT  (11)  NOT NULL , `current_long` VARCHAR  (255)  NULL , `current_lat` VARCHAR  (255)  NULL , `status` INT  (11)  NULL , `note` VARCHAR  (255)  NULL , `notification` INT  (11)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (users_id) REFERENCES users (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (order_id) REFERENCES order (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;

CREATE TABLE `payment` ( `id` INT NOT NULL AUTO_INCREMENT ,`order_id` INT  (11)  NOT NULL , `users_id` INT  (11)  NOT NULL , `amount` VARCHAR  (255)  NULL , `status` INT  (11)  NULL , `type` INT  (11)  NULL , `notification` INT  (11)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (order_id) REFERENCES order (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (users_id) REFERENCES users (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;



CREATE TABLE `restaurant_area` ( `id` INT NOT NULL AUTO_INCREMENT ,`area_id` INT  (11)  NOT NULL , `restaurant_id` INT  (11)  NOT NULL , `delivery_charges` VARCHAR  (255)  NULL , `sahalat_charge` VARCHAR  (255)  NULL , `min_amount` VARCHAR  (255)  NULL , `deliver_time_from` VARCHAR  (20)  NULL , `deliver_time_to` VARCHAR  (20)  NULL , `status` INT  (11)  NULL , `governorate_id` INT  (11)  NOT NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (area_id) REFERENCES area (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (governorate_id) REFERENCES governorate (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;


CREATE TABLE `restaurant_cuisine` ( `id` INT NOT NULL AUTO_INCREMENT ,`restaurant_id` INT  (11)  NOT NULL , `cuisine_id` INT  (11)  NOT NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (cuisine_id) REFERENCES cuisine (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;

CREATE TABLE `restaurant_rate` ( `id` INT NOT NULL AUTO_INCREMENT ,`users_id` INT  (11)  NOT NULL , `restaurant_id` INT  (11)  NOT NULL , `rate` INT  (11)  NULL , `description` VARCHAR  (255)  NULL , `status` INT  (11)  NULL , `notification` INT  (11)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (users_id) REFERENCES users (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;

CREATE TABLE `restaurant_users` ( `id` INT NOT NULL AUTO_INCREMENT ,`users_id` INT  (11)  NOT NULL , `restaurant_id` INT  (11)  NOT NULL , `status` INT  (11)  NULL , `type` INT  (11)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (users_id) REFERENCES users (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;

CREATE TABLE `service_boy` ( `id` INT NOT NULL AUTO_INCREMENT ,`users_id` INT  (11)  NOT NULL , `manager_id` INT  (11)  NULL , `service_company_id` INT  (11)  NOT NULL , `status` INT  (11)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (users_id) REFERENCES users (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (service_company_id) REFERENCES service_company (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;

CREATE TABLE `service_company` ( `id` INT NOT NULL AUTO_INCREMENT ,`name` VARCHAR  (100)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ) ENGINE = InnoDB;


CREATE TABLE `service_company_order` ( `id` INT NOT NULL AUTO_INCREMENT ,`users_id` INT  (11)  NOT NULL , `service_company_id` INT  (11)  NOT NULL , `order_id` INT  (11)  NOT NULL , `description` VARCHAR  (255)  NULL , `status` INT  (11)  NULL , `notification` INT  (11)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (users_id) REFERENCES users (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (service_company_id) REFERENCES service_company (id) ON DELETE CASCADE  ON UPDATE CASCADE,FOREIGN  KEY (order_id) REFERENCES order (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;
























CREATE TABLE `cms` ( `id` INT NOT NULL AUTO_INCREMENT ,`title_en` VARCHAR  (255)  NULL , `title_ar` VARCHAR  (255)  NULL , `alias` VARCHAR  (255)  NULL , `content_en` VARCHAR  (255)  NULL , `content_ar` VARCHAR  (255)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ) ENGINE = InnoDB;

CREATE TABLE `contact_us` ( `id` INT NOT NULL AUTO_INCREMENT ,`users_id` INT  (11)  NOT NULL , `email` VARCHAR  (100)  NULL , `phone` VARCHAR  (20)  NULL , `comments` VARCHAR  (255)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (users_id) REFERENCES users (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;









CREATE TABLE `audit_track` ( `id` INT NOT NULL AUTO_INCREMENT ,`users_id` INT  (11)  NOT NULL , `action` VARCHAR  (255)  NULL , `users_name` VARCHAR  (100)  NULL , `users_role` VARCHAR  (100)  NULL , `description` VARCHAR  (255)  NULL , `created_at` VARCHAR  (20)  NULL , `updated_at` VARCHAR  (20)  NULL , PRIMARY KEY (`id`) ,FOREIGN  KEY (users_id) REFERENCES users (id) ON DELETE CASCADE  ON UPDATE CASCADE) ENGINE = InnoDB;

