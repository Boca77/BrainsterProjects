<?php
require_once("./backEnd/Classes/GetCategory.php");

use GetCategory\GetCategory;

$getCat = new GetCategory;
$categories = $getCat->getCategoryByID($_POST["id"]);

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

                    <a href="./remove-edit.php" class="text-white bg-[#346968] cursor-pointer hover:bg-[#2c5755] focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 text-center">
                        Delete Data
                    </a>

                </div>
                <div class="flex-auto bg-[#5b998e] px-4 lg:px-10 py-10 pt-0">

                    <form action="./backEnd/admin/updateCategory.php" method="POST">

                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase text-white">
                            Add a category
                        </h6>

                        <?php
                        $message = $_GET['catMsg'] ?? '';
                        if ($message) {
                            echo "<div class='p-2 mb-3 text-white bg-[#467e74] rounded'>
                                        <p>$message</p>
                                   </div>";
                        }
                        ?>

                        <div class="w-full px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white">
                                    Category
                                </label>
                                <input type="text" required name="category" value="<?= $categories["name"] ?>" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>

                        <input type="text" value="<?= $categories['id'] ?>" name="id" hidden>

                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <input type="submit" class="border-[#4d7c73] cursor-pointer border-2 px-3 py-3 mt-3 placeholder-blueGray-300 text-white bg-[#4f9286] rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>