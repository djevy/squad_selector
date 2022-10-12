<?php
ob_start();
include "_pkgInc/IndexClass.php";
$myInputsArgs = array(
    "live" => FILTER_SANITIZE_ENCODED,
    "gen" => FILTER_SANITIZE_ENCODED,
    "version" => FILTER_SANITIZE_ENCODED,
);
$myInputs = filter_input_array(INPUT_GET, $myInputsArgs);
if (is_null($myInputs)) {
    $myInputs = array();
}
$local = !(isset($myInputs["live"]) && !!$myInputs["live"]);
include "configs/config.versions.php";
$version = false;
if ($versions) {
    if (
        isset($myInputs["version"]) &&
        array_key_exists($myInputs["version"], $versions)
    ) {
        $version = $versions[$myInputs["version"]];
        $version['id'] = $myInputs["version"];
    } else {
        unset($myInputs["version"]);
        unset($myInputs["gen"]);
    }
}
include "configs/config.main.php";
include "configs/config.widget.php";
$indexOptions = array(
    "modules" => $modules,
    "myInputs" => $myInputs,
    "local" => $local,
    "name" => $project["name"],
    "widget" => $project["widget"],
    "urls" => $project["urls"],
    "urlsLocal" => $project["urlsLocal"],
    "version" => false,
    "versionData" => false,
    "versionOptions" => $versionsFiles,
);
if ($version) {
    $indexOptions["version"] = $version['id'];
    $indexOptions["versionData"] = $version;
}
$IndexApp = new IndexApp($indexOptions);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $project["name"]["long"]; ?> - Interactive</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0" />
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW" />
    <link rel="stylesheet" href="_pkgInc/holderPage.css.php" />
    <style>
        body {
            margin: 0;
            padding: 0
        }
    </style>
</head>

<body class="<?php echo $IndexApp->getBodyClass(); ?>">
    <?php echo $IndexApp->getOptionsLightsHtml(); ?>
    <!-- ********************************** INI *************************** -->
    <!-- #### -->
    <?php
    $addLive = "";
    if (!$local) {
        $addLive = "&live=1";
    }
    if (isset($myInputs["version"])) {
        $addLive .=  "&version=" . $myInputs["version"];
    }
    if (isset($myInputs["gen"])) {
        switch ($myInputs["gen"]) {
            case "css":
                ob_clean();
                include "main/index_css.php";
                $IndexApp->formatAndSaveCss(ob_get_contents());
                die();
                break;
            case "script":
                ob_clean();
                include "main/index_script.php";
                $IndexApp->formatAndSaveJs(ob_get_contents());
                die();
                break;
            case "innerHtml":
                ob_clean();
                include "main/index_html.php";
                $IndexApp->generateInnerHtml(ob_get_contents());
                break;
            case "widget":
                include "main/index_html.php";
                $IndexApp->generateMainHtml(ob_get_contents(), $addLive);
                break;
            default:
                echo "Bad option";
                break;
        }
    } else {
        include "configs/config.info.php";
        include "main/index.info.php";
    }
    ?>

    <!-- #### -->
    <!-- ********************************** END *************************** -->
</body>

</html><?php
        if (!$local) {
            $IndexApp->formatAndSaveCodeFiles(ob_get_contents());
        }
