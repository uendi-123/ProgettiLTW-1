<?
// LOGIN USER
if (isset($_POST['login_user'])) {
    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'userdb');

    //check connection
    if ($db -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    $email = $_POST['emailSI'] . 'studenti.uniroma1.it';
    $password = $_POST['passSI'];

    // Se non viene implementato validation form fornito da bootstrap decommentare il seguente blocco
    //   if (empty($username)) {
    //   	array_push($errors, "Username is required");
    //   }
    //   if (empty($password)) {
    //   	array_push($errors, "Password is required");
    //   }

    //$password = md5($password);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: ../html/welcome.html');
    } else {
        $_SESSION['errormsg'] = "User not found";
        header('location: ../html/notFound.html');
    }
}
?>