$(document).ready(function()
{   
    let value = [];
    $.map($(".billing"),function(month){
        value.push({
            label : month.cells[0].innerText +"("+ month.cells[1].innerText+")",
            y : parseInt(month.cells[2].innerText)
        })
    })
    //Better to construct options first and then pass it as a parameter
    var options = {
        title: 
        {
            text: "Client Billing"              
        },
        data: 
        [              
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: value
            }
        ]
    };
    $("#chartContainer").CanvasJSChart(options);
})