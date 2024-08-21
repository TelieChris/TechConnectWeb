-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql12.freesqldatabase.com
-- Generation Time: Aug 21, 2024 at 11:19 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql12716221`
--
CREATE DATABASE IF NOT EXISTS `sql12716221` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sql12716221`;

-- --------------------------------------------------------

--
-- Table structure for table `TeaProducts`
--

CREATE TABLE `TeaProducts` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `teaType` varchar(255) DEFAULT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `tastingNote` varchar(255) DEFAULT NULL,
  `producer` varchar(255) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `rawMatAddress` varchar(255) DEFAULT NULL,
  `manufacturerAddress` varchar(255) DEFAULT NULL,
  `transporterAddress` varchar(255) DEFAULT NULL,
  `wholesalerAddress` varchar(255) DEFAULT NULL,
  `distributorAddress` varchar(255) DEFAULT NULL,
  `teaProductAddress` varchar(255) DEFAULT NULL,
  `transactionHash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TeaProducts`
--

INSERT INTO `TeaProducts` (`id`, `description`, `quantity`, `teaType`, `ingredients`, `tastingNote`, `producer`, `origin`, `rawMatAddress`, `manufacturerAddress`, `transporterAddress`, `wholesalerAddress`, `distributorAddress`, `teaProductAddress`, `transactionHash`) VALUES
(1, 'Rwanda Rubaya Organic: A strong, full-bodied tea with notes of malt, tobacco, bell pepper, cocoa, and spices', 421, 'Black Tea', 'Fermented leaves of the Camellia sinensis plant', 'Malty bolder and stronger', 'COTRAGAGI', 'Rwanda', '0x15d776d3916FCc79FBaea775fF54bF45B9db6440', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x6263A18E3a1D1A0c5D97F3207AA39461f0403Eec', '0x49b6Ee8dd055e8AB2B77C58e7cEfb54745e78A80', '0x1898d1a521353F34629e95476a24e75D6B980614', '0xaa308f858ae9c7e4dee8ed989dd59e8a00bdc01826f69b3fad49164df8533939'),
(5, 'Rwanda Rubaya Organic: A strong, full-bodied tea with notes of malt, tobacco, bell pepper, cocoa, and spices', 450, 'Black Tea', 'Fermented leaves of the Camellia sinensis plant', 'Malty bolder and stronger', 'COTRAGAGI', 'Rwanda', '0xE8a6C6ba09520c3Ed416480cF001ac7825303DB9', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x6263A18E3a1D1A0c5D97F3207AA39461f0403Eec', '0x6263A18E3a1D1A0c5D97F3207AA39461f0403Eec', '0x47eDbC4a73F2b3E2DC2f5A8D0F7313B13BB7042a', '0x22377f6a67a6c60691c14a9fc194f9479369020987c52e1d1871b3dd1b5ace81'),
(6, 'Rwanda Rubaya Organic: A strong, full-bodied tea with notes of malt, tobacco, bell pepper, cocoa, and spices', 100, 'Black Tea', 'Fermented leaves of the Camellia sinensis plant', 'Malty bolder and stronger', 'COTRAGAGI', 'Rwanda', '0xE8a6C6ba09520c3Ed416480cF001ac7825303DB9', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x6263A18E3a1D1A0c5D97F3207AA39461f0403Eec', '0x6263A18E3a1D1A0c5D97F3207AA39461f0403Eec', '0xd50A56f41D72B8EB650cB3E04E39949eeE906583', '0xd876e77e36e6b126d73da497b016fa495e9b0ce0b607f9f5ac272cef155c04b6'),
(7, 'Rwanda Rubaya Organic: A strong, full-bodied tea with notes of malt, tobacco, bell pepper, cocoa, and spices', 80, 'Black Tea', 'Fermented leaves of the Camellia sinensis plant', 'Malty bolder and stronger', 'COTRAGAGI', 'Rwanda', '0x5c074df6aF8e73972d8907c35E52553E6E4d5255', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x6263A18E3a1D1A0c5D97F3207AA39461f0403Eec', '0x49b6Ee8dd055e8AB2B77C58e7cEfb54745e78A80', '0x4989D836bdFc6e50db046563113e22ACd7849C47', '0x43bae11cabb09cf6c23d4fe832826704689a8c05e63e80c222e255878d5e54be'),
(8, 'Rwanda Rubaya Organic: A strong, full-bodied tea with notes of malt, tobacco, bell pepper, cocoa, and spices', 250, 'Black Tea', 'Fermented leaves of the Camellia sinensis plant', 'Malty bolder and stronger', 'COTRAGAGI', 'Rwanda', '0x15d776d3916FCc79FBaea775fF54bF45B9db6440', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x6263A18E3a1D1A0c5D97F3207AA39461f0403Eec', '0x49b6Ee8dd055e8AB2B77C58e7cEfb54745e78A80', '0x291BA3676145f64034941C1C1E99111840D1C7a5', '0x833ca5f0ea0220bce51ee5c7bc2ad82e477f7fc884d8f38cc71caa710d1cc35f'),
(9, 'Rwanda Rubaya Organic: A strong, full-bodied tea with notes of malt, tobacco, bell pepper, cocoa, and spices', 2000, 'Black Tea', 'Fermented leaves of the Camellia sinensis plant', 'Malty bolder and stronger', 'COTRAGAGI', 'Rwanda', '0x70d3d02a65504BfDe7Aee84F6E3C179ECc2745E0', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x6263A18E3a1D1A0c5D97F3207AA39461f0403Eec', '0x49b6Ee8dd055e8AB2B77C58e7cEfb54745e78A80', '0x47ce3b478955610412e8DC738D5C76628cF3D64b', '0xeb407b63e0b77d3f8766eec33c51ca831e8d99550c3a457b9672b94d62ccb267'),
(10, 'Rwanda Rubaya Organic: A strong, full-bodied tea with notes of malt, tobacco, bell pepper, cocoa, and spices', 450, 'Green Tea', 'Fermented leaves of the Camellia sinensis plant', 'Malty bolder and stronger', 'COTRAGAGI', 'Rwanda', '0x49C6e16825E09367E3b4f1253DF0e48669AB9EE8', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x6263A18E3a1D1A0c5D97F3207AA39461f0403Eec', '0x49b6Ee8dd055e8AB2B77C58e7cEfb54745e78A80', '0x81438Fb04377A845eA57351BA2304e8028dC6Fcc', '0x99fef601f7fdaf34aedcf165ebbb0add58a961a5b61cbfc0629c4f8e0472a1a3'),
(11, 'Rwanda Rubaya Organic: A strong, full-bodied tea with notes of malt, tobacco, bell pepper, cocoa, and spices', 500, 'Black Tea', 'Fermented leaves of the Camellia sinensis plant', 'Malty bolder and stronger', 'Rubaya', 'Rwanda', '0xBb222a41F13206A1A328CF7e046999f2041bA046', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x6263A18E3a1D1A0c5D97F3207AA39461f0403Eec', '0x49b6Ee8dd055e8AB2B77C58e7cEfb54745e78A80', '0x354eF7fd795374abB268110BA0B2c8d43049ee8B', '0xd969bba76ed7a27db76e2c109123dc1efa9eea67e1ca95e596dae87220a58ce1');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `due_date` date DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `course_id`, `title`, `description`, `due_date`, `file_url`) VALUES
(1, 1, 'LO 1 . SETUP', 'NMDMDSFKJF', '2024-06-04', NULL),
(2, 1, 'CAT 1', 'RTTRYTRYTRYTU', '2024-06-04', NULL),
(3, 1, 'CAT 1', 'RTTRYTRYTRYTU', '2024-06-04', NULL),
(4, 1, 'CAT 1', 'RTTRYTRYTRYTU', '2024-06-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_timetable`
--

CREATE TABLE `course_timetable` (
  `c_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_timetable`
--

INSERT INTO `course_timetable` (`c_id`, `course_name`, `day`, `time`, `venue`) VALUES
(2, 'DevOps', 'Monday', '8:30-9:20 AM', 'IT Lab 5'),
(3, 'Blockchain', 'Monday', '9:20-10:10 AM', 'IT Lab 5'),
(4, 'DevOps', 'Tuesday', '8:30-9:20 AM', 'LAB 7');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_description` text,
  `course_code` varchar(20) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_description`, `course_code`, `faculty_id`) VALUES
(1, 'DevOps', 'development Operations', '1', 1),
(3, 'Blockchain', 'Blockchain Technology', 'ICTB001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `head_of_faculty` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `name`, `head_of_faculty`, `description`) VALUES
(3, 'Manufacturing Technology', 'Mugisha Eric', 'Production and Manufacturing Technology Â· To prepare students to understand basic electrical and electronics principles; Â· To equip the student with the basic.'),
(5, 'Information Technology', 'Epa', 'Information Technology means the use of hardware, software, services, and supporting infrastructure to manage and deliver information using voice, data, and video.');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `forum_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text,
  `author_id` int(11) DEFAULT NULL,
  `published_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `content`, `author_id`, `published_at`) VALUES
(1, 'Quiz1', 'rtiuiretre', 27, '2024-06-05 08:46:00'),
(2, 'ICT', 'Computer skills', 18, '2024-07-10 18:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `forum_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `forum_id`, `user_id`, `content`, `created_at`) VALUES
(26, 1, 2, 'gogo', '2024-06-09 11:02:00'),
(27, 1, 2, 'rwarwa', '2024-06-09 11:22:00'),
(28, 1, 16, 'Hello class! What do you think about going out today!', '2024-07-05 09:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `moisture_content` varchar(255) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `harvest_date` varchar(255) DEFAULT NULL,
  `product_supplier` varchar(255) DEFAULT NULL,
  `product_transporter` varchar(255) DEFAULT NULL,
  `product_manufacturer` varchar(255) DEFAULT NULL,
  `product_transaction_contract_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`id`, `description`, `quantity`, `address`, `moisture_content`, `origin`, `harvest_date`, `product_supplier`, `product_transporter`, `product_manufacturer`, `product_transaction_contract_address`) VALUES
(5, 'Rwandan Tea Batch-5\0\0\0\0\0\0\0\0\0\0\0\0\0', 320, '0x8Ad338EE8485bbEba9C182331e3739140328e986', '20.1\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Rubaya\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'July 26, 2024', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0xD92527EeAf3639811a50fB4885F3978976166375'),
(6, 'Rwandan tea Batch-1\0\0\0\0\0\0\0\0\0\0\0\0\0', 250, '0xE8a6C6ba09520c3Ed416480cF001ac7825303DB9', '20.1\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Rubaya\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'August 2, 2024', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0xF87DE89bC5F9c96e096fE575229A803a6d8F747E'),
(7, 'Rwandan tea Batch-1\0\0\0\0\0\0\0\0\0\0\0\0\0', 250, '0x5c074df6aF8e73972d8907c35E52553E6E4d5255', '13.1\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Rubaya\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'August 2, 2024', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0x39A276B50cf555b413795A50bF40FD0C91e8385F'),
(8, 'Rwandan tea Batch-1\0\0\0\0\0\0\0\0\0\0\0\0\0', 250, '0xfA50e2C70E8D7400C6Cd82e6A81Afd379B1Eb29E', '15.3\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Rubaya\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'August 2, 2024', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0x2C9C1E48A81757F0bE5Bb4e3ecdC5d7F91e952c9'),
(9, 'Rwandan tea Batch-1\0\0\0\0\0\0\0\0\0\0\0\0\0', 250, '0x70d3d02a65504BfDe7Aee84F6E3C179ECc2745E0', '15.3\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Rubaya\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'September 8, 2024', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0x07d91524A3E87118A30093e9Ce55fC59eE903b4c'),
(10, 'Rwandan tea Batch-1\0\0\0\0\0\0\0\0\0\0\0\0\0', 250, '0x37258601A4582Bc380C98A0299DE49c1f890d0b2', '15.3\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Rubaya\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'September 8, 2024', '0xe4537760C761Dd18eb7a3319be213421D0e15081', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0xddFa42F1A83975F206911AD80118774De70a8E69'),
(11, 'Rwandan tea Batch-1\0\0\0\0\0\0\0\0\0\0\0\0\0', 250, '0x49C6e16825E09367E3b4f1253DF0e48669AB9EE8', '15.3\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Rubaya\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'August 12, 2024', '0xe4537760C761Dd18eb7a3319be213421D0e15081', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0x867f598Fb40DE898003BE8cc2ca087e9C1B125dD'),
(12, 'Rwandan tea Batch-1\0\0\0\0\0\0\0\0\0\0\0\0\0', 150, '0xBb222a41F13206A1A328CF7e046999f2041bA046', '15.4\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Rabaya\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Invalid Date', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x5D7E468A629400df93b0473E013C0B63A0970a4F', '0xd31585183aBb930a1CCBbDe9FCB13b60ad569229');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `submission_id` int(11) NOT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `grade` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`submission_id`, `assignment_id`, `student_id`, `submission_date`, `file_url`, `grade`) VALUES
(1, 1, 1, '2024-06-04', NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `teaProductAddress` varchar(255) DEFAULT NULL,
  `fromAddress` varchar(255) DEFAULT NULL,
  `toAddress` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `previousHash` varchar(255) DEFAULT NULL,
  `geoLat` double DEFAULT NULL,
  `geoLong` double DEFAULT NULL,
  `timestamp` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `teaProductAddress`, `fromAddress`, `toAddress`, `hash`, `previousHash`, `geoLat`, `geoLong`, `timestamp`) VALUES
(1, '0x15d776d3916FCc79FBaea775fF54bF45B9db6440', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0x15d776d3916FCc79FBaea775fF54bF45B9db6440', '0xe075d6cf96719a6e31461dfa1de20710f8696b341578f8349720790b6eea03be', '0xe075d6cf96719a6e31461dfa1de20710f8696b341578f8349720790b6eea03be', 10, 10, 1722882417),
(9, '0xE8a6C6ba09520c3Ed416480cF001ac7825303DB9', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0xE8a6C6ba09520c3Ed416480cF001ac7825303DB9', '0xc8a27ec29c32c55d347bcf9662e3dd2ef5a45447ed8276dd023f2f32888185b4', '0xc8a27ec29c32c55d347bcf9662e3dd2ef5a45447ed8276dd023f2f32888185b4', 10, 10, 1723032434),
(10, '0xE8a6C6ba09520c3Ed416480cF001ac7825303DB9', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x28c6094151a89a0e88de562a2820b5454fba4909839c9c0ed1aa1c934ecc2a1d', '0xc8a27ec29c32c55d347bcf9662e3dd2ef5a45447ed8276dd023f2f32888185b4', 10, 10, 1723032696),
(11, '0x5c074df6aF8e73972d8907c35E52553E6E4d5255', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0x5c074df6aF8e73972d8907c35E52553E6E4d5255', '0x6e1a221f58be375495ab75e3cb9e8e8974dc0935361a88bf56b927975ce37080', '0x6e1a221f58be375495ab75e3cb9e8e8974dc0935361a88bf56b927975ce37080', 10, 10, 1723286719),
(12, '0x5c074df6aF8e73972d8907c35E52553E6E4d5255', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x78b12835e8be415e5e886592f959ae280955ccd8662009d909822af548cd02a8', '0x6e1a221f58be375495ab75e3cb9e8e8974dc0935361a88bf56b927975ce37080', 10, 10, 1723287878),
(13, '0xfA50e2C70E8D7400C6Cd82e6A81Afd379B1Eb29E', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0xfA50e2C70E8D7400C6Cd82e6A81Afd379B1Eb29E', '0x3802ca27eae7f2083e815c4ef17b9402e126905246a071ab543d2205115b6982', '0x3802ca27eae7f2083e815c4ef17b9402e126905246a071ab543d2205115b6982', 10, 10, 1723304713),
(14, '0xfA50e2C70E8D7400C6Cd82e6A81Afd379B1Eb29E', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x41bf7589f59c8235b0a0b6d236a512adf8cf4d5a90f087d60c1ca7120314c5ad', '0x3802ca27eae7f2083e815c4ef17b9402e126905246a071ab543d2205115b6982', 10, 10, 1723305911),
(15, '0x70d3d02a65504BfDe7Aee84F6E3C179ECc2745E0', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0x70d3d02a65504BfDe7Aee84F6E3C179ECc2745E0', '0x66debc34a7a5c80c4e06a1b5382e179695132de5b5d15b16c9bb6a90452684a5', '0x66debc34a7a5c80c4e06a1b5382e179695132de5b5d15b16c9bb6a90452684a5', 10, 10, 1723449480),
(16, '0x70d3d02a65504BfDe7Aee84F6E3C179ECc2745E0', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x01558ef704f6c5025734c50c277fb6096287859e0ca1a61b3c865a0654ac8c09', '0x66debc34a7a5c80c4e06a1b5382e179695132de5b5d15b16c9bb6a90452684a5', 10, 10, 1723457208),
(17, '0x37258601A4582Bc380C98A0299DE49c1f890d0b2', '0xe4537760C761Dd18eb7a3319be213421D0e15081', '0x37258601A4582Bc380C98A0299DE49c1f890d0b2', '0x12de61cd8646cc0e8ac6d558f2669d7b515ded3902427f78740ccfd90c4f0240', '0x12de61cd8646cc0e8ac6d558f2669d7b515ded3902427f78740ccfd90c4f0240', 10, 10, 1723465035),
(18, '0x37258601A4582Bc380C98A0299DE49c1f890d0b2', '0xe4537760C761Dd18eb7a3319be213421D0e15081', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0xc73f2b5463ef7810a8a7fbaae99b6d904eaa66b3a79bee5ea754ffa0bcedb38c', '0x12de61cd8646cc0e8ac6d558f2669d7b515ded3902427f78740ccfd90c4f0240', 10, 10, 1723465353),
(19, '0x49C6e16825E09367E3b4f1253DF0e48669AB9EE8', '0xe4537760C761Dd18eb7a3319be213421D0e15081', '0x49C6e16825E09367E3b4f1253DF0e48669AB9EE8', '0xc26bc0a119f88905b5638ee0bf0cb51b90d1b601174367208d5610fdc53f3af1', '0xc26bc0a119f88905b5638ee0bf0cb51b90d1b601174367208d5610fdc53f3af1', 10, 10, 1723482014),
(20, '0x49C6e16825E09367E3b4f1253DF0e48669AB9EE8', '0xe4537760C761Dd18eb7a3319be213421D0e15081', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0xd61bf2a709329e7409dfb2bdba0e54c77b138656d2571f6246f32f3f8f7a4c13', '0xc26bc0a119f88905b5638ee0bf0cb51b90d1b601174367208d5610fdc53f3af1', 10, 10, 1723482488),
(21, '0xBb222a41F13206A1A328CF7e046999f2041bA046', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0xBb222a41F13206A1A328CF7e046999f2041bA046', '0x90eeebcbfe797fe02a9efcc5268ff49c6bf9380a8d94e2fe688184c1d2ba534c', '0x90eeebcbfe797fe02a9efcc5268ff49c6bf9380a8d94e2fe688184c1d2ba534c', 10, 10, 1723544242),
(22, '0xBb222a41F13206A1A328CF7e046999f2041bA046', '0xeC5298A068B830a73792C1F5a3948e59cb49dcB4', '0x63fd5d0007A5978BC529ca0D8AFD2237851c1E81', '0x9ace3f1cba2bd137bb6e6747f31c5a540972c2cfcf0ba5123f8dd4cf8d5563fb', '0x90eeebcbfe797fe02a9efcc5268ff49c6bf9380a8d94e2fe688184c1d2ba534c', 10, 10, 1723544620);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `role` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `email`, `first_name`, `last_name`, `role`, `profile_picture`, `date_joined`) VALUES
(15, 'bughi123', '$2y$10$XVmHwrEuzS94tj29r3IGvuqemYv6HQn.vWWKQiZVNLAjUTHUOEaEK', 'bugiruwendaj@gmail.com', 'Jean Bosco', 'BUGHI', 'student', 'uploads/11.png', '2024-06-09'),
(16, 'Elie', '$2y$10$SPSO1ojh81erjr5RmQMXsOJN6CJNroaw/ekOxcx6b64i03IJL7zuu', 'twizeyimanaelia@gmail.com', 'TWIZEYIMANA', 'Elie', 'student', 'uploads/rp_logo.png', '2024-07-05'),
(17, 'grace', '$2y$10$YrPKxgyRyNwG6pUfMU0xu..Y41wqJ7uXlrWu3MbITTK2TfLHYyTxu', 'uwumudendezo2000@gmail.com', 'grace', 'UWUMUDENDEZO', 'student', 'uploads/fffff.PNG', '2024-07-05'),
(18, 'IRAHARI', '$2y$10$nobvgcIHchLCss/TyHg9cO5JPK5wVqlcOlJ/dG.aRzvVaxMyz2pBG', 'sosoweb7777@gmail.com', 'IRAHARI', 'Soso', 'student', 'uploads/tables.JPG', '2024-07-05'),
(19, 'Jean Bosco', '$2y$10$AZbqvr0135PAVqX1JlEJg.maj405.GTWm7FX8YFZ9SiN1MGh2Y7UW', 'bugiruwendaj@gmail.com', 'Jean Bosco', 'BUGHI', 'student', 'uploads/php-features.png', '2024-07-05'),
(22, 'Epa', '$2y$10$ef281jj7fDCodL55HLqgqePk60IMLgPISS07pmDqPSfiA0h4Lm5pC', 'twizeyimanaelia@gmail.com', 'ISHIMWE', 'Epa', 'lecturer', 'uploads/pngwing.com (1).png', '2024-07-10'),
(24, 'admin', '$2y$10$HS3mEtHwuiQFQfQFJBqi2.Mt.LvV/TIn9zg8v3h/a0aCYHRrG.awa', 'admin@gmai.com', 'TWIZEYIMANA', 'Elie', 'admin', 'uploads/logos.png', '2024-07-10'),
(25, 'Peragie', '$2y$10$29nTfhOjzSlle7eJ24bTNuAU9tdcRAFywTlTSQJrrTRx31IvhsYMi', 'twizeyimana1elia@gmail.com', 'MUKANDAYISENGA', 'Peragie', 'student', '{\"token\":\"f140e70a498b5562bb427e893d8d0fd6\",\"expires\":1720609601}', '2024-07-10'),
(26, 'CYPRIEN', '$2y$10$NbUfwGx/an5hh2VzNyld3OlhhvOlP02e8y6gWTiGFmfvdoGBizoq.', 'cyprien@gmail.com', 'Parish', 'YC', 'student', 'uploads/WhatsApp Image 2024-07-09 at 09.27.13 (1).jpeg', '2024-07-10'),
(27, 'soso', '$2y$10$WJjalw8J3ti3eiBE/jVK..w5sMLe4KbJg0EZC/0P9Fn9jbNKIxKMi', 'sosoweb777@gmail.com', 'IRAHARI', 'Soso', 'student', 'uploads/Time table.jpg', '2024-07-10'),
(28, 'Chantal', '$2y$10$Y6lOlkwOkFoq870Kg38hNOR6sRev1mgonj6ulXqkx.01RrdKzzAmW', 'chantalnayituriki5@gmail.com', 'Nayituriki', 'Chantal', 'student', 'uploads/pngwing.com.png', '2024-07-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `TeaProducts`
--
ALTER TABLE `TeaProducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `course_timetable`
--
ALTER TABLE `course_timetable`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`forum_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`submission_id`),
  ADD KEY `assignment_id` (`assignment_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `TeaProducts`
--
ALTER TABLE `TeaProducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course_timetable`
--
ALTER TABLE `course_timetable`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
