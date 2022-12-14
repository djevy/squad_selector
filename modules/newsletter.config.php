<?php

/**
 * Newsletter support
 * v = 1.0
 */

$modulesData["newsletter"] = array(
    "main" => $version["newsletter"],       // "birm_whatson", // loads first
    "default" => false,    // default newsletter, loads if no main newsletter is available "mirror_euro_20",
    "skin" => false,       // Skin version. "normal" (false), "short", "skinny"
    "style" => false,      // style version "light" (false), "dark",
    "callback" => "du_finished",   // "du_finished", // <- call after subscribing
    "skip" => "No thanks, I just want to see my squad image",       // "No thanks, I just want the results", // <- button message
    "files" => array(
        "local" => array(
            "js" => array(
                $project["urlsLocal"]["url"] . "newsletter_subscription/loc_files/du_newsletter.js"
            )
        ),
        "live" => array(
            "js" => array(
                $project["urls"]["js"] . "du_newsletter.min.js"
            )
        ),
    )
);
