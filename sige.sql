-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Abr-2020 às 01:16
-- Versão do servidor: 10.1.39-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sige`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `num_processo` int(11) DEFAULT NULL,
  `genero_aluno` varchar(50) NOT NULL,
  `nascimento_aluno` varchar(50) NOT NULL,
  `tipo_documento` varchar(50) NOT NULL,
  `num_documento` varchar(50) NOT NULL,
  `data_emissao_doc` date NOT NULL,
  `contacto_aluno` varchar(200) NOT NULL,
  `endereco_aluno` varchar(200) NOT NULL,
  `nome_pai` varchar(200) DEFAULT NULL,
  `nome_mae` varchar(200) DEFAULT NULL,
  `photo` varchar(300) DEFAULT 'user.jpg',
  `pais_id` int(11) DEFAULT NULL,
  `provincia_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome`, `num_processo`, `genero_aluno`, `nascimento_aluno`, `tipo_documento`, `num_documento`, `data_emissao_doc`, `contacto_aluno`, `endereco_aluno`, `nome_pai`, `nome_mae`, `photo`, `pais_id`, `provincia_id`, `municipio_id`, `funcionario_id`, `created`, `modified`) VALUES
(121, 'Emanuel Domingos dos Santos', 2230, 'Masculino', '2013-03-01', 'Cédula Pessoal', '7787', '2013-03-04', '(+244) 923 342 442', 'Rangel - Luanda', 'José Oliveira dos Santos', 'Marlene Aguiar dos Santos', '6741b8a036bc71f07f7a80255d088a15.jpg', 7, 11, 6, 21, '2019-12-10 19:16:06', '2019-12-15 12:07:10'),
(122, 'Mariana de Jesus Alberto', 92782, 'Tarde', '2013-07-03', 'Cedula Pessoal', '9886', '2013-08-24', '(+244) 921 090 999', 'Rangel - Luanda', 'José Alberto', 'Antonia de Jesus', 'b2e4c8a69d2cebdb0e4c668fbaf8a937.jpg', 7, NULL, NULL, 21, '2019-12-10 19:23:44', '2020-04-01 13:28:27'),
(123, 'Débora Teca Gustavo', 344344, 'Feminino', '2008-04-25', 'B.I', '099944774LA060', '2013-01-01', '(+244) 924 411 870', 'Viana - Luanda Sul', 'Gilvanio Carlos Gustavo', 'Maria Teca Gustavo', '689e9a761837609778d9ebe063a2988f.jpg', 7, 11, 3, 21, '2019-12-10 21:54:18', '2019-12-10 21:57:27'),
(124, 'Alexandra Domingos Bernardo', 2345665, 'Tarde', '2013-03-31', 'Passaporte', 'N7272772', '2014-03-01', '(+244) 912 276 267', 'Rangel - Luanda', 'João Bernardo', 'Fernanda Bernardo', '15eb7c1aa989376602f0a556a2a0c166.jpg', 7, NULL, NULL, 21, '2019-12-11 00:26:26', '2020-03-31 12:04:25'),
(125, 'Aldo Derick Moreira Mateus', 6789, 'Masculino', '2013-09-14', 'B.I', '009372778LA672', '2018-12-31', '(+244) 902 837 377', 'Rangel - Luanda', 'Domingos Mateus', 'Anastácia Moreira', '839d5d62d75578f3efaf807818045f5c.jpg', 7, 11, 1, 21, '2019-12-11 00:29:23', '2020-01-04 23:15:05'),
(126, 'Ariclinio Gabriel Binga Pinto', 9475, 'Masculino', '2013-01-29', 'B.I', '032989323LA892', '2018-06-01', '(+244) 923 667 572', 'Rangel - Luanda', 'Delcio Pinto', 'Vania Pinto', 'user.jpg', 7, 11, 1, 21, '2019-12-11 00:31:33', '2019-12-11 00:31:45'),
(127, 'Antónia Neves José', 122334, 'Feminino', '2013-09-01', 'Cédula Pessoal', '9239', '2014-05-01', '(+244) 999 826 378', 'Rangel - Luanda', 'António José', 'Ângela Neves', '5d7e1c1b1b2f1c00bac4d2dcdbddcdaa.jpg', 7, 11, 1, 21, '2019-12-11 00:34:04', '2020-03-15 13:20:46'),
(128, 'Alfredo Barros Tomás', 8976, 'Masculino', '2013-05-12', 'Cédula Pessoal', '6726', '2013-10-31', '(+244) 992 437 838', 'Rangel - Luanda', 'José Tomás', 'Manuela Tomás', 'user.jpg', 7, 11, 1, 21, '2019-12-11 00:36:31', '2019-12-11 00:36:39'),
(129, 'Rafael Rodrigues da Cunha', 334443, 'Masculino', '2013-09-01', 'B.I', '892098923LA355', '2018-07-30', '(+244) 912 231 228', 'Rangel - Luanda', 'Nelson Manuel da Cunha', 'Denise José da Cunha', 'user.jpg', 7, 11, 7, 21, '2019-12-11 00:38:42', '2019-12-11 00:38:49'),
(130, 'Pedro Miguel Neto da Costa', 232323, 'Masculino', '2013-08-28', 'Cédula Pessoal', '2344', '2014-03-30', '(+244) 925 623 565', 'Rangel - Luanda', 'Joel da Costa', 'Marcia Neto', 'user.jpg', 7, 11, 1, 21, '2019-12-11 00:41:58', '2019-12-11 00:42:05'),
(131, 'Luísa Margareth da Rocha Pedro', 56788, 'Feminino', '2013-07-29', 'B.I', '018921893LA892', '2017-08-28', '(+244) 936 662 878', 'Rangel - Luanda', 'Milton Miguel Pedro', 'Antonia da Rocha', 'c1e7fed8bc0b644aa624fa4981d34afe.jpg', 7, 11, 1, 21, '2019-12-11 00:45:52', '2020-02-22 08:37:29'),
(132, 'Rosária Tuana Afonso', 45677, 'Feminino', '2013-06-18', 'B.I', '672366723LA832', '2016-09-30', '(+244) 923 142 351', 'Rangel - Luanda', 'Delgado Afonso', 'Delmira Tuana', 'user.jpg', 7, 11, 1, 21, '2019-12-11 00:48:29', '2019-12-11 00:48:36'),
(133, 'Sara Aline Cassengue Campos', 345454, 'Feminino', '2013-08-29', 'B.I', '378787832LA236', '2016-04-17', '(+244) 946 463 746', 'Rangel - Luanda', 'Adérito Campos', 'Ana Carolina Cassengue', 'user.jpg', 7, 11, 1, 21, '2019-12-11 00:50:16', '2019-12-11 00:53:57'),
(134, 'Reginaldo Wolo Manuel', 78347, 'Masculino', '2013-04-17', 'Cédula Pessoal', '3455', '2011-06-08', '(+244) 938 878 377', 'Rangel - Luanda', 'Adalberto Manuel', 'Regina Manuel', '56def4ab6ed2d9c1965230a766ec1dde.jpg', 7, 11, 1, 21, '2019-12-11 00:58:15', '2020-03-15 13:19:44'),
(135, 'Robson Cordeiro Alves', 4343, 'Masculino', '2013-05-08', 'B.I', '891238923LA783', '2018-09-28', '(+244) 912 121 212', 'Rangel -Luanda', 'Osvaldo Alves', 'Marlene Cordeiro', 'user.jpg', 7, 11, 1, 21, '2019-12-11 01:00:34', '2019-12-11 10:37:47'),
(136, 'Flaviana de Carvalho de Almeida', 1020, 'Feminino', '2013-11-30', 'B.I', '671267671LA737', '2017-12-30', '(+244) 926 236 632', 'Rangel - Luanda', 'Manuel de Almeida', 'Cristina de Carvalho', 'user.jpg', 7, 11, 1, 21, '2019-12-11 01:06:23', '2019-12-30 09:07:28'),
(137, 'Carla Cândida Milengo Jorge', 6767, 'Feminino', '2013-08-12', 'B.I', '902388923LA099', '2018-07-27', '(+244) 922 787 823', 'Rangel - Luanda', 'Adão Jorge', 'Paula Jorge', 'user.jpg', 7, 14, 131, 21, '2019-12-11 01:08:41', '2019-12-11 10:35:38'),
(138, 'Octávio Eliel Pinto', 78898, 'Masculino', '2013-09-04', 'B.I', '939329882LA938', '2013-02-02', '(+244) 927 837 887', 'Rangel Pinto', 'Augusto Pinto', 'Vanda Pinto', 'user.jpg', 7, 11, 1, 21, '2019-12-11 01:11:51', '2019-12-11 01:12:00'),
(139, 'Valdemar Adriano António Leal', 29903, 'Masculino', '2013-08-24', 'B.I', '526354827LA034', '2014-01-05', '(+244) 924 466 723', 'Rangel Luanda', 'Alberto João Leal', 'Maria António Leal', 'user.jpg', 7, 11, 1, 21, '2019-12-11 01:15:01', '2019-12-11 10:36:21'),
(140, 'Ana Priscila Cariengue Veloso', 33939, 'Feminino', '2013-08-29', 'Cédula Pessoal', '6767', '2014-01-26', '(+244) 926 526 726', 'Rangel - Luanda', 'Fernando Veloso', 'Grabriela Veloso', 'user.jpg', 7, 11, 1, 21, '2019-12-11 01:17:34', '2019-12-11 01:17:42'),
(141, 'Gamaliel Francisco  Mateus', 36636, 'Masculino', '2013-06-30', 'B.I', '892198898LA282', '2017-08-30', '(+244) 923 341 234', 'Rangel - Luanda', 'José Mateus', 'Sandra Mateus', 'user.jpg', 7, 11, 1, 21, '2019-12-11 01:21:15', '2019-12-11 01:21:29'),
(142, 'Josiane Janete António João', 26767, 'Feminino', '2013-04-04', 'B.I', '902388238LA892', '2017-09-29', '(+244) 924 343 556', 'Rangel - Luanda', 'André João', 'Victoria João', 'user.jpg', 7, 11, 1, 21, '2019-12-11 01:23:29', '2019-12-11 01:23:39'),
(143, 'Anderson Félix Pedro', 4566, 'Masculino', '2009-11-27', 'B.I', '673467376LA635', '2015-01-16', '(+244) 912 123 254', 'Rangel - Luanda', 'Délcio Pedro', 'Jacira Félix', 'user.jpg', 7, 11, 1, 21, '2019-12-28 23:52:34', '2019-12-28 23:54:29'),
(144, 'Joceline Fernandes', 121221, 'Feminino', '2004-08-11', 'B.I', '993883484LA737', '2010-12-14', '(+244) 999 829 282', 'Rangel - Luanda', 'Pedro Fernandes', 'Danira Fernandes', 'user.jpg', 7, 11, 1, 21, '2019-12-29 00:09:56', '2019-12-29 00:10:48'),
(145, 'Hugo de Almeida José', 225471, 'Masculino', '2010-04-01', 'B.I', '828782737LA093', '2017-12-31', '(+244) 910 102 300', 'Rangel - Luanda', 'Manuel José', 'Vanda José', 'user.jpg', 7, 11, 1, 21, '2019-12-31 17:39:06', '2019-12-31 17:39:23'),
(146, 'Délcia de Almeida Paulo', 87778, 'Feminino', '2000-04-11', 'B.I', '002966363LA937', '2008-03-01', '(+244) 932 659 855', 'Rangel - Luanda', 'João Paulo', 'Amanda de Almeida', 'user.jpg', 7, 11, 4, 21, '2020-01-01 22:41:13', '2020-01-01 22:41:23'),
(147, 'Arnaldo José Pedro', 20122, 'Tarde', '2010-10-20', '', '', '2011-05-04', '(+244) 925 655 522', 'Rangel - Luanda', 'Mendes Pedro', 'Márcia Pedro', 'user.jpg', 7, NULL, NULL, 21, '2020-01-06 16:02:32', '2020-01-06 16:06:54'),
(148, 'Edivânio Pedro Ferreira', 34453, 'Masculino', '2014-06-20', 'Cédula Pessoal', '5026', '2014-10-10', '(+244) 913 424 232', 'Rangel - Luanda', 'Filipe Ferreira', 'Maria Ferreira', 'user.jpg', 7, 11, 1, 30, '2020-01-08 23:19:14', '2020-01-09 00:20:58'),
(149, 'Makiesse Alexandre João', 12323, 'Masculino', '2014-04-01', 'Cédula Pessoal', '7378', '2014-10-02', '(+244) 925 667 333', 'Rangel - Luanda', 'Francisco João', 'Adelina João', 'user.jpg', 7, 18, 176, 30, '2020-01-10 08:55:08', '2020-01-10 08:55:19'),
(150, 'Maria Delgado Freitas', 2232, 'Masculino', '2014-03-01', 'B.I', '6366', '2014-07-04', '(+244) 993 535 353', 'Rangel - Luanda', 'André Freitas', 'Madalena Delgado', 'user.jpg', 7, 13, 124, 30, '2020-01-10 08:57:33', '2020-01-10 08:58:03'),
(151, 'Mario Mateus Pinto', 1221, 'Masculino', '2014-06-30', 'Cédula Pessoal', '8776', '2014-08-03', '(+244) 942 435 662', 'Rangel - Luanda', 'Marques Pinto', 'Andreia Pinto', 'user.jpg', 7, 2, 22, 30, '2020-01-10 09:00:16', '2020-01-10 09:00:30'),
(152, 'João Manuel Praia', 12212, 'Masculino', '2014-12-02', 'Cédula Pessoal', '5344', '2015-02-02', '(+244) 923 441 424', 'Rangel - Luanda', 'José Praia', 'Maria Praia', 'user.jpg', 7, 11, 2, 30, '2020-01-10 09:11:04', '2020-01-10 09:11:13'),
(153, 'Delcio André Costa', 3235, 'Masculino', '2014-09-02', 'Cédula Pessoal', '2323', '2014-10-08', '(+244) 923 232 323', 'Rangel - Luanda', 'Pedro Costa', 'Fernanda Costa', 'user.jpg', 7, 13, 123, 30, '2020-01-10 09:16:12', '2020-01-10 09:16:23'),
(154, 'Osvaldo dos Santos Pereira', 12221, 'Masculino', '2014-10-31', 'Cédula Pessoal', '8483', '2014-11-05', '(+244) 924 342 324', 'Rangel - Luanda', 'Adão Pereira', 'Márcia dos Santos', 'user.jpg', 7, 11, 1, 21, '2020-01-11 00:10:58', '2020-01-11 00:11:19'),
(155, 'Pedro João da Silva', 2334, 'Masculino', '2014-06-03', 'Cédula Pessoal', '2233', '2014-07-15', '(+244) 938 646 384', 'Rangel - Luanda', 'Garcia da Silva', 'Neusa da Silva', 'user.jpg', 7, 16, 152, 21, '2020-01-11 00:14:58', '2020-01-11 00:15:07'),
(156, 'Djamila Armando Guedes', 43433, 'Feminino', '2014-06-30', 'Cédula Pessoal', '4756', '2014-08-29', '(+244) 999 372 736', 'Rangel - Luanda', 'Nelson Guedes', 'Antónia Armando', 'user.jpg', 7, 1, 8, 21, '2020-01-11 00:22:56', '2020-01-11 00:23:05'),
(157, 'Vanessa João de Almeida', 25353, 'Feminino', '2014-02-03', 'Cédula Pessoal', '8765', '2014-03-22', '(+244) 924 435 525', 'Rangel - Luanda', 'Victor de Almeida', 'Maria de Almeida', 'user.jpg', 7, 2, 24, 21, '2020-01-11 00:26:26', '2020-01-11 00:26:34'),
(158, 'Valter de Oliveira José', 1029, 'Masculino', '2013-03-30', 'Cédula Pessoal', '3663', '2013-04-12', '(+244) 990 101 010', 'Rangel - Luanda', 'Domingos de Almeida José', 'Anastácia de Oliveira José', 'user.jpg', 7, 16, 153, 30, '2020-01-12 08:49:46', '2020-01-12 08:49:57'),
(159, 'Evandro Miguel de Almeida', 14442, 'Masculino', '2013-06-10', 'Cédula Pessoal', '4534', '2013-10-15', '(+244) 925 355 353', 'Rangel - Luanda', 'Diogo de Almeida', 'Helena de Almeida', 'user.jpg', 7, 14, 127, 30, '2020-01-14 22:40:44', '2020-01-14 22:42:38'),
(160, 'Vitoria Armando da Silva', 2333, 'Masculino', '2013-12-14', 'Cédula Pessoal', '3362', '2013-01-19', '(+244) 924 424 242', 'Rangel - Luanda', 'Diogo da Silva', 'Débora da Silva', 'user.jpg', 7, 11, 4, 30, '2020-01-15 19:20:29', '2020-01-15 19:41:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `anolectivo`
--

CREATE TABLE `anolectivo` (
  `id_ano` int(11) NOT NULL,
  `ano_let` int(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `utilizador_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anolectivo`
--

INSERT INTO `anolectivo` (`id_ano`, `ano_let`, `created`, `modified`, `utilizador_id`) VALUES
(1, 2018, '2019-06-16 10:46:04', '2019-06-16 11:25:42', NULL),
(4, 2019, '2019-06-16 11:25:09', '2019-09-23 23:22:24', NULL),
(5, 2017, '2019-07-04 00:38:55', '2019-09-23 23:22:18', NULL),
(6, 2016, '2019-07-04 00:39:03', NULL, NULL),
(7, 2015, '2019-07-04 00:39:12', NULL, NULL),
(8, 2014, '2019-07-04 00:39:25', NULL, NULL),
(10, 2013, '2019-09-23 23:21:49', '2019-09-23 23:22:16', NULL),
(11, 2012, '2019-09-23 23:22:13', NULL, NULL),
(12, 2011, '2019-09-23 23:22:37', NULL, NULL),
(13, 2010, '2019-09-23 23:22:46', NULL, NULL),
(14, 2020, '2020-01-04 23:19:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `assiduidade_alunos`
--

CREATE TABLE `assiduidade_alunos` (
  `id_assiduidade` int(11) NOT NULL,
  `aluno_id` int(11) DEFAULT NULL,
  `anolectivo_id` int(11) DEFAULT NULL,
  `turma_id` int(11) DEFAULT NULL,
  `falta` int(11) DEFAULT '1',
  `justificacao` int(11) DEFAULT '0',
  `data` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `assiduidade_alunos`
--

INSERT INTO `assiduidade_alunos` (`id_assiduidade`, `aluno_id`, `anolectivo_id`, `turma_id`, `falta`, `justificacao`, `data`) VALUES
(1, 125, 4, 9, 1, 1, '2019-12-11 11:35:07'),
(2, 124, 4, 9, 1, 0, '2019-12-11 11:35:07'),
(3, 128, 4, 9, 1, 0, '2019-12-11 11:35:07'),
(4, 140, 4, 9, 1, 0, '2019-12-11 11:35:07'),
(5, 127, 4, 9, 1, 1, '2019-12-11 11:35:08'),
(6, 126, 4, 9, 1, 0, '2019-12-11 11:35:08'),
(7, 121, 4, 9, 1, 0, '2019-12-11 11:35:08'),
(8, 136, 4, 9, 1, 0, '2019-12-11 11:35:08'),
(9, 141, 4, 9, 1, 0, '2019-12-11 11:35:08'),
(10, 142, 4, 9, 1, 0, '2019-12-11 11:35:08'),
(11, 131, 4, 9, 1, 0, '2019-12-11 11:35:08'),
(12, 122, 4, 9, 1, 0, '2019-12-11 11:35:08'),
(13, 138, 4, 9, 1, 0, '2019-12-11 11:35:08'),
(14, 130, 4, 9, 1, 0, '2019-12-11 11:35:08'),
(15, 129, 4, 9, 1, 0, '2019-12-11 11:35:08'),
(16, 134, 4, 9, 1, 0, '2019-12-11 11:35:08'),
(17, 135, 4, 9, 1, 0, '2019-12-11 11:35:08'),
(18, 132, 4, 9, 1, 1, '2019-12-11 11:35:08'),
(19, 133, 4, 9, 1, 0, '2019-12-11 11:35:08'),
(20, 139, 4, 9, 1, 0, '2019-12-11 11:35:08'),
(21, 125, 4, 9, 1, 1, '2019-12-13 14:59:25'),
(22, 124, 4, 9, 1, 1, '2019-12-13 14:59:25'),
(23, 128, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(24, 140, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(25, 127, 4, 9, 1, 1, '2019-12-13 14:59:25'),
(26, 126, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(27, 121, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(28, 136, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(29, 141, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(30, 142, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(31, 131, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(32, 122, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(33, 138, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(34, 130, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(35, 129, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(36, 134, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(37, 135, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(38, 132, 4, 9, 1, 1, '2019-12-13 14:59:25'),
(39, 133, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(40, 139, 4, 9, 1, 0, '2019-12-13 14:59:25'),
(41, 140, 4, 9, 1, 0, '2019-12-15 15:00:34'),
(42, 126, 4, 9, 1, 0, '2019-12-15 15:00:34'),
(43, 121, 4, 9, 1, 0, '2019-12-15 15:00:34'),
(44, 125, 4, 9, 1, 0, '2019-12-16 06:22:31'),
(45, 124, 4, 9, 1, 0, '2019-12-16 06:22:31'),
(46, 128, 4, 9, 1, 0, '2019-12-16 06:22:31'),
(47, 140, 4, 9, 1, 0, '2019-12-16 06:22:31'),
(48, 127, 4, 9, 1, 1, '2019-12-16 06:22:31'),
(49, 126, 4, 9, 1, 0, '2019-12-16 06:22:31'),
(50, 121, 4, 9, 1, 0, '2019-12-16 06:22:31'),
(51, 136, 4, 9, 1, 0, '2019-12-16 06:22:31'),
(52, 141, 4, 9, 1, 0, '2019-12-16 06:22:32'),
(53, 142, 4, 9, 1, 0, '2019-12-16 06:22:32'),
(54, 131, 4, 9, 1, 0, '2019-12-16 06:22:32'),
(55, 122, 4, 9, 1, 0, '2019-12-16 06:22:32'),
(56, 138, 4, 9, 1, 0, '2019-12-16 06:22:32'),
(57, 130, 4, 9, 1, 0, '2019-12-16 06:22:32'),
(58, 129, 4, 9, 1, 0, '2019-12-16 06:22:32'),
(59, 134, 4, 9, 1, 0, '2019-12-16 06:22:32'),
(60, 135, 4, 9, 1, 0, '2019-12-16 06:22:33'),
(61, 132, 4, 9, 1, 1, '2019-12-16 06:22:33'),
(62, 133, 4, 9, 1, 0, '2019-12-16 06:22:33'),
(63, 139, 4, 9, 1, 0, '2019-12-16 06:22:33'),
(64, 146, 12, 14, 1, 1, '2020-01-02 07:08:49'),
(65, 146, 12, 14, 1, 1, '2020-01-02 11:30:33'),
(66, 146, 12, 14, 1, 1, '2020-01-02 11:30:56'),
(67, 146, 12, 14, 1, 0, '2020-01-02 11:37:39'),
(68, 125, 4, 9, 1, 0, '2020-01-02 11:38:47'),
(69, 124, 4, 9, 1, 0, '2020-01-02 11:38:47'),
(70, 128, 4, 9, 1, 0, '2020-01-02 11:38:47'),
(71, 140, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(72, 127, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(73, 126, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(74, 121, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(75, 136, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(76, 141, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(77, 142, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(78, 131, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(79, 122, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(80, 138, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(81, 130, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(82, 129, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(83, 134, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(84, 135, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(85, 132, 4, 9, 1, 1, '2020-01-02 11:38:48'),
(86, 133, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(87, 139, 4, 9, 1, 0, '2020-01-02 11:38:48'),
(88, 133, 4, 9, 1, 0, '2020-01-02 11:39:21'),
(89, 139, 4, 9, 1, 0, '2020-01-02 11:39:21'),
(90, 140, 4, 9, 1, 0, '2020-01-02 11:45:43'),
(91, 127, 4, 9, 1, 0, '2020-01-02 11:45:43'),
(92, 126, 4, 9, 1, 0, '2020-01-02 11:45:43'),
(93, 124, 1, 8, 1, 0, '2020-01-02 12:37:12'),
(94, 146, 12, 14, 1, 0, '2020-01-02 16:44:50'),
(95, 123, 4, 14, 1, 1, '2020-02-29 14:41:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `assiduidade_funcionario`
--

CREATE TABLE `assiduidade_funcionario` (
  `id_assiduidade` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `falta` int(11) DEFAULT '0',
  `justificacao` int(11) DEFAULT '0',
  `mes_ano` varchar(10) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `assiduidade_funcionario`
--

INSERT INTO `assiduidade_funcionario` (`id_assiduidade`, `funcionario_id`, `falta`, `justificacao`, `mes_ano`, `data`) VALUES
(100, 25, 1, 0, '2019-12', '2019-12-16 06:26:04'),
(101, 33, 1, 1, '2019-12', '2019-12-16 06:26:04'),
(102, 22, 1, 1, '2019-12', '2019-12-16 06:26:04'),
(103, 28, 1, 0, '2019-12', '2019-12-16 06:26:04'),
(104, 27, 1, 0, '2019-12', '2019-12-16 06:26:04'),
(105, 20, 1, 0, '2019-12', '2019-12-16 06:26:04'),
(106, 31, 1, 1, '2019-12', '2019-12-16 06:26:18'),
(107, 14, 1, 1, '2019-12', '2019-12-16 06:26:18'),
(108, 21, 1, 1, '2019-12', '2019-12-16 06:26:27'),
(109, 30, 1, 1, '2019-12', '2019-12-16 06:26:27'),
(110, 32, 1, 0, '2019-12', '2019-12-16 06:26:34'),
(111, 29, 1, 1, '2019-12', '2019-12-16 06:26:34'),
(112, 17, 1, 0, '2019-12', '2019-12-16 06:26:34'),
(113, 31, 1, 1, '2019-12', '2019-12-16 08:07:02'),
(114, 14, 1, 1, '2019-12', '2019-12-16 08:07:02'),
(115, 31, 1, 0, '2019-12', '2019-12-16 08:07:13'),
(116, 14, 1, 1, '2019-12', '2019-12-16 08:07:13'),
(120, 15, 1, 1, '2019-12', '2019-12-16 18:58:43'),
(121, 31, 1, 0, '2019-12', '2019-12-16 18:58:52'),
(122, 14, 1, 0, '2019-12', '2019-12-16 18:58:52'),
(123, 25, 1, 0, '2019-12', '2019-12-18 08:45:01'),
(124, 33, 1, 0, '2019-12', '2019-12-18 08:45:02'),
(125, 22, 1, 0, '2019-12', '2019-12-18 08:45:02'),
(126, 28, 1, 0, '2019-12', '2019-12-18 08:45:02'),
(127, 27, 1, 0, '2019-12', '2019-12-18 08:45:02'),
(128, 20, 1, 0, '2019-12', '2019-12-18 08:45:02'),
(129, 31, 1, 0, '2019-12', '2019-12-18 08:45:12'),
(130, 14, 1, 0, '2019-12', '2019-12-18 08:45:12'),
(131, 15, 1, 1, '2019-12', '2019-12-18 09:52:58'),
(132, 29, 1, 1, '2019-12', '2019-12-18 10:12:25'),
(133, 32, 1, 0, '2019-12', '2019-12-18 10:12:36'),
(134, 29, 1, 1, '2019-12', '2019-12-18 10:12:37'),
(135, 21, 1, 1, '2019-12', '2019-12-20 07:30:14'),
(136, 30, 1, 0, '2019-12', '2019-12-20 07:30:14'),
(137, 26, 1, 0, '2019-12', '2019-12-20 07:35:11'),
(138, 25, 1, 0, '2019-12', '2019-12-20 07:36:26'),
(139, 33, 1, 0, '2019-12', '2019-12-20 07:36:26'),
(140, 22, 1, 0, '2019-12', '2019-12-20 07:36:26'),
(141, 28, 1, 1, '2019-12', '2019-12-20 07:36:26'),
(142, 27, 1, 0, '2019-12', '2019-12-20 07:36:26'),
(143, 20, 1, 0, '2019-12', '2019-12-20 07:36:26'),
(144, 25, 1, 0, '2019-12', '2019-12-20 07:36:35'),
(145, 33, 1, 0, '2019-12', '2019-12-20 07:36:36'),
(146, 22, 1, 0, '2019-12', '2019-12-20 07:36:36'),
(147, 28, 1, 1, '2019-12', '2019-12-20 07:36:36'),
(148, 27, 1, 0, '2019-12', '2019-12-20 07:36:36'),
(149, 20, 1, 0, '2019-12', '2019-12-20 07:36:36'),
(150, 25, 1, 0, '2019-12', '2019-12-20 07:36:44'),
(151, 33, 1, 0, '2019-12', '2019-12-20 07:36:44'),
(152, 22, 1, 0, '2019-12', '2019-12-20 07:36:44'),
(153, 28, 1, 0, '2019-12', '2019-12-20 07:36:44'),
(154, 27, 1, 0, '2019-12', '2019-12-20 07:36:44'),
(155, 20, 1, 0, '2019-12', '2019-12-20 07:36:44'),
(156, 21, 1, 1, '2019-12', '2019-12-20 07:37:28'),
(157, 30, 1, 0, '2019-12', '2019-12-20 07:37:29'),
(158, 21, 1, 0, '2020-01', '2020-01-01 20:17:14'),
(159, 30, 1, 0, '2020-01', '2020-01-01 20:17:14'),
(160, 32, 1, 0, '2020-02', '2020-02-01 09:09:41'),
(161, 29, 1, 0, '2020-02', '2020-02-01 09:09:42'),
(162, 17, 1, 0, '2020-02', '2020-02-01 09:09:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `nome_classe` varchar(200) NOT NULL,
  `nivel` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `classe`
--

INSERT INTO `classe` (`id_classe`, `nome_classe`, `nivel`) VALUES
(41, 'Iniciação', 'Ensino Primário'),
(43, '1ª Classe', 'Ensino Primário'),
(44, '2ª classe', 'Ensino Primário'),
(45, '3ª classe', 'Ensino Primário'),
(46, '4ª classe', 'Ensino Primário'),
(47, '5ª classe', 'Ensino Primário'),
(48, '6ª classe', 'Ensino Primário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome_curso`) VALUES
(1, '---'),
(2, 'Gestão de Recursos Humanos'),
(3, 'Contabilidade'),
(4, 'Economia'),
(5, 'Direito'),
(6, 'Informática'),
(7, 'Educação Fisica'),
(8, 'Geologia e Minas'),
(9, 'Contabilidade e Gestão'),
(10, 'Ciências Fisicas e Biológicas'),
(12, 'Ciências Econômicas e Jurídicas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `nome_disciplina` varchar(200) NOT NULL,
  `sigla_disciplina` varchar(200) NOT NULL,
  `classe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `nome_disciplina`, `sigla_disciplina`, `classe_id`) VALUES
(22, 'Representação Matemática', 'RM', 41),
(23, 'C. Ling. e literatura Infantíl', 'CL e LI', 41),
(24, 'Meio Físico Social', 'MFS', 41),
(25, 'Exp. Man. Plástica', 'EMP', 41),
(26, 'Exp. Musical', 'EM', 41),
(27, 'Psicomotricidade', 'PSM', 41),
(28, 'Língua Portuguesa', 'LP', 43),
(29, 'Matemática', 'MAT', 43),
(30, 'Estudo do Meio', 'ESTM', 43),
(31, 'Educação Musical', 'EDM', 43),
(32, 'Educação Física', 'EDF', 43),
(33, 'Educação Plástica', 'EDP', 43),
(46, 'Língua Portuguesa', 'LP', 44),
(47, 'Matemática', 'MAT', 44),
(48, 'Estudo Meio', 'ESTM', 44),
(49, 'Educação Musical', 'EDM', 44),
(50, 'Educação Física', 'EDF', 44),
(51, 'Educação Plástica', 'EDP', 44),
(52, 'Língua Portuguesa', 'LP', 45),
(53, 'Matemática', 'MAT', 45),
(54, 'Estudo Meio', 'ESTM', 45),
(55, 'Educação Musical', 'EDM', 45),
(56, 'Educação Física', 'EDF', 45),
(57, 'Educação Plástica', 'EDP', 45),
(58, 'Língua Portuguesa', 'LP', 46),
(59, ' Matemática', ' MAT', 46),
(60, 'Estudo Meio', 'ESTM', 46),
(61, 'Educação Musical', 'EDM', 46),
(62, 'Educação Física', 'EDF', 46),
(63, 'Educação Plástica', 'EDP', 46),
(64, 'Língua Portuguesa', 'LP', 47),
(65, 'Matemática', 'MAT', 47),
(66, 'Ciência da Natureza', 'CNAT', 47),
(67, 'Geografia', 'GEO', 47),
(68, 'História', 'HIST', 47),
(69, 'Educação Manual Plástica', 'EMP', 47),
(70, 'Educação Moral e Cívica', 'EMC', 47),
(71, 'Educação Física', 'EDF', 47),
(72, 'Educação Musical', 'EDM', 47),
(73, 'Língua Portuguesa', 'LP', 48),
(74, 'Matemática', 'MAT', 48),
(75, 'Ciência da Natureza', 'CNAT', 48),
(76, 'Geografia', 'GEO', 48),
(77, 'História', 'HIST', 48),
(78, 'Educação Manual Plástica', 'EMP', 48),
(79, 'Educação Moral e Cívica', 'EMC', 48),
(80, 'Educação Física', 'EDF', 48),
(81, 'Educação Musical', 'EDM', 48);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_classe`
--

CREATE TABLE `disciplina_classe` (
  `id_disciplina_classe` int(11) NOT NULL,
  `disciplina_id` int(11) DEFAULT NULL,
  `classe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplina_classe`
--

INSERT INTO `disciplina_classe` (`id_disciplina_classe`, `disciplina_id`, `classe_id`) VALUES
(1, 22, 41),
(2, 23, 41),
(3, 24, 41),
(4, 25, 41),
(5, 26, 41),
(6, 27, 41),
(7, 28, 43),
(8, 29, 43),
(9, 30, 43),
(10, 31, 43),
(11, 32, 43),
(12, 33, 43),
(13, 28, 44),
(14, 29, 44),
(15, 30, 44),
(16, 31, 44),
(17, 32, 44),
(18, 33, 44),
(19, 28, 45),
(20, 29, 45),
(21, 30, 45),
(22, 31, 45),
(23, 32, 45),
(24, 33, 45),
(25, 28, 46),
(26, 29, 46),
(27, 30, 46),
(28, 31, 46),
(29, 32, 46),
(30, 33, 46),
(31, 28, 47),
(32, 29, 47),
(33, 31, 47),
(34, 32, 47),
(40, 28, 48),
(41, 29, 48),
(42, 31, 48),
(43, 32, 48);

-- --------------------------------------------------------

--
-- Estrutura da tabela `encarregados`
--

CREATE TABLE `encarregados` (
  `id_encarregado` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL DEFAULT '0',
  `anolectivo_id` int(11) NOT NULL DEFAULT '0',
  `nome_encarregado` varchar(200) NOT NULL,
  `parentesco` varchar(200) NOT NULL,
  `telemovel_encarregado` varchar(200) NOT NULL,
  `email_encarregado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `encarregados`
--

INSERT INTO `encarregados` (`id_encarregado`, `aluno_id`, `anolectivo_id`, `nome_encarregado`, `parentesco`, `telemovel_encarregado`, `email_encarregado`) VALUES
(44, 121, 1, 'José dos Santos', 'Pai', '(+244) 923 342 442', 'diogo.santos@hotmail.com'),
(45, 121, 1, 'Marlene dos Santos', 'Mãe', '(+244) 912 009 286', 'marle_aguiar@gmail.com'),
(46, 124, 4, 'João Bernardo', 'Pai', '(+244) 922 145 852', 'j.bernardo@gmail.com'),
(47, 145, 7, 'Manuel José', 'Pai', '(+244) 910 102 300', 'manuel_jose@live.com'),
(48, 124, 1, 'Fernanda Bernardo', 'Mãe', '(+244) 923 323 233', 'fbernardo@gmail.com'),
(49, 145, 6, 'Manuel José', 'Pai', '(+244) 910 102 300', 'manuel_jose@live.com'),
(50, 131, 1, 'MILTON MIGUEL PEDRO', 'Pai', '(+244) 988 778 877', 'MILTON_PEDRO@HOTMAIL.COM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome_funcionario` varchar(200) NOT NULL,
  `provincia` int(11) DEFAULT NULL,
  `genero_funcionario` varchar(50) NOT NULL,
  `bi_funcionario` varchar(100) NOT NULL,
  `nascimento_funcionario` date NOT NULL,
  `endereco_funcionario` varchar(200) NOT NULL,
  `telemovel_funcionario` varchar(200) NOT NULL,
  `email_funcionario` varchar(200) NOT NULL,
  `nivel_acesso` varchar(200) DEFAULT NULL,
  `nome_user` varchar(200) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `photo` varchar(300) DEFAULT 'user.jpg',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `provincia`, `genero_funcionario`, `bi_funcionario`, `nascimento_funcionario`, `endereco_funcionario`, `telemovel_funcionario`, `email_funcionario`, `nivel_acesso`, `nome_user`, `password`, `photo`, `created`, `modified`) VALUES
(6, 'Benvinda Shelcia Inacio', 1, 'Feminino', '123442456SA413', '1999-02-14', '  Camama - Rua 4', '(+244) 912 345 234', 'shelcia@inacia.com', '1', 'shelcia', '202cb962ac59075b964b07152d234b70', 'e6df3b7cf9da33fea2db63fd99ccc7d9.jpg', '2019-07-11 23:28:48', '2020-01-02 22:00:12'),
(14, 'Pamela Cristovão', 11, 'Feminino', '267347378LA276', '1996-08-15', 'Rua Comandante Cantiga', '+244 963 663 738', 'pamela@cris.co.ao', '4', 'Pamela', '202cb962ac59075b964b07152d234b70', 'user.jpg', '2019-07-14 08:20:41', '2019-12-08 11:42:22'),
(15, 'Eugenio Mauricio', 11, 'Masculino', '773734789LA173', '1991-08-15', ' Nelito Soares - Rangel', '+244 956 773 773', 'eugenio@eugenio.com', '7', '', '', 'user.jpg', '2019-07-14 09:08:47', '2019-12-12 20:38:17'),
(17, 'Margareth Cristovão', 11, 'Feminino', '173838838LA747', '1980-09-10', 'Golf 2 - Kilamba Kiaxi', '+244 953 637 775', 'magui@magui.co.ao', '3', 'Margareth', '202cb962ac59075b964b07152d234b70', 'user.jpg', '2019-07-14 09:29:27', '2019-12-08 11:42:31'),
(20, 'Rossana da Silva', 11, 'Feminino', '254536366LA838', '1981-08-15', 'Viana - Kapalanca', '+244 900 092 728', 'rossana@silva.com', '5', 'Rossana', '202cb962ac59075b964b07152d234b70', 'user.jpg', '2019-07-14 12:21:05', '2019-12-12 12:11:49'),
(21, 'Evanildo da Silva', 11, 'Masculino', '183838949LA222', '2000-08-15', 'Viana Kapalanca', '+244 900 255 341', 'evany@evany.co.ao', '2', 'Evanildo', '202cb962ac59075b964b07152d234b70', 'user.jpg', '2019-07-14 12:22:28', '2019-12-08 11:42:42'),
(22, 'Dorivaldo Palhares', 11, 'Masculino', '827378838LA009', '1988-10-23', 'Viana - Zango 2', '+244 955 869 230', 'dp@dp.co.ao', '5', 'dp', '202cb962ac59075b964b07152d234b70', 'bf447df75cca004c444bb8f2d0e7cbd4.jpg', '2019-07-14 21:24:42', '2019-12-12 20:37:07'),
(23, 'Ermano Cristovão', 11, 'Masculino', '783478783LA838', '1990-06-13', 'Rangel - Luanda', '+244 995 869 230', 'ermano_cr@live.com', '6', 'admin', '202cb962ac59075b964b07152d234b70', 'user.jpg', '2019-07-14 22:15:18', '2019-12-12 19:29:51'),
(25, 'Adriana da Silva', 11, 'Feminino', '142354365LA050', '1985-08-31', 'Cazenga', '+244 922 222 222', 'drica@live.com', '5', 'adriana', '202cb962ac59075b964b07152d234b70', '707f7dc7bb6cb377ba6ce6ec8d5606df.jpg', '2019-07-15 20:19:10', '2019-12-13 19:15:26'),
(26, 'Aldair da Silva', 11, 'Masculino', '888177626LA144', '1989-06-26', 'Gamek', '+244 902 993 737', 'aldair@aldair.com', '8', '', '', 'user.jpg', '2019-07-17 20:11:32', '2019-12-12 20:38:24'),
(27, 'Rogério Olimpio', 1, 'Masculino', '902900990LA888', '1980-07-04', '  Comissão do Cazenga - Rua 6', '(+244) 927 777 255', 'rogerio_olz@sp.com', '5', 'Rogerio Olimpio', 'e10adc3949ba59abbe56e057f20f883e', 'user.jpg', '2019-12-13 00:20:42', '2020-01-03 01:11:47'),
(28, 'Eduardo da Silva', 1, 'Masculino', '892398983LA673', '1958-01-20', 'Cazenga - Rua do Comercio', '(+244) 924 566 733', 'edu_silva@gmail.com', '5', 'Edu Silva', 'e10adc3949ba59abbe56e057f20f883e', '06fa7de0b2ced235317ca5a5406e09e6.jpg', '2019-12-13 00:23:42', '2019-12-13 00:24:17'),
(29, 'Edith Paulo Salvador', 11, 'Feminino', '329889238LA236', '1987-01-04', 'Viana - Kapalanca', '(+244) 935 634 766', 'edith_joia@hotmail.com', '3', 'Edith Paulo', 'e10adc3949ba59abbe56e057f20f883e', '91988f33928a98329c2f6b337649cc20.jpg', '2019-12-13 00:26:06', '2019-12-13 00:26:37'),
(30, 'Iracelma Cadete', 11, 'Feminino', '237878237LA783', '1992-07-14', 'Comissão do Cazenga - Rua 9', '(+244) 923 378 287', 'iracelma_cadete@gmail.com', '2', 'Iracelma Cadete', 'e10adc3949ba59abbe56e057f20f883e', 'user.jpg', '2019-12-13 00:28:09', '2019-12-13 00:28:25'),
(31, 'Neusa Saldanha', 11, 'Feminino', '902383488LA329', '1987-09-16', 'Rangel - Rua CMDT CAntiga', '(+244) 922 656 565', 'neusa.saldanha@gmail.com', '4', 'Neusa Saldanha', 'e10adc3949ba59abbe56e057f20f883e', 'user.jpg', '2019-12-13 00:30:34', '2019-12-13 00:30:56'),
(32, 'Cândida Cristovão', 1, 'Feminino', '928989328LA762', '1968-09-21', '    Rangel Precol - Rua CMDT Cantiga', '(+244) 926 723 676', 'candida@hotamail.com', '3', 'Candida Cristovao', 'e10adc3949ba59abbe56e057f20f883e', 'user.jpg', '2019-12-13 00:33:22', '2019-12-15 22:45:46'),
(33, 'Ana Maria Pedro Neto', 11, 'Feminino', '782873277LA832', '1970-09-01', 'Viana - KM 9 - Robaldina', '(+244) 963 777 373', 'ana.maria@live.com', '5', 'Ana Maria', 'e10adc3949ba59abbe56e057f20f883e', 'user.jpg', '2019-12-13 00:35:09', '2019-12-13 00:35:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `id_matricula` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `anolectivo_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `curso_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`id_matricula`, `aluno_id`, `anolectivo_id`, `turma_id`, `funcionario_id`, `created`, `modified`, `curso_id`) VALUES
(40, 121, 4, 9, 21, '2019-12-10 20:43:35', NULL, NULL),
(41, 121, 1, 8, 21, '2019-12-10 20:44:27', NULL, NULL),
(42, 122, 4, 9, 21, '2019-12-10 21:45:31', NULL, NULL),
(43, 122, 1, 8, 21, '2019-12-10 21:47:26', '2019-12-10 21:47:50', NULL),
(44, 123, 4, 14, 21, '2019-12-10 21:54:30', NULL, NULL),
(45, 123, 1, 13, 21, '2019-12-10 22:12:54', NULL, NULL),
(46, 124, 4, 9, 21, '2019-12-11 00:26:52', NULL, NULL),
(47, 125, 4, 9, 21, '2019-12-11 00:29:30', NULL, NULL),
(48, 126, 4, 9, 21, '2019-12-11 00:31:56', NULL, NULL),
(49, 127, 4, 9, 21, '2019-12-11 00:34:23', NULL, NULL),
(50, 128, 4, 9, 21, '2019-12-11 00:36:46', NULL, NULL),
(51, 129, 4, 9, 21, '2019-12-11 00:38:57', NULL, NULL),
(52, 130, 4, 9, 21, '2019-12-11 00:42:12', NULL, NULL),
(53, 131, 4, 9, 21, '2019-12-11 00:46:15', NULL, NULL),
(54, 132, 4, 9, 21, '2019-12-11 00:48:44', NULL, NULL),
(55, 133, 4, 9, 21, '2019-12-11 00:50:57', NULL, NULL),
(56, 134, 4, 9, 21, '2019-12-11 00:58:42', NULL, NULL),
(57, 135, 4, 9, 21, '2019-12-11 01:00:51', NULL, NULL),
(58, 136, 4, 9, 21, '2019-12-11 01:06:41', NULL, NULL),
(59, 138, 4, 9, 21, '2019-12-11 01:12:08', NULL, NULL),
(60, 139, 4, 9, 21, '2019-12-11 01:15:34', NULL, NULL),
(61, 140, 4, 9, 21, '2019-12-11 01:17:50', NULL, NULL),
(62, 141, 4, 9, 21, '2019-12-11 01:21:37', NULL, NULL),
(63, 142, 4, 9, 21, '2019-12-11 01:23:48', NULL, NULL),
(64, 136, 1, 8, 21, '2019-12-13 22:14:46', NULL, NULL),
(65, 123, 5, 10, 21, '2019-12-28 23:25:14', NULL, NULL),
(66, 143, 1, 11, 21, '2019-12-28 23:52:46', NULL, NULL),
(67, 144, 8, 12, 21, '2019-12-29 00:10:18', NULL, NULL),
(68, 145, 7, 8, 21, '2019-12-31 17:39:45', NULL, NULL),
(69, 124, 1, 8, 21, '2020-01-01 19:14:26', NULL, NULL),
(70, 146, 12, 14, 21, '2020-01-01 22:41:35', NULL, NULL),
(71, 130, 1, 8, 21, '2020-01-02 12:21:48', NULL, NULL),
(72, 125, 1, 8, 21, '2020-01-04 23:15:30', NULL, NULL),
(73, 125, 14, 10, 21, '2020-01-04 23:25:14', NULL, NULL),
(74, 148, 14, 9, 30, '2020-01-09 00:21:31', NULL, NULL),
(75, 149, 14, 9, 30, '2020-01-10 08:55:26', NULL, NULL),
(76, 150, 14, 9, 30, '2020-01-10 08:58:17', NULL, NULL),
(77, 151, 14, 9, 30, '2020-01-10 09:00:49', NULL, NULL),
(78, 152, 14, 9, 30, '2020-01-10 09:11:20', NULL, NULL),
(79, 153, 14, 9, 30, '2020-01-10 09:16:30', NULL, NULL),
(80, 154, 14, 9, 21, '2020-01-11 00:11:26', NULL, NULL),
(81, 155, 14, 9, 21, '2020-01-11 00:15:47', NULL, NULL),
(82, 156, 14, 9, 21, '2020-01-11 00:23:13', NULL, NULL),
(83, 157, 14, 9, 21, '2020-01-11 00:26:41', NULL, NULL),
(84, 158, 4, 9, 30, '2020-01-12 08:50:55', NULL, NULL),
(85, 159, 4, 9, 30, '2020-01-14 22:42:54', NULL, NULL),
(86, 160, 4, 9, 30, '2020-01-15 19:20:51', NULL, NULL),
(87, 143, 5, 10, 30, '2020-01-15 21:20:34', NULL, NULL),
(88, 143, 6, 9, 30, '2020-01-15 21:21:11', NULL, NULL),
(89, 143, 4, 12, 30, '2020-01-15 21:21:39', NULL, NULL),
(90, 131, 14, 10, 6, '2020-02-22 08:38:04', NULL, NULL),
(91, 122, 14, 10, 21, '2020-03-09 09:31:38', NULL, NULL),
(92, 127, 14, 10, 21, '2020-03-15 13:21:03', NULL, NULL),
(93, 124, 14, 10, 6, '2020-03-20 14:19:58', '2020-03-20 14:29:14', NULL),
(100, 145, 6, 9, 6, '2020-03-20 21:49:22', '2020-03-20 21:50:12', NULL),
(101, 145, 5, 10, 6, '2020-03-20 21:50:46', '2020-03-20 21:51:03', NULL),
(102, 145, 1, 11, 21, '2020-03-20 21:51:27', NULL, NULL),
(103, 145, 4, 12, 21, '2020-03-20 21:53:21', NULL, NULL),
(104, 145, 14, 13, 6, '2020-03-20 22:07:31', NULL, NULL),
(105, 135, 14, 10, 21, '2020-03-31 11:56:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipio`
--

CREATE TABLE `municipio` (
  `municipio_id` int(11) NOT NULL,
  `nome_municipio` varchar(200) NOT NULL,
  `provincia_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `municipio`
--

INSERT INTO `municipio` (`municipio_id`, `nome_municipio`, `provincia_id`) VALUES
(1, 'Luanda', 11),
(2, 'Cacuaco', 11),
(3, 'Viana', 11),
(4, 'Belas', 11),
(5, 'Cazenga', 11),
(6, 'Kilamba Kiaxi', 11),
(7, 'Icolo e Bengo', 11),
(8, 'Dande', 1),
(9, 'Ambriz', 1),
(10, 'Icolo e Bengo', 1),
(11, 'Muxima', 1),
(12, 'Nambuangongo', 1),
(18, 'Lobito', 2),
(19, 'Boboio', 2),
(20, 'Balombo', 2),
(21, 'Ganda', 2),
(22, 'Cubal', 2),
(23, 'Caiambambo', 2),
(24, 'Benguela', 2),
(25, 'Baía Farta', 2),
(26, 'Chongoroi', 2),
(27, 'Kuito', 3),
(28, 'Andulo', 3),
(29, 'Nharea', 3),
(30, 'Cuemba', 3),
(31, 'Cunhima', 3),
(32, 'Catabola', 3),
(33, 'Camacupa', 3),
(34, 'Chinguar', 3),
(35, 'Chitembo', 3),
(36, 'Cabinda', 4),
(37, 'Cacongo', 4),
(38, 'Buco-Zau', 4),
(39, 'Beliza', 4),
(40, 'Menongue', 5),
(41, 'Cuito Cuanavale', 5),
(42, 'Cuchi', 5),
(43, 'Cuangar', 5),
(44, 'Longa', 5),
(45, 'Mavinga', 5),
(46, 'Calai', 5),
(47, 'Dirico', 5),
(48, 'Rivungo', 5),
(49, 'Ondjiva', 6),
(50, 'Cuanhama', 6),
(51, 'Ombadja', 6),
(52, 'Curoroca', 6),
(53, 'Cahama', 6),
(54, 'Cuvelai', 6),
(55, 'Ondjiva', 6),
(56, 'Cuanhama', 6),
(57, 'Ombadja', 6),
(58, 'Curoroca', 6),
(59, 'Cahama', 6),
(60, 'Cuvelai', 6),
(61, 'Cuvelai', 6),
(62, 'Huambo', 7),
(63, 'Londuimbale', 7),
(64, 'Bailundo', 7),
(65, 'Mungo', 7),
(66, 'Tchindjenje', 7),
(67, 'Ucuma', 7),
(68, 'Ekunha', 7),
(69, 'Tchicala-Tcholoanga', 7),
(70, 'Catchiungo', 7),
(71, 'Longongo', 7),
(72, 'Caála', 7),
(73, 'Lubango', 8),
(74, 'Quilengues', 8),
(75, 'Humpata', 8),
(76, 'Chibia', 8),
(77, 'Chiange', 8),
(78, 'Quipungo', 8),
(79, 'Caluquembe', 8),
(80, 'Caconda', 8),
(81, 'Chicomba', 8),
(82, 'Matala', 8),
(83, 'Jamba', 8),
(84, 'Chipindo', 8),
(85, 'Kuvango', 8),
(86, 'N´Dalatando', 9),
(87, 'Cazengo', 9),
(88, 'Lucala', 9),
(89, 'Ambaca', 9),
(90, 'Golungo Alto', 9),
(91, 'Dembos', 9),
(92, 'Bula Atumba', 9),
(93, 'Cambambe', 9),
(94, 'Quiculungo', 9),
(95, 'Bolongongo', 9),
(96, 'Banga', 9),
(97, 'Samba Cajú', 9),
(98, 'Pango', 9),
(99, 'Gonguembo', 9),
(100, 'Sumbe', 10),
(101, 'Porto Amboim', 10),
(102, 'Quibala', 10),
(103, 'Libolo', 10),
(104, 'Mussende', 10),
(105, 'Amboim', 10),
(106, 'Ebo', 10),
(107, 'Quilemda', 10),
(108, 'Conda', 10),
(109, 'Waku Kungo', 10),
(110, 'Seles', 10),
(111, 'Cassongue', 10),
(112, 'Lucapa', 12),
(113, 'Tchitato', 12),
(114, 'Cambulo', 12),
(115, 'Chitato', 12),
(116, 'Cuilo', 12),
(117, 'Caungula', 12),
(118, 'Cuango', 12),
(119, 'Lubalo', 12),
(120, 'Capenda', 12),
(121, 'Camulemba', 12),
(122, 'Xá Muteba', 12),
(123, 'Saurimo', 13),
(124, 'Dala', 13),
(125, 'Muconda', 13),
(126, 'Cacolo', 13),
(127, 'Malanje', 14),
(128, 'Massango', 14),
(129, 'Marimba', 14),
(130, 'Calandula', 14),
(131, 'Caombo', 14),
(132, 'Cunda-Dia-Baza', 14),
(133, 'Cacuzo', 14),
(134, 'Cuaba Nzogo', 14),
(135, 'Quela', 14),
(136, 'Mucari', 14),
(137, 'Cangandala', 14),
(138, 'Cambundi-Catembo', 14),
(139, 'Luquembo', 14),
(140, 'Quirima', 14),
(141, 'Luena', 15),
(142, 'Moxico', 15),
(143, 'Camanongue', 15),
(144, 'Léua', 15),
(145, 'Cameia', 15),
(146, 'Luau', 15),
(147, 'Lucamo', 15),
(148, 'Alto Zambeze', 15),
(149, 'Luchazes', 15),
(150, 'Bundas', 15),
(151, 'Namibe', 16),
(152, 'Camacuio', 16),
(153, 'Bibala', 16),
(154, 'Virei', 16),
(155, 'Tombwa', 16),
(156, 'Zombo', 17),
(157, 'Quimbele', 17),
(158, 'Damba', 17),
(159, 'Mucaba', 17),
(160, 'Macocola', 17),
(161, 'Bembe', 17),
(162, 'Songo', 17),
(163, 'Buengas', 17),
(164, 'Sanza Pombo', 17),
(165, 'Ambuíla', 17),
(166, 'Uíge', 17),
(167, 'Negage', 17),
(168, 'Puri', 17),
(169, 'Alto Cauale', 17),
(170, 'Quitexe', 17),
(171, 'M´Banza Kongo', 18),
(172, 'Soyo', 18),
(173, 'N´Zeto', 18),
(174, 'Cuimba', 18),
(175, 'Noqui', 18),
(176, 'Tomboco', 18),
(178, 'Quiçama', 11),
(179, 'Talatona', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas_disciplina`
--

CREATE TABLE `notas_disciplina` (
  `id_notas_disciplina` int(11) NOT NULL,
  `matricula_id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `anolectivo_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `mac_1` float DEFAULT NULL,
  `cpp_1` float DEFAULT NULL,
  `ct_1` float AS (((mac_1+cpp_1)/2)) PERSISTENT,
  `mac_2` float DEFAULT NULL,
  `cpp_2` float DEFAULT NULL,
  `ct_2` float AS (((mac_2+cpp_2)/2)) PERSISTENT,
  `mac_3` float DEFAULT NULL,
  `cpp_3` float DEFAULT NULL,
  `ct_3` float AS (((mac_3+cpp_3)/2)) PERSISTENT,
  `ce` float DEFAULT NULL,
  `ner` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `notas_disciplina`
--

INSERT INTO `notas_disciplina` (`id_notas_disciplina`, `matricula_id`, `aluno_id`, `anolectivo_id`, `turma_id`, `disciplina_id`, `mac_1`, `cpp_1`, `ct_1`, `mac_2`, `cpp_2`, `ct_2`, `mac_3`, `cpp_3`, `ct_3`, `ce`, `ner`) VALUES
(94, 40, 121, 4, 9, 28, 3, 7, 5, 4, 5, 4.5, 6, 4, 5, 6, NULL),
(95, 40, 121, 4, 9, 29, 5, 4, 4.5, 5, 5, 5, 6, 6, 6, 5, NULL),
(96, 40, 121, 4, 9, 30, 5, 4, 4.5, 8, 5, 6.5, 4, 5, 4.5, 7, NULL),
(97, 40, 121, 4, 9, 31, 5, 7, 6, 5, 6, 5.5, 8, 7, 7.5, 7, NULL),
(98, 40, 121, 4, 9, 32, 10, 7, 8.5, 7, 9, 8, 6, 5, 5.5, 7, NULL),
(99, 40, 121, 4, 9, 33, 4, 6, 5, 6, 5, 5.5, 6, 6, 6, 6, NULL),
(100, 42, 122, 4, 9, 28, 7, 5, 6, 5, 7, 6, 4, 6, 5, 4, NULL),
(101, 42, 122, 4, 9, 29, 5, 7, 6, 6, 5, 5.5, 5, 6, 5.5, 4, NULL),
(102, 42, 122, 4, 9, 30, 5, 5, 5, 4, 6, 5, 6, 6, 6, 4, NULL),
(103, 42, 122, 4, 9, 31, 5, 7, 6, 6, 8, 7, 6, 4, 5, 8, NULL),
(104, 42, 122, 4, 9, 32, 5, 9, 7, 6, 5, 5.5, 6, 8, 7, 6, NULL),
(105, 42, 122, 4, 9, 33, 5, 5, 5, 4, 5, 4.5, 6, 6, 6, 7, NULL),
(106, 43, 122, 1, 8, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 43, 122, 1, 8, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 43, 122, 1, 8, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 43, 122, 1, 8, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 43, 122, 1, 8, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 43, 122, 1, 8, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 44, 123, 4, 14, 73, 4, 5, 4.5, 7, 5, 6, 3, 4, 3.5, 6, NULL),
(113, 44, 123, 4, 14, 74, 6, 4, 5, 5, 5, 5, 6, 7, 6.5, 5, NULL),
(114, 44, 123, 4, 14, 75, 4, 6, 5, 4, 8, 6, 5, 4, 4.5, 7, NULL),
(115, 44, 123, 4, 14, 76, 5, 5, 5, 6, 8, 7, 4, 10, 7, 6, NULL),
(116, 44, 123, 4, 14, 77, 6, 7, 6.5, 7, 5, 6, 8, 6, 7, 9, NULL),
(117, 44, 123, 4, 14, 78, 5, 7, 6, 6, 8, 7, 7, 6, 6.5, 6, NULL),
(118, 44, 123, 4, 14, 79, 7, 6, 6.5, 8, 7, 7.5, 7, 8, 7.5, 4, NULL),
(119, 44, 123, 4, 14, 80, 5, 7, 6, 6, 6, 6, 3, 6, 4.5, 7, NULL),
(120, 44, 123, 4, 14, 81, 7, 6, 6.5, 4, 8, 6, 6, 8, 7, 7, NULL),
(121, 45, 123, 1, 13, 64, 6, 5, 5.5, 8, 7, 7.5, 6, 5, 5.5, 7, NULL),
(122, 45, 123, 1, 13, 65, 5, 4, 4.5, 4, 7, 5.5, 5, 4, 4.5, 10, NULL),
(123, 45, 123, 1, 13, 66, 5, 7, 6, 5, 8, 6.5, 6, 5, 5.5, 5, NULL),
(124, 45, 123, 1, 13, 67, 6, 5, 5.5, 7, 5, 6, 6, 4, 5, 8, NULL),
(125, 45, 123, 1, 13, 68, 4, 9, 6.5, 4, 6, 5, 5, 5, 5, 7, NULL),
(126, 45, 123, 1, 13, 69, 7, 5, 6, 6, 7, 6.5, 7, 4, 5.5, 7, NULL),
(127, 45, 123, 1, 13, 70, 6, 7, 6.5, 6, 8, 7, 6, 6, 6, 8, NULL),
(128, 45, 123, 1, 13, 71, 7, 5, 6, 4, 5, 4.5, 6, 6, 6, 7, NULL),
(129, 45, 123, 1, 13, 72, 5, 7, 6, 6, 5, 5.5, 7, 4, 5.5, 5, NULL),
(130, 47, 125, 4, 9, 28, 6, 9, 7.5, 8, 6, 7, 5, 5, 5, 7, NULL),
(131, 47, 125, 4, 9, 29, 7, 7, 7, 8, 10, 9, 7, 6, 6.5, 7, NULL),
(132, 47, 125, 4, 9, 30, 6, 5, 5.5, 7, 6, 6.5, 6, 8, 7, 6, NULL),
(133, 47, 125, 4, 9, 31, 9, 8, 8.5, 5, 5, 5, 5, 5, 5, 4, NULL),
(134, 47, 125, 4, 9, 32, 7, 6, 6.5, 8, 9, 8.5, 6, 7, 6.5, 8, NULL),
(135, 47, 125, 4, 9, 33, 5, 4, 4.5, 9, 4, 6.5, 5, 4, 4.5, 6, NULL),
(136, 46, 124, 4, 9, 28, 4, 7, 5.5, 5, 6, 5.5, 6, 6, 6, 4, NULL),
(137, 46, 124, 4, 9, 29, 8, 9, 8.5, 7, 7, 7, 9, 6, 7.5, 6, NULL),
(138, 46, 124, 4, 9, 30, 5, 7, 6, 6, 4, 5, 5, 5, 5, 5, NULL),
(139, 46, 124, 4, 9, 31, 8, 6, 7, 7, 6, 6.5, 5, 6, 5.5, 5, NULL),
(140, 46, 124, 4, 9, 32, 7, 7, 7, 6, 7, 6.5, 8, 8, 8, 7, NULL),
(141, 46, 124, 4, 9, 33, 5, 5, 5, 5, 5, 5, 6, 7, 6.5, 7, NULL),
(142, 50, 128, 4, 9, 28, 4, 7, 5.5, 7, 4, 5.5, 5, 6, 5.5, 5, NULL),
(143, 50, 128, 4, 9, 29, 7, 9, 8, 6, 8, 7, 7, 8, 7.5, 7, NULL),
(144, 50, 128, 4, 9, 30, 6, 6, 6, 6, 5, 5.5, 6, 6, 6, 6, NULL),
(145, 50, 128, 4, 9, 31, 5, 5, 5, 5, 5, 5, 6, 5, 5.5, 5, NULL),
(146, 50, 128, 4, 9, 32, 7, 6, 6.5, 8, 9, 8.5, 6, 7, 6.5, 7, NULL),
(147, 50, 128, 4, 9, 33, 5, 7, 6, 7, 7, 7, 6, 6, 6, 5, NULL),
(148, 61, 140, 4, 9, 28, 3, 4, 3.5, 4, 5, 4.5, 7, 5, 6, 6, NULL),
(149, 61, 140, 4, 9, 29, 5, 4, 4.5, 8, 5, 6.5, 4, 8, 6, 5, NULL),
(150, 61, 140, 4, 9, 30, 8, 4, 6, 5, 7, 6, 5, 6, 5.5, 4, NULL),
(151, 61, 140, 4, 9, 31, 6, 5, 5.5, 5, 6, 5.5, 6, 8, 7, 4, NULL),
(152, 61, 140, 4, 9, 32, 8, 7, 7.5, 8, 7, 7.5, 9, 9, 9, 10, NULL),
(153, 61, 140, 4, 9, 33, 6, 6, 6, 8, 7, 7.5, 6, 6, 6, 7, NULL),
(154, 49, 127, 4, 9, 28, 2, 3, 2.5, 4, 4, 4, 5, 4, 4.5, 5, NULL),
(155, 49, 127, 4, 9, 29, 6, 6, 6, 7, 7, 7, 6, 4, 5, 5, NULL),
(156, 49, 127, 4, 9, 30, 5, 5, 5, 6, 4, 5, 5, 5, 5, 5, NULL),
(157, 49, 127, 4, 9, 31, 6, 4, 5, 5, 5, 5, 6, 4, 5, 5, NULL),
(158, 49, 127, 4, 9, 32, 10, 8, 9, 7, 7, 7, 5, 6, 5.5, 6, NULL),
(159, 49, 127, 4, 9, 33, 7, 7, 7, 7, 9, 8, 7, 5, 6, 9, NULL),
(160, 58, 136, 4, 9, 28, 4, 3, 3.5, 4, 5, 4.5, 3, 4, 3.5, 6, NULL),
(161, 58, 136, 4, 9, 29, 8, 9, 8.5, 7, 8, 7.5, 7, 5, 6, 6, NULL),
(162, 58, 136, 4, 9, 30, 7, 4, 5.5, 4, 5, 4.5, 5, 5, 5, 7, NULL),
(163, 58, 136, 4, 9, 31, 5, 7, 6, 6, 5, 5.5, 5, 5, 5, 6, NULL),
(164, 58, 136, 4, 9, 32, 7, 8, 7.5, 7, 7, 7, 6, 7, 6.5, 7, NULL),
(165, 58, 136, 4, 9, 33, 6, 7, 6.5, 7, 5, 6, 7, 7, 7, 5, NULL),
(166, 62, 141, 4, 9, 28, 4, 5, 4.5, 3, 6, 4.5, 5, 3, 4, 5, NULL),
(167, 62, 141, 4, 9, 29, 7, 6, 6.5, 7, 5, 6, 7, 8, 7.5, 7, NULL),
(168, 62, 141, 4, 9, 30, 5, 7, 6, 7, 6, 6.5, 4, 6, 5, 4, NULL),
(169, 62, 141, 4, 9, 31, 6, 6, 6, 7, 5, 6, 6, 6, 6, 5, NULL),
(170, 62, 141, 4, 9, 32, 8, 7, 7.5, 6, 8, 7, 7, 7, 7, 7, NULL),
(171, 62, 141, 4, 9, 33, 6, 6, 6, 8, 5, 6.5, 6, 6, 6, 6, NULL),
(172, 63, 142, 4, 9, 28, 4, 4, 4, 4, 5, 4.5, 4, 4, 4, 3, NULL),
(173, 63, 142, 4, 9, 29, 8, 6, 7, 5, 7, 6, 8, 8, 8, 8, NULL),
(174, 63, 142, 4, 9, 30, 5, 6, 5.5, 5, 6, 5.5, 5, 4, 4.5, 5, NULL),
(175, 63, 142, 4, 9, 31, 5, 6, 5.5, 8, 5, 6.5, 6, 5, 5.5, 9, NULL),
(176, 63, 142, 4, 9, 32, 6, 8, 7, 7, 6, 6.5, 6, 8, 7, 7, NULL),
(177, 63, 142, 4, 9, 33, 6, 6, 6, 6, 7, 6.5, 9, 9, 9, 7, NULL),
(178, 53, 131, 4, 9, 28, 5, 4, 4.5, 4, 3, 3.5, 5, 3, 4, 4, NULL),
(179, 53, 131, 4, 9, 29, 6, 6, 6, 5, 7, 6, 9, 8, 8.5, 8, NULL),
(180, 53, 131, 4, 9, 30, 5, 5, 5, 7, 5, 6, 6, 5, 5.5, 5, NULL),
(181, 53, 131, 4, 9, 31, 5, 8, 6.5, 5, 6, 5.5, 6, 9, 7.5, 8, NULL),
(182, 53, 131, 4, 9, 32, 7, 6, 6.5, 6, 8, 7, 10, 9, 9.5, 9, NULL),
(183, 53, 131, 4, 9, 33, 6, 7, 6.5, 6, 7, 6.5, 7, 6, 6.5, 7, NULL),
(184, 59, 138, 4, 9, 28, 5, 4, 4.5, 5, 4, 4.5, 6, 5, 5.5, 4, NULL),
(185, 59, 138, 4, 9, 29, 6, 8, 7, 4, 6, 5, 6, 5, 5.5, 5, NULL),
(186, 59, 138, 4, 9, 30, 7, 4, 5.5, 6, 4, 5, 6, 5, 5.5, 6, NULL),
(187, 59, 138, 4, 9, 31, 5, 5, 5, 5, 7, 6, 5, 5, 5, 5, NULL),
(188, 59, 138, 4, 9, 32, 7, 6, 6.5, 6, 7, 6.5, 6, 6, 6, 7, NULL),
(189, 59, 138, 4, 9, 33, 5, 5, 5, 5, 6, 5.5, 4, 5, 4.5, 5, NULL),
(190, 52, 130, 4, 9, 28, 5, 6, 5.5, 5, 5, 5, 8, 6, 7, 5, NULL),
(191, 52, 130, 4, 9, 29, 6, 9, 7.5, 6, 5, 5.5, 8, 8, 8, 9, NULL),
(192, 52, 130, 4, 9, 30, 4, 6, 5, 6, 8, 7, 8, 6, 7, 6, NULL),
(193, 52, 130, 4, 9, 31, 5, 7, 6, 6, 5, 5.5, 6, 8, 7, 7, NULL),
(194, 52, 130, 4, 9, 32, 8, 6, 7, 7, 6, 6.5, 5, 8, 6.5, 8, NULL),
(195, 52, 130, 4, 9, 33, 4, 7, 5.5, 5, 5, 5, 6, 7, 6.5, 5, NULL),
(196, 51, 129, 4, 9, 28, 6, 4, 5, 5, 7, 6, 10, 7, 8.5, 9, NULL),
(197, 51, 129, 4, 9, 29, 7, 8, 7.5, 5, 5, 5, 6, 6, 6, 6, NULL),
(198, 51, 129, 4, 9, 30, 7, 5, 6, 7, 5, 6, 5, 5, 5, 7, NULL),
(199, 51, 129, 4, 9, 31, 5, 7, 6, 5, 6, 5.5, 7, 5, 6, 5, NULL),
(200, 51, 129, 4, 9, 32, 6, 8, 7, 5, 9, 7, 5, 8, 6.5, 5, NULL),
(201, 51, 129, 4, 9, 33, 7, 5, 6, 7, 6, 6.5, 4, 4, 4, 7, NULL),
(202, 56, 134, 4, 9, 28, 7, 6, 6.5, 4, 6, 5, 6, 6, 6, 7, NULL),
(203, 56, 134, 4, 9, 29, 5, 5, 5, 5, 7, 6, 7, 8, 7.5, 8, NULL),
(204, 56, 134, 4, 9, 30, 6, 5, 5.5, 6, 4, 5, 6, 5, 5.5, 6, NULL),
(205, 56, 134, 4, 9, 31, 5, 7, 6, 8, 7, 7.5, 6, 6, 6, 7, NULL),
(206, 56, 134, 4, 9, 32, 6, 5, 5.5, 7, 6, 6.5, 6, 5, 5.5, 6, NULL),
(207, 56, 134, 4, 9, 33, 8, 8, 8, 7, 8, 7.5, 7, 8, 7.5, 5, NULL),
(208, 57, 135, 4, 9, 28, 8, 9, 8.5, 5, 9, 7, 5, 7, 6, 6, NULL),
(209, 57, 135, 4, 9, 29, 5, 5, 5, 4, 7, 5.5, 5, 5, 5, 5, NULL),
(210, 57, 135, 4, 9, 30, 5, 6, 5.5, 4, 7, 5.5, 6, 4, 5, 7, NULL),
(211, 57, 135, 4, 9, 31, 4, 6, 5, 5, 6, 5.5, 7, 7, 7, 5, NULL),
(212, 57, 135, 4, 9, 32, 7, 7, 7, 7, 7, 7, 7, 7, 7, 6, NULL),
(213, 57, 135, 4, 9, 33, 9, 7, 8, 7, 7, 7, 7, 7, 7, 8, NULL),
(214, 54, 132, 4, 9, 28, 7, 5, 6, 5, 5, 5, 6, 4, 5, 7, NULL),
(215, 54, 132, 4, 9, 29, 8, 7, 7.5, 5, 5, 5, 5, 5, 5, 5, NULL),
(216, 54, 132, 4, 9, 30, 6, 8, 7, 6, 8, 7, 6, 7, 6.5, 5, NULL),
(217, 54, 132, 4, 9, 31, 6, 4, 5, 6, 6, 6, 5, 4, 4.5, 4, NULL),
(218, 54, 132, 4, 9, 32, 6, 7, 6.5, 7, 5, 6, 5, 9, 7, 6, NULL),
(219, 54, 132, 4, 9, 33, 5, 6, 5.5, 8, 8, 8, 6, 6, 6, 7, NULL),
(220, 55, 133, 4, 9, 28, 7, 7, 7, 10, 5, 7.5, 6, 7, 6.5, 6, NULL),
(221, 55, 133, 4, 9, 29, 7, 6, 6.5, 6, 7, 6.5, 6, 4, 5, 5, NULL),
(222, 55, 133, 4, 9, 30, 6, 7, 6.5, 6, 4, 5, 5, 5, 5, 7, NULL),
(223, 55, 133, 4, 9, 31, 5, 8, 6.5, 6, 7, 6.5, 7, 5, 6, 8, NULL),
(224, 55, 133, 4, 9, 32, 6, 7, 6.5, 7, 6, 6.5, 6, 7, 6.5, 6, NULL),
(225, 55, 133, 4, 9, 33, 6, 5, 5.5, 6, 5, 5.5, 6, 5, 5.5, 6, NULL),
(226, 60, 139, 4, 9, 28, 7, 4, 5.5, 8, 5, 6.5, 8, 6, 7, 9, NULL),
(227, 60, 139, 4, 9, 29, 4, 4, 4, 4, 7, 5.5, 5, 5, 5, 4, NULL),
(228, 60, 139, 4, 9, 30, 7, 4, 5.5, 6, 5, 5.5, 6, 6, 6, 6, NULL),
(229, 60, 139, 4, 9, 31, 5, 6, 5.5, 5, 6, 5.5, 5, 5, 5, 7, NULL),
(230, 60, 139, 4, 9, 32, 6, 7, 6.5, 5, 5, 5, 6, 5, 5.5, 7, NULL),
(231, 60, 139, 4, 9, 33, 5, 5, 5, 7, 6, 6.5, 6, 6, 6, 5, NULL),
(232, 48, 126, 4, 9, 28, 7, 7, 7, 5, 7, 6, 7, 8, 7.5, 5, NULL),
(233, 48, 126, 4, 9, 29, 8, 4, 6, 7, 5, 6, 7, 6, 6.5, 6, NULL),
(234, 48, 126, 4, 9, 30, 5, 6, 5.5, 7, 6, 6.5, 5, 8, 6.5, 7, NULL),
(235, 48, 126, 4, 9, 31, 6, 6, 6, 7, 5, 6, 4, 5, 4.5, 5, NULL),
(236, 48, 126, 4, 9, 32, 6, 7, 6.5, 7, 6, 6.5, 6, 6, 6, 9, NULL),
(237, 48, 126, 4, 9, 33, 5, 6, 5.5, 5, 7, 6, 7, 6, 6.5, 7, NULL),
(238, 65, 123, 5, 10, 46, 5, 3, 4, 7, 5, 6, 5, 3, 4, 6, NULL),
(239, 65, 123, 5, 10, 47, 3, 4, 3.5, 5, 5, 5, 5, 6, 5.5, 7, NULL),
(240, 65, 123, 5, 10, 48, 5, 4, 4.5, 4, 4, 4, 5, 8, 6.5, 4, NULL),
(241, 65, 123, 5, 10, 49, 4, 7, 5.5, 6, 5, 5.5, 6, 5, 5.5, 5, NULL),
(242, 65, 123, 5, 10, 50, 6, 4, 5, 5, 5, 5, 6, 7, 6.5, 6, NULL),
(243, 65, 123, 5, 10, 51, 5, 5, 5, 6, 6, 6, 6, 7, 6.5, 3, NULL),
(244, 66, 143, 1, 11, 52, 5, 4, 4.5, 7, 6, 6.5, 6, 5, 5.5, 7, NULL),
(245, 66, 143, 1, 11, 53, 5, 5, 5, 7, 5, 6, 6, 6, 6, 5, NULL),
(246, 66, 143, 1, 11, 54, 5, 6, 5.5, 5, 6, 5.5, 5, 5, 5, 6, NULL),
(247, 66, 143, 1, 11, 55, 6, 6, 6, 5, 4, 4.5, 4, 6, 5, 5, NULL),
(248, 66, 143, 1, 11, 56, 6, 6, 6, 5, 6, 5.5, 4, 6, 5, 4, NULL),
(249, 66, 143, 1, 11, 57, 4, 4, 4, 5, 6, 5.5, 6, 3, 4.5, 5, NULL),
(250, 67, 144, 8, 12, 58, 10, 7, 8.5, 6, 7, 6.5, 6, 7, 6.5, 7, NULL),
(251, 67, 144, 8, 12, 59, 8, 5, 6.5, 6, 8, 7, 7, 5, 6, 5, NULL),
(252, 67, 144, 8, 12, 60, 3, 6, 4.5, 4, 7, 5.5, 5, 6, 5.5, 4, NULL),
(253, 67, 144, 8, 12, 61, 6, 6, 6, 7, 5, 6, 5, 6, 5.5, 7, NULL),
(254, 67, 144, 8, 12, 62, 4, 4, 4, 4, 3, 3.5, 5, 4, 4.5, 4, NULL),
(255, 67, 144, 8, 12, 63, 3, 4, 3.5, 5, 4, 4.5, 3, 3, 3, 5, NULL),
(256, 68, 145, 7, 8, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(257, 68, 145, 7, 8, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(258, 68, 145, 7, 8, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(259, 68, 145, 7, 8, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(260, 68, 145, 7, 8, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(261, 68, 145, 7, 8, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(262, 69, 124, 1, 8, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(263, 69, 124, 1, 8, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(264, 69, 124, 1, 8, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(265, 69, 124, 1, 8, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(266, 69, 124, 1, 8, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(267, 69, 124, 1, 8, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(268, 70, 146, 12, 14, 73, 6, 6, 6, 6, 5, 5.5, 6, 6, 6, 5, NULL),
(269, 70, 146, 12, 14, 74, 7, 7, 7, 7, 3, 5, 6, 5, 5.5, 5, NULL),
(270, 70, 146, 12, 14, 75, 5, 4, 4.5, 7, 5, 6, 6, 6, 6, 6, NULL),
(271, 70, 146, 12, 14, 76, 5, 6, 5.5, 5, 6, 5.5, 7, 5, 6, 6, NULL),
(272, 70, 146, 12, 14, 77, 10, 7, 8.5, 7, 5, 6, 4, 7, 5.5, 7, NULL),
(273, 70, 146, 12, 14, 78, 5, 7, 6, 2, 6, 4, 5, 3, 4, 5, NULL),
(274, 70, 146, 12, 14, 79, 5, 5, 5, 6, 7, 6.5, 6, 6, 6, 8, NULL),
(275, 70, 146, 12, 14, 80, 6, 5, 5.5, 7, 8, 7.5, 7, 6, 6.5, 6, NULL),
(276, 70, 146, 12, 14, 81, 5, 6, 5.5, 7, 6, 6.5, 8, 5, 6.5, 7, NULL),
(277, 71, 130, 1, 8, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(278, 71, 130, 1, 8, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(279, 71, 130, 1, 8, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(280, 71, 130, 1, 8, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(281, 71, 130, 1, 8, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(282, 71, 130, 1, 8, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(283, 41, 121, 1, 8, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(284, 41, 121, 1, 8, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(285, 41, 121, 1, 8, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(286, 41, 121, 1, 8, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(287, 41, 121, 1, 8, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(288, 41, 121, 1, 8, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(289, 64, 136, 1, 8, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(290, 64, 136, 1, 8, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(291, 64, 136, 1, 8, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(292, 64, 136, 1, 8, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(293, 64, 136, 1, 8, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(294, 64, 136, 1, 8, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(295, 72, 125, 1, 8, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(296, 72, 125, 1, 8, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(297, 72, 125, 1, 8, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(298, 72, 125, 1, 8, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(299, 72, 125, 1, 8, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(300, 72, 125, 1, 8, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(301, 73, 125, 14, 10, 46, 4, 3, 3.5, 4, 5, 4.5, 4, 6, 5, 4, NULL),
(302, 73, 125, 14, 10, 47, 4, 7, 5.5, 6, 7, 6.5, 5, 7, 6, 6, NULL),
(303, 73, 125, 14, 10, 48, 3, 6, 4.5, 4, 6, 5, 3, 2, 2.5, 3, NULL),
(304, 73, 125, 14, 10, 49, 4, 6, 5, 4, 6, 5, 5, 5, 5, 4, NULL),
(305, 73, 125, 14, 10, 50, 6, 6, 6, 4, 6, 5, 6, 6, 6, 4, NULL),
(306, 73, 125, 14, 10, 51, 5, 7, 6, 5, 5, 5, 4, 6, 5, 5, NULL),
(307, 74, 148, 14, 9, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(308, 74, 148, 14, 9, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(309, 74, 148, 14, 9, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(310, 74, 148, 14, 9, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(311, 74, 148, 14, 9, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(312, 74, 148, 14, 9, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(313, 75, 149, 14, 9, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(314, 75, 149, 14, 9, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(315, 75, 149, 14, 9, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(316, 75, 149, 14, 9, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(317, 75, 149, 14, 9, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(318, 75, 149, 14, 9, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(319, 76, 150, 14, 9, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(320, 76, 150, 14, 9, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(321, 76, 150, 14, 9, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(322, 76, 150, 14, 9, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(323, 76, 150, 14, 9, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(324, 76, 150, 14, 9, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(325, 77, 151, 14, 9, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(326, 77, 151, 14, 9, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(327, 77, 151, 14, 9, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(328, 77, 151, 14, 9, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(329, 77, 151, 14, 9, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(330, 77, 151, 14, 9, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(331, 78, 152, 14, 9, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(332, 78, 152, 14, 9, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(333, 78, 152, 14, 9, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(334, 78, 152, 14, 9, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(335, 78, 152, 14, 9, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(336, 78, 152, 14, 9, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(337, 79, 153, 14, 9, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(338, 79, 153, 14, 9, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(339, 79, 153, 14, 9, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(340, 79, 153, 14, 9, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(341, 79, 153, 14, 9, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(342, 79, 153, 14, 9, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(343, 80, 154, 14, 9, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(344, 80, 154, 14, 9, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(345, 80, 154, 14, 9, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(346, 80, 154, 14, 9, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(347, 80, 154, 14, 9, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(348, 80, 154, 14, 9, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(349, 81, 155, 14, 9, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(350, 81, 155, 14, 9, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(351, 81, 155, 14, 9, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(352, 81, 155, 14, 9, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(353, 81, 155, 14, 9, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(354, 81, 155, 14, 9, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(355, 82, 156, 14, 9, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(356, 82, 156, 14, 9, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(357, 82, 156, 14, 9, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(358, 82, 156, 14, 9, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(359, 82, 156, 14, 9, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(360, 82, 156, 14, 9, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(361, 83, 157, 14, 9, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(362, 83, 157, 14, 9, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(363, 83, 157, 14, 9, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(364, 83, 157, 14, 9, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(365, 83, 157, 14, 9, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(366, 83, 157, 14, 9, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(367, 84, 158, 4, 9, 28, 4, 6, 5, 5, 6, 5.5, 6, 5, 5.5, 6, NULL),
(368, 84, 158, 4, 9, 29, 5, 4, 4.5, 5, 7, 6, 7, 5, 6, 4, NULL),
(369, 84, 158, 4, 9, 30, 5, 7, 6, 7, 5, 6, 5, 6, 5.5, 5, NULL),
(370, 84, 158, 4, 9, 31, 6, 5, 5.5, 6, 6, 6, 7, 5, 6, 6, NULL),
(371, 84, 158, 4, 9, 32, 5, 8, 6.5, 5, 5, 5, 6, 4, 5, 6, NULL),
(372, 84, 158, 4, 9, 33, 6, 6, 6, 6, 7, 6.5, 7, 8, 7.5, 6, NULL),
(373, 85, 159, 4, 9, 28, 4, 6, 5, 4, 6, 5, 5, 7, 6, 5, NULL),
(374, 85, 159, 4, 9, 29, 5, 7, 6, 8, 5, 6.5, 5, 5, 5, 5, NULL),
(375, 85, 159, 4, 9, 30, 5, 5, 5, 4, 5, 4.5, 5, 5, 5, 6, NULL),
(376, 85, 159, 4, 9, 31, 4, 3, 3.5, 4, 6, 5, 6, 7, 6.5, 6, NULL),
(377, 85, 159, 4, 9, 32, 5, 5, 5, 6, 5, 5.5, 6, 7, 6.5, 5, NULL),
(378, 85, 159, 4, 9, 33, 6, 4, 5, 5, 4, 4.5, 7, 6, 6.5, 4, NULL),
(379, 86, 160, 4, 9, 28, 4, 2, 3, 5, 6, 5.5, 5, 5, 5, 7, NULL),
(380, 86, 160, 4, 9, 29, 6, 6, 6, 5, 3, 4, 4, 7, 5.5, 6, NULL),
(381, 86, 160, 4, 9, 30, 6, 8, 7, 5, 3, 4, 7, 4, 5.5, 5, NULL),
(382, 86, 160, 4, 9, 31, 7, 5, 6, 6, 6, 6, 8, 6, 7, 5, NULL),
(383, 86, 160, 4, 9, 32, 6, 5, 5.5, 5, 5, 5, 5, 4, 4.5, 5, NULL),
(384, 86, 160, 4, 9, 33, 6, 6, 6, 5, 7, 6, 7, 6, 6.5, 5, NULL),
(385, 87, 143, 5, 10, 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(386, 87, 143, 5, 10, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(387, 87, 143, 5, 10, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(388, 87, 143, 5, 10, 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(389, 87, 143, 5, 10, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(390, 87, 143, 5, 10, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(391, 88, 143, 6, 9, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(392, 88, 143, 6, 9, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(393, 88, 143, 6, 9, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(394, 88, 143, 6, 9, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(395, 88, 143, 6, 9, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(396, 88, 143, 6, 9, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(397, 89, 143, 4, 12, 58, 6, 5, 5.5, 4, 7, 5.5, 5, 5, 5, 4, NULL),
(398, 89, 143, 4, 12, 59, 4, 5, 4.5, 5, 4, 4.5, 5, 4, 4.5, 5, NULL),
(399, 89, 143, 4, 12, 60, 5, 5, 5, 6, 4, 5, 6, 5, 5.5, 7, NULL),
(400, 89, 143, 4, 12, 61, 7, 4, 5.5, 5, 7, 6, 6, 5, 5.5, 6, NULL),
(401, 89, 143, 4, 12, 62, 6, 4, 5, 7, 6, 6.5, 7, 7, 7, 8, NULL),
(402, 89, 143, 4, 12, 63, 5, 8, 6.5, 6, 6, 6, 6, 5, 5.5, 8, NULL),
(403, 90, 131, 14, 10, 46, 5, 3, 4, 5, 6, 5.5, 4, 3, 3.5, 10, NULL),
(404, 90, 131, 14, 10, 47, 4, 5, 4.5, 6, 5, 5.5, 7, 5, 6, 8, NULL),
(405, 90, 131, 14, 10, 48, 6, 3, 4.5, 5, 6, 5.5, 4, 4, 4, 4, NULL),
(406, 90, 131, 14, 10, 49, 5, 6, 5.5, 7, 3, 5, 4, 6, 5, 5, NULL),
(407, 90, 131, 14, 10, 50, 6, 8, 7, 6, 8, 7, 6, 3, 4.5, 3, NULL),
(408, 90, 131, 14, 10, 51, 6, 4, 5, 5, 5, 5, 6, 6, 6, 4, NULL),
(409, 92, 127, 14, 10, 46, 5, 5, 5, 7, 6, 6.5, 7, 3, 5, 4, NULL),
(410, 92, 127, 14, 10, 47, 6, 6, 6, 5, 8, 6.5, 5, 5, 5, 4, NULL),
(411, 92, 127, 14, 10, 48, 3, 4, 3.5, 4, 5, 4.5, 3, 4, 3.5, 6, NULL),
(412, 92, 127, 14, 10, 49, 6, 7, 6.5, 4, 4, 4, 5, 4, 4.5, 4, NULL),
(413, 92, 127, 14, 10, 50, 5, 6, 5.5, 6, 5, 5.5, 5, 7, 6, 6, NULL),
(414, 92, 127, 14, 10, 51, 6, 5, 5.5, 7, 4, 5.5, 6, 5, 5.5, 5, NULL),
(424, 93, 124, 14, 10, 46, 2, 5, 3.5, 3, 7, 5, 6, 5, 5.5, 3, NULL),
(425, 93, 124, 14, 10, 47, 7, 5, 6, 5, 5, 5, 6, 6, 6, 5, NULL),
(426, 93, 124, 14, 10, 48, 7, 7, 7, 4, 5, 4.5, 5, 6, 5.5, 6, NULL),
(427, 93, 124, 14, 10, 49, 4, 5, 4.5, 5, 5, 5, 6, 5, 5.5, 5, NULL),
(428, 93, 124, 14, 10, 50, 6, 5, 5.5, 6, 9, 7.5, 4, 6, 5, 4, NULL),
(429, 93, 124, 14, 10, 51, 5, 5, 5, 4, 4, 4, 6, 4, 5, 4, NULL),
(430, 100, 145, 6, 9, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(431, 100, 145, 6, 9, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(432, 100, 145, 6, 9, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(433, 100, 145, 6, 9, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(434, 100, 145, 6, 9, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(435, 100, 145, 6, 9, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(436, 104, 145, 14, 13, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(437, 104, 145, 14, 13, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(438, 104, 145, 14, 13, 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(439, 104, 145, 14, 13, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(440, 104, 145, 14, 13, 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(441, 104, 145, 14, 13, 69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(442, 104, 145, 14, 13, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(443, 104, 145, 14, 13, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(444, 104, 145, 14, 13, 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(445, 103, 145, 4, 12, 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(446, 103, 145, 4, 12, 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(447, 103, 145, 4, 12, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(448, 103, 145, 4, 12, 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(449, 103, 145, 4, 12, 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(450, 103, 145, 4, 12, 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(451, 102, 145, 1, 11, 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(452, 102, 145, 1, 11, 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(453, 102, 145, 1, 11, 54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(454, 102, 145, 1, 11, 55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(455, 102, 145, 1, 11, 56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(456, 102, 145, 1, 11, 57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(457, 101, 145, 5, 10, 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(458, 101, 145, 5, 10, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(459, 101, 145, 5, 10, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(460, 101, 145, 5, 10, 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(461, 101, 145, 5, 10, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(462, 101, 145, 5, 10, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(463, 105, 135, 14, 10, 46, 4, 5, 4.5, 7, 4, 5.5, 4, 6, 5, 6, NULL),
(464, 105, 135, 14, 10, 47, 4, 7, 5.5, 6, 5, 5.5, 5, 4, 4.5, 5, NULL),
(465, 105, 135, 14, 10, 48, 6, 3, 4.5, 4, 6, 5, 4, 4, 4, 8, NULL),
(466, 105, 135, 14, 10, 49, 5, 4, 4.5, 7, 4, 5.5, 5, 7, 6, 5, NULL),
(467, 105, 135, 14, 10, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(468, 105, 135, 14, 10, 51, 7, 4, 5.5, 6, 5, 5.5, 5, 5, 5, 6, NULL),
(469, 91, 122, 14, 10, 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(470, 91, 122, 14, 10, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(471, 91, 122, 14, 10, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(472, 91, 122, 14, 10, 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(473, 91, 122, 14, 10, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(474, 91, 122, 14, 10, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `pais_id` int(11) NOT NULL,
  `nome_pais` varchar(200) DEFAULT NULL,
  `sigla_pais` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`pais_id`, `nome_pais`, `sigla_pais`) VALUES
(1, 'Brasil', 'BR'),
(2, 'Afeganistão', 'AF'),
(3, 'Albânia, Republica da', 'AL'),
(4, 'Argélia', 'DZ'),
(5, 'Samoa Americana', 'AS'),
(6, 'Andorra', 'AD'),
(7, 'Angola', 'AO'),
(8, 'Anguilla', 'AI'),
(9, 'Antártida', 'AQ'),
(10, 'Antigua e Barbuda', 'AG'),
(11, 'Argentina', 'AR'),
(12, 'Armênia, Republica da', 'AM'),
(13, 'Aruba', 'AW'),
(14, 'Austrália', 'AU'),
(15, 'Áustria', 'AT'),
(16, 'Azerbaijão, Republica do', 'AZ'),
(17, 'Bahamas, Ilhas', 'BS'),
(18, 'Bahrein, Ilhas', 'BH'),
(19, 'Bangladesh', 'BD'),
(20, 'Barbados', 'BB'),
(21, 'Belarus, Republica da', 'BY'),
(22, 'Bélgica', 'BE'),
(23, 'Belize', 'BZ'),
(24, 'Benin', 'BJ'),
(25, 'Bermudas', 'BM'),
(26, 'Butão', 'BT'),
(27, 'Bolívia', 'BO'),
(28, 'Bósnia-herzegovina (Republica da)', 'BA'),
(29, 'Botsuana', 'BW'),
(30, 'Ilha Bouvet', 'BV'),
(31, 'Território Britânico do Oceano Indico', 'IO'),
(32, 'Brunei', 'BN'),
(33, 'Bulgária, Republica da', 'BG'),
(34, 'Burkina Faso', 'BF'),
(35, 'Burundi', 'BI'),
(36, 'Camboja', 'KH'),
(37, 'Camarões', 'CM'),
(38, 'Canada', 'CA'),
(39, 'Cabo Verde, Republica de', 'CV'),
(40, 'Cayman, Ilhas', 'KY'),
(41, 'Republica Centro-Africana', 'CF'),
(42, 'Chade', 'TD'),
(43, 'Chile', 'CL'),
(44, 'China, Republica Popular', 'CN'),
(45, 'Christmas, Ilha (Navidad)', 'CX'),
(46, 'Cocos (Keeling), Ilhas', 'CC'),
(47, 'Colômbia', 'CO'),
(48, 'Comores, Ilhas', 'KM'),
(49, 'Congo', 'CG'),
(50, 'Congo, Republica Democrática do', 'CD'),
(51, 'Cook, Ilhas', 'CK'),
(52, 'Costa Rica', 'CR'),
(53, 'Costa do Marfim', 'CI'),
(54, 'Croácia (Republica da)', 'HR'),
(55, 'Cuba', 'CU'),
(56, 'Chipre', 'CY'),
(57, 'Tcheca, Republica', 'CZ'),
(58, 'Dinamarca', 'DK'),
(59, 'Djibuti', 'DJ'),
(60, 'Dominica, Ilha', 'DM'),
(61, 'Republica Dominicana', 'DO'),
(62, 'Timor Leste', 'TL'),
(63, 'Equador', 'EC'),
(64, 'Egito', 'EG'),
(65, 'El Salvador', 'SV'),
(66, 'Guine-Equatorial', 'GQ'),
(67, 'Eritreia', 'ER'),
(68, 'Estônia, Republica da', 'EE'),
(69, 'Etiópia', 'ET'),
(70, 'Falkland (Ilhas Malvinas)', 'FK'),
(71, 'Feroe, Ilhas', 'FO'),
(72, 'Fiji', 'FJ'),
(73, 'Finlândia', 'FI'),
(74, 'Franca', 'FR'),
(75, 'Guiana francesa', 'GF'),
(76, 'Polinésia Francesa', 'PF'),
(77, 'Terras Austrais e Antárticas Francesas', 'TF'),
(78, 'Gabão', 'GA'),
(79, 'Gambia', 'GM'),
(80, 'Georgia, Republica da', 'GE'),
(81, 'Alemanha', 'DE'),
(82, 'Gana', 'GH'),
(83, 'Gibraltar', 'GI'),
(84, 'Grécia', 'GR'),
(85, 'Groenlândia', 'GL'),
(86, 'Granada', 'GD'),
(87, 'Guadalupe', 'GP'),
(88, 'Guam', 'GU'),
(89, 'Guatemala', 'GT'),
(90, 'Guine', 'GN'),
(91, 'Guine-Bissau', 'GW'),
(92, 'Guiana', 'GY'),
(93, 'Haiti', 'HT'),
(94, 'Ilha Heard e Ilhas McDonald', 'HM'),
(95, 'Vaticano, Estado da Cidade do', 'VA'),
(96, 'Honduras', 'HN'),
(97, 'Hong Kong', 'HK'),
(98, 'Hungria, Republica da', 'HU'),
(99, 'Islândia', 'IS'),
(100, 'Índia', 'IN'),
(101, 'Indonésia', 'ID'),
(102, 'Ira, Republica Islâmica do', 'IR'),
(103, 'Iraque', 'IQ'),
(104, 'Irlanda', 'IE'),
(105, 'Israel', 'IL'),
(106, 'Itália', 'IT'),
(107, 'Jamaica', 'JM'),
(108, 'Japão', 'JP'),
(109, 'Jordânia', 'JO'),
(110, 'Cazaquistão, Republica do', 'KZ'),
(111, 'Quênia', 'KE'),
(112, 'Kiribati', 'KI'),
(113, 'Coreia, Republica Popular Democrática da', 'KP'),
(114, 'Coreia, Republica da', 'KR'),
(115, 'Kuwait', 'KW'),
(116, 'Quirguiz, Republica', 'KG'),
(117, 'Laos, Republica Popular Democrática do', 'LA'),
(118, 'Letônia, Republica da', 'LV'),
(119, 'Líbano', 'LB'),
(120, 'Lesoto', 'LS'),
(121, 'Libéria', 'LR'),
(122, 'Líbia', 'LY'),
(123, 'Liechtenstein', 'LI'),
(124, 'Lituânia, Republica da', 'LT'),
(125, 'Luxemburgo', 'LU'),
(126, 'Macau', 'MO'),
(127, 'Macedônia, Antiga Republica Iugoslava', 'MK'),
(128, 'Madagascar', 'MG'),
(129, 'Malavi', 'MW'),
(130, 'Malásia', 'MY'),
(131, 'Maldivas', 'MV'),
(132, 'Mali', 'ML'),
(133, 'Malta', 'MT'),
(134, 'Marshall, Ilhas', 'MH'),
(135, 'Martinica', 'MQ'),
(136, 'Mauritânia', 'MR'),
(137, 'Mauricio', 'MU'),
(138, 'Mayotte (Ilhas Francesas)', 'YT'),
(139, 'México', 'MX'),
(140, 'Micronesia', 'FM'),
(141, 'Moldávia, Republica da', 'MD'),
(142, 'Mônaco', 'MC'),
(143, 'Mongólia', 'MN'),
(144, 'Montserrat, Ilhas', 'MS'),
(145, 'Marrocos', 'MA'),
(146, 'Moçambique', 'MZ'),
(147, 'Mianmar (Birmânia)', 'MM'),
(148, 'Namíbia', 'NA'),
(149, 'Nauru', 'NR'),
(150, 'Nepal', 'NP'),
(151, 'Países Baixos (Holanda)', 'NL'),
(152, 'Nova Caledonia', 'NC'),
(153, 'Nova Zelândia', 'NZ'),
(154, 'Nicarágua', 'NI'),
(155, 'Níger', 'NE'),
(156, 'Nigéria', 'NG'),
(157, 'Niue, Ilha', 'NU'),
(158, 'Norfolk, Ilha', 'NF'),
(159, 'Marianas do Norte', 'MP'),
(160, 'Noruega', 'NO'),
(161, 'Oma', 'OM'),
(162, 'Paquistão', 'PK'),
(163, 'Palau', 'PW'),
(164, 'Panamá', 'PA'),
(165, 'Papua Nova Guine', 'PG'),
(166, 'Paraguai', 'PY'),
(167, 'Peru', 'PE'),
(168, 'Filipinas', 'PH'),
(169, 'Pitcairn, Ilha', 'PN'),
(170, 'Polônia, Republica da', 'PL'),
(171, 'Portugal', 'PT'),
(172, 'Porto Rico', 'PR'),
(173, 'Catar', 'QA'),
(174, 'Reunião, Ilha', 'RE'),
(175, 'Romênia', 'RO'),
(176, 'Rússia, Federação da', 'RU'),
(177, 'Ruanda', 'RW'),
(178, 'São Cristovão e Neves, Ilhas', 'KN'),
(179, 'Santa Lucia', 'LC'),
(180, 'São Vicente e Granadinas', 'VC'),
(181, 'Samoa', 'WS'),
(182, 'San Marino', 'SM'),
(183, 'São Tome e Príncipe, Ilhas', 'ST'),
(184, 'Arábia Saudita', 'SA'),
(185, 'Senegal', 'SN'),
(186, 'Seychelles', 'SC'),
(187, 'Serra Leoa', 'SL'),
(188, 'Cingapura', 'SG'),
(189, 'Eslovaca, Republica', 'SK'),
(190, 'Eslovênia, Republica da', 'SI'),
(191, 'Salomão, Ilhas', 'SB'),
(192, 'Somalia', 'SO'),
(193, 'África do Sul', 'ZA'),
(194, 'Ilhas Geórgia do Sul e Sandwich do Sul', 'GS'),
(195, 'Espanha', 'ES'),
(196, 'Sri Lanka', 'LK'),
(197, 'Santa Helena', 'SH'),
(198, 'São Pedro e Miquelon', 'PM'),
(199, 'Sudão', 'SD'),
(200, 'Suriname', 'SR'),
(201, 'Svalbard e Jan Mayen', 'SJ'),
(202, 'Suazilândia', 'SZ'),
(203, 'Suécia', 'SE'),
(204, 'Suíça', 'CH'),
(205, 'Síria, Republica Árabe da', 'SY'),
(206, 'Formosa (Taiwan)', 'TW'),
(207, 'Tadjiquistao, Republica do', 'TJ'),
(208, 'Tanzânia, Republica Unida da', 'TZ'),
(209, 'Tailândia', 'TH'),
(210, 'Togo', 'TG'),
(211, 'Toquelau, Ilhas', 'TK'),
(212, 'Tonga', 'TO'),
(213, 'Trinidad e Tobago', 'TT'),
(214, 'Tunísia', 'TN'),
(215, 'Turquia', 'TR'),
(216, 'Turcomenistão, Republica do', 'TM'),
(217, 'Turcas e Caicos, Ilhas', 'TC'),
(218, 'Tuvalu', 'TV'),
(219, 'Uganda', 'UG'),
(220, 'Ucrânia', 'UA'),
(221, 'Emirados Árabes Unidos', 'AE'),
(222, 'Reino Unido', 'GB'),
(223, 'Estados Unidos', 'US'),
(224, 'Ilhas Menores Distantes dos Estados Unidos', 'UM'),
(225, 'Uruguai', 'UY'),
(226, 'Uzbequistão, Republica do', 'UZ'),
(227, 'Vanuatu', 'VU'),
(228, 'Venezuela', 'VE'),
(229, 'Vietnã', 'VN'),
(230, 'Virgens, Ilhas (Britânicas)', 'VG'),
(231, 'Virgens, Ilhas (E.U.A.)', 'VI'),
(232, 'Wallis e Futuna, Ilhas', 'WF'),
(233, 'Saara Ocidental', 'EH'),
(234, 'Iémen', 'YE'),
(235, 'Iugoslávia, República Fed. da', 'YU'),
(236, 'Zâmbia', 'ZM'),
(237, 'Zimbabue', 'ZW'),
(238, 'Guernsey, Ilha do Canal (Inclui Alderney e Sark)', 'GG'),
(239, 'Jersey, Ilha do Canal', 'JE'),
(240, 'Man, Ilha de', 'IM'),
(241, 'Montenegro', 'ME'),
(242, 'Republika Srbija', 'RS'),
(243, 'Sudao do Sul', 'SS'),
(244, 'Zona do Canal do Panamá', NULL),
(245, 'Palestina', 'PS'),
(246, 'Ilhas de Aland', 'AX'),
(247, 'Curaçao', 'CW'),
(248, 'Ilha de São Martinho (Países Baixos)', 'SM'),
(249, 'Bonaire', 'AN'),
(250, 'Antartica', 'AQ'),
(251, 'Ilha Herad e Ilhas Macdonald', 'AU'),
(252, 'Colectividade de São Bartolomeu', 'FR'),
(253, 'Ilha de São Martinho (França)', 'SM'),
(254, 'Território das Terras Austrais e Antárcticas Francesas', 'TF');

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo`
--

CREATE TABLE `periodo` (
  `id_periodo` int(11) NOT NULL,
  `nome_periodo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `periodo`
--

INSERT INTO `periodo` (`id_periodo`, `nome_periodo`) VALUES
(1, 'Manhã'),
(2, 'Tarde'),
(3, 'Noite');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `utilizador_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `funcionario_id`, `created`, `modified`, `utilizador_id`) VALUES
(2, 23, '2019-09-22 14:04:10', NULL, NULL),
(3, 20, '2019-09-22 14:04:29', NULL, NULL),
(4, 22, '2019-09-22 15:49:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prof_turma`
--

CREATE TABLE `prof_turma` (
  `id_prof_turma` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `turma_id` int(11) DEFAULT NULL,
  `anolectivo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prof_turma`
--

INSERT INTO `prof_turma` (`id_prof_turma`, `funcionario_id`, `turma_id`, `anolectivo_id`) VALUES
(1, 25, 9, 4),
(2, 14, 14, 12),
(3, 22, 14, 4),
(4, 22, 13, 1),
(5, 25, 14, 1),
(6, 25, 13, 5),
(7, 33, 10, 5),
(8, 27, 11, 1),
(9, 28, 12, 8),
(10, 20, 8, 1),
(11, 25, 14, 6),
(12, 33, 9, 14),
(13, 33, 12, 4),
(15, 20, 10, 14),
(16, 25, 11, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `provincia`
--

CREATE TABLE `provincia` (
  `provincia_id` int(11) NOT NULL,
  `nome_provincia` varchar(200) NOT NULL,
  `pais_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `provincia`
--

INSERT INTO `provincia` (`provincia_id`, `nome_provincia`, `pais_id`) VALUES
(1, 'Bengo', 7),
(2, 'Bengela', 7),
(3, 'Bié', 7),
(4, 'Cabinda', 7),
(5, 'Cuando Cubango', 7),
(6, 'Cunene', 7),
(7, 'Huambo', 7),
(8, 'Huíla', 7),
(9, 'Kwanza Norte', 7),
(10, 'Kwanza Sul', 7),
(11, 'Luanda', 7),
(12, 'Lunda Norte', 7),
(13, 'Lunda Sul', 7),
(14, 'Malanje', 7),
(15, 'Moxico', 7),
(16, 'Namibe', 7),
(17, 'Uige', 7),
(18, 'Zaire', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `id_sala` int(11) NOT NULL,
  `numero_sala` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `utilizador_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`id_sala`, `numero_sala`, `created`, `modified`, `utilizador_id`) VALUES
(1, 1, '2019-06-16 23:43:07', NULL, NULL),
(2, 2, '2019-06-16 23:45:01', NULL, NULL),
(3, 3, '2019-06-16 23:45:08', NULL, NULL),
(4, 4, '2019-06-16 23:45:12', '2019-06-16 23:53:45', NULL),
(5, 5, '2019-06-16 23:45:19', '2019-06-16 23:53:54', NULL),
(6, 6, '2019-06-16 23:45:23', '2019-06-16 23:54:08', NULL),
(7, 7, '2019-06-16 23:45:28', '2019-06-16 23:54:21', NULL),
(8, 8, '2019-06-16 23:45:33', '2019-06-16 23:54:33', NULL),
(9, 9, '2019-06-16 23:45:38', '2019-06-16 23:54:44', NULL),
(10, 10, '2019-06-16 23:45:41', '2019-06-16 23:54:57', NULL),
(11, 11, '2019-06-16 23:47:34', NULL, NULL),
(12, 12, '2019-06-16 23:47:39', NULL, NULL),
(13, 13, '2019-06-16 23:47:43', NULL, NULL),
(14, 14, '2019-06-16 23:47:46', NULL, NULL),
(15, 15, '2019-06-16 23:47:49', '2019-12-12 16:27:13', NULL),
(16, 16, '2019-06-16 23:47:53', NULL, NULL),
(17, 17, '2019-06-16 23:47:57', NULL, NULL),
(18, 18, '2019-06-16 23:48:03', NULL, NULL),
(19, 19, '2019-06-16 23:48:06', NULL, NULL),
(20, 20, '2019-06-16 23:48:12', NULL, NULL),
(21, 21, '2019-06-16 23:48:16', NULL, NULL),
(22, 22, '2019-06-16 23:48:18', NULL, NULL),
(23, 23, '2019-06-16 23:48:21', NULL, NULL),
(24, 24, '2019-06-16 23:48:25', NULL, NULL),
(25, 25, '2019-06-16 23:48:29', NULL, NULL),
(26, 26, '2019-06-16 23:48:33', NULL, NULL),
(27, 27, '2019-06-16 23:48:36', NULL, NULL),
(28, 28, '2019-06-16 23:48:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL,
  `nome_turma` varchar(200) NOT NULL,
  `sala_id` int(11) DEFAULT NULL,
  `classe_id` int(11) DEFAULT NULL,
  `periodo_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome_turma`, `sala_id`, `classe_id`, `periodo_id`, `created`, `modified`) VALUES
(8, 'IA-M', 1, 41, 1, '2019-12-08 13:26:31', '2019-12-08 13:27:31'),
(9, '1A-M', 6, 43, 1, '2019-12-08 13:52:06', NULL),
(10, '2A-M', 13, 44, 1, '2019-12-08 13:52:41', '2019-12-08 13:53:23'),
(11, '3B-T', 4, 45, 2, '2019-12-08 13:53:46', '2019-12-08 13:54:29'),
(12, '4D-T', 16, 46, 2, '2019-12-08 13:55:05', NULL),
(13, '5A-M', 26, 47, 1, '2019-12-08 13:56:03', NULL),
(14, '6B-T', 15, 48, 2, '2019-12-08 13:56:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`),
  ADD UNIQUE KEY `num_processo` (`num_processo`),
  ADD KEY `FK_aluno_pais` (`pais_id`),
  ADD KEY `FK_aluno_provincia` (`provincia_id`),
  ADD KEY `FK_aluno_municipio` (`municipio_id`),
  ADD KEY `FK_aluno_funcionario` (`funcionario_id`);

--
-- Indexes for table `anolectivo`
--
ALTER TABLE `anolectivo`
  ADD PRIMARY KEY (`id_ano`),
  ADD KEY `FK_anolectivo_utilizador` (`utilizador_id`);

--
-- Indexes for table `assiduidade_alunos`
--
ALTER TABLE `assiduidade_alunos`
  ADD PRIMARY KEY (`id_assiduidade`),
  ADD KEY `FK_assiduidade_aluno_aluno` (`aluno_id`),
  ADD KEY `FK_assiduidade_aluno_anolectivo` (`anolectivo_id`),
  ADD KEY `FK_assiduidade_aluno_turma` (`turma_id`);

--
-- Indexes for table `assiduidade_funcionario`
--
ALTER TABLE `assiduidade_funcionario`
  ADD PRIMARY KEY (`id_assiduidade`),
  ADD KEY `FK_assiduidade_funcionario_funcionario` (`funcionario_id`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `FK_disciplina_classe` (`classe_id`);

--
-- Indexes for table `disciplina_classe`
--
ALTER TABLE `disciplina_classe`
  ADD PRIMARY KEY (`id_disciplina_classe`),
  ADD KEY `FK_disciplina_classe_disciplina` (`disciplina_id`),
  ADD KEY `FK_disciplina_classe_classe` (`classe_id`);

--
-- Indexes for table `encarregados`
--
ALTER TABLE `encarregados`
  ADD PRIMARY KEY (`id_encarregado`),
  ADD KEY `FK_encarregados_aluno` (`aluno_id`),
  ADD KEY `FK_encarregados_anolectivo` (`anolectivo_id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `FK_funcionario_provincia` (`provincia`);

--
-- Indexes for table `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `FK_matricula_anolectivo` (`anolectivo_id`),
  ADD KEY `FK_matricula_aluno` (`aluno_id`),
  ADD KEY `FK_matricula_turma` (`turma_id`),
  ADD KEY `FK_matricula_funcionario` (`funcionario_id`),
  ADD KEY `FK_matricula_curso` (`curso_id`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`municipio_id`),
  ADD KEY `FK_municipio_provincia` (`provincia_id`);

--
-- Indexes for table `notas_disciplina`
--
ALTER TABLE `notas_disciplina`
  ADD PRIMARY KEY (`id_notas_disciplina`),
  ADD KEY `FK_notas_disciplina_matricula` (`matricula_id`),
  ADD KEY `FK_notas_disciplina_aluno` (`aluno_id`),
  ADD KEY `FK_notas_disciplina_anolectivo` (`anolectivo_id`),
  ADD KEY `FK_notas_disciplina_turma` (`turma_id`),
  ADD KEY `FK_notas_disciplina_disciplina` (`disciplina_id`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`pais_id`);

--
-- Indexes for table `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`),
  ADD KEY `FK_professor_utilizador` (`utilizador_id`),
  ADD KEY `FK_professor_funcionario` (`funcionario_id`);

--
-- Indexes for table `prof_turma`
--
ALTER TABLE `prof_turma`
  ADD PRIMARY KEY (`id_prof_turma`),
  ADD KEY `FK_prof_turma_funcionario` (`funcionario_id`),
  ADD KEY `FK_prof_turma_turma` (`turma_id`),
  ADD KEY `FK_prof_turma_anolectivo` (`anolectivo_id`);

--
-- Indexes for table `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`provincia_id`),
  ADD KEY `FK_provincia_pais` (`pais_id`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`),
  ADD KEY `FK_sala_utilizador` (`utilizador_id`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `FK_turma_classe` (`classe_id`),
  ADD KEY `FK_turma_sala` (`sala_id`),
  ADD KEY `FK_turma_periodo` (`periodo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `anolectivo`
--
ALTER TABLE `anolectivo`
  MODIFY `id_ano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `assiduidade_alunos`
--
ALTER TABLE `assiduidade_alunos`
  MODIFY `id_assiduidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `assiduidade_funcionario`
--
ALTER TABLE `assiduidade_funcionario`
  MODIFY `id_assiduidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `disciplina_classe`
--
ALTER TABLE `disciplina_classe`
  MODIFY `id_disciplina_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `encarregados`
--
ALTER TABLE `encarregados`
  MODIFY `id_encarregado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
  MODIFY `municipio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `notas_disciplina`
--
ALTER TABLE `notas_disciplina`
  MODIFY `id_notas_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475;

--
-- AUTO_INCREMENT for table `pais`
--
ALTER TABLE `pais`
  MODIFY `pais_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prof_turma`
--
ALTER TABLE `prof_turma`
  MODIFY `id_prof_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `provincia`
--
ALTER TABLE `provincia`
  MODIFY `provincia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `FK_aluno_funcionario` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_aluno_municipio` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`municipio_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_aluno_pais` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`pais_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_aluno_provincia` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`provincia_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `anolectivo`
--
ALTER TABLE `anolectivo`
  ADD CONSTRAINT `FK_anolectivo_utilizador` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizador` (`id_utilizador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `assiduidade_alunos`
--
ALTER TABLE `assiduidade_alunos`
  ADD CONSTRAINT `FK_assiduidade_aluno_aluno` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_assiduidade_aluno_anolectivo` FOREIGN KEY (`anolectivo_id`) REFERENCES `anolectivo` (`id_ano`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_assiduidade_aluno_turma` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id_turma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `assiduidade_funcionario`
--
ALTER TABLE `assiduidade_funcionario`
  ADD CONSTRAINT `FK_assiduidade_funcionario_funcionario` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `FK_disciplina_classe` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `disciplina_classe`
--
ALTER TABLE `disciplina_classe`
  ADD CONSTRAINT `FK_disciplina_classe_classe` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_disciplina_classe_disciplina` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `encarregados`
--
ALTER TABLE `encarregados`
  ADD CONSTRAINT `FK_encarregados_aluno` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_encarregados_anolectivo` FOREIGN KEY (`anolectivo_id`) REFERENCES `anolectivo` (`id_ano`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `FK_funcionario_provincia` FOREIGN KEY (`provincia`) REFERENCES `provincia` (`provincia_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `FK_matricula_aluno` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_matricula_anolectivo` FOREIGN KEY (`anolectivo_id`) REFERENCES `anolectivo` (`id_ano`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_matricula_curso` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_matricula_funcionario` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_matricula_turma` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id_turma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `FK_municipio_provincia` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`provincia_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `notas_disciplina`
--
ALTER TABLE `notas_disciplina`
  ADD CONSTRAINT `FK_notas_disciplina_aluno` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_notas_disciplina_anolectivo` FOREIGN KEY (`anolectivo_id`) REFERENCES `anolectivo` (`id_ano`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_notas_disciplina_disciplina` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_notas_disciplina_matricula` FOREIGN KEY (`matricula_id`) REFERENCES `matricula` (`id_matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_notas_disciplina_turma` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id_turma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `FK_professor_funcionario` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_professor_utilizador` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizador` (`id_utilizador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `prof_turma`
--
ALTER TABLE `prof_turma`
  ADD CONSTRAINT `FK_prof_turma_anolectivo` FOREIGN KEY (`anolectivo_id`) REFERENCES `anolectivo` (`id_ano`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_prof_turma_funcionario` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_prof_turma_turma` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id_turma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `FK_provincia_pais` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`pais_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `FK_sala_utilizador` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizador` (`id_utilizador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `FK_turma_classe` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_turma_periodo` FOREIGN KEY (`periodo_id`) REFERENCES `periodo` (`id_periodo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_turma_sala` FOREIGN KEY (`sala_id`) REFERENCES `sala` (`id_sala`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
