-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 03:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`Username`, `Password`) VALUES
('kishan', 'kishan123'),
('khushal', 'khushal123');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `city` varchar(40) NOT NULL,
  `place` varchar(50) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `person` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `email`, `mobile`, `city`, `place`, `fromdate`, `todate`, `person`) VALUES
(1, 'kishan', 'kishan@gmail.com', '8487584765', 'ahemedabad', 'Divine Dwarkadhish Temple Journey', '2023-09-03', '2023-09-07', 2),
(2, 'khushal', 'khushal@gmail.com', '9465764756', 'surat', 'Divine Mata na Madh Temple Tour', '2023-09-03', '2023-09-07', 2),
(4, 'raj', 'raj@gmail.com', '8477567467', 'vadodra', 'Divine Akshardham Temple Tour', '2023-09-03', '2023-09-07', 5),
(5, 'yash', 'yash@gmail.com', '8544645416', 'gandhinagar', 'Divine Khodaldham Temple Tour', '2023-09-03', '2023-09-07', 2),
(6, 'Naresh', 'naru@gmail.com', '9987456412', 'Surat', 'Divine Somnath Jyotirlinga Yatra', '2023-09-03', '2023-09-07', 4);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `feed` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `mob`, `email`, `feed`) VALUES
(4, 'kishan', '8737466764', 'k@gmail.com', 'awesome!'),
(5, 'khushal', '9376476765', 'khushal@gmail.com', 'nice!'),
(8, 'Kishan Ginoya', '8544645416', 'k@gmail.com', 'this website is good!!'),
(9, 'Kishan Ginoya', '9544645416', 'k@gmail.com', 'this is awesom!!!');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `feature` varchar(100) NOT NULL,
  `detail` varchar(10000) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `type`, `location`, `price`, `feature`, `detail`, `image`) VALUES
