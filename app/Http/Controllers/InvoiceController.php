<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\InvoiceItem;

class InvoiceController extends Controller
{
    public function index()
    {

        $invoices = Invoice::orderBy('created_at', 'desc')
                           ->paginate(0);

        return view('invoices.index', compact('invoices'));


    }

    public function create()
    {
        return view('invoices.create', compact('invoices'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'invoice_no'       => 'required|alpha_dash|unique:invoices',
            'client'           => 'required|max:255',
            'client_address'   => 'required|max:255',
            'invoice_date'     => 'required|date_format:y-m-d',
            'due_date'         => 'required|date_format:y-m-d',
            'title'            => 'required|max:255',
            'discount'         => 'required|numeric|min:0',
            'items.*.name'     => 'required|max:255',
            'items.*.price'    => 'required|numeric|min:0',
            'items.*.quantity' => 'required|integer|min:0',
        ]);
        $items=collect($request->items)->transform(function ($item){
            $item ['total']=$item['quantity'] * $item['price'];
            return new InvoiceItem($item);
               });
        if ($items->isEmpty()){
            return response()
                ->json([
                    'item_empty'=>['one or more product is required']

                ],422);
        }
    }


}
