# OTP Verification with PHP and Resend API

This repository demonstrates a simple implementation of OTP (One-Time Password) verification via email using PHP and the [Resend API](https://resend.com/). The OTP is sent to the user's email during account creation and is used to verify the registration process.

## Features

- Send OTP via email using Resend API
- Secure OTP validation
- Simple and customizable OTP generation logic
- Error handling for failed OTP verification
- Basic account creation page with OTP submission

## Prerequisites

To run this project, you will need:

- **PHP 7.4+**
- **Composer** (PHP dependency manager)
- **Resend API** account and API key

## Installation

Follow these steps to set up the project locally:

1. Clone this repository to your local machine:

    ```bash
    git clone https://github.com/charith-codex/email_send-php_and_rensend_api.git
    cd email_send-php_and_rensend_api
    ```

2. Install dependencies using Composer:

    ```bash
    composer install
    ```

3. Set up your environment variables  `.env` and filling in your Resend API key:

    ```bash
    composer require vlucas/phpdotenv
    touch .env
    ```

4. Update the `.env` file with your Resend API key:

    ```
    RESEND_API_KEY=your_resend_api_key
    ```

## Usage

1. Start your local server (e.g., using PHP built-in server):

    ```bash
    php -S localhost:8000
    ```

2. Open the account creation page in your browser:

    ```
    http://localhost:8000
    ```

3. Enter the email address to create an account, and an OTP will be sent to your inbox.

4. Submit the OTP to verify the account.

