CREATE TABLE Usuario(
nIdUsuario SMALLINT NOT NULL AUTO_INCREMENT,
sNombreC VARCHAR (50) NOT NULL,
sPassword VARCHAR (20) NOT NULL,
sEmail VARCHAR (25) NOT NULL,
sRol VARCHAR (20) NOT NULL,
PRIMARY KEY (nIdUsuario)
);

CREATE TABLE Benefactor(
nIdBenefactor SMALLINT NOT NULL AUTO_INCREMENT,
sName VARCHAR (50) NOT NULL,
sDescription VARCHAR (250) NOT NULL,
PRIMARY KEY (nIdBenefactor)
);

CREATE TABLE Proyecto(
nIdProyecto SMALLINT NOT NULL AUTO_INCREMENT,
sTitle VARCHAR (50) NOT NULL,
sDescription VARCHAR (250) NOT NULL,
aPhoto LONGBLOB NOT NULL,
nIdBenefactor SMALLINT NOT NULL,
PRIMARY KEY (nIdProyecto),
FOREIGN KEY (nIdBenefactor) REFERENCES Benefactor(nIdBenefactor)
);

CREATE TABLE DonacionMaterial(
nIdDonacion SMALLINT NOT NULL AUTO_INCREMENT,
sName VARCHAR (50) NOT NULL,
sDescription VARCHAR (250) NOT NULL,
aPhoto LONGBLOB NOT NULL,
nAmount MEDIUMINT NOT NULL,
bStatus BOOLEAN NOT NULL,
nIdUsuario SMALLINT NOT NULL,
nIdBenefactor SMALLINT NOT NULL,
PRIMARY KEY (nIdDonacion),
FOREIGN KEY (nIdUsuario) REFERENCES Usuario(nIdUsuario),
FOREIGN KEY (nIdBenefactor) REFERENCES Benefactor(nIdBenefactor)
);

CREATE TABLE DonacionDigital(
nIdDonacion SMALLINT NOT NULL AUTO_INCREMENT,
nFolio MEDIUMINT NOT NULL,
sMethod VARCHAR (25) NOT NULL,
aPhoto LONGBLOB NOT NULL,
nAmount MEDIUMINT NOT NULL,
bStatus BOOLEAN NOT NULL,
nIdUsuario SMALLINT NOT NULL,
nIdBenefactor SMALLINT NOT NULL,
PRIMARY KEY (nIdDonacion),
FOREIGN KEY (nIdUsuario) REFERENCES Usuario(nIdUsuario),
FOREIGN KEY (nIdBenefactor) REFERENCES Benefactor(nIdBenefactor)
);

CREATE  INDEX usuario_srolx ON Usuario (sRol ASC);
CREATE  INDEX benefactor_snamex ON Benefactor (sName ASC);
CREATE  INDEX proyecto_nidbenefactorx ON Proyecto (nIdBenefactor ASC);
CREATE  INDEX donacionmaterial_nidusuariox ON DonacionMaterial (nIdUsuario ASC);
CREATE  INDEX donacionmaterial_nibenefactorx ON DonacionMaterial (nIdBenefactor ASC);
CREATE  INDEX donaciondigital_nidusuariox ON DonacionDigital (nIdUsuario ASC);
CREATE  INDEX donaciondigital_nibenefactorx ON DonacionDigital (nIdBenefactor ASC);


DROP USER IF EXISTS 'administrador'@'localhost';
FLUSH PRIVILEGES;

CREATE USER 'administrador'@'localhost' IDENTIFIED BY 'administrador';

GRANT SELECT, INSERT, DELETE, UPDATE ON `Usuario` TO 'administrador'@'localhost';
GRANT SELECT, INSERT, DELETE, UPDATE ON `Benefactor` TO 'administrador'@'localhost';
GRANT SELECT, INSERT, DELETE, UPDATE ON `Proyecto` TO 'administrador'@'localhost';
GRANT SELECT, INSERT, DELETE, UPDATE ON `DonacionMaterial` TO 'administrador'@'localhost';
GRANT SELECT, INSERT, DELETE, UPDATE ON `DonacionDigital` TO 'administrador'@'localhost';

FLUSH PRIVILEGES;
