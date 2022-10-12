<script>
    /* newsletter - INI */
    var du_newsletterClass = false;
    var du_startNewsletter = function() {
        if (typeof du_newsletter != "function") {
            return false;
        };
        <?php if ($version) { ?>
            const nlWidgetKey = widgetKEY + "-" + versionKey;
        <?php } else { ?>
            const nlWidgetKey = widgetKEY;
        <?php } ?>
        var du_newsletterOptions = {
            /**  mainEl from main widget **/
            /* REQUIRED */
            m: mainEl,
            /**  jquery **/
            /* REQUIRED */
            jq: jq,
            /**  widget ID - to be used as sourcce of data **/
            id: nlWidgetKey,
            /**  Short Version **/
            /** converted to 'SKIN'  */
            <?php if ($modulesData["newsletter"]["skin"]) { ?>
                skin: "<?php echo $modulesData["newsletter"]["skin"]; ?>",
            <?php } ?>
            /** style -> light / dark */
            <?php if ($modulesData["newsletter"]['style']) { ?>
                style: "<?php echo $modulesData["newsletter"]['style']; ?>",
            <?php } ?>
            /**  send to analytics ** /
            <?php /* if ($baseUrl["analytics"]) { ?>
                ac: du_analyticsClick,
            <?php } */ ?>
            /**  if there"s a callback after newsletter submited **/
            <?php if ($modulesData["newsletter"]["callback"]) { ?>
                cb: <?php echo $modulesData["newsletter"]["callback"]; ?>,
                /**  if there"s skip button, add text **/
                <?php if ($modulesData["newsletter"]["skip"]) { ?>
                    sk: "<?php echo $modulesData["newsletter"]["skip"]; ?>",
                <?php } ?>
            <?php } ?>
        };
        /**  if there"s a default newsletter for the widget **/
        <?php if ($modulesData["newsletter"]["default"]) { ?>
            du_newsletterOptions.nl = "<?php echo $modulesData["newsletter"]["default"]; ?>";
        <?php } ?>
        du_newsletterClass = new du_newsletter(du_newsletterOptions);
    };
    var du_newsletterShowForm = function() {
        if (du_newsletterClass) {
            du_newsletterClass.showForm();
            <?php if ($modulesData["newsletter"]["callback"]) { ?>
                setTimeout(function() {
                    if (jq("#du-nlform", mainEl).length == 0) {
                        <?php echo $modulesData["newsletter"]["callback"] . "();"; ?>
                    }
                }, 1000);
            <?php } ?>
        }
        <?php if ($modulesData["newsletter"]["callback"]) { ?>
            else {
                <?php echo $modulesData["newsletter"]["callback"] . "();"; ?>
            }
        <?php } ?>
    };
    /* newsletter - END */