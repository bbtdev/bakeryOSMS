-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Noi 2017 la 23:48
-- Versiune server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alcdb`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `ambalaj`
--

CREATE TABLE `ambalaj` (
  `id` int(11) NOT NULL,
  `denumire` varchar(45) DEFAULT NULL,
  `um` varchar(5) DEFAULT NULL,
  `pret` int(11) NOT NULL,
  `categorie_denumire` varchar(12) DEFAULT NULL,
  `creator` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `ambalaj`
--

INSERT INTO `ambalaj` (`id`, `denumire`, `um`, `pret`, `categorie_denumire`, `creator`) VALUES
(1, 'cutie tort dreptunghiulara mare', 'BUC', 5, 'cutie tort', 'bogdan'),
(2, 'cutie tort dreptunghiulara mica', 'BUC', 6, 'cutie tort', 'bogdan');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `ambalaj_categorie`
--

CREATE TABLE `ambalaj_categorie` (
  `denumire` varchar(12) NOT NULL,
  `importanta` int(11) NOT NULL,
  `grupare` varchar(12) DEFAULT NULL,
  `evidenta` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `ambalaj_categorie`
--

INSERT INTO `ambalaj_categorie` (`denumire`, `importanta`, `grupare`, `evidenta`) VALUES
('cutie tort', 1, 'comuna', 'colectiva');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `corectie_listadeinventariere_nr1_20171112_selgros_iasi`
--

CREATE TABLE `corectie_listadeinventariere_nr1_20171112_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `explicatie` text,
  `ora` time DEFAULT NULL,
  `document_item_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `corectie_listadeinventariere_nr1_20171112_selgros_iasi`
--

INSERT INTO `corectie_listadeinventariere_nr1_20171112_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `explicatie`, `ora`, `document_item_id`, `id`) VALUES
('produs_fabricat', 60, 83, '-2.700', 'greseala', '10:51:34', 8, 1),
('produs_fabricat', 59, 85, '2.450', 'am uitat', '10:53:18', 0, 2);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `corectie_listadeinventariere_nr4_20171115_selgros_iasi`
--

CREATE TABLE `corectie_listadeinventariere_nr4_20171115_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `explicatie` text,
  `ora` time DEFAULT NULL,
  `document_item_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `corectie_listadeinventariere_nr4_20171115_selgros_iasi`
--

INSERT INTO `corectie_listadeinventariere_nr4_20171115_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `explicatie`, `ora`, `document_item_id`, `id`) VALUES
('produs_fabricat', 1, 0, '4.000', 'aaa', '02:17:49', 0, 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `corectie_pvdeteriorare_nr1_20171112_selgros_iasi`
--

CREATE TABLE `corectie_pvdeteriorare_nr1_20171112_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `explicatie` text,
  `ora` time DEFAULT NULL,
  `document_item_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `corectie_pvdeteriorare_nr1_20171112_selgros_iasi`
--

INSERT INTO `corectie_pvdeteriorare_nr1_20171112_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `explicatie`, `ora`, `document_item_id`, `id`) VALUES
('produs_fabricat', 27, 0, '-1.000', 'una in minus', '12:08:33', 1, 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `corectie_pvdeteriorare_nr1_20171115_selgros_iasi`
--

CREATE TABLE `corectie_pvdeteriorare_nr1_20171115_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `explicatie` text,
  `ora` time DEFAULT NULL,
  `document_item_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `corectie_pvdeteriorare_nr1_20171115_selgros_iasi`
--

INSERT INTO `corectie_pvdeteriorare_nr1_20171115_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `explicatie`, `ora`, `document_item_id`, `id`) VALUES
('produs_fabricat', 1, 0, '-1.000', 'aa', '18:17:45', 1, 1),
('produs_fabricat', 1, 0, '1.000', 'dasda', '18:18:05', 1, 2);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `corectie_pvprotocol_nr2_20171112_selgros_iasi`
--

CREATE TABLE `corectie_pvprotocol_nr2_20171112_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `explicatie` text,
  `ora` time DEFAULT NULL,
  `document_item_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `corectie_pvprotocol_nr2_20171112_selgros_iasi`
--

INSERT INTO `corectie_pvprotocol_nr2_20171112_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `explicatie`, `ora`, `document_item_id`, `id`) VALUES
('produs_fabricat', 71, 0, '-1.000', 'aa', '13:04:18', 1, 1),
('produs_fabricat', 6, 0, '3.000', 'yummy', '13:04:35', 0, 2);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `corectie_raexmarfa_nr1_20171112_laborator_tudor_neculai`
--

CREATE TABLE `corectie_raexmarfa_nr1_20171112_laborator_tudor_neculai` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `explicatie` text,
  `ora` time DEFAULT NULL,
  `document_item_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `corectie_raexmarfa_nr1_20171112_laborator_tudor_neculai`
--

INSERT INTO `corectie_raexmarfa_nr1_20171112_laborator_tudor_neculai` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `explicatie`, `ora`, `document_item_id`, `id`) VALUES
('produs_fabricat', 1, 0, '4.000', 'aa', '19:29:07', 1, 1),
('produs_fabricat', 1, 0, '-1.000', 'xxx', '19:29:43', 1, 2);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `corectie_raexmarfa_nr2_20171115_laborator_tudor_neculai`
--

CREATE TABLE `corectie_raexmarfa_nr2_20171115_laborator_tudor_neculai` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `explicatie` text,
  `ora` time DEFAULT NULL,
  `document_item_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `corectie_raexmarfa_nr2_20171115_laborator_tudor_neculai`
--

