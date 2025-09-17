<div class="contenedor reestablecer">

    <?php include_once __DIR__ . "/../templates/nombre-sitio.php"; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Coloca tu nuevo password</p>

        <form action="/reestablecer" class="formulario" method="POST">

            <div class="campo">
                <label for="password">Password</label>
                <input 
                type="password"
                id="password"
                name="password"
                placeholder="Tu Password">
            </div>

            <input type="submit" class="boton" value="Guardar Password ">
        </form>

        <div class="acciones">
            <a href="/crear">Aún no tienes una cuenta? obtener una</a>
            <a href="/olvide">Olvidaste tu Password?</a>
        </div>
    </div> <!-- contenedor-sm -->
</div>