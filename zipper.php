<?php
$zip = new ZipArchive();
if ($zip->open('sisobatjarkom-backup.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('.'));
    foreach ($iterator as $file) {
        if (!$file->isDir()) {
            $path = $file->getPathname();
            $normalizedPath = str_replace('\\', '/', $path);
            
            // Skip unnecessary files
            if (strpos($normalizedPath, './node_modules') === 0 || 
                strpos($normalizedPath, './.git') === 0 || 
                strpos($normalizedPath, './.vscode') === 0 || 
                strpos($normalizedPath, './sisobatjarkom-backup.zip') === 0 ||
                strpos($normalizedPath, './zipper.php') === 0) {
                continue;
            }
            
            $zip->addFile($path, substr($normalizedPath, 2));
        }
    }
    $zip->close();
    echo "ZIP_CREATED_SUCCESSFULLY\n";
} else {
    echo "FAILED_TO_CREATE_ZIP\n";
}
