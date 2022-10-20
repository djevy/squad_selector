<script>
    /* widget related variables - INI */
    var selectedPlayerCount = 0;
    var selectedGoalKeeperCount = 0;
    var requiredPlayerCount = 23;
    var requiredGoalKeeperCount = 3;
    var averagePlayerCount = 0;
    var averageGoalKeeperCount = 0;
    var userVote = {};
    var squadValid = false;
    var highestVote;
    /* widget related variables - END */
    /* WIDGET FUNCTIONS - INI */
    var runWidgetStart = function() {
        runWidgetBinds();
    };
    var runWidgetBinds = function() {

        jq(".du-time-input", mainEl).keypress(function(e) {
            if (e.which == 13) {
                jq("#du-calculate-button", mainEl).click();
            }
        });
        jq("#du-generate-button", mainEl).click(function() {

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
            du_validateSquad()
            if (squadValid) {
                generateButton();
            }

        });
        jq("#du-average-toggle", mainEl).click(function() {
            jq("#du-average-list", mainEl).toggle();
            if (jq("#du-average-list", mainEl).is(":visible")) {
                jq("#du-average-toggle", mainEl).text("Hide average")
            } else {
                jq("#du-average-toggle", mainEl).text("Show average")
            }
        })
        jq("#du-submit-holder", mainEl).click(function() {
            du_validateSquad()
            if (squadValid) {
                submitConfirmation();
            }
        })
        du_loadVotes();


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
        wait(0);
    };

    // Load Votes
    var du_loadVotes = function() {
        var headerData = {
            type: "start",
            app: "<?php echo $projectTemp["nameSeo"]; ?>",
            vers: "<?php echo $version["id"]; ?>",

        };
        getjson(headerData, du_createPlayerCards, du_fatalError);
    };
    var du_loadAverageVotes = function(data) {
        // console.log("votes: ", data.votes);
        var sortedVotes = [...data.votes];
        sortedVotes.sort((a, b) => parseFloat(b.player_votes) - parseFloat(a.player_votes));
        // console.log("sorted votes: ", sortedVotes);
        jq(sortedVotes).each(function(index, element) {
            if (element.player_role == "Goal Keeper" && averageGoalKeeperCount < 3) {
                jq("#du-average-goalkeeper", mainEl).append(`
                    <div class="du-player-card" data-player-id="${element.player_id}" data-player-name="${element.player_name}" data-player-role="${element.player_role}">
                        <div>${element.player_name}</div>
                    </div>
                `);
                averageGoalKeeperCount++
            } else if (element.player_role == "Forward" && averagePlayerCount < 23) {
                jq("#du-average-forward", mainEl).append(`
                    <div class="du-player-card" data-player-id="${element.player_id}" data-player-name="${element.player_name}" data-player-role="${element.player_role}">
                        <div>${element.player_name}</div>
                    </div>
                `);
            } else if (element.player_role == "Midfielder" && averagePlayerCount < 23) {
                jq("#du-average-midfielder", mainEl).append(`
                    <div class="du-player-card" data-player-id="${element.player_id}" data-player-name="${element.player_name}" data-player-role="${element.player_role}">
                        <div>${element.player_name}</div>
                    </div>
                `);
            } else if (element.player_role == "Defender" && averagePlayerCount < 23) {
                jq("#du-average-defender", mainEl).append(`
                    <div class="du-player-card" data-player-id="${element.player_id}" data-player-name="${element.player_name}" data-player-role="${element.player_role}">
                        <div>${element.player_name}</div>
                    </div>
                `);
            }
        })
    }

    var du_createPlayerCards = function(data) {
        // console.log(data.votes);
        du_loadAverageVotes(data);
        jq(data.votes).each(function(index, element) {
            // console.log(element)
            if (element.player_role == "Goal Keeper") {
                jq("#du-goal-keeper", mainEl).append(`
                    <div class="du-player-card" data-player-id="${element.player_id}" data-player-name="${element.player_name}" data-player-role="${element.player_role}">
                        <div>${element.player_name}</div>
                    </div>
                `);
            } else if (element.player_role == "Forward") {
                jq("#du-forward", mainEl).append(`
                    <div class="du-player-card" data-player-id="${element.player_id}" data-player-name="${element.player_name}" data-player-role="${element.player_role}">
                        <div>${element.player_name}</div>
                    </div>
                `);
            } else if (element.player_role == "Midfielder") {
                jq("#du-midfielder", mainEl).append(`
                    <div class="du-player-card" data-player-id="${element.player_id}" data-player-name="${element.player_name}" data-player-role="${element.player_role}">
                        <div>${element.player_name}</div>
                    </div>
                `);
            } else if (element.player_role == "Defender") {
                jq("#du-defender", mainEl).append(`
                    <div class="du-player-card" data-player-id="${element.player_id}" data-player-name="${element.player_name}" data-player-role="${element.player_role}">
                        <div>${element.player_name}</div>
                    </div>
                `);
            }

        })
        jq("#du-players-container .du-player-card", mainEl).click(function() {
            // console.log(jq(this))
            var player = jq(this);
            if (player.hasClass("du-selected")) {
                player.removeClass("du-selected");
                if (player.data("player-role") != "Goal Keeper") {
                    selectedPlayerCount--;
                    jq("#du-selected-player-counter", mainEl).text(selectedPlayerCount);
                } else if (player.data("player-role") == "Goal Keeper") {
                    selectedGoalKeeperCount--;
                    jq("#du-selected-goal-keeper-counter", mainEl).text(selectedGoalKeeperCount);
                }
            } else {
                if (player.data("player-role") != "Goal Keeper" && selectedPlayerCount < 23) {
                    selectedPlayerCount++;
                    jq("#du-selected-player-counter", mainEl).text(selectedPlayerCount);
                    player.addClass("du-selected");
                } else if (player.data("player-role") == "Goal Keeper" && selectedGoalKeeperCount < 3) {
                    selectedGoalKeeperCount++;
                    jq("#du-selected-goal-keeper-counter", mainEl).text(selectedGoalKeeperCount);
                    player.addClass("du-selected");
                }
                userVote[player.data("player-id")] = player.data("player-name");
            }
        });
    }
    // Load Votes

    // Generate Image
    var generateButton = function() {

        jq(".du-player-card:not(.du-selected)", mainEl).hide();
        generateImage();
        jq("#du-generate-button", mainEl).hide();

        jq("#du-average-list-holder", mainEl).hide();
        jq("#du-image-output", mainEl).hide();
        jq("#du-image-generate", mainEl).hide();
        jq("#du-widget", mainEl).hide();

        <?php if ($modules["newsletter"]) { ?>
            /* move to where applies */
            /******** add newsletter ********/
            du_newsletterShowForm();
            /***************************/
        <?php } ?>

        if (jq("#du-nlf-skip", mainEl).css("display", "block") && jq("#du-nlf-skip", mainEl).length == 0) {
            jq("#du-image-output", mainEl).show();
            jq("#du-image-generate", mainEl).show();
            jq("#du-new-generate-button", mainEl).show();
            jq(".du-player-card:not(.du-selected)", mainEl).show();
            jq("#du-average-list-holder", mainEl).show();
            jq("#du-widget", mainEl).show();
        }

        jq("#du-new-generate-button", mainEl).click(function() {
            jq("#du-image-output", mainEl).empty();
            jq("#du-generate-button", mainEl).show();
            jq("#du-new-generate-button", mainEl).hide();
            jq(".du-player-card:not(.du-selected)", mainEl).show();
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




    // User Vote
    var submitConfirmation = function() {
        var modal = jq("#du-confirmation-modal", mainEl);
        modal.show();
        jq(".du-modal-close", mainEl).click(function() {
            modal.hide();
        })
        jq("#du-confirm-submit", mainEl).click(function() {
            du_sendChoice(userVote);
        })

        // When the user clicks anywhere outside of the modal, close it
        jq(window).click(function(e) {
            if (e.target.id == "du-confirmation-modal") {
                modal.hide();
            }
        })
    }
    var du_sendChoice = function(userVote) {
        if (userVote && !jq.isEmptyObject(userVote)) {
            jq("#du-confirmation-modal", mainEl).hide();
            jq("#du-submit-holder", mainEl).hide();

            // console.log("Vote: ", userVote);

            wait(0);
            var headerData = {
                type: "vote",
                app: "<?php echo $projectTemp["nameSeo"]; ?>",
                votes: userVote,
                what: "votes"
            };
            getjson(headerData, du_sendChoice_end, du_sendChoice_end);
        } else {
            alert("Please select your squad")
            jq("#du-confirmation-modal", mainEl).hide();
        }

    };
    var du_sendChoice_end = function() {
        return;
    };
    // User Vote

    // Validate Squad
    var du_validateSquad = function() {
        if (selectedPlayerCount < requiredPlayerCount || selectedGoalKeeperCount < requiredGoalKeeperCount) {
            alert(`Please select ${requiredGoalKeeperCount - selectedGoalKeeperCount} more goal keepers and ${requiredPlayerCount - selectedPlayerCount} other players.`);
            squadValid = false;
        } else {
            squadValid = true;
        }
    }
    // Validate Squad

    var du_fatalError = function(err) {
        // var message = du_msg.error;

        <?php if ($local) { ?>
            console.log(err.responseText);
        <?php } ?>

        // jq("#du-header .du-text, #du-search-box,#du-widget", mainEl).remove();
        // jq("#du-row-error", mainEl).show();
        // wait(0);
    };
    <?php if ($modules["newsletter"]) { ?>
        var du_finished = function() {
            jq("#du-average-list-holder", mainEl).show();
            jq("#du-image-output", mainEl).show();
            jq("#du-image-generate", mainEl).show();
            jq("#du-new-generate-button", mainEl).show();
            jq("#du-widget", mainEl).show();
            jq(".du-player-card:not(.du-selected)", mainEl).show();
        }
    <?php } ?>
    <?php if ($modules["getJson"]) { ?>
        var du_json_test = function(response, status) {
            jq("#du-results .du-text", mainEl)
                .html(status + "<br>" + JSON.stringify(response))
        }
    <?php } ?>
    /* WIDGET FUNCTIONS - END */