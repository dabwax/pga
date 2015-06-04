-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 04/06/2015 às 12:22
-- Versão do servidor: 5.5.40-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `pga`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `charts`
--

CREATE TABLE IF NOT EXISTS `charts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sub_type` varchar(255) DEFAULT NULL,
  `config` text NOT NULL,
  `student_id` int(11) NOT NULL,
  `input_id` int(11) NOT NULL,
  `base_color` varchar(255) NOT NULL,
  `columns` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `display_mode` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Fazendo dump de dados para tabela `charts`
--

INSERT INTO `charts` (`id`, `name`, `type`, `sub_type`, `config`, `student_id`, `input_id`, `base_color`, `columns`, `order`, `height`, `display_mode`, `created`, `modified`) VALUES
(15, 'Barra - Escala Numérica', 'bar', '', '', 1, 4, '', 6, 0, 300, NULL, '2015-05-21 03:39:26', '2015-05-21 06:05:24'),
(16, 'Barra - Escala Texto', 'bar', '', '', 1, 5, '', 6, 0, 300, NULL, '2015-05-21 04:47:06', '2015-05-21 06:05:44'),
(17, 'Barra - Registro Textual', 'bar', '', '', 1, 3, '', 6, 0, 300, NULL, '2015-05-21 05:09:34', '2015-05-21 06:05:53'),
(18, 'Barra - Calendário', 'bar', '', '', 1, 1, '', 6, 0, 300, NULL, '2015-05-21 05:17:57', '2015-05-21 06:06:01'),
(19, 'Barra - Numérico', 'bar', NULL, '', 1, 6, '', 6, 0, 300, NULL, '2015-05-21 06:06:21', '2015-05-21 06:06:21'),
(20, 'Barra - Intervalo de Tempo', 'bar', NULL, '', 1, 2, '', 6, 0, 300, NULL, '2015-05-21 06:07:30', '2015-05-21 06:07:30'),
(21, 'Coluna - Escala Numérica', 'column', NULL, '', 1, 4, '', 6, 0, 300, NULL, '2015-05-21 06:16:44', '2015-05-21 06:16:44'),
(22, 'Coluna - Escala Texto', 'column', NULL, '', 1, 5, '', 6, 0, 300, NULL, '2015-05-21 06:32:09', '2015-05-21 06:32:09'),
(23, 'Coluna - Registro Textual', 'column', NULL, '', 1, 3, '', 6, 0, 300, NULL, '2015-05-21 06:33:49', '2015-05-21 06:33:49'),
(24, 'Coluna - Calendário', 'column', NULL, '', 1, 1, '', 6, 0, 300, NULL, '2015-05-21 06:34:21', '2015-05-21 06:34:21'),
(25, 'Coluna - Numérico', 'column', NULL, '', 1, 6, '', 6, 0, 300, NULL, '2015-05-21 06:35:44', '2015-05-21 06:35:44'),
(26, 'Coluna - Intervalo de Tempo', 'column', NULL, '', 1, 2, '', 6, 0, 300, NULL, '2015-05-21 06:36:23', '2015-05-21 06:36:23'),
(28, 'Linha - Escala Numérica', 'line', NULL, '', 1, 4, '', 6, 0, 300, 'mes_a_mes', '2015-05-21 12:42:48', '2015-05-21 12:42:48'),
(30, 'Linha - Numérico', 'line', NULL, '', 1, 6, '', 6, 0, 300, 'mes_a_mes', '2015-05-21 14:08:48', '2015-05-21 14:08:48'),
(31, 'Pizza - Escala Numérica', 'pie', NULL, '', 1, 4, '', 6, 0, 300, NULL, '2015-05-21 14:09:49', '2015-05-21 14:09:49'),
(33, 'Pizza - Escala Texto', 'pie', NULL, '', 1, 5, '', 6, 0, 300, NULL, '2015-05-22 01:35:15', '2015-05-22 01:35:15'),
(38, '', 'line', NULL, '', 5, 4, '', 3, 0, 300, 'mes_a_mes', '2015-05-28 07:57:16', '2015-05-28 07:57:16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `chart_student_inputs`
--

CREATE TABLE IF NOT EXISTS `chart_student_inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chart_id` int(11) NOT NULL,
  `student_input_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Fazendo dump de dados para tabela `chart_student_inputs`
--

INSERT INTO `chart_student_inputs` (`id`, `chart_id`, `student_input_id`) VALUES
(1, 1, 74),
(3, 6, 62),
(4, 6, 63),
(5, 6, 64),
(6, 7, 62),
(7, 7, 63),
(8, 7, 64),
(9, 5, 65),
(10, 8, 65),
(11, 9, 65),
(12, 10, 63),
(13, 11, 63),
(17, 2, 74),
(18, 14, 80),
(19, 15, 9),
(20, 15, 75),
(21, 16, 80),
(22, 17, 3),
(23, 18, 11),
(24, 19, 15),
(25, 20, 14),
(26, 21, 9),
(27, 21, 75),
(28, 22, 80),
(29, 23, 3),
(30, 24, 11),
(31, 25, 15),
(32, 25, 74),
(33, 26, 14),
(34, 27, 9),
(35, 28, 9),
(36, 29, 3),
(37, 28, 75),
(38, 30, 15),
(39, 30, 74),
(40, 31, 9),
(41, 32, 80),
(42, 33, 80),
(43, 34, 62),
(44, 34, 63),
(45, 34, 64),
(46, 35, 62),
(47, 35, 63),
(48, 35, 64),
(49, 36, 62),
(50, 36, 62),
(51, 38, 62);

-- --------------------------------------------------------

--
-- Estrutura para tabela `feeds`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Fazendo dump de dados para tabela `feeds`
--

INSERT INTO `feeds` (`id`, `student_id`, `author`, `date`, `content`, `sidebar`, `created`, `modified`) VALUES
(2, 1, '', '2015-04-20', 'a:5:{i:0;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"75";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:1:"4";}i:1;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"35";s:5:"value";s:10:"20/04/2015";s:22:"student_input_value_id";s:1:"5";}i:2;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"74";s:4:"type";s:8:"numerico";s:5:"value";s:4:"1231";s:22:"student_input_value_id";s:1:"6";}i:3;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"76";s:4:"type";s:5:"texto";s:5:"value";s:20:"<p>weqwrwqreewqe</p>";s:22:"student_input_value_id";s:1:"7";}i:10;a:13:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:17:"student_lesson_id";s:2:"14";s:5:"value";s:15:"<p>tetetete</p>";s:6:"nota_1";s:3:"123";s:6:"nota_2";s:3:"666";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:1:"8";}}', '', '2015-04-20 16:58:30', '2015-04-20 16:58:30'),
(3, 1, '', '2015-04-20', 'a:5:{i:0;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"75";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:1:"9";}i:1;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"35";s:5:"value";s:10:"20/04/2015";s:22:"student_input_value_id";s:2:"10";}i:2;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"74";s:4:"type";s:8:"numerico";s:5:"value";s:6:"122343";s:22:"student_input_value_id";s:2:"11";}i:3;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"76";s:4:"type";s:5:"texto";s:5:"value";s:28:"<p>asfsafsfasfasf #teste</p>";s:22:"student_input_value_id";s:2:"12";}i:10;a:13:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:17:"student_lesson_id";s:2:"14";s:5:"value";s:19:"<p>sfsadfasfsfs</p>";s:6:"nota_1";s:1:"1";s:6:"nota_2";s:1:"2";s:6:"nota_3";s:1:"3";s:6:"nota_4";s:1:"4";s:6:"nota_5";s:1:"5";s:6:"nota_6";s:1:"6";s:6:"nota_7";s:1:"7";s:6:"nota_8";s:1:"8";s:22:"student_input_value_id";s:2:"13";}}', '', '2015-04-20 17:02:58', '2015-04-20 17:02:58'),
(5, 1, '', '2015-04-20', 'a:3:{i:0;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"75";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:1:"1";}i:1;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"35";s:5:"value";s:10:"20/04/2015";s:22:"student_input_value_id";s:1:"2";}i:2;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"74";s:4:"type";s:8:"numerico";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:1:"3";}}', '', '2015-04-20 17:56:06', '2015-04-20 17:56:06'),
(6, 1, '', '2015-04-21', 'a:3:{i:0;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"75";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:1:"4";}i:1;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"35";s:5:"value";s:10:"20/04/2015";s:22:"student_input_value_id";s:1:"5";}i:2;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"74";s:4:"type";s:8:"numerico";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:1:"6";}}', '', '2015-04-20 17:56:12', '2015-04-20 17:56:12'),
(8, 5, '', '2014-09-25', 'a:7:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:2:"11";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:770:"<p>- João muito depressivo quando cheguei. Chorando, fagilizado, "reclamou" que a Karina saiu mais cedo, solidão, medo de perdê-la.</p><p>-Irritou-se, quando percebeu ser tarefa longa.</p><p>-Melhorando humor ao longo da aula</p><p>-Muito disperso. Arranjando motivos pra dispersar (Cupim voando, coçando Nariz até espirrar...). Com isso a aula está se tornando lenta</p><p>-Confundindo o NOX com o número dos átomos nas moléculas</p><p>-Postura preguiçosa de "chutar" ao invés de fazer a montagem do sal</p><p>-Reclamando muito de tudo: azia, alergia, desatenção (recama mas ta muito descompromissado. Quer sair o tepo todo)</p><p>-Muito baixa autonomia no balanceamento. Muita raiva, nao não consegue nem lembrar qual elemento está sendo balanceado.</p>";s:22:"student_input_value_id";s:2:"12";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:8:"Irritado";s:22:"student_input_value_id";s:2:"13";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"3";s:22:"student_input_value_id";s:2:"14";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"2";s:22:"student_input_value_id";s:2:"15";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"2";s:22:"student_input_value_id";s:2:"16";}i:11;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"16";s:5:"value";s:55:"<p>Ficha sobre sais e equação de neutralização.</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:2:"17";}}', '', '2015-04-22 08:38:41', '2015-04-22 08:38:41'),
(10, 1, '', '2015-03-03', 'a:7:{i:0;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"75";s:5:"value";s:1:"3";s:22:"student_input_value_id";s:2:"23";}i:1;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"35";s:5:"value";s:10:"22/04/2015";s:22:"student_input_value_id";s:2:"24";}i:2;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"74";s:4:"type";s:8:"numerico";s:5:"value";s:3:"222";s:22:"student_input_value_id";s:2:"25";}i:3;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"76";s:4:"type";s:5:"texto";s:5:"value";s:17:"<p>2323wewewe</p>";s:22:"student_input_value_id";s:2:"26";}i:5;a:13:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:17:"student_lesson_id";s:1:"3";s:5:"value";s:20:"<p>asasasasasaas</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:2:"27";}i:7;a:13:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:17:"student_lesson_id";s:1:"5";s:5:"value";s:15:"<p>asasasas</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:2:"28";}i:9;a:13:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:17:"student_lesson_id";s:1:"7";s:5:"value";s:17:"<p>asasasasas</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:2:"29";}}', '', '2015-04-22 09:04:57', '2015-04-22 09:04:57'),
(13, 1, '', '2015-02-01', 'a:6:{i:0;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"75";s:5:"value";s:1:"3";s:22:"student_input_value_id";s:2:"38";}i:1;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"35";s:5:"value";s:10:"02/02/2015";s:22:"student_input_value_id";s:2:"39";}i:2;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"74";s:4:"type";s:8:"numerico";s:5:"value";s:4:"2222";s:22:"student_input_value_id";s:2:"40";}i:3;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"76";s:4:"type";s:5:"texto";s:5:"value";s:18:"<p>2211dsaddsd</p>";s:22:"student_input_value_id";s:2:"41";}i:4;a:13:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:17:"student_lesson_id";s:1:"2";s:5:"value";s:14:"<p>asaasas</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:2:"42";}i:6;a:13:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:17:"student_lesson_id";s:1:"4";s:5:"value";s:14:"<p>asasaas</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:2:"43";}}', '', '2015-04-22 09:35:35', '2015-04-22 09:35:35'),
(14, 1, '', '2015-04-05', 'a:4:{i:0;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"75";s:5:"value";s:1:"2";s:22:"student_input_value_id";s:2:"53";}i:1;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"35";s:5:"value";s:10:"22/04/2015";s:22:"student_input_value_id";s:2:"54";}i:2;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"74";s:4:"type";s:8:"numerico";s:5:"value";s:4:"2222";s:22:"student_input_value_id";s:2:"55";}i:3;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"76";s:4:"type";s:5:"texto";s:5:"value";s:20:"<p>2222211111111</p>";s:22:"student_input_value_id";s:2:"56";}}', '', '2015-04-22 12:59:14', '2015-04-22 12:59:14'),
(15, 5, '', '2015-04-22', 'a:9:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:2:"57";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:744:"<p>-João muito depressivo quando cheguei, chorando, fragilizado, reclamou que a Karina saiu mais cedo, solidão, medo de perdê-la</p><p>-Irritou-se quando percebeu ser tarefa longa.</p><p>-Melhorando de humor ao longo da aula</p><p>-Muito disperso, arranjando motivos para se dispersar (cupim voando, coçando o nariz até espirrar). Com isso a aula se torna lenta.</p><p>-Postura preguiçosa de chutar ao invés de fazer a montagem do sal.</p><p>- Reclamando muito de tudo: azia, alergia, desatenção.</p><p>-Reclama mas tá descompromissado: quer sair o tempo todo.</p><p>-Extremamente raivoso. Não consegue nem lembrar qual elemento está balanceando.Se eu não falo o que fazer, não sai do lugar.</p><p>#rinite #abandono</p><p><br></p>";s:22:"student_input_value_id";s:2:"58";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:1:"4";s:22:"student_input_value_id";s:2:"59";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"3";s:22:"student_input_value_id";s:2:"60";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:8:"Irritado";s:22:"student_input_value_id";s:2:"61";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"3";s:22:"student_input_value_id";s:2:"62";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"2";s:22:"student_input_value_id";s:2:"63";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"2";s:22:"student_input_value_id";s:2:"64";}i:11;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"16";s:5:"value";s:216:"<p>Exercícios química - pg 167, exercícios 38,39,40,41</p><p>Reações de neutralização e sais.</p><p>-Muito pouca autonomia no balanceamento.</p><p>-Confundindo o NOX com o número de átomos nas moléculas</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:2:"65";}}', '', '2015-04-22 13:07:36', '2015-04-22 13:07:36'),
(16, 5, '', '2014-09-30', 'a:10:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:2:"66";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:737:"<p>-Muito preocupado com a nota perdida no teste relâmpago (reclamou por ter perdido a oportunidade de se recuperar e ficou absorto).</p><p>-Alguns sorrisos imotivados.</p><p>-Independência melhorou, assim como a atenção</p><p>- Bom humor, fazendo piadas, perguntas pertinentes e dando a resposta para próprias perguntas.</p><p>-A absorção parava quando percebia que eu tava olhando ("Oque?" "É que eu tava pensando no cálculo")<br></p><p>-A autonomia e independência estão boas mas a dispersão não (Pode isso?)</p><p>- Dispersão dele parece não ser por nada, mas um foco em alguma outra coisa. Não parece estar afetando o humor ou confiança, quando volta da dispersão.</p><p>-Poucos retoques</p><p>#dispersãoaguda</p>";s:22:"student_input_value_id";s:2:"67";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:2:"68";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:2:"69";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:12:"Bem humorado";s:22:"student_input_value_id";s:2:"70";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"3";s:22:"student_input_value_id";s:2:"71";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:2:"72";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:2:"73";}i:8;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"70";s:4:"type";s:8:"numerico";s:5:"value";s:2:"90";s:22:"student_input_value_id";s:2:"74";}i:10;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"15";s:5:"value";s:438:"<p>Exercícios de Matemática pg 186 (81,82, 84, 86,87, 88, 89)</p><p>Exercícios de </p><p>-Dificuldade em entender PG. Confundindo com PA.</p><p>- Pareceu perdido na primeiro, sems aber o que fazer, mas fez sozinho a letra b</p><p>-Questão 84: Protocolos sequênciais - Báskara + Termo geral da PG. Foi praticamente descoberto por ele.</p><p>-Resolveu praticamente sozinho a 86a. Novo tipo de protocolo- Variação de um protocolo</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:2:"75";}}', '', '2015-04-22 13:38:32', '2015-04-22 13:38:32'),
(17, 5, '', '2014-10-07', 'a:10:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:2:"76";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:232:"<p>-Sobre o ex 55: Uma amiga me ensinou. É apenas uma colega. Colegas tambem marcam nossas vidas</p><p>-Atenção começou boa mas deu uma caída. Peguei ele perdido, com um risinho. O humor continua bom e o engajamento também</p>";s:22:"student_input_value_id";s:2:"77";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:2:"78";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"4";s:22:"student_input_value_id";s:2:"79";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:12:"Bem humorado";s:22:"student_input_value_id";s:2:"80";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:2:"81";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:2:"82";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:2:"83";}i:8;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"70";s:4:"type";s:8:"numerico";s:5:"value";s:2:"29";s:22:"student_input_value_id";s:2:"84";}i:11;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"16";s:5:"value";s:211:"<p>Livro pg 171 (55,56,57) Adicionais: 58, 59</p><p>-Boa independência no exercício 55</p><p>- Parece estar entendendo melhor reações de neutralizações mas tem muitos conceitos ainda abstratos na base.</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:2:"85";}}', '', '2015-04-22 13:58:57', '2015-04-22 13:58:57'),
(18, 5, '', '2014-10-08', 'a:11:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:2:"86";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:625:"<p>-Está nevoso, atenção ruim, reclamando da prova de matemática</p><p>-Muito disperso. Só ta andando com meus comandos. Muito raivoso.</p><p>-Me perguntando se ele tem motivo para se preocupar. Esperando que eu dê alívio a ele. "Não sou eu quem decide, é você. Já tem condições de saber o que e acho. </p><p>-Não fez o exercício que deixei pra ele no dia 05. Me recusei a fazer com ele</p><p>-Parece que espera que eu faça todas as partes do exercicio.</p><p>-Inisnuou que eu fizesse uma conta na calculadora (pode ser que, mesmo na incapacidade, ele queira avançar a qualquer custo)</p><p>#deverpracasa</p>";s:22:"student_input_value_id";s:2:"87";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:1:"9";s:22:"student_input_value_id";s:2:"88";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"3";s:22:"student_input_value_id";s:2:"89";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:12:"Mal humorado";s:22:"student_input_value_id";s:2:"90";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"3";s:22:"student_input_value_id";s:2:"91";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"3";s:22:"student_input_value_id";s:2:"92";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"4";s:22:"student_input_value_id";s:2:"93";}i:8;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"70";s:4:"type";s:8:"numerico";s:5:"value";s:2:"40";s:22:"student_input_value_id";s:2:"94";}i:10;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"15";s:5:"value";s:75:"<p>Livro pg 189. Exercícios do 109 a 117</p><p>fez 109 (a,b) e 110 (a)</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:2:"95";}i:11;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"16";s:5:"value";s:227:"<p>-Último exercício de química de ontem: pag 171 ex: 8 </p><p>Chegou a resposta da letra b com meus comandos, apenas. Mas tinha esquecido a forma de calcular o NOX, até.</p><p>-Demorou quase uma hora pra fazer (50 min)</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:2:"96";}}', '', '2015-04-22 14:22:32', '2015-04-22 14:22:32'),
(19, 5, '', '2014-10-09', 'a:7:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:2:"97";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:856:"<p>-Muito disperso, mas querendo conversar.</p><p>- Escolhi não deixar ele se dispersar hoje e sempre trazê-lo para a questão.</p><p>- Pareceu estar muito ocupado com pensamentos invasivos, a aula todo (desde o dia anterior). Sua dispersão pareceu focada em outra coisa. Olho arregalado e olhar direcionado. Perguntei. Disse que só estava distraído (crível, não pareceu estar escondendo nada deliberadamente)<br></p><p>- Aconteceu alguma coisa com ele hoje e ele quis contar. Cortei a conversa... </p><p>*<strong>Pergunta minha</strong>: Hiperfoco (representado por essa fixação no pensamento) o faz perder o contexto geral o tempo todo, obrigando-o a reassociar as idéias e resgatar o contexto o tempo todo? Isso o faz tomar escolhas erradas, tentando preencher as lacunas totalmente fora de contexto?</p><p>#dispersãofocada #perguntaminha</p>";s:22:"student_input_value_id";s:2:"98";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:6:"Normal";s:22:"student_input_value_id";s:2:"99";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"100";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"101";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"102";}i:11;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"16";s:5:"value";s:299:"<p>Estudos para o teste de química na segunda feira.</p><p>-Tentou montar o ácido sulfúrico a partir de hidrácido (HS). Perguntei o porque. Depois de uma resposta evasiva, ele rapidamente se lembrou do fato de não ter terminação "ídrico" (boa reuperação da linha de raciocinio)</p><p>-</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"103";}}', '', '2015-04-25 16:47:53', '2015-04-25 16:47:53'),
(20, 5, '', '2014-10-14', 'a:11:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"104";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:302:"<p>-Parece bem, disposto e atento, apesar do dia obsessivo, como relatado pela Karina (mediadora)</p><p>- Tentou conversar sobre o trabalho de literatura e o "barulho que o lapis dele faz" e que "deveria usar lapiseira."</p><p>- Depois de uma hora de aula com atenção, passou a se absorver mais. </p>";s:22:"student_input_value_id";s:3:"105";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:1:"8";s:22:"student_input_value_id";s:3:"106";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"4";s:22:"student_input_value_id";s:3:"107";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:6:"Normal";s:22:"student_input_value_id";s:3:"108";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"109";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"110";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"111";}i:8;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"70";s:4:"type";s:8:"numerico";s:5:"value";s:2:"60";s:22:"student_input_value_id";s:3:"112";}i:10;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"15";s:5:"value";s:519:"<p>Livro, Página 191. Exercicios 118, 119,120. </p><p>Materia: Soma de limites.</p><p>-O protocolo pareceu aprendido mas esbarrou muito na algebra.</p><p>-O dever iria até a 124 mas se cegassemos a uma hora de aula, devidimos que iriamos passar para o dever de física, devido a prova na segunda feira.</p><p>*Demorou 1h e 15 para fazer os 3 deveres faceis. Começou muito bem, mas terminou ralentando.</p><p>**Dificuldade em multiplicação de fração. Sempre tantou igualar as bases </p><p>#dificuldadealgebra </p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"113";}i:12;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"17";s:5:"value";s:131:"<p>Ficha 12 </p><p>Exercício sobre Deformação da mola e cálculo da constate elástica ("Esse exercício é fácil, sabia"?)</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"114";}}', '', '2015-04-25 17:15:39', '2015-04-25 17:15:39'),
(21, 5, '', '2014-10-16', 'a:10:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"115";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:343:"<p>- Bom humor, contando histórias do dia (Dodgeball/queimado)</p><p>-Em determinado momento, reclamou da atenção, dei um corte nele e ele olhou espantado. Seguiu atento.</p><p>- Parece que sua desatenção seja uma maneira era um "escape", diante da dificuldae da matéria (começou sabendo muito pouco)</p><p>#primeirocontatoconteúdo</p>";s:22:"student_input_value_id";s:3:"116";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:2:"10";s:22:"student_input_value_id";s:3:"117";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"3";s:22:"student_input_value_id";s:3:"118";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:12:"Bem humorado";s:22:"student_input_value_id";s:3:"119";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"120";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"121";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"122";}i:8;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"70";s:4:"type";s:8:"numerico";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:3:"123";}i:13;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"18";s:5:"value";s:388:"<p>Exercícios da ficha de Biologia molecular (tradução de códons)</p><p>-Pareceu não ter tido nenhum contato com a matéria, anteriormente. Tive que dar uma longa introdução (20 minutos). Acompanou com certa dificuldade.</p><p>- Fez sozinhos a tradução de códons de RNA</p><p>- Foi feito, apenas, as questões 1 e 13 mas foi um grande avanço no entendimento dessa matéria.</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"124";}}', '', '2015-04-25 17:28:51', '2015-04-25 17:28:51'),
(22, 5, '', '2014-10-18', 'a:9:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"11:00 a 14:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"11";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"14";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"125";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:410:"<p>-Bastante lento e desatento. Atenção comprometida. Encadeamento das ideias afetando até a fala, que está lenta e truncada.</p><p>-Atenção melhorou um pouco e ele parece estar acompanhando a narrativa do exercício (Não se perdeu, após cacular Px, lembrou que estava fazendo para calcular Fel)</p><p>- começou a suspirar, se entregas a absorção e não demonstrar engajamento</p><p>#oscilação</p>";s:22:"student_input_value_id";s:3:"126";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:1:"4";s:22:"student_input_value_id";s:3:"127";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"4";s:22:"student_input_value_id";s:3:"128";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:6:"Normal";s:22:"student_input_value_id";s:3:"129";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"130";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"131";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"132";}i:12;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"17";s:5:"value";s:299:"<p>Recomeçamos a ficha 12 (1,2,4,5), do final do dia 14, e a 13. </p><p>- No calculo d Px, percebeu que massa era diferente de peso e calculou o mesmo. (Claro, sempre perguntando)</p><p>-Muito tempo na questão 4. </p><p>- Começou a acompanhar a questão 5, de energia, e está fazendo sozinho</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"133";}}', '', '2015-05-06 10:55:10', '2015-05-06 10:55:10'),
(23, 5, '', '2014-10-19', 'a:7:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"11:00 a 15:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"11";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"15";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"134";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:289:"<p>-Está atento, engajado mas começamos com uma questão difícil que o está deixando ansioso. Independencia baixa desde o início. Quase uma hora pra fazer o exercício (bastante Guiado)</p><p>-Travou ao fazer a soma da área</p><p>-Não estou deixando ele ficar absorto</p><p><br></p>";s:22:"student_input_value_id";s:3:"135";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:6:"Normal";s:22:"student_input_value_id";s:3:"136";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"4";s:22:"student_input_value_id";s:3:"137";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"4";s:22:"student_input_value_id";s:3:"138";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"4";s:22:"student_input_value_id";s:3:"139";}i:12;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"17";s:5:"value";s:36:"<p>Ficha 13- estudando pra prova</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"140";}}', '', '2015-05-06 11:00:57', '2015-05-06 11:00:57'),
(24, 5, '', '2014-10-20', 'a:8:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"141";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:712:"<p>-Começou muito nervoso e derrotado (parou um teste no meio). Mudou de postura após uma conversa em que disse que ele tinha que ser a ultima pessoa a se colocar pra baixo, que esse é um ano duro, de autoconhecimento e que ele tinha que se aceitar e que vale tanto quanto os outros.</p><p>-Passou a demonstrar engajamento e a atenção e independencia melhoraram</p><p>- Piorou depois que entrou uma mensagem no facebook e teve contato com seu objeto de obsessão. Briguei muito com ele e desliguei o computador.  Voltou a melhorar mas com algumas absorções. </p><p>-Ao final, demonstrou maior autonomia durante a leitura e marcação do texto de história. melhorou o humor e se tornou mais confiante.</p>";s:22:"student_input_value_id";s:3:"142";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:12:"Mal humorado";s:22:"student_input_value_id";s:3:"143";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"144";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"145";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"4";s:22:"student_input_value_id";s:3:"146";}i:13;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"18";s:5:"value";s:306:"<p>Estudando para o teste de biologia em que teve que parar no meio.</p><p>- Efeito do oxigênio na absorção do nitrogênio/ Que moléculas são produzidas com o nitrogênio/ Que forma de nitrogênio são produzidas pela planta/ Que enzima produz o RNA-m e expliquei a função do STOP e START codon.</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"147";}i:14;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"20";s:5:"value";s:37:"<p>Leitura e marcação de texto.</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"148";}}', '', '2015-05-06 11:14:24', '2015-05-06 11:14:24'),
(28, 1, '', '2015-02-09', 'a:3:{i:0;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"75";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:3:"192";}i:1;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"35";s:5:"value";s:10:"09/05/2015";s:22:"student_input_value_id";s:3:"193";}i:2;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:4:"pais";s:16:"student_input_id";s:2:"74";s:4:"type";s:8:"numerico";s:5:"value";s:3:"666";s:22:"student_input_value_id";s:3:"194";}}', '', '2015-05-09 19:33:17', '2015-05-09 19:33:17'),
(29, 1, '', '2015-05-20', 'a:8:{i:0;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:1:"3";s:4:"type";s:5:"texto";s:5:"value";s:21:"<p>testestssetsts</p>";s:22:"student_input_value_id";s:3:"195";}i:1;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:1:"9";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"196";}i:2;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"11";s:5:"value";s:10:"20/05/2015";s:22:"student_input_value_id";s:3:"197";}i:4;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"15";s:4:"type";s:8:"numerico";s:5:"value";s:4:"1242";s:22:"student_input_value_id";s:3:"198";}i:5;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"22";s:4:"type";s:5:"texto";s:5:"value";s:16:"<p>fasdfasfs</p>";s:22:"student_input_value_id";s:3:"199";}i:8;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"32";s:5:"value";s:10:"20/05/2015";s:22:"student_input_value_id";s:3:"200";}i:9;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"73";s:4:"type";s:8:"numerico";s:5:"value";s:4:"2424";s:22:"student_input_value_id";s:3:"201";}i:10;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"80";s:5:"value";s:6:"Alegre";s:22:"student_input_value_id";s:3:"202";}}', '', '2015-05-20 02:54:27', '2015-05-20 02:54:27'),
(30, 1, '', '2015-05-19', 'a:8:{i:0;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:1:"3";s:4:"type";s:5:"texto";s:5:"value";s:14:"<p>safadsf</p>";s:22:"student_input_value_id";s:3:"203";}i:1;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:1:"9";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"204";}i:2;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"11";s:5:"value";s:10:"20/05/2015";s:22:"student_input_value_id";s:3:"205";}i:4;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"15";s:4:"type";s:8:"numerico";s:5:"value";s:4:"4213";s:22:"student_input_value_id";s:3:"206";}i:5;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"22";s:4:"type";s:5:"texto";s:5:"value";s:13:"<p>fsaf12</p>";s:22:"student_input_value_id";s:3:"207";}i:8;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"32";s:5:"value";s:10:"20/05/2015";s:22:"student_input_value_id";s:3:"208";}i:9;a:6:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"73";s:4:"type";s:8:"numerico";s:5:"value";s:4:"2423";s:22:"student_input_value_id";s:3:"209";}i:10;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"80";s:5:"value";s:6:"Triste";s:22:"student_input_value_id";s:3:"210";}}', '', '2015-05-20 02:54:47', '2015-05-20 02:54:47'),
(31, 1, '', '2015-05-21', 'a:4:{i:1;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:1:"9";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:3:"211";}i:2;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"11";s:5:"value";s:10:"21/05/2015";s:22:"student_input_value_id";s:3:"212";}i:8;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"32";s:5:"value";s:10:"21/05/2015";s:22:"student_input_value_id";s:3:"213";}i:10;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"80";s:5:"value";s:5:"Feliz";s:22:"student_input_value_id";s:3:"214";}}', '', '2015-05-21 05:19:23', '2015-05-21 05:19:23'),
(32, 1, '', '2015-04-21', 'a:4:{i:1;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:1:"9";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:3:"215";}i:2;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"11";s:5:"value";s:10:"21/04/2015";s:22:"student_input_value_id";s:3:"216";}i:8;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"32";s:5:"value";s:10:"21/05/2015";s:22:"student_input_value_id";s:3:"217";}i:10;a:5:{s:10:"student_id";s:1:"1";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"80";s:5:"value";s:5:"Feliz";s:22:"student_input_value_id";s:3:"218";}}', '', '2015-05-21 05:45:50', '2015-05-21 05:45:50'),
(34, 5, '', '2014-10-22', 'a:9:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"228";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:270:"<p>-Comecei deixando ele fazer sozinho. Quando percebeu, passou a mão na testa e falou que tá muito nervoso. Dei um corte e mandei continuar, o que ele fez.</p><p>-Apesar de estar um pouco apático, não está se disraindo muito e demonstra engajamento.</p><p><br></p>";s:22:"student_input_value_id";s:3:"229";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:1:"3";s:22:"student_input_value_id";s:3:"230";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"3";s:22:"student_input_value_id";s:3:"231";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:8:"Irritado";s:22:"student_input_value_id";s:3:"232";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"233";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"234";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"235";}i:17;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"24";s:5:"value";s:288:"<p>-Trabalho + Questões no caderno sore ética e moral</p><p>-Fez a parte da ética sozinho.</p><p>-Muita dificuldade em entender o conceito de caráter: Desenvolvimento pobre, sonolento e confuso. Mudando de opinião o tempo todo sobre "o caráter do ser humano ser aperfeiçoável"</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"236";}}', '', '2015-05-28 09:23:59', '2015-05-28 09:23:59'),
(35, 5, '', '2014-10-23', 'a:8:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"237";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:332:"<p>-COmeçou muito mal humorado porque me recusei a deixá-lo passar pro papel, em aula, o resumo de história que já havíamos marcado no livro. Depois de uma conversa séria ele aceitou, me pediu descupas e passamos para literatura. </p><p>-Atenção e bom humor quando estavaos estudando estrutura e formação das palavras.</p>";s:22:"student_input_value_id";s:3:"238";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:12:"Bem humorado";s:22:"student_input_value_id";s:3:"239";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:3:"240";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"241";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"242";}i:8;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"70";s:4:"type";s:8:"numerico";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"243";}i:16;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"23";s:5:"value";s:222:"<p>-Estudo para o teste: Estrutura e formação de palavras Quinhentismo, Introdução ao barroco)</p><p>-Escreveu quase que sozinho o resumo de Quinhetismo.</p><p>-Bom desempenho em estrutura e formação das palavras</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"244";}}', '', '2015-05-28 09:50:43', '2015-05-28 09:50:43'),
(36, 5, '', '2014-11-06', 'a:7:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"245";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:48:"<p>-Ótimo humor. Falante. Ótima atenção.</p>";s:22:"student_input_value_id";s:3:"246";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:9:"Empolgado";s:22:"student_input_value_id";s:3:"247";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"9";s:22:"student_input_value_id";s:3:"248";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"8";s:22:"student_input_value_id";s:3:"249";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"8";s:22:"student_input_value_id";s:3:"250";}i:13;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"18";s:5:"value";s:174:"<p>-Estudando para a prova, que ocorrerá na próxima quarta.</p><p>-Estudando Meiose. Procurou sozinho a informação no livro e foi capaz de encontrar o que queríamos.</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"251";}}', '', '2015-05-28 10:26:09', '2015-05-28 10:26:09');
INSERT INTO `feeds` (`id`, `student_id`, `author`, `date`, `content`, `sidebar`, `created`, `modified`) VALUES
(37, 5, '', '2014-11-07', 'a:8:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"11:00 a 13:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"11";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"13";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"252";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:435:"<p>- A aula foi sábado de manhã e ele disse que esqueceu de tomar o remédio.</p><p>- A aula não aconteceu. Ele se mostrou muito neervoso, não conseguiu se concentrar, eu o pressionei e ele não voltou ao foco. Ficou muito irritado e se agredindo. Interrompi a aula</p><p>-Depois ele me ligou, os pais conversaram com ele. Ele pediu desculpas emocionado e marcamos uma aula pro dia seguinte.</p><p>#aulainterrompida #semremedio</p>";s:22:"student_input_value_id";s:3:"253";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"254";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:8:"Irritado";s:22:"student_input_value_id";s:3:"255";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:3:"256";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:3:"257";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:3:"258";}i:13;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"18";s:5:"value";s:159:"<p>Estudando para a prova de Biologia</p><p>-Três matérias foram amrcadas pelo professor: Ciclo do Nitrogênio, Síntese de proteína e Divisão celular.</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"259";}}', '', '2015-05-28 11:11:54', '2015-05-28 11:11:54'),
(38, 5, '', '2014-11-08', 'a:9:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"13:00 a 16:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"13";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"16";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"260";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:289:"<p>- Após ter ligado e pedido desculpas pela resistência do dia anterior, marcamos a aula no domingo. </p><p>-Puxou assunto sobre estar de saco cheio mas não poder agir desta maneira. Saudades da escola (??) e amigos.</p><p>-Atenção piorou ao final (Cansado), mas esteve disposto.</p>";s:22:"student_input_value_id";s:3:"261";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:1:"3";s:22:"student_input_value_id";s:3:"262";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:3:"263";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:6:"Normal";s:22:"student_input_value_id";s:3:"264";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:3:"265";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:3:"266";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"267";}i:13;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"18";s:5:"value";s:134:"<p>-Estudando para a prova: Exercicio Meiose, Cliclo do Nitrogênio e síntese proteína. </p><p>-Terminamos a questão de meiose.</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"268";}}', '', '2015-05-28 11:54:03', '2015-05-28 11:54:03'),
(39, 5, '', '2014-11-12', 'a:9:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"269";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:961:"<p>-Chegou tranquilo até perceber que não lembrava de parte da matéria da prova. Ficou muito nervoso, foi agressivo umas duas vezes (eu deveria ter minimizado o esquecimento ou seguido na linha da responsabilização mais tranquila)</p><p>-Depois do segundo ataque de nervos, ele pegou o rivotril. Seu humor melhorou em 5 minutos. "Esse remédio é muito bom, só de pegar já me acalma, me deixa confiante".</p><p>-Sorrisos imotivados constantes.</p><p>-Logo que tomou o rmédio, me chamou para perguntar se deveria dar tanta importância para essas coisas (esquecer material, esquecer matéria....). Expliquei que só até aonde lhe fazia bem. Que isso não podia fazer mais mal que o esquecimento...</p><p>-Quando se distraiu e eu chamei a atenção e ele não pareceu surpreso ou constrangido. Deu um sorrisinho.</p><p>-Atenção ficou se desprendendo na meia hora final. (Predendo-se em coisas aleatórias, por alguns segundos, cada)</p><p>#rivotril</p>";s:22:"student_input_value_id";s:3:"270";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:3:"271";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:3:"272";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:6:"Normal";s:22:"student_input_value_id";s:3:"273";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"274";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:3:"275";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"276";}i:16;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"23";s:5:"value";s:201:"<p>Estudando para a prova de literatura: Arcadismo e Barroco x Classicismo</p><p>-Fizemos o resumo, comigo sempre guiando e explicando os exemplos, como é típico do estudo de estilos literários.</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"277";}}', '', '2015-05-28 12:18:57', '2015-05-28 12:18:57'),
(40, 5, '', '2014-11-13', 'a:7:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"278";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:294:"<p>-Cheguei um pouco mais cedo, João demorou, porquê estava dormindo. </p><p>-Chegou muito lento, não tinha certeza se havia lavado o rosto.</p><p>-Está lento e pouco independente, mas as vezes consegue recordar coisas como placas tectõnicas e a instabilidade das regiôes de encontro.</p>";s:22:"student_input_value_id";s:3:"279";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:6:"Normal";s:22:"student_input_value_id";s:3:"280";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"281";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"4";s:22:"student_input_value_id";s:3:"282";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"283";}i:15;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"21";s:5:"value";s:64:"<p>-Estudando para a prova de Geografia: Dinâmica da terra.</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"284";}}', '', '2015-05-28 12:30:28', '2015-05-28 12:30:28'),
(41, 5, '', '2014-11-15', 'a:9:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"11:00 a 14:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"11";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"14";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"285";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:1768:"<p>- Me atendeu de bom humor, sorriso no rosto.</p><p><o:p></o:p></p><p>-Concentrado,\r\ndisposto e independente. Abriu o livro e foi direto para o capítulo de óxidos,\r\ncopiando a definição sozinho.<o:p></o:p></p><p>-Na hora\r\nde dar exemplos, queria dar exemplos de elementos e não de óxidos.\r\nFicou um pouco confuso quando o interpelei sobre se era pra dar exemplos\r\nde elementos. Até que eu o perguntei sobre o que era o trabalho e ele\r\n"ácidos", fazendo cara feia, percebendo que tava longe do contexto.\r\nTive que o conduzir até óxidos. <o:p></o:p></p><p><span class="redactor-invisible-space">-Consegui\r\nresgatar a linha associativa, quando ele travou na equação de desidratação de\r\nH2SO4 - H2O=SO3.</span><strong>Pedi para\r\nele pensar no que estávamos falando e qual foi a última coisa sobre a qual\r\nhavíamos falado. O entendimento veio quase que imediatamente.</strong><o:p></o:p></p><p><span class="redactor-invisible-space">-Começou\r\na travar, aparentando irritação. Quando perguntei: "Lembrei de uma coisa\r\nque me deixou irritado". Seguiu irritado/travado e perdeu independência e\r\nprocurando as coisas com vontade..</span><o:p></o:p></p><p><span class="redactor-invisible-space">-Parece,\r\nrealmente, abalado, mas lutando para não desabar</span><o:p></o:p></p><p><span class="redactor-invisible-space">-"Vamos\r\nlá, Johny, está quase acabando por hoje", "O Problema não é\r\nesse", "Então, qual é?", "Uhm deixa pra lá"</span><o:p></o:p></p><p><strong>- Não está absorto mas\r\nfica travadão, quase temendo, está demais, mas continua tentando....</strong><o:p></o:p></p><p><strong>-Depois fui saber que\r\nhavia brigado com o pai, mas nao sei o motivo.</strong><o:p></o:p></p><p>#disassociaçãodocontexto\r\n#brigafamília<o:p></o:p></p>";s:22:"student_input_value_id";s:3:"286";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:3:"287";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:3:"288";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:12:"Mal humorado";s:22:"student_input_value_id";s:3:"289";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"290";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"291";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"292";}i:11;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"16";s:5:"value";s:459:"<p>-Trabalho para avaliação final: Óxidos. </p><p>-Teve dificuldade em perceber que o Flúor era uma exceção a formação de óxidos, e que o asterisco respondia à pergunta: "Porque o Flúor é uma exceção?"<span class="redactor-invisible-space">. Depois d eu o cercear muito com peguntas, chegou a constatação de que "o Flúor não combina com o Oxigênio para formar óxidos"</span><br></p><p><span class="redactor-invisible-space"><br></span></p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"293";}}', '', '2015-05-28 13:19:17', '2015-05-28 13:19:17'),
(42, 5, '', '2014-11-16', 'a:9:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"11:00 a 13:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"11";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"13";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"294";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:465:"<p>-Bem humorado, falante. </p><p>-Deixei ele fazer sozinho, avisando. Ele perguntou "tem certeza?" Disse que sim e ele começou a fazer. Se perdeu por 10segundos na espiral do caderno. </p><p>- Muito orgulhoso ao perceber que acertou a primeira. Sorriso largo. Demorou cerca de 5 minutos</p><p>-Muito disperso, mas fazendo sozinho.</p><p>-Seguiu bem, com independencia boa e atenção fraca. Fizemos todos os de P.A.</p><p>-Foram 8 questões, deixei 1 pra casa</p>";s:22:"student_input_value_id";s:3:"295";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:1:"8";s:22:"student_input_value_id";s:3:"296";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:3:"297";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:12:"Bem humorado";s:22:"student_input_value_id";s:3:"298";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"299";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:3:"300";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:3:"301";}i:10;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"15";s:5:"value";s:246:"<p>- Estudando para a prova de matemática.</p><p>Exercícios que a professora marcou de PA e PG</p><p>-Problemas com álgebra. Não sabe se pode multiplicas 9 por 2X ou somar X com 18X (resolvi perguntando quanto era 1 joão mais 18 "joãos"</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"302";}}', '', '2015-05-28 13:41:51', '2015-05-28 13:41:51'),
(43, 5, '', '2014-11-16', 'a:9:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"11:00 a 13:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"11";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"13";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"303";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:465:"<p>-Bem humorado, falante. </p><p>-Deixei ele fazer sozinho, avisando. Ele perguntou "tem certeza?" Disse que sim e ele começou a fazer. Se perdeu por 10segundos na espiral do caderno. </p><p>- Muito orgulhoso ao perceber que acertou a primeira. Sorriso largo. Demorou cerca de 5 minutos</p><p>-Muito disperso, mas fazendo sozinho.</p><p>-Seguiu bem, com independencia boa e atenção fraca. Fizemos todos os de P.A.</p><p>-Foram 8 questões, deixei 1 pra casa</p>";s:22:"student_input_value_id";s:3:"304";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:1:"8";s:22:"student_input_value_id";s:3:"305";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:3:"306";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:12:"Bem humorado";s:22:"student_input_value_id";s:3:"307";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"308";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:3:"309";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:3:"310";}i:10;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"15";s:5:"value";s:246:"<p>- Estudando para a prova de matemática.</p><p>Exercícios que a professora marcou de PA e PG</p><p>-Problemas com álgebra. Não sabe se pode multiplicas 9 por 2X ou somar X com 18X (resolvi perguntando quanto era 1 joão mais 18 "joãos"</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"311";}}', '', '2015-05-28 13:41:52', '2015-05-28 13:41:52'),
(44, 5, '', '2015-02-25', 'a:9:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"312";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:546:"<p>-João começou a aula muitonervoso e frustrado com a falta de amigos, demonstrando ansiedade em afirmar que mudou. Depois de longa conversa e acessos de raiva, ordenei, calmamente que ele passasse à tarefa, o que ele fez, à revelia.</p><p>-Apesar da constante raiva, conduziu bem os exercícios, com alguns momentos de dispersão branda, causada pela raiva e ocupação pelo problema da falta de amigos (dispersão concentrada em outra coisa)</p><p>Motivo da raiva: Alegava solidão e falta de amigos (aparente obsessão pela questão. </p>";s:22:"student_input_value_id";s:3:"313";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:2:"10";s:22:"student_input_value_id";s:3:"314";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"7";s:22:"student_input_value_id";s:3:"315";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:12:"Mal humorado";s:22:"student_input_value_id";s:3:"316";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"317";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"5";s:22:"student_input_value_id";s:3:"318";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"6";s:22:"student_input_value_id";s:3:"319";}i:10;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"15";s:5:"value";s:75:"<p>-Coseno, seno e tangente da soma. (primeiros exercícios)</p><p><br></p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"320";}}', '', '2015-05-28 14:00:04', '2015-05-28 14:00:04'),
(45, 5, '', '2015-04-27', 'a:9:{i:0;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"77";s:5:"value";s:13:"18:00 a 20:00";s:6:"config";a:2:{s:10:"time_start";a:2:{s:4:"hour";s:2:"18";s:3:"min";s:2:"00";}s:8:"time_end";a:2:{s:4:"hour";s:2:"20";s:3:"min";s:2:"00";}}s:22:"student_input_value_id";s:3:"321";}i:1;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"61";s:4:"type";s:5:"texto";s:5:"value";s:728:"<p>-Humor melhor, percebe-se o esforço em atender a exigência da aula passada em relação a isso. </p><p>- HUmor foi piorando a cada dificuldade econtrada e no fim, já não queria fazer  e rsmungava muito. Em determinado momento, perguntei se ele queria que eu sempre produrasse as formula pra ele, no que ele respondeu "sim", de cabeça baixa e tom leve de desafio. </p><p>-Tentou travar a aula algumas vezes, falando de problemas e pensamentos invasivos.</p><p>-tive que terminar a aula antes, como combinado, caso ele não melhorasse seu humor.</p><p>-Me ligou, pedindo desculpas. Aceitei com parcimônia e dizendo que ele ia ter que lidar com issona próxima aula. O dever precisa ser feito.</p><p>#aulainterrompida </p>";s:22:"student_input_value_id";s:3:"322";}i:2;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"71";s:4:"type";s:8:"numerico";s:5:"value";s:1:"4";s:22:"student_input_value_id";s:3:"323";}i:3;a:6:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"72";s:4:"type";s:8:"numerico";s:5:"value";s:1:"2";s:22:"student_input_value_id";s:3:"324";}i:4;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"65";s:5:"value";s:8:"Irritado";s:22:"student_input_value_id";s:3:"325";}i:5;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"62";s:5:"value";s:1:"4";s:22:"student_input_value_id";s:3:"326";}i:6;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"63";s:5:"value";s:1:"1";s:22:"student_input_value_id";s:3:"327";}i:7;a:5:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:16:"student_input_id";s:2:"64";s:5:"value";s:1:"3";s:22:"student_input_value_id";s:3:"328";}i:10;a:13:{s:10:"student_id";s:1:"5";s:5:"actor";s:5:"tutor";s:17:"student_lesson_id";s:2:"15";s:5:"value";s:270:"<p>-Exercício de seno, cosseno, tangente da soma.</p><p>- Exercício fácil. Teve muita dificuldade em seguir o comando da questão, ao invés de trocar o "a" e o "b" pelos valores dados na questão, estava se baseando erroneamente em outros exercícios do caderno.</p>";s:6:"nota_1";s:0:"";s:6:"nota_2";s:0:"";s:6:"nota_3";s:0:"";s:6:"nota_4";s:0:"";s:6:"nota_5";s:0:"";s:6:"nota_6";s:0:"";s:6:"nota_7";s:0:"";s:6:"nota_8";s:0:"";s:22:"student_input_value_id";s:3:"329";}}', '', '2015-05-28 14:14:08', '2015-05-28 14:14:08');

-- --------------------------------------------------------

--
-- Estrutura para tabela `hashtags`
--

CREATE TABLE IF NOT EXISTS `hashtags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `actor` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Fazendo dump de dados para tabela `hashtags`
--

INSERT INTO `hashtags` (`id`, `student_id`, `actor`, `value`) VALUES
(1, 1, 'pais', '#fresno'),
(2, 1, 'pais', '#testinho'),
(3, 1, 'pais', '#teste'),
(4, 5, 'tutor', '#rinite'),
(5, 5, 'tutor', '#abandono'),
(6, 5, 'tutor', '#dispersãoaguda'),
(7, 5, 'tutor', '#deverpracasa'),
(8, 5, 'tutor', '#dispersãofocada'),
(9, 5, 'tutor', '#perguntaminha'),
(10, 5, 'tutor', '#primeirocontatoconteúdo'),
(11, 5, 'tutor', '#oscilação'),
(12, 5, 'tutor', '#aulainterrompida'),
(13, 5, 'tutor', '#semremedio'),
(14, 5, 'tutor', '#rivotril'),
(15, 5, 'tutor', '#disassociaçãodocontexto'),
(16, 5, 'tutor', '#brigafamília');

-- --------------------------------------------------------

--
-- Estrutura para tabela `hashtag_student_input_values`
--

CREATE TABLE IF NOT EXISTS `hashtag_student_input_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hashtag_id` int(11) NOT NULL,
  `student_input_value_id` int(11) NOT NULL,
  `student_input_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Fazendo dump de dados para tabela `hashtag_student_input_values`
--

INSERT INTO `hashtag_student_input_values` (`id`, `hashtag_id`, `student_input_value_id`, `student_input_id`) VALUES
(1, 1, 3, 76),
(2, 1, 3, 76),
(3, 2, 3, 76),
(4, 3, 12, 76),
(5, 4, 58, 61),
(6, 4, 58, 61),
(7, 5, 58, 61),
(8, 4, 59, 71),
(9, 4, 59, 71),
(10, 5, 59, 71),
(11, 4, 60, 72),
(12, 4, 60, 72),
(13, 5, 60, 72),
(14, 4, 61, 65),
(15, 4, 61, 65),
(16, 5, 61, 65),
(17, 4, 62, 62),
(18, 4, 62, 62),
(19, 5, 62, 62),
(20, 4, 63, 63),
(21, 4, 63, 63),
(22, 5, 63, 63),
(23, 4, 64, 64),
(24, 4, 64, 64),
(25, 5, 64, 64),
(26, 6, 67, 61),
(27, 6, 68, 71),
(28, 6, 69, 72),
(29, 6, 70, 65),
(30, 6, 71, 62),
(31, 6, 72, 63),
(32, 6, 73, 64),
(33, 6, 74, 70),
(34, 7, 87, 61),
(35, 7, 88, 71),
(36, 7, 89, 72),
(37, 7, 90, 65),
(38, 7, 91, 62),
(39, 7, 92, 63),
(40, 7, 93, 64),
(41, 7, 94, 70),
(42, 8, 98, 61),
(43, 8, 98, 61),
(44, 9, 98, 61),
(45, 8, 99, 65),
(46, 8, 99, 65),
(47, 9, 99, 65),
(48, 8, 100, 62),
(49, 8, 100, 62),
(50, 9, 100, 62),
(51, 8, 101, 63),
(52, 8, 101, 63),
(53, 9, 101, 63),
(54, 8, 102, 64),
(55, 8, 102, 64),
(56, 9, 102, 64),
(57, 10, 116, 61),
(58, 10, 117, 71),
(59, 10, 118, 72),
(60, 10, 119, 65),
(61, 10, 120, 62),
(62, 10, 121, 63),
(63, 10, 122, 64),
(64, 10, 123, 70),
(65, 11, 126, 61),
(66, 11, 127, 71),
(67, 11, 128, 72),
(68, 11, 129, 65),
(69, 11, 130, 62),
(70, 11, 131, 63),
(71, 11, 132, 64),
(72, 12, 253, 61),
(73, 12, 253, 61),
(74, 13, 253, 61),
(75, 12, 254, 71),
(76, 12, 254, 71),
(77, 13, 254, 71),
(78, 12, 255, 65),
(79, 12, 255, 65),
(80, 13, 255, 65),
(81, 12, 256, 62),
(82, 12, 256, 62),
(83, 13, 256, 62),
(84, 12, 257, 63),
(85, 12, 257, 63),
(86, 13, 257, 63),
(87, 12, 258, 64),
(88, 12, 258, 64),
(89, 13, 258, 64),
(90, 14, 270, 61),
(91, 14, 271, 71),
(92, 14, 272, 72),
(93, 14, 273, 65),
(94, 14, 274, 62),
(95, 14, 275, 63),
(96, 14, 276, 64),
(97, 15, 286, 61),
(98, 15, 286, 61),
(99, 16, 286, 61),
(100, 15, 287, 71),
(101, 15, 287, 71),
(102, 16, 287, 71),
(103, 15, 288, 72),
(104, 15, 288, 72),
(105, 16, 288, 72),
(106, 15, 289, 65),
(107, 15, 289, 65),
(108, 16, 289, 65),
(109, 15, 290, 62),
(110, 15, 290, 62),
(111, 16, 290, 62),
(112, 15, 291, 63),
(113, 15, 291, 63),
(114, 16, 291, 63),
(115, 15, 292, 64),
(116, 15, 292, 64),
(117, 16, 292, 64),
(118, 12, 322, 61),
(119, 12, 323, 71),
(120, 12, 324, 72),
(121, 12, 325, 65),
(122, 12, 326, 62),
(123, 12, 327, 63),
(124, 12, 328, 64);

-- --------------------------------------------------------

--
-- Estrutura para tabela `inputs`
--

CREATE TABLE IF NOT EXISTS `inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Fazendo dump de dados para tabela `inputs`
--

INSERT INTO `inputs` (`id`, `name`) VALUES
(1, 'Calendário'),
(2, 'Intervalo de Tempo'),
(3, 'Registro Textual'),
(4, 'Escala Numérica'),
(5, 'Escala Texto'),
(6, 'Número'),
(7, 'Texto Privativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `messages`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `messages`
--

INSERT INTO `messages` (`id`, `student_id`, `name`, `content`, `views`, `created`, `modified`) VALUES
(1, 1, 'Exemplo de mensagem', 'Exemplo de conteudo', 0, '2014-11-19 00:00:00', '2014-11-19 00:00:00'),
(2, 1, '', '', 0, '2015-03-19 11:24:46', '2015-03-19 11:24:46'),
(3, 1, 'teste', '<p><del></del>etste ste </p>', 0, '2015-04-10 15:50:30', '2015-04-10 15:50:30'),
(4, 1, 'testandooooo', '<p>testandoooo</p>', 0, '2015-04-10 15:52:09', '2015-04-10 15:52:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `message_authors`
--

CREATE TABLE IF NOT EXISTS `message_authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `message_authors`
--

INSERT INTO `message_authors` (`id`, `message_id`, `model`, `prefix`, `foreign_key`) VALUES
(1, 1, 'StudentParent', 'mom_', 1),
(2, 2, 'StudentParent', 'mom_', 1),
(3, 3, 'StudentParent', 'mom_', 1),
(4, 4, 'StudentParent', 'mom_', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `message_recipients`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `message_recipients`
--

INSERT INTO `message_recipients` (`id`, `message_id`, `recipient_1_model`, `recipient_1_prefix`, `recipient_1_foreign_key`, `recipient_2_model`, `recipient_2_prefix`, `recipient_2_foreign_key`, `recipient_3_model`, `recipient_3_prefix`, `recipient_3_foreign_key`) VALUES
(1, 1, 'StudentParent', 'mom_', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'StudentParent', 'tutor_', 1, NULL, NULL, 1, NULL, NULL, NULL),
(3, 3, 'StudentParent', 'dad_', 1, 0, NULL, 1, NULL, NULL, 1),
(4, 4, 'StudentParent', 'dad_', 1, NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `message_replies`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `message_replies`
--

INSERT INTO `message_replies` (`id`, `message_id`, `model`, `prefix`, `foreign_key`, `content`, `created`) VALUES
(1, 1, 'StudentParent', 'mom_', 1, 'Exemplo de comentário', '2014-11-19 00:00:00'),
(2, 4, 'StudentParent', 'mom_', 1, 'wasasasaa', '2015-04-20 16:08:23'),
(3, 4, 'StudentParent', 'mom_', 1, 'asasasasass', '2015-04-20 16:08:27'),
(4, 4, 'StudentParent', 'mom_', 1, 'PINTO\r\n', '2015-04-20 18:18:04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
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
-- Estrutura para tabela `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `school` varchar(255) NOT NULL,
  `clinical_condition` varchar(255) NOT NULL,
  `school_grade` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `avatar`, `date_of_birth`, `school`, `clinical_condition`, `school_grade`, `description`, `created`, `modified`) VALUES
(5, 'João Pedro Saules Peña', '', '', NULL, '2015-03-10', 'CEI - Centro de Educação Integrada', 'Síndrome de Asperger', 'Segundo ano do Segundo Grau', '<p>O trabalho de tutoria com o João começou em Junho de 2014.</p>', '2015-03-19 20:24:53', '2015-04-25 16:32:41');

-- --------------------------------------------------------

--
-- Estrutura para tabela `student_exercises`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Fazendo dump de dados para tabela `student_exercises`
--

INSERT INTO `student_exercises` (`id`, `student_id`, `date`, `due_to`, `student_lesson_id`, `enunciation`, `observation`, `attachment`, `answer`, `observations`) VALUES
(2, 2, '2015-03-18', '2015-03-17', 1, '<p>Se carlitos está com 10 policiais atras deles, mas não apresenta flagrante no bolso, por outro lado, estpa claramente doidão. Quantos ele consegue subornar com apenas, 30 merrecas no bolso?</p>', 'Se não fizer, o pau come. ', NULL, NULL, NULL),
(3, 1, '2015-03-17', '2015-03-18', 14, '<p>ABACATETETE</p>', 'abacate', 'pga.sql', NULL, NULL),
(4, 1, '2015-03-03', '2015-03-05', 14, '<p>teste</p>', 'testets', 'escala-2.pdf', NULL, NULL),
(5, 5, '2015-05-12', '2015-05-20', 18, '<p>dasdaasdas</p>', 'dsadadad123456', 'cc-timeline.rar', NULL, NULL),
(6, 5, '2015-05-12', '2015-05-20', 18, '<p>sadadada</p>', 'sadadad', NULL, NULL, NULL),
(7, 5, '2015-05-01', '2015-05-10', 17, '<p>saddas</p>', 'dsadadsdad', NULL, NULL, NULL),
(8, 5, '2015-05-12', '2015-05-20', 18, '<p>dasdaasdas</p>', 'dsadadad123', NULL, NULL, NULL),
(9, 5, '2015-05-12', '2015-05-20', 18, '<p>dasdaasdas</p>', 'dsadadad456', NULL, NULL, NULL),
(10, 5, '2015-05-12', '2015-05-20', 18, '<p>dasdaasdas</p>', 'dsadadad123', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `student_inputs`
--

CREATE TABLE IF NOT EXISTS `student_inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `input_id` int(11) NOT NULL,
  `actor` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `config` text,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Fazendo dump de dados para tabela `student_inputs`
--

INSERT INTO `student_inputs` (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES
(3, 1, 3, 'tutor', 'Descrição da Aulaabacatett', '', 1),
(9, 1, 4, 'tutor', 'Focoabacategdgd', 'a:2:{s:11:"range_start";s:1:"1";s:9:"range_end";s:1:"5";}', 1),
(11, 1, 1, 'tutor', 'Data da Apresentaçãoteste', NULL, 1),
(14, 1, 2, 'tutor', 'Horário da Aulaerewa', NULL, 1),
(15, 1, 6, 'tutor', 'Notadsadadada', NULL, 1),
(19, 1, 2, 'psico', 'gdxgdxgxgxg', NULL, 1),
(20, 1, 1, 'psico', '123das', NULL, 1),
(22, 1, 3, 'tutor', 'input de TUTOR AEAEAE caio boiolão', NULL, 1),
(27, 3, 1, 'tutor', 'Data', NULL, 1),
(28, 3, 2, 'tutor', 'Tempo de Imersão/Dispersão Aguda', NULL, 1),
(30, 1, 2, 'tutor', 'Horário', NULL, 1),
(31, 1, 2, 'tutor', 'TESTANDO', NULL, 1),
(32, 1, 1, 'tutor', 'TESTANDO CALENDARIOO', NULL, 1),
(35, 1, 1, 'pais', 'asasasa', NULL, 2),
(36, 2, 1, 'tutor', 'Teste Calendário', NULL, 1),
(37, 2, 2, 'tutor', 'Teste intervalo de tempo', NULL, 1),
(38, 2, 3, 'tutor', 'Teste Texto', NULL, 1),
(39, 2, 4, 'tutor', 'Teste Escala numérica', 'a:2:{s:11:"range_start";s:1:"1";s:9:"range_end";s:1:"5";}', 1),
(41, 2, 6, 'tutor', 'Teste Número', NULL, 1),
(42, 2, 7, 'tutor', 'Teste Registro Privatvo', NULL, 1),
(50, 2, 1, 'psico', 'Teste Calendário', NULL, 1),
(51, 2, 2, 'psico', 'Teste intervalo de tempo', NULL, 1),
(52, 2, 3, 'psico', 'Teste Texto', NULL, 1),
(53, 2, 4, 'psico', 'Teste Escala numérica', 'a:2:{s:11:"range_start";s:1:"1";s:9:"range_end";s:1:"5";}', 1),
(54, 2, 5, 'psico', 'Teste Escala Texto', 'a:5:{i:1;a:1:{s:4:"name";s:6:"Beserk";}i:2;a:1:{s:4:"name";s:6:"Deprê";}i:3;a:1:{s:4:"name";s:6:"Inerte";}i:4;a:1:{s:4:"name";s:9:"No brilho";}i:5;a:1:{s:4:"name";s:7:"Ecstasy";}}', 1),
(55, 2, 6, 'psico', 'Teste Número', NULL, 1),
(56, 2, 7, 'psico', 'Teste Registro Privatvo', NULL, 1),
(61, 5, 3, 'tutor', 'Registro da Aula', NULL, 20),
(62, 5, 4, 'tutor', 'Atenção', 'a:2:{s:11:"range_start";s:1:"1";s:9:"range_end";s:2:"10";}', 60),
(63, 5, 4, 'tutor', 'Autonomia', 'a:2:{s:11:"range_start";s:1:"1";s:9:"range_end";s:2:"10";}', 70),
(64, 5, 4, 'tutor', 'Independência', 'a:2:{s:11:"range_start";s:1:"1";s:9:"range_end";s:2:"10";}', 80),
(65, 5, 5, 'tutor', 'Humor', 'a:5:{i:1;a:1:{s:4:"name";s:8:"Irritado";}i:2;a:1:{s:4:"name";s:12:"Mal humorado";}i:3;a:1:{s:4:"name";s:6:"Normal";}i:4;a:1:{s:4:"name";s:12:"Bem humorado";}i:5;a:1:{s:4:"name";s:9:"Empolgado";}}', 50),
(68, 5, 7, 'tutor', 'Anotações pessoais', NULL, 100),
(70, 5, 6, 'tutor', 'Tempo de Dispersão aguda', NULL, 90),
(71, 5, 6, 'tutor', 'N. de exercícios propostos', NULL, 30),
(72, 5, 6, 'tutor', 'Número exercícios completos', NULL, 40),
(73, 1, 6, 'tutor', 'abacatinho', NULL, 1),
(74, 1, 6, 'pais', 'Foco', NULL, 3),
(75, 1, 4, 'pais', '123', 'a:2:{s:11:"range_start";s:1:"1";s:9:"range_end";s:1:"5";}', 1),
(76, 1, 3, 'pais', 'abacate 8000', NULL, 5),
(77, 5, 2, 'tutor', 'Horário da Aula', NULL, 10),
(78, 5, 1, 'psico', 'teste', NULL, 1),
(79, 5, 5, 'psico', '', 'a:5:{i:1;a:1:{s:4:"name";s:1:"1";}i:2;a:1:{s:4:"name";s:1:"3";}i:3;a:1:{s:4:"name";s:1:"5";}i:4;a:1:{s:4:"name";s:1:"7";}i:5;a:1:{s:4:"name";s:1:"8";}}', 1),
(80, 1, 5, 'tutor', 'Humor', 'a:3:{i:1;a:1:{s:4:"name";s:5:"Feliz";}i:2;a:1:{s:4:"name";s:6:"Alegre";}i:3;a:1:{s:4:"name";s:6:"Triste";}}', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `student_input_grades`
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
-- Estrutura para tabela `student_input_values`
--

CREATE TABLE IF NOT EXISTS `student_input_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `actor` varchar(255) NOT NULL,
  `student_input_id` int(11) DEFAULT NULL,
  `student_lesson_id` int(11) DEFAULT NULL,
  `value` text NOT NULL,
  `nota_1` int(11) DEFAULT NULL,
  `nota_2` int(11) DEFAULT NULL,
  `nota_3` int(11) DEFAULT NULL,
  `nota_4` int(11) DEFAULT NULL,
  `nota_5` int(11) DEFAULT NULL,
  `nota_6` int(11) DEFAULT NULL,
  `nota_7` int(11) DEFAULT NULL,
  `nota_8` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=330 ;

--
-- Fazendo dump de dados para tabela `student_input_values`
--

INSERT INTO `student_input_values` (`id`, `date`, `student_id`, `actor`, `student_input_id`, `student_lesson_id`, `value`, `nota_1`, `nota_2`, `nota_3`, `nota_4`, `nota_5`, `nota_6`, `nota_7`, `nota_8`) VALUES
(1, '2015-04-20', 1, 'pais', 75, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2015-04-20', 1, 'pais', 35, NULL, '20/04/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2015-04-20', 1, 'pais', 74, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2015-04-21', 1, 'pais', 75, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2015-04-21', 1, 'pais', 35, NULL, '20/04/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2015-04-21', 1, 'pais', 74, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '2015-04-22', 1, 'pais', 75, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2015-04-22', 1, 'pais', 35, NULL, '20/04/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2015-04-22', 1, 'pais', 74, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2015-05-15', 1, 'pais', 74, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2014-09-25', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2014-09-25', 5, 'tutor', 61, NULL, '<p>- João muito depressivo quando cheguei. Chorando, fagilizado, "reclamou" que a Karina saiu mais cedo, solidão, medo de perdê-la.</p><p>-Irritou-se, quando percebeu ser tarefa longa.</p><p>-Melhorando humor ao longo da aula</p><p>-Muito disperso. Arranjando motivos pra dispersar (Cupim voando, coçando Nariz até espirrar...). Com isso a aula está se tornando lenta</p><p>-Confundindo o NOX com o número dos átomos nas moléculas</p><p>-Postura preguiçosa de "chutar" ao invés de fazer a montagem do sal</p><p>-Reclamando muito de tudo: azia, alergia, desatenção (recama mas ta muito descompromissado. Quer sair o tepo todo)</p><p>-Muito baixa autonomia no balanceamento. Muita raiva, nao não consegue nem lembrar qual elemento está sendo balanceado.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2014-09-25', 5, 'tutor', 65, NULL, 'Irritado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '2014-09-25', 5, 'tutor', 62, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2014-09-25', 5, 'tutor', 63, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '2014-09-25', 5, 'tutor', 64, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '2014-09-25', 5, 'tutor', NULL, 16, '<p>Ficha sobre sais e equação de neutralização.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '2015-04-28', 1, 'pais', 75, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '2015-04-28', 1, 'pais', 35, NULL, '29/04/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '2015-04-28', 1, 'pais', 74, NULL, '232', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '2015-04-28', 1, 'pais', 76, NULL, '<p>asassa</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '2015-04-28', 1, 'pais', NULL, 3, '<p>asasaa</p>', 1, 2, 3, 4, NULL, NULL, NULL, NULL),
(23, '2015-03-03', 1, 'pais', 75, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '2015-03-03', 1, 'pais', 35, NULL, '22/04/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '2015-03-03', 1, 'pais', 74, NULL, '222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '2015-03-03', 1, 'pais', 76, NULL, '<p>2323wewewe</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '2015-03-03', 1, 'pais', NULL, 3, '<p>asasasasasaas</p>', NULL, NULL, 5, 6, NULL, NULL, NULL, NULL),
(28, '2015-03-03', 1, 'pais', NULL, 5, '<p>asasasas</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '2015-03-03', 1, 'pais', NULL, 7, '<p>asasasasas</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2015-04-22', 5, 'tutor', 65, NULL, 'Irritado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '2015-04-22', 5, 'tutor', 62, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '2015-04-22', 5, 'tutor', 63, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '2015-04-22', 5, 'tutor', 64, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '2015-04-28', 1, 'pais', 75, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '2015-04-28', 1, 'pais', 35, NULL, '28/04/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '2015-04-28', 1, 'pais', 74, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '2015-04-28', 1, 'pais', 76, NULL, '<p>dsadada</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '2015-02-01', 1, 'pais', 75, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '2015-02-01', 1, 'pais', 35, NULL, '02/02/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '2015-02-01', 1, 'pais', 74, NULL, '2222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '2015-02-01', 1, 'pais', 76, NULL, '<p>2211dsaddsd</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '2015-02-01', 1, 'pais', NULL, 2, '<p>asaasas</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '2015-02-01', 1, 'pais', NULL, 4, '<p>asasaas</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '2014-09-25', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, '2014-09-25', 5, 'tutor', 61, NULL, '<p>-João muito depressivo quando cheguei, chorando, fragilizado, "reclamou" que a Karina saiu mais cedo, solidão, med de perdê-la.</p><p>-Irritou-se , quando percebeu que a tarefa era longa. </p><p>-Melhorando o humor ao longo da aula</p><p>-Muito disperso, arranjando motivos para se dispersar (cupim voando, coçando o nariz até espirrar...). Com isso, a aula não está rendendo.</p><p>-Postura preguiçosa, de chutar, ao invés defazer a montagem do sal</p><p>-Reclamando de tudo: azia, alergia, desatenção</p><p>-Reclama mas está descompromissado: quer sair o tempo todo.</p><p>- Extremamente raivoso. Não consegue nem lembrar com qual elemento está balanceando. Se eu não falo o que fazer, não sai do lugar</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, '2014-09-25', 5, 'tutor', 71, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, '2014-09-25', 5, 'tutor', 72, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, '2014-09-25', 5, 'tutor', 65, NULL, 'Irritado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, '2014-09-25', 5, 'tutor', 62, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, '2014-09-25', 5, 'tutor', 63, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, '2014-09-25', 5, 'tutor', 64, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, '2014-09-25', 5, 'tutor', NULL, 16, '<p>Exercício química - Livro pg 167 (38,39, 40,41)<span></span></p><p>Neutralização de sais</p><p>-Confundiu o número NOX com o número de átomos nas moléculas</p><p>-dificuldade no balaceamento.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '2015-04-05', 1, 'pais', 75, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, '2015-04-05', 1, 'pais', 35, NULL, '22/04/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, '2015-04-05', 1, 'pais', 74, NULL, '2222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, '2015-04-05', 1, 'pais', 76, NULL, '<p>2222211111111</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, '2015-04-22', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, '2015-04-22', 5, 'tutor', 61, NULL, '<p>-João muito depressivo quando cheguei, chorando, fragilizado, reclamou que a Karina saiu mais cedo, solidão, medo de perdê-la</p><p>-Irritou-se quando percebeu ser tarefa longa.</p><p>-Melhorando de humor ao longo da aula</p><p>-Muito disperso, arranjando motivos para se dispersar (cupim voando, coçando o nariz até espirrar). Com isso a aula se torna lenta.</p><p>-Postura preguiçosa de chutar ao invés de fazer a montagem do sal.</p><p>- Reclamando muito de tudo: azia, alergia, desatenção.</p><p>-Reclama mas tá descompromissado: quer sair o tempo todo.</p><p>-Extremamente raivoso. Não consegue nem lembrar qual elemento está balanceando.Se eu não falo o que fazer, não sai do lugar.</p><p>#rinite #abandono</p><p><br></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, '2015-04-22', 5, 'tutor', 71, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, '2015-04-22', 5, 'tutor', 72, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, '2015-04-22', 5, 'tutor', 65, NULL, 'Irritado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, '2015-04-22', 5, 'tutor', 62, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, '2015-04-22', 5, 'tutor', 63, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, '2015-04-22', 5, 'tutor', 64, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, '2015-04-22', 5, 'tutor', NULL, 16, '<p>Exercícios química - pg 167, exercícios 38,39,40,41</p><p>Reações de neutralização e sais.</p><p>-Muito pouca autonomia no balanceamento.</p><p>-Confundindo o NOX com o número de átomos nas moléculas</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, '2014-09-30', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, '2014-09-30', 5, 'tutor', 61, NULL, '<p>-Muito preocupado com a nota perdida no teste relâmpago (reclamou por ter perdido a oportunidade de se recuperar e ficou absorto).</p><p>-Alguns sorrisos imotivados.</p><p>-Independência melhorou, assim como a atenção</p><p>- Bom humor, fazendo piadas, perguntas pertinentes e dando a resposta para próprias perguntas.</p><p>-A absorção parava quando percebia que eu tava olhando ("Oque?" "É que eu tava pensando no cálculo")<br></p><p>-A autonomia e independência estão boas mas a dispersão não (Pode isso?)</p><p>- Dispersão dele parece não ser por nada, mas um foco em alguma outra coisa. Não parece estar afetando o humor ou confiança, quando volta da dispersão.</p><p>-Poucos retoques</p><p>#dispersãoaguda</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, '2014-09-30', 5, 'tutor', 71, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, '2014-09-30', 5, 'tutor', 72, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, '2014-09-30', 5, 'tutor', 65, NULL, 'Bem humorado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, '2014-09-30', 5, 'tutor', 62, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, '2014-09-30', 5, 'tutor', 63, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, '2014-09-30', 5, 'tutor', 64, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, '2014-09-30', 5, 'tutor', 70, NULL, '90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, '2014-09-30', 5, 'tutor', NULL, 15, '<p>Exercícios de Matemática pg 186 (81,82, 84, 86,87, 88, 89)</p><p>Exercícios de </p><p>-Dificuldade em entender PG. Confundindo com PA.</p><p>- Pareceu perdido na primeiro, sems aber o que fazer, mas fez sozinho a letra b</p><p>-Questão 84: Protocolos sequênciais - Báskara + Termo geral da PG. Foi praticamente descoberto por ele.</p><p>-Resolveu praticamente sozinho a 86a. Novo tipo de protocolo- Variação de um protocolo</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, '2014-10-07', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, '2014-10-07', 5, 'tutor', 61, NULL, '<p>-Sobre o ex 55: Uma amiga me ensinou. É apenas uma colega. Colegas tambem marcam nossas vidas</p><p>-Atenção começou boa mas deu uma caída. Peguei ele perdido, com um risinho. O humor continua bom e o engajamento também</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, '2014-10-07', 5, 'tutor', 71, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, '2014-10-07', 5, 'tutor', 72, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, '2014-10-07', 5, 'tutor', 65, NULL, 'Bem humorado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, '2014-10-07', 5, 'tutor', 62, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, '2014-10-07', 5, 'tutor', 63, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, '2014-10-07', 5, 'tutor', 64, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, '2014-10-07', 5, 'tutor', 70, NULL, '29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, '2014-10-07', 5, 'tutor', NULL, 16, '<p>Livro pg 171 (55,56,57) Adicionais: 58, 59</p><p>-Boa independência no exercício 55</p><p>- Parece estar entendendo melhor reações de neutralizações mas tem muitos conceitos ainda abstratos na base.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, '2014-10-08', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, '2014-10-08', 5, 'tutor', 61, NULL, '<p>-Está nevoso, atenção ruim, reclamando da prova de matemática</p><p>-Muito disperso. Só ta andando com meus comandos. Muito raivoso.</p><p>-Me perguntando se ele tem motivo para se preocupar. Esperando que eu dê alívio a ele. "Não sou eu quem decide, é você. Já tem condições de saber o que e acho. </p><p>-Não fez o exercício que deixei pra ele no dia 05. Me recusei a fazer com ele</p><p>-Parece que espera que eu faça todas as partes do exercicio.</p><p>-Inisnuou que eu fizesse uma conta na calculadora (pode ser que, mesmo na incapacidade, ele queira avançar a qualquer custo)</p><p>#deverpracasa</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, '2014-10-08', 5, 'tutor', 71, NULL, '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, '2014-10-08', 5, 'tutor', 72, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, '2014-10-08', 5, 'tutor', 65, NULL, 'Mal humorado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, '2014-10-08', 5, 'tutor', 62, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, '2014-10-08', 5, 'tutor', 63, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, '2014-10-08', 5, 'tutor', 64, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, '2014-10-08', 5, 'tutor', 70, NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, '2014-10-08', 5, 'tutor', NULL, 15, '<p>Livro pg 189. Exercícios do 109 a 117</p><p>fez 109 (a,b) e 110 (a)</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, '2014-10-08', 5, 'tutor', NULL, 16, '<p>-Último exercício de química de ontem: pag 171 ex: 8 </p><p>Chegou a resposta da letra b com meus comandos, apenas. Mas tinha esquecido a forma de calcular o NOX, até.</p><p>-Demorou quase uma hora pra fazer (50 min)</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, '2014-10-09', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, '2014-10-09', 5, 'tutor', 61, NULL, '<p>-Muito disperso, mas querendo conversar.</p><p>- Escolhi não deixar ele se dispersar hoje e sempre trazê-lo para a questão.</p><p>- Pareceu estar muito ocupado com pensamentos invasivos, a aula todo (desde o dia anterior). Sua dispersão pareceu focada em outra coisa. Olho arregalado e olhar direcionado. Perguntei. Disse que só estava distraído (crível, não pareceu estar escondendo nada deliberadamente)<br></p><p>- Aconteceu alguma coisa com ele hoje e ele quis contar. Cortei a conversa... </p><p>*<strong>Pergunta minha</strong>: Hiperfoco (representado por essa fixação no pensamento) o faz perder o contexto geral o tempo todo, obrigando-o a reassociar as idéias e resgatar o contexto o tempo todo? Isso o faz tomar escolhas erradas, tentando preencher as lacunas totalmente fora de contexto?</p><p>#dispersãofocada #perguntaminha</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, '2014-10-09', 5, 'tutor', 65, NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, '2014-10-09', 5, 'tutor', 62, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, '2014-10-09', 5, 'tutor', 63, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, '2014-10-09', 5, 'tutor', 64, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, '2014-10-09', 5, 'tutor', NULL, 16, '<p>Estudos para o teste de química na segunda feira.</p><p>-Tentou montar o ácido sulfúrico a partir de hidrácido (HS). Perguntei o porque. Depois de uma resposta evasiva, ele rapidamente se lembrou do fato de não ter terminação "ídrico" (boa reuperação da linha de raciocinio)</p><p>-</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, '2014-10-14', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, '2014-10-14', 5, 'tutor', 61, NULL, '<p>-Parece bem, disposto e atento, apesar do dia obsessivo, como relatado pela Karina (mediadora)</p><p>- Tentou conversar sobre o trabalho de literatura e o "barulho que o lapis dele faz" e que "deveria usar lapiseira."</p><p>- Depois de uma hora de aula com atenção, passou a se absorver mais. </p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, '2014-10-14', 5, 'tutor', 71, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, '2014-10-14', 5, 'tutor', 72, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, '2014-10-14', 5, 'tutor', 65, NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, '2014-10-14', 5, 'tutor', 62, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, '2014-10-14', 5, 'tutor', 63, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, '2014-10-14', 5, 'tutor', 64, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, '2014-10-14', 5, 'tutor', 70, NULL, '60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, '2014-10-14', 5, 'tutor', NULL, 15, '<p>Livro, Página 191. Exercicios 118, 119,120. </p><p>Materia: Soma de limites.</p><p>-O protocolo pareceu aprendido mas esbarrou muito na algebra.</p><p>-O dever iria até a 124 mas se cegassemos a uma hora de aula, devidimos que iriamos passar para o dever de física, devido a prova na segunda feira.</p><p>*Demorou 1h e 15 para fazer os 3 deveres faceis. Começou muito bem, mas terminou ralentando.</p><p>**Dificuldade em multiplicação de fração. Sempre tantou igualar as bases </p><p>#dificuldadealgebra </p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, '2014-10-14', 5, 'tutor', NULL, 17, '<p>Ficha 12 </p><p>Exercício sobre Deformação da mola e cálculo da constate elástica ("Esse exercício é fácil, sabia"?)</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, '2014-10-16', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, '2014-10-16', 5, 'tutor', 61, NULL, '<p>- Bom humor, contando histórias do dia (Dodgeball/queimado)</p><p>-Em determinado momento, reclamou da atenção, dei um corte nele e ele olhou espantado. Seguiu atento.</p><p>- Parece que sua desatenção seja uma maneira era um "escape", diante da dificuldae da matéria (começou sabendo muito pouco)</p><p>#primeirocontatoconteúdo</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, '2014-10-16', 5, 'tutor', 71, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, '2014-10-16', 5, 'tutor', 72, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, '2014-10-16', 5, 'tutor', 65, NULL, 'Bem humorado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, '2014-10-16', 5, 'tutor', 62, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, '2014-10-16', 5, 'tutor', 63, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, '2014-10-16', 5, 'tutor', 64, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, '2014-10-16', 5, 'tutor', 70, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, '2014-10-16', 5, 'tutor', NULL, 18, '<p>Exercícios da ficha de Biologia molecular (tradução de códons)</p><p>-Pareceu não ter tido nenhum contato com a matéria, anteriormente. Tive que dar uma longa introdução (20 minutos). Acompanou com certa dificuldade.</p><p>- Fez sozinhos a tradução de códons de RNA</p><p>- Foi feito, apenas, as questões 1 e 13 mas foi um grande avanço no entendimento dessa matéria.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, '2014-10-18', 5, 'tutor', 77, NULL, '11:00 a 14:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, '2014-10-18', 5, 'tutor', 61, NULL, '<p>-Bastante lento e desatento. Atenção comprometida. Encadeamento das ideias afetando até a fala, que está lenta e truncada.</p><p>-Atenção melhorou um pouco e ele parece estar acompanhando a narrativa do exercício (Não se perdeu, após cacular Px, lembrou que estava fazendo para calcular Fel)</p><p>- começou a suspirar, se entregas a absorção e não demonstrar engajamento</p><p>#oscilação</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, '2014-10-18', 5, 'tutor', 71, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, '2014-10-18', 5, 'tutor', 72, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, '2014-10-18', 5, 'tutor', 65, NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, '2014-10-18', 5, 'tutor', 62, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, '2014-10-18', 5, 'tutor', 63, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, '2014-10-18', 5, 'tutor', 64, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, '2014-10-18', 5, 'tutor', NULL, 17, '<p>Recomeçamos a ficha 12 (1,2,4,5), do final do dia 14, e a 13. </p><p>- No calculo d Px, percebeu que massa era diferente de peso e calculou o mesmo. (Claro, sempre perguntando)</p><p>-Muito tempo na questão 4. </p><p>- Começou a acompanhar a questão 5, de energia, e está fazendo sozinho</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, '2014-10-19', 5, 'tutor', 77, NULL, '11:00 a 15:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, '2014-10-19', 5, 'tutor', 61, NULL, '<p>-Está atento, engajado mas começamos com uma questão difícil que o está deixando ansioso. Independencia baixa desde o início. Quase uma hora pra fazer o exercício (bastante Guiado)</p><p>-Travou ao fazer a soma da área</p><p>-Não estou deixando ele ficar absorto</p><p><br></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, '2014-10-19', 5, 'tutor', 65, NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, '2014-10-19', 5, 'tutor', 62, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, '2014-10-19', 5, 'tutor', 63, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, '2014-10-19', 5, 'tutor', 64, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, '2014-10-19', 5, 'tutor', NULL, 17, '<p>Ficha 13- estudando pra prova</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, '2014-10-20', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, '2014-10-20', 5, 'tutor', 61, NULL, '<p>-Começou muito nervoso e derrotado (parou um teste no meio). Mudou de postura após uma conversa em que disse que ele tinha que ser a ultima pessoa a se colocar pra baixo, que esse é um ano duro, de autoconhecimento e que ele tinha que se aceitar e que vale tanto quanto os outros.</p><p>-Passou a demonstrar engajamento e a atenção e independencia melhoraram</p><p>- Piorou depois que entrou uma mensagem no facebook e teve contato com seu objeto de obsessão. Briguei muito com ele e desliguei o computador.  Voltou a melhorar mas com algumas absorções. </p><p>-Ao final, demonstrou maior autonomia durante a leitura e marcação do texto de história. melhorou o humor e se tornou mais confiante.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, '2014-10-20', 5, 'tutor', 65, NULL, 'Mal humorado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, '2014-10-20', 5, 'tutor', 62, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, '2014-10-20', 5, 'tutor', 63, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, '2014-10-20', 5, 'tutor', 64, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, '2014-10-20', 5, 'tutor', NULL, 18, '<p>Estudando para o teste de biologia em que teve que parar no meio.</p><p>- Efeito do oxigênio na absorção do nitrogênio/ Que moléculas são produzidas com o nitrogênio/ Que forma de nitrogênio são produzidas pela planta/ Que enzima produz o RNA-m e expliquei a função do STOP e START codon.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, '2014-10-20', 5, 'tutor', NULL, 20, '<p>Leitura e marcação de texto.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, '2015-05-07', 1, 'pais', 75, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, '2015-05-07', 1, 'pais', 35, NULL, '07/05/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, '2015-05-07', 1, 'pais', 74, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, '2015-05-07', 1, 'pais', 76, NULL, '<p>asdfsfas</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, '2015-05-07', 5, 'tutor', 65, NULL, 'Irritado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, '2015-05-07', 5, 'tutor', 62, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, '2015-05-07', 5, 'tutor', 63, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, '2015-05-07', 5, 'tutor', 64, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, '2015-05-07', 5, 'tutor', 65, NULL, 'Irritado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, '2015-05-07', 5, 'tutor', 62, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, '2015-05-07', 5, 'tutor', 63, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, '2015-05-07', 5, 'tutor', 64, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, '2015-05-07', 5, 'tutor', 65, NULL, 'Irritado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, '2015-05-07', 5, 'tutor', 62, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, '2015-05-07', 5, 'tutor', 63, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, '2015-05-07', 5, 'tutor', 64, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, '2015-05-09', 5, 'tutor', 61, NULL, '<p>dasdada</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, '2015-05-09', 5, 'tutor', 71, NULL, 'dasdasdada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, '2015-05-09', 5, 'tutor', 72, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, '2015-05-09', 5, 'tutor', 65, NULL, 'Irritado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, '2015-05-09', 5, 'tutor', 62, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, '2015-05-09', 5, 'tutor', 63, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, '2015-05-09', 5, 'tutor', 64, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, '2015-05-09', 5, 'tutor', 70, NULL, 'adadasda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, '2015-05-09', 5, 'tutor', 68, NULL, '<p>dasd</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, '2015-05-09', 5, 'tutor', 61, NULL, '<p>fsafsafas</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, '2015-05-09', 5, 'tutor', 71, NULL, '423421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, '2015-05-09', 5, 'tutor', 72, NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, '2015-05-09', 5, 'tutor', 65, NULL, 'Bem humorado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, '2015-05-09', 5, 'tutor', 62, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, '2015-05-09', 5, 'tutor', 63, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, '2015-05-09', 5, 'tutor', 64, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, '2015-05-09', 5, 'tutor', 70, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, '2015-05-09', 5, 'tutor', 68, NULL, 'dsadadadsa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, '2015-05-08', 5, 'tutor', 61, NULL, '<p>fasdfsafs</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, '2015-05-08', 5, 'tutor', 71, NULL, '1233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, '2015-05-08', 5, 'tutor', 72, NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, '2015-05-08', 5, 'tutor', 65, NULL, 'Bem humorado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, '2015-05-08', 5, 'tutor', 62, NULL, '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, '2015-05-08', 5, 'tutor', 63, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, '2015-05-08', 5, 'tutor', 64, NULL, '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, '2015-05-08', 5, 'tutor', 70, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, '2015-05-08', 5, 'tutor', 68, NULL, 'fsfsdfasfsaas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, '2015-02-09', 1, 'pais', 75, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, '2015-02-09', 1, 'pais', 35, NULL, '09/05/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, '2015-02-09', 1, 'pais', 74, NULL, '666', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, '2015-05-20', 1, 'tutor', 3, NULL, '<p>testestssetsts</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, '2015-05-20', 1, 'tutor', 9, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, '2015-05-20', 1, 'tutor', 11, NULL, '20/05/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, '2015-05-20', 1, 'tutor', 15, NULL, '1242', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, '2015-05-20', 1, 'tutor', 22, NULL, '<p>fasdfasfs</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, '2015-05-20', 1, 'tutor', 32, NULL, '20/05/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, '2015-05-20', 1, 'tutor', 73, NULL, '2424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, '2015-05-20', 1, 'tutor', 80, NULL, 'Alegre', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, '2015-05-19', 1, 'tutor', 3, NULL, '<p>safadsf</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, '2015-05-19', 1, 'tutor', 9, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, '2015-05-19', 1, 'tutor', 11, NULL, '20/05/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, '2015-05-19', 1, 'tutor', 15, NULL, '4213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, '2015-05-19', 1, 'tutor', 22, NULL, '<p>fsaf12</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, '2015-05-19', 1, 'tutor', 32, NULL, '20/05/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, '2015-05-19', 1, 'tutor', 73, NULL, '2423', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, '2015-05-19', 1, 'tutor', 80, NULL, 'Triste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, '2015-05-21', 1, 'tutor', 9, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, '2015-05-21', 1, 'tutor', 11, NULL, '21/05/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, '2015-05-21', 1, 'tutor', 32, NULL, '21/05/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, '2015-05-21', 1, 'tutor', 80, NULL, 'Feliz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, '2015-04-21', 1, 'tutor', 9, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, '2015-04-21', 1, 'tutor', 11, NULL, '21/04/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, '2015-04-21', 1, 'tutor', 32, NULL, '21/05/2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, '2015-04-21', 1, 'tutor', 80, NULL, 'Feliz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, '2014-10-22', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, '2014-10-22', 5, 'tutor', 61, NULL, '<p>-Comecei deixando ele fazer sozinho. Quando percebeu, passou a mão na testa e falou que tá muito nervoso. Dei um corte e mandei continuar, o que ele fez.</p><p>-Apesar de estar um pouco apático, não está se disraindo muito e demonstra engajamento.</p><p><br></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, '2014-10-22', 5, 'tutor', 71, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(222, '2014-10-22', 5, 'tutor', 72, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, '2014-10-22', 5, 'tutor', 65, NULL, 'Irritado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, '2014-10-22', 5, 'tutor', 62, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(225, '2014-10-22', 5, 'tutor', 63, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(226, '2014-10-22', 5, 'tutor', 64, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, '2014-10-22', 5, 'tutor', NULL, 24, '<p>-Trabalho + Questões no caderno sore ética e moral</p><p>-Fez a parte da ética sozinho.</p><p>-Muita dificuldade em entender o conceito de caráter: Desenvolvimento pobre, sonolento e confuso. Mudando de opinião o tempo todo sobre "o caráter do ser humano ser aperfeiçoável"</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(228, '2014-10-22', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(229, '2014-10-22', 5, 'tutor', 61, NULL, '<p>-Comecei deixando ele fazer sozinho. Quando percebeu, passou a mão na testa e falou que tá muito nervoso. Dei um corte e mandei continuar, o que ele fez.</p><p>-Apesar de estar um pouco apático, não está se disraindo muito e demonstra engajamento.</p><p><br></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(230, '2014-10-22', 5, 'tutor', 71, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(231, '2014-10-22', 5, 'tutor', 72, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(232, '2014-10-22', 5, 'tutor', 65, NULL, 'Irritado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(233, '2014-10-22', 5, 'tutor', 62, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(234, '2014-10-22', 5, 'tutor', 63, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, '2014-10-22', 5, 'tutor', 64, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(236, '2014-10-22', 5, 'tutor', NULL, 24, '<p>-Trabalho + Questões no caderno sore ética e moral</p><p>-Fez a parte da ética sozinho.</p><p>-Muita dificuldade em entender o conceito de caráter: Desenvolvimento pobre, sonolento e confuso. Mudando de opinião o tempo todo sobre "o caráter do ser humano ser aperfeiçoável"</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(237, '2014-10-23', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(238, '2014-10-23', 5, 'tutor', 61, NULL, '<p>-COmeçou muito mal humorado porque me recusei a deixá-lo passar pro papel, em aula, o resumo de história que já havíamos marcado no livro. Depois de uma conversa séria ele aceitou, me pediu descupas e passamos para literatura. </p><p>-Atenção e bom humor quando estavaos estudando estrutura e formação das palavras.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(239, '2014-10-23', 5, 'tutor', 65, NULL, 'Bem humorado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(240, '2014-10-23', 5, 'tutor', 62, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(241, '2014-10-23', 5, 'tutor', 63, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(242, '2014-10-23', 5, 'tutor', 64, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(243, '2014-10-23', 5, 'tutor', 70, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(244, '2014-10-23', 5, 'tutor', NULL, 23, '<p>-Estudo para o teste: Estrutura e formação de palavras Quinhentismo, Introdução ao barroco)</p><p>-Escreveu quase que sozinho o resumo de Quinhetismo.</p><p>-Bom desempenho em estrutura e formação das palavras</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(245, '2014-11-06', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(246, '2014-11-06', 5, 'tutor', 61, NULL, '<p>-Ótimo humor. Falante. Ótima atenção.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(247, '2014-11-06', 5, 'tutor', 65, NULL, 'Empolgado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(248, '2014-11-06', 5, 'tutor', 62, NULL, '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(249, '2014-11-06', 5, 'tutor', 63, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(250, '2014-11-06', 5, 'tutor', 64, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(251, '2014-11-06', 5, 'tutor', NULL, 18, '<p>-Estudando para a prova, que ocorrerá na próxima quarta.</p><p>-Estudando Meiose. Procurou sozinho a informação no livro e foi capaz de encontrar o que queríamos.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(252, '2014-11-07', 5, 'tutor', 77, NULL, '11:00 a 13:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(253, '2014-11-07', 5, 'tutor', 61, NULL, '<p>- A aula foi sábado de manhã e ele disse que esqueceu de tomar o remédio.</p><p>- A aula não aconteceu. Ele se mostrou muito neervoso, não conseguiu se concentrar, eu o pressionei e ele não voltou ao foco. Ficou muito irritado e se agredindo. Interrompi a aula</p><p>-Depois ele me ligou, os pais conversaram com ele. Ele pediu desculpas emocionado e marcamos uma aula pro dia seguinte.</p><p>#aulainterrompida #semremedio</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(254, '2014-11-07', 5, 'tutor', 71, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(255, '2014-11-07', 5, 'tutor', 65, NULL, 'Irritado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(256, '2014-11-07', 5, 'tutor', 62, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(257, '2014-11-07', 5, 'tutor', 63, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(258, '2014-11-07', 5, 'tutor', 64, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(259, '2014-11-07', 5, 'tutor', NULL, 18, '<p>Estudando para a prova de Biologia</p><p>-Três matérias foram amrcadas pelo professor: Ciclo do Nitrogênio, Síntese de proteína e Divisão celular.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(260, '2014-11-08', 5, 'tutor', 77, NULL, '13:00 a 16:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(261, '2014-11-08', 5, 'tutor', 61, NULL, '<p>- Após ter ligado e pedido desculpas pela resistência do dia anterior, marcamos a aula no domingo. </p><p>-Puxou assunto sobre estar de saco cheio mas não poder agir desta maneira. Saudades da escola (??) e amigos.</p><p>-Atenção piorou ao final (Cansado), mas esteve disposto.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(262, '2014-11-08', 5, 'tutor', 71, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(263, '2014-11-08', 5, 'tutor', 72, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(264, '2014-11-08', 5, 'tutor', 65, NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(265, '2014-11-08', 5, 'tutor', 62, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(266, '2014-11-08', 5, 'tutor', 63, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(267, '2014-11-08', 5, 'tutor', 64, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(268, '2014-11-08', 5, 'tutor', NULL, 18, '<p>-Estudando para a prova: Exercicio Meiose, Cliclo do Nitrogênio e síntese proteína. </p><p>-Terminamos a questão de meiose.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(269, '2014-11-12', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(270, '2014-11-12', 5, 'tutor', 61, NULL, '<p>-Chegou tranquilo até perceber que não lembrava de parte da matéria da prova. Ficou muito nervoso, foi agressivo umas duas vezes (eu deveria ter minimizado o esquecimento ou seguido na linha da responsabilização mais tranquila)</p><p>-Depois do segundo ataque de nervos, ele pegou o rivotril. Seu humor melhorou em 5 minutos. "Esse remédio é muito bom, só de pegar já me acalma, me deixa confiante".</p><p>-Sorrisos imotivados constantes.</p><p>-Logo que tomou o rmédio, me chamou para perguntar se deveria dar tanta importância para essas coisas (esquecer material, esquecer matéria....). Expliquei que só até aonde lhe fazia bem. Que isso não podia fazer mais mal que o esquecimento...</p><p>-Quando se distraiu e eu chamei a atenção e ele não pareceu surpreso ou constrangido. Deu um sorrisinho.</p><p>-Atenção ficou se desprendendo na meia hora final. (Predendo-se em coisas aleatórias, por alguns segundos, cada)</p><p>#rivotril</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(271, '2014-11-12', 5, 'tutor', 71, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(272, '2014-11-12', 5, 'tutor', 72, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(273, '2014-11-12', 5, 'tutor', 65, NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(274, '2014-11-12', 5, 'tutor', 62, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(275, '2014-11-12', 5, 'tutor', 63, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(276, '2014-11-12', 5, 'tutor', 64, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(277, '2014-11-12', 5, 'tutor', NULL, 23, '<p>Estudando para a prova de literatura: Arcadismo e Barroco x Classicismo</p><p>-Fizemos o resumo, comigo sempre guiando e explicando os exemplos, como é típico do estudo de estilos literários.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(278, '2014-11-13', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(279, '2014-11-13', 5, 'tutor', 61, NULL, '<p>-Cheguei um pouco mais cedo, João demorou, porquê estava dormindo. </p><p>-Chegou muito lento, não tinha certeza se havia lavado o rosto.</p><p>-Está lento e pouco independente, mas as vezes consegue recordar coisas como placas tectõnicas e a instabilidade das regiôes de encontro.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(280, '2014-11-13', 5, 'tutor', 65, NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(281, '2014-11-13', 5, 'tutor', 62, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(282, '2014-11-13', 5, 'tutor', 63, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(283, '2014-11-13', 5, 'tutor', 64, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(284, '2014-11-13', 5, 'tutor', NULL, 21, '<p>-Estudando para a prova de Geografia: Dinâmica da terra.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(285, '2014-11-15', 5, 'tutor', 77, NULL, '11:00 a 14:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(286, '2014-11-15', 5, 'tutor', 61, NULL, '<p>- Me atendeu de bom humor, sorriso no rosto.</p><p><o:p></o:p></p><p>-Concentrado,\r\ndisposto e independente. Abriu o livro e foi direto para o capítulo de óxidos,\r\ncopiando a definição sozinho.<o:p></o:p></p><p>-Na hora\r\nde dar exemplos, queria dar exemplos de elementos e não de óxidos.\r\nFicou um pouco confuso quando o interpelei sobre se era pra dar exemplos\r\nde elementos. Até que eu o perguntei sobre o que era o trabalho e ele\r\n"ácidos", fazendo cara feia, percebendo que tava longe do contexto.\r\nTive que o conduzir até óxidos. <o:p></o:p></p><p><span class="redactor-invisible-space">-Consegui\r\nresgatar a linha associativa, quando ele travou na equação de desidratação de\r\nH2SO4 - H2O=SO3.</span><strong>Pedi para\r\nele pensar no que estávamos falando e qual foi a última coisa sobre a qual\r\nhavíamos falado. O entendimento veio quase que imediatamente.</strong><o:p></o:p></p><p><span class="redactor-invisible-space">-Começou\r\na travar, aparentando irritação. Quando perguntei: "Lembrei de uma coisa\r\nque me deixou irritado". Seguiu irritado/travado e perdeu independência e\r\nprocurando as coisas com vontade..</span><o:p></o:p></p><p><span class="redactor-invisible-space">-Parece,\r\nrealmente, abalado, mas lutando para não desabar</span><o:p></o:p></p><p><span class="redactor-invisible-space">-"Vamos\r\nlá, Johny, está quase acabando por hoje", "O Problema não é\r\nesse", "Então, qual é?", "Uhm deixa pra lá"</span><o:p></o:p></p><p><strong>- Não está absorto mas\r\nfica travadão, quase temendo, está demais, mas continua tentando....</strong><o:p></o:p></p><p><strong>-Depois fui saber que\r\nhavia brigado com o pai, mas nao sei o motivo.</strong><o:p></o:p></p><p>#disassociaçãodocontexto\r\n#brigafamília<o:p></o:p></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(287, '2014-11-15', 5, 'tutor', 71, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(288, '2014-11-15', 5, 'tutor', 72, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(289, '2014-11-15', 5, 'tutor', 65, NULL, 'Mal humorado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(290, '2014-11-15', 5, 'tutor', 62, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(291, '2014-11-15', 5, 'tutor', 63, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(292, '2014-11-15', 5, 'tutor', 64, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(293, '2014-11-15', 5, 'tutor', NULL, 16, '<p>-Trabalho para avaliação final: Óxidos. </p><p>-Teve dificuldade em perceber que o Flúor era uma exceção a formação de óxidos, e que o asterisco respondia à pergunta: "Porque o Flúor é uma exceção?"<span class="redactor-invisible-space">. Depois d eu o cercear muito com peguntas, chegou a constatação de que "o Flúor não combina com o Oxigênio para formar óxidos"</span><br></p><p><span class="redactor-invisible-space"><br></span></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(294, '2014-11-16', 5, 'tutor', 77, NULL, '11:00 a 13:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(295, '2014-11-16', 5, 'tutor', 61, NULL, '<p>-Bem humorado, falante. </p><p>-Deixei ele fazer sozinho, avisando. Ele perguntou "tem certeza?" Disse que sim e ele começou a fazer. Se perdeu por 10segundos na espiral do caderno. </p><p>- Muito orgulhoso ao perceber que acertou a primeira. Sorriso largo. Demorou cerca de 5 minutos</p><p>-Muito disperso, mas fazendo sozinho.</p><p>-Seguiu bem, com independencia boa e atenção fraca. Fizemos todos os de P.A.</p><p>-Foram 8 questões, deixei 1 pra casa</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(296, '2014-11-16', 5, 'tutor', 71, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(297, '2014-11-16', 5, 'tutor', 72, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(298, '2014-11-16', 5, 'tutor', 65, NULL, 'Bem humorado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(299, '2014-11-16', 5, 'tutor', 62, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(300, '2014-11-16', 5, 'tutor', 63, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(301, '2014-11-16', 5, 'tutor', 64, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(302, '2014-11-16', 5, 'tutor', NULL, 15, '<p>- Estudando para a prova de matemática.</p><p>Exercícios que a professora marcou de PA e PG</p><p>-Problemas com álgebra. Não sabe se pode multiplicas 9 por 2X ou somar X com 18X (resolvi perguntando quanto era 1 joão mais 18 "joãos"</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(303, '2014-11-16', 5, 'tutor', 77, NULL, '11:00 a 13:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(304, '2014-11-16', 5, 'tutor', 61, NULL, '<p>-Bem humorado, falante. </p><p>-Deixei ele fazer sozinho, avisando. Ele perguntou "tem certeza?" Disse que sim e ele começou a fazer. Se perdeu por 10segundos na espiral do caderno. </p><p>- Muito orgulhoso ao perceber que acertou a primeira. Sorriso largo. Demorou cerca de 5 minutos</p><p>-Muito disperso, mas fazendo sozinho.</p><p>-Seguiu bem, com independencia boa e atenção fraca. Fizemos todos os de P.A.</p><p>-Foram 8 questões, deixei 1 pra casa</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(305, '2014-11-16', 5, 'tutor', 71, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(306, '2014-11-16', 5, 'tutor', 72, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(307, '2014-11-16', 5, 'tutor', 65, NULL, 'Bem humorado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(308, '2014-11-16', 5, 'tutor', 62, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(309, '2014-11-16', 5, 'tutor', 63, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(310, '2014-11-16', 5, 'tutor', 64, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(311, '2014-11-16', 5, 'tutor', NULL, 15, '<p>- Estudando para a prova de matemática.</p><p>Exercícios que a professora marcou de PA e PG</p><p>-Problemas com álgebra. Não sabe se pode multiplicas 9 por 2X ou somar X com 18X (resolvi perguntando quanto era 1 joão mais 18 "joãos"</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(312, '2015-02-25', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(313, '2015-02-25', 5, 'tutor', 61, NULL, '<p>-João começou a aula muitonervoso e frustrado com a falta de amigos, demonstrando ansiedade em afirmar que mudou. Depois de longa conversa e acessos de raiva, ordenei, calmamente que ele passasse à tarefa, o que ele fez, à revelia.</p><p>-Apesar da constante raiva, conduziu bem os exercícios, com alguns momentos de dispersão branda, causada pela raiva e ocupação pelo problema da falta de amigos (dispersão concentrada em outra coisa)</p><p>Motivo da raiva: Alegava solidão e falta de amigos (aparente obsessão pela questão. </p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(314, '2015-02-25', 5, 'tutor', 71, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(315, '2015-02-25', 5, 'tutor', 72, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(316, '2015-02-25', 5, 'tutor', 65, NULL, 'Mal humorado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(317, '2015-02-25', 5, 'tutor', 62, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(318, '2015-02-25', 5, 'tutor', 63, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(319, '2015-02-25', 5, 'tutor', 64, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `student_input_values` (`id`, `date`, `student_id`, `actor`, `student_input_id`, `student_lesson_id`, `value`, `nota_1`, `nota_2`, `nota_3`, `nota_4`, `nota_5`, `nota_6`, `nota_7`, `nota_8`) VALUES
(320, '2015-02-25', 5, 'tutor', NULL, 15, '<p>-Coseno, seno e tangente da soma. (primeiros exercícios)</p><p><br></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(321, '2015-04-27', 5, 'tutor', 77, NULL, '18:00 a 20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(322, '2015-04-27', 5, 'tutor', 61, NULL, '<p>-Humor melhor, percebe-se o esforço em atender a exigência da aula passada em relação a isso. </p><p>- HUmor foi piorando a cada dificuldade econtrada e no fim, já não queria fazer  e rsmungava muito. Em determinado momento, perguntei se ele queria que eu sempre produrasse as formula pra ele, no que ele respondeu "sim", de cabeça baixa e tom leve de desafio. </p><p>-Tentou travar a aula algumas vezes, falando de problemas e pensamentos invasivos.</p><p>-tive que terminar a aula antes, como combinado, caso ele não melhorasse seu humor.</p><p>-Me ligou, pedindo desculpas. Aceitei com parcimônia e dizendo que ele ia ter que lidar com issona próxima aula. O dever precisa ser feito.</p><p>#aulainterrompida </p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(323, '2015-04-27', 5, 'tutor', 71, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(324, '2015-04-27', 5, 'tutor', 72, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(325, '2015-04-27', 5, 'tutor', 65, NULL, 'Irritado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(326, '2015-04-27', 5, 'tutor', 62, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(327, '2015-04-27', 5, 'tutor', 63, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(328, '2015-04-27', 5, 'tutor', 64, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(329, '2015-04-27', 5, 'tutor', NULL, 15, '<p>-Exercício de seno, cosseno, tangente da soma.</p><p>- Exercício fácil. Teve muita dificuldade em seguir o comando da questão, ao invés de trocar o "a" e o "b" pelos valores dados na questão, estava se baseando erroneamente em outros exercícios do caderno.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `student_lessons`
--

CREATE TABLE IF NOT EXISTS `student_lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Fazendo dump de dados para tabela `student_lessons`
--

INSERT INTO `student_lessons` (`id`, `student_id`, `name`, `created`, `modified`) VALUES
(2, 1, 'Química', '2014-11-08 22:54:46', '2014-11-08 22:54:46'),
(3, 1, 'Biologia', '2014-11-08 22:56:25', '2014-11-08 22:56:25'),
(4, 1, 'Física', '2014-11-08 22:56:29', '2014-11-08 22:56:29'),
(5, 1, 'História', '2014-11-08 22:56:31', '2014-11-08 22:56:31'),
(6, 1, 'Português', '2014-11-08 22:56:36', '2014-11-08 22:56:36'),
(7, 1, 'Literatura', '2014-11-08 22:56:37', '2014-11-08 22:56:37'),
(10, 2, 'Futebol', '2015-03-15 11:49:31', '2015-03-15 11:49:31'),
(11, 2, 'Malandragem', '2015-03-15 11:49:38', '2015-03-15 11:49:38'),
(12, 2, 'HomeGrown', '2015-03-15 11:53:46', '2015-03-15 11:53:46'),
(14, 1, 'Abacatinho', '2015-03-18 13:35:49', '2015-03-18 13:35:49'),
(15, 5, 'Matemática', '2015-03-19 20:38:03', '2015-03-19 20:38:03'),
(16, 5, 'Química', '2015-03-19 20:38:13', '2015-03-19 20:38:13'),
(17, 5, 'Física', '2015-03-19 20:38:18', '2015-03-19 20:38:18'),
(18, 5, 'Biologia', '2015-03-19 20:38:24', '2015-03-19 20:38:24'),
(20, 5, 'História', '2015-03-19 20:38:40', '2015-03-19 20:38:40'),
(21, 5, 'Geografia', '2015-03-19 20:38:48', '2015-03-19 20:38:48'),
(23, 5, 'Português/Literatura', '2015-03-19 20:39:12', '2015-03-19 20:39:12'),
(24, 5, 'Filosofia', '2015-05-28 08:48:11', '2015-05-28 08:48:11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `student_parents`
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
  `dad_avatar` varchar(255) DEFAULT NULL,
  `mom_avatar` varchar(255) DEFAULT NULL,
  `tutor_avatar` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `student_parents`
--

INSERT INTO `student_parents` (`id`, `student_id`, `mom_name`, `mom_phone`, `mom_email`, `mom_password`, `dad_name`, `dad_phone`, `dad_email`, `dad_password`, `tutor_name`, `tutor_phone`, `tutor_email`, `tutor_password`, `dad_avatar`, `mom_avatar`, `tutor_avatar`, `created`, `modified`) VALUES
(1, 1, 'Eliete', '21 35868415', 'luizhrqas@gmail.com', '$2a$10$DqhuRMmrSt5lPHPkvPKz3eW0YyId6zPinU9ghfnrMVFH/X3BPB6bm', 'Exemplo 4', '21 35868414', 'luizhrqas@gmail.com', '$2a$10$Cd6m/fpmWDQhR6GkYNm1geW5ZBaTVo5LcPj/.pF9YxIXtb/Bx36Gi', 'Exemplo 6', '2135868142', 'luizhrqas6@gmail.com', '$2a$10$FD2m5pQH5v3CN5.EBsOyJOUuWwNZAcz.WvmQCx5PPUXJb8nFUFOBe', NULL, NULL, NULL, '2014-11-08 22:42:56', '2015-05-07 05:25:18'),
(2, 2, '', '', '', NULL, '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '2015-03-04 20:13:02', '2015-03-10 20:21:00'),
(3, 3, 'Biroleibe', '9675644', 'plimbgd@gjhnm.com', NULL, 'Falensi', '655433221', '12sad@sçkjd.com', NULL, 'Tchung', '085765765', 'DKJHkjd@gdnsdd.com', '', NULL, NULL, NULL, '2015-03-04 20:17:12', '2015-03-12 20:43:03'),
(4, 4, 'asasasasasasasa', 'qwqwqwq', 'asasa4@gmail.com', NULL, 'asasaqwqwqw', 'qqwqwqw', 'asasa1@gmail.com', NULL, 'qwqwqwq', 'qwqwqwq', 'asasa1@gmail.com', '', NULL, NULL, NULL, '2015-03-11 12:16:39', '2015-03-11 12:16:39'),
(5, 5, 'Maria Cristina Saules Peña', '9675644', 'kikaspena@gmail.com', NULL, 'Bruno Seraphim Cotrina Pena', '972711717', 'bs.pena@uol.com.b', NULL, 'Pedro Lima Sampaio', '972711717', 'plima1@gmail.com', '$2a$10$HanD/p4uqJiXCx0Z/RXODeF0yV7XIuaw6byR2LQkiPvIKBCABgDZe', NULL, NULL, 'img-2162.JPG', '2015-03-19 20:24:53', '2015-05-28 08:50:59');

-- --------------------------------------------------------

--
-- Estrutura para tabela `student_psychiatrists`
--

CREATE TABLE IF NOT EXISTS `student_psychiatrists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `student_psychiatrists`
--

INSERT INTO `student_psychiatrists` (`id`, `student_id`, `name`, `phone`, `email`, `password`, `avatar`, `created`, `modified`) VALUES
(1, 1, 'Exemplo 1', '21 35868411', 'luizhrqas1@gmail.com', '', NULL, '2014-11-08 22:42:56', '2015-05-07 05:25:17'),
(2, 2, 'Marcia', '22222222', '', '', NULL, '2015-03-04 20:13:02', '2015-03-10 20:21:00'),
(3, 3, 'Marcia', '22222222', 'jjjjjjj@jjjjj.com', '', NULL, '2015-03-04 20:17:12', '2015-03-12 20:43:03'),
(4, 4, 'asasasasas', 'asasa', 'asas6a@gmail.com', '', NULL, '2015-03-11 12:16:39', '2015-03-11 12:16:39'),
(5, 5, 'Márcia Tavares', '996016969', 'tavaresmarcia@globo.com', '', NULL, '2015-03-19 20:24:53', '2015-04-25 16:32:41');

-- --------------------------------------------------------

--
-- Estrutura para tabela `student_schools`
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
  `coordinator_avatar` varchar(255) DEFAULT NULL,
  `mediator_avatar` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `student_schools`
--

INSERT INTO `student_schools` (`id`, `student_id`, `mediator_name`, `mediator_phone`, `mediator_email`, `mediator_password`, `coordinator_name`, `coordinator_phone`, `coordinator_email`, `coordinator_password`, `coordinator_avatar`, `mediator_avatar`, `created`, `modified`) VALUES
(1, 1, 'Exemplo 2', '21 35868412', 'luizhrqas2@gmail.com', NULL, 'Exemplo 3', '21 35868413', 'luizhrqas3@gmail.com', NULL, NULL, NULL, '2014-11-08 22:42:56', '2015-05-07 05:25:17'),
(2, 2, 'Jun', '22222233', '', NULL, '', '', '', NULL, NULL, NULL, '2015-03-04 20:13:02', '2015-03-10 20:21:00'),
(3, 3, 'Jun', '22222233', 'jjjjjy@jjjy.com', NULL, 'finnerty', '23456778', 'ggg@ff.com', NULL, NULL, NULL, '2015-03-04 20:17:12', '2015-03-12 20:43:03'),
(4, 4, 'asasa', 'asasa', 'asasa@gmail.com', NULL, 'asasasasasas', 'qwqwqw', 'asasa3@gmail.com', NULL, NULL, NULL, '2015-03-11 12:16:39', '2015-03-11 12:16:39'),
(5, 5, 'Karina Oliveira', '976616564', 'karina19oliveira@yahoo.com.br', NULL, 'Penha Cristina Freitas', '99999999', 'pcristina.freitas@hotmail.com', NULL, NULL, NULL, '2015-03-19 20:24:53', '2015-04-25 16:32:41');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'ator', '$2a$10$5xtbNLRVwKKS/8AU3wUguO1q/gL3tQfOm2mifHZljs7P/s5.NJcSS', 'actor', '2014-11-11 02:59:34', '2014-11-11 02:59:34'),
(2, 'luizhrqas_admin@gmail.com', '$2a$10$DqhuRMmrSt5lPHPkvPKz3eW0YyId6zPinU9ghfnrMVFH/X3BPB6bm', 'admin', '2014-11-11 02:59:53', '2014-11-11 02:59:53'),
(3, 'pedro@redepga.com.br', '', 'admin', '2014-11-11 02:59:53', '2014-11-11 02:59:53'),
(4, 'student', '$2a$10$5xtbNLRVwKKS/8AU3wUguO1q/gL3tQfOm2mifHZljs7P/s5.NJcSS', 'student', '2014-11-11 02:59:34', '2014-11-11 02:59:34');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
