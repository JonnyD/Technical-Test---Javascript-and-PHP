Please complete the following technical task. I will be reviewing it to asses the following:

* Your ability to follow vague instructions and use your own initiative.
* Your ability to write documented PHP code.
* Your ability to design and abstract database tables.
* Your ability to ability to write a simple RESTful API.
* Your ability to use jQuery and ajax to interact with your API.
* Your ability to write integration documentation for your code.
* The overall robustness of your code (error handling, validation and security especially).

Here is the task:

* Create a simple RESTful API and PHP 7 application which serves to create, retrieve, update and delete employees to two fictional companies "Company A" and "Company B".

* A database with company and employee tables have been provided for you. Use these tables, but feel free to add any other tables or columns you need.

* The RESTful API must be the backend of your PHP app.

* Ensure that your API returns the proper HTTP status where required: 200/400/403/404/405/406/500 - this will be tested.

* In the frontend of your PHP app, create a simple list view to show all employees from all companies, but provide an option to filter these by company and sort them by first name or last name. Also include action buttons to add a new employee and update/delete existing employees.

* Use bootstrap components for style and responsive layout.

* Use a modal dialog to display the form which creates or updates a user.

* When deleting a user, display a message to ask the user if they are sure they want to proceed.

* When creating, updating or deleting a user, use jQuery ajax to call your API which in turn updates the database.

* When complete, put the project in a .git repository and add a readme.md to explain how to install and run the project on a vanilla linux box.

Install LAMP using this tutorial https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04#how-to-find-your-server-39-s-public-ip-address
Use 123 as mysql password
Upload contents of flexiwage_test.zip using FTP to /var/www/html
Login to mysql using 'mysql -u root -p 123'
Run 'source var/www/html/flexiwage_test.sql'
