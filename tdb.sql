/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 8.0.18 : Database - taymac
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`taymac` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `taymac`;

/*Table structure for table `account_entry` */

DROP TABLE IF EXISTS `account_entry`;

CREATE TABLE `account_entry` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `account_type` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `account_entry` */

insert  into `account_entry`(`id`,`account_type`,`source`,`date`,`amount`,`description`) values (2,'Expenditure','adasas','2020-06-09',333.00,'sdasd'),(3,'Other','asda','2020-06-08',322.00,''),(5,'Income','dsfsd','2020-06-09',2312.00,'adsadas');

/*Table structure for table `admin_bill_payments` */

DROP TABLE IF EXISTS `admin_bill_payments`;

CREATE TABLE `admin_bill_payments` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `billid` int(12) DEFAULT NULL,
  `amountpaid` decimal(20,2) DEFAULT NULL,
  `datepaid` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `admin_bill_payments` */

insert  into `admin_bill_payments`(`id`,`billid`,`amountpaid`,`datepaid`) values (1,1,1000.00,'2020-06-09 11:31:56'),(2,5,4000.00,'2020-06-09 11:32:12'),(3,5,500.00,'2020-06-09 11:33:06'),(4,4,750.00,'2020-06-09 11:33:26'),(5,2,2000.00,'2020-06-09 11:36:42'),(6,5,54.00,'2020-06-09 12:13:52'),(7,5,-54.00,'2020-06-09 13:43:54');

/*Table structure for table `admin_sm_payments` */

DROP TABLE IF EXISTS `admin_sm_payments`;

CREATE TABLE `admin_sm_payments` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `billid` int(12) DEFAULT NULL,
  `amountpaid` decimal(20,2) DEFAULT NULL,
  `datepaid` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `admin_sm_payments` */

insert  into `admin_sm_payments`(`id`,`billid`,`amountpaid`,`datepaid`) values (1,3,100.00,'2020-06-09 17:13:44'),(2,3,20.00,'2020-06-09 17:13:53');

/*Table structure for table `admin_staff` */

DROP TABLE IF EXISTS `admin_staff`;

CREATE TABLE `admin_staff` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(255) DEFAULT NULL,
  `employment_type` varchar(250) DEFAULT NULL,
  `staff_id` varchar(250) DEFAULT NULL,
  `staff_position` varchar(250) DEFAULT NULL,
  `staff_telephone` varchar(250) DEFAULT NULL,
  `staff_email` varchar(250) DEFAULT NULL,
  `staff_qualification` varchar(250) DEFAULT NULL,
  `staff_department` varchar(250) DEFAULT NULL,
  `date_started` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `admin_staff` */

insert  into `admin_staff`(`id`,`staff_name`,`employment_type`,`staff_id`,`staff_position`,`staff_telephone`,`staff_email`,`staff_qualification`,`staff_department`,`date_started`) values (2,'Isaac Osafo','Full Time','T1230','Software Engineer','0202378273','ikosafo@gmail.com','BSc Computer Science','MIS','2020-05-31');

/*Table structure for table `admin_staff_iou` */

DROP TABLE IF EXISTS `admin_staff_iou`;

