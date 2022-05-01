<!-- File: groceries-by-code.php.
 
    Read grocery data from groceries.txt
    as CSV data.  Display data with code
    entered in the textbox.
-->

<html>

<head>
<title>Groceries By Code Example</title>
<link rel="stylesheet" type="text/css" href="../styles.css" />
</head>

<body>

<h2>Groceries By Code Example</h2>

<form action="<?php echo "$_SERVER[PHP_SELF]"?>" method="POST">

<?php
    if (isset($_POST["txtCode"]))
    {
        $code = $_POST["txtCode"];
    }
    else
    {
        $code = "";
    }
?>

<p>
Enter Code:<br />
<input type="text" name="txtCode" size="15"
       value="<?php echo "$code";?>" />
</p>

<p>
<input type="submit" value="Show Grocery Items" />
</p>

<table border="1" cellpadding="5">
<tr> <th>Name</th> <th>Code</th> <th>Price</th> 
     <th>Quantity</th> <th>OnSale</th> </tr>

<?php
    $fin = fopen("groceries.txt", "rb");
    while($line = fgets($fin, 100))
    {
        $fields = explode(",", $line);
        if ($code == $fields[1] || $code == "")
        {
            echo "<tr>";
            foreach ($fields as $field)
            {
                echo "<td>{$field}</td>";
            }
            echo "</tr>\n";
        }
    }
?>

</table>
</form>

</body>
</html>