INSERT INTO `corectie_raexmarfa_nr2_20171115_laborator_tudor_neculai` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `explicatie`, `ora`, `document_item_id`, `id`) VALUES
('produs_fabricat', 58, 92, '1.000', 'aa', '18:50:25', 1, 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `corectie_receptieretururi_nr1_20171115_laborator_tudor_neculai`
--

CREATE TABLE `corectie_receptieretururi_nr1_20171115_laborator_tudor_neculai` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `explicatie` text,
  `ora` time DEFAULT NULL,
  `document_item_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `corectie_receptieretururi_nr1_20171115_laborator_tudor_neculai`
--

INSERT INTO `corectie_receptieretururi_nr1_20171115_laborator_tudor_neculai` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `explicatie`, `ora`, `document_item_id`, `id`) VALUES
('produs_fabricat', 1, 0, '1.000', 'aa', '18:50:39', 1, 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `departament`
--

CREATE TABLE `departament` (
  `id` varchar(25) NOT NULL,
  `locatie_necesara` int(11) NOT NULL,
  `program_necesar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `departament`
--

INSERT INTO `departament` (`id`, `locatie_necesara`, `program_necesar`) VALUES
('Contabilitate', 0, 0),
('IT', 0, 0),
('Management', 0, 0),
('Productie', 1, 1),
('Transport', 0, 1),
('Vanzari', 1, 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `titlu` varchar(45) DEFAULT NULL,
  `obiect` varchar(12) DEFAULT NULL,
  `intrari` varchar(25) DEFAULT NULL,
  `gestiune` varchar(25) DEFAULT NULL,
  `sursa` varchar(12) DEFAULT NULL,
  `circuit` varchar(12) DEFAULT NULL,
  `numar_limitat` int(11) NOT NULL,
  `deschis` int(11) NOT NULL,
  `numerotare` varchar(12) DEFAULT NULL,
  `action` varchar(45) DEFAULT NULL,
  `informatii` int(11) NOT NULL,
  `descriere` int(11) NOT NULL,
  `label_q_txt` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `document`
--

INSERT INTO `document` (`id`, `titlu`, `obiect`, `intrari`, `gestiune`, `sursa`, `circuit`, `numar_limitat`, `deschis`, `numerotare`, `action`, `informatii`, `descriere`, `label_q_txt`) VALUES
(1, 'Lista de Inventariere', 'produse', 'produse_comercializate', 'vitrina', 'catalog', 'stoc', 2, 0, 'globala', 'ListaDeInventariere', 0, 0, 'Cantitatea in stoc'),
(2, 'Nota de Receptie', 'produse', 'produse_comercializate', 'vitrina', 'catalog', 'intrare', 1, 1, 'globala', 'NotaDeReceptie', 0, 0, 'Cantitatea primita'),
(3, 'Proces Verbal de Deteriorare', 'produse', 'produse_fabricate', 'vitrina', 'stoc', 'iesire', 1, 1, 'individuala', 'PVDeteriorare', 0, 0, 'Cantitatea retrasa'),
(4, 'Proces Verbal de Protocol', 'produse', 'produse_comercializate', 'vitrina', 'stoc', 'iesire', 0, 0, 'individuala', 'PVProtocol', 1, 0, 'Cantitatea oferita'),
(5, 'Raport Vanzare Post-Inventariere Finala', 'produse', 'produse_comercializate', 'vitrina', 'stoc', 'iesire', 1, 1, 'globala', 'RaVaPostInvF', 0, 0, 'Cantitatea vanduta'),
(6, 'Proces Verbal de Modficare Pret', 'produse', 'produse_fabricate', 'vitrina', 'stoc', 'iesire', 1, 1, 'globala', 'PVModificarePret', 0, 0, 'Cantitatea vanduta'),
(7, 'Raport de Vanzare', 'produse', 'produse_comercializate', 'vitrina', 'stoc', 'iesire', 1, 1, 'globala', 'RaportVanzare', 0, 0, 'Cantitatea vanduta'),
(8, 'Raport Productie', 'produse', 'produse_fabricate', 'spatiu_productie', 'catalog', 'intrare', 1, 1, 'globala', 'RaportProductie', 0, 0, 'Cantitatea produsa'),
(9, 'Raport de Expediere Marfa', 'produse', 'produse_comercializate', 'spatiu_productie', 'catalog', 'iesire', 1, 1, 'globala', 'RaExMarfa', 0, 0, 'Cantitatea expediata'),
(10, 'Receptie Retururi', 'produse', 'produse_fabricate', 'spatiu_productie', 'catalog', 'raport', 1, 1, 'globala', 'ReceptieRetururi', 0, 0, 'Cantitatea primita'),
(11, 'Corectie', 'produse', 'produse_document', '0', '0', 'corectie', 1, 1, '0', '0', 0, 0, '0');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `document_coloane`
--

CREATE TABLE `document_coloane` (
  `document_id` int(11) NOT NULL,
  `catalog_denumire` varchar(5) DEFAULT NULL,
  `catalog_item_id` varchar(5) DEFAULT NULL,
  `individual_item_id` varchar(5) DEFAULT NULL,
  `cantitate` varchar(25) DEFAULT NULL,
  `explicatie` varchar(5) DEFAULT NULL,
  `ora` varchar(5) DEFAULT NULL,
  `document_item_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `document_coloane`
--

INSERT INTO `document_coloane` (`document_id`, `catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `explicatie`, `ora`, `document_item_id`) VALUES
(1, 'TEXT', 'INT', 'INT', 'DECIMAL(10,3)', '0', '0', '0'),
(2, 'TEXT', 'INT', 'INT', 'DECIMAL(10,3)', '0', 'TIME', '0'),
(3, 'TEXT', 'INT', 'INT', 'DECIMAL(10,3)', 'TEXT', '0', '0'),
(4, 'TEXT', 'INT', 'INT', 'DECIMAL(10,3)', '0', '0', '0'),
(5, 'TEXT', 'INT', 'INT', 'DECIMAL(10,3)', '0', 'TIME', '0'),
(6, 'TEXT', 'INT', 'INT', 'DECIMAL(10,3)', '0', '0', '0'),
(7, 'TEXT', 'INT', 'INT', 'DECIMAL(10,3)', '0', 'TIME', '0'),
(8, 'TEXT', 'INT', '0', 'DECIMAL(10,3)', '0', '0', '0'),
(9, 'TEXT', 'INT', '0', 'DECIMAL(10,3)', '0', 'TIME', '0'),
(10, 'TEXT', 'INT', '0', 'DECIMAL(10,3)', '0', '0', '0'),
(11, 'TEXT', 'INT', 'INT', 'DECIMAL(10,3)', 'TEXT', 'TIME', 'INT');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `istoric`
--

CREATE TABLE `istoric` (
  `id` int(11) NOT NULL,
  `document_id` varchar(255) DEFAULT NULL,
  `denumire` varchar(255) DEFAULT NULL,
  `numar` varchar(255) DEFAULT NULL,
  `serie` varchar(255) DEFAULT NULL,
  `istoric_id_document_atasat` varchar(255) DEFAULT NULL,
  `informatii` varchar(255) DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL,
  `ora` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `departament` varchar(255) DEFAULT NULL,
  `locatie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `istoric`
--

INSERT INTO `istoric` (`id`, `document_id`, `denumire`, `numar`, `serie`, `istoric_id_document_atasat`, `informatii`, `data`, `ora`, `username`, `departament`, `locatie`) VALUES
(91, '1', 'ListaDeInventariere_Nr1_20171112_Selgros_Iasi', '1', NULL, '0', '0', '2017-11-12', '10:50:40', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(92, '11', 'Corectie_ListaDeInventariere_Nr1_20171112_Selgros_Iasi', '1', NULL, '91', '0', '2017-11-12', '10:51:34', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(93, '2', 'NotaDeReceptie_Nr1_20171112_Selgros_Iasi', '1', NULL, '0', '0', '2017-11-12', '11:17:34', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(94, '7', 'RaportVanzare_Nr1_20171112_Selgros_Iasi', '1', NULL, '0', '0', '2017-11-12', '11:30:22', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(95, '6', 'PVModificarePret_Nr1_20171112_Selgros_Iasi', '1', NULL, '0', '0', '2017-11-12', '11:57:17', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(96, '3', 'PVDeteriorare_Nr1_20171112_Selgros_Iasi', '1', NULL, '0', '0', '2017-11-12', '12:00:40', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(97, '11', 'Corectie_PVDeteriorare_Nr1_20171112_Selgros_Iasi', '1', NULL, '96', '0', '2017-11-12', '12:08:33', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(98, '4', 'PVProtocol_Nr1_20171112_Selgros_Iasi', '1', NULL, '0', 'Director', '2017-11-12', '12:11:37', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(99, '4', 'PVProtocol_Nr2_20171112_Selgros_Iasi', '2', NULL, '0', 'Bogdan', '2017-11-12', '12:12:59', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(100, '11', 'Corectie_PVProtocol_Nr2_20171112_Selgros_Iasi', '1', NULL, '99', 'Bogdan', '2017-11-12', '13:04:18', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(104, '9', 'RaExMarfa_Nr1_20171112_Laborator_Tudor_Neculai', '1', NULL, '0', '0', '2017-11-12', '19:24:06', 'oana', 'Productie', 'Laborator_Tudor_Neculai'),
(106, '11', 'Corectie_RaExMarfa_Nr1_20171112_Laborator_Tudor_Neculai', '1', NULL, '104', '0', '2017-11-12', '19:29:07', 'oana', 'Productie', 'Laborator_Tudor_Neculai'),
(108, '1', 'ListaDeInventariere_Nr3_20171114_Selgros_Iasi', '3', NULL, '0', '0', '2017-11-14', '18:12:18', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(109, '1', 'ListaDeInventariere_Nr2_20171113_Selgros_Iasi', '2', NULL, '0', '0', '2017-11-13', '18:12:18', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(110, '2', 'NotaDeReceptie_Nr2_20171114_Selgros_Iasi', '2', NULL, '0', '0', '2017-11-14', '23:27:30', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(111, '7', 'RaportVanzare_Nr2_20171114_Selgros_Iasi', '2', NULL, '0', '0', '2017-11-14', '23:27:39', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(113, '2', 'NotaDeReceptie_Nr3_20171115_Selgros_Iasi', '3', NULL, '0', '0', '2017-11-15', '02:03:11', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(114, '11', 'Corectie_ListaDeInventariere_Nr4_20171115_Selgros_Iasi', '1', NULL, '112', '0', '2017-11-15', '02:17:49', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(115, '3', 'PVDeteriorare_Nr1_20171115_Selgros_Iasi', '1', NULL, '0', '0', '2017-11-15', '18:09:47', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(116, '11', 'Corectie_PVDeteriorare_Nr1_20171115_Selgros_Iasi', '1', NULL, '115', '0', '2017-11-15', '18:17:45', 'iuliana', 'Vanzari', 'Selgros_Iasi'),
(117, '9', 'RaExMarfa_Nr2_20171115_Laborator_Tudor_Neculai', '2', NULL, '0', '0', '2017-11-15', '18:49:40', 'oana', 'Productie', 'Laborator_Tudor_Neculai'),
(118, '8', 'RaportProductie_Nr1_20171115_Laborator_Tudor_Neculai', '1', NULL, '0', '0', '2017-11-15', '18:50:07', 'oana', 'Productie', 'Laborator_Tudor_Neculai'),
(119, '10', 'ReceptieRetururi_Nr1_20171115_Laborator_Tudor_Neculai', '1', NULL, '0', '0', '2017-11-15', '18:50:16', 'oana', 'Productie', 'Laborator_Tudor_Neculai'),
(120, '11', 'Corectie_RaExMarfa_Nr2_20171115_Laborator_Tudor_Neculai', '1', NULL, '117', '0', '2017-11-15', '18:50:25', 'oana', 'Productie', 'Laborator_Tudor_Neculai'),
(121, '11', 'Corectie_ReceptieRetururi_Nr1_20171115_Laborator_Tudor_Neculai', '1', NULL, '119', '0', '2017-11-15', '18:50:39', 'oana', 'Productie', 'Laborator_Tudor_Neculai'),
(122, '1', 'ListaDeInventariere_Nr4_20171115_Selgros_Iasi', '4', NULL, '0', '0', '2017-11-15', '19:44:05', 'iuliana', 'Vanzari', 'Selgros_Iasi');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `item_evidenta_individuala`
--

CREATE TABLE `item_evidenta_individuala` (
  `id` int(11) NOT NULL,
  `catalog_denumire` text,
  `catalog_item_id` text,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `item_evidenta_individuala`
--

INSERT INTO `item_evidenta_individuala` (`id`, `catalog_denumire`, `catalog_item_id`, `data`) VALUES
(80, 'produs_fabricat', '58', '2017-11-12'),
(81, 'produs_fabricat', '58', '2017-11-12'),
(82, 'produs_fabricat', '61', '2017-11-12'),
(83, 'produs_fabricat', '60', '2017-11-12'),
(84, 'produs_fabricat', '60', '2017-11-12'),
(85, 'produs_fabricat', '59', '2017-11-12'),
(86, 'produs_fabricat', '73', '2017-11-12'),
(87, 'produs_fabricat', '74', '2017-11-12'),
(88, 'produs_fabricat', '58', '2017-11-14'),
(89, 'produs_fabricat', '58', '2017-11-14'),
(90, 'produs_fabricat', '58', '2017-11-15'),
(91, 'produs_fabricat', '74', '2017-11-15'),
(92, 'produs_fabricat', '58', '2017-11-15');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `listadeinventariere_nr1_20171112_selgros_iasi`
--

CREATE TABLE `listadeinventariere_nr1_20171112_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `listadeinventariere_nr1_20171112_selgros_iasi`
--

INSERT INTO `listadeinventariere_nr1_20171112_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `id`) VALUES
('produs_fabricat', 1, 0, '15.000', 1),
('produs_fabricat', 27, 0, '12.000', 2),
('produs_fabricat', 35, 0, '2.700', 3),
('produs_fabricat', 71, 0, '4.300', 4),
('produs_fabricat', 58, 80, '2.600', 5),
('produs_fabricat', 58, 81, '1.700', 6),
('produs_fabricat', 61, 82, '3.200', 7),
('produs_fabricat', 60, 83, '2.700', 8),
('produs_fabricat', 60, 84, '3.900', 9),
('ambalaj', 1, 0, '7.000', 10),
('ambalaj', 2, 0, '6.000', 11);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `listadeinventariere_nr2_20171113_selgros_iasi`
--

CREATE TABLE `listadeinventariere_nr2_20171113_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `listadeinventariere_nr2_20171113_selgros_iasi`
--

INSERT INTO `listadeinventariere_nr2_20171113_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `id`) VALUES
('produs_fabricat', 1, 0, '10.000', 1),
('produs_fabricat', 37, 0, '2.300', 2),
('produs_fabricat', 58, 88, '1.600', 3),
('ambalaj', 1, 0, '1.000', 4);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `listadeinventariere_nr2_20171114_selgros_iasi`
--

CREATE TABLE `listadeinventariere_nr2_20171114_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `listadeinventariere_nr2_20171114_selgros_iasi`
--

INSERT INTO `listadeinventariere_nr2_20171114_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `id`) VALUES
('produs_fabricat', 1, 0, '10.000', 1),
('produs_fabricat', 37, 0, '2.300', 2),
('produs_fabricat', 58, 88, '1.600', 3),
('ambalaj', 1, 0, '1.000', 4);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `listadeinventariere_nr3_20171114_selgros_iasi`
--

CREATE TABLE `listadeinventariere_nr3_20171114_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `listadeinventariere_nr3_20171114_selgros_iasi`
--

INSERT INTO `listadeinventariere_nr3_20171114_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `id`) VALUES
('produs_fabricat', 1, 0, '10.000', 1),
('produs_fabricat', 37, 0, '2.300', 2),
('produs_fabricat', 58, 88, '1.600', 3),
('ambalaj', 1, 0, '1.000', 4);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `listadeinventariere_nr4_20171115_selgros_iasi`
--

CREATE TABLE `listadeinventariere_nr4_20171115_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `listadeinventariere_nr4_20171115_selgros_iasi`
--

INSERT INTO `listadeinventariere_nr4_20171115_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `id`) VALUES
('produs_fabricat', 1, 0, '5.000', 1),
('produs_fabricat', 5, 0, '3.000', 2);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `notadereceptie_nr1_20171112_selgros_iasi`
--

CREATE TABLE `notadereceptie_nr1_20171112_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `ora` time DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `notadereceptie_nr1_20171112_selgros_iasi`
--

INSERT INTO `notadereceptie_nr1_20171112_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `ora`, `id`) VALUES
('produs_fabricat', 1, 0, '10.000', '11:17:34', 1),
('produs_fabricat', 6, 0, '24.000', '11:17:34', 2),
('produs_fabricat', 2, 0, '3.650', '11:17:34', 3),
('produs_fabricat', 71, 0, '2.120', '11:17:34', 4),
('produs_fabricat', 73, 86, '1.860', '11:17:34', 5),
('ambalaj', 1, 0, '4.000', '11:17:34', 6),
('produs_fabricat', 74, 87, '3.950', '11:28:25', 7);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `notadereceptie_nr2_20171114_selgros_iasi`
--

CREATE TABLE `notadereceptie_nr2_20171114_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `ora` time DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `notadereceptie_nr2_20171114_selgros_iasi`
--

INSERT INTO `notadereceptie_nr2_20171114_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `ora`, `id`) VALUES
('produs_fabricat', 1, 0, '10.000', '23:27:30', 1),
('produs_fabricat', 6, 0, '5.000', '23:27:30', 2),
('produs_fabricat', 18, 0, '4.000', '23:27:30', 3),
('produs_fabricat', 29, 0, '2.000', '23:27:30', 4),
('produs_fabricat', 51, 0, '2.100', '23:27:30', 5),
('produs_fabricat', 58, 89, '2.300', '23:27:30', 6),
('ambalaj', 1, 0, '1.000', '23:27:30', 7);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `notadereceptie_nr3_20171115_selgros_iasi`
--

CREATE TABLE `notadereceptie_nr3_20171115_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `ora` time DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `notadereceptie_nr3_20171115_selgros_iasi`
--

INSERT INTO `notadereceptie_nr3_20171115_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `ora`, `id`) VALUES
('produs_fabricat', 1, 0, '4.000', '02:03:11', 1),
('produs_fabricat', 1, 0, '4.000', '02:03:19', 2),
('produs_fabricat', 5, 0, '4.000', '18:10:32', 3),
('produs_fabricat', 6, 0, '2.000', '18:11:30', 4),
('produs_fabricat', 18, 0, '2.000', '18:13:31', 5),
('produs_fabricat', 58, 90, '1.200', '18:14:22', 6),
('produs_fabricat', 74, 91, '2.000', '18:14:55', 7),
('produs_fabricat', 1, 0, '2.000', '18:15:49', 8);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `produs_fabricat`
--

CREATE TABLE `produs_fabricat` (
  `id` int(11) NOT NULL,
  `denumire` varchar(45) DEFAULT NULL,
  `um` varchar(5) DEFAULT NULL,
  `pret` decimal(12,2) DEFAULT NULL,
  `categorie_denumire` varchar(25) DEFAULT NULL,
  `creator` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `produs_fabricat`
--

INSERT INTO `produs_fabricat` (`id`, `denumire`, `um`, `pret`, `categorie_denumire`, `creator`) VALUES
(1, 'Amandine', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(2, 'Alba Ca Zapada', 'KG', '45.00', 'Miniprajitura', 'bogdan'),
(3, 'Moltisanti', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(4, 'Fursec Caise', 'KG', '45.00', 'Fursec', 'bogdan'),
(5, 'Boema', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(6, 'Branzoaice', 'BUC', '4.00', 'Traditional', 'bogdan'),
(7, 'Briose', 'BUC', '4.00', 'Prajitura', 'bogdan'),
(8, 'Bucuresti', 'BUC', '6.00', 'Prajitura', 'bogdan'),
(9, 'Choux A La Crème Cu Frisca Naturala', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(10, 'Choux A La Crème Cu Frisca Vegetala', 'BUC', '4.00', 'Prajitura', 'bogdan'),
(11, 'Ciocolata De Casa', 'KG', '50.00', 'Miniprajitura', 'bogdan'),
(12, 'Ciocolatina', 'BUC', '5.99', 'Prajitura', 'bogdan'),
(13, 'Priconuci', 'KG', '55.00', 'Fursec', 'bogdan'),
(14, 'Corn Cu Mere', 'BUC', '5.00', 'Patiserie', 'bogdan'),
(15, 'Cozonac', 'KG', '30.00', 'Traditional', 'bogdan'),
(16, 'Cremsnit', 'BUC', '5.99', 'Prajitura', 'bogdan'),
(17, 'Daenerys', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(18, 'Diplomat Cu Frisca Naturala', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(19, 'Diplomat Cu Frisca Vegetala', 'BUC', '4.00', 'Prajitura', 'bogdan'),
(20, 'Dobos', 'BUC', '6.50', 'Prajitura', 'bogdan'),
(21, 'Duo Mouse', 'BUC', '5.99', 'Prajitura', 'bogdan'),
(22, 'Ecler', 'BUC', '7.00', 'Prajitura', 'bogdan'),
(23, 'Emiliane', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(24, 'Ferdinand', 'BUC', '5.50', 'Prajitura', 'bogdan'),
(25, 'Fursec Cocos', 'KG', '45.00', 'Fursec', 'bogdan'),
(26, 'Kinder', 'BUC', '6.50', 'Prajitura', 'bogdan'),
(27, 'Lemon', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(28, 'Minieclere', 'KG', '50.00', 'Miniprajitura', 'bogdan'),
(29, 'Fursec Tofee', 'KG', '45.00', 'Fursec', 'bogdan'),
(30, 'Fursec Cicocolata', 'KG', '45.00', 'Fursec', 'bogdan'),
(31, 'Minipateuri Cu Ciuperci', 'KG', '45.00', 'Patiserie', 'bogdan'),
(32, 'Minipateuri Cu Telemea ', 'KG', '45.00', 'Patiserie', 'bogdan'),
(33, 'Minipateuri Cu Spanac', 'KG', '45.00', 'Patiserie', 'bogdan'),
(34, 'Ecler', 'BUC', '6.00', 'Prajitura', 'bogdan'),
(35, 'Miniprajituri', 'KG', '45.00', 'Miniprajitura', 'bogdan'),
(36, 'Padurea Neagra', 'BUC', '7.99', 'Prajitura', 'bogdan'),
(37, 'Paleuri', 'KG', '45.00', 'Fursec', 'bogdan'),
(38, 'Panacota', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(39, 'Cornulete Rahat', 'KG', '35.00', 'Fursec', 'bogdan'),
(40, 'Pasca Cu Ciocolata', 'KG', '50.00', 'Traditional', 'bogdan'),
(41, 'Pasca Cu Smantana', 'KG', '45.00', 'Traditional', 'bogdan'),
(42, 'Pasca Traditionala', 'KG', '45.00', 'Traditional', 'bogdan'),
(43, 'Placinta Cu Mere', 'BUC', '4.00', 'Patiserie', 'bogdan'),
(44, 'Prajitura De Post Cu Ciocolata', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(45, 'Prajitura Diet', 'KG', '50.00', 'Dietetic', 'bogdan'),
(46, 'Praline', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(47, 'Profiterol', 'BUC', '10.00', 'Prajitura', 'bogdan'),
(48, 'Rulada Ciocolata', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(49, 'Rulada Ciocolata Belgiana', 'BUC', '8.00', 'Prajitura', 'bogdan'),
(50, 'Salueri Cascaval', 'KG', '45.00', 'Patiserie', 'bogdan'),
(51, 'Saleuri Simple', 'KG', '35.00', 'Patiserie', 'bogdan'),
(52, 'Saratele Nesarate', 'KG', '45.00', 'Dietetic', 'bogdan'),
(53, 'Savarina Cu Frisca Naturala', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(54, 'Savarine Cu Frisca Vegetala', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(55, 'Tarta Cu Fructe', 'BUC', '4.99', 'Prajitura', 'bogdan'),
(56, 'Tarta Cu Iaurt', 'KG', '35.00', 'Patiserie', 'bogdan'),
(57, 'Trois Chocolate', 'BUC', '6.99', 'Prajitura', 'bogdan'),
(58, 'Tort Amandina', 'KG', '50.00', 'Tort', 'bogdan'),
(59, 'Tort Ciocolata', 'KG', '65.00', 'Tort', 'bogdan'),
(60, 'Tort Diplomat', 'KG', '50.00', 'Tort', 'bogdan'),
(61, 'Tort Ferdinand', 'KG', '55.00', 'Tort', 'bogdan'),
(62, 'Mousse Cu Alune De Padure', 'BUC', '8.00', 'Prajitura', 'bogdan'),
(63, 'Mousse Cu Ciocolata Alba Si Caise', 'BUC', '8.00', 'Prajitura', 'bogdan'),
(64, 'Mousse Cu Cicocolata Cu Lapte', 'BUC', '8.00', 'Prajitura', 'bogdan'),
(65, 'Mousse Exotic', 'BUC', '7.00', 'Prajitura', 'bogdan'),
(66, 'Mousse Fistic', 'BUC', '7.00', 'Prajitura', 'bogdan'),
(67, 'Fursec Cafea', 'KG', '55.00', 'Fursec', 'bogdan'),
(68, 'Fursec Lamaie', 'KG', '55.00', 'Fursec', 'bogdan'),
(69, 'Fursec Caramel', 'KG', '55.00', 'Fursec', 'bogdan'),
(70, 'Fursec Menta', 'KG', '55.00', 'Fursec', 'bogdan'),
(71, 'Piersicute', 'KG', '55.00', 'Fursec', 'bogdan'),
(72, 'Tort Panacota', 'KG', '55.00', 'Tort', 'bogdan'),
(73, 'Tort Ciocolata', 'KG', '60.00', 'Tort', 'bogdan'),
(74, 'Tort Martipan', 'KG', '70.00', 'Tort', 'bogdan'),
(75, 'Figurina', 'BUC', '15.00', 'Figurina', 'bogdan'),
(76, 'Figurina', 'BUC', '20.00', 'Figurina', 'bogdan'),
(77, 'Figurina', 'BUC', '25.00', 'Figurina', 'bogdan'),
(78, 'Figurina', 'BUC', '30.00', 'Figurina', 'bogdan'),
(79, 'Fursecuri Seminte ', 'KG', '50.00', 'Fursec', 'bogdan'),
(80, 'Miniprajituri Premium', 'KG', '50.00', 'Miniprajitura', 'bogdan'),
(81, 'test', 'BUC', '55.00', 'Prajitura', 'iuliana'),
(82, 'test2', 'BUC', '3.00', 'Prajitura', 'iuliana'),
(83, 'test4', 'BUC', '4.00', 'Prajitura', 'iuliana'),
(84, 'test5', 'BUC', '3.00', 'Prajitura', 'marina');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `produs_fabricat_categorie`
--

CREATE TABLE `produs_fabricat_categorie` (
  `denumire` varchar(25) NOT NULL,
  `importanta` int(11) NOT NULL,
  `grupare` varchar(12) DEFAULT NULL,
  `evidenta` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `produs_fabricat_categorie`
--

INSERT INTO `produs_fabricat_categorie` (`denumire`, `importanta`, `grupare`, `evidenta`) VALUES
('Dietetic', 6, 'comuna', 'colectiva'),
('Figurina', 8, 'comuna', 'colectiva'),
('Fursec', 3, 'comuna', 'colectiva'),
('Miniprajitura', 4, 'comuna', 'colectiva'),
('Patiserie', 2, 'comuna', 'colectiva'),
('Prajitura', 1, 'comuna', 'colectiva'),
('Tort', 7, 'separata', 'individuala'),
('Traditional', 5, 'comuna', 'colectiva');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `pvdeteriorare_nr1_20171112_selgros_iasi`
--

CREATE TABLE `pvdeteriorare_nr1_20171112_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `explicatie` text,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `pvdeteriorare_nr1_20171112_selgros_iasi`
--

INSERT INTO `pvdeteriorare_nr1_20171112_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `explicatie`, `id`) VALUES
('produs_fabricat', 27, 0, '6.000', '', 1),
('produs_fabricat', 35, 0, '1.200', '', 2);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `pvdeteriorare_nr1_20171115_selgros_iasi`
--

CREATE TABLE `pvdeteriorare_nr1_20171115_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `explicatie` text,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `pvdeteriorare_nr1_20171115_selgros_iasi`
--

INSERT INTO `pvdeteriorare_nr1_20171115_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `explicatie`, `id`) VALUES
('produs_fabricat', 1, 0, '3.000', '', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `pvmodificarepret_nr1_20171112_selgros_iasi`
--

CREATE TABLE `pvmodificarepret_nr1_20171112_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `pvmodificarepret_nr1_20171112_selgros_iasi`
--

INSERT INTO `pvmodificarepret_nr1_20171112_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `id`) VALUES
('produs_fabricat', 1, 0, '1.000', 1),
('produs_fabricat', 6, 0, '1.000', 2),
('produs_fabricat', 73, 86, '0.400', 3);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `pvprotocol_nr1_20171112_selgros_iasi`
--

CREATE TABLE `pvprotocol_nr1_20171112_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `pvprotocol_nr1_20171112_selgros_iasi`
--

INSERT INTO `pvprotocol_nr1_20171112_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `id`) VALUES
('produs_fabricat', 2, 0, '1.150', 1),
('produs_fabricat', 59, 85, '2.450', 2),
('ambalaj', 1, 0, '1.000', 3),
('ambalaj', 2, 0, '1.000', 4);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `pvprotocol_nr2_20171112_selgros_iasi`
--

CREATE TABLE `pvprotocol_nr2_20171112_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `pvprotocol_nr2_20171112_selgros_iasi`
--

INSERT INTO `pvprotocol_nr2_20171112_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `id`) VALUES
('produs_fabricat', 71, 0, '1.300', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `raexmarfa_nr1_20171112_laborator_tudor_neculai`
--

CREATE TABLE `raexmarfa_nr1_20171112_laborator_tudor_neculai` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `ora` time DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `raexmarfa_nr1_20171112_laborator_tudor_neculai`
--

INSERT INTO `raexmarfa_nr1_20171112_laborator_tudor_neculai` (`catalog_denumire`, `catalog_item_id`, `cantitate`, `ora`, `id`) VALUES
('produs_fabricat', 1, '4.000', '19:24:06', 1),
('produs_fabricat', 1, '5.000', '01:56:31', 2);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `raexmarfa_nr2_20171115_laborator_tudor_neculai`
--

CREATE TABLE `raexmarfa_nr2_20171115_laborator_tudor_neculai` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `ora` time DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `raexmarfa_nr2_20171115_laborator_tudor_neculai`
--

INSERT INTO `raexmarfa_nr2_20171115_laborator_tudor_neculai` (`catalog_denumire`, `catalog_item_id`, `cantitate`, `ora`, `id`) VALUES
('produs_fabricat', 58, '2.000', '18:49:40', 1),
('produs_fabricat', 1, '4.000', '18:49:54', 2);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `raportproductie_nr1_20171115_laborator_tudor_neculai`
--

CREATE TABLE `raportproductie_nr1_20171115_laborator_tudor_neculai` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `raportproductie_nr1_20171115_laborator_tudor_neculai`
--

INSERT INTO `raportproductie_nr1_20171115_laborator_tudor_neculai` (`catalog_denumire`, `catalog_item_id`, `cantitate`, `id`) VALUES
('produs_fabricat', 1, '3.000', 1),
('produs_fabricat', 12, '5.000', 2),
('produs_fabricat', 1, '2.000', 3),
('produs_fabricat', 22, '5.000', 4);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `raportvanzare_nr1_20171112_selgros_iasi`
--

CREATE TABLE `raportvanzare_nr1_20171112_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `ora` time DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `raportvanzare_nr1_20171112_selgros_iasi`
--

INSERT INTO `raportvanzare_nr1_20171112_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `ora`, `id`) VALUES
('produs_fabricat', 1, 0, '10.000', '11:30:22', 1),
('produs_fabricat', 58, 80, '2.600', '11:30:22', 2),
('produs_fabricat', 6, 0, '10.000', '11:55:47', 3),
('produs_fabricat', 27, 0, '6.000', '11:55:47', 4),
('produs_fabricat', 2, 0, '2.500', '11:55:47', 5),
('produs_fabricat', 73, 86, '1.300', '11:55:47', 6),
('produs_fabricat', 74, 87, '3.950', '11:55:47', 7),
('ambalaj', 2, 0, '3.000', '11:55:47', 8);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `raportvanzare_nr2_20171114_selgros_iasi`
--

CREATE TABLE `raportvanzare_nr2_20171114_selgros_iasi` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `individual_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `ora` time DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `raportvanzare_nr2_20171114_selgros_iasi`
--

INSERT INTO `raportvanzare_nr2_20171114_selgros_iasi` (`catalog_denumire`, `catalog_item_id`, `individual_item_id`, `cantitate`, `ora`, `id`) VALUES
('produs_fabricat', 1, 0, '2.000', '23:27:39', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `receptieretururi_nr1_20171115_laborator_tudor_neculai`
--

CREATE TABLE `receptieretururi_nr1_20171115_laborator_tudor_neculai` (
  `catalog_denumire` text,
  `catalog_item_id` int(11) DEFAULT NULL,
  `cantitate` decimal(10,3) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `receptieretururi_nr1_20171115_laborator_tudor_neculai`
--

INSERT INTO `receptieretururi_nr1_20171115_laborator_tudor_neculai` (`catalog_denumire`, `catalog_item_id`, `cantitate`, `id`) VALUES
('produs_fabricat', 1, '1.000', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `role`
--

CREATE TABLE `role` (
  `id` varchar(12) NOT NULL,
  `departament` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `role`
--

INSERT INTO `role` (`id`, `departament`) VALUES
('ceo', 'Management'),
('cofetar', 'Productie'),
('contabila', 'Contabilitate'),
('gestionar', 'Vanzari'),
('patiser', 'Productie'),
('sofer', 'Transport'),
('suport', 'IT');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(12) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'marina', '2b69ae5b95c5fe54685d81e3c53cc56a'),
(2, 'bogdan', 'bogd'),
(3, 'iuliana', '7d3769f7dec1e0c4430bcc33f6d53309'),
(4, 'camelia', 'came'),
(5, 'dana', 'dana'),
(6, 'oana', '3ccd0b9fe71b7ed40005fd623ece5435'),
(7, 'mioara', 'mior'),
(8, 'rally', 'rally'),
(9, 'ecenta_ceo', '5f55aa2d992a227f11147ba85bab1eeb'),
(10, 'ecenta_pro', '5f55aa2d992a227f11147ba85bab1eeb'),
(11, 'ecenta_van', '5f55aa2d992a227f11147ba85bab1eeb');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `user_locatie`
--

CREATE TABLE `user_locatie` (
  `user_id` int(11) NOT NULL,
  `locatie_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `user_locatie`
--

INSERT INTO `user_locatie` (`user_id`, `locatie_id`) VALUES
(1, NULL),
(2, NULL),
(3, 'Selgros_Iasi'),
(4, 'Selgros_Iasi'),
(5, NULL),
(6, 'Laborator_Tudor_Neculai'),
(7, 'Laborator_Tudor_Neculai'),
(8, NULL),
(9, NULL),
(10, 'Laborator_Tudor_Neculai'),
(11, 'Selgros_Iasi');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `user_program`
--

CREATE TABLE `user_program` (
  `data` date NOT NULL,
  `Selgros_Iasi` varchar(12) DEFAULT NULL,
  `Laborator_Tudor_Neculai` varchar(12) DEFAULT NULL,
  `Transport` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `user_program`
--

INSERT INTO `user_program` (`data`, `Selgros_Iasi`, `Laborator_Tudor_Neculai`, `Transport`) VALUES
('2017-11-15', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-16', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-17', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-18', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-19', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-20', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-21', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-22', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-23', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-24', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-25', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-26', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-27', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-28', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-29', 'ecenta_van', 'ecenta_pro', NULL),
('2017-11-30', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-01', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-02', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-03', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-04', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-05', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-06', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-07', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-08', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-09', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-10', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-11', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-12', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-13', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-14', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-15', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-16', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-17', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-18', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-19', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-20', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-21', 'ecenta_van', 'ecenta_pro', NULL),
('2017-12-22', 'ecenta_van', 'ecenta_pro', NULL);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `user_role`
--

CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(1, 'ceo'),
(2, 'suport'),
(3, 'gestionar'),
(4, 'gestionar'),
(5, 'contabila'),
(6, 'cofetar'),
(7, 'cofetar'),
(8, 'sofer'),
(9, 'ceo'),
(10, 'cofetar'),
(11, 'gestionar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambalaj`
--
ALTER TABLE `ambalaj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pret_index` (`pret`);

--
-- Indexes for table `ambalaj_categorie`
--
ALTER TABLE `ambalaj_categorie`
  ADD PRIMARY KEY (`denumire`),
  ADD KEY `importanta_index` (`importanta`);

--
-- Indexes for table `corectie_listadeinventariere_nr1_20171112_selgros_iasi`
--
ALTER TABLE `corectie_listadeinventariere_nr1_20171112_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corectie_listadeinventariere_nr4_20171115_selgros_iasi`
--
ALTER TABLE `corectie_listadeinventariere_nr4_20171115_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corectie_pvdeteriorare_nr1_20171112_selgros_iasi`
--
ALTER TABLE `corectie_pvdeteriorare_nr1_20171112_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corectie_pvdeteriorare_nr1_20171115_selgros_iasi`
--
ALTER TABLE `corectie_pvdeteriorare_nr1_20171115_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corectie_pvprotocol_nr2_20171112_selgros_iasi`
--
ALTER TABLE `corectie_pvprotocol_nr2_20171112_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corectie_raexmarfa_nr1_20171112_laborator_tudor_neculai`
--
ALTER TABLE `corectie_raexmarfa_nr1_20171112_laborator_tudor_neculai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corectie_raexmarfa_nr2_20171115_laborator_tudor_neculai`
--
ALTER TABLE `corectie_raexmarfa_nr2_20171115_laborator_tudor_neculai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corectie_receptieretururi_nr1_20171115_laborator_tudor_neculai`
--
ALTER TABLE `corectie_receptieretururi_nr1_20171115_laborator_tudor_neculai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departament`
--
ALTER TABLE `departament`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locatie_necesara_index` (`locatie_necesara`),
  ADD KEY `program_necesar_index` (`program_necesar`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numar_limitat_index` (`numar_limitat`),
  ADD KEY `deschis_index` (`deschis`),
  ADD KEY `informatii_index` (`informatii`),
  ADD KEY `descriere_index` (`descriere`);

--
-- Indexes for table `document_coloane`
--
ALTER TABLE `document_coloane`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `istoric`
--
ALTER TABLE `istoric`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_evidenta_individuala`
--
ALTER TABLE `item_evidenta_individuala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listadeinventariere_nr1_20171112_selgros_iasi`
--
ALTER TABLE `listadeinventariere_nr1_20171112_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listadeinventariere_nr2_20171113_selgros_iasi`
--
ALTER TABLE `listadeinventariere_nr2_20171113_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listadeinventariere_nr2_20171114_selgros_iasi`
--
ALTER TABLE `listadeinventariere_nr2_20171114_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listadeinventariere_nr3_20171114_selgros_iasi`
--
ALTER TABLE `listadeinventariere_nr3_20171114_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listadeinventariere_nr4_20171115_selgros_iasi`
--
ALTER TABLE `listadeinventariere_nr4_20171115_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notadereceptie_nr1_20171112_selgros_iasi`
--
ALTER TABLE `notadereceptie_nr1_20171112_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notadereceptie_nr2_20171114_selgros_iasi`
--
ALTER TABLE `notadereceptie_nr2_20171114_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notadereceptie_nr3_20171115_selgros_iasi`
--
ALTER TABLE `notadereceptie_nr3_20171115_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produs_fabricat`
--
ALTER TABLE `produs_fabricat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produs_fabricat_categorie`
--
ALTER TABLE `produs_fabricat_categorie`
  ADD PRIMARY KEY (`denumire`),
  ADD KEY `importanta_index` (`importanta`);

--
-- Indexes for table `pvdeteriorare_nr1_20171112_selgros_iasi`
--
ALTER TABLE `pvdeteriorare_nr1_20171112_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pvdeteriorare_nr1_20171115_selgros_iasi`
--
ALTER TABLE `pvdeteriorare_nr1_20171115_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pvmodificarepret_nr1_20171112_selgros_iasi`
--
ALTER TABLE `pvmodificarepret_nr1_20171112_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pvprotocol_nr1_20171112_selgros_iasi`
--
ALTER TABLE `pvprotocol_nr1_20171112_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pvprotocol_nr2_20171112_selgros_iasi`
--
ALTER TABLE `pvprotocol_nr2_20171112_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raexmarfa_nr1_20171112_laborator_tudor_neculai`
--
ALTER TABLE `raexmarfa_nr1_20171112_laborator_tudor_neculai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raexmarfa_nr2_20171115_laborator_tudor_neculai`
--
ALTER TABLE `raexmarfa_nr2_20171115_laborator_tudor_neculai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raportproductie_nr1_20171115_laborator_tudor_neculai`
--
ALTER TABLE `raportproductie_nr1_20171115_laborator_tudor_neculai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raportvanzare_nr1_20171112_selgros_iasi`
--
ALTER TABLE `raportvanzare_nr1_20171112_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raportvanzare_nr2_20171114_selgros_iasi`
--
ALTER TABLE `raportvanzare_nr2_20171114_selgros_iasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptieretururi_nr1_20171115_laborator_tudor_neculai`
--
ALTER TABLE `receptieretururi_nr1_20171115_laborator_tudor_neculai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_locatie`
--
ALTER TABLE `user_locatie`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_program`
--
ALTER TABLE `user_program`
  ADD PRIMARY KEY (`data`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `corectie_listadeinventariere_nr1_20171112_selgros_iasi`
--
ALTER TABLE `corectie_listadeinventariere_nr1_20171112_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `corectie_listadeinventariere_nr4_20171115_selgros_iasi`
--
ALTER TABLE `corectie_listadeinventariere_nr4_20171115_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `corectie_pvdeteriorare_nr1_20171112_selgros_iasi`
--
ALTER TABLE `corectie_pvdeteriorare_nr1_20171112_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `corectie_pvdeteriorare_nr1_20171115_selgros_iasi`
--
ALTER TABLE `corectie_pvdeteriorare_nr1_20171115_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `corectie_pvprotocol_nr2_20171112_selgros_iasi`
--
ALTER TABLE `corectie_pvprotocol_nr2_20171112_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `corectie_raexmarfa_nr1_20171112_laborator_tudor_neculai`
--
ALTER TABLE `corectie_raexmarfa_nr1_20171112_laborator_tudor_neculai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `corectie_raexmarfa_nr2_20171115_laborator_tudor_neculai`
--
ALTER TABLE `corectie_raexmarfa_nr2_20171115_laborator_tudor_neculai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `corectie_receptieretururi_nr1_20171115_laborator_tudor_neculai`
--
ALTER TABLE `corectie_receptieretururi_nr1_20171115_laborator_tudor_neculai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `istoric`
--
ALTER TABLE `istoric`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `item_evidenta_individuala`
--
ALTER TABLE `item_evidenta_individuala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `listadeinventariere_nr1_20171112_selgros_iasi`
--
ALTER TABLE `listadeinventariere_nr1_20171112_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `listadeinventariere_nr2_20171113_selgros_iasi`
--
ALTER TABLE `listadeinventariere_nr2_20171113_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `listadeinventariere_nr2_20171114_selgros_iasi`
--
ALTER TABLE `listadeinventariere_nr2_20171114_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `listadeinventariere_nr3_20171114_selgros_iasi`
--
ALTER TABLE `listadeinventariere_nr3_20171114_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `listadeinventariere_nr4_20171115_selgros_iasi`
--
ALTER TABLE `listadeinventariere_nr4_20171115_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notadereceptie_nr1_20171112_selgros_iasi`
--
ALTER TABLE `notadereceptie_nr1_20171112_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `notadereceptie_nr2_20171114_selgros_iasi`
--
ALTER TABLE `notadereceptie_nr2_20171114_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `notadereceptie_nr3_20171115_selgros_iasi`
--
ALTER TABLE `notadereceptie_nr3_20171115_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `produs_fabricat`
--
ALTER TABLE `produs_fabricat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `pvdeteriorare_nr1_20171112_selgros_iasi`
--
ALTER TABLE `pvdeteriorare_nr1_20171112_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pvdeteriorare_nr1_20171115_selgros_iasi`
--
ALTER TABLE `pvdeteriorare_nr1_20171115_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pvmodificarepret_nr1_20171112_selgros_iasi`
--
ALTER TABLE `pvmodificarepret_nr1_20171112_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pvprotocol_nr1_20171112_selgros_iasi`
--
ALTER TABLE `pvprotocol_nr1_20171112_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pvprotocol_nr2_20171112_selgros_iasi`
--
ALTER TABLE `pvprotocol_nr2_20171112_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `raexmarfa_nr1_20171112_laborator_tudor_neculai`
--
ALTER TABLE `raexmarfa_nr1_20171112_laborator_tudor_neculai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `raexmarfa_nr2_20171115_laborator_tudor_neculai`
--
ALTER TABLE `raexmarfa_nr2_20171115_laborator_tudor_neculai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `raportproductie_nr1_20171115_laborator_tudor_neculai`
--
ALTER TABLE `raportproductie_nr1_20171115_laborator_tudor_neculai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `raportvanzare_nr1_20171112_selgros_iasi`
--
ALTER TABLE `raportvanzare_nr1_20171112_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `raportvanzare_nr2_20171114_selgros_iasi`
--
ALTER TABLE `raportvanzare_nr2_20171114_selgros_iasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `receptieretururi_nr1_20171115_laborator_tudor_neculai`
--
ALTER TABLE `receptieretururi_nr1_20171115_laborator_tudor_neculai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
