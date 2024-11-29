<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Ready the permissions.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:customer-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:customer-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $customers = Customer::latest()->orderBy('name')->paginate(5);

        return view('customers.index', compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //  Validate
        request()->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|max:18|unique:customers,phone',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'string|max:255',
            'region' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:6'
        ]);

        //  Create customer record
        $customer = Customer::create($request->all());

        //  Create associated user
        $userData = $request->all();
        $userData['password'] = $customer->email;
        $user = User::create($userData);

        //  Update customer's user_id
        $customer->user_id = $user->id;
        $customer->save();

        //  Update user's password, customer_id, roles
        $user->password = $customer->email;
        $user->customer_id = $customer->id;
        $user->assignRole($request->input('roles'));
        $user->save();

        //  Redirect
        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @return View
     */
    public function show(Customer $customer): View
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return View
     */
    public function edit(Customer $customer): View
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Customer $customer
     * @return RedirectResponse
     */
    public function update(Request $request, Customer $customer): RedirectResponse
    {
        //  Validate
        request()->validate([
            'user_id' => 'required|integer',
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|unique:customers,phone,' . $customer->id,
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'string|max:255',
            'region' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:6'
        ]);

        //  Update customer record
        $customer->update($request->all());

        //  Update associated user record
        $customerUser = User::where('id', $request->input('user_id'))->firstOrFail();
        $customerUser->name = $request->input('name');
        $customerUser->surname = $request->input('surname');
        $customerUser->email = $request->input('email');
        $customerUser->update();

        //  Redirect
        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return RedirectResponse
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully.');
    }
}
