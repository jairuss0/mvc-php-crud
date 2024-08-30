$(document).ready(function(){

    $("#createUser").click(function(){
        $("#user-form")[0].reset();
        $('#userId').val('');
        $('.modal-title').text('Create User');
        $('#user-modal').modal('show')
    });

    $('#user-form').submit(function(event){
        event.preventDefault();
        const formData = $(this).serialize();
        $.ajax({
            url: 'index.php?action=' + ($('#userId').val() ? 'update' : 'create'),
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response){
                if(response.result){
                    $('#user-modal').modal("hide");
                    //location.reload();
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

    $('.delete_user').click(function(){
        // get the data-id attr value
        const id = $(this).data('id');
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
                    url: 'index.php?action=delete',
                    method: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    // success not working
                    success: function(response){
                        
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
    });
    
});