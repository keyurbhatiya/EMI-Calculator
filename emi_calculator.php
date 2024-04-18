<!DOCTYPE html>
<html>
<head>
    <title>EMI Calculator</title>
    <style>
        table {
            font-size: 2rem;
        }
        input {
            font-size: 1rem;
        }
    </style>
</head>
<body bgcolor="#dddddd">
    <br><br><br>
    <form name="emi" method="POST" action="">
        <table align="center" width="60%" bgcolor="#ddffdd" border="1">
            <tr><td colspan="2" align="center">EMI Calculator</td></tr>
            <tr><td width="40%">Loan Amount</td><td width="60%"><input type="text" name="text1" id="text1" value=""></td></tr>
            <tr><td>Rate of Interest</td><td><input type="text" name="text2" id="text2" value=""></td></tr>
            <tr><td>Period in months</td><td><input type="text" name="text3" id="text3" value=""></td></tr>
            <tr><td></td><td><input type="submit" name="Calculate" value="Calculate"></td></tr>
        </table>
    </form>
    <br><br><br>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $amount = $_POST["text1"];
        $int    = $_POST["text2"];
        $time   = $_POST["text3"];
        $int1 = $int;

        $int= $int/1200;
        $emi=$amount * $int * (pow((1+$int),$time) / (pow((1+$int),$time) -1));
        $emi = round($emi,2);
        
        print("<table align=center width=60% bgcolor=#ddffdd border=1>");
        print("<tr><td width=40%>EMI Amount</td><td width=60%>".$emi. "</td> </tr>");
        print("<tr><td width=40%>Interest</td><td width=60%>".$int1. "</td> </tr>");
        print("<tr><td width=40%>Period in Months</td><td width=60%>".$time. "</td> </tr>");
        print("<tr><td width=40%>Total Amount</td><td width=60%>".$emi * $time. "</td> </tr>");
        print("<tr><td width=40%>Total Interest</td><td width=60%>".($emi * $time) - $amount. "</td> </tr>");
        print("</table>");
    }
    ?>
</body>
</html>
