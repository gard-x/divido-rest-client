<?php
require_once "bootstrap.php";


$api = Helper::getApi();
$password = Helper::getValue('password');
$login = Helper::getValue('login');
if ($login) {
    try {

        $user = $api->login($login,$password);

        Authenticate::saveUser($user);
        header("Location: index.php");
        exit;


    }
    catch (Exception  $e) {
        $message=$e->getMessage();
    }
}
require_once "__head.php";
?>
    <h1>Login</h1>

    <div class="container">
        <?($message?Helper::showMessage(Helper::DANGER, $message):"");?>
        <form>
            <div class="form-group row">
                <label for="login" class="col-sm-3 col-form-label">Login</label>
                <div class="col-sm-3">
                    <input type="text"  class="form-control" name="login" id="login"
                           placeholder="" value="<?= $login?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder=""
                           value="<?= $password?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit
                    </button>
                </div>
            </div>
        </form>
    </div>


<?

?>

<?
require_once "__foot.php";