Project README: Distance API
Problem Overview
Problem Name: Distance API for Mobile App
Problem Statement:
Develop a REST API to manage geographical coordinates (latitude and longitude) for a mobile app.
The API should handle operations like saving, updating, soft deleting, and viewing coordinates.
Screens and Features
Screen 1
Screen Name: Screen 1
Controls:
Enter Latitude
Enter Longitude
Buttons:
Save: Save the entered latitude and longitude to the database.
Update: Update the existing entry in the database.
View: Display all entries from the database.
Functionality:
Save Button: Save the latitude and longitude to the database.
Update Button: Update the existing entry in the database and validate for existing coordinates.
Delete Button: Perform a soft delete on the entry in the database.
View Button: Retrieve and display all entries from the database.
Screen 2
Screen Name: Screen 2
Button:
Calculate: Calculate the distance of the user in KM/miles based on user preference.
Functionality:
The calculated distance is returned.
Project Setup
Clone Repository:

bash
Copy code
git clone <repository-url>
cd <project-directory>
Install Dependencies:

bash
Copy code
composer install
Configure Environment:

Copy the .env.example file to .env and update the database configuration.
Run Migrations:

bash
Copy code
php artisan migrate
Start Laravel Development Server:

bash
Copy code
php artisan serve
Access API:

API is accessible at http://localhost:8000/api.
API Endpoints
Save Coordinates:

POST /api/coordinates
Request Body: { "latitude": 12.345, "longitude": 67.890 }
Update Coordinates:

PUT /api/coordinates/{id}
Request Body: { "latitude": 54.321, "longitude": 98.765 }
Soft Delete Coordinates:

DELETE /api/coordinates/{id}
View All Coordinates:

GET /api/coordinates
Testing with Postman
Open Postman and create a new request.
Set request details (method, URL, headers, and body if needed).
Click "Send" to test the API endpoint.
View the response in Postman.
Additional Information
For advanced features, error handling, and authentication, refer to the Laravel documentation.
Customize the code and configuration based on specific project requirements.
