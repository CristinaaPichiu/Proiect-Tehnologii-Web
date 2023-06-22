let words = [];
let year = [];
let number = [];

let graphType = undefined;
let actor = undefined;
let drawType = undefined;
let yearSelected = undefined;
let chart = undefined;
let myChart = undefined;
let first = true;
let auxData = Array();
const dowl=document.getElementById("dowloands");


/**
 * Function for selecting the <all years> filter for statistics.
 */
function selectAllYears() {
    document.getElementById("recommed-1").disabled = false;
    document.getElementById("cat1").disabled = true;
    document.getElementById("cat2").disabled = true;
    document.getElementById("cat3").disabled = true;
    document.getElementById("year1").disabled = false;
    document.getElementById("year2").disabled = false;
    document.getElementById("year3").disabled = false;
}

/**
 * Function for selecting the <all categories> filter for statistics.
 */
function selectAllCategories() {
    document.getElementById("recommed2").disabled = false;
    document.getElementById("year1").disabled = true;
    document.getElementById("year2").disabled = true;
    document.getElementById("year3").disabled = true;
    document.getElementById("cat1").disabled = false;
    document.getElementById("cat2").disabled = false;
    document.getElementById("cat3").disabled = false;
}

/**
 * Function for selecting value filter for statistics.
 */
function showSelectValue() {
    var select = document.getElementById('actors');
    var value = select.options[select.selectedIndex].value;
    return value;
}

/**
 * Function for displaying year value filter for statistics.
 */
function showYearValue() {
    var select = document.getElementById('yearChoose');
    var value = select.options[select.selectedIndex].value;
    return value;
}

/**
 * Function for selecting the graph type filter for statistics.
 */
function checkGraphType() {
    var ele = document.getElementsByName('recommed1');
    for (i = 0; i < ele.length; i++) {
        if (ele[i].checked)
            return ele[i].value;
    }
}

/**
 * Function for displaying the graph type for statistics.
 */
function getGraphType() {
    var ele = document.getElementsByName('recommed');
    for (i = 0; i < ele.length; i++) {
        if (ele[i].checked)
            return ele[i].value;
    }
}

/**
 * Function for selecting nominees/year.
 */
async function getNomineesYear(url) {
    lastUrl = url;
    let words1 = [];
    await (fetch(url).then(res => res.json()).then(data => {
        words1.push(data.toString().split(','))
        split(words1);
    }));
}

/**
 * Function for splitting words.
 * @param words1
 */
function split(words1) {
    year = [];
    number = [];
    for (index = 0; index < words1[0].length; index++) {
        year.push(words1[0][index].split(';')[0]);
        number.push(parseInt(words1[0][index].split(';')[1]));
    }
    execute();
}
/**
 * Function for executing applied filters.
 */
function execute () {

    document.getElementById("showDiagram").style.flexBasis = drawType.localeCompare("pie") === 0?"30%":"40%";
    auxData = Array();
    for(let i = 0; i < year.length; ++i) {
        auxData.push(getColor());
    }

    if (first !== true) {
        myChart.destroy();
    }
    first = false;

    let ctx = document.getElementById('chartContainer').getContext('2d');
    myChart = new Chart(ctx, {
        type: drawType.localeCompare("column") === 0?"bar":drawType,
        data: {
            labels: year,
            datasets: [{
                data: number,
                backgroundColor: auxData,
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: drawType.localeCompare("pie") === 0?true:false
                },
            },
            indexAxis:drawType.localeCompare("bar") === 0? 'y':'x',
            scales: {
                y: {
                    beginAtZero: true
                }
            },
        }
    });
    if(drawType.localeCompare("bar") === 0) {

        myChart.options.indexAxis = 'y';
    }
}

/**
 * Function for generating graph.
 * @returns {Promise<void>}
 */
