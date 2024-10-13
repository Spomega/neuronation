# Neuronation API

This repository contains the Neuronation API, which provides user session data and categories. The application is deployed on an AWS EKS Kubernetes cluster and is accessible via a public endpoint. You can also run the application locally using Docker Compose.

## Quick Test (Deployed Application)

The application is already deployed on a Kubernetes cluster on AWS EKS. You can quickly test the API using the following curl requests:

### Get User Session History
```bash
curl -X 'GET' \
  'https://neuronation.sageinfrastructure.net/api/users/1/sessions/history' \
  -H 'accept: application/json' \
  -H 'X-CSRF-TOKEN: '

Note: Please ensure you have curl installed on your machine.

### Get User's Latest Session Categories
```bash
curl -X 'GET' \
  'https://neuronation.sageinfrastructure.net/api/users/1/sessions/lastest/categories' \
  -H 'accept: application/json' \
  -H 'X-CSRF-TOKEN: '

## Docker Compose Setup (Local Development)
1. Clone the Repository
To get started, clone the repository using the command:
```bash
git clone https://github.com/Spomega/neuronation.git
Alternatively, you can download the project files from the GitHub repository.

### 2. Run the Application
After cloning or downloading the project, navigate to the project directory and run:
```bash
make start
# or
docker-compose up --build -d

This command will start the application with Docker Compose. Afterward, check the running containers with:
```bash
docker ps

### 3. Migrate and Seed the Database
Run the following commands to apply database migrations and seed the database:
```bash
docker-compose exec app php artisan migrate --force
docker-compose exec app php artisan db:seed --force

After successful setup, the database will be created, and you can access it via a local database management tool:

URL: http://localhost:8081/
Username: root
Password: root
Database Name: neuro_db


### 4. Testind
Run the below command to check if all tests pass
```bash
php artisan test

### 5. Access API Documentation
Once the application is running, you can access the Swagger documentation for the API:

Swagger Documentation: http://localhost:8080/api/documentation#/
Note: Make sure to click on the expand arrow on the right to reveal all available endpoints.

### 6. Test API Endpoints Locally
You can also test the API locally using curl commands:

Get User Session History
```bash
curl -X 'GET' \
  'http://localhost:8080/api/users/1/sessions/history' \
  -H 'accept: application/json' \
  -H 'X-CSRF-TOKEN: '

Get User's Latest Session Categories
```bash
curl -X 'GET' \
  'http://localhost:8080/api/users/1/sessions/lastest/categories' \
  -H 'accept: application/json' \
  -H 'X-CSRF-TOKEN: '