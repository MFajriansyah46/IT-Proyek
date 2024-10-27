<x-public-layout>

  <div class="mx-auto max-w-7xl px-1 py-6 sm:px-4 lg:px-8">
    <!-- Your content -->
    @auth('tenant')
      <h1 class="font-bold text-2xl">Selamat datang {{ auth('tenant')->user()->name }} di Bang raja!</h1>
    @endauth
  </div>


</x-public-layout>