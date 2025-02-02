import 'flowbite';
import './bootstrap';


$(document).ready(function() {
    $('#room-description').on('keydown', function(event) {
    if (event.key === 'Tab') {
        event.preventDefault(); // Mencegah fungsi Tab default

        // Mendapatkan posisi kursor
        const start = this.selectionStart;
        const end = this.selectionEnd;

        // Menyisipkan karakter Tab
        $(this).val(function(index, value) {
        return value.substring(0, start) + '\t' + value.substring(end);
        });

        // Menempatkan kembali kursor setelah karakter Tab
        this.selectionStart = this.selectionEnd = start + 1;
    }
    });
});

$(document).ready(function(){
    $('#button-login-eror').click(function(){
        $('#login-eror').hide();
    });
});

$(document).ready(function(){
    $('#button-success').click(function(){
        $('#popup-success').hide();
    });
});

$(document).ready(function(){
    $('#buttonBar').click(function(){
        $('#fullBar').fadeToggle(10);
        $(this).toggleClass('bg-gray-200');
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var fileInput = document.getElementById('fileInput');
    var profileImage = document.getElementById('profileImage');

    fileInput.addEventListener('change', function (event) {
        var output = profileImage;
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // Free memory
        }
    });
});

$(document).ready(function () {
    // Toggle dropdown menu when the button is clicked
    $('#menu-button').on('click', function (event) {
      event.stopPropagation(); // Prevent the event from bubbling up
      $(this).next('div[role="menu"]').toggle(); // Show/hide the menu
    });

    // Close the dropdown menu if clicking outside of it
    $(document).on('click', function (event) {
      if (!$(event.target).closest('#menu-button').length) {
        $('div[role="menu"]').hide(); // Hide the dropdown
      }
    });
});

$(document).ready(function () {
    // Toggle dropdown menu when the button is clicked
    $('#profile-button').on('click', function (event) {
      event.stopPropagation(); // Prevent the event from bubbling up
      $(this).next('div[role="menu"]').toggle(); // Show/hide the menu
    });

    // Close the dropdown menu if clicking outside of it
    $(document).on('click', function (event) {
      if (!$(event.target).closest('#profile-button').length) {
        $('div[role="menu"]').hide(); // Hide the dropdown
      }
    });
});

$(document).ready(function(){
    $('#desc-area-my-room').addClass('max-h-22');
    $('#buttom-arrow').addClass('hidden');
    $('#more-desc-my-room').click(function(){
        $('#desc-area-my-room').toggleClass('max-h-22 -mb-4');
        $('#right-arrow').toggleClass('hidden');
        $('#buttom-arrow').toggleClass('hidden');
    });
});

$('#openProfileBtn').on('click', function() {
    $('#profileOverlay').removeClass('hidden');
});

  // Hide the profile overlay
$('#closeProfileBtn').on('click', function() {
    $('#profileOverlay').addClass('hidden');
});

$(document).ready(function() {
    // Show profile modal
    $('#tenantProfileBtn').on('click', function() {
        $('#tenantProfile').show();
    });

    // Close profile modal
    $('#closeTenantProfileBtn').on('click', function() {
        $('#tenantProfile').hide();
    });
});

// Modal edit profile
$(document).ready(function () {
    // Saat tombol edit ditekan, tampilkan modal
    $('#edit-profile-button').on('click', function () {
        $('#confirmation-edit-profile').removeClass('hidden');
    });

    // Saat tombol "No, cancel" ditekan, sembunyikan modal
    $('#cancel-edit-profile, #close-modal-edit-profile').on('click', function () {
        $('#confirmation-edit-profile').addClass('hidden');
    });

    // Saat tombol "Yes, I'm sure" ditekan, kirim form
    $('#confirm-edit-profile').on('click', function () {
        $('#edit-profile-form').submit();
    });
});

// Modal edit user
$(document).ready(function () {
    // Saat tombol edit ditekan, tampilkan modal
    $('#edit-user-button').on('click', function () {
        $('#confirmation-edit-user').removeClass('hidden');
    });

    // Saat tombol "No, cancel" ditekan, sembunyikan modal
    $('#cancel-edit-user, #close-modal').on('click', function () {
        $('#confirmation-edit-user').addClass('hidden');
    });

    // Saat tombol "Yes, I'm sure" ditekan, kirim form
    $('#confirm-edit-user').on('click', function () {
        $('#user-edit-form').submit();
    });
});

// Modal delete user
$(document).ready(function () {
    // Saat tombol hapus ditekan, tampilkan modal
    $('.delete-user-button').on('click', function () {
        var userId = $(this).data('user-id');
        $('#confirmation-delete-user').data('user-id', userId).removeClass('hidden');
    });

    // Saat tombol "No, cancel" ditekan, sembunyikan modal
    $('#cancel-delete, #close-modal').on('click', function () {
        $('#confirmation-delete-user').addClass('hidden');
    });

    // Saat tombol "Yes, I'm sure" ditekan, kirim form berdasarkan user id
    $('#confirm-delete').on('click', function () {
        var userId = $('#confirmation-delete-user').data('user-id');
        $('form[data-user-id="' + userId + '"]').submit();
    });
});

// Modal add building
$(document).ready(function () {
    // Saat tombol edit ditekan, tampilkan modal
    $('#add-building-button').on('click', function () {
        $('#confirmation-add-building').removeClass('hidden');
    });

    // Saat tombol "No, cancel" ditekan, sembunyikan modal
    $('#cancel-add-building, #close-modal-add-building').on('click', function () {
        $('#confirmation-add-building').addClass('hidden');
    });

    // Saat tombol "Yes, I'm sure" ditekan, kirim form
    $('#confirm-add-building').on('click', function () {
        $('#building-add-form').submit();
    });
});

// Modal edit building
$(document).ready(function () {
    // Saat tombol edit ditekan, tampilkan modal
    $('#edit-building-button').on('click', function () {
        $('#confirmation-edit-building').removeClass('hidden');
    });

    // Saat tombol "No, cancel" ditekan, sembunyikan modal
    $('#cancel-edit-building, #close-modal-edit-building').on('click', function () {
        $('#confirmation-edit-building').addClass('hidden');
    });

    // Saat tombol "Yes, I'm sure" ditekan, kirim form
    $('#confirm-edit-building').on('click', function () {
        $('#building-edit-form').submit();
    });
});

// Modal delete building
$(document).ready(function () {
    // Show the confirmation modal when the delete button is pressed
    $('.delete-building-button').on('click', function () {
        var buildingId = $(this).data('building-id');
        $('#confirmation-delete-building').data('building-id', buildingId).removeClass('hidden');
    });

    // Hide the modal when "No, cancel" is clicked
    $('#cancel-delete-building, #close-modal-delete-building').on('click', function () {
        $('#confirmation-delete-building').addClass('hidden');
    });

    // Submit the appropriate form when "Yes, I'm sure" is clicked
    $('#confirm-delete-building').on('click', function () {
        var buildingId = $('#confirmation-delete-building').data('building-id');
        $('form[data-building-id="' + buildingId + '"]').submit();
    });
});

$(document).ready(function () {
    // Saat tombol "Save" pada form ditekan, tampilkan modal konfirmasi
    $('#add-room-button').on('click', function () {
        $('#confirmation-add-room').removeClass('hidden');  // Menampilkan modal konfirmasi
    });

    // Saat tombol "No, cancel" atau tombol close modal ditekan, sembunyikan modal
    $('#cancel-add-room, #close-modal-add-room').on('click', function () {
        $('#confirmation-add-room').addClass('hidden');  // Menyembunyikan modal
    });

    // Saat tombol "Yes, I'm sure" ditekan, kirim form
    $('#confirm-add-room').on('click', function () {
        $('#add-room-form').submit();  // Submit form
    });
});


// Modal edit room
$(document).ready(function () {
    // Tampilkan modal edit saat tombol edit ditekan
    $('#edit-room-button').on('click', function () {
        $('#confirmation-edit-room').removeClass('hidden');
    });

    // Sembunyikan modal saat tombol "No, cancel" atau "Close" ditekan
    $('#cancel-edit-room, #close-modal-edit-room').on('click', function () {
        $('#confirmation-edit-room').addClass('hidden');
    });

    // Kirim form saat tombol "Yes, I'm sure" ditekan
    $('#confirm-edit-room').on('click', function () {
        $('#room-edit-form').off('submit'); // Matikan preventDefault jika ada
        $('#room-edit-form').submit();
    });
});

// Modal edit room
$(document).ready(function () {
    // Saat tombol submit ditekan, tampilkan modal konfirmasi
    $('#edit-room-button').on('click', function (e) {
        e.preventDefault(); // Cegah form untuk langsung dikirim

        // Tampilkan modal konfirmasi
        $('#confirmation-edit-room').removeClass('hidden');
    });

    // Saat tombol "No, cancel" ditekan pada modal, sembunyikan modal
    $('#cancel-edit-room, #close-modal-edit-room').on('click', function () {
        $('#confirmation-edit-room').addClass('hidden');
    });

    // Saat tombol "Yes, I'm sure" ditekan pada modal, kirim form
    $('#confirm-edit-room').on('click', function () {
        $('#form-edit-room').submit(); // Kirim form setelah konfirmasi
    });
});

// Modal delete room
$(document).ready(function () {
    let roomId = null;

    // Tampilkan modal dan ambil ID kamar yang dipilih
    $('.delete-room-button').on('click', function () {
        roomId = $(this).data('room-id');
        $('#confirmation-delete-room').removeClass('hidden');
    });

    // Sembunyikan modal saat tombol "No, cancel" atau "Close" ditekan
    $('#cancel-delete-room, #close-modal-room').on('click', function () {
        $('#confirmation-delete-room').addClass('hidden');
        roomId = null;
    });

    // Submit form dengan ID kamar yang dipilih saat "Yes, I'm sure" diklik
    $('#confirm-delete-room').on('click', function () {
        if (roomId) {
            $(`#form-delete-${roomId}`).submit();
        }
    });
});

// Modal confirmation transaction
$(document).ready(function () {
    let transactionId = null;

    // Show modal and get the selected room ID
    $('.confirmation-transaction-form button').on('click', function () {
        transactionId = $(this).closest('.confirmation-transaction-form').data('transaction-id');
        $('#confirmation-transaction').removeClass('hidden');
    });

    // Hide modal when "No, cancel" or "Close" is clicked
    $('#cancel-transaction, #close-modal-transaction').on('click', function () {
        $('#confirmation-transaction').addClass('hidden');
        transactionId = null;
    });

    // Submit form with the selected room ID when "Yes, I'm sure" is clicked
    $('#confirm-transaction').on('click', function () {
        if (transactionId) {
            $(`.confirmation-transaction-form[data-transaction-id="${transactionId}"]`).submit(); // Use the data attribute to find the correct form
        }
    });
});

// Modal discard rent
$(document).ready(function () {
    let roomId = null;

    // Tampilkan modal dan ambil ID kamar yang dipilih
    $('.discard-rent-button').on('click', function () {
        roomId = $(this).data('room-id');
        $('#confirmation-discard-rent').removeClass('hidden');
    });

    // Sembunyikan modal saat tombol "No, cancel" atau "Close" ditekan
    $('#cancel-discard-rent, #close-modal-rent').on('click', function () {
        $('#confirmation-discard-rent').addClass('hidden');
        roomId = null;
    });

    // Submit form dengan ID kamar yang dipilih saat "Yes, I'm sure" diklik
    $('#confirm-discard-rent').on('click', function () {
        if (roomId) {
            $(`#form-delete-${roomId}`).submit(); // Tambahkan backtick untuk template literal
        }
    });
});

// Modal discard rent tenant
$(document).ready(function () {
    // Tampilkan modal edit saat tombol edit ditekan
    $('#discard-button').on('click', function () {
        $('#confirmation-discard').removeClass('hidden');
    });

    // Sembunyikan modal saat tombol "No, cancel" atau "Close" ditekan
    $('#cancel-discard, #close-modal-discard').on('click', function () {
        $('#confirmation-discard').addClass('hidden');
    });

    // Kirim form saat tombol "Yes, I'm sure" ditekan
    $('#confirm-discard').on('click', function () {
        $('#discard-form').submit();
    });
});


$(document).ready(function() {
    const togglePassword = $("#toggle-password");
    const passwordField = $("#password-field");

    togglePassword.on("click", function() {
        // toggle the type attribute
        const type = passwordField.attr("type") === "password" ? "text" : "password";
        passwordField.attr("type", type);
    });

    $("#toggle-password").click(function(){
        $('.eye-slashed').toggleClass('hidden');
    });
});

$(document).ready(function() {
    const togglePassword = $("#toggle-password-owner-login");
    const passwordField = $("#password-field-owner-login");

    togglePassword.on("click", function() {
        // toggle the type attribute
        const type = passwordField.attr("type") === "password" ? "text" : "password";
        passwordField.attr("type", type);
    });

    $("#toggle-password-owner-login").click(function(){
        $('.eye-slashed').toggleClass('hidden');
    });
});

$(document).ready(function() {
    const togglePassword = document.querySelector("#toggle-password-register");
    const passwordField = document.querySelector("#password-field-register");

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
    $("#toggle-password-register").click(function(){
        $('.eye-slashed-password').toggleClass('hidden');
    });

    $("#toggle-confirm-password").click(function(){
        $('.eye-slashed-confirm-password').toggleClass('hidden');
    });
});

// reset password
$(document).ready(function() {
    $('#reset-password').on('click', function() {
        $('#reset-password-form').removeClass('hidden');
        $('#hide-form-reset').removeClass('hidden');
        $('#reset-password').addClass('hidden');
    });
});
$(document).ready(function() {
    $('#hide-form-reset').on('click', function() {
        $('#reset-password-form').addClass('hidden');
        $('#hide-form-reset').addClass('hidden');
        $('#reset-password').removeClass('hidden');
        $('#password-field-register').val('');
        $('#confirm-password-field').val('');
    });
});

$(document).ready(function () {
    // For the traditional file input
    $('#upload-building-Image').on('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#preview-building-image').attr('src', e.target.result).removeClass('hidden');
                $('#preview-added-building-text').addClass('hidden');
            };
            reader.readAsDataURL(file);
        }
    })});

    $(document).ready(function () {
    // For the traditional file input
    $('#upload-room-Image').on('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#preview-room-image').attr('src', e.target.result).removeClass('hidden');
                $('#preview-room-text').addClass('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    // Drag-and-Drop functionality
    const dropArea = $('#drop-area');

    dropArea.on('dragover', function (event) {
        event.preventDefault();
        dropArea.addClass('border-blue-500'); // Optional: Highlight border when dragging over
    });

    dropArea.on('dragleave', function (event) {
        event.preventDefault();
        dropArea.removeClass('border-blue-500'); // Optional: Remove highlight border
    });

    dropArea.on('drop', function (event) {
        event.preventDefault();
        dropArea.removeClass('border-blue-500'); // Optional: Remove highlight border

        const file = event.originalEvent.dataTransfer.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#preview-building-image').attr('src', e.target.result).removeClass('hidden');
                $('#preview-building-text').addClass('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(function () {
    // For the traditional file input
    $('#update-building-Image').on('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#preview-added-building-image').attr('src', e.target.result).removeClass('hidden');
                $('#preview-added-building-text').addClass('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    // Drag-and-Drop functionality
    const dropArea = $('#drop-area');

    dropArea.on('dragover', function (event) {
        event.preventDefault();
        dropArea.addClass('border-blue-500'); // Optional: Highlight border when dragging over
    });

    dropArea.on('dragleave', function (event) {
        event.preventDefault();
        dropArea.removeClass('border-blue-500'); // Optional: Remove highlight border
    });

    dropArea.on('drop', function (event) {
        event.preventDefault();
        dropArea.removeClass('border-blue-500'); // Optional: Remove highlight border

        const file = event.originalEvent.dataTransfer.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#preview-added-building-image').attr('src', e.target.result).removeClass('hidden');
                $('#preview-added-building-text').addClass('hidden');
            };
            reader.readAsDataURL(file);

        }
    });
});

// Modal delete room
$(document).ready(function () {
    // Saat tombol hapus ditekan, tampilkan modal
    $('.delete-room-button').on('click', function () {
        const roomId = $(this).data('room-id'); // Ambil ID kamar dari data atribut
        $('#room-delete-form').attr('action', '/rooms/delete/' + roomId); // Set action form
        $('#confirmation-delete-room').removeClass('hidden');
    });

    // Saat tombol "No, cancel" ditekan, sembunyikan modal
    $('#cancel-delete-room, #close-modal').on('click', function () {
        $('#confirmation-delete-room').addClass('hidden');
    });

    // Saat tombol "Yes, I'm sure" ditekan, kirim form
    $('#confirm-delete-room').on('click', function () {
        console.log('Delete confirmed');
        console.log($('#room-delete-form').attr('action'));
        $('#room-delete-form').submit();
    });
});

//drag image room
document.addEventListener('DOMContentLoaded', function () {
    const dropArea = document.getElementById('drop-area');
    const uploadInput = document.getElementById('upload-room-Image');
    const previewImage = document.getElementById('preview-room-image');
    const previewText = document.getElementById('preview-added-room-text');

    // Mencegah perilaku default saat drag over
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    // Menambahkan kelas saat drag masuk
    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    // Menghapus kelas saat drag keluar
    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    // Menghandle drop event
    dropArea.addEventListener('drop', handleDrop, false);

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight() {
        dropArea.classList.add('bg-gray-200');
    }

    function unhighlight() {
        dropArea.classList.remove('bg-gray-200');
    }

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        handleFiles(files);
    }

    uploadInput.addEventListener('change', (e) => {
        handleFiles(e.target.files);
    });

    function handleFiles(files) {
        if (files.length) {
            const file = files[0];
            const reader = new FileReader();

            reader.onload = function () {
                previewImage.src = reader.result;
                previewImage.classList.remove('hidden');
                previewText.classList.add('hidden');
            };

            reader.readAsDataURL(file);
            uploadInput.files = files;
        }
    }
});

//drag image bedroom
document.addEventListener('DOMContentLoaded', function () {
    const dropArea = document.getElementById('drop-area1');
    const uploadInput = document.getElementById('upload-room-Image1');
    const previewImage = document.getElementById('preview-room-image1');
    const previewText = document.getElementById('preview-added-room-text1');

    // Mencegah perilaku default saat drag over
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    // Menambahkan kelas saat drag masuk
    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    // Menghapus kelas saat drag keluar
    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    // Menghandle drop event
    dropArea.addEventListener('drop', handleDrop, false);

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight() {
        dropArea.classList.add('bg-gray-200');
    }

    function unhighlight() {
        dropArea.classList.remove('bg-gray-200');
    }

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        handleFiles(files);
    }

    uploadInput.addEventListener('change', (e) => {
        handleFiles(e.target.files);
    });

    function handleFiles(files) {
        if (files.length) {
            const file = files[0];
            const reader = new FileReader();

            reader.onload = function () {
                previewImage.src = reader.result;
                previewImage.classList.remove('hidden');
                previewText.classList.add('hidden');
            };

            reader.readAsDataURL(file);
            uploadInput.files = files;
        }
    }
});

//drag image bathroom
document.addEventListener('DOMContentLoaded', function () {
    const dropArea = document.getElementById('drop-area2');
    const uploadInput = document.getElementById('upload-room-Image2');
    const previewImage = document.getElementById('preview-room-image2');
    const previewText = document.getElementById('preview-added-room-text2');

    // Mencegah perilaku default saat drag over
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    // Menambahkan kelas saat drag masuk
    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    // Menghapus kelas saat drag keluar
    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    // Menghandle drop event
    dropArea.addEventListener('drop', handleDrop, false);

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight() {
        dropArea.classList.add('bg-gray-200');
    }

    function unhighlight() {
        dropArea.classList.remove('bg-gray-200');
    }

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        handleFiles(files);
    }

    uploadInput.addEventListener('change', (e) => {
        handleFiles(e.target.files);
    });

    function handleFiles(files) {
        if (files.length) {
            const file = files[0];
            const reader = new FileReader();

            reader.onload = function () {
                previewImage.src = reader.result;
                previewImage.classList.remove('hidden');
                previewText.classList.add('hidden');
            };

            reader.readAsDataURL(file);
            uploadInput.files = files;
        }
    }
});

