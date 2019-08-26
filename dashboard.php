<?php

//header of document - displayed on every page, due to consistency..
include_once("includes/header.html");

include_once("includes/dashboard.phtml");

$cID = $_POST['cId'];
$notice = $_POST['notice'];
$commitment =  $_POST['commitmentId'];
$fundId =  $_POST['fundId'];

$noticeArray = explode("," , $notice);
$commitmentArray = explode("," , $commitment);
$fundArray = explode("," , $fundId);

$count = 0;
$fund = $fundArray[$count];

if (isset($cID)) {
    if ($call['call_id'] != $cID) {
        insertCallData();
        foreach ($noticeArray as $notice) {
            if ($notice > 0) {
                $commitment = $commitmentArray[$count];
                $fund = $fundArray[$count];
                $noticeCommas = number_format($notice, 2);
                insertInvestmentData($commitment, $fund, $noticeCommas);
            }
            ++$count;
        }
    }
}




