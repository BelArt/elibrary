<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveFundRequest;
use App\Models\Funds;
use http\Env\Response;
use Illuminate\Http\Request;

class FundController extends Controller
{
    public function index()
    {
        return view('fund.index');
    }

    public function find(Request $request)
    {
        $funds = Funds::take(10);

        if ($request->filled('name') && $request->get('name') != '') {
            $funds = $funds->where('number', 'like', $request->get('name') . '%')
                ->orWhere('name', 'like', $request->get('name') . '%');
        }
        $funds = $funds->get();

        return response()->json([
            'html' => view('fund.partials.items', ['funds' => $funds])->render()
        ]);
    }

    public function edit($id)
    {
        $fund = Funds::findOrFail($id);

        return response()->json([
            'html' => view('fund.partials.edit', ['fund' => $fund])->render()
        ]);
    }

    public function save(SaveFundRequest $request)
    {
        try {
            $fund = Funds::findOrFail($request->get('id'));
            $fund->setName($request->get('name'));
            $fund->setDescription($request->get('description'));
            $fund->setNumber($request->get('number'));
            $fund->save();

            return response()->json([
                'message' => 'Данные фонда обновлены'
            ]);

        } catch (\Exception $e) {
            return response()->json([$e->getMessage()]);
        }
    }
}
