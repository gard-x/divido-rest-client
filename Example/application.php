<?php
require_once "bootstrap.php";
Authenticate::redirectWhenNotLogged();

$api = Helper::getApi();
$id = Helper::getValue('id', null);

require_once "__head.php";

try {
    $application = $api->getApplication(Authenticate::getUser(), $id);
} catch (Exception $e) {
    $message = $e->getMessage();
}
?>
    <h1>Application <?= $id ?></h1>
<h3>Instructions</h3>
<ul>
    <li>Cancel - if policy is canceled please cancel finance to</li>
    <li>Activate - Activation finalise application and money will be send</li>
    <li>Refund - when money have to be refunded.</li>

</ul>

    <div class="btn-group" role="group" aria-label="Actions">
        <?
        echo '<a class="btn btn-primary" href="applications.php" role="button">List of applications</a>';
        if ($application->isCancelable()) {
            echo '<a name="resend" id="resend-sms" class="btn btn-warning" href="application-cancel.php?id=' . $application->getApplicationId() . '" role="button">Cancel</a>';
        }
        if ($application->isForActivation()) {
            echo '<a class="btn btn-success" href="application-activate.php?id=' . $application->getApplicationId() . '" role="button">Activate</a>';
        }
        if ($application->isForRefund()) {
            echo '<a class="btn btn-danger" href="application-refund.php?id=' . $application->getApplicationId() . '" role="button">Refund</a>';
        }
        ?>
    </div>
    <div class="container">
        <?= ($message ? Helper::showMessage(Helper::DANGER, $message) : ""); ?>
        <? var_dump($application) ?>
    </div>
<?
require_once "__foot.php";