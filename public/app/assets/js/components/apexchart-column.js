var options = {
        chart: {
            height: 396,
            type: "bar",
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                endingShape: "rounded",
                columnWidth: "55%"
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 0,
            colors: ["transparent"]
        },
        colors: colors = ["#f8ac59", "#e06d94", "#7dcc93"],
        series: [{
            name: "Net Profit",
            data: [47, 58, 59, 54, 62, 59, 65, 61, 68]
        }, {
            name: "Revenue",
            data: [79, 86, 103, 97, 89, 107, 93, 116, 96]
        }, {
            name: "Free Cash Flow",
            data: [38, 42, 39, 28, 47, 50, 54, 55, 43]
        }],
        xaxis: {
            categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"]
        },
        legend: {
            offsetY: 7
        },
        yaxis: {
            title: {
                text: "$ (thousands)"
            }
        },
        fill: {
            opacity: 1
        },
        grid: {
            row: {
                colors: ["transparent", "transparent"],
                opacity: .2
            },
            borderColor: "#f1f3fa",
            padding: {
                bottom: 5
            }
        },
        tooltip: {
            y: {
                formatter: function (e) {
                    return "$ " + e + " thousands"
                }
            }
        }
    },
    chart = new ApexCharts(document.querySelector("#basic-column"), options);
chart.render();

