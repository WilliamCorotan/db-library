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

    $.ajax({
        type: "get",
        url: `${location.origin}/fetch/book/subjects`,
        dataType: "json",
        success: function(response) {
            console.log(response);
            Highcharts.chart('book-subjects-card', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Books per Subject',
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
                    name: 'Books',
                    colorByPoint: true,
                    data: [
                        {
                            name: response[0].name,
                            y: parseInt(response[0].count)
                        },
                        {
                            name: response[1].name,
                            y: parseInt(response[1].count)
                        },
                        {
                            name: response[2].name,
                            y: parseInt(response[2].count)
                        },
                        {
                            name: response[3].name,
                            y: parseInt(response[3].count)
                        },
                        {
                            name: response[4].name,
                            y: parseInt(response[4].count)
                        },]
                }]
            });
        }
    });

    $.ajax({
        type: "get",
        url: `${location.origin}/fetch/book/authors`,
        dataType: "json",
        success: function(response) {
            console.log(response);
            Highcharts.chart('book-authors-card', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Books per Author',
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
                    name: 'Books',
                    colorByPoint: true,
                    data: [
                        {
                            name: response[0].name,
                            y: parseInt(response[0].count)
                        },
                        {
                            name: response[1].name,
                            y: parseInt(response[1].count)
                        },
                        {
                            name: response[2].name,
                            y: parseInt(response[2].count)
                        },
                        {
                            name: response[3].name,
                            y: parseInt(response[3].count)
                        },
                        {
                            name: response[4].name,
                            y: parseInt(response[4].count)
                        },
                        {
                            name: response[5].name,
                            y: parseInt(response[5].count)
                        },
                        {
                            name: response[6].name,
                            y: parseInt(response[6].count)
                        },
                    ]
                }]
            });
        }
    });
     
    $.ajax({
        type: "get",
        url: `${location.origin}/fetch/book/publishers`,
        dataType: "json",
        success: function(response) {
            console.log(response);
            Highcharts.chart('book-publishers-card', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Books per Publisher',
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
                    name: 'Books',
                    colorByPoint: true,
                    data: [
                        {
                            name: response[0].name,
                            y: parseInt(response[0].count)
                        },
                        {
                            name: response[1].name,
                            y: parseInt(response[1].count)
                        },
                        {
                            name: response[2].name,
                            y: parseInt(response[2].count)
                        },
                        {
                            name: response[3].name,
                            y: parseInt(response[3].count)
                        },
                        {
                            name: response[4].name,
                            y: parseInt(response[4].count)
                        },
                        {
                            name: response[5].name,
                            y: parseInt(response[5].count)
                        },
                        {
                            name: response[6].name,
                            y: parseInt(response[6].count)
                        },
                    ]
                }]
            });
        }
    });
});