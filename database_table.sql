 Table structure for table `results`
-- 

CREATE TABLE `results` (
  `name` varchar(255) collate latin1_general_ci NOT NULL,
  `one` int(2) NOT NULL,
  `two` varchar(2) collate latin1_general_ci NOT NULL,
  `three` int(2) NOT NULL,
  `four` int(2) NOT NULL,
  `five` int(2) NOT NULL,
  `six` int(2) NOT NULL,
  `seven` int(2) NOT NULL,
  `eight` int(2) NOT NULL,
  `nine` int(2) NOT NULL,
  `ten` int(2) NOT NULL,
  `ip` text collate latin1_general_ci NOT NULL,
  `epoch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
