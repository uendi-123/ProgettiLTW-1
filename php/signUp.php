<?php
session_start();

// initializing variables
$nome = '';
$cognome = '';
$indirizzo = '';
$civico = '';
$dataNascita = '';
$email = '';
$pass = '';
//Pass2 e' la password di confirm del SignUpForm
$pass2 = '';
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'userdb');

//check connection
if ($db -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// REGISTER USER
if (isset($_POST['reg_user'])){
  // receive all input values from the form
  $nome = mysqli_real_escape_string($db, $_POST['nome']);
  $cognome = mysqli_real_escape_string($db, $_POST['cognome']);
  $indirizzo = mysqli_real_escape_string($db, $_POST['indirizzo']);
  $civico = mysqli_real_escape_string($db, $_POST['civico']);
  $dataNascita = mysqli_real_escape_string($db, $_POST['dataNascita']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pass = mysqli_real_escape_string($db, $_POST['pass']);
  $pass2 = mysqli_real_escape_string($db, $_POST['pass2']);

  

  // Se non viene implementato il validations form fornito da bootstrap decommentare il seguente blocco

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  // if (empty($nome)) { array_push($errors, "Nome richiesto"); }
  // if (empty($cognome)) { array_push($errors, "Cognome richiesto"); }
  // if (empty($indirizzo)) { array_push($errors, "Indirizzo richiesto"); }
  // if (empty($civico)) { array_push($errors, "Numero civico richiesto"); }
  // if (empty($dataNascita)) { array_push($errors, "Data di nascita richiesta"); }
  // if (empty($email)) { array_push($errors, "Email richiesta"); }
  // if (empty($password_1)) { array_push($errors, "Password richiesta"); }
  // if ($password_1 != $password_2) {
	//   array_push($errors, "Le password immesse non coincidono");
  // }

  // first check the database to make sure a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  // Se non viene implementato il validations form fornito da bootstrap decommentare il seguente blocco

  // if ($user) { // if user exists
  //   if ($user['username'] === $username) {
  //     array_push($errors, "Username already exists");
  //   }

  //   if ($user['email'] === $email) {
  //     array_push($errors, "email already exists");
  //   }
  // }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (nome, cognome, indirizzo, civico, dataNascita, email, password) 
  			      VALUES('$nome', '$cognome', '$indirizzo', '$civico', '$dataNascita', '$email', '$password')";

  	mysqli_query($db, $query);
  	$_SESSION['success'] = "RentACar.com ti da il benvenuto!";
  	header('location: ../html/welcome.html');
  }
}