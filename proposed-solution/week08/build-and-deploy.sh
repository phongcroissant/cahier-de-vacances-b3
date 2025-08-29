#!/bin/bash

echo "Building and deploying Matrix Firewall Cracker applications..."

# Build API
echo "Building .NET API..."
cd api
dotnet restore
dotnet build -c Release
dotnet publish FirewallCracker/FirewallCracker.csproj -c Release -o FirewallCracker/publish
cd ..

# Build Frontend  
echo "Building React frontend..."
cd front-end
npm ci
npm run build-test
cd ..

# Build and run Docker containers
echo "Building and starting Docker containers..."
docker-compose up --build -d

echo ""
echo "Applications are starting up..."
echo "API will be available at: http://localhost:8080"
echo "Frontend will be available at: http://localhost:3000"
echo ""
echo "Use 'docker-compose logs -f' to view logs"
echo "Use 'docker-compose down' to stop the applications"