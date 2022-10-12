<style>
    /******
    * Leaflet
    */
    div#du-body.du-body #du-map-holder {
        position: relative;
        z-index: 1;
        width: 96%;
        margin: 0 auto;
    }

    div#du-body.du-body #du-map {
        position: relative;
        z-index: 1;
        border: 2px solid <?php echo $widgetOptions["colors"]["main"]; ?>;
        background: <?php echo $widgetOptions["colors"]["map-bg"]; ?>;
        height: 300px;
    }

    /* required styles */
    div#du-body.du-body .leaflet-zoom-box {
        width: 0;
        height: 0;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    div#du-body.du-body .leaflet-vml-shape {
        width: 1px;
        height: 1px;
    }

    div#du-body.du-body .lvml {
        display: inline-block;
    }

    div#du-body.du-body .leaflet-top .leaflet-control {
        margin-top: 10px;
    }

    div#du-body.du-body .leaflet-bottom .leaflet-control {
        margin-bottom: 10px;
    }

    div#du-body.du-body .leaflet-left .leaflet-control {
        margin-left: 10px;
    }

    div#du-body.du-body .leaflet-right .leaflet-control {
        margin-right: 10px;
    }

    div#du-body.du-body .leaflet-container a {
        color: #0078A8;
    }

    div#du-body.du-body .leaflet-zoom-box {
        border: 2px dotted #38f;
    }

    /* general typography */
    div#du-body.du-body .leaflet-container {
        font: 12px/1.5 "Helvetica Neue", Arial, Helvetica, sans-serif;
    }

    div#du-body.du-body .leaflet-bar a,
    div#du-body.du-body .leaflet-bar a:hover {
        border-bottom: 1px solid #ccc;
        line-height: 26px;
        color: black;
    }

    div#du-body.du-body .leaflet-bar a:last-child {
        border-bottom: none;
    }

    div#du-body.du-body .leaflet-bar a.leaflet-disabled {
        color: #bbb;
    }

    div#du-body.du-body .leaflet-touch .leaflet-bar a {
        line-height: 30px;
    }

    div#du-body.du-body .leaflet-control-zoom-in,
    div#du-body.du-body .leaflet-control-zoom-out {
        font: bold 18px 'Lucida Console', Monaco, monospace;
    }

    div#du-body.du-body .leaflet-control-zoom-out {
        font-size: 20px;
    }

    div#du-body.du-body .leaflet-touch .leaflet-control-zoom-in {
        font-size: 22px;
    }

    div#du-body.du-body .leaflet-touch .leaflet-control-zoom-out {
        font-size: 24px;
    }

    div#du-body.du-body .leaflet-control-layers-expanded {
        padding: 6px 10px 6px 6px;
        color: #333;
    }

    div#du-body.du-body .leaflet-control-layers-scrollbar {
        padding-right: 5px;
    }

    div#du-body.du-body .leaflet-control-layers-selector {
        margin-top: 2px;
    }

    div#du-body.du-body .leaflet-control-layers-separator {
        border-top: 1px solid #ddd;
        margin: 5px -10px 5px -6px;
    }

    div#du-body.du-body .leaflet-container .leaflet-control-attribution {
        margin: 0;
    }

    div#du-body.du-body .leaflet-control-attribution,
    div#du-body.du-body .leaflet-control-scale-line {
        padding: 0 5px;
        color: #333;
    }

    div#du-body.du-body .leaflet-container .leaflet-control-attribution,
    div#du-body.du-body .leaflet-container .leaflet-control-scale {
        font-size: 11px;
    }

    div#du-body.du-body .leaflet-left .leaflet-control-scale {
        margin-left: 5px;
    }

    div#du-body.du-body .leaflet-bottom .leaflet-control-scale {
        margin-bottom: 5px;
    }

    div#du-body.du-body .leaflet-control-scale-line {
        border: 2px solid #777;
        border-top: none;
        line-height: 1.1;
        padding: 2px 5px 1px;
        font-size: 11px;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    div#du-body.du-body .leaflet-control-scale-line:not(:first-child) {
        border-top: 2px solid #777;
        border-bottom: none;
        margin-top: -2px;
    }

    div#du-body.du-body .leaflet-control-scale-line:not(:first-child):not(:last-child) {
        border-bottom: 2px solid #777;
    }

    div#du-body.du-body .leaflet-touch .leaflet-control-layers,
    div#du-body.du-body .leaflet-touch .leaflet-bar {
        border: 2px solid rgba(0, 0, 0, 0.2);
    }

    div#du-body.du-body .leaflet-popup {
        margin-bottom: 20px;
    }

    div#du-body.du-body .leaflet-popup-content-wrapper {
        padding: 1px;
        text-align: left;
    }

    div#du-body.du-body .leaflet-popup-content {
        margin: 13px 19px;
        line-height: 1.4;
    }

    div#du-body.du-body .leaflet-popup-content p {
        margin: 18px 0;
    }

    div#du-body.du-body .leaflet-popup-tip-container {
        margin-left: -20px;
    }

    div#du-body.du-body .leaflet-popup-tip {
        padding: 1px;
        margin: -10px auto 0;
    }

    div#du-body.du-body .leaflet-popup-content-wrapper,
    div#du-body.du-body .leaflet-popup-tip {
        color: #333;
    }

    div#du-body.du-body .leaflet-container a.leaflet-popup-close-button {
        padding: 4px 4px 0 0;
        border: none;
        font: 16px/14px Tahoma, Verdana, sans-serif;
        color: #c3c3c3;
    }

    div#du-body.du-body .leaflet-container a.leaflet-popup-close-button:hover {
        color: #999;
    }

    div#du-body.du-body .leaflet-popup-scrolled {
        border-bottom: 1px solid #ddd;
        border-top: 1px solid #ddd;
    }

    div#du-body.du-body .leaflet-oldie .leaflet-popup-tip {
        margin: 0 auto;
    }

    div#du-body.du-body .leaflet-oldie .leaflet-popup-tip-container {
        margin-top: -1px;
    }

    div#du-body.du-body .leaflet-oldie .leaflet-control-zoom,
    div#du-body.du-body .leaflet-oldie .leaflet-control-layers,
    div#du-body.du-body .leaflet-oldie .leaflet-popup-content-wrapper,
    div#du-body.du-body .leaflet-oldie .leaflet-popup-tip {
        border: 1px solid #999;
    }

    div#du-body.du-body .leaflet-div-icon {
        border: 1px solid #666;
    }

    div#du-body.du-body .leaflet-tooltip {
        padding: 6px;
        border: 1px solid #fff;
        border-radius: 3px;
        color: #222;
    }

    div#du-body.du-body .leaflet-tooltip-top:before,
    div#du-body.du-body .leaflet-tooltip-bottom:before,
    div#du-body.du-body .leaflet-tooltip-left:before,
    div#du-body.du-body .leaflet-tooltip-right:before {
        border: 6px solid transparent;
    }

    div#du-body.du-body .leaflet-tooltip-bottom {
        margin-top: 6px;
    }

    div#du-body.du-body .leaflet-tooltip-top {
        margin-top: -6px;
    }

    div#du-body.du-body .leaflet-tooltip-bottom:before,
    div#du-body.du-body .leaflet-tooltip-top:before {
        margin-left: -6px;
    }

    div#du-body.du-body .leaflet-tooltip-top:before {
        margin-bottom: -12px;
        border-top-color: #fff;
    }

    div#du-body.du-body .leaflet-tooltip-bottom:before {
        margin-top: -12px;
        margin-left: -6px;
        border-bottom-color: #fff;
    }

    div#du-body.du-body .leaflet-tooltip-left {
        margin-left: -6px;
    }

    div#du-body.du-body .leaflet-tooltip-right {
        margin-left: 6px;
    }

    div#du-body.du-body .leaflet-tooltip-left:before,
    div#du-body.du-body .leaflet-tooltip-right:before {
        margin-top: -6px;
    }

    div#du-body.du-body .leaflet-tooltip-left:before {
        margin-right: -12px;
        border-left-color: #fff;
    }

    div#du-body.du-body .leaflet-tooltip-right:before {
        margin-left: -12px;
        border-right-color: #fff;
    }