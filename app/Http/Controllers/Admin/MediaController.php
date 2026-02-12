<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

                if ($request->hasFile('image')) {
                    $path = $request->file('image')->store('media', 'public');
                    
                    return response()->json([
                        'url' => '/storage/' . $path,
                    ]);
                }
        return response()->json(['error' => 'No image uploaded'], 400);
    }
}
