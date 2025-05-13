-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2025 at 05:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publicsafetydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alex`
--

CREATE TABLE `alex` (
  `id` int(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `ContactNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alex`
--

INSERT INTO `alex` (`id`, `admin_name`, `admin_pass`, `Address`, `ContactNumber`) VALUES
(1, 'admin', '123', '', 0),
(3, 'test', '123', 'test', 123313131),
(4, 'testing', '123', 'sadsaw', 2147483647),
(5, 'chinard', '123', 'QC', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `district_1`
--

CREATE TABLE `district_1` (
  `id` int(11) NOT NULL,
  `barangay_name` varchar(100) NOT NULL,
  `chairman_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `contact_number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district_1`
--

INSERT INTO `district_1` (`id`, `barangay_name`, `chairman_name`, `address`, `contact_number`) VALUES
(1, 'test', 'test', 'test', 'test'),
(2, 'test', 'test', 'test', 'test'),
(3, 'Barangay Malinis', 'Juan Dela Cruz', 'Zone 3, Malinis City', '09171234567'),
(4, 'Alicia', 'LEONARDO C. FLORES III', '#2 Batangas St., Bago Bantay', '8-350-4756'),
(5, 'Bagong Pag-asa', 'FRANZE RUSSELE A. BILAOS', 'Road 9 Cor. Road 11', '8-536-6349/09624636769'),
(6, 'Bahay Toro', 'VICTOR V. FERRER, JR.', '#1 Road 12 cor. Road 11, Project 8', '09997839739'),
(7, 'Balingasa', 'MA. TERESA V. MONTALBO', 'Balingasa Covered Court', '8-277-1225'),
(8, 'Bungad', 'SHERILYN D. CORPUZ', '11 Sanches St., SFDM', '8-529-1673'),
(9, 'Damar', 'EDGAR C. TENGKI', 'Damar Loop St., Damar Village, QC', '8-363-3436'),
(10, 'Damayan', 'FLORIDA L. CASAJE', '#30 San Vicente corner Zamora Sts., SFDM', '8-395-7734'),
(11, 'Del Monte', 'CORNELIO G. PABUSTAN', '#48 Osmeña St., San Francisco Del Monte', '8-372-8101'),
(12, 'Katipunan', 'ELMER S. BARAL', '176 Esmeraldo Beltran Street', '8-281-0839'),
(13, 'Lourdes', 'MARY CATHERINE C. SIOSON', 'Don Manuel cor. Speaker Perez Street', '8-741-8506 | 09327665337'),
(14, 'Maharlika', 'ISAAC C. TAN, JR.', '#390 Apo St.', '8-731-7584'),
(15, 'Manresa', 'ARTURO D. TAMBIS', 'Biak Na Bato cor. Makaturing Street', '8-359-0727'),
(16, 'Mariblo', 'NENITA C. VALDEZ', '#36 De Vera St., SFDM', '8-395-7734'),
(17, 'Masambong', 'ROCKY G. ALPA', '#2 Capoas St., Masambong St.', '8-365-2463'),
(18, 'N.S. Amoranto', 'ARTHURO C. DE GUZMAN', 'Angelo St.', '8-640-2288'),
(19, 'Nayong Kanluran', 'EUNICE C. BUCSIT', '#37 Sorsogon St.', '7-358-1070'),
(20, 'Paang Bundok', 'WILLIAM MANUGAR S. CHUA', 'Iriga St. Bet. Retiro and Tacio St.', '7-090-2158'),
(21, 'Pag-ibig sa Nayon', 'MARIA ABIGAIL A. PARWANI', '#23 J. Pineda St., Balintawak', '8-961-9756'),
(22, 'Paltok', 'JUDY A. FLORESCA', 'Basa St., cor. Mendoza St.', '8-735-9350'),
(23, 'Paraiso', 'RYAN L. NAVERO', 'Roosevelt Ave. cor. De Vera St., SFDM', '8-374-6146'),
(24, 'Phil-am', 'SIMPLICIO EJ. HERMOGENES', 'Baguio Road, Clubhouse Complex, Philam Homes', '8-668-0025 | 8-808-1141'),
(25, 'Project 6', 'MA. CECILIA M. AGCAOILI', 'Road 2, Project 6', '09305324951'),
(26, 'Ramon Magsaysay', 'Cesar C. Dionisio', 'Cagayan corner Ilocos Sur Street', '7-900-0467'),
(27, 'Salvacion', 'SARAH A. BERNARDINO', '#74 Bulusan St., Laloma', '8-742-0944'),
(28, 'San Antonio', 'DANIEL LEON S. BERROYA', '12 Batangas St., Corner Roosevelt Ave.', '8-930-1140'),
(29, 'San Isidro Labrador', 'JOSELITO DT. SAHAGUN', '#91 Halcon St., cor. Maria Clara St.', '8-252-6446'),
(30, 'San Jose', 'MARIO DR. ALCANTARA, JR.', '#14 Tendido St.', '7-092-9625'),
(31, 'Siena', 'EMMALYN STAR C. UNTALAN', 'Don Jose Street corner Bingo Street', '09178713622 / 09190697827'),
(32, 'St. Peter', 'GARY E. ARROYO', '#3 Patok Street, corner Cordillera and Sct. Alvarez St.', '8-330-6259'),
(33, 'Sta. Cruz', 'ERNESTO B. BAETIONG, SR.', '#101 Roosevelt Ave.', '8-542-9087'),
(34, 'Sta. Teresita', 'ROGELIO S. LANUZA', 'Mayon cor. Dapitan St.', '8-743-1713 / 8-731-7539'),
(35, 'Sto. Cristo', 'REY MARK JOHN C. NAVARRO', '#25 Pampanga St., Bago Bantay', '8-922-1573'),
(36, 'Sto. Domingo', 'MICHELLE ANN L. YU-KIM', 'Don Manuel Aggregado St.', '8-990-1992 | 09564322755'),
(37, 'Talayan', 'JERRY L. ONGTAUCO', 'Simbal Co. Malambo, Talayan Village', '8-559-5256'),
(38, 'Vasra', 'HERMINIGILDO P. AVILES', '#40 Forestry Street, Vasra, Quezon City', '7-343-2217 | 8-294-7802'),
(39, 'Veterans Village', 'JOSEFINA L. LANDINGIN', '#61 Bansalangin St., Project 7', '8-332-8880'),
(40, 'West Triangle', 'ELMER TIMOTHY J. LIGON', '#8 Daily Mirror St.', '8-275-2556');

