$(document).ready(function(){

    // show list of employees on first load
    showEmployees();

    $(document).on('click', '#select-company', function(){
        showEmployees();
    });

    $(document).on('click', '.order-by', function(){
        showEmployees();
    });
});

// function to show list of employees
function showEmployees(){
    var order_by = $('input[name=orderBy]:checked').val();
    if (typeof order_by === 'undefined' || !order_by) {
        order_by = "first_name";
    }

    var company_id = $("#select-company").val();
    if (typeof company_id === 'undefined' || !company_id) {
        company_id = "All";
    }

    var order_by_html = "";
    if (order_by === "first_name") {
        order_by_html += "<input type='radio' class='order-by' name='orderBy' value='first_name' checked> First Name";
    } else {
        order_by_html += "<input type='radio' class='order-by' name='orderBy' value='first_name'> First Name";
    }
    if (order_by === "last_name") {
        order_by_html += "<input type='radio' class='order-by' name='orderBy' value='last_name' checked> Last Name";
    } else {
        order_by_html += "<input type='radio' class='order-by' name='orderBy' value='last_name'> Last Name";
    }

    // load list of companies
    $.getJSON("api/company/read.php", function(data) {
        // build companies option html
        // loop through returned list of data
        var companies_options_html = "";
        companies_options_html += "<select id='select-company' name='company_id' class='form-control pull-left'>";
        companies_options_html += "<option value='All'>All</option>";
        $.each(data, function (key, val) {
            if(val.id == company_id) {
                companies_options_html += "<option value='" + val.id + "' selected>" + val.name + "</option>";
            } else {
                companies_options_html += "<option value='" + val.id + "'>" + val.name + "</option>";
            }
        });
        companies_options_html += "</select>";

        // get list of employees from the API
        $.getJSON("api/employee/read.php?company_id=" + company_id + "&order_by=" + order_by, function(data){
            // html for listing employees
            read_employees_html = "";

            read_employees_html += "<div class='row'>";
                read_employees_html += "<div class='col-md-4'>" + companies_options_html + "</div>";

                read_employees_html += "<div class='col-md-4'>" + order_by_html + "</div>";

                // when clicked, it will load the create employee form
                read_employees_html += "<div class='col-md-4'><div id='create-employee' class='btn btn-primary pull-right create-employee-button' data-toggle='modal' data-target='#myModal'>";
                    read_employees_html += "<span class='glyphicon glyphicon-plus'></span> Create Employee";
                read_employees_html += "</div></div>";

            read_employees_html += "</div>";
            // start table
            read_employees_html += "<table class='table table-bordered table-hover'>";

                // creating our table heading
                read_employees_html += "<tr>";
                    read_employees_html += "<th class='w-25-pct'>First Name</th>";
                    read_employees_html += "<th class='w-10-pct'>Last Name</th>";
                    read_employees_html += "<th class='w-15-pct'>Company</th>";
                    read_employees_html += "<th class='w-25-pct text-align-center'>Action</th>";
                read_employees_html += "</tr>";

            // loop through returned list of data
            $.each(data, function(key, val) {

                // creating new table row per record
                read_employees_html += "<tr>";

                    read_employees_html += "<td>" + val.first_name + "</td>";
                    read_employees_html += "<td>" + val.last_name + "</td>";
                    read_employees_html += "<td>" + val.company.name + "</td>";

                    // 'action' buttons
                    read_employees_html += "<td>";
                        // read employee button
                        read_employees_html += "<button class='btn btn-primary read-one-employee-button' data-id='" + val.id + "' data-toggle='modal' data-target='#myModal'>";
                            read_employees_html += "<span class='glyphicon glyphicon-eye-open'></span> Read";
                        read_employees_html += "</button>";

                        // edit button
                        read_employees_html += "<button class='btn btn-info update-employee-button' data-id='" + val.id + "' data-toggle='modal' data-target='#myModal'>";
                            read_employees_html += "<span class='glyphicon glyphicon-edit'></span> Edit";
                        read_employees_html += "</button>";

                        // delete button
                        read_employees_html += "<button class='btn btn-danger delete-employee-button' data-id='" + val.id + "'>";
                            read_employees_html += "<span class='glyphicon glyphicon-remove'></span> Delete";
                        read_employees_html += "</button>";
                    read_employees_html += "</td>";

                read_employees_html += "</tr>";

            });

            // end table
            read_employees_html += "</table>";

            // inject to 'page-content' of our app
            $("#page-content").html(read_employees_html);

        });
    });
}
