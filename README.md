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
