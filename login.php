<!DOCTYPE html>
<html lang="en">
<head>
    <title>GTI | Login</title>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body background="img\login\bg-image.jpg" class="bg-cover">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">
                    <img class="profile-img" src="img\login\usericon.png"
                        alt="">
                    <form class="form-signin" method="POST" action="validate.php">
                         <?php
                                if (isset($_GET['login'])){
                                    if($_GET['login'] == 'fail'){
                                    echo"<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span>&nbsp&nbsp&nbspInvalid login!</div>";
                                    }
                                }
                         ?>
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username" autocomplete="off" required autofocus>
                        <input type="password" class="form-control" placeholder="Password" name="pass" id="pass" required>
                        <button class="btn btn-lg btn-primary btn-block no-border-radius" type="submit">
                            Sign in
                        </button><br><br>
                        <a href="javascript:void(0);" class="pull-right">@Copyright 2018 | GTI</a><span class="clearfix"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>