//drag image kitchen
document.addEventListener('DOMContentLoaded', function () {
    const dropArea = document.getElementById('drop-area3');
    const uploadInput = document.getElementById('upload-room-Image3');
    const previewImage = document.getElementById('preview-room-image3');
    const previewText = document.getElementById('preview-added-room-text3');

    // Mencegah perilaku default saat drag over
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    // Menambahkan kelas saat drag masuk
    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    // Menghapus kelas saat drag keluar
    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    // Menghandle drop event
    dropArea.addEventListener('drop', handleDrop, false);

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight() {
        dropArea.classList.add('bg-gray-200');
    }

    function unhighlight() {
        dropArea.classList.remove('bg-gray-200');
    }

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        handleFiles(files);
    }

    uploadInput.addEventListener('change', (e) => {
        handleFiles(e.target.files);
    });

    function handleFiles(files) {
        if (files.length) {
            const file = files[0];
            const reader = new FileReader();

            reader.onload = function () {
                previewImage.src = reader.result;
                previewImage.classList.remove('hidden');
                previewText.classList.add('hidden');
            };

            reader.readAsDataURL(file);
            uploadInput.files = files;
        }
    }
});

//drag image security
document.addEventListener('DOMContentLoaded', function () {
    const dropArea = document.getElementById('drop-area4');
    const uploadInput = document.getElementById('upload-room-Image4');
    const previewImage = document.getElementById('preview-room-image4');
    const previewText = document.getElementById('preview-added-room-text4');

    // Mencegah perilaku default saat drag over
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    // Menambahkan kelas saat drag masuk
    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    // Menghapus kelas saat drag keluar
    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    // Menghandle drop event
    dropArea.addEventListener('drop', handleDrop, false);

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight() {
        dropArea.classList.add('bg-gray-200');
    }

    function unhighlight() {
        dropArea.classList.remove('bg-gray-200');
    }

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        handleFiles(files);
    }

    uploadInput.addEventListener('change', (e) => {
        handleFiles(e.target.files);
    });

    function handleFiles(files) {
        if (files.length) {
            const file = files[0];
            const reader = new FileReader();

            reader.onload = function () {
                previewImage.src = reader.result;
                previewImage.classList.remove('hidden');
                previewText.classList.add('hidden');
            };

            reader.readAsDataURL(file);
            uploadInput.files = files;
        }
    }
});

