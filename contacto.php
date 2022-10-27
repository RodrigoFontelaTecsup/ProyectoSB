<?php include("template/cabecera.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ponte en contacto con nosotros!
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="name" placeholder="First name">
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" class="form-control" name="lastName" placeholder="Last name">
                        </div>
                        <div class="form-group">
                            <label>Correo electronico</label>
                            <input type="email" class="form-control" name="email" placeholder="Your email">
                        </div>
                        <div class="form-group">
                            <label>Mensaje</label>
                            <input style="height: 200px;" type="text" class="form-control" name="mensaje">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" onclick="alert('Mensaje enviado! Muchas gracias por contactar con nosostros!');">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("template/footer.php"); ?>