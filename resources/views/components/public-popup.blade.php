  <!-- Edit profile-->
  @auth('tenant')
    <div id="tenantProfile" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
      <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-lg mx-auto mt-40">
        <!-- Close button -->
        <div class="-mt-6 -mr-6 flex justify-end">
            <button id="closeTenantProfileBtn" class="p-1 hover:bg-gray-100 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.8rem" height="1.8rem" viewBox="0 0 1024 1024"><path fill="#a3a3a3" d="M195.2 195.2a64 64 0 0 1 90.496 0L512 421.504L738.304 195.2a64 64 0 0 1 90.496 90.496L602.496 512L828.8 738.304a64 64 0 0 1-90.496 90.496L512 602.496L285.696 828.8a64 64 0 0 1-90.496-90.496L421.504 512L195.2 285.696a64 64 0 0 1 0-90.496"/></svg>
            </button>
        </div>

        <form method="post" action="/edit-profile" id="edit-profile-form" enctype="multipart/form-data">
          @csrf
          <div class="flex flex-col items-center justify-center">
              <div class="relative">
                  @if (auth('tenant')->user()->image)
                      <img class="w-28 h-28 rounded-full border object-cover" id="profileImage" src="/storage/{{ auth('tenant')->user()->image }}" alt=".">
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
              @error('image') <small class="text-red-500">{{ $message }}</small> @enderror
          </div>

          <div class="flex justify-center items-center">
              <input type="text" name="username" class="border-0 focus:disoutline focus:underline text-center text-2xl text-gray-800 font-medium " value="{{auth('tenant')->user()->username}}">
              @error('username') <small class="text-red-500">{{ $message }}</small> @enderror
          </div>

          <div class="flex justify-between items-center">
            <label class="text-gray-600 text-sm font-semibold">Name</label>
            <input type="text" name="name" class="border-0 focus:disoutline focus:underline text-gray-800 font-medium" value="{{ auth('tenant')->user()->name }}">
            @error('name') <small class="text-red-500">{{ $message }}</small> @enderror
          </div>

          <div class="flex justify-between items-center">
            <label class="text-gray-600 text-sm font-semibold">Phone Number</label>
            <input type="number" name="phone_number" class="border-0 focus:disoutline focus:underline text-gray-800 font-medium" value="{{ auth('tenant')->user()->phone_number }}">
            @error('phone_number') <small class="text-red-500">{{ $message }}</small> @enderror
          </div>

          <p id="reset-password" class="mt-4 text-center text-primary-500 cursor-pointer">Reset password</p>
          <p id="hide-form-reset" class="mt-4 text-center text-primary-500 cursor-pointer hidden">Cancel Reset Password</p>

          <div id="reset-password-form" class="hidden">
              <div>
                  <label for="password" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
                  <div class="mt-2">
                      <input id="password" name="password" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                  @error('password') <small class="text-red-500">{{ $message }}</small> @enderror
              </div>
              <div>
                  <label for="confirm-password" class="block text-sm font-medium leading-6 text-gray-900 mt-4">Confirm Password</label>
                  <div class="mt-2">
                      <input id="confirm-password" name="confirm_password" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
              </div>
          </div>
          @if (session()->has('password-confirm-error'))
            <small class="text-center text-red-500">{{ session('password-confirm-error') }}</small>
          @endif
          <button type="button" id="edit-profile-button" class="w-full mt-4 bg-primary-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-primary-400 focus:outline-none">Edit</button>
        </form>
      </div>
    </div>
  @endauth

  <!-- Modal edit profile-->
  <div id="confirmation-edit-profile" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 bg-black bg-opacity-50 justify-center flex items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
      <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
        <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" id="close-modal-edit-profile">
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
        <svg class="text-gray-400 dark:text-gray-500 w-16 h-auto my-6 mx-auto" xmlns="http://www.w3.org/2000/svg" width="1.8rem" height="1.8rem" viewBox="0 0 32 32"><path fill="#999999" d="M25 4.031c-.766 0-1.516.297-2.094.875L13 14.781l-.219.219l-.062.313l-.688 3.5l-.312 1.468l1.469-.312l3.5-.688l.312-.062l.219-.219l9.875-9.906A2.968 2.968 0 0 0 25 4.03zm0 1.938c.234 0 .465.12.688.343c.445.446.445.93 0 1.375L16 17.376l-1.719.344l.344-1.719l9.688-9.688c.222-.222.453-.343.687-.343zM4 8v20h20V14.812l-2 2V26H6V10h9.188l2-2z"/></svg>
        <p class="mb-4 text-lg text-gray-600 dark:text-gray-300">Are you sure you want to edit your profile?</p>
        <div class="flex justify-center items-center space-x-4">
          <button id="confirm-edit-profile" type="button" class="py-2 px-3 text-sm font-medium text-center text-white bg-primary-500 rounded-lg hover:bg-rimary-600 focus:ring-4 focus:outline-none focus:ring-primary-200 dark:bg-primary-400 dark:hover:bg-primary-500 dark:focus:ring-primary-800">Yes, I'm sure</button>
          <button id="cancel-edit-profile" type="button" class="py-2 px-3 text-sm font-medium text-gray-600 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!-- modal discard -->
  <div id="confirmation-discard" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 bg-black bg-opacity-50 justify-center flex items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
      <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
        <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" id="close-modal-discard">
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
        <svg class="text-gray-400 dark:text-gray-500 w-16 h-auto my-6 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="5rem" height="5rem" viewBox="0 0 16 16"><path fill="#969696" fill-rule="evenodd" d="M3.5 2v3.5L4 6h3.5V5H4.979l.941-.941a3.552 3.552 0 1 1 5.023 5.023L5.746 14.28l.72.72l5.198-5.198A4.57 4.57 0 0 0 5.2 3.339l-.7.7V2z" clip-rule="evenodd"/></svg>
        <p class="mb-4 text-lg text-gray-600 dark:text-gray-300">Are you sure you want to discard your rental room now? This action will remove your status as a room tenant.</p>
        <div class="flex justify-center items-center space-x-4">
          <button id="confirm-discard" type="button" class="py-2 px-3 text-sm font-medium rounded-lg text-center text-white bg-red-600  hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Yes, I'm sure</button>
          <button id="cancel-discard" type="button" class="py-2 px-3 text-sm font-medium text-gray-600 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
        </div>
      </div>
    </div>
  </div>
  @if (session()->has('payment-success')) 
  <ul class="fixed top-20 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-md bg-white text-gray-600 font-medium shadow-lg border max-w-lg flex px-4 py-6 gap-8" id="login-eror">
    <li class="my-auto text-lg">
      {{ session('payment-success') }}
    </li>
    <li class="my-auto ml-auto">
      <button class="ml-auto hover:bg-gray-200 rounded-md justify-center" id="button-login-eror">
        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </li>
  </ul>
  @endif
  <ul id="payment-confirm" class="hidden fixed top-20 left-1/2 transform -translate-x-1/2 rounded-md bg-white text-gray-600 font-medium shadow-lg border max-w-lg flex px-4 py-6 gap-8">
    <li class="my-auto text-lg">
      Payment confirmed by owner
    </li>
    <li class="my-auto ml-auto">
      <button class="ml-auto hover:bg-gray-200 rounded-md justify-center" id="button-login-eror">
        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </li>
  </ul>
  <!-- Modal AddRoommate-->
  <div id="addRoommateModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-100 relative" onclick="event.stopPropagation()">
        <h2 class="text-xl font-semibold text-center mb-4">Add Roommate</h2>
        <form method="POST" action="{{ route('roommate.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="flex flex-col items-center justify-center mb-4">
            <div class="relative">
              <img class="w-32 h-32 rounded-full border object-cover" id="previewProfilePhoto" src="/images/default-profile.jpg" alt="">
              <label class="absolute bottom-0 right-0 bg-gray-800 text-white opacity-55 p-1 rounded-full cursor-pointer hover:bg-gray-400">
                <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill="#ffffff" d="M8.123 2a1.5 1.5 0 0 0-1.34.826L6.193 4h-1.69a2.5 2.5 0 0 0-2.5 2.5v8a2.5 2.5 0 0 0 2.5 2.5h3.5q.012-.171.055-.347l.375-1.498c.116-.464.335-.896.639-1.263A4.002 4.002 0 0 1 9.999 6a4 4 0 0 1 3.888 3.056l.216-.215a2.87 2.87 0 0 1 3.9-.147V6.499a2.5 2.5 0 0 0-2.5-2.5h-1.689l-.585-1.17A1.5 1.5 0 0 0 11.887 2zM13 9.945a3 3 0 1 0-3.055 3.054zm1.81-.397l-4.83 4.83a2.2 2.2 0 0 0-.577 1.02l-.375 1.498a.89.89 0 0 0 1.079 1.078l1.498-.374a2.2 2.2 0 0 0 1.02-.578l4.83-4.83a1.87 1.87 0 0 0-2.645-2.644"/>
                </svg>
                <input name="profile_photo" id="profile_photo" type="file" class="hidden" accept="image/*" id="fileInput">
              </label>
            </div>
          </div>
          <div class="mb-4">
              <label class="block text-sm font-semibold text-gray-700 mb-1" for="name">Name</label>
              <input type="text" name="name" id="name" class="w-full border px-3 py-2 rounded-lg" required>
          </div>
          <div class="mb-4">
              <label class="block text-sm font-semibold text-gray-700 mb-1" for="phone_number">Phone Number</label>
              <input type="text" name="phone_number" id="phone_number" class="w-full border px-3 py-2 rounded-lg" required>
          </div>

          <div class="text-center">
              <button type="submit" class="w-full rounded-md bg-blue-500 py-2 text-sm font-semibold text-white hover:bg-blue-600">Add Roommate</button>
          </div>

          <button onclick="toggleModal()" id="closeModalButton" class="absolute top-2 right-6 text-gray-500 text-3xl hover:text-gray-700">
              &times;
          </button>
        </form>
      </div>
  </div>
  <!-- Delete Confirmation Modal -->
  <div id="deleteRoommateModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 bg-black bg-opacity-50 justify-center flex items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <button type="button" id="closeDeleteModal" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <svg class="text-gray-400 dark:text-gray-500 w-16 h-auto my-6 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill="#969696" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
            </svg>
            <p class="mb-4 text-lg text-gray-600 dark:text-gray-300">Are you sure you want to remove this roommate?</p>
            <div class="flex justify-center items-center space-x-4">
                <form action="{{ route('roommate.delete') }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Yes, I'm sure
                    </button>
                </form>
                <button id="cancelDelete" type="button" class="py-2 px-3 text-sm font-medium text-gray-600 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    No, cancel
                </button>
            </div>
        </div>
    </div>
  </div>
@if (session()->has('success'))
  <ul class="fixed top-16 left-1/2 transform -translate-x-1/2 rounded-md bg-white text-gray-600 font-medium shadow-sm max-w-md flex px-4 py-6 gap-8" id="popup-success">
    <li class="my-auto text-lg">
      {{ session('success') }}
    </li>
    <li class="my-auto ml-auto">
      <button class="ml-auto text-gray-400 hover:bg-gray-200 rounded-md justify-center" id="button-success">
        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </li>
  </ul>
@endif

@if (session()->has('failed'))
  <ul class="fixed top-16 left-1/2 transform -translate-x-1/2 rounded-md bg-white text-gray-600 font-medium shadow-sm max-w-md flex px-4 py-6 gap-8" id="popup-success">
    <li class="my-auto text-lg text-red-600">
      {{ session('failed') }}
    </li>
    <li class="my-auto ml-auto">
      <button class="ml-auto text-gray-400 hover:bg-gray-200 rounded-md justify-center" id="button-success">
        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </li>
  </ul>
@endif