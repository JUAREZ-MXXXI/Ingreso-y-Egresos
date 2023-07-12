<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        echo '<script>alert("Pagina restringidad, debes iniciar sesion");
        window.location = "index.php";</script>';
        session_destroy();
        die();    
    }
?>
<!DOCTYPE html5>
<html>
<head>
    <title>Crear Categoría</title>
    <link rel="stylesheet" href="css/categoria.css">
</head>
<body>
  <header>  
    <div class="crearcategoria"><h1>Crear Categoría</h1></div>

    <form method="post" action="">
        <div class="categorianame"><label for="categoria">Nombre de la categoría:</label>
        <input type="text" name="categoria" id="categoria" required> 
        <br>
        <input class="boton" type="submit" value="Crear Categoría">
        </div>
    </form>
</header>  
    <?php
    // Conexión a la base de datos
    $conexion = mysqli_connect("192.168.1.93", "initbox", "12345678", "categorias");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $categoria = $_POST["categoria"];

        // Insertar categoría en la base de datos
        $query = "INSERT INTO sistemas (producto) VALUES ('$categoria')";
        mysqli_query($conexion, $query);
    }

    // Obtener y mostrar todas las categorías existentes
    $query = "SELECT * FROM sistemas";
    $result = mysqli_query($conexion, $query);
    ?>
<article>
<?php
    echo "<h3>CATEGORIAS EXISTENTES:</h3>";
    while ($row = mysqli_fetch_assoc($result)) {
        $categoriaId = $row["id"];
        $categoriaNombre = $row["producto"];
    ?>
 

    <?php

        echo "<div>";
        echo "<button class=\"bot1\"> <p><strong>$categoriaNombre</strong></p></button>";
        echo "<button class=\"bot2\" onclick=\"mostrarOpciones($categoriaId)\">Mostrar opciones</button>";
        echo "<button class=\"bot2\" onclick=\"eliminarCategoria($categoriaId)\">Eliminar categoría</button>";
        ?> 
        </article> 
<aside>

        <?php
        echo "<div class=\"container1\" id=\"opciones-$categoriaId\" class=\"opciones\">";
        echo "<h4>OPCIONES PARA -$categoriaNombre:</h4>";
        echo "<div class=\"tabIE\">";
        echo "<h4>INGRESOS:</h4>";
        echo "<table id=\"tabla1-$categoriaId\">";
        echo "<tr>";
        echo "<th>Producto</th>";
        echo "<th>Precio</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><input type=\"text\" id=\"nombre1-$categoriaId-1\"></td>";
        echo "<td><input type=\"number\" id=\"numero1-$categoriaId-1\"></td>";
        echo "</tr>";
        echo "</table>";
        echo "<button onclick=\"agregarFila1($categoriaId)\">Agregar fila</button>";
        echo "<button onclick=\"calcularTotal1($categoriaId)\">Calcular Total</button>";
        echo "<p id=\"total1-" . $categoriaId . "\"></p>";

        echo "<h4>EGRESOS:</h4>";
        echo "<table id=\"tabla-$categoriaId\">";
        echo "<tr>";
        echo "<th>Producto</th>";
        echo "<th>Precio</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><input type=\"text\" id=\"nombre-$categoriaId-1\"></td>";
        echo "<td><input type=\"number\" id=\"numero-$categoriaId-1\"></td>";
        echo "</tr>";
        echo "</table>";
        echo "<button onclick=\"agregarFila($categoriaId)\">Agregar fila</button>";
        echo "<button onclick=\"calcularTotal($categoriaId)\">Calcular Total</button>";
        echo "<p id=\"total-" . $categoriaId . "\"></p>";
        echo "<p><span class=\"montototal\" id='monto-total-$categoriaId'></span></p>";
        echo "</div>";
        echo "</div>";
    }
    
   
    // Cerrar conexión a la base de datos
    mysqli_close($conexion);
    ?>
    <button class="cerrarsesioncategorias"><a href="index.php">CERRAR SESION</a></button>
