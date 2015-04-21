--
-- Pierre Baron 
-- export de la base `pga` au 21-04-2015
--


-- -----------------------------
-- creation de la base `pga`
-- -----------------------------
CREATE DATABASE `pga` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
0-- --------------------------------------------------------

--
-- Structure de la table `chart_student_inputs`
--
CREATE TABLE `chart_student_inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chart_id` int(11) NOT NULL,
  `student_input_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `chart_student_inputs`
--
INSERT INTO chart_student_inputs (`id`, `chart_id`, `student_input_id`) VALUES ('1', '1', '74');
INSERT INTO chart_student_inputs (`id`, `chart_id`, `student_input_id`) VALUES ('2', '2', '74');


-- --------------------------------------------------------


--
-- Structure de la table `charts`
--
CREATE TABLE `charts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` enum('bar','column','line','pie','donut','stacked_column') NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `charts`
--
INSERT INTO charts (`id`, `name`, `type`, `config`, `student_id`, `input_id`, `base_color`, `columns`, `order`, `height`, `display_mode`, `created`, `modified`) VALUES ('1', 'abacate', 'bar', '', '1', '6', '', '6', '0', '300', '', '2015-04-20 16:44:25', '2015-04-20 16:44:25');
INSERT INTO charts (`id`, `name`, `type`, `config`, `student_id`, `input_id`, `base_color`, `columns`, `order`, `height`, `display_mode`, `created`, `modified`) VALUES ('2', 'abacate 2', 'line', '', '1', '6', '', '6', '0', '300', 'mes_a_mes', '2015-04-20 17:23:51', '2015-04-20 18:33:04');


-- --------------------------------------------------------


--
-- Structure de la table `feeds`
--
CREATE TABLE `feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL,
  `sidebar` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `feeds`
--
INSERT INTO feeds (`id`, `student_id`, `author`, `date`, `content`, `sidebar`, `created`, `modified`) VALUES ('1', '1', '', '2015-05-21', 'a:4:{i:0;a:5:{s:10:\"student_id\";s:1:\"1\";s:5:\"actor\";s:4:\"pais\";s:16:\"student_input_id\";s:2:\"75\";s:5:\"value\";s:1:\"1\";s:22:\"student_input_value_id\";s:1:\"1\";}i:1;a:5:{s:10:\"student_id\";s:1:\"1\";s:5:\"actor\";s:4:\"pais\";s:16:\"student_input_id\";s:2:\"35\";s:5:\"value\";s:10:\"21/05/2015\";s:22:\"student_input_value_id\";s:1:\"2\";}i:2;a:6:{s:10:\"student_id\";s:1:\"1\";s:5:\"actor\";s:4:\"pais\";s:16:\"student_input_id\";s:2:\"74\";s:4:\"type\";s:8:\"numerico\";s:5:\"value\";s:3:\"123\";s:22:\"student_input_value_id\";s:1:\"3\";}i:3;a:6:{s:10:\"student_id\";s:1:\"1\";s:5:\"actor\";s:4:\"pais\";s:16:\"student_input_id\";s:2:\"76\";s:4:\"type\";s:5:\"texto\";s:5:\"value\";s:15:\"<p>fdsafsdf</p>\";s:22:\"student_input_value_id\";s:1:\"4\";}}', '', '2015-04-21 22:43:19', '2015-04-21 22:43:19');
INSERT INTO feeds (`id`, `student_id`, `author`, `date`, `content`, `sidebar`, `created`, `modified`) VALUES ('2', '1', '', '2015-04-21', 'a:3:{i:0;a:5:{s:10:\"student_id\";s:1:\"1\";s:5:\"actor\";s:4:\"pais\";s:16:\"student_input_id\";s:2:\"75\";s:5:\"value\";s:1:\"1\";s:22:\"student_input_value_id\";s:1:\"5\";}i:1;a:5:{s:10:\"student_id\";s:1:\"1\";s:5:\"actor\";s:4:\"pais\";s:16:\"student_input_id\";s:2:\"35\";s:5:\"value\";s:10:\"21/04/2015\";s:22:\"student_input_value_id\";s:1:\"6\";}i:2;a:6:{s:10:\"student_id\";s:1:\"1\";s:5:\"actor\";s:4:\"pais\";s:16:\"student_input_id\";s:2:\"74\";s:4:\"type\";s:8:\"numerico\";s:5:\"value\";s:3:\"123\";s:22:\"student_input_value_id\";s:1:\"7\";}}', '', '2015-04-21 22:46:11', '2015-04-21 22:46:11');
INSERT INTO feeds (`id`, `student_id`, `author`, `date`, `content`, `sidebar`, `created`, `modified`) VALUES ('3', '1', '', '2015-06-01', 'a:4:{i:0;a:5:{s:10:\"student_id\";s:1:\"1\";s:5:\"actor\";s:4:\"pais\";s:16:\"student_input_id\";s:2:\"75\";s:5:\"value\";s:1:\"1\";s:22:\"student_input_value_id\";s:1:\"8\";}i:1;a:5:{s:10:\"student_id\";s:1:\"1\";s:5:\"actor\";s:4:\"pais\";s:16:\"student_input_id\";s:2:\"35\";s:5:\"value\";s:10:\"01/06/2015\";s:22:\"student_input_value_id\";s:1:\"9\";}i:2;a:6:{s:10:\"student_id\";s:1:\"1\";s:5:\"actor\";s:4:\"pais\";s:16:\"student_input_id\";s:2:\"74\";s:4:\"type\";s:8:\"numerico\";s:5:\"value\";s:8:\"12434242\";s:22:\"student_input_value_id\";s:2:\"10\";}i:3;a:6:{s:10:\"student_id\";s:1:\"1\";s:5:\"actor\";s:4:\"pais\";s:16:\"student_input_id\";s:2:\"76\";s:4:\"type\";s:5:\"texto\";s:5:\"value\";s:14:\"<p>fsafasf</p>\";s:22:\"student_input_value_id\";s:2:\"11\";}}', '', '2015-04-21 22:51:58', '2015-04-21 22:51:58');


