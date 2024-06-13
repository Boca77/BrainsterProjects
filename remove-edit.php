<?php
include("./backEnd/Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$getAuthor = $connection->prepare("SELECT * FROM `authors`");
$getAuthor->execute();
$authors = $getAuthor->fetchAll(PDO::FETCH_ASSOC);

$getCat = $connection->prepare("SELECT * FROM `category`");
$getCat->execute();
$categories = $getCat->fetchAll(PDO::FETCH_ASSOC);

$getCat = $connection->prepare("SELECT * FROM `category`");
$getCat->execute();
$categories = $getCat->fetchAll(PDO::FETCH_ASSOC);

$getBooks = $connection->prepare("SELECT *, books.id AS book_id, books.is_del AS book_is_del
    FROM 
        books 
    JOIN 
        authors ON books.author_id = authors.id 
    JOIN 
        category ON books.category_id = category.id");
$getBooks->execute();
$books = $getBooks->fetchAll(PDO::FETCH_ASSOC);
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
                <div class="rounded-t flex justify-between bg-[#6eb8ab] mb-0 px-6 py-6">

                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold text-white">
                            Admin Panel
                        </h6>
                    </div>

                    <a href="./admin-panel.php" class="text-white bg-[#346968] cursor-pointer hover:bg-[#2c5755] focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 text-center">
                        Add Data
                    </a>


                </div>
                <div class="flex-auto bg-[#5b998e] px-4 lg:px-10 py-10 pt-0">

                    <form action="./backEnd/admin/removeBook.php" method="POST">

                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase text-white">
                            Remove/Edit Book
                        </h6>
                        <?php
                        $message = $_GET['bookMsg'] ?? '';
                        if ($message) {
                            echo "<div class='p-2 mb-3 text-white bg-[#467e74] rounded'>
                                        <p>$message</p>
                                   </div>";
                        }
                        ?>
                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white">
                                        Book
                                    </label>
                                    <select required name="book_id" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                        <option selected disabled hidden value="">Chose a book</option>
                                        <?php
                                        foreach ($books as $book) {
                                            if ($book["book_is_del"] != true) {
                                                echo "<option value='{$book['book_id']}'> {$book['title']}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 px-4">
                                <input type="submit" class="border-[#4d7c73] cursor-pointer border-2 px-3 py-3 mt-3 placeholder-blueGray-300 text-white bg-[#4f9286] rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="action" value="Remove">
                            </div>
                            <div class="w-full md:w-1/2 px-4">
                                <input type="submit" class="border-[#4d7c73] cursor-pointer border-2 px-3 py-3 mt-3 placeholder-blueGray-300 text-white bg-[#4f9286] rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="action" value="Edit">
                            </div>
                        </div>

                    </form>

                    <hr class="mt-6 border-b-1 border-blueGray-300">

                    <form action="./backEnd/admin/removeAuthor.php" method="POST">

                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase text-white">
                            Remove/Edit Author
                        </h6>
                        <?php
                        $message = $_GET['authorMsg'] ?? '';
                        if ($message) {
                            echo "<div class='p-2 mb-3 text-white bg-[#467e74] rounded'>
                                        <p>$message</p>
                                   </div>";
                        }
                        ?>
                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white">
                                        Author
                                    </label>
                                    <select required name="author_id" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                        <option selected disabled hidden value="">Chose an author</option>
                                        <?php
                                        foreach ($authors as $author) {
                                            if ($author["is_del"] != true) {
                                                echo "<option value='{$author['id']}'> {$author['first_name']} {$author['last_name']}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 px-4">
                                <input type="submit" class="border-[#4d7c73] cursor-pointer border-2 px-3 py-3 mt-3 placeholder-blueGray-300 text-white bg-[#4f9286] rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="action" value="Remove">
                            </div>
                            <div class="w-full md:w-1/2 px-4">
                                <input type="submit" class="border-[#4d7c73] cursor-pointer border-2 px-3 py-3 mt-3 placeholder-blueGray-300 text-white bg-[#4f9286] rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="action" value="Edit">
                            </div>
                        </div>

                    </form>

                    <hr class="mt-6 border-b-1 border-blueGray-300">

                    <form action="./backEnd/admin/removeCat.php" method="POST">

                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase text-white">
                            Remove/Edit Category
                        </h6>
                        <?php
                        $message = $_GET['catMsg'] ?? '';
                        if ($message) {
                            echo "<div class='p-2 mb-3 text-white bg-[#467e74] rounded'>
                                        <p>$message</p>
                                   </div>";
                        }
                        ?>
                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white">
                                        Category
                                    </label>
                                    <select required name="cat_id" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                        <option selected disabled hidden value="">Chose a category</option>
                                        <?php
                                        foreach ($categories as $category) {
                                            if ($category["is_del"] != true) {
                                                echo "<option value='{$category['id']}'> {$category['name']}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 px-4">
                                <input type="submit" class="border-[#4d7c73] cursor-pointer border-2 px-3 py-3 mt-3 placeholder-blueGray-300 text-white bg-[#4f9286] rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="action" value="Remove">
                            </div>
                            <div class="w-full md:w-1/2 px-4">
                                <input type="submit" class="border-[#4d7c73] cursor-pointer border-2 px-3 py-3 mt-3 placeholder-blueGray-300 text-white bg-[#4f9286] rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="action" value="Edit">
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
</body>

</html>