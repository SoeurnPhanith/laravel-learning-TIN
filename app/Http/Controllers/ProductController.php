<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class ProductController extends Controller
{
    public function createProduct(Request $request)
    {
        try {

            // Validation it valid or not (boolean)
            $validatorProduct = Validator::make($request->all(), [
                'name' => 'required|string',
                'qty' => 'required',
                'price' => 'required',
                'description' => 'required|string'
            ]);

            // 400 - Bad Request
            if ($validatorProduct->fails()) {
                return response()->json([
                    'message' => 'Invalid input data',
                ], 400);
            }

            // Check duplicate name
            if (Product::where('name', $request->name)->exists()) {
                return response()->json([
                    'message' => 'Product name already exists'
                ], 409);
            }

            // Insert in to db
            $product = Product::create($validatorProduct->validated());

            return response()->json([
                'message' => 'Product created successfully',
                'data' => $product
            ], 201);
        } catch (Exception $e) {

            return response()->json([
                'message' => 'Server error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //method get
    public function showAll()
    {
        try {

            $products = Product::all();

            // Check if empty
            if ($products->isEmpty()) {
                return response()->json([
                    'message' => 'No products found'
                ], 404);
            }

            return response()->json([
                'message' => 'show Products successfully',
                'data' => $products
            ], 200);
        } catch (Exception $e) {

            return response()->json([
                'message' => 'Server error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
