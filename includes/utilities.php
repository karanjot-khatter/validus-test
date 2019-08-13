<?php

include_once("includes/database.php");

if (isset($_POST["capital"])) {
    $date = date('Y-m-d');
    $capital = $_POST["capital"];
    $name = $_POST['name'];
}

/*
 * @desc -  The below logic calculates current notice taking away
 * Used globally in call.phtml
 * @return - string value of calculated cost
 * @params -$commitmentId, $commitmentAmount
 */
function calculateTotalFundsRemaining ($commitmentId, $commitmentAmount)
{
    $total = turnIntoFloat($commitmentAmount);
    $commitments = getCommitmentInvestment($commitmentId);

    foreach ($commitments as $commitment) {
        $investment = $commitment['investment_amount'];
        $float = turnIntoFloat($investment);

        //calculation all done in float value...
        $total = $total - $float;
    }

    //'turn back into string with
    $total = number_format($total, 2);

    return $total;

}
/*
 * @desc -  The below logic turns the $total paramater into a float.
 * Used globally in call.phtml
 * @return - float value
 * @params -$total
 */
function turnIntoFloat($total) {
    $removeString = $b = str_replace( ',', '', $total);
    $float = (float) $removeString;

    return $float;
}

?>
