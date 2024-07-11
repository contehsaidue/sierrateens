-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 05:25 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsierrateens`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblabout`
--

CREATE TABLE `tblabout` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblabout`
--

INSERT INTO `tblabout` (`id`, `title`, `about`) VALUES
(2, 'Sierrateens journey updated', 'Sierrateens journey updated');

-- --------------------------------------------------------

--
-- Table structure for table `tblaboutsettings`
--

CREATE TABLE `tblaboutsettings` (
  `id` int(11) NOT NULL,
  `bgtext` varchar(100) NOT NULL,
  `bgimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaboutsettings`
--

INSERT INTO `tblaboutsettings` (`id`, `bgtext`, `bgimage`) VALUES
(2, 'The Sierrateens About Updated', 'assets/images/IMG-20220428-WA0043.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`adminid`, `username`, `password`, `fname`, `lname`, `photo`, `position`) VALUES
(1, 'Nash', '1234', 'Abubakarr Nashid', 'Rogers', 'assets/images/IMG-20220428-WA0036.jpg', 'CEO');

-- --------------------------------------------------------

--
-- Table structure for table `tblawardcategory`
--

CREATE TABLE `tblawardcategory` (
  `awardid` int(11) NOT NULL,
  `catname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblawardcategory`
--

INSERT INTO `tblawardcategory` (`awardid`, `catname`) VALUES
(1, 'Best Rap Album'),
(2, 'Artiste of the year'),
(3, 'Best Collaboration'),
(4, 'Best Content Creator');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`id`, `email`, `address`, `phone1`, `phone2`) VALUES
(1, 'info@sierrateens.com', '29 Dan Street', '+23277028023', '+23279249271');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactsettings`
--

