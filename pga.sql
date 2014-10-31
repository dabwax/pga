-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2014 at 01:08 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pga`
--

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE IF NOT EXISTS `feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL,
  `sidebar` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inputs`
--

CREATE TABLE IF NOT EXISTS `inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `inputs`
--

INSERT INTO `inputs` (`id`, `name`) VALUES
(1, 'Calendário'),
(2, 'Intervalo de Tempo'),
(3, 'Texto'),
(4, 'Escala Numérica'),
(5, 'Escala Texto'),
(6, 'Número');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `views` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message_recipients`
--

CREATE TABLE IF NOT EXISTS `message_recipients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `recipient_1_id` int(11) DEFAULT NULL,
  `recipient_2_id` int(11) DEFAULT NULL,
  `recipient_3_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message_replies`
--

CREATE TABLE IF NOT EXISTS `message_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `school` varchar(255) NOT NULL,
  `clinical_condition` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `date_of_birth`, `school`, `clinical_condition`, `description`, `created`, `modified`) VALUES
(1, 'Luiz Henrique Almeida da Silva', '1995-04-28', 'Educandário Sagrada Família', 'Psicopata', 'Lorem ipsum dolor sit amet', '2014-10-30 00:00:00', '2014-10-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_exercises`
--

CREATE TABLE IF NOT EXISTS `student_exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `due_to` date DEFAULT NULL,
  `student_grade_id` int(11) NOT NULL,
  `enunciation` text NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `answer` text,
  `observations` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE IF NOT EXISTS `student_grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_inputs`
--

CREATE TABLE IF NOT EXISTS `student_inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `input_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student_inputs`
--

INSERT INTO `student_inputs` (`id`, `student_id`, `input_id`, `name`) VALUES
(1, 1, 1, 'Data da Aula'),
(2, 1, 3, 'Crises');

-- --------------------------------------------------------

--
-- Table structure for table `student_input_grades`
--

CREATE TABLE IF NOT EXISTS `student_input_grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_input_id` int(11) NOT NULL,
  `student_grade_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_input_values`
--

CREATE TABLE IF NOT EXISTS `student_input_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_input_id` int(11) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_parents`
--

CREATE TABLE IF NOT EXISTS `student_parents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `mom_name` varchar(255) DEFAULT NULL,
  `mom_phone` varchar(255) DEFAULT NULL,
  `mom_email` varchar(255) DEFAULT NULL,
  `mom_password` varchar(255) DEFAULT NULL,
  `dad_name` varchar(255) DEFAULT NULL,
  `dad_phone` varchar(255) DEFAULT NULL,
  `dad_email` varchar(255) DEFAULT NULL,
  `dad_password` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student_parents`
--

INSERT INTO `student_parents` (`id`, `student_id`, `mom_name`, `mom_phone`, `mom_email`, `mom_password`, `dad_name`, `dad_phone`, `dad_email`, `dad_password`, `created`, `modified`) VALUES
(1, 1, 'Dui Furriel', '21972609587', 'dui.furriel@gmail.com', 'relogio123', 'Daltro Pedro', '21972609587', 'pedro.daltro@gmail.com', 'relogio123', '2014-10-30 00:00:00', '2014-10-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_psychiatrists`
--

CREATE TABLE IF NOT EXISTS `student_psychiatrists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student_psychiatrists`
--

INSERT INTO `student_psychiatrists` (`id`, `student_id`, `name`, `phone`, `email`, `password`, `created`, `modified`) VALUES
(1, 1, 'Pedro Daltro', '21972609587', 'daltro.inq@gmail.com', 'relogio123', '2014-10-30 00:00:00', '2014-10-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_schools`
--

CREATE TABLE IF NOT EXISTS `student_schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `mediator_name` varchar(255) DEFAULT NULL,
  `mediator_phone` varchar(255) DEFAULT NULL,
  `mediator_email` varchar(255) DEFAULT NULL,
  `mediator_password` varchar(255) DEFAULT NULL,
  `coordinator_name` varchar(255) DEFAULT NULL,
  `coordinator_phone` varchar(255) DEFAULT NULL,
  `coordinator_email` varchar(255) DEFAULT NULL,
  `coordinator_password` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student_schools`
--

INSERT INTO `student_schools` (`id`, `student_id`, `mediator_name`, `mediator_phone`, `mediator_email`, `mediator_password`, `coordinator_name`, `coordinator_phone`, `coordinator_email`, `coordinator_password`, `created`, `modified`) VALUES
(1, 1, 'Dui Furriel', '21972609587', 'dui.furriel@gmail.com', 'relogio123', 'Daltro Pedro', '21972609587', 'pedro.daltro@gmail.com', 'relogio123', '2014-10-30 00:00:00', '2014-10-30 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
