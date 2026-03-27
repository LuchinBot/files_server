<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
            'folder' => 'required|string'
        ]);

        /*
    |-----------------------------------
    | Carpetas permitidas
    |-----------------------------------
    */
        $allowedFolders = [
            'persons',
            'inscriptions',
            'signatures',
            'documents',
            'carnets',
            'schools',
        ];

        if (!in_array($request->folder, $allowedFolders)) {
            return response()->json([
                'success' => false,
                'message' => 'Folder no permitido'
            ], 403);
        }

        $file = $request->file('file');

        $filename =
            time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs(
            $request->folder,
            $filename,
            'public'
        );

        return response()->json([
            'success' => true,
            'path' => $path,
            'url'  => asset('storage/' . $path)
        ]);
    }



    public function delete(Request $request)
    {
        $request->validate([
            'path' => 'required|string'
        ]);

        $path = $request->path;

        if (Storage::disk('public')->exists($path)) {

            Storage::disk('public')->delete($path);

            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Archivo no existe'
        ], 404);
    }
}
