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
                <h2 id="du-widget-title"><?php echo $project["name"]["headerAlt"]; ?></h2>
                <!-- <div id="du-widget-sub-title" class="du-text">We're here to help</div> -->
                <div class="du-text">Pick your <?php echo $version["id"]; ?> Squad and share with your friends</div>
            </div>
        </div>
        <div id="du-widget">
            <div id="du-widget-container" class="du-container" style="display:none">

                <div id="du-results">
                    <div id="du-submit-holder" class="du-button-holder">
                        <button id="du-submit-button">Submit list</button>
                    </div>
                    <div id="du-players-container">
                        <div class="du-text">Players <span id="du-selected-player-counter">0</span>/23</div>
                        <div class="du-text">Forward</div>
                        <div class="du-players" id="du-forward"></div>
                        <div class="du-text">Midfielder</div>
                        <div class="du-players" id="du-midfielder"></div>
                        <div class="du-text">Defender</div>
                        <div class="du-players" id="du-defender"></div>
                        <div class="du-text">Goal keepers <span id="du-selected-goal-keeper-counter">0</span>/3</div>
                        <div class="du-players" id="du-goal-keeper"></div>
                    </div>

                    <div id="du-image-generate" class="du-button-holder">
                        <button id="du-generate-button">Generate Image</button>
                        <button id="du-new-generate-button">Generate New Image</button>
                    </div>
                    <div id="du-image-output"></div>

                    <div id="du-average-list-holder">
                        <div class="du-instruction-text">User's most common team placement</div>
                        <div id="du-average-list" class="du-list-holder">
                            <div class="du-text">Players</div>
                            <div class="du-text">Forward</div>
                            <div class="du-players" id="du-average-forward"></div>
                            <div class="du-text">Midfielder</div>
                            <div class="du-players" id="du-average-midfielder"></div>
                            <div class="du-text">Defender</div>
                            <div class="du-players" id="du-average-defender"></div>
                            <div class="du-text">Goal keepers</div>
                            <div class="du-players" id="du-goal-average-keeper"></div>
                        </div>
                        <div class="du-button-holder">
                            <button id="du-average-toggle">Hide average</button>
                        </div>
                    </div>



                    <div id="du-confirmation-modal" class="modal">
                        <div class="du-modal-content">
                            <span id="du-modal-close" class="du-modal-close">&times;</span>
                            <p>Are you sure you want to submit your squad?</p>
                            <p>You can only submit your squad once</p>
                            <div id="du-modal-footer">
                                <div class="du-button-holder">
                                    <button id="du-confirm-submit">Confirm</button>
                                </div>
                                <div class="du-button-holder du-modal-close">
                                    <button id="du-cancel-submit">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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