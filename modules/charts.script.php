<script>
    /* charts - INI */
    /*
    https://www.chartjs.org/docs/latest/samples/bar/border-radius.html
    */
    let myCharts = {};
    let chartsConfig = {
        colours: {
            // 'red': 'rgba(255, 99, 132, 1)',
            // 'blue': 'rgba(54, 162, 235, 1)',
            // 'yellow': 'rgba(255, 206, 86, 1)',
            // 'green': 'rgba(75, 192, 192, 1)',
            // 'purple': 'rgba(153, 102, 255, 1)',
            // 'orange': 'rgba(255, 159, 64, 1)',
            'red.5': 'rgba(255, 99, 132, 0.5)',
            'blue.5': 'rgba(54, 162, 235, 0.5)',
            'yellow.5': 'rgba(255, 206, 86, 0.5)',
            'green.5': 'rgba(75, 192, 192, 0.5)',
            'purple.5': 'rgba(153, 102, 255, 0.5)',
            'orange.5': 'rgba(255, 159, 64, 0.5)',
            'red': 'rgba(255, 99, 132, 1)',
            'blue': 'rgba(54, 162, 235, 1)',
            'yellow': 'rgba(255, 206, 86, 1)',
            'green': 'rgba(75, 192, 192, 1)',
            'purple': 'rgba(153, 102, 255, 1)',
            'orange': 'rgba(255, 159, 64, 1)',
        },
        config: {
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: false
                }
            }
        },
    };
    var chartsData = {
        bar: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                    label: '2019',
                    data: [24, 22, 20, 18, 16, 14, 10, 12, 8, 6, 4, 2],
                    borderWidth: 2,
                    borderColor: chartsConfig.colours["blue"],
                    backgroundColor: chartsConfig.colours["blue.5"],
                },
                {
                    label: '2020',
                    data: [1, 3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23],
                    borderWidth: 2,
                    borderColor: chartsConfig.colours["orange"],
                    backgroundColor: chartsConfig.colours["orange.5"],
                },
                {
                    label: '2021',
                    data: [5, 7, 9, 25, 23, 1, 22, 7, 1, 3, 15, 17],
                    borderWidth: 2,
                    borderColor: chartsConfig.colours["green"],
                    backgroundColor: chartsConfig.colours["green.5"],
                }
            ]
        },
        pie: {
            labels: ['Red', 'Orange', 'Yellow', 'Green', 'Blue'],
            datasets: [{
                label: 'Dataset 1',
                data: [5, 9, 8, 3, 5],
                backgroundColor: [
                    chartsConfig.colours["red"],
                    chartsConfig.colours["orange"],
                    chartsConfig.colours["yellow"],
                    chartsConfig.colours["green"],
                    chartsConfig.colours["blue"]
                ],
            }]
        }
    };
    chartsData.line = chartsData.bar;
    var du_startCharts = function() {
        /** BAR CHART */
        myCharts.bar = du_createChart(
            "#du-chart-bar",
            "bar",
            chartsData.bar,
            "# of votes",
            "The Bar chart title"
        );
        /** LINE CHART */
        myCharts.line = du_createChart(
            "#du-chart-line",
            "line",
            chartsData.line,
            "# of votes",
            "The line chart title"
        );
        /** PIE CHART */
        myCharts.pie = du_createChart(
            "#du-chart-pie",
            "pie",
            chartsData.pie,
            "# of votes",
            "The Pie chart title"
        );
    };
    var du_createChart = function(
        thisId,
        thisType,
        thisData,
        thisLabel,
        thisTitle
    ) {
        let thisChartConfig =
            du_support.du_cloneObject(chartsConfig.config);
        if (!!thisTitle && thisTitle != "") {
            thisChartConfig.options.plugins.title = {
                display: true,
                text: thisTitle
            }
        }
        thisChartConfig.type = thisType;
        thisChartConfig.data = thisData;
        const ctx =
            jq(thisId, mainEl)
            .get(0)
            .getContext('2d');
        return new Chart(ctx, thisChartConfig);
    };