<?php

include_once("includes/database.php");

$capital = null;


/*
 * @desc -  The below logic calculates values in the current notice column.
 * Used globally in call.phtml
 * @return - string value of calculated cost
 * @params -$commitmentId, $commitmentAmount
 */
function beforeCurrentNotice ($commitmentId, $commitmentAmount)
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
 * Used ONLY WITHIN THIS FILE.
 * @return - float value
 * @params -$total
 */
function turnIntoFloat($total) {
    $removeString = $b = str_replace( ',', '', $total);
    $float = (float) $removeString;

    return $float;
}

/*
 * @desc -  The below logic calculates values in the total Notice column
 * Used globally in call.phtml
 * @return -
 * @params -$paramCapital, $beforeCurrentNotice
 */
function totalNotice($paramCapital, $beforeCurrentNotice)
{

$currentNotice = turnIntoFloat($beforeCurrentNotice);

    if ($paramCapital > $currentNotice) {

        $difference = $paramCapital - $currentNotice;

        $reversedDifference = reversedNotice($paramCapital, $difference);

        return $reversedDifference;

    } else {

        return $paramCapital;

    }

}

function reversedNotice ($paramCapital, $difference)
{

    $difference = $paramCapital - $difference;

    return $difference;
}

?>
