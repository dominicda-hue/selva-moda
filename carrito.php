<?php
session_start();

// Vaciar carrito
if (isset($_GET['vaciar'])) {
    unset($_SESSION['carrito']);
    header("Location: carrito.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mi Carrito</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tu Carrito</h1>
    <table>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        <?php 
        $total = 0;
        if (!empty($_SESSION['carrito'])):
            foreach ($_SESSION['carrito'] as $item): 
                $subtotal = $item['precio'] * $item['cantidad'];
                $total += $subtotal;
        ?>
        <tr>
            <td><?php echo $item['nombre']; ?></td>
            <td>$<?php echo $item['precio']; ?></td>
            <td><?php echo $item['cantidad']; ?></td>
            <td>$<?php echo $subtotal; ?></td>
        </tr>
        <?php endforeach; else: ?>
        <tr><td colspan="4">El carrito está vacío</td></tr>
        <?php endif; ?>
    </table>
    
    <h3>Total: $<?php echo $total; ?></h3>
    <a href="index.php">Seguir comprando</a> | 
    <a href="carrito.php?vaciar=1">Vaciar carrito</a>
</body>
</html>