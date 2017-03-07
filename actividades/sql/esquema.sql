//usuario wp
//contraseña wp

create table grupo (
    idgrupo int auto_increment,
    nombre varchar(16) unique,
    nivel varchar(16),
    CONSTRAINT pk_id PRIMARY KEY (idgrupo)
) engine=innodb  default charset=utf8 collate=utf8_unicode_ci;

create table profesor (
    idprofesor int auto_increment,
    dni varchar(15) not null unique,
    password varchar(16) not null,
    nombre varchar(16),
    tipo enum('directivo', 'profesor') not null default 'profesor',
    departamento varchar(20) not null,
    CONSTRAINT pk_id PRIMARY KEY (idprofesor)
) engine=innodb  default charset=utf8 collate=utf8_unicode_ci;

create table actividades (
    idactividades int auto_increment primary key,
    idprofesor int,
    idgrupo int,
    titulo varchar(50),
    descripcion text,
    fecha date not null,
    horainicio datetime not null,
    horafinal datetime not null,
    imagen blob,
    CONSTRAINT FK_idprofesor FOREIGN KEY (idprofesor)     
    REFERENCES profesor (idprofesor),
    CONSTRAINT FK_idgrupo FOREIGN KEY (idgrupo)     
    REFERENCES grupo (idgrupo)
) engine=innodb  default charset=utf8 collate=utf8_unicode_ci;

INSERT INTO `profesor`(`dni`, `password`, `nombre`, `tipo`) VALUES ("76669842Z","123123","Aurora","profesor","informarica");
INSERT INTO `profesor`(`dni`, `password`, `nombre`, `tipo`) VALUES ("45433235T","root","Director","directivo","direccion");
