# PHP - School Schedule System

This is a web application for creating school schedules, allowing students to consult the different times for each subject of the course they are enrolled in.

This project was made using only PHP, Javascript and AdminLTE.

- PHP 7+ for the application server side logic.
- JavaScript for the application client side logic.
- [AdminLTE template]() (based on Bootstrap 4.6) for the page styling.

## Getting Started

They are multiple ways to install.

1. As developer mode, by running the following command:
   ```
   $ php -S 127.0.0.1:8080
   ```
2. Running the application from a web server like Apache.

   `NOTE:` Recommended to use XAMPP, because we use this environment to develop our product.

### 1. Download the project

Always recommended to download from GitHub the latest release for new features.

### 2. Configure the db connection

Once the project is opened, modify the `config` file values to be able to connect to the database. This **config file is located in** `./configs/config.php`.

Remember that the <ins>base_url</ins> it will be the path and name of your project. In case of using a web server, it will be the access URL.

**Database for testing**

This project contains a copy of the database for testing purposes, this is an exported SQL file. File location `./db/DUMP-2022_09_12_10_46_35.sql`

### 3. Run the application

Finally, the only thing left to do is to access the website. Depending on the access mode chosen previously, you will access via one URL or another.

The first screen to display is the login screen, the **example credentials** are (in case of importing our data base):

| Email             | Password |    Role |
| :---------------- | :------: | ------: |
| root@gmail.com    | root123  |   admin |
| teacher@gmail.com | pass123  | teacher |
| student@gmail.com | pass123  | student |

## License

LIMA is an open source project that is licensed under [GPL](https://opensource.org/licenses/GPL-2.0).