async function generateGraph() {

    actor = showSelectValue();
    graphType = checkGraphType();
    drawType = getGraphType();
    let url = undefined;

    if (graphType !== undefined && drawType !== undefined) {
        if (graphType.localeCompare("All Years") === 0) {
            url = "http://localhost:9000/getNumberByYearNominees";
        } else if (graphType.localeCompare("All Categories") === 0) {
            yearSelected = showYearValue();
            if(actor.localeCompare("Winners") === 0) {
                url = "http://localhost:9000/getNumberByCategoryWinners?year=" + yearSelected;
            } else {
                url = "http://localhost:9000/getNumberByCategoryNominees?year=" + yearSelected;
            }
        }
        await (getNomineesYear(url));
    }
    if(drawType==="pie")
    {
        document.getElementById("chartContainer").style.width="300px";
        document.getElementById("showDiagram").style.marginLeft="15%";
        document.getElementById("showDiagram").style.marginTop="9%";
        document.getElementById("d1").style.width="55px";
        document.getElementById("d1").style.height="55px";
        document.getElementById("d2").style.width="55px";
        document.getElementById("d2").style.height="55px";
        document.getElementById("d3").style.width="55px";
        document.getElementById("d3").style.height="55px";
        document.getElementById("dowloands").style.marginLeft="25%";

    }
    else{
        document.getElementById("showDiagram").style.marginLeft="6%";
        document.getElementById("showDiagram").style.marginTop="10%";

    }
    document.getElementById("chartContainer").style.display = "block";
    document.getElementById("chartContainer").style.backgroundColor = "white";
    dowl.style.display="block";
    //downloadCSV();
    //downloadSVG();
    //downloadWEBP();

}

/**
 * Function for converting graph to CSV.
 * @param args
 * @returns {string|null}
 */
function convertChartDataToCSV(args) {
    let result, data;

    data = args.data || null;

    if (data == null || !data.length) {
        return null;
    }

    result = "";
    result += data.join(",");
    result += "\n";

    return result;
}

/**
 * Function for downloading graph to CSV.
 * @param args
 * @returns {string|null}
 */
