<?php 
    session_start();
    require("include/head.inc");
    require("include/nav.inc");
    require("include/home_bg.inc");
    require_once("database/pokeconnect.php");
?>

<style>
    .reg-card {
        margin: 6.25rem auto;
        width: 500px;
        background-color: #ffffff;
        border-radius: 15px;
    }

    .reg-header {
        text-align: center;
        padding: 30px 0;
        color: white;
        background-image: linear-gradient(to bottom right, #a9e092, #35918e);
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
    }

    .reg-header h1 {
        font-size: 42px;
        margin: 0;
    }

    .reg-form{
        text-align: center;
    }

    .reg-form p {
        margin: 30px 0 0;
    }

    .reg-form input[type="text"],
    .reg-form input[type="password"] {
        margin-top: 5px;
        width: 75%;
        border: none;
        outline: none;
        border-bottom: 1px solid #757575;
    }

    .reg-form .igid {
        color: #757575;
        margin: 30px 0 0;
        padding: 0 50px;
        text-align: left;
    }

    .reg-form .igid-input {
        color: #000000;
        margin-top: 5px;
        display: flex;
        flex-flow: row nowrap;
        justify-content: space-between;
    }

    .igid-input input[type="text"] {
        margin: 0;
        width: 25%;
        text-align: center;
    }

    .reg-submit {
        margin-top: 30px;
        padding-bottom: 15px;
    }

    .reg-form input[type="submit"] {
        margin: 0px 40px 15px;
        width: 300px;
        padding: 10px;
        border: none;
        color: #ffffff;
        background-image: linear-gradient(to bottom right, #a9e092, #35918e);
        border-radius: 25px;
    }

    .reg-form .confirm-pass::-ms-reveal,
    .reg-form .confirm-pass::-ms-clear {
        display: none;
    }

    .reg-invalid {
        margin: 0px;
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
    <div class="reg-card">
        <div class="reg-header">
            <h1>DELETE ACCOUNT</h1>
        </div>
        <div class="reg-body">
            <form class="reg-form" method="post" action="database/pokedelete.php">
            <div class="igid">
                    Your Player ID
                    <div class="igid-input">
                        <input name="igid-1" id="igid-1" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="4" maxlength="4" required>
                        -
                        <input name="igid-2" id="igid-2" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="4" maxlength="4"required>
                        -
                        <input name="igid-3" id="igid-3" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="4" maxlength="4"required>
                    </div>
                </div>
            <p><input type="text" name="email" id="email" placeholder="Email: xxxxx@pokemail.com" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" required></p>
            <p><input type="password" name="password" id="password" placeholder="Enter Current Password" required></p>
                <div style="width: 30%; margin: auto; margin-top: 3em">
                </div>
                <div class="reg-submit">
                    <input type="submit" value="CONFIRM DELETION">
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
    require("include/foot.inc");
?>