<?php
include("./backEnd/Classes/GetBooks.php");

use Connection\Connection;

$db = new Connection;
$connection = $db->getConnection();

$getComments = $connection->prepare("SELECT 
        comments.*, users.email, users.id AS user_id, books.id AS book_id 
    FROM
        `comments` 
    JOIN 
        users ON comments.user_id = users.id
    JOIN
        books ON comments.book_id = books.id  
    WHERE
        is_approved = 0");
$getComments->execute();
$comments = $getComments->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#4f867d]">
    <section class="py-1 bg-blueGray-50">
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <a href="./index.php" class="text-white bg-[#346968] cursor-pointer hover:bg-[#2c5755] focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 mb-5 text-center self-start">
                    Home
                </a>
                <div class="rounded-t flex justify-between bg-[#6eb8ab] mb-0 px-6 py-6">

                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold text-white">
                            Comment Panel
                        </h6>
                    </div>

                    <a href="./admin-panel.php" class="text-white bg-[#346968] cursor-pointer hover:bg-[#2c5755] focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 text-center">
                        Admin panel
                    </a>
                </div>
                <div class="flex-auto bg-[#5b998e] px-4 lg:px-10 py-10 pt-0">
                    <?php
                    foreach ($comments as $com) {
                        echo "<div class='flex flex-col rounded bg-[#4d7c73] justify-center px-5 py-2 my-2 text-white'>
                                      <h3 class='font-bold'>
                               {$com['email']}
                                     </h3>
                                <p class='mt-2'>
                                    {$com['text']}
                                </p>
                                <form action='./backEnd/admin/aproveComment.php' method='POST'>
                                    <input type='text' name='comment_id' value='{$com['id']}' hidden>

                                    <button type='submit' class='border-[#4d7c73] cursor-pointer border-2 px-2 py-1 mt-3 placeholder-blueGray-300 text-white bg-[#be9e32] rounded text-sm shadow focus:outline-none focus:ring w-52 text-center ease-linear transition-all duration-150'>Approve</button>
                                </form>
                                </div>";
                    }

                    ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>