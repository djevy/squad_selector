<?php

/**
 * Names
 */
$projectTemp = array(
    "nameSeo" => "squad_selector",
    "nameBodyId" => "wcss",
);
$project = array(
    "localOrLive" => $local ? "local" : "live",
    "name" => array(
        "long" => "World Cup Squad Selector",
        "headerAlt" => "World Cup Squad Selector",
        "seo" => $projectTemp["nameSeo"],
        "key" => str_replace("_", "-", $projectTemp["nameSeo"]),
        "bodyId" => $projectTemp["nameBodyId"],
        "_bodyId" => "_" . $projectTemp["nameBodyId"],
        "-bodyId" => "-" . $projectTemp["nameBodyId"],
    ),
    "options" => array(
        "breaks" => array(
            "tablet" => false, // false for mid size options
            "mobile" => 618,
        ),
        "localCacheBust" => "?cache=" . date("zHis")
    ),
    "folder" => array(
        /*
        * this project folder local 
        */
        "local" => "projects/" . "squad_selector",
        /** this project folder live if different */
        "live" => "squad_selector",
    )
);
$projectTemp["widgetId"] = "du-proj-" . $project["name"]["key"];
$project["widget"] = array(
    "id" => $projectTemp["widgetId"],
    "class" => "",
    "css" => "div#" . $projectTemp["widgetId"] . ".du-body",
    "widgetFunction" =>
    "du_" . $project["name"]["seo"]
        . $project["name"]["_bodyId"]
        . "_widget",
    /** FELIX */
    "tmdatatrack" => "data-unit_" . str_replace("_", "-", $project["name"]["seo"]),
);
/**
 * VERSIONS
 */
if ($version) {
    $project["widget"]["id"]
        = $projectTemp["widgetId"] . "-" . $version["id"];
    $project["widget"]["class"]
        = $projectTemp["widgetId"];
    $project["widget"]["css"]
        = "div." . $projectTemp["widgetId"] . ".du-body";
    $project["widget"]["tmdatatrack"] .=  str_replace("_", "-", $version["id"]);
}
/**
 * Urls Local
 */
$base_s3 = "../";
$base_s3_url = "http://localhost/";
$url_server = "../";
$projectFolder = $project["folder"]["local"];
$project["urls"] = array(
    "url" => $url_server,
    "proj" => $projectFolder . "/",
    "img" => "../" . $base_s3 . $projectFolder . "/img/",
    "img_file" =>  $base_s3_url . $projectFolder . "/img/",
    "def_img" => $base_s3 . "_img_pkg/base/",
    "def_img_file" => $base_s3_url . "projects/_img_pkg/base/",
    "js" => $base_s3 . "js/",
    "toSave" => array(
        "toMin" => "code_to_min/",
        "files" => "code_local/",
        "preview" => "code_preview/",
    )
);
$project["urlsLocal"] = $project["urls"];
/**
 * Urls Live
 */
if (!$local) {
    $base_s3 = "https://static.trinitymirrordataunit.com/";
    $url_server = "https://www.trinitymirrordataunit.com/";
    if ($project["folder"]["live"]) {
        $projectFolder = $project["folder"]["live"];
    }
    $project["urls"] = array(
        "url" => $url_server,
        "proj" => $projectFolder,
        "img" => $base_s3 . "img/" . $projectFolder . "/",
        "def_img" => $base_s3 . "img/base/",
        "js" => $base_s3 . "js/",
        "toSave" => array(
            "toMin" => "code_to_min/",
            "files" => "code_to_min/",
            "preview" => "code_preview/",
        )
    );
    $project["urls"]["img_file"] = $project["urls"]["img"];
    $project["urls"]["def_img_file"] = $project["urls"]["def_img"];
    $project["options"]["localCacheBust"] = "";
}

/*********************************************
     ___  ___          _       _             *
     |  \/  |         | |     | |            *
     | .  . | ___   __| |_   _| | ___  ___   *
     | |\/| |/ _ \ / _` | | | | |/ _ \/ __|  *
     | |  | | (_) | (_| | |_| | |  __/\__ \  *
     \_|  |_/\___/ \__,_|\__,_|_|\___||___/  */

include "configs/config.modules.php";
foreach ($modules as $moduleKey => $moduleValue) {
    $moduleFilename = "modules/" . $moduleKey . ".config.php";
    if (
        $moduleValue &&
        file_exists($moduleFilename)
    ) {
        include $moduleFilename;
    }
}
