--
-- Zrzut danych tabeli `kategoriewiekowe`
--

INSERT INTO `kategoriewiekowe` (`id`, `nazwa`, `usunieto`) VALUES
(1, 'N/A', NULL),
(2, '7+', NULL),
(3, '12+', NULL),
(4, '15+', NULL),
(5, '18+', NULL);

--
-- Zrzut danych tabeli `rodzajeplatnosci`
--

INSERT INTO `rodzajeplatnosci` (`id`, `nazwa`, `usunieto`) VALUES
(1, 'Karta', NULL),
(2, 'Gotówka', NULL);

--
-- Zrzut danych tabeli `role`
--

INSERT INTO `role` (`id`, `nazwa`, `usunieto`) VALUES
(1, 'Administrator', NULL),
(2, 'Kierownik', NULL),
(3, 'Pracownik', NULL);

--
-- Zrzut danych tabeli `typyrzedow`
--

INSERT INTO `typyrzedow` (`id`, `nazwa`, `usunieto`) VALUES
(1, 'zwykle', NULL),
(2, 'tylko do kupna', NULL);

--
-- Zrzut danych tabeli `typyseansow`
--

INSERT INTO `typyseansow` (`id`, `nazwa`, `usunieto`) VALUES
(1, '2D Napisy', NULL),
(2, '3D Napisy', NULL),
(3, '2D Dubbing', NULL),
(4, '3D Dubbing', NULL);

--
-- Zrzut danych tabeli `rodzajebiletow`
--

INSERT INTO `rodzajebiletow` (`id`, `nazwa`, `usunieto`) VALUES
(1, 'Normalny', NULL),
(2, 'Ulgowy', NULL),
(3, 'Studencki', NULL);

--
-- Zrzut danych tabeli `rodzajefilmow`
--

INSERT INTO `rodzajefilmow` (`id`, `nazwa`, `usunieto`) VALUES
(1, 'Film akcji', NULL),
(2, 'Przygodowy', NULL),
(3, 'Science-fiction', NULL),
(4, 'Fantasy', NULL),
(5, 'Komedia', NULL),
(6, 'Romans', NULL),
(7, 'Horror', NULL),
(8, 'Thriller', NULL),
(9, 'Dramat', NULL),
(10, 'Film animowany', NULL),
(11, 'Film biograficzny', NULL),
(12, 'Film historyczny', NULL),
(13, 'Western', NULL),
(14, 'Musical', NULL),
(15, 'Film dokumentalny', NULL);

--
-- Zrzut danych tabeli `promocje`
--

INSERT INTO `promocje` (`id`, `nazwa`, `czyKwotowa`, `wartosc`, `poczatekPromocji`, `koniecPromocji`, `plec`, `staz`) VALUES
(0000000001, 'promocja0000000001', 0, '14.14', '2018-09-23', '2018-10-19', NULL, NULL),
(0000000002, 'promocja0000000002', 1, '11.86', '2018-09-10', '2018-10-03', NULL, NULL),
(0000000003, 'promocja0000000003', 0, '8.44', '2018-09-21', '2018-10-15', NULL, NULL),
(0000000004, 'promocja0000000004', 1, '9.96', '2018-09-10', '2018-10-12', 'M', NULL),
(0000000005, 'promocja0000000005', 1, '6.55', '2018-09-07', '2018-10-28', NULL, NULL),
(0000000006, 'promocja0000000006', 1, '13.42', '2018-09-29', '2018-10-15', NULL, NULL),
(0000000007, 'promocja0000000007', 0, '12.82', '2018-09-08', '2018-10-23', 'M', NULL),
(0000000008, 'promocja0000000008', 1, '12.21', '2018-09-25', '2018-10-03', 'K', NULL),
(0000000009, 'promocja0000000009', 1, '11.86', '2018-09-28', '2018-10-25', NULL, NULL),
(0000000010, 'promocja0000000010', 0, '10.49', '2018-09-03', '2018-10-15', NULL, NULL),
(0000000011, 'promocja0000000011', 1, '11.82', '2018-09-29', '2018-10-08', 'K', NULL),
(0000000012, 'promocja0000000012', 0, '10.88', '2018-09-01', '2018-10-22', 'M', NULL),
(0000000013, 'promocja0000000013', 1, '11.16', '2018-09-19', '2018-10-01', NULL, NULL),
(0000000014, 'promocja0000000014', 1, '9.23', '2018-09-08', '2018-10-23', NULL, NULL),
(0000000015, 'promocja0000000015', 0, '8.43', '2018-09-18', '2018-10-06', NULL, NULL),
(0000000016, 'promocja0000000016', 1, '9.55', '2018-09-17', '2018-10-21', NULL, NULL),
(0000000017, 'promocja0000000017', 1, '9.52', '2018-09-13', '2018-10-22', NULL, NULL),
(0000000018, 'promocja0000000018', 0, '7.97', '2018-09-14', '2018-10-03', NULL, NULL),
(0000000019, 'promocja0000000019', 0, '8.57', '2018-09-06', '2018-10-04', 'K', NULL),
(0000000020, 'promocja0000000020', 1, '9.93', '2018-09-01', '2018-10-25', NULL, NULL);

--
-- Zrzut danych tabeli `vouchery`
--

