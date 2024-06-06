<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#4f867d] text-white">
    <main class="flex flex-col items-center">
        <nav class="flex w-1/5 mt-10 ">
            <div id="login-btn" class="bg-[#68b1a5] cursor-pointer text-center w-1/2 p-3 rounded-l-lg">
                <p>Login</p>
            </div>
            <div id="signup-btn" class="bg-[#487a72] cursor-pointer text-center w-1/2 p-3 rounded-r-lg">
                <p>SignUp</p>
            </div>
        </nav>

        <form id="login" class="max-w-lg max-md:mx-auto mt-20 w-full p-6 ">
            <div class="mb-10">
                <h3 class="text-4xl font-extrabold">LogIn</h3>
            </div>
            <div>
                <label class="text-[15px] mb-3 block">Username</label>
                <div class="relative flex items-center">
                    <input name="username" type="text" required class="w-full text-sm bg-gray-100 px-4 py-4 rounded-md outline-blue-600" placeholder="Enter Username" />
                </div>
            </div>
            <div class="mt-6">
                <label class="text-[15px] mb-3 block">Password</label>
                <div class="relative flex items-center">
                    <input name="password" type="password" required class="w-full text-sm text-black px-4 py-4 rounded-md outline-blue-600" placeholder="Enter password" />
                </div>
            </div>
            <div class="mt-10">
                <button type="button" class="w-full shadow-xl py-3 px-4 text-sm font-semibold rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                    Log In
                </button>
            </div>
        </form>

        <form id="signup" class="max-w-lg max-md:mx-auto mt-20 w-full p-6 hidden">
            <div class="mb-10">
                <h3 class="text-4xl font-extrabold">Sign Up</h3>
            </div>
            <div>
                <label class="text-[15px] mb-3 block">Username</label>
                <div class="relative flex items-center">
                    <input name="username" type="text" required class="w-full text-sm bg-gray-100 px-4 py-4 rounded-md outline-blue-600" placeholder="Enter Username" />
                </div>
            </div>
            <div class="mt-6">
                <label class="text-[15px] mb-3 block">Password</label>
                <div class="relative flex items-center">
                    <input name="password" type="password" required class="w-full text-sm text-black px-4 py-4 rounded-md outline-blue-600" placeholder="Enter password" />
                </div>
            </div>
            <div class="mt-10">
                <button type="button" class="w-full shadow-xl py-3 px-4 text-sm font-semibold rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                    Sign Up
                </button>
            </div>
        </form>


    </main>

    <script src="./js/signup-login-btn.js"></script>
</body>

</html>