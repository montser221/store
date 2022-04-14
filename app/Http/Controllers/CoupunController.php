<?php

namespace App\Http\Controllers;

use App\Models\Coupun;
use App\Models\CustomCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoupunController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
        [
            'coupun'=>'required'

        ]);

        if($validator->fails())
        {
            session()
            ->flash('error','Coupun Must Not Be Empty');
            return response()->json([
                'success',false,
                400
            ]);
            
        }

        // return $request->all();
        $coupun = Coupun::findByCode($request->coupun);
        // return response()->json($coupun);
        if (!$coupun) 
        {
            return redirect()
            ->route('checkout.index')
            ->withErrors('Invalid Coupun Code. Please Try Again');
            // session()
            // ->flash('error','Invalid Coupun Code. Please Try Again');
            // return response()->json('Invalid Coupun Code. Please Try Again',400);
        }

        // else
        // {
            session()->put('coupun',[
                'name'=>$coupun->code,
                'discount'=>$coupun->discount(CustomCart::total())
            ]);
        // }
        
        return redirect()->route('checkout.index')->with('success','Coupun Has Been Appleid!');
        
        // session()
        // ->flash('error','Coupun Has Been Appleid!');
        // return response()->json('Coupun Has Been Appleid!',200);
    }

    public function destroy()
    {
        session()->forget('coupun');
        return redirect()->route('checkout.index')->with('success','Coupun Has Been Removed!');
    }
}
