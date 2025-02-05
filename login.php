<?php
require_once 'server.php';

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

// Check if the registration was successful
$successMessage = '';
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $successMessage = 'Registration successful. You can now log in.';
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $error = "All fields are required.";
    } else {
        // Check if the user credentials are valid
        $query = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User credentials are valid
            $row = $result->fetch_assoc();
            //here we are setting the sessions userid which we use throughout the user session
            $_SESSION['user_id'] = $row['id'];

            // Check if the 'username' column exists in the database table
            if (isset($row['username'])) {
                $_SESSION['username'] = $row['username'];
            }

            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login | Contact Management System</title>
    <link rel="stylesheet" type="text/css" href="./CSS/login.css">
</head>

<body>
    <div class="login">
        <h2>Login</h2>
        <?php if (isset($error)) { ?>
            <p><?php echo $error; ?></p>
        <?php } ?>
        <?php if (!empty($successMessage)) { ?>
            <p style="color: green;"><?php echo $successMessage; ?></p>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <input type="submit" value="Login">
        </form>
        <p><a href="forgot_password.php" class="forgot-password">Forgot Password?</a></p>
        <p>Don't have an account? <a href="register.php">Register</a></p>
        <p>Admin Login <a href="admin_login.php">Login</a></p>
    </div>
</body>

</html>