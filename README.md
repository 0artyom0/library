LIBRARY
-------

The home page of the site displays all the books that have added publications through the REST API.

Through the REST API, it is possible to add, delete and edit published books names and their author or authors. 
And also possible to add a new publicator.
With more details about REST API you can see in api_documentation.docs documentation file.

Technologies used are: Laravel, Php, Bootstrap, Javascript, jQuery, Ajax

First, you need to make a database using the "php artisan migrate" command.

Then you can insert the test data into the database using the "php artisan db:seed" command.

And finally, to run the necessary program, you need to execute the following command: "php artisan serve"
