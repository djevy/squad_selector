<?php

function formatUrlRow($pageDataUrl, $rowDataValue)
{
    $rowFinalValue = $pageDataUrl;
    $tempStFrom = array(
        "##title##",
        "##url##",
    );
    $tempStTo = array(
        $rowDataValue["title"],
        $rowDataValue["url"],
    );
    return str_replace(
        $tempStFrom,
        $tempStTo,
        $rowFinalValue
    );
}
function formatDateRow($rowDataValue)
{
    return $rowDataValue["date"] . "</td><td>" . $rowDataValue["title"];
    return $rowDataValue["title"] . "</td><td>" . $rowDataValue["date"];
}
if (!isset($versions) || !$versions) {
    $widgetInfo['widget']['widget']['data'][] = array(
        'title' => 'The widget',
        'url' => '?gen=widget',
    );
} else {
    foreach ($versions as $versionsKey => $versionsValue) {
        $widgetInfo['widget']['widget']['data'][] =
            array(
                'title' => $versionsValue['name'] . " (" . $versionsKey . ")",
                'url' => '?gen=widget&version=' . $versionsKey

            );
    }
}
$pageData = array(
    "sep" => "<tr><td colspan=\"3\"><hr/></td></tr>\n",
    "title" => "<tr class=\"title\"><th colspan=\"3\">##key##</th></tr>\n",
    "tr" => "<tr class=\"top-row\" ##style##><th ##rows##>##name##</th><th colspan=\"2\">##value##</th></tr>\n",
    "url" => "<a ##style## title=\"##title##\" href=\"##url##\">##title##</a>\n",
);

?><div class="info-page">
    <table class="main-table" border="1">
        <thead>
            <tr class="title">
                <th colspan="3">
                    <h1><?php echo $project["name"]["long"]; ?></h1>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($widgetInfo as $groupKey => $groupValue) {
                echo $pageData['sep'];
                echo str_replace(
                    "##key##",
                    strtoupper($groupKey),
                    $pageData["title"]
                );
                foreach ($groupValue as $rowKey => $rowValue) {
                    $tableRow = $pageData["tr"];
                    $str_from = array(
                        '##name##',
                        '##rows##',
                    );
                    $str_to = array(
                        $rowValue['name'],
                        count($rowValue['data']) > 1 ? "rowspan='" . count($rowValue['data']) . "'" : "",
                    );
                    $tableRow = str_replace(
                        $str_from,
                        $str_to,
                        $tableRow
                    );
                    $arrayKeys = array_keys($rowValue["data"]);
                    // Fetch last array key
                    $lastArrayKey = array_pop($arrayKeys);
                    foreach ($rowValue["data"] as $rowDataKey => $rowDataValue) {
                        $str_from = array();
                        $str_to = array();
                        $rowFinalValue = $rowDataValue;
                        if (is_array($rowDataValue)) {
                            if (
                                isset($rowDataValue["url"])
                            ) {
                                $rowFinalValue = formatUrlRow(
                                    $pageData["url"],
                                    $rowDataValue
                                );
                            } else {
                                $rowFinalValue = formatDateRow(
                                    $rowDataValue
                                );
                            }
                        }
                        $style = "";
                        if (
                            isset($rowValue["style"]) &&
                            $rowValue["style"]
                        ) {
                            $style = "style='" . $rowValue["style"] . "'";
                        }
                        array_push(
                            $str_from,
                            "<th colspan=\"2\">##value##</th>",
                            "##style##",
                        );
                        array_push(
                            $str_to,
                            "<td colspan=\"2\">" . $rowFinalValue . "</td>",
                            $style,
                        );
                        if (isset($rowDataValue["date"])) {
                            array_push(
                                $str_from,
                                "<td colspan=\"2\">",
                            );
                            array_push(
                                $str_to,
                                "<td>",
                            );
                        }
                        $tableRow = str_replace(
                            $str_from,
                            $str_to,
                            $tableRow
                        );
                        echo $tableRow;
                        if ($lastArrayKey == $rowDataKey) {
                            $tableRow = "";
                        } else {
                            $str_from = array(
                                "<th ##rows##>##name##</th>",
                                "##rows##",
                                " class=\"top-row\"",
                            );
                            $str_to = array(
                                "",
                                "",
                                ""
                            );
                            $tableRow = str_replace(
                                $str_from,
                                $str_to,
                                $pageData["tr"]
                            );
                        }
                    }
                    echo $tableRow;
                }
            }
            ?>
        </tbody>
    </table>
</div>