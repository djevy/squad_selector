<style>
    <?php
    /* * *
    * GOOGLE FONTS, Imports should go on TOP
    */
    if (
        $widgetOptions &&
        isset($widgetOptions["fonts"]) &&
        count($widgetOptions["fonts"]) > 0
    ) {
        $fontImport[] = "@import url('https://fonts.googleapis.com/css2?family=";
        foreach ($widgetOptions["fonts"] as $fontKey => $fontValue) {
            $tempFontImport[] =
                implode(
                    ":",
                    array(
                        $fontValue['google-name'],
                        $fontValue['google-options-main']
                    )
                )
                . implode(
                    ";",
                    $fontValue['google-options']
                );
        }
        $fontImport[] = implode("&family=", $tempFontImport);
        $fontImport[] = "&display=swap');\n";
        echo implode("", $fontImport);
    }

    /******
     * CSS TOP LIGHT
     */
    if ($local) {
    ?>

    /** */
    #current_setup:after {
        content: "CSS: <?php echo date("Ymd - H:i:s"); ?>"
    }

    <?php
    }
    ?>

    /* RESET */
    div#du-body.du-body div,
    div#du-body.du-body h2,
    div#du-body.du-body h3,
    div#du-body.du-body p,
    div#du-body.du-body span,
    div#du-body.du-body ul,
    div#du-body.du-body li,
    div#du-body.du-body img,
    div#du-body.du-body button,
    div#du-body.du-body label,
    div#du-body.du-body input,
    div#du-body.du-body select {
        color: inherit;
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
        line-height: normal;
        box-sizing: content-box;
        min-width: auto;
    }

    div#du-body.du-body ul,
    div#du-body.du-body li {
        list-style: none;
    }

    div#du-body.du-body a:focus,
    div#du-body.du-body button:focus {
        outline: 1px dotted #FFF;
    }

    div#du-body.du-body select:focus,
    div#du-body.du-body textarea:focus,
    div#du-body.du-body input:focus {
        outline: 1px dotted #000;
    }

    div#du-body.du-body img {
        display: block;
        width: auto;
        height: auto;
    }

    div#du-body.du-body .du-img-hd,
    div#du-body.du-body h2::before,
    div#du-body.du-body h2::after,
    div#du-body.du-body h3::before,
    div#du-body.du-body h3::after {
        display: none
    }

    /* CLEARFIX */
    <?php
    /* ADD CF TOO */
    $cfClasses = "";
    $cfClassesIe = "";
    foreach ($cf as $value) {
        $cfClasses .= "div#du-body.du-body " . $value . ":after,\n";
        $cfClassesIe .= "div#du-body.du-body " . $value . ",\n";
    }
    echo $cfClasses;
    ?>

    /** */
    div#du-body.du-body:after {
        content: "";
        display: table;
        clear: both;
    }

    <?php echo $cfClassesIe; ?>

    /** */
    div#du-body.du-body {
        *zoom: 1;
    }

    /******
     * WAIT
     */
    div#du-body.du-body .du-wait {
        background: none no-repeat scroll center center #444444;
        background-color: rgba(0, 0, 0, 0.5);
        display: block;
        height: 100%;
        width: 100%;
        position: absolute;
        z-index: 3;
        left: 0;
        top: 0;
    }

    div#du-body.du-body .du-wait span {
        background: none no-repeat scroll center center transparent;
        background-color: rgba(0, 0, 0, 0.4);
        background-image: url("<?php echo $IndexApp->formatImageUrl("def_img", "spinning-loader-black-bg.gif"); ?>");
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
        display: block;
        height: 100px;
        margin: 0 auto;
        position: relative;
        top: 21%;
        width: 100px;
    }

    div#du-body.du-body.du-wait-hide .du-wait {
        display: none;
    }

    /******
     * JS warning
     */
    div#du-body.du-body .du-row-error,
    div#du-body.du-body #du-js-warning {
        font-weight: bold;
        text-align: center;
        background-color: #000;
        padding: 15px 0;
        color: red;
    }

    /******
     * placeholder
     */
    div#du-body.du-body ::-webkit-input-placeholder {
        color: #606060;
    }

    div#du-body.du-body :-moz-placeholder {
        /* Firefox 18- */
        color: #606060;
    }

    div#du-body.du-body ::-moz-placeholder {
        /* Firefox 19+ */
        color: #606060;
    }

    div#du-body.du-body :-ms-input-placeholder {
        color: #606060;
    }

    div#du-body.du-body ::placeholder {
        color: #606060;
    }

    div#du-body.du-body :focus::-webkit-input-placeholder {
        color: transparent;
    }

    /** *******
     * SPRITE
     */
    <?php
    if (
        $widgetOptions &&
        isset($widgetOptions["sprite"]) &&
        $widgetOptions["sprite"] &&
        count($widgetOptions["sprite"]) > 0
    ) {
        $sprites = array();
        $sprites_x2 = array();
        /**
         * generate sprite data
         */
        foreach ($widgetOptions["sprite"] as $spriteKey => $spriteValue) {
            $tempSprite = $IndexApp->calculateSprite($spriteValue);
            if ($tempSprite) {
                $sprites[$spriteKey] = $tempSprite["main"];
                $sprites[$spriteKey]["class"] = "div#du-body.du-body .du-" . $spriteKey;
            }
            if (
                $tempSprite &&
                $tempSprite["ratio2"]
            ) {
                $sprites_x2[$spriteKey] = $tempSprite["ratio2"];
                $sprites_x2[$spriteKey]["class"] = "div#du-body.du-body .du-" . $spriteKey;
            }
        }
        /**
         * write sprite css - INI
         */
        if (count($sprites) > 0) {
            foreach ($sprites as $spriteKey => $spriteValue) {
                echo $spriteValue["class"] . " {
                    background: url('" . $spriteValue["url"] . "') no-repeat scroll 0 0 transparent;
                }\n";
            }
        }
        /*** write sprite css - END */
        /**
         * write sprite X2 css - INI
         */
        if (count($sprites_x2) > 0) {
    ?>

    /** */
    /* Retina-specific stuff here */
    @media (-webkit-min-device-pixel-ratio: 2),
    (min-resolution: 192dpi) {
        <?php
            foreach ($sprites_x2 as $spriteKey => $spriteValue) {
                echo $spriteValue["class"] . " {
                    background-image: url('" . $spriteValue["url"] . "');
                    background-size: " . ($spriteValue["size"]["width"] / 2) . "px;
                }\n";
            }
        ?>
    }

    <?php
        }
        /*** write sprite X2 css - END */
    }
