<?php

/**
 * Social
 * v = 1.0
 */
$projectHash = camelCaseHash($project["name"]["long"]);

$modulesData["social"] = array(
    "toScript" => array(
        "message" => "I just used the " . $project["name"]["long"] . " interactive on ",
        "hash" => "reachDataUnit," . $projectHash,
    ),
    "btns" => array(
        "Facebook",
        "Twitter",
        "WhatsApp",
    ),
);
