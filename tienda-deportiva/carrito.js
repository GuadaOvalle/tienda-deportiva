document.addEventListener('DOMContentLoaded', () => {
    let carrito = JSON.parse(sessionStorage.getItem('carrito')) || [];
    const cartCountElement = document.getElementById('cart-count');
    const listaCarritoElement = document.getElementById('lista-carrito');
    const totalCarritoElement = document.getElementById('total-carrito');

    const actualizarCarrito = () => {
        cartCountElement.textContent = carrito.reduce((total, item) => total + item.cantidad, 0);
        listaCarritoElement.innerHTML = '';
        let total = 0;

        carrito.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.className = 'carrito-item';
            itemElement.innerHTML = `
                <p>${item.nombre} - $${item.precio} x ${item.cantidad}</p>
                <button class="btn btn-danger btn-sm eliminar-item" data-id="${item.id}">Eliminar</button>
            `;
            listaCarritoElement.appendChild(itemElement);
            total += item.precio * item.cantidad;
        });

        totalCarritoElement.innerHTML = `<p>Total: $${total.toFixed(2)}</p>`;
    };

    document.querySelectorAll('.agregar-carrito').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            const nombre = button.getAttribute('data-nombre');
            const precio = parseFloat(button.getAttribute('data-precio'));
            const stock = parseInt(button.getAttribute('data-stock'));
            const cantidad = parseInt(document.getElementById(`cantidad-${id}`).value);

            if (cantidad > stock) {
                alert('No hay suficiente stock.');
                return;
            }

            const producto = carrito.find(item => item.id === id);

            if (producto) {
                producto.cantidad += cantidad;
            } else {
                carrito.push({
                    id,
                    nombre,
                    precio,
                    cantidad
                });
            }

            sessionStorage.setItem('carrito', JSON.stringify(carrito));
            actualizarCarrito();
        });
    });

    listaCarritoElement.addEventListener('click', (event) => {
        if (event.target.classList.contains('eliminar-item')) {
            const id = event.target.getAttribute('data-id');
            carrito = carrito.filter(item => item.id !== id);
            sessionStorage.setItem('carrito', JSON.stringify(carrito));
            actualizarCarrito();
        }
    });

    actualizarCarrito();

    
});
