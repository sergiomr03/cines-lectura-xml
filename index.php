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
<body>
        <?php
            if (file_exists('xml/encartelera.xml')) {
                $films = simplexml_load_file('xml/encartelera.xml');
                foreach ($films->film as $film) {
                    echo $film->title.' - ';
                    // Imprimir el contenido del atributo 'tema'
                    echo $film->description['tema'].'<br>';            
                }
                //print_r($films);
            } else {
                exit('Error abriendo encartelera.xml.');
            }
        ?>    
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-fixed-top navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- Items del menú de navegación -->
          <?php
          $aux=[];
          foreach ($menu->platos as $platos) {
              if(!in_array((string)$platos['ciplatone'],$aux)){
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
      <img src="" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
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
<div class="row">
    <div class="column-1">
    <?php
    if (file_exists('xml/encartelera.xml')) {
        $films = simplexml_load_file('xml/encartelera.xml');
        foreach ($films->film as $film) {
            echo $film->title.' - ';
            // Imprimir el contenido del atributo 'tema'
            echo $film->description['tema'].'<br>';            
        }
        //print_r($films);
    } else {
        exit('Error abriendo encartelera.xml.');
    }
    ?>    
    
    </div>
</div>

</body>
</html>