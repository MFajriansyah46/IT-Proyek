<!-- owner profile -->

<div id="profileOverlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-lg shadow-lg p-8 w-100">

  <!-- Close button -->
    <div class="-mt-6 -mr-6 flex justify-end">
      <button id="closeProfileBtn" class="p-1 hover:bg-gray-100 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" width="1.8rem" height="1.8rem" viewBox="0 0 1024 1024"><path fill="#a3a3a3" d="M195.2 195.2a64 64 0 0 1 90.496 0L512 421.504L738.304 195.2a64 64 0 0 1 90.496 90.496L602.496 512L828.8 738.304a64 64 0 0 1-90.496 90.496L512 602.496L285.696 828.8a64 64 0 0 1-90.496-90.496L421.504 512L195.2 285.696a64 64 0 0 1 0-90.496"/></svg>
      </button>
    </div>

    <form method="post" action="" enctype="multipart/form-data">
      <div class="flex flex-col items-center justify-center">
        <div class="relative">
          @if (auth()->user()->image)
            <img class="w-28 h-28 rounded-full border object-cover" id="profileImage" src="/storage/{{ auth()->user()->image }}" alt=".">
          @else
            <img class="w-32 h-32 rounded-full border object-cover" id="profileImage" src="/images/default-profile.jpg" alt="">
          @endif
          <label class="absolute bottom-0 right-0 bg-gray-800 text-white opacity-55 p-1 rounded-full cursor-pointer hover:bg-gray-400">
            <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path fill="#ffffff" d="M8.123 2a1.5 1.5 0 0 0-1.34.826L6.193 4h-1.69a2.5 2.5 0 0 0-2.5 2.5v8a2.5 2.5 0 0 0 2.5 2.5h3.5q.012-.171.055-.347l.375-1.498c.116-.464.335-.896.639-1.263A4.002 4.002 0 0 1 9.999 6a4 4 0 0 1 3.888 3.056l.216-.215a2.87 2.87 0 0 1 3.9-.147V6.499a2.5 2.5 0 0 0-2.5-2.5h-1.689l-.585-1.17A1.5 1.5 0 0 0 11.887 2zM13 9.945a3 3 0 1 0-3.055 3.054zm1.81-.397l-4.83 4.83a2.2 2.2 0 0 0-.577 1.02l-.375 1.498a.89.89 0 0 0 1.079 1.078l1.498-.374a2.2 2.2 0 0 0 1.02-.578l4.83-4.83a1.87 1.87 0 0 0-2.645-2.644"/>
            </svg>
            <input name="image" type="file" class="hidden" accept="image/*" id="fileInput">
          </label>
        </div>
      </div>

      <div class="flex justify-center items-center">
        <input type="text" class="border-0 focus:disoutline focus:underline text-center text-2xl text-gray-800 font-medium " value="{{auth()->user()->username}}" >
      </div>

      <div class="flex justify-between items-center">
        <label class="text-gray-600 text-sm font-semibold">Name</label>
        <input type="text" class="border-0 focus:disoutline focus:underline text-gray-800 font-medium" value="{{ auth()->user()->name }}">
      </div>

      <div class="flex justify-between items-center">
        <label class="text-gray-600 text-sm font-semibold">Phone Number</label>
        <input type="text" class="border-0 focus:disoutline focus:underline text-gray-800 font-medium" value="{{ auth()->user()->phone_number }}">
      </div>

      <div class="flex justify-between items-center">
        <label class="text-gray-600 text-sm font-semibold">Bank Account Number</label>
        <input type="text" class="border-0 focus:disoutline focus:underline text-gray-800 font-medium" value="{{ auth()->user()->rekening_number }}">
      </div>

    </form><br>
  </div>
</div>





<!-- Modal delete user-->
<div id="confirmation-delete-user" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 bg-black bg-opacity-50 justify-center flex items-center w-full md:inset-0 h-modal md:h-full">
  <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
    <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
      <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" id="close-modal">
        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
      <svg class="text-gray-400 dark:text-gray-500 w-16 h-auto my-6 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill="#969696" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
      </svg>
      <p class="mb-4 text-lg text-gray-600 dark:text-gray-300">Are you sure you want to delete this user?</p>
      <div class="flex justify-center items-center space-x-4">
        <button id="confirm-delete" type="button"
          class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Yes,
          I'm sure</button>
        <button id="cancel-delete" type="button"
          class="py-2 px-3 text-sm font-medium text-gray-600 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
          cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal delete room-->
<div id="confirmation-delete-room" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 bg-black bg-opacity-50 justify-center flex items-center w-full md:inset-0 h-modal md:h-full">
  <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
    <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
      <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" id="close-modal">
        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
      <svg class="text-gray-400 dark:text-gray-500 w-16 h-auto my-6 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill="#969696" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
      </svg>
      <p class="mb-4 text-lg text-gray-600 dark:text-gray-300">Are you sure you want to delete this user?</p>
      <div class="flex justify-center items-center space-x-4">
        <button id="confirm-delete-room" type="button"
          class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Yes,
          I'm sure</button>
        <button id="cancel-delete-room" type="button"
          class="py-2 px-3 text-sm font-medium text-gray-600 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
          cancel</button>
      </div>
    </div>
  </div>
</div>
