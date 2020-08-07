# API REST Payment Management
# v1.0

Api Rest that allows to register payments from different companies.

# Installation instructions:

1.Open a terminal.

2.Run the commands below:

    git clone https://github.com/lbetancourtoliva/api-rest-payment.git
    
    cd api-rest-payment
    
    composer install

Configure your database connection information.It is configured in the api-rest-payment/app/config/parameters.yml file:

parameters:

    DB_CONNECTION=<your_db_connection>
    DB_HOST=<your_db_host>
    DB_PORT=<your_db_port>
    DB_DATABASE=<your_db_database>
    DB_USERNAME=<your_db_username>
    DB_PASSWORD=<your_db_password>

Later execute :

    php artisan migrate

    php artisan serve

# Site url

    http://localhost:8000
