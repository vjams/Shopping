
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+08:00";


CREATE DATABASE ShoppingCart;


USE ShoppingCart;


SET FOREIGN_KEY_CHECKS=0;


CREATE TABLE `Register_User` (

  `ExistedUser_ID` int(2) NOT NULL,

  `LastName` varchar(9) DEFAULT NULL,

  `FirstName` varchar(11) DEFAULT NULL,

  `Existed_UserName` varchar(50) DEFAULT NULL,

  `password` bigint(10) DEFAULT NULL,

  `Shipping_Address` varchar(100) DEFAULT NULL,
  
  `email` varchar(20) NOT NULL,
  
  `phoneNumber` bigint(12) DEFUALT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


CREATE TABLE `Guest_User` (

  `GuestUser_ID` int(2) NOT NULL,

  `LastName` varchar(9) DEFAULT NULL,

  `FirstName` varchar(11) DEFAULT NULL,

  `Shipping_Address` varchar(100) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


CREATE TABLE `orders` (

  `order_id` int(2) NOT NULL,

  `ExistedUser_id` int(2) DEFAULT NULL,

  `GuestUser_id` int(2) DEFAULT NULL,

  `item_id` int(2) DEFAULT NULL,

  `Total` int(4) DEFAULT NULL,

  `Order_date` datetime DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;



CREATE TABLE `Payment_Guest` (

  `Payment_Guest_ID` int(2) NOT NULL,

  `LastName` varchar(9) DEFAULT NULL,

  `FirstName` varchar(11) DEFAULT NULL,

  `card_number` bigint(16) DEFAULT NULL,

  `valid` tinyint(1) DEFAULT NULL,

  `Expired_Date` varchar(9) DEFAULT NULL,

  `CVV2` int(4) NOT NULL,

  `Billing_Address` varchar(9) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


CREATE TABLE `Payment_Existed` (

  `Payment_Existed_ID` int(2) NOT NULL,

  `LastName` varchar(9) DEFAULT NULL,

  `FirstName` varchar(11) DEFAULT NULL,

  `card_number` bigint(16) DEFAULT NULL,

  `valid` tinyint(1) DEFAULT NULL,

  `Expired_Date` varchar(9) DEFAULT NULL,

  `CVV2` int(4) NOT NULL,

  `Billing_Address` varchar(9) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


CREATE TABLE `items` (

  `item_id` int(2) NOT NULL,

  `Name` varchar(33) DEFAULT NULL,

  `price` varchar(10) DEFAULT NULL,

  `Score` int(3) NOT NULL,

  `Comments` varchar(50) DEFAULT NULL,

  `Stock` int(3) DEFAULT NULL,

  `description` varchar(763) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


CREATE TABLE `Admin` (

  `AdminUser_ID` int(2) NOT NULL,

  `LastName` varchar(9) DEFAULT NULL,

  `FirstName` varchar(11) DEFAULT NULL,

  `Admin_UserName` varchar(11) DEFAULT NULL,

  `password` bigint(10) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


CREATE TABLE `Promo_Code` (

  `Promo_ID` int(2) NOT NULL,

  `Code` varchar(11) DEFAULT NULL,

  `Start_Date` varchar(9) DEFAULT NULL,

  `ExpiredDate` varchar(9) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


ALTER TABLE `Admin`

  ADD PRIMARY KEY (`AdminUser_id`);


ALTER TABLE `Guest_User`

  ADD PRIMARY KEY (`GuestUser_id`);

  

  ALTER TABLE `Register_User`

  ADD PRIMARY KEY (`ExistedUser_id`);

  

  ALTER TABLE `items`

  ADD PRIMARY KEY (`item_id`);

  

  ALTER TABLE `orders`

  ADD PRIMARY KEY (`order_id`);

  

  ALTER TABLE `Payment_Existed`

  ADD PRIMARY KEY (`Payment_Existed_ID`);

  

  ALTER TABLE `Payment_Guest`

  ADD PRIMARY KEY (`Payment_Guest_ID`);

  

  ALTER TABLE `Promo_Code`

  ADD PRIMARY KEY (`Promo_id`);


ALTER TABLE `Register_User`

  MODIFY `ExistedUser_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;


ALTER TABLE `Guest_User`

  MODIFY `GuestUser_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;


ALTER TABLE `orders`

  MODIFY `order_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;


ALTER TABLE `items`

  MODIFY `item_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;


ALTER TABLE `Admin`

  MODIFY `AdminUser_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

  

  ALTER TABLE `Payment_Existed`

  MODIFY `Payment_Existed_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

  

  ALTER TABLE `Payment_Guest`

  MODIFY `Payment_Guest_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

  

  ALTER TABLE `Promo_Code`

  MODIFY `Promo_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;


ALTER TABLE Register_User

ADD FOREIGN KEY (ExistedUser_id) REFERENCES Payment_Existed(Payment_Existed_id);


ALTER TABLE Register_User

ADD FOREIGN KEY (ExistedUser_id) REFERENCES Orders (Order_id);


ALTER TABLE Orders

ADD FOREIGN KEY (order_id) REFERENCES Guest_User (GuestUser_id);


ALTER TABLE Guest_User

ADD FOREIGN KEY (GuestUser_id) REFERENCES Payment_Guest (Payment_Guest_id);


ALTER TABLE orders

ADD FOREIGN KEY (order_id) REFERENCES items (item_id);


ALTER TABLE items

ADD FOREIGN KEY (item_id) REFERENCES Admin (AdminUser_id);


ALTER TABLE Promo_Code

ADD FOREIGN KEY (Promo_id) REFERENCES Admin(AdminUser_id);


INSERT INTO Admin (`AdminUser_id`, `LastName`, `FirstName`,`Admin_UserName`, `password`) VALUES

(1, 'Zhang', 'Xiaolei','zxiaolei','123456'),

(2, 'Vue', 'Jamie','vjamue','123456'),

(3, 'Lynaugh', 'Thomas','lthomas','123456'),

(4, 'Que', 'Qiren','qqiren','123456');
