-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2023 at 06:02 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CUSTOMER`
--

INSERT INTO `CUSTOMER` (`id`, `name`, `email`, `password`, `phone`) VALUES
(1, 'John Doe', 'john@example.com', 'password1', '123-456-7890'),
(2, 'Alice Smith', 'alice@example.com', 'password2', '987-654-3210'),
(3, 'Bob Johnson', 'bob@example.com', 'password3', '111-222-3333'),
(4, 'Emily Brown', 'emily@example.com', 'password4', '444-555-6666'),
(5, 'David Miller', 'david@example.com', 'password5', '777-888-9999'),
(6, 'Sophia Wilson', 'sophia@example.com', 'password6', '000-111-2222'),
(7, 'Oliver Garcia', 'oliver@example.com', 'password7', '333-444-5555'),
(8, 'Emma Martinez', 'emma@example.com', 'password8', '666-777-8888'),
(9, 'James Rodriguez', 'james@example.com', 'password9', '888-999-0000'),
(10, 'Isabella Lopez', 'isabella@example.com', 'password10', '555-444-3333');

-- --------------------------------------------------------

--
-- Table structure for table `INVENTORY`
--

CREATE TABLE `INVENTORY` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `format` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `INVENTORY`
--

INSERT INTO `INVENTORY` (`id`, `movie_id`, `format`, `quantity`) VALUES
(1, 1, 'physical', 49),
(2, 2, 'streaming', 30),
(3, 3, 'physical', 40),
(4, 4, 'streaming', 20),
(5, 5, 'physical', 60),
(6, 6, 'streaming', 25),
(7, 7, 'physical', 45),
(8, 8, 'streaming', 35),
(9, 9, 'physical', 55),
(10, 10, 'streaming', 28);

-- --------------------------------------------------------

--
-- Table structure for table `MOVIE`
--

CREATE TABLE `MOVIE` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `wdb_rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MOVIE`
--

INSERT INTO `MOVIE` (`id`, `title`, `year`, `wdb_rating`) VALUES
(1, 'Inception', 2010, '8.8'),
(2, 'The Dark Knight', 2008, '9.0'),
(3, 'Pulp Fiction', 1994, '8.9'),
(4, 'The Shawshank Redemption', 1994, '9.3'),
(5, 'Fight Club', 1999, '8.8'),
(6, 'Forrest Gump', 1994, '8.8'),
(7, 'The Matrix', 1999, '8.7'),
(8, 'The Lord of the Rings: The Fellowship of the Ring', 2001, '8.8'),
(9, 'The Godfather', 1972, '9.2'),
(10, 'Interstellar', 2014, '8.6');

-- --------------------------------------------------------

--
-- Table structure for table `ORDERS`
--

CREATE TABLE `ORDERS` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ORDERS`
--

INSERT INTO `ORDERS` (`id`, `customer_id`, `movie_id`, `quantity`, `total_price`) VALUES
(1, 1, 1, 1, '12.99'),
(2, 1, 4, 1, '6.99'),
(3, 1, 1, 1, '12.99');

-- --------------------------------------------------------

--
-- Table structure for table `PERFORMANCE`
--

CREATE TABLE `PERFORMANCE` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PERFORMANCE`
--

INSERT INTO `PERFORMANCE` (`id`, `movie_id`, `theater_id`, `date`, `time`) VALUES
(1, 1, 1, '2023-11-01 00:00:00', '2018-00-00 00:00:00'),
(2, 2, 2, '2023-11-02 00:00:00', '2019-00-00 00:00:00'),
(3, 3, 3, '2023-11-03 00:00:00', '2020-00-00 00:00:00'),
(4, 4, 4, '2023-11-04 00:00:00', '2021-00-00 00:00:00'),
(5, 5, 5, '2023-11-05 00:00:00', '2022-00-00 00:00:00'),
(6, 6, 6, '2023-11-06 00:00:00', '2023-00-00 00:00:00'),
(7, 7, 7, '2023-11-07 00:00:00', '2018-00-00 00:00:00'),
(8, 8, 8, '2023-11-08 00:00:00', '2019-00-00 00:00:00'),
(9, 9, 9, '2023-11-09 00:00:00', '2020-00-00 00:00:00'),
(10, 10, 10, '2023-11-10 00:00:00', '2021-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `PHYSICAL`
--

CREATE TABLE `PHYSICAL` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `bin` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PHYSICAL`
--

INSERT INTO `PHYSICAL` (`id`, `movie_id`, `bin`, `quantity`, `price`) VALUES
(1, 1, 'A001', 10, '12.99'),
(2, 2, 'B002', 15, '14.99'),
(3, 3, 'C003', 20, '11.99'),
(4, 4, 'D004', 8, '16.99'),
(5, 5, 'E005', 25, '9.99'),
(6, 6, 'F006', 12, '17.99'),
(7, 7, 'G007', 18, '10.99'),
(8, 8, 'H008', 30, '13.99'),
(9, 9, 'I009', 22, '8.99'),
(10, 10, 'J010', 10, '15.99');

