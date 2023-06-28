<!DOCTYPE html>
<html>
<head>
    <title>Formulario de ingreso al cine</title>
</head>
<body>
    <h1>Formulario de ingreso al cine</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $age = $_POST["age"];
        $quantity = intval($_POST["quantity"]);

        $discount = 0;
        if ($age == "niño") {
            $discount = 0.3;
        } else if ($age == "adulto") {
            $discount = 0.05;
        } else if ($age == "adulto_mayor") {
            $discount = 0.55;
        }

        $ticketPrice = 5000;  // Precio base de la entrada
        $totalPrice = $ticketPrice * $quantity * (1 - $discount);

        echo '<div id="ticketContainer">';
        echo '<h2>Boleta de compra</h2>';
        echo '<p>';
        echo 'Categoría: ' . $age . '<br>';
        echo 'Cantidad de entradas: ' . $quantity . '<br>';
        echo 'Precio por entrada: $' . $ticketPrice . '<br>';
        echo 'Descuento: ' . ($discount * 100) . '%<br>';
        echo 'Total a pagar: $' . $totalPrice . '<br>';
        echo '</p>';
        echo '</div>';
    }
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="age">Seleccione la categoría de la entrada:</label><br>
        <input type="radio" name="age" value="niño" required> Niño<br>
        <input type="radio" name="age" value="adulto" required> Adulto<br>
        <input type="radio" name="age" value="adulto_mayor" required> Adulto Mayor<br><br>

        <input type="number" name="quantity" placeholder="Cantidad de entradas" required><br><br>

        <button type="submit">Generar boleta de compra</button>
    </form>
</body>
</html>
