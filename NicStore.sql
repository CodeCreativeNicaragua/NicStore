create database NicStore;
use NicStore;

CREATE TABLE grado (
  id int NOT NULL primary key auto_increment,
  nombre varchar(30) NOT NULL,
  condicion tinyint(4) NOT NULL,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  created_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `nicstore`.`grado` (`nombre`, `condicion`) VALUES ('1er grado', '1');
INSERT INTO `nicstore`.`grado` (`nombre`, `condicion`) VALUES ('2do grado', '1');



-- tabla de asignaturas

CREATE TABLE asignatura (
  id int NOT NULL primary key auto_increment,
  nombre varchar(30) NOT NULL,
  condicion tinyint(2) NOT NULL,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  created_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `nicstore`.`asignatura` (`nombre`, `condicion`) VALUES ('Español', '1');
INSERT INTO `nicstore`.`asignatura` (`nombre`, `condicion`) VALUES ('Matematica', '1');
INSERT INTO `nicstore`.`asignatura` (`nombre`, `condicion`) VALUES ('Ciencias Naturales', '1');
INSERT INTO `nicstore`.`asignatura` (`nombre`, `condicion`) VALUES ('Ciencias Sociales', '1');


CREATE TABLE unidad (
  id int(11) NOT NULL primary key auto_increment,
  nombre varchar(45) NOT NULL,
  condicion tinyint(4) NOT NULL,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  created_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `nicstore`.`unidad` (`nombre`, `condicion`) VALUES ('Unidad I', '1');


create table tema(
id int not null primary key auto_increment,
nombre varchar(30) not null,
condicion tinyint (30) not null,
updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
created_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `nicstore`.`tema` (`nombre`, `condicion`) VALUES ('Letra a', '1');

-- Relacion Grado y asignatura

CREATE TABLE gradoasignatura (
  id int(11) NOT NULL primary key auto_increment,
  idgrado int(11) NOT NULL,
  idasignatura int(11) NOT NULL,

  constraint idgrado
  foreign key (idgrado)
  references grado(id)

  on delete cascade
  on update cascade,

  constraint idasignatura
  foreign key (idasignatura)
  references asignatura(id)

  on delete cascade
  on update cascade


) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Relacion de grados con las asignaturas
INSERT INTO `nicstore`.`gradoasignatura` (`idgrado`, `idasignatura`) VALUES ('1', '1');
INSERT INTO `nicstore`.`gradoasignatura` (`idgrado`, `idasignatura`) VALUES ('1', '2');
INSERT INTO `nicstore`.`gradoasignatura` (`idgrado`, `idasignatura`) VALUES ('1', '3');
INSERT INTO `nicstore`.`gradoasignatura` (`idgrado`, `idasignatura`) VALUES ('1', '4');

-- relacion de segundo grado con la asignatura
INSERT INTO `nicstore`.`gradoasignatura` (`idgrado`, `idasignatura`) VALUES ('2', '1');



-- Relacion Grado y asignatura

CREATE TABLE unidadtema (
  id int(11) NOT NULL primary key auto_increment,
  idunidad int(11) NOT NULL,
  idtema int(11) NOT NULL,

  constraint idunidad
  foreign key (idunidad)
  references unidad(id)

  on delete cascade
  on update cascade,

  constraint idtema
  foreign key (idtema)
  references tema(id)

  on delete cascade
  on update cascade
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Relacionando grados, asignaturas, unidad y tema
create table gaut(
id int primary key auto_increment not null,
idgrado int not null,
idasignatura int not null,
idunidad int not null,
idtema int not null,

  constraint idgrado
  foreign key (idgrado)
  references grado(id)

  on delete cascade
  on update cascade,

  constraint idasignatura
  foreign key (idasignatura)
  references asignatura(id)

  on delete cascade
  on update cascade,

constraint idunidad
  foreign key (idunidad)
  references unidad(id)

  on delete cascade
  on update cascade,

  constraint idtema
  foreign key (idtema)
  references tema(id)

  on delete cascade
  on update cascade
)ENGINE=InnoDB  DEFAULT CHARSET=latin1;


-- tabla de recursos
CREATE TABLE recurso (
  id int  NOT NULL primary key auto_increment,
  nombre varchar(30) NOT NULL,
  descripcion varchar(100) NOT NULL,
  imagen varchar(50) NOT NULL,
  condicion tinyint(4) NOT NULL,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  created_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- tabla de desarrollador
CREATE TABLE desarrollador (
  id int NOT NULL primary key auto_increment,
  primernombre varchar(30) NOT NULL,
  segundonombre varchar(30) DEFAULT NULL,
  primerapellido varchar(30) NOT NULL,
  segundoapellido varchar(30) DEFAULT NULL,
  imagen varchar(50) NOT NULL default 'avatar.png',
  correo varchar(30) DEFAULT NULL,
  celular int(8) DEFAULT NULL,
  estado varchar(25) NOT NULL,
  condicion tinyint(4) NOT NULL,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  created_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- tabla de relacion de recursos con el desarrollador quien lo hizo

CREATE TABLE recurso_desarrollador (
  id int NOT NULL primary key auto_increment,
  idrecurso int  NOT NULL,
  iddesarrollador int NOT NULL,
  condicion tinyint(2) NOT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE migrations (
  id int(10) UNSIGNED NOT NULL,
  migration varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- Volcado de datos para la tabla `migrations`
--

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);



CREATE TABLE password_resets (
  email varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  token varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO password_resets (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '123456789', '2017-02-18 07:51:16');



CREATE TABLE tipousuario (
  id int(11) NOT NULL,
  nombre varchar(20) NOT NULL,
  nivelAcceso int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE users (
  id int NOT NULL primary key auto_increment,
  name varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  email varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  password varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  remember_token varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  segundonombre varchar(30) DEFAULT NULL,
  primerapellido varchar(30)  NULL,
  segundoapellido varchar(30) DEFAULT NULL,
  imagen varchar(50) NULL default 'avatar.png',
  celular int(8) DEFAULT NULL,
  condicion tinyint(2) NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--
--------------------------------------------------



CREATE TABLE usuarios (
  `id` int(11) NOT NULL,
  `usuario` varchar(8) NOT NULL,
  `contraseña` varchar(15) NOT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `actualzacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SELECT grado.nombre, asignatura.nombre,unidad.nombre,tema.nombre FROM nicstore.gaut
inner join grado on grado.id= gaut.idgrado
inner join asignatura on asignatura.id= gaut.idasignatura
inner join unidad on unidad.id= gaut.idunidad
inner join tema on tema.id= gaut.idtema where unidad.id=1;
