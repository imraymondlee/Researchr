-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2016 at 12:06 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `researchr`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `userID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`userID`, `name`, `phoneNumber`, `email`, `password`) VALUES
(29, 'Raymond', '5555555555', 'raymond@raymond.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(30, 'Lee', '1231231234', 'lee@lee.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(31, 'Bob', '1112223333', 'bob@bob.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(32, 'Joe', '2223334444', 'joe@joe.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(33, 'Sam', '3334445555', 'sam@sam.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(34, 'Tom', '9998887777', 'tom@tom.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(35, 'Ken', '5554443333', 'ken@ken.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(36, 'Bill', '4442221111', 'bill@bill.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(37, 'Matthew', '5551112222', 'matthew@matthew.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(38, 'Researchr', '1119992222', 'researchr@researchr.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(39, 'Raymond Lee', '1231234123', 'raylee@raylee.com', '7c222fb2927d828af22f592134e8932480637c0d');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `appID` int(11) NOT NULL,
  `postingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `dateApplied` date NOT NULL,
  `contactMethod` varchar(5) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`appID`, `postingID`, `userID`, `dateApplied`, `contactMethod`, `message`) VALUES
(1, 4, 30, '2015-10-29', 'email', 'Mauris et quam sed urna porta accumsan ac a ex. Nunc nec diam vitae tellus consequat ornare non sed ligula. Phasellus ultrices est tellus, et consectetur leo tristique fringilla. Nulla in eleifend nunc. Quisque vitae felis eros. Nam sed blandit orci, sed dignissim enim.'),
(2, 5, 31, '2015-10-29', 'phone', 'Proin rhoncus tortor vitae dui mattis, sed hendrerit elit ullamcorper. Etiam auctor tristique efficitur.'),
(3, 4, 31, '2015-10-29', 'email', 'Etiam ornare quam porttitor molestie rutrum.'),
(4, 6, 32, '2015-10-29', 'phone', 'Aliquam justo nibh, iaculis sit amet orci a, egestas aliquam lectus. Maecenas in ultrices ipsum, in tincidunt arcu. Aenean nec nisi eget tortor facilisis luctus dictum eget tellus. Nullam commodo quam in tortor lacinia sagittis.'),
(5, 5, 33, '2015-10-29', 'email', 'Nulla orci metus, ultrices eu velit ac, luctus sagittis ante.'),
(6, 7, 33, '2015-10-29', 'email', 'Nulla orci metus, ultrices eu velit ac, luctus sagittis ante.'),
(7, 4, 34, '2015-10-29', 'email', 'In id tellus eget orci auctor dignissim in eget eros. Cras ut elit ligula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean non efficitur massa. Aenean vel magna in odio laoreet faucibus. Sed vitae mollis felis. Nunc ullamcorper enim id luctus fringilla.'),
(8, 9, 34, '2015-10-29', 'phone', 'Aliquam non iaculis quam, sit amet suscipit mauris. Aenean neque eros, porta sit amet dapibus sed, hendrerit ac neque.'),
(9, 7, 35, '2015-10-29', 'email', 'Nullam scelerisque malesuada massa eu pulvinar. Curabitur suscipit hendrerit justo, eu malesuada sapien pellentesque ut. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur erat justo, aliquet ac viverra ac, gravida quis nunc. Suspendisse ornare convallis venenatis. Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.'),
(10, 4, 36, '2015-10-29', 'phone', 'Nullam scelerisque malesuada massa eu pulvinar.'),
(11, 5, 36, '2015-10-29', 'phone', 'Nullam scelerisque malesuada massa eu pulvinar. Curabitur suscipit hendrerit justo, eu malesuada sapien pellentesque ut.'),
(12, 8, 36, '2015-10-29', 'phone', 'Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.'),
(14, 8, 29, '2015-10-29', 'email', 'Nullam scelerisque malesuada massa eu pulvinar. Curabitur suscipit hendrerit justo, eu malesuada sapien pellentesque ut. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur erat justo, aliquet ac viverra ac, gravida quis nunc. Suspendisse ornare convallis venenatis. Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.'),
(15, 7, 29, '2015-10-29', 'phone', 'Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.'),
(16, 10, 36, '2015-10-29', 'email', 'Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.'),
(17, 6, 36, '2015-10-29', 'phone', 'Nullam scelerisque malesuada massa eu pulvinar. Curabitur suscipit hendrerit justo, eu malesuada sapien pellentesque ut. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur erat justo, aliquet ac viverra ac, gravida quis nunc. Suspendisse ornare convallis venenatis. Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.'),
(18, 7, 36, '2015-10-29', 'phone', 'Nullam scelerisque malesuada massa eu pulvinar. Curabitur suscipit hendrerit justo, eu malesuada sapien pellentesque ut. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur erat justo, aliquet ac viverra ac, gravida quis nunc. Suspendisse ornare convallis venenatis. Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.'),
(19, 8, 36, '2015-10-29', 'email', 'Nullam scelerisque malesuada massa eu pulvinar. Curabitur suscipit hendrerit justo, eu malesuada sapien pellentesque ut. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur erat justo, aliquet ac viverra ac, gravida quis nunc. Suspendisse ornare convallis venenatis. Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.'),
(20, 10, 29, '2015-11-09', 'phone', 'Aliquam non iaculis quam, sit amet suscipit mauris. Aenean neque eros, porta sit amet dapibus sed, hendrerit ac neque.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(11) NOT NULL,
  `postingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `postingID`, `userID`, `date`, `comment`) VALUES
(9, 4, 30, '2015-10-29', 'Nam sed blandit orci, sed dignissim enim.'),
(10, 4, 29, '2015-10-29', 'Phasellus ultrices est tellus, et consectetur leo tristique fringilla. Nulla in eleifend nunc. Quisque vitae felis eros.'),
(11, 5, 31, '2015-10-29', 'Nam vehicula ipsum nec hendrerit porta. Integer sed justo varius, fringilla magna a, congue augue. Proin rhoncus tortor vitae dui mattis, sed hendrerit elit ullamcorper. Etiam auctor tristique efficitur.'),
(12, 4, 31, '2015-10-29', 'Etiam ornare quam porttitor molestie rutrum.'),
(13, 5, 32, '2015-10-29', 'Maecenas augue tellus, pharetra dictum pellentesque ut, tincidunt sed justo. Aliquam vitae elit mollis libero accumsan aliquam. Cras a finibus ipsum.'),
(14, 4, 33, '2015-10-29', 'Phasellus volutpat diam massa, in auctor orci egestas mattis. Nulla vitae turpis nunc. Nulla orci metus, ultrices eu velit ac, luctus sagittis ante.'),
(15, 5, 29, '2015-10-29', 'Nulla vitae turpis nunc. Nulla orci metus, ultrices eu velit ac, luctus sagittis ante.'),
(16, 8, 29, '2015-10-29', 'Phasellus volutpat diam massa, in auctor orci egestas mattis. Nulla vitae turpis nunc. Nulla orci metus, ultrices eu velit ac, luctus sagittis ante.'),
(17, 4, 34, '2015-10-29', 'Aenean neque eros, porta sit amet dapibus sed, hendrerit ac neque.'),
(18, 9, 34, '2015-10-29', 'Aliquam non iaculis quam, sit amet suscipit mauris. Aenean neque eros, porta sit amet dapibus sed, hendrerit ac neque.'),
(19, 7, 35, '2015-10-29', 'Fusce in orci id augue condimentum aliquet in vel diam.'),
(20, 5, 35, '2015-10-29', 'Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.'),
(21, 8, 36, '2015-10-29', 'Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.'),
(22, 9, 29, '2015-10-29', 'Fusce in orci id augue condimentum aliquet in vel diam.'),
(23, 8, 29, '2015-10-29', 'Fusce in orci id augue condimentum aliquet in vel diam.'),
(24, 5, 29, '2015-10-29', 'Fusce in orci id augue condimentum aliquet in vel diam.'),
(25, 4, 36, '2015-10-29', 'Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.'),
(26, 6, 36, '2015-10-29', 'Fusce in orci id augue condimentum aliquet in vel diam.'),
(27, 7, 36, '2015-10-29', 'Fusce in orci id augue condimentum aliquet in vel diam.'),
(28, 9, 36, '2015-10-29', 'Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.'),
(29, 9, 36, '2015-10-29', 'Suspendisse ornare convallis venenatis. Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.'),
(30, 10, 29, '2015-11-09', 'Cras ut elit ligula.'),
(31, 4, 29, '2015-12-03', 'asdfasdfasdfsd'),
(32, 4, 29, '2015-12-03', 'asdf'),
(33, 4, 29, '2015-12-03', 'hi'),
(34, 4, 29, '2015-12-03', 'asdf'),
(35, 4, 29, '2015-12-03', 'Hey there');

-- --------------------------------------------------------

--
-- Table structure for table `postings`
--

CREATE TABLE IF NOT EXISTS `postings` (
  `postingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `pay` int(3) NOT NULL,
  `datePosted` date NOT NULL,
  `bodyText` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postings`
--

INSERT INTO `postings` (`postingID`, `userID`, `title`, `location`, `pay`, `datePosted`, `bodyText`) VALUES
(4, 29, 'Virtual Reality Study Participants Needed', 'Vancouver', 10, '2015-10-29', 'Nunc fringilla, arcu id efficitur eleifend, mi libero dapibus dolor, sit amet accumsan nunc nisl eu lacus. Duis id dictum dolor. Aliquam et mi at tellus tincidunt sodales sit amet eget dolor. Sed dui diam, gravida in metus sit amet, sagittis tempus libero. Cras condimentum, tortor eget semper luctus, turpis libero laoreet turpis, sit amet feugiat ligula nunc eu mauris. Donec id turpis magna. Vivamus interdum consequat leo, quis aliquam orci hendrerit at. Nam vehicula ipsum nec hendrerit porta. Integer sed justo varius, fringilla magna a, congue augue. Proin rhoncus tortor vitae dui mattis, sed hendrerit elit ullamcorper. Etiam auctor tristique efficitur.'),
(5, 30, 'Business Students Research Study', 'Burnaby', 20, '2015-10-29', 'Morbi nec nunc non eros aliquam aliquam in quis sem. Etiam tincidunt nec diam in molestie. Maecenas et nisl massa. Pellentesque aliquam neque id metus suscipit mollis. Quisque scelerisque elit dignissim neque auctor ultrices. Mauris et quam sed urna porta accumsan ac a ex. Nunc nec diam vitae tellus consequat ornare non sed ligula. Phasellus ultrices est tellus, et consectetur leo tristique fringilla. Nulla in eleifend nunc. Quisque vitae felis eros. Nam sed blandit orci, sed dignissim enim.'),
(6, 31, 'Athletes for Research Study', 'Richmond', 40, '2015-10-29', 'Nam ut libero nec dui aliquam dictum. Nunc fringilla, arcu id efficitur eleifend, mi libero dapibus dolor, sit amet accumsan nunc nisl eu lacus. Duis id dictum dolor. Aliquam et mi at tellus tincidunt sodales sit amet eget dolor. Sed dui diam, gravida in metus sit amet, sagittis tempus libero. Cras condimentum, tortor eget semper luctus, turpis libero laoreet turpis, sit amet feugiat ligula nunc eu mauris. Donec id turpis magna. Vivamus interdum consequat leo, quis aliquam orci hendrerit at. Nam vehicula ipsum nec hendrerit porta. Integer sed justo varius, fringilla magna a, congue augue. Proin rhoncus tortor vitae dui mattis, sed hendrerit elit ullamcorper. Etiam auctor tristique efficitur.'),
(7, 32, 'Game Testers Needed', 'Vancouver', 10, '2015-10-29', 'Aliquam justo nibh, iaculis sit amet orci a, egestas aliquam lectus. Maecenas in ultrices ipsum, in tincidunt arcu. Aenean nec nisi eget tortor facilisis luctus dictum eget tellus. Nullam commodo quam in tortor lacinia sagittis. Praesent pretium auctor ornare. Aenean a ligula sed risus feugiat pulvinar. Suspendisse dictum neque vehicula nisl porta aliquet. Phasellus cursus nisl eu eros pulvinar, ut posuere nisl fringilla. Maecenas augue tellus, pharetra dictum pellentesque ut, tincidunt sed justo. Aliquam vitae elit mollis libero accumsan aliquam. Cras a finibus ipsum.'),
(8, 33, 'Users for New Sofwares', 'Vancouver', 50, '2015-10-29', 'Quisque at lacus id dui finibus lacinia. Nam fringilla vehicula gravida. Proin non consequat ipsum. Donec augue dui, tristique eget ex quis, interdum semper sem. Donec in quam ac felis sodales ullamcorper id non dolor. Ut id malesuada orci, eget pretium sem. Nullam sed viverra sem. Duis placerat, ligula in pellentesque luctus, nunc metus pulvinar leo, non iaculis lorem sem eu ante. Morbi aliquet purus at malesuada malesuada. Quisque sit amet dui vitae odio mollis suscipit eu in erat. Pellentesque ut lacus neque. Donec eget pharetra dui. Cras lacus lorem, ultricies quis libero et, imperdiet consequat quam. Phasellus volutpat diam massa, in auctor orci egestas mattis. Nulla vitae turpis nunc. Nulla orci metus, ultrices eu velit ac, luctus sagittis ante.'),
(9, 29, 'Feedback Wanted for Software', 'Richmond', 10, '2015-10-29', 'Quisque sit amet dui vitae odio mollis suscipit eu in erat. Pellentesque ut lacus neque. Donec eget pharetra dui. Cras lacus lorem, ultricies quis libero et, imperdiet consequat quam. Phasellus volutpat diam massa, in auctor orci egestas mattis. Nulla vitae turpis nunc. Nulla orci metus, ultrices eu velit ac, luctus sagittis ante.'),
(10, 34, 'Mobile App Testers Wanted', 'Vancouver', 20, '2015-10-29', 'In id tellus eget orci auctor dignissim in eget eros. Cras ut elit ligula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean non efficitur massa. Aenean vel magna in odio laoreet faucibus. Sed vitae mollis felis. Nunc ullamcorper enim id luctus fringilla. Nam in tellus id nulla varius finibus ut ut augue. Cras ac quam semper, blandit enim et, placerat dui. Morbi ultricies, augue sit amet laoreet feugiat, massa massa iaculis urna, ut fermentum enim libero vel nisi. Donec hendrerit dictum tortor in bibendum. Aliquam non iaculis quam, sit amet suscipit mauris. Aenean neque eros, porta sit amet dapibus sed, hendrerit ac neque.'),
(11, 36, 'Hockey Players Wanted', 'Surrey', 80, '2015-10-29', 'Nullam scelerisque malesuada massa eu pulvinar. Curabitur suscipit hendrerit justo, eu malesuada sapien pellentesque ut. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur erat justo, aliquet ac viverra ac, gravida quis nunc. Suspendisse ornare convallis venenatis. Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `userID` int(11) NOT NULL,
  `biography` text NOT NULL,
  `profilePicture` varchar(100) NOT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `flickrID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`userID`, `biography`, `profilePicture`, `twitter`, `flickrID`) VALUES
