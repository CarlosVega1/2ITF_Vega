<!DOCTYPE html>
<html>
<head>
    <title>Tax Calculator</title>
</head>
<body>
    <?php
        if (isset($_POST["submit"])) {
            $salary = floatval($_POST["salary"]);
            $type = $_POST["type"];
            
            $estimated_annual_salary = 0;
            if ($type == "monthly") {
                $estimated_annual_salary = $salary * 12;
            } elseif ($type == "bi-monthly") {
                $estimated_annual_salary = $salary * 24;
            }
            
            $tax_rate = .3;
            $year_to_date_tax = $estimated_annual_salary * $tax_rate;
            $monthly_tax = $year_to_date_tax / 12;
            ?>
            <h2>Results</h2>
            <p>Estimated Annual Salary: ₱<?php echo $estimated_annual_salary; ?></p>
            <p>Year-to-Date Tax: ₱<?php echo $year_to_date_tax; ?></p>
            <p>Monthly Tax: ₱<?php echo $monthly_tax; ?></p>
            <?php
        } else {
    ?>
    <h2>Tax Calculator</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <p>
            <label for="salary">Salary(₱):</label>
            <input type="text" name="salary" id="salary" required>
        </p>
        <p>
            <label for="type">Type of Salary:</label>
            <select name="type" id="type" required>
                <option value="monthly">Monthly</option>
                <option value="bi-monthly">Bi-monthly</option>
            </select>
        </p>
        <p>
            <input type="submit" name="submit" value="Submit">
        </p>
    </form>
    <?php
        }
    ?>
</body>
</html>
