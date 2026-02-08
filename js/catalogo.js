fetch("data/productos.json")
  .then(res => res.json())
  .then(productos => {
    const grid = document.getElementById("catalogo");

console.log(grid);


    productos.forEach(producto => {
      const item = document.createElement("a");
      item.href = `producto.html?id=${producto.id}`;
      item.className = "catalogo-item";

      item.innerHTML = `
        <img src="${producto.imagen}" alt="${producto.nombre}">
        <h3>${producto.nombre}</h3>
        <p>${producto.precio}</p>
      `;

      grid.appendChild(item);
    });
  });
