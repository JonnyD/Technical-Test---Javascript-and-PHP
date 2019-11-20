$(document).ready(function() {

    // show html form when 'update employee' button was clicked
    $(document).on('click', '.update-employee-button', function() {

        // get employee id
        var id = $(this).attr('data-id');

        // read one record based on given employee id
        $.getJSON("api/employee/read_one.php?id=" + id, function(data) {

            // values will be used to fill out our form
            var first_name = data.first_name;
            var last_name = data.last_name;
            var job_title = data.job_title;
            var email = data.email;
            var phone = data.phone;
            var address_line_1 = data.address_line_1;
            var address_line_2 = data.address_line_2;
            var town_city = data.town_city;
            var county_region = data.county_region;
            var country = data.country;
            var postcode = data.postcode;
            var company_id = data.company.id;

            // load list of companies
            $.getJSON("api/company/read.php", function(data) {
                // build 'companies option' html
                // loop through returned list of data
                var companies_options_html = "";
                companies_options_html += "<select name='company_id' class='form-control'>";
                $.each(data, function(key, val){
                    if(val.id == company_id) {
                        companies_options_html += "<option value='" + val.id + "' selected>" + val.name + "</option>";
                    } else {
                        companies_options_html += "<option value='" + val.id + "'>" + val.name + "</option>";
                    }
                });
                companies_options_html += "</select>";

                // store 'update employee' html to this variable
                var update_employee_html = "";

                // build 'update employee' html form
                update_employee_html += "<form id='update-employee-form' action='#' method='post'>";
                update_employee_html += "<table class='table table-hover table-responsive table-bordered'>";

                // first name
                update_employee_html += "<tr>";
                update_employee_html += "<td>First Name</td>";
                update_employee_html += "<td><input value=\"" + first_name + "\" type='text' name='first_name' class='form-control' required /></td>";
                update_employee_html += "</tr>";

                // last name
                update_employee_html += "<tr>";
                update_employee_html += "<td>Last Name</td>";
                update_employee_html += "<td><input value=\"" + last_name + "\" type='text' name='last_name' class='form-control' required /></td>";
                update_employee_html += "</tr>";

                // job title
                update_employee_html += "<tr>";
                update_employee_html += "<td>Job Title</td>";
                update_employee_html += "<td><input value=\"" + job_title + "\" type='text' name='job_title' class='form-control' required /></td>";
                update_employee_html += "</tr>";

                // email
                update_employee_html += "<tr>";
                update_employee_html += "<td>Email</td>";
                update_employee_html += "<td><input value=\"" + email + "\" type='text' name='email' class='form-control' required /></td>";
                update_employee_html += "</tr>";

                // phone
                update_employee_html += "<tr>";
                update_employee_html += "<td>Phone</td>";
                update_employee_html += "<td><input value=\"" + phone + "\" type='text' name='phone' class='form-control' required /></td>";
                update_employee_html += "</tr>";

                // address line 1
                update_employee_html += "<tr>";
                update_employee_html += "<td>Address Line 1</td>";
                update_employee_html += "<td><input value=\"" + address_line_1 + "\" type='text' name='address_line_1' class='form-control' required /></td>";
                update_employee_html += "</tr>";

                // address line 2
                update_employee_html += "<tr>";
                update_employee_html += "<td>Address Line 2</td>";
                update_employee_html += "<td><input value=\"" + address_line_2 + "\" type='text' name='address_line_2' class='form-control' required /></td>";
                update_employee_html += "</tr>";

                // town / city
                update_employee_html += "<tr>";
                update_employee_html += "<td>Town / City</td>";
                update_employee_html += "<td><input value=\"" + town_city + "\" type='text' name='town_city' class='form-control' required /></td>";
                update_employee_html += "</tr>";

                // county / region
                update_employee_html += "<tr>";
                update_employee_html += "<td>County / Region</td>";
                update_employee_html += "<td><input value=\"" + county_region + "\" type='text' name='county_region' class='form-control' required /></td>";
                update_employee_html += "</tr>";

                // country
                update_employee_html += "<tr>";
                update_employee_html += "<td>Country</td>";
                update_employee_html += "<td><input value=\"" + country + "\" type='text' name='country' class='form-control' required /></td>";
                update_employee_html += "</tr>";

                // postcode
                update_employee_html += "<tr>";
                update_employee_html += "<td>Postcode</td>";
                update_employee_html += "<td><input value=\"" + postcode + "\" type='text' name='postcode' class='form-control' required /></td>";
                update_employee_html += "</tr>";

                // companies 'select'
                update_employee_html += "<tr>";
                update_employee_html += "<td>Company</td>";
                update_employee_html += "<td>" + companies_options_html + "</td>";
                update_employee_html += "</tr>";

                update_employee_html += "<tr>";

                // hidden 'employee id' to identify which record to delete
                update_employee_html += "<td><input value=\"" + id + "\" name='id' type='hidden' /></td>";

                // button to submit form
                update_employee_html += "<td>";
                update_employee_html += "<button type='submit' class='btn btn-info'>";
                update_employee_html += "<span class='glyphicon glyphicon-edit'></span> Update Employee";
                update_employee_html += "</button>";
                update_employee_html += "</td>";

                update_employee_html += "</tr>";

                update_employee_html += "</table>";
                update_employee_html += "</form>";

                // inject to 'modal-body' of our app
                $(".modal-body").html(update_employee_html);

                // change modal title
                changeModalTitle("Update Employee");

            });
        });
    });

    // will run if 'update employee' form was submitted
    $(document).on('submit', '#update-employee-form', function(){

        // get form data
        var form_data = JSON.stringify($(this).serializeObject());

        // submit form data to api
        $.ajax({
            url: "api/employee/update.php",
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