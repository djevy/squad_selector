<script src="<?php echo "##tempFinalFile##" . $IndexApp->getScriptFilename() . $project["options"]["localCacheBust"]; ?>"></script>
<?php
$addMainNewsletter = "";
if (
    $modules["newsletter"] &&
    $modulesData["newsletter"] &&
    $modulesData["newsletter"]["main"]
) {
    $addMainNewsletter = 'data-du-newsletter="' . $modulesData["newsletter"]["main"] . '"';
}
?>
<div <?php echo
        'id="' . $project["widget"]["id"] . '" '
            . 'class="'
            . 'du-body du-mobile du-wait-hide '
            . $project["widget"]["class"]
            . '" '
            . $addMainNewsletter . " "
            . 'data-tmdatatrack="' . $project["widget"]["tmdatatrack"] . '"';
        ?>>
    <div class="du-wait"><span>&nbsp;</span></div>
    <noscript>
        <div id="du-js-warning">This widget requires javascript to work.</div>
    </noscript>
    <a name="du-top"></a>
    <div id="du-widget-body">
        <div id="du-temp-header" class="du-header">
            <div class="du-container">
                <h2><?php echo $project["name"]["headerAlt"]; ?></h2>
            </div>
        </div>
        <!-- ++++++++ -->
        <div id="du-main-header" class="du-header">
            <div class="du-container">
                <img class="du-header-img" alt="<?php echo $project["name"]["headerAlt"]; ?>" src="<?php echo $IndexApp->formatImageUrl("img", "du" . $project["name"]["_bodyId"] . "_header.png"); ?>" />
                <!-- <h2 id="du-widget-title"><?php echo $version["id"]; ?></h2> -->
                <img alt="<?php echo $version["id"]; ?> flag" id="du-country-flag" src="<?php echo $IndexApp->formatImageUrl("img", "du_" . $version["id"] . "_flag.png"); ?>" />
            </div>
        </div>
        <div id="du-sub-header"><img alt="Football fans" class="du-football-fans" src="<?php echo $IndexApp->formatImageUrl("img", "du" . $project["name"]["_bodyId"] . "_left.png"); ?>" /> Pick your <?php echo $version["id"]; ?> Squad and share with your friends <img alt="Football fans" class="du-football-fans" src="<?php echo $IndexApp->formatImageUrl("img", "du" . $project["name"]["_bodyId"] . "_right.png"); ?>" /></div>

        <div id="du-widget">
            <div id="du-widget-container" class="du-container" style="display:none">

                <div id="du-results">
                    <div id="du-players-container" class="du-holder">
                        <div class="du-text du-player-title">GOALKEEPERS <span id="du-selected-goal-keeper-counter">0</span>/3</div>
                        <div class="du-players" id="du-goal-keeper"></div>
                        <img alt="Football icon" class="du-football-icon" src="<?php echo $IndexApp->formatImageUrl("img", "du" . $project["name"]["_bodyId"] . "_icon1.png"); ?>" />
                        <div class="du-text">PLAYERS <span id="du-selected-player-counter">0</span>/23</div>
                        <div class="du-text du-player-title">DEFENDERS</div>
                        <div class="du-players" id="du-defender"></div>
                        <img alt="Football icon" class="du-football-icon" src="<?php echo $IndexApp->formatImageUrl("img", "du" . $project["name"]["_bodyId"] . "_icon2.png"); ?>" />
                        <div class="du-text du-player-title">MIDFIELDERS</div>
                        <div class="du-players" id="du-midfielder"></div>
                        <img alt="Football icon" class="du-football-icon" src="<?php echo $IndexApp->formatImageUrl("img", "du" . $project["name"]["_bodyId"] . "_icon3.png"); ?>" />
                        <div class="du-text du-player-title">FORWARDS</div>
                        <div class="du-players" id="du-forward"></div>
                        <img alt="Football icon" class="du-football-icon" src="<?php echo $IndexApp->formatImageUrl("img", "du" . $project["name"]["_bodyId"] . "_icon4.png"); ?>" />
                    </div>

                    <div id="du-submit-holder" class="du-button-holder">
                        <div id="du-submit-button">Submit list</div>
                    </div>
                    <div id="du-image-generate" class="du-button-holder">
                        <div id="du-generate-button">Generate Image</div>
                        <div id="du-new-generate-button">Generate New Image</div>
                    </div>

                    <div id="du-image-output"></div>

                    <div id="du-average-list-holder" class="du-holder">
                        <div class="du-instruction-text">User's most common team placement</div>
                        <div id="du-average-list" class="du-list-holder">
                            <div id="du-goalkeeper-title" class="du-text du-player-title">GOALKEEPERS</div>
                            <div class="du-players" id="du-average-goalkeeper"></div>
                            <div id="du-defender-title" class="du-text du-player-title">DEFENDERS</div>
                            <div class="du-players" id="du-average-defender"></div>
                            <div id="du-midfielder-title" class="du-text du-player-title">MIDFIELDERS</div>
                            <div class="du-players" id="du-average-midfielder"></div>
                            <div id="du-forward-title" class="du-text du-player-title">FORWARDS</div>
                            <div class="du-players" id="du-average-forward"></div>
                        </div>
                    </div>
                    <div class="du-button-holder">
                        <div id="du-average-toggle">Hide average</div>
                    </div>



                    <div id="du-confirmation-modal" class="modal">
                        <div class="du-modal-content">
                            <span id="du-modal-close" class="du-modal-close">&times;</span>
                            <p>Are you sure you want to submit your squad to the most common picks?</p>
                            <p>You can only submit your squad once</p>
                            <div id="du-modal-footer">
                                <div class="du-button-holder">
                                    <div id="du-confirm-submit">Confirm</div>
                                </div>
                                <div class="du-button-holder du-modal-close">
                                    <div id="du-cancel-submit">Cancel</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="du-footer" style="display:none">
        <div class="du-container">
            <!-- <div class="du-footer-txt">* Based on prices set by Ofgem</div> -->
            <?php
            if (
                $modules["social"] &&
                $modulesData["social"]
            ) { ?>
                <ul id="du-social-holder">
                    <li class="du-social-box"><a class="du-social-btn du-btn" target="_blank" href="" title=""><span></span></a></li>
                </ul>
            <?php } ?>
        </div>
    </div>
    <?php if (
        $modules["newsletter"] &&
        $modulesData["newsletter"]
    ) { ?>
        <!-- /******************/
            /* Newsletter - INI  */ -->
        <div class="du-nlf-holder"></div>
    <?php } ?>
    <!-- ++++++++ -->
</div>
<?php
if ($local) {
    /**
     * for local testing of social buttons
     */
?>
    <!--meta property="fb:app_id" content="226899387441465"-->
    <meta property="fb:app_id" content="261815760677199">
    <meta name="twitter:site" value="@MENSports">
<?php } ?>
<script>
    (function(me) {
        function waitForIt(thisFunc, attempts) {
            if (typeof(window[thisFunc]) == "function") {
                const thisApp =
                    new window[thisFunc](
                        <?php
                        $vars = array(
                            "me",
                        );
                        if ($version) {
                            $vars[] = "'" . $version["id"] . "'";
                        }
                        echo implode(", ", $vars);
                        ?>
                    );
            } else {
                if (--attempts > 0) {
                    setTimeout(function() {
                        waitForIt(thisFunc, attempts)
                    }, 150);
                }
            }
        }
        waitForIt("<?php echo $project["widget"]["widgetFunction"]; ?>", 30);
    }(document.currentScript));
</script>
</div>