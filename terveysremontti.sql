




CREATE TABLE kayttäja (
	UserID 		INT(4),
	FirstName 	VARCHAR(30),
	LastName  	VARCHAR(30),
	PhoneNr		VARCHAR(15),
	Katuosoite	VARCHAR(30),
	PostiNr		INT(5),
	PostiT		VARCHAR(25),
	PRIMARY KEY (UserID)
	
);

/*
Käyttäjä TABLE syötetty phpMyAdmin
*/

CREATE TABLE login (
	LoginID		INT(8),
	Email		VARCHAR(50),
	Salasana	VARCHAR(80),
	UserID		INT(4),
	PRIMARY KEY (LoginID)
);

ALTER TABLE login ENGINE = INNODB;

/*
Login TABLE syötetty phpMyAdmin
*/

CREATE TABLE terveydentila (
	TerveysID		INT(4),
	Verenpaine		BOOLEAN,
	Diabetes1		BOOLEAN,
	Diabetes2		BOOLEAN,
	Sydänsairaus 	BOOLEAN,
	Raskaus			BOOLEAN,
	TerveysTausta 	VARCHAR(5000),
	PRIMARY KEY (TerveysID)
);

ALTER TABLE taustatiedot
ADD UserID INT(4);
/*
Terveydentila TABLE syötetty phpMyAdmin
*/

CREATE TABLE taustatiedot (
	TaustaID		INT(4),
	Paino			DOUBLE,
	Pituus			DOUBLE,
	Ikä				INT(3),
	Sukupuoli     	INT(2),
	PRIMARY KEY (TaustaID)
	
);

ALTER TABLE terveydentila ADD UserID INT(4);

/*
Taustatiedot TABLE syötetty phpMyAdmin
*/

CREATE TABLE ruokarajoitteet (
	RuokaID			INT(4),
	Keliakia		BOOLEAN,
	Laktoosi		BOOLEAN,
	Maito			BOOLEAN,
	Vegaani			BOOLEAN,
	LaktoOvo		BOOLEAN,
	Kala			BOOLEAN,
	Pähkinät		BOOLEAN,
	Muu				VARCHAR(1000),
	PRIMARY KEY (RuokaID)
);

/*
Ruokarajoitteet TABLE syötetty phpMyAdmin
*/

CREATE TABLE inhokkiruoat (
	InhokkiID		INT(4),
	Inhoan			VARCHAR(2000),
	PRIMARY KEY (InhokkiID)
);

ALTER TABLE ruokarajoitteet
ADD UserID INT(4);

ALTER TABLE inhokkiruoat
ADD UserID INT(4);

/*
Inhokkiruoat TABLE syötetty phpMyAdmin
*/

/*
Määritellään Foreign Key:t
*/

ALTER TABLE kayttaja
ADD FOREIGN KEY (LoginID) REFERENCES login (LoginID),
ADD FOREIGN KEY (TaustaID) REFERENCES taustatiedot (taustaID),
ADD FOREIGN KEY (TerveysID) REFERENCES terveydentila (TerveysID),
ADD FOREIGN KEY (RuokaID) REFERENCES ruokarajoitteet (RuokaID),
ADD FOREIGN KEY (InhokkiID) REFERENCES inhokkiruoat (InhokkiID);

/*Muokkaa taulua login, laita vierasavaimeksi UserID kayttaja taulusta */
ALTER TABLE login
ADD FOREIGN KEY (UserID) REFERENCES kayttaja (UserID);

ALTER TABLE terveydentila
ADD FOREIGN KEY (UserID) REFERENCES kayttaja (UserID);

ALTER TABLE taustatiedot
ADD FOREIGN KEY (UserID) REFERENCES kayttaja (UserID);

ALTER TABLE ruokarajoitteet
ADD FOREIGN KEY (UserID) REFERENCES kayttaja (UserID);

ALTER TABLE inhokkiruoat
ADD FOREIGN KEY (UserID) REFERENCES kayttaja (UserID);


Insert terveysremontti.kayttaja (UserID, FirstName, LastName, PhoneNr, Katuosoite, PostiNr, PostiT)
Values 					(1111, 'Maija', 'Mehiläinen', '0403456879', 'Pilipaltitie 2', 01000, 'Jokupaikka'),
						(1112, 'Venla', 'Valittaja', '0442345678', 'Kirstinkuja 10 a 3', 75647, 'Vimpeli'),
						(1113, 'Martta', 'Malttamaton', '0503499587', 'Kippokuja 2', 00980, 'Juupeli'),
						(1114, 'Hilkka', 'Hidastaja', '0445768392', 'Neilikkatie 34', 98976, 'Viinikkala');


Insert terveysremontti.login (LoginID, Email, Salasana)
Values  (111, 'maija@mehilainen.com', 'Kly678NKop'),
		(112, 'venla.valittaja@gmail.com', 'J/H&gjig67'),
		(113, 'marttis@opk.fi', 'Moikka345987'),
		(114, 'hilkkavaan@koti.fi', 'HIOIOIHUHUH789');

						
Insert terveysremontti.taustatiedot (TaustaID, Paino, Pituus, Ikä, Sukupuoli)
Values (2221, 97.6, 158.7, 45, 11),
		(2222, 83.5, 169, 33, 11),
		(2223, 78.4, 153.5, 56, 11),
		(2224, 109.3, 180.2, 40, 11);
								
Insert terveysremontti.terveydentila (TerveysID, Verenpaine, Diabetes1, Diabetes2, Sydänsairaus, Raskaus, TerveysTausta)
Values	(3331, 0, 0, 0, 0, 0, "Perusterve!"),
		(3332, 0, 0, 0, 1, 0, "Syön sydämeen lääkettä"),
		(3333, 1, 0, 0, 0, 0, "Verenpainelääkkeet käytössä"),
		(3334, 0, 0, 1, 0, 0, "Diabetes 2 ollut jo 10 vuotta. Pysyy kurissa lääkkeillä");
								
Insert terveysremontti.ruokarajoitteet (RuokaID, Keliakia, Laktoosi, Maito, Vegaani, LaktoOvo, Kala, Pähkinät, Muu)
Values (4441, 0, 0, 0, 0, 0, 0, 0,  "Syön kaikkea!"),
	   (4442, 1, 1, 1, 1, 1, 1, 1,  "Todella allerginen!"),
	   (4443, 0, 1, 0, 0, 0, 0, 0),
	   (4444, 0, 0, 0, 0, 0, 0, 1, "Paha pähkinäallergia");
								   
Insert terveysremontti.inhokkiruoat (InhokkiID, Inhoan)
Values (5551, "En inhoa mitään! :)"),
	   (5552, "Inhoan lähes kaikkea, varsinkin suolaa"),
	   (5553, "En tykkää korianterista enkä sipulista."),
	   (5554, "Kaikkiruokainen");
								
			
						