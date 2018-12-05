-- -----------------------------------------------------
-- Data for table `SZOK`.`KategorieWiekowe`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`KategorieWiekowe` (`id`, `nazwa`, `usunieto`) VALUES (1, 'N/A', NULL);
INSERT INTO `SZOK`.`KategorieWiekowe` (`id`, `nazwa`, `usunieto`) VALUES (2, '7+', NULL);
INSERT INTO `SZOK`.`KategorieWiekowe` (`id`, `nazwa`, `usunieto`) VALUES (3, '12+', NULL);
INSERT INTO `SZOK`.`KategorieWiekowe` (`id`, `nazwa`, `usunieto`) VALUES (4, '15+', NULL);
INSERT INTO `SZOK`.`KategorieWiekowe` (`id`, `nazwa`, `usunieto`) VALUES (5, '18+', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`RodzajeFilmow`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (1, 'Film akcji', NULL);
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (2, 'Przygodowy', NULL);
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (3, 'Sci-Fi', NULL);
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (4, 'Fantasy', NULL);
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (5, 'Komedia', NULL);
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (6, 'Romans', NULL);
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (7, 'Horror', NULL);
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (8, 'Thriller', NULL);
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (9, 'Dramat', NULL);
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (10, 'Film animowany', NULL);
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (11, 'Film biograficzny', NULL);
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (12, 'Film historyczny', NULL);
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (13, 'Western', NULL);
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (14, 'Musical', NULL);
INSERT INTO `SZOK`.`RodzajeFilmow` (`id`, `nazwa`, `usunieto`) VALUES (15, 'Film dokumentalny', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`WydarzeniaSpecjalne`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`WydarzeniaSpecjalne` (`id`, `nazwa`, `usunieto`) VALUES (1, 'Maraton', NULL);
INSERT INTO `SZOK`.`WydarzeniaSpecjalne` (`id`, `nazwa`, `usunieto`) VALUES (2, 'Lejdis Night', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`TypySeansow`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`TypySeansow` (`id`, `nazwa`, `usunieto`) VALUES (1, '2D Napisy', NULL);
INSERT INTO `SZOK`.`TypySeansow` (`id`, `nazwa`, `usunieto`) VALUES (2, '3D Napisy', NULL);
INSERT INTO `SZOK`.`TypySeansow` (`id`, `nazwa`, `usunieto`) VALUES (3, '2D Dubbing', NULL);
INSERT INTO `SZOK`.`TypySeansow` (`id`, `nazwa`, `usunieto`) VALUES (4, '3D Dubbing', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`RodzajeBiletow`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`RodzajeBiletow` (`id`, `nazwa`, `usunieto`) VALUES (1, 'Normalny', NULL);
INSERT INTO `SZOK`.`RodzajeBiletow` (`id`, `nazwa`, `usunieto`) VALUES (2, 'Ulgowy', NULL);
INSERT INTO `SZOK`.`RodzajeBiletow` (`id`, `nazwa`, `usunieto`) VALUES (3, 'Studencki', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Role`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Role` (`id`, `nazwa`, `usunieto`) VALUES (1, 'Administrator', NULL);
INSERT INTO `SZOK`.`Role` (`id`, `nazwa`, `usunieto`) VALUES (2, 'Kierownik', NULL);
INSERT INTO `SZOK`.`Role` (`id`, `nazwa`, `usunieto`) VALUES (3, 'Pracownik', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`TypyRzedow`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`TypyRzedow` (`id`, `nazwa`, `usunieto`) VALUES (1, 'zwykle', NULL);
INSERT INTO `SZOK`.`TypyRzedow` (`id`, `nazwa`, `usunieto`) VALUES (2, 'tylko do kupna', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`RodzajePlatnosci`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`RodzajePlatnosci` (`id`, `nazwa`, `usunieto`) VALUES (1, 'Karta płatnicza', NULL);
INSERT INTO `SZOK`.`RodzajePlatnosci` (`id`, `nazwa`, `usunieto`) VALUES (2, 'Gotówka', NULL);
INSERT INTO `SZOK`.`RodzajePlatnosci` (`id`, `nazwa`, `usunieto`) VALUES (3, 'Przelew', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`PuleBiletow`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`PuleBiletow` (`id`, `nazwa`, `usunieto`) VALUES (1, 'Zwykłe 2d', NULL);
INSERT INTO `SZOK`.`PuleBiletow` (`id`, `nazwa`, `usunieto`) VALUES (2, 'Zwykłe 3d', NULL);
INSERT INTO `SZOK`.`PuleBiletow` (`id`, `nazwa`, `usunieto`) VALUES (3, 'Weekend 2d', NULL);
INSERT INTO `SZOK`.`PuleBiletow` (`id`, `nazwa`, `usunieto`) VALUES (4, 'Weekend 3d', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`PulaBiletow_ma_RodzajeBiletow`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`id`, `PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (1, 1, 1, 20.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`id`, `PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (2, 1, 2, 17.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`id`, `PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (3, 1, 3, 15.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`id`, `PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (4, 2, 1, 30.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`id`, `PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (5, 2, 2, 25.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`id`, `PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (6, 2, 3, 20.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`id`, `PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (7, 3, 1, 25.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`id`, `PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (8, 3, 2, 22.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`id`, `PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (9, 3, 3, 19.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`id`, `PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (10, 4, 1, 35.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`id`, `PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (11, 4, 2, 30.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`id`, `PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (12, 4, 3, 27.00);
