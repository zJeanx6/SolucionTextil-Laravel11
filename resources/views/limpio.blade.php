<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toast Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
    <button id="showToast">Mostrar Toast</button>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        document.getElementById('showToast').addEventListener('click', function () {
            Toastify({
                text: "¡Hola, esto es un mensaje de prueba!",
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            }).showToast();
        });
    </script>
</body>
</html>
