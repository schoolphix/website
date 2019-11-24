-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2017 at 08:38 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `christhill_website`
--
CREATE DATABASE IF NOT EXISTS `christhill_website` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `christhill_website`;

-- --------------------------------------------------------

--
-- Table structure for table `adminupdate`
--

CREATE TABLE IF NOT EXISTS `adminupdate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `caption` varchar(500) DEFAULT NULL,
  `upload` varchar(500) DEFAULT NULL,
  `content` text,
  `userid` int(10) unsigned NOT NULL,
  `updatetype` varchar(45) NOT NULL,
  `updatemode` varchar(45) DEFAULT NULL,
  `uploadedon` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE IF NOT EXISTS `adminuser` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usernames` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `usertype` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `usernames`, `userid`, `pass`, `usertype`) VALUES
(1, 'Admin User', 'user@admin', 'c028c213ed5efcf30c3f4fc7361dbde0c893c5b7', 'ADMIN'),
(2, 'School User', 'user@school', '45f106ef4d5161e7aa38cf6c666607f25748b6ca', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jobid` int(11) NOT NULL,
  `filename` text NOT NULL,
  `filesize` int(11) NOT NULL,
  `filetype` text NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `createdon` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `name`, `phone`, `email`, `jobid`, `filename`, `filesize`, `filetype`, `filepath`, `createdon`) VALUES
(4, 'Joshua Okoro', '08064505136', 'admin@staffreg.com', 3, 'Applications.docx', 13384, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'C:/wamp/www/webite/jobapplication/Applications.docx', '2016-07-23 13:19:49'),
(5, 'Joshua Okoro', '08064505136', 'admin@staffreg.com', 4, 'Applications.docxab6d210b7168c91f03b30cddc2d7365b', 13384, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'C:/wamp/www/webite/jobapplication/Applications.docxab6d210b7168c91f03b30cddc2d7365b', '2016-07-23 13:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE IF NOT EXISTS `careers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `requirements` text NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdon` datetime NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `title`, `description`, `requirements`, `createdby`, `createdon`, `status`) VALUES
(3, 'Biology Teachers', '<p>Testing</p>', '<p>Testing</p>', 1, '2016-07-20 14:32:13', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE IF NOT EXISTS `carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) DEFAULT NULL,
  `picture_url` varchar(255) DEFAULT NULL,
  `active_status` smallint(1) DEFAULT '1',
  `dateadded` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `caption`, `picture_url`, `active_status`, `dateadded`) VALUES
(25, '<font color="#66CC00">Welcome To The Christhill Schools<br></font>', 'asset/uploads/carousel/20160522_1463898911.png', 1, '2016-05-22 07:35:11'),
(26, '<font color="#66CC00">Welcome To The Christhill Schools<br></font>', 'asset/uploads/carousel/20160522_1463898918.png', 1, '2016-05-22 07:35:18'),
(27, '<font color="#FFFFCC">Fully Functional ICT Center<br></font>', 'asset/uploads/carousel/20160522_1463898959.png', 1, '2016-05-22 07:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `contactsubject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `names` varchar(255) NOT NULL,
  `readmessage` smallint(1) unsigned NOT NULL DEFAULT '0',
  `datesent` datetime NOT NULL,
  `phoneno` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `email`, `contactsubject`, `message`, `names`, `readmessage`, `datesent`, `phoneno`) VALUES
(0000000055, 'esynwanma@gmail.com', 'enquires', 'GOOD DAY SIR/MA,\r\n\r\nPLEASE I WANT TO FIND OUT YOUR BILL FOR CRECHE. I WANT TO ENROL MY LITTLE ONE. I DON''T HAVE ENOUGH TIME TO COME TO THE SCHOOL. THANKS.', 'ESTHER', 1, '2015-01-21 11:39:33', '08034978744');

-- --------------------------------------------------------

--
-- Table structure for table `gallerypicures`
--

CREATE TABLE IF NOT EXISTS `gallerypicures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `imagedirectory` varchar(255) DEFAULT NULL,
  `dateuploaded` varchar(45) NOT NULL,
  `folderid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `gallerypicures`
--

INSERT INTO `gallerypicures` (`id`, `title`, `imagedirectory`, `dateuploaded`, `folderid`) VALUES
(2, NULL, 'albums/20140604_1401888103.jpg', '2014-06-04 14:21:43', 1),
(3, NULL, 'albums/20140630_1404127357.jpg', '2014-06-30 12:22:37', 3),
(4, NULL, 'albums/20140630_1404129106.jpg', '2014-06-30 12:51:46', 3),
(5, NULL, 'albums/20140630_1404129147.jpg', '2014-06-30 12:52:27', 3),
(6, NULL, 'albums/20140630_1404129152.jpg', '2014-06-30 12:52:32', 3),
(7, NULL, 'albums/20140630_1404129173.jpg', '2014-06-30 12:52:53', 3),
(8, NULL, 'albums/20140630_1404129223.jpg', '2014-06-30 12:53:43', 3),
(9, NULL, 'albums/20140630_1404129227.jpg', '2014-06-30 12:53:47', 3),
(10, NULL, 'albums/20140630_1404129317.jpg', '2014-06-30 12:55:17', 3),
(11, NULL, 'albums/20140630_1404129357.jpg', '2014-06-30 12:55:57', 3),
(12, NULL, 'albums/20140630_1404129497.jpg', '2014-06-30 12:58:17', 3),
(13, NULL, 'albums/20140630_1404129504.jpg', '2014-06-30 12:58:24', 3),
(14, NULL, 'albums/20140630_1404129516.jpg', '2014-06-30 12:58:36', 3),
(15, NULL, 'albums/20140630_1404129553.jpg', '2014-06-30 12:59:13', 3),
(16, NULL, 'albums/20140630_1404129558.jpg', '2014-06-30 12:59:18', 3),
(17, NULL, 'albums/20140630_1404129577.jpg', '2014-06-30 12:59:37', 3),
(18, NULL, 'albums/20140630_1404129588.jpg', '2014-06-30 12:59:48', 3),
(19, NULL, 'albums/20140630_1404129599.jpg', '2014-06-30 12:59:59', 3),
(20, NULL, 'albums/20140630_1404129610.jpg', '2014-06-30 13:00:10', 3),
(21, NULL, 'albums/20140630_1404129623.jpg', '2014-06-30 13:00:23', 3),
(22, NULL, 'albums/20140630_1404129628.jpg', '2014-06-30 13:00:28', 3),
(23, NULL, 'albums/20140630_1404129635.jpg', '2014-06-30 13:00:35', 3),
(24, NULL, 'albums/20140630_1404129644.jpg', '2014-06-30 13:00:44', 3),
(25, NULL, 'albums/20140630_1404129654.jpg', '2014-06-30 13:00:54', 3),
(26, NULL, 'albums/20140630_1404129698.jpg', '2014-06-30 13:01:38', 3),
(27, NULL, 'albums/20140630_1404129705.jpg', '2014-06-30 13:01:45', 3),
(28, NULL, 'albums/20140630_1404129714.jpg', '2014-06-30 13:01:54', 3),
(29, NULL, 'albums/20140630_1404129724.jpg', '2014-06-30 13:02:04', 3),
(30, NULL, 'albums/20140630_1404129733.jpg', '2014-06-30 13:02:13', 3),
(31, NULL, 'albums/20140630_1404129747.jpg', '2014-06-30 13:02:27', 3),
(32, NULL, 'albums/20140630_1404129783.jpg', '2014-06-30 13:03:03', 3),
(33, NULL, 'albums/20140630_1404129795.jpg', '2014-06-30 13:03:15', 3),
(34, NULL, 'albums/20140630_1404129811.jpg', '2014-06-30 13:03:31', 3),
(35, NULL, 'albums/20140630_1404129819.jpg', '2014-06-30 13:03:39', 3),
(36, NULL, 'albums/20140630_1404129840.jpg', '2014-06-30 13:04:00', 3),
(37, NULL, 'albums/20140630_1404129868.jpg', '2014-06-30 13:04:28', 3),
(38, NULL, 'albums/20140630_1404129886.jpg', '2014-06-30 13:04:46', 3),
(39, NULL, 'albums/20140630_1404129894.jpg', '2014-06-30 13:04:54', 3),
(40, NULL, 'albums/20140630_1404129907.jpg', '2014-06-30 13:05:07', 3),
(41, NULL, 'albums/20140630_1404129917.jpg', '2014-06-30 13:05:17', 3),
(42, NULL, 'albums/20140630_1404129941.jpg', '2014-06-30 13:05:41', 3),
(43, NULL, 'albums/20140630_1404129952.jpg', '2014-06-30 13:05:52', 3),
(44, NULL, 'albums/20140630_1404129968.jpg', '2014-06-30 13:06:08', 3),
(45, NULL, 'albums/20140630_1404129979.jpg', '2014-06-30 13:06:19', 3),
(46, NULL, 'albums/20140630_1404129991.jpg', '2014-06-30 13:06:31', 3),
(47, NULL, 'albums/20140630_1404129998.jpg', '2014-06-30 13:06:38', 3),
(48, NULL, 'albums/20140630_1404130020.jpg', '2014-06-30 13:07:00', 3),
(49, NULL, 'albums/20140630_1404130029.jpg', '2014-06-30 13:07:09', 3),
(50, NULL, 'albums/20140630_1404130054.jpg', '2014-06-30 13:07:34', 3),
(51, NULL, 'albums/20140630_1404130064.jpg', '2014-06-30 13:07:44', 3),
(52, NULL, 'albums/20140630_1404130088.jpg', '2014-06-30 13:08:08', 3),
(53, NULL, 'albums/20140630_1404130118.jpg', '2014-06-30 13:08:38', 3),
(54, NULL, 'albums/20140630_1404130140.jpg', '2014-06-30 13:09:00', 3),
(55, NULL, 'albums/20140630_1404130172.jpg', '2014-06-30 13:09:32', 3),
(56, NULL, 'albums/20140630_1404130192.jpg', '2014-06-30 13:09:52', 3),
(57, NULL, 'albums/20140630_1404130213.jpg', '2014-06-30 13:10:13', 3),
(58, NULL, 'albums/20140630_1404130232.jpg', '2014-06-30 13:10:32', 3),
(59, NULL, 'albums/20140630_1404130256.jpg', '2014-06-30 13:10:56', 3),
(60, NULL, 'albums/20140630_1404130274.jpg', '2014-06-30 13:11:14', 3),
(61, NULL, 'albums/20140630_1404130292.jpg', '2014-06-30 13:11:32', 3),
(62, NULL, 'albums/20140630_1404130313.jpg', '2014-06-30 13:11:53', 3),
(63, NULL, 'albums/20140630_1404130334.jpg', '2014-06-30 13:12:14', 3),
(64, NULL, 'albums/20140630_1404130387.jpg', '2014-06-30 13:13:07', 3),
(65, NULL, 'albums/20140630_1404130389.jpg', '2014-06-30 13:13:09', 3),
(67, NULL, 'albums/20150727_1438035128.png', '2015-07-27 23:12:08', 3),
(86, NULL, 'albums/20160522_14639183860.jpg', '2016-05-22 12:59:46', 9),
(87, NULL, 'albums/20160522_14639183871.jpg', '2016-05-22 12:59:47', 9),
(88, NULL, 'albums/20160522_14639183872.jpg', '2016-05-22 12:59:47', 9),
(89, NULL, 'albums/20160522_14639183883.jpg', '2016-05-22 12:59:48', 9);

