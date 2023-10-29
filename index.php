<?php
    include_once 'vendor/autoload.php';
    $seedData = require_once 'seed.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delivery estimation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {
            document.getElementById("delivery-form").addEventListener("submit", function(e){
                e.preventDefault();
                let formData = new FormData(e.target);
                fetch("/api.php", {
                    method: 'POST',
                    body: formData
                }).then(function(response) {
                    return response.json();
                }).then(function(response){
                    if(response.estimate) {
                        document.getElementById("estimate").innerHTML = JSON.stringify(response.estimate, null, 2);
                    }
                });
            });
        });
    </script>
    <style type="text/css">
        div, pre {
            display: flex;
            margin: 10px;
        }
        label {
            width: 200px;    
        }
    </style>
</head>
<body>
<form method="post" id="delivery-form">
    <pre id="estimate"></pre>
    <div>
        <label>Select company</label>
        <select name="company">
            <?php foreach($seedData['companies'] as $company) {?>
                <option value="<?php echo $company['base_url'] ?>"><?php echo $company['name'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label>Origin</label>
        <input type="text" name="origin"/>
    </div>
    <div>
        <label>Destination</label>
        <input type="text" name="destination"/>
    </div>
    <div>
        <label>Weight</label>
        <input type="number" name="weight" min="0"/>
    </div>
    <div>
        <button type="submit">Send</button>
    </div>
</form>
</body>