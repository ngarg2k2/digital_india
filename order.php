<?php
    if(isset($_POST['0']))
    {
        require 'db.php';
        $total_items = $_POST['order'];
        $total_items = (int)$total_items;
        $temp = $total_items-1;
        $total_orders = 0;
        $total_price = 0;
        while($temp>-1)
        {
            $total_orders += (int)$_POST[strval($temp)];
            $total_price += (int)$_POST[strval(10000+$temp)]*(int)$_POST[strval($temp)];
            $temp--;
        }
        echo file_get_contents("order.html");
        echo " <h2 style='
        display: flex;flex-direction: column;text-align: center;margin-top: 100px;font-size: 25px;'>Please upload your prescription</h2>
        <form action='ordering.php' method='post' style='display: flex;flex-direction: column;align-items: center; margin-top: 40px;'>
        <input type='file' style=' background-color: #c3cf21; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        opacity:0.5;
        font-size: 16px;' required >
        <div class='container' style='text-align: center;font-size: 25px;' >
            <input type='text'  name='orders'   value='$total_orders' hidden/>
            <input type='text' name='prices' value='$total_price' hidden/>
            <input type='submit' name='Pay' style=' background-color: #08c5e7; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;' id='Pay' value='Pay'>

            <input type='submit' name='Cancel' style=' background-color: #FF0000; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;' id='Cancel' value='Cancel'>
            
        </div>
        </form>";
        echo "<div class='container' style='text-align: center;font-size: 25px; margin-top: -3px;'>
            <h2 style='margin-top: 50px;'> Your Total Items are: $total_orders</h2>
                <h2> Your Total Cost is: $total_price</h2>
                </div>";
        
                $con->close();
    }
?>
