<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveInventoryRequest;
use App\Models\{Inventory, Funds};
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $funds = Funds::orderBy('name', 'asc')->get();
        return view('inventory.index', ['funds' => $funds]);
    }

    public function find(Request $request)
    {
        $inventories = Inventory::with('fund')->take(10);

        if ($request->filled('name') && $request->get('name') != '') {
            $inventories = $inventories->where('number', 'like', $request->get('name') . '%')
                ->orWhere('name', 'like', $request->get('name') . '%');
        }

        if ($request->filled('fund') && $request->get('fund') != 0) {
            $inventories = $inventories->whereHas('fund', function($q) use ($request) {
                $q->where('id', $request->get('fund'));
            });
        }
        $inventories = $inventories->get();

        return response()->json([
            'html' => view('inventory.partials.items', ['inventories' => $inventories])->render()
        ]);
    }

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);

        return response()->json([
            'html' => view('inventory.partials.edit', ['inventory' => $inventory])->render()
        ]);
    }

    public function save(SaveInventoryRequest $request)
    {
        try {
            $inventory = Inventory::findOrFail($request->get('id'));
            $inventory->setName($request->get('name'));
            $inventory->setDescription($request->get('description'));
            $inventory->save();

            return response()->json([
                'message' => 'Данные описи обновлены'
            ]);

        } catch (\Exception $e) {
            return response()->json([$e->getMessage()]);
        }
    }
}
