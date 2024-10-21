CREATE TABLE usuarios(
    id_usuario INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    correo     VARCHAR (255) NOT NULL UNIQUE KEY,
    password   VARCHAR (255) NOT NULL,

    fyh_creacion DATETIME NOT NULL,
    fyh_actualizacion DATETIME NOT NULL,
    estado VARCHAR (11)

)ENGINE=InnoDB;

INSERT INTO usuarios (correo, password, fyh_creacion, estado)
VALUES ('mylton20@gmail.com', '$2y$10$m6jG.SzwuXTopEVUSBtBauhFTG02/aZF3qU7IqUmccvRACK2Ljfrq', '2024-10-19 14:31:00', '1');

CREATE TABLE personas(
    id_persona INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT (11) NULL,
    nombres    VARCHAR (255) NOT NULL,
    apellido   VARCHAR (255) NOT NULL,
    dni        INT (11) NOT NULL,
    direccion  VARCHAR (255) NOT NULL,
    fecha_nacimiento DATETIME NOT NULL,

    fyh_creacion DATETIME NOT NULL,
    fyh_actualizacion DATETIME NOT NULL,
    estado VARCHAR (11),

    FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario) ON DELETE NO ACTION ON UPDATE CASCADE

)ENGINE=InnoDB;

INSERT INTO personas (usuario_id, nombres, apellido, dni, direccion, fecha_nacimiento, fyh_creacion, estado)
VALUES ('1', 'Milton Exequiel', 'De Biase', '35468441', 'French 2275', '1990-12-12', '2024-10-19 18:52:00', '1' );

CREATE TABLE personas_sin_usuarios (
    id_persona INT (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombres    VARCHAR (255) NOT NULL,
    apellido   VARCHAR (255) NOT NULL,
    dni        INT (11) NOT NULL,
    direccion  VARCHAR (255) NOT NULL,
    fecha_nacimiento DATETIME NOT NULL,

    fyh_creacion DATETIME NOT NULL,
    fyh_actualizacion DATETIME NOT NULL,
    estado VARCHAR (11)
)ENGINE=InnoDB;


CREATE TABLE armas(
    id_armas INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    marca    VARCHAR (100) NOT NULL,
    modelo   VARCHAR (100) NOT NULL,
    num_serie INT (11) NOT NULL,
    cant_cargadores INT (5) NOT NULL,
    cant_municiones INT (5) NOT NULL,

    fyh_creacion DATETIME NOT NULL,
    fyh_actualizacion DATETIME NOT NULL,
    estado VARCHAR (11)
)ENGINE=InnoDB;

CREATE TABLE chalecos(
    id_chalecos INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nivel_proteccion    VARCHAR (100) NOT NULL,
    num_serie INT (11) NOT NULL,
    lote INT (5) NOT NULL,
    talle VARCHAR (5) NOT NULL,
    fecha_fabricacion DATETIME NOT NULL,

    fyh_creacion DATETIME NOT NULL,
    fyh_actualizacion DATETIME NOT NULL,
    estado VARCHAR (11)
)ENGINE=InnoDB;

CREATE TABLE policias(
    id_policia INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id INT (11) NOT NULL,
    armas_id INT (11) NOT NULL,
    chalecos_id INT (11) NOT NULL,
    ni         INT (11) NOT NULL UNIQUE,
    jerarquia  VARCHAR (255) NOT NULL,
    fecha_nacimiento DATETIME NOT NULL,

    fyh_creacion DATETIME NOT NULL,
    fyh_actualizacion DATETIME NOT NULL,
    estado VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas_sin_usuarios (id_persona) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (armas_id) REFERENCES armas (id_armas) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (chalecos_id) REFERENCES chalecos (id_chalecos) ON DELETE NO ACTION ON UPDATE CASCADE

)ENGINE=InnoDB;