</aside>
 
    <script>
        function mostrarOpciones(categoriaId) {
            var opcionesDiv = document.getElementById("opciones-" + categoriaId);
            opcionesDiv.style.display = opcionesDiv.style.display === "none" ? "block" : "none";
        }
        //INGRESOS
        function agregarFila1(categoriaId) {
            //VAR única forma de declarar variables
            //funcion document.getElementByID Obtiene una referencia al elemento de la tabla HTML
            var tabla = document.getElementById("tabla1-" + categoriaId);
            var rowCount = tabla.rows.length;
            //Obtiene el número de filas actual en la tabla mediante la propiedad "rows.length" y lo guarda en la variable "rowCount".
            //Utiliza el método "insertRow" de la tabla para insertar una nueva fila al final de la tabla. El resultado se guarda en la variable "row".
            var row = tabla.insertRow(rowCount);
            //Crea una celda en la nueva fila para el nombre. Utiliza el método "insertCell" en el objeto "row" y guarda la referencia a la celda creada en la variable "nombreCell".
            var nombreCell = row.insertCell(0);
            var nombreInput = document.createElement("input");
            //Crea un elemento de entrada de texto mediante la función "document.createElement" y lo guarda en la variable "nombreInput". Establece el tipo de entrada como "text" y le asigna un id único usando la concatenación de "nombre1-", "categoriaId", y "rowCount".
            nombreInput.type = "text";
            nombreInput.id = "nombre1-" + categoriaId + "-" + rowCount;
            nombreCell.appendChild(nombreInput);

            var numeroCell = row.insertCell(1);
            var numeroInput = document.createElement("input");
            numeroInput.type = "number";
            numeroInput.id = "numero1-" + categoriaId + "-" + rowCount;
            numeroCell.appendChild(numeroInput);
        }
        function calcularTotal1(categoriaId) {
            var tabla = document.getElementById("tabla1-" + categoriaId);
            var rowCount = tabla.rows.length;
            var total = 0;

            for (var i = 1; i < rowCount; i++) {
                var numeroInput = document.getElementById("numero1-" + categoriaId + "-" + i);
                var numero = parseInt(numeroInput.value);

                if (!isNaN(numero)) {
                    total += numero;
                }
            }

            var totalElement = document.getElementById("total1-" + categoriaId);
            totalElement.textContent = "Total Ingresos: " + total;

            calcularMontoTotal(categoriaId);
        }
        //EGRESOS
        function agregarFila(categoriaId) {
            var tabla = document.getElementById("tabla-" + categoriaId);
            var rowCount = tabla.rows.length;

            var row = tabla.insertRow(rowCount);

            var nombreCell = row.insertCell(0);
            var nombreInput = document.createElement("input");
            nombreInput.type = "text";
            nombreInput.id = "nombre-" + categoriaId + "-" + rowCount;
            nombreCell.appendChild(nombreInput);

            var numeroCell = row.insertCell(1);
            var numeroInput = document.createElement("input");
            numeroInput.type = "number";
            numeroInput.id = "numero-" + categoriaId + "-" + rowCount;
            numeroCell.appendChild(numeroInput);
        }
        function calcularTotal(categoriaId) {
            var tabla = document.getElementById("tabla-" + categoriaId);
            var rowCount = tabla.rows.length;
            var total = 0;

            for (var i = 1; i < rowCount; i++) {
                var numeroInput = document.getElementById("numero-" + categoriaId + "-" + i);
                var numero = parseInt(numeroInput.value);

                if (!isNaN(numero)) {
                    total += numero;
                }
            }

            var totalElement = document.getElementById("total-" + categoriaId);
            totalElement.textContent = "Total Egresos: " + total;

            calcularMontoTotal(categoriaId);
        }
        function calcularMontoTotal(categoriaId) {
            var totalIngresosElement = document.getElementById("total1-" + categoriaId);
            var totalEgresosElement = document.getElementById("total-" + categoriaId);
            var totalIngresos = parseInt(totalIngresosElement.textContent.replace("Total Ingresos: ", ""));
            var totalEgresos = parseInt(totalEgresosElement.textContent.replace("Total Egresos: ", ""));
            var montoTotal = totalIngresos - totalEgresos;
            var montoTotalElement = document.getElementById("monto-total-" + categoriaId);
            montoTotalElement.textContent = "MONTO TOTAL: " + montoTotal;
        }
        function eliminarCategoria(categoriaId) {
            var confirmacion = confirm("¿Estás seguro de eliminar esta categoría?");

            if (confirmacion) {
                // Eliminar la categoría en la base de datos (código adicional necesario)
                var categoriaDiv = document.getElementById("opciones-" + categoriaId);
                categoriaDiv.parentNode.remove();
            }
        }
    </script>
</body>
</html>
