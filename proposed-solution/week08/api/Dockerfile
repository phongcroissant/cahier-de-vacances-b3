# Use the official .NET runtime image
FROM mcr.microsoft.com/dotnet/aspnet:9.0
WORKDIR /app

# Copy the pre-built published application
COPY ./FirewallCracker/publish .

# Create directory for logs
RUN mkdir -p /app/Logs

# Expose port
EXPOSE 8080

# Set environment variables
ENV ASPNETCORE_URLS=http://+:8080
ENV ASPNETCORE_ENVIRONMENT=Production

# Run the application
ENTRYPOINT ["dotnet", "FirewallCracker.dll"]