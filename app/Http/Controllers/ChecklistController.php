<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
{
    public function index()
    {
        return Checklist::where('user_id', Auth::id())->get();
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string']);
        
        return Checklist::create([
            'title' => $request->title,
            'user_id' => Auth::id()
        ]);
    }

    public function destroy(Checklist $checklist)
    {
        $checklist->delete();
        return response()->json(['message' => 'Checklist deleted']);
    }
}

