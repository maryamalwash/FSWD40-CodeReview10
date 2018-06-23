-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2018 at 02:46 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr10_Maryam_Alwash_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_first_name` varchar(100) DEFAULT NULL,
  `author_last_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_first_name`, `author_last_name`) VALUES
(1, 'alex ', 'pro'),
(2, 'flou', 'blue'),
(3, 'fe', 'woman'),
(4, 'Carolina', 'gmann'),
(5, 'Feleb', 'meme'),
(6, 'Jasson', 'Robert');

-- --------------------------------------------------------

--
-- Table structure for table `library_user`
--

CREATE TABLE `library_user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `library_user`
--

INSERT INTO `library_user` (`user_id`, `first_name`, `last_name`, `email`, `user_password`) VALUES
(2, 'testt', 'tesrrrr', 'helloe122@yahoo.com', '586d703e183c5604864b9e9b7c2e732c8e205bd68716cf9f628414b3d9a6461b'),
(3, 'testt', 'tesrrrr', 'helloe122@yahoo.com', '586d703e183c5604864b9e9b7c2e732c8e205bd68716cf9f628414b3d9a6461b'),
(4, 'test', 'testt', 'test@test.com', 'c15a5bc41e33e36ee25cc852e7be8c719f4c33711c3b82cfcaad0c25ce35cb70'),
(5, 'test', 'testt', 'test@test.com', 'c15a5bc41e33e36ee25cc852e7be8c719f4c33711c3b82cfcaad0c25ce35cb70'),
(6, 'test', 'testt', 'test@test.com', 'c15a5bc41e33e36ee25cc852e7be8c719f4c33711c3b82cfcaad0c25ce35cb70'),
(7, 'sameh', 'shahin', 'helloworld@sdjjisd.km', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'),
(8, 'sameh', 'shahin', 'samehshahin1000@yahoo.com', 'c0c2b02e852c1dbcecd79ff04fe5f22ef74afe541481c238d9967c9b96191cd9');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `media_type` varchar(100) DEFAULT NULL,
  `titel` varchar(100) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `available` varchar(10) DEFAULT NULL,
  `ISBN_code` int(11) DEFAULT NULL,
  `short_desc` varchar(300) DEFAULT NULL,
  `fk_author_id` int(11) DEFAULT NULL,
  `fk_publisher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `media_type`, `titel`, `image`, `available`, `ISBN_code`, `short_desc`, `fk_author_id`, `fk_publisher_id`) VALUES
(1, 'book', 'The girl on the train', 'https://upload.wikimedia.org/wikipedia/en/5/50/The_Girl_On_The_Train_%28US_cover_2015%29.png', 'yes', 1234567, 'Rachel catches the same commuter train every morning. She knows it will wait at the same signal each time,\r\n                          overlooking a row of back gardens. She\'s even started to feel like she knows the people who 														  live in one of the houses. \'Jess and Jason\',\r\n            ', 1, 1),
(2, 'book', 'The hunger games', 'https://upload.wikimedia.org/wikipedia/en/d/dc/The_Hunger_Games.jpg', 'yes', 7654321, 'Parents need to know that Suzanne Collins\' The Hunger Games is a story about a reality show where 24 teens must kill one another until only one survives. They do so with spears, rocks, arrows, knives, fire, and by hand. It\'s not unduly gory, but there is lots of violence, all of it teen on teen. The', 2, 2),
(3, 'DVD', ' Twinkle Twinkle Little Star ', 'https://cdn.shopify.com/s/files/1/1012/1116/products/DVD_case_Twinkle_Twinkle_square_1024x1024.jpg?v=1527582150', 'yes', 98765, 'Twinkle, twinkle, little star\r\nHow I wonder what you are\r\nUp above the world so high\r\nLike a diamond in the sky\r\nTwinkle, twinkle little star\r\nHow I wonder what you are\r\n', 3, 3),
(4, 'DVD', 'Good Night, Sleep Tight', 'https://images-na.ssl-images-amazon.com/images/I/71SHl3TF0hL.jpg', 'No', 567890, 'Starring the Kidsongs Kids™\r\nThis special Kidsongs™ DVD is designed to help children transition from an active day to bedtime. We find the Kidsongs Kids playing at the park and follow their evening activities through dinner, a puppet show, star gazing, and lullabies. Great music, and a little help f', 4, 4),
(5, 'CD', ' Out Loud', 'https://img.discogs.com/zoCavzsCqATIdyMT__oE71fjCDA=/fit-in/300x300/filters:strip_icc():format(jpeg):mode_rgb():quality(40)/discogs-images/R-199038-1499233152-4307.jpeg.jpg', 'No', 6543210, 'Out Loud is the debut single by American YouTuber, singer, and songwriter Gabbie Hanna. Announced on August 30, 2017, it was 						   released on September 6, 2017, in support of her book of poems, Adultolsecence (2017).', 5, 5),
(7, 'book', 'harry potter', 'https://upload.wikimedia.org/wikipedia/en/6/6b/Harry_Potter_and_the_Philosopher%27s_Stone_Book_Cover.jpg', 'No', 345678, '\r\nHarry Potter and the Philosopher\'s Stone\r\nHarry Potter and the Philosopher\'s Stone Book Cover.jpg\r\nCover for one of the earliest UK editions\r\nAuthor	J. K. Rowling\r\nIllustrator	\r\nThomas Taylor (UK Edition)\r\nJonny Duddle (2014 UK Edition)\r\nMary GrandPré (US Edition)\r\nKazu Kibuishi (2013 US Edition)\r', 4, 4),
(8, 'book', 'A song of ice and Fire', 'https://upload.wikimedia.org/wikipedia/en/d/dc/A_Song_of_Ice_and_Fire_book_collection_box_set_cover.jpg', 'Yes', 345669, '\r\nA Song of Ice and Fire\r\nA Song of Ice and Fire book collection box set cover.jpg\r\nA Song of Ice and Fire book collection box set cover\r\nA Game of Thrones (1996)\r\nA Clash of Kings (1998)\r\nA Storm of Swords (2000)\r\nA Feast for Crows (2005)\r\nA Dance with Dragons (2011)\r\nThe Winds of Winter (forthcomi', 1, 2),
(9, 'DVD', 'My Favorite Songs', 'https://i.ebayimg.com/images/g/x~4AAOSwDNdVpnwL/s-l300.jpg', 'No', 3456799, 'kdsongs™ Greatest Hits! 12 of our all time most popular music videos in one very special episode.\r\nFeatures: Kid Friendly Auto Repeat, Digitally Mastered, Dolby 5.1 Surround Sound & Stereo, Closed Captioned.\r\nRunning time: approximately 30 minutes', 3, 6),
(10, 'CD', 'Sing Your Heart Out', 'https://is2-ssl.mzstatic.com/image/thumb/Music/ec/34/b4/mzi.wiyxddtt.jpg/268x0w.jpg', 'No', 3456744, 'The part \"your heart out\" basically means with vigorous or intense conviction. This is the basic intent of your sentence -- that it\'s okay to do that something as long as the person is doing it with great conviction or considerable effort.\r\n', 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `pub_name` varchar(100) DEFAULT NULL,
  `pub_address` varchar(100) DEFAULT NULL,
  `pub_size` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `pub_name`, `pub_address`, `pub_size`) VALUES
(1, 'McSweeney’s', 'San Francisco', 'small'),
(2, 'Hanging Loose Press', 'Brooklyn', 'medium'),
(3, 'martin gutmann', 'Austria', 'big'),
(4, 'Mario bigman', 'germany', 'medium'),
(5, 'Mario smallman', 'germany', 'big'),
(6, 'Sameh bigman', 'VIenna', 'big');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `library_user`
--
ALTER TABLE `library_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `fk_author_id` (`fk_author_id`),
  ADD KEY `fk_publisher_id` (`fk_publisher_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `library_user`
--
ALTER TABLE `library_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`fk_author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`fk_publisher_id`) REFERENCES `publisher` (`publisher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
