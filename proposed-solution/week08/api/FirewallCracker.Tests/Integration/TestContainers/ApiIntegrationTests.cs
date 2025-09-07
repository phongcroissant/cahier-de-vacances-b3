using System.Net.Http.Json;
using FirewallCracker.PasswordCheck;
using Microsoft.AspNetCore.Mvc.Testing;
using Microsoft.Extensions.Configuration;

namespace FirewallCracker.Tests.Integration.TestContainers;

public class ApiIntegrationTests :
    IClassFixture<DatabaseFixture>,
    IClassFixture<WebApplicationFactory<Program>>
{
    private const string PasswordCheck = "/api/password-check";
    private const CheckPassword? NoCommand = null;

    private readonly HttpClient _client;

    public ApiIntegrationTests(
        WebApplicationFactory<Program> factory,
        DatabaseFixture database)
    {
        factory.WithWebHostBuilder(builder =>
        {
            builder.ConfigureAppConfiguration((_, config) =>
            {
                config.AddInMemoryCollection(new Dictionary<string, string>
                {
                    ["ConnectionStrings:Matrix"] = database.ConnectionString
                }!);
            });
        });
        _client = factory.CreateClient();
    }

    [Fact]
    public async Task Return_Success_For_Valid_Password()
        => await (await CheckPasswordFor(new CheckPassword("StrongP@ss123")))
            .SucceedWith(
                new Response(
                    IsValid: true,
                    Errors: []
                )
            );

    [Fact]
    public async Task Return_Failed_Rules_For_InvalidPassword()
        => await (await CheckPasswordFor(new CheckPassword("weak")))
            .SucceedWith(new Response(
                IsValid: false,
                Errors:
                [
                    "Password must be at least 8 characters long",
                    "Password must include one uppercase letter",
                    "Password must include one number",
                    "Password must include one cyber-symbol (. * # @ $ % &)"
                ]
            ));

    [Fact]
    public async Task Return_Internal_Server_Error_For_Null()
        => (await CheckPasswordFor(NoCommand))
            .FailedWithInternalError();

    private async Task<HttpResponseMessage> CheckPasswordFor(CheckPassword? command)
        => await _client.PostAsJsonAsync(PasswordCheck, command);
}