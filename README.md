# Simpvel Application

## Overview

Simpvel is a simple PHP application designed to manage users and their roles. The application uses a basic MVC (Model-View-Controller) architecture and includes functionalities to view, create, and manage users.

## Features

- **User Management**: View all users, create new users, and view individual user details.
- **Role-Based Access**: Differentiate between admin and regular users.
- **Bootstrap Integration**: Utilizes Bootstrap 5.3.5 for responsive and modern UI design.

## Project Structure

The project is organized into several directories:

- **app/**: Contains the application's core components.
  - **Models/**: Contains the data models.
  - **Views/**: Contains the view templates.
  - **Http/Controllers/**: Contains the controllers handling HTTP requests.

- **config/**: Contains configuration files.
  - **app.php**: Main application configuration.

- **core/**: Contains the core framework files.
  - **helpers/**: Contains helper functions.

- **database/**: Contains database schema and seed files.
  - **simpvel.sql**: SQL dump for the database schema and initial data.

- **routes/**: Contains route definitions.
  - **web.php**: Defines the web routes for the application.

- **vendor/**: Contains third-party libraries, including Bootstrap.

## Setup

### Prerequisites

- PHP 8.2.5 or higher
- MySQL 8.0.30 or higher

### Installation

1. **Clone the Repository**:
   ```sh
   git clone https://github.com/locshino/simpvel.git
   cd simpvel
   ```

2. **Configure Environment**:
   - Copy `env.php-example` to `env.php` and update the configuration values as needed.

3. **Set Up Database**:
   - Import the `database/simpvel.sql` file into your MySQL database.
   - Update the database configuration in `env.php` if necessary.

4. **Run the Application**:
   - Start your local server (e.g., using PHP's built-in server):
     ```sh
     php -S localhost:8000 -t public
     ```
   - Access the application at `http://localhost:8000`.

## Usage

### Routes

- **Home**: `/` - Displays the welcome page.
- **Users**:
  - **List Users**: `/users` - Displays a list of all users.
  - **View User**: `/users/{id}` - Displays details of a specific user.
  - **Create User**: `/users/create` - Displays the form to create a new user.
  - **Store User**: `/users/store` - Handles the form submission to create a new user.

### Models

- **User**: Manages user data and provides methods to interact with the `user` table in the database.

### Views

- **Layout**: `app/Views/layouts/app.php` - The main layout template.
- **Flash Messages**: `_flash` - Partial view for displaying flash messages.
- **Content Section**: `content` - Placeholder for the main content of each page.

### Helpers

- **Base Helpers**: `core/helpers/base.php` - Contains base helper functions.
- **Configuration Helpers**: `core/helpers/config.php` - Contains functions for environment and configuration management.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your changes.

## License

This project is licensed under the MIT License. See the `LICENSE` file for more details.

## Contact

For any questions or issues, please contact [your-email@example.com](mailto:your-email@example.com).