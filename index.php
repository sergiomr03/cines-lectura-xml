<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- hoja de estilos -->
    <link rel="stylesheet" href="./css/styles.css">
    <!-- título de página -->
    <title>Título de la página</title>
    <!-- ícono de pàgina -->
    <!-- fuentes -->
    <!-- javascript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body class="body"> 
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-fixed-top navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">Menú</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- Items del menú de navegación -->
          
          <?php
          if (file_exists('xml/menu.xml')) {
            $menu = simplexml_load_file('xml/menu.xml');
        } else {
            exit('Error abriendo menu.xml.');
        }
          $aux=[];
          foreach ($menu->platos as $platos) {
              if(!in_array((string)$platos['plato'],$aux)){
                echo '<li class="nav-item">';
                if(isset($_GET['plato']) && $_GET['plato']==(string)$platos['plato']){
                    echo '<a class="nav-link active" aria-current="page" href="?plato='.$platos['plato'].'">'.$platos['plato'].'</a>';
                }else{
                    echo '<a class="nav-link" aria-current="page" href="?plato='.$platos['plato'].'">'.$platos['plato'].'</a>';
                }
                echo '</li>';      
                array_push($aux,(string)$platos['plato']);
              }

          }
          if(isset($_GET['plato'])){
            /* filtro por comida */
            foreach($menu->platos as $platos) {
                if($_GET['plato']==$platos['plato']) {
                    echo '<tr>';
                    echo '<td>'.$platos['plato'].'</td>';
                    echo '<td>'.$platos->nombre.'</td>';
                    echo '<td id="desc">'.$platos->description.'</td>';
                    echo '<td>'.$platos->precio.'</td>';
                    echo '<td>'.$platos->calorias.'</td>';
                    echo '<td>'.$platos->caracteristicas->item.'</td>';
                    echo '</tr>';
                }
            }
        }
          ?>
          <!-- items -->

      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->

<!-- carrusel (slider) -->
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/abac-barcelona_big.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/el-restaurante-masterchef.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div>
    <h1 class="center padding">
        <u>Bocatto Di Cardinale</u>
    </h1>
</div>

<div class="row-c" >
    <div class="column-2" id="1">
        <?php
        echo "<h1>Ensaladas</h1>";
        foreach($menu->platos as $platos){
            if ($platos['plato']=='Ensaladas') {
                echo '<span class="titulo">'.$platos->nombre.'</span>'."---------------------------------------------------------------------------".'<span class="precio">'.$platos->precio.'</span>';
                echo '<h5 class="desc">'.$platos->descripcion.'</h5>';
                echo '<span class="item">'.$platos->caracteristicas->item.'</span>'."---------------------------------------------------------------------------".'<span class="desc">'.$platos->calorias.'</span>';
                echo '<br>';
            }
        }
        ?>
    </div>
</div>
<div class="row-c">
    <div class="column-2" id="2">
        <?php
        echo "<h1>Especiales</h1>";
        foreach($menu->platos as $platos){
            if ($platos['plato']=='Especiales') {
                echo '<span class="titulo">'.$platos->nombre.'</span>'."----------------------------------------------------------------------".'<span class="precio">'.$platos->precio.'</span>';
                echo '<h5 class="desc">'.$platos->descripcion.'</h5>';
                echo '<span class="item">'.$platos->caracteristicas->item.'</span>'."---------------------------------------------------------------------------".'<span class="desc">'.$platos->calorias.'</span>';
                echo '<br>';
            }
        }
        ?>
    </div>
</div>
<div class="row-c">
    <div class="column-2" id="3">
        <?php
        echo "<h1>Hamburgesas</h1>";
        foreach($menu->platos as $platos){
            if ($platos['plato']=='Hamburgesas') {
                echo '<span class="titulo">'.$platos->nombre.'</span>'."---------------------------------------------------------------------------".'<span class="precio">'.$platos->precio.'</span>';
                echo '<h5 class="desc">'.$platos->descripcion.'</h5>';
                echo '<span class="item">'.$platos->caracteristicas->item.'</span>'."---------------------------------------------------------------------------".'<span class="desc">'.$platos->calorias.'</span>';
                echo '<br>';
            }
        }
        ?>
    </div>
</div>
<div class="row-c">
    <div class="column-2" id="4">
        <?php
        echo "<h1>Carne</h1>";
        foreach($menu->platos as $platos){
            if ($platos['plato']=='Carne') {
                echo '<span class="titulo">'.$platos->nombre.'</span>'."--------------------------------------".'<span class="precio">'.$platos->precio.'</span>';
                echo '<h5 class="desc">'.$platos->descripcion.'</h5>';
                echo '<span class="item">'.$platos->caracteristicas->item.'</span>'."---------------------------------------------------------------------------".'<span class="desc">'.$platos->calorias.'</span>';
                echo '<br>';
            }
        }
        ?>
    </div>
</div>
<div class="row-c">
    <div class="column-2" id="5">
        <?php
        echo "<h1>Sandwiches</h1>";
        foreach($menu->platos as $platos){
            if ($platos['plato']=='Sandwiches') {
                echo '<span class="titulo">'.$platos->nombre.'</span>'."---------------------------------------------------------------------------".'<span class="precio">'.$platos->precio.'</span>';
                echo '<h5 class="desc">'.$platos->descripcion.'</h5>';
                echo '<span class="item">'.$platos->caracteristicas->item.'</span>'."---------------------------------------------------------------------------".'<span class="desc">'.$platos->calorias.'</span>';
                echo '<br>';
            }
        }
        ?>
    </div>
</div>
<div class="row-c">
    <div class="column-2" id="6">
        <?php
        echo "<h1>Pizza</h1>";
        foreach($menu->platos as $platos){
            if ($platos['plato']=='Pizza') {
                echo '<span class="titulo">'.$platos->nombre.'</span>'."--------------------------------------------------------------------".'<span class="precio">'.$platos->precio.'</span>';
                echo '<h5 class="desc">'.$platos->descripcion.'</h5>';
                echo '<span class="item">'.$platos->caracteristicas->item.'</span>'."---------------------------------------------------------------------------".'<span class="desc">'.$platos->calorias.'</span>';
                echo '<br>';
            }
        }
        ?>
    </div>
</div>
<!-- <div class="row-c">
    <div class="column-2" id="7">
        <?php
        // echo "<h1>Pasta</h1>";
        // foreach($menu->platos as $platos){
        //     if ($platos['plato']=='Pasta') {
        //         echo '<span class="titulo">'.$platos->nombre.'</span>'."------------------------------------------------".'<span class="precio">'.$platos->precio.'</span>';
        //         echo '<h5 class="desc">'.$platos->descripcion.'</h5>';
        //         echo '<span class="item"'.$platos->caracteristicas->item.'</span>'."---------------------------------------------------------------------------".'<span class="desc">'.$platos->calorias.'</span>';
        //         echo '<br>';
        //     }
        // }
        ?>
    </div>
</div> -->
<div class="footer">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11978.326384014328!2d2.105054!3d41.3614472!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8d8a749d9ff3cd65!2sBocatto%20de%20cardinale!5e0!3m2!1sca!2ses!4v1649319231572!5m2!1sca!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<div class="footer">
    <p>
        <strong>Contacto:</strong>
    </p>
    <p>
        <a href="bocattodicardinale@gmail.com">bocattodicardinale@gmail.com</a>
    </p>
    <p>
        <span>640 56 21 07</span>
    </p>
    <p>
        <span>Carrer de Barcelona, 21, 08901 L'Hospitalet de Llobregat, Barcelona</span>
    </p>
</footer>
</body>
</html>