-- --------------------------------------------------------


--
-- Structure de la table `hashtag_student_input_values`
--
CREATE TABLE `hashtag_student_input_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hashtag_id` int(11) NOT NULL,
  `student_input_value_id` int(11) NOT NULL,
  `student_input_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `hashtag_student_input_values`
--
INSERT INTO hashtag_student_input_values (`id`, `hashtag_id`, `student_input_value_id`, `student_input_id`) VALUES ('1', '1', '3', '76');
INSERT INTO hashtag_student_input_values (`id`, `hashtag_id`, `student_input_value_id`, `student_input_id`) VALUES ('2', '1', '3', '76');
INSERT INTO hashtag_student_input_values (`id`, `hashtag_id`, `student_input_value_id`, `student_input_id`) VALUES ('3', '2', '3', '76');
INSERT INTO hashtag_student_input_values (`id`, `hashtag_id`, `student_input_value_id`, `student_input_id`) VALUES ('4', '3', '12', '76');


-- --------------------------------------------------------


--
-- Structure de la table `hashtags`
--
CREATE TABLE `hashtags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `actor` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `hashtags`
--
INSERT INTO hashtags (`id`, `student_id`, `actor`, `value`) VALUES ('1', '1', 'pais', '#fresno');
INSERT INTO hashtags (`id`, `student_id`, `actor`, `value`) VALUES ('2', '1', 'pais', '#testinho');
INSERT INTO hashtags (`id`, `student_id`, `actor`, `value`) VALUES ('3', '1', 'pais', '#teste');


-- --------------------------------------------------------


--
-- Structure de la table `inputs`
--
CREATE TABLE `inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `inputs`
--
INSERT INTO inputs (`id`, `name`) VALUES ('1', 'Calendário');
INSERT INTO inputs (`id`, `name`) VALUES ('2', 'Intervalo de Tempo');
INSERT INTO inputs (`id`, `name`) VALUES ('3', 'Registro Textual');
INSERT INTO inputs (`id`, `name`) VALUES ('4', 'Escala Numérica');
INSERT INTO inputs (`id`, `name`) VALUES ('5', 'Escala Texto');
INSERT INTO inputs (`id`, `name`) VALUES ('6', 'Número');
INSERT INTO inputs (`id`, `name`) VALUES ('7', 'Texto Privativo');


-- --------------------------------------------------------


--
-- Structure de la table `message_authors`
--
CREATE TABLE `message_authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `message_authors`
--
INSERT INTO message_authors (`id`, `message_id`, `model`, `prefix`, `foreign_key`) VALUES ('1', '1', 'StudentParent', 'mom_', '1');
INSERT INTO message_authors (`id`, `message_id`, `model`, `prefix`, `foreign_key`) VALUES ('2', '2', 'StudentParent', 'mom_', '1');
INSERT INTO message_authors (`id`, `message_id`, `model`, `prefix`, `foreign_key`) VALUES ('3', '3', 'StudentParent', 'mom_', '1');
INSERT INTO message_authors (`id`, `message_id`, `model`, `prefix`, `foreign_key`) VALUES ('4', '4', 'StudentParent', 'mom_', '1');


