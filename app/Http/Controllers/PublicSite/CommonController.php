<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Cases, Funds};

class CommonController extends Controller
{
    public function index($id = null)
    {
        if ($id)
            $fund = Funds::findOrFail($id);
        else
            $fund = Funds::first();

        $cases = Cases::where('fund_id', $fund->id)->orderBy('number', 'asc')->take(20)->get();

        return view('public.cases.index', compact('cases', 'fund'));
    }


    private function find(Request $request)
    {

    }

    public function show($id)
    {
        $case = Cases::findOrFail($id);

        return view('public.page.index', compact('case'));
    }

    public function funds()
    {
        $funds = Funds::orderBy('name', 'asc')->orderBy('number', 'asc')->get();

        return view('public.funds.index', compact('funds'));
    }

    public function fundSearch(Request $request)
    {
        return Funds::where('name', 'like', $request->get('text') . '%')
                ->orWhere('number', 'like', $request->get('text') . '%')
                ->get();
    }
    public function caseSearch(Request $request)
    {
        return Cases::where(function($q) use ($request) {
            $q->where('name', 'like', $request->get('text') . '%')
                ->orWhere('number', 'like', $request->get('text') . '%');
            })
            ->where('fund_id', $request->get('id'))
            ->get();
    }

    public function formSearch(Request $request)
    {
        $cases = Cases::where(function($q) use ($request) {
                if ($request->filled('year') && $request->get('year') != '') {
                    $q->where('year', 'like', $request->get('year') . '%');
                }

                if ($request->filled('inventory') && $request->get('inventory') != '') {
                    $q->whereHas('inventory', function($i) use ($request) {
                        $i->where('name', 'like', $request->get('inventory') . '%')
                            ->orWhere('number', 'like', $request->get('inventory') . '%');
                    });
                }
            })
            ->where('fund_id', $request->get('id'))
            ->get();
        return response()->json([
            'html' => view('public.cases.parts.items', ['cases' => $cases])->render()
        ]);
    }
}
