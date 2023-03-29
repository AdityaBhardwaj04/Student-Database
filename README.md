# Student Databse
 
## Overview
This project is a user authentication system for KIIT University. It allows admins to view the complete database, while basic users can only view their own information. The project includes pages with interesting info on KIIT University, a user registration system for admins, and a feedback form connected to Formspree.

## Setup

### Requirements
- XAMPP

### Installation
1. Clone the repository to your local machine.
2. Start XAMPP and create a new database called 'project'.
3. Copy the SQL command provided in the example .sql file to create a table called 'users'.
4. Import the example table into the 'project' database.

### Feedback Form
1. Go to [Formspree](https://formspree.io/) and follow the steps to link your email.
2. Edit the `action` attribute in `feedback.html` to include your Formspree endpoint.

## Usage
1. Start XAMPP and run the project locally.
2. Log in as an admin to register new users or view the complete database.
3. Log in as a basic user to view personal information.
4. Use the feedback form to submit queries, which will be sent to the linked email.

## Features
- User authentication system
- Admin and basic user roles
- User registration by admins
- KIIT University information pages
- Feedback form connected to Formspree

## Additional information
- It's important to note that the first admin will need to be added to the table in phpMyAdmin itself.
- Make sure all files are placed in a single folder for easy access.
- Ensure proper security measures are taken before hosting it on a live server. 
- The project can be further improved by adding features such as password recovery and updating user profiles.
