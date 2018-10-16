-- -----------------------------------------------------
-- Data for table `SZOK`.`KategorieWiekowe`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`KategorieWiekowe` (`id`, `nazwa`, `usunieto`) VALUES (1, 'N/A', NULL);
INSERT INTO `SZOK`.`KategorieWiekowe` (`id`, `nazwa`, `usunieto`) VALUES (2, '7+', NULL);
INSERT INTO `SZOK`.`KategorieWiekowe` (`id`, `nazwa`, `usunieto`) VALUES (3, '12+', NULL);
INSERT INTO `SZOK`.`KategorieWiekowe` (`id`, `nazwa`, `usunieto`) VALUES (4, '15+', NULL);
INSERT INTO `SZOK`.`KategorieWiekowe` (`id`, `nazwa`, `usunieto`) VALUES (5, '18+', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Filmy`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Filmy` (`id`, `tytul`, `opis`, `dataPremiery`, `czasTrwania`, `czasReklam`, `plakat`, `zwiastun`, `KategorieWiekowe_id`) VALUES (1, 'Avatar', 'ridiculus sociis sed mus nibh ligula Lorem sociis mauris tempus inceptos senectus Quisque adipiscing pharetra a quis senectus non nostra', '2012-12-21', 155, 25, NULL, NULL, 1);
INSERT INTO `SZOK`.`Filmy` (`id`, `tytul`, `opis`, `dataPremiery`, `czasTrwania`, `czasReklam`, `plakat`, `zwiastun`, `KategorieWiekowe_id`) VALUES (2, 'Ciacho', 'accumsan Suspendisse aliquet feugiat placerat purus torquent pharetra torquent erat in Praesent torquent senectus molestie sapien Quisque ullamcorper Mauris ligula ornare ullamcorper Vestibulum', '2014-06-18', 221, 23, NULL, NULL, 2);

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
INSERT INTO `SZOK`.`WydarzeniaSpecjalne` (`id`, `nazwa`, `usunieto`) VALUES (2, 'Lejdis Najt', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`TypySeansow`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`TypySeansow` (`id`, `nazwa`, `usunieto`) VALUES (1, '2D Napisy', NULL);
INSERT INTO `SZOK`.`TypySeansow` (`id`, `nazwa`, `usunieto`) VALUES (2, '3D Napisy', NULL);
INSERT INTO `SZOK`.`TypySeansow` (`id`, `nazwa`, `usunieto`) VALUES (3, '2D Dubbing', NULL);
INSERT INTO `SZOK`.`TypySeansow` (`id`, `nazwa`, `usunieto`) VALUES (4, '3D Dubbing', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Sale`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Sale` (`id`, `numerSali`, `dlugoscSali`, `szerokoscSali`) VALUES (1, '1', 5, 2);
INSERT INTO `SZOK`.`Sale` (`id`, `numerSali`, `dlugoscSali`, `szerokoscSali`) VALUES (2, '2', 6, 2);

-- -----------------------------------------------------
-- Data for table `SZOK`.`PuleBiletow`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`PuleBiletow` (`id`, `nazwa`, `usunieto`) VALUES (1, 'Zwykłe 2d', NULL);
INSERT INTO `SZOK`.`PuleBiletow` (`id`, `nazwa`, `usunieto`) VALUES (2, 'Zwykłe 3d', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Seanse`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Seanse` (`id`, `poczatekSeansu`, `czyOdwolany`, `TypySeansow_id`, `Sale_id`, `PuleBiletow_id`, `WydarzeniaSpecjalne_id`) VALUES (1, '2018-03-21 18:30', NULL, 1, 1, 1, NULL);
INSERT INTO `SZOK`.`Seanse` (`id`, `poczatekSeansu`, `czyOdwolany`, `TypySeansow_id`, `Sale_id`, `PuleBiletow_id`, `WydarzeniaSpecjalne_id`) VALUES (2, '2018-03-21 21:45', NULL, 2, 1, 2, NULL);
INSERT INTO `SZOK`.`Seanse` (`id`, `poczatekSeansu`, `czyOdwolany`, `TypySeansow_id`, `Sale_id`, `PuleBiletow_id`, `WydarzeniaSpecjalne_id`) VALUES (3, '2018-03-22 18:30', NULL, 1, 2, 1, 1);
INSERT INTO `SZOK`.`Seanse` (`id`, `poczatekSeansu`, `czyOdwolany`, `TypySeansow_id`, `Sale_id`, `PuleBiletow_id`, `WydarzeniaSpecjalne_id`) VALUES (4, '2018-03-22 21:45', NULL, 3, 1, 1, NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`RodzajeBiletow`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`RodzajeBiletow` (`id`, `nazwa`, `usunieto`) VALUES (1, 'Normalny', NULL);
INSERT INTO `SZOK`.`RodzajeBiletow` (`id`, `nazwa`, `usunieto`) VALUES (2, 'Ulgowy', NULL);
INSERT INTO `SZOK`.`RodzajeBiletow` (`id`, `nazwa`, `usunieto`) VALUES (3, 'Studencki', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Uzytkownicy`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Uzytkownicy` (`id`, `login`, `haslo`, `imie`, `nazwisko`, `telefon`, `email`, `dataRejestracji`, `czyKobieta`, `czyZablowoany`) VALUES (1, 'user1', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Przemyslaw', 'Suszek', '666888777', 'przemyslaw21@gmail.com', '2018-05-20', 0, NULL);
INSERT INTO `SZOK`.`Uzytkownicy` (`id`, `login`, `haslo`, `imie`, `nazwisko`, `telefon`, `email`, `dataRejestracji`, `czyKobieta`, `czyZablowoany`) VALUES (2, 'user2', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Aleksandra', 'Kowalska', '333222555', 'kowalska51@wp.pl', '2018-04-12', 1, NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Role`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Role` (`id`, `nazwa`, `usunieto`) VALUES (1, 'Administrator', NULL);
INSERT INTO `SZOK`.`Role` (`id`, `nazwa`, `usunieto`) VALUES (2, 'Kierownik', NULL);
INSERT INTO `SZOK`.`Role` (`id`, `nazwa`, `usunieto`) VALUES (3, 'Pracownik', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Pracownicy`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Pracownicy` (`id`, `login`, `haslo`, `imie`, `nazwisko`, `telefon`, `email`, `Role_id`, `ostatniaAktualizacja`) VALUES (1, 'admin', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Jan', 'Admin', '123456789', 'admin@qwe.ew', 1, NULL);
INSERT INTO `SZOK`.`Pracownicy` (`id`, `login`, `haslo`, `imie`, `nazwisko`, `telefon`, `email`, `Role_id`, `ostatniaAktualizacja`) VALUES (2, 'kierwonik', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Mateusz', 'Mazurek', '112233445', 'kie@qwe.asd', 2, NULL);
INSERT INTO `SZOK`.`Pracownicy` (`id`, `login`, `haslo`, `imie`, `nazwisko`, `telefon`, `email`, `Role_id`, `ostatniaAktualizacja`) VALUES (3, 'pracownik', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Filip', 'Kowalski', '123142134', '223asd@ada.das', 3, NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`TypyRzedow`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`TypyRzedow` (`id`, `nazwa`, `usunieto`) VALUES (1, 'zwykle', NULL);
INSERT INTO `SZOK`.`TypyRzedow` (`id`, `nazwa`, `usunieto`) VALUES (2, 'tylko do kupna', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Rzedy`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Rzedy` (`id`, `numerRzedu`, `Sale_id`, `TypyRzedow_id`) VALUES (1, 1, 1, 1);
INSERT INTO `SZOK`.`Rzedy` (`id`, `numerRzedu`, `Sale_id`, `TypyRzedow_id`) VALUES (2, 2, 1, 1);
INSERT INTO `SZOK`.`Rzedy` (`id`, `numerRzedu`, `Sale_id`, `TypyRzedow_id`) VALUES (3, 1, 2, 2);
INSERT INTO `SZOK`.`Rzedy` (`id`, `numerRzedu`, `Sale_id`, `TypyRzedow_id`) VALUES (4, 2, 2, 1);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Miejsca`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (1, 1, 1, 1);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (2, 2, 2, 1);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (3, 3, 0, 1);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (4, 4, 3, 1);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (5, 5, 4, 1);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (6, 1, 1, 2);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (7, 2, 2, 2);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (8, 3, 0, 2);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (9, 4, 3, 2);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (10, 5, 4, 2);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (11, 1, 1, 3);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (12, 2, 2, 3);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (13, 3, 3, 3);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (14, 4, 0, 3);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (15, 5, 4, 3);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (16, 6, 5, 3);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (17, 1, 1, 4);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (18, 2, 2, 4);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (19, 3, 3, 4);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (20, 4, 0, 4);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (21, 5, 4, 4);
INSERT INTO `SZOK`.`Miejsca` (`id`, `pozycja`, `numerMiejsca`, `Rzedy_id`) VALUES (22, 6, 5, 4);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Promocje`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Promocje` (`id`, `nazwa`, `czyKwotowa`, `wartosc`, `poczatekPromocji`, `koniecPromocji`, `czyKobieta`, `staz`) VALUES (1, 'Promocja 1', 0, 10, '2018-01-01', '2018-12-31', NULL , NULL);
INSERT INTO `SZOK`.`Promocje` (`id`, `nazwa`, `czyKwotowa`, `wartosc`, `poczatekPromocji`, `koniecPromocji`, `czyKobieta`, `staz`) VALUES (2, 'Promocja 2', 0, 15, '2018-05-01', '2018-06-30', 1, NULL);
INSERT INTO `SZOK`.`Promocje` (`id`, `nazwa`, `czyKwotowa`, `wartosc`, `poczatekPromocji`, `koniecPromocji`, `czyKobieta`, `staz`) VALUES (3, 'Promocja 3', 1, 10.00, '2018-03-01', '2018-09-30', NULL, '2018-01-12');

-- -----------------------------------------------------
-- Data for table `SZOK`.`Vouchery`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Vouchery` (`id`, `czyKwotowa`, `wartosc`, `poczatekPromocji`, `koniecPromocji`, `losoweCyfry`, `cyfraKontrolna`, `czasWygenerowania`, `czyWykorzystanyy`) VALUES (1, 1, 10, '2018-05-28', '2018-09-30', 273, 1, '2018-05-28 08:21:03', NULL);
INSERT INTO `SZOK`.`Vouchery` (`id`, `czyKwotowa`, `wartosc`, `poczatekPromocji`, `koniecPromocji`, `losoweCyfry`, `cyfraKontrolna`, `czasWygenerowania`, `czyWykorzystanyy`) VALUES (2, 0, 20, '2018-01-30', '2020-01-31', 785, 6, '2018-05-28 08:22:17', NULL);
INSERT INTO `SZOK`.`Vouchery` (`id`, `czyKwotowa`, `wartosc`, `poczatekPromocji`, `koniecPromocji`, `losoweCyfry`, `cyfraKontrolna`, `czasWygenerowania`, `czyWykorzystanyy`) VALUES (3, 0, 100, '2018-01-01', '2018-06-01', 913, 9, '2018-05-28 09:21:43', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Rezerwacje`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Rezerwacje` (`id`, `imie`, `nazwisko`, `telefon`, `email`, `czyOdwiedzajacy`, `sfinalizowana`, `Seanse_id`, `Uzytkownicy_id`, `Pracownicy_id`) VALUES (1, 'Piotr', 'Kupicha', '111222333', 'pkupicha@test.test', 1, 0, 1, NULL, 3);
INSERT INTO `SZOK`.`Rezerwacje` (`id`, `imie`, `nazwisko`, `telefon`, `email`, `czyOdwiedzajacy`, `sfinalizowana`, `Seanse_id`, `Uzytkownicy_id`, `Pracownicy_id`) VALUES (2, 'Przemyslaw', 'Suszek', '666888777', 'przemyslaw21@gmail.com', DEFAULT, 1, 1, 1, NULL);
INSERT INTO `SZOK`.`Rezerwacje` (`id`, `imie`, `nazwisko`, `telefon`, `email`, `czyOdwiedzajacy`, `sfinalizowana`, `Seanse_id`, `Uzytkownicy_id`, `Pracownicy_id`) VALUES (3, 'Piotr', 'Ochalski', '999888777', 'pochalski@test.test', 2, 0, 2, NULL, NULL);
INSERT INTO `SZOK`.`Rezerwacje` (`id`, `imie`, `nazwisko`, `telefon`, `email`, `czyOdwiedzajacy`, `sfinalizowana`, `Seanse_id`, `Uzytkownicy_id`, `Pracownicy_id`) VALUES (4, 'Aleksandra', 'Kowalska', '333222555', 'kowalska51@wp.pl', DEFAULT, 0, 3, 2, NULL);
INSERT INTO `SZOK`.`Rezerwacje` (`id`, `imie`, `nazwisko`, `telefon`, `email`, `czyOdwiedzajacy`, `sfinalizowana`, `Seanse_id`, `Uzytkownicy_id`, `Pracownicy_id`) VALUES (5, 'Przemysław', 'Suszek', '666888777', 'przemyslaw21@gmail.com', DEFAULT, 0, 4, 1, NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`RodzajePlatnosci`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`RodzajePlatnosci` (`id`, `nazwa`, `usunieto`) VALUES (1, 'Karta', NULL);
INSERT INTO `SZOK`.`RodzajePlatnosci` (`id`, `nazwa`, `usunieto`) VALUES (2, 'Gotówka', NULL);
INSERT INTO `SZOK`.`RodzajePlatnosci` (`id`, `nazwa`, `usunieto`) VALUES (3, 'Przelew', NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Tranzakcje`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Tranzakcje` (`id`, `data`, `czyOdwiedzajacy`, `RodzajePlatnosci_id`, `Seanse_id`, `Uzytkownicy_id`, `Pracownicy_id`, `Promocje_id`) VALUES (1, '2018-05-22', DEFAULT, 1, 1, 1, 3, NULL);
INSERT INTO `SZOK`.`Tranzakcje` (`id`, `data`, `czyOdwiedzajacy`, `RodzajePlatnosci_id`, `Seanse_id`, `Uzytkownicy_id`, `Pracownicy_id`, `Promocje_id`) VALUES (2, '2018-05-15', DEFAULT, 2, 2, NULL, 3, 1);
INSERT INTO `SZOK`.`Tranzakcje` (`id`, `data`, `czyOdwiedzajacy`, `RodzajePlatnosci_id`, `Seanse_id`, `Uzytkownicy_id`, `Pracownicy_id`, `Promocje_id`) VALUES (3, '2018-05-20', DEFAULT, 3, 3, 2, NULL, NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Film_ma_RodzajeFilmow`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Film_ma_RodzajeFilmow` (`Filmy_id`, `RodzajeFilmow_id`) VALUES (1, 1);
INSERT INTO `SZOK`.`Film_ma_RodzajeFilmow` (`Filmy_id`, `RodzajeFilmow_id`) VALUES (1, 3);
INSERT INTO `SZOK`.`Film_ma_RodzajeFilmow` (`Filmy_id`, `RodzajeFilmow_id`) VALUES (2, 3);
INSERT INTO `SZOK`.`Film_ma_RodzajeFilmow` (`Filmy_id`, `RodzajeFilmow_id`) VALUES (2, 5);

-- -----------------------------------------------------
-- Data for table `SZOK`.`PulaBiletow_ma_RodzajeBiletow`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (1, 1, 30.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (1, 2, 25.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (1, 3, 22.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (2, 1, 40.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (2, 2, 35.00);
INSERT INTO `SZOK`.`PulaBiletow_ma_RodzajeBiletow` (`PuleBiletow_id`, `RodzajeBiletow_id`, `cena`) VALUES (2, 3, 32.00);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Bilety`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Bilety` (`id`, `cena`, `losoweCyfry`, `cyfraKontrolna`, `Tranzakcje_id`, `RodzajeBiletow_id`, `Miejsca_id`, `Vouchery_id`, `czyWykorzystany`, `czyAnulowany`) VALUES (1, 30.00, 785, 5, 1, 1, 1, NULL, NULL, NULL);
INSERT INTO `SZOK`.`Bilety` (`id`, `cena`, `losoweCyfry`, `cyfraKontrolna`, `Tranzakcje_id`, `RodzajeBiletow_id`, `Miejsca_id`, `Vouchery_id`, `czyWykorzystany`, `czyAnulowany`) VALUES (2, 25.00, 291, 7, 1, 1, 2, NULL, NULL, NULL);
INSERT INTO `SZOK`.`Bilety` (`id`, `cena`, `losoweCyfry`, `cyfraKontrolna`, `Tranzakcje_id`, `RodzajeBiletow_id`, `Miejsca_id`, `Vouchery_id`, `czyWykorzystany`, `czyAnulowany`) VALUES (3, 22.00, 453, 2, 2, 3, 7, NULL, NULL, NULL);
INSERT INTO `SZOK`.`Bilety` (`id`, `cena`, `losoweCyfry`, `cyfraKontrolna`, `Tranzakcje_id`, `RodzajeBiletow_id`, `Miejsca_id`, `Vouchery_id`, `czyWykorzystany`, `czyAnulowany`) VALUES (4, 0.00, 218, 3, 3, 2, 13, 3, NULL, NULL);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Rezerwacja_ma_Miejsca`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Rezerwacja_ma_Miejsca` (`Rezerwacje_id`, `Miejsca_id`) VALUES (1, 6);
INSERT INTO `SZOK`.`Rezerwacja_ma_Miejsca` (`Rezerwacje_id`, `Miejsca_id`) VALUES (1, 5);
INSERT INTO `SZOK`.`Rezerwacja_ma_Miejsca` (`Rezerwacje_id`, `Miejsca_id`) VALUES (2, 1);
INSERT INTO `SZOK`.`Rezerwacja_ma_Miejsca` (`Rezerwacje_id`, `Miejsca_id`) VALUES (3, 7);
INSERT INTO `SZOK`.`Rezerwacja_ma_Miejsca` (`Rezerwacje_id`, `Miejsca_id`) VALUES (4, 13);
INSERT INTO `SZOK`.`Rezerwacja_ma_Miejsca` (`Rezerwacje_id`, `Miejsca_id`) VALUES (5, 11);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Seans_ma_Filmy`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Seans_ma_Filmy` (`Seanse_id`, `Filmy_id`, `kolejnosc`) VALUES (1, 1, DEFAULT);
INSERT INTO `SZOK`.`Seans_ma_Filmy` (`Seanse_id`, `Filmy_id`, `kolejnosc`) VALUES (2, 2, DEFAULT);
INSERT INTO `SZOK`.`Seans_ma_Filmy` (`Seanse_id`, `Filmy_id`, `kolejnosc`) VALUES (3, 1, DEFAULT);
INSERT INTO `SZOK`.`Seans_ma_Filmy` (`Seanse_id`, `Filmy_id`, `kolejnosc`) VALUES (3, 2, DEFAULT);
INSERT INTO `SZOK`.`Seans_ma_Filmy` (`Seanse_id`, `Filmy_id`, `kolejnosc`) VALUES (4, 1, DEFAULT);

-- -----------------------------------------------------
-- Data for table `SZOK`.`Film_ma_TypySeansow`
-- -----------------------------------------------------
INSERT INTO `SZOK`.`Film_ma_TypySeansow` (`Filmy_id`, `TypySeansow_id`) VALUES (1, 1);
INSERT INTO `SZOK`.`Film_ma_TypySeansow` (`Filmy_id`, `TypySeansow_id`) VALUES (1, 2);
INSERT INTO `SZOK`.`Film_ma_TypySeansow` (`Filmy_id`, `TypySeansow_id`) VALUES (1, 3);
INSERT INTO `SZOK`.`Film_ma_TypySeansow` (`Filmy_id`, `TypySeansow_id`) VALUES (1, 4);
INSERT INTO `SZOK`.`Film_ma_TypySeansow` (`Filmy_id`, `TypySeansow_id`) VALUES (2, 3);