function downloadCSV() {
    let data, filename, link;
    let csv = "";

    csv += myChart.data.labels.join(",");
    csv += "\n";

    for (let i = 0; i < myChart.data.datasets.length; i++) {
        csv += convertChartDataToCSV({
            data: myChart.data.datasets[i].data,
        });
    }
    if (csv == null) return;

    filename = "chart-data.csv";

    if (!csv.match(/^data:text\/csv/i)) {
        csv = "data:text/csv;charset=utf-8," + csv;
    }

    data = encodeURI(csv);
    link = document.createElement("a");
    link.setAttribute("href", data);
    link.setAttribute("download", filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

/**
 * Function for downloading graph to SVG.
 * @param args
 * @returns {string|null}
 */
/*function downloadSVG() {
    let ctx = document.getElementById("chartContainer2").getContext("2d");

    let radarChart = new Chart(ctx, {
        type: drawType.localeCompare("column") === 0?"bar":drawType,
        data: {
            labels: year,
            datasets: [{
                data: number,
                backgroundColor: auxData,
                borderWidth: 1
            }]
        },
        options: {
            indexAxis:drawType.localeCompare("bar") === 0? 'y':'x',
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            animation: false,
            responsive: false
        }
    });  // Works fine

    C2S.prototype.getContext = function (contextId) {
        if (contextId=="2d" || contextId=="2D") {
            return this;
        }
        return null;
    }

    C2S.prototype.style = function () {
        return this.__canvas.style
    }

    C2S.prototype.getAttribute = function (name) {
        return this[name];
    }

    C2S.prototype.addEventListener =  function(type, listener, eventListenerOptions) {
        console.log("canvas2svg.addEventListener() not implemented.")
    }

// Create canvas2svg 'fake' context
    var c2s = C2S(500,500);

// new chart on 'fake' context fails:
    var mySvg = new Chart(c2s, {
        type: drawType.localeCompare("column") === 0?"bar":drawType,
        data: {
            labels: year,
            datasets: [{
                data: number,
                backgroundColor: auxData,
                borderWidth: 1
            }]
        },
        options: {
            indexAxis:drawType.localeCompare("bar") === 0? 'y':'x',
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            animation: false,
            responsive: false
        }
    });

    let link = document.createElement('a');
    link.href = 'data:image/svg+xml;utf8,' + encodeURIComponent(c2s.getSerializedSvg());
    link.download = filename;
    link.text = linkText;

/!*    let options = {
        type: drawType.localeCompare("column") === 0?"bar":drawType,
        data: {
            labels: year,
            datasets: [{
                data: number,
                backgroundColor: auxData,
                borderWidth: 1
            }]
        },
        options: {
            indexAxis:drawType.localeCompare("bar") === 0? 'y':'x',
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            animation: false,
            responsive: false
        }
    };

    createSvgLink('chart.svg', 'SVG', myChart, options);*!/
}*/

/*function createSvgLink(filename, linkText, chart) {
    if (chart.options.animation !== false) {
        console.warn('Cannot create SVG: "animation" is not set to false (see the options section)');
        return;
    }
    if (chart.options.responsive !== false) {
        console.warn('Cannot create SVG: "responsive" is not set to false (see the options section)');
        return;
    }

    tweakLib();
    let width =  700;
    let height = 700;

    // create an svg version of the chart
    let svgContext = C2S(width, height);
    //myChart.destroy();
    //const ctx = document.getElementById('chartContainer2').getContext('2d');
    let options ={
        type: drawType.localeCompare("column") === 0?"bar":drawType,
        data: {
            labels: year,
            datasets: [{
                data: number,
                backgroundColor: auxData,
                borderWidth: 1
            }]
        },
        options: {
            indexAxis:drawType.localeCompare("bar") === 0? 'y':'x',
            scales: {
                y: {
                    beginAtZero: true
                }
            },

            animation: false,
            responsive: false
        }
    }
    let svgChart = new Chart(svgContext, options);
    // create download link
    let link = document.createElement('a');
    link.href = 'data:image/svg+xml;utf8,' + encodeURIComponent(svgContext.getSerializedSvg());
    link.download = filename;
    link.text = linkText;

    // add link to the page
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
}*/

/*function createSvgLink(filename, linkText, chart, chartSettings) {
    if (chart.options.animation !== false) {
        console.warn('Cannot create SVG: "animation" is not set to false (see the options section)');
        return;
    }
    if (chart.options.responsive !== false) {
        console.warn('Cannot create SVG: "responsive" is not set to false (see the options section)');
        return;
    }

    tweakLib();

    // get the dimensions of our original chart
    let chartCanvas = document.getElementById('chartContainer');
    let width =  chartCanvas.offsetWidth;
    let height = chartCanvas.offsetHeight;

    // create an svg version of the chart
    let svgContext = C2S(width, height);
    console.log("\n\nhere\n\n");
    console.log(C2S);
    console.log("\n\nhere\n\n");
    let svgChart = new Chart(svgContext, chartSettings);

    // create download link
    let link = document.createElement('a');
    link.href = 'data:image/svg+xml;utf8,' + encodeURIComponent(svgContext.getSerializedSvg());
    link.download = filename;
    link.text = linkText;

    // add link to the page
    document.getElementById('wrapper').appendChild(link);
}*/

/*function tweakLib() {
    C2S.prototype.getContext = function(contextId) {
        if (contextId === '2d' || contextId === '2D') {
            return this;
        }
        return null;
    }
    C2S.prototype.style = function() {
        return this.__canvas.style;
    }
    C2S.prototype.getAttribute = function(name) {
        return this[name];
    }
    C2S.prototype.addEventListener = function(type, listener, eventListenerOptions) {
    }
}*/

/**
 * Function for getting color.
 * @returns {string}
 */
function getColor() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    return "rgba(" + r + "," + g + "," + b + ", 0.5)";
}

/**
 * Function for downloading graph to WebP.
 * @param args
 * @returns {string|null}
 */
function downloadWEBP() {
    let data, link;
    data = encodeURI(myChart.toBase64Image("image/jpeg", 1));
    link = document.createElement("a");
    link.setAttribute("href", data);
    link.setAttribute("download", "chart-data.webp");
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
