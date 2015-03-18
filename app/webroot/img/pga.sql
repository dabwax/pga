-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2015 at 02:03 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

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
-- Table structure for table `charts`
--

CREATE TABLE IF NOT EXISTS `charts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` enum('bar','column','line','pie','donut','stacked_column') NOT NULL,
  `config` text NOT NULL,
  `student_id` int(11) NOT NULL,
  `base_color` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `charts`
--

INSERT INTO `charts` (`id`, `name`, `type`, `config`, `student_id`, `base_color`, `created`, `modified`) VALUES
(1, 'asasasas', 'bar', '', 1, '', '2015-02-26 16:31:34', '2015-03-04 09:28:41'),
(2, 'asas', 'bar', '', 1, '', '2015-03-11 12:11:52', '2015-03-11 12:15:16'),
(3, '', 'bar', '', 1, '', '2015-03-11 12:15:08', '2015-03-11 12:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `chart_student_inputs`
--

CREATE TABLE IF NOT EXISTS `chart_student_inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chart_id` int(11) NOT NULL,
  `student_input_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `chart_student_inputs`
--

INSERT INTO `chart_student_inputs` (`id`, `chart_id`, `student_input_id`) VALUES
(1, 2, 3);

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
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `views` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `student_id`, `name`, `content`, `views`, `created`, `modified`) VALUES
(1, 1, 'Exemplo de mensagem', 'Exemplo de conteudo', 0, '2014-11-19 00:00:00', '2014-11-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message_authors`
--

CREATE TABLE IF NOT EXISTS `message_authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `message_authors`
--

INSERT INTO `message_authors` (`id`, `message_id`, `model`, `prefix`, `foreign_key`) VALUES
(1, 1, 'StudentParent', 'mom_', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message_recipients`
--

CREATE TABLE IF NOT EXISTS `message_recipients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `recipient_1_model` varchar(255) DEFAULT NULL,
  `recipient_1_prefix` varchar(255) DEFAULT NULL,
  `recipient_1_foreign_key` int(11) DEFAULT NULL,
  `recipient_2_model` int(11) DEFAULT NULL,
  `recipient_2_prefix` int(11) DEFAULT NULL,
  `recipient_2_foreign_key` int(11) DEFAULT NULL,
  `recipient_3_model` int(11) DEFAULT NULL,
  `recipient_3_prefix` int(11) DEFAULT NULL,
  `recipient_3_foreign_key` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `message_recipients`
--

INSERT INTO `message_recipients` (`id`, `message_id`, `recipient_1_model`, `recipient_1_prefix`, `recipient_1_foreign_key`, `recipient_2_model`, `recipient_2_prefix`, `recipient_2_foreign_key`, `recipient_3_model`, `recipient_3_prefix`, `recipient_3_foreign_key`) VALUES
(1, 1, 'StudentParent', 'mom_', 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message_replies`
--

CREATE TABLE IF NOT EXISTS `message_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `message_replies`
--

INSERT INTO `message_replies` (`id`, `message_id`, `model`, `prefix`, `foreign_key`, `content`, `created`) VALUES
(1, 1, 'StudentParent', 'mom_', 1, 'Exemplo de comentário', '2014-11-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `school` varchar(255) NOT NULL,
  `clinical_condition` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `date_of_birth`, `school`, `clinical_condition`, `description`, `created`, `modified`) VALUES
(1, 'Luiz Henrique Almeida da Silva', '', '', '2016-07-02', 'Educandário', 'Abacate', '<p>Exemplo de descrição</p>', '2014-11-08 22:42:56', '2015-03-04 09:26:06'),
(2, 'Zé Maneiro', '', '', '2017-07-03', 'Da vida', 'Tranquilão', '<p>Maluco tranquilo, cria da área.</p>', '2015-03-04 20:13:02', '2015-03-10 20:21:00'),
(3, 'Zé Maneiro', '', '', '2017-07-03', 'Da vida', 'Tranquilão', '<p>Maluco tranquilo, cria da área.</p>', '2015-03-04 20:17:12', '2015-03-12 20:43:03'),
(4, 'asas', '', '', '1982-03-03', 'asas', 'asas', '<p>asas</p>', '2015-03-11 12:16:39', '2015-03-11 12:16:39');

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
  `observation` text,
  `attachment` varchar(255) DEFAULT NULL,
  `answer` text,
  `observations` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student_exercises`
--

INSERT INTO `student_exercises` (`id`, `student_id`, `date`, `due_to`, `student_lesson_id`, `enunciation`, `observation`, `attachment`, `answer`, `observations`) VALUES
(2, 2, '2015-03-18', '2015-03-17', 1, '<p>Se carlitos está com 10 policiais atras deles, mas não apresenta flagrante no bolso, por outro lado, estpa claramente doidão. Quantos ele consegue subornar com apenas, 30 merrecas no bolso?</p>', 'Se não fizer, o pau come. ', NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

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
(17, 1, 5, 'pais', 'Entendimento', 'a:5:{i:1;a:1:{s:4:"name";s:4:"Ruim";}i:2;a:1:{s:4:"name";s:5:"Medio";}i:3;a:1:{s:4:"name";s:3:"Bom";}i:4;a:1:{s:4:"name";s:5:"Otimo";}i:5;a:1:{s:4:"name";s:9:"Excelente";}}'),
(19, 1, 2, 'psico', 'gdxgdxgxgxg', NULL),
(20, 1, 1, 'psico', '123das', NULL),
(22, 1, 3, 'tutor', 'input de TUTOR AEAEAE caio boiolão', NULL),
(27, 3, 1, 'tutor', 'Data', NULL),
(28, 3, 2, 'tutor', 'Tempo de Imersão/Dispersão Aguda', NULL),
(30, 1, 2, 'tutor', 'Horário', NULL),
(31, 1, 2, 'tutor', 'TESTANDO', NULL),
(32, 1, 1, 'tutor', 'TESTANDO CALENDARIOO', NULL),
(35, 1, 1, 'pais', 'asasasa', NULL),
(36, 2, 1, 'tutor', 'Teste Calendário', NULL),
(37, 2, 2, 'tutor', 'Teste intervalo de tempo', NULL),
(38, 2, 3, 'tutor', 'Teste Texto', NULL),
(39, 2, 4, 'tutor', 'Teste Escala numérica', 'a:2:{s:11:"range_start";s:1:"1";s:9:"range_end";s:1:"5";}'),
(40, 2, 5, 'tutor', 'Teste Escala Texto', 'a:5:{i:1;a:1:{s:4:"name";s:6:"Beserk";}i:2;a:1:{s:4:"name";s:4:"Puto";}i:3;a:1:{s:4:"name";s:6:"Inerte";}i:4;a:1:{s:4:"name";s:9:"No brilho";}i:5;a:1:{s:4:"name";s:7:"Ecstasy";}}'),
(41, 2, 6, 'tutor', 'Teste Número', NULL),
(42, 2, 7, 'tutor', 'Teste Registro Privatvo', NULL),
(50, 2, 1, 'psico', 'Teste Calendário', NULL),
(51, 2, 2, 'psico', 'Teste intervalo de tempo', NULL),
(52, 2, 3, 'psico', 'Teste Texto', NULL),
(53, 2, 4, 'psico', 'Teste Escala numérica', 'a:2:{s:11:"range_start";s:1:"1";s:9:"range_end";s:1:"5";}'),
(54, 2, 5, 'psico', 'Teste Escala Texto', 'a:5:{i:1;a:1:{s:4:"name";s:6:"Beserk";}i:2;a:1:{s:4:"name";s:6:"Deprê";}i:3;a:1:{s:4:"name";s:6:"Inerte";}i:4;a:1:{s:4:"name";s:9:"No brilho";}i:5;a:1:{s:4:"name";s:7:"Ecstasy";}}'),
(55, 2, 6, 'psico', 'Teste Número', NULL),
(56, 2, 7, 'psico', 'Teste Registro Privatvo', NULL);

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
  `date` date NOT NULL,
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
(58, '2015-02-01', 1, 'pais', 16, NULL, '1'),
(59, '2015-02-02', 1, 'pais', 17, NULL, '1'),
(60, '2015-02-03', 1, 'tutor', NULL, 1, 'matemática!');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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
(8, 1, 'Geografia', '2014-11-08 22:56:43', '2014-11-08 22:56:43'),
(10, 2, 'Futebol', '2015-03-15 11:49:31', '2015-03-15 11:49:31'),
(11, 2, 'Malandragem', '2015-03-15 11:49:38', '2015-03-15 11:49:38'),
(12, 2, 'HomeGrown', '2015-03-15 11:53:46', '2015-03-15 11:53:46'),
(13, 2, '', '2015-03-15 11:53:48', '2015-03-15 11:53:48');

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
  `tutor_password` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student_parents`
--

INSERT INTO `student_parents` (`id`, `student_id`, `mom_name`, `mom_phone`, `mom_email`, `mom_password`, `dad_name`, `dad_phone`, `dad_email`, `dad_password`, `tutor_name`, `tutor_phone`, `tutor_email`, `tutor_password`, `created`, `modified`) VALUES
(1, 1, 'Eliete', '21 35868415', 'luizhrqas@gmail.com', '$2a$10$DqhuRMmrSt5lPHPkvPKz3eW0YyId6zPinU9ghfnrMVFH/X3BPB6bm', 'Exemplo 4', '21 35868414', 'luizhrqas@gmail.com', '$2a$10$Cd6m/fpmWDQhR6GkYNm1geW5ZBaTVo5LcPj/.pF9YxIXtb/Bx36Gi', 'Exemplo 6', '2135868142', 'luizhrqas6@gmail.com', '$2a$10$FD2m5pQH5v3CN5.EBsOyJOUuWwNZAcz.WvmQCx5PPUXJb8nFUFOBe', '2014-11-08 22:42:56', '2015-03-04 09:26:06'),
(2, 2, '', '', '', NULL, '', '', '', NULL, '', '', '', '', '2015-03-04 20:13:02', '2015-03-10 20:21:00'),
(3, 3, 'Biroleibe', '9675644', 'plimbgd@gjhnm.com', NULL, 'Falensi', '655433221', '12sad@sçkjd.com', NULL, 'Tchung', '085765765', 'DKJHkjd@gdnsdd.com', '', '2015-03-04 20:17:12', '2015-03-12 20:43:03'),
(4, 4, 'asasasasasasasa', 'qwqwqwq', 'asasa4@gmail.com', NULL, 'asasaqwqwqw', 'qqwqwqw', 'asasa1@gmail.com', NULL, 'qwqwqwq', 'qwqwqwq', 'asasa1@gmail.com', '', '2015-03-11 12:16:39', '2015-03-11 12:16:39');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student_psychiatrists`
--

INSERT INTO `student_psychiatrists` (`id`, `student_id`, `name`, `phone`, `email`, `password`, `created`, `modified`) VALUES
(1, 1, 'Exemplo 1', '21 35868411', 'luizhrqas1@gmail.com', '', '2014-11-08 22:42:56', '2015-03-04 09:26:06'),
(2, 2, 'Marcia', '22222222', '', '', '2015-03-04 20:13:02', '2015-03-10 20:21:00'),
(3, 3, 'Marcia', '22222222', 'jjjjjjj@jjjjj.com', '', '2015-03-04 20:17:12', '2015-03-12 20:43:03'),
(4, 4, 'asasasasas', 'asasa', 'asas6a@gmail.com', '', '2015-03-11 12:16:39', '2015-03-11 12:16:39');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student_schools`
--

INSERT INTO `student_schools` (`id`, `student_id`, `mediator_name`, `mediator_phone`, `mediator_email`, `mediator_password`, `coordinator_name`, `coordinator_phone`, `coordinator_email`, `coordinator_password`, `created`, `modified`) VALUES
(1, 1, 'Exemplo 2', '21 35868412', 'luizhrqas2@gmail.com', NULL, 'Exemplo 3', '21 35868413', 'luizhrqas3@gmail.com', NULL, '2014-11-08 22:42:56', '2015-03-04 09:26:06'),
(2, 2, 'Jun', '22222233', '', NULL, '', '', '', NULL, '2015-03-04 20:13:02', '2015-03-10 20:21:00'),
(3, 3, 'Jun', '22222233', 'jjjjjy@jjjy.com', NULL, 'finnerty', '23456778', 'ggg@ff.com', NULL, '2015-03-04 20:17:12', '2015-03-12 20:43:03'),
(4, 4, 'asasa', 'asasa', 'asasa@gmail.com', NULL, 'asasasasasas', 'qwqwqw', 'asasa3@gmail.com', NULL, '2015-03-11 12:16:39', '2015-03-11 12:16:39');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'ator', '$2a$10$5xtbNLRVwKKS/8AU3wUguO1q/gL3tQfOm2mifHZljs7P/s5.NJcSS', 'actor', '2014-11-11 02:59:34', '2014-11-11 02:59:34'),
(2, 'luizhrqas_admin@gmail.com', '$2a$10$DqhuRMmrSt5lPHPkvPKz3eW0YyId6zPinU9ghfnrMVFH/X3BPB6bm', 'admin', '2014-11-11 02:59:53', '2014-11-11 02:59:53'),
(3, 'pedro@redepga.com.br', '', 'admin', '2014-11-11 02:59:53', '2014-11-11 02:59:53');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
