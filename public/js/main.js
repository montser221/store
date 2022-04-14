
let quantity = document.querySelector('#quantity');
let qty = document.querySelector('#qty');
let addtocard = document.querySelector('#addtocard');
let removeFromCartBtn = document.querySelector('#removeFromCartBtn');
let clearallcart = document.querySelector('#clearallcart');

// let c = confirm("are you sure?");
// if(c)
// {}
if(clearallcart)
{
    clearallcart.addEventListener('click',()=>{
        swal({
            title:"Remove alert",
            text: "All Item Is Removed From Cart Successfuly",
            icon:"error",
            buttons: false,
            dangerMode: false,
            timer: 5000,
        });
    });
}

if(removeFromCartBtn)
{
    removeFromCartBtn.addEventListener('click',()=>{
        swal({
            title:"Remove alert",
            text: "The Item Is Removed From Cart Successfuly",
            icon:"error",
            buttons: false,
            dangerMode: false,
            timer: 5000,
        });
    });
}

if(addtocard)
{
    addtocard.addEventListener('click',()=>{
        
        swal({
            title:"Added alert",
            text: "The  Item is Added To Cart Successfly",
            icon:"success",
            buttons: true,
            dangerMode: false,
            timer: 10000,
            
        });

    });
}

if(quantity)
{
    quantity.addEventListener('change',function()
    {
        qty.value = quantity.value;
    });
}


//     Moyasar.init({
//       // Required
//       // Specify where to render the form
//       // Can be a valid CSS selector and a reference to a DOM element
//       element: '.mysr-form',
  
//       // Required
//       // Amount in the smallest currency unit
//       // For example:
//       // 10 SAR = 10 * 100 Halalas
//       // 10 KWD = 10 * 1000 Fils
//       // 10 JPY = 10 JPY (Japanese Yen does not have fractions)
//       amount: 1000,
  
//       // Required
//       // Currency of the payment transation
//       currency: 'SAR',
  
//       // Required
//       // A small description of the current payment process
//       description: 'Coffee Order #1',
  
//       // Required
//       publishable_api_key: 'pk_test_q897gmeomqdUWMyFwaSFyYztd8z5i1yV3mJhye9r',
  
//       // Required
//       // This URL is used to redirect the user when payment process has completed
//       // Payment can be either a success or a failure, which you need to verify on you system (We will show this in a couple of lines)
//       callback_url: 'https://moyasar.com/thanks',
  
//       // Optional
//       // Required payments methods
//       // Default: ['creditcard', 'applepay', 'stcpay']
//       methods: [
//           'creditcard',
//       ],
//   });

    // function fade(element) 
    // {
    //     var op = 1;  // initial opacity
    //     var timer = setInterval(function () {
    //         if (op <= 0.1){
    //             clearInterval(timer);
    //             element.style.display = 'none';
    //         }
    //         element.style.opacity = op;
    //         element.style.filter = 'alpha(opacity=' + op * 100 + ")";
    //         op -= op * 0.1;
    //     }, 300);
    // }


    const __alert = document.querySelector(".alert");

    function fade(element) 
    {
        var op = 1;  // initial opacity
        var timer = setInterval(function () {
            if (op <= 0.1){
                clearInterval(timer);
                element.style.display = 'none';
            }
            element.style.transtion = '0.5s ease-in-out';
            element.style.opacity = op;
            element.style.filter = 'alpha(opacity=' + op * 100 + ")";
            op -= op * 0.1;
        }, 300);
    }

    if(__alert) 
    {
        fade(__alert)  
        // console.log(__alert);
    }