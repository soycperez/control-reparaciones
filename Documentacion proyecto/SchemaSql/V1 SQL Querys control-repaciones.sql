use control_reparaciones; 
select E.nombre, E.apellidos, U.username, U.password, U.cargo
from usuarios U, empleados E
Where U.idUsuario = E.idUsuario; 