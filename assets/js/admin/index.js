$(document).ready(function () {

    const date = new Date;
    let hours = date.getHours();
    let status = (hours < 12) ? "morning" : ((hours <= 18 && hours >= 12 ) ? "afternoon" : "evening");
    
    $('#greeting-card').html(`Good ` + status + `, <span class="nav-user-container"></span>`);

    // User Chart Data Fetch
    $.ajax({
        type: "get",
        url: `${location.origin}/user/fetch/active`,
        dataType: "json",
        success: function(response) {
            const options = {
                chart: {
                    renderTo: 'users-card',
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
                    data: []
                }]
            }

            response.forEach(element => {
                options.series[0].data.push(
                    {
                        name: element.code,
                        y: parseInt(element.count)
                    })
            });
            const userChart = Highcharts;
            userChart.chart(options)
        }
    });
    
    // Admin Chart Data Fetch
    $.ajax({
        type: "get",
        url: `${location.origin}/admin/fetch/active`,
        dataType: "json",
        success: function(response) {
            const adminOptions = {
                chart: {
                    renderTo: 'admins-card',
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
                    data: []
                }]
            }
            response.forEach(element => {
                adminOptions.series[0].data.push(
                    {
                        name: element.code,
                        y: parseInt(element.count)
                    })
            });
            const adminChart = Highcharts;
            adminChart.chart(adminOptions)
        }
    });

    // Book per Subject Data Fetch
    $.ajax({
        type: "get",
        url: `${location.origin}/fetch/book/subjects`,
        dataType: "json",
        success: function(response) {
            const subjectOptions = {
                chart: {
                    renderTo: 'book-subjects-card',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'column'
                },
                title: {
                    text: 'Books per Subject'
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Book Count'
                    }
                },
                legend: {
                    enabled: false
                },

                series: [{
                    name: 'Books',
                    colorByPoint: true,
                    groupPadding: 0,
                    data: [],
                    dataLabels: {
                        enabled: true,
                        color: '#FFFFFF',
                        align: 'center',
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }]
            }

            response.forEach(element => {
                subjectOptions.series[0].data.push(
                    {
                        name: element.name,
                        y: parseInt(element.count)
                    })
            });
            Highcharts.chart(subjectOptions );
        }
    });

    // Book per Author Data Fetch
    $.ajax({
        type: "get",
        url: `${location.origin}/fetch/book/authors`,
        dataType: "json",
        success: function(response) {
            const authorOptions = {
                chart: {
                    renderTo: 'book-authors-card',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'column'
                },
                title: {
                    text: 'Books per Author'
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Book Count'
                    }
                },
                legend: {
                    enabled: false
                },

                series: [{
                    name: 'Books',
                    colorByPoint: true,
                    groupPadding: 0,
                    data: [],
                    dataLabels: {
                        enabled: true,
                        color: '#FFFFFF',
                        align: 'center',
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }]
            }

            response.forEach(element => {
                authorOptions.series[0].data.push(
                    {
                        name: element.name,
                        y: parseInt(element.count)
                    })
            });
            Highcharts.chart(authorOptions );
        }
    });
     
    // Book per Publisaher Data Fetch
    $.ajax({
        type: "get",
        url: `${location.origin}/fetch/book/publishers`,
        dataType: "json",
        success: function(response) {
            const publisherOptions = {
                chart: {
                    renderTo: 'book-publishers-card',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'column'
                },
                title: {
                    text: 'Books per Publisher'
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Book Count'
                    }
                },
                legend: {
                    enabled: false
                },

                series: [{
                    name: 'Books',
                    colorByPoint: true,
                    groupPadding: 0,
                    data: [],
                    dataLabels: {
                        enabled: true,
                        color: '#FFFFFF',
                        align: 'center',
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }]
            }

            response.forEach(element => {
                publisherOptions.series[0].data.push(
                    {
                        name: element.name,
                        y: parseInt(element.count)
                    })
            });
            Highcharts.chart(publisherOptions );
        }
    });
});