CREATE TABLE `admin_staff_iou` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `staff_id` int(12) DEFAULT NULL,
  `payment_period` varchar(255) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_amount` decimal(20,2) DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `admin_staff_iou` */

insert  into `admin_staff_iou`(`id`,`staff_id`,`payment_period`,`payment_date`,`payment_amount`,`dateupdated`) values (1,2,'2020-05','2020-06-12',450.00,'2020-06-12 02:17:24'),(2,2,'2020-05','2020-06-09',300.00,'2020-06-12 06:13:00'),(3,2,'2020-06','2020-06-08',223.00,'2020-06-12 06:13:11');

/*Table structure for table `admin_staff_salary` */

DROP TABLE IF EXISTS `admin_staff_salary`;

CREATE TABLE `admin_staff_salary` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `staff_id` int(12) DEFAULT NULL,
  `payment_period` varchar(255) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_amount` decimal(20,2) DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  `gross_salary` decimal(20,2) DEFAULT NULL,
  `allowance` decimal(20,2) DEFAULT NULL,
  `overtime` decimal(20,2) DEFAULT NULL,
  `compensation` decimal(20,2) DEFAULT NULL,
  `iou_salary` decimal(20,2) DEFAULT NULL,
  `income_tax` decimal(20,2) DEFAULT NULL,
  `ssnit` decimal(20,2) DEFAULT NULL,
  `welfare` decimal(20,2) DEFAULT NULL,
  `total` decimal(20,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `admin_staff_salary` */

insert  into `admin_staff_salary`(`id`,`staff_id`,`payment_period`,`payment_date`,`payment_amount`,`dateupdated`,`gross_salary`,`allowance`,`overtime`,`compensation`,`iou_salary`,`income_tax`,`ssnit`,`welfare`,`total`) values (1,2,'2020-06','2020-06-16',NULL,'2020-06-12 06:10:46',4000.00,0.00,0.00,300.00,800.00,224.00,322.00,50.00,2904.00),(2,2,'2020-05','2020-06-09',NULL,'2020-06-12 06:39:50',5000.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,5000.00);

/*Table structure for table `admin_taymac_billing` */

DROP TABLE IF EXISTS `admin_taymac_billing`;

CREATE TABLE `admin_taymac_billing` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `billing_type` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `billing_type_other` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `billing_tenant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `billing_currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `billing_period` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `billing_amount` decimal(20,2) DEFAULT '0.00',
  `billing_months` int(12) DEFAULT NULL,
  `billing_date` date DEFAULT NULL,
  `billing_delivered` varchar(200) DEFAULT NULL,
  `billing_description` varchar(256) DEFAULT NULL,
  `billing_total` decimal(20,2) DEFAULT '0.00',
  `dateupdated` datetime DEFAULT NULL,
  `amt_paid` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `admin_taymac_billing` */

insert  into `admin_taymac_billing`(`id`,`billing_type`,`billing_type_other`,`billing_tenant`,`billing_currency`,`billing_period`,`billing_amount`,`billing_months`,`billing_date`,`billing_delivered`,`billing_description`,`billing_total`,`dateupdated`,`amt_paid`) values (1,'CAM Fees','','5','US Dollars','2020-06',910.00,12,'2020-06-17','Yes','Desc',10920.00,'2020-06-09 04:54:38',1300.00),(2,'Reimburse Bills','','3','GB Pounds','2020-06',350.00,12,'2020-06-09','No','Description here',4200.00,'2020-06-09 06:53:51',2000.00),(4,'Other','Other Bill','5','Euros','2020-08',123.00,12,'2020-06-17','Yes','',1476.00,'2020-06-09 07:29:50',750.00),(5,'Reimburse Bills','','3','Euros','2020-06',300.00,15,'2020-06-23','Yes','',4500.00,'2020-06-09 10:20:11',4500.00);

/*Table structure for table `admin_taymac_payment` */

DROP TABLE IF EXISTS `admin_taymac_payment`;

CREATE TABLE `admin_taymac_payment` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `receiver_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `payment_amount` decimal(20,2) DEFAULT '0.00',
  `payment_date` date DEFAULT NULL,
  `payment_purpose` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `payment_description` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `admin_taymac_payment` */

insert  into `admin_taymac_payment`(`id`,`receiver_name`,`payment_amount`,`payment_date`,`payment_purpose`,`payment_description`,`dateupdated`) values (2,'Samuel Nti',2333.43,'2020-06-08','For development','Received amount','2020-06-12 09:07:59');

/*Table structure for table `admin_taymac_property` */

DROP TABLE IF EXISTS `admin_taymac_property`;

CREATE TABLE `admin_taymac_property` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `property_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `property_type` varchar(255) DEFAULT NULL,
  `property_location` varchar(255) DEFAULT NULL,
  `property_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `property_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `admin_taymac_property` */

insert  into `admin_taymac_property`(`id`,`property_name`,`property_type`,`property_location`,`property_address`,`property_description`) values (5,'Lucumber','House','Kumasi','',''),(4,'Bethel Heights','Shop','Accra','123','Nice building');

/*Table structure for table `admin_taymac_sm` */

DROP TABLE IF EXISTS `admin_taymac_sm`;

CREATE TABLE `admin_taymac_sm` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `sm_type` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sm_type_other` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sm_tenant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sm_currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sm_amount` decimal(20,2) DEFAULT '0.00',
  `sm_date` date DEFAULT NULL,
  `sm_description` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  `amt_paid` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `admin_taymac_sm` */

insert  into `admin_taymac_sm`(`id`,`sm_type`,`sm_type_other`,`sm_tenant`,`sm_currency`,`sm_amount`,`sm_date`,`sm_description`,`dateupdated`,`amt_paid`) values (2,'Other','Dusting','4','US Dollars',125.00,'2020-06-08','Dusting floor','2020-06-09 15:01:01',0.00),(3,'Electrical','','5','GH Cedis',133.00,'2020-06-16','','2020-06-09 16:50:39',120.00);

/*Table structure for table `admin_taymac_staff` */

DROP TABLE IF EXISTS `admin_taymac_staff`;

CREATE TABLE `admin_taymac_staff` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `property_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `property_type` varchar(255) DEFAULT NULL,
  `property_location` varchar(255) DEFAULT NULL,
  `property_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `property_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `admin_taymac_staff` */

/*Table structure for table `admin_taymac_tenant` */

DROP TABLE IF EXISTS `admin_taymac_tenant`;

CREATE TABLE `admin_taymac_tenant` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `tenant_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tenant_property` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_started` date DEFAULT NULL,
  `date_completed` date DEFAULT NULL,
  `tenant_telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tenant_email` varchar(255) DEFAULT NULL,
  `tenant_description` varchar(255) DEFAULT NULL,
  `payment_rate` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `admin_taymac_tenant` */

insert  into `admin_taymac_tenant`(`id`,`tenant_name`,`tenant_property`,`date_started`,`date_completed`,`tenant_telephone`,`tenant_email`,`tenant_description`,`payment_rate`) values (5,'New Tenant','5','2020-05-31','2020-07-03','0552372873','','','Yearly'),(3,'GCB','4','2020-05-31','2020-06-03','023988292','ikosafo@gmail.com','Description of Tenant','Monthly'),(4,'COCA COLA','5','2020-05-31','2020-06-18','1312312312','grace@gmail.com','Another description here','Yearly'),(7,'GCB','5','2020-06-23','2020-07-11','02082878732','','','Weekly');

/*Table structure for table `farm_fertilizer` */

DROP TABLE IF EXISTS `farm_fertilizer`;

CREATE TABLE `farm_fertilizer` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `fertilizer_name` varchar(255) DEFAULT NULL,
  `application_area` varchar(255) DEFAULT NULL,
  `tunnel` int(12) DEFAULT NULL,
  `product` int(12) DEFAULT NULL,
  `input_kg` decimal(20,0) DEFAULT NULL,
  `input_g` decimal(20,0) DEFAULT NULL,
  `date_activity` date DEFAULT NULL,
  `activity_description` varchar(255) DEFAULT NULL,
  `dateperiod` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `farm_fertilizer` */

insert  into `farm_fertilizer`(`id`,`fertilizer_name`,`application_area`,`tunnel`,`product`,`input_kg`,`input_g`,`date_activity`,`activity_description`,`dateperiod`) values (1,'Fertilizer Name','Foliar',8,2,10,10000,'2020-06-23','description here','2020-06-11 15:52:01');

/*Table structure for table `farm_funnel` */

DROP TABLE IF EXISTS `farm_funnel`;

CREATE TABLE `farm_funnel` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `funnel_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `funnel_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `farm_funnel` */

insert  into `farm_funnel`(`id`,`funnel_name`,`funnel_description`) values (7,'Tunnel 1','Tunnel Description'),(8,'Tunnel Two','Tunnel Description for two');

/*Table structure for table `farm_harvest` */

DROP TABLE IF EXISTS `farm_harvest`;

CREATE TABLE `farm_harvest` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `input_kg` decimal(20,0) DEFAULT NULL,
  `input_g` decimal(20,0) DEFAULT NULL,
  `date_harvest` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `farm_harvest` */

insert  into `farm_harvest`(`id`,`product`,`input_kg`,`input_g`,`date_harvest`) values (2,'sadas',233,233000,'2020-06-17');

/*Table structure for table `farm_inputs` */

DROP TABLE IF EXISTS `farm_inputs`;

CREATE TABLE `farm_inputs` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `input_name` varchar(255) DEFAULT NULL,
  `input_type` varchar(255) DEFAULT NULL,
  `input_type_other` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `farm_inputs` */

insert  into `farm_inputs`(`id`,`input_name`,`input_type`,`input_type_other`) values (3,'asdas','Pesticide',''),(4,'Input 2','Pesticide','');

/*Table structure for table `farm_otheractivity` */

DROP TABLE IF EXISTS `farm_otheractivity`;

CREATE TABLE `farm_otheractivity` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `activity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_activity` date DEFAULT NULL,
  `activity_description` varchar(255) DEFAULT NULL,
  `dateperiod` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `farm_otheractivity` */

insert  into `farm_otheractivity`(`id`,`activity`,`date_activity`,`activity_description`,`dateperiod`) values (2,'Another Activity Name here','2020-06-17','The description','2020-06-11 22:28:23');

/*Table structure for table `farm_pesticide` */

DROP TABLE IF EXISTS `farm_pesticide`;

CREATE TABLE `farm_pesticide` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `pesticide_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tunnel` int(12) DEFAULT NULL,
  `product` int(12) DEFAULT NULL,
  `input_kg` decimal(20,0) DEFAULT NULL,
  `input_g` decimal(20,0) DEFAULT NULL,
  `date_activity` date DEFAULT NULL,
  `activity_description` varchar(255) DEFAULT NULL,
  `dateperiod` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `farm_pesticide` */

insert  into `farm_pesticide`(`id`,`pesticide_name`,`tunnel`,`product`,`input_kg`,`input_g`,`date_activity`,`activity_description`,`dateperiod`) values (2,'Name of Pesticide',7,3,12,12000,'2020-06-15','','2020-06-11 16:16:45');

/*Table structure for table `farm_products` */

DROP TABLE IF EXISTS `farm_products`;

CREATE TABLE `farm_products` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `product_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `product_type_other` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `farm_products` */

insert  into `farm_products`(`id`,`product_name`,`product_type`,`product_type_other`) values (3,'Product Name','Vegetable',''),(2,'asdas','Fruit','');

/*Table structure for table `farm_purchases` */

DROP TABLE IF EXISTS `farm_purchases`;

CREATE TABLE `farm_purchases` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `input_kg` decimal(20,0) DEFAULT NULL,
  `input_g` decimal(20,0) DEFAULT NULL,
  `input_cost` decimal(20,2) DEFAULT NULL,
  `input_type` varchar(255) DEFAULT NULL,
  `date_pf` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `farm_purchases` */

insert  into `farm_purchases`(`id`,`item_name`,`input_kg`,`input_g`,`input_cost`,`input_type`,`date_pf`) values (3,'asda',312,312000,1312.00,'Fertilizer','2020-05-31'),(4,'sadas',123,123000,213.00,'Pesticide','2020-06-15'),(6,'adsasad',123,0,131.27,'Other','2020-06-15');

/*Table structure for table `farm_sales` */

DROP TABLE IF EXISTS `farm_sales`;

CREATE TABLE `farm_sales` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `input_kg` decimal(20,0) DEFAULT NULL,
  `input_g` decimal(20,0) DEFAULT NULL,
  `input_price` decimal(20,2) DEFAULT NULL,
  `date_sale` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `farm_sales` */

insert  into `farm_sales`(`id`,`product`,`input_kg`,`input_g`,`input_price`,`date_sale`) values (2,'adsasad',12,12000,123.00,'2020-06-10');

/*Table structure for table `farm_watering` */

DROP TABLE IF EXISTS `farm_watering`;

CREATE TABLE `farm_watering` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `starttime` datetime DEFAULT NULL,
  `endtime` datetime DEFAULT NULL,
  `cycle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tunnel` int(12) DEFAULT NULL,
  `product` int(12) DEFAULT NULL,
  `input_kg` varchar(250) DEFAULT NULL,
  `input_g` varchar(250) DEFAULT NULL,
  `date_activity` date DEFAULT NULL,
  `activity_description` varchar(255) DEFAULT NULL,
  `dateperiod` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `farm_watering` */

insert  into `farm_watering`(`id`,`starttime`,`endtime`,`cycle`,`tunnel`,`product`,`input_kg`,`input_g`,`date_activity`,`activity_description`,`dateperiod`) values (2,'2020-06-01 05:30:00','2020-06-11 06:30:00','Second',7,2,'12','12000','2020-06-17','','2020-06-11 17:29:11');

/*Table structure for table `taymac_aboutus` */

DROP TABLE IF EXISTS `taymac_aboutus`;

CREATE TABLE `taymac_aboutus` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `aboutus` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_aboutus` */

insert  into `taymac_aboutus`(`id`,`aboutus`) values (6,' <p>\n                            TAYMAC Consulting Limited (TCL) is a company registered in Ghana in 2011 initially as\n                            Taymac Safety Consulting Limited with registration number CA-88,491 (as per attached)\n                            and evolved out of the need to make Occupational Health, Safety, Security and\n                            Environmental Management (HSSE), the number one priority of all branches of industry,\n                            commerce and business\n                        </p>\n                        <p>\n                            We gradually evolved into Property and Facility management in early 2012 when the\n                            opportunity vailed itself and in order to reflect the shift in our line of business, we\n                            had to change the name of Company to Taymac Consulting Limited\n                        </p>\n                        <p>\n                            Managing of properties within Accra, gradually shifted us into aluminium glazing and office partition using both glass, aluminium profiles or gypsum board, whilst handling\n                            tenant move-ins in Properties managed by us. By mid 2012 this became a full fledged arm\n                            of TCL due to the quality and durability of our work and we have not looked back since\n                            building an impressive list of clientele along the way\n                        </p>');

/*Table structure for table `taymac_blog` */

DROP TABLE IF EXISTS `taymac_blog`;

CREATE TABLE `taymac_blog` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `blog_text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `imageid` varchar(255) DEFAULT NULL,
  `status` int(12) DEFAULT '0',
  `user` varchar(255) DEFAULT NULL,
  `dateuploaded` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_blog` */

insert  into `taymac_blog`(`id`,`category`,`blog_text`,`title`,`imageid`,`status`,`user`,`dateuploaded`) values (4,'Another Category','<p>Another blog text here.</p>','Another Title','77720200608',1,'Isaac Osafo','2020-06-08 06:57:25'),(3,'sdssdf','<p>asdassa.asdasdsasdsa.asdsadsad.asdasdsadsa.asdasds</p>','asdasd','617720200607',1,'Isaac Osafo','2020-06-07 19:32:47');

/*Table structure for table `taymac_blog_rating` */

DROP TABLE IF EXISTS `taymac_blog_rating`;

CREATE TABLE `taymac_blog_rating` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `dateposted` datetime DEFAULT NULL,
  `rating` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `macaddress` varchar(255) DEFAULT NULL,
  `ipaddress` varchar(255) DEFAULT NULL,
  `postid` varchar(255) DEFAULT NULL,
  `ratenum` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_blog_rating` */

insert  into `taymac_blog_rating`(`id`,`dateposted`,`rating`,`macaddress`,`ipaddress`,`postid`,`ratenum`) values (1,'2020-06-08 04:20:50','Three Stars','Host Name . . . .','::1','postid',3),(2,'2020-06-08 04:23:19','Three Stars','Host Name . . . .','::1','617720200607',3),(3,'2020-06-08 04:37:33','Four Stars','Host Name . . . .','::1','617720200607',4),(4,'2020-06-08 04:39:49','Five Stars','Host Name . . . .','::1','617720200607',5),(5,'2020-06-08 04:40:36','Four Stars','Host Name . . . .','::1','617720200607',4),(6,'2020-06-08 04:48:33','Three Stars','Host Name . . . .','::1','617720200607',3),(7,'2020-06-08 04:48:58','Five Stars','Host Name . . . .','::1','617720200607',5),(8,'2020-06-08 04:55:05','One Star','Host Name . . . .','::1','617720200607',1),(9,'2020-06-08 04:55:38','One Star','Host Name . . . .','::1','617720200607',1),(10,'2020-06-08 05:08:41','Three Stars','Host Name . . . .','::1','617720200607',3),(11,'2020-06-08 05:10:51','Three Stars','Host Name . . . .','::1','617720200607',3),(12,'2020-06-08 05:10:56','Five Stars','Host Name . . . .','::1','617720200607',5),(13,'2020-06-08 05:11:04','Five Stars','Host Name . . . .','::1','617720200607',5),(14,'2020-06-08 07:10:23','Four Stars','Host Name . . . .','::1','77720200608',4),(15,'2020-06-08 07:10:53','Three Stars','Host Name . . . .','::1','77720200608',3);

/*Table structure for table `taymac_blog_review` */

DROP TABLE IF EXISTS `taymac_blog_review`;

CREATE TABLE `taymac_blog_review` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `reviewname` varchar(255) DEFAULT NULL,
  `reviewtitle` varchar(255) DEFAULT NULL,
  `reviewtext` varchar(255) DEFAULT NULL,
  `dateposted` datetime DEFAULT NULL,
  `blogid` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `macaddress` varchar(255) DEFAULT NULL,
  `ipaddress` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_blog_review` */

insert  into `taymac_blog_review`(`id`,`reviewname`,`reviewtitle`,`reviewtext`,`dateposted`,`blogid`,`macaddress`,`ipaddress`) values (4,'adasdasda','asdasdasd','assdasdsa','2020-06-08 04:40:41','617720200607','Host Name . . . .','::1'),(5,'Ernest Amoah','Title','Interesting article','2020-06-08 07:11:00','77720200608','Host Name . . . .','::1');

/*Table structure for table `taymac_client_feedback` */

DROP TABLE IF EXISTS `taymac_client_feedback`;

CREATE TABLE `taymac_client_feedback` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `client_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_client_feedback` */

insert  into `taymac_client_feedback`(`id`,`client_name`,`client_text`) values (6,'Tina & James','Your creative work is superb, much better than the original and exactly what we want. Also your project management skills on budgeting, scheduling, client communication, and follow-through. A professional job, start to finish'),(7,'Mary','I declare a standing ovation!...I hope you know that I think you are fantastic, and I feel extremely lucky to have you. I can\'t tell you how much I have enjoyed working with you'),(8,'Paul & Susan','Have we told you lately that we love working with you? Your thoroughness and fairness is awesome.....You are so easy to work with');

/*Table structure for table `taymac_contact` */

DROP TABLE IF EXISTS `taymac_contact`;

CREATE TABLE `taymac_contact` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `address` longtext,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `postbox` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_contact` */

insert  into `taymac_contact`(`id`,`address`,`phone`,`mobile`,`email`,`website`,`postbox`) values (1,'Ground Floor Le Pierre, <br>14 Choice Close Off Senchi Street <br>Airport Residential Area, Accra','+233 (0) 245-710-614','+233 (0) 302-789-025','info@taymac.net','https://www.taymac.net','P.O. BOX AN 7310, ACCRA - NORTH');

/*Table structure for table `taymac_farm` */

DROP TABLE IF EXISTS `taymac_farm`;

CREATE TABLE `taymac_farm` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `farm_text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_farm` */

insert  into `taymac_farm`(`id`,`farm_text`) values (1,'<!-- Property Cities -->\n    <section id=\"property-city\" class=\"property-city\">\n        <div class=\"container\">\n            <div class=\"row features_row\">\n                <div class=\"col-sm-6 col-lg-4 col-xl-4 p0\">\n                    <div class=\"why_chose_us home6\">\n                        <div class=\"icon\">\n                            <span class=\"flaticon-house-1\"></span>\n                        </div>\n                        <div class=\"details\">\n                            <h4>Taymac Farms</h4>\n                            <p>Your Fresh Vegetable Hub</p>\n                        </div>\n                    </div>\n                </div>\n                <div class=\"col-sm-6 col-lg-4 col-xl-4 p0\">\n                    <div class=\"why_chose_us home6\">\n                        <div class=\"icon\">\n                            <span class=\"flaticon-house\"></span>\n                        </div>\n                        <div class=\"details\">\n                            <h4>Taymac Farms</h4>\n                            <p>We Produce Fresh Green House Grown Vegetables for Shops,\n                                Restaurants, Hotels and Individuals</p>\n                        </div>\n                    </div>\n                </div>\n                <div class=\"col-sm-6 col-lg-4 col-xl-4 p0\">\n                    <div class=\"why_chose_us home6\">\n                        <div class=\"icon\">\n                            <span class=\"flaticon-house-2\"></span>\n                        </div>\n                        <div class=\"details\">\n                            <h4>Taymac Farms</h4>\n                            <p>Our Farm Is Open To Customers 24/7. Come Take a Look at Ghana\'s Coolest Farm</p>\n                        </div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <!-- About Text Content -->\n    <section class=\"about-section\">\n        <div class=\"container\">\n            <div class=\"row\">\n                <div class=\"col-lg-6 offset-lg-3\">\n                    <div class=\"main-title text-center\">\n                        <h2 class=\"mt0\">TAYMAC Farms</h2>\n                    </div>\n                </div>\n            </div>\n            <div class=\"row\">\n                <div class=\"col-lg-12 col-xl-12 col-md-12\">\n                    <div class=\"about_content\">\n\n                        <p>\n                            With one of our core values being, providing our cherished customers and with best possible in quality, safe\n                            products and services, TCL has established a Greenhouse Farm right here on the outskirts of Accra producing\n                            fresh quality organic vegetables using the best technology and practices in organic vegetable production!\n                        </p>\n                    </div>\n                </div>\n                <div class=\"col-lg-6 col-xl-6 col-md-6\">\n                    <div class=\"about_content\">\n\n                        <h5 class=\"card-title mb-3\">\n                            WE GROW:\n                        </h5>\n\n                        <p>\n                            <i class=\"fa fa-angle-right\"></i> Cucumbers <br>\n                            <i class=\"fa fa-angle-right\"></i> Tomatoes <br>\n                            <i class=\"fa fa-angle-right\"></i> Pepper <br>\n                            <i class=\"fa fa-angle-right\"></i> Carrot\n                        </p>\n                    </div>\n                </div>\n\n                <div class=\"col-lg-6 col-xl-6 col-md-6\">\n                    <div class=\"about_content\">\n\n                        <h5 class=\"card-title mb-3\">\n                            WE SELL TO:\n                        </h5>\n\n                        <p>\n                            <i class=\"fa fa-angle-right\"></i> Shops <br>\n                            <i class=\"fa fa-angle-right\"></i> Restaurants <br>\n                            <i class=\"fa fa-angle-right\"></i> Hotels <br>\n                            <i class=\"fa fa-angle-right\"></i> Institutions <br>\n                            <i class=\"fa fa-angle-right\"></i> Individuals\n                        </p>\n                    </div>\n                </div>\n            </div>\n\n\n        </div>\n    </section>\n');

/*Table structure for table `taymac_fp` */

DROP TABLE IF EXISTS `taymac_fp`;

CREATE TABLE `taymac_fp` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `fp_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `property_status` varchar(250) DEFAULT NULL,
  `property_type` varchar(255) DEFAULT NULL,
  `property_location` varchar(255) DEFAULT NULL,
  `imageid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_fp` */

insert  into `taymac_fp`(`id`,`fp_description`,`property_status`,`property_type`,`property_location`,`imageid`) values (4,'Ready-to-go workspaces with the widest possible range of complementary support services available on demand, Taymac offices give you all you need to start work immediately and offer an efficient alternative to traditional office spaces.','For Rent','Office Space','Airport, Accra - Ghana','757120200606'),(5,'Mix of town houses and apartments','For Rent','Town Houses and Apartments','Accra - Ghana','27120200606'),(6,'5 Bedroom Delux Apartment','For Rent','Apartments','East Legon, Accra - Ghana','474320200606');

/*Table structure for table `taymac_health` */

DROP TABLE IF EXISTS `taymac_health`;

CREATE TABLE `taymac_health` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `health_text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_health` */

insert  into `taymac_health`(`id`,`health_text`) values (1,' <div class=\"row\">\n\n                <div class=\"col-md-12 col-lg-12\">\n                    <div class=\"row\">\n                        <div class=\"col-md-4 col-lg-4\">\n                            <div class=\"feat_property home7 style4\">\n                                <div class=\"thumb\">\n                                    <div class=\"fp_single_item_slider\">\n                                        <div class=\"item\">\n                                            <img class=\"img-whp\" src=\"assets/images/background/52.jpg\" alt=\"Img\" width=\"220\" height=\"220\">\n                                        </div>\n                                        <div class=\"item\">\n                                            <img class=\"img-whp\" src=\"assets/images/background/55.jpg\" alt=\"Img\" width=\"220\" height=\"220\">\n                                        </div>\n                                    </div>\n                                    <div class=\"thmb_cntnt style3\">\n                                        <a class=\"fp_price\" href=\"#\"><small>Hover</small></a>\n                                    </div>\n                                </div>\n                                <div class=\"details\">\n                                    <div class=\"tc_content\">\n                                        <p class=\"text-thm\">Consulting Services</p>\n                                        <h4>(Risk Management)</h4>\n                                    </div>\n                                    <div class=\"fp_footer\">\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Accident Investigation</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Developing OF Safety Policies And Procedures</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Developing &amp; Implementation Of Safety Management Plan(s)</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Developing And Reviewing Of Management Systems</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Health And Safety Management System <br>OSHAS - 18001</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Environmental Management System <br>ISO - 14001</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Quality Management System <br>ISO - 9001</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Full Face Mask Fiy Testing Services</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Fire Risk Assessment</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>HSE Inspections And Audits</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>HSE Management Services</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>RISK Assessments</small>\n                                        <hr>\n                                        <a href=\"#\">\n                                            <div class=\"fp_pdate float-right text-thm\">\n                                                View All Services <i class=\"fa fa-angle-right\"></i>\n                                            </div>\n                                        </a>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                        <div class=\"col-md-4 col-lg-4\">\n                            <div class=\"feat_property home7 style4\">\n                                <div class=\"thumb\">\n                                    <div class=\"fp_single_item_slider\">\n                                        <div class=\"item\">\n                                            <img class=\"img-whp\" src=\"assets/images/background/23.jpg\" alt=\"Img\" width=\"220\" height=\"220\">\n                                        </div>\n                                        <div class=\"item\">\n                                            <img class=\"img-whp\" src=\"assets/images/background/55.jpg\" alt=\"Img\" width=\"220\" height=\"220\">\n                                        </div>\n                                    </div>\n                                    <div class=\"thmb_cntnt style3\">\n                                        <a class=\"fp_price\" href=\"#\"><small>Hover</small></a>\n                                    </div>\n                                </div>\n                                <div class=\"details\">\n                                    <div class=\"tc_content\">\n                                        <p class=\"text-thm\">Industrial Health Safety And Environmental Management</p>\n                                        <h4>(Training)</h4>\n                                    </div>\n                                    <div class=\"fp_footer\">\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Industrial Health And Safety Courses</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Compressed Gases</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Confined Space</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Cranes And Slings</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Electrical Safety</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Environmental Awareness</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Fall Protection</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Hazard Communication</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Hazworper (Hazardous Waste Operations And Emergency Response</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Hearing Conservation</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Introduction To Health And Saftey at Work</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Job Hazard Analysis</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Lock Out Tag Out</small>\n                                        <hr>\n                                        <a href=\"#\">\n                                            <div class=\"fp_pdate float-right text-thm\">\n                                                View All Services <i class=\"fa fa-angle-right\"></i>\n                                            </div>\n                                        </a>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                        <div class=\"col-md-4 col-lg-4\">\n                            <div class=\"feat_property home7 style4\">\n                                <div class=\"thumb\">\n                                    <div class=\"fp_single_item_slider\">\n                                        <div class=\"item\">\n                                            <img class=\"img-whp\" src=\"assets/images/background/21.jpg\" alt=\"Img\" width=\"220\" height=\"220\">\n                                        </div>\n                                        <div class=\"item\">\n                                            <img class=\"img-whp\" src=\"assets/images/background/53.jpg\" alt=\"Img\" width=\"220\" height=\"220\">\n                                        </div>\n                                    </div>\n                                    <div class=\"thmb_cntnt style3\">\n                                        <a class=\"fp_price\" href=\"#\"><small>Hover</small></a>\n                                    </div>\n                                </div>\n                                <div class=\"details\">\n                                    <div class=\"tc_content\">\n                                        <p class=\"text-thm\">Risk Assessment</p>\n                                        <h4>(Courses)</h4>\n                                    </div>\n                                    <div class=\"fp_footer\">\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Accident And Incident Investigation</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>DSE Assessment (Display Screen Equipment)</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Ergonomics</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Hazard Identification And Risk Assessment</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Noise Assessment</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Process Safety Management</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Respiratory Protection</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Vibration Assessment</small>\n                                        <hr>\n\n                                        <h6 class=\"card-title mt-4\">Fire And Risk Management</h6>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Emergency Prepared And Response</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Fire Safety Awareness / Risk Assessment</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Hot Works</small>\n                                        <hr>\n\n                                        <h6 class=\"card-title mt-4\">Driving Safety</h6>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Defensive Driver Training And 4WD Off-Road</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Forklift Safety</small>\n                                        <hr>\n\n                                        <div class=\"fp_pdate float-right text-thm\">View All Services <i class=\"fa fa-angle-right\"></i></div>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                        <div class=\"col-md-4 col-lg-4\">\n                            <div class=\"feat_property home7 style4\">\n                                <div class=\"thumb\">\n                                    <div class=\"fp_single_item_slider\">\n                                        <div class=\"item\">\n                                            <img class=\"img-whp\" src=\"assets/images/background/50.jpg\" alt=\"Img\" width=\"220\" height=\"220\">\n                                        </div>\n                                        <div class=\"item\">\n                                            <img class=\"img-whp\" src=\"assets/images/background/52.jpg\" alt=\"Img\" width=\"220\" height=\"220\">\n                                        </div>\n                                    </div>\n                                    <div class=\"thmb_cntnt style3\">\n                                        <a class=\"fp_price\" href=\"#\"><small>Hover</small></a>\n                                    </div>\n                                </div>\n                                <div class=\"details\">\n                                    <div class=\"tc_content\">\n                                        <p class=\"text-thm\">First Aid</p>\n                                    </div>\n                                    <div class=\"fp_footer\">\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Everyday Basic First Aid Awareness</small>\n                                        <hr>\n                                        <div class=\"fp_pdate float-right text-thm\">View All Services <i class=\"fa fa-angle-right\"></i></div>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                        <div class=\"col-md-4 col-lg-4\">\n                            <div class=\"feat_property home7 style4\">\n                                <div class=\"thumb\">\n                                    <div class=\"fp_single_item_slider\">\n                                        <div class=\"item\">\n                                            <img class=\"img-whp\" src=\"assets/images/background/51.jpg\" alt=\"Img\" width=\"220\" height=\"220\">\n                                        </div>\n                                        <div class=\"item\">\n                                            <img class=\"img-whp\" src=\"assets/images/background/56.png\" alt=\"Img\" width=\"220\" height=\"220\">\n                                        </div>\n                                    </div>\n                                    <div class=\"thmb_cntnt style3\">\n                                        <a class=\"fp_price\" href=\"#\"><small>Hover</small></a>\n                                    </div>\n                                </div>\n                                <div class=\"details\">\n                                    <div class=\"tc_content\">\n                                        <p class=\"text-thm\">Manual Handling</p>\n                                    </div>\n                                    <div class=\"fp_footer\">\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Manual Handling Training</small>\n                                        <hr>\n                                        <a href=\"#\">\n                                            <div class=\"fp_pdate float-right text-thm\">\n                                                View All Services <i class=\"fa fa-angle-right\"></i>\n                                            </div>\n                                        </a>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                        <div class=\"col-md-4 col-lg-4\">\n                            <div class=\"feat_property home7 style4\">\n                                <div class=\"thumb\">\n                                    <div class=\"fp_single_item_slider\">\n                                        <div class=\"item\">\n                                            <img class=\"img-whp\" src=\"assets/images/background/52.jpg\" alt=\"Img\" width=\"220\" height=\"220\">\n                                        </div>\n                                        <div class=\"item\">\n                                            <img class=\"img-whp\" src=\"assets/images/background/51.jpg\" alt=\"Img\" width=\"220\" height=\"220\">\n                                        </div>\n                                    </div>\n                                    <div class=\"thmb_cntnt style3\">\n                                        <a class=\"fp_price\" href=\"#\"><small>Hover</small></a>\n                                    </div>\n                                </div>\n                                <div class=\"details\">\n                                    <div class=\"tc_content\">\n                                        <p class=\"text-thm\">COSHH</p>\n                                        <h4>(Control Of Substances Hazardous To Health)</h4>\n                                    </div>\n                                    <div class=\"fp_footer\">\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>COSHH Management</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Suppliers Of Personal Protective Equipment</small>\n                                        <hr>\n                                        <i class=\"fa fa-check-square-o\"></i>\n                                        <small>Suppliers Of Staff Uniforms, Coveralls, Overalls, etc</small>\n                                        <hr>\n                                        <a href=\"#\">\n                                            <div class=\"fp_pdate float-right text-thm\">\n                                                View All Services <i class=\"fa fa-angle-right\"></i>\n                                            </div>\n                                        </a>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n            </div>');

/*Table structure for table `taymac_image_blog` */

DROP TABLE IF EXISTS `taymac_image_blog`;

CREATE TABLE `taymac_image_blog` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) DEFAULT NULL,
  `image_location` varchar(255) DEFAULT NULL,
  `image_size` varchar(255) DEFAULT NULL,
  `image_type` varchar(255) DEFAULT NULL,
  `dateuploaded` datetime DEFAULT NULL,
  `imageid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `taymac_image_blog` */

insert  into `taymac_image_blog`(`id`,`image_name`,`image_location`,`image_size`,`image_type`,`dateuploaded`,`imageid`) values (3,'18 - Copy.jpg','uploads/blog/2020060723660.jpg','1579701','image/jpeg','2020-06-07 19:32:47','617720200607'),(4,'22.jpeg','uploads/blog/2020060845786.jpeg','146649','image/jpeg','2020-06-08 06:57:25','77720200608');

/*Table structure for table `taymac_image_fp` */

DROP TABLE IF EXISTS `taymac_image_fp`;

CREATE TABLE `taymac_image_fp` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) DEFAULT NULL,
  `image_location` varchar(255) DEFAULT NULL,
  `image_size` varchar(255) DEFAULT NULL,
  `image_type` varchar(255) DEFAULT NULL,
  `dateuploaded` datetime DEFAULT NULL,
  `imageid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `taymac_image_fp` */

