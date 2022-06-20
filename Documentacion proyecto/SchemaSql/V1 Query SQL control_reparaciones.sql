create database control_reparaciones;

use control_reparaciones; 

create table usuarios(
	idUsuario int not null primary key auto_increment, 
    username varchar(100) not null, 
    cargo varchar(8) not null,
    password varchar(10) not null
);

create table empleados(
	idEmpleado int not null primary key auto_increment, 
    nombre varchar(50) not null, 
    apellidos varchar(50) not null, 
    idUsuario int not null,
    foreign key (idUsuario) references usuarios(idUsuario)
);

create table clientes(
		idCliente int not null primary key auto_increment, 
        nombre varchar(50) not null, 
        apellidos varchar(50) not null, 
        fechaInicio date not null, 
        fechaEntregado date not null, 
        idEmpleado int not null, 
        foreign key (idEmpleado) references empleados(idEmpleado) 
);

create table estados(
	idEstado int not null primary key auto_increment, 
    estado varchar(10) not null, 
    idEmpleado int not null, 
    foreign key (idEmpleado) references empleados(idEmpleado)
);

create table equipos(
	idEquipo int not null primary key auto_increment, 
    lineaApple varchar(50) not null, 
    numModelo varchar(20) not null, 
    numSerial varchar(30) not null, 
    imei varchar(50) not null,
    idEmpleado int not null, 
    idCliente int not null, 
    idEstado int not null, 
    foreign key (idEmpleado) references empleados(idEmpleado), 
    foreign key (idCliente) references clientes(idCliente), 
    foreign key (idEstado) references estados(idEstado)
);

create table imagenes(
	idImagen int not null primary key auto_increment, 
    imagen varchar(150), 
    idEquipo int not null, 
    foreign key (idEquipo) references equipos(idEquipo)
);








