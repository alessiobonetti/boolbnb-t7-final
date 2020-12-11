@extends('layouts.admin')

@section('content')

<div class="bootstrap-select-wrapper">
    <label>Scegli l'Appartamento</label>
    <select title="Scegli una opzione">
        @foreach ($apartments as $apartment)
            <option >{{$apartment->title}}</option>
        @endforeach
    </select>

  </div>

<div class="container">

    <div class="form-check">
        @foreach ($coupons as $coupon)

        <input class="form-check-input" type="radio" name="{{ $coupon->id }}" id="exampleRadios2" value="option2">
        <label class="form-check-label" for="exampleRadios2">
            Prezzo: {{ $coupon->price }} € Durata visibiita: {{ $coupon-> duration}} minuti
        </label><br><br>
        @endforeach
    </div>

    <form id="payment-form" action="{{ route('admin.payment.make') }}" method="POST">
        @csrf
        @method('POST')
        <!-- Putting the empty container you plan to pass to
            `braintree.dropin.create` inside a form will make layout and flow
            easier to manage -->
        <div id="dropin-container"></div>
        <input type="submit" />
        <input type="hidden" id="nonce" name="payment_method_nonce" />
    </form>
</div>

<script type="text/javascript">
    // call braintree.dropin.create code here
</script>

</body>


<script src="https://js.braintreegateway.com/web/dropin/1.25.0/js/dropin.min.js"></script>

<script>
    // Step two: create a dropin instance using that container (or a string
    //   that functions as a query selector such as `#dropin-container`)
    braintree.dropin.create({
        container: document.getElementById('dropin-container'),
        authorization: "{{ $gateway }}",
        container: '#dropin-container'
    }, (error, dropinInstance) => {
        // Use `dropinInstance` here
        // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
        if (error) console.error(error);
        form.addEventListener('submit', event => {
            event.preventDefault();

            dropinInstance.requestPaymentMethod((error, payload) => {
                if (error) console.error(error);

                // Step four: when the user is ready to complete their
                //   transaction, use the dropinInstance to get a payment
                //   method nonce for the user's selected payment method, then add
                //   it a the hidden field before submitting the complete form to
                //   a server-side integration
                document.getElementById('nonce').value = payload.nonce;
                form.submit();
            });
        });

    });
</script>
@endsection
