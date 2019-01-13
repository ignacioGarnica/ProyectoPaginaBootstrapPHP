<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Velvet Contratista y Proveedora de Software</title>
    <link rel="icon" type="image/png" href="includes/images/logo.png"/>
    <link rel="stylesheet" type="text/css" href="includes/css/estilosBusquedaygestion.css">

    <script type="text/javascript" src="includes/js/bootstrap.js"></script>
    <script type="text/javascript" src="includes/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="includes/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    
    <section class="container-fluid" id="cabezera">
        <div class="row" id="cabeza">
            <div id="titulo">
                <div class="col-sm-2" >
                    <img src="includes/css/images/logo_velvet.png" id="logo_cabezera">
                </div>
                <div class="col-sm-10" id="title_cabezera">
                    <h1 class="display-1 ">Velvet</h1><h4 class="display-2"> Contratista y Desarrolladora de Software </h4>
                </div>
            </div>

            <div id="menu">
                <nav class="navbar" id="menu">
                    <div class="container-fluid row">
                        <ul class="nav navbar-nav col-sm-12">
                            <li class="active"><a href="index.html">Home</a></li>
                            <li><a href="#">Servicios</a></li>
                            <li><a href="formSuggestions.html">Dejanos tu comentario!</a></li>
                        </ul>      
                    </div>
                </nav>
            </div>
        </div>
    </section>

    <div id="cuerpoVariable">
        <section class="container-fluid" id="presentacionModificar">
            <div class="row">
                <div class="container-fluid col-sm-12" id="presentacion_texto_modification">
                    <div class="mensaje_centrado ">
                        <strong>
                            <h5 id="texto_presentacion">Modificar Comentario</h5>
                        </strong>
                    </div>
                </div>
            </div>
        </section>

        <center>
        <section class="container-fluid" id="listaComentarios">
            <div class="row" id="comentariosListados">    
                <table class="table  table-dark ">
                    <thead>
                    <tr>
                        <th scope="col" >ID</th>
                        <th scope="col" >Comentario</th>
                        <th scope="col" >Nombre</th>
                        <th scope="col" >Rut</th>
                        <th scope="col" ></th>
                        <th scope="col" ></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('includes/php/conexion.php');

                            $comentario=mysql_query("select co.IdComentario, co.Comentario, cl.Nombre, cl.Rut from clientes as cl, clientescomentarios as clco, comentario as co where co.Idcomentario=clco.Comentario_RutCliente and cl.Rut=clco.Clientes_Rut");

                            while ($fila=mysql_fetch_array($comentario)) {
                                echo "
                                    <tr>
                                    <th scope='row'>".$fila['IdComentario']."</th>
                                    <td>".$fila['Comentario']."</td>
                                    <td>".$fila['Nombre']."</td>
                                    <td>".$fila['Rut']."</td>

                                    <form action='http://localhost/HtmlConBootstrapYPHP/includes/php/eliminar.php' method='POST'>
                                        <td><center><button type='submit' class='btn btn-primary'> Eliminar</button></center></td>
                                        <input name='rescateIdComentario' type='number' value=".$fila['IdComentario']." hidden> </input>
                                    </form>
                                    <form action='http://localhost/HtmlConBootstrapYPHP/includes/php/modificar.php' id='buscarmodificar' method='post'>
                                    <td><center><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModalmodificar'> Modificar</button></center></td>
                                        <div id='myModalmodificar' class='modal fade' role='dialog'>
                                            <div class='modal-dialog'>
                                                    <!-- Modal content-->
                                                <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                    <h4 class='modal-title'>Modificar Comentario</h4>
                                                </div>
                                                <div class='modal-body'>
                                                    <label for='inputID' class='col-sm-6 col-form-label'>ID comentario</label>
                                                    <input type='number' name='inputID' value=".$fila['IdComentario']." disabled></input>
                                                    <input name='rescate' type='number' value=".$fila['IdComentario']." hidden></input>
                                                    <textarea id='comentarioCajita' name='rescateComentario' rows='10'>".$fila['Comentario']."
                                                    </textarea>
                                                    <br><br><br>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='submit' class='btn' >Modificar Comentario</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </tr>
                                    <br> 
                                    ";
                            }
                            mysql_close();
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        </center>

    </div>
</body>


</html>