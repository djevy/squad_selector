<?php

$widgetOptions = array(
    "sprite" => array(
        "icon" => "du" . $project["name"]["_bodyId"] . "_sprite",
        "icon-btn" => "du" . $project["name"]["_bodyId"] . "_sprite_btn",
    ),
    //"sprite" => false,
    "colors" => array(
        "main" =>   "#a7120e",
        "map-bg" => "#1ed5ff",
        "light" =>  "#E76060",
    ),
    "fonts" => array(
        "main" => array(
            "font-family" => '"Open Sans", sans-serif',
            "google-name" => "Open+Sans",
            "google-options-main" => "wght@",
            "google-options" => array(
                "400",
                "700",
                "800"
            )
        ),
        "sec" => array(
            "font-family" => '"Signika Negative", sans-serif',
            "google-name" => "Signika+Negative",
            "google-options-main" => "wght@",
            "google-options" => array(
                "400",
                "700"
            )
        )
    )
);
