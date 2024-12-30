<x-front-layout>

  <div class="flex max-w-md mx-auto mt-16 flex-col justify-center px-6 py-12 lg:px-8 bg-white shadow-md rounded-lg">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img src="/images/logo bang raja3.png" class="h-32 w-auto mx-auto" alt="">
      <h2 class="mt-4 text-center text-2xl leading-9 tracking-tight text-gray-900">Login into your account as owner</h2>
    </div>
  
    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="flex flex-col gap-6 w-full mt-8" action="/authentication" method="POST">
        @csrf
        <input type="hidden" name="guard" value="owner">
        <input class="p-2 rounded-xl border" type="text" name="username" placeholder="Username" required>
        <div class="relative">
            <input id="password-field-owner-login" class="p-2 rounded-xl border w-full" type="password" name="password" placeholder="Password" required>
            <svg id="toggle-password-owner-login" xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                <path class="eye-slashed" fill="#a1a1a1" fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0"/>
            </svg>
        </div>
        <br>
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
        </div>
      </form>
    </div>
  </div>
</x-front-layout>