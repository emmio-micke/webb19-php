<?php

require 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Order number</th>
            <th>Order value</th>
            <th>Customer</th>
            <th>Country</th>
            <th>Credit limit</th>
        </tr>
    </thead>
<?php

$countries = ['France', 'USA'];
$any_credit_countries = ['Japan'];

$creditLimit = 80000;

$in_countries = str_repeat('?,', count($countries) - 1) . '?';
$in_any_credit_countries = str_repeat('?,', count($any_credit_countries) - 1) . '?';

$statement = $pdo->prepare("SELECT o.orderNumber, c.customerName, c.country, SUM(od.quantityOrdered * od.priceEach) AS orderValue, c.creditLimit 
FROM orderdetails od
  JOIN orders o ON o.orderNumber = od.orderNumber
  JOIN customers c ON c.customerNumber = o.customerNumber
WHERE (c.country IN ($in_countries)
       AND c.creditLimit > ?)
  OR c.country IN ($in_any_credit_countries)
GROUP BY o.orderNumber
ORDER BY c.customerName");

$params = array_merge($countries, [$creditLimit], $any_credit_countries);

$statement->execute($params);

setlocale(LC_MONETARY, 'en_US');

while ($row = $statement->fetch()) :
    ?>
    <tr>
        <td><?php echo $row['orderNumber']; ?></td>
        <td>$<?php echo number_format($row['orderValue'], 0, '.', ','); ?></td>
        <td><?php echo $row['customerName']; ?></td>
        <td><?php echo $row['country']; ?></td>
        <td>$<?php echo number_format($row['creditLimit'], 0, '.', ','); ?></td>
    </tr>
<?php endwhile; ?>

</table>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>