DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
    id_usuario VARCHAR(20) PRIMARY KEY,
    nombre_usuario VARCHAR(20) UNIQUE,
    email VARCHAR(40) UNIQUE,
    monedas NUMBER(6) DEFAULT 100,
    fecha_creacion_usuario DEFAULT CURRENT_DATE,
    juego_favorito VARCHAR(20) DEFAULT '',
    password_hash VARCHAR(40),
    rol VARCHAR(10) CHECK (estado IN ('usuario', 'admin')) DEFAULT 'usuario';
);

INSERT INTO usuarios VALUES('1', 'admin', 'joseguille.jbc@gmail.com', 0, CURRENT_DATE, '-', 'contraseña hasheada', 'admin');

ALTER TABLE public.usuarios ENABLE ROW LEVEL SECURITY;

DROP TABLE IF EXISTS amigos;

CREATE TABLE amigos (
    id_usuario_1 VARCHAR(20) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
    id_usuario_2 VARCHAR(20) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
    aceptada BOOLEAN DEFAULT FALSE,  -- Indica si la solicitud de amistad fue aceptada
    PRIMARY KEY (id_usuario_1, id_usuario_2)
);

ALTER TABLE public.amigos ENABLE ROW LEVEL SECURITY;
