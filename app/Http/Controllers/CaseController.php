<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCaseRequest;
use Illuminate\Http\Request;
use App\Models\{Cases, Inventory, Funds};

class CaseController extends Controller
{
    public function index()
    {
        $funds = Funds::orderBy('name', 'asc')->get();
        $inventories = Inventory::orderBy('name', 'asc')->get();

        return view('case.index', ['funds' => $funds, 'inventories' => $inventories]);
    }

    public function find(Request $request)
    {
        $cases = Cases::with('fund', 'inventory')->take(10);

        if ($request->filled('name') && $request->get('name') != '') {
            $cases = $cases->where('number', 'like', $request->get('name') . '%')
                ->orWhere('name', 'like', $request->get('name') . '%');
        }

        if ($request->filled('fund') && $request->get('fund') != 0) {
            $cases = $cases->whereHas('fund', function($q) use ($request) {
                $q->where('id', $request->get('fund'));
            });
        }
        if ($request->filled('inventory') && $request->get('inventory') != 0) {
            $cases = $cases->whereHas('inventory', function($q) use ($request) {
                $q->where('id', $request->get('inventory'));
            });
        }
        $cases = $cases->get();

        return response()->json([
            'html' => view('case.partials.items', ['cases' => $cases])->render()
        ]);
    }

    public function edit($id)
    {
        $case = Cases::findOrFail($id);

        return response()->json([
            'html' => view('case.partials.edit', ['case' => $case])->render()
        ]);
    }

    public function save(SaveCaseRequest $request)
    {
        try {
            $case = Cases::findOrFail($request->get('id'));
            $case->setNumber($request->get('number'));
            $case->setName($request->get('name'));
            $case->setDescription($request->get('description'));
            $case->setYear($request->get('year'));
            $case->save();

            return response()->json([
                'message' => 'Данные дела обновлены'
            ]);

        } catch (\Exception $e) {
            return response()->json([$e->getMessage()]);
        }
    }
}
