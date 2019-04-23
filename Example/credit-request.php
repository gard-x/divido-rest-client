<?php
require_once "bootstrap.php";


$api = Helper::getApi();

$creditRequest=new \DividoServiceClient\DataStorage\CreditRequest();
$creditRequest->setFinance(Helper::getValue('financeId'));
$creditRequest->setAmount(Helper::getValue('price'));
$creditRequest->setDeposit( Helper::getValue('deposit'));
$creditRequest->setReference( Helper::getValue('reference',''));

foreach (\DividoServiceClient\DataStorage\CreditRequestCustommer::getReflection() as $item) {
    $creditRequest->getCustomer()->__set($item,Helper::getValue($item,''));
}

foreach (\DividoServiceClient\DataStorage\CreditRequestMetadata::getReflection() as $item) {
    $creditRequest->getMetadata()->__set($item,Helper::getValue($item,''));
}

$creditRequest->products[]=new \DividoServiceClient\DataStorage\CreditRequestProduct();
foreach (\DividoServiceClient\DataStorage\CreditRequestProduct::getReflection() as $item) {
    $creditRequest->getProducts()[0]->__set($item,Helper::getValue("product_".$item,''));
}

$creditRequest->setCheckoutUrl(Helper::getValue("checkoutUrl",''));
$creditRequest->setRedirectUrl(Helper::getValue("redirectUrl",''));


if ($_GET['submit']) {

    try {
        $result=$api->creditRequest(Authenticate::getUser(),$creditRequest);

        $message="OK";
        $messageType=Helper::SUCCESS;

    }
    catch (Exception $e)
    {
        $message="Error: ".$e->getMessage();
        $messageType=Helper::DANGER;
    }
}



require_once "__head.php";
?>
    <h1>Credit Request</h1>

    <div class="container">
        <?($message?Helper::showMessage($messageType, $message):"");?>
        <? if (isset($result)){
        ?>

            <div class = "form-group">
                <label class = "control-label col-sm-2" for = "email">Detail:</label>
                <div class = "col-sm-5">
                    <p class = "form-control-static"><a href="application.php?id=<?=$result->getApplicationId()?>" target="_blank"><?=$result->getApplicationId()?></a></p>
                </div>
            </div>
            <div class = "form-group">
                <label class = "control-label col-sm-2" for = "email">Application ID:</label>
                <div class = "col-sm-5">
                    <p class = "form-control-static"><?=$result->getApplicationId()?></p>
                </div>
            </div>

            <div class = "form-group">
                <label class = "control-label col-sm-2" for = "email">Application URL:</label>
                <div class = "col-sm-5">
                    <p class = "form-control-static"><a href="<?=$result->getApplicationUrl()?>" target="_blank"><?=$result->getApplicationUrl()?></a></p>
                </div>
            </div>

        <?
        }
        ?>
        <form>
            <?=Helper::getInputBlock("financeId",$creditRequest->getFinance(),"Finance ID","financeId")?>
            <?=Helper::getInputBlock("price",$creditRequest->getAmount(),"Price","price")?>
            <?=Helper::getInputBlock("deposit",$creditRequest->getDeposit(),"Deposit","deposit")?>
            <?=Helper::getInputBlock("reference",$creditRequest->getReference(),"Reference","reference")?>
            <h3>Custommer</h3><?
            foreach (\DividoServiceClient\DataStorage\CreditRequestCustommer::getReflection() as $item) {
                echo Helper::getInputBlock($item, $creditRequest->getCustomer()->{$item}, ucfirst($item), $item);
            }
            ?>
            <h3>Metadata</h3><?
            foreach (\DividoServiceClient\DataStorage\CreditRequestMetadata::getReflection() as $item) {
                echo Helper::getInputBlock($item,$creditRequest->getMetadata()->{$item},ucfirst($item),$item);
            }
            ?>
            <h3>Product</h3><?
            foreach (\DividoServiceClient\DataStorage\CreditRequestProduct::getReflection() as $item) {
                echo Helper::getInputBlock("product_".$item,$creditRequest->getProducts()[0]->{$item},ucfirst($item),"product_".$item);
            }
            ?>
        <h3>Return URLs</h3>
            <?=Helper::getInputBlock("checkoutUrl",$creditRequest->getCheckoutUrl(),"Checkout URL","checkoutUrl")?>
            <?=Helper::getInputBlock("redirectUrl",$creditRequest->getRedirectUrl(),"Redirect URL","redirectUrl")?>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" name="submit" value="1" class="btn btn-primary">Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
    <pre>
<?=json_encode($creditRequest->createRequest())?>
    </pre>


<?

?>

<?
require_once "__foot.php";