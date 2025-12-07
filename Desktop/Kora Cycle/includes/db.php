<?php
/* includes/db.php - returns a PDO instance using includes/config.php values if present.
   Safe to include in pages: use $db = getPDO(); */
function getPDO() {
    $defaults = [
        'db_host' => '127.0.0.1',
        'db_port' => 3306,
        'db_name' => 'kora_cycle',
        'db_user' => 'root',
        'db_pass' => '',
    ];

    $cfgPath = __DIR__ . '/config.php';
    if (file_exists($cfgPath)) {
        $cfg = include $cfgPath;
        if (is_array($cfg)) {
            $defaults = array_merge($defaults, $cfg);
        }
    }

    $host = $defaults['db_host'];
    $port = $defaults['db_port'];
    $dbname = $defaults['db_name'];
    $user = $defaults['db_user'];
    $pass = $defaults['db_pass'];

    $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";

    try {
        $opts = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        return new PDO($dsn, $user, $pass, $opts);
    } catch (PDOException $e) {
        // Friendly development error. In production, log and show a generic message.
        die('Database connection failed: ' . $e->getMessage());
    }
}
