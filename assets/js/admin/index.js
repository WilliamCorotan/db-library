const date = new Date;
let hours = date.getHours();
let status = (hours < 12) ? "morning" : ((hours <= 18 && hours >= 12 ) ? "afternoon" : "evening");

$('#greeting-card').html(`Good ` + status + `, <span class="nav-user-container"></span> 👋`);

const ctx = $('#myChart');
const usersCard = $('#users-chart');
const adminsCard = $('#admins-chart');
const randomCard = $('#random-chart');

$.ajax({
    type: "get",
    url: `${location.origin}/user/fetch/active`,
    dataType: "json",
    success: function(response) {
        console.log(response);
        new Chart(usersCard, {
            type: 'doughnut',
            data: {
                labels: [
                    response[0].code,
                    response[1].code,

                ],
                datasets: [{
                    label: 'User Status',
                    data: [
                        response[0].count,
                        response[1].count,
                    ],
                    backgroundColor: [
                        'rgb(193, 37, 83)',
                        'rgb(255, 99, 132)',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                maintainAspectRatio: false,
            }
        });
    }
});


$.ajax({
    type: "get",
    url: `${location.origin}/admin/fetch/active`,
    dataType: "json",
    success: function(response) {
        console.log(response);
        new Chart(adminsCard, {
            type: 'doughnut',
            data: {
                labels: [
                    response[0].code,
                    response[1].code,

                ],
                datasets: [{
                    label: 'Admin Status',
                    data: [
                        response[0].count,
                        response[1].count,
                    ],
                    backgroundColor: [
                        'rgb(2, 117, 216)',
                        'rgb(91, 192, 222)',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                maintainAspectRatio: false,
            }
        });
    }
});


new Chart(randomCard, {
    type: 'doughnut',
    data: {
        labels: [
            'Red',
            'Blue',
            'Yellow'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
    },
    options: {
        maintainAspectRatio: false,
    }
});