-- --------------------------------------------------------

--
-- Table structure for table `PLAYER`
--

CREATE TABLE `PLAYER` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PLAYER`
--

INSERT INTO `PLAYER` (`id`, `name`, `role`) VALUES
(1, 'Actor 1', 'Lead Actor'),
(2, 'Actor 2', 'Supporting Actor'),
(3, 'Actor 3', 'Supporting Actor'),
(4, 'Actor 4', 'Lead Actor'),
(5, 'Actor 5', 'Supporting Actor'),
(6, 'Actor 6', 'Supporting Actor'),
(7, 'Actor 7', 'Lead Actor'),
(8, 'Actor 8', 'Supporting Actor'),
(9, 'Actor 9', 'Supporting Actor'),
(10, 'Actor 10', 'Lead Actor');

-- --------------------------------------------------------

--
-- Table structure for table `STREAMING`
--

CREATE TABLE `STREAMING` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `STREAMING`
--

INSERT INTO `STREAMING` (`id`, `movie_id`, `url`, `price`) VALUES
(1, 1, 'https://example.com/stream/inception', '9.99'),
(2, 2, 'https://example.com/stream/dark_knight', '8.99'),
(3, 3, 'https://example.com/stream/pulp_fiction', '7.99'),
(4, 4, 'https://example.com/stream/shawshank_redemption', '6.99'),
(5, 5, 'https://example.com/stream/fight_club', '5.99'),
(6, 6, 'https://example.com/stream/forrest_gump', '4.99'),
(7, 7, 'https://example.com/stream/matrix', '9.99'),
(8, 8, 'https://example.com/stream/lotr_fellowship', '8.99'),
(9, 9, 'https://example.com/stream/godfather', '7.99'),
(10, 10, 'https://example.com/stream/interstellar', '6.99');

-- --------------------------------------------------------

--
-- Table structure for table `THEATER`
--

CREATE TABLE `THEATER` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `THEATER`
--

INSERT INTO `THEATER` (`id`, `name`, `address`, `phone`) VALUES
(1, 'Theatre A', '123 Main St', '123-456-7890'),
(2, 'Theatre B', '456 Elm St', '987-654-3210'),
(3, 'Theatre C', '789 Oak St', '111-222-3333'),
(4, 'Theatre D', '321 Pine St', '444-555-6666'),
(5, 'Theatre E', '555 Maple St', '777-888-9999'),
(6, 'Theatre F', '999 Cedar St', '000-111-2222'),
(7, 'Theatre G', '888 Walnut St', '333-444-5555'),
(8, 'Theatre H', '222 Birch St', '666-777-8888'),
(9, 'Theatre I', '777 Oak St', '888-999-0000'),
(10, 'Theatre J', '111 Willow St', '555-444-3333');

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `available_seats` int(11) NOT NULL,
  `show_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `theater_id`, `movie_id`, `available_seats`, `show_time`) VALUES
(1, 1, 1, 100, '2023-12-01 15:00:00'),
(2, 2, 2, 120, '2023-12-02 18:30:00'),
(3, 3, 3, 90, '2023-12-03 14:15:00'),
(4, 1, 4, 80, '2023-12-04 20:00:00'),
(5, 2, 5, 110, '2023-12-05 16:45:00'),
(6, 3, 6, 95, '2023-12-06 19:30:00'),
(7, 1, 7, 70, '2023-12-07 12:00:00'),
(8, 2, 8, 105, '2023-12-08 17:45:00'),
(9, 3, 9, 85, '2023-12-09 21:00:00'),
(10, 1, 10, 75, '2023-12-10 13:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `INVENTORY`
--
ALTER TABLE `INVENTORY`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MOVIE`
--
ALTER TABLE `MOVIE`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ORDERS`
--
ALTER TABLE `ORDERS`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PERFORMANCE`
--
ALTER TABLE `PERFORMANCE`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PHYSICAL`
--
ALTER TABLE `PHYSICAL`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PLAYER`
--
ALTER TABLE `PLAYER`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `STREAMING`
--
ALTER TABLE `STREAMING`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `THEATER`
--
ALTER TABLE `THEATER`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `INVENTORY`
--
ALTER TABLE `INVENTORY`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `MOVIE`
--
ALTER TABLE `MOVIE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ORDERS`
--
ALTER TABLE `ORDERS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `PERFORMANCE`
--
ALTER TABLE `PERFORMANCE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `PHYSICAL`
--
ALTER TABLE `PHYSICAL`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `PLAYER`
--
ALTER TABLE `PLAYER`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `STREAMING`
--
ALTER TABLE `STREAMING`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `THEATER`
--
ALTER TABLE `THEATER`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
