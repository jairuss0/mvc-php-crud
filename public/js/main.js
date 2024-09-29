let user_dataTable;

$(document).ready(function(){
    
    loadUsers();

    $("#createUser").click(function(){
        $("#user_form")[0].reset();
        $('#userId').val('');
        $('.modal-title').text('Create User');
        $('#user_modal').modal('show');
    });

    $('#user_form').submit(function(event){
        event.preventDefault();
        const routeUrl = $('#userId').val() ? '/mvc-crud/Public/users/edit' : '/mvc-crud/Public/users/add';
        const formData = $(this).serialize();
        $.ajax({
            url: routeUrl,
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response){
                if(response.result){
                    $('#user_modal').modal("hide");
                    //location.reload();
                   loadUsers();
                }
                Swal.fire({
                    title: response.title,
                    text: response.message,
                    icon: response.icon
                });
                
            },
            error: function(response){
                Swal.fire({
                    title: "Oops..",
                    text: response.responseText,
                    icon: "error"
                });
            }
        });
    });

    
});

function deleteUser(id){
    // get the data-id attr value
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/mvc-crud/Public/users/delete',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                // success not working
                success: function(response){
                    if(response.result){
                        loadUsers();
                    }
                    Swal.fire({
                        title: response.title,
                        text: response.message,
                        icon: response.icon
                    });
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    console.log(xhr.responseText);
                    Swal.fire({
                        title: response.title,
                        text: xhr.responseText,
                        icon: response.icon
                    });
                }
                
            });
          
          
        }
    });
}

function editUser(id){
    $('.modal-title').text('Update User');
    $.ajax({
        url: '/mvc-crud/Public/users/show',
        method: 'POST',
        data: {
            id: id
        },
        dataType: 'json',
        success: function(response){
            console.log(response);
            if(response.status){
                
                $('#userId').val(response[0].UserID);
                $('#firstName').val(response[0].FirstName);
                $('#lastName').val(response[0].LastName);
                $('#email').val(response[0].Email);
                $('#dateBirth').val(response[0].DateOfBirth);
                $('#user_modal').modal('show');
            }
        },
        error: function(xhr,response){
            if(!response.status){
                Swal.fire({
                    title: 'Failed',
                    text: response.responseText,
                    icon: 'error'
                });
            }
            Swal.fire({
                title: 'Opps..',
                text: xhr.responseText,
                icon: 'error'
            });
            
        }
    });
}

function loadUsers(){
    $.ajax({
        method: "POST",
        url: "/mvc-crud/Public/users/load",
        dataType: 'json',
        success: function (response) {
          console.log(response);
          // clear and destroy existing dataTable instance
          if (user_dataTable) {
            user_dataTable.clear().destroy();
          }
          let rows;
          response.forEach((item) => {
            rows += `<tr>
                                          <td>${item["UserID"]}</td>
                                          <td>${item["FirstName"]}</td>
                                          <td>${item["LastName"]}</td>
                                          <td>${item["Email"]}</td>
                                          <td>${item["DateOfBirth"]}</td>
                                          <td><button type="button" class="btn btn-success "   onclick="editUser(${item["UserID"]})">
                                                   Update
                                              </button>
                                              <button type="button" class="btn btn-danger "  onclick="deleteUser(${item["UserID"]})" >
                                                   Delete
                                              </button></td>
                      </tr>`;
          });
          $("#user_table tbody").html(rows);
          user_dataTable = $("#user_table").DataTable({
            responsive: true,
            scrollX: true,
            autoWidth: false,
          }); // Re-Initialize dataTable
        },
        error: function (response) {
          Swal.fire({
            title: "failed to load user data",
            text: response.responseText,
            icon: 'error',
          });
        },
    });
}