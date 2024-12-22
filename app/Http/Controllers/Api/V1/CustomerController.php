<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\InfoCustomer;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreCustomerRequest;
use App\Http\Requests\V1\UpdateCustomerRequest;

use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use App\Filters\V1\CustomersFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new CustomersFilter();
        $filterItems = $filter->transform($request);

        $includesInvoices = $request->query('includeInvoices');
        // dd($includesInvoices);
        
        $customers = Customer::where($filterItems);

        if($includesInvoices) {
            $customers = $customers->with('invoices');
        }
            
        return new CustomerCollection($customers->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = new CustomerResource(Customer::create($request->all()));
        // dd($customer);
        InfoCustomer::dispatch($customer);
        return Response()->json(["created" => true]);
        return $customer;
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer, Request $request)
    {
        $includesInvoices = $request->query('includeInvoices');

        if($includesInvoices) {
            return new CustomerResource($customer->loadMissing("invoices"));
        }

        return new CustomerResource($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}