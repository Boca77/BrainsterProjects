<?php
session_start();

include("./backEnd/Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$bookID = $_GET['id'];
$getBook = $connection->prepare("SELECT * FROM `books`
         JOIN category ON books.category_id = category.id 
         JOIN authors ON books.author_id = authors.id 
         WHERE books.id = :id");
$getBook->bindParam(":id", $bookID);
$getBook->execute();
$book = $getBook->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center h-screen bg-[#2A4742]">

    <div id='card' class='w-3/4 shadow-2xl relative flex'>
        <img class='rounded-l-lg w-1/2 h-[500px] md:h-[700px] object-cover' src='<?= $book['img_url'] ?>' alt=''>
        <div id='content' class='p-2 p w-1/2 flex flex-col bg-[#507e76] text-white rounded-r-lg'>
            <h3 class='text-2xl shadow-b-lg border-b mb-16 self-center py-2 px-5'><?= $book['title'] ?></h3>
            <div class="ml-5">
                <h2 class="text-xl mb-5">Author: <?php echo $book['first_name'] . ' ' .  $book['last_name'] ?></h2>
                <p class="text-xl mb-5">Publishing Year: <?= $book['year'] ?></p>
                <p class="text-xl mb-5">Pages: <?= $book['page_num'] ?></p>
                <p class="text-xl mb-5">Category: <?= $book['name'] ?></p>
            </div>
        </div>

    </div>
</body>

</html>