function adminTable(){
const actions =  function(userType){ return (`
<div class="text-center">
    <span class="edit-${userType} h-100"> <i class="fa-solid fa-pencil fa-md"></i> </span>      
</div>
`)}

$(document).ready(function () {
    $.ajax({
        type: "get",
        url: "http://localhost/admin/fetch/admins",
        dataType: "json",
        beforeSend: function(){
            $('tbody').children().remove();
        },
        success: function (response) {
            response.forEach(element => {
                $('tbody').append(`
                <tr> 
                <td>${element.id}</td>
                <td>${element.last_name}</td>
                <td>${element.first_name}</td> 
                <td>${element.email}</td>
                <td>${element.status}</td>
                <td>${actions('admin')} </td>`)
            });
        }
    });
});
}

// function declaration in js/admin/user/adminTables.js
adminTable();
