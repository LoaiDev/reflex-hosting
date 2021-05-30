<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Reflex Hosting | Update Payment Method</title>
</head>
<body>
<div class="card">
    <div class="card-body">
        <form action="{{route('payment.update')}}" method="post" id="payment-form">
            @csrf
            <h1 class="text-primary text-lg-center">Edit Payment Method</h1>
            <div class="form-group">
                <label for="card-element"> Credit or debit card</label>
                <div id="card-element" class="form-control"></div>
                <div id="card-errors" role="alert" class="text-danger"></div>
            </div>
            <div class="form-group">
                <label for="CardHolderName">CardHolderName</label>
                <input type="text" name="CardHolderName" id="CardHolderName" class="form-control">
            </div>
        </form>
        <button id="submit-button" class="btn btn-primary">Submit Payment Method</button>
    </div>
</div>

<!--suppress VueDuplicateTag -->
<script src="https://js.stripe.com/v3/"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/cc487e3fc9.js" crossorigin="anonymous"></script>
<script>
    // Create a Stripe client.
    var stripe = Stripe('{{config('cashier.key')}}');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Create an instance of the card Element.
    var card = elements.create('card');


    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    var form = document.getElementById('payment-form');

    // var stripeIframe = document.getElementsByName('__privateStripeFrame5')[0];

    var displayError = document.getElementById('card-errors');

    var submitButton = $('#submit-button');

    // stripeIframe.onload = form.style.display = 'block';

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            submitButton.addClass('disabled');
            displayError.textContent = event.error.message;
        } else {
            submitButton.removeClass('disabled');
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    submitButton.click(async function () {
        submitButton.addClass('disabled');
        submitButton.html('<i class="fas fa-circle-notch fa-spin fa-lg px-5"></i>');
        const {setupIntent, error} = await stripe.confirmCardSetup('{{$intent->client_secret}}', {
            payment_method: {
                card: card,
                billing_details: {
                    name: $('#CardHolderName').val(),
                },
            },
        })

        if (error) {
            displayError.textContent = error.message;
            submitButton.removeClass('disabled');
            submitButton.html('Submit Payment Method');
        } else {
            stripeSetupIntentHandler(setupIntent);
        }

    });

    // Submit the form with the token ID.
    function stripeSetupIntentHandler(setupIntent) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', setupIntent.payment_method);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>
</body>
</html>
