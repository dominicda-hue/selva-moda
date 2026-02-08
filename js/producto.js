const params = new URLSearchParams(window.location.search);
const id = params.get("id");

fetch("data/productos.json")
  .then(res => res.json())
  .then(productos => {
    const producto = productos.find(p => p.id == id);

    const contenedor = document.getElementById("producto");

   contenedor.innerHTML = `
  <section class="producto-view fade-up">

    <div class="producto-img">
      <img src="${producto.imagen}" alt="${producto.nombre}">
    </div>

    <div class="producto-info">
      <h1>${producto.nombre}</h1>
      <p class="precio">${producto.precio}</p>
      <p class="desc">${producto.descripcion}</p>

      <a id="wsp-btn" class="btn-primary" target="_blank">
        Consultar por WhatsApp
      </a>
    </div>

  </section>
`;


    // 👇 ESTO TIENE QUE ESTAR ACÁ ADENTRO
    const telefono = "5491164483261";

    const mensaje = `Hola, estoy interesado en ${producto.nombre}`;
    const url = `https://wa.me/${telefono}?text=${encodeURIComponent(mensaje)}`;

    document.getElementById("wsp-btn").href = url;
  });
