<?php
require_once "bootstrap.php";
Authenticate::redirectWhenNotLogged();


$api = Helper::getApi();
$price = Helper::getValue('price', 100);
$deposit = Helper::getValue('deposit', 0);
$selected = Helper::getValue('selected', 0);

require_once "__head.php";
$finances = $api->getFinances(Authenticate::getUser());
?>
    <h1>Calculator</h1>

    <div class="container">
        <? ($message ? Helper::showMessage(Helper::DANGER, $message) : ""); ?>
        <form>
            <div class="form-group row">
                <label for="price" class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="price" id="price"
                           placeholder="" value="<?= $price ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="deposit" class="col-sm-3 col-form-label">Deposit</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="deposit" id="deposit" placeholder=""
                           value="<?= $deposit ?>">
                </div>
            </div>


            <h3>Products</h3>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Deposit</th>
                    <th>Duration</th>

                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($finances as $finance) {
                    ?>
                    <tr>
                        <th><?= $finance->getText() ?></th>
                        <td><?= $finance->getMinAmount() ?></td>
                        <td><?= $finance->getMinDeposit() ?> - <?= $finance->getMaxDeposit() ?> %</td>
                        <td><?= $finance->getAgreementDuration() ?></td>
                        <td>
                            <button type="submit" class="btn btn-primary" name="selected"
                                    value="<?= $finance->getId() ?>">Check
                            </button>
                        </td>
                    </tr>
                    <?
                }
                ?>
                </tbody>
            </table>

        </form>


        <?

        if ($selected) {
            $deal = $api->calculateDeal(Authenticate::getUser(), $selected, $price, $deposit);

            ?>
            <a href="credit-request.php?financeId=<?= $selected ?>&price=<?= $price ?>&deposit=<?= $deposit ?>"
               class="btn btn-success">Create Credit Request</a>
            <?

            var_dump($deal);


        }

        ?>
    </div>
<?
require_once "__foot.php";