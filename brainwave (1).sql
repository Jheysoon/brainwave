-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2015 at 04:07 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brainwave`
--

-- --------------------------------------------------------

--
-- Table structure for table `brain_joinroom`
--

CREATE TABLE IF NOT EXISTS `brain_joinroom` (
  `jid` int(12) NOT NULL,
  `rid` int(12) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `room_num` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `player_type` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brain_joinroom`
--

INSERT INTO `brain_joinroom` (`jid`, `rid`, `user_id`, `room_num`, `date`, `player_type`) VALUES
(1, 7, '2015-59259', '90680', '2015-09-23 10:06:39', 'Server'),
(2, 7, '2015-80485', '90680', '2015-09-23 10:13:09', 'Client'),
(3, 8, '2015-80485', '69839', '2015-09-23 13:32:43', 'Server'),
(4, 8, '2015-59259', '69839', '2015-09-23 13:33:25', 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `brain_question`
--

CREATE TABLE IF NOT EXISTS `brain_question` (
  `bid` int(12) NOT NULL,
  `question_path` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `question` varchar(250) NOT NULL,
  `hint` varchar(250) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brain_question`
--

INSERT INTO `brain_question` (`bid`, `question_path`, `level`, `subject`, `question`, `hint`, `answer`) VALUES
(6, './user/Desert.jpg', 'Easy', 'English', 'Sdsdsd?', 'Sdsdsd', ''),
(7, './user/Koala.jpg', 'Easy', 'English', 'What Animal Is This?', 'Koala', ''),
(8, './user/Lighthouse.jpg', 'Easy', 'English', 'Sdfssfsfs?', 'Xcss', ''),
(9, './user/Tulips.jpg', 'Easy', 'English', 'Zzadsd', 'Fxvxsff', ''),
(10, './user/Penguins.jpg', 'Easy', 'English', 'Fdfddgdg?', 'Dgfdgg', '');

-- --------------------------------------------------------

--
-- Table structure for table `brain_rooms`
--

CREATE TABLE IF NOT EXISTS `brain_rooms` (
  `brim` int(12) NOT NULL,
  `room_num` varchar(500) NOT NULL,
  `server_id` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `players` int(12) NOT NULL,
  `num_of_players` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `player_type` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brain_rooms`
--

INSERT INTO `brain_rooms` (`brim`, `room_num`, `server_id`, `category`, `players`, `num_of_players`, `date`, `player_type`) VALUES
(7, '90680', '2015-59259', 'English', 2, 2, '2015-09-23 10:13:09', 'Server'),
(8, '69839', '2015-80485', 'English', 2, 2, '2015-09-23 13:33:25', 'Server');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(12) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `num_of_questions` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cat_name`, `num_of_questions`) VALUES
(34, 'Science', 0),
(41, 'Math', 0),
(44, 'History', 0),
(45, 'English', 0);

-- --------------------------------------------------------

--
-- Table structure for table `easy_choice`
--

CREATE TABLE IF NOT EXISTS `easy_choice` (
  `choice_id` int(11) NOT NULL,
  `qid` varchar(50) NOT NULL,
  `correct` varchar(50) NOT NULL,
  `choiceB` varchar(50) NOT NULL,
  `choiceC` varchar(50) NOT NULL,
  `choiceD` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `easy_choice`
--

INSERT INTO `easy_choice` (`choice_id`, `qid`, `correct`, `choiceB`, `choiceC`, `choiceD`) VALUES
(1, '1', '12', '123', '132', '112'),
(2, '2', '12', '132', '456', '234'),
(3, '3', 'Pangit ', 'Asim', 'Tamis', 'Aw'),
(4, '4', 'Sdsd', 'Sdsd', 'Sdsd', 'Sdsd'),
(5, '5', 'Dsdsdsd', 'Sdsd', 'Sdsd', 'Sdsd'),
(6, '1', 'Sdsdsd', 'Sdsd', 'Sdsd', 'Sdsds'),
(7, '2', 'Sdsdsd', 'Sdsds', 'Sdsdsd', 'Sdsds'),
(8, '3', 'Sdssd', 'Sdsdsd', 'Sdsdsd', 'Sdsdsd'),
(9, '4', 'Sdssfd', 'Sdsfdf', 'Sdsfdf', 'Sfsfdf'),
(10, '5', 'Sdssf', 'Sdsff', 'Sdfsfsf', 'Sfsff'),
(11, '6', 'Sdsdd', 'Dsdsds', 'Sdsds', 'Sdsds'),
(12, '7', 'Koala', 'Monkey', 'Dog ', 'Giraffe'),
(13, '8', 'Sfdsfsf', 'Sfsfsf', 'Sfsf', 'Sfsfdfd'),
(14, '9', 'Sdssf', 'Dfdf', 'Dfdg', 'Ddgg'),
(15, '10', 'Fdfdfg', 'Ddg', 'Dfgdgdg', 'Dgddgd');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `logID` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `uid` int(12) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_path` varchar(500) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `age` int(12) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `bday` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `date_reg` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`uid`, `user_id`, `user_path`, `lname`, `fname`, `middlename`, `address`, `contact`, `age`, `gender`, `bday`, `username`, `password`, `usertype`, `date_reg`) VALUES
(44, '2015-59259', './user/Jeremiah - Copy.jpg', 'Bacate', 'Dp', 'U', 'Tacloban', '0999999999', 21, 'Male', '1 September, 2015', 'dp', '*6EB9707E469F2B1817D7727DB857BF5F4DF0B476', 'User', 'Sep:03:2015'),
(45, '2015-58817', './user/20150826_134631.jpg', 'Mendros', 'Mary Ann', 'A', 'Marabut', '0999999999', 19, 'Female', '1 December, 1996', 'maryann', '*75A4066C639A6D07AE169490413C5C092335BF8A', 'Admin', 'Sep:08:2015'),
(46, '2015-80485', './user/180749_Women-Kids-People-Smiling_2560x1600.jpg', 'Echon', 'Echon', 'Echon', 'Tacloban', '0999999999', 25, 'Male', '1 September, 1994', 'echon', '*FE46795CCC569D5F34E131344FF3980940C71D86', 'User', 'Sep:09:2015'),
(47, '2015-68661', './user/Nature wallpapers high resolution (7).jpg', 'Modet', 'Modet', 'Modet', 'Tacloban', '0999999999', 19, 'Male', '1 September, 1995', 'modet', '*48E3521B24B3EFFFB9F6EEB40A42A327DDFEE4B5', 'User', 'Sep:09:2015'),
(48, '2015-46482', './user/Tue Sep 15 22-03-10.bmp', 'Bacate', 'Manit', 'B', 'Tacloban', '09212349033', 40, 'Male', '24 March, 1994', 'manit', '*3DAE6BAF2D5BE0003F4C24B6CB1591DE505F5D4A', 'User', 'Sep:17:2015');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_question`
--

CREATE TABLE IF NOT EXISTS `reserve_question` (
  `res_id` int(12) NOT NULL,
  `room_num` int(12) NOT NULL,
  `question_num` int(12) NOT NULL,
  `question_id` int(12) NOT NULL,
  `difficulty` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve_question`
--

INSERT INTO `reserve_question` (`res_id`, `room_num`, `question_num`, `question_id`, `difficulty`) VALUES
(1, 90680, 1, 8, 'Easy'),
(2, 90680, 2, 10, 'Easy'),
(3, 90680, 3, 9, 'Easy'),
(4, 90680, 4, 7, 'Easy'),
(5, 90680, 5, 6, 'Easy'),
(6, 69839, 1, 10, 'Easy'),
(7, 69839, 2, 6, 'Easy'),
(8, 69839, 3, 7, 'Easy'),
(9, 69839, 4, 9, 'Easy'),
(10, 69839, 5, 8, 'Easy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brain_joinroom`
--
ALTER TABLE `brain_joinroom`
  ADD PRIMARY KEY (`jid`);

--
-- Indexes for table `brain_question`
--
ALTER TABLE `brain_question`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `brain_rooms`
--
ALTER TABLE `brain_rooms`
  ADD PRIMARY KEY (`brim`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `easy_choice`
--
ALTER TABLE `easy_choice`
  ADD PRIMARY KEY (`choice_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `reserve_question`
--
ALTER TABLE `reserve_question`
  ADD PRIMARY KEY (`res_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brain_joinroom`
--
ALTER TABLE `brain_joinroom`
  MODIFY `jid` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `brain_question`
--
ALTER TABLE `brain_question`
  MODIFY `bid` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `brain_rooms`
--
ALTER TABLE `brain_rooms`
  MODIFY `brim` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `easy_choice`
--
ALTER TABLE `easy_choice`
  MODIFY `choice_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `logID` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `uid` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `reserve_question`
--
ALTER TABLE `reserve_question`
  MODIFY `res_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
