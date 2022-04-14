<?php

namespace App\Http\Controllers;

use App\Models\CustomCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MoyasarController extends Controller
{
    protected $paymentService;


    public function thanks()
    {
      return view('pages.thanks');
    }


    public function pay(Request $request)
    {
      
      if($request->status=="failed")
      {
        Session::put('paymentdetails',$request->all());
        return redirect()->route('cart.index')->with('error','Sorry  An Error Occur');
      }
      elseif($request->status=="paid")
      {
        \Moyasar\Moyasar::setApiKey(env('MOYASAR_API_KEY'));
        $paymentService = new \Moyasar\Providers\PaymentService();      
        $payment = $paymentService->fetch($request->id);
   
        Session::put('paymentdetails',$request->all());
        CustomCart::clean();
        session()->forget('coupun');
         return redirect()->route('moyasar.thanks')->with('success',' Thank You  Soo Much For Buy Our Product');
      }
      
      

      
      // $request->validate([
      //   'cc-number'=>'required|numeric',
      //   'cc-exp'=>'required|date',
      //   'cc-csc'=>'required|numeric',
      //   'amount'=>'required|numeric',
      //   'ccname'=>'required',
      // ]);
    }
    public function index()
    {
      if(request()->status=="failed")
      {
        return redirect()->route('checkout.index')->with('error','Sorry  An Error Occur');
      }
      elseif(request()->status=="paid")
      {
        
        CustomCart::clean();
         return redirect()->route('moyasar.thanks')->with('success',' Thank You  Soo Much For Buy Our Product');
      }
  

    }

    public function allPayments()
    {
      $paymentService = new \Moyasar\Providers\PaymentService();
      // $payment = $paymentService->fetch('d732d272-9c3b-4ff2-9f00-8eacd79165b7');
      $allpayment = $paymentService->All();
      // d732d272-9c3b-4ff2-9f00-8eacd79165b7
     return Response()->json($allpayment);
    }
  }