-- --------------------------------------------------------

--
-- Table structure for table `messagereplies`
--

CREATE TABLE IF NOT EXISTS `messagereplies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `repliedon` datetime NOT NULL,
  `messageid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `messagereplies`
--

INSERT INTO `messagereplies` (`id`, `caption`, `body`, `repliedon`, `messageid`) VALUES
(1, 'Re: From Christian', 'Hello, thanks for contacting us', '2014-06-02 23:36:36', 5),
(2, 'Re: Cheap Oakleys', 'Hello sir, Thank you for your interest in working with us.\r\nWe will get back to you soonest', '2015-07-26 23:07:29', 54);

-- --------------------------------------------------------

--
-- Table structure for table `morepages`
--

CREATE TABLE IF NOT EXISTS `morepages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `picture_url` varchar(255) DEFAULT NULL,
  `active_status` smallint(6) DEFAULT '1',
  `link_location` smallint(1) DEFAULT NULL,
  `home_tab` varchar(5) DEFAULT NULL,
  `url_content` varchar(255) DEFAULT NULL,
  `content` text,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `morepages`
--

INSERT INTO `morepages` (`id`, `caption`, `category`, `picture_url`, `active_status`, `link_location`, `home_tab`, `url_content`, `content`, `created_on`) VALUES
(5, 'About Us', 'about', 'asset/uploads/20160522_1463900350.png', 1, 1, '0', 'about', '<p>Welcome to <strong>The Christhill Schools</strong>, a unique world of endless possibilities, where the right of every child to qualitative and meaningful education is guaranteed.<br /><br />Sadly, in many climes, quality education is fast becoming accessible only to a privileged few. Hence, at Christhill, we took it upon ourselves to bridge this gap, by making qualitative education not only accessible to every child, but also affordable.<br /><br />We are poised for&nbsp;genuine success without undue gimmicks and window-dressing. We create a conducive learning environment where young leaders enjoy a unique blend of academic and entrepreneurial skills; balanced with sundry fun activities.<br /><br />Coupled with our ultra-modern purpose-built infrastructures, our dedicated, highly versatile and seasoned workforce contributes in no small measure towards the realization of our laudable goals. Moreover, we continuously train and retrain our workforce in line with global trending practices in education.<br /><br />Please continue the tour of our website and learn more of who we are, what we do, and how we do what we do!<br /><br /> <span style="font-family: verdana, geneva;"><strong>Our Vision</strong></span><br /> <em>To empower our young gems by instilling&nbsp;the right values system; Hard work, Humility and Honesty, for a promising future, through result-oriented, impactful teachings and creative education.</em> <br /><br /><span style="font-family: verdana, geneva;"><strong> Our Mission</strong></span><br /> <em>To build an institution where young minds are nurtured into creative thinkers and passionate leaders, under the tutelage of visionary professionals, creating role models for the society and contributing our quota, nationally and internationally.</em> <br /><br /> <em><strong>Once again, you''re welcome to our world!</strong></em><br /><br /><strong>The Christhill Schools... <em>On Solid Rock we Stand!</em></strong><br /><br /> <strong><em>Thank you&nbsp;<img src="data:image/gif;base64,R0lGODlhEgASAPQfAHlgDsbGxpZ6DOrPEcq2at7SMr+qTu/v7vPwWdC9HlI9DbSYDPzwNmhUEsSrGfvmHvr6+uDYuv79cfryR8S8nbqeLtfX1tXDMf75N7mbHMKmMv77WvjaEiYKAqqKAgAAACH5BAUAAB8ALAAAAAASABIAQAXV4CeKUGmWo3gsEuYyz8MNA2dvyzFCFmVoDofGQLFAUhBDQjK5XBgM50SSMBwhFMcmBuh4O4DYxkE5kgiLC0IiQVwWBPMnWdi4FIp7HrMpWA8ZCAwDHjaGHB4DDxMZOjwaCQgYMA8MGAgJGkYpcxEGGR4eGQYRciMHFQ4IGxNQExsIDhU6nSytDQpQuAxTC6WACBMuAA3DxRgTCI0rLTCHhjUTOQcGBQwcAgAJNgkAAhwMfgcQ1AlbDw4CAg5iVeMqFgYOBa+sBQ4GFrRIBxYB/wH0mQoBADs=" alt="" /></em></strong></p>', '2015-07-31 11:21:38'),
(6, 'History', 'about', 'asset/uploads/20151022_1445518776.jpg', 1, 1, '2', 'history', '<p>The Christhill school group which comprises Christhill Children School and the Christhill College was founded by a seasoned administrator of over 30 years of management experience in the financial sector, with a strong bias and passion for education. Alongside this visionary were personalities of repute in the education sector who as members of the Board of Governors contributed in no small measure to the realization of a dream that today has become an enduring reality.<br /><br />Christhill Children School (for pupils between the ages of 2 years &ndash; 11 years) was established and took off on 26September, 1995 and was soon approved by the Lagos State Ministry of Education on 30th June, 1998.<br /><br />The school which took off with 30 pupils at inception rose to 150 within the first academic year and over 600 within 3 years. Due to the outstanding academic performance of our pupils, the school sustained tremendous growth in number on annual basis and equally churned out final year pupils who passed competitive examinations into Federal State, Command, Navy, Air force and Military Schools and Federal Government Schools for the Gifted Children. On merit, Christhill Children School can today, boast of many successful and well-placed university graduates across over the globe.<br /><br />For continuity and sustenance of qualitative education, Christhill Children School birthed ''''The Christhill College'''' which took off on 25 September, 2006 with admissions of 18 students into Year 7.<br /><br />The college was approved by the Lagos State Government in August, 2008 and the first set of 5 students for Junior Secondary Certificate Examination was presented in in the same year while the first set of 20 students for Senior Secondary School Certificate Examination was presented in 2011.<br /><br />The Christhill Schools, through the engagement of services of tested and well qualified professional graduate teachers in all subject areas and exposure of our students to robust academic and non-academic curricula, have been producing since inception till today, world-class alumni who are renowned professionals in various fields of human endeavours, within and beyond the shore of the country.<br /><br />Today, we are proud, because we are one of the pace-setters of a functional top world-class international education that is not only accessible to every child but also very affordable.<br /><br /><br /><strong>The Christhill Schools...</strong> <em><strong>on solid rock we stand</strong></em></p>', '2015-07-31 11:26:48'),
(7, 'Code Of Conduct', 'about', NULL, 1, 1, '0', 'conduct', '<p><span style="font-size: small;"><strong>Student Code of Conduct</strong></span></p>\n<p><span style="font-size: small;"><strong><br /></strong>The Christhill Schools System is committed to providing a safe, engaging, and supportive learning environment where all policies are enforced fairly and consistently. Student disciplinary regulations emphasize instruction and rehabilitation rather than punishment, and are designed to foster and reward appropriate behavior and keep students connected to school so they can graduate college and career ready.<br /><br />The CHS Student Code of Conduct provides a framework to support behavioral goals and disciplinary policies. All students are expected to be aware of and abide by this Student Code of Conduct. Parents/guardians are encouraged to read the Student Code of Conduct carefully and to discuss the information with their children.<br /><br /><strong>Philosophical Statement</strong><br />Schools should provide the instruction and support necessary to meet students&rsquo; academic and behavioral needs, and identify fair and developmentally appropriate behavioral expectations for all members of the school community. Educators and other adults in the school should teach students to behave in ways that conform to these policies and contribute to academic success. This is achieved by reinforcing positive behavior, preventing misbehavior before it occurs, supporting students in overcoming challenges, and fostering positive relationships among all members of the school community.<br /><br />Research shows that students are more likely to accept responsibility for their actions and the consequences of their behavior when school discipline is administered fairly, equitably, and consistently. Schools must also employ due process protections when enforcing discipline, and must not allow harsh or exclusionary discipline to disproportionately impact specific groups of students, including but not limited to students of color, students with disabilities, economically disadvantaged students and male students.<br /><br /><strong>Student Responsibilities</strong><br />Students share responsibility with school staff for maintaining an environment of mutual respect and dignity in the school. Students take an active role in making school a supportive, safe, and welcoming place for all students and staff in these ways:<br />Demonstrate pride in self, in the future, and in school by arriving on time, dressing appropriately, and being prepared to focus on your studies.<br />Be respectful and courteous to fellow students, parents/guardians, and school staff.<br />Seek the most peaceful means of resolving conflict, and obtain the assistance of teachers, administrators, parent/guardian, or school staff, when unable to resolve conflicts.<br />Follow school rules and policies, and contribute to a positive school climate by behaving appropriately, even when not specifically asked to do so.<br />Recognize how your conduct affects other students and school staff, and make every reasonable effort to restore relationships and correct any harm caused to others in the school community.<br />Seek access to and complete make-up work while out of school for disciplinary reasons.</span></p>\n<p><br /><strong>Staff Responsibilities</strong><br />Students who have meaningful relationships with caring adults in the school are less likely to engage in disruptive behavior, be absent, or drop out of school. School staff members should take the initiative in developing positive, meaningful relationships with students.<br />When disruptive behavior does occur, school staff will use professional discretion when applying these consequences/responses and interventions in a progressive manner, to teach students appropriate behavior and correct any harm that results from their behavior.<br /><br /><strong>Staff will:</strong><br />Create and promote a positive, supportive, safe, and welcoming school environment that is conducive to teaching and learning.<br />Be respectful and courteous to students, parents/guardians, and other school staff.<br />Establish clear expectations for behavior, take an instructional approach to discipline, and acknowledge positive and appropriate conduct by students.<br />Involve families, students, and the community in fostering positive behavior and student engagement.<br />Ensure that clear, developmentally appropriate and proportional consequences are applied for misbehavior as outlined in applicable discipline policies.<br />Implement graduated, progressive consequences for recurring inappropriate behavior.<br />Administer discipline rules fairly, consistently, and equitably, regardless of race, ethnicity, culture, gender, color, national origin, ancestry, religion, age, disability, sexual orientation, and/or gender identity.<br />Remove students from the classroom only as a last resort, and return students to class as soon as possible.<br />Promptly notify parents/guardians if their child is suspended and if there is any investigation by law enforcement or school resource officers, related to school discipline.<br />Make every reasonable effort to communicate with and respond to parents/guardians in a timely manner and in a way that is accessible and easily understood.<br />Provide students who are suspended or expelled from school with make-up work, and allow them to complete the work for credit so they do not fall behind academically.<br />Parent and Community Responsibilities<br />Parents, guardians, and community members play an important role in establishing a positive school climate where students will thrive. Parents can help students and staff members promote a supportive, safe, and welcoming school environment in these ways:<br />Talk with their child about appropriate conduct at school.<br />Be respectful and courteous to other students, fellow parents/guardians, and school staff.<br />Read and be familiar with school policies, regulations, and rules.<br />Have regular contact with school staff and make every effort to ensure that their child maintains regular school attendance.<br />Be involved in conferences, hearings, and other disciplinary matters concerning their child.<br />Help their child access supportive groups or programs designed to improve his/her conduct, such as counseling, after-school programs, and mental health services available in the school and community.<br />Promptly share any concerns or complaints with school officials and work with school staff and administrators to address any behavioral problems their child may experience.</p>\n<p><br /><strong>Behavior-Related Offenses and Consequences</strong><br />Factors to consider when determining the appropriate response may include patterns of behavior, impact on the school community, and the overall severity of the infraction.<br />Offenses included in the Student Code of Conduct apply to behaviors that occur on school property, at school-related activities, or when students are otherwise subject to the authority of the Christhill Schools System. Disciplinary action may be taken for off-campus incidents if the action could have an adverse effect on the order and general welfare of the schools.<br />In addition to the responses in the code of conduct, loss of credit for an assignment or course may be appropriate. Restitution for loss or damage may be requested and law enforcement will be involved when appropriate.<br /><br />The following examples constitute a listing of possible responses and interventions that may be used by a staff member in responding to a student&rsquo;s inappropriate behavior. The responses within each level are examples and are not listed in a particular order of use.<br /><br /><strong>Level I</strong><br />Examples of Classroom, Support, and Teacher-Led Responses<br />These responses are designed to teach appropriate behavior, so students are respectful, and can learn and contribute to a safe environment. Teachers are encouraged to try a variety of teaching and classroom management strategies. When appropriate, teachers may engage the student&rsquo;s support system to ensure successful learning and consistency of responses, and change the conditions that contribute to the student&rsquo;s inappropriate or disruptive behavior. These responses should be used in a progressive fashion.<br /><br />Classroom-based Responses (Verbal Correction, Written Reflection/Apology<br />Reminders/Redirection, Role Play, Daily Progress Sheet<br />Check in with School Counselor/Resource Specialist<br />Parent outreach (contact parent via telephone, e-mail or text)<br />Conference with student<br />Verbal redirection<br />Time out for written reflection/apology<br />Loss of privileges<br /><br /><strong>Level II</strong><br />Examples of Classroom, Support, and Teacher-Led Responses<br />These responses are designed to teach appropriate behavior, so students behave respectfully, can learn, and contribute to a safe environment. Many of these responses engage the student&rsquo;s support system, and are designed to alter conditions that contribute to the student&rsquo;s inappropriate or disruptive behavior. These responses aim to correct behavior by stressing its severity and acknowledging potential implications for future harm, while still keeping the student in school. These responses should be used in a progressive fashion.<br />Classroom-based responses (e.g. verbal correction, written reflection/apology, reminders/redirection, role play, daily progress sheet<br />Parent/Guardian and Student Conference (with Teacher)<br />Parent Outreach (Contact Parent via Telephone, E-mail or Text)<br />Peer Mediation<br />Temporary Removal from Class<br />Loss of privileges/Removal from Extracurricular Activities<br /><br /><strong>Level III</strong><br />Examples of Support, Removal, and Administrative Responses<br />These responses engage the student&rsquo;s support system to ensure successful learning, and to alter conditions that contribute to the student&rsquo;s inappropriate or disruptive behavior. These responses aim to correct behavior by stressing its severity and acknowledging potential implications for future harm, while still keeping the student in school. These responses may involve the short-term removal of a student from the classroom. Such a removal should be limited as much as practicable without undermining its ability to adequately address the behavior. These responses should be used in a progressive fashion.<br />Parent/Guardian and Student Conference (with Administrator)<br />Detention<br />Temporary Removal from Class<br />Behavioral Contract<br />Loss of privileges/Removal from Extracurricular Activities<br />Campus clean-up<br />In-school suspension<br />In-school intervention<br />Extended school day.<br /><br /><strong>Level IV</strong><br />Examples of Support, Removal, Administrative, and Out-of-School Exclusionary Responses<br />These responses address serious behavior while keeping the student in school, or when necessary due to the nature of the behavior or potential implications for future harm, remove a student from the school environment. They promote safety of the school community by addressing self-destructive and dangerous behavior, and should be used in a progressive fashion.<br /><br /><strong>Restricted access</strong><br />Request for alternative educational setting<br />Referral to Student Support Team<br />Parent/Guardian and Student Conference<br />Loss of privileges/removal from Extracurricular Activities<br />In-school suspension<br />In-school intervention<br />Short-Term Out-of-School Suspension<br />Parent/guardian notification required<br /><br /><strong>Level V</strong><br />Examples of Long-term Administrative, Out-of-School Exclusionary, and Referral Responses.<br />These responses remove a student from the school environment for an extended period of time because of the severity of the behavior and potential implications for future harm. They may involve the placement of the student in a safe environment that provides additional structure and services. These responses promote the safety of the school community by addressing self-destructive and dangerous behavior, and should be used in a progressive fashion.<br /><br />Long-Term Out-of-School Suspension<br />Extended-Out-of-School Suspension<br />Expulsion<br />Request for alternative educational setting<br />Referral to Student Support Team<br />Recommend for further action<br />Parent/guardian notification required<br />Offense Information<br />Academic Dishonesty/Plagiarism<br /><br />Academic dishonesty through cheating, copying, plagiarizing, or altering records, or assisting another in such actions. Plagiarizing, such as by taking someone else&rsquo;s work or ideas (for students Year 7-12); forgery, such as faking a signature of a teacher or parent; or cheating. Action taken by a student that is deemed inappropriate based on information, rules, guidelines, or procedures.<br /><br /><strong>Alcohol Violation</strong><br />Possession or use of any alcoholic substance, including constructive possession and possession with intent to sell, deliver or distribute. <br /><br /><strong>Arson/Fire Violation</strong><br />Attempting to, aiding in, or setting fire to (or in) a school building or to other school property.<br />Assault and/or Battery on Staff (includes threat against and/or physical attack on staff)<br /><br />Assault &ndash; Any willful attempt or threat to inflict harm upon another person or any display of force or expression that would give the victim reasonable fear of harm. An assault may be physical, oral or written.<br />Battery I &ndash; The unlawful touching of another person by the aggressor or by some substance put into motion by the aggressor, which is not consented to by the other person.<br />Battery II &ndash; Battery I accompanied by circumstances which reflect the student&rsquo;s blatant disregard for the safety of staff members or other persons evidenced by, but not limited to, the student&rsquo;s intentional conduct, disregard of directions, or the fact that the battery resulted in serious bodily harm. <br /><br />Bullying, Cyberbullying, Harassment or Intimidation<br />Intentional conduct, including verbal, physical, or written conduct, or an intentional electronic communication that creates a hostile educational environment by substantially interfering with a student&rsquo;s or staff member&rsquo;s educational benefits, opportunities, or performance, or with their physical or psychological well-being and is motivated by an actual or a perceived personal characteristic including race, national origin, marital status, sex, sexual orientation, gender identity, religion, ancestry, physical attributes, socioeconomic status, familial status, physical or mental ability or disability, or threatening or seriously intimidating; and occurs on school property at a school activity or event or on a school bus; or substantially disrupts the orderly operation of a school or workplace, including any acts of cyber bullying, harassment or intimidation. <br />Bus Misbehavior<br />Failure to comply with expected student behaviors while on school buses or to interfere with safe transport of students is a violation of this policy. <br /><br /><strong>Class Cutting</strong><br />Failing to attend a class, after arrival at school, without an excused reason. Missing class for more than 20 minutes will be treated as an absence for that class. Persistently failing to attend a scheduled class, after arrival at school, without excused reasons.<br /><br /><strong>Destruction of Property/ Vandalism</strong><br />Causing accidental or intentional damage, destruction or defacement (including graffiti) to school/other&rsquo;s property. <br /><br /><strong>Discrimination</strong><br />Conduct and/or behavior related to race, color, creed, national origin, religion, physical or mental disability, age, gender, marital status, or sexual orientation, that creates a hostile or offensive educational environment or substantially interferes with an educational environment; or otherwise limits a student&rsquo;s ability to participate in or benefit from their educational program. <br /><br /><strong>Disrespect</strong><br />Making intentional and harmful gestures, verbal or written comments, including profane language, or symbols to others. Being insubordinate: repeatedly or persistently disrespectful, in defiance of authority.<br />Disruption<br />Intentionally engaging in behavior distracting from the learning environment or school related activities including behavior that originates off campus and/or affects the safety of others. (This can include the use of technology.)<br />Dress Code Violation<br />Wearing attire that is disruptive to the school environment, that promotes illegal or harmful activities, or that could endanger the health or safety of that student or others during school hours and school related activities. <br />Drug Violation<br />Possession or use of (including constructive possession and possession with the intent to sell, give, or distribute) any inhalants or other intoxicants; controlled dangerous substances including prescription drugs, over-the-counter medicines/products look-a-likes, and substances represented as controlled dangerous substances; or drug paraphernalia. <br />Electronics, Computer/Communication Misuse<br />Any unauthorized use of computers, software, Internet, network or other technology; accessing inappropriate websites; misuse of account credentials; disrupting the normal operation of a technology system. <br />Electronics, Personal Communication Device<br />Behavior not in compliance with the responsible use of the Technology Agreement policy 8080 and or Personal Communication Device guidelines laid out in the Student Handbook. Inappropriate use of any electronic device carried, worn, or transported by a student to receive or communicate messages.<br /><br /><strong>Explosives</strong><br />Possession, sale, distribution, detonation, or threat of detonation of an incendiary or explosive material or device. <br /><br /><strong>Extortion</strong><br />The process of obtaining property from another, with or without that person&rsquo;s consent, by wrongful use of force, fears, or threat. <br />Failure to Serve Assigned Consequences<br />Failure to serve detention, suspension or other assigned consequences. <br /><br /><strong>False Alarms/Bomb Threats</strong><br />Initiating a warning of a fire or other catastrophe without valid cause or discharging a fire extinguisher. Making a bomb threat or threatening a school.<br /><br /><strong>Fighting</strong><br />A hostile confrontation with physical contact involving two or more students<br /><br /><strong>Gang Activity</strong><br />Committing, attempting to commit, or soliciting of two or more crimes; or<br />acts by a juvenile that would be a crime if committed by an adult. <br /><br /><br /><strong>Hazing</strong><br />Participation in any intentional or reckless act directed against another for the purpose of initiation into, affiliation with, or maintenance of membership in an organization. <br /><br /><strong>Indecent Exposure</strong><br />Exposure to sight of the private parts of the body in a lewd or indecent manner.<br /><br /><strong>Leaving School Grounds Without Permission</strong><br />Leaving school grounds during regular school hours without written or verbal permission from a parent or someone listed on the emergency procedure card. <br /><br /><strong>Physical Attack</strong><br />Unwelcome, aggressive action, with physical contact, directed at another person, student or non-student, on school grounds or at a school-related activity; or substantially disrupts the orderly operation of a school or workplace. <br /><br /><strong>Serious Bodily Injury</strong><br />Causing an injury that involves a substantial risk of death; extreme physical pain; protracted and obvious disfigurement; or protracted loss or impairment of the function of a bodily member, organ, or mental faculty. <br /><br /><strong>Sexual Activity</strong><br />Behavior of a sexual nature including public displays, consensual sexual activity, possession of pornographic materials. <br />Sexual Discrimination<br />Includes sexual harassment, sexual assault and sexual violence and is characterized by unwelcome conduct of a sexual nature that interferes with a student&rsquo;s ability to learn, study, work, achieve, or participate in school activities or with an employee&rsquo;s/third party&rsquo;s term, condition, or privilege of employment/relationship with the school system. Sexual discrimination can be committed by a student, employee or third party. <br /><br />Stalking<br />A malicious course of conduct that includes approaching or pursuing another where the person intends to place, knows or reasonably should have known the conduct would place another in reasonable fear of; serious bodily injury or death; Assault in any degree; Sexual assault in any degree; or which might cause a third party to suffer from any of the above actions.<br /><br />Tardiness<br />Reporting late to school or class when the day/period begins. Missing class more than 20 minutes equals one class absence. Extended tardiness may be counted as a partial or full day absence from school. <br /><br />Theft<br />Taking or obtaining the property of another without permission or knowledge of the owner.<br /><br />Threat to Students<br />Threatening language (verbal or written/electronic; implicit or explicit) or physical gestures directed toward another student or group of students.<br /><br />Tobacco Violation<br />Possession or use of any tobacco or tobacco products, cigarette rolling papers, or electronic cigarette products. <br /><br />Trespassing Violation<br />Entrance onto school property by a currently registered student at the school who has been suspended or expelled from the property or student who has been denied access to the property as a result of administrative action.</p>\n<p><span style="font-size: small;"><br />Truancy<br />An absence for a school day or any portion of a school day for any reason other than those cited as lawful and/or failure to bring a note written by a parent to verify a lawful absence. <br /><br />Weapons Violation (Firearms, Other Guns, Other Weapons)<br />Possession of an object or implement capable of causing harm or used to cause harm to another. This includes all guns, knives, and any implement, visible or concealed, possessed under a circumstance that would reasonably lead a person to believe it was a weapon or would be used as a weapon. Weapons are prohibited on school property, school buses, locked/unlocked vehicles on school property, and at school related activities. <br /><br />Apply extended suspension and expulsion only to Year 7-12.<br /><br />Responses for Violations of Behavior and Discipline Policies<br />The professional staff at a school has the responsibility for taking appropriate actions when a student is involved in a situation which disrupts the learning environment of a school. When determining the consequences, they take the following into consideration:<br />The age-appropriateness of the response.<br />The severity of the incident.<br />A student&rsquo;s previous violations and/or responses for the same or a related offense.<br />If the offense interfered with the responsibility/rights/privileges/property of others.<br />If the offense posed a threat to the health or safety of others.<br />If the student has an Individualized Education Plan or a 504 Plan.<br />The logical relationship between the offense and the response.<br />The age-appropriateness of the consequence.<br />Any specific responses articulated in Board of Education Policy.<br />Alternative Education Setting<br /><br />A setting outside of the home school designed to accommodate the needs of students who have demonstrated the need for significant academic or behavioral support. Alternative education settings include but are not limited to:<br /><br />Evening School &ndash; An interim disciplinary placement providing educational opportunities for selected middle and high school students that takes place after normal school hours.<br />Gateway Program &ndash; An alternative education program within the Homewood Center, established for students with significant behavioral and academic difficulties whose needs cannot be met in the home school.<br />In-school Alternative Education Program &ndash; An alternative education program within a comprehensive school that provides participating students with academic and behavioral support, opportunities to learn conflict resolution and anger management strategies, social skills instruction, intensive case management services, and enhanced family outreach and support services.<br /><br />Corporal Punishment<br />The Board of Education prohibits the use of corporal punishment, which is defined as physical punishment or undue physical discomfort inflicted on the body of a student for the purpose of maintaining discipline or to enforce school rules.<br /><br />Detention<br />The placement of a student in a supervised school setting during the school day, before or after school, and on Saturdays.<br /><br />Restricted Access<br />Limitation of a student&rsquo;s presence on school property.<br /><br />Suspension<br />The denial of a student&rsquo;s right to attend regular classes or school for a specified period of time for cause. Suspension includes extended suspension, in school suspension, short-term suspension, or long-term suspension.<br /><br />In-School Suspension &ndash; The removal of a student within the school building from the student&rsquo;s current education program to another location within the school building for up to but not more than 10 school days in a school year for disciplinary reasons as determined by the principal.<br />Short-Term Suspension &ndash; The removal of a student from school for up to but not more than 3 school days for disciplinary reasons as determined by the principal.<br />Long Term Suspension &ndash; The removal of a student from school for 4&ndash;10 school days for disciplinary reasons as determined by the principal.<br />Extended-Suspension &ndash; The exclusion of a student from school for 11&ndash;45 school days for disciplinary reasons as determined by the Superintendent/ Designee.<br />In-school Intervention<br />The opportunity afforded a student, after the student is removed to an alternate location within the school, to continue to:<br />Appropriately progress in the general curriculum.<br />Receive the special education and related services specified on the student&rsquo;s IEP if the student is a student with a disability in accordance.<br />Receive instruction commensurate with the program afforded to the student in the regular classroom.<br />Participate with peers as they would in their current education program to the extent appropriate.<br />Expulsion<br />The exclusion of a student from the student&rsquo;s regular school program for 45 school days or longer as determined by the Superintendent/Designee.<br /><br />&nbsp;ATTENDANCE <br />Expectation<br />&bull;&nbsp;Students are expected to attend classes daily unless prevented by illness or other emergency.<br />&bull;&nbsp;Under ordinary circumstances, the school does not approve of absences for such things as haircuts, studying for other courses, early vacation, part-time jobs, etc.<br />&bull;&nbsp;Any unexplained absence is a truancy. It us the student&rsquo;s responsibility to verify to the teacher and to&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; the office legitimate absences immediately upon returning to school.<br />&bull;&nbsp;If a student has to leave during the school day or if they feel ill, they are to report to the office.&nbsp; A note or phone call from a parent/guardian is required to excuse the student from school.<br />&bull;&nbsp;Students will be considered truant if they leave the school or classroom without permission. <br />Linkage to Success<br />&bull;&nbsp;Good attendance is essential for a student&rsquo;s success.<br /><br />NOTE: Under the Education Act, the Principal determines the legitimacy of a student&rsquo;s absence. The only acceptable reasons for absence are illness or unavoidable cause (as approved by the principal). It is the duty of the parent/guardian or independent student to ensure regular school attendance as per the Education Act.<br />Possible Consequences of Inappropriate Choices<br />Detention(s) from teacher<br />Parent or guardian is informed<br />Attendance counselor becomes involved if student is under 16<br />Vice principal becomes involved<br />Suspension for persistent truancy<br />Removal from class<br />Removal from the school roll<br />Missed evaluations will be completed immediately upon return<br />Truancy on a day of a sporting event or dance will make the student ineligible to participate<br /><br />AUDITORIUMS, GUEST SPEAKERS OR PRESENTATIONS<br />Expectations<br />Students are expected to be courteous and respectful towards presenters and guest speakers during auditoriums or presentations. Hats and electronic devices are not permitted during presentations. <br />Linkage to Success<br />Auditoriums and Presentations are a wonderful opportunity for you to learn from others with different view points, experiences and specialties. The presenter&rsquo;s views may not be the same as a student&rsquo;s, but students must respect their right to speak in a safe and respectful environment.<br />Possible Consequences of Inappropriate Choices<br />Students will be removed from the auditorium or presentation and will be required to write a letter of apology to the presenter and organizers. Further consequences can include detentions, suspensions, a behavioural contract, or removal of auditorium privileges.<br />DANCES<br />Expectations<br />Students who come to school dances expect to have a fun and safe time.<br />Students are not to come to dances while under the influence of alcohol or other substances.<br />Student clothing, behaviour and dances must be appropriate while at the school.<br />Students are expected to attend all classes on the day of a dance. <br />Linkage to Success<br />When under the influence of drugs or alcohol, students often make decisions that are harmful&nbsp;&nbsp;&nbsp; to&nbsp;their health and safety and that are detrimental to the tone and safety of the school. <br />Possible Consequences of Inappropriate Choices<br />Being under the influence of alcohol will result in a mandatory suspension. <br />Possession of alcohol or illegal drugs will result in mandatory suspension and possible police involvement.<br />In both of the above cases, students will be suspended from school dances for one year.<br />Truancy from a class revokes dance privileges.<br /><br />DRESS CODE<br />Expectations<br />Students are expected to dress in a manner which reflects the educational nature of the Oakridge community. Clothes with offensive or inflammatory language or graphics are unacceptable. Personal property such as clothes, backpacks, or car bumper stickers must comply with the school expectations. Revealing or suggestive clothing is inappropriate in a learning community.<br />Backpacks are not permitted in the classroom.&nbsp; Students must bring only the material they require to class. <br />Linkage to Success<br />School is not a place for revealing or suggestive clothing.&nbsp; Appearance and behaviour reflect good judgment and respect for self and others. All head gear, with the exception of hats (bandanas, hoods, etc.), must be removed when inside the school, except where required for religious or medical reasons.<br />No headgear is permitted during an auditorium.<br />Headgear within the classroom or library is at the discretion of the teacher.<br />Backpacks are a health and safety issue and restrict the flow of pedestrian traffic. <br />Possible Consequences of Inappropriate Choices<br />Students will be asked to change into more appropriate clothes.<br />Persistent noncompliance with the dress code will result in further consequences (detentions or suspension).<br />The administration, in consultation with the teacher, will make all decisions about the dress code.<br />DRUGS, ALCOHOL AND SMOKING<br />Expectations<br />The possession, distribution, and/or use of alcohol or illicit drugs are NOT permitted on school property, regardless of age.<br />Smoking is not permitted on school property, on the school bus, or at school sponsored activities. <br />Linkage to Success<br />Students under the age of 19 are forbidden by law to use alcohol and tobacco products. <br />The illegal use of drugs and alcohol is dangerous to health and can lead to behaviour which is detrimental to the tone and safety of the school.<br />To enhance student learning, Nigeria strongly discourages all behaviour that is detrimental to the healthy growth and development of its students. <br />Possible Consequences of Inappropriate Choices<br />Being under the influence of illicit drugs or alcohol will result in a mandatory suspension. Possession of alcohol or illegal drugs will result in mandatory suspensions.<br />Providing minors with alcohol and/or trafficking in illegal drugs will result in a mandatory expulsion.<br />Students who smoke on school property are subject to a range of consequences such as warnings, in-school disciplinary action, possible suspension, and/or fines levied as per the Ontario Tobacco Control Act and the Compliance Officer.<br /><br />FIGHTING AND/OR THE POSSESSION OF WEAPONS<br />Expectations<br />Fighting and/or the possession of weapons will not be tolerated.<br />Weapon replicas will be treated in the same manner as real weapons.<br />Objects used to inflict damage or injury will be treated as weapons.<br />Linkage to Success<br />Society expects that conflicts be resolved by peaceful means. This protects the physical and mental well being of each individual and promotes a positive and safe school environment.<br />Possession of weapons is restricted by law. Inflicting injury constitutes assault and police will become involved. Criminal charges may be laid.<br />Possible Consequences of Inappropriate Choices<br />All fights will result in suspension. The police may be contacted depending on the nature of the altercation.<br />Committing physical assault that causes bodily harm will result in a mandatory expulsion.<br />Police will be called upon to investigate all incidents involving weapons or suspected possession of weapons. <br />Possessing a weapon will lead to a mandatory expulsion. Using a weapon to cause or threaten bodily harm will result in a mandatory expulsion.<br /><br />HALLS<br />Expectations<br />Only students with hall passes are permitted in the halls.<br />Hall passes are a privilege. <br />Students who have a study period/spare must be in the library, atrium, or cafeteria. They must obtain a hall pass from the office in order to go to their locker.&nbsp; Students are not permitted to visit or disrupt other classes. <br />Linkage to Success<br />Noise and activity in the hallways are distracting to students in the classroom. <br />The wise use of study periods leads to academic success. <br />Possible Consequences of Inappropriate Choices<br />Persistent non-compliance to requests to vacate the halls will result in detentions and/or loss of privileges.<br /><br />INTERACTIONS<br />Expectations<br />Students are expected to be courteous and considerate in dealings with other students. The following behaviours are not acceptable:<br />Physical, verbal, written, electronic, sexual, or psychological abuse<br />Bullying or intimidation<br />Swearing or other inappropriate language<br />Discrimination on the basis of race, culture,&nbsp; language, religion, gender, disability, sexual orientation, or any other personal attribute<br />Horseplay&rdquo; in the halls, classes, and school&nbsp; property; throwing snowballs<br />Electronic harassment on or off site is prohibited.<br />Linkage to Success<br />Every student has the right to a safe and peaceful school environment and has a corresponding responsibility to refrain from any behaviour which threatens the mental and/or physical well being of other students at.<br />Harassment is illegal and will not be tolerated. Uninvited remarks, gestures, sounds or actions that make one feel unsafe, degraded or uncomfortable are unacceptable at all times.<br />Respectful behaviour and appropriate language are essential in the resolution of conflicts with others.<br />Possible Consequences of Inappropriate Choices <br />Threats to inflict serious bodily harm will result in a mandatory suspension and police involvement.<br />Parents of students under 18 will be involved in all such cases.<br />Sexual harassment is illegal and will not be condoned at Oakridge. Suspension can result and police will be involved. Sexual assault will result in a mandatory expulsion.<br />Shoving, poking, pushing, throwing snowballs, and other such horseplay can result in detention or suspension.<br />Swearing or objectionable language on school property or at scheduled school activities can result in detention or suspension..<br />Any harassment may result in suspension and police involvement.<br /><br />PERSONAL ELECTRONIC DEVICES<br />Expectations<br />Electronic devices such as, but not restricted to, cell phones, pagers, digital cameras, and video devices are not to be used during class time and/or scheduled school activities. These devices must be turned off during all school-related activities. Audio electronic playing devices may be allowed in the classroom, at the discretion of the teacher, but are prohibited during tests and exams.<br />Cell phones may not be used as a calculator.<br />Cell phones are to be off and not visible during class time.<br />All electronic devices are prohibited in the auditorium.<br />Linkage to Success <br />Electronic devices compete for students&rsquo; attention. To enhance student learning, the use of these devices is restricted to appropriate times.<br />It is disrespectful not to give a presenter your complete attention.<br />Some electronic devices interfere with the electronic devices being used for presentations.<br />Notes can be recorded and/or stored on electronic devices.<br />Possible Consequences of Inappropriate Choices <br />Possible removal of the device to be returned at a later time.<br />Referral to the vice principal.<br />Detentions.<br /><br />PUNCTUALITY<br />Expectations<br />Students are expected to be in class and ready to work by the second bell.<br />Linkage to Success<br />Punctuality shows respect for other people&rsquo;s learning. When students are late for class, they disrupt the right of others to an education.<br />Possible Consequences of Inappropriate Choices&nbsp; <br />1st and 2nd unexplained or unacceptable lates in a month -&nbsp; teacher discusses lateness with student<br />3rd and subsequent lates - teacher assigns detentions<br />4th late - teacher contacts parent/guardian <br />5th late - VP becomes involved and parents/guardians are involved<br />6th and subsequent lates - VP assigns in-school suspensions.<br /><br />RESPECT FOR PROPERTY<br />Expectations<br />Students are expected to treat school property with care and respect. This includes: school grounds, buildings, equipment, textbooks, lockers, transportation vehicles, and the possessions of others.<br />All students are to abide by the regulations established by the school for conduct on school buses and on school field trips.<br /><br />Lockers are the property of the school. The school has the right to enter/inspect lockers when the safety or welfare of the school is involved. Use only your assigned locker and secure it with a Dudley lock. Any other type of lock will be removed. The lock combination must be filed with the office. Lockers must be kept clean and free of graffiti and offensive material. You are responsible for the contents of your locker.<br />Linkage to Success <br />Every student has the right to learn in a clean, orderly school environment and has the responsibility to treat school property with care and respect. The school building and its contents are private property supported by tax dollars. The exorbitant cost of vandalism is often assumed by the taxpayer.<br />School custodians are hired to maintain the school building. They are not responsible for cleaning up messes deliberately made by others. By working together with the custodial and cafeteria staff, you can maintain a pleasant environment in which to eat lunch.<br />The use of the school bus is a privilege, not a right. Students are responsible to the principal for their conduct while on the school bus. Unruly behaviour on the bus presents a danger to all passengers. The school bus driver has the same authority as a teacher to control the behaviour of students.<br />Possible Consequences of Inappropriate Choices&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />Students who destroy school property will be required to pay the cost of repair or replacement. Destruction of school property will result in a mandatory suspension and police action.<br />Deliberate littering will result in detentions, assigned clean-up duty, or loss of privileges.<br />Offensive material must be removed at the request of a teacher or administrator. Students will be required to remove graffiti from their lockers or desks.<br />The school cannot guarantee safe keeping of student items of significant value. Students are encouraged not to bring items such as CD players, cameras, jewellery, or cash to school. Theft, robbery, assault and extortion will be dealt with by the police. Committing a serious crime will result in a mandatory expulsion.<br />Consequences will range from warnings to temporary or permanent removal of bus privileges to detentions or suspensions.<br />RESPECT FOR STAFF<br />Expectations<br />Students are expected to follow the rules of the school and the directions of the staff. When asked to do something by a staff member, students are expected to do it courteously and co-operatively.<br />Students are expected to give their name in a courteous manner when asked by staff members.<br />When asked to leave the classroom by a teacher, students are to report to the office directly or wait by the classroom door for further instructions.<br />Linkage to Success<br />The Christhill school is made up of custodians, cafeteria staff, administrators, secretaries, teachers, educational assistants, students, parents, and volunteers.<br />Teachers and other school staff have been granted authority under the Education Act to promote academic diligence and proper behaviour among students. <br />The Christhill staff work diligently to make the students&rsquo; school years enjoyable. They deserve courtesy and respect. <br />Possible Consequences of Inappropriate Choices <br />Opposition to a person in authority will result in a student being sent to the office.<br />Students are expected to report to the office when sent. Refusal to go to the office will result in detentions or external suspensions.<br />If a student refuses to give his or her name, when asked, he or she will be suspended.<br />Swearing at a teacher, secretary, custodian, volunteer or other employee of the Board will result in a mandatory suspension.<br /><br />VISITORS<br />Expectations<br />All non-student visitors are expected to report to the main office.<br />Parents are visitors.<br />Linkage to Success <br />The school must be a safe community for students, staff, parents and guests.<br />All visitors must be approved by the office.<br />Possible Consequences of Inappropriate Choices <br />The student is responsible for the behaviour of their guest.<br />Visitors that are not approved are considered trespassers and can be charged.<br /><br />Accessibility requests - If you require school information in an alternate format, please contact the Principal of your school.</span></p>', '2015-07-31 11:27:11');
INSERT INTO `morepages` (`id`, `caption`, `category`, `picture_url`, `active_status`, `link_location`, `home_tab`, `url_content`, `content`, `created_on`) VALUES
(8, 'Why Choose Us', 'about', NULL, 1, 2, '0', 'chooseus', '<p class="western" style="text-align: left;"><span style="font-size: medium;"><span style="font-family: ''arial black'',''avant garde'';">As a unique brand among providers of qualitative and meaningful education, we pride ourselves on the following:</span></span></p>\r\n<ul style="list-style-type: square;">\r\n<li><span style="font-family: ''comic sans ms'', sans-serif; font-size: medium;">&nbsp;A functional education that includes robust entrepreneurial skills acquisition</span></li>\r\n<li><span style="font-family: ''comic sans ms'', sans-serif; font-size: medium;">&nbsp;A fun and friendly learning environment</span></li>\r\n<li><span style="font-family: ''comic sans ms'', sans-serif; font-size: medium;">&nbsp;Safe and Serene, purpose-built ultra-modern structures conducive for learning</span></li>\r\n<li><span style="font-family: ''comic sans ms'', sans-serif; font-size: medium;">&nbsp;24/7 uninterrupted power supply</span></li>\r\n<li><span style="font-family: ''comic sans ms'', sans-serif; font-size: medium;">&nbsp;E-learning and E-library hosted locally on the school server</span></li>\r\n<li><span style="font-family: ''comic sans ms'', sans-serif; font-size: medium;">&nbsp;Parents, Students, Parents, and Teachers'' portals for collaborations</span></li>\r\n<li><span style="font-family: ''comic sans ms'', sans-serif; font-size: medium;">&nbsp;Meticulous Mentoring Programme for pupils and students</span></li>\r\n<li><span style="font-family: ''comic sans ms'', sans-serif; font-size: medium;">&nbsp;Sundry indoor and outdoor sporting activities</span></li>\r\n<li><span style="font-family: ''comic sans ms'', sans-serif; font-size: medium;">&nbsp;Student-centered Learning</span></li>\r\n<li><span style="font-family: ''comic sans ms'', sans-serif; font-size: medium;">&nbsp;A well-blended local and International curricula</span></li>\r\n<li><span style="font-family: ''comic sans ms'', sans-serif; font-size: medium;">&nbsp;Sound Spiritual Development through Christian and Islamic programmes</span></li>\r\n<li><span style="font-family: ''comic sans ms'', sans-serif; font-size: medium;">&nbsp;Qualitative, yet, very affordable education</span></li>\r\n<li></li>\r\n</ul>\r\n<p><span style="font-size: small;">...you have no reason not to choose us because you will be glad you did..!</span><span style="font-family: ''comic sans ms'', sans-serif; font-size: medium;"><br /></span></p>\r\n<p>&nbsp;</p>\r\n<p style="text-align: left;"><span style="font-size: medium;"><strong>Our Contents:</strong></span></p>\r\n<p style="text-align: left;"><span style="font-size: small; text-align: center;">About The Christhill Schools</span><br /><span style="font-size: small; text-align: center;">Curriculum Emanates From the Culture</span><br /><span style="font-size: small; text-align: center;">Curriculum Includes Instruction and Assessment</span><br /><span style="font-size: small; text-align: center;">Curriculum Is Learner Centered</span><br /><span style="font-size: small; text-align: center;">Curriculum Is Competency Based</span><br /><span style="font-size: small; text-align: center;">Curriculum Helps Learners Become Self-Directed</span><br /><span style="font-size: small; text-align: center;">Curriculum Is for the Whole Student</span><br /><span style="font-size: small; text-align: center;">Curriculum Encourages a Constructivist Approach</span><br /><span style="font-size: small; text-align: center;">Curriculum Is Meaningful</span><br /><span style="font-size: small; text-align: center;">Curriculum Is for Learning</span></p>\r\n<p>&nbsp;</p>\r\n<p align="center"><strong><span style="font-size: medium;">The Other Side of Curriculum</span></strong></p>\r\n<p align="center"><strong><span style="font-size: medium;"><em>Lessons from Learners</em></span></strong></p>\r\n<p><span style="font-size: small;">What exactly should students "know and be able to do" and how do we help them to know and do it?&nbsp;<em>The Other Side of Curriculum </em>answers these questions with a powerful model of curriculum development&mdash;one that fosters experiential and personal growth.</span></p>\r\n<p><span style="font-size: small;">&nbsp;</span></p>\r\n<p align="center"><span style="font-family: ''comic sans ms'',sans-serif; font-size: small;">Lois Brown Easton provides ideas and practical tools for creating an effective learning community, based on her experience at Eagle Rock School, where learners are central and the curriculum responsive to their needs. Her curricular concepts are common to all; Easton carefully considers how they can be customized and applied to almost any school or district. Each of her chapters begins with a story of learning that illustrates a concept of curriculum. She then describes that concept and offers questions that will help you translate the concept to your own setting. Learn about curriculum in relation to culture, instruction-assessment, learner-centered education, competency-based systems, self-directed learning, personal growth, and much more. Then explore your own story&mdash;consider how these concepts relate to your own context with the end-of-chapter questions you can ask yourself or use with colleagues.</span></p>\r\n<p><span style="font-size: small;">&nbsp;</span></p>\r\n<p align="center"><span style="font-family: ''comic sans ms'',sans-serif; font-size: small;">If you''re a practicing teacher, administrator, staff developer, or teacher educator,&nbsp;<em>The Other Side of Curriculum</em>&nbsp;will inspire you to make the changes needed in your own environment, enable you to embark on those changes, and convince you with the theoretical background and concrete examples that will help you be successful in shaping a curriculum for all learners.</span></p>', '2015-07-31 11:27:34'),
(9, 'Our College', 'academics', 'asset/uploads/20160522_1463916936.png', 1, 2, '1C', 'college', '<p>Welcome to the secondary arm of the Christhill school comprising six classes (Year 7-12). Right from the Junior to the Senior Secondary, our students are thoroughly drilled and conscientiously mentored. Under the guidance of professionally trained and continuously re-trained educators, our students seamlessly discover ideas through inquisitiveness, probing, investigating, brainstorming, and critical thinking. The experience is fantastic, the atmosphere is conducive. Hence, every lesson becomes episodic!<br /><br /><br /><strong>CURRICULUM AND STRUCTURE</strong><br /><br />In the first three years of the secondary school (Year 7-9) the scope of the curriculum widens to include a broader subject base. Aside the CORE subjects: English Studies, Mathematics, one Nigerian Language, we have the ELECTIVES: Cultural and Creative Arts, Business, Music, French/Arabic; The THEME subjects categorized under three major headings, namely; 1. Pre-vocational and Studies (Home Econs, Agriculture, and one entrepreneurial-based subject ), 2. Religious and Value Education (Social studies, IRK/CRK, Civic Education, Security Education), 3. Basic Science and Technology (Basic Science, PHE, Basic Technology)<br /><br />These first three years of secondary education serve to introduce the students to more advanced study skills in preparation for their BECE and Cambridge Checkpoint. Students are allowed to do a maximum of 10 and a minimum of 9 subjects. <br /><br />More interestingly, for the last three years at the college (Year 10-12), in addition to the General Subjects: English Language, Mathematics, Civics, Biology, and one Nigerian Language, students are allowed to select some subjects based on their proposed Course of Study at the post-secondary level. All of these have been categorized under the following:<br /><br />A. Business: Accounting, Insurance, Commerce, Book Keeping, Economics.<br />B. Sciences &amp; Maths: Chemistry, Physics, Further Maths, Agriculture, Physical Education, Computer/ICT<br />C. Technology: Technical Drawing, Food and Nutrition<br />D. Humanities: Lit in English, Geography, Govt, CRS/IS, Visual Art/Music, French.<br /><br /><br />Finally, according to the recent Curriculum review of the National curriculum, every student from Year 10 are equally mandated to choose at least, one of the 36 Trade Subjects which include: Catering Craft, Auto Electrical Work, Video Editing &amp; Photography, Radio, TV &amp; Electrical Work, Cosmetology, Plumbing and Pipe Fitting, Music Training etc. All of these have been drafted into our very robust school programmes.<br /><br />Little wonder is it then that the totality of these programmes are combined not only to prepare our students for their final Local/International School Leaving Exams ((WASSCE, GCE IGCSE) and Placement Exams (JAMB, SAT) but also to give them a head-start, and to prepare them towards their choice career in the post secondary education, in and outside the country.<br /><br />&nbsp;<br /><strong>EXTRA-CURRICULAR ACTIVITIES</strong><br /><br />To spice up our very rich curricular activities, we have in place sundry extras that interestingly engage our students. These include:<br /><br />SPORTS: table tennis, badminton, volleyball, basketball, football, swimming, lawn tennis, handball, chess, scrabbles, snakes and ladders, monopoly,<br /><br />SOCIETIES: Boy Scout, Girl Guide, Brigade, Peace Corp.<br /><br />CLUBS: debate, press, reading and writing club, business<br /><br />&nbsp;<br /><br /><strong>ENTRPRENEURIAL PROGRAMMES:</strong> catering craft, radio/TV electrical work, cosmetology, plumbing and pipe fitting, photography and video editing, GSM engineering.<br /><br /><br /><strong>SPIRITUAL DEVELOPMENT</strong><br /><br />Christhill is an equal opportunity school. We understand children come from different religious background. Hence, we allow our children enjoy personal spiritual development especially in Christian and Islamic religions. Separate worship assemblies are organized. We equally make available both religions as courses of study.<br />&nbsp;<br /><br /><strong>OUR EXAMINATIONS</strong><br /><br />Internal: In the nine month academic calendar, our students are prepared towards, there are three terms at the end of which our students write exams. The third term exam leads to promotion into the next class. Each of these exams is preceded by two major Continuous Assessment Tests. There are sundry other tests conducted by subject teachers. All of these are graded accordingly:<br /><br />1st C.A test= 20 marks<br /><br />2nd C.A test= 20 marks<br /><br />Examination= 60 marks<br /><br />N.B: Pass mark for each subject is 55 marks.<br /><br /><br />Avail your children of a rich and rewarding schooling experience in a most conducive and serene environment without having to necessarily break your bank. They would forever be grateful to you.<br /><br />&nbsp;<br /><strong>Christhill...</strong> <strong><em>on solid rock we stand.</em></strong></p>', '2015-07-31 11:27:56'),
(10, 'Elementary School', 'academics', 'asset/uploads/20160522_1463948492.png', 1, 1, '1B', 'elementary', '<p><strong>OUR ELEMENTARY SCHOOL<br /></strong></p>\r\n<p><br />Children from age 3+ are inducted into our Elementary school starting from Nursery one. They are seamlessly taken through sound learning experiences for the next 8 years.<br /><br />Throughout this period, the aim is to achieve effectiveness in the core skills of Numeracy, Literacy, Sciences, Civics, Technology, and Proficiency in at least a local language from Year one. This is in line with both International and National Curricula. French is introduced from Year 3. Essentially, all these subjects are of paramount importance as they form the basis for the THEME subjects to be learned in post primary school. More so, through our hands-on entrepreneurial skills acquisition and project-based learning, the pupils are introduced to the real world around them and are exposed to real life problem-solving skills. What''s more? The use of international and best globally acceptable practices in methodologies and strategies makes our classes completely and uniquely interesting. Ranging from modern classroom management, unfettered access to sundry resources from our e-library, e-learning platforms,&nbsp; to the use of modern technologies in lesson delivery, the collaboration between pupils and teachers, between teachers and parents, amongst learners themselves, to mention but few, schooling has become more interesting than ever, thus making our children''s learning experiences memorably unique and enjoyable.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>ACADEMIC ACTIVITIES</strong><br /><br />All the classes are divided into GOLD and PLATINUM. Each class is manned by a teacher and an assistant. An average of 15-20 students are allowed in each class. Admission into any of these classes is closed once the maximum number is attained. Opening is advertised on our website and prospective pupils are duly informed by e-mail. Classes begin by 8.05am and closes 2.30pm, Monday to Friday.<br /><br />&nbsp;<br /><strong>CO-CURRICULAR ACTIVITIES</strong><br /><br />Sundry fun activities are available to our pupils beside their regular academic classes. Under the tutelage of professional instructors, our pupils are engaged in extra-curricular and sporting activities such as swimming, chess, speak right, photography &amp; video editing etc.<br /><br />&nbsp;<br /><strong>SPIRITUAL DEVELOPMENT</strong><br /><br />Christhill is an equal opportunity school. We understand children come from different religious background. Hence, we allow our children enjoy personal spiritual development especially in Christian and Islamic religions. Separate worship assemblies are organized. We equally make available both religions as courses of study.<br /><br /><br /><strong>ChristHill</strong>... <em>on solid rock we stand.</em></p>', '2015-07-31 11:28:34'),
(11, 'Pre-School', 'academics', 'asset/uploads/20160522_1463918004.png', 1, 1, '1A', 'preschool', '<p><strong>OUR PRE-SCHOOL</strong></p>\r\n<p><br />If you''ve been looking for the right place where you could have your tender little precious ones kept safe, cared for and given the right foundation, look no further, Christhill is the right place for your child to start right. <br />We know and understand what parents want; a home-away-from-home, comfortable and safe environment suitable for their children; caring, God-fearing and dedicated staff who look after these children with a high sense of responsibility...Rest assured! Christhill Pre-School is poised to meet your needs. Satisfying our customers is always our top priority. We have in place, quality human and material resources - all it takes to give your children the comfort as well as the foundation experience they need; we maintain the highest level of hygiene, we make the environment stimulating enough to inspire our children acclimatize easily. Educational toys and gadgets of different kinds are equally available for their fun and games. We employ specially trained staff who are continuously retrained to meet up with the ever-increasing demands of young children. All of these and yet, for a token...What else do you need? Hurry, avail your precious little gems the opportunity to start right! <br /><br /><br /><strong>THE CURRICULUM STRUCTURE</strong></p>\r\n<p><br />Our Pre-School is a specially prepared Montessori environment purpose-built for the right foundation for children aged 18 months to 6 years. All our pupils follow an adapted form of the Montessori method which is sacrosanct for the proper development of children at the impressionable age.&nbsp; Each class is equipped with Montessori and didactic materials in the following aspects of Montessori curriculum areas:<br /><br />I.&nbsp;&nbsp; Cognitive development<br />II.&nbsp; Psycho-motor development<br />III. &nbsp;Affective development<br />IV.&nbsp; Numeracy<br />V.&nbsp;&nbsp; Literacy<br />VI. Cultural and nature studies<br /><br />&nbsp;Our&nbsp;classes are divided into <strong><em>GOLD</em></strong> and <strong><em>PLATINUM</em></strong>. Each of these classes is manned by a Montessori-trained teacher with an assistant...there is no better place for your infants! <br /><br /><br />The Christhill Schools...on solid rock we stand.</p>', '2015-07-31 11:28:54'),
(14, 'Admissions', 'admission', 'asset/uploads/20151020_1445365383.png', 1, 2, '3', 'admission', '<p>Please contact school admin for more information</p>', '2015-07-31 11:30:29'),
(20, 'Welcome Page', 'index', 'asset/uploads/20160522_1463914687.jpg', 1, 1, '0', 'index', '<p>Welcome to <strong>The Christhill Schools</strong>, a unique world of endless possibilities, where the right of every child to qualitative and meaningful education is guaranteed.<br /><br />Sadly, in many climes, quality education is fast becoming accessible only to a privileged few. Hence, at Christhill, we took it upon ourselves to bridge this gap, by making qualitative education not only accessible to every child, but also affordable.<br /><br />We are poised for&nbsp;genuine success without undue gimmicks and window-dressing. We create a conducive learning environment where young leaders enjoy a unique blend of academic and entrepreneurial skills; balanced with sundry fun activities.</p>\r\n<p><a title="click to read more" href="about?about">Read More</a></p>', '2015-08-02 11:24:14'),
(21, 'Admission Procedure', 'admission', 'asset/uploads/20160522_1463916106.png', 1, 2, '4', 'admission-procedure', '<p><br /><strong>ADMISSION PROCESS</strong><br /><br />Procedures for Prospective Students<br /><br />Every prospective student/pupil must obtain an admission form amounting to five thousand naira. This can be done via online and offline.<br /><br /><br /><strong>ONLINE APPLICATION</strong><br /><br />i. Visit our online application page and print out the application form.<br /><br />ii. Complete the form, scan and email it to admission@christhillschools.com (or bring to the front office)<br /><br />iii. Make a payment for the admission form to the following banks:<br /><br />GTB: Account name: Christhill School<br /><br />Account number: 0013087190<br /><br />iv. Scan the tellers and email alongside the form. You can make a bank transfer and fill the details in the "remark" space on the page. Better still, send an SMS detailing the payment to 08023448585.<br /><br /><br /><strong>OFFLINE APPLICATION</strong><br /><br />You will have to physically visit our front office to obtain your form. You can follow any of the payment options above.<br /><br />Completed application forms must be submitted with the following additional documents:</p>\r\n<ul style="list-style-type: square;">\r\n<li>&nbsp; 2 recent Passport Photographs (not more than 6 months old)</li>\r\n<li>&nbsp; Photocopy of Candidate&rsquo;s Birth Certificate or Passport Data Page</li>\r\n<li>&nbsp; The last/most recent Academic Report Card from your child&rsquo;s former school</li>\r\n<li>&nbsp; Applicant&rsquo;s Character Testimonial from former school</li>\r\n</ul>\r\n<p><br /><strong>ASSESSMENT TEST AND CUT-OFF SCORE</strong><br /><br />There are written and oral assessment for all pupils/students, depending on the class. 55% is our pass mark. Students that score below this may not be admitted into the class applied into but may be advised on the appropriate class, depending on the overall grade. Kindergarten pupils are only tested orally.<br /><br />Successful candidates will be informed via sms, email or phone call.<br /><br />A provisional letter of admission is issued for collection.<br /><br />Acceptance slip signed and returned with all required documents.<br /><br />Payments are made to designated banks and via POS on school premises.<br /><br />Accounts department receives the bank slip/draft and issues a receipt.<br /><br />The receipt is very important so please keep it safe.</p>\r\n<p><br />For further enquiries on how to apply;<br /><br />please call our 24-hours customer service line:<br /><br /><strong>08023448585, 09084611602, 08066266134, 07054785528</strong><br /><br /><br /><br />or send an email to:<br /><br />psa@christhillschools.com<br /><br />admission@christhillschools.com<br /><br />info@christhillschools.com<br /><br />enquiries@christhillschools.com<br /><br /><br /><br />Note that we admit pupils/students into all classes all year round depending on the openings.<br /><br /></p>', '2015-08-05 16:40:35'),
(22, 'Dress Code', 'about', 'asset/uploads/20160522_1463917487.png', 1, 1, '1D', 'dresscode', '<p>Our school uniforms are a unique combinations of well-blended colours.</p>\r\n<p>Here is a description of the schedules and types of wears for different days:</p>\r\n<p><strong>1. ELEMENTARY SCHOOL</strong></p>\r\n<p>a. Main wears for Monday, Tuesday and Thursday:</p>\r\n<p>i. Boys: Stripe short sleeves shirt on blue shorts and customized pink socks</p>\r\n<p>ii. Girls: Blue gown with a stripe design at the top and customized pink socks</p>\r\n<p>b.&nbsp; Wednesday sports wears: A specially designed coloured T-shirt and shorts</p>\r\n<p>c.&nbsp; Friday special wears: A customized orange T-shirt on blue jeans</p>\r\n<p>d.&nbsp; Special occasion wear: A customized green T-shirt</p>\r\n<p>mainly for speacial occasions</p>\r\n<p>&nbsp;</p>\r\n<p><strong>2.&nbsp; COLLEGE</strong></p>\r\n<p>a. Main wears for Monday, Tuesday and Thursday:</p>\r\n<p>i. Boys (junior): Pink short sleeves shirt on blue shorts; (senior) pink short sleeves shirt on blue trousers, with a dark brown tie and customized pink socks</p>\r\n<p>ii. Girls (junior): Blue pinafore on pink blouse; (senior) pink blouse with a special feminine tie on blue skirt and customized pink sock</p>\r\n<p>b. Wednesday customized wears: A customized orange T-shirt on blue jeans</p>\r\n<p>c. Friday sports wears: A specially designed coloured T-shirt and shorts</p>\r\n<p>d. Special occasion wear: A customized green T-shirt</p>\r\n<p>mainly for speacial occasions</p>', '2016-05-22 12:44:47'),
(23, 'Entry', 'academics', NULL, 1, 2, '0', 'entry', '<p>welcome to&nbsp;entry</p>', '2016-06-30 20:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(225) DEFAULT NULL,
  `dateadded` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `dateadded`) VALUES
(3, 'ofoefulec_fny@yahoomail.com', '2015-08-03 17:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) DEFAULT NULL,
  `content` text,
  `datesent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `caption`, `content`, `datesent`) VALUES
