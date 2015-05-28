-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2015 at 06:17 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nurssalbaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `Prezime` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `Username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`ID`, `Ime`, `Prezime`, `Username`, `Password`) VALUES
(1, 'Paja', 'Patak', 'Patak', 'PajaPatak');

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `Prezime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`ID`, `Ime`, `Prezime`) VALUES
(1, 'Paja', 'Patak'),
(2, 'Miki', 'Maus');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `VijestID` int(11) NOT NULL,
  `Autor` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `eMail` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `TekstKomentara` text COLLATE utf8_slovenian_ci NOT NULL,
  `Datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `KomentarFK` (`VijestID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`ID`, `VijestID`, `Autor`, `eMail`, `TekstKomentara`, `Datum`) VALUES
(1, 1, '', '', 'Extra!', '2015-05-27 10:45:27'),
(2, 1, '', '', 'Odlicna vijest !', '2015-05-27 10:46:20'),
(3, 1, '', '', 'Nevjerovatno !', '2015-05-27 10:46:33'),
(4, 1, '', '', 'fesfsd', '2015-05-28 09:08:55'),
(5, 1, '', '', 'hdjksadhsakkhdsajd', '2015-05-28 09:10:03'),
(6, 1, '', '', 'hdjksadhsakkhdsajd', '2015-05-28 09:15:19'),
(7, 1, '', '', 'hdjksadhsakkhdsajd', '2015-05-28 09:15:23'),
(8, 1, '', '', 'hdjksadhsakkhdsajd', '2015-05-28 09:15:38'),
(9, 1, 'Glupko', 'adautbegov1@etf.unsa.ba', 'Proba', '2015-05-28 10:07:46'),
(10, 1, 'dasda', 'dasd', 'adasdas', '2015-05-28 10:08:30'),
(11, 1, 'dasda', 'dasd', 'adasdas', '2015-05-28 10:11:08'),
(12, 1, 'dasda', 'dasd', 'adasdas', '2015-05-28 10:12:17'),
(13, 1, 'dasda', 'dasd', 'adasdas', '2015-05-28 10:13:02'),
(14, 1, 'dasda', 'dasd', 'adasdas', '2015-05-28 10:18:48'),
(15, 1, 'dasda', 'dasd', 'adasdas', '2015-05-28 10:28:43'),
(16, 1, 'Glupko', 'adautbegov1@etf.unsa.ba', 'Proba', '2015-05-28 10:28:45'),
(17, 1, 'Glupko', 'adautbegov1@etf.unsa.ba', 'Proba', '2015-05-28 10:29:26'),
(18, 1, 'Glupko', 'adautbegov1@etf.unsa.ba', 'Proba', '2015-05-28 10:31:45'),
(19, 1, 'Glupko', 'adautbegov1@etf.unsa.ba', 'Proba', '2015-05-28 10:53:27'),
(20, 1, 'Glupko', 'adautbegov1@etf.unsa.ba', 'Proba', '2015-05-28 10:54:09'),
(21, 1, 'Glupko', 'adautbegov1@etf.unsa.ba', 'Proba', '2015-05-28 11:00:42'),
(22, 1, 'Glupko', 'adautbegov1@etf.unsa.ba', 'Proba', '2015-05-28 11:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `vijest`
--

CREATE TABLE IF NOT EXISTS `vijest` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AutorID` int(11) NOT NULL,
  `DatumObjave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `Tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `Uvod` varchar(500) COLLATE utf8_slovenian_ci NOT NULL,
  `UrlSlike` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `AutorFK` (`AutorID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`ID`, `AutorID`, `DatumObjave`, `Naslov`, `Tekst`, `Uvod`, `UrlSlike`) VALUES
