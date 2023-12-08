<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/screen.css">
    <script src="js/validar.js"></script>
    

    
</head>
<body>

<section class="content ">
    <div class="container p-4">
        <div class="row">
        <div class="col-3">
       
        </div>
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registro de Usuario</h3>
              </div>

              <form id="frmUsuario" name= "frmUsuario" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de Usuario</label>
                    <input type="text" name="nomUsuario" class="form-control" id="nomUsuario" placeholder="user" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" name="password1" class="form-control" id="password1" placeholder="Password" required>
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirmar contraseña</label>
                    <input type="password" name="password2" class="form-control" id="password2" placeholder="Password" required>
                    <span id="error2"></span>
                  </div>
      
                
                
                  <div class="form_group">
                        <label for="exampleFormControlInput1" class="form-label">Tipo de Usuario</label>
                        <select   id="tipoUser" name="tipoUser">
                        <option value="ADM">Administrador</option>
                        <option value="OPR">Operador</option>
                        <option value="INV">Invitado</option>
                        </select>
                    </div>
                  
            
                  <div class="form-group">
                    <label for="cboempleados">Empleado</label>
                    <select name='cboempleados' id='cboempleados'>
                    <!-- obtener la lista de todos los empleados -->
                    <?php
                       /*
                        $conexion= new mysqli("localhost","root","","bdequipos");
                        $consempleados=$conexion->query("select * from templeado where idemp not in (select idempleado from tusuario)");
                        while ($filaemp=$consempleados->fetch_object()) {
                          echo "<option value='$filaemp->idemp'>$filaemp->apellidos $filaemp->nombres</option>";
                        }
                        */
                    ?>
                    </select>

                  </div>
                  </div>
                </div>
                <div class="card-footer">
                  <input type="submit" name="btnRegistrar" value="Registrar" >
                </div>
              </form>
            </div>
            </div>

          <div class="col-md-6">

          </div>

        </div>
      </div>
    </section>





</body>
</html>