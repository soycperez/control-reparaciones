<div>
        <form method="post" id="registrarEmpleado" action="Consultas/registrarEmpleado.php">
            Nombre: <input type="text" id="nombre" name="nombre">
            Apellidos: <input type="text" id="apellidos" name="apellidos">
            <label>Cargo: </label>
            <select id="cargo" name="cargo">
                <option value="tecnico">Tecnico</option>
                <option value="admin">Administrador</option>
            </select>
            <br><br>
            Usuario: <input type="text" id="usuario" name="usuario">
            Contraseña: <input type="password" id="contrasenia" name="contrasenia">
            <input type="submit">
        </form>
    </div>
