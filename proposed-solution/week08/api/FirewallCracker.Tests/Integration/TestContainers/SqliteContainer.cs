using DotNet.Testcontainers.Builders;
using DotNet.Testcontainers.Containers;

namespace FirewallCracker.Tests.Integration.TestContainers;

public class SqliteContainer : IAsyncDisposable
{
    private readonly IContainer _container = new ContainerBuilder()
        .WithImage("keinos/sqlite3:latest")
        .WithCommand("sh", "-c", "while true; do sleep 1; done")
        .WithPortBinding(3306, true)
        .WithWaitStrategy(Wait.ForUnixContainer().UntilCommandIsCompleted("ls"))
        .Build();

    private bool _isRunning;
    public string ConnectionString { get; private set; } = string.Empty;

    public async Task StartAsync()
    {
        if (_isRunning) return;

        await _container.StartAsync();

        // SQLite uses in-memory or file-based storage, so we'll create a connection string
        // that uses a temporary file in the container
        const string dbPath = "/tmp/test.db";
        ConnectionString = $"Data Source={dbPath}";

        // Execute initial setup in the container
        const string setupCommand = $"touch {dbPath} && chmod 777 {dbPath}";
        await _container.ExecAsync(["sh", "-c", setupCommand]);

        _isRunning = true;
    }

    public async ValueTask DisposeAsync() => await _container.DisposeAsync();
}