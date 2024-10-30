
<!DOCTYPE html>
<html>
<head>
    <title>Marketplace</title>

    <style>
        .producto {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>

</head>
<body>
    <h1>Bienvenido al Marketplace</h1>
    <div id="productos"></div>

    <script>
        // Realiza la solicitud a la API
        fetch('../api/index.php')
            .then(response => {
                // Verifica si la respuesta es exitosa
                if (!response.ok) {
                    throw new Error('Error en la red');
                }
                return response.json();
            })
            .then(data => {
                const productosDiv = document.getElementById('productos');

                // Verifica si hay productos
                if (data.length === 0) {
                    productosDiv.innerHTML = '<p>No hay productos disponibles.</p>';
                } else {
                    // Muestra los productos
                    data.forEach(producto => {
                        productosDiv.innerHTML += `
                        <div class="producto">
                            <h2>${producto.nombre}</h2>
                            <p>${producto.descripcion}</p>
                            <p>Precio: $${producto.precio}</p>
                            ${producto.imagen ? `<img src="${producto.imagen}" alt="${producto.nombre}" style="width:100px; height:auto;">` : '<p>No hay imagen disponible</p>'}
                           <p>Categoría ID: ${producto.categoria_id}</p>
                            <p>Vendedor ID: ${producto.vendedor_id}</p>
                              </div>
                            <hr>
                        `;
                    });
                }
            })
            .catch(error => {
                console.error('Hubo un problema con la solicitud Fetch:', error);
            });
    </script>
</body>
</html>