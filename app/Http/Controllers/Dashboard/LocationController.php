<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Location\LocationRepositoryInterface;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Location\storeRequest;
use App\Models\Location;

class LocationController extends Controller
{
    protected $locationInterface;

    public function __construct(LocationRepositoryInterface $locationRepositoryInterface)
    {
        $this->locationInterface = $locationRepositoryInterface;
    }
    public function create()
    {
        $customers = Customer::query()->select('id', 'name')->get();
        $products = Product::query()->select('id', 'name')->get();
        return view('dashboard.locations.create', [
            'customers' => $customers,
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'contract_price' => 'required',
            'description' => 'required',
            'received_date' => 'required|date',
            'delivery_date' => 'required|date',
            'payment_details' => 'required',
            'products' => 'required'
            
        ], [
            'contract_price.required' => 'يجب أدخال قيمة العقد',
            'description.required' => 'يجب أدخال وصف الموقع',
            'received_date.required' => 'يجب أدخال تاريخ الاستلام',
            'delivery_date.required' => 'يجب أدخال تاريخ التسليم',
             'payment_details.required' => 'يجب أدخال تفاصيل الدفعات',
             'products.required' => 'يجب أدخال المنتجات'

        ]);

        $data = $request->all();

        $data['products'] = json_decode($request->products, true);
        $data['payment_details'] = json_decode($request->payment_details, true);
        // dd($data);
        $location =  $this->locationInterface->create($data);

        return redirect()->route('locations.index')->with('success', 'تم أضافة البيانات بنجاح');
    }

    public function index()
    {
        $locations =Location::with('products', 'paymentDetails', 'customer')->paginate(10);

        return view('dashboard.locations.index', [
            'locations' => $locations,
        ]);
    }

    public function details(Location $location)
    {
        $location = $location->load('products', 'paymentDetails');
        return view('dashboard.locations.details', compact('location'));
    }
}
