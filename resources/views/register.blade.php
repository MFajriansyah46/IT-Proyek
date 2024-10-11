<!DOCTYPE html>
<html lang="en" class="h-full bg-white-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Register</title>
</head class="h-full">
<body>
<section class="bg-gray-100 min-h-screen flex items-center justify-center">
  <!-- register container -->
  <div class="bg-gray-50 flex flex-col rounded-2xl shadow-lg max-w-xl w-full p-5 items-center">
  <div class="flex justify-center items-center">
        <img src="/images/logo bang raja3.png" class="h-20 w-auto" alt="">
    </div>

    <h2 class="font-bold text-4xl text-center text-[#002D74]">Register</h2>
    <p class="text-xs mt-4 text-center text-[#002D74]">Create a new account to get started</p>

    <form action="" class="flex flex-col gap-4 w-full mt-8 px-8">
        <input class="p-2 rounded-xl border" type="text" name="name" placeholder="Name" required>
        <input class="p-2 rounded-xl border" type="number" name="phone_number" placeholder="Phone Number" required>
        <input class="p-2 rounded-xl border" type="text" name="username" placeholder="Username" required>
      
      <!-- Password field -->
        <div class="relative">
            <input id="password-field" class="p-2 rounded-xl border w-full" type="password" name="password" placeholder="Password" required>
            <svg id="toggle-password" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
            </svg>
        </div>
      
      <!-- Confirm Password field -->
        <div class="relative">
            <input id="confirm-password-field" class="p-2 rounded-xl border w-full" type="password" name="confirm_password" placeholder="Confirm Password" required>
            <svg id="toggle-confirm-password" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
            </svg>
        </div>

        <button class="bg-[#002D74] rounded-xl text-white py-2 mt-4 hover:scale-105 duration-300">Register</button>
    </form>

    <div class="mt-6 text-xs flex justify-between items-center text-[#002D74] w-full px-8">
        <p>Already have an account?</p>
        <a href="/login" class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">Login</a>
    </div>
  </div>
</section>

<script>
    const togglePassword = document.querySelector("#toggle-password");
    const passwordField = document.querySelector("#password-field");

    const toggleConfirmPassword = document.querySelector("#toggle-confirm-password");
    const confirmPasswordField = document.querySelector("#confirm-password-field");

    togglePassword.addEventListener("click", function () {
        const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
        passwordField.setAttribute("type", type);
    });

    toggleConfirmPassword.addEventListener("click", function () {
        const type = confirmPasswordField.getAttribute("type") === "password" ? "text" : "password";
        confirmPasswordField.setAttribute("type", type);
    });
</script>

</body>
</html>