-- --------------------------------------------------------

--
-- Table structure for table `district_2`
--

CREATE TABLE `district_2` (
  `id` int(11) NOT NULL,
  `barangay_name` varchar(100) DEFAULT NULL,
  `chairman_name` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_number` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district_2`
--

INSERT INTO `district_2` (`id`, `barangay_name`, `chairman_name`, `address`, `contact_number`) VALUES
(1, 'Bagong Silangan', 'WILFREDO L. CARA', 'A. Bonifacio St.', 'Main: 8-568-2124 | BPSO: 8-283-1259 | BHERT: 8-564-5674'),
(2, 'Batasan Hills', 'John M. Abad', 'Saret St., IBP Road corner San Mateo Road', 'Main: 09175025154 | 09311406428 | 8-658-9885 | 7-092-2842 | 7-219-3055'),
(3, 'Commonwealth', 'Manuel A. Co', 'Commonwealth Ave., cor. Katuparan St.', 'Secretary: 8-283-9695 | Information: 8-232-8417 | Treasurer: 8-951-2272'),
(4, 'Holy Spirit', 'ESTRELLA C. VALMOCINA', 'Faustino Street (Main) | San Simon Road (Annex)', 'Main: 09311294693 | Annex 1: 09338285268 | 7-092-6118 | Annex 2: 09338285276 | BHERT: 09161494133 Ad'),
(5, 'Payatas', 'RASCAL D. DOCTOR', 'Ilang-Ilang Street (Area A) | Bulacan Street, Group 13 (Area B) | LP Base Phase 1, Lupang Pangako', 'Bravo Base Main: 8-727-25891 | 09175009053');

-- --------------------------------------------------------

--
-- Table structure for table `district_3`
--

CREATE TABLE `district_3` (
  `id` int(11) NOT NULL,
  `barangay_name` varchar(100) DEFAULT NULL,
  `chairman_name` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_number` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district_3`
--

INSERT INTO `district_3` (`id`, `barangay_name`, `chairman_name`, `address`, `contact_number`) VALUES
(1, 'Amihan', 'Elenita C. Chavez', '13 Palosapis Street Project 3', '8-936-0246'),
(2, 'Bagumbayan', 'Alex V. Cruz', '55 San Roque Street', '8-687-0542'),
(3, 'Bagumbuhay', 'Celestino P. Martinez', 'Plaza Malvar, Malvar St., Project 4', '3-439-9399'),
(4, 'Bayanihan', 'Mark Anthony L. Escusa', '321 Pedro C. Martinezs Street, Proj. 4', '8-912-5882'),
(5, 'Blue Ridge A', 'Gabriel C. Legaspi', '13 Cliff Drive', '8-354-0558'),
(6, 'Blue Ridge B', 'Esperanza C. Lee', '5 Moonlight Loop', '8-535-9822'),
(7, 'Camp Aguinaldo', 'Maria Francia M. Escandor', 'Road 3, EP Village', '8-911-6001 loc. 8605'),
(8, 'Dioquino Zobel', 'Judy A. Concepcion', '18 Lizardo St., 20th Ave., Cubao', '8-287-6579'),
(9, 'Duyan-Duyan', 'Ma. Cristina B. Monasterio', 'Kalantas Street', '3-421-9080'),
(10, 'E. Rodriguez', 'Marciano R. Buena Agua, Jr.', '182 Ermin Garcia Street, Cubao', '7-090-9492'),
(11, 'East Kamias', 'Octavio P. Garces', 'K-10th cor. Kasing-Kasing Street', '8-332-8004'),
(12, 'Escopa I', 'Estanislao C. Macabata, Jr.', '33 P. Burgos Street', '8-353-6759'),
(13, 'Escopa II', 'Eduardo M. Zabala', 'Blk. 7 lot 9 Project 4', '8-438-1807'),
(14, 'Escopa III', 'Danilo B. Villanueva', 'Road 1, Project 4', '7-750-5034 / 3-437-9170 / 3-437-4064'),
(15, 'Escopa IV', 'Laila C. Arcega', 'Blk 4 Lot 20', '09073860073'),
(16, 'Libis', 'Florenda Bersamira-De Jesus', 'E. Rodriguez, Jr. Avenue Sitio 2, Libis', '8-913-2406'),
(17, 'Loyola Heights', 'Darwin B. Hayes', 'Park 9, Loyola Heights', '8-442-7782 / 3-428-1434 / 8-666-6603'),
(18, 'Mangga', 'Cesar R. Dela Fuente, Jr.', '134-3C Private Comp. 20th Ave.', '8-921-2796'),
(19, 'Marilag', 'Roberto S. Perez', 'Plaza Camerino, Camerino St. Project 4', '8-277-4494'),
(20, 'Masagana', 'Juliet L. Ginete', '7 Concho Street', '8-421-9089'),
(21, 'Matandang Balara', 'Allan P. Franza', '19 Doña Filomena St., Villa Beatriz, Old Balara', '8-442-8972'),
(22, 'Milagrosa', 'Alejandro H. Cuizon', '32-D Tirona St., Proj. 4', '3-429-7078'),
(23, 'Pansol', 'Joseph P. Mahusay', 'Herminigildo Flores Hall, Pansol Plaza', '8-367-9188'),
(24, 'Quirino 2-A', 'Marian A. Garlit', 'Kubili Street cor. Chico St.', '8-929-9844 / 3-433-2035'),
(25, 'Quirino 2-B', 'Oscar M. Reyes', 'Pajo St. cor. Langka St.', '7-753-5054'),
(26, 'Quirino 2-C', 'Solien R. Alvarez', '179 Bignay St., Project 2', '8-691-9788'),
(27, 'Quirino 3-A', 'Vergilio B. Dela Cruz', '17 Anonas Street, Project 3', '8-911-5650'),
(28, 'Quirino 3-B (Claro)', 'Ronald N. Tagle', '20 Almon Street, Project 3', '8-367-1977'),
(29, 'San Roque', 'Telesforo A. Mortega', '80 19th Avenue Murphy Cubao', '8-421-6246 / 7-905-9235'),
(30, 'Silangan', 'Sonny C. Villarba', '193 Ermin Garcia Street, Cubao', '7-738-7050'),
(31, 'Socorro', 'Teodulo O. Santos', '15 Avenue Cor. Boni Serrano Cubao', '8-855-5645'),
(32, 'St. Ignatius', 'Agnes C. Angeles', '16 Riviera St, St. Ignatius Vill.', '8-911-7310'),
(33, 'Tagumpay', 'Ventura E. Ferreras Jr.', '2-B P. Tuazon Blvd. Project 4', '7-091-6928'),
(34, 'Ugong Norte', 'Randolph T. Chua', 'GF Eton Cyberpass Corinthian Ortigas Ave.', '8-584-3959 | 09121783866'),
(35, 'Villa Maria Clara', 'Danilo C. Mojica', 'Creekside Alimudin Ext., Proj. 4', '7-527-1104'),
(36, 'West Kamias', 'Anthony G. Dacones', '2 K-10th Street, West Kamias', '8-350-6655'),
(37, 'White Plains', 'Raymond Moses B. Tenchavez', 'Gold Star Street', '8-234-1962 / 8-283-0327 / 8-990-3644');

-- --------------------------------------------------------

--
-- Table structure for table `district_4`
--

CREATE TABLE `district_4` (
  `id` int(11) NOT NULL,
  `barangay_name` varchar(100) DEFAULT NULL,
  `chairman_name` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district_4`
--

INSERT INTO `district_4` (`id`, `barangay_name`, `chairman_name`, `address`, `contact_number`) VALUES
(1, 'Bagong Lipunan ng Crame', 'Maria Lourdes Angelica S. Suntay', '57 1st Avenue Cubao', '8-655-0778'),
(2, 'Botocan', 'Rosalyn R. Ballad', 'Makadios Street Area I', '8-636-9338'),
(3, 'Central', 'Rosa D. Magpayo', '2 Marunong St. cor. Matatag Street', '8-295-5642'),
(4, 'Damayang Lagi', 'Ailene G. Ledesma', 'La Felonila cor. E. Rodriguez Sr. Avenue', '7-900-2952'),
(5, 'Don Manuel', 'Antonio Ma. Benito T. Calma Jr.', 'Matimyas cor. Data Street', '8-743-1771'),
(6, 'Doña Aurora', 'Rosalie M. Santos', 'N. Ponce cor. Luskot Street', '8-552-7346'),
(7, 'Doña Imelda', 'Ma. Ganda A. Yap', '145 Bayani Street cor. Guirayan Street', '3-414-0675 / 3-412-2644'),
(8, 'Doña Josefa', 'Josephine O. Salinas', 'Kitanlad cor. Agno St.', '3-410-8034'),
(9, 'Horseshoe', 'Greggan C. Madrigalejos', 'Sunset Drive Horseshoe Village', '8-475-5782 / 8-724-4268'),
(10, 'Immaculate Concepcion', 'Ramon B. Salas', '1 Trinidad St.', '8-470-2310 / 0922-301-3732'),
(11, 'Kalusugan', 'Rocky DC. Rabanal', '19th Street cor. Sta. Ignacia St. New Manila', '8-252-9021'),
(12, 'Kamuning', 'Armida F. Castel', 'K-5th Street, Kamuning behind Kamuning Public Market', '8-521-7252'),
(13, 'Kaunlaran', 'Christopher M. Cheng', '156 N. Domingo Street, Cubao', '7-759-2863'),
(14, 'Kristong Hari', 'Rogelio B. Hablo', 'Doña Juana Rodriguez Street', '7-759-0064'),
(15, 'Krus na Ligas', 'Reniel John C. Perido', 'Plaza Sta. Inez (Infront of Holy Cross Parish)', '3-434-5087'),
(16, 'Laging Handa', 'Jose Maria M. Rodriguez', '73 Sct. Gandia Street', '8-371-0975'),
(17, 'Malaya', 'Feliciana B. Ong', 'Dead end Center Matahimik Street', '8-920-2583'),
(18, 'Mariana', 'Regina Celeste C. San Miguel', '122 4th Street cor New Jersey St., New Manila', '8-722-4968'),
(19, 'Obrero', 'Jose D. Segundo', 'Sct. Tuazon St.', '7-972-9373'),
(20, 'Old Capitol Site', 'Nitzerl M. Mercado', 'Matiwasay Ext. cor. Masaya Street', '8-751-9387'),
(21, 'Paligsahan', 'Alexander V. Lapore', 'A. Roces Avenue beside Glori Supermarket', '8-254-8287 / 8-254-8178'),
(22, 'Pinagkaisahan', 'Graziella C. Saab', 'Ermin Garcia Street', '3-413-8339'),
(23, 'Pinyahan', 'Ricardo A. Villaflor', '35 Malakas Street', '8-921-6243 / 7-752-6042'),
(24, 'Roxas', 'Mary Dianne M. Regalado', 'Jasmin cor. Madre Silva Streets Roxas District', '8-373-7849 / 8-374-7248'),
(25, 'Sacred Heart', 'Ma. Francesca Camille Malig-David', '113 Kamuning Road', '3-411-1893 / 3-416-3747'),
(26, 'San Isidro Galas', 'John M. Reyno', 'Unang Hakbang Street, Galas', '0995-377-0632'),
(27, 'San Martin de Porres', 'Mervin C. Viray', 'Conrado Benitez Street', '8-723-3504'),
(28, 'San Vicente', 'John Melchor R. Magusib', '11-0 Maayusin Ext.', '8-441-5644'),
(29, 'Santol', 'Anacleto C. De Torres', '60 Silencio cor. Baloy Street', '8-713-1928'),
(30, 'Sikatuna Village', 'Michelle P. Cruz', 'Alley 80 V. Luna Ext. (beside Glori Supermarket)', '3-433-1136'),
(31, 'South Triangle', 'Beverly Grace C. Gaw', 'Scout Bayoran', '0908-513-8040'),
(32, 'Sto. Niño', 'Paolo E. Concepcion', 'San Isidro cor. Santol Street', '8-714-8054'),
(33, 'Tatalon', 'Rodel N. Lobo', 'Cabalata Street', '8-751-9387'),
(34, 'Teachers’ Village East', 'Lolita DL. Singson', 'Maginhawa cor. Masinsinan', '8-929-4785'),
(35, 'Teachers’ Village West', 'Ana Liza N. Rosero', '49 Mahinhin Street', '8-546-7673 / 8-426-7450'),
(36, 'UP Campus', 'Lawrence V. Mappala', 'Amorsolo Civic Complex, C.P. Garcia Avenue', '8-426-9779 / 8-641-6636'),
(37, 'UP Village', 'Virgilio S. Ferrer II', 'Maayusin cor. Mapayapa Streets', '8-444-14775'),
(38, 'Valencia', 'Julie C. Salmingo', '164 Santolan Road', '8-413-5055 / 8-721-4327');

-- --------------------------------------------------------

--
-- Table structure for table `district_5`
--

CREATE TABLE `district_5` (
  `id` int(11) NOT NULL,
  `barangay_name` varchar(100) DEFAULT NULL,
  `chairman_name` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district_5`
--

INSERT INTO `district_5` (`id`, `barangay_name`, `chairman_name`, `address`, `contact_number`) VALUES
(1, 'Bagbag', 'Richard V. Ambita', '#625 Parokya ng Pagkabuhay Road', '8-779-7783/ 8-952-7011'),
(2, 'Capri', 'Christian A. Cando', 'Narra St., Area 3, Brgy. Capri', '8-369-6212'),
(3, 'Fairview', 'Jose Arnel L. Quebal', 'Dahlia Ave., West Fairview', '8-930-0040'),
(4, 'Greater Lagro', 'Leo B. Garra, Jr.', 'Blk. 47, Lot 1 Ascencion St., Lagro Plaza', '7-417-2587'),
(5, 'Gulod', 'Rey Aldrin S. Tolentino', 'Villaflor Village, Novaliches', '8-366-3198'),
(6, 'Kaligayahan', 'Alfredo S. Roxas', 'Mockingbird St., Zabarte Subdivision', '7-418-8645'),
(7, 'Nagkaisang Nayon', 'Feliciano F. Dela Cruz', 'Banahaw St., Sitio Kapri', '8-930-4048'),
(8, 'North Fairview', 'Amelia C. Chua', 'Brookside cor. Brimley St., Fairview Homes', '7-239-0652'),
(9, 'Novaliches Proper', 'Asuncion M. Visaya', 'Buenamar Subd., SB Plaza', '8-936-4485/ 8-935-9491'),
(10, 'Pasong Putik Proper', 'Cordapio M. Jamin', 'Belfast Avenue corner Bishop St., Teresa Heights Subd.', '7-799-2258/ 3-419-0357'),
(11, 'San Agustin', 'Fabio Y. Ortega', 'Patnubay St., St. Francis Village', '8-287-6248/ 8-936-1295'),
(12, 'San Bartolome', 'Rizza R. Pascual', 'Q. Highway corner P. Dela Cruz St. Quirino Highway', '7-756-1681'),
(13, 'Sta. Lucia', 'Ruel S. Marpa', 'Sta. Lucia Ave.', '7-625-1755'),
(14, 'Sta. Monica', 'Charles DJ. Manalad', 'Moises St., Jordan Plains', '8-470-0340/ 8-477-2621');

-- --------------------------------------------------------

--
-- Table structure for table `district_6`
--

CREATE TABLE `district_6` (
  `id` int(11) NOT NULL,
  `barangay_name` varchar(100) DEFAULT NULL,
  `chairman_name` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district_6`
--

INSERT INTO `district_6` (`id`, `barangay_name`, `chairman_name`, `address`, `contact_number`) VALUES
(1, 'Apolonio Samson', 'Elizabeth C. De Jesus', '152 Kaingin Road corner Old Samson', '8-413-2002'),
(2, 'Baesa', 'Lottie Gemma D. Juan', '#3 Joaquin St., T.S. Cruz Subdivision', '3-455-5670'),
(3, 'Balon Bato', 'Catherine G. Maglalang', '11 Maxima Drive St.', '8-426-8953/ 8-416-6880'),
(4, 'Culiat', 'Cristina V. Bernardino', 'Along Tandang Sora Ave. beside Culiat High School', '8-475-7873/ 09182871495'),
(5, 'New Era', 'Robert S. Romano', 'St. Joseph St., Milton Hills', '8-518-6818'),
(6, 'Pasong Tamo', 'Stephanie Tricia C. Pilar', 'JP Eugenio St., Philand Drive', '7-502-6154/ 7-798-6537'),
(7, 'Sangandaan', 'Marivic O. Hefti', 'Premium St. corner Parklane St., GSIS Village', '8-799-2956'),
(8, 'Sauyo', 'Noel F. Vitug', '# 116 Mindanao Avenue Extension', '8-368-4382/ 7-369-4382/ 09182889557'),
(9, 'Talipapa', 'Eric R. Juan', '#3 North Diversion Road, Balintawak', '8-464-6980/ 3-455-6904'),
(10, 'Tandang Sora', 'Marlou C. Ulanday', 'Old Sauyo Road corner Sampaguita St.', '7-759-8483'),
(11, 'Unang Sigaw', 'Orlando G. Mamonong', '#506 Quirino Highway', '8-236-0547');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `officer_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_contacts`
--

INSERT INTO `emergency_contacts` (`id`, `name`, `officer_name`, `position`, `phone`, `email`) VALUES
(1, 'QC HOTLINE', '', '', '122', '@quezoncity.gov.ph'),
(3, 'La Loma (Police Station 1)', 'PLTCOL. Ferdinand M. Casiano', 'Station Commander', 'Tel. No. 87125-7577, 8731-8341\nSmart No. 0998-5987942\nGlobe No. 0915-5038939', NULL),
(4, 'Masambong (Police Station 2)', 'PLTCOL. Jewel M. Nicanor', 'Station Commander', 'Tel. No.  8372-1725, 8411-2989, 8415-2590\nSun No. 0923-9613700', NULL),
(5, 'Talipapa (Police Station 3)', 'PLTCOL. Resty O. Damaso', 'Station Commander', 'Tel. No.  8937-1703, 8939-6070\nGlobe No. 0961-3011376', NULL),
(6, 'Novaliches (Police Station 4)', 'PLTCOL. Morgan B. Aguilar', 'Station Commander', 'Tel. No.  8936-3624\nSmart No. 0998-5987948\nSmart No. 0938-7142248', NULL),
(7, 'Fairview (Police Station 5)', 'PLTCOL. Richard E. Mepania', 'Station Commander', 'Tel. No. 8526-0157, 8626-0157\nGlobe No. 0966-1691997\nSmart No. 0998-5987950', NULL),
(8, 'Batasan (Police Station 6)', 'PLTCOL. Romil C. Avenido', 'Station Commander', 'Tel. No. 8931-7870, 8931-6470\nSmart No. 0998-5987952\nGlobe No. 0915-4912941', NULL),
(9, 'Cubao (Police Station 7)', 'PLTCOL. Ramon Czar Dimawala Solas', 'Station Commander', 'Tel. No. 8723-0290, 8411-1612\nSmart No. 0929-7241000\nGlobe No. 0977-207995', NULL),
(10, 'Project 4 (Police Station 8)', 'PLTCOL. Angelito V. De Juan', 'Station Commander', 'Tel. No. 8913-9893, 8913-9895\nGlobe No. 0977-2352141\nSmart No. 0998-5987956', NULL),
(11, 'Anonas (Police Station 9)', 'PLTCOL. Zachary M. Capellan', 'Station Commander', 'Tel. No. 8691-3210, 8434-3942\nGlobe No. 0915-3077519\nSmart No. 0998-5987958', NULL),
(12, 'Kamuning (Police Station 10)', 'PLTCOL. June Paolo O. Abrazado', 'Station Commander', 'Tel. No. 8924-1025\nSmart No. 0998-598760', NULL),
(13, 'Galas (Police Station 11)', 'PLTCOL. Joseph DM Dela Cruz', 'Station Commander', 'Tel. No. 8751-5585, 8391-7734\nSmart No. 0998-5987962\nGlobe No. 0945-4678193', NULL),
(14, 'Eastwood (Police Station 12)', 'PLTCOL. Mary Grace B. Nasdoman', 'Station Commander', 'Tel. No. 8376-7483/ 4839-4415/ 8439-1669\nSmart No. 0929-6311279\nSmart No. 0998-5987964', NULL),
(15, 'Bagong Silangan (Police Station 13)', 'PLTCOL. Leonnie Ann A. Dela Cruz', 'Station Commander', 'Tel. No. 8636-5989\nGlobe No. 0967-4079271\nSmart No. 0961-9134581', NULL),
(16, 'Holy Spirit (Police Station 14)', 'PLTCOL. Ray Tad-O', 'Station Commander', 'Globe No.  0963-6865659/ 1947-6373159\n', NULL),
(17, 'Project 6 (Police Station 15)', 'PLTCOL. Roldante Sarmiento', 'Station Commander', 'Contact No. 0961-7919571/ 0953-1738791\n', NULL),
(18, 'Pasong Putik (Police Station 16)', 'PLTCOL. Josef Geoffrey Lyndon P. Lim', 'Station Commander', 'Globe No. 0963-3239364\n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fire_stations`
--

CREATE TABLE `fire_stations` (
  `id` int(11) NOT NULL,
  `station_name` varchar(255) DEFAULT NULL,
  `contact_information` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fire_stations`
--

INSERT INTO `fire_stations` (`id`, `station_name`, `contact_information`) VALUES
(1, 'La Loma Fire Station', '8740-0501'),
(2, 'San Antonio Fire Station', '7791-1589'),
(3, 'Project 6 Fire Station', '8848-3292'),
(4, 'Bahay-Toro Fire Station', '8772-8955'),
(5, 'Agham Fire Station', '8330-2344'),
(6, 'Ramon Magsaysay Fire Station', '3454-7525'),
(7, 'Masambong Fire Station', '8373-3731'),
(8, 'Congress Fire Station', '8285-5986'),
(9, 'Holy Spirit Fire Station', '8288-2741'),
(10, 'Batasan Fire Station', '8363-6082'),
(11, 'Marilag Fire Station', '7901-5064'),
(12, 'Eastwood Fire Station', '8441-8279'),
(13, 'Quirino 2A Fire Station', '3434-1270, 7728-9506'),
(14, 'Pinagkaisahan Fire Station', '3414-2017, 8721-7381'),
(15, 'Galas Fire Station', '8715-5573'),
(16, 'Krus Na Ligas Fire Station', '0915-1632193'),
(17, 'Central Fire Station', '8287-5823, 8285-6345'),
(18, 'Paligsahan Fire Station', '0932-7286652, 0935-1212620'),
(19, 'Novaliches Fire Station', '8936-3594'),
(20, 'San Bartolome Fire Station', '8939-1301'),
(21, 'Lagro Fire Station', '8930-2237'),
(22, 'Fairview Fire Station', '8938-1729'),
(23, 'Sta. Lucia Fire Station', '8930-7961'),
(24, 'Pasong Putik Fire Station', '7901-1979'),
(25, 'Baesa Fire Station', '8359-0990'),
(26, 'Talipapa Fire Station', '3454-5390'),
(27, 'New Era Fire Station', '8931-9894, 8355-0847');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data`
--

CREATE TABLE `tb_data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `emergencyType` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_data`
--

INSERT INTO `tb_data` (`id`, `name`, `phone`, `emergencyType`, `message`, `address`, `created_at`, `latitude`, `longitude`, `status`) VALUES
(1, 'test', '21312312312', 'Fire', '', 'QC', '2025-04-21 15:43:14', '14.6505728', '121.0155008', 'resolved'),
(2, 'Alexis', '09123344444', 'Fire', '', 'Caloocan', '2025-04-21 15:43:14', '14.6505728', '121.0318848', 'resolved'),
(3, 'Alexis', '09123456789', 'Other', '', 'Bulacan', '2025-04-21 15:43:14', '14.6505728', '121.0318848', 'resolved'),
(4, 'Testing', '09123455555', 'Fire', '', 'Caloocan', '2025-04-21 15:43:14', '14.6505728', '121.0318848', 'resolved'),
(5, '1212412', '41414141412', 'Fire', '', 'QC', '2025-04-21 15:43:42', '14.6505728', '121.0318848', 'resolved'),
(6, 'AWawrqwrw', '12312124124', 'Police', '', 'qc', '2025-04-21 16:36:36', '14.6505728', '121.0318848', 'resolved'),
(7, 'testing', '12312321313', 'Fire', '', 'Tesin', '2025-04-24 13:29:00', '14.6374656', '121.0220544', 'resolved'),
(8, 'asdassd', '12123213123', 'Fire', '', '1312313', '2025-04-24 14:04:55', '14.6374656', '121.0220544', 'resolved'),
(9, 'testaasfdas', '21312313123', 'Medical', '', '3235235', '2025-04-24 15:40:25', '14.6374656', '121.0220544', 'resolved'),
(10, 'TEata', '12312312312', 'Fire', '', '13532352', '2025-04-30 06:12:34', '14.6571264', '121.0220544', 'pending'),
(11, '124141', '41412414323', 'Police', '', '1124124e234234', '2025-04-30 06:12:59', '14.6571264', '121.0220544', 'pending'),
(12, 'Jericho ', '12334444444', 'Fire', '', 'Sagana Condo 1 ', '2025-05-01 01:00:00', '14.6644613', '121.0526408', 'pending'),
(13, 'jericho', '11111111111', 'Fire', '', 'Secret', '2025-05-01 01:00:42', '-16.8602778', '145.5702778', 'pending'),
(14, 'Testiong', '12222222222', 'Medical', '', 'puregold susano', '2025-05-01 01:22:14', '14.7235363', '121.0389725', 'pending'),
(15, 'sfaasdasda', '12122131231', 'Fire', '', 'Sagana Condo 1 Gate 3', '2025-05-01 01:40:23', '14.6644613', '121.0526408', 'pending'),
(16, 'e14131224', '12312312412', 'Fire', 'help', 'Butuan City', '2025-05-01 01:43:39', '8.9483324', '125.5369442', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `account_email` varchar(255) NOT NULL,
  `idpic` blob NOT NULL,
  `account_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `account_name`, `pass`, `account_email`, `idpic`, `account_status`) VALUES
(20250001, 'Jericho', '123', 'jerichonunez12@gmail.com', 0x75706c6f6164732f3332373936343930355f313432353532343337373835313438315f363531323030323235393533373235333237375f6e2e6a7067, 'pending'),
(20250002, 'test', '123', 'jerichonunez12@gmail.com', 0x75706c6f6164732f666f726d616c2066696e616c2e706e67, 'Verified'),
(20250003, 'chinard', '123', 'chinard@gmail.com', 0x75706c6f6164732f696d6167655f323032352d30342d32365f3233313033343634312e706e67, 'Verified'),
(20250004, 'prado', '123', 'prado@gmail.com', 0x75706c6f6164732f696d6167655f323032352d30342d32365f3233313233373130332e706e67, 'Verified'),
(20250005, 'vergara', '123', 'vergara@gmail.com', 0x75706c6f6164732f696d6167655f323032352d30342d32365f3233313333393031392e706e67, 'Verified'),
(20250006, 'irish', '123', 'irish_jhoii@yahoo.com', 0x75706c6f6164732f7365697a7572652e6a7067, 'Verified'),
(20250007, 'afafa', '123', 'sdsd@gmail.com', 0x75706c6f6164732f686561745f7374726f6b65312e6a7067, 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `birthday` date NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alex`
--
ALTER TABLE `alex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district_1`
--
ALTER TABLE `district_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district_2`
--
ALTER TABLE `district_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district_3`
--
ALTER TABLE `district_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district_4`
--
ALTER TABLE `district_4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district_5`
--
ALTER TABLE `district_5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district_6`
--
ALTER TABLE `district_6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fire_stations`
--
ALTER TABLE `fire_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alex`
--
ALTER TABLE `alex`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `district_1`
--
ALTER TABLE `district_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `district_2`
--
ALTER TABLE `district_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `district_3`
--
ALTER TABLE `district_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `district_4`
--
ALTER TABLE `district_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `district_5`
--
ALTER TABLE `district_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `district_6`
--
ALTER TABLE `district_6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fire_stations`
--
ALTER TABLE `fire_stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20250008;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
