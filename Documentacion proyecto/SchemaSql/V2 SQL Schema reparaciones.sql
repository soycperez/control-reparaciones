create database reparaciones; 
use reparaciones; 

create table usuarios(
	idUsuario int primary key auto_increment not null, 
    usuario varchar(50) not null, 
    contrasenia varchar(50) not null, 
    cargo varchar(10)    
);



create table empleados(
	idEmpleado int primary key auto_increment not null, 
    nombre varchar(50) not null, 
    apellidos varchar(50) not null, 
    idUsuario int not null, 
    foreign key(idUsuario) references usuarios(idUsuario)
);

create table clientes(
	idCliente int primary key auto_increment not null, 
    nombre varchar(80) not null, 
    idEmpleado int not null, 
    foreign key (idEmpleado) references empleados(idEmpleado)
);

create table equipos(
	idEquipo int primary key auto_increment not null, 
    marca varchar(50) not null, 
    modelo varchar(50) not null, 
    observaciones varchar(250) not null, 
    estado bit not null, 
    idCliente int not null, 
    idEmpleado int not null,
    foreign key (idCliente ) references clientes(idCliente),
    foreign key (idEmpleado ) references empleados(idEmpleado)
); 

drop table equipos;