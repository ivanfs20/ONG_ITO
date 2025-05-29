--INSERT INTO usuario (sNombreC, sPassword, sEmail, sRol) 
--VALUES ("","","","");



--BENEFICIARIO

INSERT INTO Beneficiario (sName, sDescription,nIdProyecto) 
VALUES ("Fundación Vida", "Organización dedicada al apoyo de comunidades rurales.",1);

INSERT INTO Beneficiario (sName, sDescription,nIdProyecto) 
VALUES ("Manos Unidas", "Asociación que brinda asistencia médica y educativa.",2);

INSERT INTO Beneficiario (sName, sDescription,nIdProyecto) 
VALUES ("EcoFuturo", "Proyecto enfocado en sostenibilidad y medio ambiente.",3);

--Nuevas inserciones de beneficiarios
INSERT INTO Beneficiario (sName, sDescription, nIdProyecto) VALUES 
("Jóvenes con Futuro", "Apoyo educativo y vocacional para jóvenes de bajos recursos.", 1),
("Tecnosalud", "Organización que promueve la salud preventiva en comunidades estudiantiles.", 2),
("EcoVerde", "Promotora del reciclaje y actividades sustentables en zonas urbanas.", 3),
("EduRed", "Plataforma que impulsa el acceso a la educación digital.", 4),
("Cultura Viva", "Fomento del arte y la cultura en instituciones educativas.", 5),
("Construyendo Caminos", "Rehabilitación de espacios públicos en entornos escolares.", 6),
("Comunidad Inteligente", "Promoción de tecnología accesible en zonas marginadas.", 7),
("Sonrisas del Mañana", "Campañas de salud bucal para estudiantes y familias.", 8),
("Bibliotecarte", "Promoción de la lectura y donación de libros.", 9),
("Círculo de Apoyo", "Red de apoyo psicológico para jóvenes universitarios.", 10),
("Aliados Verdes", "Colectivo de estudiantes que impulsan la ecología en campus.", 11),
("Salud Primero", "Asociación que ofrece brigadas médicas gratuitas.", 12),
("Puentes de Conocimiento", "Voluntariado para impartir talleres y clases.", 13),
("Educando con Ciencia", "Divulgación científica en escuelas públicas.", 14),
("Red ProTech", "Fomento de habilidades tecnológicas en jóvenes.", 15),
("Fuerza Escolar", "Entrega de mochilas y útiles escolares en comunidades rurales.", 1),
("Esperanza Activa", "Voluntariado universitario para intervención comunitaria.", 2),
("Corazones Unidos", "Alimentos y ropa para familias vulnerables.", 3),
("Voces por la Igualdad", "Campañas de equidad de género en instituciones educativas.", 4),
("Aprendo Jugando", "Talleres lúdicos para educación básica.", 5),
("Manos Amigas", "Reparación de escuelas dañadas por desastres naturales.", 6),
("Ciencia para Todos", "Laboratorios móviles de ciencia para escuelas rurales.", 7),
("Red Solidaria", "Campañas de donación de sangre y salud comunitaria.", 8),
("Crece Conmigo", "Programa de alfabetización para adultos jóvenes.", 9),
("Conecta2", "Promoción del acceso a internet para estudiantes rurales.", 10),
("Pies Descalzos", "Donación de calzado para niños en zonas vulnerables.", 11),
("Un Libro Más", "Colecta de libros para bibliotecas comunitarias.", 12),
("Talento Local", "Impulso a proyectos de emprendimiento juvenil.", 13),
("Código Libre", "Capacitación gratuita en programación y software libre.", 14),
("CompuAyuda", "Donación y reparación de computadoras para escuelas.", 15);


--PROYECTO

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Huertos Urbanos", "Creación de huertos en zonas urbanas.", 0x00, 1);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Educación para Todos", "Campaña de educación primaria en zonas rurales.", 0x00, 2);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Reciclaje Comunitario", "Instalación de puntos de reciclaje en barrios.", 0x00, 1);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Laboratorio de Innovación", "Donación de equipos para el nuevo laboratorio de ingeniería.", 0x00, 1);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Biblioteca Digital", "Creación de una biblioteca digital accesible para todos los estudiantes.", 0x00, 2);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Becas Tecnológicas", "Fondo de becas para alumnos destacados en ingeniería y tecnología.", 0x00, 1);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Internet para Todos", "Instalación de puntos WiFi en las instalaciones del instituto.", 0x00, 2);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("EcoCampus", "Programa de reforestación y cuidado del medio ambiente en el campus.", 0x00, 1);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Aulas Inteligentes", "Implementación de pizarras digitales y proyectores en las aulas.", 0x00, 2);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Apoyo Psicológico", "Campaña de salud mental y atención psicológica para estudiantes.", 0x00, 1);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Alimentación Saludable", "Donación de insumos para comedores estudiantiles saludables.", 0x00, 2);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Inglés para Todos", "Cursos gratuitos de inglés para estudiantes de bajos recursos.", 0x00, 1);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Mujeres en la Ciencia", "Apoyo a la participación de mujeres en carreras científicas.", 0x00, 2);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Ciencia Itinerante", "Caravana de ciencia y tecnología en comunidades cercanas.", 0x00, 1);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Robótica Escolar", "Talleres y kits de robótica para estudiantes del tecnológico.", 0x00, 2);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Donación de Libros", "Campaña para donar libros a la biblioteca del instituto.", 0x00, 1);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Movilidad Sustentable", "Promoción del uso de bicicletas y transporte ecológico.", 0x00, 2);

INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario) 
VALUES ("Talleres de Programación", "Cursos intensivos de desarrollo de software para estudiantes.", 0x00, 1);


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
