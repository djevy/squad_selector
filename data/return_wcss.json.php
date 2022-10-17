<?php
$appOptions = array(
    "short" => "_wcss",
    "checkOrigin" => false,
    "debug" => true,
    "debugDB" => false,
    "localDbName" => "pick_your_team"
);

$localTry = true;
// $localTry = false;


define('OKTORUN+IMCOOL+GHSD3KFGDD5WDG4DFASFDBZDF', TRUE);
include "../../_base/return.base.php";
$appOptions["live"] = $mainOptions["live"];
if ($appOptions["live"]) {
    $appOptions["localDbName"] = false;
}

/* * *
 * VALIDATE ORIGIN
 * * */
if (!$appOptions["checkOrigin"]) {
    header("Access-Control-Allow-Origin: *");
} else {
    $specialExemptions = false;
    /*
      $specialExemptions = array(
      "localhost"
      );
     */
    $OriginChecker = new CheckOriginClass($specialExemptions);

    if (!$OriginChecker->isOriginOk()) {
        $msg = $OriginChecker->getOriginError();
        if (!$appOptions["debug"]) {
            $msg = "";
        }
        die($msg);
    }
}

if ($localTry) {
    // local
    header("Access-Control-Allow-Origin: *");

    $dieMsg = array(
        'origin_not_set' => 'origin_not_set',
        'origin_not_ok' => 'origin_not_ok',
        'invalid_type' => 'invalid_type'
    );
    $data = $_REQUEST;
} else {
    // production
    if (!isset($_SERVER['HTTP_ORIGIN'])) {
        die($dieMsg['origin_not_set']);
    } else {
        $http_origin = $_SERVER['HTTP_ORIGIN'];
    }

	
    $http_ok = "";
    include_once '../../_base/publications.php';

    if (in_array($http_origin, $http_ok)) {
        header("Access-Control-Allow-Origin: $http_origin");
    } else {
        die($dieMsg['origin_not_ok']);
    }
    $data = $_POST;
}

/* OPTIONS */
$availableTypes = array(
    "start", "vote",
);
/* INPUT VARIABLES */
// $baseFilter = array(
//     'filter' => FILTER_SANITIZE_STRING,
//     'flags' => FILTER_FLAG_NO_ENCODE_QUOTES
// );
// $baseArrayFilter = array(
//     'filter' => FILTER_SANITIZE_STRING,
//     'flags' => FILTER_FLAG_NO_ENCODE_QUOTES | FILTER_REQUIRE_ARRAY
// );
// $myInputsArgs = array(
//     "type" => $baseFilter,
//     "app" => $baseFilter,
//     "votes" => $baseFilter,
// );
// $myInputs = filter_input_array(INPUT_POST, $myInputsArgs);
// if (is_null($myInputs)) {
//     $myInputs = array();
// }
if (!isset($data['type']) || !in_array($data['type'], $availableTypes)) {
    die($dieMsg['invalid_type']);
}

// if (
//     !isset($myInputs["type"]) ||
//     !in_array($myInputs["type"], $availableTypes)
// ) {
//     die($dieMsg["invalid_type"]);
// } else if ($myInputs["type"] == "vote" && !isset($myInputs['votes'])) {
//     die($dieMsg["missing_data"]);
// }

/* READY TO START */
include_once "return" . $appOptions["short"] . ".json.fun.php";
if ($appOptions["localDbName"]) {
    $baseDB["db"] = $appOptions["localDbName"];
}

$SquadSelectorDataApp = new SquadSelectorApp($baseDB, $appOptions);

/* * **** this app ***** */
$res = array();
switch ($data['type']) {
    case "vote":
        $res = $SquadSelectorDataApp->storeReply($data);
        break;
    case "start":
        $res = $SquadSelectorDataApp->readResults($data);
        break;
}

/* * **** this app ***** */
if ($res) {
    echo $SquadSelectorDataApp->returnJsonReady($res);
}

$SquadSelectorDataApp->x();
