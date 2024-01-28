CREATE TABLE usuarios(
   id_usuario INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   nombres VARCHAR (255) NOT NULL,
   cargo VARCHAR (255) NOT NULL,
   email VARCHAR (255) NOT NULL UNIQUE KEY,
   password TEXT NOT NULL,
   fyh_creacion DATETIME NULL,
   fyh_actualizacion DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   estado varchar(11);

)ENGINE=InnoDB;
INSERT INTO `sistemagestion`.`usuarios` (
    `nombres`,`cargo`,`email`,`password`,`fyh_creacion`,`estado`
)
VALUES
    ('Jesus Dario Rodriguez','Administrador','admin@admin.com','5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5','2024-01-26 20:29:10','1');

CREATE TABLE roles(
   id_rol INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   nombre_rol VARCHAR (255) NOT NULL UNIQUE KEY,
   
   fyh_creacion DATETIME NULL,
   fyh_actualizacion DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
   estado varchar(11)
)
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('Administrador','2024-01-27 01:00:10','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('Director','2024-01-27 01:00:10','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('Docente','2024-01-27 01:00:10','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('Administrativo','2024-01-27 01:00:10','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('Estudiante','2024-01-27 01:00:10','1');
