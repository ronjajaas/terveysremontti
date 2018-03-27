




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

/*
Inhokkiruoat TABLE syötetty phpMyAdmin
*/

/*
Määritellään Foreign Key:t
*/

ALTER TABLE kayttäja
ADD FOREIGN KEY (LoginID) REFERENCES kayttaja(UserID),
ADD FOREIGN KEY (TaustaID) REFERENCES kayttaja(UserID),
ADD FOREIGN KEY (TerveysID) REFERENCES kayttaja(UserID),
ADD FOREIGN KEY (RuokaID) REFERENCES kayttaja(UserID),
ADD FOREIGN KEY (InhokkiID) REFERENCES kayttaja(UserID);

ALTER TABLE login
ADD FOREIGN KEY (UserID) REFERENCES login (LoginID);

ALTER TABLE terveydentila
ADD FOREIGN KEY (UserID) REFERENCES terveydentila (TerveysID);

ALTER TABLE taustatiedot
ADD FOREIGN KEY (UserID) REFERENCES taustatiedot (TaustaID);

ALTER TABLE ruokarajoitteet
ADD FOREIGN KEY (UserID) REFERENCES ruokarajoitteet (RuokaID);

ALTER TABLE inhokkiruoat
ADD FOREIGN KEY (UserID) REFERENCES inhokkiruoat (InhokkiID);






Insert into login Values (111, 'maija@mehilainen.com', 'Kly678NKop', 1111),
						 (112, 'venla.valittaja@gmail.com', 'J/H&gjig67', 1112),
						 (113, 'marttis@opk.fi', 'Moikka345987', 1113),
						 (114, 'hilkkavaan@koti.fi', 'HIOIOIHUHUH789', 1114);


Insert into user Values (1111, 'Maija', 'Mehiläinen', 'maija@mehilainen.com', '0403456879', 'Pilipaltitie 2', 01000, 'Jokupaikka'),
						(1112, 'Venla', 'Valittaja', 'venla.valittaja@gmail.com', '0442345678', 'Kirstinkuja 10 a 3', 75647, 'Vimpeli'),
						(1113, 'Martta', 'Malttamaton', 'marttis@opk.fi', '0503499587', 'Kippokuja 2', 00980, 'Juupeli'),
						(1114, 'Hilkka', 'Hidastaja', 'hilkkavaan@koti.fi', '0445768392', 'Neilikkatie 34', 98976, 'Viinikkala');
						
Insert into taustatiedot Values (2221, 97.6, 158.7, 45, 1111, 11),
								(2222, 83.5, 169, 33, 1112, 11),
								(2223, 78.4, 153.5, 56, 1113, 11),
								(2224, 109.3, 180.2, 40, 1114, 11);
								
Insert into terveydentila Values(3331, 1111, 0, 0, 0, 0, 0, "Perusterve!"),
								(3332, 1112, 0, 0, 0, 1, 0, "Syön sydämeen lääkettä"),
								(3333, 1113, 1, 0, 0, 0, 0, "Verenpainelääkkeet käytössä"),
								(3334, 1114, 0, 0, 1, 0, 0, "Diabetes 2 ollut jo 10 vuotta. Pysyy kurissa lääkkeillä");
								
Insert into ruokarajoitteet Values (4441, 1111, 0, 0, 0, 0, 0, 0, 0,  "Syön kaikkea!"),
								   (4442, 1112, 1, 1, 1, 1, 1, 1, 1,  "Todella allerginen!"),
								   (4443, 1113, 0, 1, 0, 0, 0, 0, 0),
								   (4444, 1114, 0, 0, 0, 0, 0, 0, 1, "Paha pähkinäallergia");
								   
Insert into inhokkiruoat Values (5551, 1111, "En inhoa mitään! :)"),
								(5552, 1111, "Inhoan lähes kaikkea, varsinkin suolaa"),
								(5553, 1111, "En tykkää korianterista enkä sipulista."),
								(5554, 1111, "Kaikkiruokainen");
								
/*								
FOREIGN KEY (TaustaID) REFERENCES taustatiedot(TaustaID),
	FOREIGN KEY (TerveysID) REFERENCES terveydentila(TerveysID),
	FOREIGN KEY
	*/					
						