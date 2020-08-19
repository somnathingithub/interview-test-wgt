<?php

namespace App\Http\Controllers;

use App\Items_model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class Items_controller extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data['page_title'] = 'Items Add';
        return view('items_add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'status' => 'required',
            'stock' => 'required',
            'expired_date' => 'required'
        ],
            [
                'name.required' => 'Item Name is required'
            ]);

        $input = $input = $request->all();
        $input['expired_date'] = date('Y-m-d', strtotime($input['expired_date']));
        Items_model::create($input);

        return redirect('items')->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Items_model $items
     * @return Response
     */
    public function show(Items_model $items)
    {
        $page_title = 'Items Edit';

        return view('items_edit', compact('items', 'page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'status' => 'required',
            'stock' => 'required',
            'expired_date' => 'required'
        ],
            [
                'name.required' => 'Item Name is required'
            ]);

        $items = Items_model::find($id);

        $items->name = $request->get('name');
        $items->status = $request->get('status');
        $items->stock = $request->get('stock');
        $items->expired_date = date('Y-m-d', strtotime($request->get('expired_date')));

        $items->update();

        return redirect('items')->with('success', 'Item updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Items_model $items
     * @return Response
     */
    public function destroy(Items_model $items)
    {
        $items->delete();
        return redirect('items')->with('success', 'Item deleted successfully');
    }

    public function filter(Request $request)
    {
        $items = Items_model::where('status', true);

        if ($request->filled('search_value')) {
            //$items->where('name', $request->search_value);

            $items->where('name', 'like', '%'.$request->search_value.'%');

            $data['search_value'] = $request->search_value;
        }

        if ($request->filled('from_date')) {
            $items->where('expired_date','>=', $request->from_date);
            $data['from_date'] = $request->from_date;
        }

        if ($request->filled('to_date')) {
            $items->where('expired_date','<=', $request->to_date);
            $data['to_date'] = $request->to_date;
        }

        $data['items'] = $items->get();

        $data['page_title'] = 'Search Items';

        return view('dashboard', $data);
    }
}
