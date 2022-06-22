document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("registrarEmpleado").addEventListener('submit', validarEmpleado);
});

function validarEmpleado(evento) {
  evento.preventDefault();
  var nobmre = document.getElementById('nombre').value;
  var apellidos = document.getElementById('apellidos').value;
  var usuario = document.getElementById('usuario').value;
  var contrasenia = document.getElementById('contrasenia').value;
  if (nobmre.length == 0 || apellidos.length == 0) { 
    alert('Verifique los datos del empleado');
    return;
  }
  if(usuario.length == 0 || contrasenia.length < 3) {
    alert('Nombre de usuario mayor a tres caracteres');
    return; 
  }
  this.submit();
}

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("formLogin").addEventListener('submit', validarLogin);
});

function validarLogin(evento) {
  evento.preventDefault();
  var usuario = document.getElementById('usuario').value;
  var contrasenia = document.getElementById('contrasenia').value;
  if (usuario.length == 0 || contrasenia.length < 3 ) {
    alert('Verifique los campos');
    return;
  }
  this.submit();
}


document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("formReparacion").addEventListener('submit', validarReparacion);
});

function validarReparacion(evento) {
  evento.preventDefault();
  var nobmre = document.getElementById('nombreRepara').value;
  var marca = document.getElementById('marcaRepara').value;
  var modelo = document.getElementById('modeloRepara').value;
  var coment = document.getElementById('comentariosRepara').value;
  var asignar = document.getElementById('asignarRepara').value;
  if (nobmre.length == 0) { 
    alert('Verifique los datos del cliente');
    return;
  }
  if(marca.length == 0 || modelo.length == 0|| coment.length == 0  || asignar.length == 0) {
    alert('No deje campos vacios');
    return; 
  }
  this.submit();
}