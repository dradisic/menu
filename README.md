# Currency Exchange Application

This Currency Exchange Application is designed to provide real-time foreign exchange rate information and currency conversion functionalities. It integrates with external APIs like Fast Forex to fetch the latest currency exchange rates and offers a seamless experience for purchasing foreign currencies. The application supports multiple currencies, allowing users to select, quote, and purchase currencies like Japanese Yen (JPY), British Pound (GBP), and Euro (EUR) with US Dollars (USD).

## Features

- Real-time currency exchange rates fetched from Fast Forex API.
- Currency selection and conversion functionalities.
- Calculation of total costs including surcharges and discounts for specific currencies.
- API endpoints for fetching available currencies, quoting prices, and processing currency purchase orders.
- Scheduled tasks for updating currency exchange rates periodically in the database.

## Prerequisites

Before you begin the installation, ensure you have the following tools installed on your system:

- Docker and Docker Compose: For containerization and easy setup.
- PHP (Version as per Laravel's requirement for the project version): If you plan to run the application without Docker.
- Composer: For managing PHP dependencies.

### Installation

To set up your development environment for the project, follow these steps:

- [ ] Start the application using Docker Compose:
  `docker compose up -d --build`
- [ ] After starting the Docker containers, enter the PHP container:
  `docker exec -it menu-php bash`
- [ ] Copy the example environment file to create a new `.env` file:
  `cp .env.example .env`
- [ ] Install the project dependencies using Composer:
  `composer install`
- [ ] Generate an application key:
  `php artisan key:generate`
- [ ] Run the database migrations and seed the database:
  `php artisan migrate:fresh --seed`


## Email Service Configuration
 - To test email functionalities during development, register with an email service like Mailtrap.

### Mailtrap Setup
- Sign up or sign in to Mailtrap.
- Use an existing inbox or create a new one for your project.
- Locate your inbox's SMTP credentials (host, port, username, password).
- Update Environment Variables
- Update the .env file with your Mailtrap credentials:
```
MAIL_MAILER=smtp
MAIL_HOST=<your_mailtrap_smtp_host>
MAIL_PORT=2525
MAIL_USERNAME=<your_mailtrap_username>
MAIL_PASSWORD=<your_mailtrap_password>
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=example@example.com
MAIL_FROM_NAME="${APP_NAME}"
```
Replace the placeholders with your actual Mailtrap credentials.

## Running Tests
To run the application's tests, use the following command:

```php artisan test```

This command will execute the test suite, allowing you to verify that the application's functionalities are working as expected.

## Updating Currency Rates

The application automatically updates currency rates on a daily basis. However, if you need to update the currency rates manually without waiting for the scheduled update, you can run the following artisan command:

```
php artisan currency:update-rates
```
