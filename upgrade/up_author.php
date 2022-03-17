<?php
//升级更新数据库
//@version 1.4.6
define("IN_T",true);

require_once "../config/config.php";
require_once "../source/include/cls_db.php";

$Db = MyPDO::getInstance($db_host,$db_user,$db_pass,$db_name,$db_charset);

//创建region表
$sql .= "CREATE TABLE `u_region` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(100) NOT NULL COMMENT '地区名称',
 `parentid` int(11) NOT NULL DEFAULT '0' COMMENT '上级地区id',
 `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '地区级别id',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='地区表';";

//u_user增加账号过期时间
$sql .= "ALTER TABLE  `u_user_profile` DROP  `province`;
ALTER TABLE  `u_user_profile` DROP  `city`;
ALTER TABLE  `u_user_profile` ADD  `region_1` mediumint(0) UNSIGNED NOT NULL DEFAULT  '0' COMMENT  '一级地区' AFTER  `avatar`;
ALTER TABLE  `u_user_profile` ADD  `region_2` mediumint(0) UNSIGNED NOT NULL DEFAULT  '0' AFTER  `region_1`;
ALTER TABLE  `u_user_profile` ADD  `region_3` mediumint(0) UNSIGNED NOT NULL DEFAULT  '0' AFTER  `region_2`;
ALTER TABLE  `u_user_profile` ADD  `region_4` mediumint(0) UNSIGNED NOT NULL DEFAULT  '0' AFTER  `region_3`;
ALTER TABLE  `u_user_profile` ADD  `region_5` mediumint(0) UNSIGNED NOT NULL DEFAULT  '0' AFTER  `region_4`;
ALTER TABLE  `u_user_profile` ADD  `region_6` mediumint(0) UNSIGNED NOT NULL DEFAULT  '0' AFTER  `region_5`;
ALTER TABLE  `u_user_profile` ADD  `email` varchar(32) NOT NULL DEFAULT '' comment '邮件' AFTER  `region_6`;
ALTER TABLE  `u_user_profile` ADD  `qq` varchar(16) NOT NULL DEFAULT '' comment 'qq号' AFTER  `region_6`;
ALTER TABLE  `u_user_profile` ADD  `intro` text NOT NULL comment '简介' AFTER `sex`;
ALTER TABLE  `u_user_profile` ADD  `index_show` varchar(255) NOT NULL default '' comment '主页推荐作品' AFTER `intro`;
";

$Db->execSql($sql);
?>