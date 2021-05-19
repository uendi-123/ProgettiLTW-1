<?php 
    $db = pg_connect("host=localhost port=5432 dbname=userDB user=postgres password=password") or die("Could not connect: " . pg_last_error()); 

    $query = "SELECT nome, marchio, cilindrata, posti, cambio FROM auto "; 
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <!-- JS FILES -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
        <!-- CSS FILES -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
        <!-- My CSS and JS FILES -->
        <link href="../css/style.css" rel="stylesheet">
        <script src="../js/main.js"></script>
    </head>
    <body class="bg-dark">
        <nav class="navbar navbar-dark bg-dark border border-0 border-bottom border-3 border-light">
            <div class="container-fluid">
                <a class="navbar-brand fs-2 logo" href="index.php">RentACar.com</a>

                <button class="btn btn-outline-secondary navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Parte collapse della NavBar -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Elementi della NavBar -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-inline-flex">
                        <li class="nav-item text-dark">
                            <a class="nav-link" href="#">I miei ordini</a>
                        </li>
                        <li class="nav-item text-dark">
                            <a class="nav-link" href="#">Il mio profilo</a>
                        </li>
                    </ul>

                    <div class="row nav-footer mt-3 border border-0 border-top border-secondary">
                        <div class="col-lg-3 btn-group mt-2">
                            <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#signUpNoleggioModal">Sign up</button>
                            <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#signInNoleggioModal">Sign in</button>
                        </div>
                    </div>
                </div>

                <!-- Teoricamente completo, sia html che php, aggiungere validation form fornito da bootstrap -->
                <!-- Modal Sign Up --> 
                <div class="modal fade text-dark" id="signUpNoleggioModal" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content border border-3 border-primary rounded-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Continua per registrarti!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="SignUpForm" class="needs-validation" method="POST" action="../php/signUp.php" novalidate>
                                <div class="modal-body pt-1">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label for="inputNome">Nome</label>
                                            <input type="text" name="nomeSU" class="form-control" id="inputNome">
                                        </div>
                                        <div class="col-sm">
                                            <label for="inputCognome">Cognome</label>
                                            <input type="text" name="cognomeSU" class="form-control" id="inputCognome">
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-sm-9">
                                            <label for="inputIndirizzo">Indirizzo Via/Viale</label>
                                            <input type="text" name="indirizzoSU" class="form-control" id="inputIndirizzo">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="inputCivico">N° Civico</label>
                                            <input type="text" name="civicoSU" class="form-control" id="inputCivico">
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <label for="inputNascita">Data Nascita</label>
                                        <div class="col input-group">
                                            <input type="text" name="dataNascitaSU" class="form-control" id="inputNascita" readonly title="format: dd/MM/y">
                                            <button class="btn btn-outline-secondary rounded-0 rounded-end input-group-text" type="button" id="signUpNascitaBtn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                            </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="inputEmail" class="pt-0">Email</label>
                                        <div class="col input-group">
                                            <input type="text" id="inputEmail" class="form-control" name="emailSU" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <span class="input-group-text" id="basic-addon2">@studenti.uniroma1.it</span>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col form-group">
                                            <label for="inputPasswordSignUpModal" class="col-sm col-form-label">Password</label>
                                            <div class="col input-group">
                                                <input type="password" class="form-control" id="inputPassSignUpModal" name="pass1SU">
                                                <button type="button" class="input-group-text" id="showHideBtnSignUp">
                                                    <svg xmlns="http://www.w3.org/2000/svg" id="hidePassIconSignUp" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" id="showPassIconSignUp" style="display: none;" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col form-group">
                                            <label for="inputConfirmPasswordSignUpModal" class="col-sm col-form-label">Conferma Password</label>
                                            <div class="col input-group">
                                                <input type="password" class="form-control is-invalid" id="inputConfirmPassSignUpModal" name="pass2SU">
                                                <button type="button" class="input-group-text" id="showHideConfirmBtnSignUp">
                                                    <svg xmlns="http://www.w3.org/2000/svg" id="hideConfirmPassIconSignUp" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" id="showConfirmPassIconSignUp" style="display: none;" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                    </svg>
                                                </button>
                                                <div class="invalid-feedback">
                                                    Le password non coincidono
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer mt-1">
                                    <button id="SignUpSubmit" type="submit" class="btn btn-outline-primary" name="reg_user" onsubmit="if(checkSubmitSignUp())">Invio</button>
                                </div>
                            </form>
                        </div>
                    <!-- Modal Dialog -->
                    </div>
                <!-- Modal -->
                </div>
                
                <!-- Modal Sign In --> 
                <div class="modal fade text-dark" id="signInNoleggioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content border border-3 border-success rounded-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Continua per accedere!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="signInForm" class="needs-validation" method="POST" action="../php/signIn.php" novalidate>
                                <div class="modal-body pt-0">
                                    <div class="row mb-1">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10 input-group">
                                        <input type="email" class="form-control" id="inputEmailSignIn" name="emailSI" aria-describedby="basic-addon2" required>
                                        <span class="input-group-text" id="basic-addon2">@studenti.uniroma1.it</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3 form-group">
                                        <label for="inputPasswordSignInModal" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10 input-group">
                                        <input type="password" class="form-control" id="inputPassSignIn" name="passSI" required>
                                        <button type="button" class="input-group-text" id="showHideBtnSignIn">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="hidePassIconSignIn" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                                <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" id="showPassIconSignIn" style="display: none;" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </button>
                                        </div>
                                    </div>
                                    <!-- <div class="col-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">Remember me</label>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-success" id="submitBtn" name='login_user' onsubmit="checkSubmitSignUp()">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container mt-2">
            <!-- Row btn Filtra e Ordina -->
          <div class="row d-flex">
              <div class="col-lg-3 col-md-4 col-sm-6">
                <button class="btn btn-outline-primary buttone">Filtra</button>
              </div>
              <div class="col-lg-6 col-md-4 d-sm-none d-md-flex d-lg-flex"></div>
              <div class="col-lg-3 col-md-4 col-sm-6">
                <button class="btn btn-outline-success buttone">Ordina</button>
              </div>
          </div>
          <!-- Row Cards -->
          <div class="row mt-3">
                    <?php
                        for($i = 0; $i < pg_num_rows($result); $i++){
                            $row = pg_fetch_row($result);

                            $nome = $row[0];
                            $marchio = $row[1];
                            $img = $marchio.$nome.'.png';
                            $cilindrata = $row[2];
                            $posti = $row[3];
                            $cambio = $row[4];
                            // Aumentare card height ad SM, provare con media-queries
                            echo '<div class="card col-xl-3 col-lg-4 col-md-6 col-sm-12 border-1 border-dark ">';
                            echo    '<img src="../img/imgAuto/'. $img .'" class="card-img-top mt-1 fluidImg mx-1" alt="...">';
                            echo    '<div class="card-body">';
                            echo        '<h5 class="card-title">'.'<i class="fas fa-car"></i> ' ."$marchio $nome" .'</h5>';
                            echo        '<p class="card-text">
                                                            <i class="fas fa-tachometer-alt"></i> Cilindrata: '. $cilindrata.'</br>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M17 4.5C17 5.9 15.9 7 14.5 7S12 5.9 12 4.5S13.1 2 14.5 2S17 3.1 17 4.5M15 8h-.8c-2.1 0-4.1-1.2-5.1-3.1c-.1-.1-.2-.2-.2-.3l-1.8.8c.5 1.4 2.1 3.2 4.4 4.1l-1.8 5l-3.9-1.1L3 18.9l2 .5l1.8-3.6l4.5 1.2c1 .2 2-.3 2.4-1.2L16 9.4c.2-.7-.3-1.4-1-1.4m3.9-1l-3.4 9.4c-.6 1.6-2.1 2.6-3.7 2.6c-.3 0-.7 0-1-.1l-2.9-.8l-.9 1.8l2 .5l1.4.4c.5.1 1 .2 1.5.2c2.5 0 4.7-1.5 5.6-3.9L21 7h-2.1z" fill="black"/></svg>
                                                            Posti: '. $posti.'</br>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g class="icon-tabler" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="5" cy="6" r="2"/><circle cx="12" cy="6" r="2"/><circle cx="19" cy="6" r="2"/><circle cx="5" cy="18" r="2"/><circle cx="12" cy="18" r="2"/><path d="M5 8v8"/><path d="M12 8v8"/><path d="M19 8v2a2 2 0 0 1-2 2H5"/></g></svg>
                                                            Cambio: '. $cambio.'</p>';
                            echo    '</div>';
                            echo '</div>';
                            echo '';
                        }
                    ?>
                </div>
          </div>
        </div>
    </body>
</html>


    