insert  into `taymac_image_fp`(`id`,`image_name`,`image_location`,`image_size`,`image_type`,`dateuploaded`,`imageid`) values (3,'37.jpg','uploads/fp/2020060674925.jpg','149984','image/jpeg','2020-06-06 15:48:27','757120200606'),(4,'25.jpeg','uploads/fp/2020060662025.jpeg','149714','image/jpeg','2020-06-06 16:20:55','27120200606'),(5,'3.jpg','uploads/fp/2020060661744.jpg','0','','2020-06-06 16:21:24','474320200606');

/*Table structure for table `taymac_image_install` */

DROP TABLE IF EXISTS `taymac_image_install`;

CREATE TABLE `taymac_image_install` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) DEFAULT NULL,
  `image_location` varchar(255) DEFAULT NULL,
  `image_size` varchar(255) DEFAULT NULL,
  `image_type` varchar(255) DEFAULT NULL,
  `dateuploaded` datetime DEFAULT NULL,
  `imageid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `taymac_image_install` */

insert  into `taymac_image_install`(`id`,`image_name`,`image_location`,`image_size`,`image_type`,`dateuploaded`,`imageid`) values (12,'34.jpg','uploads/installations/2020060622771.jpg','143506','image/jpeg','2020-06-06 14:08:45','641120200606'),(13,'33.jpg','uploads/installations/2020060665524.jpg','140041','image/jpeg','2020-06-06 14:08:46','641120200606'),(14,'37.jpg','uploads/installations/2020060691152.jpg','149984','image/jpeg','2020-06-06 14:08:46','641120200606'),(15,'36.jpg','uploads/installations/2020060658079.jpg','160677','image/jpeg','2020-06-06 14:08:46','641120200606'),(16,'35.jpg','uploads/installations/2020060667943.jpg','166238','image/jpeg','2020-06-06 14:08:46','641120200606'),(17,'32.jpg','uploads/installations/2020060677321.jpg','297001','image/jpeg','2020-06-06 14:08:46','641120200606'),(18,'38.jpg','uploads/installations/2020060665351.jpg','188601','image/jpeg','2020-06-06 14:08:46','641120200606');

/*Table structure for table `taymac_image_property` */

DROP TABLE IF EXISTS `taymac_image_property`;

CREATE TABLE `taymac_image_property` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) DEFAULT NULL,
  `image_location` varchar(255) DEFAULT NULL,
  `image_size` varchar(255) DEFAULT NULL,
  `image_type` varchar(255) DEFAULT NULL,
  `dateuploaded` datetime DEFAULT NULL,
  `imageid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `taymac_image_property` */

