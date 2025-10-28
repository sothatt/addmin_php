<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>login</title>
</head>
<style>
body {
    background-color: #000;
    color: rgb(255, 255, 255);
}

.login_form {
    margin: auto;
    width: 500px;
    height: 400px;
    position: relative;
    background-image: url("login1.jpeg");
    /* background-image: url("login2.jpg"); */
    background-color: #000;
    background-repeat: no-repeat;
    background-size: 500px 400px;
    padding-left: 70px;
    padding-right: 70px;
    padding-top: 25px;
}

.login_form:before,
.login_form:after {
    content: '';
    position: absolute;
    top: -3px;
    left: -3px;
    background: linear-gradient(45deg, #fb0094, #0000ff, #00ff00, #ffff00, #ff0000, #fb0094, #0000ff, #00ff00, #ffff00, #ff0000);
    background-size: 400%;
    width: calc(100% + 6px);
    height: calc(100% + 6px);
    z-index: -1;
    animation: animate 20s linear infinite;
}

.login_form:after {
    filter: blur(50px);
}

@keyframes animate {
    0% {
        background-position: 0 0;
    }

    50% {
        background-position: 300% 0;
    }

    100% {
        background-position: 0 0;
    }

}

.my_style {
    margin-top: 10%;
    width: 100%;
    height: 100%;
}
</style>

<body>
    <?php 
    include('include/connect.php');
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $select = "SELECT * FROM tbl_user where username = '$username' and password = $password";
        $query = mysqli_query($conn,$select);
        if(mysqli_num_rows($query)>0){
            session_start();
            $_SESSION['is_login_success'] = "1";
            header ("Location: dashboard.php");
        }
    }
    ?>
    <div class="my_style">
        <div class="login_form">
            <form method="POST">
                <center>
                    <h1>Login</h1>
                </center>
                <br>
                <div class="mb-3">
                    <label for="username" class="form-label">UserName</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="password" placeholder="Password">
                    <br>
                    <button type="submit" name="login" class="btn btn-info form-control mt-3">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>