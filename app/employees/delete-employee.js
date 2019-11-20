$(document).ready(function(){

    // will run if the delete button was clicked
    $(document).on('click', '.delete-employee-button', function(){

        // get the employee id
		var employee_id = $(this).attr('data-id');

        // bootbox for good looking 'confirm pop up'
        bootbox.confirm({

		    message: "<h4>Are you sure?</h4>",
		    buttons: {
		        confirm: {
		            label: '<span class="glyphicon glyphicon-ok"></span> Yes',
		            className: 'btn-danger'
		        },
		        cancel: {
		            label: '<span class="glyphicon glyphicon-remove"></span> No',
		            className: 'btn-primary'
		        }
		    },
		    callback: function (result) {
                // if user click the 'Yes' button
		        if (result == true) {
                    $.ajax({
                        url: "api/employee/delete.php",
                        type : "POST",
                        dataType : 'json',
                        data : JSON.stringify({ id: employee_id }),
                        success : function(result) {
                            showEmployees();
                        },
                        error: function(xhr, resp, text) {
                            console.log(xhr, resp, text);
                        }
                    });

                }
            }
        });
    });

});
