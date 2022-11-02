<style>
    /******
     * WIDGET CSS
     */
    div#du-body.du-body {
        background: #2b0417;
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
        background: url("<?php echo $IndexApp->formatImageUrl("img", "du" . $project["name"]["_bodyId"] . "_header_bg.png"); ?>") no-repeat scroll center center #2b0417;
        background-size: 100% auto;
        font-size: 1.2em;
        display: block;
        width: 100%;
        max-width: 768px;
        margin: auto;
    }

    div#du-body.du-body .du-header .du-container {
        font-family: <?php echo $widgetOptions["fonts"]["sec"]["font-family"]; ?>;
    }

    div#du-body.du-body .du-header .du-header-img {
        width: 50%;
        max-width: 380px;
        margin: 30px auto 0px;
    }

    div#du-body.du-body #du-sub-header {
        background-color: #890f34;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-size: 1.2em;
    }

    div#du-body.du-body .du-football-fans {
        min-width: 50px;
        max-width: 75px;
        width: 100%;
        margin: 0 5px;
    }

    div#du-body.du-body #du-country-flag {
        min-width: 50px;
        max-width: 150px;
        width: 25vw;
        margin: auto;
    }

    div#du-body.du-body h2 {
        line-height: 1.1em;
        font-size: 2.6em;
        font-weight: bold;
        margin: 15px auto 5px;
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
        display: none;
        background-color: #2b0417;
    }

    div#du-body.du-body #du-results {
        display: none;
        font-size: 1.1em;
        padding: 0;
        text-align: center;
    }

    div#du-body.du-body #du-results .du-text {
        color: #000;
    }

    div#du-body.du-body #du-footer {
        text-align: center;
        background: #2b0417;
    }

    div#du-body.du-body .du-footer-txt {
        color: #fff;
        font-style: italic;
    }

    div#du-body.du-body .du-footer-txt span {
        font-weight: bold
    }

    /* Widget */
    div#du-body.du-body #du-results .du-text {
        color: #FFF;
        font-weight: bold;
        font-size: 1.2rem;
    }

    div#du-body.du-body #du-players-container {
        padding: 10px;
    }

    div#du-body.du-body #du-average-list-holder {
        padding: 10px;
    }

    div#du-body.du-body .du-players {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        margin: 10px 0;
        padding: 10px;
        border-radius: 10px;
        background-color: #FFF;
    }

    div#du-body.du-body .du-player-card {
        max-width: 100px;
        width: 100%;
        height: 50px;
        padding: 5px 10px;
        margin: 5px;
        cursor: pointer;
        border-radius: 10px;
        background-color: #e9e9e9;
        color: #000;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    div#du-body.du-body .du-player-image {
        max-width: 100px;
        width: 100%;
        /* height: 50px; */
    }

    div#du-body.du-body .du-average-player-card {
        max-width: 100px;
        width: 100%;
        height: 50px;
        padding: 5px 10px;
        margin: 5px;
        cursor: default;
        border-radius: 10px;
        background-color: #e9e9e9;
        color: #000;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    div#du-body.du-body .du-player-card.du-selected {
        background-color: #ff004c;
        color: #fff;
        font-weight: bold;
    }

    div#du-body.du-body #du-goal-keeper.du-selected {
        background-color: #ff004c;
    }

    div#du-body.du-body #du-defender .du-selected {
        background-color: #06bca6;
    }

    div#du-body.du-body #du-midfielder .du-selected {
        background-color: #a764a9;
    }

    div#du-body.du-body #du-forward .du-selected {
        background-color: #e4842e;
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

    div#du-body.du-body .du-button-holder div {
        cursor: pointer;
    }

    div#du-body.du-body .du-button-holder:hover {
        background-color: #ff004c;
        color: #fff;
    }

    /* div#du-body.du-body .du-button-holder button:hover {
        background-color: #ff004c;
    } */

    div#du-body.du-body #du-image-generate {
        display: none;
    }

    div#du-body.du-body #du-new-generate-button {
        display: none;
    }

    div#du-body.du-body .du-instruction-text {
        text-align: center;
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
        width: 100%;
        padding: 10px 0px;
        margin: 10px auto;
        display: none;
    }
    div#du-body.du-body .du-twitter-icon {
        display: inline-block;
        margin-left: 2px;
    }

    div#du-body.du-body .du-image-output {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    div#du-body.du-body #du-image-output canvas {
        border: dashed #fff;
        max-width: 95%;
    }

    div#du-body.du-body #du-average-image-output canvas {
        max-width: 100%;
    }
    div#du-body.du-body .du-twitter-share {
        padding: 5px 10px;
        max-width: fit-content;
        width: 100%;
        margin: 5px auto;
        background-color: #fff;
        color: #000;
        border-radius: 10px;
        border: #fff solid 2px;
        display: block;
        text-decoration: none;
    }

    div#du-body.du-body .du-football-icon {
        margin: 0px auto 15px;
        max-width: 100px;
        width: 100%;
    }

    div#du-body.du-body #du-reader-average {
        display: none;
    }

    div#du-body.du-body #du-average-list-holder {
        border: #fff solid;
        border-radius: 15px;
        margin: 20px auto;
    }

    div#du-body.du-body .du-holder .du-player-title {
        border-radius: 10px;
        max-width: 150px;
        width: 100%;
        padding: 5px 10px;
        margin: auto;
        word-break: break-all;
    }

    
    div#du-body.du-body #du-players-container  {
        background-color: #2b0417;
    }
    div#du-body.du-body #du-players-container .du-player-title:nth-child(1) {
        background-color: #ff004c;
    }

    div#du-body.du-body #du-players-container .du-players:nth-child(2) {
        border: #ff004c 3px solid;
    }

    div#du-body.du-body #du-players-container .du-player-title:nth-child(5) {
        background-color: #06bca6;
    }

    div#du-body.du-body #du-players-container .du-players:nth-child(6) {
        border: #06bca6 3px solid;
    }

    div#du-body.du-body #du-players-container .du-player-title:nth-child(9) {
        background-color: #a764a9;
    }

    div#du-body.du-body #du-players-container .du-players:nth-child(10) {
        border: #a764a9 3px solid;
    }

    div#du-body.du-body #du-players-container .du-player-title:nth-child(13) {
        background-color: #e4842e;
    }

    div#du-body.du-body #du-players-container .du-players:nth-child(14) {
        border: #e4842e 3px solid;
    }

    div#du-body.du-body #du-average-list  {
        background-color: #2b0417;
    }
    div#du-body.du-body #du-average-list-holder .du-player-title:nth-child(2) {
        background-color: #ff004c;
    }

    div#du-body.du-body #du-average-list-holder .du-players:nth-child(3) {
        border: #ff004c 3px solid;
    }

    div#du-body.du-body #du-average-list-holder .du-player-title:nth-child(4) {
        background-color: #06bca6;
    }

    div#du-body.du-body #du-average-list-holder .du-players:nth-child(5) {
        border: #06bca6 3px solid;
    }

    div#du-body.du-body #du-average-list-holder .du-player-title:nth-child(6) {
        background-color: #a764a9;
    }

    div#du-body.du-body #du-average-list-holder .du-players:nth-child(7) {
        border: #a764a9 3px solid;
    }

    div#du-body.du-body #du-average-list-holder .du-player-title:nth-child(8) {
        background-color: #e4842e;
    }

    div#du-body.du-body #du-average-list-holder .du-players:nth-child(9) {
        border: #e4842e 3px solid;
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
        background-color: #ff004c;
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

    div#du-body.du-body.du-mobile .du-player-card {
        max-width: 90px;
    }

    div#du-body.du-body.du-mobile .du-header .du-header-img {
        width: 75%;
    }