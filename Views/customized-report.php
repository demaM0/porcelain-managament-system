<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Customized report</title>
    <link rel="stylesheet" type="text/css" href="LoginStyle.css">
</head>
<body>

    <div id="container3">
        <div id="container">
            <div id="box">
                <h1 id="formHeader"> Customized report </h1>


                <hr>
                <form action="../Controller/customized-reports-controller.php" method="POST">
                <label for="before">Before:</label>
                <input type="date" id="before" name="before" value="before" required>
                <label for="after">After:</label>
                <input type="date" id="after" name="after" required>

                <label for="minprc">Minimum price:</label>
                <input type="number" id="minprc" name="minprc" required>
                <label for="maxprc">Maximum price:</label>
                <input type="number" id="maxprc" name="maxprc"required>

                <label for="minquant">Minimum Quantity:</label>
                <input type="number" id="minquant" name="minquant"required>
                <label for="maxquant">Maximum Quantity:</label>
                <input type="number" id="maxquant" name="maxquant"required>



                    <button type="submit" name="notify" value="post"> Create </button>
                </form>
            </div>
        </div>

    </div>
</body>


</html>
