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

/* ADMINISTRADORES DE LA PAGINA WEB  */
INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Uriel Vallejo Xicalhua', 'Vallejo123', 'uriel@admin.com', 'administrador', 'UVXA880202XXX', 'Calle 5 de Mayo 456, Ixhuatlancillo');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Carlos Ivan Flores Sanchez', 'Carlos123', 'carlos@admin.com', 'administrador', 'CIFS880202XXX', 'Calle independencia 500, Mendoza');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Jesus Antonio Morales de Jesus', 'Antonio123', 'antonio@admin.com', 'administrador', 'JAMJ880202XXX', 'Calle sur 9, Cordoba');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Edwin Ariel Ramos Alvarez', 'Edwin123', 'edwin@admin.com', 'administrador', 'EARA880202XXX', 'Calle norte 10, Cordoba');

INSERT INTO Usuario (sNombreC, sPassword, sEmail, sRol, sRfc, sDomicilio) 
VALUES ('Saul Lima Gonzalez', 'Lima123', 'lima@admin.com', 'administrador', 'SLGA880202XXX', 'Avenida 11, Orizaba');



/*PROYECTOS REALES PARA EL TECNOLOGICO DE ORIZABA


PROYECTO 1 
Nombre:Expansión bibliográfica 
Descripción: Mejorar la biblioteca con nuevos libros, material digital 
y espacios de estudio modernos para facilitar el aprendizaje y la
investigación.

PROYECTO 2 
Nombre: Aulas digitales
Descripción: Equipamiento con pantallas interactivas, proyectores
y herramientas digitales para una educación más dinámica y accesible.

PROYECTO 3 
Nombre: Renovación centro de cómputo 
Descripción: Adquirir computadoras y software actualizado para 
impulsar el desarrollo tecnológico y la formación de estudiantes 
en programación y análisis.

PROYECTO 4 
Nombre: Laboratorio de química
Descripción: Dotar de reactivos y equipos modernos para que los estudiantes realicen prácticas avanzadas 
y experimentos seguros.

PROYECTO 5 
Nombre: Modernización mecánica 
Descripción:Adquirir maquinaria y herramientas de precisión para mejorar
el aprendizaje en diseño y manufactura de piezas mecánicas.

PROYECTO 6 
Nombre:Laboratorio de electricidad 
Descripción: Equipar el laboratorio con herramientas de medición y 
simulación para el desarrollo de proyectos eléctricos eficientes.

PROYECTO 7 
Nombre: Innovación electrónica 
Descripción: Dotar el laboratorio con software y equipos para el 
diseño y prueba de circuitos en aplicaciones tecnológicas.

PROYECTO 8 
Nombre:Digitalización administrativa
Descripción: Optimizar procesos administrativos con tecnología para 
mejorar la gestión de trámites y documentos.

PROYECTO 9 
Nombre: Fortalecimiento del posgrado
Descripción: Crear espacios con herramientas de investigación avanzadas 
para el desarrollo de proyectos innovadores.

PROYECTO 10 
Nombre: Sanitarios renovados
Descripción: Mejorar la infraestructura de sanitarios, optimizando 
el ahorro de agua y garantizando espacios limpios y funcionales.

PROYECTO 11 
Nombre:  Mejoras en el estadio
-Descripción: Renovar el césped, iluminación y áreas de entrenamiento 
para brindar mejores condiciones a atletas y eventos deportivos.

PROYECTO 12 
Nombre: Preservación de áreas verdes
Descripción: Reforestar y mejorar los jardines del campus para 
generar un espacio saludable y ecológico para todos.

*/
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
/* BENEFICIARIOS PARA CADA PROYECTO

PROYECTO 1 

Beneficiario 1 
-Nombre: Estudiantes en formación académica 
-Descripción: Alumnos de todas las carreras que necesitan acceso a una biblioteca 
actualizada con libros especializados en ciencia, tecnología y humanidades. 
-idProyecto: 1

Beneficiario 2 
-Nombre: Investigadores y docentes
-Descripción: Profesores y académicos que requieren materiales de investigación y referencias científicas
para la creación de nuevos conocimientos. 
-idProyecto: 1

Beneficiario 3 
-Nombre: Comunidad estudiantil en general 
-Descripción: Espacio de consulta y aprendizaje donde todos los estudiantes pueden 
fortalecer sus conocimientos con libros y material digital accesible. 
-idProyecto: 1

PROYECTO 2

Beneficiario 1 
-Nombre: Estudiantes de ingeniería y tecnología 
-Descripción: Alumnos de carreras técnicas que requieren herramientas digitales para simulaciones y prácticas interactivas en sus materias. 
-idProyecto: 2

Beneficiario 2 
-Nombre: Profesores que aplican metodologías innovadoras 
-Descripción: Docentes que buscan mejorar la enseñanza con recursos multimedia, pizarras digitales y plataformas interactivas. 
-idProyecto: 2

Beneficiario 3 
-Nombre: Nuevos aspirantes y futuros estudiantes 
-Descripción: Jóvenes interesados en estudiar en el Tecnológico de Orizaba que buscan espacios de aprendizaje adaptados a la era digital. 
-idProyecto: 2


PROYECTO 3

Beneficiario 1 
-Nombre: Estudiantes de informática y sistemas computacionales 
-Descripción: Alumnos que requieren computadoras con software actualizado para el desarrollo de proyectos, programación y análisis de datos. 
-idProyecto: 3

Beneficiario 2 
-Nombre: Equipos de investigación en tecnología 
-Descripción: Docentes y estudiantes que trabajan en el desarrollo de proyectos digitales y necesitan un espacio equipado con herramientas avanzadas. 
-idProyecto: 3

Beneficiario 3 
-Nombre: Emprendedores y desarrolladores 
-Descripción: Jóvenes con ideas de negocio basadas en tecnología que pueden usar el centro de cómputo para crear sus propias aplicaciones y sistemas. 
-idProyecto: 3


PROYECTO 4

Beneficiario 1 
-Nombre: Estudiantes de ingeniería química y ambiental 
-Descripción: Alumnos que realizan experimentos y necesitan reactivos, equipos de medición y herramientas de análisis avanzadas. 
-idProyecto: 4

Beneficiario 2 
-Nombre: Profesores y expertos en química aplicada 
-Descripción: Docentes que enseñan química experimental y buscan mejorar las prácticas de laboratorio con equipos modernos. 
-idProyecto: 4

Beneficiario 3 
-Nombre: Industria y desarrollo tecnológico 
-Descripción: Empresas y organizaciones que colaboran con el Tecnológico de Orizaba para el desarrollo de nuevas soluciones químicas y materiales innovadores. 
-idProyecto: 4

PROYECTO 5

Beneficiario 1 
-Nombre: Estudiantes de ingeniería mecánica 
-Descripción: Alumnos que realizan pruebas con materiales y necesitan acceso a maquinaria de precisión para mejorar sus proyectos. 
-idProyecto: 5

Beneficiario 2 
-Nombre: Profesionales en diseño industrial 
-Descripción: Especialistas que utilizan el laboratorio para desarrollar prototipos de piezas y estructuras con las tecnologías más avanzadas. 
-idProyecto: 5

Beneficiario 3 
-Nombre: Empresas del sector manufacturero 
-Descripción: Industrias que buscan vinculación con el Tecnológico para mejorar procesos de producción y probar materiales en condiciones óptimas. 
-idProyecto: 5

PROYECTO 6

Beneficiario 1 
-Nombre: Estudiantes de ingeniería eléctrica 
-Descripción: Jóvenes en formación que requieren equipos de medición y simulación para el análisis de circuitos y sistemas eléctricos modernos. 
-idProyecto: 6

Beneficiario 2 
-Nombre: Profesores especializados en energía 
-Descripción: Docentes que imparten clases de generación, distribución y eficiencia energética, mejorando la enseñanza con tecnología avanzada. 
-idProyecto: 6

Beneficiario 3 
-Nombre: Industria eléctrica y energías renovables 
-Descripción: Empresas que buscan talento joven preparado en el manejo de energías limpias y proyectos de innovación eléctrica. 
-idProyecto: 6

PROYECTO 7

Beneficiario 1 
-Nombre: Estudiantes de electrónica y mecatrónica 
-Descripción: Alumnos que diseñan, prueban y optimizan circuitos electrónicos en diversas aplicaciones tecnológicas. 
-idProyecto: 7

Beneficiario 2 
-Nombre: Docentes en sistemas embebidos 
-Descripción: Profesores que enseñan el desarrollo de dispositivos electrónicos y requieren herramientas para prácticas avanzadas. 
-idProyecto: 7

Beneficiario 3 
-Nombre: Startups tecnológicas 
-Descripción: Empresas emergentes que pueden utilizar el laboratorio para el desarrollo de prototipos y pruebas de nuevos dispositivos electrónicos. 
-idProyecto: 7

PROYECTO 8

Beneficiario 1 
-Nombre: Estudiantes y personal administrativo 
-Descripción: Todos los usuarios del campus que necesitan una administración más ágil y eficiente para gestionar trámites de manera digital. 
-idProyecto: 8

Beneficiario 2 
-Nombre: Profesores y gestores académicos 
-Descripción: Docentes que manejan documentación académica y administrativa, beneficiándose de un sistema digital optimizado. 
-idProyecto: 8

Beneficiario 3 
-Nombre: Nuevos aspirantes y visitantes 
-Descripción: Personas que desean ingresar al Tecnológico y requieren procesos administrativos más accesibles y rápidos. 
-idProyecto: 8

PROYECTO 9

Beneficiario 1 
-Nombre: Estudiantes de maestría y doctorado 
-Descripción: Jóvenes investigadores que desarrollan soluciones innovadoras y requieren equipos y espacios especializados. 
-idProyecto: 9

Beneficiario 2 
-Nombre: Profesores y líderes de investigación 
-Descripción: Académicos que dirigen proyectos y necesitan herramientas avanzadas para guiar el desarrollo de nuevas tecnologías. 
-idProyecto: 9

Beneficiario 3 
-Nombre: Empresas colaboradoras en innovación 
-Descripción: Organizaciones que trabajan en conjunto con el Tecnológico para impulsar proyectos de alta complejidad y valor científico. 
-idProyecto: 9

PROYECTO 10

Beneficiario 1 
-Nombre: Estudiantes y profesores 
-Descripción: Toda la comunidad estudiantil y académica que necesita sanitarios limpios, funcionales y ecológicos para su bienestar. 
-idProyecto: 10

Beneficiario 2 
-Nombre: Personal de mantenimiento 
-Descripción: Trabajadores encargados de la limpieza y mantenimiento que requieren una infraestructura más eficiente y de fácil gestión. 
-idProyecto: 10

Beneficiario 3 
-Nombre: Visitantes del campus 
-Descripción: Personas externas que usan las instalaciones y necesitan contar con servicios sanitarios adecuados en cada área. 
-idProyecto: 10

PROYECTO 11

Beneficiario 1 
-Nombre: Equipos deportivos y atletas del campus 
-Descripción: Estudiantes que practican diversas disciplinas y necesitan condiciones óptimas para entrenamiento y competencia. 
-idProyecto: 11

Beneficiario 2 
-Nombre: Organizadores de eventos deportivos 
-Descripción: Administradores que coordinan torneos y requieren infraestructura adecuada para actividades de gran escala. 
-idProyecto: 11

Beneficiario 3 
-Nombre: Comunidad universitaria 
-Descripción: Estudiantes, profesores y visitantes que disfrutan del deporte y actividades físicas en un entorno renovado y funcional. 
-idProyecto: 11

PROYECTO 12

Beneficiario 1 
-Nombre: Estudiantes comprometidos con el medio ambiente 
-Descripción: Jóvenes que impulsan proyectos ecológicos y necesitan áreas verdes saludables para realizar actividades sostenibles. 
-idProyecto: 12

Beneficiario 2 
-Nombre: Profesores de impacto ambiental 
-Descripción: Académicos que fomentan el respeto por el medio ambiente y trabajan en iniciativas de conservación del ecosistema. 
-idProyecto: 12

Beneficiario 3 
-Nombre: Comunidad y habitantes cercanos 
-Descripción: Personas que se benefician de espacios verdes mejorados en el campus, contribuyendo a la calidad del aire y bienestar urbano. 
-idProyecto: 12
*/