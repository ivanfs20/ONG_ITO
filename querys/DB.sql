CREATE TABLE Usuario(
nIdUsuario SMALLINT NOT NULL AUTO_INCREMENT,
sNombreC VARCHAR (50) NOT NULL,
sPassword VARCHAR (20) NOT NULL,
sEmail VARCHAR (25) NOT NULL,
sRol VARCHAR (20) NOT NULL,
sRfc VARCHAR (13) NOT NULL,
sDomicilio VARCHAR (50) NOT NULL,
PRIMARY KEY (nIdUsuario)
);

CREATE TABLE Beneficiario(
nIdBeneficiario SMALLINT NOT NULL AUTO_INCREMENT,
sName VARCHAR (50) NOT NULL,
sDescription VARCHAR (250) NOT NULL,
PRIMARY KEY (nIdBeneficiario)
);

CREATE TABLE Proyecto(
nIdProyecto SMALLINT NOT NULL AUTO_INCREMENT,
sTitle VARCHAR (50) NOT NULL,
sDescription VARCHAR (250) NOT NULL,
aPhoto LONGBLOB NOT NULL,
nIdUsuario SMALLINT NOT NULL,
nIdBeneficiario SMALLINT NOT NULL,
PRIMARY KEY (nIdProyecto),
FOREIGN KEY (nIdBeneficiario) REFERENCES Beneficiario(nIdBeneficiario),
FOREIGN KEY (nIdUsuario) REFERENCES Usuario (nIdUsuario)
);

CREATE TABLE DonacionMaterial(
nIdDonacion SMALLINT NOT NULL AUTO_INCREMENT,
sName VARCHAR (50) NOT NULL,
sDescription VARCHAR (250) NOT NULL,
aPhoto LONGBLOB NOT NULL,
nAmount MEDIUMINT NOT NULL,
bStatus BOOLEAN NOT NULL,
dateCreacion DATE NOT NULL,
nIdUsuario SMALLINT NOT NULL,
nIdBeneficiario SMALLINT NOT NULL,
PRIMARY KEY (nIdDonacion),
FOREIGN KEY (nIdUsuario) REFERENCES Usuario(nIdUsuario),
FOREIGN KEY (nIdBeneficiario) REFERENCES Beneficiario(nIdBeneficiario)
);

CREATE TABLE DonacionDigital(
nIdDonacion SMALLINT NOT NULL AUTO_INCREMENT,
nFolio MEDIUMINT NOT NULL,
sMethod VARCHAR (25) NOT NULL,
aPhoto LONGBLOB NOT NULL,
nAmount MEDIUMINT NOT NULL,
bStatus BOOLEAN NOT NULL,
dateCreacion DATE NOT NULL,
nIdUsuario SMALLINT NOT NULL,
nIdBeneficiario SMALLINT NOT NULL,
PRIMARY KEY (nIdDonacion),
FOREIGN KEY (nIdUsuario) REFERENCES Usuario(nIdUsuario),
FOREIGN KEY (nIdBeneficiario) REFERENCES Beneficiario (nIdBeneficiario)
);

CREATE TABLE Comentarios (
    nIdComentario SMALLINT NOT NULL AUTO_INCREMENT,
    sComentario VARCHAR(300) NOT NULL,
    bStatus BOOLEAN NOT NULL,
    nIdUsuario SMALLINT NOT NULL,
    PRIMARY KEY (nIdComentario),
    FOREIGN KEY (nIdUsuario) REFERENCES Usuario(nIdUsuario)
        ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE  INDEX usuario_srolx ON Usuario (sRol ASC);
CREATE  INDEX beneficiario_snamex ON Beneficiario (sName ASC);
CREATE  INDEX proyecto_nidbeneficiariox ON Proyecto (nIdBeneficiario ASC);
CREATE  INDEX donacionmaterial_nidusuariox ON DonacionMaterial (nIdUsuario ASC);
CREATE  INDEX donacionmaterial_nibeneficiariox ON DonacionMaterial (nIdBeneficiario ASC);
CREATE  INDEX donaciondigital_nidusuariox ON DonacionDigital (nIdUsuario ASC);
CREATE  INDEX donaciondigital_nibeneficiariox ON DonacionDigital (nIdBeneficiario ASC);


DROP USER IF EXISTS 'administrador'@'localhost';
FLUSH PRIVILEGES;

CREATE USER 'administrador'@'localhost' IDENTIFIED BY 'administrador';

GRANT SELECT, INSERT, DELETE, UPDATE ON `Usuario` TO 'administrador'@'localhost';
GRANT SELECT, INSERT, DELETE, UPDATE ON `Beneficiario` TO 'administrador'@'localhost';
GRANT SELECT, INSERT, DELETE, UPDATE ON `Proyecto` TO 'administrador'@'localhost';
GRANT SELECT, INSERT, DELETE, UPDATE ON `DonacionMaterial` TO 'administrador'@'localhost';
GRANT SELECT, INSERT, DELETE, UPDATE ON `DonacionDigital` TO 'administrador'@'localhost';

FLUSH PRIVILEGES;
/*DBA->Alteraciones en tablas con llaves foraenas, para actualizacion y eliminacion en cascada , ejecutar unicamente esto si ya se ejecuto lo 
de arriba si no se ha ejecutado, entonces ejecutar todo el script sin problema*/
ALTER TABLE Proyecto 
DROP FOREIGN KEY Proyecto_ibfk_1;
ALTER TABLE Proyecto 
ADD CONSTRAINT Proyecto_ibfk_1 FOREIGN KEY (nIdBeneficiario) 
REFERENCES Beneficiario(nIdBeneficiario) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE Proyecto
DROP FOREIGN KEY Proyecto_ibfk_2;
ALTER TABLE Proyecto
ADD CONSTRAINT Proyecto_ibfk_2 FOREIGN KEY (nIdUsuario)
REFERENCES Usuario (nIdUsuario) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE DonacionMaterial 
DROP FOREIGN KEY DonacionMaterial_ibfk_1;
ALTER TABLE DonacionMaterial 
ADD CONSTRAINT DonacionMaterial_ibfk_1 FOREIGN KEY (nIdUsuario) 
REFERENCES Usuario(nIdUsuario) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE DonacionMaterial 
DROP FOREIGN KEY DonacionMaterial_ibfk_2;
ALTER TABLE DonacionMaterial 
ADD CONSTRAINT DonacionMaterial_ibfk_2 FOREIGN KEY (nIdBeneficiario) 
REFERENCES Beneficiario(nIdBeneficiario) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE DonacionDigital 
DROP FOREIGN KEY DonacionDigital_ibfk_1;
ALTER TABLE DonacionDigital 
ADD CONSTRAINT DonacionDigital_ibfk_1 FOREIGN KEY (nIdUsuario) 
REFERENCES Usuario(nIdUsuario) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE DonacionDigital 
DROP FOREIGN KEY DonacionDigital_ibfk_2;
ALTER TABLE DonacionDigital 
ADD CONSTRAINT DonacionDigital_ibfk_2 FOREIGN KEY (nIdBeneficiario) 
REFERENCES Beneficiario(nIdBeneficiario) ON DELETE CASCADE ON UPDATE CASCADE;