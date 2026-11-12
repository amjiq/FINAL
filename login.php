<?php
include 'db.php';

session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

if ($username == "" || $password == "") {
    $error = "Please enter both username and password.";
} else {


    // Prepare and execute the SQL statement to check the credentials
    $sql = $conn->prepare("SELECT * FROM users WHERE name = '$username'");
    $sql->execute();

    $user = $sql->get_result()->fetch_assoc();


    if ($user && password_verify($password, $user['password'])) {
        // Successful login
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        // Invalid credentials
        $error = "Invalid username or password.";
    }

}
?>


<h2>STUDENT GRADING SYSTEM</h2>

<h3>LOGIN</h3>

<form method="POST" action="login.php">
    <label for="username">Username:</label>
    <input style="width: 200px;" type="text" name="username" placeholder="Tulis username, USERNAME!" required><br><br>

    <label for="password">Password:</label>
    <input style="width: 200px;" type="password" name="password" required><br><br>

    <input type="submit" value="Login" name="login">

</form>