// resources/js/app.js
$(document).ready(function() {
    $('#upload-room-Image').on('change', function(event) {
        const file = event.target.files[0];
        const $previewImage = $('#preview-room-image');
        const $placeholderText = $('#preview-added-room-text');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                $previewImage.attr('src', e.target.result).removeClass('hidden');
                $placeholderText.addClass('hidden');
            };

            reader.readAsDataURL(file);
        }
    });
});

function toggleModal() {
    const modal = document.getElementById("addRoommateModal");
    if (modal) {
        modal.classList.toggle("hidden");
    }
}


// Modal AddRoommate Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Modal toggle function
    function toggleModal() {
        const modal = document.getElementById('addRoommateModal');
        if (modal) {
            modal.classList.toggle('hidden');
        }
    }
    const addRoommateBtn = document.getElementById("addRoommate");
    if (addRoommateBtn) {
        addRoommateBtn.addEventListener("click", (event) => {
            event.preventDefault();
            event.stopPropagation();
            toggleModal();
        });
    }
    // Event listener untuk menutup modal ketika klik di luar
    const modal = document.getElementById("addRoommateModal");
    if (modal) {
        modal.addEventListener("click", function(event) {
            if (event.target === this) {
                toggleModal();
            }
        });
    }
    // Event listener untuk tombol close
    const closeBtn = document.getElementById("closeModalButton");
    if (closeBtn) {
        closeBtn.addEventListener("click", (event) => {
            event.stopPropagation();
            toggleModal();
        });
    }
    // Preview image functionality
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('previewProfilePhoto');
        if (input.files && input.files[0] && preview) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    // Event listener untuk preview foto
    const photoInput = document.getElementById("profile_photo");
    if (photoInput) {
        photoInput.addEventListener("change", previewImage);
    }
    // Image preview function
    window.previewImage = function(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const preview = document.getElementById('previewProfilePhoto');
        preview.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
    }
});

