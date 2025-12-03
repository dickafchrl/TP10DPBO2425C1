<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Pesanan event</h2>
<a href="index.php?entity=events&action=add" class="">Add events</a>
<table class="w-full border">
    <tr>
        <th>Nama Event</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($eventList as $event): ?>
        <tr>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($event['nama_event']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($event['tanggal']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($event['lokasi']); ?></td>
            <td class="border px-4 py-2">
                <a href="index.php?entity=events&action=edit&id=<?php echo $event['id']; ?>">Edit</a>
                |
                <a href="index.php?entity=events&action=delete&id=<?php echo $event['id']; ?>" onclick="return confirm('Are you sure you want to delete this events?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>