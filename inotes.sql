-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2014 at 10:55 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` tinyint(4) NOT NULL,
  `category_title` varchar(150) NOT NULL,
  `category_description` varchar(255) DEFAULT NULL,
  `last_post_date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_description`, `last_post_date`, `user_id`) VALUES
(1, 'Database', 'Database', '2014-12-06 00:03:30', 1),
(2, 'Data Science', 'Data Science', '2014-12-05 23:55:56', 1),
(3, 'Software Development', 'Software Development', '2014-12-05 23:55:56', 1),
(4, 'Data Structures', 'Data Structures', '2014-12-05 23:55:56', 1),
(5, 'Database Systems', NULL, NULL, 2),
(6, 'English Literature', NULL, '2014-12-07 11:15:07', 2),
(7, 'Calculus', NULL, '2014-12-07 11:17:01', 2),
(8, 'Mathmatics', NULL, '2014-12-07 11:25:45', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
`id` int(11) NOT NULL,
  `content` text,
  `title` text,
  `date` datetime DEFAULT NULL,
  `category_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `content`, `title`, `date`, `category_id`) VALUES
(1, 'Data Management Life Cycle\r\n\r\nAs we''ve all read by now, Google''s chief economist Hal Varian commented in January that the next sexy job in the next 10 years would be statisticians. Obviously, I whole-heartedly agree. Heck, I''d go a step further and say they''re sexy now - mentally and physically.\r\n\r\nHowever, if you went on to read the rest of Varian''s interview, you''d know that by statisticians, he actually meant it as a general title for someone who is able to extract information from large datasets and then present something of use to non-data experts.', 'Intro to Data Mining for Data Science ', '2014-12-03 00:00:00', 2),
(2, 'Information architecture\r\n\r\nAs a follow up to Varian''s now-popular quote among data fans, Michael Driscoll of Dataspora, discusses the three sexy skills of data geeks. I won''t rehash the post, but here are the three skills that Michael highlights:\r\n\r\nStatistics - traditional analysis you''re used to thinking about\r\nData Munging - parsing, scraping, and formatting data\r\nVisualization - graphs, tools, etc.', 'Data formats', '2014-12-14 00:00:00', 2),
(3, 'Analysis of data is a process of inspecting, cleaning, transforming, and modeling data with the goal of discovering useful information, suggesting conclusions, and supporting decision-making.\r\n', 'Data Analysis', '2014-12-23 00:00:00', 2),
(4, 'Scientific workflows play an important role in \r\ntodays science. Many disciplines rely on workflow \r\ntechnologies to orchestrate the execution of thousands \r\nof computational tasks. Much research to-date focuses \r\non efficient, scalable, and robust workflow execution, \r\nespecially in distributed environments. However, many \r\nchallenges remain in the area of data management \r\nrelated to workflow creation, execution, and result \r\nmanagement. In this paper we examine some of these \r\nissues in the context of the entire workflow lifecycle. ', 'Data Workflow', '2014-12-23 00:00:00', 2),
(5, 'Relational algebra, first described by E.F. Codd while at IBM, is a family of algebra with a well-founded semantics used for modelling the data stored in relational databases, and defining queries on it.\r\n\r\nTo organize the data, first the redundant data and repeating groups of data are removed, which we call normalized. By doing this the data is organized or normalized into what is called first normal form (1NF). Typically a logical data model documents and standardizes the relationships between data entities (with its elements). A primary key uniquely identifies an instance of an entity, also known as a record.\r\n\r\nOnce the data is normalized and in sets of data (entities and tables), the main operations of the relational algebra can be performed which are the set operations (such as union, intersection, and cartesian product), selection (keeping only some rows of a table) and the projection (keeping only some columns). Set operations are performed in the where statement in SQL, which is where one set of data is related to another set of data.\r\n\r\nThe main application of relational algebra is providing a theoretical foundation for relational databases, particularly query languages for such databases, chief among which is SQL.\r\n', 'Relational Algebra', '2014-12-16 00:00:00', 1),
(6, 'The normal forms (abbrev. NF) of relational database theory provide criteria for determining a table''s degree of immunity against logical inconsistencies and anomalies. The higher the normal form applicable to a table, the less vulnerable it is. Each table has a "highest normal form" (HNF): by definition, a table always meets the requirements of its HNF and of all normal forms lower than its HNF; also by definition, a table fails to meet the requirements of any normal form higher than its HNF.\r\n\r\nThe normal forms are applicable to individual tables; to say that an entire database is in normal form n is to say that all of its tables are in normal form n.\r\n\r\nNewcomers to database design sometimes suppose that normalization proceeds in an iterative fashion, i.e. a 1NF design is first normalized to 2NF, then to 3NF, and so on. This is not an accurate description of how normalization typically works. A sensibly designed table is likely to be in 3NF on the first attempt; furthermore, if it is 3NF, it is overwhelmingly likely to have an HNF of 5NF. Achieving the "higher" normal forms (above 3NF) does not usually require an extra expenditure of effort on the part of the designer, because 3NF tables usually need no modification to meet the requirements of these higher normal forms.\r\n\r\nThe main normal forms are summarized below.\r\n', 'Normal Forms', '2014-12-16 00:00:00', 1),
(7, 'The main purpose of C++ programming is to add object orientation to the C programming language and classes are the central feature of C++ that supports object-oriented programming and are often called user-defined types.\r\n\r\nA class is used to specify the form of an object and it combines data representation and methods for manipulating that data into one neat package. The data and functions within a class are called members of the class.\r\n', 'C++ Classes', '2014-12-16 00:00:00', 4),
(8, 'In earlier chapters, variables have been explained as locations in the computer''s memory which can be accessed by their identifier (their name). This way, the program does not need to care about the physical address of the data in memory; it simply uses the identifier whenever it needs to refer to the variable.\r\n\r\nFor a C++ program, the memory of a computer is like a succession of memory cells, each one byte in size, and each with a unique address. These single-byte memory cells are ordered in a way that allows data representations larger than one byte to occupy memory cells that have consecutive addresses.\r\n\r\nThis way, each cell can be easily located in the memory by means of its unique address. For example, the memory cell with the address 1776 always follows immediately after the cell with address 1775 and precedes the one with 1777, and is exactly one thousand cells after 776 and exactly one thousand cells before 2776.\r\n', 'Pointers and Arrays', '2014-12-23 00:00:00', 4),
(9, 'An integration test has the target to test the behavior of a component or the integration between a set of components. The term functional test is sometimes used as synonym for integration test.\r\n\r\nThis kind of tests allow you to translate your user stories into a test suite, i.e., the test would resemble an expected user interaction with the application.\r\n', 'Unit Testing', '2014-12-10 00:00:00', 3),
(10, 'Scrum is an iterative and incremental agile software development framework for managing product development. It defines "a flexible, holistic product development strategy where a development team works as a unit to reach a common goal", challenges assumptions of the "traditional, sequential approach" to product development, and enables teams to self-organize by encouraging physical co-location or close online collaboration of all team members, as well as daily face-to-face communication among all team members and disciplines in the project.\r\n', 'Scrum Method', '2014-12-24 00:00:00', 3),
(11, 'week 1 class 1', 'calculus note 1', NULL, 7),
(12, 'week 1 class 2', 'calculus note 2', NULL, 7),
(14, 'tttt', 'ttt', NULL, 12),
(15, 'asdfasdfs', 'sadfasfd', NULL, 13);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` int(11) NOT NULL,
  `post_content` text,
  `post_date` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `topic_id`, `post_creator`, `post_content`, `post_date`) VALUES
(1, 2, 1, 1, 'test content ', '2014-12-05 18:30:54'),
(2, 2, 2, 1, 'test content ', '2014-12-05 18:33:09'),
(3, 2, 3, 1, 'test content 3', '2014-12-05 18:39:38'),
(4, 2, 3, 1, ' test', '2014-12-05 23:00:06'),
(5, 2, 3, 1, ' ', '2014-12-05 23:00:28'),
(6, 2, 3, 1, ' test2', '2014-12-05 23:00:34'),
(7, 2, 3, 1, ' test', '2014-12-05 23:31:41'),
(8, 2, 3, 1, ' test', '2014-12-05 23:33:07'),
(9, 2, 3, 1, ' test', '2014-12-05 23:34:20'),
(10, 2, 3, 1, ' test', '2014-12-05 23:34:32'),
(11, 2, 3, 1, ' asdf', '2014-12-05 23:49:27'),
(12, 2, 3, 1, ' asdf', '2014-12-05 23:49:32'),
(13, 2, 3, 1, 'aaa', '2014-12-05 23:49:41'),
(14, 2, 3, 1, ' tesss', '2014-12-05 23:55:56'),
(15, 1, 4, 1, ' as', '2014-12-06 00:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
`id` int(11) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `topic_title` varchar(150) NOT NULL,
  `topic_creator` int(11) DEFAULT NULL,
  `topic_last_user` int(11) DEFAULT NULL,
  `topic_date` datetime DEFAULT NULL,
  `topic_reply_date` datetime DEFAULT NULL,
  `topic_views` int(11) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `topic_title`, `topic_creator`, `topic_last_user`, `topic_date`, `topic_reply_date`, `topic_views`) VALUES
(1, 2, 'test topic', 1, NULL, '2014-12-05 18:30:54', '2014-12-05 18:30:54', 0),
(2, 2, 'test topic', 1, NULL, '2014-12-05 18:33:09', '2014-12-05 18:33:09', 9),
(3, 2, 'test topic3', 1, 1, '2014-12-05 18:39:38', '2014-12-05 23:55:56', 37),
(4, 1, 'sa', 1, NULL, '2014-12-06 00:03:30', '2014-12-06 00:03:30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'test', 'test', 'test@rpi.edu'),
(2, 'tli5', 'Adsltr965', 'tli5@slu.edu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