// Roommate Delete Modal Management
const DeleteRoommateModal = {
    elements: {
        modal: '#deleteRoommateModal',
        deleteBtn: '#deleteRoommateBtn',
        cancelBtn: '#cancelDelete',
        closeBtn: '#closeDeleteModal',
        modalContent: '.bg-white'
    },

    init() {
        // Show modal
        $(this.elements.deleteBtn).on('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            this.showModal();
        });

        // Hide modal - Cancel button
        $(this.elements.cancelBtn).on('click', () => {
            this.hideModal();
        });

        // Hide modal - Close (X) button
        $(this.elements.closeBtn).on('click', () => {
            this.hideModal();
        });

        // Hide modal - Click outside
        $(this.elements.modal).on('click', (e) => {
            if (e.target === e.currentTarget) {
                this.hideModal();
            }
        });

        // Prevent modal content clicks from closing modal
        $(`${this.elements.modal} ${this.elements.modalContent}`).on('click', (e) => {
            e.stopPropagation();
        });

        // Escape key to close modal
        $(document).on('keydown', (e) => {
            if (e.key === 'Escape') {
                this.hideModal();
            }
        });

        // Prevent dropdown from closing
        $(this.elements.deleteBtn).parent().on('click', (e) => {
            e.stopPropagation();
        });
    },

    showModal() {
        $(this.elements.modal).removeClass('hidden');
    },

    hideModal() {
        $(this.elements.modal).addClass('hidden');
    }
};

