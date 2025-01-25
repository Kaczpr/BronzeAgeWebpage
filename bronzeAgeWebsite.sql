-- phpMyAdmin SQL Dump
-- version 5.2.1-5.fc41
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2025 at 06:54 PM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bronzeAgeWebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `articleUrl` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `articleDiscription` varchar(255) NOT NULL,
  `imageSource` varchar(255) NOT NULL,
  `dateStored` timestamp NULL DEFAULT current_timestamp(),
  `placeOfInterest` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `articleUrl`, `title`, `articleDiscription`, `imageSource`, `dateStored`, `placeOfInterest`) VALUES
(1, '/BronzeAgeWebpage/php/articles/esrahadonArticle.php', 'Najstarsza choroba świata. Król walczący z depresją', 'Aeshrahaddon wygrał wiele bitew, ale ta okazała się być zbyt trudna.', '/BronzeAgeWebpage/images/articles/sadMan.jpg', '2025-01-25 18:28:14', 'Assyria'),
(2, '/BronzeAgeWebpage/php/articles/ashurbanipalLibrary.php', 'Najważniejsza bibliotego archeologii', 'Ważniejsza nawet od biblioteki w Aleksandrii?', '/BronzeAgeWebpage/images/articles/library.png', '2025-01-25 18:30:21', 'Assyria'),
(3, '/BronzeAgeWebpage/php/articles/gardensOfNiniwa.php', 'Wiszące ogrody w... Niniwie?', 'Historia jednego z cudów świata.', '/BronzeAgeWebpage/images/articles/garden.png', '2025-01-25 18:30:58', 'Babylon');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `authorID` int(11) NOT NULL,
  `articleID` int(11) NOT NULL,
  `content` varchar(1024) NOT NULL,
  `upvotes` int(11) NOT NULL DEFAULT 0,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `authorID`, `articleID`, `content`, `upvotes`, `dateAdded`) VALUES
(1, 1, 1, 'test', 1, '2025-01-25 18:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `commentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likeID`, `userID`, `commentID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hashPassword` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `hashPassword`, `name`, `email`) VALUES
(1, 'kacperB', '$2y$12$uQPc.gwdHZHWdCqyisi.J.NQ5kiYTUIbwy9nc6vcsdAjz0xAFwNjK', 'Kacper', 'bojarski.kacper02@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeID`),
  ADD KEY `authorID` (`userID`),
  ADD KEY `commentID` (`commentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`commentID`) REFERENCES `comments` (`commentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