(1, 1, '2015-05-27 09:21:33', 'KRAĆE VRIJEME ZAVARIVANJA PVC PROFILA - PVC STOLARIJA\r\n', 'U Wizburgu je pokrenut istraživački projekat sa ciljem unapređenja ekonomske efikasnosti zavarivanja PVC profila. \r\nMotiv za pokretanje ovog projekta je da se nadu prilagođene vrijednosti za zagrijavanje varilice u procesu zagrijavanja najnovijih PVC profila.\r\nPovećanjem temperature alata, trajanje procesa zavarivanja može se skratiti za 40%, bez utjecaja na kvalitetu proizvoda. \r\nJača čvrstoća vara može se vidjeti i prilikom direktnog uspoređivanja. \r\nRezultati provedeni istraživanjem u industriji PVC prozora otvorili su zanimljive mogućnosti za poboljšanje kvalitete i ekonomsku uštedu.', 'U Wizburgu je pokrenut istraživački projekat sa ciljem unapređenja ekonomske efikasnosti zavarivanja PVC profila. \r\nMotiv za pokretanje ovog projekta je da se nadu prilagođene vrijednosti za zagrijavanje varilice u procesu zagrijavanja najnovijih PVC profila.\r\n', 'Stranica/slika1.jpg\r\n'),
(2, 2, '2015-05-27 09:22:42', '\r\nPVC STOLARIJA - KOJE PROFILE I OKOVE ODABRATI?\r\n', 'Imate stare prozore na kući i došlo je vrijeme da ih zamjenite? \nPrva asocijacija vam je vjerovatno PVC stolarija. Pri tome želite kvalitetan proizvod po razumnoj cijeni. \nDanas na tržištu postoji veliki broj različitih proizvodaca koji nude veliki broj proizvoda različitih po cijeni i kvaliteti. \nKoga odabrati ?', 'Imate stare prozore na kući i došlo je vrijeme da ih zamjenite? \nPrva asocijacija vam je vjerovatno PVC stolarija.\n', 'Stranica/slika5.jpg\r\n'),
(3, 1, '2015-05-27 09:23:37', 'ZAŠTO ODABRATI ALUMINIJSKU STOLARIJU?\r\n', 'Aluminijski profili svojom čvrstoćom osiguravaju statiku i stabilnost ugrađenih elemenata.\nAluminijski profili izuzetno su lagani i osiguran im je dug vijek ugrađenih elemenata.\nKod alu stolarije veoma je važno sto se također postiže i ušteda toplinske energije, a njihova glatka površina znatno olakšava održavanje.', 'Aluminijski profili svojom čvrstoćom osiguravaju statiku i stabilnost ugrađenih elemenata.\nAluminijski profili izuzetno su lagani i osiguran im je dug vijek ugrađenih elemenata.\n', 'Stranica/slika6.jpg\r\n'),
(4, 1, '2015-05-27 09:26:22', 'PVC stolarija - Koje profile i okove odabrati?', 'Proizvođači PVC profila postoje mnogi, kao npr.:  Schuco, Aluplast, Rehau, Inoutic, Trocal, Veka, Gealan, Alphacan i drugi. Iznad svih profila po kvaliteti prednja?i  Schuco (?itaj šiko), kao kod automobila Mercedes. \n\nUz PVC profile dolaze i okovi za PVC stolariju. Okov je jako bitan u cijelom spoju prozora jer to je mehanizam koji otvara prozor i koji mora izdržati što ve?i broj otvaranja.\nPostoje razne marke okova za PVC stolariju: GU, Schuco,  Siegenia, Maco, Roto, Winkhouse i drugi.\n\nOd svih proizvo?a?a PVC profila, jedino Schuco ima vlastiti okov koji je pojam me?u okovima. Schuco Okov je nešto skuplji od drugih okova, ali to je zanemarivo kada se PVC stolarija kupuje za sljede?ih 40-50 i više godina.\n\n\nAko kupujete PVC stolariju i ne želite razmišljati jeste li dobro odabrali i bojati se da prozori ve? nakon nekoliko mjeseci ne?e funkcionirati, bez razmišljanja odaberite SCHUCO PVC stolariju sa SCHUCO okovom. Nemojte pristati na neki zamjenski okov drugog proizvo?a?a jer se na kraju ne isplati. Osim profila i okova SCHUCO ima u ponudi i vlastitu SCHUCO kvaku.\n\n\nU današnje vrijeme krize proizvo?a?i PVC stoalrije, koriste sve jeftinije okove i ruše kvalitetu samo kako bi bili najpovoljniji, ali unato? krizi ljudi koji mjenjaju stolariju ne žele loš proizvod, jer tu stolariju otpla?uju nekoliko godina i žele kvalitetu.\n\n \n\nPVC profili po kvaliteti:\n\n1. Schuco\n\n2. Inotherm\n3. Internorm\n4. Aluplast\n5. Salamander\n6. Brugman\n7. Kommerling\n8. Rehau\n9. Inoutic\n10. Gealan\n11. KBE\n\n\nOsima profila i okova važno je odabrati dobro staklo sa Lowe premazom za uštedu toplinske energije. Kao standard danas se ugra?uje IZO 4+16+4mm Lowe, staklo sa 1,1 koeficijent  topolinske izolacije. Ako želite još bolje vrijednosti možete odabrati 3-slojno staklo : 4+14+4+16+4mm 2 Lowe. Ovo staklo se koristi ?ak i u pasivnim i niskoenergetskim ku?ama.\n\n \nSchuco PVC prozore možete kupiti kod ovlaštenog proizvo?\n', 'Proizvođači PVC profila postoje mnogi, kao npr.:  Schuco, Aluplast, Rehau, Inoutic, Trocal, Veka, Gealan, Alphacan i drugi. Iznad svih profila po kvaliteti prednja?i  Schuco (?itaj šiko), kao kod automobila Mercedes. \n', 'Stranica/slika6.jpg\r\n');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`VijestID`) REFERENCES `vijest` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vijest`
--
ALTER TABLE `vijest`
  ADD CONSTRAINT `vijest_ibfk_1` FOREIGN KEY (`AutorID`) REFERENCES `autor` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
