-- phpMyAdmin SQL Dump
-- version 3.3.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: Jul 19, 2010 as 07:50 PM
-- Versão do Servidor: 5.1.45
-- Versão do PHP: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `e-recibo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE IF NOT EXISTS `atendimento` (
  `AtendimentoId` int(11) NOT NULL AUTO_INCREMENT,
  `ClienteId` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Endereco` varchar(500) DEFAULT NULL,
  `Revisita` bit(1) DEFAULT b'0',
  `Contrato` int(1) DEFAULT NULL,
  `Valor` decimal(10,0) DEFAULT NULL,
  `Papel` int(11) DEFAULT NULL,
  `Descricao` varchar(500) NOT NULL,
  `Observacao` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`AtendimentoId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `ClienteId` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Telefone` varchar(40) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Cpf` varchar(20) DEFAULT NULL,
  `Endereco` varchar(500) NOT NULL,
  `Data` date NOT NULL,
  PRIMARY KEY (`ClienteId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE IF NOT EXISTS `contrato` (
  `ContratoId` int(11) NOT NULL AUTO_INCREMENT,
  `ClienteId` int(11) NOT NULL,
  `Url` varchar(100) DEFAULT NULL,
  `QtdMensal` int(11) DEFAULT NULL,
  `QtdExtra` int(11) DEFAULT NULL,
  `Valor` decimal(10,0) NOT NULL,
  `DataInicio` datetime DEFAULT NULL,
  `DataFim` datetime DEFAULT NULL,
  `Observacao` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ContratoId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;
