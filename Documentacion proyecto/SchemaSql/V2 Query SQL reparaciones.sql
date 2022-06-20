use reparaciones; 
SELECT E.idEmpleado, E.nombre, E.apellidos, U.idUsuario, U.usuario, U.contrasenia, U.cargo  FROM empleados E
JOIN usuarios U
ON E.idUsuario = U.idUsuario
WHERE U.cargo != 'admin';

/*Contar equipos que tiene un empleado*/
SELECT E.idEmpleado, E.nombre, count(E.idEmpleado) as EquiposReparacion
FROM empleados E
JOIN equipos Eq
ON E.idEmpleado = Eq.idEmpleado
	where Eq.estado = 1
group by E.idEmpleado;

update empleados as E
JOIN usuarios as U
on E.idUsuario = U.idUsuario
set E.nombre = 'Fernando', E.apellidos = 'Rojas', U.usuario = 'Fernando', U.contrasenia = '123'
where U.idUsuario = 50;

delete from empleados
	where idUsuario = 50; 
delete from usuarios
	where idUsuario = 50; 

delete from empleados 
where idEmpleado>=58;

delete from usuarios 
where idUsuario>=46; 

select * from usuarios; 

SELECT * FROM usuarios WHERE usuario = 'cperez' AND contrasenia = '123qwe'; 


/*Registrar empleado con usuario*/
insert into usuarios(usuario, contrasenia, cargo) values ('frojas', 'qweasd', 'tecnico');
insert into empleados(nombre, apellidos, idUsuario) values('Fernanda','Rojas', 50); 

SELECT E.idEmpleado, E.nombre, U.usuario, U.cargo  
FROM empleados E
INNER JOIN usuarios U ON E.idUsuario = U.idUsuario
WHERE u.usuario = 'cperez' AND u.contrasenia = '123qwe';

insert into clientes(nombre,idEmpleado) values('Zuriel Lopez', 50); 
select  * from clientes; 
insert into equipos(marca, modelo,observaciones,estado,idCliente,idEmpleado) 
values('Apple', 'Iphone 7 plus ', 'Falla centro de carga', 0,5,50);


/*Consulta para cargar los equipos en reparación*/
SELECT E.idEmpleado, E.nombre, C.nombre, Eq.marca, Eq.modelo, Eq.observaciones, Eq.estado
FROM empleados E
JOIN clientes C 
	ON (E.idEmpleado = C.idEmpleado)
JOIN equipos Eq 
	ON (Eq.idCliente = C.idCliente)
    WHERE Eq.estado = 1
group by C.nombre; 

/*Consulta para cargar los equipos en reparación*/
SELECT E.idEmpleado, E.nombre, E.apellidos, count(Eq.idEmpleado) as equiposEnReparacion
FROM empleados E
JOIN clientes C 
	ON (E.idEmpleado = C.idEmpleado)
JOIN equipos Eq 
	ON (Eq.idCliente = C.idCliente)
    WHERE Eq.estado = 1
group by Eq.idEmpleado; 
