-- MySQL dump 10.13  Distrib 5.5.29, for Win64 (x86)
--
-- Host: localhost    Database: VR0001
-- ------------------------------------------------------
-- Server version	5.5.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `u_ad`
--

DROP TABLE IF EXISTS `u_ad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_ad` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '广告标题，仅供管理用，前台不会显示',
  `content` text NOT NULL COMMENT '广告内容，用户自定义的html',
  `postion` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '广告位置，首页顶部、首页底部等',
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='站点广告';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_ad`
--

LOCK TABLES `u_ad` WRITE;
/*!40000 ALTER TABLE `u_ad` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_ad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_admin`
--

DROP TABLE IF EXISTS `u_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_admin` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(16) NOT NULL DEFAULT '' COMMENT '管理员账号',
  `passwd` varchar(32) NOT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`,`admin_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='管理员表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_admin`
--

LOCK TABLES `u_admin` WRITE;
/*!40000 ALTER TABLE `u_admin` DISABLE KEYS */;
INSERT INTO `u_admin` VALUES (1,'admin','07fdc711d8f31b0eeb4f954dae726e96');
/*!40000 ALTER TABLE `u_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_article`
--

DROP TABLE IF EXISTS `u_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_article` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL DEFAULT '' COMMENT '标题',
  `cat_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类id，为0则是单页面',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键词',
  `content` text NOT NULL COMMENT '正文',
  `is_nav` varchar(32) NOT NULL DEFAULT '' COMMENT '是否导航，左下导航为：left_bottom',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '199' COMMENT '排序规则，越小越靠前',
  `visits` mediumint(8) unsigned NOT NULL DEFAULT '1000' COMMENT '文章访问量，可手动设置',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发布时间，可手动设置',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章详情表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_article`
--

LOCK TABLES `u_article` WRITE;
/*!40000 ALTER TABLE `u_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_article_cat`
--

DROP TABLE IF EXISTS `u_article_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_article_cat` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(32) NOT NULL DEFAULT '' COMMENT '分类名称',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类id，为0则是顶级分类',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '29' COMMENT '排序规则，越小越靠前',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章分类表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_article_cat`
--

LOCK TABLES `u_article_cat` WRITE;
/*!40000 ALTER TABLE `u_article_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_article_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_atlasmain`
--

DROP TABLE IF EXISTS `u_atlasmain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_atlasmain` (
  `pk_atlas_main` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pk_user_main` mediumint(8) unsigned DEFAULT '0' COMMENT '用户id',
  `name` varchar(125) NOT NULL DEFAULT '' COMMENT '分类名称',
  `create_time` datetime NOT NULL COMMENT '生成时间',
  `atlas_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '图册类型，0：默认图册；1：用户自己创建',
  PRIMARY KEY (`pk_atlas_main`)
) ENGINE=MyISAM AUTO_INCREMENT=1450 DEFAULT CHARSET=utf8 COMMENT='用户自定义全景项目分类表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_atlasmain`
--

LOCK TABLES `u_atlasmain` WRITE;
/*!40000 ALTER TABLE `u_atlasmain` DISABLE KEYS */;
INSERT INTO `u_atlasmain` VALUES (1447,971,'1221','2018-03-07 11:39:19',1),(1448,972,'默认图册','2018-03-08 11:05:29',0),(1449,973,'默认图册','2018-04-22 17:38:46',0);
/*!40000 ALTER TABLE `u_atlasmain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_comment`
--

DROP TABLE IF EXISTS `u_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_works_main` int(11) NOT NULL COMMENT '用户id',
  `sname` varchar(100) NOT NULL COMMENT '场景名称，用户评论的哪个场景，对应显示',
  `content` varchar(255) NOT NULL COMMENT '评论内容',
  `head_img` varchar(255) NOT NULL COMMENT '头像路径，存储在/data/avatar',
  `ath` smallint(6) NOT NULL COMMENT '评论热点在场景中的水平坐标',
  `atv` smallint(6) NOT NULL COMMENT '评论热点在场景中的竖直坐标',
  `nickname` varchar(100) NOT NULL COMMENT '微信昵称',
  `sex` varchar(10) NOT NULL COMMENT '性别',
  `province` varchar(50) NOT NULL COMMENT '所在省，从微信提取',
  `city` varchar(50) NOT NULL COMMENT '所在市，从微信提取',
  `add_time` datetime NOT NULL COMMENT '生成时间',
  PRIMARY KEY (`id`),
  KEY `comment_works_wid` (`pk_works_main`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='全景图片微信评论内容表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_comment`
--

LOCK TABLES `u_comment` WRITE;
/*!40000 ALTER TABLE `u_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_cus_mediares`
--

DROP TABLE IF EXISTS `u_cus_mediares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_cus_mediares` (
  `pk_media_res` int(11) NOT NULL AUTO_INCREMENT,
  `media_type` tinyint(1) NOT NULL COMMENT '2视频，1音乐，0图片',
  `view_uuid` varchar(16) NOT NULL COMMENT '资源唯一标识符',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '生成时间',
  `media_path` varchar(255) NOT NULL COMMENT '资源相对路径',
  `absolutelocation` varchar(255) NOT NULL COMMENT '资源绝对路径 ',
  `media_name` varchar(100) NOT NULL COMMENT '资源名称',
  `pk_user_main` int(11) NOT NULL COMMENT '关联userid',
  `media_suffix` varchar(100) NOT NULL COMMENT '后缀',
  `media_size` int(11) NOT NULL COMMENT '文件大小 ',
  `cover` text COMMENT '视频封面',
  PRIMARY KEY (`pk_media_res`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='素材内容（图片、音频、视频）';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_cus_mediares`
--

LOCK TABLES `u_cus_mediares` WRITE;
/*!40000 ALTER TABLE `u_cus_mediares` DISABLE KEYS */;
INSERT INTO `u_cus_mediares` VALUES (1,1,'12e81b750dde2dcf','2018-03-08 03:19:18','971/media/msc/12e81b750dde2dcf.mp3','http://tu.bz52.cn/upload/971/media/msc/12e81b750dde2dcf.mp3','黑龙 - 盗心贼 - DJ版',971,'.mp3',13791,NULL),(2,1,'9f4d5b042bb2672e','2018-03-08 03:37:52','971/media/msc/9f4d5b042bb2672e.mp3','http://tu.bz52.cn/upload/971/media/msc/9f4d5b042bb2672e.mp3','1520479902648837',971,'.mp3',51,NULL);
/*!40000 ALTER TABLE `u_cus_mediares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_def_mediares`
--

DROP TABLE IF EXISTS `u_def_mediares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_def_mediares` (
  `pk_defmedia_main` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `absolutelocation` varchar(255) NOT NULL COMMENT '素材绝对路径',
  `flag_del` tinyint(1) NOT NULL COMMENT '是否删除图标 0 正常 1删除',
  `suffix` varchar(10) NOT NULL COMMENT '素材后缀',
  `thumb_path` varchar(255) NOT NULL COMMENT '缩略图',
  `title` varchar(255) NOT NULL COMMENT '素材名称',
  `type` varchar(255) NOT NULL COMMENT '0 静态图标 1 动态程序循环图标 2 其他资源用的图片，例如添加电话等',
  PRIMARY KEY (`pk_defmedia_main`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COMMENT='系统默认图片素材表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_def_mediares`
--

LOCK TABLES `u_def_mediares` WRITE;
/*!40000 ALTER TABLE `u_def_mediares` DISABLE KEYS */;
INSERT INTO `u_def_mediares` VALUES (1,'/static/images/kr/navigation_b.png',0,'.png','/static/images/kr/navigation_b.png','地图导航蓝色','2'),(2,'/static/images/kr/navigation_w.png',0,'.png','/static/images/kr/navigation_w.png','地图导航白色','2'),(3,'/static/sysico/715CFD367DEAFFC9.png',0,'.png','/static/sysico/B318626858717C5B.gif','动态向上箭头','1'),(4,'/static/sysico/1484634164322lio.png',0,'.png','/static/sysico/1484634164322lio.png','静态隐藏热点','0'),(5,'/static/sysico/14846341865308ii.png',0,'.png','/static/sysico/14846341865308ii.png','静态框','0'),(6,'/static/sysico/1484634210913e1e.png',0,'.png','/static/sysico/1484634210913e1e.png','静态定位','0'),(7,'/static/sysico/1484634261679rrs.png',0,'.png','/static/sysico/1484634261679rrs.png','静态导航','0'),(8,'/static/sysico/1484634287832qgz.png',0,'.png','/static/sysico/1484634287832qgz.png','静态加号2','0'),(9,'/static/sysico/1484634304431d5y.png',0,'.png','/static/sysico/1484634304431d5y.png','静态加号1','0'),(10,'/static/sysico/1484634318631os4.png',0,'.png','/static/sysico/1484634318631os4.png','静态加号','0'),(11,'/static/sysico/1484634348310ry8.png',0,'.png','/static/sysico/1484634348310ry8.png','静态放大','0'),(12,'/static/sysico/1484634364891sz9.png',0,'.png','/static/sysico/1484634364891sz9.png','静态放大镜','0'),(13,'/static/sysico/14846343952139c2.png',0,'.png','/static/sysico/14846343952139c2.png','静态字体','0'),(14,'/static/sysico/1484634408781ntk.png',0,'.png','/static/sysico/1484634408781ntk.png','静态图片','0'),(15,'/static/sysico/1484634428031wdf.png',0,'.png','/static/sysico/1484634428031wdf.png','静态音乐','0'),(16,'/static/sysico/1484634459756o1s.png',0,'.png','/static/sysico/1484634459756o1s.png','静态链接1','0'),(17,'/static/sysico/1484634481164ps7.png',0,'.png','/static/sysico/1484634481164ps7.png','静态链接','0'),(18,'/static/sysico/1484634508811173.png',0,'.png','/static/sysico/1484634508811173.png','静态播放','0'),(19,'/static/sysico/1484634617241j97.png',0,'.png','/static/sysico/1484634617241j97.png','静态向前7','0'),(20,'/static/sysico/1484634648993qbn.png',0,'.png','/static/sysico/1484634648993qbn.png','静态向前6','0'),(21,'/static/sysico/1484634666629dcb.png',0,'.png','/static/sysico/1484634666629dcb.png','静态向前5','0'),(22,'/static/sysico/1484634684152s17.png',0,'.png','/static/sysico/1484634684152s17.png','静态向前4','0'),(23,'/static/sysico/1484634702183wpt.png',0,'.png','/static/sysico/1484634702183wpt.png','静态向前3','0'),(24,'/static/sysico/1484634721071r1o.png',0,'.png','/static/sysico/1484634721071r1o.png','静态向前2','0'),(25,'/static/sysico/1484634738052w2w.png',0,'.png','/static/sysico/1484634738052w2w.png','静态向前1','0'),(26,'/static/sysico/1484634754727618.png',0,'.png','/static/sysico/1484634754727618.png','静态向前','0'),(27,'/static/sysico/1484634830437edo.png',0,'.png','/static/sysico/1484634830437edo.png','静态右拐','0'),(28,'/static/sysico/14846348502215nt.png',0,'.png','/static/sysico/14846348502215nt.png','静态左拐','0'),(29,'/static/sysico/14846349006911jd.png',0,'.png','/static/sysico/14846349006911jd.png','静态直升机','0'),(30,'/static/sysico/1484634948763kxo.png',0,'.png','/static/sysico/1484634948763kxo.png','静态圆点','0'),(31,'/static/sysico/1484634985690m2z.png',0,'.png','/static/sysico/1484634985690m2z.png','静态圆心渐变1','0'),(32,'/static/sysico/1484635006322884.png',0,'.png','/static/sysico/1484635006322884.png','静态圆心渐变','0'),(33,'/static/sysico/14846350320570hn.png',0,'.png','/static/sysico/14846350320570hn.png','静态点击','0'),(34,'/static/sysico/1484635058273occ.png',0,'.png','/static/sysico/1484635058273occ.png','静态左上','0'),(35,'/static/sysico/1484635073841cd8.png',0,'.png','/static/sysico/1484635073841cd8.png','静态右上','0'),(36,'/static/sysico/14846351205113l0.png',0,'.png','/static/sysico/14846351205113l0.png','静态向左','0'),(37,'/static/sysico/1484635137679zne.png',0,'.png','/static/sysico/1484635137679zne.png','静态向右','0'),(38,'/static/sysico/1484635156319gn9.png',0,'.png','/static/sysico/1484635156319gn9.png','静态向下','0'),(39,'/static/sysico/14846351825358j9.png',0,'.png','/static/sysico/14846351825358j9.png','静态向上','0'),(40,'/static/sysico/14846366442800jm.png',0,'.png','/static/sysico/1484636644288i9x.png','动态加号','1'),(41,'/static/sysico/1484636762006msw.png',0,'.png','/static/sysico/1484636762013n1f.png','动态放大','1'),(42,'/static/sysico/1484638271871112.png',0,'.png','/static/sysico/1484638271880ogk.png','动态圆心渐变2','1'),(43,'/static/sysico/1484638337613hdt.png',0,'.png','/static/sysico/1484638337621qz5.png','动态圆心渐变1','1'),(44,'/static/sysico/1484638376420tro.png',0,'.png','/static/sysico/1484638376428ttt.png','动态圆心渐变','1'),(45,'/static/sysico/1484638475345t3o.png',0,'.png','/static/sysico/14846384753547yj.png','动态手型','1'),(46,'/static/sysico/1484638532176tpt.png',0,'.png','/static/sysico/1484638532183eny.png','动态飞机','1'),(47,'/static/sysico/1484638569407q70.png',0,'.png','/static/sysico/14846385694140xg.png','动态直升机','1'),(48,'/static/sysico/1484638619125ixh.png',0,'.png','/static/sysico/1484638619133d6e.png','动态椭圆','1'),(49,'/static/sysico/14846386687403g5.png',0,'.png','/static/sysico/1484638668748zq9.png','动态右上','1'),(50,'/static/sysico/14846387045795lf.png',0,'.png','/static/sysico/1484638704586cew.png','动态左上','1'),(51,'/static/sysico/1484638873718qqw.png',0,'.png','/static/sysico/1484638873726qrl.png','动态点','1'),(52,'/static/sysico/1484638964908wqo.png',0,'.png','/static/sysico/1484638964915tkd.png','动态向下箭头','1'),(53,'/static/sysico/148463900805960d.png',0,'.png','/static/sysico/1484639008066oqy.png','动态向右','1'),(54,'/static/sysico/1484639053745wff.png',0,'.png','/static/sysico/14846390537510w8.png','动态向左','1'),(55,'/static/sysico/14846390951599sl.png',0,'.png','/static/sysico/148463909516794z.png','动态向下','1'),(56,'/static/sysico/1484639129526qz0.png',0,'.png','/static/sysico/14846391295343nm.png','动态向上','1');
/*!40000 ALTER TABLE `u_def_mediares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_def_voice`
--

DROP TABLE IF EXISTS `u_def_voice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_def_voice` (
  `pk_voice` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `absolutelocation` varchar(255) NOT NULL COMMENT '绝对路径',
  `flag_del` tinyint(1) unsigned NOT NULL COMMENT '是否已删除，1正常，0删除',
  `title` varchar(255) NOT NULL COMMENT '素材名称',
  `name_uniqid` char(32) NOT NULL COMMENT '名称唯一标识符',
  PRIMARY KEY (`pk_voice`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='系统默认音频素材表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_def_voice`
--

LOCK TABLES `u_def_voice` WRITE;
/*!40000 ALTER TABLE `u_def_voice` DISABLE KEYS */;
INSERT INTO `u_def_voice` VALUES (1,'http://tu.bz52.cn/upload/def_material/1520479894553hbo.mp3',0,'女生','dfd4856f49bd32af'),(2,'http://tu.bz52.cn/upload/def_material/1520479902648837.mp3',0,'男生','5dea04ed92d60c72');
/*!40000 ALTER TABLE `u_def_voice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_imgs_works`
--

DROP TABLE IF EXISTS `u_imgs_works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_imgs_works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_img_main` int(11) NOT NULL COMMENT '场景id',
  `pk_works_main` int(11) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`),
  KEY `uiw_img_id` (`pk_img_main`),
  KEY `uiw_works_id` (`pk_works_main`)
) ENGINE=MyISAM AUTO_INCREMENT=9391 DEFAULT CHARSET=utf8 COMMENT='场景与项目关联表（多对多）';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_imgs_works`
--

LOCK TABLES `u_imgs_works` WRITE;
/*!40000 ALTER TABLE `u_imgs_works` DISABLE KEYS */;
INSERT INTO `u_imgs_works` VALUES (9388,7032,4048),(9389,7033,4048),(9390,7034,4048);
/*!40000 ALTER TABLE `u_imgs_works` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_imgsmain`
--

DROP TABLE IF EXISTS `u_imgsmain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_imgsmain` (
  `pk_img_main` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL COMMENT '文件名称',
  `location` varchar(255) NOT NULL COMMENT '图片路径',
  `thumb_path` varchar(255) NOT NULL COMMENT '缩略图',
  `view_uuid` varchar(16) NOT NULL COMMENT '唯一标识符',
  `pk_atlas_main` int(11) NOT NULL DEFAULT '0',
  `pk_user_main` int(11) NOT NULL COMMENT '用户id',
  `create_time` datetime NOT NULL COMMENT '生成时间',
  `levels` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`pk_img_main`),
  KEY `imgsmain_user_pk` (`pk_user_main`),
  KEY `imgsmain_atlas_pk` (`pk_atlas_main`)
) ENGINE=MyISAM AUTO_INCREMENT=7035 DEFAULT CHARSET=utf8 COMMENT='场景表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_imgsmain`
--

LOCK TABLES `u_imgsmain` WRITE;
/*!40000 ALTER TABLE `u_imgsmain` DISABLE KEYS */;
INSERT INTO `u_imgsmain` VALUES (7027,'112','http://tu.bz52.cn/upload/971/sourceimg/1520402955013a7s.jpg','http://tu.bz52.cn/upload/971/works/8c597c784947d12d/thumb.jpg','8c597c784947d12d',0,971,'2018-03-07 14:09:18',''),(7028,'13','http://tu.bz52.cn/upload/971/sourceimg/1520477598714jxc.jpg','http://tu.bz52.cn/upload/971/works/8b216c20e3dd7190/thumb.jpg','8b216c20e3dd7190',0,971,'2018-03-08 10:53:23',''),(7029,'13','http://tu.bz52.cn/upload/972/sourceimg/1520478608144hz0.jpg','http://tu.bz52.cn/upload/972/works/366ca8a91f0be000/thumb.jpg','366ca8a91f0be000',0,972,'2018-03-08 11:10:12',''),(7030,'13','http://tu.bz52.cn/upload/971/sourceimg/152047897154371n.jpg','http://tu.bz52.cn/upload/971/works/942bb90b81cc1a1a/thumb.jpg','942bb90b81cc1a1a',0,971,'2018-03-08 11:16:15',''),(7031,'IMG_7204 Panorama','http://p0cc5qi8z.bkt.clouddn.com/973/sourceimg/1524390000126zbh.jpg','http://p0cc5qi8z.bkt.clouddn.com/973/works/fdc81cd7f9bb380b/thumb.jpg','fdc81cd7f9bb380b',0,973,'2018-04-22 17:40:12',''),(7032,'餐厅','http://1009vr.oss-cn-shenzhen.aliyuncs.com/973/sourceimg/1642822152362soj.jpg','http://1009vr.oss-cn-shenzhen.aliyuncs.com/973/works/5fc8382ec2533313/thumb.jpg','5fc8382ec2533313',0,973,'2022-01-22 11:29:22',''),(7033,'厨房','http://1009vr.oss-cn-shenzhen.aliyuncs.com/973/sourceimg/164282215236362n.jpg','http://1009vr.oss-cn-shenzhen.aliyuncs.com/973/works/9b6d8b3210d663d6/thumb.jpg','9b6d8b3210d663d6',0,973,'2022-01-22 11:29:22',''),(7034,'次卧','http://1009vr.oss-cn-shenzhen.aliyuncs.com/973/sourceimg/1642822152364cp0.jpg','http://1009vr.oss-cn-shenzhen.aliyuncs.com/973/works/1126e18d35cfa9b1/thumb.jpg','1126e18d35cfa9b1',0,973,'2022-01-22 11:29:22','');
/*!40000 ALTER TABLE `u_imgsmain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_object_around`
--

DROP TABLE IF EXISTS `u_object_around`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_object_around` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imgs` text NOT NULL COMMENT '所有图片集合字符串',
  `name` varchar(100) NOT NULL COMMENT '环物项目名称',
  `view_num` int(11) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `pk_user_main` int(11) NOT NULL COMMENT '用户id',
  `thumb_path` varchar(200) NOT NULL COMMENT '缩略图',
  `create_time` datetime NOT NULL COMMENT '生成时间',
  `flag_publish` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否公开作品 1 公开 0 不公开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='物体环视表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_object_around`
--

LOCK TABLES `u_object_around` WRITE;
/*!40000 ALTER TABLE `u_object_around` DISABLE KEYS */;
INSERT INTO `u_object_around` VALUES (1,'[{\"index\":\"0\",\"filename\":\"13.jpg\",\"imgsrc\":\"http://tu.bz52.cn/upload/972/obj3d/20180308/1520478355764n04.jpg\"}]','测试',2,972,'http://tu.bz52.cn/upload/972/obj3d/20180308/1520478355764n04.jpg','2018-03-08 11:05:56',1);
/*!40000 ALTER TABLE `u_object_around` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_pano_atlas`
--

DROP TABLE IF EXISTS `u_pano_atlas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_pano_atlas` (
  `pk_atlas_main` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL COMMENT '分类名称',
  `pk_user_main` int(11) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`pk_atlas_main`)
) ENGINE=MyISAM AUTO_INCREMENT=156 DEFAULT CHARSET=utf8 COMMENT='用户自定义素材管理全景图片分类';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_pano_atlas`
--

LOCK TABLES `u_pano_atlas` WRITE;
/*!40000 ALTER TABLE `u_pano_atlas` DISABLE KEYS */;
INSERT INTO `u_pano_atlas` VALUES (155,'测试',971);
/*!40000 ALTER TABLE `u_pano_atlas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_pano_config`
--

DROP TABLE IF EXISTS `u_pano_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_pano_config` (
  `pk_pano_config` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pk_works_main` int(11) NOT NULL COMMENT '主表关联id',
  `open_alert` text NOT NULL COMMENT '开场提示',
  `bg_music` text NOT NULL COMMENT '背景音乐',
  `sky_land_shade` text NOT NULL COMMENT '补天补地',
  `footmark` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '足迹',
  `tour_guide` text NOT NULL COMMENT '一键导览',
  `url_phone_nvg` text NOT NULL COMMENT '左下导航（链接、电话、地图）',
  `speech_explain` text NOT NULL COMMENT '语音解说 ',
  `angle_of_view` text NOT NULL COMMENT '设置视角 ',
  `special_effects` text NOT NULL COMMENT '特效（红包、雨雪、金星、自定义图片等）',
  `littleplanet` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `gyro` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sand_table` text NOT NULL COMMENT '沙盘',
  `custom_logo` text NOT NULL COMMENT '自定义logo（左上）',
  `scene_group` text NOT NULL COMMENT '场景分组',
  `scenechoose` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示场景选择',
  `comment` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否允许微信评论',
  `hotspot` mediumtext NOT NULL,
  `autorotate` tinyint(1) NOT NULL DEFAULT '1' COMMENT '开启自动旋转',
  `loading_img` text NOT NULL COMMENT '启动画面',
  `custom_right_button` text NOT NULL COMMENT '自定义右键菜单',
  `video_tie_hotspot` text COMMENT '视频贴片热点',
  `top_ad` varchar(255) NOT NULL DEFAULT '',
  `reward` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '允许打赏',
  PRIMARY KEY (`pk_pano_config`),
  KEY `pano_config_works_wid` (`pk_works_main`)
) ENGINE=MyISAM AUTO_INCREMENT=4032 DEFAULT CHARSET=utf8 COMMENT='全景图片内容表（从表，主表为u_worksmain）';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_pano_config`
--

LOCK TABLES `u_pano_config` WRITE;
/*!40000 ALTER TABLE `u_pano_config` DISABLE KEYS */;
INSERT INTO `u_pano_config` VALUES (4030,4047,'{\"useAlert\":\"0\",\"isDefault\":\"0\",\"imgPath\":\"/plugin/open_alert/images/openalert.png\"}','{\"isWhole\":\"1\",\"useMusic\":\"0\"}','{\"isWhole\":\"0\",\"shadeSetting\":[{\"useShade\":\"0\"}]}',0,'{\"useStartImg\":\"\",\"useEndImg\":\"\",\"points\":[]}','{\"linkSettings\":[]}','{\"isWhole\":\"1\",\"useSpeech\":\"0\"}','{\"viewSettings\":[{\"sceneName\":\"scene_fdc81cd7f9bb380b\",\"hlookat\":\"0\",\"vlookat\":\"0\",\"fov\":\"90\",\"fovmin\":\"5\",\"fovmax\":\"120\",\"vlookatmin\":\"-90\",\"vlookatmax\":\"90\",\"keepView\":\"0\"}]}','{\"effectSettings\":[{\"sceneName\":\"scene_fdc81cd7f9bb380b\",\"isOpen\":false}]}',1,0,'{\"isOpen\":\"0\",\"sandTables\":[]}','{\"useCustomLogo\":\"0\",\"logoImgPath\":\"/plugin/custom_logo/images/custom_logo.png\",\"user\":\"\"}','{\"sceneGroups\":[{\"iconType\":\"system\",\"imgPath\":\"/static/images/skin1/vr-btn-scene.png\",\"groupName\":\"场景选择\",\"scenes\":[{\"sceneName\":\"scene_fdc81cd7f9bb380b\",\"viewuuid\":\"fdc81cd7f9bb380b\",\"imgPath\":\"http://p0cc5qi8z.bkt.clouddn.com/973/works/fdc81cd7f9bb380b/thumb.jpg\",\"sceneTitle\":\"IMG_7204 Panorama\"}]}]}',1,0,'{\"scene_fdc81cd7f9bb380b\":{\"scene\":[{\"iconType\":\"system\",\"imgPath\":\"/static/sysico/1484639129526qz0.png\",\"thumbPath\":\"/static/sysico/14846391295343nm.png\",\"isDynamic\":\"1\",\"ath\":\"-14.461173478001\",\"atv\":\"-1.1678483981923\",\"name\":\"schp_zbhp283skp\",\"linkedscene\":\"scene_fdc81cd7f9bb380b\",\"sceneTitle\":\"IMG_7204 Panorama\",\"sceneImg\":\"http://p0cc5qi8z.bkt.clouddn.com/973/works/fdc81cd7f9bb380b/thumb.jpg\"}],\"link\":[],\"image\":[],\"text\":[],\"voice\":[],\"imgtext\":[],\"obj\":[]}}',1,'{}','{\"linkSettings\":[]}','{\"scene\":[]}','{\"allow_sys\":\"0\",\"show\":\"0\"}',0),(4031,4048,'{}','{\"useMusic\": false,\"isWhole\": true}','{ \"useShade\": false,\"isWhole\": true}',1,'{\"useStartImg\": false,\"useEndImg\": false,\"points\": []}','{}','{\"isWhole\": true,\"useSpeech\": false}','{\"viewSettings\": []}','{}',1,1,'{\"sandTables\": [],\"isOpen\": false}','{\"logoImgPath\": \"\",\"useCustomLogo\": false}','{\"sceneGroups\": []}',1,1,'{}',1,'{}','{}',NULL,'',0);
/*!40000 ALTER TABLE `u_pano_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_project_download`
--

DROP TABLE IF EXISTS `u_project_download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_project_download` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL COMMENT '关联用户id',
  `pid` mediumint(8) unsigned NOT NULL COMMENT '关联项目id',
  `pname` varchar(255) NOT NULL COMMENT '项目名',
  `thumb` varchar(255) NOT NULL COMMENT '缩略图',
  `folder` varchar(100) NOT NULL DEFAULT '' COMMENT '临时文件夹名,压缩包名称',
  `step` smallint(2) NOT NULL DEFAULT '0' COMMENT '步骤',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 等待执行 1执行中 2执行完成 -1 出现异常',
  `msg` varchar(100) DEFAULT '' COMMENT '当前步骤对应信息',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '生成时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='离线下载表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_project_download`
--

LOCK TABLES `u_project_download` WRITE;
/*!40000 ALTER TABLE `u_project_download` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_project_download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_redpack`
--

DROP TABLE IF EXISTS `u_redpack`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_redpack` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pk_user_main` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '红包名称',
  `amount` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '红包金额，随机时为总金额，固定金额时为单个红包金额',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '红包发放规则，1为随机，2为固定金额',
  `num` mediumint(6) unsigned NOT NULL DEFAULT '0' COMMENT '红包数量，type=2时，需设置红包数量',
  `range` varchar(255) NOT NULL DEFAULT '' COMMENT '金额范围，随机红包时必须设置',
  `percent` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '中奖百分比',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建红包时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '红包状态：1，正常；0，已取消',
  `expire` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间，红包过期将不能再被领取，0表示永不过期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户设置的红包表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_redpack`
--

LOCK TABLES `u_redpack` WRITE;
/*!40000 ALTER TABLE `u_redpack` DISABLE KEYS */;
INSERT INTO `u_redpack` VALUES (1,971,'aspku测试',100.00,1,0,'1-10',10,'2018-03-08 04:04:44',1,1522339200),(2,971,'测试',20.00,1,0,'1-2',100,'2018-03-08 04:55:56',1,1522252800);
/*!40000 ALTER TABLE `u_redpack` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_redpack_log`
--

DROP TABLE IF EXISTS `u_redpack_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_redpack_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pk_user_main` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商户id',
  `rpid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '红包id',
  `wxid` varchar(255) NOT NULL DEFAULT '' COMMENT '微信用户openid',
  `head_img` varchar(255) NOT NULL DEFAULT '' COMMENT '微信头像',
  `nickname` varchar(64) NOT NULL DEFAULT '' COMMENT '微信昵称',
  `sex` varchar(16) NOT NULL DEFAULT '' COMMENT '性别',
  `province` varchar(32) NOT NULL DEFAULT '' COMMENT '所在省',
  `city` varchar(64) NOT NULL DEFAULT '' COMMENT '所在市',
  `amount` decimal(8,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '领取金额',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否抽中；1，抽中，0，未抽中',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '领取时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='红包领取记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_redpack_log`
--

LOCK TABLES `u_redpack_log` WRITE;
/*!40000 ALTER TABLE `u_redpack_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_redpack_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_region`
--

DROP TABLE IF EXISTS `u_region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '地区名称',
  `parentid` int(11) NOT NULL DEFAULT '0' COMMENT '上级地区id',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '地区级别id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='地区表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_region`
--

LOCK TABLES `u_region` WRITE;
/*!40000 ALTER TABLE `u_region` DISABLE KEYS */;
INSERT INTO `u_region` VALUES (1,'北京',0,1);
/*!40000 ALTER TABLE `u_region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_reward`
--

DROP TABLE IF EXISTS `u_reward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_reward` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '作者id',
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目id',
  `order_sn` varchar(16) NOT NULL DEFAULT '' COMMENT '订单号',
  `amount` decimal(8,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '打赏金额',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '支付状态，0为待支付，1为支付成功',
  `head_img` varchar(255) NOT NULL DEFAULT '' COMMENT '打赏者(微信)头像',
  `nickname` varchar(64) NOT NULL DEFAULT '' COMMENT '打赏者(微信)昵称',
  `province` varchar(32) NOT NULL DEFAULT '' COMMENT '打赏者(微信)所在省',
  `city` varchar(32) NOT NULL DEFAULT '' COMMENT '打赏者(微信)所在市',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '生成支付时间',
  `confirm_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '确认支付（成功）时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='打赏记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_reward`
--

LOCK TABLES `u_reward` WRITE;
/*!40000 ALTER TABLE `u_reward` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_reward` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_ring_around`
--

DROP TABLE IF EXISTS `u_ring_around`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_ring_around` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(8) unsigned NOT NULL COMMENT '发布者id',
  `rname` varchar(125) NOT NULL DEFAULT '' COMMENT '720环物项目名称',
  `obj` varchar(255) NOT NULL DEFAULT '' COMMENT 'obj文件位置',
  `mtl` varchar(255) NOT NULL DEFAULT '' COMMENT 'mtl文件位置',
  `img_path` varchar(255) NOT NULL DEFAULT '' COMMENT '720环物项目封面图',
  `host` varchar(125) NOT NULL DEFAULT '' COMMENT '项目的地址oss或七牛',
  `link` varchar(255) NOT NULL DEFAULT '' COMMENT '项目的商品链接',
  `createtime` datetime NOT NULL COMMENT '项目创建时间',
  `background` varchar(255) NOT NULL DEFAULT '' COMMENT '720环物项目背景图',
  `music` varchar(255) NOT NULL DEFAULT '' COMMENT '背景音乐地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='720环物表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_ring_around`
--

LOCK TABLES `u_ring_around` WRITE;
/*!40000 ALTER TABLE `u_ring_around` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_ring_around` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_ring_around_img`
--

DROP TABLE IF EXISTS `u_ring_around_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_ring_around_img` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(8) unsigned NOT NULL COMMENT '720环物项目id',
  `img_path` varchar(255) NOT NULL DEFAULT '' COMMENT '图片地址',
  `pid` int(8) unsigned NOT NULL COMMENT '所有者ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='720环物展UV图';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_ring_around_img`
--

LOCK TABLES `u_ring_around_img` WRITE;
/*!40000 ALTER TABLE `u_ring_around_img` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_ring_around_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_site_config`
--

DROP TABLE IF EXISTS `u_site_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_site_config` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` varchar(32) NOT NULL DEFAULT '' COMMENT '父级id，配置信息为一维数组时',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '配置项',
  `value` varchar(255) NOT NULL DEFAULT '' COMMENT '配置内容',
  PRIMARY KEY (`id`),
  UNIQUE KEY `parent_id` (`parent_id`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2464 DEFAULT CHARSET=utf8 COMMENT='站点配置表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_site_config`
--

LOCK TABLES `u_site_config` WRITE;
/*!40000 ALTER TABLE `u_site_config` DISABLE KEYS */;
INSERT INTO `u_site_config` VALUES (2419,'','title','全景源码'),(2420,'','subtitle','全景源码'),(2421,'','desciption','全景源码'),(2422,'','address',''),(2423,'','icp',''),(2424,'','tel','18680310087'),(2425,'','qq','20705846'),(2426,'','rewrite','1'),(2427,'','close_reg','0'),(2428,'','tempclose','0'),(2429,'','multi_pano','0'),(2430,'','closereason',''),(2431,'','global_storage','oss'),(2432,'','qiniu','disable'),(2433,'','oss','enable'),(2434,'','local','disable'),(2436,'qiniu','accessKey','t88I9_3xMu_kAUdFSYIUFGahyvlORsJKd0WFTf2n'),(2437,'qiniu','secretKey','_ehzZVr8MBqPDqQsMe_kLhXLeRTpvAumo0Ug1LHT'),(2438,'qiniu','bucket','ywbaba'),(2439,'qiniu','cdn_host','p0cc5qi8z.bkt.clouddn.com'),(2441,'oss','internal','0'),(2442,'oss','access_id','LTAI4Fdh1x82JhWarkSFpR1Y'),(2443,'oss','access_secret','kuXNcs7ZFpLbR1TKLFWKPh6m5dGp84'),(2444,'oss','bucket','1009vr'),(2445,'oss','cdn_host','1009vr.oss-cn-shenzhen.aliyuncs.com'),(2446,'local','dir_path','E:/www/teapic/upload/'),(2447,'local','cdn_host','tu.bz52.cn/upload'),(2435,'qiniu','zone','zone0'),(2440,'oss','zone','zone4'),(2394,'','moban','default'),(2448,'','global_sms','aliyuntongxun'),(2449,'','yuntongxun','disable'),(2450,'','alidayu','disable'),(2451,'','aliyuntongxun','enable'),(2452,'yuntongxun','accountSid',''),(2453,'yuntongxun','accountToken',''),(2454,'yuntongxun','appId',''),(2455,'yuntongxun','templateId',''),(2456,'alidayu','appkey',''),(2457,'alidayu','secretkey',''),(2458,'alidayu','freesignname',''),(2459,'alidayu','templatecode',''),(2460,'aliyuntongxun','AccessKeyID','LTAIIQOlIHMEl1WQ'),(2461,'aliyuntongxun','AccessKeySecret','ktUjjYY7PKJHz1aQSOtC36IX7jYTuR'),(2462,'aliyuntongxun','freesignname','房软'),(2463,'aliyuntongxun','templateId','SMS_167980192');
/*!40000 ALTER TABLE `u_site_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_slide`
--

DROP TABLE IF EXISTS `u_slide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_slide` (
  `id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `img_name` varchar(32) NOT NULL DEFAULT '' COMMENT '图片名称',
  `img_path` varchar(255) NOT NULL DEFAULT '' COMMENT '图片路径',
  `link` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转链接',
  `sort_order` mediumint(6) unsigned NOT NULL DEFAULT '99' COMMENT '排序，升序排列',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='首页轮播图';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_slide`
--

LOCK TABLES `u_slide` WRITE;
/*!40000 ALTER TABLE `u_slide` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_slide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_tag`
--

DROP TABLE IF EXISTS `u_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL DEFAULT '' COMMENT '标签名称',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 图片标签  2 视频标签',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '99' COMMENT '排序，越小越靠前',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='项目标签（图片、视频）表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_tag`
--

LOCK TABLES `u_tag` WRITE;
/*!40000 ALTER TABLE `u_tag` DISABLE KEYS */;
INSERT INTO `u_tag` VALUES (26,'风光',1,99),(27,'视频',2,99);
/*!40000 ALTER TABLE `u_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_tag_video`
--

DROP TABLE IF EXISTS `u_tag_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_tag_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL COMMENT '标签id',
  `video_id` int(11) NOT NULL COMMENT '全景视频id',
  PRIMARY KEY (`id`),
  KEY `tag_video_vid` (`video_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='视频标签与全景视频关联表（多对多）';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_tag_video`
--

LOCK TABLES `u_tag_video` WRITE;
/*!40000 ALTER TABLE `u_tag_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_tag_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_tag_works`
--

DROP TABLE IF EXISTS `u_tag_works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_tag_works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL COMMENT '标签id',
  `works_id` int(11) NOT NULL COMMENT '全景图片项目id',
  PRIMARY KEY (`id`),
  KEY `tag_works_wid` (`works_id`),
  KEY `tag_works_tid` (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18432 DEFAULT CHARSET=utf8 COMMENT='项目标签与全景图片项目关联表（多对多）';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_tag_works`
--

LOCK TABLES `u_tag_works` WRITE;
/*!40000 ALTER TABLE `u_tag_works` DISABLE KEYS */;
INSERT INTO `u_tag_works` VALUES (18430,26,4047),(18431,26,4048);
/*!40000 ALTER TABLE `u_tag_works` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_user`
--

DROP TABLE IF EXISTS `u_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_user` (
  `pk_user_main` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号，登录账号',
  `openid` varchar(32) NOT NULL DEFAULT '' COMMENT '微信登录openid',
  `nickname` varchar(20) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `level` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '用户组',
  `limit_num` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '可发布项目数量限制，默认为0，无限制',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册（管理员添加）时间',
  `last_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最近登录',
  `state` tinyint(1) unsigned DEFAULT '0' COMMENT '用户是否被禁用  0 正常 1禁用',
  `amount` decimal(8,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '账户余额',
  PRIMARY KEY (`pk_user_main`),
  KEY `openid` (`openid`)
) ENGINE=MyISAM AUTO_INCREMENT=974 DEFAULT CHARSET=utf8 COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_user`
--

LOCK TABLES `u_user` WRITE;
/*!40000 ALTER TABLE `u_user` DISABLE KEYS */;
INSERT INTO `u_user` VALUES (973,'18680310087','','888','14e1b600b1fd579f47433b88e8d85291',16,0,'2018-04-22 09:37:38','2022-01-22 03:28:12',0,55.00);
/*!40000 ALTER TABLE `u_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_user_level`
--

DROP TABLE IF EXISTS `u_user_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_user_level` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '组id，1为系统默认，不可删除',
  `level_name` varchar(15) NOT NULL DEFAULT '' COMMENT '用户组名称',
  `privileges` text NOT NULL COMMENT '组权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='用户组表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_user_level`
--

LOCK TABLES `u_user_level` WRITE;
/*!40000 ALTER TABLE `u_user_level` DISABLE KEYS */;
INSERT INTO `u_user_level` VALUES (1,'注册会员',''),(16,'高级会员','bgmusic,comment,reward,gyro,bgvoice,footmarker,link,showuser,showlogo,shade_sky_floor,open_alert,showviewnum,showvrglass,custom_logo,custom_right_button,custom_user,profile,project_download,praise,private_access,share,allowed_recomm,top_ad');
/*!40000 ALTER TABLE `u_user_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_user_profile`
--

DROP TABLE IF EXISTS `u_user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_user_main` mediumint(8) unsigned NOT NULL COMMENT '用户id',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `region_1` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '一级地区（如果配置了地区）',
  `region_2` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `region_3` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `region_4` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `region_5` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `region_6` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `email` varchar(32) NOT NULL DEFAULT '' COMMENT '邮件',
  `qq` varchar(16) NOT NULL DEFAULT '' COMMENT 'qq号码',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1为男性，2为女性',
  `intro` text NOT NULL COMMENT '简介',
  `index_show` varchar(255) NOT NULL DEFAULT '' COMMENT '作者主页作品url',
  PRIMARY KEY (`id`),
  KEY `pk_user_main` (`pk_user_main`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_user_profile`
--

LOCK TABLES `u_user_profile` WRITE;
/*!40000 ALTER TABLE `u_user_profile` DISABLE KEYS */;
INSERT INTO `u_user_profile` VALUES (1,971,'',0,0,0,0,0,0,'www.aspku.com','',0,'www.aspku.com','');
/*!40000 ALTER TABLE `u_user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_video`
--

DROP TABLE IF EXISTS `u_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_user_main` int(11) NOT NULL COMMENT '用户id',
  `vname` varchar(30) NOT NULL COMMENT '视频名称',
  `profile` text NOT NULL COMMENT '视频简介',
  `videos` text NOT NULL COMMENT '视频路径（可能多个视频）',
  `audio` varchar(125) NOT NULL DEFAULT '' COMMENT '音频文件，兼容ios',
  `flag_publish` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 未发布 1发布',
  `create_time` datetime NOT NULL COMMENT '生成时间',
  `size` bigint(20) NOT NULL COMMENT '视频大小',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 等待编辑 1 已编辑',
  `praised_num` int(11) NOT NULL DEFAULT '0' COMMENT '点赞数量',
  `browsing_num` int(11) NOT NULL DEFAULT '0' COMMENT '浏览数量',
  `thumb_path` varchar(255) NOT NULL COMMENT '缩略图',
  `sort` smallint(4) NOT NULL DEFAULT '999' COMMENT '排序，从小到大',
  `recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐（管理员）',
  `user_sort` smallint(4) NOT NULL DEFAULT '999' COMMENT '用户自定义排序',
  `user_recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户自定义是否允许管理员推荐',
  `cdn_host` varchar(100) NOT NULL COMMENT 'cdn域名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='全景视频项目表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_video`
--

LOCK TABLES `u_video` WRITE;
/*!40000 ALTER TABLE `u_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_worksmain`
--

DROP TABLE IF EXISTS `u_worksmain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_worksmain` (
  `pk_works_main` int(11) NOT NULL AUTO_INCREMENT,
  `pk_user_main` int(11) NOT NULL COMMENT '用户id',
  `name` varchar(255) DEFAULT NULL,
  `profile` text COMMENT '场景简介',
  `thumb_path` varchar(255) NOT NULL COMMENT '缩略图',
  `pk_atlas_main` int(11) NOT NULL COMMENT '类别',
  `view_uuid` varchar(16) NOT NULL COMMENT '唯一标识符',
  `photo_date` datetime NOT NULL COMMENT '拍摄时间',
  `privacy_flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否设置为公开浏览 0 公开  1私有',
  `privacy_password` varchar(32) DEFAULT NULL COMMENT '私有密码',
  `hidelogo_flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'logo隐藏',
  `hideuser_flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT '作者隐藏',
  `flag_publish` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否发布作品',
  `browsing_num` int(11) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `praised_num` int(11) NOT NULL DEFAULT '0' COMMENT '点赞',
  `hideshare_flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT '隐藏分享',
  `hidevrglasses_flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT '隐藏vr眼镜',
  `hideprofile_flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示简介',
  `hidepraise_flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否允许点赞',
  `hideviewnum_flag` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '隐藏人气',
  `create_time` datetime NOT NULL COMMENT '生成时间',
  `sort` smallint(4) NOT NULL DEFAULT '999' COMMENT '管理员定义的排序',
  `recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐 0 不推荐 1推荐',
  `user_sort` smallint(4) NOT NULL DEFAULT '999' COMMENT '用户自定义显示排序',
  `user_recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户自定义是否允许管理员推荐',
  `flag_allowed_recomm` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是事允许推荐',
  `cdn_host` varchar(100) NOT NULL COMMENT 'cdn服务器域名',
  PRIMARY KEY (`pk_works_main`),
  KEY `worksmain_uid` (`pk_user_main`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4049 DEFAULT CHARSET=utf8 COMMENT='全景项目作品表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_worksmain`
--

LOCK TABLES `u_worksmain` WRITE;
/*!40000 ALTER TABLE `u_worksmain` DISABLE KEYS */;
INSERT INTO `u_worksmain` VALUES (4048,973,'VR复式',NULL,'http://1009vr.oss-cn-shenzhen.aliyuncs.com/973/works/5fc8382ec2533313/thumb.jpg',1449,'26d06477427e3593','2022-01-22 11:29:22',0,NULL,0,0,1,2,0,0,0,0,0,0,'2022-01-22 11:29:22',999,0,999,0,0,'http://1009vr.oss-cn-shenzhen.aliyuncs.com/');
/*!40000 ALTER TABLE `u_worksmain` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-22 12:37:38
