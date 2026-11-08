<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesion de cURL; ch =cURL handle
$ch = curl_init(API_URL);
//Indicar que se desea recibir la respuesta como una cadena en lugar de imprimirla directamente en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Ejecutar la solicitud cURL y almacenar la respuesta en una variable
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
//Cerrar la sesión cURL

//una altenativa seria usar la funcion file_get_contents() para obtener el contenido de la URL

//$result = file_get_contents(API_URL); 
//si solo quieres obtener el contenido de la URL y no necesitas configurar opciones adicionales de cURL, puedes usar esta funcion para obtener el contenido de la URL
//solo si quieres hacer un GET de una API
$data = json_decode($result, true);

//curl_close($ch); ya no sirve

//var_dump($data);
?>

<head>
    <meta charset="UTF-8" />
    <title>Demo de cURL en PHP</title>
    <meta description="Demo de cURL en PHP para obtener datos de la API de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
</head>

<main>
    <!--
    <pre style="...">
        <?php // var_dump($data); ?>
    </pre>
-->
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="300" height="400" alt="Poster de <?= $data['title'] ?>" />
    </section>
    <hgroup>
        <h1><?= $data["title"] ?>; se estrena en <?= $data["days_until"] ?></h1>
        <p>Fecha de estreno: <?= $data["release_date"] ?></p>
        <h2>La siguiente es <?= $data["following_production"]["title"] ?></h2>
    </hgroup>
    
</main>


<style>
    h2{
        content: " " attr(data-text);
        color: #eaee00;
        font-size: 1.5rem;
        display: block;
    }
    :root{
        --main-color: #ff0000;
    }
    main{
        background-color: #6213f5;
        padding: 20px;
        text-align: center;
    }
    body{
        background-color: var(--main-color);
        color: #fff;
        font-family: sans-serif;
        place-content: center;
    }

</style>