(29, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut libero nec dui aliquam dictum. Nunc fringilla, arcu id efficitur eleifend, mi libero dapibus dolor, sit amet accumsan nunc nisl eu lacus. Duis id dictum dolor. Aliquam et mi at tellus tincidunt sodales sit amet eget dolor. Sed dui diam, gravida in metus sit amet, sagittis tempus libero. Cras condimentum, tortor eget semper luctus, turpis libero laoreet turpis, sit amet feugiat ligula nunc eu mauris. Donec id turpis magna. Vivamus interdum consequat leo, quis aliquam orci hendrerit at. Nam vehicula ipsum nec hendrerit porta. Integer sed justo varius, fringilla magna a, congue augue. Proin rhoncus tortor vitae dui mattis, sed hendrerit elit ullamcorper.', 'placeholder', 'r_ray_lee', '135640163@N04'),
(30, 'Proin id bibendum enim, vitae rutrum orci. Duis metus purus, consequat eget nunc ac, accumsan bibendum erat. Aenean in hendrerit odio, quis convallis est. Ut hendrerit convallis eros, a suscipit purus ornare pellentesque. Morbi nec nunc non eros aliquam aliquam in quis sem. Etiam tincidunt nec diam in molestie. Maecenas et nisl massa. Pellentesque aliquam neque id metus suscipit mollis. Quisque scelerisque elit dignissim neque auctor ultrices. Mauris et quam sed urna porta accumsan ac a ex. Nunc nec diam vitae tellus consequat ornare non sed ligula. Phasellus ultrices est tellus, et consectetur leo tristique fringilla. Nulla in eleifend nunc. Quisque vitae felis eros. Nam sed blandit orci, sed dignissim enim.', 'placeholder', 'tomleemusic', '43015259@N03'),
(31, 'Nam ut libero nec dui aliquam dictum. Nunc fringilla, arcu id efficitur eleifend, mi libero dapibus dolor, sit amet accumsan nunc nisl eu lacus. Duis id dictum dolor. Aliquam et mi at tellus tincidunt sodales sit amet eget dolor. Sed dui diam, gravida in metus sit amet, sagittis tempus libero. Cras condimentum, tortor eget semper luctus, turpis libero laoreet turpis, sit amet feugiat ligula nunc eu mauris. Donec id turpis magna. Vivamus interdum consequat leo, quis aliquam orci hendrerit at. Nam vehicula ipsum nec hendrerit porta. Integer sed justo varius, fringilla magna a, congue augue. Proin rhoncus tortor vitae dui mattis, sed hendrerit elit ullamcorper. Etiam auctor tristique efficitur.', 'placeholder', 'fouseyTube', 'imhof89'),
(32, 'Integer non ornare erat. Aliquam aliquam laoreet luctus. Nulla semper orci vitae posuere feugiat. Curabitur et tincidunt neque. Pellentesque eu erat auctor, tristique libero at, accumsan quam. Phasellus in tempor erat. Pellentesque quis sem non eros tincidunt auctor vitae sit amet est. Mauris pretium, enim in sollicitudin placerat, elit ipsum pharetra orci, ac laoreet elit lectus ac elit. Mauris metus diam, feugiat in erat eu, interdum sagittis ex. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed felis diam, facilisis eget tincidunt pretium, consectetur vitae lectus. Vivamus consequat feugiat elementum. Fusce vestibulum nibh a erat vestibulum semper.', 'placeholder', 'mkbhd', '123025819@N03'),
(33, 'Quisque at lacus id dui finibus lacinia. Nam fringilla vehicula gravida. Proin non consequat ipsum. Donec augue dui, tristique eget ex quis, interdum semper sem. Donec in quam ac felis sodales ullamcorper id non dolor. Ut id malesuada orci, eget pretium sem. Nullam sed viverra sem. Duis placerat, ligula in pellentesque luctus, nunc metus pulvinar leo, non iaculis lorem sem eu ante. Morbi aliquet purus at malesuada malesuada. Quisque sit amet dui vitae odio mollis suscipit eu in erat. Pellentesque ut lacus neque. Donec eget pharetra dui. Cras lacus lorem, ultricies quis libero et, imperdiet consequat quam. Phasellus volutpat diam massa, in auctor orci egestas mattis. Nulla vitae turpis nunc. Nulla orci metus, ultrices eu velit ac, luctus sagittis ante.', 'placeholder', 'NCIXdotCOM', '126228338@N07'),
(34, 'In id tellus eget orci auctor dignissim in eget eros. Cras ut elit ligula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean non efficitur massa. Aenean vel magna in odio laoreet faucibus. Sed vitae mollis felis. Nunc ullamcorper enim id luctus fringilla. Nam in tellus id nulla varius finibus ut ut augue. Cras ac quam semper, blandit enim et, placerat dui. Morbi ultricies, augue sit amet laoreet feugiat, massa massa iaculis urna, ut fermentum enim libero vel nisi. Donec hendrerit dictum tortor in bibendum. Aliquam non iaculis quam, sit amet suscipit mauris. Aenean neque eros, porta sit amet dapibus sed, hendrerit ac neque.', 'placeholder', 'tomleemusic', '43015259@N03'),
(35, 'Nullam scelerisque malesuada massa eu pulvinar. Curabitur suscipit hendrerit justo, eu malesuada sapien pellentesque ut. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur erat justo, aliquet ac viverra ac, gravida quis nunc. Suspendisse ornare convallis venenatis. Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.', 'placeholder', 'oneplus', 'wouterrietberg'),
(36, 'Nullam scelerisque malesuada massa eu pulvinar. Curabitur suscipit hendrerit justo, eu malesuada sapien pellentesque ut. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur erat justo, aliquet ac viverra ac, gravida quis nunc. Suspendisse ornare convallis venenatis. Praesent dictum sit amet nulla ac egestas. Fusce in orci id augue condimentum aliquet in vel diam.', 'placeholder', 'pebble', 'justintrudeau'),
(37, 'Migas schlitz twee, mlkshk lomo DIY ugh viral. Pinterest schlitz hashtag pork belly stumptown. Bespoke art party intelligentsia 8-bit tote bag, locavore kitsch cornhole post-ironic selvage. Leggings squid pop-up, seitan locavore lumbersexual humblebrag microdosing gluten-free bicycle rights umami kale chips typewriter before they sold out.', 'placeholder', 'kaskade', '95787103@N07'),
(38, 'Hello, welcome to Researchr', 'placeholder', 'researchrapp', '135640163@N04'),
(39, ' ', 'placeholder', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`appID`),
  ADD KEY `postingID` (`postingID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `postingID` (`postingID`);

--
-- Indexes for table `postings`
--
ALTER TABLE `postings`
  ADD PRIMARY KEY (`postingID`),
  ADD KEY `userID` (`userID`) USING BTREE;

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`userID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `appID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `postings`
--
ALTER TABLE `postings`
  MODIFY `postingID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `postingID_fk` FOREIGN KEY (`postingID`) REFERENCES `postings` (`postingID`),
  ADD CONSTRAINT `userID_fk2` FOREIGN KEY (`userID`) REFERENCES `accounts` (`userID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `postingID_fk2` FOREIGN KEY (`postingID`) REFERENCES `postings` (`postingID`),
  ADD CONSTRAINT `userID_fk4` FOREIGN KEY (`userID`) REFERENCES `accounts` (`userID`);

--
-- Constraints for table `postings`
--
ALTER TABLE `postings`
  ADD CONSTRAINT `userID_fk` FOREIGN KEY (`userID`) REFERENCES `accounts` (`userID`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `userID_fk3` FOREIGN KEY (`userID`) REFERENCES `accounts` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