(5, 'School_Portal', 'Hello, and greetings from all of us at Glorious Academy Please be informed that we are now fully functional with out online portal management system All our school activities will be published on the website Please check from time to time and be sure to send us you feedback From all of us at Glourious Academy we say God Bless You', '2015-08-05 11:04:47'),
(6, 'School_Portal', 'Hello, and greetings from all of us at Glorious Academy Please be informed that we are now fully functional with out online portal management system All our school activities will be published on the website Please check from time to time and be sure to send us you feedback From all of us at Glourious Academy we say God Bless You', '2015-08-05 11:04:47'),
(7, 'School_Portal', 'Hello, and greetings from all of us at Glorious Academy Please be informed that we are now fully functional with out online portal management system All our school activities will be published on the website Please check from time to time and be sure to send us you feedback From all of us at Glourious Academy we say God Bless You', '2015-08-05 11:04:47'),
(8, 'School_Portal', 'Hello, and greetings from all of us at Glorious Academy Please be informed that we are now fully functional with out online portal management system All our school activities will be published on the website Please check from time to time and be sure to send us you feedback From all of us at Glourious Academy we say God Bless You', '2015-08-05 11:04:47'),
(9, 'School_Portal', 'Hello, and greetings from all of us at Glorious Academy Please be informed that we are now fully functional with out online portal management system All our school activities will be published on the website Please check from time to time and be sure to send us you feedback From all of us at Glourious Academy we say God Bless You', '2015-08-05 11:04:47'),
(10, 'Testing', 'Test Test', '2016-10-04 12:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `picfolder`
--

CREATE TABLE IF NOT EXISTS `picfolder` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) NOT NULL,
  `datecreated` datetime NOT NULL,
  `createdby` int(10) unsigned NOT NULL,
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `picfolder`
--

