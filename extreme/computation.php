<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
$customer_id = $_POST['customer_id'];
$customer_name = $_POST['customer_name'];
$order_id = $_POST['order_id'];
$product_name = $_POST['prduct_name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$payment_date = $_POST['payment_date'];
$payment_mode = $_POST['payment_mode'];

// Calculate total cost and tax
$total_cost = $price * $quantity;
$tax = $total_cost * 0.18;  // 18% tax
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <style>
        .heading {
            text-align: center;
        }
        .left {
            text-align: right;
        }
        .right {
            text-align: right; 
        }
        .both {
            display: flex;
            justify-content: center;
            font-family: Arial, sans-serif;
        }
        .but {
            display: inline;
            margin-left: 350px;
            padding-right: 20px;
        }
    </style>
</head>
<body>
<h1 class="heading">Customer Form</h1>
    <form action="" method="post">
        <div class="both">
            <div class="both">
                <div class="left">
                    <label for="customer_id">Customer ID</label>
                    <input type="number" name="customer_id" id="customer_id" value="<?php echo $customer_id; ?>" required>
                    <br><br>
                    <label for="customer_name">Customer Name</label>
                    <input type="text" name="customer_name" id="customer_name" value="<?php echo $customer_name; ?>" required>
                    <br><br>
                    <label for="order_id">Order ID</label>
                    <input type="number" name="order_id" id="order_id" value="<?php echo $order_id; ?>" required>
                    <br><br>
                    <label for="prduct_name">Product Name</label>
                    <input type="text" name="prduct_name" id="prduct_name" value="<?php echo $product_name; ?>" required>
                    <br><br>
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" value="<?php echo $price; ?>" required>
                </div>

                <div class="right">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" value="<?php echo $quantity; ?>" required>
                    <br><br>
                    <label for="total_cost">Total Cost</label>
                    <input type="text" name="total_cost" id="total_cost" value="<?php echo number_format($total_cost, 2); ?>" readonly>
                    <br><br>
                    <label for="tax">Tax (18%)</label>
                    <input type="text" name="tax" id="tax" value="<?php echo number_format($tax, 2); ?>" readonly>
                    <br><br>
                    <label for="payment_date">Payment Date</label>
                    <input type="date" name="payment_date" id="payment_date" value="<?php echo $payment_date; ?>" required>
                    <br><br>
                    <label for="payment_mode">Payment Mode</label>
                    <input type="text" name="payment_mode" id="payment_mode" value="<?php echo $payment_mode; ?>" required>
                </div>
            </div>
        </div>
        <br><br>
        <div class="but">
            <button type="submit">Submit</button>
            <button type="submit" name="submita">Submit</button>
            <button type="submit">Reset</button>
            <button type="submit">Cancel</button>
        </div>
        <br><br>
        <footer class="but">All rights Reserved by Management</footer>



    </form>
</body>
</html>
<?php  } ?>


