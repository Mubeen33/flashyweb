<form action="https://sandbox.payfast.co.za/eng/process" method="POST" id="form_payment">
<input type="hidden" name="merchant_id" value="10020123">
<input type="hidden" name="merchant_key" value="974nwyh4muqxs">
<input type="hidden" name="return_url" value="{{ Route('cart.order-success', $orderID  ) }}">
{{-- <input type="hidden" name="cancel_url" value="http://flashybuy.com/cancel.php"> --}}
{{-- <input type="hidden" name="notify_url" value="http://flashybuy.com/notify.php"> --}}

<input type="hidden" name="name_first" value="{{ $first_name }}">
<input type="hidden" name="email_address" value="{{ $customeremail }}">

<input type="hidden" name="m_payment_id" value="{{ $orderID }}">
<input type="hidden" name="amount" value="{{ $grandTotal}}">
<input type="hidden" name="item_name" value="Order by {{ $first_name }} {{ $orderID }}">
<input type="hidden" name="item_description" value="Order by {{ $first_name }} , for {{ $orderID }} ">


<input type="hidden" name="email_confirmation" value="1">
<input type="hidden" name="confirmation_address" value="{{ $customeremail }}">


<input type="hidden" name="payment_method" value="{{ $payment_option }}">


</form>

<script>
	  document.getElementById("form_payment").submit();  
</script>