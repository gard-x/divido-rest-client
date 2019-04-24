<?php
require_once "bootstrap.php";
Authenticate::redirectWhenNotLogged();

$payload = Helper::getValue('payload', "
{
    \"ImportJobTypeID\": \"1\",
    \"ImportDate\": \"" . date("d/m/Y") . "\",
    \"ImportSourceID\": \"12\",
    \"APIUserID\": \"" . IMPORTID . "\",
    \"APIUserKey\": \"" . IMPORTPASSWORD . "\",
    \"ImportTypeID\": \"1\",
    \"ImportUID\": \"" . date("YmdHis") . "\",
    \"FirstName\": \"Tester\",
    \"Surname\": \"Test\",
    \"Tel\": \"01392\",
    \"Address1\": \"Osprey House Osprey Road\",
    \"City\": \"Sowton Industrial Estate\",
    \"PostCode\": \"EX2 7WN\",
    \"VehicleType\": \"1\",
    \"SaleType\": \"1\",
    \"VRM\": \"4543\",
    \"Make\": \"VW\",
    \"Model\": \"Polo Hatch Polo 3 Door 1.0 60ps 5speed S\",
    \"VIN\": \"" . date("YmdHis") . "EFI\",
    \"CC\": \"1999\",
    \"Manufactured\": \"2019\",
    \"Term\": \"12\",
    \"Limit\": \"0\",
    \"RegDate\": \"18/04/2019\",
    \"DeliveryDate\": \"18/04/2019\",
    \"Mileage\": \"12\",
    \"VehicleValue\": \"4344\",
    \"Financed\": \"1\",
    \"FinHouse\": \"Divido\",
    \"FinStatus\": \"PENDING\",
    \"TyreType\": \"1\",
    \"ProductName\": \"C.A.R.S. PLUS\",
    \"SalesDate\": \"" . date("d/m/Y") . "\",
    \"StartDate\": \"" . date("d/m/Y") . "\",
    \"Retail\": \"401\",
    \"in_AgentID\": \"3204\",
    \"in_ClientID\": \"0\",
    \"in_VehicleID\": \"0\",
    \"in_SalesUserID\": \"0\",
    \"in_SaleID\": \"0\",
    \"in_ProductID\": \"0\",
    \"in_RateID\": \"26405\",
    \"in_RiskID\": \"0\"
}", "POST");


if ($_POST) {

    $jsonPayload = json_decode($payload, true);
    if (empty($jsonPayload)) {
        $message = "Input Json wrong ncoded";
        $mesageType = Helper::DANGER;
    } else {
        $client = new \GuzzleHttp\Client(['base_uri' => "https://uat.igard.biz"]);
        try {
            $result = $client->request("POST", "/admin/api/imports/sendQuote",
                ['json' => $jsonPayload]);

            $responseBody = $result->getBody()->getContents();

            $responseBody = json_decode($responseBody, true);

            if ($responseBody['payload']['Processed'] == true) {
                $message = "Created Quote: " . $responseBody['payload']['out_PolicyNo'];
                $mesageType = Helper::SUCCESS;
            } else {
                $mesageType = Helper::DANGER;
                $message = $responseBody['payload']['ProcessErrorMessage'];
            }


        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse()->getBody(true);

            $message = $e->getResponse()->getStatusCode() . " " . $response;
            $mesageType = Helper::DANGER;


        } catch (\Exception $e) {

            $message = $e->getMessage();
            $mesageType = Helper::DANGER;
        }


    }


}


$api = Helper::getApi();

require_once "__head.php";
?>
    <h1>Create test Quote</h1>

    <div class="container">
        <? ($message ? Helper::showMessage($mesageType, $message) : ""); ?>
        <form method="post">

            <div class="form-group row">
                <label for="payload" class="col-sm-3 col-form-label">Payload</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="payload" id="payload" placeholder="" value="100"
                              rows="50"><?= $payload ?></textarea>
                </div>
            </div>


            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" name="submit" value="1" class="btn btn-primary">Submit
                    </button>
                </div>
            </div>
        </form>
        <? if ($responseBody) { ?>
            <pre>
        <h2>Response</h2>
<?= htmlspecialchars(strtr(json_encode($responseBody), array("," => ",\n"))) ?>
    </pre>

        <? } ?>

    </div>


<?
require_once "__foot.php";