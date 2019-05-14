<?php
require 'conexao.php';

?>
<html>
<head>
    <meta name="charset" content="utf-8"/>
    <meta name="viewport" content="width=device=width, initial=scale=1.0"/>
    <title>Atividade 9</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <script type="text/javascript" src="style/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="style/js/jquery-3.4.0.min.js"></script>
    <link href="style/css/bootstrap-glyphicons.min.css" rel="stylesheet" type="text/css" />
    <link href="style/maps/glyphicons-fontawesome.min.css" rel="stylesheet" type="text/css" />


    <style>
        ::-webkit-input-placeholder {
            font-style: italic;
            font-size: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="navbar">
        <div class="container-fluid text-center">
            <img src="logo-uninove-1.jpg" style="height: 70px;">
            <h1>Atividade 9</h1>
            <img src="logo-uninove-1.jpg" style="height: 70px; margin-left: -30px">
        </div>
    </div>
    <br><br>
</div>

</body>
</html>


<script type="text/javascript">
    function mostrarDiv(id, opcional = '') {
        let div = document.querySelector("#" + id);
        var style = div.style.display;
        if (style == 'block') {
            div.style.display = 'none';
        } else {
            div.style.display = 'block';
        }

        if (opcional != '') {
            let div2 = document.querySelector("#" + opcional);
            div2.style.display = 'none';
        }
    }
</script>