// Initialize when document is ready
$(document).ready(() => {
    DeleteRoommateModal.init();
});

$(document).ready(function() {
    // Pastikan fungsi setTemplate sudah terdefinisi di window
    if (typeof setTemplate === 'undefined') {
        console.error('setTemplate function is not defined');
    }
});



// Modal functions
window.openModal = function(rentId) {
    const modal = document.getElementById(`sendModal-${rentId}`);
    if (modal) {
        modal.classList.remove('hidden');
    }
}

window.closeModal = function(rentId) {
    const modal = document.getElementById(`sendModal-${rentId}`);
    if (modal) {
        modal.classList.add('hidden');
    }
}

// API_KEY FONNTE dan Template pesan
const API_KEY = 'LPVz4fUDJx9ihHrqVgDQ';
const TEMPLATES = {
    thanks: `Halo, terimakasih telah mempercayai Kos Bang Raja. Semoga Anda puas dengan layanan yang kami berikan 🙏`,
    reminder: `⏰ Pesan Pengingat: Sewa kamar Anda tersisa () hari lagi. Mohon konfirmasi apabila ingin memperpanjang masa sewa. Terimakasih🙏`
}

function setTemplate(type, rentId) {
    // Coba cari message textarea dengan berbagai selector
    const form = document.getElementById(`messageForm-${rentId}`);
    if (!form) {
        console.error(`Form with ID messageForm-${rentId} not found`);
        return;
    }

    // Cari textarea dalam form tersebut
    const messageTextarea = form.querySelector('#message');
    if (!messageTextarea) {
        console.error('Message textarea not found in form');
        return;
    }

    // Set nilai template
    if (TEMPLATES[type]) {
        messageTextarea.value = TEMPLATES[type];
    }
}

