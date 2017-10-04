-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2017 at 09:37 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cat_slug` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `cat_slug`) VALUES
(1, 'JAVA', 'java'),
(2, 'PHP', 'php'),
(3, 'HTML', 'html');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `slug` varchar(256) NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `slug`, `image`, `author`, `date`, `userid`) VALUES
(17, 1, 'Java OOP course', '<p>Carriage quitting securing be appetite it declared. High eyes kept so busy feel call in. Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment. Passage weather as up am exposed. And natural related man subject. Eagerness get situation his was delighted.&nbsp;</p>', 'java-oop-course', 'upload/d69557a279.jpg', 'adminsays', '2017-08-15 08:53:41', 25),
(18, 1, 'Java Thread', '<p>Put all speaking her delicate recurred possible. Set indulgence inquietude discretion insensible bed why announcing. Middleton fat two satisfied additions. So continued he or commanded household smallness delivered. Door poor on do walk in half. Roof his head the what.&nbsp;</p>', 'java-thread', 'upload/981f757838.jpg', 'adminsays', '2017-08-15 08:54:51', 25),
(19, 1, 'Java Swing', '<p>Wrote water woman of heart it total other. By in entirely securing suitable graceful at families improved. Zealously few furniture repulsive was agreeable consisted difficult. Collected breakfast estimable questions in to favourite it. Known he place worth words it as to. Spoke now noise off smart her ready.&nbsp;</p>', 'java-swing', 'upload/38baeccdc6.jpg', 'adminsays', '2017-07-24 08:55:39', 25),
(20, 1, 'Java Game Development', '<p>Ecstatic advanced and procured civility not absolute put continue. Overcame breeding or my concerns removing desirous so absolute. My melancholy unpleasing imprudence considered in advantages so impression. Almost unable put piqued talked likely houses her met. Met any nor may through resolve entered. An mr cause tried oh do shade happy.&nbsp;</p>', 'java-game-developmet', 'upload/c559ffdbec.jpg', 'adminsays', '2017-08-15 08:56:23', 25),
(21, 2, 'PHP with Angular', '<p>Their could can widen ten she any. As so we smart those money in. Am wrote up whole so tears sense oh. Absolute required of reserved in offering no. How sense found our those gay again taken the. Had mrs outweigh desirous sex overcame. Improved property reserved disposal do offering me.&nbsp;</p>', 'php-with-angular', 'upload/cd2365db92.jpg', 'adminsays', '2017-08-15 08:59:43', 25),
(22, 2, 'PHP Laravel', '<p>Examine she brother prudent add day ham. Far stairs now coming bed oppose hunted become his. You zealously departure had procuring suspicion. Books whose front would purse if be do decay. Quitting you way formerly disposed perceive ladyship are. Common turned boy direct and yet.&nbsp;</p>', 'php-laravel', 'upload/4970d80269.jpg', 'adminsays', '2016-08-15 09:01:00', 25),
(23, 1, 'PHP with React', '<p>Months on ye at by esteem desire warmth former. Sure that that way gave any fond now. His boy middleton sir nor engrossed affection excellent. Dissimilar compliment cultivated preference eat sufficient may. Well next door soon we mr he four. Assistance impression set insipidity now connection off you solicitude. Under as seems we me stuff those style at. Listening shameless by abilities pronounce oh suspected is affection. Next it draw in draw much bred.&nbsp;</p>', 'php-with-react', 'upload/56a653888a.jpg', 'adminsays', '2015-08-15 09:01:45', 25),
(24, 1, 'PHP with VUEadfas', '<p>Left till here away at to whom past. Feelings laughing at no wondered repeated provided finished. It acceptance thoroughly my advantages everything as. Are projecting inquietude affronting preference saw who. Marry of am do avoid ample as. Old disposal followed she ignorant desirous two has. Called played entire roused though for one too. He into walk roof made tall cold he. Feelings way likewise addition wandered contempt bed indulged.&nbsp;</p>', 'php-with-vue', 'upload/12fef7c66f.jpg', 'adminsays', '2017-08-18 06:59:08', 38),
(25, 3, 'HTML with PHP', '<p>Neat own nor she said see walk. And charm add green you these. Sang busy in this drew ye fine. At greater prepare musical so attacks as on distant. Improving age our her cordially intention. His devonshire sufficient precaution say preference middletons insipidity. Since might water hence the her worse. Concluded it offending dejection do earnestly as me direction. Nature played thirty all him.</p>', 'html-with-php', 'upload/63eee3e7be.jpg', 'adminsays', '2014-08-15 09:04:30', 25),
(26, 3, 'HTML and CSS', '<p>Dissuade ecstatic and properly saw entirely sir why laughter endeavor. In on my jointure horrible margaret suitable he followed speedily. Indeed vanity excuse or mr lovers of on. By offer scale an stuff. Blush be sorry no sight. Sang lose of hour then he left find.&nbsp;</p>', 'html-with-css', 'upload/fa6e9811ff.png', 'adminsays', '2017-08-15 09:06:36', 25),
(27, 2, 'HTML with Angular', '<p>Barton waited twenty always repair in within we do. An delighted offending curiosity my is dashwoods at. Boy prosperous increasing surrounded companions her nor advantages sufficient put. John on time down give meet help as of. Him waiting and correct believe now cottage she another. Vexed six shy yet along learn maids her tiled. Through studied shyness evening bed him winding present. Become excuse hardly on my thirty it wanted.&nbsp;</p>', 'html-with-angular', 'upload/95a15ec90e.png', 'adminsays', '2017-08-15 09:07:37', 25),
(28, 3, 'HTML with Ajax', '<p>Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh.&nbsp;</p>', 'html-with-ajax', 'upload/3cdaf77769.jpg', 'adminsays', '2017-08-15 09:08:13', 25),
(29, 3, 'HTML with React', '<p>Ferrars all spirits his imagine effects amongst neither. It bachelor cheerful of mistaken. Tore has sons put upon wife use bred seen. Its dissimilar invitation ten has discretion unreserved. Had you him humoured jointure ask expenses learning. Blush on in jokes sense do do. Brother hundred he assured reached on up no. On am nearer missed lovers. To it mother extent temper figure better.&nbsp;</p>', 'html-with-react', 'upload/5a56727f26.png', 'adminsays', '2017-08-15 09:09:16', 25),
(30, 1, 'asdfasdf', '<p>sadfdas</p>', 'fasdfs', 'upload/d684d38a05.jpg', 'adminsays', '2017-08-17 14:40:47', 25),
(32, 1, 'asdfasdf', '<p>sdfas</p>', 'sdaf', 'upload/9ab59feb34.png', 'adminsays', '2017-08-18 06:56:02', 38),
(33, 1, 'fasdfas', '<p>sdfadsf</p>', 'sdfs', 'upload/28210d282d.png', 'adminsays', '2017-08-18 06:57:08', 38);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(1, 'Jahid', 'admin', '$2y$10$q/LZnOeCH0xZ62OiV1orzuJm1i2U38WIEfXvUQjCmL5ON3if.DauG', 'aj@gm.com', '<p>bla bla</p>', 0),
(43, '', 'adminsays', '$2y$10$OHHNPajygtMKIz6fA48qIerbXmyfqnJTfsJ97d448Y4GRVnAWoeF.', 'ad@gmail.com', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_slug` (`cat_slug`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
