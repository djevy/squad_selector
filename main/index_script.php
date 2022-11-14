<script>
    <?php
    $filesToLoad = array(
        "jq" => $project["urls"]["js"] . "jquery-3.6.0.min.js",
        "js" => array(),
        "css" => array(
            "##tempFinalFile##" .  $IndexApp->getCssFilename() . $project["options"]["localCacheBust"],
        )
    );
    /******
     * add Modules files to be loaded
     */
    foreach ($modulesData as $moduleDataKey => $moduleDataValue) {
        if (
            $modules[$moduleDataKey] &&
            isset($modulesData[$moduleDataKey]) &&
            isset($modulesData[$moduleDataKey]["files"]) &&
            isset($modulesData[$moduleDataKey]["files"][$project["localOrLive"]])
        ) {
            $filesToLoad = array_merge_recursive(
                $filesToLoad,
                $modulesData[$moduleDataKey]["files"][$project["localOrLive"]]
            );
        }
    }
    /******
     * SCRIPT TOP LIGHT
     */
    if ($local) {
    ?>
        let dashBoardEl = document.getElementById("current_setup");
        let addToDashboard = function(thisText) {
            let node = document.createElement("LI"); /* Create a <li> node */
            let textnode = document.createTextNode(thisText); /* Create a text node */
            node.appendChild(textnode); /* Append the text to <li> */
            node.classList.add("js");
            document.getElementById("current_setup").appendChild(node);
        }
        if (dashBoardEl) {
            addToDashboard("JS: <?php echo date("Ymd - H:i:s"); ?>");
        }
    <?php
    }
    ?>
    /**
     * Widget function
     */
    if (!<?php echo $project["widget"]["widgetFunction"]; ?>) {
        var <?php echo $project["widget"]["widgetFunction"]; ?> = function(
            thisScriptTag = false <?php echo $version ? ", versionKey = false" : ""; ?>
        ) {
            <?php
            $useThisId = $project["widget"]["id"];
            if ($version) {
                $useThisId = $project["widget"]["class"] . '-" + versionKey + "';
            }
            ?>
            const htmlId = "<?php echo $useThisId; ?>";
            document.getElementById(htmlId).className = document.getElementById(htmlId).className.replace(/du-wait-hide/g, '');
            var main = this;
            var mainEl;
            var jq;
            this.originalJq = false;
            var started = false;
            var docUrl = false;
            var docFullUrl = false;
            var clk = 0;
            const baseHtml =
                "<?php
                    $widgetInnerHtml = file_get_contents(
                        "http://localhost/"
                            . $project["urlsLocal"]["proj"]
                            . "?gen=innerHtml" . $addLive
                    );
                    echo addslashes($widgetInnerHtml);
                    ?>";
            const widgetKEY = "<?php echo $project["name"]["seo"]; ?>";
            /********
             * * INI - onReady
             *  */
            var onReady = function() {
                if (started) {
                    return true;
                }
                started = true;
                mainEl = getMainEl();
                du_startWindowResize();
                <?php if ($modules["supportClass"]) { ?>
                    du_startSupportClass();
                <?php } ?>
                jq("#du-widget-body", mainEl).html(baseHtml);
                docFullUrl = du_getMainUrl();
                docUrl = docFullUrl.split("?")[0];
                docUrl = docUrl.split("#")[0];

                <?php if ($modules['lotame']) { ?>
                    du_startLotame();
                <?php } ?>

                runWidgetStart();
                main.du_checkParentSize();
            };
            /* * END - onReady */
            var getMainEl = function() {
                var mainId = jq("#" + htmlId + ".du-body");
                var newMainEl = jq(mainId);
                if (
                    thisScriptTag &&
                    jq(thisScriptTag).length > 0
                ) {
                    var jqTemp = jq(thisScriptTag).closest(".du-body")
                    if (jqTemp.length > 0) {
                        newMainEl = jqTemp;
                    }
                }
                return newMainEl;
            }
            /********
             * * INI - revert webview 
             */
            var du_getMainUrl = function() {
                /* test webviews
                let y = "https://webviews.mirror.co.uk/sport/football/news/manchester-united-paul-pogba-keane-25192165/embedded-webview/mirror-25140497#amp=1";
                let y = "https://www.mirror.co.uk/sport/football/news/manchester-united-paul-pogba-keane-25192165";
                 */
                let thisDocUrl = window.location.href;
                if (
                    window.location != window.parent.location &&
                    document.referrer
                ) {
                    thisDocUrl = document.referrer;
                }
                let tempDocUrl = thisDocUrl.replace("webviews", "www");
                if (thisDocUrl != tempDocUrl) {
                    thisDocUrl = tempDocUrl.split("/embedded")[0];
                }
                return thisDocUrl;
            };
            /* * END - revert webview */
            /********
             * * INI - LOAD CSS FILE TYPE 
             */
            var du_loadCssFile = function(filename, main) {
                var head = document.getElementsByTagName("head")[0];
                var link = document.createElement("link");
                link.rel = "stylesheet";
                link.type = "text/css";
                link.href = filename;
                link.media = "all";
                if (main) {
                    link
                        .addEventListener('load', function() {
                            waitForThingsToLoad("css");
                        }, false);
                }
                head.appendChild(link);
            };
            /* * END - LOAD CSS FILE TYPE */
            /********
             * * INI - LOAD JS 
             */
            var loadJS = function(srcArray, callback) {
                var src = srcArray.shift();
                var scriptTag = document.createElement("script");
                scriptTag.src = src;
                scriptTag.async = "async";
                scriptTag.onreadystatechange = scriptTag.onload = function() {
                    var state = scriptTag.readyState;
                    if (!callback.done && (!state || /loaded|complete/.test(state))) {
                        callback.done = true;
                        if (srcArray.length > 0) {
                            loadJS(srcArray, function() {
                                callback();
                            });
                        } else {
                            callback();
                        }
                    }
                };
                document.getElementsByTagName("head")[0].appendChild(scriptTag);
            };
            /* * END - LOAD JS */
            /********
             * * INI - LOAD Files 
             */
            var startLoadCssFiles = function(cssFilesToLoad) {
                for (let index = 0; index < cssFilesToLoad.length; index++) {
                    du_loadCssFile(cssFilesToLoad[index], 0 == index);
                }
            };
            /* * END - LOAD Files */
            /********
             * * INI - start Jquery 
             */
            var startJq = function(filesToLoad) {
                var tempJq = {
                    "jquery": false,
                    "temp": false,
                    "loadNewJq": false
                };
                /** Check Jquery */
                if (typeof $ === "undefined") {
                    tempJq.loadNewJq = true;
                } else if (typeof $.fn !== "undefined") {
                    if ($.fn.jquery !== "3.6.0") {
                        tempJq.temp = $.noConflict(true);
                        tempJq.loadNewJq = true;
                    }
                } else {
                    tempJq.loadNewJq = true;
                    tempJq.temp = $;
                }
                if (tempJq.loadNewJq) {
                    filesToLoad.js.unshift(filesToLoad.jq);
                }
                if (filesToLoad.js.length > 0) {
                    loadJS(filesToLoad.js, function() {
                        loadJSFinal(tempJq);
                    });
                } else {
                    loadJSFinal(tempJq);
                }
            };
            var loadJSFinal = function(tempJq) {
                if (tempJq.loadNewJq) {
                    jq = $.noConflict(true);
                } else {
                    jq = $;
                }
                if (tempJq.temp) {
                    $ = tempJq.temp;
                } else {
                    $ = jq;
                }
                if (typeof $.fn !== "undefined") {
                    jQuery = $;
                }
                waitForThingsToLoad("js");
            };
            /* * END - start Jquery */
            /********
             * * INI - checksize 
             */
            /********
             * * * INI - Window Resize 
             */
            var du_startWindowResize = function() {
                jq(window).resize(function() {
                    if (main.resizeTO) {
                        clearTimeout(main.resizeTO);
                    }
                    main.resizeTO = setTimeout(function() {
                        jq(this).trigger("du-resizeEnd<?php echo $project["name"]["-bodyId"]; ?>");
                    }, 150);
                });
                jq(window).bind("du-resizeEnd<?php echo $project["name"]["-bodyId"]; ?>", function() {
                    main.du_checkParentSize();
                });
            };
            /* * * END - Window Resize */
            this.du_checkParentSize = function() {
                var jqMain = jq(mainEl);
                var jqPai = jq(mainEl).parent();
                <?php if ($project["options"]["breaks"]["tablet"]) { ?>
                    if (jqPai.width() > <?php echo $project["options"]["breaks"]["tablet"]; ?>) {
                        jqMain.removeClass("du-mobile du-tablet");
                    } else
                    <?php } ?>
                    if (jqPai.width() > <?php echo $project["options"]["breaks"]["mobile"]; ?>) {
                        jqMain
                            .removeClass("du-mobile")
                            .addClass("du-tablet");
                    } else {
                        jqMain
                            .removeClass("du-tablet")
                            .addClass("du-mobile");
                    }
            };
            /* * END - checksize */
            /********
             * * INI - WAIT
             */
            var wait = function(on) {
                if (on) {
                    jq(".du-wait", mainEl).show();
                } else {
                    jq(".du-wait", mainEl).hide();
                }
            };
            /* * END - WAIT */
            /********
             * * INI - INCLUDES
             */
            <?php
            include_once "index_script.widget.php";
            ?>
            /**
             !* ___  ___          _       _ 
             !* |  \/  |         | |     | |
             !* | .  . | ___   __| |_   _| | ___  ___ 
             !* | |\/| |/ _ \ / _` | | | | |/ _ \/ __|
             !* | |  | | (_) | (_| | |_| | |  __/\__ \
             !* \_|  |_/\___/ \__,_|\__,_|_|\___||___/
             */
            <?php
            foreach ($modules as $modulesKey => $modulesValue) {
                $moduleFilename = "modules/" . $modulesKey . ".script.php";
                if (
                    $modulesValue &&
                    file_exists($moduleFilename)
                ) {
                    include $moduleFilename;
                }
            }
            ?>
            /* * END - INCLUDES */
            /********
             * * INI - wait to start 
             */
            const filesToLoad = <?php echo json_encode($filesToLoad); ?>;
            startLoadCssFiles(filesToLoad.css);
            startJq(filesToLoad);
            /* * END - wait to start */
            var isReady = {
                "css": false,
                "js": false
            }
            setTimeout(function() {
                onReady();
            }, 10000);
            var waitForThingsToLoad = function(type) {
                isReady[type] = true;
                if (
                    isReady.css &&
                    isReady.js
                ) {
                    onReady();
                }
            }
        };
    };