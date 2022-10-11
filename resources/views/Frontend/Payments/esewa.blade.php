<html>
<body>
<style>
    .not-redirected-btn {
        cursor: pointer;
        font-weight: 500;
        font-style: italic;
        border: none;
        background: none;
        color: #1a0dab;
    }
</style>
<p>Redirecting you to <strong>eSewa Payment System....</strong></p>

<form id="form-esewa-payment" action="{{ $paymentUrl }}" method="post">
    <input type="hidden" name="amt" value="{{ $totalPrice }}">
    <input type="hidden" name="txAmt" value="0">
    <input type="hidden" name="psc" value="0">
    <input type="hidden" name="pdc" value="0">
    <input type="hidden" name="tAmt" value="{{ $totalPrice }}">
    <input type="hidden" name="scd" value="{{ $productCode }}">
    <input type="hidden" name="pid" value="{{ $transactionRefID }}">
    <input type="hidden" name="su" value="{{ $successUrl }}">
    <input type="hidden" name="fu" value="{{ $failureUrl }}">
    <input class="not-redirected-btn" type="submit" name="esewa_payment" value="Click here if you are not redirected automatically..">
</form>

<script type="text/javascript">
    function submitForm() {
        document.getElementById('form-esewa-payment').submit();
    }
    window.onload = submitForm;
</script>
</body>
</html>