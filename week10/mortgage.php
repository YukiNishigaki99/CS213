<?php
    //  This function reads the form "query string"
    //
    // This function handles both an http "get".
    $field1 = $_GET['apr'];
    $field2 = $_GET['term'];
    $field3 = $_GET['amount'];

    function doPayment() {
        // Get the value of the input field.
        $apr = $GLOBALS["field1"];
        $years = $GLOBALS["field2"];
        $principal = $GLOBALS["field3"];
        $annualRate = $apr / 100;
        $paymentsPerYear = 12;

        // Call the function.
        $GLOBALS["payment"] = computePayment($principal, $annualRate, $years, $paymentsPerYear);
    }

    function computePayment($principal, $annualRate, $years, $periodsPerYear) {
        $r = $annualRate / $periodsPerYear;
        $n = $periodsPerYear * $years;
        $payment = ($principal * $r) / (1 - pow(1 + $r, -$n));
        return $payment;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is an assignment of week 10. 
        This assignment gives me experience in making a HTML page which makes requests to execute a PHP program.">
    <link rel="stylesheet" href="assign10.css">
    <title>W10 Assignment - Yuki Nishigaki</title>
</head>
<body>
    <header>
        <h1>Part1: PHP</h1>
    </header>
    <h3>The values of the form elements are: <br />
        <?php
            print "APR: $field1<br />";
            print "Term: $field2<br />";
            print "Amount: $field3<br />";
            print "Monthly Payment: $payment<br>"
        ?>
    </h3>

    <h3>Prints query string for-each</h3>

    <?php
        $keys = array_keys($_GET);  # returns a array of the key values of $_GET array

        # print each key and value
        foreach ($keys as $key)
        {
            print "$key = $_GET[$key] <br />";
        }

        echo "<br />";

/* Input: APR (Annual Percentage Rate), loan term (in years) and loan amount (in dollars)
 * Processing: Compute the monthly payment
 * Output: the monthly payment

function doPayment() {
    // Get the value of the input field.
    let annualRate = parseFloat(document.getElementById('apr').value);
    let numberOfYears = parseFloat(document.getElementById('term').value);
    let principal = parseFloat(document.getElementById('amount').value);
    annualRate /= 100
    let paymentsPerYear = 12

    // Call the function.
    let payment = computePayment(principal, annualRate, numberOfYears, paymentsPerYear);

    // Display a result to the page.
    document.getElementById('payment').innerHTML = `Monthly Payment: $${payment.toFixed(2)}`;
}

// Mortage calculating function.
function computePayment(principal, annualRate, years, periodsPerYear) {
    let r = annualRate / periodsPerYear;
    let n = periodsPerYear * years;
    let payment = (principal * r) / (1 - Math.pow(1 + r, -n));
    return payment;
} 
*/
    ?>


</body>
<footer>
    <p class="copyright">&copy; 2021 yukinishigaki </p>
</footer>
</html>