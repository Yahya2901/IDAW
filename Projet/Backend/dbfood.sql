-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 nov. 2023 à 18:46
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbfood`
--

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `code` varchar(20) DEFAULT NULL,
  `product_name_fr` varchar(255) DEFAULT NULL,
  `nutrition_data_per` varchar(20) DEFAULT NULL,
  `energy_kcal_value_kcal` decimal(8,2) DEFAULT NULL,
  `fat_value_g` decimal(8,2) DEFAULT NULL,
  `saturated_fat_value_g` decimal(8,2) DEFAULT NULL,
  `carbohydrates_value_g` decimal(8,2) DEFAULT NULL,
  `sugars_value_g` decimal(8,2) DEFAULT NULL,
  `fiber_value_g` decimal(8,2) DEFAULT NULL,
  `proteins_value_g` decimal(8,2) DEFAULT NULL,
  `salt_value_g` decimal(8,2) DEFAULT NULL,
  `sodium_value_g` decimal(8,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `food`
--

INSERT INTO `food` (`code`, `product_name_fr`, `nutrition_data_per`, `energy_kcal_value_kcal`, `fat_value_g`, `saturated_fat_value_g`, `carbohydrates_value_g`, `sugars_value_g`, `fiber_value_g`, `proteins_value_g`, `salt_value_g`, `sodium_value_g`) VALUES
('3067163645414,00', 'Foie gras de canard entier de Gascogne au poivre moulu', '100g', '554.00', '56.00', '24.00', '2.20', '0.90', NULL, '7.50', '1.30', '0.52'),
('3760145705952,00', 'Sauce poivre', '100g', '132.00', '11.00', '4.30', '5.10', '2.20', NULL, '1.30', '1.50', '0.60'),
('3461820079060,00', 'Filets de maquereaux fumés au poivre', '100g', '279.00', '22.00', '6.00', '1.80', '0.50', NULL, '19.00', '2.00', '0.80'),
('3183811013555,00', 'Mayonnaise au poivre Timut', '100g', '748.00', '82.40', '9.40', '0.30', '0.20', NULL, '12.00', '17.00', '6.80'),
('3560071460518,00', 'Jambon de Bayonne frotté au poivre', '100g', '243.00', '13.00', '4.80', '0.60', '0.50', '0.60', '31.00', '4.90', '1.96'),
('3770025464282,00', 'Chocolat gingembre poivre', '100g', '657.20', '56.20', '26.70', '21.80', '9.70', '5.80', '10.90', '0.10', '0.04'),
('3770025932514', 'Rillettes de truite au poivre vert', '100g', '170.00', '12.00', '6.70', '3.10', '1.30', NULL, '12.00', '1.00', '0.40'),
('3166290200852', 'Piment de cayenne extra fort moulus', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3365629130024', 'Rillettes de maquereaux au poivre de kampot', '100g', '250.00', '21.00', '5.50', '12.00', '0.50', NULL, '15.00', '0.62', '0.25'),
('3760272100217', 'Mousse de canard au poivre vert', '100g', '479.00', '49.00', '1.00', '2.00', '1.00', NULL, '1.00', '10.00', '4.00'),
('3168930167891', 'Lay\'s Paysanne saveur fromage du Jura et poivre noir', '100g', '507.00', '28.00', '3.00', '55.00', '2.20', '4.00', '6.50', '1.20', '0.48'),
('3507170120103', 'Terrine de volaille au poivre vert Bio , 180g', '100g', '240.00', '19.00', '6.90', '0.70', '0.50', '3.00', '18.00', '1.20', '0.48'),
('3596710406418', 'Raclette aux 3 poivres', '100g', '362.00', '28.00', '18.00', '1.00', '1.00', '1.20', '26.00', '1.50', '0.60'),
('3265980164327', 'Brochettes de bœuf aux poivres', '100g', '234.00', '19.00', '6.80', '1.50', '0.70', NULL, '14.00', '1.10', '0.44'),
('3369640019641', 'La Buchette Poivre', '100g', '270.00', '22.00', '13.40', '2.05', '2.05', NULL, '16.10', '1.00', '0.40'),
('3278584521632', 'Poivre noir en grains', '100g', '330.00', '7.50', '2.90', '39.50', '0.64', '25.70', '13.30', '0.09', '0.04'),
('3517737622711', 'Pavé enrobé au poivre VPF', '100g', '367.00', '29.00', '11.00', '3.60', '2.30', NULL, '22.00', '5.10', '2.04'),
('5425010202896', 'Boeuf sauté au poivre noir', '100g', '111.00', '5.40', '1.40', '3.00', '1.30', NULL, '12.50', '0.10', '0.04'),
('3073870105417', 'Sardines à lhuile dolive extra et poivre vert', '100g', '254.00', '18.00', '4.70', '0.50', '0.50', '0.50', '23.00', '0.84', '0.34'),
('3320686', 'Poivre noir en grains', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('965446', 'Poivre noir moulu', '100g', '25.00', '56.00', '45.00', '26.00', '3.00', '23.00', '2.00', '0.09', '0.04'),
('3278584570029', 'Poivre Noir Moulu Bio', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('9139787', 'Poivre noir moulin', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('8423018254661', 'Poivre Noir Entier', '100g', '263.00', '3.26', NULL, '63.95', '0.64', NULL, '10.39', '20.00', '8.00'),
('3760280090272', 'CROC poivre de Kampot et sel 110g', '100g', '573.00', '45.14', '8.16', '19.97', '4.61', NULL, '19.81', '1.11', '0.44'),
('3256228438218', 'Raclette sans croûte 3 poivres - Nature', '100g', '342.00', '28.00', '18.00', '0.00', '0.00', '0.00', '22.00', '0.60', '0.24'),
('3256229522008', 'Snacks poppés aux légumineuses saveur fromage poivre fumé', '100g', '421.00', '12.00', '1.70', '64.00', '1.50', '8.70', '9.90', '0.49', '0.20'),
('3253015300086', 'Snacks poppés aux légumineuses saveur fromage poivre fumé', '100g', '421.00', '12.00', '1.70', '64.00', '1.50', '8.70', '9.90', '0.49', '0.20'),
('3256228418999', 'Pavé de saumon au poivre de Timut', '100g', '232.00', '15.00', '2.30', '0.50', '0.50', NULL, '24.00', '3.10', '1.24'),
('3256228100252', 'Poivre gris moulu', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3760024930055', 'Pate au poivre vert', '100g', '314.00', '27.00', '9.70', '1.00', '0.50', NULL, '17.00', '1.58', '0.63'),
('3256228740014', 'Assortiment de sauces Béarnaise Tartare Poivre Bourguignonne', '100g', '447.25', '40.50', '3.35', '5.83', '3.45', '0.70', '1.05', '2.20', '0.88'),
('3760083880438', 'Poivre noir moulu', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3501890002176', 'Rillettes de maquereau fumé au poivre', '100g', '307.00', '28.00', '16.00', '0.80', '0.70', NULL, '13.00', '1.20', '0.48'),
('3166296204977', 'Poivre doux 5 baies', 'serving', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3230140002610', 'Moutarde au poivre vert', '100g', '152.00', '12.00', '0.90', '3.20', '1.30', NULL, '7.30', '6.60', '2.64'),
('3242271000403', 'All’italia Pecorino poivre noir', '100g', '185.00', '8.10', '5.10', '19.00', '0.50', '1.70', '7.80', '0.63', '0.25'),
('3166290130029', 'Poivre gris moulu', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3564706626133', '2 hachés soja blé poivre et persil', '100g', '228.00', '13.00', '1.20', '6.80', '2.50', NULL, '18.00', '1.30', '0.52'),
('3760122961937', 'Petits sablés Beaufort', '100g', '508.00', '28.00', '19.00', '51.00', '3.00', NULL, '9.00', '1.80', '0.72'),
('4027900219642', 'Poivre noir moulu', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('4027900567767', 'Trois Poivres en grain', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3389090021032', 'Mousse de saumon au fromage frais et au poivre du Népal', '100g', '221.10', '19.00', '8.40', '20.00', '1.80', NULL, '11.00', '1.30', '0.52'),
('4056489136934', 'Fromage pour raclette 3 poivres', '100g', '360.00', '28.00', '18.00', '1.00', '1.00', '0.00', '26.00', '1.50', '0.60'),
('3273625843216', 'Ribs aux 3 poivres', '100g', '200.00', '12.00', '3.80', '2.10', '1.30', NULL, '21.00', '1.10', '0.44'),
('20068004', 'Cayenne Pfeffer', '100g', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, '0.00', '0.00', '0.00'),
('8423759058382', 'Viande séchée de boeuf au poivre', '100g', '162.00', '2.80', '1.20', '2.80', '2.10', NULL, '31.00', '3.30', '1.32'),
('3770011616107', 'Fuet au poivre', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('8712100634529', 'Knorr Peper Room Saus Sauce au poivre à la crème  300ML', '100g', '60.00', '3.50', '1.00', '5.60', '1.70', NULL, '1.30', '1.30', '0.52'),
('3270160720460', '8 fajitas au poulet', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3700118301156', 'Pavé au poivre', '100g', '392.00', '32.00', '12.00', '3.40', '2.40', NULL, '23.00', '4.80', '1.92'),
('3589110393839', 'Beurre poivre et baies roses', '100g', '726.00', '79.00', '49.00', '3.00', '1.90', NULL, '0.80', '3.32', '1.33'),
('3580281893234', 'Poivre noir moulu', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3517738126713', 'Pavé au poivre', '100g', '355.00', '27.00', '12.00', '3.00', '1.70', NULL, '22.00', '4.80', '1.92'),
('3760311991653', 'Poivre noir moulu de ceylan', '100g', '251.00', '3.30', '0.00', '64.61', '0.00', '25.20', '10.00', NULL, NULL),
('3760324540022', 'Yaourt poivre de timut', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3760122961876', 'Petits beurre Comté et poivre noir de Madagascar', '100g', '499.00', '25.00', '17.00', '55.00', '2.80', '5.00', '11.00', '1.60', '0.64'),
('3770013307379', 'Noix de Cajou Poivre de Tellicherry', '100g', '604.00', '45.76', '7.80', '21.96', '6.96', '8.16', '16.76', '1.06', '0.42'),
('3162050059036', 'Poivre Noir - Voantsy perifery - relevé', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3376963467981', 'Fromage pour raclette, 3 saveurs: poivre, nature et fumée', '100g', '344.00', '28.00', '18.00', '1.00', '0.00', '0.00', '22.00', '2.00', '0.80'),
('2297893020736', 'Maquereaux fumés au poivre', '100g', '294.00', '24.30', '5.35', '0.00', '0.00', NULL, '18.80', '3.51', '1.40'),
('3580288084437', 'Le Mélange grillades poivron rouge, poivre, oignon', '100g', '291.00', '3.70', '0.90', '45.00', '30.00', NULL, '10.00', '10.00', '4.00'),
('7613035982055', 'GARDEN GOURMET Le Gourmand Soja, Poivre et Persil 160g', '100g', '173.00', '4.80', '0.40', '10.40', '3.00', '4.30', '20.00', '1.10', '0.44'),
('3266481351148', 'Amande citron et poivre vert', '100g', '624.00', '52.00', '3.90', '11.00', '1.40', NULL, '24.00', '1.90', '0.76'),
('8006614051904', 'Poivre noir', '100g', '280.00', '3.30', '0.00', '38.30', '0.60', NULL, '10.90', '0.10', '0.04'),
('3254637001719', 'Terrine de canard au poivre vert', '100g', '338.00', '30.00', '11.00', '1.00', '1.00', NULL, '16.00', '2.40', '0.96'),
('3233130500141', 'Jambonneau  poivre vert', '100g', '154.00', '8.20', '2.90', '0.50', '0.50', NULL, '20.00', '1.60', '0.64'),
('3580288089944', 'La belle chips', '100g', '546.00', '36.00', '4.00', '45.00', '0.90', NULL, '7.40', '0.90', '0.36'),
('3367824926570', 'Poitrine Plate au poivre', '100g', '308.00', '21.40', '7.90', '0.50', '0.50', NULL, '28.60', '5.47', '2.19'),
('7610071046246', 'Poivre et ail', '100g', '272.00', '2.70', '0.60', '43.00', '3.70', '19.00', '9.60', '14.60', '5.84'),
('3270160893089', 'Arancini cacio et pepe', '100g', '254.00', '9.90', '4.50', '33.00', '2.30', '1.20', '7.60', '1.20', '0.48'),
('3183811059287', 'Poivre noir', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3760012400287', 'Sel de Guerande aux poivres et baies roses', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('59597032', 'Poivre noir', '100g', '330.00', '7.50', '2.90', '39.50', '0.64', '25.70', '13.30', '0.09', '0.04'),
('3367651009590', 'Le XXL Poivre', '100g', '289.00', '17.00', '4.70', '22.00', '1.70', NULL, '12.00', '0.73', '0.29'),
('3547130071984', 'Mélange de poivres façon O&CO.', '100g', '304.00', '3.30', '1.00', '45.00', '38.00', NULL, '11.00', '0.00', '0.00'),
('3,25187E+12', 'Soupe de poissons au safran', '100g', '39.00', '2.40', '0.50', '0.50', '0.50', NULL, '3.30', '0.88', '0.35'),
('8,01837E+12', 'Risotto au safran', '100g', '351.00', '1.00', '0.00', '75.70', '0.10', '4.00', '8.00', '0.00', '0.00'),
('8,01837E+12', 'Risotto au Safran', '100g', '401.00', '0.50', '0.10', '91.00', '1.00', NULL, '8.20', '0.01', '0.00'),
('8,01837E+12', 'Risotto au safran', '100g', '401.00', '0.50', '0.10', '91.00', '1.00', NULL, '8.20', '0.01', '0.00'),
('8,01837E+12', 'Risotto au safran', '100g', '351.00', '1.00', '0.00', '76.00', '0.50', '4.00', '8.00', '0.01', '0.00'),
('3,76033E+12', 'Soupe Potimarron Safran', '100g', '46.00', '2.40', '0.30', '4.60', '2.60', NULL, '0.80', '0.50', '0.20'),
('3,59671E+12', 'Safran moulu', '100g', '310.00', '5.90', '1.60', '65.40', '0.00', '5.10', '11.50', '0.37', '0.15'),
('3,28837E+12', 'Rouille au safran', '100g', '701.55', '75.98', '5.80', '1.00', '0.25', '0.37', '3.00', '1.15', '0.46'),
('3,76004E+12', 'Paëlla royale au véritable safran', '100g', '193.00', '10.00', '1.80', '17.00', '0.70', '1.30', '7.30', '0.41', '0.16'),
('7,50301E+12', 'Safran en pistils', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('8,03358E+12', 'Risotto au safran', '100g', '346.00', '0.90', '0.10', NULL, '0.90', '1.50', '6.90', '1.30', '0.52'),
('3,26443E+12', 'Curcuma Safran Pays Reunion Bon Epices', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,41796E+12', 'Safran poudre', '100g', '23.00', '53.00', NULL, NULL, '0.00', '1.00', '23.00', '0.10', '0.04'),
('3,76018E+12', 'Sauce poisson au safran', '100g', '55.00', '1.89', '0.45', '5.89', '1.15', NULL, '3.80', '0.04', '0.02'),
('3,76008E+12', 'Dorade au Safran Breton Bio', '100g', '203.00', '15.50', '10.20', '1.80', '1.00', NULL, '11.70', '0.88', '0.35'),
('3,76026E+12', 'Gelee de safran', '100g', '211.00', '0.00', '0.00', '51.00', '51.00', NULL, '0.00', '0.02', '0.01'),
('3,49227E+12', 'Millepertuis safran & mélisse', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,25901E+12', 'Galettes céréales riz, légumes, safran', '100g', '228.00', '8.80', '1.00', '30.00', '1.40', '3.90', '5.30', '1.10', '0.44'),
('3,25901E+12', 'Galette Riz Safran', '100g', '207.00', '4.60', '0.90', '35.00', '2.00', '3.00', '4.80', '1.10', '0.44'),
('3,26746E+12', 'Tagliatelles au safran', '100g', '354.00', '2.40', '0.60', '65.40', '2.00', '3.70', '13.60', '0.03', '0.01'),
('3,38038E+12', 'Tortils Citron Safran 300G +20% Gratuit', '100g', '361.00', '1.90', '0.30', '73.50', '3.20', '2.90', '11.00', '0.01', '0.00'),
('3,38038E+12', 'Boulgour de riz coco et safran', '100g', '384.00', '6.00', '4.80', '73.60', '2.40', '3.90', '7.20', '0.02', '0.01'),
('3,77001E+12', 'Velouté Potimarron Safran', '100g', '39.00', '1.55', '0.58', '3.31', '0.29', NULL, '0.77', '0.53', '0.21'),
('3,77001E+12', 'Mulet fumé de Loire au safran de Touraine', '100g', '215.00', '17.60', '10.80', '1.60', '0.50', NULL, '10.50', '1.30', '0.52'),
('3,16205E+12', 'Safran en filament', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,59671E+12', 'Safran moulu', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,5507E+12', 'Safran', '100g', '310.00', '6.00', '2.00', '65.00', '42.00', NULL, '11.00', '14.00', '5.60'),
('3,41796E+12', 'SAFRAN stigmates \"COOK\" 1g*', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,77001E+12', 'rhodiola + safran', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,34743E+12', 'Nids petit épeautre safran des Indes', '100g', '348.00', '2.68', '0.43', '66.02', '2.69', '5.80', '12.18', '0.01', '0.00'),
('3,16629E+12', 'Safran Poudre', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,76034E+12', 'Crème dAsperge au Safran de Touraine', '100g', '128.00', '11.00', '1.40', '3.00', '1.10', NULL, '3.30', '0.93', '0.37'),
('3,76005E+12', 'Safran moulu', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('6,26272E+12', 'Miel au safran', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,16629E+12', 'Safran du Levant', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('4,0279E+12', 'Assaisonnement au safran pour paella', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,7002E+12', 'Safran 30MG Bio - 30 Capsules - Vitall+', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('8,68266E+12', 'Safran', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('6,11118E+12', 'Cube de bouillon deshydraté saveur safran', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,14455E+12', 'SAFRAN pistil', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('8,4137E+12', 'Sazonador para paella con azafrán', '100g', '240.00', '4.20', '0.70', '32.80', '20.90', '13.60', '11.00', '29.00', '11.60'),
('3,10287E+12', 'La Planete Des Epices safran dOrient pistils', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,76033E+12', 'Risotto aux cèpes et safran', '100g', '345.00', '1.70', '0.50', '73.80', '1.40', NULL, '8.30', '0.00', '0.00'),
('3,25039E+12', 'Cigalou Safran 0 3G Pot V', '100g', '10.00', '0.00', '0.00', '0.00', '0.00', NULL, '0.00', '10.00', '4.00'),
('4,33718E+12', 'Safran en poudre', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,5647E+12', 'Colin d Alaska sauce citron et son riz safran', '100g', '107.00', '2.30', '1.00', '16.00', '0.50', '0.50', '5.40', '0.93', '0.37'),
('3,54735E+12', 'Velouté de rouget au safran', '100g', '133.00', '1.00', '0.30', '4.00', '0.01', NULL, '2.50', '0.63', '0.25'),
('3,70024E+12', 'Rissoto aux cèpes et safran', '100g', '335.00', '1.50', '0.50', '73.00', '0.60', NULL, '7.00', '0.00', '0.00'),
('3,26614E+12', 'Risotto Crevettes, safran & parmesan', '100g', '126.00', '5.20', '3.00', '15.00', '0.70', NULL, '4.70', '0.78', '0.31'),
('3,26183E+12', 'Terrine de campagne safran', '100g', '353.00', '32.00', '12.00', '2.50', '0.50', NULL, '13.00', '1.60', '0.64'),
('3,77E+12', 'Biscuits au Safran', '100g', '441.00', '21.00', '21.00', '56.00', '29.00', NULL, '6.00', '0.02', '0.01'),
('3,77001E+12', 'Thé blanc parfumé au Safran', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,27367E+12', 'Croutons a lhuile dolive et safran', '100g', '392.00', '6.20', '0.90', '70.60', '4.40', NULL, '11.90', '2.00', '0.80'),
('6,09119E+12', 'Mayil Curcuma Moulu Safran', '100g', '354.00', '9.90', '3.20', '4.00', '3.20', NULL, '7.80', '0.00', '0.00'),
('3,26596E+12', 'Curcuma safran bourbon', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('8,00142E+12', 'Risotto au safran', '100g', '350.00', '0.00', '0.00', '76.00', '0.00', NULL, '0.00', '0.00', '0.00'),
('3,52353E+12', 'Sablés au safran', '100g', '438.00', '24.00', '11.00', '49.00', '37.00', NULL, '7.00', '0.00', '0.00'),
('8,00917E+12', 'Morelli 1860 Linguine, Mit Safran Weizenkeimen', '100g', '359.00', '1.30', '0.30', '72.00', '4.40', NULL, '13.00', '0.02', '0.01'),
('3,76006E+12', 'Laventurier Nougat Safran Cranberry Pistache', '100g', '420.00', '17.00', '1.80', '61.00', '54.00', NULL, '7.80', '0.06', '0.02'),
('3,76005E+12', 'Croquants au safran du Quercy', '100g', '405.00', '13.00', '1.00', '62.00', '53.00', NULL, '8.20', '0.01', '0.00'),
('3,25187E+12', 'Sardines au Safran Bio Corse', '100g', '222.00', '13.00', '3.30', '0.50', '0.00', NULL, '26.00', '0.85', '0.34'),
('3,50279E+12', 'Croûtons Safran à lhuile dolive', '100g', '392.00', '6.20', '0.90', '70.60', '4.40', NULL, '11.90', '2.07', '0.83'),
('0417242957854', 'Biscuits au safran de bayons', '100g', '0.10', '22.00', '8.00', '50.00', '22.00', NULL, '10.00', '0.30', '0.12'),
('3,70024E+12', 'RISOTTO AU SAFRAN', '100g', '335.00', '1.50', '0.50', '73.00', '0.60', NULL, '0.00', NULL, NULL),
('3,77E+12', 'Yaourt safran', '100g', '92.00', '3.90', '2.50', '11.60', '11.60', NULL, '3.60', '3.10', '1.24'),
('3,25187E+12', 'Soupe de poissons au safran', '100g', '39.00', '2.40', '0.50', '0.50', '0.50', NULL, '3.30', '0.88', '0.35'),
('8,01837E+12', 'Risotto au safran', '100g', '351.00', '1.00', '0.00', '75.70', '0.10', '4.00', '8.00', '0.00', '0.00'),
('8,01837E+12', 'Risotto au Safran', '100g', '401.00', '0.50', '0.10', '91.00', '1.00', NULL, '8.20', '0.01', '0.00'),
('8,01837E+12', 'Risotto au safran', '100g', '401.00', '0.50', '0.10', '91.00', '1.00', NULL, '8.20', '0.01', '0.00'),
('8,01837E+12', 'Risotto au safran', '100g', '351.00', '1.00', '0.00', '76.00', '0.50', '4.00', '8.00', '0.01', '0.00'),
('3,76033E+12', 'Soupe Potimarron Safran', '100g', '46.00', '2.40', '0.30', '4.60', '2.60', NULL, '0.80', '0.50', '0.20'),
('3,59671E+12', 'Safran moulu', '100g', '310.00', '5.90', '1.60', '65.40', '0.00', '5.10', '11.50', '0.37', '0.15'),
('3,28837E+12', 'Rouille au safran', '100g', '701.55', '75.98', '5.80', '1.00', '0.25', '0.37', '3.00', '1.15', '0.46'),
('3,76004E+12', 'Paëlla royale au véritable safran', '100g', '193.00', '10.00', '1.80', '17.00', '0.70', '1.30', '7.30', '0.41', '0.16'),
('7,50301E+12', 'Safran en pistils', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('8,03358E+12', 'Risotto au safran', '100g', '346.00', '0.90', '0.10', NULL, '0.90', '1.50', '6.90', '1.30', '0.52'),
('3,26443E+12', 'Curcuma Safran Pays Reunion Bon Epices', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,41796E+12', 'Safran poudre', '100g', '23.00', '53.00', NULL, NULL, '0.00', '1.00', '23.00', '0.10', '0.04'),
('3,76018E+12', 'Sauce poisson au safran', '100g', '55.00', '1.89', '0.45', '5.89', '1.15', NULL, '3.80', '0.04', '0.02'),
('3,76008E+12', 'Dorade au Safran Breton Bio', '100g', '203.00', '15.50', '10.20', '1.80', '1.00', NULL, '11.70', '0.88', '0.35'),
('3,76026E+12', 'Gelee de safran', '100g', '211.00', '0.00', '0.00', '51.00', '51.00', NULL, '0.00', '0.02', '0.01'),
('3,49227E+12', 'Millepertuis safran & mélisse', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,25901E+12', 'Galettes céréales riz, légumes, safran', '100g', '228.00', '8.80', '1.00', '30.00', '1.40', '3.90', '5.30', '1.10', '0.44'),
('3,25901E+12', 'Galette Riz Safran', '100g', '207.00', '4.60', '0.90', '35.00', '2.00', '3.00', '4.80', '1.10', '0.44'),
('3,26746E+12', 'Tagliatelles au safran', '100g', '354.00', '2.40', '0.60', '65.40', '2.00', '3.70', '13.60', '0.03', '0.01'),
('3,38038E+12', 'Tortils Citron Safran 300G +20% Gratuit', '100g', '361.00', '1.90', '0.30', '73.50', '3.20', '2.90', '11.00', '0.01', '0.00'),
('3,38038E+12', 'Boulgour de riz coco et safran', '100g', '384.00', '6.00', '4.80', '73.60', '2.40', '3.90', '7.20', '0.02', '0.01'),
('3,77001E+12', 'Velouté Potimarron Safran', '100g', '39.00', '1.55', '0.58', '3.31', '0.29', NULL, '0.77', '0.53', '0.21'),
('3,77001E+12', 'Mulet fumé de Loire au safran de Touraine', '100g', '215.00', '17.60', '10.80', '1.60', '0.50', NULL, '10.50', '1.30', '0.52'),
('3,16205E+12', 'Safran en filament', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,59671E+12', 'Safran moulu', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,5507E+12', 'Safran', '100g', '310.00', '6.00', '2.00', '65.00', '42.00', NULL, '11.00', '14.00', '5.60'),
('3,41796E+12', 'SAFRAN stigmates \"COOK\" 1g*', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,77001E+12', 'rhodiola + safran', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,34743E+12', 'Nids petit épeautre safran des Indes', '100g', '348.00', '2.68', '0.43', '66.02', '2.69', '5.80', '12.18', '0.01', '0.00'),
('3,16629E+12', 'Safran Poudre', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,76034E+12', 'Crème dAsperge au Safran de Touraine', '100g', '128.00', '11.00', '1.40', '3.00', '1.10', NULL, '3.30', '0.93', '0.37'),
('3,76005E+12', 'Safran moulu', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('6,26272E+12', 'Miel au safran', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,16629E+12', 'Safran du Levant', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('4,0279E+12', 'Assaisonnement au safran pour paella', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,7002E+12', 'Safran 30MG Bio - 30 Capsules - Vitall+', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('8,68266E+12', 'Safran', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('6,11118E+12', 'Cube de bouillon deshydraté saveur safran', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,14455E+12', 'SAFRAN pistil', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('8,4137E+12', 'Sazonador para paella con azafrán', '100g', '240.00', '4.20', '0.70', '32.80', '20.90', '13.60', '11.00', '29.00', '11.60'),
('3,10287E+12', 'La Planete Des Epices safran dOrient pistils', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,76033E+12', 'Risotto aux cèpes et safran', '100g', '345.00', '1.70', '0.50', '73.80', '1.40', NULL, '8.30', '0.00', '0.00'),
('3,25039E+12', 'Cigalou Safran 0 3G Pot V', '100g', '10.00', '0.00', '0.00', '0.00', '0.00', NULL, '0.00', '10.00', '4.00'),
('4,33718E+12', 'Safran en poudre', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,5647E+12', 'Colin d Alaska sauce citron et son riz safran', '100g', '107.00', '2.30', '1.00', '16.00', '0.50', '0.50', '5.40', '0.93', '0.37'),
('3,54735E+12', 'Velouté de rouget au safran', '100g', '133.00', '1.00', '0.30', '4.00', '0.01', NULL, '2.50', '0.63', '0.25'),
('3,70024E+12', 'Rissoto aux cèpes et safran', '100g', '335.00', '1.50', '0.50', '73.00', '0.60', NULL, '7.00', '0.00', '0.00'),
('3,26614E+12', 'Risotto Crevettes, safran & parmesan', '100g', '126.00', '5.20', '3.00', '15.00', '0.70', NULL, '4.70', '0.78', '0.31'),
('3,26183E+12', 'Terrine de campagne safran', '100g', '353.00', '32.00', '12.00', '2.50', '0.50', NULL, '13.00', '1.60', '0.64'),
('3,77E+12', 'Biscuits au Safran', '100g', '441.00', '21.00', '21.00', '56.00', '29.00', NULL, '6.00', '0.02', '0.01'),
('3,77001E+12', 'Thé blanc parfumé au Safran', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3,27367E+12', 'Croutons a lhuile dolive et safran', '100g', '392.00', '6.20', '0.90', '70.60', '4.40', NULL, '11.90', '2.00', '0.80'),
('6,09119E+12', 'Mayil Curcuma Moulu Safran', '100g', '354.00', '9.90', '3.20', '4.00', '3.20', NULL, '7.80', '0.00', '0.00'),
('3,26596E+12', 'Curcuma safran bourbon', '100g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('8,00142E+12', 'Risotto au safran', '100g', '350.00', '0.00', '0.00', '76.00', '0.00', NULL, '0.00', '0.00', '0.00'),
('3,52353E+12', 'Sablés au safran', '100g', '438.00', '24.00', '11.00', '49.00', '37.00', NULL, '7.00', '0.00', '0.00'),
('8,00917E+12', 'Morelli 1860 Linguine, Mit Safran Weizenkeimen', '100g', '359.00', '1.30', '0.30', '72.00', '4.40', NULL, '13.00', '0.02', '0.01'),
('3,76006E+12', 'Laventurier Nougat Safran Cranberry Pistache', '100g', '420.00', '17.00', '1.80', '61.00', '54.00', NULL, '7.80', '0.06', '0.02'),
('3,76005E+12', 'Croquants au safran du Quercy', '100g', '405.00', '13.00', '1.00', '62.00', '53.00', NULL, '8.20', '0.01', '0.00'),
('3,25187E+12', 'Sardines au Safran Bio Corse', '100g', '222.00', '13.00', '3.30', '0.50', '0.00', NULL, '26.00', '0.85', '0.34'),
('3,50279E+12', 'Croûtons Safran à lhuile dolive', '100g', '392.00', '6.20', '0.90', '70.60', '4.40', NULL, '11.90', '2.07', '0.83'),
('0417242957854', 'Biscuits au safran de bayons', '100g', '0.10', '22.00', '8.00', '50.00', '22.00', NULL, '10.00', '0.30', '0.12'),
('3,70024E+12', 'RISOTTO AU SAFRAN', '100g', '335.00', '1.50', '0.50', '73.00', '0.60', NULL, '0.00', NULL, NULL),
('3,77E+12', 'Yaourt safran', '100g', '92.00', '3.90', '2.50', '11.60', '11.60', NULL, '3.60', '3.10', '1.24');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(10) NOT NULL,
  `activity_level` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `age`, `gender`, `activity_level`) VALUES
(1, 'yaya', '123', 24, 'homme', 'bas'),
(3, 'ouss', '12345', 18, 'homme', 'moyen');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
