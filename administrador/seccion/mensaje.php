<?php include("../template/cabecera.php"); ?>
<form>
    <div class="form-group">
        <label style="font-size: 19pt;" for="exampleInputEmail1">Ingrese el mensaje</label>
        <br>
        <textarea style="font-size: 16pt;font-weight: bold;letter-spacing: 5px; border: 7px solid black;"
            name="mensajito" id="mensajito" cols="30" rows="10"></textarea>
    </div>
    <button name="botonsito" type="submit" class="btn btn-primary" onclick="alert('Mensaje enviado correctamente!');">Enviar</button>
</form>
<?php include("../template/footer.php"); ?>