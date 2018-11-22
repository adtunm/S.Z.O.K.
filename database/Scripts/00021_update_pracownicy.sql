UPDATE pracownicy SET login = 'admin', Role_id = 1 WHERE id =1;
UPDATE pracownicy SET login = 'kierownik', Role_id = 2 WHERE id =2;
UPDATE pracownicy SET login = 'pracownik', Role_id = 3 WHERE id =3;

UPDATE uzytkownicy SET login = 'user' WHERE id = 1;