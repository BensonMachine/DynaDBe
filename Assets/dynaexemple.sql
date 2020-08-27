-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 04:22 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dynaexemple`
--
CREATE DATABASE IF NOT EXISTS `dynaexemple` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dynaexemple`;

-- --------------------------------------------------------

--
-- Table structure for table `adm_lang`
--

DROP TABLE IF EXISTS `adm_lang`;
CREATE TABLE `adm_lang` (
  `ID` int(11) NOT NULL,
  `Lang_Code` varchar(45) NOT NULL,
  `Lang_Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_lang`
--

INSERT INTO `adm_lang` (`ID`, `Lang_Code`, `Lang_Name`) VALUES
(1, 'Fr', 'French'),
(2, 'En', 'English'),
(3, 'Spa', 'Spanish'),
(4, 'Jap', 'Japanesse');

-- --------------------------------------------------------

--
-- Table structure for table `adm_program`
--

DROP TABLE IF EXISTS `adm_program`;
CREATE TABLE `adm_program` (
  `ID` int(11) NOT NULL,
  `Program_Code` varchar(45) NOT NULL,
  `Program_Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_program`
--

INSERT INTO `adm_program` (`ID`, `Program_Code`, `Program_Name`) VALUES
(1, 'PHP', 'PHP'),
(2, 'CS', 'C#'),
(3, 'JS', 'JavaScript'),
(4, 'PY', 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `adm_training_location`
--

DROP TABLE IF EXISTS `adm_training_location`;
CREATE TABLE `adm_training_location` (
  `ID` int(11) NOT NULL,
  `Location` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_training_location`
--

INSERT INTO `adm_training_location` (`ID`, `Location`) VALUES
(1, 'Gatineau'),
(2, 'Ottawa'),
(3, 'Montreal'),
(4, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `adm_years`
--

DROP TABLE IF EXISTS `adm_years`;
CREATE TABLE `adm_years` (
  `ID` int(11) NOT NULL,
  `Year_Code` int(4) NOT NULL,
  `Year_Name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_years`
--

INSERT INTO `adm_years` (`ID`, `Year_Code`, `Year_Name`) VALUES
(1, 2017, '2017 - 2018'),
(2, 2018, '2018 - 2019'),
(3, 2019, '2019 - 2020'),
(4, 2020, '2020 - 2021');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE `tests` (
  `ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Student_Level` int(11) NOT NULL,
  `Test_Level` int(11) NOT NULL,
  `Success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Level` int(11) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Fiscal_Year` int(11) DEFAULT NULL,
  `Official_Lang` varchar(255) DEFAULT NULL,
  `Training_Location` varchar(255) DEFAULT NULL,
  `Currently_Registered` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `First_Name`, `Last_Name`, `Level`, `Email`, `Fiscal_Year`, `Official_Lang`, `Training_Location`, `Currently_Registered`) VALUES
(1, 'Kiayada', 'Humphrey', 1, 'auctor.vitae@Proinsedturpis.org', 2017, 'Spanish', 'Montreal', 'True'),
(2, 'Melanie', 'Fields', 1, 'iaculis@posuereat.co.uk', 2018, 'English', 'Ottawa', 'False'),
(3, 'Lyle', 'Hull', 2, 'at@enimEtiamimperdiet.ca', 2018, 'French', 'Online', 'True'),
(4, 'Mariko', 'William', 3, 'pretium@gravida.co.uk', 2018, 'English', 'Gatineau', 'False'),
(5, 'Zahir', 'Larson', 2, 'neque.venenatis.lacus@et.org', 2019, 'French', 'Gatineau', 'False'),
(6, 'Yen', 'Norton', 3, 'sapien.gravida@Aliquamvulputate.org', 2017, 'French', 'Gatineau', 'True'),
(7, 'Savannah', 'Jones', 1, 'magna@sem.ca', 2020, 'English', 'Online', 'False'),
(8, 'Talon', 'Massey', 3, 'mauris.Suspendisse@perinceptoshymenaeos.com', 2018, 'French', 'Ottawa', 'False'),
(9, 'Lois', 'Short', 1, 'felis.adipiscing.fringilla@auctorvelit.ca', 2018, 'Spanish', 'Online', 'True'),
(10, 'Serina', 'Sears', 3, 'sodales.elit.erat@Duisa.ca', 2017, 'French', 'Online', 'True'),
(11, 'Ulric', 'Hooper', 2, 'urna.justo@Namnulla.com', 2018, 'French', 'Ottawa', 'True'),
(12, 'Neville', 'Saunders', 4, 'luctus@nonummy.com', 2017, 'French', 'Ottawa', 'True'),
(13, 'Wylie', 'Lowe', 3, 'libero@orciDonecnibh.edu', 2019, 'French', 'Montreal', 'True'),
(14, 'Leila', 'Petty', 1, 'Quisque.varius@Donectincidunt.edu', 2018, 'English', 'Gatineau', 'True'),
(15, 'Justine', 'Anthony', 1, 'tincidunt@feugiatSed.co.uk', 2020, 'Spanish', 'Online', 'False'),
(16, 'Blythe', 'Oconnor', 2, 'fringilla.cursus.purus@nonenim.com', 2019, 'English', 'Montreal', 'True'),
(17, 'Marah', 'Keller', 4, 'sem@commodo.ca', 2020, 'English', 'Online', 'True'),
(18, 'Lana', 'Petersen', 4, 'ipsum@Maurisblandit.edu', 2019, 'Spanish', 'Ottawa', 'False'),
(19, 'Alvin', 'Baker', 2, 'Nulla.eu.neque@elitpretiumet.net', 2018, 'Spanish', 'Ottawa', 'False'),
(20, 'Kadeem', 'Wright', 3, 'leo@lobortistellus.edu', 2018, 'English', 'Gatineau', 'True'),
(21, 'Ima', 'Higgins', 2, 'rutrum.urna@VivamusnisiMauris.co.uk', 2020, 'Spanish', 'Online', 'False'),
(22, 'Veda', 'Stevenson', 1, 'erat.volutpat.Nulla@Nuncmaurissapien.co.uk', 2018, 'French', 'Montreal', 'False'),
(23, 'Madeson', 'Merrill', 5, 'mus@ametconsectetueradipiscing.com', 2018, 'English', 'Online', 'False'),
(24, 'Kylan', 'Willis', 1, 'augue@lacusMauris.edu', 2020, 'English', 'Ottawa', 'True'),
(25, 'Gannon', 'Nunez', 1, 'nulla.Integer@idrisusquis.ca', 2019, 'Spanish', 'Montreal', 'True'),
(26, 'Daria', 'Hogan', 5, 'Quisque@mifelis.edu', 2018, 'French', 'Online', 'False'),
(27, 'Rana', 'Hunt', 5, 'Sed.eu.eros@dolornonummyac.ca', 2019, 'English', 'Montreal', 'True'),
(28, 'Lael', 'Walker', 1, 'volutpat.ornare.facilisis@posuerevulputate.org', 2018, 'French', 'Ottawa', 'True'),
(29, 'Clio', 'Foley', 2, 'massa.Quisque@estmollis.edu', 2017, 'Spanish', 'Montreal', 'False'),
(30, 'Erasmus', 'Pitts', 1, 'erat.Vivamus@orci.org', 2020, 'English', 'Montreal', 'False'),
(31, 'Gemma', 'Ford', 2, 'mattis.semper.dui@feugiat.ca', 2018, 'Spanish', 'Online', 'True'),
(32, 'Joel', 'Goodman', 2, 'risus.varius.orci@Integertinciduntaliquam.co.uk', 2018, 'French', 'Gatineau', 'False'),
(33, 'Clayton', 'Hardy', 5, 'libero.Proin@ipsumportaelit.edu', 2020, 'English', 'Gatineau', 'True'),
(34, 'Ayanna', 'Blankenship', 1, 'dui.Cras@natoquepenatibuset.co.uk', 2020, 'Spanish', 'Gatineau', 'False'),
(35, 'Cameron', 'Kim', 4, 'ac.feugiat.non@magna.edu', 2019, 'Spanish', 'Gatineau', 'False'),
(36, 'Felix', 'Coffey', 1, 'lectus.pede@ideratEtiam.net', 2019, 'Spanish', 'Gatineau', 'True'),
(37, 'Irene', 'Love', 1, 'orci@et.co.uk', 2017, 'French', 'Online', 'True'),
(38, 'Brett', 'Lambert', 1, 'ipsum.Suspendisse.non@pharetra.ca', 2017, 'Spanish', 'Ottawa', 'False'),
(39, 'Autumn', 'Graves', 3, 'sodales.purus@nisiCum.net', 2018, 'French', 'Gatineau', 'True'),
(40, 'Anne', 'Crane', 2, 'ut.molestie.in@vulputate.net', 2020, 'French', 'Gatineau', 'False'),
(41, 'April', 'Crosby', 4, 'porttitor.tellus.non@vitae.com', 2017, 'French', 'Online', 'False'),
(42, 'Kasper', 'Hood', 3, 'Sed@volutpatNulladignissim.com', 2018, 'French', 'Gatineau', 'False'),
(43, 'Medge', 'Palmer', 4, 'lorem.eu@mitempor.co.uk', 2020, 'French', 'Montreal', 'True'),
(44, 'Branden', 'Bonner', 4, 'et.pede.Nunc@acfacilisis.ca', 2019, 'Spanish', 'Montreal', 'True'),
(45, 'Tanner', 'Berger', 3, 'mauris@metus.com', 2017, 'French', 'Montreal', 'True'),
(46, 'Roary', 'Ray', 1, 'Sed.id.risus@urnaUttincidunt.net', 2017, 'French', 'Gatineau', 'False'),
(47, 'Marsden', 'Cotton', 2, 'odio@ipsum.com', 2017, 'Spanish', 'Ottawa', 'True'),
(48, 'Deirdre', 'Mckay', 5, 'Quisque@ligula.com', 2019, 'Spanish', 'Gatineau', 'False'),
(49, 'Wendy', 'Mccarty', 3, 'ante.Nunc@acurnaUt.co.uk', 2019, 'Spanish', 'Online', 'True'),
(50, 'Aurora', 'Lamb', 1, 'accumsan.neque.et@erat.edu', 2019, 'Spanish', 'Gatineau', 'True'),
(51, 'Raphael', 'Mendez', 2, 'vel.lectus.Cum@egetipsum.co.uk', 2020, 'French', 'Gatineau', 'True'),
(52, 'Chava', 'Russell', 1, 'dui.Fusce.aliquam@Mauris.org', 2017, 'Spanish', 'Online', 'False'),
(53, 'Jamal', 'West', 1, 'nec@turpis.org', 2020, 'English', 'Montreal', 'False'),
(54, 'Yuli', 'Ware', 5, 'augue.malesuada.malesuada@semPellentesque.edu', 2017, 'English', 'Gatineau', 'False'),
(55, 'Alexander', 'Hayes', 5, 'elit.a.feugiat@ante.com', 2017, 'Spanish', 'Online', 'True'),
(56, 'Brynne', 'Alvarez', 4, 'tristique.senectus@adipiscing.co.uk', 2019, 'Spanish', 'Montreal', 'True'),
(57, 'Nolan', 'Erickson', 5, 'ultrices.Duis.volutpat@Etiamgravida.co.uk', 2020, 'English', 'Ottawa', 'False'),
(58, 'Haley', 'Lara', 4, 'pharetra.Nam@eget.org', 2020, 'English', 'Gatineau', 'False'),
(59, 'Lee', 'Webster', 2, 'Duis@adipiscingenimmi.org', 2018, 'Spanish', 'Gatineau', 'False'),
(60, 'Karly', 'Owens', 4, 'et.nunc@laoreet.org', 2020, 'Spanish', 'Online', 'False'),
(61, 'Basia', 'Kelly', 3, 'Suspendisse.commodo.tincidunt@lectusante.com', 2018, 'English', 'Online', 'True'),
(62, 'Regina', 'Emerson', 3, 'urna@quislectus.edu', 2019, 'Spanish', 'Montreal', 'False'),
(63, 'Nora', 'Arnold', 3, 'in.tempus@semperauctor.co.uk', 2019, 'English', 'Montreal', 'False'),
(64, 'Christopher', 'Barlow', 1, 'ac.mattis@vehiculaet.co.uk', 2017, 'Spanish', 'Gatineau', 'False'),
(65, 'Lacota', 'Santos', 1, 'Nullam.ut.nisi@aliquetliberoInteger.com', 2019, 'Spanish', 'Online', 'False'),
(66, 'Christen', 'Newton', 4, 'et@laciniamattisInteger.edu', 2018, 'French', 'Online', 'True'),
(67, 'Brielle', 'Morrow', 4, 'sit@tinciduntnuncac.co.uk', 2019, 'French', 'Ottawa', 'True'),
(68, 'Sierra', 'Weeks', 3, 'Sed.diam@massaMauris.com', 2017, 'English', 'Montreal', 'False'),
(69, 'Noelle', 'Hill', 4, 'pharetra@accumsan.ca', 2018, 'Spanish', 'Gatineau', 'False'),
(70, 'Samantha', 'White', 2, 'pretium.neque@magna.org', 2019, 'French', 'Gatineau', 'False'),
(71, 'Abdul', 'Bright', 5, 'Nunc@felisadipiscing.edu', 2019, 'Spanish', 'Montreal', 'True'),
(72, 'Aidan', 'Lloyd', 5, 'faucibus@eunequepellentesque.com', 2017, 'French', 'Montreal', 'False'),
(73, 'Karen', 'Alston', 4, 'sociis.natoque@Namnulla.edu', 2017, 'English', 'Montreal', 'False'),
(74, 'Calvin', 'Woods', 2, 'dapibus.quam@idantedictum.co.uk', 2017, 'English', 'Ottawa', 'True'),
(75, 'Lesley', 'Savage', 4, 'Fusce.mollis.Duis@rhoncusProin.org', 2018, 'English', 'Online', 'False'),
(76, 'Adam', 'Estrada', 1, 'sem@dolorquamelementum.org', 2020, 'French', 'Gatineau', 'False'),
(77, 'Linus', 'Odom', 2, 'molestie.sodales@sagittis.org', 2020, 'English', 'Montreal', 'False'),
(78, 'Hadassah', 'Gonzalez', 4, 'vulputate.eu.odio@in.edu', 2018, 'English', 'Ottawa', 'False'),
(79, 'Mason', 'Mullins', 3, 'nulla.Cras.eu@Fusce.edu', 2018, 'English', 'Montreal', 'True'),
(80, 'Jaquelyn', 'Hoffman', 2, 'interdum.Curabitur@turpisnonenim.net', 2019, 'Spanish', 'Montreal', 'True'),
(81, 'Brielle', 'Schneider', 4, 'ante@ullamcorperDuis.co.uk', 2018, 'Spanish', 'Online', 'False'),
(82, 'Kristen', 'Gomez', 2, 'accumsan.neque.et@Suspendisse.com', 2018, 'English', 'Montreal', 'True'),
(83, 'Kiara', 'Pace', 2, 'aliquet@molestiearcuSed.net', 2019, 'French', 'Online', 'True'),
(84, 'Kieran', 'Nielsen', 2, 'mi.Aliquam.gravida@auctor.net', 2019, 'English', 'Online', 'False'),
(85, 'Jescie', 'House', 1, 'cursus.Integer@feugiatplaceratvelit.edu', 2018, 'English', 'Montreal', 'False'),
(86, 'Desirae', 'Welch', 3, 'enim.Curabitur.massa@nuncrisus.net', 2019, 'French', 'Gatineau', 'False'),
(87, 'Wang', 'Cardenas', 2, 'metus.urna.convallis@ut.co.uk', 2017, 'French', 'Montreal', 'True'),
(88, 'Imogene', 'Knapp', 1, 'at.sem.molestie@Proinnon.ca', 2018, 'French', 'Online', 'False'),
(89, 'Yasir', 'Henson', 1, 'lacinia.Sed.congue@tinciduntpedeac.co.uk', 2020, 'English', 'Online', 'True'),
(90, 'Hermione', 'Buckley', 5, 'metus@felisullamcorperviverra.com', 2020, 'English', 'Gatineau', 'False'),
(91, 'Suki', 'William', 5, 'risus.In.mi@ametanteVivamus.edu', 2020, 'English', 'Gatineau', 'False'),
(92, 'Minerva', 'Reed', 3, 'pede.Cum.sociis@mus.edu', 2020, 'English', 'Montreal', 'True'),
(93, 'Noble', 'Barry', 5, 'interdum.Curabitur@orciin.co.uk', 2018, 'Spanish', 'Ottawa', 'True'),
(94, 'Charissa', 'Baxter', 1, 'odio@utipsum.com', 2020, 'Spanish', 'Montreal', 'True'),
(95, 'Cailin', 'Hendrix', 1, 'et@vitaeposuereat.org', 2018, 'French', 'Online', 'False'),
(96, 'Jorden', 'Mosley', 3, 'vehicula.risus@commodo.net', 2017, 'English', 'Gatineau', 'True'),
(97, 'Nasim', 'Farley', 3, 'non@enimSuspendisse.co.uk', 2018, 'French', 'Gatineau', 'False'),
(98, 'Kessie', 'Gilbert', 5, 'auctor.Mauris.vel@accumsanlaoreet.co.uk', 2017, 'English', 'Gatineau', 'True'),
(99, 'Basil', 'Hill', 3, 'vehicula.risus.Nulla@Pellentesquehabitantmorbi.net', 2017, 'English', 'Ottawa', 'True'),
(100, 'Neville', 'Cannon', 3, 'sodales.elit@Donecegestas.co.uk', 2019, 'Spanish', 'Ottawa', 'False');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_lang`
--
ALTER TABLE `adm_lang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `adm_program`
--
ALTER TABLE `adm_program`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `adm_training_location`
--
ALTER TABLE `adm_training_location`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `adm_years`
--
ALTER TABLE `adm_years`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_lang`
--
ALTER TABLE `adm_lang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `adm_program`
--
ALTER TABLE `adm_program`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `adm_training_location`
--
ALTER TABLE `adm_training_location`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `adm_years`
--
ALTER TABLE `adm_years`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
