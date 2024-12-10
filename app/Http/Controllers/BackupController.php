<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{

    public function index()
    {
        // Get all files in the backup directory
        $backups = File::files(storage_path('app/backups'));

        // Extract the filenames and their last modified time from the SplFileInfo objects
        $backupFiles = array_map(function ($backup) {

            $filename = $backup->getFilename();

            $backupTime = $backup->getMTime();
            $formattedBackupTime = date('d/m/Y H:i:s', $backupTime);

            return [
                'filename' => $filename,
                'backup_time' => $formattedBackupTime
            ];
        }, $backups);

        // Pass the filenames and times to the view
        return view('Setting.backups.index', compact('backupFiles'));
    }


    // Show a specific backup for download
    public function show($filename)
    {
        $path = storage_path('app/backups/' . $filename);

        if (File::exists($path)) {
            return response()->download($path); // Trigger file download
        }

        return redirect()->route('backups.index')->with('error', 'Backup file not found.');
    }

    // Delete a specific backup
    public function destroy($filename)
    {
        $path = storage_path('app/backups/' . $filename);

        if (File::exists($path)) {
            File::delete($path); // Delete the backup file
            return redirect()->route('backups.index')->with('success', 'Backup deleted successfully.');
        }

        return redirect()->route('backups.index')->with('error', 'Backup file not found.');
    }

    // Manual Backup Method
    public function manualBackup()
    {
        // Run the backup command
        Artisan::call('backup:database');
        return redirect()->back()->with('success', 'Backup completed successfully.');
    }
}
