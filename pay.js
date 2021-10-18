// JavaScript source code

paypal.Buttons({
    
    style: {
        
        shape: 'pill'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '<?php echo $total; ?>'
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            window.location.replace("http://localhost/GeoStore/succes.php")
        })
    },
    onCancel: function (data) {
        window.location.replace("http://localhost/GeoStore/Oncancel.php")
    }
}).render('#paypal-payment-button');