<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('index-backup');

        $disk = Storage::disk(config('backup.backup.destination.disks')[0]); // local
        $files = $disk->files(config('backup.backup.name')); // env('APP_NAME)


        $backups = [];  // .zip
        foreach ($files as $key => $file) {
            if (substr($file, -4) == '.zip' && $disk->exists($file)) {
                $file_name = str_replace(config("backup.backup.name") . '/', '', $file);
                $backups[] = [
                    'file_path' => $file,
                    'file_name' => $file_name,
                    'file_size' => $this->byteToHuman($disk->size($file)),
                    'created_at' => Carbon::parse($disk->lastModified($file))->diffForHumans(),
                    'download_link' => '#'
                ];
            }
        }
        //reverse the backups, so that latest one would come first
        $backups = array_reverse($backups);

        return view('admin.pages.backups.index', compact('backups'));
    }

    /*
    * Convert bytes to human readable
    * @param $bytes
    * @return string
    */
    private function byteToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