insert  into `taymac_image_property`(`id`,`image_name`,`image_location`,`image_size`,`image_type`,`dateuploaded`,`imageid`) values (4,'37.jpg','uploads/property/2020060782704.jpg','149984','image/jpeg','2020-06-07 11:38:29','279420200607'),(5,'22.jpeg','uploads/property/202006079604.jpeg','146649','image/jpeg','2020-06-07 11:39:35','573420200607'),(6,'5.jpg','uploads/property/2020060767827.jpg','146649','image/jpeg','2020-06-07 11:43:12','69220200607'),(7,'18.jpg','uploads/property/2020060719457.jpg','2051383','image/jpeg','2020-06-07 11:49:14','656720200607'),(8,'26.jpeg','uploads/property/2020060772146.jpeg','99398','image/jpeg','2020-06-07 11:50:25','428720200607'),(9,'27.jpeg','uploads/property/2020060763724.jpeg','69290','image/jpeg','2020-06-07 11:51:02','317220200607'),(10,'41.jpg','uploads/property/2020060772190.jpg','145660','image/jpeg','2020-06-07 11:51:40','449820200607'),(11,'40.jpg','uploads/property/2020060771233.jpg','148939','image/jpeg','2020-06-07 11:52:30','272920200607'),(12,'38.jpg','uploads/property/2020060770796.jpg','188601','image/jpeg','2020-06-07 11:53:30','501020200607'),(13,'39.jpg','uploads/property/2020060764812.jpg','158666','image/jpeg','2020-06-07 11:56:46','291020200607');

