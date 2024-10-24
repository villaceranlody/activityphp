<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Smartphone Information</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: white;
        }

        
        body {
            background-color: white;
        }

        
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        
        input[type="button"] {
            background-color: pink;
            border: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        
        input[type="button"]:hover {
            background-color: #ff7b9c; 
        }
    </style>
</head>
<body>

<center><h2>Submitted Smartphone Information</h2></center>

<table>
    <tr>
        <th>Brand</th>
        <th>Model</th>
        <th>Storage</th>
        <th>Price</th>
    </tr>

    <?php
    
    $xmlFilePath = 'smartphones.xml';

    
    if (file_exists($xmlFilePath)) {
       
        $xml = simplexml_load_file($xmlFilePath);

        
        foreach ($xml->phone as $phone) {
            $brand = $phone->brand;
            $model = $phone->model;
            $storage = $phone->storage;
            $price = $phone->price;

            echo "<tr>";
            echo "<td>$brand</td>";
            echo "<td>$model</td>";
            echo "<td>$storage</td>";
            echo "<td>$price</td>";
            echo "</tr>";
        }
    } else {
        echo "XML file not found.";
    }
    ?>
</table>


<div class="button-container">
    
    <input type="button" value="Add More" onclick="redirectToPhoneHTML()">
</div>

<script>
    function redirectToPhoneHTML() {
        window.location.href = "phone.html";
    }
</script>

</body>
</html>
