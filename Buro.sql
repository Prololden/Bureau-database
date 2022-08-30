DROP DATABASE IF EXISTS Buro;
CREATE DATABASE Buro DEFAULT CHARACTER SET 'cp1251';
SET NAMES 'cp1251';
USE Buro;

DROP TABLE IF EXISTS Urovni;
DROP TABLE IF EXISTS Bezraboti;
DROP TABLE IF EXISTS Professii;
DROP TABLE IF EXISTS Vakansii;
DROP TABLE IF EXISTS Urovni_Bezraboti;


  CREATE TABLE	Urovni
	(
		Kod_urovni int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		Name VARCHAR(255) NOT NULL
	);

  CREATE TABLE Bezraboti
	(
		Kod_bezraboti int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		FIO VARCHAR(255) NOT NULL,
		Data_rogdenia VARCHAR(255) NOT NULL
    );

	CREATE TABLE Professii
	(
		Kod_professii int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		Nazvanie VARCHAR(255) NOT NULL
	);
	
	CREATE TABLE Vakansii
	(
		Kod_vakansii int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		Stag VARCHAR(255) NOT NULL
	);
	CREATE TABLE Urovni_Bezraboti
	(
		Kod_Urovni_Bezraboti int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		Kod_urovni int unsigned not null references Urovni(Kod_urovni),
		Kod_bezraboti int unsigned not null references Bezraboti(Kod_bezraboti)
	);
		CREATE TABLE Vakansii_Bezraboti_Professii
	(
		Kod_Vakansii_Bezraboti_Professii int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		Kod_vakansii int unsigned not null references Vakansii(Kod_vakansii),
		Kod_bezraboti int unsigned not null references Bezraboti(Kod_bezraboti),
		Kod_professii int unsigned not null references Professii(Kod_professii)	
	);
	

	INSERT INTO Urovni (Kod_urovni, Name)
	VALUES (NULL, 'Среднее');
	INSERT INTO Urovni (Kod_urovni, Name)
	VALUES (NULL, 'Бакалавриат');
	
	INSERT INTO Bezraboti (Kod_bezraboti, FIO, Data_rogdenia)
	VALUES (NULL, 'Мамедов Дениз Сергеевич', '24.11.1999');
	INSERT INTO Bezraboti (Kod_bezraboti, FIO, Data_rogdenia)
	VALUES (NULL, 'Понаморев Максим Олегович', '11.02.2000');
	INSERT INTO Bezraboti (Kod_bezraboti, FIO, Data_rogdenia)
	VALUES (NULL, 'Кудачков Дмитрий Сергеевич', '11.02.1999');
	
	INSERT INTO Professii (Kod_professii, Nazvanie)
	VALUES (NULL, 'Программист-junior');
	INSERT INTO Professii (Kod_professii,Nazvanie)
	VALUES (NULL, 'Программист-middle');
	
	INSERT INTO Vakansii (Kod_vakansii,Stag)
	VALUES (NULL,'1 год');
	INSERT INTO Vakansii (Kod_vakansii,Stag)
	VALUES (NULL, '5 лет');
	INSERT INTO Vakansii (Kod_vakansii,Stag)
	VALUES (NULL, '5 лет');
	INSERT INTO Vakansii (Kod_vakansii,Stag)
	VALUES (NULL, '5 лет');
	INSERT INTO Vakansii (Kod_vakansii,Stag)
	VALUES (NULL, '1 год');
	
	INSERT INTO Urovni_Bezraboti (Kod_Urovni_Bezraboti,Kod_urovni,Kod_bezraboti)
	VALUES (NULL,1,1);
	INSERT INTO Urovni_Bezraboti (Kod_Urovni_Bezraboti,Kod_urovni,Kod_bezraboti)
	VALUES (NULL,2,2);
	INSERT INTO Urovni_Bezraboti (Kod_Urovni_Bezraboti,Kod_urovni,Kod_bezraboti)
	VALUES (NULL,2,3);
	
	INSERT INTO Vakansii_Bezraboti_Professii (Kod_Vakansii_Bezraboti_Professii,Kod_vakansii,Kod_bezraboti,Kod_professii)
	VALUES (NULL, 1,1,1);
	INSERT INTO Vakansii_Bezraboti_Professii (Kod_Vakansii_Bezraboti_Professii,Kod_vakansii,Kod_bezraboti,Kod_professii)
	VALUES (NULL, 2,2,2);
	INSERT INTO Vakansii_Bezraboti_Professii (Kod_Vakansii_Bezraboti_Professii,Kod_vakansii,Kod_bezraboti,Kod_professii)
	VALUES (NULL, 3,3,1);
	INSERT INTO Vakansii_Bezraboti_Professii (Kod_Vakansii_Bezraboti_Professii,Kod_vakansii,Kod_bezraboti,Kod_professii)
	VALUES (NULL, 4,2,2);
	INSERT INTO Vakansii_Bezraboti_Professii (Kod_Vakansii_Bezraboti_Professii,Kod_vakansii,Kod_bezraboti,Kod_professii)
	VALUES (NULL, 5,3,1);