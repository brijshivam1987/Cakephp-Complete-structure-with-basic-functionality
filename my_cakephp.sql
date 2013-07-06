-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 06, 2013 at 12:22 PM
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
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `username`, `email`, `password`, `status`, `profile_image`, `reg_date`) VALUES
(1, 'Brijesh Patel', 'brij_shivam1987', 'brijesh@rlogical.com', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '1_foto.jpg', '2013-07-02 12:59:10'),
(2, 'Bhavesh Patel', 'Bhavesh', 'bhavesh.patel@rlogical.com', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '', '2013-07-02 01:00:09'),
(3, 'Amit Patel', 'Amit', 'amit@rlogical.com', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '', '2013-07-02 02:14:43');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `slug`, `summary`, `body`, `published`, `sticky`, `in_rss`, `meta_title`, `meta_description`, `meta_keywords`, `created`, `modified`) VALUES
(1, 'Login with facebook', 'fblogin', 'Login with facebook', '<p><strong>Database</strong><br> Sample database&nbsp;<em>users</em>&nbsp;table columns id, email, oauth_uid, oauth_provider and username.</p><div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="mysql"><span style="color: #990099; font-weight: bold;">CREATE</span> <span style="color: #990099; font-weight: bold;">TABLE</span> users\r\n<span style="color: #FF00FF;">(</span>\r\nid <span style="color: #999900; font-weight: bold;">INT</span> <span style="color: #990099; font-weight: bold;">PRIMARY KEY</span> <span style="color: #FF9900; font-weight: bold;">AUTO_INCREMENT</span><span style="color: #000033;">,</span>\r\nemail <span style="color: #999900; font-weight: bold;">VARCHAR</span><span style="color: #FF00FF;">(</span><span style="color: #008080;">70</span><span style="color: #FF00FF;">)</span><span style="color: #000033;">,</span>\r\noauth_uid <span style="color: #999900; font-weight: bold;">VARCHAR</span><span style="color: #FF00FF;">(</span><span style="color: #008080;">200</span><span style="color: #FF00FF;">)</span><span style="color: #000033;">,</span>\r\noauth_provider <span style="color: #999900; font-weight: bold;">VARCHAR</span><span style="color: #FF00FF;">(</span><span style="color: #008080;">200</span><span style="color: #FF00FF;">)</span><span style="color: #000033;">,</span>\r\nusername <span style="color: #999900; font-weight: bold;">VARCHAR</span><span style="color: #FF00FF;">(</span><span style="color: #008080;">100</span><span style="color: #FF00FF;">)</span><span style="color: #000033;">,</span>\r\ntwitter_oauth_token <span style="color: #999900; font-weight: bold;">VARCHAR</span><span style="color: #FF00FF;">(</span><span style="color: #008080;">200</span><span style="color: #FF00FF;">)</span><span style="color: #000033;">,</span>\r\ntwitter_oauth_token_secret <span style="color: #999900; font-weight: bold;">VARCHAR</span><span style="color: #FF00FF;">(</span><span style="color: #008080;">200</span><span style="color: #FF00FF;">)</span>\r\n<span style="color: #FF00FF;">)</span><span style="color: #000033;">;</span></pre></td></tr></tbody></table></div><p>&nbsp;</p><p>The tutorial contains three folders called&nbsp;<em>facebook</em>,<em>twitter</em>&nbsp;and&nbsp;<em>config</em>&nbsp;with PHP files.<br> <strong>facebook</strong>&nbsp;//Facebook OAUTH library<br> <strong>twitter</strong>&nbsp;//Twitter OAUTH library<br> <strong>config</strong><br> â€“&nbsp;<em>functions.php&nbsp;</em><br> â€“&nbsp;<em>dbconfig.php</em>&nbsp;//Database connection<br> â€“&nbsp;<em>fbconfig.php</em>&nbsp;//Facebook API connection<br> â€“&nbsp;<em>twconfig.php</em>&nbsp;//Twitter API connection<br> index.php<br> home.php<br> login-twitter.php<br> login-facebook.php<br> getTwitterData.php</p><h2>Facebook Setup</h2><p>You have to&nbsp;<a href="http://www.facebook.com/developers/createapp.php" rel="nofollow" target="_blank">create a application</a>. Facebook will provide you&nbsp;<em>app id</em>&nbsp;and&nbsp;<em>app secret id</em>, just modify following code<br> <strong>fcconfig.php</strong></p><div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="php"><span style="color: #339933;">&lt;</span> ?php\r\n<span style="color: #990000;">define</span><span style="color: #009900;">(</span><span style="color: #0000ff;">''APP_ID''</span><span style="color: #339933;">,</span> <span style="color: #0000ff;">''Facebook APP ID''</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>\r\n<span style="color: #990000;">define</span><span style="color: #009900;">(</span><span style="color: #0000ff;">''APP_SECRET''</span><span style="color: #339933;">,</span> <span style="color: #0000ff;">''Facebook Secret ID''</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>\r\n<span style="font-weight: bold;">?&gt;</span></pre></td></tr></tbody></table></div><h3>Twitter Setup</h3><p>Create\r\n a twitter application click here. Some like Facebook Twitter provide \r\nyou consumer key amd consumer secret key using these modify following \r\ncode.<br> <strong>twconfig.php</strong></p><div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="php"><span style="color: #339933;">&lt;</span> ?php\r\n<span style="color: #990000;">define</span><span style="color: #009900;">(</span><span style="color: #0000ff;">''YOUR_CONSUMER_KEY''</span><span style="color: #339933;">,</span> <span style="color: #0000ff;">''Twitter Key''</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>\r\n<span style="color: #990000;">define</span><span style="color: #009900;">(</span><span style="color: #0000ff;">''YOUR_CONSUMER_SECRET''</span><span style="color: #339933;">,</span> <span style="color: #0000ff;">''Twitter Secret Key''</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>\r\n<span style="font-weight: bold;">?&gt;</span></pre></td></tr></tbody></table></div><p><strong>dbconfig.php</strong><br> Database configuration file.</p><div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="mysql"><span style="color: #CC0099;">&lt;</span> ?php\r\ndefine<span style="color: #FF00FF;">(</span><span style="color: #008000;">''DB<span style="color: #008080; font-weight: bold;">_</span>SERVER''</span><span style="color: #000033;">,</span> <span style="color: #008000;">''localhost''</span><span style="color: #FF00FF;">)</span><span style="color: #000033;">;</span>\r\ndefine<span style="color: #FF00FF;">(</span><span style="color: #008000;">''DB<span style="color: #008080; font-weight: bold;">_</span>USERNAME''</span><span style="color: #000033;">,</span> <span style="color: #008000;">''User Name''</span><span style="color: #FF00FF;">)</span><span style="color: #000033;">;</span>\r\ndefine<span style="color: #FF00FF;">(</span><span style="color: #008000;">''DB<span style="color: #008080; font-weight: bold;">_</span>PASSWORD''</span><span style="color: #000033;">,</span> <span style="color: #008000;">''Password''</span><span style="color: #FF00FF;">)</span><span style="color: #000033;">;</span>\r\ndefine<span style="color: #FF00FF;">(</span><span style="color: #008000;">''DB<span style="color: #008080; font-weight: bold;">_</span>DATABASE''</span><span style="color: #000033;">,</span> <span style="color: #008000;">''DATABASE''</span><span style="color: #FF00FF;">)</span><span style="color: #000033;">;</span>\r\n$connection <span style="color: #CC0099;">=</span> mysql_connect<span style="color: #FF00FF;">(</span>DB_SERVER<span style="color: #000033;">,</span> DB_USERNAME<span style="color: #000033;">,</span> DB_PASSWORD<span style="color: #FF00FF;">)</span> <span style="color: #CC0099; font-weight: bold;">or</span> die<span style="color: #FF00FF;">(</span>mysql_error<span style="color: #FF00FF;">(</span><span style="color: #FF00FF;">)</span><span style="color: #FF00FF;">)</span><span style="color: #000033;">;</span>\r\n$database <span style="color: #CC0099;">=</span> mysql_select_db<span style="color: #FF00FF;">(</span>DB_DATABASE<span style="color: #FF00FF;">)</span> <span style="color: #CC0099; font-weight: bold;">or</span> die<span style="color: #FF00FF;">(</span>mysql_error<span style="color: #FF00FF;">(</span><span style="color: #FF00FF;">)</span><span style="color: #FF00FF;">)</span><span style="color: #000033;">;</span>\r\n?<span style="color: #CC0099;">&gt;</span></pre></td></tr></tbody></table></div><p><strong>login-twitter.php</strong><br> In root directory find out the below line at&nbsp;<em>login-twitter.php</em>&nbsp;code and replace<em>yourwebsite</em>.</p><div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="php"><span style="color: #000088;">$request_token</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$twitteroauth</span><span style="color: #339933;">-&amp;</span>gt<span style="color: #339933;">;</span>getRequestToken<span style="color: #009900;">(</span><span style="color: #0000ff;">''http://yourwebsite.com/getTwitterData.php''</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div><p><strong>index.php</strong><br> If you want to modify your web project existing login or index pages, just use following code.</p><div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="php"><span style="color: #339933;">&lt;</span> ?php\r\n<span style="color: #990000;">session_start</span><span style="color: #009900;">(</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>\r\n<span style="color: #b1b100;">if</span> <span style="color: #009900;">(</span><span style="color: #990000;">isset</span><span style="color: #009900;">(</span><span style="color: #000088;">$_SESSION</span><span style="color: #009900;">[</span><span style="color: #0000ff;">''id''</span><span style="color: #009900;">]</span><span style="color: #009900;">)</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>\r\n<span style="color: #666666; font-style: italic;">// Redirection to login page twitter or facebook</span>\r\n<span style="color: #990000;">header</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"location: home.php"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>\r\n<span style="color: #009900;">}</span>\r\n<span style="color: #b1b100;">if</span> <span style="color: #009900;">(</span><span style="color: #990000;">array_key_exists</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"login"</span><span style="color: #339933;">,</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">)</span><span style="color: #009900;">)</span>\r\n<span style="color: #009900;">{</span>\r\n<span style="color: #000088;">$oauth_provider</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">[</span><span style="color: #0000ff;">''oauth_provider''</span><span style="color: #009900;">]</span><span style="color: #339933;">;</span>\r\n<span style="color: #b1b100;">if</span> <span style="color: #009900;">(</span><span style="color: #000088;">$oauth_provider</span> <span style="color: #339933;">==</span> <span style="color: #0000ff;">''twitter''</span><span style="color: #009900;">)</span>\r\n<span style="color: #009900;">{</span>\r\n<span style="color: #990000;">header</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"Location: login-twitter.php"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>\r\n<span style="color: #009900;">}</span>\r\n<span style="color: #b1b100;">else</span> <span style="color: #b1b100;">if</span> <span style="color: #009900;">(</span><span style="color: #000088;">$oauth_provider</span> <span style="color: #339933;">==</span> <span style="color: #0000ff;">''facebook''</span><span style="color: #009900;">)</span>\r\n <span style="color: #009900;">{</span>\r\n<span style="color: #990000;">header</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"Location: login-facebook.php"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>\r\n<span style="color: #009900;">}</span>\r\n<span style="color: #009900;">}</span>\r\n?<span style="color: #339933;">&amp;</span>gt<span style="color: #339933;">;</span>\r\n<span style="color: #666666; font-style: italic;">//HTML Code</span>\r\n<span style="color: #339933;">&lt;</span>a href<span style="color: #339933;">=</span><span style="color: #0000ff;">"?login&amp;amp;oauth_provider=twitter"</span><span style="color: #339933;">&gt;</span>Twitter_Login\r\n<span style="color: #339933;">&lt;</span>a href<span style="color: #339933;">=</span><span style="color: #0000ff;">"?login&amp;amp;oauth_provider=facebook"</span><span style="color: #339933;">&gt;</span>Facebook_Login<span style="color: #339933;">&lt;/</span>a<span style="color: #339933;">&gt;</span></pre></td></tr></tbody></table></div>', 0, 0, 1, 'fblogin', 'Login with facebook', 'Login with facebook', '2013-07-05 16:12:31', '2013-07-05 16:36:09');

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
(1, NULL, 1, 2, 'PHP', 'php', 'PHP Article', 'html,jquery,ajax', 'html,jquery,ajax', 'php,html,jquery,ajax', 'html,jquery,ajax', 0, 0, '2013-07-05 16:09:03', '2013-07-05 16:26:53');

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
(1, 'Magento', 'magento', 'Magento', 'magneto ecommerce', 'magneto', 'magneto ecommerce', 'magneto ecommerce', 0, '2013-07-05 16:10:20', '2013-07-05 16:10:20');

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
(1, 'meta_title', 'Meta Title', NULL, 'My New Blog', '2013-06-26 14:26:44'),
(2, 'meta_description', 'Meta Description', NULL, '', '2013-06-26 16:25:49'),
(3, 'meta_keywords', 'Meta Keywords', NULL, '', NULL),
(4, 'rss_channel_title', 'RSS Channel Title', NULL, 'My New Blog', NULL),
(5, 'rss_channel_description', 'RSS Channel Description', NULL, '', NULL),
(6, 'show_summary_on_post_view', 'Show post summary on post detail page?', '''Yes'' or ''No''', 'No', NULL),
(7, 'show_categories_on_post_view', 'Show post categories on post detail page?', '''Yes'' or ''No''', 'No', NULL),
(8, 'show_tags_on_post_view', 'Show post tags on post detail page?', '''Yes'' or ''No''', 'Yes', NULL),
(9, 'use_summary_or_body_on_post_index', 'Use the summary or the post body on the post index page?', '''Summary'' or ''Body''', 'Summary', NULL),
(10, 'use_summary_or_body_in_rss_feed', 'Use the summary or the post body in the RSS feed?', '''Summary'' or ''Body''', 'Body', NULL),
(11, 'published_format_on_post_index', 'Published date/time format on post index page', 'e.g. ''d M Y'' see php.net/date', '<\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\d\\a\\y">d</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\m\\o\\n\\t\\h">M</\\s\\p\\a\\n> <\\s\\pa\\n \\c\\l\\a\\s\\s="\\y\\e\\a\\r">y</\\s\\p\\a\\n>', '2013-06-26 13:25:40'),
(12, 'published_format_on_post_view', 'Published date/time format on post view page', 'e.g. ''d M Y'' see php.net/date', '<\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\d\\a\\y">d</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\m\\o\\n\\t\\h">M</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\y\\e\\a\\r">y</\\s\\p\\a\\n>', NULL),
(13, 'og:site_name', 'Open Graph: Site Name', NULL, 'My New Blog', NULL),
(14, 'fb_admins', 'Facebook Admins', NULL, NULL, NULL),
(15, 'use_disqus', 'Use Disqus', '''Yes'' or ''No''', 'No', NULL),
(16, 'disqus_shortname', 'Disqus Shortname', NULL, NULL, NULL),
(17, 'disqus_developer', 'Disqus Developer Mode', '''Yes'' or ''No''', 'Yes', NULL),
(18, 'show_share_links', 'Show the share buttons on blog posts?', '''Yes'' or ''No''', 'Yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `elfinder_file`
--

CREATE TABLE IF NOT EXISTS `elfinder_file` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(7) unsigned NOT NULL,
  `name` varchar(256) NOT NULL,
  `content` longblob NOT NULL,
  `size` int(10) unsigned NOT NULL DEFAULT '0',
  `mtime` int(10) unsigned NOT NULL,
  `mime` varchar(256) NOT NULL DEFAULT 'unknown',
  `read` enum('1','0') NOT NULL DEFAULT '1',
  `write` enum('1','0') NOT NULL DEFAULT '1',
  `locked` enum('1','0') NOT NULL DEFAULT '0',
  `hidden` enum('1','0') NOT NULL DEFAULT '0',
  `width` int(5) NOT NULL,
  `height` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `parent_name` (`parent_id`,`name`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `elfinder_file`
--

INSERT INTO `elfinder_file` (`id`, `parent_id`, `name`, `content`, `size`, `mtime`, `mime`, `read`, `write`, `locked`, `hidden`, `width`, `height`) VALUES
(1, 0, 'DATABASE', '', 0, 0, 'directory', '1', '1', '0', '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_groups`
--

CREATE TABLE IF NOT EXISTS `newsletter_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `newsletter_groups`
--

INSERT INTO `newsletter_groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'default', '2013-06-29 00:00:00', '2013-07-05 15:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_groups_mails`
--

CREATE TABLE IF NOT EXISTS `newsletter_groups_mails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `newsletter_mail_id` int(10) unsigned NOT NULL,
  `newsletter_group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk` (`newsletter_mail_id`,`newsletter_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_groups_subscriptions`
--

CREATE TABLE IF NOT EXISTS `newsletter_groups_subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `newsletter_subscription_id` int(10) unsigned NOT NULL,
  `newsletter_group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Foreign_Keys` (`newsletter_subscription_id`,`newsletter_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `newsletter_groups_subscriptions`
--

INSERT INTO `newsletter_groups_subscriptions` (`id`, `newsletter_subscription_id`, `newsletter_group_id`) VALUES
(6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_mails`
--

CREATE TABLE IF NOT EXISTS `newsletter_mails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(100) DEFAULT NULL,
  `from_email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `content` text,
  `read_confirmation_code` varchar(100) DEFAULT NULL,
  `last_sent_subscription_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sent` int(10) unsigned NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `newsletter_mails`
--

INSERT INTO `newsletter_mails` (`id`, `from`, `from_email`, `subject`, `content`, `read_confirmation_code`, `last_sent_subscription_id`, `sent`, `created`, `modified`) VALUES
(1, 'brijesh Patel', 'brijesh@rlogical.com', 'Test Newsletter', '<b>hello&nbsp;</b>Brijesh&nbsp;<u>Patel&nbsp;</u>', NULL, 0, 0, '2013-05-09 15:23:24', '2013-07-05 15:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_mail_views`
--

CREATE TABLE IF NOT EXISTS `newsletter_mail_views` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `newsletter_mail_id` int(10) unsigned DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk` (`newsletter_mail_id`,`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscriptions`
--

CREATE TABLE IF NOT EXISTS `newsletter_subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `opt_out_date` datetime DEFAULT NULL,
  `confirmation_code` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `newsletter_subscriptions`
--

INSERT INTO `newsletter_subscriptions` (`id`, `name`, `email`, `opt_out_date`, `confirmation_code`, `created`, `modified`) VALUES
(1, 'Brijesh Patel (Gmail)', 'brij.shivam1987@gmail.com', '2013-06-29 18:55:04', '0f869b3ed5cf461afad77582da129ecb', '2013-06-29 06:54:34', '2013-07-05 15:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_direct_payment_responses`
--

CREATE TABLE IF NOT EXISTS `paypal_direct_payment_responses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TIMESTAMP` varchar(255) DEFAULT NULL,
  `CORRELATIONID` varchar(255) DEFAULT NULL,
  `ACK` varchar(255) DEFAULT NULL,
  `VERSION` varchar(255) DEFAULT NULL,
  `BUILD` varchar(255) DEFAULT NULL,
  `AMT` varchar(255) DEFAULT NULL,
  `CURRENCYCODE` varchar(255) DEFAULT NULL,
  `AVSCODE` varchar(255) DEFAULT NULL,
  `CVV2MATCH` varchar(255) DEFAULT NULL,
  `TRANSACTIONID` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `paypal_direct_payment_responses`
--

INSERT INTO `paypal_direct_payment_responses` (`id`, `TIMESTAMP`, `CORRELATIONID`, `ACK`, `VERSION`, `BUILD`, `AMT`, `CURRENCYCODE`, `AVSCODE`, `CVV2MATCH`, `TRANSACTIONID`, `created_date`) VALUES
(1, '2013-04-17T11:03:16Z', '5115b7572e33a', 'Success', '53.0', '5715372', '10.00', 'USD', 'X', 'M', '4AJ54778V8477340L', NULL),
(2, '2013-04-17T11:28:53Z', '9f9a1037f28c', 'Success', '53.0', '5715372', '6.54', 'GBP', 'X', 'M', '4Y394189E39035459', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paypal_express_checkout_payment_customer_details`
--

CREATE TABLE IF NOT EXISTS `paypal_express_checkout_payment_customer_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TOKEN` varchar(255) DEFAULT NULL,
  `TIMESTAMP` varchar(255) DEFAULT NULL,
  `CORRELATIONID` varchar(255) DEFAULT NULL,
  `ACK` varchar(255) DEFAULT NULL,
  `VERSION` varchar(255) DEFAULT NULL,
  `BUILD` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `PAYERID` varchar(255) DEFAULT NULL,
  `PAYERSTATUS` varchar(255) DEFAULT NULL,
  `FIRSTNAME` varchar(255) DEFAULT NULL,
  `LASTNAME` varchar(255) DEFAULT NULL,
  `COUNTRYCODE` varchar(255) DEFAULT NULL,
  `SHIPTONAME` varchar(255) DEFAULT NULL,
  `SHIPTOSTREET` varchar(255) DEFAULT NULL,
  `SHIPTOCITY` varchar(255) DEFAULT NULL,
  `SHIPTOZIP` varchar(255) DEFAULT NULL,
  `SHIPTOCOUNTRYCODE` varchar(255) DEFAULT NULL,
  `SHIPTOCOUNTRYNAME` varchar(255) DEFAULT NULL,
  `ADDRESSSTATUS` varchar(255) DEFAULT NULL,
  `CURRENCYCODE` varchar(255) DEFAULT NULL,
  `AMT` varchar(255) DEFAULT NULL,
  `ITEMAMT` varchar(255) DEFAULT NULL,
  `SHIPPINGAMT` varchar(255) DEFAULT NULL,
  `HANDLINGAMT` varchar(255) DEFAULT NULL,
  `TAXAMT` varchar(255) DEFAULT NULL,
  `INSURANCEAMT` varchar(255) DEFAULT NULL,
  `SHIPDISCAMT` varchar(255) DEFAULT NULL,
  `L_NAME0` varchar(255) DEFAULT NULL,
  `L_QTY0` varchar(255) DEFAULT NULL,
  `L_TAXAMT0` varchar(255) DEFAULT NULL,
  `L_AMT0` varchar(255) DEFAULT NULL,
  `L_DESC0` varchar(255) DEFAULT NULL,
  `L_ITEMWEIGHTVALUE0` varchar(255) DEFAULT NULL,
  `L_ITEMLENGTHVALUE0` varchar(255) DEFAULT NULL,
  `L_ITEMWIDTHVALUE0` varchar(255) DEFAULT NULL,
  `L_ITEMHEIGHTVALUE0` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `paypal_express_checkout_payment_customer_details`
--

INSERT INTO `paypal_express_checkout_payment_customer_details` (`id`, `TOKEN`, `TIMESTAMP`, `CORRELATIONID`, `ACK`, `VERSION`, `BUILD`, `EMAIL`, `PAYERID`, `PAYERSTATUS`, `FIRSTNAME`, `LASTNAME`, `COUNTRYCODE`, `SHIPTONAME`, `SHIPTOSTREET`, `SHIPTOCITY`, `SHIPTOZIP`, `SHIPTOCOUNTRYCODE`, `SHIPTOCOUNTRYNAME`, `ADDRESSSTATUS`, `CURRENCYCODE`, `AMT`, `ITEMAMT`, `SHIPPINGAMT`, `HANDLINGAMT`, `TAXAMT`, `INSURANCEAMT`, `SHIPDISCAMT`, `L_NAME0`, `L_QTY0`, `L_TAXAMT0`, `L_AMT0`, `L_DESC0`, `L_ITEMWEIGHTVALUE0`, `L_ITEMLENGTHVALUE0`, `L_ITEMWIDTHVALUE0`, `L_ITEMHEIGHTVALUE0`, `created_date`) VALUES
(1, 'EC-5F266163AV1222714', '2013-04-17T08:51:59Z', '42a4e652ec156', 'Success', '53.0', '5691908', 'brij.shivam1987-customer@yahoo.com', 'AT5E8LNEPZNK8', 'verified', 'CustomerBrijesh', 'Patel', 'US', 'CustomerBrijesh Patel', '1 Main St', 'San Jose', '95131', 'US', 'United States', 'Confirmed', 'USD', '10.00', '10.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Swedish penis enlargement kit', '1', '0.00', '10.00', 'A description of the thing someone is about to buy', '   0.00000', '   0.00000', '   0.00000', '   0.00000', NULL),
(2, 'EC-2PW905286B6423411', '2013-04-17T11:59:11Z', '9ac1d20c5e353', 'Success', '53.0', '5691908', 'brij.shivam1987-customer@yahoo.com', 'AT5E8LNEPZNK8', 'verified', 'CustomerBrijesh', 'Patel', 'US', 'CustomerBrijesh Patel', '1 Main St', 'San Jose', '95131', 'US', 'United States', 'Confirmed', 'USD', '10.00', '10.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Swedish penis enlargement kit', '1', '0.00', '10.00', 'A description of the thing someone is about to buy', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '2013-04-17 17:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_express_ckeckout_payment_responses`
--

CREATE TABLE IF NOT EXISTS `paypal_express_ckeckout_payment_responses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TOKEN` varchar(255) DEFAULT NULL,
  `TIMESTAMP` varchar(255) DEFAULT NULL,
  `CORRELATIONID` varchar(255) DEFAULT NULL,
  `ACK` varchar(255) DEFAULT NULL,
  `VERSION` varchar(255) DEFAULT NULL,
  `BUILD` varchar(255) DEFAULT NULL,
  `TRANSACTIONID` varchar(255) DEFAULT NULL,
  `TRANSACTIONTYPE` varchar(255) DEFAULT NULL,
  `PAYMENTTYPE` varchar(255) DEFAULT NULL,
  `ORDERTIME` varchar(255) DEFAULT NULL,
  `AMT` varchar(255) DEFAULT NULL,
  `FEEAMT` varchar(255) DEFAULT NULL,
  `TAXAMT` varchar(255) DEFAULT NULL,
  `CURRENCYCODE` varchar(255) DEFAULT NULL,
  `PAYMENTSTATUS` varchar(255) DEFAULT NULL,
  `PENDINGREASON` varchar(255) DEFAULT NULL,
  `REASONCODE` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `paypal_express_ckeckout_payment_responses`
--

INSERT INTO `paypal_express_ckeckout_payment_responses` (`id`, `TOKEN`, `TIMESTAMP`, `CORRELATIONID`, `ACK`, `VERSION`, `BUILD`, `TRANSACTIONID`, `TRANSACTIONTYPE`, `PAYMENTTYPE`, `ORDERTIME`, `AMT`, `FEEAMT`, `TAXAMT`, `CURRENCYCODE`, `PAYMENTSTATUS`, `PENDINGREASON`, `REASONCODE`, `created_date`) VALUES
(1, 'EC-5F266163AV1222714', '2013-04-17T08:52:04Z', '3caa6860e41f6', 'Success', '53.0', '5691908', '48K92733542297641', 'expresscheckout', 'instant', '2013-04-17T08:52:03Z', '10.00', '0.59', '0.00', 'USD', 'Completed', 'None', 'None', NULL),
(2, 'EC-2PW905286B6423411', '2013-04-17T11:59:16Z', '107e520d69844', 'Success', '53.0', '5691908', '86K703229K301490K', 'expresscheckout', 'instant', '2013-04-17T11:59:16Z', '10.00', '0.59', '0.00', 'USD', 'Completed', 'None', 'None', '2013-04-17 17:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `status`, `profile_image`, `reg_date`) VALUES
(1, 'Brijesh Patel', 'brij_shivam1987', 'brijesh@rlogical.com', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '1_brijesh.png', '2013-07-02 12:59:10'),
(2, 'Bhavesh Patel', 'Bhavesh', 'bhavesh.patel@rlogical.com', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '', '2013-07-02 01:00:09'),
(3, 'Amit Patel', 'Amit', 'amit@rlogical.com', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '', '2013-07-02 02:14:43');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
