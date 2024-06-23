<?php
session_start();

include("./backEnd/Classes/GetBooks.php");

use Connection\Connection;
use GetBooks\GetBooks;

if ($_GET['id'] == '') {
    header('location : ./index.php?errorMsg=Error');
    return;
}

$bookID = $_GET['id'];
$userID = $_SESSION['userID'] ?? '';

$db = new Connection;
$connection = $db->getConnection();

$getBook = new GetBooks;
$book = $getBook->getBookByID($bookID);

if (!$book) {
    header('location : ./index.php?errorMsg=Book%20dosnt%20exist');
    return;
}

if (!empty($userID)) {
    $getComments = $connection->prepare("SELECT 
            comments.*, users.email, users.id AS user_id, books.id AS book_id 
        FROM
            `comments` 
        JOIN 
            users ON comments.user_id = users.id
        JOIN
            books ON comments.book_id = books.id  
        WHERE
            books.id = :bookID AND (is_approved = 1 OR users.id = :userID)");
    $getComments->bindParam(':bookID', $bookID, PDO::PARAM_INT);
    $getComments->bindParam(':userID', $userID, PDO::PARAM_INT);
} else {
    $getComments = $connection->prepare("SELECT 
            comments.*, users.email, users.id AS user_id, books.id AS book_id 
        FROM
            `comments` 
        JOIN 
            users ON comments.user_id = users.id
        JOIN
            books ON comments.book_id = books.id  
        WHERE
            books.id = :bookID AND is_approved = 1");
    $getComments->bindParam(':bookID', $bookID, PDO::PARAM_INT);
}
$getComments->execute();
$comments = $getComments->fetchAll(PDO::FETCH_ASSOC);

$checkComment = $connection->prepare("SELECT * FROM `comments` WHERE `user_id` = :userID AND `book_id` = :bookID");
$checkComment->bindParam(":userID", $userID);
$checkComment->bindParam(":bookID", $bookID);
$checkComment->execute();
$existingComment = $checkComment->fetch(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html>

<?php require_once('./backEnd/head.php'); ?>

<body class="bg-[#2A4742]">

    <div class="flex flex-col items-center justify-center h-screen mt-2 ">

        <a href="./index.php" class="text-white bg-[#346968] cursor-pointer hover:bg-[#2c5755] focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 ml-56 mb-5 text-center self-start">
            Home
        </a>

        <div id='card' class='w-3/4 shadow-2xl relative flex'>
            <img class='rounded-l-lg w-1/2 h-[500px] md:h-[700px] object-cover' src='<?= $book['img_url'] ?>' alt=''>
            <div id='content' class='p-2 p w-1/2 flex flex-col bg-[#507e76]  rounded-r-lg'>
                <h3 class='text-2xl shadow-b-lg border-b mb-16 self-center py-2 px-5 text-white'><?= $book['title'] ?></h3>

                <div class="ml-5 text-white">
                    <h2 class="text-xl mb-5">Author: <?php echo $book['first_name'] . ' ' .  $book['last_name'] ?></h2>
                    <p class="text-xl mb-5">Publishing Year: <?= $book['year'] ?></p>
                    <p class="text-xl mb-5">Pages: <?= $book['page_num'] ?></p>
                    <p class="text-xl mb-5">Category: <?= $book['name'] ?></p>
                </div>

                <?php
                if (isset($_SESSION['isLoggedIn'])) {
                    echo " <h3 class='text-white px-2 mb-0'>Notes:</h3>
                    <small id='noteMsg' class='text-white px-2 mb-0'></small>
                <div id='display-note' class='h-[200px] mt-5 overflow-auto p-2 mb-5 text-white'>
                    <p hidden id='user-id'> $userID </p>
                    <p hidden id='book-id'> $bookID </p>
                </div>
                <div class='w-full flex lg:w-12/12 px-4 '>
                    <div class='relative w-full flex mx-auto mb-3 border p-2 items-center rounded'>
                        <textarea id='note' required name='note' class='border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150' rows='2'></textarea>
                        <div class='flex flex-wrap'>
                            <div class='px-4'>
                                <button id='add-note' class='border-[#4d7c73] cursor-pointer border-2 px-3 py-3 placeholder-blueGray-300 text-white bg-[#4f9286] rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150'>Add note</button>
                            </div>
                        </div>
                    </div>
                </div>
                ";
                }
                ?>
            </div>

        </div>


    </div>

    <div class="border rounded-md p-3 w-3/4 my-5 mx-auto">
        <?php
        if ((isset($_SESSION['isLoggedIn']) && !$existingComment)) {
            echo " <form action='./backEnd/admin/addComment.php' method='POST' class='mb-10'>
            <div class='w-full lg:w-12/12 px-4'>
                <div class='relative w-full mb-3'>
                    <label class='block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white'>
                        Add a comment
                    </label>
                    <textarea type='text' required name='comment' class='border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150' rows='2'></textarea>
                </div>
            </div>
            <div class='flex flex-wrap'>
                <div class='w-full px-4'>
                    <input type='submit' class='border-[#4d7c73] cursor-pointer border-2 px-3 py-3 mt-3 placeholder-blueGray-300 text-white bg-[#4f9286] rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150'>
                </div>
            </div>
            <input type='text' name='user' value='$userID' hidden>
            <input type='text' name='book' value='$bookID' hidden>
            <hr class='mt-6 border-b-1 border-blueGray-300'>
        </form>";
        }
        ?>

        <?php
        foreach ($comments as $com) {
            echo "<div class='flex flex-col rounded bg-[#4d7c73] justify-center px-5 py-2 my-2 text-white'>
            <h3 class='font-bold'>
                {$com['email']}
            </h3>

            <p class='mt-2'>
                {$com['text']}
            </p>";
            if ($com['user_id'] == $userID) {
                echo "<form action='./backEnd/admin/delComment.php' method='POST'> 
                
                <input type='text' value='{$com['id']}' name='comment_id' hidden>                
                <input type='text' value='$bookID' name='book_id' hidden>                

                <button type='submit' class='border-[#4d7c73] cursor-pointer border-2 px-2 py-1 mt-3 placeholder-blueGray-300 text-white bg-[#d83636] rounded text-sm shadow focus:outline-none focus:ring w-52 text-center ease-linear transition-all duration-150'>Delete</button>
                </form>";
            }
            if ($com['is_approved'] == 0) {
                echo "<p class = 'mt-2 text-[#e07f7f]'> Comment isn't approved yet</p>";
            }
            echo " </div>";
        }

        ?>
    </div>

    <script src="./js/notes.js"></script>
</body>

</html>