-- Active: 1677862045305@@127.0.0.1@3306@form_in_php
-- import to SQLite by running: sqlite3.exe db.sqlite3 -init sqlite.sql
PRAGMA journal_mode = MEMORY;
PRAGMA synchronous = OFF;
PRAGMA foreign_keys = OFF;
PRAGMA ignore_check_constraints = OFF;
PRAGMA auto_vacuum = NONE;
PRAGMA secure_delete = OFF;
BEGIN TRANSACTION;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
DROP TABLE IF EXISTS `provincia`;

CREATE TABLE `provincia` (
`provincia_id` INTEGER NOT NULL,
`nome` TEXT NOT NULL,
`sigla` char(2) NOT NULL,
`regione_id` INTEGER DEFAULT NULL
);
INSERT INTO `provincia` (`provincia_id`, `nome`, `sigla`, `regione_id`) VALUES
(1, 'Agrigento', 'AG', 15),
(2, 'Alessandria', 'AL', 12),
(3, 'Ancona', 'AN', 10),
(4, 'Arezzo', 'AR', 16),
(5, 'Ascoli Piceno', 'AP', 10),
(6, 'Asti', 'AT', 12),
(7, 'Avellino', 'AV', 4),
(8, 'Bari', 'BA', 13),
(9, 'Barletta-Andria-Trani', 'BT', 13),
(10, 'Belluno', 'BL', 20),
(11, 'Benevento', 'BN', 4),
(12, 'Bergamo', 'BG', 9),
(13, 'Biella', 'BI', 12),
(14, 'Bologna', 'BO', 5),
(15, 'Bolzano/Bozen', 'BZ', 17),
(16, 'Brescia', 'BS', 9),
(17, 'Brindisi', 'BR', 13),
(18, 'Cagliari', 'CA', 14),
(19, 'Caltanissetta', 'CL', 15),
(20, 'Campobasso', 'CB', 11),
(21, 'Carbonia-Iglesias', 'CI', 14),
(22, 'Caserta', 'CE', 4),
(23, 'Catania', 'CT', 15),
(24, 'Catanzaro', 'CZ', 3),
(25, 'Chieti', 'CH', 1),
(26, 'Como', 'CO', 9),
(27, 'Cosenza', 'CS', 3),
(28, 'Cremona', 'CR', 9),
(29, 'Crotone', 'KR', 3),
(30, 'Cuneo', 'CN', 12),
(31, 'Enna', 'EN', 15),
(32, 'Fermo', 'FM', 10),
(33, 'Ferrara', 'FE', 5),
(34, 'Firenze', 'FI', 16),
(35, 'Foggia', 'FG', 13),
(36, 'Forlì-Cesena', 'FC', 5),
(37, 'Frosinone', 'FR', 7),
(38, 'Genova', 'GE', 8),
(39, 'Gorizia', 'GO', 6),
(40, 'Grosseto', 'GR', 16),
(41, 'Imperia', 'IM', 8),
(42, 'Isernia', 'IS', 11),
(43, 'L''Aquila', 'AQ', 1),
(44, 'La Spezia', 'SP', 8),
(45, 'Latina', 'LT', 7),
(46, 'Lecce', 'LE', 13),
(47, 'Lecco', 'LC', 9),
(48, 'Livorno', 'LI', 16),
(49, 'Lodi', 'LO', 9),
(50, 'Lucca', 'LU', 16),
(51, 'Macerata', 'MC', 10),
(52, 'Mantova', 'MN', 9),
(53, 'Massa-Carrara', 'MS', 16),
(54, 'Matera', 'MT', 2),
(55, 'Medio Campidano', 'VS', 14),
(56, 'Messina', 'ME', 15),
(57, 'Milano', 'MI', 9),
(58, 'Modena', 'MO', 5),
(59, 'Monza e della Brianza', 'MB', 9),
(60, 'Napoli', 'NA', 4),
(61, 'Novara', 'NO', 12),
(62, 'Nuoro', 'NU', 14),
(63, 'Ogliastra', 'OG', 14),
(64, 'Olbia-Tempio', 'OT', 14),
(65, 'Oristano', 'OR', 14),
(66, 'Padova', 'PD', 20),
(67, 'Palermo', 'PA', 15),
(68, 'Parma', 'PR', 5),
(69, 'Pavia', 'PV', 9),
(70, 'Perugia', 'PG', 18),
(71, 'Pesaro e Urbino', 'PU', 10),
(72, 'Pescara', 'PE', 1),
(73, 'Piacenza', 'PC', 5),
(74, 'Pisa', 'PI', 16),
(75, 'Pistoia', 'PT', 16),
(76, 'Pordenone', 'PN', 6),
(77, 'Potenza', 'PZ', 2),
(78, 'Prato', 'PO', 16),
(79, 'Ragusa', 'RG', 15),
(80, 'Ravenna', 'RA', 5),
(81, 'Reggio di Calabria', 'RC', 3),
(82, 'Reggio nell''Emilia', 'RE', 5),
(83, 'Rieti', 'RI', 7),
(84, 'Rimini', 'RN', 5),
(85, 'Roma', 'RM', 7),
(86, 'Rovigo', 'RO', 20),
(87, 'Salerno', 'SA', 4),
(88, 'Sassari', 'SS', 14),
(89, 'Savona', 'SV', 8),
(90, 'Siena', 'SI', 16),
(91, 'Siracusa', 'SR', 15),
(92, 'Sondrio', 'SO', 9),
(93, 'Taranto', 'TA', 13),
(94, 'Teramo', 'TE', 1),
(95, 'Terni', 'TR', 18),
(96, 'Torino', 'TO', 12),
(97, 'Trapani', 'TP', 15),
(98, 'Trento', 'TN', 17),
(99, 'Treviso', 'TV', 20),
(100, 'Trieste', 'TS', 6),
(101, 'Udine', 'UD', 6),
(102, 'Valle d''Aosta/Vallée d''Aoste', 'AO', 19),
(103, 'Varese', 'VA', 9),
(104, 'Venezia', 'VE', 20),
(105, 'Verbano-Cusio-Ossola', 'VB', 12),
(106, 'Vercelli', 'VC', 12),
(107, 'Verona', 'VR', 20),
(108, 'Vibo Valentia', 'VV', 3),
(109, 'Vicenza', 'VI', 20),
(110, 'Viterbo', 'VT', 7);
DROP TABLE IF EXISTS `regione`;