CREATE TABLE `tblcontactsettings` (
  `id` int(11) NOT NULL,
  `bgtext` varchar(100) NOT NULL,
  `bgimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontactsettings`
--

INSERT INTO `tblcontactsettings` (`id`, `bgtext`, `bgimage`) VALUES
(2, 'The Sierrateens Contact Updated', 'assets/images/IMG-20220428-WA0038.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblevent`
--

CREATE TABLE `tblevent` (
  `id` int(11) NOT NULL,
  `imagetext` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblevent`
--

INSERT INTO `tblevent` (`id`, `imagetext`, `image`) VALUES
(1, 'Teens Awards', 'assets/event/IMG-20220427-WA0069.jpg'),
(2, 'sierra buzz', 'assets/event/IMG-20220428-WA0038.jpg'),
(3, 'sierra buzz', 'assets/event/IMG-20220428-WA0043.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbleventsettings`
--

CREATE TABLE `tbleventsettings` (
  `id` int(11) NOT NULL,
  `bgtext` varchar(100) NOT NULL,
  `bgimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbleventsettings`
--

INSERT INTO `tbleventsettings` (`id`, `bgtext`, `bgimage`) VALUES
(1, 'The Sierrateens Moments Updated', 'assets/images/gladiator-1931077_1280.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblgallery`
--

CREATE TABLE `tblgallery` (
  `id` int(11) NOT NULL,
  `imagetext` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblgallery`
--

INSERT INTO `tblgallery` (`id`, `imagetext`, `image`) VALUES
(3, 'sierra buzz', 'assets/gallery/IMG-20220427-WA0069.jpg'),
(4, 'sierra buzz', 'assets/gallery/IMG-20220428-WA0038.jpg'),
(5, 'sierra buzz', 'assets/gallery/IMG-20220428-WA0043.jpg'),
(6, 'sierra buzz', 'assets/gallery/IMG-20220428-WA0041.jpg'),
(7, 'sierra buzz', 'assets/gallery/IMG-20220428-WA0042.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblgallerysettings`
--

CREATE TABLE `tblgallerysettings` (
  `id` int(11) NOT NULL,
  `bgtext` varchar(100) NOT NULL,
  `bgimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblgallerysettings`
--

INSERT INTO `tblgallerysettings` (`id`, `bgtext`, `bgimage`) VALUES
(2, 'The Sierrateens Gallery ', 'assets/images/IMG-20220428-WA0038.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblincomingmsg`
--

CREATE TABLE `tblincomingmsg` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblincomingmsg`
--

INSERT INTO `tblincomingmsg` (`id`, `name`, `phone`, `message`) VALUES
(4, 'Saidu', '+23277028023', 'service');

-- --------------------------------------------------------

--
-- Table structure for table `tblindexsettings`
--

CREATE TABLE `tblindexsettings` (
  `indexid` int(11) NOT NULL,
  `bgtext` varchar(100) NOT NULL,
  `bgimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblindexsettings`
--

INSERT INTO `tblindexsettings` (`indexid`, `bgtext`, `bgimage`) VALUES
(3, 'The Sierrateens Way', 'assets/images/IMG-20220428-WA0035.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblnominations`
--

CREATE TABLE `tblnominations` (
  `id` int(11) NOT NULL,
  `nameofnominee` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `attesttation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblprivatenominations`
--

CREATE TABLE `tblprivatenominations` (
  `nomineeid` int(11) NOT NULL,
  `nameofnominee` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `catnameid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblprivatenominations`
--

INSERT INTO `tblprivatenominations` (`nomineeid`, `nameofnominee`, `profile`, `catnameid`) VALUES
(4, 'Chase', 'assets/privatenominations/IMG-20220428-WA0037.jpg', 4),
(5, 'Nash', 'assets/privatenominations/IMG-20220428-WA0043.jpg', 3),
(6, 'Joel', 'assets/privatenominations/IMG-20220428-WA0038.jpg', 3),
(7, 'Kracktwist & Samza', 'assets/privatenominations/IMG-20220428-WA0038.jpg', 3),
(8, 'Joel', 'assets/privatenominations/IMG-20220428-WA0043.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblpublicnominations`
--

CREATE TABLE `tblpublicnominations` (
  `nomineeid` int(11) NOT NULL,
  `nameofnominee` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `catnameid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpublicnominations`
--

INSERT INTO `tblpublicnominations` (`nomineeid`, `nameofnominee`, `profile`, `catnameid`) VALUES
(2, 'Drizilik', 'assets/privatenominations/IMG-20220428-WA0038.jpg', 1),
(3, 'Chase', 'assets/privatenominations/IMG-20220428-WA0043.jpg', 3),
(5, 'Nash', 'assets/privatenominations/IMG-20220428-WA0043.jpg', 3),
(6, 'Joel', 'assets/privatenominations/IMG-20220428-WA0038.jpg', 3),
(7, 'Kracktwist & Samza', 'assets/privatenominations/IMG-20220428-WA0038.jpg', 3),
(8, 'Joel', 'assets/privatenominations/IMG-20220428-WA0043.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblshop`
--

CREATE TABLE `tblshop` (
  `productid` int(11) NOT NULL,
  `productimage` varchar(100) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `productprice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblshop`
--

INSERT INTO `tblshop` (`productid`, `productimage`, `productname`, `productprice`) VALUES
(1, 'assets/shop/IMG-20220428-WA0042.jpg', ' T-shirt', ' 400000');

-- --------------------------------------------------------

--
-- Table structure for table `tblshoporder`
--

CREATE TABLE `tblshoporder` (
  `orderid` int(11) NOT NULL,
  `nameofproduct` int(11) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblshoporder`
--

INSERT INTO `tblshoporder` (`orderid`, `nameofproduct`, `quantity`, `phone`, `name`) VALUES
(3, 1, '2', '+23277028023', 'Saidu');

-- --------------------------------------------------------

--
-- Table structure for table `tblshopsettings`
--

CREATE TABLE `tblshopsettings` (
  `id` int(11) NOT NULL,
  `bgtext` varchar(100) NOT NULL,
  `bgimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblshopsettings`
--

INSERT INTO `tblshopsettings` (`id`, `bgtext`, `bgimage`) VALUES
(2, 'The Sierrateens Store', 'assets/images/IMG-20220428-WA0038.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblteam`
--

CREATE TABLE `tblteam` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblteam`
--

INSERT INTO `tblteam` (`id`, `fname`, `lname`, `profile`, `position`) VALUES
(1, 'Abubakarr Nashid', 'Rogers', 'assets/members/IMG-20220428-WA0036.jpg', 'CEO ');

-- --------------------------------------------------------

--
-- Table structure for table `tblteamsettings`
--

CREATE TABLE `tblteamsettings` (
  `id` int(11) NOT NULL,
  `bgtext` varchar(100) NOT NULL,
  `bgimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblteamsettings`
--

INSERT INTO `tblteamsettings` (`id`, `bgtext`, `bgimage`) VALUES
(3, 'The Sierrateens Team Updated', 'assets/images/IMG-20220428-WA0038.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblabout`
--
ALTER TABLE `tblabout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblaboutsettings`
--
ALTER TABLE `tblaboutsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `tblawardcategory`
--
ALTER TABLE `tblawardcategory`
  ADD PRIMARY KEY (`awardid`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactsettings`
--
ALTER TABLE `tblcontactsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblevent`
--
ALTER TABLE `tblevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbleventsettings`
--
ALTER TABLE `tbleventsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgallerysettings`
--
ALTER TABLE `tblgallerysettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblincomingmsg`
--
ALTER TABLE `tblincomingmsg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblindexsettings`
--
ALTER TABLE `tblindexsettings`
  ADD PRIMARY KEY (`indexid`);

--
-- Indexes for table `tblnominations`
--
ALTER TABLE `tblnominations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblprivatenominations`
--
ALTER TABLE `tblprivatenominations`
  ADD PRIMARY KEY (`nomineeid`),
  ADD KEY `catnameid` (`catnameid`);

--
-- Indexes for table `tblpublicnominations`
--
ALTER TABLE `tblpublicnominations`
  ADD PRIMARY KEY (`nomineeid`),
  ADD KEY `catnameid` (`catnameid`);

--
-- Indexes for table `tblshop`
--
ALTER TABLE `tblshop`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `tblshoporder`
--
ALTER TABLE `tblshoporder`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `nameofproduct` (`nameofproduct`);

--
-- Indexes for table `tblshopsettings`
--
ALTER TABLE `tblshopsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblteam`
--
ALTER TABLE `tblteam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblteamsettings`
--
ALTER TABLE `tblteamsettings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblabout`
--
ALTER TABLE `tblabout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblaboutsettings`
--
ALTER TABLE `tblaboutsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblawardcategory`
--
ALTER TABLE `tblawardcategory`
  MODIFY `awardid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactsettings`
--
ALTER TABLE `tblcontactsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblevent`
--
ALTER TABLE `tblevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbleventsettings`
--
ALTER TABLE `tbleventsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblgallerysettings`
--
ALTER TABLE `tblgallerysettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblincomingmsg`
--
ALTER TABLE `tblincomingmsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblindexsettings`
--
ALTER TABLE `tblindexsettings`
  MODIFY `indexid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblnominations`
--
ALTER TABLE `tblnominations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblprivatenominations`
--
ALTER TABLE `tblprivatenominations`
  MODIFY `nomineeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblpublicnominations`
--
ALTER TABLE `tblpublicnominations`
  MODIFY `nomineeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblshop`
--
ALTER TABLE `tblshop`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblshoporder`
--
ALTER TABLE `tblshoporder`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblshopsettings`
--
ALTER TABLE `tblshopsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblteam`
--
ALTER TABLE `tblteam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblteamsettings`
--
ALTER TABLE `tblteamsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblprivatenominations`
--
ALTER TABLE `tblprivatenominations`
  ADD CONSTRAINT `tblprivatenominations_ibfk_1` FOREIGN KEY (`catnameid`) REFERENCES `tblawardcategory` (`awardid`);

--
-- Constraints for table `tblpublicnominations`
--
ALTER TABLE `tblpublicnominations`
  ADD CONSTRAINT `tblpublicnominations_ibfk_1` FOREIGN KEY (`catnameid`) REFERENCES `tblawardcategory` (`awardid`);

--
-- Constraints for table `tblshoporder`
--
ALTER TABLE `tblshoporder`
  ADD CONSTRAINT `tblshoporder_ibfk_1` FOREIGN KEY (`nameofproduct`) REFERENCES `tblshop` (`productid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
