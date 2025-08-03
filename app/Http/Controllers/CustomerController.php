<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function customer_data()
    {
        $customer_data = User::all();
        return view('admin.customer_data', compact('customer_data'));
    }

    public function delete_customer($id)
    {
        $customer_data= User::find($id);
        $customer_data->delete();
        return redirect()->back()->with('message', 'Customer Removed Successfully');
    }

    public function create_users(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191|unique:users,email',
            'phone' => 'required|digits:10|unique:users,phone',
            'DOB' => 'required|date|date_format:Y-m-d|before:today',
            'gender' => 'required|string|max:191',
            'street' => 'required|string|max:191',
            'city' => 'required|string|max:191',
            'country' => 'required|string|max:191',
            'password' => 'required|string|min:8|max:191'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'Status' => 422,
                'Errors' => $validator->messages()
            ], 422);
        }

        $customer = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'DOB' => $request->DOB,
            'gender' => $request->gender,
            'street' => $request->street,
            'city' => $request->city,
            'country' => $request->country,
            'password' => bcrypt($request->password),
        ]);

        if ($customer) {
            return response()->json([
                'Status' => 200,
                'Message' => "Customer created successfully"
            ], 200);
        } else {
            return response()->json([
                'Status' => 500,
                'Message' => "Something went wrong!"
            ], 500);
        }
    }

    public function getCustomer($id)
    {
        $customer = User::find($id);
        if ($customer == null) {
            return response()->json([
                'status' => [
                    'code' => 500,
                    'message' => 'Customer not found'
                ]
            ]);
        } else {
            return response()->json([
                'status' => [
                    'code' => 200,
                    'message' => 'Success'
                ],
                'data' => [
                    'response' => $customer
                ]
            ]);
        }
    }

    public function deleteCustomer($id)
    {
        $customer = User::find($id);
        if ($customer == null) {
            return response()->json([
                'status' => [
                    'code' => 500,
                    'message' => 'Customer not found'
                ]
            ]);
        } else {
            $customer->delete();
            return response()->json([
                'status' => [
                    'code' => 200,
                    'message' => 'Customer deleted successfully'
                ]
            ]);
        }
    }


    public function updateCustomer(Request $request, int $id) {

        Log::info("Received update request for customer with ID: {$id}");

        $customer = User::find($id);

        if (!$customer) {
            Log::warning("No customer found with ID: {$id}");
            return response()->json([
                'Status' => 404,
                'Message' => "No Such Customer Found!"
            ], 404);
        }
        Log::info("Customer found: ", $customer->toArray());
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:191',
            'email' => 'sometimes|email|max:191|unique:users,email,' . $id,
            'phone' => 'sometimes|digits:10|unique:users,phone,' . $id,
            'address' => 'sometimes|string|max:191',
            'dob' => 'sometimes|date|date_format:Y-m-d|before:today',
            'gender' => 'sometimes|string|max:191',
            'password' => 'sometimes|string|min:8|max:191',
        ]);

        if ($validator->fails()) {
            Log::warning("Validation failed for customer with ID: {$id}", $validator->messages()->toArray());
            return response()->json([
                'Status' => 422,
                'Errors' => $validator->messages()
            ], 422);
        }
        $data = $request->only(['name', 'email', 'phone', 'address', 'dob', 'gender', 'password']);

        if (isset($data['password'])) {
            Log::info("Password will be updated for customer with ID: {$id}");
            $data['password'] = bcrypt($data['password']);
        }
        Log::info("Updating customer with data: ", $data);
        $customer->update($data);
        Log::info("Customer with ID: {$id} updated successfully");

        return response()->json([
            'Status' => 200,
            'Message' => "Customer updated successfully"
        ], 200);
    }
}
