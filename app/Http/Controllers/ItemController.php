<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'checklist_id' => 'required|exists:checklists,id'
        ]);

        return Item::create($request->all());
    }

    public function update(Item $item, Request $request)
    {
        $item->update($request->only(['name', 'completed']));
        return $item;
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return response()->json(['message' => 'Item deleted']);
    }
}
