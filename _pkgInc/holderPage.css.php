<?php
header("Content-Type: text/css");
header("X-Content-Type-Options: nosniff");
if (false) { ?>
    <style>
        <?php
    } ?>

        /** */
        body {
            margin: 0;
            padding: 0
        }

        body.body-widget {
            background-color: #cfe7cf
        }

        body.body-widget-live {
            background-color: #ffd9df
        }

        #current_setup {
            padding-left: 10px
        }

        #current_setup:after,
        #current_setup li {
            list-style: none;
            display: inline-block;
            border: 2px solid #fff;
            border-radius: 1em;
            font-size: 14px;
            text-transform: capitalize;
            padding: 2px 6px;
            margin: 0 2px;
            background: #c60000;
            color: #fff;
            font-weight: bold
        }

        #current_setup li.js,
        #current_setup:after {
            background: #004f9c
        }

        #current_setup li.on {
            background: #00b700
        }

        #current_setup li.genCode {
            border-radius: 0;
            background: gold;
            border: 2px solid #000
        }

        html,
        body,
        .info-page .info-page h1,
        .info-page a {
            text-align: center
        }

        .info-page {
            max-width: 1050px;
            margin: 0 auto
        }

        .info-page .main-table {
            margin: 20px auto 300px;
            min-width: 400px;
            max-width: 700px;
            text-align: left
        }

        .info-page .main-table table {
            margin-top: 0
        }

        .info-page .main-table .top-row th,
        .info-page .main-table .top-row td {
            border-top: 3px solid;
        }

        .info-page .main-table .top-row th {
            vertical-align: top;
        }

        .info-page .title {
            text-align: center;
            background: #000;
            color: #fff
        }

        .info-page .example td {
            padding: 5px
        }