/*Table structure for table `taymac_image_slider` */

DROP TABLE IF EXISTS `taymac_image_slider`;

CREATE TABLE `taymac_image_slider` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) DEFAULT NULL,
  `image_location` varchar(255) DEFAULT NULL,
  `image_size` varchar(255) DEFAULT NULL,
  `image_type` varchar(255) DEFAULT NULL,
  `dateuploaded` datetime DEFAULT NULL,
  `imageid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `taymac_image_slider` */

insert  into `taymac_image_slider`(`id`,`image_name`,`image_location`,`image_size`,`image_type`,`dateuploaded`,`imageid`) values (1,'WhatsApp Image 2020-05-29 at 06.17.25.jpeg','uploads/slider/2020060475074.jpeg','294252','image/jpeg','2020-06-04 20:06:50','616320200604'),(2,'WhatsApp Image 2019-11-02 at 11.29.27 AM.jpeg','uploads/slider/2020060434414.jpeg','127100','image/jpeg','2020-06-04 20:07:51','383920200604'),(10,'22.jpeg','uploads/slider/2020060671025.jpeg','146649','image/jpeg','2020-06-06 07:43:55','251220200606'),(11,'37.jpg','uploads/slider/2020060614254.jpg','149984','image/jpeg','2020-06-06 11:23:36','486620200606'),(14,'5.jpg','uploads/slider/2020060681545.jpg','349984','image/jpeg','2020-06-06 14:04:49','380520200606');

/*Table structure for table `taymac_logs_mis` */

DROP TABLE IF EXISTS `taymac_logs_mis`;

CREATE TABLE `taymac_logs_mis` (
  `logid` int(111) NOT NULL AUTO_INCREMENT,
  `message` text,
  `userid` int(11) DEFAULT NULL,
  `applicantid` varchar(256) DEFAULT NULL,
  `logdate` datetime DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `mac_address` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `taymac_logs_mis` */

insert  into `taymac_logs_mis`(`logid`,`message`,`userid`,`applicantid`,`logdate`,`action`,`mac_address`,`ip_address`,`username`) values (1,'Logged in Successfully',NULL,NULL,'2020-06-04 08:37:54','Successful','Host Name . . . .','::1','ikosafo'),(2,'Logged in Successfully',NULL,NULL,'2020-06-06 06:34:16','Successful','Host Name . . . .','::1','ikosafo'),(3,'Log In Error (Wrong Username or Password)',NULL,NULL,'2020-06-11 04:39:43','Failed','Host Name . . . .','::1','adas'),(4,'Logged in Successfully',NULL,NULL,'2020-06-11 04:39:54','Successful','Host Name . . . .','::1','ikosafo'),(5,'Logged in Successfully',NULL,NULL,'2020-06-11 12:02:14','Successful','Host Name . . . .','::1','ikosafo'),(6,'Logged in Successfully',NULL,NULL,'2020-06-12 14:14:03','Successful','Host Name . . . .','::1','taymac'),(7,'Log In Error (Wrong Username or Password)',NULL,NULL,'2020-06-12 14:15:36','Failed','Host Name . . . .','::1','ikosafo'),(8,'Logged in Successfully',NULL,NULL,'2020-06-12 14:15:44','Successful','Host Name . . . .','::1','taymac'),(9,'Logged in Successfully',NULL,NULL,'2020-06-12 14:19:22','Successful','Host Name . . . .','::1','test'),(10,'Logged in Successfully',NULL,NULL,'2020-06-12 14:20:48','Successful','Host Name . . . .','::1','taymac'),(11,'Logged in Successfully',NULL,NULL,'2020-06-12 14:49:19','Successful','Host Name . . . .','::1','taymac'),(12,'Log In Error (Wrong Username or Password)',NULL,NULL,'2020-06-12 14:49:27','Failed','Host Name . . . .','::1','taymac'),(13,'Log In Error (Wrong Username or Password)',NULL,NULL,'2020-06-12 14:49:32','Failed','Host Name . . . .','::1','taymac'),(14,'Logged in Successfully',NULL,NULL,'2020-06-12 14:49:36','Successful','Host Name . . . .','::1','taymac');

/*Table structure for table `taymac_message` */

DROP TABLE IF EXISTS `taymac_message`;

CREATE TABLE `taymac_message` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `formname` varchar(255) DEFAULT NULL,
  `formemail` varchar(255) DEFAULT NULL,
  `formphone` varchar(255) DEFAULT NULL,
  `formsubject` varchar(255) DEFAULT NULL,
  `formmessage` varchar(255) DEFAULT NULL,
  `periodsent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_message` */

insert  into `taymac_message`(`id`,`formname`,`formemail`,`formphone`,`formsubject`,`formmessage`,`periodsent`) values (2,'Isaac Osafo','ikosafo@gmail.com','0205737464','Enquiry','I want to make an enquiry','2020-06-07 17:11:50');

/*Table structure for table `taymac_mis_users` */

DROP TABLE IF EXISTS `taymac_mis_users`;

CREATE TABLE `taymac_mis_users` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(256) DEFAULT NULL,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `user_id` varchar(256) DEFAULT NULL,
  `approval` varchar(256) DEFAULT NULL,
  `see` int(12) DEFAULT '1',
  `usertype` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `taymac_mis_users` */

insert  into `taymac_mis_users`(`id`,`full_name`,`username`,`password`,`user_id`,`approval`,`see`,`usertype`) values (1,'Mr Mawusi Kpakpah','taymac','25d55ad283aa400af464c76d713c07ad','893920200612',NULL,1,'Admin'),(2,'Isaac Osafo','ikosafo','e10adc3949ba59abbe56e057f20f883e','315920200612',NULL,0,'Admin'),(3,'Test','test','e10adc3949ba59abbe56e057f20f883e','242320200612',NULL,1,'Normal'),(6,'Ike Levels','levels','25d55ad283aa400af464c76d713c07ad','31472020','Super Admin',0,NULL);

/*Table structure for table `taymac_pm` */

DROP TABLE IF EXISTS `taymac_pm`;

CREATE TABLE `taymac_pm` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `pm_text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_pm` */

insert  into `taymac_pm`(`id`,`pm_text`) values (1,'<h5 class=\"card-title mb-3\">\n                            PROJECT METHODOLOGY:\n                        </h5>\n                        <p>We employ the best materials available for all our jobs depending on our clients unique\n                            needs prior to Project commencement.\n                        </p>\n                        <p>\n                            We normally where applicable, using the floor plan(s) prepare Autocad drawing(s) /\n                            presentation(s) of final project deliverable(s) and for client\'s review prior to\n                            signing-off for project commencement\n                        </p>\n                        <p>\n                            <i class=\"fa fa-angle-right\"></i> We will then undertake a set-out on the Project\n                            site for our clients final approval prior to project commencement <br>\n                            <i class=\"fa fa-angle-right\"></i> Relevant equipment will be moved to site and work\n                            carried out with due regard to other users of the building <br>\n                            <i class=\"fa fa-angle-right\"></i> This may involve us working after working hours\n                            and or over weekends depending on our clients needs <br>\n                            <i class=\"fa fa-angle-right\"></i> Final project handover is done on\n                            satisfactory approval  / acceptance by client\n                        </p>');

/*Table structure for table `taymac_ppclient` */

DROP TABLE IF EXISTS `taymac_ppclient`;

CREATE TABLE `taymac_ppclient` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_ppclient` */

