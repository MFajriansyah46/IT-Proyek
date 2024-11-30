<x-front-layout>
  <section class="min-h-screen flex items-center justify-center">
  <!-- login container -->
    <div class="bg-gray-50 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
      <!-- form -->
      <div class="md:w-1/2 px-8 md:px-16">
          
        <div class="flex justify-center items-center mb-6">
          <img src="/images/logo bang raja3.png" class="h-24 w-auto" alt="">
        </div>

        <h2 class="font-bold text-4xl text-center text-[#002D74]">Login</h2>
        <p class="text-xs mt-4 text-center text-[#002D74]">If you are already a member, easily log in</p>

        <form action="/authentication" method="POST" class="flex flex-col gap-4">
          @csrf
          <input type="hidden" name="guard" value="tenant">
          <input class="p-2 mt-8 rounded-xl border" type="hidden" name="guard" value="tenant">
          <input class="p-2 mt-8 rounded-xl border" type="text" name="username" placeholder="Username">
          <div class="relative">
            <input id="password-field" class="p-2 rounded-xl border w-full" type="password" name="password" placeholder="Password">
            <svg id="toggle-password" xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer" viewBox="0 0 16 16">
              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
              <path class="eye-slashed" fill="#a1a1a1" fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0"/>
            </svg>
          </div>
          <button class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Login</button>
        </form>

        <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
          <hr class="border-gray-400">
          <p class="text-center text-sm">OR</p>
          <hr class="border-gray-400">
        </div>

        <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
          <p>Don't have an account?</p>
          <a href="/register" class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">Register</a>
          </div>
      </div>
      <!-- image -->
      <div class="md:block hidden w-1/2">
        <img class="rounded-2xl" id="login-image" src="/images/loginImage.JPG">
      </div>
    </div>
  </section>
</x-front-layout>