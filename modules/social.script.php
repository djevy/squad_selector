<script>
    /* social - INI */
    <?php
    $socialData = $modulesData["social"]["toScript"];
    $socialData["jqTemp"] = "";
    $socialData["FBappID"] = false;
    $socialData["via"] = false;
    ?>
    let socialData = <?php echo json_encode($socialData); ?>;
    var du_socialStartBtns = function() {
        let btns = <?php echo json_encode($modulesData["social"]["btns"]); ?>;
        let addedButtons = false;
        socialData.FBappID = du_socialGetFBappID();
        socialData.via = du_socialGetTwitterVia();
        socialData.jqTemp = jq(".du-social-box", mainEl).clone();
        jq(".du-social-box", mainEl).remove();
        for (const btnKey in btns) {
            if (!btns.hasOwnProperty(btnKey)) {
                continue;
            }
            const thisBtn = btns[btnKey];
            if (
                thisBtn == "Facebook" &&
                !socialData.FBappID
            ) {
                continue;

            }
            let newBtn = du_socialCreateBtn(thisBtn);
            if (newBtn) {
                addedButtons = true;
                jq("#du-social-holder", mainEl).append(newBtn);
            }
        }
        if (addedButtons) {
            jq("#du-social-holder", mainEl)
                .addClass("du-ok");
        } else {
            jq("#du-social-holder", mainEl)
                .remove();
        }
    };
    var du_socialCreateBtn = function(btnType) {
        let jqNewBtn = socialData.jqTemp.clone();
        let options = du_socialCreateBtnOptions(btnType);
        if (!options) {
            return false;
        }
        jq("a", jqNewBtn)
            .attr({
                "id": options.id,
                "title": options.title,
                "href": options.href
            })
            .on("click", function() {
                du_analyticsClick(jq(this).attr("id"));
            })
            .find("span")
            .text(options.title);

        return jqNewBtn;
    };
    var du_socialCreateBtnOptions = function(btnType) {
        var useDocUrl = docUrl;
        var useEncodedDocUrl = encodeURIComponent(useDocUrl);
        let thisTitle = "Share on " + btnType;
        switch (btnType) {
            case "Twitter":
                finalHref = "https://twitter.com/intent/tweet?" +
                    "text=" + encodeURIComponent(socialData.message) +
                    "&url=" + useEncodedDocUrl;
                if (
                    typeof socialData.hash != "undefined" &&
                    socialData.hash
                ) {
                    finalHref += "&hashtags=" +
                        encodeURIComponent(socialData.hash);
                }
                if (
                    typeof socialData.via != "undefined" &&
                    socialData.via
                ) {
                    finalHref += "&via=" +
                        encodeURIComponent(socialData.via);
                }
                break;
            case "Facebook":
                finalHref = "https://www.facebook.com/dialog/feed?" +
                    "&app_id=" + socialData.FBappID +
                    "&link=" + useEncodedDocUrl +
                    "&redirect_uri=" + useEncodedDocUrl;
                break;
            case "WhatsApp":
                var thisNewText =
                    socialData.message +
                    " " + useDocUrl;
                finalHref = "https://api.whatsapp.com/send?" +
                    "&text=" + encodeURIComponent(
                        thisNewText
                    );
                break;
                <?php if ($local) { ?>
                default:
                    alert("SOCIAL button missing configuration in script file");
                    break;
                <?php } ?>
        }
        return {
            "title": thisTitle,
            "href": finalHref,
            "id": "du-btn-social-" + du_support.classFriendly(btnType)
        }
    };
    var du_socialGetTwitterVia = function() {
        var res = false;
        switch (true) {
            case (!!jq("meta[name='twitter:site']").attr("value")):
                res = jq("meta[name='twitter:site']").attr("value");
                if (res) {
                    res = res.replace('@', '');
                }
                break;
        }
        return res;
    };
    var du_socialGetFBappID = function() {
        var res = false;
        switch (true) {
            case (!!jq("meta[property='fb:app_id']").attr("content")):
                res = jq("meta[property='fb:app_id']").attr("content");
                break;
            case (!(typeof TMCONFIG == 'undefined' || typeof TMCONFIG.facebook == 'undefined' || typeof TMCONFIG.facebook.appId == 'undefined')):
                res = TMCONFIG.facebook.appId;
                break;
        }
        return res;
    };
    /* social - END */