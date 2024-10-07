# Football Team Ranking System Website

This project is a dynamic web application for managing and displaying football match data and ranking teams based on their scores. The system allows users to input match details, store them in a database, and view the rankings. 

## Features
- **User-Friendly Interface**: A responsive web interface built using HTML, CSS, and Bootstrap, allowing users to input football team names and their respective match scores.
- **PHP Backend**: PHP scripts handle the processing of user input and connect to a MySQL database to store match data.
- **Database Management**: Data is stored in a MySQL database via phpMyAdmin, allowing for easy management of match details.
- **Ranking Algorithm**: Teams are ranked based on their scores, using sorting algorithms implemented in PHP to display teams with the highest or lowest scores.

## Tech Stack

- **Frontend**: 
  - HTML
  - CSS
  - Bootstrap
- **Backend**: 
  - PHP
  - MySQL
- **Database**: 
  - phpMyAdmin
  - MySQL

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/mrvnsyh/ranking-system-website.git
2. **Set up the MySQL Database**:
- Import the provided SQL file (football_teams.sql) into your MySQL database via phpMyAdmin.
- Create a new table in phpMyAdmin to store football match results.
3. **Configure Database Connection**:
- Open config.php file.
- Update the MySQL connection details (host, username, password, and database).
4. **Run the Project**:
- Host the project on a local server (e.g., XAMPP or WAMP).
- Open the project in your browser via localhost.

## Website Screenshots
<img src="https://github.com/user-attachments/assets/9d3db819-148e-4c5c-9b39-8f1681a244d1" alt="Application Interface" width="500"/>
<img src="https://github.com/user-attachments/assets/58455968-832a-4e4c-849d-6ddfa71e9bf8" alt="User Input Example" width="500"/>

