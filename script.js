// Simulación de productos
const productos = [
    { id: 1, nombre: 'Camiseta', precio: 20.00 },
    { id: 2, nombre: 'Pantalón', precio: 45.00 },
    { id: 3, nombre: 'Zapatillas', precio: 60.00 }
];

let carrito = [];
const listaProductos = document.getElementById('lista-productos');
const listaCarrito = document.getElementById('lista-carrito');
const totalCarrito = document.getElementById('total-carrito');
const contadorCarrito = document.getElementById('contador-carrito');

// Función para mostrar productos
function renderizarProductos() {
    listaProductos.innerHTML = '';
    productos.forEach(producto => {
        const div = document.createElement('div');
        div.classList.add('producto');