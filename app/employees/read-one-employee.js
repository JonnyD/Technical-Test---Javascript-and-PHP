$(document).ready(function() {

    // handle 'read one' button click
    $(document).on('click', '.read-one-employee-button', function() {

        // get employee id
        var id = $(this).attr('data-id');

        // read employee record based on given ID
        $.getJSON("api/employee/read_one.php?id=" + id, function(data) {

            // start html
            var read_one_employee_html = "";

            // employee data will be shown in this table
            read_one_employee_html += "<table class='table table-bordered table-hover'>";

                // first name
                read_one_employee_html += "<tr>";
                    read_one_employee_html += "<td class='w-30-pct'>First Name</td>";
                    read_one_employee_html += "<td class='w-70-pct'>" + data.first_name + "</td>";
                read_one_employee_html += "</tr>";

                // last name
                read_one_employee_html += "<tr>";
                    read_one_employee_html += "<td class='w-30-pct'>Last Name</td>";
                    read_one_employee_html += "<td class='w-70-pct'>" + data.last_name + "</td>";
                read_one_employee_html += "</tr>";

                // job title
                read_one_employee_html += "<tr>";
                    read_one_employee_html += "<td class='w-30-pct'>Job Title</td>";
                    read_one_employee_html += "<td class='w-70-pct'>" + data.job_title + "</td>";
                read_one_employee_html += "</tr>";

                // email
                read_one_employee_html += "<tr>";
                    read_one_employee_html += "<td class='w-30-pct'>Email</td>";
                    read_one_employee_html += "<td class='w-70-pct'>" + data.email + "</td>";
                read_one_employee_html += "</tr>";

                // phone
                read_one_employee_html += "<tr>";
                    read_one_employee_html += "<td class='w-30-pct'>Phone</td>";
                    read_one_employee_html += "<td class='w-70-pct'>" + data.phone + "</td>";
                read_one_employee_html += "</tr>";

                // address line 1
                read_one_employee_html += "<tr>";
                    read_one_employee_html += "<td class='w-30-pct'>Address Line 1</td>";
                    read_one_employee_html += "<td class='w-70-pct'>" + data.address_line_1 + "</td>";
                read_one_employee_html += "</tr>";

                // address line 2
                read_one_employee_html += "<tr>";
                    read_one_employee_html += "<td class='w-30-pct'>Address Line 2</td>";
                    read_one_employee_html += "<td class='w-70-pct'>" + data.address_line_2 + "</td>";
                read_one_employee_html += "</tr>";

                // town / city
                read_one_employee_html += "<tr>";
                    read_one_employee_html += "<td class='w-30-pct'>Town / City</td>";
                    read_one_employee_html += "<td class='w-70-pct'>" + data.town_city + "</td>";
                read_one_employee_html += "</tr>";

                // county / region
                read_one_employee_html += "<tr>";
                    read_one_employee_html += "<td class='w-30-pct'>County / Region</td>";
                    read_one_employee_html += "<td class='w-70-pct'>" + data.county_region + "</td>";
                read_one_employee_html += "</tr>";

                // country
                read_one_employee_html += "<tr>";
                    read_one_employee_html += "<td class='w-30-pct'>Country</td>";
                    read_one_employee_html += "<td class='w-70-pct'>" + data.country + "</td>";
                read_one_employee_html += "</tr>";

                // postcode
                read_one_employee_html += "<tr>";
                    read_one_employee_html += "<td class='w-30-pct'>Postcode</td>";
                    read_one_employee_html += "<td class='w-70-pct'>" + data.postcode + "</td>";
                read_one_employee_html += "</tr>";

                // company
                read_one_employee_html += "<tr>";
                    read_one_employee_html += "<td class='w-30-pct'>Company</td>";
                    read_one_employee_html += "<td class='w-70-pct'>" + data.company.name + "</td>";
                read_one_employee_html += "</tr>";

            read_one_employee_html+="</table>";

            // inject to app
            $(".modal-body").html(read_one_employee_html);

            // change modal title
            changeModalTitle("Read One Employee");
        });
    });

});
