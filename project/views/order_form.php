<?php require_once 'views/template/header.php'; ?>

<h2 class="text-xl mb-4">
    <?= isset($order) ? 'Edit Order' : 'Add Order' ?>
</h2>

<form action="index.php?entity=orders&action=<?= isset($order) ? 'update&id=' . $order['id'] : 'save'; ?>" method="POST" class="space-y-4">

    <!-- PILIH USER -->
    <div>
        <label class="block">User:</label>
        <select name="user_id" class="border p-2 w-full" required>
            <?php foreach ($userList as $user): ?>
                <option value="<?= $user['id'] ?>"
                    <?= isset($order) && $order['user_id'] == $user['id'] ? 'selected' : '' ?>>
                    <?= $user['nama'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- PILIH TICKET -->
    <div>
        <label class="block">Ticket:</label>
        <select name="ticket_id" class="border p-2 w-full" required>
            <?php foreach ($ticketList as $ticket): ?>
                <option value="<?= $ticket['id'] ?>"
                    <?= isset($order) && $order['ticket_id'] == $ticket['id'] ? 'selected' : '' ?>>
                    <?= $ticket['nama_event'] . " - " . $ticket['tipe_tiket'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- JUMLAH -->
    <div>
        <label class="block">Jumlah:</label>
        <input type="number" name="jumlah" min="1"
               value="<?= isset($order) ? $order['jumlah'] : '' ?>" class="border p-2 w-full" required>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
        Save
    </button>
</form>

<?php require_once 'views/template/footer.php'; ?>