// Expose function ke window
window.setTemplate = setTemplate;

// Fungsi untuk mengirim pesan
window.sendMessage = function(event, rentId) {
    event.preventDefault();

    const form = document.getElementById(`messageForm-${rentId}`);
    const phone = form.querySelector('#phone').value;
    const message = form.querySelector('#message').value;

    if (!phone || !message) {
        showAlert('Mohon isi semua field', 'error');
        return;
    }

    // Kirim pesan menggunakan API Fonnte
    fetch('https://api.fonnte.com/send', {
        method: 'POST',
        headers: {
            'Authorization': API_KEY,
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            target: phone,
            message: message
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === true) {
            form.reset();
            closeModal(rentId);
            showAlert('Pesan berhasil dikirim!', 'success');
        } else {
            showAlert('Gagal mengirim pesan: ' + data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('Error mengirim pesan: ' + error.message, 'error');
    });
}

// Show alert function
function showAlert(message, type = 'success') {
    const alertContainer = document.getElementById('alert-container');
    const alertDiv = document.createElement('div');
    alertDiv.className = `p-4 mb-4 rounded-lg ${
        type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'
    }`;
    alertDiv.textContent = message;

    alertContainer.appendChild(alertDiv);
    setTimeout(() => alertDiv.remove(), 5000);
}

// Form submission handler
document.getElementById('messageForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const phone = document.getElementById('phone').value;
    const message = document.getElementById('message').value;

    if (!phone || !message) {
        showAlert('Mohon isi semua field', 'error');
        return;
    }

    try {
        const response = await fetch('https://api.fonnte.com/send', {
            method: 'POST',
            headers: {
                'Authorization': API_KEY,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                target: phone,
                message: message
            })
        });

        const data = await response.json();
        console.log('Response:', data);

        if (data.status === true) {
            // Reset form
            document.getElementById('messageForm').reset();
            // Close modal
            closeModal();
            // Show success message
            showAlert('Pesan berhasil dikirim!', 'success');
        } else {
            showAlert('Gagal mengirim pesan: ' + data.message, 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showAlert('Error mengirim pesan: ' + error.message, 'error');
    }
});
