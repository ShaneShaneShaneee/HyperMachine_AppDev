<?php 
    session_start();

    require("include/head.inc");
    require("include/nav.inc");
    require("include/home_bg.inc");

    /*$invalidErr = false;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['email'])){
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $invalidErr = true;
            }
        }
    }*/
?>

<style>
    .login-card {
        margin: 6.25rem auto;
        width: 400px;
        background-color: #ffffff;
        border-radius: 15px;
    }

    .login-header {
        text-align: center;
        padding: 30px 0;
        color: white;
        background-image: linear-gradient(to bottom right, #a9e092, #35918e);
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
    }

    .login-header h1 {
        font-size: 42px;
        margin: 0;
    }

    .login-form{
        text-align: center;
    }

    .login-form p {
        margin: 30px 0 0;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
        margin-top: 5px;
        width: 75%;
        border: none;
        outline: none;
        border-bottom: 1px solid #757575;
    }

    .login-form input[type="submit"] {
        margin: 0px 40px 5px;
        width: 300px;
        padding: 10px;
        border: none;
        color: #ffffff;
        background-image: linear-gradient(to bottom right, #a9e092, #35918e);
        border-radius: 25px;
    }

    .login-form a {
        font-size: 0.75em;
        color: #35918e;
        text-decoration: none;
        margin-bottom: 10px;
    }

    .login-submit {
        margin-top: 30px;
        padding-bottom: 15px;
    }

    .login-invalid {
        color: #d6143b;
    }

    .alert{
        position: relative;
        left:40%;
        width: 15em;
        transform: translate(-50%);
        margin:5px;
        padding: 25px;
    }
    
</style>

<div class="container flex-1">
    <div class="login-card">
        <div class="login-header">
            <h1>LOGIN</h1>
        </div>
        <div class="login-body">
            <form class="login-form" method="post" action="database/valid_pokeuser.php">
                <p><input type="text" name="email" id="email" placeholder="Email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"></p>
                <p><input type="password" name="password" id="password" placeholder="Password"></p>
                <div style="width: 30%; margin: auto; margin-top: 3em">
                    <?php
                        if (isset($_SESSION['no_email'])) :
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                            if (isset($_SESSION['no_email'])) :
                                echo $_SESSION['no_email'];
                                unset($_SESSION['no_email']);
                            endif;
                        ?>
                    </div>
                    <?php
                        endif;
                        if (isset($_SESSION['err_pass'])) :
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                            if (isset($_SESSION['err_pass'])) :
                                echo $_SESSION['err_pass'];
                                unset($_SESSION['err_pass']);
                            endif;
                        ?>
                    </div>
                    <?php
                        endif;
                    ?>
                </div>
                <div class="login-submit">
                    <input type="submit" value="LOGIN">
                    <a href="signup.php">Create Account</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
    require("include/foot.inc");
?>