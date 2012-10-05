-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


-- --------------------------------------------------------

--
-- Extend table 'tl_module'
--
CREATE TABLE `tl_module` (
  `artundform_jahr` varchar(128) NULL default '2012',
  `artundform_ausstellungsnr` varchar(128) NULL default '1',
  `artundform_darstellung` varchar(128) NULL default '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Table `tl_artundform_galerie_verwaltung`
-- 

CREATE TABLE `tl_artundform_galerie_verwaltung` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `bildnr` varchar(128) NULL default NULL,
  `kuenstler` varchar(128) NULL default NULL,
  `titel` varchar(128) NULL default NULL,
  `jahr` varchar(128) NULL default NULL,
  `ausstellungsnr` varchar(128) NULL default NULL,
  `technik` varchar(128) NULL default NULL,
  `groesse` varchar(128) NULL default NULL,
  `preis` varchar(128) NULL default NULL,
  `bild` varchar(128) NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
