<script>
    /* widget related variables - INI */
    var playerId;
    /* widget related variables - END */
    /* WIDGET FUNCTIONS - INI */
    var runWidgetStart = function() {
        // runWidgetBinds();
        getJsonp(runWidgetBinds, du_fatalError);
    };
    var runWidgetBinds = function(response) {

        jq(".du-time-input", mainEl).keypress(function(e) {
            if (e.which == 13) {
                jq("#du-calculate-button", mainEl).click();
            }
        });
        jq("#du-generate-button", mainEl).click(function() {
            <?php if ($modules["newsletter"]) { ?>
                /* move to where applies */
                /******** add newsletter ********/
                du_newsletterShowForm();
                du_newsletterClass.addPostcode("postcode");
                /***************************/
            <?php } ?>
            <?php if ($modules['lotame']) { ?>
                /* move to where applies */
                /******** add lotame ********/
                const lotameData = {
                    /* ENTER LOTAME DATA HERE */
                    /* Available Keys: outcode | birhtyear */
                    "outcode": "OL9",
                    "birhtyear": "1996"
                };

                du_lotameSendData(lotameData);
                /***************************/

            <?php } ?>

            generateButton();
        });
        du_createPlayerCards(response);


        jq(".du-banner", mainEl).css("visibility", "visible");
        /* .css() instead of .show(), might fail if css not loaded yet */
        jq("#du-widget .du-container", mainEl).css("display", "block");
        jq("#du-results", mainEl).css("display", "block");
        jq("#du-footer", mainEl).css("display", "block");
        <?php if ($modules["social"]) { ?>
            du_socialStartBtns();
        <?php } ?>
        <?php if ($modules["newsletter"]) { ?>
            du_startNewsletter();
        <?php } ?>
        <?php if ($modules['leaflet']) { ?>
            du_startMap();
        <?php } ?>
        <?php if ($modules['charts']) { ?>
            du_startCharts();
        <?php } ?>
        wait(0);
    };

    var du_createPlayerCards = function(data) {
        console.log(data)

        jq(data.players).each(function(index, element) {
            console.log(element)
            if (element.Name) {
                jq("#du-players-container", mainEl).append(`
                    <div class="du-player-card">
                        <div>${element.Name}</div>
                        <div>${element.Role}</div>
                    </div>
                `);
            }

        })
        jq("#du-players-container .du-player-card", mainEl).click(function() {
            if (jq(this).hasClass("du-selected")) {
                jq(this).removeClass("du-selected");
            } else {
                jq(this).addClass("du-selected");
            }

        });
    }

    // Generate Image
    var generateButton = function() {
        generateImage();
        jq("#du-generate-button", mainEl).hide();

        jq("#du-average-list-holder", mainEl).hide();
        jq("#du-bank-holder", mainEl).hide();
        jq("#du-user-list-holder", mainEl).hide();
        jq("#du-image-output", mainEl).hide();
        jq("#du-image-generate", mainEl).hide();

        if (jq("#du-nlf-skip", mainEl).css("display", "block") && jq("#du-nlf-skip", mainEl).length == 0) {
            jq("#du-image-output", mainEl).show();
            jq("#du-image-generate", mainEl).show();
            jq("#du-new-generate-button", mainEl).show();
            jq("#du-average-list-holder", mainEl).show();
        }

        jq("#du-new-generate-button", mainEl).click(function() {
            jq("#du-image-output", mainEl).empty();
            jq("#du-bank-holder", mainEl).show();
            jq("#du-user-list-holder", mainEl).show();
            jq("#du-generate-button", mainEl).show();
            jq("#du-new-generate-button", mainEl).hide();
            jq("#du-average-list-holder", mainEl).show();
        })
    }

    var generateImage = function() {
        html2canvas($("#du-players-container")[0], {
            allowTaint: true
        }).then((canvas) => {
            console.log("done ... ");
            $("#du-image-output").append("<div class='du-instruction-text'>Save or copy the image below and share</div>")
            $("#du-image-output").append(canvas);
        });
    }
    // Generate Image



    var du_fatalError = function(err) {
        var message = du_msg.error;

        <?php if ($local) { ?>
            console.log(err.responseText);
        <?php } ?>

        jq("#du-header .du-text, #du-search-box,#du-widget", mainEl).remove();
        jq("#du-row-error", mainEl).show();
        wait(0);
    };
    <?php if ($modules["newsletter"]) { ?>
        var du_finished = function() {
            alert("called du_finished")
        }
    <?php } ?>
    <?php if ($modules["getJson"]) { ?>
        var du_json_test = function(response, status) {
            jq("#du-results .du-text", mainEl)
                .html(status + "<br>" + JSON.stringify(response))
        }
    <?php } ?>
    /* WIDGET FUNCTIONS - END */