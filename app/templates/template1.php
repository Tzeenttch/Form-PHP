<!DOCTYPE html>
<html lang="en">
<style>
    .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        color: white;
        background-color: #4c2882; 
        text-decoration: none; 
        border-radius: 5px; 
        transition: background-color 0.3s;
        margin-top: 20px;
    }

    .btn:hover {
        background-color: #7d2181; 
    }

    table {
    width: 20%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 18px;
    text-align: left;
    border: 1px solid #dddddd;
}

thead tr {
    background-color: #f2f2f2;
    color: #333;
    text-align: left;
    font-weight: bold;
}

th, td {
    padding: 12px 15px;
    border: 1px solid #dddddd;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

tbody tr:nth-child(odd) {
    background-color: #ffffff;
}

tbody tr:hover {
    background-color: #f1f1f1;
    cursor: pointer;
}


td {
    color: #333;
}


</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
<!--para visualizar el titulo en otro color distinto al que proporciona el css anterior-->
    <style> 
th {
    background-color: #4c2882;
    color: white;
}
    </style>
</head>
<body>
    <h1>BD Paises-Comunidades</h1>


    <form action="index.php" method="POST">
        <label for="opciones">Selecciona una acción:</label>
        <select id="opciones" name="opciones" required>
            <option value="">Selecciona una opción</option>
            <option value="borrar">Borrar</option>
            <option value="editar">Editar</option>
            <option value="recuperar">Recuperar</option>
            <option value="anadir">Añadir país</option>
        </select>
        <input type="submit" value="Ejecutar">
        
    <?php 
    print_r($bodyOutput);
    ?>
    </form>

</body>
</html>
