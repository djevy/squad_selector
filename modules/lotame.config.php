<?php

/**
 * lotame
 * v = 1.0
 */

$modulesData["lotame"] = array(
    "config" => array(
        "main" => array(
            "clientID" => "7101",
            "lotameID" => "9458",
            "pixelID" => "100175523" // Get you ID here - https://docs.google.com/spreadsheets/d/1yT1hXRe4uSRIKjU13xYqwyYltkjSYv2XS5PA0WY1F6A/edit#gid=0
        ),
    ),
    "files"  => array(
        "local" => array(
            "js" => array(
                $project["urlsLocal"]["js"] . "lotame_v2.min.js"
            )
        ),
        "live" => array(
            "js" => array(
                $project["urls"]["js"] . "lotame_v2.min.js"
                //"https://www.trinitymirrordataunit.com/test/" . "lotame_v2.min.js"
            )
        )
    )
);