-- --------------------------------------------------------


--
-- Structure de la table `message_recipients`
--
CREATE TABLE `message_recipients` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `message_recipients`
--
INSERT INTO message_recipients (`id`, `message_id`, `recipient_1_model`, `recipient_1_prefix`, `recipient_1_foreign_key`, `recipient_2_model`, `recipient_2_prefix`, `recipient_2_foreign_key`, `recipient_3_model`, `recipient_3_prefix`, `recipient_3_foreign_key`) VALUES ('1', '1', 'StudentParent', 'mom_', '1', '', '', '', '', '', '');
INSERT INTO message_recipients (`id`, `message_id`, `recipient_1_model`, `recipient_1_prefix`, `recipient_1_foreign_key`, `recipient_2_model`, `recipient_2_prefix`, `recipient_2_foreign_key`, `recipient_3_model`, `recipient_3_prefix`, `recipient_3_foreign_key`) VALUES ('2', '2', 'StudentParent', 'tutor_', '1', '', '', '1', '', '', '');
INSERT INTO message_recipients (`id`, `message_id`, `recipient_1_model`, `recipient_1_prefix`, `recipient_1_foreign_key`, `recipient_2_model`, `recipient_2_prefix`, `recipient_2_foreign_key`, `recipient_3_model`, `recipient_3_prefix`, `recipient_3_foreign_key`) VALUES ('3', '3', 'StudentParent', 'dad_', '1', '0', '', '1', '', '', '1');
INSERT INTO message_recipients (`id`, `message_id`, `recipient_1_model`, `recipient_1_prefix`, `recipient_1_foreign_key`, `recipient_2_model`, `recipient_2_prefix`, `recipient_2_foreign_key`, `recipient_3_model`, `recipient_3_prefix`, `recipient_3_foreign_key`) VALUES ('4', '4', 'StudentParent', 'dad_', '1', '', '', '1', '', '', '');


-- --------------------------------------------------------


--
-- Structure de la table `message_replies`
--
CREATE TABLE `message_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `message_replies`
--
INSERT INTO message_replies (`id`, `message_id`, `model`, `prefix`, `foreign_key`, `content`, `created`) VALUES ('1', '1', 'StudentParent', 'mom_', '1', 'Exemplo de comentário', '2014-11-19 00:00:00');
INSERT INTO message_replies (`id`, `message_id`, `model`, `prefix`, `foreign_key`, `content`, `created`) VALUES ('2', '4', 'StudentParent', 'mom_', '1', 'wasasasaa', '2015-04-20 16:08:23');
INSERT INTO message_replies (`id`, `message_id`, `model`, `prefix`, `foreign_key`, `content`, `created`) VALUES ('3', '4', 'StudentParent', 'mom_', '1', 'asasasasass', '2015-04-20 16:08:27');


-- --------------------------------------------------------


--
-- Structure de la table `messages`
--
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `views` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `messages`
--
INSERT INTO messages (`id`, `student_id`, `name`, `content`, `views`, `created`, `modified`) VALUES ('1', '1', 'Exemplo de mensagem', 'Exemplo de conteudo', '0', '2014-11-19 00:00:00', '2014-11-19 00:00:00');
INSERT INTO messages (`id`, `student_id`, `name`, `content`, `views`, `created`, `modified`) VALUES ('2', '1', '', '', '0', '2015-03-19 11:24:46', '2015-03-19 11:24:46');
INSERT INTO messages (`id`, `student_id`, `name`, `content`, `views`, `created`, `modified`) VALUES ('3', '1', 'teste', '<p><del></del>etste ste </p>', '0', '2015-04-10 15:50:30', '2015-04-10 15:50:30');
INSERT INTO messages (`id`, `student_id`, `name`, `content`, `views`, `created`, `modified`) VALUES ('4', '1', 'testandooooo', '<p>testandoooo</p>', '0', '2015-04-10 15:52:09', '2015-04-10 15:52:09');


-- --------------------------------------------------------


--
-- Structure de la table `posts`
--
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- entrees dans la table `posts`
--


-- --------------------------------------------------------


--
-- Structure de la table `student_exercises`
--
CREATE TABLE `student_exercises` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `student_exercises`
--
INSERT INTO student_exercises (`id`, `student_id`, `date`, `due_to`, `student_lesson_id`, `enunciation`, `observation`, `attachment`, `answer`, `observations`) VALUES ('2', '2', '2015-03-18', '2015-03-17', '1', '<p>Se carlitos está com 10 policiais atras deles, mas não apresenta flagrante no bolso, por outro lado, estpa claramente doidão. Quantos ele consegue subornar com apenas, 30 merrecas no bolso?</p>', 'Se não fizer, o pau come. ', '', '', '');
INSERT INTO student_exercises (`id`, `student_id`, `date`, `due_to`, `student_lesson_id`, `enunciation`, `observation`, `attachment`, `answer`, `observations`) VALUES ('3', '1', '2015-03-17', '2015-03-18', '14', '<p>ABACATETETE</p>', 'abacate', 'pga.sql', '', '');
INSERT INTO student_exercises (`id`, `student_id`, `date`, `due_to`, `student_lesson_id`, `enunciation`, `observation`, `attachment`, `answer`, `observations`) VALUES ('4', '1', '2015-03-03', '2015-03-05', '14', '<p>teste</p>', 'testets', 'escala-2.pdf', '', '');


-- --------------------------------------------------------


--
-- Structure de la table `student_input_grades`
--
CREATE TABLE `student_input_grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_input_id` int(11) NOT NULL,
  `student_grade_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- entrees dans la table `student_input_grades`
