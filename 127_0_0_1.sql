-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2014 at 08:52 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `inputs`
--

INSERT INTO `inputs` (`id`, `name`) VALUES
(1, 'Calendário'),
(2, 'Intervalo de Tempo'),
(3, 'Texto'),
(4, 'Escala Numérica'),
(5, 'Escala Texto'),
(6, 'Número'),
(7, 'Texto Privativo');

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
-- Table structure for table `student_exercises`
--

CREATE TABLE IF NOT EXISTS `student_exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `due_to` date DEFAULT NULL,
  `student_lesson_id` int(11) NOT NULL,
  `enunciation` text NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `answer` text,
  `observations` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student_exercises`
--

INSERT INTO `student_exercises` (`id`, `student_id`, `date`, `due_to`, `student_lesson_id`, `enunciation`, `attachment`, `answer`, `observations`) VALUES
(1, 1, '2014-11-11', '2014-11-11', 1, 'Lorem ipsum dolor sit amet', NULL, NULL, NULL);

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
  `date` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `actor` varchar(255) NOT NULL,
  `student_input_id` int(11) DEFAULT NULL,
  `student_lesson_id` int(11) DEFAULT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `student_input_values`
--

INSERT INTO `student_input_values` (`id`, `date`, `student_id`, `actor`, `student_input_id`, `student_lesson_id`, `value`) VALUES
(53, '11/11/2014', 1, 'tutor', 11, NULL, '11/11/2014'),
(54, '11/11/2014', 1, 'tutor', 3, NULL, 'fdsafafsafasfasfasf'),
(55, '11/11/2014', 1, 'tutor', 9, NULL, '3'),
(56, '11/11/2014', 1, 'tutor', 10, NULL, 'MALUCO'),
(57, '11/11/2014', 1, 'tutor', 15, NULL, '5'),
(58, '11/11/2014', 1, 'pais', 16, NULL, '1'),
(59, '11/11/2014', 1, 'pais', 17, NULL, '1'),
(60, '11/11/2014', 1, 'tutor', NULL, 1, 'matemática!');

-- --------------------------------------------------------

--
-- Table structure for table `student_inputs`
--

CREATE TABLE IF NOT EXISTS `student_inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `input_id` int(11) NOT NULL,
  `actor` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `config` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `student_inputs`
--

INSERT INTO `student_inputs` (`id`, `student_id`, `input_id`, `actor`, `name`, `config`) VALUES
(3, 1, 3, 'tutor', 'Descrição da Aula', ''),
(9, 1, 4, 'tutor', 'Foco', 'a:2:{s:11:"range_start";s:1:"1";s:9:"range_end";s:1:"5";}'),
(10, 1, 5, 'tutor', 'Ansioso?', 'a:5:{i:1;a:1:{s:4:"name";s:5:"Pouco";}i:2;a:1:{s:4:"name";s:8:"Moderado";}i:3;a:1:{s:4:"name";s:5:"Muito";}i:4;a:1:{s:4:"name";s:12:"Extravagante";}i:5;a:1:{s:4:"name";s:6:"MALUCO";}}'),
(11, 1, 1, 'tutor', 'Data da Apresentação', NULL),
(14, 1, 2, 'tutor', 'Horario da Aula', NULL),
(15, 1, 6, 'tutor', 'Nota', NULL),
(16, 1, 4, 'pais', 'Foco', 'a:2:{s:11:"range_start";s:1:"1";s:9:"range_end";s:1:"5";}'),
(17, 1, 5, 'pais', 'Entendimento', 'a:5:{i:1;a:1:{s:4:"name";s:4:"Ruim";}i:2;a:1:{s:4:"name";s:5:"Medio";}i:3;a:1:{s:4:"name";s:3:"Bom";}i:4;a:1:{s:4:"name";s:5:"Otimo";}i:5;a:1:{s:4:"name";s:9:"Excelente";}}');

-- --------------------------------------------------------

--
-- Table structure for table `student_lessons`
--

CREATE TABLE IF NOT EXISTS `student_lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `student_lessons`
--

INSERT INTO `student_lessons` (`id`, `student_id`, `name`, `created`, `modified`) VALUES
(1, 1, 'Matemática', '2014-11-08 22:50:58', '2014-11-08 22:50:58'),
(2, 1, 'Química', '2014-11-08 22:54:46', '2014-11-08 22:54:46'),
(3, 1, 'Biologia', '2014-11-08 22:56:25', '2014-11-08 22:56:25'),
(4, 1, 'Física', '2014-11-08 22:56:29', '2014-11-08 22:56:29'),
(5, 1, 'História', '2014-11-08 22:56:31', '2014-11-08 22:56:31'),
(6, 1, 'Português', '2014-11-08 22:56:36', '2014-11-08 22:56:36'),
(7, 1, 'Literatura', '2014-11-08 22:56:37', '2014-11-08 22:56:37'),
(8, 1, 'Geografia', '2014-11-08 22:56:43', '2014-11-08 22:56:43');

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
  `tutor_name` varchar(255) NOT NULL,
  `tutor_phone` varchar(255) NOT NULL,
  `tutor_email` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student_parents`
--

INSERT INTO `student_parents` (`id`, `student_id`, `mom_name`, `mom_phone`, `mom_email`, `mom_password`, `dad_name`, `dad_phone`, `dad_email`, `dad_password`, `tutor_name`, `tutor_phone`, `tutor_email`, `created`, `modified`) VALUES
(1, 1, 'Eliete', '21 35868415', 'luizhrqas@gmail.com', '$2a$10$DqhuRMmrSt5lPHPkvPKz3eW0YyId6zPinU9ghfnrMVFH/X3BPB6bm', 'Exemplo 4', '21 35868414', 'luizhrqas@gmail.com', NULL, 'Exemplo 6', '2135868142', 'luizhrqas6@gmail.com', '2014-11-08 22:42:56', '2014-11-11 02:13:53');

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
(1, 1, 'Exemplo 1', '21 35868411', 'luizhrqas1@gmail.com', '', '2014-11-08 22:42:56', '2014-11-11 02:13:53');

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
(1, 1, 'Exemplo 2', '21 35868412', 'luizhrqas2@gmail.com', NULL, 'Exemplo 3', '21 35868413', 'luizhrqas3@gmail.com', NULL, '2014-11-08 22:42:56', '2014-11-11 02:13:53');

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
(1, 'Luiz Henrique Almeida da Silva', '2014-11-08', 'Educandário', 'Abacate', 'Exemplo de descrição', '2014-11-08 22:42:56', '2014-11-11 02:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'ator', '$2a$10$5xtbNLRVwKKS/8AU3wUguO1q/gL3tQfOm2mifHZljs7P/s5.NJcSS', 'author', '2014-11-11 02:59:34', '2014-11-11 02:59:34'),
(2, 'luizhrqas_admin@gmail.com', '$2a$10$DqhuRMmrSt5lPHPkvPKz3eW0YyId6zPinU9ghfnrMVFH/X3BPB6bm', 'admin', '2014-11-11 02:59:53', '2014-11-11 02:59:53');
--
-- Database: `test`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
