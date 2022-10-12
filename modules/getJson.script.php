<script>
    /* Get Json - INI */
    var getjson = function(headerData, runOk, runKo) {
        jq.ajax({
            type: "POST",
            url: "<?php echo $modulesData["getJson"][$project["localOrLive"]]["json"]; ?>return<?php echo $project["name"]["_bodyId"]; ?>.json.php",
            contentType: "application/x-www-form-urlencoded",
            data: headerData,
            dataType: "json",
            success: function(response, status) {
                runOk(response, status);
            },
            error: function(response, status) {
                runKo(response, status);
            }
        });
    };
    /* Get Json - END */

    /* Get Jsonp - INI */
    var getJsonp = function(runOk, runKo) {
        jq.ajax({
            type: "GET",
            timeout: 8000,
            /* 2 seconds timeout*/
            url: "<?php echo $modulesData["getJson"][$project["localOrLive"]]["json"]; ?>du_<?php echo $projectTemp["nameSeo"]; ?>_data.json",
            jsonpCallback: "runData_<?php echo $projectTemp["nameSeo"]; ?>_data",
            dataType: "jsonp",
            success: function(response, status) {
                runOk(response, status);
            },
            error: function(response, status) {
                runKo(response, status);
            }
        });
    };
    /* Get Jsonp - END */