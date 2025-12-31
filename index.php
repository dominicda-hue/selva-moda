<?php
session_start();
// Simulación de base de datos
$productos = [
    1 => ['nombre' => 'Laptop', 'precio' => 800],
    2 => ['nombre' => 'Mouse', 'precio' => 20],
    3 => ['nombre' => 'Teclado', 'precio' => 50]
];

// Lógica para añadir al carrito
if (isset($_POST['agregar'])) {
    $id = $_POST['id'];
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    
    // Si ya existe, aumentamos cantidad, si no, lo añadimos
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad']++;
    } else {
        $_SESSION['carrito'][$id] = [
            'nombre' => $productos[$id]['nombre'],
            'precio' => $productos[$id]['precio'],
            'cantidad' => 1
        ];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tienda Simple</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Productos</h1>
    <div class="contenedor-productos">
        <?php foreach ($productos as $id => $info): ?>
            <div class="producto">
                <h3><?php echo $info['nombre']; ?></h3>
                <p>$<?php echo $info['precio']; ?></p>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" name="agregar">Agregar al carrito</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="carrito.php">Ver Carrito (<?php echo count($_SESSION['carrito'] ?? []); ?>)</a>
</body>
</html>