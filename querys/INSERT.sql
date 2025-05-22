--INSERT INTO usuario (sNombreC, sPassword, sEmail, sRol) 
--VALUES ("","","","");

--USUARIO

INSERT INTO usuario (sNombreC, sPassword, sEmail, sRol) 
VALUES ("Carlos Martínez", "admin123", "carlos.admin@email.com", "administrador");

INSERT INTO usuario (sNombreC, sPassword, sEmail, sRol) 
VALUES ("Lucía Ramírez", "admin456", "lucia.admin@email.com", "administrador");

INSERT INTO usuario (sNombreC, sPassword, sEmail, sRol) 
VALUES ("Pedro Gómez", "donador789", "pedro.donador@email.com", "donador");

INSERT INTO usuario (sNombreC, sPassword, sEmail, sRol) 
VALUES ("Ana Torres", "donador456", "ana.torres@email.com", "donador");

INSERT INTO usuario (sNombreC, sPassword, sEmail, sRol) 
VALUES ("Miguel Rojas", "donador321", "miguel.rojas@email.com", "donador");

INSERT INTO usuario (sNombreC, sPassword, sEmail, sRol) 
VALUES ("Sofía Herrera", "donador654", "sofia.herrera@email.com", "donador");

INSERT INTO usuario (sNombreC, sPassword, sEmail, sRol) 
VALUES ("Daniel Pérez", "donador147", "daniel.perez@email.com", "donador");

INSERT INTO usuario (sNombreC, sPassword, sEmail, sRol) 
VALUES ("Laura Mendoza", "donador258", "laura.mendoza@email.com", "donador");

INSERT INTO usuario (sNombreC, sPassword, sEmail, sRol) 
VALUES ("Jorge Castillo", "donador369", "jorge.castillo@email.com", "donador");

INSERT INTO usuario (sNombreC, sPassword, sEmail, sRol) 
VALUES ("Elena Cruz", "donador159", "elena.cruz@email.com", "donador");

--BENEFACTOR

INSERT INTO Benefactor (sName, sDescription) 
VALUES ("Fundación Vida", "Organización dedicada al apoyo de comunidades rurales.");

INSERT INTO Benefactor (sName, sDescription) 
VALUES ("Manos Unidas", "Asociación que brinda asistencia médica y educativa.");

INSERT INTO Benefactor (sName, sDescription) 
VALUES ("EcoFuturo", "Proyecto enfocado en sostenibilidad y medio ambiente.");

--PROYECTO

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario, nIdBenefactor) 
VALUES ("Huertos Urbanos", "Creación de huertos en zonas urbanas.", 0x00, 1, 1);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario, nIdBenefactor) 
VALUES ("Educación para Todos", "Campaña de educación primaria en zonas rurales.", 0x00, 2, 2);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario, nIdBenefactor) 
VALUES ("Reciclaje Comunitario", "Instalación de puntos de reciclaje en barrios.", 0x00, 1, 3);


--DONACIÓN MATERIAL

INSERT INTO DonacionMaterial (sName, sDescription, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBenefactor)
VALUES ("Libros Escolares", "Donación de libros de texto usados.", 0x00, 120, TRUE,'2025-04-22', 3, 1);

INSERT INTO DonacionMaterial (sName, sDescription, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBenefactor)
VALUES ("Ropa de Invierno", "Abrigos y suéteres para comunidades frías.", 0x00, 85, TRUE,'2025-03-22', 4, 2);

INSERT INTO DonacionMaterial (sName, sDescription, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBenefactor)
VALUES ("Herramientas Agrícolas", "Kit de herramientas básicas para agricultores.", 0x00, 40, FALSE,'2025-05-22', 5, 1);

--DONACION DIGITAL

INSERT INTO DonacionDigital (nFolio, sMethod, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBenefactor)
VALUES (10001, "Transferencia", 0x00, 1500, TRUE,'2025-02-22', 6, 3);

INSERT INTO DonacionDigital (nFolio, sMethod, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBenefactor)
VALUES (10002, "PayPal", 0x00, 750, FALSE,'2025-01-22', 7, 2);

INSERT INTO DonacionDigital (nFolio, sMethod, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBenefactor)
VALUES (10003, "Tarjeta", 0x00, 300, TRUE,'2025-04-22', 8, 1);

INSERT INTO DonacionDigital (nFolio, sMethod, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBenefactor)
VALUES (10003, "Tarjeta", 0x00, 300, TRUE,'2025-09-22', 5, 1);

INSERT INTO DonacionDigital (nFolio, sMethod, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBenefactor)
VALUES (10003, "Tarjeta", 0x00, 300, TRUE,'2025-08-22', 4, 1);

INSERT INTO DonacionDigital (nFolio, sMethod, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBenefactor)
VALUES (10003, "Tarjeta", 0x00, 300, TRUE,'2025-10-22', 3, 1);


