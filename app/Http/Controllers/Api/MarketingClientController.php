<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MarketingClient;
use Illuminate\Http\Request;

class MarketingClientController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cutomer_name' => 'required',
            'amount' => 'required',
            'description' => 'required',
        ]);

        $market = MarketingClient::create([
            'cutomer_name' => $request->get('cutomer_name'),
            'amount' => $request->get('amount'),
            'description' => $request->get('description'),
            'location_id' => $request->get('location_id'),
            'location_name' => $request->get('location_name'),
        ]);

        return response()->json($market, 201);
    }

    public function update(MarketingClient $marketingClient, Request $request)
    {
        $request->validate([
            'cutomer_name' => 'required',
            'amount' => 'required',
            'description' => 'required',
        ]);
        $marketingClient->update([
            'cutomer_name' => $request->get('cutomer_name'),
            'amount' => $request->get('amount'),
            'description' => $request->get('description'),
            'location_id' => $request->get('location_id'),
            'location_name' => $request->get('location_name'),
        ]);

        return response()->json(null, 204);
    }

    public function show(MarketingClient $marketingClient)
    {

        return $marketingClient->load('marketingClientDetails');
    }

    public function index()
    {
        return MarketingClient::all();
    }

    public function delete(MarketingClient $marketingClient)
    {

        $marketingClient->delete();

        return response()->json(null, 204);
    }


    public function createMarketingClientDetails(MarketingClient $marketingClient, Request $request)
    {
        $marketingClient->marketingClientDetails()->create([
            'date' => $request->get('date'),
            'payment_amount' => $request->get('payment_amount'),
            'description' => $request->get('description'),
        ]);

        return $marketingClient->load('marketingClientDetails');
    }
}
