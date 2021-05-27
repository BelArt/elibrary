<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use App\Models\{Cases, Inventory, Funds};

class PageController extends Controller
{
    public function index()
    {

        $funds = Funds::orderBy('name', 'asc')->get();
        $inventories = Inventory::orderBy('name', 'asc')->get();
        $cases = Cases::orderBy('name', 'asc')->get();

        return view('page.index', ['funds' => $funds, 'inventories' => $inventories, 'cases' => $cases]);
    }

    public function find(Request $request)
    {

        $pages = Pages::with('fund', 'inventory', 'case')->take(10);

        if ($request->filled('name') && $request->get('name') != '') {
            $pages = $pages->where('number', 'like', $request->get('name') . '%')
                ->orWhere('name', 'like', $request->get('name') . '%');
        }

        if ($request->filled('fund') && $request->get('fund') != 0) {
            $pages = $pages->whereHas('fund', function($q) use ($request) {
                $q->where('id', $request->get('fund'));
            });
        }
        if ($request->filled('inventory') && $request->get('inventory') != 0) {
            $pages = $pages->whereHas('inventory', function($q) use ($request) {
                $q->where('id', $request->get('inventory'));
            });
        }
        if ($request->filled('case') && $request->get('case') != 0) {
            $pages = $pages->whereHas('case', function($q) use ($request) {
                $q->where('id', $request->get('case'));
            });
        }
        $pages = $pages->get();

        return response()->json([
            'html' => view('page.partials.items', ['pages' => $pages])->render()
        ]);
    }
}
