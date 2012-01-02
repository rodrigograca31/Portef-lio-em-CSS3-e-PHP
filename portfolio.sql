
--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `ID` int(11) NOT NULL auto_increment,
  `Link` varchar(80) NOT NULL,
  `Tipo` varchar(10) NOT NULL,
  `Miniatura` varchar(200) NOT NULL,
  `Imagem` varchar(200) NOT NULL,
  `Servico` text NOT NULL,
  `Cliente` varchar(50) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

