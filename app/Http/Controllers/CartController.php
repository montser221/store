<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomCart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public $row;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CustomCart::associate('App\Models\Product');
        $row = CustomCart::add(
                $request->id,
                $request->name,
                $request->qty,
                $request->price , 
                [
                    'details' => $request->details, 
                    'description' => $request->description,
                    'slug'=>$request->slug]
                );
                return redirect()->route('cart.index')->with('success','The  Item [ '.$request->name . ' ] is Added To Cart Successfly');
    }


    /**
     * Save For Later 
     */
    public function saveForLater($id)
    {   
       $item = CustomCart::get($id);
       CustomCart::remove($id);
       $cart = new CustomCart();
       $cart->instance($item);
       return redirect()->route('cart.index')->with("success","Item Is Saved For Later");

    }

    public function savedItems()
    {
        $cart = new CustomCart();
        return $cart->getClonedItems();
    }

    //clear the cart
    public function clearfromsavedlater()
    {
        CustomCart::removeSavedLater();
        return redirect()->route('cart.index')->with('success','All Items Are Removed From Saved Later Cart Successfuly');
    }

    //clear the cart
    public function clear()
    {
        CustomCart::clean();
        return redirect()->route('cart.index')->with('success','All Items Are Removed From Cart Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'quantity'=>'required|numeric|min:1|max:5'

        ]);

        if($validator->fails())
        {
            session()
            ->flash('errors','Quantity Must Be Between 1,5');
            return response()->json([
                'success',false,
                400
            ]);
            
        }

        CustomCart::update($id,$request->quantity);
        session()
        ->flash('success','Quantity Was Updated Successfuly The New Quantity is:'.$request->quantity);
        return response()->json([
            'success',true,
        ]);
        // return redirect()->route('cart.index')->with('success','Quantity Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CustomCart::remove($id);
        return redirect()->route('cart.index')->with('success',"The Product is Removed From Cart Successfly " );
    }
}
