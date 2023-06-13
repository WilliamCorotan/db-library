$(document).ready(function () {

    const date = new Date;
    let hours = date.getHours();
    let status = (hours < 12) ? "morning" : ((hours <= 18 && hours >= 12 ) ? "afternoon" : "evening");
    
    $('#greeting-card').html(`Good ` + status + `, <span class="nav-user-container"></span> 👋`);
    $.ajax({
        type: "get",
        url: `${location.origin}/user/fetch/active`,
        dataType: "json",
        success: function(response) {
            console.log(response);
            Highcharts.chart('users-card', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Active Users',
                    align: 'left'
                },

                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Users',
                    colorByPoint: true,
                    data: [
                        {
                            name: response[0].code,
                            y: parseInt(response[0].count)
                        },
                        {
                            name: response[1].code,
                            y: parseInt(response[1].count)
                        }]
                }]
            });

        }
    });
    
    
    $.ajax({
        type: "get",
        url: `${location.origin}/admin/fetch/active`,
        dataType: "json",
        success: function(response) {
            console.log(response);
            Highcharts.chart('admins-card', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Active Admins',
                    align: 'left'
                },
    
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Admins',
                    colorByPoint: true,
                    data: [
                        {
                            name: response[0].code,
                            y: parseInt(response[0].count)
                        },
                        {
                            name: response[1].code,
                            y: parseInt(response[1].count)
                        }]
                }]
            });
        }
    });
        
});