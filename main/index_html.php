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
                <div class="du-text">This is how different electrical devices are causing your bills to add up</div>
            </div>
        </div>
        <div id="du-widget">
            <div id="du-widget-container" class="du-container" style="display:none">

                <div id="du-results">
                    <div id="du-players-container">
                    </div>
                    
                    <div id="du-image-generate" class="du-button-holder">
                        <button id="du-generate-button">Generate Image</button>
                        <button id="du-new-generate-button">Generate New Image</button>
                    </div>
                    <div id="du-image-output"></div>

                    </div>
                </div>
            </div>
            <?php if ($modules['leaflet']) { ?>
                <!-- /******************/
                    /* LEAFLET - INI  */ -->
                <div class="du-container">
                    <div id="du-map-holder">
                        <div id="du-lf-legend"></div>
                        <div id="du-map"></div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($modules['charts']) { ?>
                <!-- /******************/
                /* CHARTS - INI */ -->
                <div class="du-container">
                    <div class="du-chart-holder">
                        <canvas id="du-chart-bar" class="du-chart du-chart-type-bar"></canvas>
                    </div>
                    <div class="du-chart-holder">
                        <canvas id="du-chart-line" class="du-chart du-chart-type-line"></canvas>
                    </div>
                    <div class="du-chart-holder">
                        <canvas id="du-chart-pie" class="du-chart du-chart-type-pie"></canvas>
                    </div>
                </div>
            <?php } ?>
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
                <div class="du-footer-txt">* Based on prices set by Ofgem</div>
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