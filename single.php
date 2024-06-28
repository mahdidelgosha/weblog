<?php

include "database/pdo_connection.php";

$getId=$_GET['id'];

$select=$conn->prepare("SELECT * FROM posts WHERE id=?");
$select->bindValue(1,$getId);
$select->execute();
$posts=$select->fetchAll(PDO::FETCH_ASSOC);

$views=$conn->prepare("INSERT INTO views SET views_post=?");
$views->bindValue(1,$getId);
$views->execute();

$conter=$conn->prepare("SELECT COUNT(*) FROM views WHERE views_post=?");
$conter->bindValue(1,$getId);
$conter->execute();
$conterVues=$conter->fetch();
foreach($conterVues as $conterVue){
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/css/style.css">
    <!-- Css Reset -->
    <link rel="stylesheet" href="styles/css/reset.css">
    <!-- NavBar Style -->
    <link rel="stylesheet" href="styles/css/nav.css">
    <!-- Footer Style -->
    <link rel="stylesheet" href="styles/css/footer.css">
    <!-- Main Css -->
    <link rel="stylesheet" href="styles/css/single.css">
    <link rel="shortcut icon" href="images/logo.ico" type="image/x-icon">
    <!-- Vazir Font -->
    <link rel="stylesheet" href="fonts/vazir.css">
    <!-- Fontawsome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>پست</title>
</head>
<body>
    <div class="modal fade" id="modalSearchBox">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="#" class="position-relative">
                    <input type="search" placeholder="جستجو ..." class="form-control searchField">
                    <button class="searchBtn"><i class="fas fa-search fs-6"></i></button>
                </form>
            </div>
        </div>
    </div>
    <nav class="navMenu navbar navbar-dark navbar-expand-lg align-items-center bg-primary fixed-top">
        <div class="container flex-row-reverse">
            <div class="d-flex align-items-center">
                <button type="button" class="search-icon" data-bs-toggle="modal" data-bs-target="#modalSearchBox">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
                <button id="switchTheme"></button>
                <a class="navbar-brand text-white fw-bold fs-5" href="index.php">
                    <img style="max-width:90px; border-radius:5px;" src="images/logo.png" alt="Codeyad"></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
                <i class="fas fa-bars fs-3"></i>
            </button>
            <div class="collapse navbar-collapse right-nav justify-content-start" id="navbar">
                <ul class="navbar-nav nav-left">
                    <li class="nav-item me-0">
                        <a class="nav-link mt-3 mt-lg-0" href="index.php">
                        <i class="fas fa-list" aria-hidden="true"></i>
                            <span>پست ها</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item me-0">
                        <a class="nav-link mt-3 mt-lg-0" href="posts.php">
                            ></i>
                            <span>پست ها</span>
                        </a>
                    </li> -->
                    
                    <li class="nav-item me-0">
                        <a class="nav-link mt-3 mt-lg-0" href="login.php">
                            <i class="fa fa-sign-in ms-1"></i>
                            <span>ورود</span>
                        </a>
                    </li>
                    
                    <li class="nav-item me-0">
                        <a class="nav-link mt-3 mt-lg-0" href="register.php">
                            <i class="fa fa-user-plus ms-1"></i>
                            <span>عضویت</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main style="margin-top: 10rem; margin-bottom: 5rem;">
        <div class="post-container w-100 mx-auto">
            <div class="content bg-white">
                <?php foreach($posts as $post):?>
                <h4 class="title"><?= $post['title'];?></h4>
                <span class="date">نوشته شده توسط مهدی دلگشا</span>
                <span class="author"><?= $post['created_at'];?></span>
                <span class="author"> بازدید <?= $conterVue;?></span>
                <div class="img w-100">
                    <img src="<?= $post['image'];?>" alt="Image" class="w-100 rounded">
                </div>
                    <p class="desc"> 
                        <?= $post['caption']?>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <p class="fw-bold text-white mb-3 mb-md-0 fs-6">تمامی حقوق برای سایت محفوظ می باشد &copy;</p>
            <button type="button" id="scrollUpBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                </svg>
            </button>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/scrollToUp.js"></script>
    <script src="js/darkMode.js"></script>
</body>
</html>