--


-- --------------------------------------------------------


--
-- Structure de la table `student_input_values`
--
CREATE TABLE `student_input_values` (
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `student_input_values`
--
INSERT INTO student_input_values (`id`, `date`, `student_id`, `actor`, `student_input_id`, `student_lesson_id`, `value`, `nota_1`, `nota_2`, `nota_3`, `nota_4`, `nota_5`, `nota_6`, `nota_7`, `nota_8`) VALUES ('1', '2015-05-21', '1', 'pais', '75', '', '1', '', '', '', '', '', '', '', '');
INSERT INTO student_input_values (`id`, `date`, `student_id`, `actor`, `student_input_id`, `student_lesson_id`, `value`, `nota_1`, `nota_2`, `nota_3`, `nota_4`, `nota_5`, `nota_6`, `nota_7`, `nota_8`) VALUES ('2', '2015-05-21', '1', 'pais', '35', '', '21/05/2015', '', '', '', '', '', '', '', '');
INSERT INTO student_input_values (`id`, `date`, `student_id`, `actor`, `student_input_id`, `student_lesson_id`, `value`, `nota_1`, `nota_2`, `nota_3`, `nota_4`, `nota_5`, `nota_6`, `nota_7`, `nota_8`) VALUES ('3', '2015-05-21', '1', 'pais', '74', '', '123', '', '', '', '', '', '', '', '');
INSERT INTO student_input_values (`id`, `date`, `student_id`, `actor`, `student_input_id`, `student_lesson_id`, `value`, `nota_1`, `nota_2`, `nota_3`, `nota_4`, `nota_5`, `nota_6`, `nota_7`, `nota_8`) VALUES ('4', '2015-05-21', '1', 'pais', '76', '', '<p>fdsafsdf</p>', '', '', '', '', '', '', '', '');
INSERT INTO student_input_values (`id`, `date`, `student_id`, `actor`, `student_input_id`, `student_lesson_id`, `value`, `nota_1`, `nota_2`, `nota_3`, `nota_4`, `nota_5`, `nota_6`, `nota_7`, `nota_8`) VALUES ('5', '2015-04-21', '1', 'pais', '75', '', '1', '', '', '', '', '', '', '', '');
INSERT INTO student_input_values (`id`, `date`, `student_id`, `actor`, `student_input_id`, `student_lesson_id`, `value`, `nota_1`, `nota_2`, `nota_3`, `nota_4`, `nota_5`, `nota_6`, `nota_7`, `nota_8`) VALUES ('6', '2015-04-21', '1', 'pais', '35', '', '21/04/2015', '', '', '', '', '', '', '', '');
INSERT INTO student_input_values (`id`, `date`, `student_id`, `actor`, `student_input_id`, `student_lesson_id`, `value`, `nota_1`, `nota_2`, `nota_3`, `nota_4`, `nota_5`, `nota_6`, `nota_7`, `nota_8`) VALUES ('7', '2015-04-21', '1', 'pais', '74', '', '123', '', '', '', '', '', '', '', '');
INSERT INTO student_input_values (`id`, `date`, `student_id`, `actor`, `student_input_id`, `student_lesson_id`, `value`, `nota_1`, `nota_2`, `nota_3`, `nota_4`, `nota_5`, `nota_6`, `nota_7`, `nota_8`) VALUES ('8', '2015-06-01', '1', 'pais', '75', '', '1', '', '', '', '', '', '', '', '');
INSERT INTO student_input_values (`id`, `date`, `student_id`, `actor`, `student_input_id`, `student_lesson_id`, `value`, `nota_1`, `nota_2`, `nota_3`, `nota_4`, `nota_5`, `nota_6`, `nota_7`, `nota_8`) VALUES ('9', '2015-06-01', '1', 'pais', '35', '', '01/06/2015', '', '', '', '', '', '', '', '');
INSERT INTO student_input_values (`id`, `date`, `student_id`, `actor`, `student_input_id`, `student_lesson_id`, `value`, `nota_1`, `nota_2`, `nota_3`, `nota_4`, `nota_5`, `nota_6`, `nota_7`, `nota_8`) VALUES ('10', '2015-06-01', '1', 'pais', '74', '', '12434242', '', '', '', '', '', '', '', '');
INSERT INTO student_input_values (`id`, `date`, `student_id`, `actor`, `student_input_id`, `student_lesson_id`, `value`, `nota_1`, `nota_2`, `nota_3`, `nota_4`, `nota_5`, `nota_6`, `nota_7`, `nota_8`) VALUES ('11', '2015-06-01', '1', 'pais', '76', '', '<p>fsafasf</p>', '', '', '', '', '', '', '', '');


-- --------------------------------------------------------


--
-- Structure de la table `student_inputs`
--
CREATE TABLE `student_inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `input_id` int(11) NOT NULL,
  `actor` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `config` text,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `student_inputs`
--
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('3', '1', '3', 'tutor', 'Descrição da Aulaabacatett', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('9', '1', '4', 'tutor', 'Focoabacategdgd', 'a:2:{s:11:\"range_start\";s:1:\"1\";s:9:\"range_end\";s:1:\"5\";}', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('11', '1', '1', 'tutor', 'Data da Apresentaçãoteste', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('14', '1', '2', 'tutor', 'Horário da Aulaerewa', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('15', '1', '6', 'tutor', 'Notadsadadada', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('19', '1', '2', 'psico', 'gdxgdxgxgxg', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('20', '1', '1', 'psico', '123das', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('22', '1', '3', 'tutor', 'input de TUTOR AEAEAE caio boiolão', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('27', '3', '1', 'tutor', 'Data', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('28', '3', '2', 'tutor', 'Tempo de Imersão/Dispersão Aguda', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('30', '1', '2', 'tutor', 'Horário', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('31', '1', '2', 'tutor', 'TESTANDO', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('32', '1', '1', 'tutor', 'TESTANDO CALENDARIOO', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('35', '1', '1', 'pais', 'asasasa', '', '2');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('36', '2', '1', 'tutor', 'Teste Calendário', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('37', '2', '2', 'tutor', 'Teste intervalo de tempo', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('38', '2', '3', 'tutor', 'Teste Texto', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('39', '2', '4', 'tutor', 'Teste Escala numérica', 'a:2:{s:11:\"range_start\";s:1:\"1\";s:9:\"range_end\";s:1:\"5\";}', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('41', '2', '6', 'tutor', 'Teste Número', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('42', '2', '7', 'tutor', 'Teste Registro Privatvo', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('50', '2', '1', 'psico', 'Teste Calendário', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('51', '2', '2', 'psico', 'Teste intervalo de tempo', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('52', '2', '3', 'psico', 'Teste Texto', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('53', '2', '4', 'psico', 'Teste Escala numérica', 'a:2:{s:11:\"range_start\";s:1:\"1\";s:9:\"range_end\";s:1:\"5\";}', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('54', '2', '5', 'psico', 'Teste Escala Texto', 'a:5:{i:1;a:1:{s:4:\"name\";s:6:\"Beserk\";}i:2;a:1:{s:4:\"name\";s:6:\"Deprê\";}i:3;a:1:{s:4:\"name\";s:6:\"Inerte\";}i:4;a:1:{s:4:\"name\";s:9:\"No brilho\";}i:5;a:1:{s:4:\"name\";s:7:\"Ecstasy\";}}', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('55', '2', '6', 'psico', 'Teste Número', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('56', '2', '7', 'psico', 'Teste Registro Privatvo', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('59', '5', '1', 'tutor', 'Data da Aula', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('60', '5', '2', 'tutor', 'Horário da Aula', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('61', '5', '3', 'tutor', 'Registro da Aula', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('62', '5', '4', 'tutor', 'Atenção', 'a:2:{s:11:\"range_start\";s:1:\"1\";s:9:\"range_end\";s:2:\"10\";}', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('63', '5', '4', 'tutor', 'Autonomia', 'a:2:{s:11:\"range_start\";s:1:\"1\";s:9:\"range_end\";s:2:\"10\";}', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('64', '5', '4', 'tutor', 'Independência', 'a:2:{s:11:\"range_start\";s:1:\"1\";s:9:\"range_end\";s:2:\"10\";}', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('65', '5', '5', 'tutor', 'Humor', 'a:5:{i:1;a:1:{s:4:\"name\";s:8:\"Irritado\";}i:2;a:1:{s:4:\"name\";s:12:\"Mal humorado\";}i:3;a:1:{s:4:\"name\";s:6:\"Normal\";}i:4;a:1:{s:4:\"name\";s:12:\"Bem humorado\";}i:5;a:1:{s:4:\"name\";s:9:\"Empolgado\";}}', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('68', '5', '7', 'tutor', 'Anotações pessoais', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('69', '5', '6', 'tutor', 'Número de exercícios completos', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('70', '5', '6', 'tutor', 'Tempo de Dispersão aguda', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('71', '5', '6', 'tutor', 'Número de exercícios propostos', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('72', '5', '6', 'tutor', 'Número exercícios completos/ Número exercícios propostos', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('73', '1', '6', 'tutor', 'abacatinho', '', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('74', '1', '6', 'pais', '53425432', '', '3');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('75', '1', '4', 'pais', '123', 'a:2:{s:11:\"range_start\";s:1:\"1\";s:9:\"range_end\";s:1:\"5\";}', '1');
INSERT INTO student_inputs (`id`, `student_id`, `input_id`, `actor`, `name`, `config`, `order`) VALUES ('76', '1', '3', 'pais', 'abacate 8000', '', '5');


-- --------------------------------------------------------


--
-- Structure de la table `student_lessons`
--
CREATE TABLE `student_lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `student_lessons`
--
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('2', '1', 'Química', '2014-11-08 22:54:46', '2014-11-08 22:54:46');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('3', '1', 'Biologia', '2014-11-08 22:56:25', '2014-11-08 22:56:25');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('4', '1', 'Física', '2014-11-08 22:56:29', '2014-11-08 22:56:29');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('5', '1', 'História', '2014-11-08 22:56:31', '2014-11-08 22:56:31');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('6', '1', 'Português', '2014-11-08 22:56:36', '2014-11-08 22:56:36');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('7', '1', 'Literatura', '2014-11-08 22:56:37', '2014-11-08 22:56:37');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('10', '2', 'Futebol', '2015-03-15 11:49:31', '2015-03-15 11:49:31');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('11', '2', 'Malandragem', '2015-03-15 11:49:38', '2015-03-15 11:49:38');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('12', '2', 'HomeGrown', '2015-03-15 11:53:46', '2015-03-15 11:53:46');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('14', '1', 'Abacatinho', '2015-03-18 13:35:49', '2015-03-18 13:35:49');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('15', '5', 'Matemática', '2015-03-19 20:38:03', '2015-03-19 20:38:03');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('16', '5', 'Química', '2015-03-19 20:38:13', '2015-03-19 20:38:13');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('17', '5', 'Física', '2015-03-19 20:38:18', '2015-03-19 20:38:18');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('18', '5', 'Biologia', '2015-03-19 20:38:24', '2015-03-19 20:38:24');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('20', '5', 'História', '2015-03-19 20:38:40', '2015-03-19 20:38:40');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('21', '5', 'Geografia', '2015-03-19 20:38:48', '2015-03-19 20:38:48');
INSERT INTO student_lessons (`id`, `student_id`, `name`, `created`, `modified`) VALUES ('23', '5', 'Português/Literatura', '2015-03-19 20:39:12', '2015-03-19 20:39:12');


-- --------------------------------------------------------


--
-- Structure de la table `student_parents`
--
CREATE TABLE `student_parents` (
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `student_parents`
--
INSERT INTO student_parents (`id`, `student_id`, `mom_name`, `mom_phone`, `mom_email`, `mom_password`, `dad_name`, `dad_phone`, `dad_email`, `dad_password`, `tutor_name`, `tutor_phone`, `tutor_email`, `tutor_password`, `created`, `modified`) VALUES ('1', '1', 'Eliete', '21 35868415', 'luizhrqas@gmail.com', '$2a$10$DqhuRMmrSt5lPHPkvPKz3eW0YyId6zPinU9ghfnrMVFH/X3BPB6bm', 'Exemplo 4', '21 35868414', 'luizhrqas@gmail.com', '$2a$10$Cd6m/fpmWDQhR6GkYNm1geW5ZBaTVo5LcPj/.pF9YxIXtb/Bx36Gi', 'Exemplo 6', '2135868142', 'luizhrqas6@gmail.com', '$2a$10$FD2m5pQH5v3CN5.EBsOyJOUuWwNZAcz.WvmQCx5PPUXJb8nFUFOBe', '2014-11-08 22:42:56', '2015-04-15 19:11:00');
INSERT INTO student_parents (`id`, `student_id`, `mom_name`, `mom_phone`, `mom_email`, `mom_password`, `dad_name`, `dad_phone`, `dad_email`, `dad_password`, `tutor_name`, `tutor_phone`, `tutor_email`, `tutor_password`, `created`, `modified`) VALUES ('2', '2', '', '', '', '', '', '', '', '', '', '', '', '', '2015-03-04 20:13:02', '2015-03-10 20:21:00');
INSERT INTO student_parents (`id`, `student_id`, `mom_name`, `mom_phone`, `mom_email`, `mom_password`, `dad_name`, `dad_phone`, `dad_email`, `dad_password`, `tutor_name`, `tutor_phone`, `tutor_email`, `tutor_password`, `created`, `modified`) VALUES ('3', '3', 'Biroleibe', '9675644', 'plimbgd@gjhnm.com', '', 'Falensi', '655433221', '12sad@sçkjd.com', '', 'Tchung', '085765765', 'DKJHkjd@gdnsdd.com', '', '2015-03-04 20:17:12', '2015-03-12 20:43:03');
INSERT INTO student_parents (`id`, `student_id`, `mom_name`, `mom_phone`, `mom_email`, `mom_password`, `dad_name`, `dad_phone`, `dad_email`, `dad_password`, `tutor_name`, `tutor_phone`, `tutor_email`, `tutor_password`, `created`, `modified`) VALUES ('4', '4', 'asasasasasasasa', 'qwqwqwq', 'asasa4@gmail.com', '', 'asasaqwqwqw', 'qqwqwqw', 'asasa1@gmail.com', '', 'qwqwqwq', 'qwqwqwq', 'asasa1@gmail.com', '', '2015-03-11 12:16:39', '2015-03-11 12:16:39');
INSERT INTO student_parents (`id`, `student_id`, `mom_name`, `mom_phone`, `mom_email`, `mom_password`, `dad_name`, `dad_phone`, `dad_email`, `dad_password`, `tutor_name`, `tutor_phone`, `tutor_email`, `tutor_password`, `created`, `modified`) VALUES ('5', '5', 'Maria Cristina Saules Peña', '9675644', 'kikaspena@gmail.com', '', 'Bruno Seraphim Cotrina Pena', '972711717', 'bs.pena@uol.com.b', '', 'Pedro Lima Sampaio', '972711717', 'plima1@gmail.com', '$2a$10$OrTG0RXCtCP/pRGpkn1qLejz4N5H1oNlpJdYLTwrKbmvugK/ufX2i', '2015-03-19 20:24:53', '2015-03-19 20:44:23');


-- --------------------------------------------------------


--
-- Structure de la table `student_psychiatrists`
--
CREATE TABLE `student_psychiatrists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `student_psychiatrists`
--
INSERT INTO student_psychiatrists (`id`, `student_id`, `name`, `phone`, `email`, `password`, `created`, `modified`) VALUES ('1', '1', 'Exemplo 1', '21 35868411', 'luizhrqas1@gmail.com', '', '2014-11-08 22:42:56', '2015-04-15 19:11:00');
INSERT INTO student_psychiatrists (`id`, `student_id`, `name`, `phone`, `email`, `password`, `created`, `modified`) VALUES ('5', '5', 'Márcia Tavares', '996016969', 'tavaresmarcia@globo.com', '', '2015-03-19 20:24:53', '2015-03-19 20:28:38');


-- --------------------------------------------------------


--
-- Structure de la table `student_schools`
--
CREATE TABLE `student_schools` (
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `student_schools`
--
INSERT INTO student_schools (`id`, `student_id`, `mediator_name`, `mediator_phone`, `mediator_email`, `mediator_password`, `coordinator_name`, `coordinator_phone`, `coordinator_email`, `coordinator_password`, `created`, `modified`) VALUES ('1', '1', 'Exemplo 2', '21 35868412', 'luizhrqas2@gmail.com', '', 'Exemplo 3', '21 35868413', 'luizhrqas3@gmail.com', '', '2014-11-08 22:42:56', '2015-04-15 19:11:00');
INSERT INTO student_schools (`id`, `student_id`, `mediator_name`, `mediator_phone`, `mediator_email`, `mediator_password`, `coordinator_name`, `coordinator_phone`, `coordinator_email`, `coordinator_password`, `created`, `modified`) VALUES ('2', '2', 'Jun', '22222233', '', '', '', '', '', '', '2015-03-04 20:13:02', '2015-03-10 20:21:00');
INSERT INTO student_schools (`id`, `student_id`, `mediator_name`, `mediator_phone`, `mediator_email`, `mediator_password`, `coordinator_name`, `coordinator_phone`, `coordinator_email`, `coordinator_password`, `created`, `modified`) VALUES ('3', '3', 'Jun', '22222233', 'jjjjjy@jjjy.com', '', 'finnerty', '23456778', 'ggg@ff.com', '', '2015-03-04 20:17:12', '2015-03-12 20:43:03');
INSERT INTO student_schools (`id`, `student_id`, `mediator_name`, `mediator_phone`, `mediator_email`, `mediator_password`, `coordinator_name`, `coordinator_phone`, `coordinator_email`, `coordinator_password`, `created`, `modified`) VALUES ('4', '4', 'asasa', 'asasa', 'asasa@gmail.com', '', 'asasasasasas', 'qwqwqw', 'asasa3@gmail.com', '', '2015-03-11 12:16:39', '2015-03-11 12:16:39');
INSERT INTO student_schools (`id`, `student_id`, `mediator_name`, `mediator_phone`, `mediator_email`, `mediator_password`, `coordinator_name`, `coordinator_phone`, `coordinator_email`, `coordinator_password`, `created`, `modified`) VALUES ('5', '5', 'Karina Oliveira', '976616564', 'karina19oliveira@yahoo.com.br', '', 'Penha Cristina Freitas', '99999999', 'pcristina.freitas@hotmail.com', '', '2015-03-19 20:24:53', '2015-03-19 20:28:38');


-- --------------------------------------------------------


--
-- Structure de la table `students`
--
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `school` varchar(255) NOT NULL,
  `clinical_condition` varchar(255) NOT NULL,
  `school_grade` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `students`
--
INSERT INTO students (`id`, `name`, `email`, `password`, `date_of_birth`, `school`, `clinical_condition`, `school_grade`, `description`, `created`, `modified`) VALUES ('1', 'Luiz Henrique Almeida da Silva 123', '', '', '2016-07-02', 'Educandário', 'Abacate', '', '<p>Exemplo de descrição</p>', '2014-11-08 22:42:56', '2015-04-15 19:11:00');
INSERT INTO students (`id`, `name`, `email`, `password`, `date_of_birth`, `school`, `clinical_condition`, `school_grade`, `description`, `created`, `modified`) VALUES ('2', 'Zé Maneiro', '', '', '2017-07-03', 'Da vida', 'Tranquilão', '', '<p>Maluco tranquilo, cria da área.</p>', '2015-03-04 20:13:02', '2015-03-10 20:21:00');
INSERT INTO students (`id`, `name`, `email`, `password`, `date_of_birth`, `school`, `clinical_condition`, `school_grade`, `description`, `created`, `modified`) VALUES ('5', 'João Pedro Saules Peña', '', '', '2015-03-10', 'CEI - Centro de Educação Integrada', 'Síndrome de Asperger', 'Segundo ano do Segundo Grau', '<p>O trabalho de tutoria com o João começou em Junho de 2014.</p>', '2015-03-19 20:24:53', '2015-03-19 20:28:38');


-- --------------------------------------------------------


--
-- Structure de la table `users`
--
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- entrees dans la table `users`
--
INSERT INTO users (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES ('1', 'ator', '$2a$10$5xtbNLRVwKKS/8AU3wUguO1q/gL3tQfOm2mifHZljs7P/s5.NJcSS', 'actor', '2014-11-11 02:59:34', '2014-11-11 02:59:34');
INSERT INTO users (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES ('2', 'luizhrqas_admin@gmail.com', '$2a$10$DqhuRMmrSt5lPHPkvPKz3eW0YyId6zPinU9ghfnrMVFH/X3BPB6bm', 'admin', '2014-11-11 02:59:53', '2014-11-11 02:59:53');
INSERT INTO users (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES ('3', 'pedro@redepga.com.br', '', 'admin', '2014-11-11 02:59:53', '2014-11-11 02:59:53');


-- --------------------------------------------------------


