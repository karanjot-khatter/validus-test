<?php

include_once("includes/database.php");

function calculateTotalFundsRemaining ($commitmentId, $commitmentAmount)
{
    $total = turnIntoFloat($commitmentAmount);
    $commitments = getCommitmentInvestment($commitmentId);

    foreach ($commitments as $commitment) {
        $investment = $commitment['investment_amount'];
        $float = turnIntoFloat($investment);

        $total = $total - $float;
    }

    $total = number_format($total, 2);

    return $total;

}

function turnIntoFloat($total) {
    $removeString = $b = str_replace( ',', '', $total);
    $float = (float) $removeString;

    return $float;
}

?>
