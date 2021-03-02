-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 05:33 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unicbook-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BOOK_ID` varchar(50) NOT NULL,
  `ID` int(11) NOT NULL,
  `TITLE` text NOT NULL,
  `AUTHOR` varchar(100) NOT NULL,
  `YEAR` year(4) NOT NULL,
  `PUBLISHER` varchar(100) NOT NULL,
  `URL_IMAGE_S` varchar(255) NOT NULL,
  `URL_IMAGE_M` varchar(255) NOT NULL,
  `URL_IMAGE_L` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BOOK_ID`, `ID`, `TITLE`, `AUTHOR`, `YEAR`, `PUBLISHER`, `URL_IMAGE_S`, `URL_IMAGE_M`, `URL_IMAGE_L`) VALUES
('000649840X', 1, 'Angelas Ashes', 'Frank Mccourt', 2000, 'Harpercollins Uk', 'http://images.amazon.com/images/P/000649840X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/000649840X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/000649840X.01.LZZZZZZZ.jpg'),
('002542730X', 2, 'Politically Correct Bedtime Stories: Modern Tales for Our Life and Times', 'James Finn Garner', 1994, 'John Wiley &amp; Sons Inc', 'http://images.amazon.com/images/P/002542730X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/002542730X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/002542730X.01.LZZZZZZZ.jpg'),
('006016848X', 3, 'Men Are from Mars, Women Are from Venus: A Practical Guide for Improving Communication and Getting What You Want in Your Relationships', 'John Gray', 1992, 'HarperCollins Publishers', 'http://images.amazon.com/images/P/006016848X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/006016848X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/006016848X.01.LZZZZZZZ.jpg'),
('006019491X', 4, 'Daughter of Fortune : A Novel (Oprah\'s Book Club (Hardcover))', 'Isabel Allende', 1999, 'HarperCollins', 'http://images.amazon.com/images/P/006019491X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/006019491X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/006019491X.01.LZZZZZZZ.jpg'),
('006099486X', 5, 'The Professor and the Madman: A Tale of Murder, Insanity, and the Making of The Oxford English Dictionary', 'Simon Winchester', 1999, 'Perennial', 'http://images.amazon.com/images/P/006099486X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/006099486X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/006099486X.01.LZZZZZZZ.jpg'),
('006101351X', 6, 'The Perfect Storm : A True Story of Men Against the Sea', 'Sebastian Junger', 1998, 'HarperTorch', 'http://images.amazon.com/images/P/006101351X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/006101351X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/006101351X.01.LZZZZZZZ.jpg'),
('014023313X', 7, 'The Stone Diaries', 'Carol Shields', 1995, 'Penguin Books', 'http://images.amazon.com/images/P/014023313X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/014023313X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/014023313X.01.LZZZZZZZ.jpg'),
('014025448X', 8, 'At Home in Mitford (The Mitford Years)', 'Jan Karon', 1996, 'Viking Books', 'http://images.amazon.com/images/P/014025448X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/014025448X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/014025448X.01.LZZZZZZZ.jpg'),
('014028009X', 9, 'Bridget Jones\'s Diary', 'Helen Fielding', 1999, 'Penguin Books', 'http://images.amazon.com/images/P/014028009X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/014028009X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/014028009X.01.LZZZZZZZ.jpg'),
('014029628X', 10, 'Girl in Hyacinth Blue', 'Susan Vreeland', 2000, 'Penguin Books', 'http://images.amazon.com/images/P/014029628X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/014029628X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/014029628X.01.LZZZZZZZ.jpg'),
('014038572X', 11, 'The Outsiders (Now in Speak!)', 'S. E. Hinton', 1997, 'Puffin Books', 'http://images.amazon.com/images/P/014038572X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/014038572X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/014038572X.01.LZZZZZZZ.jpg'),
('014100018X', 12, 'Chocolat', 'Joanne Harris', 2000, 'Penguin Books', 'http://images.amazon.com/images/P/014100018X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/014100018X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/014100018X.01.LZZZZZZZ.jpg'),
('014131088X', 13, 'Speak', 'Laurie Halse Anderson', 2001, 'Speak', 'http://images.amazon.com/images/P/014131088X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/014131088X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/014131088X.01.LZZZZZZZ.jpg'),
('031242227X', 14, 'Running with Scissors: A Memoir', 'Augusten Burroughs', 2003, 'Picador USA', 'http://images.amazon.com/images/P/031242227X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/031242227X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/031242227X.01.LZZZZZZZ.jpg'),
('031298328X', 15, 'Full Tilt (Janet Evanovich\'s Full Series)', 'Janet Evanovich', 2003, 'St. Martin\'s Paperbacks', 'http://images.amazon.com/images/P/031298328X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/031298328X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/031298328X.01.LZZZZZZZ.jpg'),
('034536676X', 16, 'The World According to Garp', 'John Irving', 1994, 'Ballantine Books', 'http://images.amazon.com/images/P/034536676X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/034536676X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/034536676X.01.LZZZZZZZ.jpg'),
('034538475X', 17, 'The Tale of the Body Thief (Vampire Chronicles (Paperback))', 'Anne Rice', 1993, 'Ballantine Books', 'http://images.amazon.com/images/P/034538475X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/034538475X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/034538475X.01.LZZZZZZZ.jpg'),
('034540288X', 18, 'The Lost World', 'Michael Crichton', 1996, 'Ballantine Books', 'http://images.amazon.com/images/P/034540288X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/034540288X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/034540288X.01.LZZZZZZZ.jpg'),
('034541389X', 19, 'Flesh and Blood', 'Jonathan Kellerman', 2002, 'Ballantine Books', 'http://images.amazon.com/images/P/034541389X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/034541389X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/034541389X.01.LZZZZZZZ.jpg'),
('037541309X', 20, 'Balzac and the Little Chinese Seamstress', 'Dai Sijie', 2001, 'Alfred A. Knopf', 'http://images.amazon.com/images/P/037541309X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/037541309X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/037541309X.01.LZZZZZZZ.jpg'),
('037570504X', 21, 'Breath, Eyes, Memory', 'Edwidge Danticat', 1998, 'Vintage Books USA', 'http://images.amazon.com/images/P/037570504X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/037570504X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/037570504X.01.LZZZZZZZ.jpg'),
('038079487X', 22, 'What Looks Like Crazy On An Ordinary Day', 'Pearl Cleage', 1998, 'Perennial', 'http://images.amazon.com/images/P/038079487X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/038079487X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/038079487X.01.LZZZZZZZ.jpg'),
('038082101X', 23, 'Daughter of Fortune: A Novel', 'Isabel Allende', 2001, 'HarperTorch', 'http://images.amazon.com/images/P/038082101X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/038082101X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/038082101X.01.LZZZZZZZ.jpg'),
('038529929X', 24, 'Hannibal', 'Thomas Harris', 1999, 'Del Sol Press', 'http://images.amazon.com/images/P/038529929X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/038529929X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/038529929X.01.LZZZZZZZ.jpg'),
('038533334X', 25, 'Charming Billy', 'Alice McDermott', 1999, 'Delta', 'http://images.amazon.com/images/P/038533334X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/038533334X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/038533334X.01.LZZZZZZZ.jpg'),
('038542017X', 26, 'Like Water for Chocolate : A Novel in Monthly Installments with Recipes, Romances, and Home Remedies', 'LAURA ESQUIVEL', 1995, 'Anchor', 'http://images.amazon.com/images/P/038542017X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/038542017X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/038542017X.01.LZZZZZZZ.jpg'),
('038542471X', 27, 'The Client', 'John Grisham', 1993, 'Doubleday Books', 'http://images.amazon.com/images/P/038542471X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/038542471X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/038542471X.01.LZZZZZZZ.jpg'),
('038548951X', 28, 'Sister of My Heart', 'Chitra Banerjee Divakaruni', 2000, 'Anchor Pub', 'http://images.amazon.com/images/P/038548951X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/038548951X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/038548951X.01.LZZZZZZZ.jpg'),
('038549081X', 29, 'The Handmaid\'s Tale : A Novel', 'Margaret Atwood', 1998, 'Anchor', 'http://images.amazon.com/images/P/038549081X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/038549081X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/038549081X.01.LZZZZZZZ.jpg'),
('038550120X', 30, 'A Painted House', 'JOHN GRISHAM', 2001, 'Doubleday', 'http://images.amazon.com/images/P/038550120X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/038550120X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/038550120X.01.LZZZZZZZ.jpg'),
('038550926X', 31, 'The Devil Wears Prada : A Novel', 'LAUREN WEISBERGER', 2003, 'Doubleday', 'http://images.amazon.com/images/P/038550926X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/038550926X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/038550926X.01.LZZZZZZZ.jpg'),
('038572179X', 32, 'Atonement : A Novel', 'IAN MCEWAN', 2003, 'Anchor', 'http://images.amazon.com/images/P/038572179X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/038572179X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/038572179X.01.LZZZZZZZ.jpg'),
('039480001X', 33, 'The Cat in the Hat', 'Dr. Seuss', 1957, 'Random House Books for Young Readers', 'http://images.amazon.com/images/P/039480001X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/039480001X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/039480001X.01.LZZZZZZZ.jpg'),
('039592720X', 34, 'Interpreter of Maladies', 'Jhumpa Lahiri', 1999, 'Houghton Mifflin Co', 'http://images.amazon.com/images/P/039592720X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/039592720X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/039592720X.01.LZZZZZZZ.jpg'),
('042510107X', 35, 'Red Storm Rising', 'Tom Clancy', 1997, 'Berkley Publishing Group', 'http://images.amazon.com/images/P/042510107X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/042510107X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/042510107X.01.LZZZZZZZ.jpg'),
('042511774X', 36, 'Breathing Lessons', 'Anne Tyler', 1994, 'Berkley Publishing Group', 'http://images.amazon.com/images/P/042511774X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/042511774X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/042511774X.01.LZZZZZZZ.jpg'),
('042513525X', 37, 'Hideaway', 'Dean R. Koontz', 1992, 'Berkley Publishing Group', 'http://images.amazon.com/images/P/042513525X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/042513525X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/042513525X.01.LZZZZZZZ.jpg'),
('042516098X', 38, 'Hornet\'s Nest', 'Patricia Daniels Cornwell', 1998, 'Berkley Publishing Group', 'http://images.amazon.com/images/P/042516098X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/042516098X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/042516098X.01.LZZZZZZZ.jpg'),
('042518286X', 39, 'Shock', 'Robin Cook', 2002, 'Berkley Publishing Group', 'http://images.amazon.com/images/P/042518286X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/042518286X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/042518286X.01.LZZZZZZZ.jpg'),
('043935806X', 40, 'Harry Potter and the Order of the Phoenix (Book 5)', 'J. K. Rowling', 2003, 'Scholastic', 'http://images.amazon.com/images/P/043935806X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/043935806X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/043935806X.01.LZZZZZZZ.jpg'),
('043936213X', 41, 'Harry Potter and the Sorcerer\'s Stone (Book 1)', 'J. K. Rowling', 2001, 'Scholastic', 'http://images.amazon.com/images/P/043936213X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/043936213X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/043936213X.01.LZZZZZZZ.jpg'),
('044021145X', 42, 'The Firm', 'John Grisham', 1992, 'Bantam Dell Publishing Group', 'http://images.amazon.com/images/P/044021145X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/044021145X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/044021145X.01.LZZZZZZZ.jpg'),
('044022103X', 43, 'One True Thing', 'Anna Quindlen', 1995, 'Dell', 'http://images.amazon.com/images/P/044022103X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/044022103X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/044022103X.01.LZZZZZZZ.jpg'),
('044022165X', 44, 'The Rainmaker', 'JOHN GRISHAM', 1996, 'Dell', 'http://images.amazon.com/images/P/044022165X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/044022165X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/044022165X.01.LZZZZZZZ.jpg'),
('044023722X', 45, 'A Painted House', 'John Grisham', 2001, 'Dell Publishing Company', 'http://images.amazon.com/images/P/044023722X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/044023722X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/044023722X.01.LZZZZZZZ.jpg'),
('044651652X', 46, 'The Bridges of Madison County', 'Robert James Waller', 1992, 'Warner Books', 'http://images.amazon.com/images/P/044651652X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/044651652X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/044651652X.01.LZZZZZZZ.jpg'),
('059035342X', 47, 'Harry Potter and the Sorcerer\'s Stone (Harry Potter (Paperback))', 'J. K. Rowling', 1999, 'Arthur A. Levine Books', 'http://images.amazon.com/images/P/059035342X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/059035342X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/059035342X.01.LZZZZZZZ.jpg'),
('067088300X', 48, 'The Girls\' Guide to Hunting and Fishing', 'Melissa Bank', 1999, 'Viking Books', 'http://images.amazon.com/images/P/067088300X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/067088300X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/067088300X.01.LZZZZZZZ.jpg'),
('067102423X', 49, 'Bag of Bones', 'Stephen King', 1999, 'Pocket', 'http://images.amazon.com/images/P/067102423X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/067102423X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/067102423X.01.LZZZZZZZ.jpg'),
('067168390X', 50, 'Lonesome Dove', 'Larry McMurtry', 1988, 'Pocket', 'http://images.amazon.com/images/P/067168390X.01.THUMBZZZ.jpg', 'http://images.amazon.com/images/P/067168390X.01.MZZZZZZZ.jpg', 'http://images.amazon.com/images/P/067168390X.01.LZZZZZZZ.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `LEVEL_ID` int(11) NOT NULL,
  `LEVEL` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`LEVEL_ID`, `LEVEL`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `RATE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `BOOK_ID` varchar(50) NOT NULL,
  `RATE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`RATE_ID`, `USER_ID`, `BOOK_ID`, `RATE`) VALUES
