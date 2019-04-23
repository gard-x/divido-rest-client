<?php
require_once "bootstrap.php";


$api = Helper::getApi();

require_once "__head.php";

try {
    $applications = $api->getApplications(Authenticate::getUser());
} catch (Exception $e) {
    $message = $e->getMessage();
}
?>
    <div class="container">
        <h1>Applications</h1>
        <?= ($message ? Helper::showMessage(Helper::DANGER, $message) : ""); ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Created</th>
                <th>Policy</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($applications as $application) {
                ?>
                <tr>
                    <th><a href="application.php?id=<?=$application->getApplicationId()?>" class="btn btn-primary">View</a></th>
                    <td><?=$application->getApplicationId()?></td>
                    <td><?=$application->getCreated()?></td>
                    <td><?=($application->getProducts()[0]?$application->getProducts()[0]->getText():"")?></td>
                    <td><?=$application->status?></td>


                </tr>

                <?
            }
            ?>
            </tbody>
        </table>

    </div>
<?
require_once "__foot.php";