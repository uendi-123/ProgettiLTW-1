<?
require_once('database.php');
// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Se non viene implementato validation form fornito da bootstrap decommentare il seguente blocco
    //   if (empty($username)) {
    //   	array_push($errors, "Username is required");
    //   }
    //   if (empty($password)) {
    //   	array_push($errors, "Password is required");
    //   }

    $password = md5($password);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    } else {
        $_SESSION[''];
    }
}
?>