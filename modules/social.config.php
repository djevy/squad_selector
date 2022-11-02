<?php

/**
 * Social
 * v = 1.0
 */
$projectHash = camelCaseHash($project["name"]["long"]);

$modulesData["social"] = array(
    "toScript" => array(
        "card" => "https://trinitymirrordataunit.com/squad_selector/share/shareCard.php?id=##uuid##&ref=##ref##&vers=##vers##",
        "message" => "I just used the " . $project["name"]["long"] . " interactive on ",
        "hash" => "reachDataUnit," . $projectHash,
    ),
    "btns" => array(
        "Facebook",
        "Twitter",
        "WhatsApp",
    ),
);
