/*
SQLyog Ultimate v10.42 
MySQL - 5.6.12-log 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `mod_user` (
	`ID` int (11),
	`forgot_code` varchar (675),
	`full_name` varchar (765),
	`email` varchar (675),
	`address` varchar (675),
	`phone` varchar (150),
	`password` varchar (675),
	`sex` varchar (675),
	`birthday` varchar (675),
	`level` varchar (675),
	`permission` text ,
	`about` text ,
	`bookmarks` text ,
	`edu` varchar (765),
	`job` varchar (765),
	`images` varchar (675),
	`website` varchar (675),
	`date_add` datetime ,
	`date_upd` timestamp ,
	`last_connect` datetime 
); 
insert into `mod_user` (`ID`, `forgot_code`, `full_name`, `email`, `address`, `phone`, `password`, `sex`, `birthday`, `level`, `permission`, `about`, `bookmarks`, `edu`, `job`, `images`, `website`, `date_add`, `date_upd`, `last_connect`) values('1','','Quản trị viên','Administrator','52 Thiên Hộ DươngS','01655177653','4c5f86c785947988fd604bf5dbcdf0e2','Nam','2005-11-18','2','','',NULL,'Đại học','','13079-15530-11275-68998_42137911.jpg','http://hdweb.vn','2014-04-13 21:05:37','2014-12-05 20:04:13','2014-12-05 19:37:25');
insert into `mod_user` (`ID`, `forgot_code`, `full_name`, `email`, `address`, `phone`, `password`, `sex`, `birthday`, `level`, `permission`, `about`, `bookmarks`, `edu`, `job`, `images`, `website`, `date_add`, `date_upd`, `last_connect`) values('2','yh3MQZxSdUVeAWqAyViM30GAqiUUZ5GxmKjcJQ5WL0blXBWwwfiAfZbFh6Ag','Hồ Thanh Bình','thanhbinhbk88@gmail.com','12 Go Gấp HCMC','01 655 177 655','1111111','Nam','2011-12-2','0','',NULL,NULL,NULL,NULL,'1374505099-dich-vu-seo-dich-vu-seo.jpg','http://hdweb.vn','0000-00-00 00:00:00','2013-09-26 23:48:48','2013-05-28 23:09:43');
insert into `mod_user` (`ID`, `forgot_code`, `full_name`, `email`, `address`, `phone`, `password`, `sex`, `birthday`, `level`, `permission`, `about`, `bookmarks`, `edu`, `job`, `images`, `website`, `date_add`, `date_upd`, `last_connect`) values('9','','Quản trị website','Admin','','','12345','Nam','1998-7-2','2','',NULL,NULL,NULL,NULL,'201743440-binh-0024.jpg','','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00');
insert into `mod_user` (`ID`, `forgot_code`, `full_name`, `email`, `address`, `phone`, `password`, `sex`, `birthday`, `level`, `permission`, `about`, `bookmarks`, `edu`, `job`, `images`, `website`, `date_add`, `date_upd`, `last_connect`) values('11','','Hoàng Trinh','hoangtrinh8187@gmail.com','','','111111','Nam','2013-1-1','0','',NULL,NULL,NULL,NULL,'1397407149-high-authority-backlinks-300x223.jpg','','2013-07-31 15:01:09','2013-07-31 15:01:09','0000-00-00 00:00:00');
insert into `mod_user` (`ID`, `forgot_code`, `full_name`, `email`, `address`, `phone`, `password`, `sex`, `birthday`, `level`, `permission`, `about`, `bookmarks`, `edu`, `job`, `images`, `website`, `date_add`, `date_upd`, `last_connect`) values('22','','Hồ Thanh Bình','thanhbinhbk881@gmail.com','123 Thien ho duong','01655177655','111111','','','','',NULL,NULL,NULL,NULL,'','','0000-00-00 00:00:00','2013-08-10 09:37:16','0000-00-00 00:00:00');
insert into `mod_user` (`ID`, `forgot_code`, `full_name`, `email`, `address`, `phone`, `password`, `sex`, `birthday`, `level`, `permission`, `about`, `bookmarks`, `edu`, `job`, `images`, `website`, `date_add`, `date_upd`, `last_connect`) values('23','','HPC','happycard.vn@gmail.com','','0903159246','happycard','','1988-9-2','2','',NULL,NULL,NULL,NULL,'1443780552268383622-logohay1-copy.png','','2013-11-16 15:09:55','2013-11-16 15:09:55','0000-00-00 00:00:00');
insert into `mod_user` (`ID`, `forgot_code`, `full_name`, `email`, `address`, `phone`, `password`, `sex`, `birthday`, `level`, `permission`, `about`, `bookmarks`, `edu`, `job`, `images`, `website`, `date_add`, `date_upd`, `last_connect`) values('24','','le mjnh duong','mjnhduong92@gmail.com','14/10 nguyen van luong, phuong 6, quan govap','0903060013','anhduong','','','','',NULL,NULL,NULL,NULL,'','','0000-00-00 00:00:00','2013-09-16 08:59:23','0000-00-00 00:00:00');
insert into `mod_user` (`ID`, `forgot_code`, `full_name`, `email`, `address`, `phone`, `password`, `sex`, `birthday`, `level`, `permission`, `about`, `bookmarks`, `edu`, `job`, `images`, `website`, `date_add`, `date_upd`, `last_connect`) values('25','','Mr.Dung','huynhdungbk@gmail.com',' 387 Lạc Long Quân , Phường 5 , Quận 11 , Tp HCM','0903.159.246','hd419300','','1988-9-2','0','',NULL,NULL,NULL,NULL,'','http://happycard.vn','0000-00-00 00:00:00','2013-09-29 21:14:58','0000-00-00 00:00:00');
insert into `mod_user` (`ID`, `forgot_code`, `full_name`, `email`, `address`, `phone`, `password`, `sex`, `birthday`, `level`, `permission`, `about`, `bookmarks`, `edu`, `job`, `images`, `website`, `date_add`, `date_upd`, `last_connect`) values('26','','Đỗ Thị Hoàng Phương','dothihoangphuong@gmail.com','41/3 Ấp 2, Xã Nhị Bình, Huyện Hóc Môn, Tp.HCM','0934908829','hoanghon','','1992-4-19','0','',NULL,NULL,NULL,NULL,'','','0000-00-00 00:00:00','2013-10-06 11:35:56','0000-00-00 00:00:00');
insert into `mod_user` (`ID`, `forgot_code`, `full_name`, `email`, `address`, `phone`, `password`, `sex`, `birthday`, `level`, `permission`, `about`, `bookmarks`, `edu`, `job`, `images`, `website`, `date_add`, `date_upd`, `last_connect`) values('27','','Đỗ Tuấn Anh','anhsedoi_em_vebenanh@yahoo.com.vn','416/6/26 Lạc Long Quân P5 Q11','0978184947','04081997','','','','',NULL,NULL,NULL,NULL,'','','0000-00-00 00:00:00','2013-10-08 19:54:47','0000-00-00 00:00:00');
insert into `mod_user` (`ID`, `forgot_code`, `full_name`, `email`, `address`, `phone`, `password`, `sex`, `birthday`, `level`, `permission`, `about`, `bookmarks`, `edu`, `job`, `images`, `website`, `date_add`, `date_upd`, `last_connect`) values('28','','phạm thị kiều tiên','ptkieutien2010@yahoo.com.vn','354 phan văn trị, p.11, q.bình thạnh','01283544446','250891','','2013-1-1','0','banner,spage',NULL,NULL,NULL,NULL,'','','2013-11-21 22:51:45','2013-11-21 22:51:45','0000-00-00 00:00:00');
insert into `mod_user` (`ID`, `forgot_code`, `full_name`, `email`, `address`, `phone`, `password`, `sex`, `birthday`, `level`, `permission`, `about`, `bookmarks`, `edu`, `job`, `images`, `website`, `date_add`, `date_upd`, `last_connect`) values('29','','truphuonglong','trangontancuong@gmail.com','Sai Gon','0902 758 038','4c5f86c785947988fd604bf5dbcdf0e2','','2013-1-1','0','banner',NULL,NULL,NULL,NULL,'','','2014-12-05 19:36:36','2014-12-05 19:36:36','0000-00-00 00:00:00');