options = {
    chart: {
        height: 380,
        type: "bar",
        stacked: !0,
        toolbar: {
            show: !1
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "50%"
        }
    },
    series: [{
        name: "Product A",
        data: [47, 58, 44, 70, 25, 46, 24, 52]
    }, {
        name: "Product B",
        data: [16, 26, 23, 11, 16, 30, 36, 15]
    }, {
        name: "Product C",
        data: [14, 20, 18, 18, 24, 17, 18, 16]
    }],
    xaxis: {
        categories: ["2011 Q1", "2011 Q2", "2011 Q3", "2011 Q4", "2012 Q1", "2012 Q2", "2012 Q3", "2012 Q4"]
    },
    colors: colors = ["#4697ce", "#f8ac59", "#7dcc93"],
    fill: {
        opacity: 1
    },
    legend: {
        offsetY: 7
    },
    grid: {
        row: {
            colors: ["transparent", "transparent"],
            opacity: .2
        },
        borderColor: "#f1f3fa",
        padding: {
            bottom: 5
        }
    }
};
(chart = new ApexCharts(document.querySelector("#stacked-column"), options)).render();
options = {
    chart: {
        height: 380,
        type: "bar",
        stacked: !0,
        stackType: "100%",
        toolbar: {
            show: !1
        }
    },
    plotOptions: {
        bar: {
            columnWidth: "50%"
        }
    },
    series: [{
        name: "Product A",
        data: [11, 17, 15, 15, 21, 14, 15, 13]
    }, {
        name: "Product B",
        data: [44, 55, 41, 67, 22, 43, 21, 49]
    }, {
        name: "Product C",
        data: [13, 23, 20, 8, 13, 27, 33, 12]
    }],
    xaxis: {
        categories: ["2011 Q1", "2011 Q2", "2011 Q3", "2011 Q4", "2012 Q1", "2012 Q2", "2012 Q3", "2012 Q4"]
    },
    fill: {
        opacity: 1
    },
    legend: {
        offsetY: 7
    },
    colors: colors = ["#eef2f7", "#4697ce", "#323a46"],
    grid: {
        row: {
            colors: ["transparent", "transparent"],
            opacity: .2
        },
        borderColor: "#f1f3fa",
        padding: {
            bottom: 5
        }
    }
};
(chart = new ApexCharts(document.querySelector("#full-stacked-column"), options)).render();
options = {
    series: [{
        name: "Actual",
        data: [{
            x: "2011",
            y: 1292,
            goals: [{
                name: "Expected",
                value: 1400,
                strokeHeight: 5,
                strokeColor: (colors = ["#e06d94", "#323a46"])[1]
            }]
        }, {
            x: "2012",
            y: 4432,
            goals: [{
                name: "Expected",
                value: 5400,
                strokeHeight: 5,
                strokeColor: colors[1]
            }]
        }, {
            x: "2013",
            y: 5423,
            goals: [{
                name: "Expected",
                value: 5200,
                strokeHeight: 5,
                strokeColor: colors[1]
            }]
        }, {
            x: "2014",
            y: 6653,
            goals: [{
                name: "Expected",
                value: 6500,
                strokeHeight: 5,
                strokeColor: colors[1]
            }]
        }, {
            x: "2015",
            y: 8133,
            goals: [{
                name: "Expected",
                value: 6600,
                strokeHeight: 13,
                strokeWidth: 0,
                strokeLineCap: "round",
                strokeColor: colors[1]
            }]
        }, {
            x: "2016",
            y: 7132,
            goals: [{
                name: "Expected",
                value: 7500,
                strokeHeight: 5,
                strokeColor: colors[1]
            }]
        }, {
            x: "2017",
            y: 7332,
            goals: [{
                name: "Expected",
                value: 8700,
                strokeHeight: 5,
                strokeColor: colors[1]
            }]
        }, {
            x: "2018",
            y: 6553,
            goals: [{
                name: "Expected",
                value: 7300,
                strokeHeight: 2,
                strokeDashArray: 2,
                strokeColor: colors[1]
            }]
        }]
    }],
    chart: {
        height: 380,
        type: "bar"
    },
    plotOptions: {
        bar: {
            columnWidth: "60%"
        }
    },
    colors: colors,
    dataLabels: {
        enabled: !1
    },
    legend: {
        show: !0,
        showForSingleSeries: !0,
        customLegendItems: ["Actual", "Expected"],
        markers: {
            fillColors: colors
        }
    }
};
(chart = new ApexCharts(document.querySelector("#column-with-markers"), options)).render();
var colors = ["#4697ce", "#fa5c7c"];
dayjs.extend(window.dayjs_plugin_quarterOfYear);
var optionsGroup = {
        series: [{
            name: "Sales",
            data: [{
                x: "2020/01/01",
                y: 400
            }, {
                x: "2020/04/01",
                y: 430
            }, {
                x: "2020/07/01",
                y: 448
            }, {
                x: "2020/10/01",
                y: 470
            }, {
                x: "2021/01/01",
                y: 540
            }, {
                x: "2021/04/01",
                y: 580
            }, {
                x: "2021/07/01",
                y: 690
            }, {
                x: "2021/10/01",
                y: 690
            }]
        }],
        chart: {
            type: "bar",
            height: 380,
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "45%"
            }
        },
        colors: colors,
        xaxis: {
            type: "category",
            labels: {
                formatter: function (e) {
                    return "Q" + dayjs(e).quarter()
                }
            },
            group: {
                style: {
                    fontSize: "10px",
                    fontWeight: 700
                },
                groups: [{
                    title: "2020",
                    cols: 4
                }, {
                    title: "2021",
                    cols: 4
                }]
            }
        },
        tooltip: {
            x: {
                formatter: function (e) {
                    return "Q" + dayjs(e).quarter() + " " + dayjs(e).format("YYYY")
                }
            }
        }
    },
    chartGroup = new ApexCharts(document.querySelector("#column-with-group-label"), optionsGroup);
