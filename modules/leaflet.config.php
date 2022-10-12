<?php

/**
 * leaflet
 * v = 1.0
 */

$modulesData["leaflet"] = array(
    "config" => array(
        "tiles" => array(
            "url" => "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            "attribution" => '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>'
        )
    ),
    // "config" => false,
    "files"  => array(
        "local" => array(
            "js" => array(
                $project["urlsLocal"]["url"] . "js/leaflet.js"
            ),
            "css" => array(
                $project["urlsLocal"]["js"] . "leaflet.css"
            ),
        ),
        "live" => array(
            "js" => array(
                $project["urls"]["js"] . "leaflet.js"
            ),
            "css" => array(
                $project["urls"]["js"] . "leaflet.css"
            ),
        ),
    ),
);