(1, 243, '000649840X', 8),
(2, 243, '002542730X', 4),
(3, 243, '006016848X', 1),
(4, 243, '006019491X', 4),
(5, 243, '006101351X', 4),
(6, 243, '014025448X', 10),
(7, 243, '014028009X', 5),
(8, 243, '014131088X', 4),
(9, 243, '031242227X', 5),
(10, 243, '031298328X', 6),
(11, 243, '034536676X', 4),
(12, 243, '034538475X', 9),
(13, 243, '037541309X', 6),
(14, 243, '038079487X', 6),
(15, 243, '038529929X', 10),
(16, 243, '038533334X', 9),
(17, 243, '038542017X', 7),
(18, 243, '038542471X', 9),
(19, 243, '038548951X', 1),
(20, 243, '038549081X', 1),
(21, 243, '038550120X', 3),
(22, 243, '038550926X', 10),
(23, 243, '038572179X', 7),
(24, 243, '039480001X', 2),
(25, 243, '039592720X', 4),
(26, 243, '042510107X', 1),
(27, 243, '042511774X', 5),
(28, 243, '042516098X', 5),
(29, 243, '043936213X', 1),
(30, 243, '044022103X', 6),
(31, 243, '044022165X', 10),
(32, 243, '044023722X', 10),
(33, 243, '067088300X', 10),
(34, 243, '067102423X', 3),
(35, 244, '000649840X', 2),
(36, 244, '002542730X', 9),
(37, 244, '006016848X', 3),
(38, 244, '006099486X', 6),
(39, 244, '006101351X', 9),
(40, 244, '014023313X', 3),
(41, 244, '014025448X', 3),
(42, 244, '014028009X', 4),
(43, 244, '014100018X', 2),
(44, 244, '014131088X', 5),
(45, 244, '031242227X', 2),
(46, 244, '034536676X', 1),
(47, 244, '034538475X', 8),
(48, 244, '034540288X', 8),
(49, 244, '037541309X', 8),
(50, 244, '037570504X', 1),
(51, 244, '038079487X', 1),
(52, 244, '038533334X', 8),
(53, 244, '038542017X', 5),
(54, 244, '038542471X', 8),
(55, 244, '038548951X', 5),
(56, 244, '038550120X', 7),
(57, 244, '039592720X', 3),
(58, 244, '042510107X', 8),
(59, 244, '042511774X', 7),
(60, 244, '042516098X', 6),
(61, 244, '042518286X', 2),
(62, 244, '043935806X', 9),
(63, 244, '044022103X', 2),
(64, 244, '044022165X', 8),
(65, 244, '044651652X', 2),
(66, 244, '059035342X', 6),
(67, 244, '067088300X', 6),
(68, 244, '067102423X', 9),
(69, 254, '000649840X', 3),
(70, 254, '002542730X', 3),
(71, 254, '006019491X', 5),
(72, 254, '006101351X', 4),
(73, 254, '014025448X', 7),
(74, 254, '014028009X', 3),
(75, 254, '014029628X', 9),
(76, 254, '014038572X', 9),
(77, 254, '031242227X', 5),
(78, 254, '031298328X', 5),
(79, 254, '034538475X', 2),
(80, 254, '034540288X', 6),
(81, 254, '038079487X', 4),
(82, 254, '038082101X', 5),
(83, 254, '038529929X', 7),
(84, 254, '038542471X', 4),
(85, 254, '038550120X', 4),
(86, 254, '038550926X', 9),
(87, 254, '038572179X', 2),
(88, 254, '039592720X', 3),
(89, 254, '042510107X', 3),
(90, 254, '042511774X', 1),
(91, 254, '042516098X', 10),
(92, 254, '042518286X', 8),
(93, 254, '043935806X', 8),
(94, 254, '043936213X', 7),
(95, 254, '044021145X', 5),
(96, 254, '044022103X', 4),
(97, 254, '044023722X', 2),
(98, 254, '044651652X', 6),
(99, 254, '059035342X', 8),
(100, 254, '067088300X', 3),
(101, 254, '067102423X', 4),
(102, 254, '067168390X', 9),
(103, 388, '000649840X', 7),
(104, 388, '002542730X', 8),
(105, 388, '006016848X', 1),
(106, 388, '006019491X', 9),
(107, 388, '006099486X', 8),
(108, 388, '006101351X', 2),
(109, 388, '014023313X', 10),
(110, 388, '014025448X', 2),
(111, 388, '014038572X', 9),
(112, 388, '014100018X', 7),
(113, 388, '014131088X', 5),
(114, 388, '031242227X', 10),
(115, 388, '034538475X', 9),
(116, 388, '034540288X', 10),
(117, 388, '034541389X', 3),
(118, 388, '037541309X', 5),
(119, 388, '037570504X', 10),
(120, 388, '038079487X', 7),
(121, 388, '038529929X', 6),
(122, 388, '038542017X', 9),
(123, 388, '038549081X', 6),
(124, 388, '038550120X', 2),
(125, 388, '038550926X', 6),
(126, 388, '038572179X', 5),
(127, 388, '039480001X', 5),
(128, 388, '039592720X', 9),
(129, 388, '042511774X', 10),
(130, 388, '042513525X', 4),
(131, 388, '042518286X', 4),
(132, 388, '043935806X', 5),
(133, 388, '043936213X', 8),
(134, 388, '044022103X', 8),
(135, 388, '044023722X', 6),
(136, 388, '059035342X', 8),
(137, 388, '067088300X', 1),
(138, 388, '067102423X', 9),
(139, 503, '000649840X', 4),
(140, 503, '002542730X', 4),
(141, 503, '006016848X', 10),
(142, 503, '006019491X', 8),
(143, 503, '006099486X', 8),
(144, 503, '014025448X', 10),
(145, 503, '014028009X', 6),
(146, 503, '014038572X', 9),
(147, 503, '014100018X', 4),
(148, 503, '014131088X', 2),
(149, 503, '031298328X', 8),
(150, 503, '034536676X', 5),
(151, 503, '034540288X', 6),
(152, 503, '034541389X', 6),
(153, 503, '037541309X', 5),
(154, 503, '037570504X', 10),
(155, 503, '038079487X', 7),
(156, 503, '038082101X', 2),
(157, 503, '038533334X', 8),
(158, 503, '038542471X', 3),
(159, 503, '038548951X', 6),
(160, 503, '038550120X', 6),
(161, 503, '038572179X', 9),
(162, 503, '039480001X', 6),
(163, 503, '039592720X', 7),
(164, 503, '042510107X', 6),
(165, 503, '042511774X', 1),
(166, 503, '042513525X', 1),
(167, 503, '042516098X', 7),
(168, 503, '042518286X', 1),
(169, 503, '043936213X', 2),
(170, 503, '044021145X', 6),
(171, 503, '044022103X', 5),
(172, 503, '044022165X', 8),
(173, 503, '059035342X', 1),
(174, 503, '067088300X', 2),
(175, 503, '067102423X', 2),
(176, 503, '067168390X', 7),
(177, 507, '000649840X', 1),
(178, 507, '002542730X', 1),
(179, 507, '006019491X', 4),
(180, 507, '006099486X', 5),
(181, 507, '006101351X', 7),
(182, 507, '014023313X', 1),
(183, 507, '014025448X', 10),
(184, 507, '014100018X', 7),
(185, 507, '031242227X', 7),
(186, 507, '031298328X', 2),
(187, 507, '034536676X', 1),
(188, 507, '034538475X', 5),
(189, 507, '034541389X', 4),
(190, 507, '037541309X', 8),
(191, 507, '038082101X', 3),
(192, 507, '038529929X', 10),
(193, 507, '038533334X', 9),
(194, 507, '038542017X', 7),
(195, 507, '038542471X', 7),
(196, 507, '038548951X', 3),
(197, 507, '038549081X', 10),
(198, 507, '038550120X', 5),
(199, 507, '038572179X', 10),
(200, 507, '039592720X', 5),
(201, 507, '042510107X', 5),
(202, 507, '042513525X', 8),
(203, 507, '042518286X', 7),
(204, 507, '043935806X', 1),
(205, 507, '043936213X', 3),
(206, 507, '044021145X', 8),
(207, 507, '044022103X', 7),
(208, 507, '044022165X', 4),
(209, 507, '044023722X', 7),
(210, 507, '067102423X', 6),
(211, 507, '067168390X', 1),
(212, 595, '000649840X', 10),
(213, 595, '006016848X', 1),
(214, 595, '006019491X', 3),
(215, 595, '006101351X', 7),
(216, 595, '014025448X', 4),
(217, 595, '014029628X', 9),
(218, 595, '014038572X', 2),
(219, 595, '014100018X', 1),
(220, 595, '014131088X', 10),
(221, 595, '031242227X', 5),
(222, 595, '031298328X', 4),
(223, 595, '034536676X', 6),
(224, 595, '034538475X', 2),
(225, 595, '034540288X', 5),
(226, 595, '034541389X', 1),
(227, 595, '038079487X', 5),
(228, 595, '038082101X', 9),
(229, 595, '038533334X', 7),
(230, 595, '038542017X', 8),
(231, 595, '038542471X', 4),
(232, 595, '038549081X', 7),
(233, 595, '038550120X', 5),
(234, 595, '038550926X', 3),
(235, 595, '039480001X', 3),
(236, 595, '042510107X', 10),
(237, 595, '042511774X', 2),
(238, 595, '042513525X', 9),
(239, 595, '042516098X', 8),
(240, 595, '042518286X', 3),
(241, 595, '043935806X', 7),
(242, 595, '043936213X', 1),
(243, 595, '044022165X', 6),
(244, 595, '044023722X', 10),
(245, 595, '044651652X', 10),
(246, 595, '059035342X', 3),
(247, 595, '067088300X', 10),
(248, 595, '067102423X', 3),
(249, 638, '000649840X', 9),
(250, 638, '006019491X', 7),
(251, 638, '006101351X', 10),
(252, 638, '014023313X', 5),
(253, 638, '014025448X', 2),
(254, 638, '014028009X', 7),
(255, 638, '014029628X', 5),
(256, 638, '014100018X', 4),
(257, 638, '031242227X', 4),
(258, 638, '034536676X', 6),
(259, 638, '034538475X', 10),
(260, 638, '034540288X', 8),
(261, 638, '034541389X', 6),
(262, 638, '037541309X', 9),
(263, 638, '038079487X', 2),
(264, 638, '038082101X', 9),
(265, 638, '038533334X', 8),
(266, 638, '038542471X', 9),
(267, 638, '038549081X', 7),
(268, 638, '038550120X', 9),
(269, 638, '038572179X', 7),
(270, 638, '039480001X', 5),
(271, 638, '042511774X', 9),
(272, 638, '042516098X', 5),
(273, 638, '042518286X', 5),
(274, 638, '043936213X', 9),
(275, 638, '044021145X', 3),
(276, 638, '044022103X', 6),
(277, 638, '044023722X', 7),
(278, 638, '044651652X', 4),
(279, 638, '059035342X', 6),
(280, 638, '067088300X', 10),
(281, 638, '067102423X', 1),
(282, 638, '067168390X', 2),
(283, 643, '000649840X', 2),
(284, 643, '002542730X', 5),
(285, 643, '006016848X', 6),
(286, 643, '006019491X', 10),
(287, 643, '006099486X', 6),
(288, 643, '014023313X', 10),
(289, 643, '014025448X', 6),
(290, 643, '014038572X', 9),
(291, 643, '014100018X', 4),
(292, 643, '014131088X', 8),
(293, 643, '031242227X', 5),
(294, 643, '031298328X', 2),
(295, 643, '034536676X', 4),
(296, 643, '034538475X', 1),
(297, 643, '034540288X', 7),
(298, 643, '034541389X', 6),
(299, 643, '037541309X', 2),
(300, 643, '037570504X', 5),
(301, 643, '038079487X', 8),
(302, 643, '038529929X', 7),
(303, 643, '038533334X', 4),
(304, 643, '038542017X', 3),
(305, 643, '038542471X', 3),
(306, 643, '038548951X', 8),
(307, 643, '038550926X', 8),
(308, 643, '039592720X', 9),
(309, 643, '042510107X', 3),
(310, 643, '042511774X', 2),
(311, 643, '042513525X', 1),
(312, 643, '042518286X', 3),
(313, 643, '043935806X', 2),
(314, 643, '043936213X', 4),
(315, 643, '044021145X', 8),
(316, 643, '044022165X', 5),
(317, 643, '059035342X', 4),
(318, 643, '067088300X', 6),
(319, 709, '000649840X', 5),
(320, 709, '006016848X', 5),
(321, 709, '006019491X', 3),
(322, 709, '014023313X', 7),
(323, 709, '014025448X', 5),
(324, 709, '014028009X', 10),
(325, 709, '014029628X', 5),
(326, 709, '014038572X', 7),
(327, 709, '014100018X', 9),
(328, 709, '014131088X', 1),
(329, 709, '034536676X', 2),
(330, 709, '034538475X', 6),
(331, 709, '034540288X', 4),
(332, 709, '034541389X', 10),
(333, 709, '037570504X', 4),
(334, 709, '038082101X', 10),
(335, 709, '038529929X', 7),
(336, 709, '038533334X', 3),
(337, 709, '038542017X', 1),
(338, 709, '038542471X', 7),
(339, 709, '038548951X', 9),
(340, 709, '038549081X', 6),
(341, 709, '038550120X', 6),
(342, 709, '038550926X', 10),
(343, 709, '038572179X', 8),
(344, 709, '039480001X', 1),
(345, 709, '042510107X', 9),
(346, 709, '042511774X', 8),
(347, 709, '042518286X', 3),
(348, 709, '043935806X', 8),
(349, 709, '043936213X', 10),
(350, 709, '044021145X', 7),
(351, 709, '044023722X', 9),
(352, 709, '044651652X', 2),
(353, 709, '059035342X', 10),
(354, 709, '067088300X', 9),
(355, 709, '067168390X', 8),
(356, 763, '000649840X', 2),
(357, 763, '006016848X', 4),
(358, 763, '006019491X', 9),
(359, 763, '006101351X', 2),
(360, 763, '014025448X', 9),
(361, 763, '014028009X', 5),
(362, 763, '014029628X', 4),
(363, 763, '014100018X', 4),
(364, 763, '031242227X', 1),
(365, 763, '034536676X', 9),
(366, 763, '034538475X', 5),
(367, 763, '037541309X', 5),
(368, 763, '037570504X', 4),
(369, 763, '038079487X', 1),
(370, 763, '038082101X', 7),
(371, 763, '038529929X', 1),
(372, 763, '038533334X', 1),
(373, 763, '038542017X', 9),
(374, 763, '038549081X', 8),
(375, 763, '038550926X', 6),
(376, 763, '038572179X', 2),
(377, 763, '039480001X', 7),
(378, 763, '039592720X', 9),
(379, 763, '042510107X', 9),
(380, 763, '042511774X', 9),
(381, 763, '042513525X', 1),
(382, 763, '042516098X', 6),
(383, 763, '042518286X', 10),
(384, 763, '044021145X', 5),
(385, 763, '044022103X', 5),
(386, 763, '044651652X', 7),
(387, 763, '059035342X', 5),
(388, 763, '067102423X', 4),
(389, 763, '067168390X', 1),
(390, 805, '000649840X', 9),
(391, 805, '006016848X', 10),
(392, 805, '006019491X', 9),
(393, 805, '006099486X', 1),
(394, 805, '014023313X', 6),
(395, 805, '014028009X', 5),
(396, 805, '014029628X', 9),
(397, 805, '014100018X', 1),
(398, 805, '014131088X', 7),
(399, 805, '031242227X', 1),
(400, 805, '031298328X', 5),
(401, 805, '034536676X', 7),
(402, 805, '034538475X', 9),
(403, 805, '034540288X', 4),
(404, 805, '034541389X', 6),
(405, 805, '038079487X', 6),
(406, 805, '038082101X', 10),
(407, 805, '038529929X', 6),
(408, 805, '038542017X', 8),
(409, 805, '038542471X', 7),
(410, 805, '038548951X', 2),
(411, 805, '038549081X', 2),
(412, 805, '038550926X', 4),
(413, 805, '038572179X', 10),
(414, 805, '039480001X', 4),
(415, 805, '039592720X', 8),
(416, 805, '042510107X', 8),
(417, 805, '042511774X', 4),
(418, 805, '042513525X', 9),
(419, 805, '042516098X', 3),
(420, 805, '043935806X', 8),
(421, 805, '043936213X', 10),
(422, 805, '044022103X', 5),
(423, 805, '044022165X', 8),
(424, 805, '067088300X', 6),
(425, 805, '067102423X', 2),
(426, 805, '067168390X', 3),
(427, 882, '000649840X', 2),
(428, 882, '002542730X', 3),
(429, 882, '006016848X', 6),
(430, 882, '014023313X', 7),
(431, 882, '014025448X', 8),
(432, 882, '014028009X', 8),
(433, 882, '014029628X', 10),
(434, 882, '014038572X', 1),
(435, 882, '014100018X', 3),
(436, 882, '014131088X', 5),
(437, 882, '034536676X', 8),
(438, 882, '034538475X', 3),
(439, 882, '034540288X', 6),
(440, 882, '034541389X', 2),
(441, 882, '037541309X', 2),
(442, 882, '038079487X', 7),
(443, 882, '038082101X', 4),
(444, 882, '038542017X', 4),
(445, 882, '038548951X', 9),
(446, 882, '038549081X', 1),
(447, 882, '038550120X', 8),
(448, 882, '038550926X', 7),
(449, 882, '038572179X', 6),
(450, 882, '039480001X', 7),
(451, 882, '039592720X', 3),
(452, 882, '042510107X', 10),
(453, 882, '042513525X', 10),
(454, 882, '043935806X', 2),
(455, 882, '043936213X', 3),
(456, 882, '044021145X', 6),
(457, 882, '044022103X', 5),
(458, 882, '044023722X', 1),
(459, 882, '059035342X', 1),
(460, 882, '067102423X', 2),
(461, 882, '067168390X', 3),
(462, 929, '000649840X', 5),
(463, 929, '002542730X', 1),
(464, 929, '006016848X', 8),
(465, 929, '006019491X', 6),
(466, 929, '006099486X', 7),
(467, 929, '014023313X', 2),
(468, 929, '014025448X', 10),
(469, 929, '014028009X', 9),
(470, 929, '014029628X', 1),
(471, 929, '014038572X', 10),
(472, 929, '014131088X', 7),
(473, 929, '031242227X', 10),
(474, 929, '031298328X', 10),
(475, 929, '034536676X', 3),
(476, 929, '034538475X', 5),
(477, 929, '034541389X', 2),
(478, 929, '037541309X', 1),
(479, 929, '038079487X', 5),
(480, 929, '038082101X', 4),
(481, 929, '038529929X', 3),
(482, 929, '038542017X', 3),
(483, 929, '038542471X', 2),
(484, 929, '038548951X', 1),
(485, 929, '038549081X', 6),
(486, 929, '038572179X', 9),
(487, 929, '039480001X', 6),
(488, 929, '039592720X', 3),
(489, 929, '042510107X', 9),
(490, 929, '042516098X', 6),
(491, 929, '042518286X', 3),
(492, 929, '043935806X', 2),
(493, 929, '044021145X', 1),
(494, 929, '044651652X', 9),
(495, 929, '059035342X', 10),
(496, 929, '067088300X', 7),
(497, 929, '067102423X', 5),
(548, 278871, '000649840X', 2),
(549, 278871, '002542730X', 5),
(550, 278871, '006016848X', 1),
(551, 278871, '006019491X', 4),
(552, 278871, '006099486X', 5),
(553, 278871, '006101351X', 3),
(554, 278871, '014023313X', 8),
(555, 278871, '014025448X', 8),
(556, 278871, '014028009X', 10),
(557, 278871, '014029628X', 9),
(558, 278871, '014038572X', 6),
(559, 278871, '014100018X', 6),
(560, 278871, '014131088X', 9),
(561, 278871, '031242227X', 2),
(562, 278871, '031298328X', 4),
(563, 278871, '034536676X', 2),
(564, 278871, '034538475X', 1),
(565, 243, '059035342X', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(32) DEFAULT NULL,
  `LEVEL_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `USERNAME`, `PASSWORD`, `LEVEL_ID`) VALUES
(243, 'syazili', '99d746eb8b772f77bca65f80af194e00', 1),
(244, NULL, NULL, 2),
(254, NULL, NULL, 2),
(388, NULL, NULL, 2),
(503, NULL, NULL, 2),
(507, NULL, NULL, 2),
(595, NULL, NULL, 2),
(638, NULL, NULL, 2),
(643, NULL, NULL, 2),
(709, NULL, NULL, 2),
(763, NULL, NULL, 2),
(805, NULL, NULL, 2),
(882, NULL, NULL, 2),
(929, NULL, NULL, 2),
(278871, NULL, NULL, 2),
(278872, NULL, NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BOOK_ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`LEVEL_ID`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`RATE_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `ISBN` (`BOOK_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `LEVEL` (`LEVEL_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `LEVEL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `RATE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=566;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278873;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rates_ibfk_2` FOREIGN KEY (`BOOK_ID`) REFERENCES `books` (`BOOK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`LEVEL_ID`) REFERENCES `levels` (`LEVEL_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
