$(document).ready(function() {

    // show html form when 'create employee' button was clicked
    $(document).on('click', '.create-employee-button', function() {

        // load list of companies
        $.getJSON("api/company/read.php", function(data) {

            // build companies option html
            // loop through returned list of data
            var companies_options_html = "";
            companies_options_html += "<select name='company_id' class='form-control'>";
            $.each(data, function(key, val) {
                companies_options_html += "<option value='" + val.id + "'>" + val.name + "</option>";
            });
            companies_options_html += "</select>";

            var create_employee_html = "";

            // 'create employee' html form
            create_employee_html += "<form id='create-employee-form' action='#' method='post' border='0'>";
                create_employee_html += "<table class='table table-hover table-responsive table-bordered'>";

                    // first name field
                    create_employee_html += "<tr>";
                        create_employee_html += "<td>First Name</td>";
                        create_employee_html += "<td><input type='text' name='first_name' class='form-control' required /></td>";
                    create_employee_html += "</tr>";

                    // last name field
                    create_employee_html += "<tr>";
                        create_employee_html += "<td>Last Name</td>";
                        create_employee_html += "<td><input type='text' name='last_name' class='form-control' required /></td>";
                    create_employee_html += "</tr>";

                    // job title field
                    create_employee_html += "<tr>";
                        create_employee_html += "<td>Job Title</td>";
                        create_employee_html += "<td><input type='text' name='job_title' class='form-control' required /></td>";
                    create_employee_html += "</tr>";

                    // email field
                    create_employee_html += "<tr>";
                        create_employee_html += "<td>Email</td>";
                        create_employee_html += "<td><input type='text' name='email' class='form-control' required /></td>";
                    create_employee_html += "</tr>";

                    // phone field
                    create_employee_html += "<tr>";
                        create_employee_html += "<td>Phone</td>";
                        create_employee_html += "<td><input type='text' name='phone' class='form-control' required /></td>";
                    create_employee_html += "</tr>";

                    // address line 1 field
                    create_employee_html += "<tr>";
                        create_employee_html += "<td>Address Line 1</td>";
                        create_employee_html += "<td><input type='text' name='address_line_1' class='form-control' required /></td>";
                    create_employee_html += "</tr>";

                    // address line 2 field
                    create_employee_html += "<tr>";
                        create_employee_html += "<td>Address Line 2</td>";
                        create_employee_html += "<td><input type='text' name='address_line_2' class='form-control' required /></td>";
                    create_employee_html += "</tr>";

                    // town / city field
                    create_employee_html += "<tr>";
                        create_employee_html += "<td>Town / City</td>";
                        create_employee_html += "<td><input type='text' name='town_city' class='form-control' required /></td>";
                    create_employee_html += "</tr>";

                    // county / region field
                    create_employee_html += "<tr>";
                        create_employee_html += "<td>County / Region</td>";
                        create_employee_html += "<td><input type='text' name='county_region' class='form-control' required /></td>";
                    create_employee_html += "</tr>";

                    // country field
                    create_employee_html += "<tr>";
                        create_employee_html += "<td>Country</td>";
                        create_employee_html += "<td><input type='text' name='country' class='form-control' required /></td>";
                    create_employee_html += "</tr>";

                    // postcode field
                    create_employee_html += "<tr>";
                        create_employee_html += "<td>Postcode</td>";
                        create_employee_html += "<td><input type='text' name='postcode' class='form-control' required /></td>";
                    create_employee_html += "</tr>";

                    // companies 'select' field
                    create_employee_html += "<tr>";
                        create_employee_html += "<td>Company</td>";
                        create_employee_html += "<td>" + companies_options_html + "</td>";
                    create_employee_html += "</tr>";

                    // button to submit form
                    create_employee_html += "<tr>";
                        create_employee_html += "<td></td>";
                        create_employee_html += "<td>";
                            create_employee_html += "<button type='submit' class='btn btn-primary'>";
                                create_employee_html += "<span class='glyphicon glyphicon-plus'></span> Create Employee";
                            create_employee_html += "</button>";
                        create_employee_html += "</td>";
                    create_employee_html += "</tr>";

                create_employee_html += "</table>";
            create_employee_html += "</form>";

            // inject html to 'modal-body'
            $(".modal-body").html(create_employee_html);

            // chage modal title
            changeModalTitle("Create Employee");

        });

    });

    // will run if create employee form was submitted
    $(document).on('submit', '#create-employee-form', function(){

        // get form data
        var form_data = JSON.stringify($(this).serializeObject());

        // submit form data to api
        $.ajax({
            url: "api/employee/create.php",
            type : "POST",
            contentType : 'application/json',
            data : form_data,
            success : function(result) {
                $("#myModal .close").click();
                showEmployees();
            },
            error: function(xhr, resp, text) {
                // show error to console
                console.log(xhr, resp, text);
            }
        });

        return false;
    });

});
