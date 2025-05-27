--INSERT INTO usuario (sNombreC, sPassword, sEmail, sRol) 
--VALUES ("","","","");



--BENEFICIARIO

INSERT INTO Beneficiario (sName, sDescription) 
VALUES ("Fundación Vida", "Organización dedicada al apoyo de comunidades rurales.");

INSERT INTO Beneficiario (sName, sDescription) 
VALUES ("Manos Unidas", "Asociación que brinda asistencia médica y educativa.");

INSERT INTO Beneficiario (sName, sDescription) 
VALUES ("EcoFuturo", "Proyecto enfocado en sostenibilidad y medio ambiente.");

--PROYECTO

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario, nIdBeneficiario) 
VALUES ("Huertos Urbanos", "Creación de huertos en zonas urbanas.", 0x00, 1, 1);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario, nIdBeneficiario) 
VALUES ("Educación para Todos", "Campaña de educación primaria en zonas rurales.", 0x00, 2, 2);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario, nIdBeneficiario) 
VALUES ("Reciclaje Comunitario", "Instalación de puntos de reciclaje en barrios.", 0x00, 1, 3);


--DONACIÓN MATERIAL

INSERT INTO DonacionMaterial (sName, sDescription, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBeneficiario)
VALUES ("Libros Escolares", "Donación de libros de texto usados.", 0x00, 120, TRUE,'2025-04-22', 3, 1);

INSERT INTO DonacionMaterial (sName, sDescription, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBeneficiario)
VALUES ("Ropa de Invierno", "Abrigos y suéteres para comunidades frías.", 0x00, 85, TRUE,'2025-03-22', 4, 2);

INSERT INTO DonacionMaterial (sName, sDescription, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBeneficiario)
VALUES ("Herramientas Agrícolas", "Kit de herramientas básicas para agricultores.", 0x00, 40, FALSE,'2025-05-22', 5, 1);

--DONACION DIGITAL

INSERT INTO DonacionDigital (nFolio, sMethod, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBeneficiario)
VALUES (10001, "Transferencia", 0x00, 1500, TRUE,'2025-02-22', 6, 3);

INSERT INTO DonacionDigital (nFolio, sMethod, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBeneficiario)
VALUES (10002, "PayPal", 0x00, 750, FALSE,'2025-01-22', 7, 2);

INSERT INTO DonacionDigital (nFolio, sMethod, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBeneficiario)
VALUES (10003, "Tarjeta", 0x00, 300, TRUE,'2025-04-22', 3, 1);

INSERT INTO DonacionDigital (nFolio, sMethod, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBeneficiario)
VALUES (10003, "Tarjeta", 0x00, 300, TRUE,'2025-09-22', 5, 1);

INSERT INTO DonacionDigital (nFolio, sMethod, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBeneficiario)
VALUES (10003, "Tarjeta", 0x00, 300, TRUE,'2025-08-22', 4, 1);

INSERT INTO DonacionDigital (nFolio, sMethod, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBeneficiario)
VALUES (10003, "Tarjeta", 0x00, 300, TRUE,'2025-10-22', 3, 1);


--USUARIOS (Se movio de DB.sql a este script)

-- Se cambio el rol de "Administrador"  a "administrador", porque si no no lo reconocia en el login
INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('María González', 'admin123', 'maria@admin.com', 'administrador', 'GONM850101XXX', 'Av. Reforma 123, CDMX');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Carlos Ramírez', 'secure456', 'carlos@admin.com', 'administrador', 'RAMC880202XXX', 'Calle 5 de Mayo 456, CDMX');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Ana Torres', 'donador1', 'ana@correo.com', 'Donador', 'TORA910303XXX', 'Insurgentes Sur 789, CDMX');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Luis Martínez', 'donador2', 'luis@correo.com', 'Donador', 'MARL920404XXX', 'Av. Juárez 101, CDMX');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Paola Suárez', 'donador3', 'paola@correo.com', 'Donador', 'SUAP930505XXX', 'Calle Oaxaca 202, CDMX');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Jorge Herrera', 'donador4', 'jorge@correo.com', 'Donador', 'HERJ940606XXX', 'Colonia Roma 303, CDMX');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Laura Vega', 'donador5', 'laura@correo.com', 'Donador', 'VEGL950707XXX', 'Colonia Del Valle 404, CDMX');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Daniel Castro', 'donador6', 'daniel@correo.com', 'Donador', 'CASD960808XXX', 'Santa Fe 505, CDMX');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Fernanda López', 'donador7', 'fernanda@correo.com', 'Donador', 'LOPF970909XXX', 'Av. Universidad 606, CDMX');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Iván Ortega', 'donador8', 'ivan@correo.com', 'Donador', 'ORTI981010XXX', 'Coyoacán 707, CDMX');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Saul Lima', 'admin123', 'lima@admin.com', 'administrador', 'GONM850101XXX', 'Av. Reforma 123, CDMX');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Noelia Perez', 'admin123', 'noe@admin.com', 'administrador', 'RAMC880202XXX', 'Calle 5 de Mayo 456, CDMX');
