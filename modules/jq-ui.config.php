<?php

/**
 * JQUERY UI support
 * v = 1.0
 */

$modulesData["jq-ui"] = array(
    "files"  => array(
        "local" => array(
            "js" => array(
                $project["urlsLocal"]["js"] . "jquery-ui.min.js",
                $project["urlsLocal"]["js"] . "jquery.ui.touch-punch.min.js",
                $project["urlsLocal"]["js"] . "html2canvas.js"
            )
        ),
        "live" => array(
            "js" => array(
                $project["urls"]["js"] . "jquery-ui.min.js",
                $project["urls"]["js"] . "jquery.ui.touch-punch.min.js",
                $project["urls"]["js"] . "html2canvas.js"
            )
        ),
    ),
);
