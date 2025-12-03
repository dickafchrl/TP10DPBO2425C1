<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Pesanan Ticket</h2>
<a href="index.php?entity=tickets&action=add" class="">Add tickets</a>
<table class="w-full border">
    <tr>
        <th>Nama Event</th>
        <th>Tipe Ticket</th>
        <th>Harga</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($ticketList as $ticket): ?>
        <tr>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($ticket['nama_event']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($ticket['tipe_tiket']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($ticket['harga']); ?></td>
            <td class="border px-4 py-2">
                <a href="index.php?entity=tickets&action=edit&id=<?php echo $ticket['id']; ?>">Edit</a>
                |
                <a href="index.php?entity=tickets&action=delete&id=<?php echo $ticket['id']; ?>" onclick="return confirm('Are you sure you want to delete this tickets?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>