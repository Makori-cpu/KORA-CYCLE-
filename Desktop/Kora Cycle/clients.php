<?php
// clients.php - simple admin/test page to view and add clients
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic validation
    $first = trim($_POST['first_name'] ?? '');
    $last = trim($_POST['last_name'] ?? '');
    $lmp = $_POST['lmp'] ?? '';
    $cycle = intval($_POST['average_cycle_length'] ?? 0);

    if ($first === '' || $last === '' || $lmp === '' || $cycle < 21 || $cycle > 45) {
        $message = 'Please provide first name, last name, a valid LMP date and cycle length between 21 and 45.';
    } else {
        try {
            include_once __DIR__ . '/includes/db.php';
            $db = getPDO();
            $stmt = $db->prepare('INSERT INTO clients (first_name, last_name, lmp, average_cycle_length) VALUES (?, ?, ?, ?)');
            $stmt->execute([$first, $last, $lmp, $cycle]);
            header('Location: clients.php?added=1');
            exit;
        } catch (Exception $e) {
            $message = 'Insert failed: ' . $e->getMessage();
        }
    }
}

// Fetch clients
$clients = [];
try {
    if (file_exists(__DIR__ . '/includes/db.php')) {
        include_once __DIR__ . '/includes/db.php';
        $db = getPDO();
        $clients = $db->query('SELECT id, first_name, last_name, lmp, average_cycle_length, created_at FROM clients ORDER BY created_at DESC LIMIT 100')->fetchAll();
    }
} catch (Exception $e) {
    $message = 'Could not load clients: ' . $e->getMessage();
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php $page_title = 'Clients — Kora Cycle'; include 'includes/head.php'; ?>
</head>
<body class="text-kora-text">
    <?php include 'includes/nav.php'; ?>

    <main class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-extrabold mb-6">Clients (test/admin)</h1>

            <?php if (isset($_GET['added'])): ?>
                <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded">Client added successfully.</div>
            <?php endif; ?>

            <?php if ($message): ?>
                <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 rounded"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>

            <section class="mb-8 bg-white p-6 rounded-xl shadow-card">
                <h2 class="font-bold mb-4">Add Client</h2>
                <form method="post" class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <input name="first_name" placeholder="First name" class="px-4 py-2 border rounded" required />
                        <input name="last_name" placeholder="Last name" class="px-4 py-2 border rounded" required />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="block"><span class="text-sm text-gray-600">First Day of Last Period (LMP)</span>
                            <input name="lmp" type="date" class="mt-1 px-4 py-2 border rounded w-full" required />
                        </label>
                        <label class="block"><span class="text-sm text-gray-600">Average Cycle Length (days)</span>
                            <input name="average_cycle_length" type="number" min="21" max="45" value="28" class="mt-1 px-4 py-2 border rounded w-full" required />
                        </label>
                    </div>
                    <div>
                        <button type="submit" class="px-6 py-3 bg-kora-coral text-white rounded-full">Add Client</button>
                    </div>
                </form>
            </section>

            <section class="bg-white p-6 rounded-xl shadow-card">
                <h2 class="font-bold mb-4">Existing Clients</h2>
                <?php if (empty($clients)): ?>
                    <p class="text-gray-600">No clients found. Import `db/schema.sql` to create sample clients or add one above.</p>
                <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="text-sm text-gray-600 border-b">
                                    <th class="py-2">ID</th>
                                    <th class="py-2">Name</th>
                                    <th class="py-2">LMP</th>
                                    <th class="py-2">Cycle Length</th>
                                    <th class="py-2">Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($clients as $c): ?>
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="py-3 text-sm"><?php echo $c['id']; ?></td>
                                        <td class="py-3 text-sm"><?php echo htmlspecialchars($c['first_name'] . ' ' . $c['last_name']); ?></td>
                                        <td class="py-3 text-sm"><?php echo date('d/m/Y', strtotime($c['lmp'])); ?></td>
                                        <td class="py-3 text-sm"><?php echo $c['average_cycle_length']; ?></td>
                                        <td class="py-3 text-sm"><?php echo $c['created_at']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
