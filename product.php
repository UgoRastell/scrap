<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SCRAP</title>
</head>

<body>
    <nav b-2bny3kbu4g class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">Scrap FakeTeeTurtle</nav>
    <?php
    $json = file_get_contents('./data.json');

    $data = json_decode($json, true);

    foreach ($data as $elem) {
        echo "
            <div class=container>
                <div class=card mb-3 style=max-width: 540px;>
                <div class=row g-0>
                <div class=col-md-4>
                    <img src=".$elem['url']." class=img-fluid rounded-start alt=> 
                </div>
                <div class=col-md-8>
                    <div class=card-body>
                    <h5 class=card-title>".$elem['name']." - ".$elem['price']."</h5>
                    <span class='badge bg-success'>".$elem['tag']."</span> 
                    <p class=card-text>".$elem['description']."</p>
                    <p class=card-text><small class=text-muted>".$elem['description']."</small></p>
                    <a href='./src/descriptionProduct.php?token=".$elem['token']."' class='btn btn-primary'>Go to page !</a>
                    </div>
                </div>
                </div>
                </div>
            </div> 
                   ";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>