insert  into `taymac_ppclient`(`id`,`client_name`) values (6,'Cnergyasdas Ghana Limited'),(7,'China Pipeline Petroleum, Ghana Office'),(8,'Amec Foster Wheeler Ghana Office'),(9,'Colgate Palmolive Ghana Limited'),(10,'Novartis Pharma A.G.'),(11,'Best Point Saving and Loans Company Limited'),(12,'Best Assurance Company Limited'),(13,'Best Pensions Limited'),(14,'Louis Dreyfus Commodities - West Africa Office'),(15,'Special Investment Company Limited');

/*Table structure for table `taymac_property` */

DROP TABLE IF EXISTS `taymac_property`;

CREATE TABLE `taymac_property` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `property_status` varchar(250) DEFAULT NULL,
  `property_type` varchar(255) DEFAULT NULL,
  `property_location` varchar(255) DEFAULT NULL,
  `imageid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_property` */

insert  into `taymac_property`(`id`,`property_status`,`property_type`,`property_location`,`imageid`) values (6,'For Rent','Town Houses and Apartments','Accra - Ghana','573420200607'),(5,'For Rent','Office Space','Airport, Accra - Ghana','279420200607'),(7,'For Rent','Apartments','East Legon, Accra - Ghana','69220200607'),(8,'For Rent','Offices','Accra - Ghana','656720200607'),(9,'For Rent','Offices','Accra - Ghana','428720200607'),(10,'For Rent','Offices','Accra - Ghana','317220200607'),(11,'For Rent','Offices','Accra - Ghana','449820200607'),(12,'For Rent','Offices','Accra - Ghana','272920200607'),(13,'For Rent','Offices','Accra - Ghana','501020200607'),(14,'For Rent','Offices','Accra - Ghana','291020200607');

