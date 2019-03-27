<?php

require_once('classes/FetchData.php');
require_once('classes/InlineTable.php');

$FetchData = new FetchData();
$InlineTable = new InlineTable();

if( isset( $_REQUEST['SelectAllInfo'] )) {
    SelectAllInfo($FetchData);
} else if( isset( $_REQUEST['InsertInfo'] )) {
    InsertInfo($FetchData);
} else if( isset( $_REQUEST['DeleteInfo'] )) {
    DeleteInfo($FetchData);
} else if( isset( $_REQUEST['InlineTableGetData'] ) ) {
    InlineTableGetData($InlineTable);
} else if( isset($_REQUEST['InlineTableInsertData']) ) {
    InlineTableInsertData($InlineTable);
} else if( isset($_REQUEST['InlineTableUpdateData']) ) {
    InlineTableUpdateData($InlineTable);
} else if( isset($_REQUEST['InlineTableDeleteData']) ) {
    InlineTableDeleteData($InlineTable);
}

else {
    echo "NotFoundException";
}


function InlineTableDeleteData($InlineTable) {
    $id = json_decode(file_get_contents("php://input"))->id;
    return $InlineTable->InlineTableDeleteData($id);
}

function InlineTableUpdateData($InlineTable) {
    $form_data = file_get_contents("php://input");
    return $InlineTable->InlineTableUpdateData($form_data);
}

function InlineTableInsertData($InlineTable) {
    $form_data = file_get_contents("php://input");
    return $InlineTable->InlineTableInsertData($form_data);
}

function InlineTableGetData($InlineTable) {
    return $InlineTable->InlineTableGetData();
}

function SelectAllInfo($FetchData) {
    return $FetchData->SelectInfo();
}

function InsertInfo($FetchData) {
    $form_data = file_get_contents("php://input");
    return $FetchData->InsertInfo($form_data);
}

function DeleteInfo($FetchData) {
    $id = json_decode(file_get_contents("php://input"))->id;
    return $FetchData->DeleteInfo($id);
}

