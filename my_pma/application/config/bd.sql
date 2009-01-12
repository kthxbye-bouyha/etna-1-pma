-- phpMyAdmin SQL Dump
-- version 2.11.5
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 05 Janvier 2009 à 22:40
-- Version du serveur: 5.0.51
-- Version de PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `mytodo`
--
CREATE DATABASE `mytodo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mytodo`;

-- --------------------------------------------------------

--
-- Structure de la table `todo`
--

CREATE TABLE `todo` (
  `id` int(10) NOT NULL auto_increment,
  `titre` varchar(255) collate utf8_bin NOT NULL,
  `rappel` text collate utf8_bin,
  `avancement` tinyint(3) NOT NULL,
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Contenu de la table `todo`
--

INSERT INTO `todo` (`id`, `titre`, `rappel`, `avancement`, `created`, `modified`) VALUES
(10, 'JVEUX MON PILON!', 0x6d6f6e2070696c6c6c6c6f6f6e6e6e6e6e6e6e6e6e, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `todo_priority`
--

CREATE TABLE `todo_priority` (
  `id` int(10) NOT NULL auto_increment,
  `todo_id` int(10) NOT NULL,
  `priority` enum('1','2','3') character set utf8 NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `todo_id_FK` (`todo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Contenu de la table `todo_priority`
--


-- --------------------------------------------------------

--
-- Structure de la table `todo_reference`
--

CREATE TABLE `todo_reference` (
  `id` int(10) NOT NULL auto_increment,
  `todo_id` int(10) NOT NULL,
  `reference` varchar(255) character set utf8 NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `todo_id_FK` (`todo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Contenu de la table `todo_reference`
--


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `todo_priority`
--
ALTER TABLE `todo_priority`
  ADD CONSTRAINT `todo_priority_ibfk_1` FOREIGN KEY (`todo_id`) REFERENCES `todo` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `todo_reference`
--
ALTER TABLE `todo_reference`
  ADD CONSTRAINT `todo_reference_ibfk_1` FOREIGN KEY (`todo_id`) REFERENCES `todo` (`id`) ON DELETE CASCADE;
