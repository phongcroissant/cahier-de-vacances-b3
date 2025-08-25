using Dapper;
using Microsoft.Data.Sqlite;
using Microsoft.Extensions.Configuration;

namespace FirewallCracker.Tests.Integration.TestContainers;

public class DatabaseFixture : IAsyncLifetime
{
    private readonly SqliteContainer _container = new();
    public string ConnectionString => _container.ConnectionString;

    public async Task InitializeAsync()
    {
        await _container.StartAsync();

        new ConfigurationBuilder()
            .AddInMemoryCollection(new Dictionary<string, string>()
            {
                ["ConnectionStrings:Matrix"] = ConnectionString
            }!)
            .Build();

        await InitializeDatabaseAsync();
    }

    private async Task InitializeDatabaseAsync()
    {
        await using var connection = new SqliteConnection(ConnectionString);
        await connection.OpenAsync();

        await RunScript(connection, "CreateSchema");
        await RunScript(connection, "SeedRules");
    }

    private static async Task RunScript(SqliteConnection connection, string name)
        => await connection.ExecuteAsync(
            await File.ReadAllTextAsync($"Integration/TestContainers/scripts/{name}.sql")
        );

    public async Task DisposeAsync() => await _container.DisposeAsync();
}