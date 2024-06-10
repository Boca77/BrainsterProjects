<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#4f867d]">
    <section class=" py-1 bg-blueGray-50">
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-[#6eb8ab] mb-0 px-6 py-6">

                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold text-white">
                            Admin Panel
                        </h6>
                    </div>

                </div>
                <div class="flex-auto bg-[#5b998e] px-4 lg:px-10 py-10 pt-0">

                    <form action="">

                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase text-white">
                            Add a book
                        </h6>

                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white">
                                        Book Title
                                    </label>
                                    <input type="text" required name="book_title" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white">
                                        Author
                                    </label>
                                    <input type="text" required name="author" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white">
                                        Year Published
                                    </label>
                                    <input type="number" required name="year_published" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white">
                                        Number of pages
                                    </label>
                                    <input type="text" required name="number_pages" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white">
                                        Book Cover Photo
                                    </label>
                                    <input type="text" required name="cover_photo" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white">
                                        Category
                                    </label>
                                    <input type="text" required name="category" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <input type="submit" class="border-[#355c55] cursor-pointer border-2 px-3 py-3 mt-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>

                    </form>

                    <hr class="mt-6 border-b-1 border-blueGray-300">

                    <form action="">

                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase text-white">
                            Add an Author
                        </h6>

                        <div class="flex flex-wrap">

                            <div class="w-full lg:w-1/2 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white">
                                        Name
                                    </label>
                                    <input type="text" required name="author_name" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                            </div>

                            <div class="w-full lg:w-1/2 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white">
                                        Surname
                                    </label>
                                    <input type="text" required name="author_surname" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                            </div>

                            <div class="w-full lg:w-12/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white">
                                        Author Biography
                                    </label>
                                    <textarea type="text" name="biography" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" rows="2"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <input type="submit" class="border-[#355c55] cursor-pointer border-2 px-3 py-3 mt-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>

                    </form>

                    <hr class="mt-6 border-b-1 border-blueGray-300">

                    <form action="">

                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase text-white">
                            Add/Edit/Delete a category
                        </h6>

                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-white">
                                    Category
                                </label>
                                <input type="text" required name="book_title" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <input type="submit" class="border-[#355c55] cursor-pointer border-2 px-3 py-3 mt-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
</body>

</html>