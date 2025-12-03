<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($event) ? 'Edit event' : 'Add event'; ?></h2>
<form action="index.php?entity=events&action=<?php echo isset($event) ? 'update&id=' . $event['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Name Event:</label>
        <input type="text" name="nama_event" value="<?php echo isset($event) ? $event['nama_event'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">lokasi:</label>
        <input type="Date" name="lokasi" value="<?php echo isset($event) ? $event['lokasi'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">lokasi:</label>
        <input type="Text" name="lokasi" value="<?php echo isset($event) ? $event['lokasi'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>