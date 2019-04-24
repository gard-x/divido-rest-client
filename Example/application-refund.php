<?php
require_once "bootstrap.php";
Authenticate::redirectWhenNotLogged();

$api = Helper::getApi();
$id = Helper::getValue('id', null);

require_once "__head.php";

try {
    $application = $api->getApplication(Authenticate::getUser(), $id);
    $api->refundApplication(Authenticate::getUser(), $application);

} catch (Exception $e) {
    $message = $e->getMessage();
}
?>
    <h1>Refund Application <?= $id ?></h1>

    <div class="btn-group" role="group" aria-label="Actions">
        <?

        echo '<a name="resend" id="resend-sms" class="btn btn-success" href="application.php?id=' . $application->getApplicationId() . '" role="button">Detail</a>';

        ?>
    </div>
    <div class="container">
        <?= ($message ? Helper::showMessage(Helper::DANGER, $message) : Helper::showMessage(Helper::SUCCESS, "Refunded")); ?>

    </div>
<?
require_once "__foot.php";