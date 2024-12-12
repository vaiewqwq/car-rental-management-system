$(document).ready(function () {

    $('.razPayBTn').click(function (e) { 
        e.preventDefault();
        
        $.ajax({
            method: "POST",
            url: "order-create.php",
            data: {
                'razorpay_btn': true
            },
            success: function (response) {
                // console.log(response);
                jsonResponse = JSON.parse(response);

                var options = {
                    "key": "rzp_test_bIWLpl8yJY5O9Q", // Enter the Key ID generated from the Dashboard
                    "amount": (jsonResponse.total_amount), // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                    "currency": "INR",
                    "name": "Car Rental", //your business name
                    "description": "Thank you for renting car from us",
                    "image": "https://www.fundacodester.com/frontend/images/logo.png",
                    "order_id": jsonResponse.order_id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                    "handler": function (response){
                        // alert(response.razorpay_payment_id);

                        $.ajax({
                            method: "POST",
                            url: "order-create.php",
                            data: {
                                'payment_success': true,
                                'payment_mode': 'Paid By Razorpay',
                                'payment_id': response.razorpay_payment_id
                            },
                            success: function (response) {
                                jsonNewResponse = JSON.parse(response);

                                if(jsonNewResponse.status == 200){
                                    // alert(jsonNewResponse.message);
                                    window.location.href = 'my-bookings.php';
                                }else if(jsonNewResponse.status == 500){
                                    alert(jsonNewResponse.message);
                                }else{
                                    alert("Something went wrong");
                                }
                            }
                        });

                    },
                    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information, especially their phone number
                        "name": jsonResponse.username, //your customer's name
                        "email": jsonResponse.username, 
                        "contact": jsonResponse.username  //Provide the customer's phone number for better conversion rates 
                    },
                    "theme": {
                        "color": "#3399cc"
                    }
                };      
                
                var rzp1 = new Razorpay(options);
                rzp1.on('payment.failed', function (response){
                        alert(response.error.code);
                        alert(response.error.description);
                        alert(response.error.source);
                        alert(response.error.step);
                        alert(response.error.reason);
                        alert(response.error.metadata.order_id);
                        alert(response.error.metadata.payment_id);
                });
                
                rzp1.open();

            }
        });
        
       
      
        // document.getElementById('rzp-button1').onclick = function(e){
        //     rzp1.open();
        //     e.preventDefault();
        // }

    });
    
});