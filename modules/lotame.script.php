<script>
    /* LOTAME - INI */
    <?php
    $lotameConfig = array_merge(
        $modulesData["lotame"]["config"]["main"],
        array(
            "projectSeo" => $project["name"]["key"],
            "isLocal" => $local,
        )
    );
    ?>;
    const lotameConfig = <?php echo json_encode($lotameConfig); ?>;
    let lotamePixel = false;

    const du_startLotame = function(callback = false, listener = false) {
        lotameConfig.jq = jq;

        if (
            typeof DeployLotamePixel === "function" &&
            typeof lotameConfig === "object"
        ) {
            lotamePixel = new DeployLotamePixel(lotameConfig);
            let errors = lotamePixel.getErrors();

            if (!errors || (Array.isArray(errors) && errors.length > 0)) {
                return errors;
            }

            lotamePixel.fireLoadPixel(callback, listener);
        }

        return true;
    };

    const du_lotameSendData = function(data = {}, callback = false, listener = false) {
        const errors = [];

        if (
            typeof DeployLotamePixel !== "function" &&
            typeof lotameConfig !== "object"
        ) {
            errors.push("[du_lotameSendData] error with Lotame");
        }

        if (
            typeof data !== "object" &&
            Object.keys(data).length <= 0
        ) {
            errors.push("[du_lotameSendData] error with data");
        }

        if (errors.length > 0) {
            return {
                "errors": "[du_lotameSendData] error with params"
            };
        }

        return lotamePixel.fireDataPixel(data, callback, listener);
    }
    /* LOTAME - END */