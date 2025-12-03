<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($ticket) ? 'Edit ticket' : 'Add ticket'; ?></h2>
<form action="index.php?entity=tickets&action=<?php echo isset($ticket) ? 'update&id=' . $ticket['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <label class="block">Nama Event:</label>
    <select name="event_id" required>
        <?php foreach ($eventList as $event): ?>
            <option value="<?= $event['id'] ?>"
                <?= isset($ticket) && $ticket['event_id'] == $event['id'] ? 'selected' : '' ?>>
                <?= $event['nama_event'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <div>
        <label class="block">Tipe Ticket:</label>
        <input type="text" name="tipe_tiket" value="<?php echo isset($ticket) ? $ticket['tipe_tiket'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Harga:</label>
        <input type="text" name="harga" value="<?php echo isset($ticket) ? $ticket['harga'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
