-- phpMyAdmin SQL Dump
-- version 4.7.0-rc1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2017 at 08:48 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `book_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`id`, `name`, `author`, `book_desc`) VALUES
(7, '1984', 'George Orwell', 'Ask her how her day was. Say it in Russian! Fry! Stay back! He\'s too powerful! Whoa a real live robot; or is that some kind of cheesy New Year\'s costume?'),
(8, 'The Hobbit', 'J. R. R. Tolkien', 'For one beautiful night I knew what it was like to be a grandmother. Subjugated, yet honored. Daylight and everything. Oh, I think we should just stay friends.'),
(9, 'Charlie and the Chocolate Factory', 'Roald Dahl', 'Hey, tell me something. You\'ve got all this money. How come you always dress like you\'re doing your laundry? Shut up and take my money!'),
(10, 'Fahrenheit 451', 'Ray Bradbury', 'Yeah, lots of people did. But existing is basically all I do! Is today\'s hectic lifestyle making you tense and impatient? Now what? I had more, but you go ahead.'),
(11, 'Invisible Man', 'Ralph Ellison', 'And when we woke up, we had these bodies. Tell her you just want to talk. It has nothing to do with mating. Hey, whatcha watching? I love you, buddy!'),
(12, 'Ulysses', 'James Joyce', 'These old Doomsday Devices are dangerously unstable. I\'ll rest easier not knowing where they are. I suppose I could part with \'one\' and still be feared…'),
(13, 'War and Peace', 'Leo Tolstoy', 'Too much work. Let\'s burn it and say we dumped it in the sewer. Kif, I have mated with a woman. Inform the men. With gusto. Who am I making this out to?'),
(19, 'Moby Dick', 'Herman Melville', 'Bender, hurry! This fuel\'s expensive! Also, we\'re dying! Ugh, it\'s filthy! Why not create a National Endowment for Strip Clubs while we\'re at it?'),
(20, 'john', 'john', 'description'),
(21, 'rambo3', 'rambo3', 'description'),
(22, 'aaa', 'aaa', 'description'),
(26, 'film4', 'film4', 'description'),
(27, 'film5', 'film5', 'description'),
(28, 'film6', 'film6', 'description'),
(29, 'ccc', 'ccc', 'ccc'),
(30, 'film7', 'film7', 'description'),
(31, 'film7s', 'film7s', 'description'),
(32, 'film7sq', 'film7sq', 'description');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Book`
--
ALTER TABLE `Book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
