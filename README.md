
# Capstone Project Portal

## Contributing

### Getting Started

You should first [install PHP and the Laravel CLI](https://laravel.com/docs/12.x/installation#installing-php). You also need Node.js. We recommend using [nvm](https://github.com/nvm-sh/nvm) to manage your Node.js versions.

Install frontend dependencies:

```shell
npm install && npm run build
```

Start the Laravel development server:

```shell
composer run dev
```

Once you have started the Laravel development server, your application will be accessible in your web browser at `http://localhost:8000`.

### Database Configuration

By default, the application is configured to use SQLite. We use MariaDB. To configure it for development purposes, follow the instructions below.

### macOS

Install MariaDB via Homebrew:

```shell
brew install mariadb
```

To auto-start MariaDB Server, use Homebrew's services functionality, which configures auto-start with the launchctl utility from launchd:

```shell
brew services start mariadb
```

After MariaDB Server is started, you can log in as root:

```shell
sudo mysql -u root
```

Create a database for the project:

```sql
CREATE DATABASE capstone_project_portal;
```

Create a database user for the project:

```sql
CREATE USER 'dev'@'localhost' IDENTIFIED BY 'dev';
GRANT ALL PRIVILEGES ON *.* TO 'dev'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
```

Update the `.env` file with the database credentials:

```plaintext
DB_USERNAME=dev
DB_PASSWORD=dev
```

Run the migrations to set up the database schema:

```shell
php artisan migrate
```

[Current schema on drawSQL.](https://drawsql.app/teams/capucity/diagrams/capstone-project-portal)
