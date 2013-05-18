-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- --------------------------------------------------------

--
-- Table structure for table `errortable`
--

CREATE TABLE `errortable` (
  `errorid` int(11) NOT NULL auto_increment,
  `errortext` text NOT NULL,
  `errorgame` int(11) NOT NULL,
  `errorcreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`errorid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `eventtable`
--

CREATE TABLE `eventtable` (
  `eventid` int(11) NOT NULL auto_increment,
  `eventname` varchar(50) NOT NULL,
  `eventgame` int(11) NOT NULL,
  `eventcreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `eventcount` int(11) NOT NULL,
  PRIMARY KEY  (`eventid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=315652 ;

-- --------------------------------------------------------

--
-- Table structure for table `gametable`
--

CREATE TABLE `gametable` (
  `gameid` int(11) NOT NULL auto_increment,
  `gamename` varchar(50) NOT NULL,
  `gameuser` int(11) NOT NULL,
  `gamekey` varchar(30) NOT NULL,
  `gamestatson` tinyint(1) NOT NULL default '1' COMMENT 'Says if the games statistics are turned on',
  `gameerrorson` tinyint(1) NOT NULL default '1' COMMENT 'Game error turned on status',
  `gamehighscoreson` tinyint(1) NOT NULL default '0' COMMENT 'game highscores turned on status',
  `gamecreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`gameid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=907 ;

-- --------------------------------------------------------

--
-- Table structure for table `highscoretable`
--

CREATE TABLE `highscoretable` (
  `highscoreid` bigint(20) NOT NULL auto_increment,
  `highscoreplayer` varchar(50) NOT NULL,
  `highscorescore` double NOT NULL,
  `highscoregame` int(11) NOT NULL,
  `highscoretags` varchar(200) NOT NULL,
  `highscoreip` varchar(30) NOT NULL COMMENT 'the ip address that submitted the highsocre',
  `highscorecreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`highscoreid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48553 ;

-- --------------------------------------------------------

--
-- Table structure for table `tokentable`
--

CREATE TABLE `tokentable` (
  `tokenid` int(11) NOT NULL auto_increment,
  `tokengame` int(11) NOT NULL,
  `tokencode` varchar(30) NOT NULL,
  `tokentime` bigint(20) NOT NULL,
  `tokenip` varchar(30) NOT NULL,
  PRIMARY KEY  (`tokenid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='holds tokens' AUTO_INCREMENT=375573 ;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `userid` int(11) NOT NULL auto_increment,
  `useremail` varchar(200) NOT NULL,
  `userpass` varchar(200) NOT NULL,
  `usercreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=757 ;