(1, 'Divine Somnath Jyotirlinga Yatra', 'Group Package', 'Gir Somnath, Gujarat', '2600', 'Best Environment, Holiest Shiva Temple, Free pick up and drop facility', 'If you are looking for a memorable Somnath trip, this holiday packages are the right choice for you. Pick this holiday for a relaxing vacation in Somnath. Somnath is a place of holiday shiva temple. The Somnath Temple in Gujarat is the first of the 12 Jyotirlingas. The area is also popular by the name Deo Patan or Prabhas Kshetra. The Somnath Mandir is one of the most popular Hindu pilgrimages. The temple was attacked and destroyed multiple times by Muslim invaders and rulers in the past but was rebuilt by Hindus.', 'Somnath.jpeg'),
(2, 'Divine Ambaji Temple Tour', 'Family Package', 'Banaskantha, Gujarat', '3500', 'Best Environment, Holiest Ambaji Mata Temple, Free pick up and drop facility, Natural Beauty', 'If you are looking for a memorable Ambaji Temple trip, this holiday packages are the right choice for you. Pick this holiday for a relaxing vacation in Ambaji. Enjoy priority access to the temple for a hassle-free and serene darshan of Goddess Amba, surrounded by the breathtaking Aravalli hills. Discover local handicrafts and souvenirs at the vibrant markets near the temple, perfect for picking up unique mementos of your visit. The temple is located in the serene and picturesque Aravalli Hills, offering breathtaking views. Visitors can experience the beauty of nature along with their spiritual journey. Many believe that a visit to Ambaji Temple provides a deep sense of peace and spiritual fulfillment.', 'Ambaji.jpeg'),
(3, 'Divine Dwarkadhish Temple Journey', 'Group Package', 'Jamnagar, Gujarat', '2200', ' Best Environment, Holiest Shri Krishna Temple, Ancient Architecture, Evening Aarti, Free pick up an', 'If you are looking for a memorable Dwarkadhish Temple trip, this holiday packages are the right choice for you. Pick this holiday for a relaxing vacation in Dwarka. Dwarka Temple welcomes pilgrims from every corner of the world, Dwarka Temple welcomes pilgrims from every corner of the world. Let your faith guide you on the best journey of your life to Dwarkadhish Temple, an experience that will stay etched in your heart. Embark on the best journey of your life as you trace the footsteps of Lord Krishna in the legendary city of Dwarka.', 'Dwarka.jpg'),
(4, 'Divine Khodaldham Temple Tour', 'Group Package', 'Rajkot, Gujarat', '   1500', 'Best Environment, Holiest Khodal Mata Temple, Free pick up and drop facility', 'if you are looking for a memorable Khodaldham Temple trip, this holiday packages are the right choice for you. Pick this holiday for a relaxing vacation in Khodaldham. This spiritual journey will transport you to the sacred heart of the temple, where you can bask in the blessings and serenity of this revered site. Immerse yourself in the spiritual traditions, partake in soul-soothing rituals, and relish the local flavors of the region. Our meticulously crafted package promises a seamless and spiritually enriching visit to Khodaldham Temple, ensuring you have a meaningful experience while exploring the cultural treasures of this remarkable destination.', 'Khodaldham.png'),
(5, 'Divine Mata na Madh Temple Tour', 'Family Package', 'Kutch, Gujarat', '   3000', 'Best Environment, Holiest Ashapura Mata Temple, Free pick up and drop facility', 'if you are looking for a memorable Mata na Madh Temple trip, this holiday packages are the right choice for you. Pick this holiday for a relaxing vacation in Kutch. Ashapura Maa, also known as the Goddess of Fulfillment, is deeply revered by devotees  who seek her blessings for prosperity, happiness, and well-being.. The Mata Na Madh Temple is believed to be a place where devotees wishes are granted, and their prayers are\r\nanswered. \"Experience the divine grace of Ashapura Maa in the heart of Kutch with our best Mata Na Madh Temple package.Our carefully curated package ensures a seamless and meaningful visit to Mata Na Madh Temple, allowing you to connect with your spiritual side while exploring the cultural gems of this enchanting region.', 'Mata no Madh.jpeg'),
(8, 'Divine Akshardham Temple Tour', 'Family Package', 'Gandhinagar, Gujarat', '      3500', 'Best Environment, Holiest Lord Swaminarayan Temple, Free pick up and drop facility, Light and Sound ', 'if you are looking for a memorable Akshardham Temple trip, this holiday packages are the right choice for you. Pick this holiday for a relaxing vacation in Akshardham Temple. Akshardham is dedicated to Bhagwan Swaminarayan, the founder of the Swaminarayan tradition of Hinduism. Devotees and visitors come here to seek spiritual solace and participate in religious ceremonies. using animatronics, light, and sound displays to tell the story of the nation.', 'akshardham.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `mob` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `mob`, `email`, `password`) VALUES
(1, 'kishan', '9647545767', 'kishan@gmail.com', 'c53545c8c3ef8fd26bfd00f23d1bd995'),
(2, 'khushal', '9458747546', 'khushal@gmail.com', 'f00084510f38a31b7529fa4030ba60b2'),
(3, 'dhruv', '8475674577', 'dhruv@gmail.com', '7199101025e18e6f160d764a7ca71180'),
(4, 'kirtan', '8475847676', 'kirtan@gmail.com', '99984cdd840bd32c34e65b5873754a2e'),
(5, 'yash', '8475874958', 'yash@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `person` int(100) NOT NULL,
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `name`, `email`, `mob`, `city`, `place`, `price`, `fromdate`, `todate`, `person`, `total`) VALUES
(1, 'kishan', 'kishan@gmail.com', '8487584765', 'ahemedabad', 'Divine Dwarkadhish Temple Journey', 2200, '2023-09-03', '2023-09-07', 2, 4400),
(2, 'khushal', 'khushal@gmail.com', '9465764756', 'surat', 'Divine Mata na Madh Temple Tour', 3000, '2023-09-03', '2023-09-07', 2, 6000),
(4, 'raj', 'raj@gmail.com', '8477567467', 'vadodra', 'Divine Akshardham Temple Tour', 3500, '2023-09-03', '2023-09-07', 5, 17500),
(5, 'yash', 'yash@gmail.com', '8544645416', 'gandhinagar', 'Divine Khodaldham Temple Tour', 1500, '2023-09-03', '2023-09-07', 2, 3000),
(6, 'Naresh', 'naru@gmail.com', '9987456412', 'Surat', 'Divine Somnath Jyotirlinga Yatra', 2600, '2023-09-03', '2023-09-07', 4, 10400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
