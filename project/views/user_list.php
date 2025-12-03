<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar user</h2>
<a href="index.php?entity=users&action=add" class="">Add users</a>
<table class="w-full border">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>    
    </tr>
    <?php foreach ($userList as $user): ?>
        <tr>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($user['nama']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($user['email']); ?></td>
            <td class="border px-4 py-2">
                <a href="index.php?entity=users&action=edit&id=<?php echo $user['id']; ?>">Edit</a>
                |
                <a href="index.php?entity=users&action=delete&id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this users?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>