<?php
session_start();
include 'config/koneksi.php';

$message = null;

if (isset($_SESSION['username'])) {
    header('Location: index.php');
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    try {
        $sql = "SELECT * FROM m_login WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count == 1) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            return;
        } else {
            $message = "Anda tidak dapat login";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Login Form</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-success">
    <div class="container pt-5">
        <div class="card col-sm-5 shadow mt-5 mx-auto">
            <div class="p-5">
                <h4 class="text-center mb-4">Login</h4>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control" />
                    </div>
                    <?php
                    if ($message) {
                        echo '<p>' . $message . '</p>';
                    }
                    ?>
                    <div class="col-xs-3 mt-3">
                        <button type="submit" class="btn btn-primary"><span data-feather="log-in"></span> Login</button>
                        <button type="button" class="btn btn-danger" onClick="clearForm()"><span data-feather="x"></span> Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script type="text/javascript">
        function clearForm() {
            $('#username').val('')
            $('#password').val('')
        }
    </script>
</body>

</html>