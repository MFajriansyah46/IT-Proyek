<x-front-layout>
  <section class="min-h-screen flex items-center justify-center">
    <!-- Login Container -->
    <div class="bg-gray-50 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
      <!-- Form -->
      <div class="md:w-1/2 px-8 md:px-16">
        <div class="flex justify-center items-center mb-6">
          <img src="/images/logo bang raja3.png" class="h-24 w-auto" alt="Logo Bang Raja">
        </div>

        <h2 class="font-bold text-4xl text-center text-[#002D74]">Login</h2>
        <p class="text-xs mt-4 text-center text-[#002D74]">
          If you are already a member, easily log in
        </p>

        <form action="/authentication" method="POST" class="flex flex-col gap-4">
          @csrf
          <input type="hidden" name="guard" value="tenant">
          <input class="p-2 mt-8 rounded-xl border" type="text" name="username" placeholder="Username" required>
          <div class="relative">
            <!-- Input Password -->
            <input 
              id="password-field" 
              class="p-2 rounded-xl border w-full" 
              type="password" 
              name="password" 
              placeholder="Password" 
              required
            >
          
            <!-- Label dan Checkbox untuk Toggle -->
            <label class="absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer">
              <!-- Checkbox tersembunyi untuk toggle password -->
              <input 
                type="checkbox" 
                class="hidden peer"
                onchange="this.form.password.type = this.checked ? 'text' : 'password';"
              >
          
              <!-- Ikon Mata Terbuka dengan Garis Miring -->
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                width="20" 
                height="20" 
                fill="currentColor" 
                class="peer-checked:hidden bi bi-eye"
                viewBox="0 0 16 16"
              >
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5z" />
                <!-- Garis Miring pada Ikon Mata Terbuka -->
                <path 
                  class="text-gray-400" 
                  d="M3 3L13 13" 
                  stroke="currentColor" 
                  stroke-width="1.5"
                  stroke-linecap="round" 
                />
              </svg>
          
              <!-- Ikon Mata Tertutup (akan muncul saat checkbox dicentang) -->
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                width="20" 
                height="20" 
                fill="currentColor" 
                class="hidden peer-checked:block bi bi-eye-slash"
                viewBox="0 0 16 16"
              >
                <path d="M13.359 11.238l2.387 2.387a1 1 0 0 1-1.415 1.415l-2.296-2.296c-1.08.593-2.396.943-4.035.943-3.638 0-6.642-2.98-7.646-4.687a.918.918 0 0 1 0-.924C2.358 5.88 5.362 2.899 9 2.899c1.64 0 2.955.35 4.035.943l2.296-2.296a1 1 0 0 1 1.415 1.415l-2.387 2.387a13.134 13.134 0 0 1 1.684 2.347.918.918 0 0 1 0 .924 13.134 13.134 0 0 1-1.684 2.347zM9 10.899a2.899 2.899 0 1 0 0-5.798 2.899 2.899 0 0 0 0 5.798z" />
              </svg>
            </label>
          </div>
          
          
          <button class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">
            Login
          </button>
        </form>

        <!-- Divider -->
        <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
          <hr class="border-gray-400">
          <p class="text-center text-sm">OR</p>
          <hr class="border-gray-400">
        </div>

        <!-- Login with Google -->
        <a href="{{ url('/auth/redirect')  }}" class="mt-3 bg-red-500 rounded-xl text-white py-2 hover:scale-105 duration-300 flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
            <path d="M8.16 6.92v2.28h3.72c-.16 1.2-1.16 3.48-3.72 3.48-2.24 0-4.08-1.84-4.08-4.08s1.84-4.08 4.08-4.08c1.28 0 2.12.56 2.6 1.04l1.92-1.88C11.52 2.12 10.04 1.5 8.16 1.5 4.76 1.5 2 4.26 2 7.66s2.76 6.16 6.16 6.16c3.68 0 6.12-2.56 6.12-6.16 0-.4 0-.72-.08-1.08H8.16z"/>
          </svg>
          <span>Login with Google</span>
        </a>

        <!-- Register Link -->
        <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
          <p>Don't have an account?</p>
          <a href="/register" class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">
            Register
          </a>
        </div>
      </div>

      <!-- Image Section -->
      <div class="md:block hidden w-1/2">
        <img class="rounded-2xl" id="login-image" src="/images/loginImage.JPG" alt="Login Image">
      </div>
    </div>
  </section>
</x-front-layout>