INSERT INTO `picfolder` (`id`, `caption`, `datecreated`, `createdby`, `description`) VALUES
(9, 'Our School', '2016-05-22 12:54:47', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) DEFAULT NULL,
  `content` text,
  `datecreated` datetime DEFAULT NULL,
  `settingtype` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `caption`, `content`, `datecreated`, `settingtype`) VALUES
(1, 'School_Name', 'The Christhill Schools', '2015-07-25 13:59:22', 1),
(2, 'School_Website', 'http://www.christhillschools.com', '2015-07-25 14:00:44', 1),
(3, 'School_Phone', '<font color="#fff"><b>234 705 478 5528, 234 806 626 6134, 234 806 123 7201</b></font>', '2015-07-25 14:01:19', 1),
(4, 'School_Email', '<font color="#fff"><b>info@christhillschools.com</b></font>', '2015-07-25 14:01:41', 1),
(5, 'School_Address', '<font color="#fff"><b>Akin Mateola Street, Amuwo, Odofin</b></font>', '2015-07-25 14:02:06', 1),
(6, 'Website_Layout', '2', '2015-07-25 14:24:30', 2),
(7, 'Top_Bar_Color', '3', '2015-07-25 14:39:09', 3),
(8, 'Website_Color', 'global-style-green', '2015-07-25 16:20:42', 4),
(10, 'School_Logo', 'asset/uploads/20151022_1445523551.png', '2015-07-26 20:08:18', 5),
(11, 'School_Vision', 'To empower our young gems by instilling the right values system; Hard work, Humility and Honesty, for a promising future, through result-oriented, impactful teachings and creative education.', '2015-07-27 18:24:53', 1),
(12, 'School_Mission', 'To build an institution where young minds are nurtured into creative thinkers and passionate leaders, under the tutelage of visionary professionals, creating role models for the society and contributing our quota, nationally and internationally.', '2015-07-27 18:25:17', 1),
(13, 'School_Song', '', '2015-07-27 18:26:36', 1),
(14, 'School_Core_Values', '<ol><li>\r\n    Creativity\r\n</li><li>    Humility</li><li>Responsibility\r\n</li><li>    Integrity \r\n    </li><li>Service\r\n    </li><li>Teamwork</li><li>Hard work</li><li>Initiative\r\n</li><li>    Loyalty\r\n</li><li>    Leadership</li></ol>', '2015-07-27 18:27:23', 1),
(15, 'School_Portal', 'http://live.schoolphix.com/?id=', '2015-07-27 21:29:56', 1),
(16, 'Wesbite_BG', 'asset/uploads/20150830_1440963827.png', '2015-07-28 11:30:02', 5),
(17, 'Banner_BG', 'asset/uploads/20160711_1468259095.jpg', '2015-07-28 14:40:39', 5),
(18, 'School_Favicon', 'asset/uploads/20160522_1463935791.ico', '2015-07-28 15:43:39', 5),
(19, 'Google_API', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.688426447543!2d7.954690814263565!3d4.991330740459925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1067f81f83640cef%3A0xcc314512c64eee2f!2s3+Ring+Road%2C+Uyo!5e0!3m2!1sen!2sng!4v1475529610851', '2015-07-28 18:52:02', 1),
(20, 'School_Motto', '', '2015-08-01 15:05:08', 1),
(21, 'School_Video', '', '2015-08-02 06:58:26', 1),
(22, 'School_Visit', '<ul class="list-unstyled">\r\n	<li><strong>Monday - Friday</strong> - 9am to 5pm</li>\r\n	<li><strong>Saturday</strong> - 9am to 2pm</li>\r\n	<li><strong>Sunday</strong> - Closed</li>\r\n</ul>', '2015-08-03 18:51:38', 1),
(23, 'SMS_USER', 'chrisoft', '2015-08-06 21:57:15', 1),
(24, 'SMS_PASS', 'chrisoft', '2015-08-06 21:57:24', 1),
(25, 'SMS_SENDER', 'CHRISTHILL', '2015-08-06 21:58:22', 1),
(26, 'SMS_PHONE', '2347054785528', '2015-08-07 11:40:56', 1),
(27, 'Test', 'Testing', '2016-07-08 17:10:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE IF NOT EXISTS `socialmedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) DEFAULT NULL,
  `medialink` varchar(255) DEFAULT NULL,
  `dateadded` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `caption`, `medialink`, `dateadded`) VALUES
(1, 'facebook', 'https://www.facebook.com/schoolphix', '2015-08-04 08:28:39'),
(2, 'twitter', 'https://www.twitter.com/schoolphix', '2015-08-04 08:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `testimonies`
--

CREATE TABLE IF NOT EXISTS `testimonies` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `testimony` text NOT NULL,
  `picture_url` varchar(255) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `testimonies`
--

INSERT INTO `testimonies` (`sn`, `name`, `testimony`, `picture_url`, `dateAdded`, `status`) VALUES
(5, 'Joshua Okoro', 'More testimony', 'asset/testimonies/20160712_1468351665.jpg', '2016-07-12 20:27:45', 'ACTIVE'),
(6, 'Joshua Okoro', 'more test', 'asset/testimonies/20160712_1468351733.jpg', '2016-07-12 20:28:53', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uploadtype` varchar(45) DEFAULT NULL,
  `filedir` varchar(255) DEFAULT NULL,
  `uploadedby` int(10) unsigned DEFAULT NULL,
  `uploadedon` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `uploadtype`, `filedir`, `uploadedby`, `uploadedon`) VALUES
(6, 'calendar', 'fileuploads/20150727_1437992979.pdf', 1, '2015-07-27 11:29:12'),
(7, 'timetable', 'fileuploads/20150727_1437993009.xlsx', 1, '2015-07-27 11:30:09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
