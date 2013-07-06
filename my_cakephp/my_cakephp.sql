-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2013 at 11:53 AM
-- Server version: 5.5.24
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_cakephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text,
  `body` longtext,
  `published` tinyint(1) NOT NULL,
  `sticky` tinyint(1) NOT NULL DEFAULT '0',
  `in_rss` tinyint(1) NOT NULL DEFAULT '1',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `slug`, `summary`, `body`, `published`, `sticky`, `in_rss`, `meta_title`, `meta_description`, `meta_keywords`, `created`, `modified`) VALUES
(1, 'Demo bolg', 'demo', 'demo summary', 'demo body', 1, 1, 1, 'demo meta title', 'demo meta description', 'demo meta keyword', '2013-03-11 11:18:47', '2013-03-11 11:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_categories`
--

CREATE TABLE IF NOT EXISTS `blog_post_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `rss_channel_title` varchar(255) DEFAULT NULL,
  `rss_channel_description` text,
  `blog_post_count` int(11) NOT NULL DEFAULT '0',
  `under_blog_post_count` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog_post_categories`
--

INSERT INTO `blog_post_categories` (`id`, `parent_id`, `lft`, `rght`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `rss_channel_title`, `rss_channel_description`, `blog_post_count`, `under_blog_post_count`, `created`, `modified`) VALUES
(1, NULL, 1, 2, 'News', 'news', 'news', 'news', 'news', '', 'news', 1, 1, '2013-03-11 11:17:17', '2013-03-11 11:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_categories_blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_post_categories_blog_posts` (
  `blog_post_category_id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL,
  PRIMARY KEY (`blog_post_category_id`,`blog_post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post_categories_blog_posts`
--

INSERT INTO `blog_post_categories_blog_posts` (`blog_post_category_id`, `blog_post_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_tags`
--

CREATE TABLE IF NOT EXISTS `blog_post_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `rss_channel_title` varchar(255) DEFAULT NULL,
  `rss_channel_description` text,
  `blog_post_count` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog_post_tags`
--

INSERT INTO `blog_post_tags` (`id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `rss_channel_title`, `rss_channel_description`, `blog_post_count`, `created`, `modified`) VALUES
(1, 'demo tag', 'demotag', 'demo', 'demo', 'demo', 'demo', 'demo', 1, '2013-03-11 11:24:12', '2013-03-11 11:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_tags_blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_post_tags_blog_posts` (
  `blog_post_tag_id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL,
  PRIMARY KEY (`blog_post_tag_id`,`blog_post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post_tags_blog_posts`
--

INSERT INTO `blog_post_tags_blog_posts` (`blog_post_tag_id`, `blog_post_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_settings`
--

CREATE TABLE IF NOT EXISTS `blog_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting` varchar(255) NOT NULL,
  `setting_text` varchar(255) NOT NULL,
  `tip` varchar(255) DEFAULT NULL,
  `value` text,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_text_UNIQUE` (`setting_text`),
  UNIQUE KEY `setting_UNIQUE` (`setting`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `blog_settings`
--

INSERT INTO `blog_settings` (`id`, `setting`, `setting_text`, `tip`, `value`, `modified`) VALUES
(1, 'meta_title', 'Meta Title', NULL, 'My New Blog', NULL),
(2, 'meta_description', 'Meta Description', NULL, '', '0000-00-00 00:00:00'),
(3, 'meta_keywords', 'Meta Keywords', NULL, '', NULL),
(4, 'rss_channel_title', 'RSS Channel Title', NULL, 'My New Blog', NULL),
(5, 'rss_channel_description', 'RSS Channel Description', NULL, '', NULL),
(6, 'show_summary_on_post_view', 'Show post summary on post detail page?', '''Yes'' or ''No''', 'No', NULL),
(7, 'show_categories_on_post_view', 'Show post categories on post detail page?', '''Yes'' or ''No''', 'No', NULL),
(8, 'show_tags_on_post_view', 'Show post tags on post detail page?', '''Yes'' or ''No''', 'Yes', NULL),
(9, 'use_summary_or_body_on_post_index', 'Use the summary or the post body on the post index page?', '''Summary'' or ''Body''', 'Summary', NULL),
(10, 'use_summary_or_body_in_rss_feed', 'Use the summary or the post body in the RSS feed?', '''Summary'' or ''Body''', 'Body', NULL),
(11, 'published_format_on_post_index', 'Published date/time format on post index page', 'e.g. ''d M Y'' see php.net/date', '<\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\d\\a\\y">d</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\m\\o\\n\\t\\h">M</\\s\\p\\a\\n> <\\s\\pa\\n \\c\\l\\a\\s\\s="\\y\\e\\a\\r">y</\\s\\p\\a\\n>', NULL),
(12, 'published_format_on_post_view', 'Published date/time format on post view page', 'e.g. ''d M Y'' see php.net/date', '<\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\d\\a\\y">d</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\m\\o\\n\\t\\h">M</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\y\\e\\a\\r">y</\\s\\p\\a\\n>', NULL),
(13, 'og:site_name', 'Open Graph: Site Name', NULL, 'My New Blog', NULL),
(14, 'fb_admins', 'Facebook Admins', NULL, NULL, NULL),
(15, 'use_disqus', 'Use Disqus', '''Yes'' or ''No''', 'No', NULL),
(16, 'disqus_shortname', 'Disqus Shortname', NULL, NULL, NULL),
(17, 'disqus_developer', 'Disqus Developer Mode', '''Yes'' or ''No''', 'Yes', NULL),
(18, 'show_share_links', 'Show the share buttons on blog posts?', '''Yes'' or ''No''', 'Yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alert_email` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT 'Male' COMMENT 'Male, Female',
  `birthdate` varchar(255) DEFAULT '00-00-0000',
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `ip_address` varchar(16) DEFAULT NULL,
  `status` enum('Active','Inactive','Suspend','Not_Varified') DEFAULT 'Inactive' COMMENT '''Active'',''Inactive'',''Suspend'',''Not_Varified''',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=yes,0=no',
  `post_code` int(11) DEFAULT NULL,
  `address` text,
  `acc_type` varchar(255) DEFAULT NULL,
  `id_facebook` varchar(255) DEFAULT NULL,
  `description` text,
  `preference` enum('Flager','Hero') NOT NULL DEFAULT 'Flager',
  `id_hero_level` int(11) DEFAULT NULL,
  `game_points` int(11) NOT NULL DEFAULT '0',
  `hero_points` int(11) NOT NULL DEFAULT '0',
  `flagger_points` int(11) NOT NULL DEFAULT '0',
  `id_badges` varchar(255) DEFAULT NULL,
  `user_type` enum('normal','corporate') NOT NULL DEFAULT 'normal' COMMENT '''normal'',''corporate''',
  `company_name` varchar(255) DEFAULT NULL,
  `business_reg_no` varchar(255) DEFAULT NULL,
  `established_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `password`, `alert_email`, `profile_image`, `first_name`, `last_name`, `gender`, `birthdate`, `country`, `city`, `contact_no`, `last_login_date`, `create_date`, `ip_address`, `status`, `is_delete`, `post_code`, `address`, `acc_type`, `id_facebook`, `description`, `preference`, `id_hero_level`, `game_points`, `hero_points`, `flagger_points`, `id_badges`, `user_type`, `company_name`, `business_reg_no`, `established_date`) VALUES
(1, 'Vishal Gosai', 'vishal.gosai@rlogical.com', 'e10adc3949ba59abbe56e057f20f883e', 'vishal.gosai@rlogical.com', 'img/profile_image/1356760931.jpg', 'vishal', 'gosai', 'Male', '5-2-1980', '1', '  ', '', '2013-02-04 19:43:31', '2012-06-26 18:11:45', NULL, 'Active', 0, 45, '', NULL, NULL, 'good one :)', 'Flager', NULL, 16, 52, 69, '1,2,3,4,6,7,8,9', 'normal', 'vishall', '888888', '1915'),
(2, 'Ken Toh', 'kentoh83@yahoo.com.sg', 'b9c766d31e9afbf9716576a718132c35', 'kentoh83@yahoo.com.sg', '', 'Ken ', 'Toh', 'Female', '27-5-1983', '1', 'Singapore ', '+659188962', '2013-01-17 23:20:26', '2012-06-26 18:46:13', '115.66.248.178', 'Active', 0, 521164, 'Blk 164 Tampines st 12 #10-275 ', 'Facebook', '757321311', 'Founder of FlagAHero.com ok', 'Flager', NULL, 9, 32, 136, '1,3,4,6,7,8,21', 'normal', '', '', '0'),
(3, NULL, 'kentoh@flagahero.com', 'e2fc714c4727ee9395f324cd2e7f331f', 'kentoh@flagahero.com', 'img/profile_image/1356523996.jpg', 'FlagaHero', 'Toh', 'Male', '0-0-0', '1', 'spore     ', '6591888888', '2013-01-08 23:46:54', '2012-06-26 21:10:46', NULL, 'Active', 0, 398007, '', NULL, NULL, '', 'Flager', NULL, 5, 40, 30, '', 'corporate', 'flagahero', '2012err', '2012'),
(4, NULL, 'hdave2010@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'hdave2010@gmail.com', 'img/profile_image/1352362976.jpg', 'harshit ', 'shah', 'Male', '00-00-0000', '1', '   ', '', '2013-02-01 21:08:52', '2012-06-26 21:17:11', NULL, 'Active', 0, 4564, 'dasf', NULL, NULL, NULL, 'Flager', NULL, 0, 72, 43, '1,2,3,4,6,7,8,15,22', 'corporate', 'rlogical', '5ds4asdf65', '0'),
(5, NULL, 'mrudul.ce@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'mrudul.ce@gmail.com', 'img/profile_image/1356528882.jpg', 'Mrudul', 'Shah', 'Male', '0-0-0', '1', 'San Jose      ', '', '2013-02-02 19:21:28', '2012-06-26 21:34:07', NULL, 'Active', 0, 0, '', NULL, NULL, '', 'Flager', NULL, 5, 90, 63, '1,2,7,8', 'corporate', 'Mrudul''s company', '', '2008'),
(6, 'Yumi Wong', 'koichi_aiba@yahoo.com.sg', 'e19d5cd5af0378da05f63f891c7467af', 'koichi_aiba@yahoo.com.sg', 'img/profile_image/1348661041.jpeg', 'Yumi', 'Wong', 'Female', '9-5-1989', '1', 'Singapore', '33453453', '2013-01-17 23:13:28', '2012-06-26 22:19:37', '116.15.64.34', 'Active', 0, 1234, 'abcd', 'Facebook', '690642150', 'asdasd', 'Flager', NULL, 5, 24, 26, '1,2,3,4,6,7,8', 'normal', '', '', ''),
(7, NULL, 'yumiwong@flagahero.com', 'e19d5cd5af0378da05f63f891c7467af', 'yumiwong@flagahero.com', NULL, 'Yumi', 'Wong', 'Male', '00-00-0000', '1', NULL, NULL, '2012-11-23 01:46:22', '2012-06-27 21:50:44', NULL, 'Active', 0, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 0, 0, '1,2,3,4,6,7,8,21', 'normal', '', '', ''),
(8, 'Omkar Yadav', 'omkar61422@gmail.com', '7709161d3d80873e097e95c7b6aadaa9', 'omkar61422@gmail.com', NULL, 'Omkar', 'Yadav', 'Male', '00-00-0000', '1', NULL, NULL, NULL, '2012-07-07 18:46:45', '122.173.181.90', 'Suspend', 0, NULL, NULL, 'Facebook', '1135158904', NULL, 'Flager', NULL, 0, 0, 0, '', 'normal', '', '', ''),
(9, NULL, 'dolphin_8484@hotmail.com', 'e19d5cd5af0378da05f63f891c7467af', 'dolphin_8484@hotmail.com', 'img/profile_image/1355740933.jpg', 'ABC Pte Ltd', 'ABC', 'Male', '00-00-0000', '1', NULL, NULL, '2012-12-17 18:39:20', '2012-07-10 00:52:33', NULL, 'Active', 0, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 9, 0, '1,2,4,6,7,8', 'corporate', '', '', ''),
(13, 'Ramde Solanki', 'ramde.rkfuturetech@gmail.com', '3eaafd4ef4f97e816e28c7010956ba77', 'ramde.rkfuturetech@gmail.com', NULL, 'Ramde', 'Solanki', 'Male', '00-00-0000', '1', NULL, NULL, '2012-09-29 20:56:42', '2012-07-25 19:27:40', '115.115.70.66', 'Active', 0, NULL, NULL, 'Facebook', '100003165851737', NULL, 'Flager', NULL, 0, 0, 0, NULL, 'normal', '', '', ''),
(12, 'Stefan Michal', 'amirkha123@gmail.com', '36dd213ea616f0a925bd5e1066601fbd', 'amirkha123@gmail.com', NULL, 'Stefan', 'Michal', 'Male', '00-00-0000', '1', NULL, NULL, '2012-10-27 21:59:39', '2012-07-25 18:44:55', '115.115.70.66', 'Active', 1, NULL, NULL, 'Facebook', '100001976258438', NULL, 'Flager', NULL, 0, 0, 8, '1,2,3,4,6,7,8', 'normal', '', '', ''),
(14, NULL, 'admin@mylifephotography.net', '', 'admin@mylifephotography.net', NULL, 'mylife', 'phooto', 'Male', '00-00-0000', '1', NULL, NULL, NULL, '2012-07-31 01:15:33', NULL, 'Inactive', 0, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 0, 0, NULL, 'normal', '', '', ''),
(15, NULL, 'kentoh83@facebook.com', '2505dea9464029548cec22877284ae60', 'kentoh83@facebook.com', NULL, 'ken', 'fb', 'Male', '00-00-0000', '1', NULL, NULL, NULL, '2012-07-31 01:33:10', NULL, 'Active', 0, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 0, 0, '', 'normal', '', '', ''),
(39, NULL, 'errands@flagahero.com', 'e2fc714c4727ee9395f324cd2e7f331f', 'errands@flagahero.com', 'img/profile_image/1357362243.jpg', 'errands', 'singapore', 'Male', '00-00-0000', '1', '   ', '', '2013-01-06 23:16:31', '2012-12-01 12:07:21', NULL, 'Active', 0, 0, '', NULL, NULL, NULL, 'Flager', NULL, 0, 14, 15, '1,2,3,4,6,7,8,9,21', 'corporate', 'haha', '123', '1948'),
(17, NULL, 'brijesh@rlogical.com', 'e10adc3949ba59abbe56e057f20f883e', 'brijesh@rlogical.com', NULL, 'brijesh', 'patel', 'Male', '00-00-0000', '1', NULL, NULL, '2013-02-02 17:37:27', '2012-07-31 17:18:57', NULL, 'Active', 1, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 0, 0, '', 'normal', '', '', ''),
(21, NULL, 'cheowfern@gmail.com', 'cd93e7947037ab1cdce74c9845f76d5a', 'cheowfern@gmail.com', NULL, 'Cheow Fern', 'Fern', 'Male', '00-00-0000', '1', NULL, NULL, '2012-08-28 22:42:43', '2012-08-28 12:17:11', NULL, 'Active', 0, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 10, 0, '1', 'normal', '', '', ''),
(22, 'Raquel Alex', 'raquel@supernovamedia.biz', '5e75bb6b0617ad5475cd7c8ee572aa5b', 'raquel@supernovamedia.biz', NULL, 'Raquel', 'Alex', 'Male', '00-00-0000', '1', NULL, NULL, NULL, '2012-08-28 12:24:15', '121.7.121.198', 'Active', 0, NULL, NULL, 'Facebook', '100003277297554', NULL, 'Flager', NULL, 0, 0, 0, '1', 'normal', '', '', ''),
(23, NULL, 'wongcf90@gmail.com', 'cd93e7947037ab1cdce74c9845f76d5a', 'wongcf90@gmail.com', NULL, 'fern', 'wong', 'Male', '00-00-0000', '1', NULL, NULL, '2012-08-28 23:13:11', '2012-08-28 14:22:17', NULL, 'Active', 0, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 0, 10, '', 'normal', '', '', ''),
(49, NULL, 'rlogicaltechnologies@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', 'img/profile_image/1359733800.jpg', 'Harshit', 'Shah', 'Male', '00-00-0000', 'singapore', NULL, NULL, '2013-02-01 21:21:49', '2013-01-09 18:43:54', NULL, 'Active', 0, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 0, 10, '1', 'normal', '', '', ''),
(27, NULL, 'tushar@rlogical.com', 'e10adc3949ba59abbe56e057f20f883e', 'tushar@rlogical.com', NULL, 'tushar', 'kachadiya', 'Male', '00-00-0000', '1', NULL, NULL, NULL, '2012-11-05 20:08:13', NULL, 'Active', 1, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 0, 0, NULL, 'normal', '', '', ''),
(28, NULL, 'rahulpanch@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'rahulpanch@gmail.com', 'img/profile_image/1352361718.png', 'Rahul', 'Panchal', 'Male', '00-00-0000', '1', NULL, NULL, '2012-11-08 16:01:49', '2012-11-08 16:00:11', NULL, 'Active', 0, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 0, 0, NULL, 'normal', '', '', ''),
(29, NULL, 'vishal.gosai1@rlogical.com', 'd41d8cd98f00b204e9800998ecf8427e', 'vishal.gosai1@rlogical.com', NULL, 'vishal', 'gosai', 'Male', '00-00-0000', 'singapore', NULL, NULL, NULL, '2012-11-20 14:12:01', NULL, 'Not_Varified', 1, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 0, 0, NULL, 'normal', '', '', ''),
(43, NULL, 'yiangmeng@gmail.com', '', 'yiangmeng@gmail.com', NULL, 'Yiang', 'Meng', 'Male', '00-00-0000', '1', NULL, NULL, '2012-12-29 15:26:56', '2012-12-29 15:26:28', '116.15.221.155', 'Active', 1, NULL, NULL, 'Facebook', '731792871', NULL, 'Flager', NULL, 0, 0, 0, NULL, 'normal', '', '', ''),
(42, NULL, 'test.vijay.gosai@gmail.com', 'abcd', 'test.vijay.gosai@gmail.com', NULL, 'vishal', 'gosai', 'Male', '00-00-0000', NULL, NULL, NULL, '2013-01-11 18:52:46', NULL, NULL, 'Active', 0, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 0, 0, '', 'normal', '', '', ''),
(37, NULL, 'marketing@flagahero.com', 'e2fc714c4727ee9395f324cd2e7f331f', 'marketing@flagahero.com', NULL, 'lol', 'ok', 'Female', '0-0-0', '1', '', '1212+', '2012-12-01 11:40:00', '2012-11-30 22:51:01', NULL, 'Active', 1, 0, '', NULL, NULL, 'lolll', 'Flager', NULL, 0, 0, 0, '21', 'normal', '', '', ''),
(36, NULL, 'mrudul_ce@yahoo.co.in', 'e10adc3949ba59abbe56e057f20f883e', 'mrudul_ce@yahoo.co.in', NULL, 'Mrudul', 'Shah', 'Male', '00-00-0000', 'singapore', NULL, NULL, '2012-12-13 21:43:58', '2012-11-30 22:49:29', NULL, 'Not_Varified', 0, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 0, 0, NULL, 'normal', '', '', ''),
(45, NULL, 'help@flagahero.com', 'e2fc714c4727ee9395f324cd2e7f331f', 'help@flagahero.com', NULL, 'Help', 'Last', 'Male', '00-00-0000', 'singapore', NULL, NULL, '2013-01-01 20:15:43', '2012-12-31 20:55:28', NULL, 'Active', 0, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 0, 0, '1', 'normal', '', '', ''),
(46, NULL, 'dipen@rlogical.com', '', 'dipen@rlogical.com', 'img/profile_image/face_100004071684831.jpg', 'Dipen', 'RLogical', 'Male', '00-00-0000', '1', NULL, NULL, '2013-01-07 18:08:39', '2013-01-07 17:41:00', '115.115.70.66', 'Active', 0, NULL, NULL, 'Facebook', '100004071684831', NULL, 'Flager', NULL, 0, 0, 0, NULL, 'normal', '', '', ''),
(47, NULL, 'hash216@gmail.com', '', 'hash216@gmail.com', 'img/profile_image/face_100000184173313.jpg', 'Harshit', 'Shah', 'Male', '00-00-0000', '1', NULL, NULL, NULL, '2013-01-08 15:21:03', '115.115.70.66', 'Active', 1, NULL, NULL, 'Facebook', '100000184173313', NULL, 'Flager', NULL, 0, 0, 0, NULL, 'normal', '', '', ''),
(57, NULL, 'mrudul@rlogical.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'Mrudul', 'Shah', 'Male', '00-00-0000', 'singapore', NULL, NULL, NULL, '2013-02-02 18:33:25', NULL, 'Not_Varified', 0, NULL, NULL, NULL, NULL, NULL, 'Flager', NULL, 0, 0, 0, NULL, 'normal', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
