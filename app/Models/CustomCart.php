<?php

namespace App\Models;

use Illuminate\Support\Facades\Session;
use \ShoppingCart;
class CustomCart extends ShoppingCart
{

    private $clonedItems = [];
    private $itemKey = "clonedItems";

    function  __construct() 
    {

    }

    private function cloneCartItem($item)
    {
        if(is_object($item))
        {
            $obj = clone $item;
            return $obj;
        }
        
    }

    public function instance($cartItem)
    {
        //clone item in temporary variable
        $cloneditem = $this->cloneCartItem($cartItem);
        
        //get items from session 
        $itemsInsession = $this->getClonedItems();
        #check if cloned items and items in session not empty
        if(!empty($cloneditem) && !empty($itemsInsession))
        {

        }
            //check if cloned items array is not empty
            if(!empty($cloneditem))
                array_push($this->clonedItems,$cloneditem);
            
            $this->setSavedItemInSession();
           array_push($this->clonedItems,$itemsInsession);
            // else
                // array_push($this->clonedItems,$cloneditem);
                
            $this->setSavedItemInSession();
        
    }

    public function setSavedItemInSession()
    {
        Session::put($this->itemKey,$this->clonedItems);
    }

    public static function removeSavedLater()
    {
        Session::forget('clonedItems');
    }
    
    public  function getClonedItems()
    {
        $items = Session::get($this->itemKey);
        return $items;
    }

    public static function subtotal()
    {
        $dsicount = session()->has('coupun')?  session()->get('coupun')['discount'] : 0;
        return self::total() - $dsicount;
    }
}
