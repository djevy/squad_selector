<style>
    /******
     * WIDGET CSS
     */
    div#du-body.du-body {
        background: #f1f1f1;
        border: 0;
        color: #fff;
        font-family: <?php echo $widgetOptions["fonts"]["main"]["font-family"]; ?>;
        font-size: 17px;
        line-height: 1.1em;
        margin: 10px auto;
        padding: 0;
        position: relative;
        text-align: left;
        width: 100%;
        z-index: 1;
        min-height: 330px;
    }

    div#du-body.du-body .du-container {
        width: 96%;
        max-width: 750px;
        padding: 10px 2% 20px;
        margin: 0 auto;
    }

    div#du-body.du-body .du-header {
        background: url("<?php echo $IndexApp->formatImageUrl("img", "du" . $project["name"]["_bodyId"] . "_header_bg.png"); ?>") no-repeat scroll center center #000;
        background-size: 100% auto;
        font-size: 1.2em;
        display: block;
    }

    div#du-body.du-body .du-header .du-container {
        font-family: <?php echo $widgetOptions["fonts"]["sec"]["font-family"]; ?>;
    }

    div#du-body.du-body .du-header .du-header-img {
        width: 100%;
        max-width: 380px;
        margin: auto;
    }

    div#du-body.du-body .du-header .du-banner {
        visibility: hidden;
        color: #fff;
        background: <?php echo $widgetOptions["colors"]["main"]; ?>;
        margin: 0 auto;
        font-weight: bold;
        padding: 4px 10px 1px;
        text-align: center;
        text-transform: uppercase;
        max-width: 200px;
        font-size: 15px;
    }

    div#du-body.du-body h2 {
        line-height: 1.1em;
        font-size: 2.6em;
        font-weight: bold;
        margin: 15px auto;
        text-align: center;
        color: #FFF;
    }

    div#du-body.du-body .du-text {
        line-height: 1.2em;
        color: #FFF
    }

    div#du-body.du-body .du-header .du-text {
        font-size: 1.1em;
        padding: 2px 8%;
        text-align: center;
    }

    div#du-body.du-body #du-widget {
        min-height: 250px;
    }

    div#du-body.du-body .du-down {
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        margin: 0 auto;
        border-top: 10px solid <?php echo $widgetOptions["colors"]["main"]; ?>;
    }

    div#du-body.du-body #du-widget .du-container {
        color: #000;
        display: none
    }

    div#du-body.du-body #du-search-box {
        background-color: #000;
        border-top: 5px solid <?php echo $widgetOptions["colors"]["main"]; ?>;
        clear: both;
        display: block;
        margin: 10px auto;
        padding: 10px 0;
        text-align: center;
        padding: 15px;
    }

    div#du-body.du-body #du-search,
    div#du-body.du-body #du-search-go {
        font-size: 1.1em;
        height: 30px;
        line-height: 1em;
        padding: 4px 0;
        text-align: center;
    }

    div#du-body.du-body #du-search {
        text-transform: uppercase;
        font-weight: bold;
        margin-right: 1%;
        width: 65%;
    }

    div#du-body.du-body #du-search-go {
        color: #fff;
        cursor: pointer;
        font-weight: bold;
        float: right;
        width: 30%;
        background: <?php echo $widgetOptions["colors"]["main"]; ?>;
        -webkit-border-radius: 2em;
        -moz-border-radius: 2em;
        border-radius: 2em;
    }

    div#du-body.du-body #du-results {
        display: none;
        font-size: 1.1em;
        padding: 0 0 30px;
        text-align: center;
    }

    div#du-body.du-body #du-results .du-text {
        color: #000;
    }

    div#du-body.du-body #du-footer {
        text-align: center;
        background: #000
    }

    div#du-body.du-body .du-footer-txt {
        color: #fff;
        font-style: italic;
    }

    div#du-body.du-body .du-footer-txt span {
        font-weight: bold
    }

    /* Widget */
    div#du-body.du-body #du-players-container {
        padding: 10px;
    }

    div#du-body.du-body .du-players {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        margin: 10px 0;
    }

    div#du-body.du-body .du-player-card {
        border: #000 solid 2px;
        padding: 5px;
        margin: 5px;
        cursor: pointer;
    }

    div#du-body.du-body .du-player-card.du-selected {
        border: red solid 2px;
    }


    div#du-body.du-body .du-button-holder {
        text-align: center;
        font-size: 1.2em;
        background-color: #fff;
        width: fit-content;
        padding: 5px 20px;
        margin: 10px auto;
        border-radius: 10px;
        cursor: pointer;
    }

    div#du-body.du-body .du-button-holder button {
        background-color: #fff;
        cursor: pointer;
    }

    div#du-body.du-body #du-new-generate-button {
        display: none;
    }

    div#du-body.du-body .du-instruction-text {
        text-align: center;
        background-color: rgba(0, 0, 0, 0.2);
        color: #fff;
        width: 100%;
        padding: 10px 0px;
        margin: 10px auto;
    }

    div#du-body.du-body #du-image-output {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    div#du-body.du-body canvas {
        border: dashed #fff;
    }

    /* Modal */
    div#du-body.du-body #du-confirmation-modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }

    /* Modal Content */
    div#du-body.du-body .du-modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        max-width: 450px;
        width: 50vw;
    }

    div#du-body.du-body .du-modal-content .du-button-holder {
        border: #000 solid;
    }

    /* The Close Button */
    div#du-body.du-body #du-modal-close {
        color: #aaaaaa;
        float: right;
        font-size: 35px;
        font-weight: bold;
        top: -20px;
        position: relative;
    }

    div#du-body.du-body .du-modal-close:hover,
    div#du-body.du-body .du-modal-close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    div#du-body.du-body #du-modal-footer {
        display: flex;
        flex-wrap: wrap;
    }

    /* Widget */


    /**
     * Sprite
     */

    div#du-body.du-body .du-icon,
    div#du-body.du-body .du-icon-btn {
        display: inline-block;
        border: 1px solid #000;
        border-radius: 5px;
        margin: 2px 8px;
    }

    div#du-body.du-body .du-icon {
        width: 87px;
        height: 87px;
    }

    div#du-body.du-body .du-icon.du-icon-right {
        background-position: -90px 0px;
    }

    div#du-body.du-body .du-icon.du-icon-left {
        background-position: 0 0;

    }

    div#du-body.du-body .du-icon-btn {
        width: 47px;
        height: 46px;
        cursor: pointer;
    }

    div#du-body.du-body .du-icon-btn.du-icon-btn-right {
        background-position: -50px 0px;
    }

    div#du-body.du-body .du-icon-btn.du-icon-btn-left {
        background-position: 0 0;
    }

    <?php if ($project["options"]["breaks"]["tablet"]) { ?>

    /******
    * TABLET
    */
    div#du-body.du-body.du-table {
        font-size: 15px;
    }

    <?php } ?>

    /******
    * MOBILE
    */
    div#du-body.du-body.du-mobile {
        font-size: 14px;
    }

    div#du-body.du-body.du-mobile div.du-header {
        background-size: auto cover;
    }