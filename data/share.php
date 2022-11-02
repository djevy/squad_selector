<?php
ob_start();

$formGetData = filter_input_array(INPUT_GET, FILTER_SANITIZE_ENCODED);

if (
    (!isset($formGetData['id']) || empty($formGetData['id'])) &&
    (!isset($formGetData['ref']) || empty($formGetData['ref']))
) {
    die("wrong data");
}

define('OKTORUN+IMCOOL+GHSD3KFGDD5WDG4DFASFDBZDF', TRUE);

$appOptions = array(
    "short" => "_wcss",
    "checkOrigin" => false,
    "debug" => false,
    "debugDB" => false,
    "localDbName" => "pick_your_team"
);

include "../../_base/return.base.php";
$appOptions["live"] = $mainOptions["live"];
if ($appOptions["live"]) {
    $appOptions["localDbName"] = false;
}

include './share.image.fun.php';

if ($appOptions["localDbName"]) {
    $baseDB["db"] = $appOptions["localDbName"];
}

$SquadSelectorDataApp = new SquadSelectorApp($baseDB, $appOptions);
$imageData = $SquadSelectorDataApp->getImageData($formGetData['id'], $formGetData['ref']);

if ($SquadSelectorDataApp) {
    $SquadSelectorDataApp->x();
}

$decodedData = base64_decode($imageData["url"], false);
$image = imageCreateFromString($decodedData);

if (!$image) {
    die("failed to create image");
}

imagepng($image);
imageDestroy($image);
header("Content-Type: image/png");
echo ob_get_contents();
