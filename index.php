<?php

include "database/pdo_connection.php";

$select=$conn->prepare("SELECT * FROM posts ORDER BY `id` DESC LIMIT 3");
$select->execute();
$posts=$select->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="styles/css/bootstrap.min.css">
    <!-- Main Css -->
    <link rel="stylesheet" href="styles/css/style.css">
    <!-- Css Reset -->
    <link rel="stylesheet" href="styles/css/reset.css">
    <!-- NavBar Style -->
    <link rel="stylesheet" href="styles/css/nav.css">
    <!-- Footer Style -->
    <link rel="stylesheet" href="styles/css/footer.css">
    <!-- Posts Style -->
    <link rel="stylesheet" href="styles/css/posts.css">
    <!-- Categories -->
    <link rel="stylesheet" href="styles/css/categories.css">
    <!-- Header Style -->
    <link rel="stylesheet" href="styles/css/header.css">
    <!-- Vazir Font -->
    <link rel="stylesheet" href="fonts/vazir.css">
    <!-- Fontawsome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="images/logo.ico" type="image/x-icon">
    <title>وبلاگ | صفحه اصلی</title>
</head>
<style>
    #animate{
        position: relative;
    font-size: 5rem;
    -webkit-text-stroke: 0.3vw blue;
    text-transform: uppercase;
    }
    #animate::before{
    content: attr(data-text);
    position: absolute;
    top: 0;
    left: 0;
    width: 8%;
    height: 100%;
    color:#4fed51;
    -webkit-text-stroke: 0vw #383d52;
    border-right: 2px solid #4fed51;
    overflow: hidden;
    animation: animate 6s linear infinite;
    -webkit-animation: animate 6s linear infinite;
    }
    @keyframes animate{
    0%{
        width: 0%;
    }
    70%{
        width: 100%;
    }
}
</style>
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



    <nav class="navMenu navbar navbar-dark navbar-expand-lg align-items-center fixed-top">
        <div class="container flex-row-reverse">
            <div class="d-flex align-items-center">
                <button type="button" class="search-icon" data-bs-toggle="modal" data-bs-target="#modalSearchBox">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
                <button id="switchTheme"></button>
                <a class="navbar-brand text-white fw-bold fs-5" href="index.php">
                    <img style="max-width:90px; border-radius: 5px;" src="images/logo.png" alt="mahdi_coding"></a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
                <i class="fas fa-bars fs-3"></i>
            </button>
            

            <div class="collapse navbar-collapse right-nav justify-content-start" id="navbar">
                <ul class="navbar-nav nav-left">
                    <li class="nav-item me-0">
                        <a class="nav-link mt-3 mt-lg-0"  href="#">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>خانه</span>
                        </a>
                    </li>      
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

    <header class="header">
        <div id="overlay"></div>
        <div class="container header__container">
            <div class="header__content">
                <h1 class="header__title" id="animate">وبلاگ MAHDI_CODING</h1>
                <p class="header__desc">
                    لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد.
                </p>
                <div class="mt-3">
                    <a href="#posts" class="btn btn-secondary">پست ها</a>
                </div>
            </div>
        </div>
    </header>


    <main class="my-5">
        <div class="container row align-items-start mx-auto mt-4">
            <div id="posts" class="mb-5 col-lg-9">
                <h4 class="posts__title">پست ها</h4>
                <div class="row">
                    <?php 
                    
                    function edit($string,$word){
                        $words =explode(" ",$string);
                        return implode(" ",array_splice($words,0,$word));}
                    
                    foreach($posts as $post): ?>

                    <div class="col-md-6 col-lg-4 mt-3">
                        <div class="post">
                            <div class="post__img">
                                <a href="#">
                                    <img src="<?= $post['image']?>" class="w-100 rounded" alt="Image post">
                                </a>
                            </div>
                            <h4 class="">
                                <a href="#" class="post__title d-block"><?= $post['title'] ?></a>
                            </h4>
                            <p class="post__desc">
                              <?php
                              $content=$post['caption'];
                              echo edit($content,30)."...";
                              ?>
                            </p>

                            <a href="single.php?id=<?=$post['id'];?>" class="post__link">مشاهده پست</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <aside class="categories col-lg-3 mt-5 mt-md-0">
                <h4 class="categories__title">
                    دسته بندی
                </h4>
                <ul class="categories__list">
                    <li class="categories__item"><a href="#" class="categories__link">برنامه نویسی</a></li>
                    <li class="categories__item"><a href="#" class="categories__link">برنامه نویسی</a></li>
                    <li class="categories__item"><a href="#" class="categories__link">برنامه نویسی</a></li>
                    <li class="categories__item"><a href="#" class="categories__link">برنامه نویسی</a></li>
                </ul>
            </aside>
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