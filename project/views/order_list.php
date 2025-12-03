<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Pesanan Ticket</h2>
<a href="index.php?entity=orders&action=add" class="">Add orders</a>
<table class="w-full border">
    <tr>
        <th>Nama</th>
        <th>Event Ticket</th>
        <th>Jumlah</th>
        <th>Tanggal</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($orderList as $order): ?>
        <tr>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($order['nama']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($order['nama_event']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($order['jumlah']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($order['tanggal_order']); ?></td>
            <td class="border px-4 py-2">
                <a href="index.php?entity=orders&action=edit&id=<?php echo $order['id']; ?>">Edit</a>
                |
                <a href="index.php?entity=orders&action=delete&id=<?php echo $order['id']; ?>" onclick="return confirm('Are you sure you want to delete this orders?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>