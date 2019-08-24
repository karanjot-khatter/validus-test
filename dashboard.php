<?php

//header of document - displayed on every page, due to consistency..
include_once("includes/header.html");

include_once("includes/dashboard.phtml");

$cID = $_POST['cId'];

$notice = $_POST['notice'];


if (isset($cID)) {
    insertCallData();
    if ($notice > 0) {
        insertInvestmentData();
    }
}




