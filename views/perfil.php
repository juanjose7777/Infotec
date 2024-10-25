<?php
// Verifica si las variables de sesión no existen
session_start();


if (!isset($_SESSION["idUsuarios"])) {
    // Si el usuario no ha iniciado sesión, redirige al índice y muestra un mensaje con SweetAlert
    echo "<script>";
    echo 'alert("Usted no deberia estar aqui");window.location.href="http://localhost/Agencia/";';
    echo "</script>";
    exit; // Termina la ejecución del script después de redirigir al usuario
} else {
    $Sesion = 1;
    $userse = $_SESSION["idUsuarios"];
}
require_once '../controller/PerfilController.php';

$controlLand = new PerfilController();

$InfoUser = $controlLand->InfoUser($_SESSION["idUsuarios"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Agencia- Proyecto</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../asset/img/logo.jpeg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../asset/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../asset/css/style.css" rel="stylesheet">

    <!-- bootstrap cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!--  ALERTAS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">

    <!-- icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <?php if ($Sesion == 1) { ?>
                            <p class="text-primary"><i class="fa-solid fa-user"></i> <?= $_SESSION["UsuNombres"] ?></p>
                        <?php } ?>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa-solid fa-code"></i>Dev:aarenas06</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="https://www.linkedin.com/in/diego-arenas06" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-primary px-3" href="https://www.instagram.com/aarenas_06/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a class="navbar-brand">
                    <h1 class="m-0 text-primary"><span class="text-dark">INFO</span>DEC</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <p class="nav-item nav-link active">
                        <div id="google_translate_element" style="margin-top: 30px;"></div>
                        </p>
                        <a href="/agencia/views/PantSeguimiento.php" class="nav-item nav-link active" style="margin-top: 2px;">Seguimiento Base datos</a>
                        <a href="http://localhost/agencia/" class="nav-item nav-link active" style="margin-top: 2px;">Inicio</a>
                        <?php if ($Sesion == 0) { ?>
                            <p style="cursor: pointer;" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#IniciarSession">Iniciar Sesión</p>
                        <?php } else { ?>
                            <div class="dropdown nav-item nav-link">
                                <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                                    <li><a class="dropdown-item" href="/Agencia/logout.php">Cerrar Sesión</a></li>
                                </ul>
                            </div>
                        <?php  } ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="contenido" style="margin:3vh;">
        <div class="row">
            <div class="col-lg-4">
                <center>
                    <h5>
                        <?= $InfoUser['UsuNombres'] . ' ' . $InfoUser['UsuApellidos'] ?> <br>
                        <?= $InfoUser['Rol'] ?>
                    </h5>

                    <?php if ($InfoUser['UsuSexo'] == 'M') { ?>
                        <img class="img-fluid" height="320px" width="320px" style="border-radius: 200px;" src="/Agencia/asset/img/profile/profile-M.avif" alt="">
                    <?php  } else  if ($InfoUser['UsuSexo'] == 'F') { ?>
                        <img class="img-fluid" height="320px" width="320px" style="border-radius: 200px;" src="/Agencia/asset/img/profile/profile-F.avif" alt="">
                    <?php  } else { ?>
                        <img class="img-fluid" height="320px" width="320px" style="border-radius: 200px;" src="/Agencia/asset/img/profile/profile-F.avif" alt="">
                    <?php } ?>

                    <b>
                        <p style="color: green; margin-top:10px;"> ° Activo</p>
                    </b>
                </center>
            </div>
            <div class="col-lg-8">
                <div class="card" style="border-radius:25px;min-height:370px;  margin: top 10px;">
                    <div class="card-body">
                        <center>
                            <h5>Tus Presupuestos Guardados</h5>
                        </center>
                        <div class="tbpropios" id="tbpropios"></div>
                        <hr>
                        <center>
                            <h5>Presupuestos Compartidos</h5>
                        </center>
                        <div class="tbComp" id="tbComp"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 py-10 px-sm-3 px-lg-5" style="margin-top: 90px; height:400px">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">INFO</span>DEC</h1>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="https://www.linkedin.com/in/diego-arenas06" target="_blank">Diego Arenas </a>. Derechos reservados.</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <p class="m-0 text-white-50">Diseñado por <a href="https://www.linkedin.com/in/diego-arenas06" target="_blank">aarenas_06</a>
                </p>
            </div>
        </div>
    </div>
    <input type="text" value="<?= $InfoUser['idUsuarios'] ?>" id="idUsuarios">
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>



    <!-- JavaScript Librerias -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/lib/easing/easing.min.js"></script>
    <script src="../asset/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../asset/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../asset/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../asset/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <!-- archivos Js -->
    <script src="../asset/mail/jqBootstrapValidation.min.js"></script>
    <script src="../asset/mail/contact.js"></script>
    <script src="../asset/js/main.js"></script>
    <script>
        tbpropios();
        async function tbpropios() {
            var idUsuarios = $("#idUsuarios").val();

            let formData = new FormData();
            formData.append("funcion", "tbpropios");
            formData.append("idUsuarios", idUsuarios);
            try {
                let req2 = await fetch("/Agencia/controller/PerfilController.php", {
                    method: "POST",
                    body: formData,
                });
                let res2 = await req2.text();
                if (res2) {
                    $("#tbpropios").html(res2);
                    $('#tb1').DataTable();

                }
            } catch (error) {
                Swal.fire({
                    icon: "error",
                    text: "Error en el sistema",
                });
            }
        }
        tbComp();
        async function tbComp() {
            var idUsuarios = $("#idUsuarios").val();

            let formData = new FormData();
            formData.append("funcion", "tbComp");
            formData.append("idUsuarios", idUsuarios);
            try {
                let req2 = await fetch("/Agencia/controller/PerfilController.php", {
                    method: "POST",
                    body: formData,
                });
                let res2 = await req2.text();
                if (res2) {
                    $("#tbComp").html(res2);
                    $('#tb2').DataTable();
                }
            } catch (error) {
                Swal.fire({
                    icon: "error",
                    text: "Error en el sistema",
                });
            }
        }
        async function CompartirPre(idPresupuesto, idUser) {
            var CompUser = $("#CompUser" + idPresupuesto).val();
            let formData = new FormData();
            formData.append("funcion", "CompartirPre");
            formData.append("idPresupuesto", idPresupuesto);
            formData.append("idUser", idUser);
            formData.append("CompUser", CompUser);

            try {
                let req2 = await fetch("/Agencia/controller/PerfilController.php", {
                    method: "POST",
                    body: formData,
                });
                let res2 = await req2.json();
                if (res2) {
                    if (res2.cod === 1) {
                        $("#comp-" + idPresupuesto).modal("hide"); // Abre el modal antes de cargar los datos
                        Swal.fire({
                            icon: "success",
                            text: "Se Compartio El presupuesto",
                        });
                        tbpropios();
                    } else {
                        Swal.fire({
                            icon: "info",
                            text: "Error en Servidor",
                        });
                    }
                }
            } catch (error) {
                Swal.fire({
                    icon: "error",
                    text: "Error en el sistema",
                });
            }
        }
    </script>
    <!-- Google Translate -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'es', // Lenguaje de la página
                includedLanguages: 'en,fr,de,ja,es,es', // Lenguajes a los que se puede traducir
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE, // Diseño de la pestaña
                autoDisplay: false // Evita que se muestre automáticamente
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>