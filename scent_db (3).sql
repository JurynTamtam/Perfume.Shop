-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 07:34 AM
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
-- Database: `scent_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cartID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(100) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `productdescription` varchar(200) NOT NULL,
  `price` int(50) NOT NULL,
  `productunit` varchar(100) NOT NULL,
  `quantity` int(50) NOT NULL,
  `image_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productname`, `productdescription`, `price`, `productunit`, `quantity`, `image_url`) VALUES
(1, 'Hendley Perfumes', 'A sophisticated and unique fragrance that embodies elegance and luxury. Perfect for those who appreciate high-quality scents.', 350, 'piece', 12, 'https://fimgs.net/mdimg/secundar/o.61366.jpg'),
(2, 'Smell EAU DEAR', 'A delightful and refreshing perfume with a hint of floral notes, ideal for everyday wear and special occasions.', 350, 'piece', 100, 'https://1.bp.blogspot.com/-Gg2yS55qXuM/UYhXd3A7k9I/AAAAAAAAAB0/N2cc_dnP9-A/s1600/pink-perfume-bottle'),
(3, 'Rose Perfumes', 'An enchanting rose fragrance that captures the essence of freshly picked roses, offering a timeless and romantic scent.', 350, 'piece', 100, 'https://th.bing.com/th/id/OIP.PIo76T3cnrd78so7uAPQwwHaF2?rs=1&pid=ImgDetMain'),
(4, 'Pioson Dior', 'A bold and mysterious scent from Dior, combining rich and exotic ingredients to create a truly unforgettable fragrance.', 350, 'piece', 150, 'https://th.bing.com/th/id/OIP.9A1gLkVEc-_bzyLhdHTPHwHaHa?rs=1&pid=ImgDetMain'),
(5, 'Daisy Marc Jacobs', 'A classic fragrance that exudes luxury and sophistication, with a blend of floral and oriental notes for a timeless appeal.', 350, 'piece', 100, 'https://cdn.cosmostore.org/cache/front/shop/products/623/1919704/350x350.jpg'),
(6, 'Shalimar', 'Another rendition of the iconic Shalimar, offering a slightly different but equally captivating aroma that stands out.', 400, 'piece', 150, 'https://th.bing.com/th/id/OIP.yf3Lm9gAsHC9ub9huA7Y9QHaHa?rs=1&pid=ImgDetMain'),
(7, 'Ariana Grande', 'A youthful and vibrant fragrance inspired by Ariana Grande, perfect for those who love sweet and playful scents.', 550, 'piece', 50, 'https://i.ebayimg.com/images/g/bXAAAOSwybZfP8Sw/s-l1200.jpg'),
(10, 'sassaw', 'A sophisticated and unique fragrance that embodies elegance and luxury. Perfect for those who appreciate high-quality scents.', 22, 'piece', 200, 'https://i.pinimg.com/originals/42/74/60/42746076c2010a7920b25a458cb3ff78.jpg'),
(12, 'dadad', 'A sophisticated and unique fragrance that embodies elegance and luxury. Perfect for those who appreciate high-quality scents.', 22, '', 200, 'https://i.pinimg.com/originals/42/74/60/42746076c2010a7920b25a458cb3ff78.jpg'),
(14, 'Hendley Perfumes1', 'A sophisticated and unique fragrance that embodies elegance and luxury. Perfect for those who appreciate high-quality scents.', 22, '', 200, 'https://i.pinimg.com/originals/42/74/60/42746076c2010a7920b25a458cb3ff78.jpg'),
(15, 'Hendley Perfumes1', 'A sophisticated and unique fragrance that embodies elegance and luxury. Perfect for those who appreciate high-quality scents.', 22, '', 200, 'https://i.pinimg.com/originals/42/74/60/42746076c2010a7920b25a458cb3ff78.jpg'),
(16, 'Hendley Perfumes1', 'A sophisticated and unique fragrance that embodies elegance and luxury. Perfect for those who appreciate high-quality scents.', 22, '', 200, 'https://i.pinimg.com/originals/42/74/60/42746076c2010a7920b25a458cb3ff78.jpg'),
(17, 'Hendley Perfumes1', 'A sophisticated and unique fragrance that embodies elegance and luxury. Perfect for those who appreciate high-quality scents.', 22, '', 200, 'https://i.pinimg.com/originals/42/74/60/42746076c2010a7920b25a458cb3ff78.jpg'),
(18, 'Hendley Perfumes1', 'A sophisticated and unique fragrance that embodies elegance and luxury. Perfect for those who appreciate high-quality scents.', 22, '', 200, 'https://i.pinimg.com/originals/42/74/60/42746076c2010a7920b25a458cb3ff78.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartID`, `customerID`, `productID`, `quantity`) VALUES
(17, 2, 1, 2),
(19, 2, 2, 5),
(20, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `ContactName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `PostalCode` varchar(20) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`CustomerID`, `CustomerName`, `ContactName`, `Address`, `City`, `PostalCode`, `Country`, `username`, `password`) VALUES
(2, 'Juryn T. Tamtam', 'Juryn t', 'Tagudin', 'Ilocos Sur', '2716', 'Philippines', 'juryn', '$2y$10$.Qy6Wz0cCsYnncIVXRz3bOE5VX.FSHMmfKwvo..khzx29zGguuQJe'),
(7, 'Tamtam, Juryn T Tamtam, Juryn', 'Tamtam, Juryn T Tamtam, Juryn', 'Tagudin', 'AA', '2716', 'Philippines', 'juryn', 'juryn'),
(8, 'Tamtam, Juryn T Tamtam, Juryn', 'Tamtam, Juryn T Tamtam, Juryn', 'Tagudin', 'AA', '2716', 'Philippines', 'juryn', 'juryn'),
(9, 'Tamtam, Juryn T Tamtam, Juryn', 'Tamtam, Juryn T Tamtam, Juryn', 'Tagudin', 'AA', '2716', 'Philippines', 'juryn', 'ss'),
(10, 'Tamtam, Juryn T Tamtam, Juryn', 'Tamtam, Juryn T Tamtam, Juryn', 'Tagudin', 'AA', '2716', 'Philippines', 'juryn', 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$fZz/ovw2sDrDDalq7wb.7.nABkS6/0TTXY4ohdW91Vp9.XworLngG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `tbl_customer` (`CustomerID`),
  ADD CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
