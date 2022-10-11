<!DOCTYPE html>
<html>

<head>
    <title>Fonepay Payment page</title>
</head>

<body>
    <form id="payment-form"  action="https://dev-merchantapi.fonepay.com/api/merchantRequest" method="POST">
        
        <input type="hidden" name="PID" value="{{ $fonepay['PID'] }}">
        <input type="hidden" name="MD" value="{{ $fonepay['MD'] }}">
        <input type="hidden" name="PRN" value="{{ $fonepay['PRN'] }}">
        <input type="hidden" name="AMT" value="{{ $fonepay['AMT'] }}">
        <input type="hidden" name="CRN" value="{{ $fonepay['CRN'] }}">
        <input type="hidden" name="DT" value="{{ $fonepay['DT'] }}">
        <input type="hidden" name="R1" value="{{ $fonepay['R1'] }}">
        <input type="hidden" name="R2" value="{{ $fonepay['R2'] }}">
        <input type="hidden" name="DV" value="{{ $fonepay['DV'] }}">
        <input type="hidden" name="RU" value="{{ $fonepay['RU'] }}">
      
        
        <input type="submit" value="click-to-pay">
    </form>

    <script type="text/javascript">
    function submitForm() {
        document.getElementById('payment-form').submit();
    }
    window.onload = submitForm;
</script>

</body>

</html>