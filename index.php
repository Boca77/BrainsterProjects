<?php
session_start();

include("./backEnd/Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$getCat = $connection->prepare("SELECT * FROM `category`");
$getCat->execute();
$categories = $getCat->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brainster Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/0d6f25b6d2.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="banner min-h-[60vh] flex flex-col gap-48 bg-[url('./imgs/banner1.jpg')] bg-cover bg-center border-b-2 border-gray-400 ">
        <nav class="flex justify-between px-10 py-5 justify-self-start">
            <p class="text-xl text-neutral-300">Brainster Library</p>
            <div class="buttons flex items-center gap-5">
                <?php
                $isLoggedIn = $_SESSION['isLoggedIn'] ?? '';
                $isAdmin = $_SESSION['isAdmin'] ?? '';

                if ($isLoggedIn == true) {
                    echo "<h5 class='text-white'>Welcome {$_SESSION['user']} </h5>";

                    if ($isAdmin == true) {
                        echo '<a href="./admin-panel.php"><button class="text-white bg-[#1B3534] hover:bg-[#2c5755] focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Admin Panel</button></a>';
                    }

                    echo '<a href="./backEnd/logout.php"><button class="text-white bg-[#1B3534] hover:bg-[#2c5755] focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">LogOut</button></a>';
                } else {
                    echo '<a href="./login-signup.php"><button class="text-white bg-[#1B3534] hover:bg-[#2c5755] focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">SignUp / LogIn</button></a>
                ';
                }
                ?>
            </div>
        </nav>
        <h1 class="text-6xl justify-self-center text-white bg-[#1B3534] rounded w-1/2 self-end p-6">Welcome to Brainster library</h1>
    </div>
    <main class=" bg-[#2A4742] flex flex-col items-center">
        <div class="relative w-full flex flex-col justify-center ">
            <div id="filters" class=" px-10 py-5 w-4/5 mx-auto flex border-b-4 border-gray-400 bg-white/20 rounded-b ">
                <div class="flex items-center gap-2">
                    <i id="filter" class="fa-solid fa-bars fa-xl cursor-pointer"></i>
                    <p>Filters</p>
                </div>
            </div>
            <div id="filter-content" class="absolute opacity-0 top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 ">
                <div class="flex items-center gap-5 p-5">
                    <?php
                    foreach ($categories as $category) {
                        echo "<div class='items-center flex'>
                        <input checked id='{$category['name']}' type='checkbox' value='{$category['name']}' class='w-4 h-4 accent-slate-400'>
                        <label for='{$category['name']}' class='ms-2 text-sm font-medium text-gray-900 dark:text-gray-300'>{$category['name']}</label>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="outer" class="flex justify-center w-4/5">
            <div id="book-cards" class="flex w-full md:w-4/5 flex-wrap gap-6 justify-center px-4 my-14">
                <div id="card" class="w-full shadow-2xl sm:w-1/2 md:w-1/3 lg:w-1/4 relative ">
                    <img class="rounded-t-lg w-full h-[300px] md:h-[400px] object-cover" src="https://picsum.photos/200/300" alt="">
                    <div id="content" class="p-2 flex flex-col bg-[#507e76] text-white rounded-b-lg ">
                        <h3 class="text-lg shadow-lg border-b mb-3 self-center">Book Title</h3>
                        <p>Author: Jon</p>
                        <p>Category: <span class="category">Adventure</span></p>
                    </div>
                </div>
                <div id="card" class="w-full shadow-2xl sm:w-1/2 md:w-1/3 lg:w-1/4 ">
                    <img class="rounded-t-lg w-full h-[300px] md:h-[400px] object-cover" src="https://picsum.photos/200/300" alt="">
                    <div id="content" class="p-2 flex flex-col rounded-b-lg bg-[#507e76] text-white">
                        <h3 class="text-lg shadow-lg border-b mb-3 self-center">Book Title</h3>
                        <p>Author: Jon</p>
                        <p>Category: <span class="category">Mystery</span></p>
                    </div>
                </div>
                <div id="card" class="w-full shadow-2xl sm:w-1/2 md:w-1/3 lg:w-1/4 ">
                    <img class="rounded-t-lg w-full h-[300px] md:h-[400px] object-cover" src="https://picsum.photos/200/300" alt="">
                    <div id="content" class="p-2 flex flex-col rounded-b-lg bg-[#507e76] text-white">
                        <h3 class="text-lg shadow-lg border-b mb-3 self-center">Book Title</h3>
                        <p>Author: Jon</p>
                        <p>Category: <span class="category">Adventure</span></p>
                    </div>
                </div>
                <div id="card" class="w-full shadow-2xl sm:w-1/2 md:w-1/3 lg:w-1/4 ">
                    <img class="rounded-t-lg w-full h-[300px] md:h-[400px] object-cover" src="https://picsum.photos/200/300" alt="">
                    <div id="content" class="p-2 flex flex-col rounded-b-lg bg-[#507e76] text-white">
                        <h3 class="text-lg shadow-lg border-b mb-3 self-center">Book Title</h3>
                        <p>Author: Jon</p>
                        <p>Category: <span class="category">Horror</span></p>
                    </div>
                </div>
                <div id="card" class="w-full shadow-2xl sm:w-1/2 md:w-1/3 lg:w-1/4 ">
                    <img class="rounded-t-lg w-full h-[300px] md:h-[400px] object-cover" src="https://picsum.photos/200/300" alt="">
                    <div id="content" class="p-2 flex flex-col rounded-b-lg bg-[#507e76] text-white">
                        <h3 class="text-lg shadow-lg border-b mb-3 self-center">Book Title</h3>
                        <p>Author: Jon</p>
                        <p>Category: <span class="category">Mystery</span></p>
                    </div>
                </div>
                <div id="card" class="w-full shadow-2xl sm:w-1/2 md:w-1/3 lg:w-1/4 ">
                    <img class="rounded-t-lg w-full h-[300px] md:h-[400px] object-cover" src="https://picsum.photos/200/300" alt="">
                    <div id="content" class="p-2 flex flex-col rounded-b-lg bg-[#507e76] text-white">
                        <h3 class="text-lg shadow-lg border-b mb-3 self-center">Book Title</h3>
                        <p>Author: Jon</p>
                        <p>Category: <span class="category">IT</span></p>
                    </div>
                </div>
            </div>
        </div>
        <footer class="p-3 bg-black w-full flex justify-center text-white"></footer>
    </main>
    <!-- <script src="./js/filters.js"></script> -->
    <script src="./js/filter.js"></script>
    <script src="./js/footer.js"></script>
</body>

</html>