INSERT INTO `vouchery` (`id`, `czyKwotowa`, `wartosc`, `poczatekPromocji`, `koniecPromocji`, `losoweCyfry`, `cyfraKontrolna`, `czasWygenerowania`, `czyWykorzystany`) VALUES
(0000000001, 0, '6.02', '2018-09-28', '2018-10-01', '431', '7', '2018-10-14 01:11:59', NULL),
(0000000002, 0, '12.58', '2018-09-17', '2018-10-27', '203', '4', '2018-10-14 02:23:59', NULL),
(0000000003, 0, '14.69', '2018-09-16', '2018-10-25', '734', '6', '2018-10-14 03:35:59', NULL),
(0000000004, 1, '13.28', '2018-09-15', '2018-10-24', '780', '1', '2018-10-14 04:47:59', NULL),
(0000000005, 1, '13.73', '2018-09-07', '2018-10-24', '971', '0', '2018-10-14 05:59:59', NULL),
(0000000006, 1, '12.36', '2018-09-19', '2018-10-26', '410', '3', '2018-10-14 07:11:59', NULL),
(0000000007, 0, '6.18', '2018-09-18', '2018-10-13', '723', '4', '2018-10-14 08:23:59', NULL),
(0000000008, 0, '8.15', '2018-09-02', '2018-10-06', '704', '0', '2018-10-14 09:35:59', NULL),
(0000000009, 0, '13.78', '2018-09-06', '2018-10-06', '199', '9', '2018-10-14 10:47:59', NULL),
(0000000010, 1, '12.20', '2018-09-11', '2018-10-23', '475', '1', '2018-10-14 11:59:59', NULL),
(0000000011, 0, '12.95', '2018-09-23', '2018-10-07', '233', '8', '2018-10-14 13:11:59', NULL),
(0000000012, 1, '6.48', '2018-09-27', '2018-10-04', '413', '7', '2018-10-14 14:23:59', NULL),
(0000000013, 1, '7.41', '2018-09-01', '2018-10-18', '849', '3', '2018-10-14 15:35:59', NULL),
(0000000014, 0, '14.03', '2018-09-08', '2018-10-11', '368', '4', '2018-10-14 16:47:59', NULL),
(0000000015, 0, '9.13', '2018-09-19', '2018-10-26', '968', '4', '2018-10-14 17:59:59', NULL),
(0000000016, 1, '6.87', '2018-09-02', '2018-10-08', '472', '9', '2018-10-14 19:11:59', NULL),
(0000000017, 1, '6.67', '2018-09-08', '2018-10-13', '875', '4', '2018-10-14 20:23:59', NULL),
(0000000018, 1, '6.62', '2018-09-26', '2018-10-29', '380', '6', '2018-10-14 21:35:59', NULL),
(0000000019, 0, '10.53', '2018-09-12', '2018-10-06', '674', '8', '2018-10-14 22:47:59', NULL),
(0000000020, 0, '14.91', '2018-09-01', '2018-10-05', '688', '5', '2018-10-14 23:59:59', NULL);

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id`, `login`, `haslo`, `imie`, `nazwisko`, `telefon`, `email`, `Role_id`, `ostatniaAktualizacja`) VALUES
(1, 'admin', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Keane', 'Warren', '770655251', 'Hop@mollis.org', 1, NULL),
(2, 'manager', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Marny', 'Carey', '642854340', 'Caleb@sem.us', 2, NULL),
(3, 'worker3', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Vaughan', 'Alvarez', '185051076', 'Brian@id.gov', 2, NULL),
(4, 'worker4', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Phyllis', 'Strong', '690023208', 'Hunter@sociosqu.us', 2, NULL),
(5, 'worker5', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Brian', 'Ortiz', '957722656', 'Cyrus@quis.us', 1, NULL),
(6, 'worker6', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Oren', 'Cole', '064530742', 'Kellie@feugiat.edu', 1, NULL),
(7, 'worker7', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Lesley', 'Wynn', '524065174', 'Lyle@lorem.us', 3, NULL),
(8, 'worker8', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Harrison', 'Spence', '739560261', 'Nolan@nulla.net', 2, NULL),
(9, 'worker9', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Clio', 'Silva', '458031161', 'Rama@in.com', 1, NULL),
(10, 'worker10', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Noelani', 'Lloyd', '962992857', 'Brenna@est.gov', 2, NULL),
(11, 'worker11', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Jerry', 'May', '222804063', 'Quyn@nonummy.org', 2, NULL),
(12, 'worker12', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Buckminster', 'Collier', '216390987', 'Rhea@sed.edu', 1, NULL),
(13, 'worker13', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Paul', 'Osborne', '926595581', 'Rajah@turpis.us', 2, NULL),
(14, 'worker14', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Brielle', 'Joseph', '940313414', 'Halla@interdum.gov', 1, NULL),
(15, 'worker15', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Virginia', 'Ferrell', '706473865', 'Allistair@turpis.edu', 2, NULL),
(16, 'worker16', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Daria', 'Gutierrez', '406962760', 'Gemma@euismod.net', 2, NULL),
(17, 'worker17', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Maryam', 'Steele', '435846958', 'William@sapien.net', 3, NULL),
(18, 'worker18', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Slade', 'Jacobs', '778218741', 'Lara@dolor.com', 1, NULL),
(19, 'worker19', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Castor', 'Schroeder', '138306333', 'Flavia@Suspendisse.org', 3, NULL),
(20, 'worker20', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Derek', 'Kent', '375425742', 'Stewart@eros.net', 1, NULL),
(21, 'worker21', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Juliet', 'Martin', '655277788', 'Wylie@ut.com', 3, NULL),
(22, 'worker22', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Rajah', 'Conrad', '537428391', 'Eleanor@taciti.net', 3, NULL),
(23, 'worker23', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Mary', 'Sargent', '630684610', 'Erich@consectetuer.net', 3, NULL),
(24, 'worker24', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Rana', 'Whitney', '839977506', 'Evelyn@torquent.gov', 3, NULL),
(25, 'worker25', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Akeem', 'Jacobs', '469176006', 'Chester@ad.edu', 3, NULL),
(26, 'worker26', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Brady', 'Robertson', '946978767', 'Tanisha@purus.us', 3, NULL),
(27, 'worker27', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Dominic', 'Scott', '641291299', 'Jeremy@nisl.org', 3, NULL),
(28, 'worker28', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Edan', 'Warren', '068812675', 'Gareth@ridiculus.com', 3, NULL),
(29, 'worker29', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Carter', 'Pugh', '220710589', 'Fatima@lobortis.gov', 3, NULL),
(30, 'worker30', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Alden', 'Blevins', '835681797', 'Catherine@lobortis.org', 3, NULL),
(31, 'worker31', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Burke', 'Murray', '805876674', 'Shellie@pharetra.com', 3, NULL),
(32, 'worker32', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Winifred', 'Hebert', '295875110', 'Lamar@posuere.gov', 3, NULL),
(33, 'worker33', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Troy', 'Horne', '439408240', 'Yoshi@semper.us', 3, NULL),
(34, 'worker34', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Geoffrey', 'Reynolds', '545655866', 'Elizabeth@commodo.us', 3, NULL),
(35, 'worker35', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Allen', 'Estrada', '811069867', 'Giselle@gravida.org', 3, NULL),
(36, 'worker36', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Amelia', 'Tanner', '846129543', 'Abraham@sociis.edu', 3, NULL),
(37, 'worker37', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Garrison', 'Waller', '748907362', 'Alan@ullamcorper.us', 3, NULL),
(38, 'worker38', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Tatyana', 'Fowler', '599098576', 'Lacota@dis.net', 3, NULL),
(39, 'worker39', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Velma', 'Dorsey', '735421210', 'Aimee@nonummy.edu', 3, NULL),
(40, 'worker40', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Irene', 'Sloan', '158922877', 'Orlando@velit.net', 3, NULL),
(41, 'worker41', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Camilla', 'Love', '587432832', 'Lysandra@senectus.org', 3, NULL),
(42, 'worker42', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Isadora', 'Lamb', '776831820', 'Britanni@ullamcorper.org', 3, NULL),
(43, 'worker43', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Zephr', 'Mcknight', '355954496', 'Stuart@Nam.gov', 3, NULL),
(44, 'worker44', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Ava', 'Horn', '766335174', 'Wayne@nonummy.net', 3, NULL),
(45, 'worker45', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Logan', 'Dennis', '990427969', 'Camden@Nulla.gov', 3, NULL),
(46, 'worker46', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Jarrod', 'Joyce', '474342814', 'Faith@viverra.net', 3, NULL),
(47, 'worker47', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Rudyard', 'Richmond', '843108040', 'Kieran@justo.org', 3, NULL),
(48, 'worker48', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Kadeem', 'Garner', '441535669', 'Beck@elit.gov', 3, NULL),
(49, 'worker49', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Lamar', 'Kinney', '693224627', 'Hillary@libero.net', 3, NULL),
(50, 'worker50', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Camden', 'Garrison', '607781009', 'Kameko@Curabitur.us', 3, NULL);

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `imie`, `nazwisko`, `telefon`, `email`, `dataRejestracji`, `plec`, `czyZablowoany`) VALUES
(1, 'user1', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Carter', 'Ray', '444073592', 'Arden@nunc.org', '2018-10-11', 'K', NULL),
(2, 'user2', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Priscilla', 'Oneill', '462654440', 'Patience@velit.edu', '2018-10-05', 'M', NULL),
(3, 'user3', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Wilma', 'Clemons', '267434113', 'Aiko@Sed.edu', '2018-10-04', 'K', NULL),
(4, 'user4', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Vernon', 'Graham', '234813542', 'Marcia@Vestibulum.net', '2018-10-02', 'M', NULL),
(5, 'user5', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Clinton', 'Lucas', '796583001', 'Iola@pharetra.org', '2018-10-03', 'K', NULL),
(6, 'user6', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Jessamine', 'Huff', '834136012', 'Cleo@volutpat.org', '2018-10-04', 'K', NULL),
(7, 'user7', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Zahir', 'Valentine', '582625337', 'Kelly@lectus.net', '2018-10-06', 'M', NULL),
(8, 'user8', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Vance', 'Kirby', '733072044', 'Gisela@nisl.org', '2018-10-05', 'M', NULL),
(9, 'user9', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Tamekah', 'Espinoza', '663004031', 'Levi@Donec.org', '2018-10-13', 'M', NULL),
(10, 'user10', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Salvador', 'Clayton', '255471088', 'Rooney@eget.com', '2018-10-11', 'K', NULL),
(11, 'user11', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Ashton', 'Mclean', '433072428', 'Buffy@dis.net', '2018-10-01', 'K', NULL),
(12, 'user12', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Ann', 'Bray', '563820129', 'Lane@Donec.edu', '2018-10-07', 'M', NULL),
(13, 'user13', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Patience', 'Kane', '462963628', 'Teegan@Integer.us', '2018-10-02', 'K', NULL),
(14, 'user14', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Stephen', 'Nolan', '223676992', 'Mannix@vitae.edu', '2018-10-08', 'M', NULL),
(15, 'user15', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Alika', 'Potter', '763949228', 'Whoopi@tempor.us', '2018-10-03', 'K', NULL),
(16, 'user16', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Nero', 'Nunez', '764028984', 'Colt@sollicitudin.edu', '2018-10-11', 'M', NULL),
(17, 'user17', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Hiroko', 'Montgomery', '464048007', 'Ayanna@habitant.net', '2018-10-10', 'K', NULL),
(18, 'user18', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Phelan', 'Sharpe', '640220944', 'Branden@Sed.edu', '2018-10-11', 'K', NULL),
(19, 'user19', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Ivory', 'Bernard', '344994099', 'Piper@inceptos.gov', '2018-10-13', 'M', NULL),
(20, 'user20', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Camille', 'Wright', '702496058', 'Gemma@suscipit.gov', '2018-10-03', 'M', NULL),
(21, 'user21', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Slade', 'Skinner', '605792402', 'Jesse@elit.net', '2018-10-12', 'K', NULL),
(22, 'user22', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Nora', 'Blair', '129848091', 'Benedict@Vestibulum.edu', '2018-10-06', 'M', NULL),
(23, 'user23', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Ginger', 'Park', '859110661', 'Rhonda@posuere.org', '2018-10-06', 'K', NULL),
(24, 'user24', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Chancellor', 'Scott', '303884239', 'Vernon@mi.net', '2018-10-06', 'K', NULL),
(25, 'user25', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Jameson', 'Shaffer', '836688468', 'Xena@ligula.org', '2018-10-10', 'M', NULL),
(26, 'user26', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Wyatt', 'Avila', '473414846', 'Gillian@semper.net', '2018-10-06', 'K', NULL),
(27, 'user27', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Norman', 'Peck', '462321394', 'Colleen@turpis.edu', '2018-10-04', 'M', NULL),
(28, 'user28', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Madeline', 'Mueller', '329210785', 'Harper@felis.org', '2018-10-13', 'K', NULL),
(29, 'user29', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Wyoming', 'Figueroa', '045799322', 'Amity@nostra.gov', '2018-10-05', 'K', NULL),
(30, 'user30', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Alexandra', 'Ingram', '171675494', 'Brenden@ipsum.org', '2018-10-05', 'M', NULL),
(31, 'user31', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Owen', 'Gregory', '522577051', 'Steel@ligula.us', '2018-10-01', 'K', NULL),
(32, 'user32', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Irene', 'Hodges', '527984830', 'Amena@venenatis.com', '2018-10-12', 'K', NULL),
(33, 'user33', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Carlos', 'Orr', '463818063', 'Danielle@laoreet.us', '2018-10-10', 'K', NULL),
(34, 'user34', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Burke', 'Burks', '148154290', 'Abraham@Aliquam.org', '2018-10-02', 'K', NULL),
(35, 'user35', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Kenyon', 'Valencia', '040968840', 'Lillian@iaculis.com', '2018-10-03', 'M', NULL),
(36, 'user36', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Germane', 'Figueroa', '027537507', 'Alan@conubia.gov', '2018-10-11', 'M', NULL),
(37, 'user37', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Kimberley', 'Koch', '845607715', 'Brenden@nunc.us', '2018-10-02', 'K', NULL),
(38, 'user38', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Tiger', 'Burton', '208847920', 'Wing@eros.net', '2018-10-12', 'K', NULL),
(39, 'user39', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Brandon', 'Griffin', '219616747', 'Kevin@Curae.gov', '2018-10-10', 'K', NULL),
(40, 'user40', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Otto', 'Perry', '709393378', 'Zeph@ornare.org', '2018-10-07', 'M', NULL),
(41, 'user41', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Abdul', 'Perez', '157850842', 'Edan@urna.edu', '2018-10-07', 'K', NULL),
(42, 'user42', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Skyler', 'Pierce', '422288800', 'Jerome@natoque.net', '2018-10-12', 'M', NULL),
(43, 'user43', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Keith', 'Davidson', '150307533', 'Kato@est.com', '2018-10-04', 'K', NULL),
(44, 'user44', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Tanner', 'Jarvis', '958944609', 'David@nunc.us', '2018-10-04', 'M', NULL),
(45, 'user45', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Britanney', 'Moss', '711263952', 'Ray@Phasellus.net', '2018-10-07', 'M', NULL),
(46, 'user46', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Teagan', 'Fields', '970539606', 'Callum@interdum.us', '2018-10-04', 'M', NULL),
(47, 'user47', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Kiona', 'Russell', '778886372', 'Kerry@libero.us', '2018-10-04', 'K', NULL),
(48, 'user48', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Walker', 'Downs', '319128578', 'Tiger@posuere.org', '2018-10-01', 'M', NULL),
(49, 'user49', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Jenna', 'Elliott', '237126329', 'Myles@Vestibulum.org', '2018-10-12', 'M', NULL),
(50, 'user50', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Fleur', 'Walker', '308112205', 'Lawrence@tellus.org', '2018-10-02', 'M', NULL),
(51, 'user51', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Carla', 'Mcleod', '151567900', 'Maxwell@In.org', '2018-10-09', 'M', NULL),
(52, 'user52', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Emmanuel', 'Glover', '232476135', 'Aladdin@suscipit.org', '2018-10-09', 'K', NULL),
(53, 'user53', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Odette', 'Carson', '366358523', 'Prescott@vitae.gov', '2018-10-04', 'M', NULL),
(54, 'user54', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Madeline', 'Hahn', '846478957', 'Drew@Nunc.us', '2018-10-10', 'K', NULL),
(55, 'user55', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Oprah', 'Blevins', '796456218', 'Leila@Sed.us', '2018-10-11', 'K', NULL),
(56, 'user56', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Nomlanga', 'Doyle', '669402129', 'Kiona@penatibus.net', '2018-10-11', 'K', NULL),
(57, 'user57', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Adena', 'Mullins', '713334043', 'Jackson@egestas.edu', '2018-10-04', 'K', NULL),
(58, 'user58', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Abdul', 'Jackson', '933815951', 'Price@dolor.net', '2018-10-03', 'K', NULL),
(59, 'user59', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Brittany', 'Gray', '311132242', 'Janna@fringilla.com', '2018-10-06', 'M', NULL),
(60, 'user60', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Ima', 'Guthrie', '696035068', 'Knox@Quisque.edu', '2018-10-02', 'M', NULL),
(61, 'user61', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Ray', 'Barry', '766220748', 'Maggie@Nunc.us', '2018-10-10', 'K', NULL),
(62, 'user62', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Arden', 'Britt', '245190514', 'Fitzgerald@ligula.edu', '2018-10-02', 'K', NULL),
(63, 'user63', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Colorado', 'Brennan', '091573754', 'Lani@tortor.us', '2018-10-08', 'M', NULL),
(64, 'user64', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Gil', 'Pierce', '419088326', 'Kiayada@tincidunt.com', '2018-10-04', 'M', NULL),
(65, 'user65', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Hop', 'Terrell', '633764229', 'Abra@semper.us', '2018-10-04', 'K', NULL),
(66, 'user66', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Garth', 'Martin', '797988779', 'Amir@vulputate.gov', '2018-10-06', 'M', NULL),
(67, 'user67', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Jennifer', 'Mathis', '796735077', 'Claudia@volutpat.gov', '2018-10-07', 'K', NULL),
(68, 'user68', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Stuart', 'Cantrell', '395147248', 'Paul@morbi.com', '2018-10-09', 'K', NULL),
(69, 'user69', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Lillian', 'Griffin', '094939013', 'Macon@Donec.gov', '2018-10-10', 'K', NULL),
(70, 'user70', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Jaden', 'Morse', '520992846', 'Anjolie@bibendum.net', '2018-10-05', 'M', NULL),
(71, 'user71', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Kylee', 'Dejesus', '378687494', 'Marvin@odio.org', '2018-10-07', 'M', NULL),
(72, 'user72', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Camilla', 'Romero', '832194206', 'Hillary@ullamcorper.com', '2018-10-02', 'K', NULL),
(73, 'user73', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Quentin', 'Noel', '570230939', 'Tamekah@vitae.edu', '2018-10-11', 'K', NULL),
(74, 'user74', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Baker', 'Thomas', '489988144', 'David@amet.com', '2018-10-03', 'M', NULL),
(75, 'user75', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Hector', 'Madden', '540112292', 'Myles@lobortis.gov', '2018-10-13', 'M', NULL),
(76, 'user76', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Matthew', 'Hanson', '344699533', 'Orla@morbi.gov', '2018-10-12', 'K', NULL),
(77, 'user77', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Susan', 'Hartman', '921935370', 'Zephania@leo.gov', '2018-10-07', 'M', NULL),
(78, 'user78', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Maryam', 'Burt', '247889197', 'Naomi@sem.org', '2018-10-05', 'K', NULL),
(79, 'user79', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Tate', 'Reid', '449364353', 'Caldwell@bibendum.us', '2018-10-04', 'K', NULL),
(80, 'user80', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Constance', 'Powell', '731273169', 'Fatima@Aliquam.net', '2018-10-11', 'M', NULL),
(81, 'user81', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Fiona', 'Waller', '045152712', 'Jorden@tortor.net', '2018-10-09', 'M', NULL),
(82, 'user82', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Victor', 'Wall', '011995143', 'Yasir@nascetur.us', '2018-10-05', 'K', NULL),
(83, 'user83', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Deborah', 'Henson', '593970699', 'Skyler@ligula.gov', '2018-10-13', 'K', NULL),
(84, 'user84', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Sierra', 'Newman', '128961582', 'Martina@ornare.us', '2018-10-08', 'M', NULL),
(85, 'user85', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Maggy', 'Savage', '700794412', 'Ingrid@sed.edu', '2018-10-08', 'M', NULL),
(86, 'user86', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Scott', 'Valencia', '008111814', 'Harlan@Mauris.org', '2018-10-11', 'K', NULL),
(87, 'user87', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Erich', 'Mclean', '352895100', 'Melanie@lectus.org', '2018-10-01', 'M', NULL),
(88, 'user88', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Alice', 'Sanders', '451334174', 'Bradley@ipsum.net', '2018-10-08', 'M', NULL),
(89, 'user89', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Shelley', 'Kinney', '191104755', 'Leilani@leo.org', '2018-10-05', 'M', NULL),
(90, 'user90', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Emmanuel', 'Mercer', '044321652', 'Emily@cursus.us', '2018-10-06', 'K', NULL),
(91, 'user91', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Quinn', 'Winters', '153049317', 'Ethan@odio.com', '2018-10-02', 'K', NULL),
(92, 'user92', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Quyn', 'Olson', '389337257', 'Raven@varius.edu', '2018-10-05', 'K', NULL),
(93, 'user93', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Timon', 'Collier', '083351041', 'Quynn@ultricies.com', '2018-10-12', 'M', NULL),
(94, 'user94', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Leroy', 'Jones', '912763210', 'Henry@adipiscing.gov', '2018-10-02', 'M', NULL),
(95, 'user95', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Leo', 'Moody', '167831364', 'Angela@porttitor.net', '2018-10-11', 'M', NULL),
(96, 'user96', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Murphy', 'Merritt', '449450760', 'Keaton@nunc.com', '2018-10-10', 'K', NULL),
(97, 'user97', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Brent', 'Carney', '686615414', 'Herrod@consectetuer.com', '2018-10-01', 'K', NULL),
(98, 'user98', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'James', 'Downs', '116496834', 'Amethyst@leo.gov', '2018-10-08', 'K', NULL),
(99, 'user99', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Aurora', 'Guthrie', '971548019', 'Stephen@libero.org', '2018-10-04', 'K', NULL),
(100, 'user100', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Preston', 'Mayo', '076205446', 'Regan@libero.com', '2018-10-13', 'K', NULL),
(101, 'user101', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Jason', 'Ayers', '206630034', 'Alexa@fermentum.gov', '2018-10-02', 'M', NULL),
(102, 'user102', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Cassandra', 'Cox', '834345740', 'Logan@mus.edu', '2018-10-06', 'K', NULL),
(103, 'user103', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Melvin', 'Guerrero', '266591399', 'Kylie@ac.com', '2018-10-02', 'K', NULL),
(104, 'user104', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Fritz', 'Bowman', '308221840', 'Buckminster@odio.org', '2018-10-03', 'K', NULL),
(105, 'user105', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Zia', 'Gillespie', '675500074', 'Harriet@taciti.gov', '2018-10-12', 'M', NULL),
(106, 'user106', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Gavin', 'Webb', '596885506', 'Leonard@Curae.org', '2018-10-04', 'K', NULL),
(107, 'user107', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Nathan', 'Shepherd', '393919391', 'Roary@ante.com', '2018-10-09', 'M', NULL),
(108, 'user108', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Indira', 'Ruiz', '599310335', 'Marny@dolor.net', '2018-10-11', 'K', NULL),
(109, 'user109', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Abdul', 'Nelson', '637203367', 'Jordan@adipiscing.net', '2018-10-04', 'M', NULL),
(110, 'user110', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Leandra', 'Bryant', '156782110', 'Eagan@tempor.com', '2018-10-02', 'M', NULL),
(111, 'user111', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Knox', 'Baird', '403301974', 'Ciaran@odio.com', '2018-10-11', 'M', NULL),
(112, 'user112', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Lucius', 'Lopez', '248432732', 'Rogan@Cras.gov', '2018-10-10', 'M', NULL),
(113, 'user113', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Giacomo', 'King', '036715316', 'Raya@sed.gov', '2018-10-10', 'K', NULL),
(114, 'user114', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Wade', 'Dalton', '694001720', 'Ezekiel@nibh.net', '2018-10-02', 'M', NULL),
(115, 'user115', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Chancellor', 'Blair', '302478425', 'Rama@risus.edu', '2018-10-06', 'K', NULL),
(116, 'user116', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Cassandra', 'Irwin', '978860125', 'Dana@Nullam.edu', '2018-10-02', 'M', NULL),
(117, 'user117', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Hashim', 'Gardner', '292572495', 'Scott@Class.edu', '2018-10-10', 'K', NULL),
(118, 'user118', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Kameko', 'Sargent', '310926800', 'Kevyn@Integer.org', '2018-10-08', 'K', NULL),
(119, 'user119', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Melissa', 'Holden', '159595722', 'Jocelyn@luctus.us', '2018-10-09', 'K', NULL),
(120, 'user120', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Kenyon', 'Melendez', '714888394', 'Isaac@at.gov', '2018-10-02', 'K', NULL),
(121, 'user121', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Linus', 'Reeves', '252850226', 'Chastity@facilisis.org', '2018-10-07', 'K', NULL),
(122, 'user122', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Lydia', 'Fitzgerald', '847797449', 'Emerald@rutrum.org', '2018-10-09', 'K', NULL),
(123, 'user123', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Cally', 'Ellis', '577505651', 'Hilda@auctor.com', '2018-10-11', 'M', NULL),
(124, 'user124', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Zachery', 'Coleman', '537346077', 'Lara@malesuada.us', '2018-10-06', 'M', NULL),
(125, 'user125', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Summer', 'Parks', '249713378', 'Phoebe@placerat.gov', '2018-10-06', 'M', NULL),
(126, 'user126', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Jarrod', 'Mcmahon', '168675461', 'Jordan@sapien.org', '2018-10-13', 'M', NULL),
(127, 'user127', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Deanna', 'Pratt', '897851881', 'Alyssa@metus.com', '2018-10-12', 'K', NULL),
(128, 'user128', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Ocean', 'Pope', '004680668', 'Daniel@massa.com', '2018-10-05', 'M', NULL),
(129, 'user129', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Nash', 'Burgess', '669350870', 'Priscilla@Praesent.us', '2018-10-06', 'M', NULL),
(130, 'user130', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Reese', 'Byrd', '333776225', 'Ifeoma@enim.net', '2018-10-12', 'M', NULL),
(131, 'user131', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Jessica', 'Shannon', '522372320', 'Joan@bibendum.gov', '2018-10-09', 'M', NULL),
(132, 'user132', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Dean', 'Mathis', '649501008', 'Keefe@commodo.us', '2018-10-04', 'K', NULL),
(133, 'user133', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Candice', 'Perry', '092803405', 'Heidi@ultricies.org', '2018-10-12', 'M', NULL),
(134, 'user134', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Ivan', 'Marquez', '866138100', 'Priscilla@vel.us', '2018-10-13', 'K', NULL),
(135, 'user135', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Brianna', 'Chandler', '041563970', 'Tucker@felis.com', '2018-10-05', 'M', NULL),
(136, 'user136', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Clementine', 'Holt', '683414027', 'Damon@iaculis.edu', '2018-10-07', 'M', NULL),
(137, 'user137', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Velma', 'Cote', '108517039', 'Emi@porta.org', '2018-10-10', 'M', NULL),
(138, 'user138', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Caldwell', 'Christensen', '947987663', 'Kamal@sodales.gov', '2018-10-02', 'K', NULL),
(139, 'user139', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Lois', 'Cole', '446642212', 'Hiroko@Class.net', '2018-10-03', 'M', NULL),
(140, 'user140', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Byron', 'Rose', '536003894', 'Zahir@semper.gov', '2018-10-13', 'M', NULL),
(141, 'user141', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Anne', 'Lyons', '749783495', 'Helen@Maecenas.com', '2018-10-09', 'K', NULL),
(142, 'user142', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Madeline', 'Curtis', '665745040', 'Sage@scelerisque.edu', '2018-10-01', 'K', NULL),
(143, 'user143', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Martha', 'Mccoy', '035145576', 'Kane@nonummy.edu', '2018-10-08', 'K', NULL),
(144, 'user144', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Teegan', 'Hall', '070059342', 'Herrod@litora.us', '2018-10-04', 'K', NULL),
(145, 'user145', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Kiona', 'Cantu', '232079770', 'Owen@nisi.net', '2018-10-04', 'M', NULL),
(146, 'user146', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Keelie', 'Thornton', '376412651', 'Anne@ipsum.edu', '2018-10-09', 'M', NULL),
(147, 'user147', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Zelenia', 'Holmes', '058651203', 'Duncan@aliquam.us', '2018-10-10', 'M', NULL),
(148, 'user148', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Jessica', 'Barnes', '390780973', 'Jaden@Curae.us', '2018-10-02', 'M', NULL),
(149, 'user149', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Echo', 'Delacruz', '793470412', 'Galena@adipiscing.com', '2018-10-04', 'M', NULL),
(150, 'user150', '1305485a712608fdc4d2fd1780c72919f2f54cf288525814bff7120737f6ddad', 'Meredith', 'Langley', '531036251', 'Kyle@auctor.gov', '2018-10-10', 'M', NULL);

--
-- Zrzut danych tabeli `wydarzeniaspecjalne`
--

INSERT INTO `wydarzeniaspecjalne` (`id`, `nazwa`, `usunieto`) VALUES
(1, 'Maraton', NULL),
(2, 'Lady\'s Night', NULL);

--
-- Zrzut danych tabeli `filmy`
--

INSERT INTO `filmy` (`id`, `tytul`, `opis`, `dataPremiery`, `czasTrwania`, `czasReklam`, `plakat`, `zwiastun`, `KategorieWiekowe_id`) VALUES
(1, 'film1', 'ridiculus sociis sed mus nibh ligula Lorem sociis mauris tempus inceptos senectus Quisque adipiscing pharetra a quis senectus non nostra', '2009-11-17', 139, 24, NULL, NULL, 3),
(2, 'film2', 'accumsan Suspendisse aliquet feugiat placerat purus torquent pharetra torquent erat in Praesent torquent senectus molestie sapien Quisque ullamcorper Mauris ligula ornare ullamcorper Vestibulum', '2012-05-29', 155, 22, NULL, NULL, 2),
(3, 'film3', 'sit nibh lacinia metus massa mus Fusce viverra venenatis tempor fermentum faucibus ridiculus massa Curae leo ac tristique Vivamus porta a egestas aptent Cum interdum posuere Vivamus libero', '2011-10-15', 196, 21, NULL, NULL, 5),
(4, 'film4', 'et lacus volutpat odio volutpat litora ut dignissim consectetuer nonummy ornare tortor luctus turpis velit leo torquent nulla purus consequat adipiscing rhoncus netus aliquet et placerat pede', '2016-09-28', 185, 20, NULL, NULL, 3),
(5, 'film5', 'erat adipiscing nulla quam arcu id sed tempus sodales euismod massa ipsum pulvinar suscipit Praesent neque urna porttitor ad in tellus arcu suscipit augue', '2006-05-29', 165, 22, NULL, NULL, 5),
(6, 'film6', 'Suspendisse ultricies imperdiet egestas Praesent pulvinar penatibus pharetra feugiat auctor nunc urna volutpat accumsan commodo tellus Ut eleifend lorem ullamcorper accumsan netus augue sociosqu elit', '2015-03-03', 178, 20, NULL, NULL, 2),
(7, 'film7', 'hendrerit tempus mi Praesent pede euismod ad arcu bibendum Nunc tortor penatibus diam porttitor dapibus hymenaeos hymenaeos sed rutrum magnis laoreet nunc facilisis dignissim volutpat', '2005-06-15', 214, 25, NULL, NULL, 3),
(8, 'film8', 'suscipit eleifend est id id rhoncus nascetur Praesent Nam justo leo sodales montes massa risus senectus vitae pede pharetra accumsan tortor dignissim lacus euismod', '2007-06-23', 130, 20, NULL, NULL, 3),
(9, 'film9', 'feugiat litora sapien et ipsum pretium eros netus ultricies feugiat porttitor vel magna Donec sollicitudin Vivamus ultrices metus Phasellus rutrum Vivamus magna Class Curabitur sed elit neque venenatis', '2015-02-27', 188, 25, NULL, NULL, 5),
(10, 'film10', 'Maecenas Integer elit ligula scelerisque auctor tempor dictum sit Curae dis ligula felis cubilia fringilla pretium amet interdum hymenaeos nostra non nibh Class Pellentesque sodales', '2009-11-17', 157, 20, NULL, NULL, 4),
(11, 'film11', 'euismod arcu congue blandit Curabitur nonummy primis Class morbi lacinia Integer blandit ultrices quam eleifend posuere Suspendisse dapibus suscipit auctor suscipit suscipit dis tempor Vestibulum', '2004-05-14', 211, 25, NULL, NULL, 4),
(12, 'film12', 'sem convallis mus cursus sodales iaculis Praesent odio Aenean consequat facilisis In mattis Nam est justo sociis metus ante mollis bibendum Suspendisse sollicitudin pellentesque dictum', '2013-09-20', 170, 24, NULL, NULL, 3),
(13, 'film13', 'sem tortor commodo Pellentesque rhoncus morbi ultricies mus at Donec Cras nec consectetuer sollicitudin vulputate malesuada consectetuer parturient tincidunt tempus faucibus Nam mattis', '2012-08-31', 212, 20, NULL, NULL, 1),
(14, 'film14', 'ullamcorper venenatis natoque nulla Suspendisse nec litora ultrices lectus urna Etiam sagittis faucibus at Duis iaculis Etiam massa Ut odio euismod Class dapibus lorem nisl cursus', '2011-09-15', 216, 25, NULL, NULL, 5),
(15, 'film15', 'rhoncus bibendum per imperdiet commodo ut sed nisl luctus parturient penatibus odio taciti cursus Duis cursus at id egestas sagittis nonummy tellus conubia id ac', '2012-11-14', 131, 25, NULL, NULL, 2),
(16, 'film16', 'sociis Phasellus laoreet ornare fermentum scelerisque magna vestibulum eget convallis enim Cum nulla Nullam purus Maecenas pretium pellentesque scelerisque sociis magna Suspendisse aliquet auctor amet eget', '2004-06-20', 195, 20, NULL, NULL, 4),
(17, 'film17', 'placerat nisl est Suspendisse commodo nisi iaculis faucibus aliquam Vestibulum vel magnis risus vehicula placerat sem enim a tortor non enim Mauris sed lorem fames Curae', '2011-08-18', 146, 24, NULL, NULL, 4),
(18, 'film18', 'vehicula eros lobortis volutpat Ut lacinia fames massa diam id ultrices dictum nunc litora lobortis neque a lacus dapibus blandit litora', '2015-04-23', 170, 20, NULL, NULL, 2),
(19, 'film19', 'tristique mauris sed placerat pharetra commodo lectus Nam vitae gravida aliquam orci Proin vestibulum Class magnis feugiat Vivamus velit dictum ultrices', '2011-07-17', 219, 20, NULL, NULL, 1),
(20, 'film20', 'pellentesque orci ligula ligula Vestibulum nascetur netus pede commodo Mauris nec dui elit amet Cum Suspendisse per sit erat vitae blandit enim amet quis a Proin', '2010-09-07', 150, 21, NULL, NULL, 4),
(21, 'film21', 'justo faucibus libero sem Nunc molestie justo convallis hymenaeos luctus pulvinar ipsum est fermentum risus habitant Fusce mi Aenean metus lorem felis feugiat felis tellus bibendum ridiculus Aliquam quis convallis', '2009-11-19', 197, 24, NULL, NULL, 5),
(22, 'film22', 'blandit Nullam facilisis sociosqu facilisi lacus eu dignissim pellentesque laoreet interdum Suspendisse lacinia Phasellus Nullam dis non elementum semper Mauris', '2016-01-17', 219, 20, NULL, NULL, 1),
(23, 'film23', 'rhoncus dis Phasellus mauris vulputate sociis viverra mus auctor parturient molestie taciti Aenean interdum justo in augue Ut semper nonummy ac', '2011-10-21', 149, 24, NULL, NULL, 2),
(24, 'film24', 'eget egestas nostra elementum convallis tellus lobortis sagittis scelerisque condimentum taciti morbi laoreet morbi diam Class Phasellus placerat congue nisi ligula purus nascetur aptent scelerisque condimentum leo Cras facilisi diam', '2004-02-07', 217, 23, NULL, NULL, 1),
(25, 'film25', 'volutpat ullamcorper sagittis eros erat dignissim non lacinia ornare lorem lectus ac aliquam tortor auctor cursus Cum justo Fusce condimentum malesuada enim ad Sed cubilia risus iaculis', '2007-04-03', 182, 21, NULL, NULL, 3),
(26, 'film26', 'tempus non Quisque elit Duis lectus Sed Vivamus ridiculus feugiat vulputate leo sociis magna Suspendisse elementum lectus rutrum conubia est Curabitur', '2008-08-21', 156, 21, NULL, NULL, 2),
(27, 'film27', 'turpis augue ullamcorper augue tincidunt ultrices semper facilisi condimentum ultrices ullamcorper eleifend nisi erat Aenean fames dis urna elementum est luctus facilisi pulvinar enim condimentum vitae posuere non', '2007-04-13', 206, 20, NULL, NULL, 5),
(28, 'film28', 'augue interdum mi egestas malesuada pretium sociosqu eget interdum Cras tempus dapibus augue sociosqu massa Suspendisse ultrices convallis rhoncus ultricies ad lacinia elit sapien nulla eget magna risus Nunc', '2013-06-03', 212, 23, NULL, NULL, 4),
(29, 'film29', 'In mollis habitant Duis purus taciti Etiam id Nulla Fusce erat montes lobortis erat metus netus nascetur Aenean sociosqu porttitor varius Nulla luctus', '2015-08-01', 163, 23, NULL, NULL, 4),
(30, 'film30', 'diam tincidunt interdum rhoncus mi Praesent inceptos erat per lorem dui ad aliquam venenatis nisl commodo viverra magna rhoncus Duis rhoncus Maecenas dis Vestibulum suscipit', '2017-05-28', 220, 20, NULL, NULL, 4),
(31, 'film31', 'nisl placerat bibendum tortor luctus hendrerit In ligula nonummy diam vestibulum Curabitur luctus Nullam sagittis mollis scelerisque torquent conubia sapien pulvinar et ridiculus inceptos taciti est', '2011-01-27', 205, 24, NULL, NULL, 5),
(32, 'film32', 'semper elit non molestie tincidunt imperdiet facilisis blandit justo consequat sociosqu primis aliquet justo sit risus per Ut facilisis torquent Vivamus Integer nisl adipiscing orci feugiat rhoncus erat diam', '2015-06-25', 214, 20, NULL, NULL, 3),
(33, 'film33', 'varius dignissim Praesent Aliquam tincidunt scelerisque vel facilisi mus tellus laoreet interdum tempor rutrum neque morbi Suspendisse justo semper Ut ultrices', '2011-10-03', 135, 25, NULL, NULL, 5),
(34, 'film34', 'ullamcorper arcu per Curae leo nisl arcu Pellentesque elit in egestas hendrerit Class volutpat ac Donec sodales inceptos fringilla nulla Phasellus mollis molestie blandit mauris primis vel sociosqu', '2006-01-22', 158, 21, NULL, NULL, 4),
(35, 'film35', 'mus Mauris montes Donec leo accumsan ullamcorper placerat facilisis netus vehicula faucibus nisl Praesent turpis tempor id suscipit tempus id elementum Quisque', '2009-04-28', 142, 20, NULL, NULL, 3),
(36, 'film36', 'ridiculus In fames aptent Curabitur cursus egestas Sed adipiscing nibh eget velit litora lobortis sem dui dui consectetuer sed Suspendisse iaculis fringilla libero Phasellus diam', '2015-05-01', 123, 21, NULL, NULL, 4),
(37, 'film37', 'egestas Etiam volutpat sit accumsan feugiat aptent porta Praesent lacinia velit orci sagittis porttitor consequat ut Suspendisse tortor sem Vivamus eget eleifend', '2012-03-21', 123, 21, NULL, NULL, 2),
(38, 'film38', 'pretium mauris Class conubia fringilla taciti nascetur fermentum dis taciti pulvinar tempus ridiculus Maecenas pulvinar neque vehicula accumsan fames nostra netus', '2012-08-09', 151, 25, NULL, NULL, 4),
(39, 'film39', 'nunc Suspendisse cursus cursus lacus ut blandit tellus Cum auctor elementum imperdiet commodo tortor ornare suscipit dapibus scelerisque in montes vulputate ante placerat posuere scelerisque netus', '2014-05-21', 217, 22, NULL, NULL, 1),
(40, 'film40', 'Nulla Integer parturient urna Lorem netus orci vehicula condimentum fringilla Integer Lorem justo Suspendisse condimentum neque posuere eu fames gravida enim euismod netus ullamcorper', '2006-05-15', 172, 25, NULL, NULL, 2),
(41, 'film41', 'nunc dui diam parturient purus mollis bibendum vel suscipit sollicitudin ultricies congue rutrum dictum velit vulputate Pellentesque Nulla risus mus Etiam fames id eu morbi Pellentesque Etiam vel Ut', '2009-05-14', 140, 24, NULL, NULL, 2),
(42, 'film42', 'ipsum ultricies Nulla facilisis enim id cubilia facilisis hymenaeos vestibulum a neque magnis Ut Cras Class pede tortor In nulla', '2007-04-24', 129, 23, NULL, NULL, 4),
(43, 'film43', 'nostra tristique risus tempor felis eros lorem ultrices eleifend aliquam rutrum Cras tortor ultricies Mauris venenatis congue pharetra odio odio Nunc ante a', '2006-05-29', 204, 25, NULL, NULL, 5),
(44, 'film44', 'Vestibulum est Cum Quisque tortor et volutpat pharetra convallis per vitae urna imperdiet senectus ultricies faucibus aptent vehicula sed laoreet aliquet Duis vel placerat mauris purus', '2006-01-18', 188, 24, NULL, NULL, 2),
(45, 'film45', 'Vestibulum laoreet libero accumsan Donec elementum dapibus interdum fermentum sociis per mauris libero Curae nec adipiscing feugiat suscipit Proin dapibus Quisque', '2017-04-27', 171, 21, NULL, NULL, 3),
(46, 'film46', 'massa convallis conubia nostra vulputate tristique velit conubia ultrices Maecenas laoreet nulla porta nisl Quisque dis ridiculus Aliquam vulputate Donec Quisque netus Mauris eros tortor', '2004-07-04', 177, 20, NULL, NULL, 5),
(47, 'film47', 'laoreet tellus suscipit feugiat posuere placerat Lorem sodales pharetra nonummy viverra orci sit eu mus quis nibh mattis penatibus odio ultricies urna tempus fames tellus', '2014-06-18', 174, 20, NULL, NULL, 4),
(48, 'film48', 'in Aenean leo consequat cursus netus ullamcorper nostra Vivamus metus suscipit ad eleifend nascetur erat urna metus pulvinar sagittis rhoncus aptent primis', '2006-01-23', 183, 22, NULL, NULL, 2),
(49, 'film49', 'vel massa ultrices lacus egestas auctor Aliquam dui neque Nulla laoreet Morbi sagittis convallis pellentesque lacinia rhoncus parturient consectetuer tristique', '2005-01-14', 185, 23, NULL, NULL, 5),
(50, 'film50', 'nisl ridiculus lacus lacinia Cras consectetuer Sed odio consequat faucibus turpis dapibus mus non tortor sociosqu justo tincidunt faucibus euismod ante purus sodales risus Proin sociosqu', '2009-12-20', 203, 25, NULL, NULL, 1);