CREATE TABLE `regione` (
`regione_id` INTEGER NOT NULL,
`nome` TEXT NOT NULL
);
INSERT INTO `regione` (`regione_id`, `nome`) VALUES
(1, 'Abruzzo'),
(2, 'Basilicata'),
(3, 'Calabria'),
(4, 'Campania'),
(5, 'Emilia-Romagna'),
(6, 'Friuli-Venezia Giulia'),
(7, 'Lazio'),
(8, 'Liguria'),
(9, 'Lombardia'),
(10, 'Marche'),
(11, 'Molise'),
(12, 'Piemonte'),
(13, 'Puglia'),
(14, 'Sardegna'),
(15, 'Sicilia'),
(16, 'Toscana'),
(17, 'Trentino-Alto Adige/Südtirol'),
(18, 'Umbria'),
(19, 'Valle d''Aosta/Vallée d''Aoste'),
(20, 'Veneto');
DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
`user_id` INTEGER PRIMARY KEY,
`first_name` TEXT NOT NULL,
`last_name` TEXT NOT NULL,
`birthday` date NOT NULL,
`birth_city` TEXT NOT NULL,
`regione_id` INTEGER NOT NULL,
`provincia_id` INTEGER NOT NULL,
`gender` TEXT  NOT NULL,
`username` TEXT NOT NULL,
`password` TEXT NOT NULL
);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `birthday`, `birth_city`, `regione_id`, `provincia_id`, `gender`, `username`, `password`) VALUES
(9, 'Maria', 'Rossi', '2020-04-17', 'sfdsf', 15, 15, 'F', '@b.itdfdfsg', 'segretissimo'),
(15, 'Giuseppe', 'Verdi', '2017-03-17', 'sfdsf', 16, 15, 'M', 'giuseppe@xcvxc', 'a3ea3259dd51c5d28ac011a8dbf78e79'),
(19, 'Davide', 'Esliano', '2013-03-17', 'sfdsf', 20, 18, 'M', 'xzczxcxzczxcz', 'a3ea3259dd51c5d28ac011a8dbf78e79'),
(20, 'mario', 'Prosperini', '2000-03-12', 'sfdsf', 18, 17, 'M', 'wadaswdfasdf asfa', 'a3ea3259dd51c5d28ac011a8dbf78e79'),
(21, 'Massimo', 'Rivola', '1999-03-01', 'sdfdsfs', 18, 17, 'M', 'a@b.it', 'a3ea3259dd51c5d28ac011a8dbf78e79'),
(23, 'Marco', 'Belli', '1984-01-11', 'sfdsf', 2, 1, 'M', 'b@b.it', 'a3ea3259dd51c5d28ac011a8dbf78e79');
ALTER TABLE `provincia`
ADD PRIMARY KEY (`provincia_id`);
ALTER TABLE `regione`
ADD PRIMARY KEY (`regione_id`);
ALTER TABLE `user`
ADD PRIMARY KEY (`user_id`),
ADD UNIQUE KEY `username` (`username`),
ADD UNIQUE KEY `username_2` (`username`),
ADD UNIQUE KEY `username_3` (`username`),
ADD UNIQUE KEY `username_4` (`username`),
ADD UNIQUE KEY `username_5` (`username`),
ADD UNIQUE KEY `username_6` (`username`),
ADD UNIQUE KEY `username_7` (`username`),
ADD UNIQUE KEY `username_8` (`username`),
ADD UNIQUE KEY `username_9` (`username`),
ADD UNIQUE KEY `username_10` (`username`),
ADD UNIQUE KEY `username_11` (`username`),
ADD UNIQUE KEY `username_12` (`username`),
ADD UNIQUE KEY `username_13` (`username`),
ADD UNIQUE KEY `username_14` (`username`);
ALTER TABLE `provincia`
MODIFY `provincia_id` INTEGER NOT NULL , =111;
ALTER TABLE `regione`
MODIFY `regione_id` INTEGER NOT NULL , =21;
ALTER TABLE `user`
MODIFY `user_id` INTEGER NOT NULL , =25;
COMMIT;





COMMIT;
PRAGMA ignore_check_constraints = ON;
PRAGMA foreign_keys = ON;
PRAGMA journal_mode = WAL;
PRAGMA synchronous = NORMAL;