/*Table structure for table `taymac_realtor` */

DROP TABLE IF EXISTS `taymac_realtor`;

CREATE TABLE `taymac_realtor` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `realtor_text` varchar(255) DEFAULT NULL,
  `flat_icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_realtor` */

insert  into `taymac_realtor`(`id`,`realtor_text`,`flat_icon`) values (3,'No hidden fees','flaticon-money-bag'),(4,'Property Appraisal','flaticon-high-five'),(5,'Large Coverage','flaticon-maps-and-flags');

/*Table structure for table `taymac_service` */

DROP TABLE IF EXISTS `taymac_service`;

CREATE TABLE `taymac_service` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `service_name` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_service` */

insert  into `taymac_service`(`id`,`service_name`) values (3,'<p class=\"text-thm\">Consulting Services</p>\n<h4>(Risk Management)</h4>'),(4,'<p class=\"text-thm\">Industrial Health Safety And Environmental Management</p>\n                                        <h4>(Training)</h4>'),(5,'<p class=\"text-thm\">Risk Assessment</p>\n                                        <h4>(Courses)</h4>'),(6,'<p class=\"text-thm\">First Aid</p>\n                                       '),(7,'<p class=\"text-thm\">Manual Handling</p>'),(8,'<p class=\"text-thm\">COSHH</p>\n<h4>(Control Of Substances Hazardous To Health)</h4>');

/*Table structure for table `taymac_slider` */

DROP TABLE IF EXISTS `taymac_slider`;

CREATE TABLE `taymac_slider` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `header_text` varchar(255) DEFAULT NULL,
  `slider_text` longtext,
  `property_status` varchar(250) DEFAULT NULL,
  `property_type` varchar(255) DEFAULT NULL,
  `property_location` varchar(255) DEFAULT NULL,
  `imageid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_slider` */

insert  into `taymac_slider`(`id`,`header_text`,`slider_text`,`property_status`,`property_type`,`property_location`,`imageid`) values (8,'Welcome to Taymac','<p class=\"parag\">\nWe care about protecting the environment and people, while keeping every work place safe and productive <br>\nWe strive to share our commitment and enthusiasm with those around us\n  </p>','For Rent','Town Houses and Apartments','Accra - Ghana','251220200606'),(9,'Welcome to Taymac','<p class=\"parag\">\nWe have a ‘CAN DO’ approach to whatever challenges are thrown at us.  <br>\nWe are constantly looking for ways to improve ourselves and systems.\r\n</p>','For Rent','Office Space','Airport, Accra - Ghana','486620200606'),(12,'Welcome to Taymac','<p class=\"parag\">\nREALTORS YOU CAN TRUST <br>\nPass by our office <br>\nMon - Thur : 9am - 6pm\n</p>','For Rent','Apartment','East Legon, Accra - Ghana','380520200606');

/*Table structure for table `taymac_story` */

DROP TABLE IF EXISTS `taymac_story`;

CREATE TABLE `taymac_story` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `story_text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_story` */

insert  into `taymac_story`(`id`,`story_text`) values (1,' <div class=\"col-lg-8 col-xl-7\">\n                    <div class=\"about_content\">\n\n                        <p>\n                            <i class=\"fa fa-angle-right\"></i>  We care about protecting the environment and people, while\n                            keeping every work place safe and productive.\n                        </p>\n                        <p>\n                            <i class=\"fa fa-angle-right\"></i>  We strive to share our commitment and enthusiasm with those around us.\n                        </p>\n                        <p>\n                            <i class=\"fa fa-angle-right\"></i>  We have a \'CAN DO\' approach to whatever challenges are thrown at us.\n                        </p>\n                        <p>\n                            <i class=\"fa fa-angle-right\"></i>  We are constantly looking for ways to improve ourselves and systems.\n                        </p>\n\n                    </div>\n                </div>\n                <div class=\"col-lg-4 col-xl-5\">\n                    <div class=\"about_thumb\">\n                        <img class=\"img-fluid w40\" src=\"assets/images/about/1.jpg\" alt=\"1.jpg\" style=\"width: 70% !important;\">\n                        <!-- <a class=\"popup-iframe popup-youtube color-white\" href=\"https://www.youtube.com/watch?v=R7xbhKIiw4Y\">\n                             <i class=\"flaticon-play\"></i></a>-->\n                    </div>\n                </div>');

/*Table structure for table `taymac_team` */

DROP TABLE IF EXISTS `taymac_team`;

CREATE TABLE `taymac_team` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(255) DEFAULT NULL,
  `member_position` varchar(255) DEFAULT NULL,
  `member_mobile` varchar(255) DEFAULT NULL,
  `member_email` varchar(255) DEFAULT NULL,
  `member_description` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `taymac_team` */

insert  into `taymac_team`(`id`,`member_name`,`member_position`,`member_mobile`,`member_email`,`member_description`) values (4,'MR. JOSHUA M.K. KPAKPAH (Jnr.)','Director','+233 (0) 266-107-130','info@taymac.net',' <p>\n                                            Mr. Kpakpah holds a BA degree in Geography and Resource Development, a trained and licensed Customs house\n                                            agent, a trained Project Management Professional awaiting certification and licensing. He holds the\n                                            NEBOSH International General Certificate in Safety and Health. He is a registered IOSH approved trainer\n                                            which licenses him to deliver the Managing Safely Courses worldwide. Joshua is currently training as Lead\n                                            Auditor, OHSAS 18001 and ISO 14001.\n                                        </p>\n                                        <p>\n                                            He has over 17 years of work experience. Four years of which have been in logistics handling, port clearing,\n                                            warehousing and supply chain management on behalf of a multinational company in Ghana. He also spent 6 years\n                                            as a Local Operations and Safety Manager for Independent Commodity Supplies Limited, a United Kingdom based\n                                            firm, in this role, Joshua was responsible for the local operations of the Company, from material sourcing,\n                                            haulage of supplies including hazardous cargo, warehousing, safety and stock control.\n                                        </p>\n                                        <p>\n                                            Joshua is also currently a Director for a salt work in Ghana and HSE Tutor noted for his stimulating, direct\n                                            and interactive training sessions. Joshua\'s passion is seeing organizations take preventative rather reactionary\n                                            decisions to safety, which he believes will enhance business performance and also ensure a safe working\n                                            environment. He currently runs Taymac Consulting Limited with his local and international partners.\n                                        </p>'),(5,'MR. MAXMILLAN KOFI MADDY','Consultant','00447860271867','info@taymac.net','<p>\n                                            Maxmillan Kofi Maddy is a Technician Safety and Health Practitioner holding the NEBOSH Construction\n                                            and Risk Management Certificate.\n                                        </p>\n                                        <p>\n                                            He also holds other Specialist qualifications; Risk Assessor, COSHH (Control of Substances Hazardous to health)\n                                            Assessor and City and Guilds Train the Trainer.\n                                        </p>\n                                        <p>\n                                            He has 10 years experience in the H&amp;S Industry; 6 years working as a Health and Safety Systems Owner for\n                                            a multi-national manufacturing company that deals in pharmaceuticals and well being products (Boots Alliance Plc)\n                                            and 4 years within Local Government as a Health and Safety Advisor. During this period, Max has gained a\n                                            significant amount of experience including; Workplace &amp; Manual handling Risk Assessments, Interpreting relevant\n                                            legislations, Accident Investigations, Coaching and Assessing Staff against Standard Operating Procedures,\n                                            Implementation and Maintenance of H&amp;S Management (OHSAS 18001), Developing and reviewing Safety policies,\n                                            Internal Auditing and general H&amp;S Training. He is an IOSH approved trainer delivering the Managing Safely\n                                            Course and also holds a NEBOSH Dilpoma in Occupational Safety and Health.\n                                        </p>\n                                        <p>\n                                            Max\'s attitude towards Safety is second to none. He thrives in seeing people working in a safe and productive\n                                            Environment. Max was the Health Safety Advisor for the Nottinghamshire Council in the United Kingdom between\n                                            2012 - 2015. He is currently the Senior HSSE Advisor for S&amp;T (UK) a global player in the construction industry\n                                            in the United Kingdom.\n                                        </p>'),(6,'MR. JACOB AGGREY-ODOOM','Consultant','+233 (0) 244 341 951','info@taymac.net',' <p>\n                                            Jacob is a trained Safety Engineer with a Post Graduate Certificate in Health Sciences, Occupational, Safety,\n                                            Health &amp; Environment from the University of Ghana, Legon and holds a degree in Mining Engineering from\n                                            University of Mines and Technology, Tarkwa. He has an additional Diploma in Safety Management (DipSM)\n                                            from the highly recognized British Safety Council, a certified Fire Safety Engineer and a Certified First\n                                            Aid Instructor (St. Johns Ambulance Brigade).\n                                        </p>\n                                        <p>\n                                            He has attended quite a number of safety courses including the National Occupational Health &amp; Policy Development\n                                            Course from the World Safety Organization, Safety Management Training Course (SAMTRAC) with the NOSA Head Office\n                                            in Pretoria South Africa. He is a certified lead Auditor for Occupational Health &amp; Safety and Environmental\n                                            Management Systems (OHSAS 18001 &amp; ISO 14001) from SGS United Kingdom and ISO 9001 Auditors Course (BVQI) South\n                                            Africa. Others include the International Safety, Security &amp; Health Congress in Dusseldorf, Germany, Goldfields\n                                            Exploration Group HSE Summit in Perth, Australia and Denver Colorado, USA. He has also attended the Beyond\n                                            Compliance Training Course in Sydney Australia with practical hands on training.\n                                        </p>\n                                        <p>\n                                            He has also attended and presented a paper at the National Occupational Injury Research Symposium NATIONAL OCCUPATIONAL\n                                            INJURY RESEARCH SYMPOSIUM HELD AT MORGANTOWN, WEST VIRGINIA FROM 18TH TO 20TH OCTOBER 2011. With over 15 years of both\n                                            hands on practical and theoretical experience, Jacob started his career at Ashanti Goldfields Limited as the Safety\n                                            Engineer for the Open Pit operations between 1995 and 1998. In 2000, while still with West African Drilling Services\n                                            he was assigned the position of Safety Coordinator for Guinea and Mali operations and later Tanzanian operations and\n                                            entire West Africa operations of the company. In the year 2003 and 2004 he was appointed the Safety, Health and\n                                            Environmental Manager for Interbeton Bv Ghana, which undertook the Quay 2 Extension Project at the port of Tema.\n                                        </p>\n                                        <p>\n                                            He left Interbeton Bv Ghana and joined Liebherr Mining Ghana as the Safety, Health &amp; Environmental Coordinator and at the same\n                                            time Sandvik Mining &amp; Construction Ghana limited as the Safety, Health &amp; Environmental Advisor. After a period of seven years,\n                                            in 2007 he came back to Interbeton Bv as the Health, Safety and Environmental Coordinator.\n                                        </p>\n                                        <p>\n                                            Jacob was later appointed as the Group Health &amp; Safety Manager for Guinness Ghana Breweries Limited for a period of about 12 months.\n                                            He is involved in an International Safety consulting company called Taymac Safety Consulting Limited with his foreign partners.\n                                            After an additional 6 years in the mining industry as the Regional Group Health and Safety Manager for Goldfields Exploration,\n                                            Jacob was the Quality, Health, Safety and Environmental Manager for Africa - South Eastern Europe for Aggreko International Power\n                                            Projects between 2014 - early part of 2016. He is currently the HSE Manager for Cements del\' Afrique Ghana Limited.\n                                        </p>');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `is_deleted` tinyint(5) DEFAULT '0',
  `is_admin` tinyint(5) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(255) DEFAULT NULL,
  `accesslevel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email_UNIQUE` (`email`) USING BTREE,
  UNIQUE KEY `id_UNIQUE` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`company`,`is_deleted`,`is_admin`,`created_at`,`updated_at`,`username`,`accesslevel`) values (1,'admin','info@ahpc.org','e10adc3949ba59abbe56e057f20f883e','AHPC',0,0,'2018-10-26 10:42:24','2018-10-26 10:42:24','admin','Super Admin'),(2,'main admin','admin@ahpc.org','e10adc3949ba59abbe56e057f20f883e','AHPC',0,1,'2018-10-26 11:01:43','2018-10-26 11:01:43','main',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