chartGroup.render();
options = {
    annotations: {
        points: [{
            x: "Bananas",
            seriesIndex: 0,
            label: {
                borderColor: "#727cf5",
                offsetY: 0,
                style: {
                    color: "#fff",
                    background: "#727cf5"
                },
                text: "Bananas are good"
            }
        }]
    },
    chart: {
        height: 380,
        type: "bar",
        toolbar: {
            show: !1
        }
    },
    plotOptions: {
        bar: {
            columnWidth: "50%",
            endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        width: 2
    },
    colors: colors = ["#f8ac59"],
    series: [{
        name: "Servings",
        data: [20, 15, 30, 25, 35, 40, 45, 50, 55, 60, 65, 70, 75]
    }],
    grid: {
        borderColor: "#f1f3fa",
        padding: {
            top: 0,
            right: -2,
            bottom: -35,
            left: 10
        }
    },
    xaxis: {
        labels: {
            rotate: -45
        },
        categories: ["Apples", "Oranges", "Strawberries", "Pineapples", "Mangoes", "Bananas", "Blackberries", "Pears", "Watermelons", "Cherries", "Pomegranates", "Tangerines", "Papayas"]
    },
    yaxis: {
        title: {
            text: "Servings"
        }
    },
    fill: {
        type: "gradient",
        gradient: {
            shade: "light",
            type: "horizontal",
            shadeIntensity: .25,
            gradientToColors: void 0,
            inverseColors: !0,
            opacityFrom: .85,
            opacityTo: .85,
            stops: [50, 0, 100]
        }
    }
};
(chart = new ApexCharts(document.querySelector("#rotate-labels-column"), options)).render();
options = {
    chart: {
        height: 380,
        type: "bar",
        toolbar: {
            show: !1
        }
    },
    plotOptions: {
        bar: {
            colors: {
                ranges: [{
                    from: -100,
                    to: -46,
                    color: "#ff86c8"
                }, {
                    from: -45,
                    to: 0,
                    color: "#7f56da"
                }]
            },
            columnWidth: "80%"
        }
    },
    dataLabels: {
        enabled: !1
    },
    colors: colors = ["#7dcc93"],
    series: [{
        name: "Cash Flow",
        data: [1.45, 5.42, 5.9, -.42, -12.6, -18.1, -18.2, -14.16, -11.1, -6.09, .34, 3.88, 13.07, 5.8, 2, 7.37, 8.1, 13.57, 15.75, 17.1, 19.8, -27.03, -54.4, -47.2, -43.3, -18.6, -48.6, -41.1, -39.6, -37.6, -29.4, -21.4, -2.4]
    }],
    yaxis: {
        title: {
            text: "Growth"
        },
        labels: {
            formatter: function (e) {
                return e.toFixed(0) + "%"
            }
        }
    },
    xaxis: {
        categories: ["2021-01-01", "2021-02-01", "2021-03-01", "2021-04-01", "2021-05-01", "2021-06-01", "2021-07-01", "2021-08-01", "2021-09-01", "2021-10-01", "2021-11-01", "2021-12-01", "2022-01-01", "2022-02-01", "2022-03-01", "2022-04-01", "2022-05-01", "2022-06-01", "2022-07-01", "2022-08-01", "2022-09-01", "2022-10-01", "2022-11-01", "2022-12-01", "2023-01-01", "2023-02-01", "2023-03-01", "2023-04-01", "2023-05-01", "2023-06-01", "2023-07-01", "2023-08-01", "2023-09-01"],
        labels: {
            rotate: -90
        }
    },
    grid: {
        row: {
            colors: ["transparent", "transparent"],
            opacity: .2
        },
        borderColor: "#f1f3fa"
    }
};
(chart = new ApexCharts(document.querySelector("#negative-value-column"), options)).render();
options = {
    chart: {
        height: 380,
        type: "bar",
        toolbar: {
            show: !1
        },
        events: {
            click: function (e, t, o) {
                console.log(e, t, o)
            }
        }
    },
    colors: colors = ["#4697ce", "#53389f", "#7f56da", "#ff86c8", "#e06d94", "#63b7e6", "#f8ac59", "#7dcc93"],
    plotOptions: {
        bar: {
            columnWidth: "45%",
            distributed: !0
        }
    },
    dataLabels: {
        enabled: !1
    },
    series: [{
        data: [21, 22, 10, 28, 16, 21, 13, 30]
    }],
    xaxis: {
        categories: ["John", "Joe", "Jake", "Amber", "Peter", "Mary", "David", "Lily"],
        labels: {
            style: {
                colors: colors,
                fontSize: "14px"
            }
        }
    },
    legend: {
        offsetY: 7
    },
    grid: {
        row: {
            colors: ["transparent", "transparent"],
            opacity: .2
        },
        borderColor: "#f1f3fa"
    }
};
(chart = new ApexCharts(document.querySelector("#distributed-column"), options)).render();
options = {
    chart: {
        height: 380,
        type: "rangeBar",
        toolbar: {
            show: !1
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1
        }
    },
    dataLabels: {
        enabled: !0
    },
    legend: {
        offsetY: 7
    },
    colors: colors = ["#4697ce", "#7f56da"],
    series: [{
        name: "Product A",
        data: [{
            x: "Team A",
            y: [1, 5]
        }, {
            x: "Team B",
            y: [4, 6]
        }, {
            x: "Team C",
            y: [5, 8]
        }, {
            x: "Team D",
            y: [3, 11]
        }]
    }, {
        name: "Product B",
        data: [{
            x: "Team A",
            y: [2, 6]
        }, {
            x: "Team B",
            y: [1, 3]
        }, {
            x: "Team C",
            y: [7, 8]
        }, {
            x: "Team D",
            y: [5, 9]
        }]
    }]
};

function shuffleArray(e) {
    for (var t = e.length - 1; 0 < t; t--) {
        var o = Math.floor(Math.random() * (t + 1)),
            r = e[t];
        e[t] = e[o], e[o] = r
    }
    return e
}(chart = new ApexCharts(document.querySelector("#range-column"), options)).render(), Apex = {
    chart: {
        toolbar: {
            show: !1
        }
    },
    tooltip: {
        shared: !1
    },
    legend: {
        show: !1
    }
};
var arrayData = [{
    y: 400,
    quarters: [{
        x: "Q1",
        y: 120
    }, {
        x: "Q2",
        y: 90
    }, {
        x: "Q3",
        y: 100
    }, {
        x: "Q4",
        y: 90
    }]
}, {
    y: 430,
    quarters: [{
        x: "Q1",
        y: 120
    }, {
        x: "Q2",
        y: 110
    }, {
        x: "Q3",
        y: 90
    }, {
        x: "Q4",
        y: 110
    }]
}, {
    y: 448,
    quarters: [{
        x: "Q1",
        y: 70
    }, {
        x: "Q2",
        y: 100
    }, {
        x: "Q3",
        y: 140
    }, {
        x: "Q4",
        y: 138
    }]
}, {
    y: 470,
    quarters: [{
        x: "Q1",
        y: 150
    }, {
        x: "Q2",
        y: 60
    }, {
        x: "Q3",
        y: 190
    }, {
        x: "Q4",
        y: 70
    }]
}, {
    y: 540,
    quarters: [{
        x: "Q1",
        y: 120
    }, {
        x: "Q2",
        y: 120
    }, {
        x: "Q3",
        y: 130
    }, {
        x: "Q4",
        y: 170
    }]
}, {
    y: 580,
    quarters: [{
        x: "Q1",
        y: 170
    }, {
        x: "Q2",
        y: 130
    }, {
        x: "Q3",
        y: 120
    }, {
        x: "Q4",
        y: 160
    }]
}];

function makeData() {
    var e = shuffleArray(arrayData);
    return [{
        x: "2011",
        y: e[0].y,
        color: colors[0],
        quarters: e[0].quarters
    }, {
        x: "2012",
        y: e[1].y,
        color: colors[1],
        quarters: e[1].quarters
    }, {
        x: "2013",
        y: e[2].y,
        color: colors[2],
        quarters: e[2].quarters
    }, {
        x: "2014",
        y: e[3].y,
        color: colors[3],
        quarters: e[3].quarters
    }, {
        x: "2015",
        y: e[4].y,
        color: colors[4],
        quarters: e[4].quarters
    }, {
        x: "2016",
        y: e[5].y,
        color: colors[5],
        quarters: e[5].quarters
    }]
}

function updateQuarterChart(e, t) {
    var o = [],
        r = [];
    if (e.w.globals.selectedDataPoints[0]) {
        for (var a = e.w.globals.selectedDataPoints, s = 0; s < a[0].length; s++) {
            var l = a[0][s],
                n = e.w.config.series[0];
            o.push({
                name: n.data[l].x,
                data: n.data[l].quarters
            }), r.push(n.data[l].color)
        }
        return 0 === o.length && (o = [{
            data: []
        }]), ApexCharts.exec(t, "updateOptions", {
            series: o,
            colors: r,
            fill: {
                colors: r
            }
        })
    }
}
colors = ["#4697ce", "#53389f", "#7f56da", "#ff86c8", "#e06d94", "#63b7e6"], options = {
    series: [{
        data: makeData()
    }],
    chart: {
        id: "barYear",
        height: 400,
        width: "100%",
        type: "bar",
        events: {
            dataPointSelection: function (e, t, o) {
                var r = document.querySelector("#chart-quarter"),
                    a = document.querySelector("#chart-year");
                1 === o.selectedDataPoints[0].length && (r.classList.contains("active") || (a.classList.add("chart-quarter-activated"), r.classList.add("active"))), updateQuarterChart(t, "barQuarter"), 0 === o.selectedDataPoints[0].length && (a.classList.remove("chart-quarter-activated"), r.classList.remove("active"))
            },
            updated: function (e) {
                updateQuarterChart(e, "barQuarter")
            }
        }
    },
    plotOptions: {
        bar: {
            distributed: !0,
            horizontal: !0,
            barHeight: "75%",
            dataLabels: {
                position: "bottom"
            }
        }
    },
    dataLabels: {
        enabled: !0,
        textAnchor: "start",
        style: {
            colors: ["#fff"]
        },
        formatter: function (e, t) {
            return t.w.globals.labels[t.dataPointIndex]
        },
        offsetX: 0,
        dropShadow: {
            enabled: !0
        }
    },
    colors: colors,
    states: {
        normal: {
            filter: {
                type: "desaturate"
            }
        },
        active: {
            allowMultipleDataPointsSelection: !0,
            filter: {
                type: "darken",
                value: 1
            }
        }
    },
    tooltip: {
        x: {
            show: !1
        },
        y: {
            title: {
                formatter: function (e, t) {
                    return t.w.globals.labels[t.dataPointIndex]
                }
            }
        }
    },
    title: {
        text: "Yearly Results",
        offsetX: 15
    },
    subtitle: {
        text: "(Click on bar to see details)",
        offsetX: 15
    },
    yaxis: {
        labels: {
            show: !1
        }
    }
};
(chart = new ApexCharts(document.querySelector("#chart-year"), options)).render();
var optionsQuarter = {
        series: [{
            data: []
        }],
        chart: {
            id: "barQuarter",
            height: 400,
            width: "100%",
            type: "bar",
            stacked: !0
        },
        plotOptions: {
            bar: {
                columnWidth: "50%",
                horizontal: !1
            }
        },
        colors: colors = ["#4697ce", "#53389f", "#7f56da", "#ff86c8", "#e06d94", "#23c6c8"],
        legend: {
            show: !1
        },
        grid: {
            yaxis: {
                lines: {
                    show: !1
                }
            },
            xaxis: {
                lines: {
                    show: !0
                }
            }
        },
        yaxis: {
            labels: {
                show: !1
            }
        },
        title: {
            text: "Quarterly Results",
            offsetX: 10
        },
        tooltip: {
            x: {
                formatter: function (e, t) {
                    return t.w.globals.seriesNames[t.seriesIndex]
                }
            },
            y: {
                title: {
                    formatter: function (e, t) {
                        return t.w.globals.labels[t.dataPointIndex]
                    }
                }
            }
        }
    },
    chartQuarter = new ApexCharts(document.querySelector("#chart-quarter"), optionsQuarter);
chartQuarter.render(), chart.addEventListener("dataPointSelection", function (e, t, o) {
    var r = document.querySelector("#chart-quarter"),
        a = document.querySelector("#chart-year");
    1 === o.selectedDataPoints[0].length && (r.classList.contains("active") || (a.classList.add("chart-quarter-activated"), r.classList.add("active"))), updateQuarterChart(t, "barQuarter"), 0 === o.selectedDataPoints[0].length && (a.classList.remove("chart-quarter-activated"), r.classList.remove("active"))
}), chart.addEventListener("updated", function (e) {
    updateQuarterChart(e, "barQuarter")
}), document.querySelector("#model").addEventListener("change", function (e) {
    chart.updateSeries([{
        data: makeData()
    }])
});
