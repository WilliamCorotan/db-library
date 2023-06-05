const actions =  function(userType){ return (`
<td class="text-center">
    <span class="edit-${userType} h-100"> <i class="fa-solid fa-pencil fa-md"></i> </span>      
</td>
`)}

$(document).ready(function () {
    $.ajax({
        type: "get",
        url: "http://localhost/admin/fetch/admins",
        dataType: "json",
        success: function (response) {
            response.forEach(element => {
                const id = `<td>${element.id}</td>`;
                const firstName = `<td>${element.first_name}</td>`;
                const lastName = `<td>${element.last_name}</td>`;
                const email = `<td>${element.email}</td>`;
                const status = `<td>${element.status}</td>`;
                const actionsCell = actions('admin');

                console.log(actionsCell)
                $('tbody').append(`
                <tr> 
                ${id} 
                ${firstName} 
                ${lastName} 
                ${email} 
                ${status} 
                ${actionsCell} 
                </tr>`)
            });
        }
    });
});