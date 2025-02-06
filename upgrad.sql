-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2022 at 01:44 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upgrad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` int(255) NOT NULL,
  `state` int(255) NOT NULL,
  `city` int(255) NOT NULL,
  `zipcode` int(255) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `email`, `mobile`, `status`, `first_name`, `last_name`, `address`, `country`, `state`, `city`, `zipcode`, `pic`) VALUES
(1, 'admin@gmail.com', '1234', 'admin@upgrad.com', '9799184788', 0, 'Upgrad', 'Elites', 'jlk', 1, 1, 0, 342001, 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_members`
--

CREATE TABLE `faculty_members` (
  `id` int(11) NOT NULL,
  `yearbook_id` int(11) NOT NULL,
  `faculty_name` varchar(150) NOT NULL,
  `faculty_designation` varchar(150) NOT NULL,
  `faculty_quote` text NOT NULL,
  `faculty_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_members`
--

INSERT INTO `faculty_members` (`id`, `yearbook_id`, `faculty_name`, `faculty_designation`, `faculty_quote`, `faculty_image`) VALUES
(1, 1, 'Deep Thomas', 'Chief Data and Analytics Officer at Aditya Birla Group', 'I believe that the world moves through collaboration and not through individual brilliance. so, the relationships and network that you build today are the ones that will be really helpful to you, going forward Why is Data the new currency? Because everything is becoming digital, everything is generating bytes of information, those bytes of information are getting converted into numbers, these numbers are helping us identify patterns, determine the logic, and use that logic to make smart decisions.', 'faculty1888009061.jpg'),
(3, 1, 'Deep Thomas', 'Chief Data and Analytics Officer at Aditya Birla Group', 'I believe that the world moves through collaboration and not through individual brilliance. so, the relationships and network that you build today are the ones that will be really helpful to you, going forward Why is Data the new currency? Because everything is becoming digital, everything is generating bytes of information, those bytes of information are getting converted into numbers, these numbers are helping us identify patterns, determine the logic, and use that logic to make smart decisions.', 'faculty1150328768.jpg'),
(4, 1, 'Deep Thomas', 'Chief Data and Analytics Officer at Aditya Birla Group', 'I believe that the world moves through collaboration and not through individual brilliance. so, the relationships and network that you build today are the ones that will be really helpful to you, going forward Why is Data the new currency? Because everything is becoming digital, everything is generating bytes of information, those bytes of information are getting converted into numbers, these numbers are helping us identify patterns, determine the logic, and use that logic to make smart decisions.', 'faculty612677376.jpg'),
(5, 1, 'f5 ', 'f5 d5', 'f5 q5', 'faculty2041188143.png');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(150) NOT NULL,
  `quote` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `yearbook` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `designation`, `quote`, `image`, `yearbook`) VALUES
(9, 'Geet Jayant Dali', 'Sr Product Compliance Associate - Amazon India', 'Program journey: I had a non tech job and I was always\r\ninterested in learning technical languages. I wanted to learn\r\nTableau, SQL, etc and I wanted an MBA degree as well\r\nupGrad helped me', 'http://localhost/elite/upgrad/uploads/students/images_(1).jpg', 1),
(10, 'Geet Jayant Dali', 'Product Compliance Associate - Amazon India', 'Program journey: I had a non tech job and I was always interested in learning technical languages. I wanted to learn Tableau, SQL, etc and I wanted an MBA degree as well upGrad helped me', 'http://localhost/elite/upgrad/uploads/students/images_(1).jpg', 1),
(11, 'Geet Jayant Dali', 'Product Compliance Associate - Amazon India', 'Program journey: I had a non tech job and I was always interested in learning technical languages. I wanted to learn Tableau, SQL, etc and I wanted an MBA degree as well upGrad helped me', 'http://localhost/elite/upgrad/uploads/students/images_(1).jpg', 1),
(12, 'Test1', 'Test Design1', 'Test Quote1', 'http://localhost/elite/upgrade/uploads/students/ed1.png', 0),
(13, 'Test2', 'Test Design2', 'Test Quote2', 'http://localhost/elite/upgrade/uploads/students/ed1.png', 0),
(16, 'Test3', 'Test Desig3', 'Test Quote3', 'http://localhost/elite/upgrade/uploads/students/ed1.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `yearbook`
--

CREATE TABLE `yearbook` (
  `id` int(11) NOT NULL,
  `yearbook_name` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `yearbook_year` varchar(50) NOT NULL,
  `yearbook_description` text NOT NULL,
  `yearbook_image` varchar(250) NOT NULL,
  `university_logo` varchar(250) NOT NULL,
  `university_text` text NOT NULL,
  `ceo_name` varchar(100) NOT NULL,
  `ceo_designation` varchar(150) NOT NULL,
  `ceo_quote` text NOT NULL,
  `ceo_image` varchar(250) NOT NULL,
  `faculty_name` varchar(150) NOT NULL,
  `faculty_designation` varchar(150) NOT NULL,
  `faculty_quote` text NOT NULL,
  `faculty_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yearbook`
--

INSERT INTO `yearbook` (`id`, `yearbook_name`, `slug`, `yearbook_year`, `yearbook_description`, `yearbook_image`, `university_logo`, `university_text`, `ceo_name`, `ceo_designation`, `ceo_quote`, `ceo_image`, `faculty_name`, `faculty_designation`, `faculty_quote`, `faculty_image`) VALUES
(1, 'Yearbook Name One', 'yearbook_name_one', '2019-2020', '    Other Details			', 'communityengges.png', 'arrow.png', 'LJMU', 'Rajiv Shah', 'CEO & Director, NMIMS', ' Today, you have achieved a tremendous personal milestone and I am extremely proud of each one of you. You have completed the final step of your academic journey during a global pandemic, one of the largest crises our world has ever faced.\r\nThe road to success is littered with grit and failure. Each one of you has done ” a fantastic job of balancing your careers, overcoming roadblocks, and successfully undergoing the intense academic program powered by upGrad at NMIMS Global. I hope that in near future the world will return to “normal.” As emerging business graduates, you have the opportunity to continue on your path of growth and create a better future for yourself and your organization.\r\nThis is a time for all of us to celebrate and honour your accomplishments. As you move forward into your careers and life-long journeys, remember that your path continues, know that you can accomplish anything, and do great things with the knowledge you have acquired. Remember you are forever part of our NMIMS Global community.	', 'Nik-Passport-Size-Photo.jpg', '', '', '', ''),
(2, 'Yearbook Two', 'yearbook_two', '2020-2021', 'Other details', 'communityengges.png', 'g4.jpg', 'Univer Text', 'CEO Name', 'CEO', 'Quote', 'Nik-Passport-Size-Photo.jpg', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_members`
--
ALTER TABLE `faculty_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yearbook`
--
ALTER TABLE `yearbook`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty_members`
--
ALTER TABLE `faculty_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `yearbook`
--
ALTER TABLE `yearbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
