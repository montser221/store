(function(){
  Moyasar.init({
    // Required
    // Specify where to render the form
    // Can be a valid CSS selector and a reference to a DOM element
    element: '#payment-form',

    // Required
    // Amount in the smallest currency unit
    // For example:
    // 10 SAR = 10 * 100 Halalas
    // 10 KWD = 10 * 1000 Fils
    // 10 JPY = 10 JPY (Japanese Yen does not have fractions)
    amount: 1000,

    // Required
    // Currency of the payment transation
    currency: 'SAR',

    // Required
    // A small description of the current payment process
    description: 'Coffee Order #1',

    // Required
    publishable_api_key: 'sk_test_NJLBEMYeYCvLtk12atUUmjbusfGmGAKXCCcb8bxa',

    // Required
    // This URL is used to redirect the user when payment process has completed
    // Payment can be either a success or a failure, which you need to verify on you system (We will show this in a couple of lines)
    callback_url: 'https://moyasar.com/thanks',

    // Optional
    // Required payments methods
    // Default: ['creditcard', 'applepay', 'stcpay']
    methods: [
        'creditcard',
    ],
});
});