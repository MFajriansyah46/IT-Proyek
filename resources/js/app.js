import 'flowbite';
import './bootstrap';


$(document).ready(function(){
    $('#button-login-eror').click(function(){
        $('#login-eror').hide();
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

$('#openProfileBtn').on('click', function() {
    $('#profileOverlay').removeClass('hidden');
});

  // Hide the profile overlay
$('#closeProfileBtn').on('click', function() {
    $('#profileOverlay').addClass('hidden');
});

// Modal delete user
$(document).ready(function () {
    // Saat tombol hapus ditekan, tampilkan modal
    $('.delete-user-button').on('click', function () {
        $('#confirmation-delete-user').removeClass('hidden');
    });

    // Saat tombol "No, cancel" ditekan, sembunyikan modal
    $('#cancel-delete, #close-modal').on('click', function () {
        $('#confirmation-delete-user').addClass('hidden');
    });

    // Saat tombol "Yes, I'm sure" ditekan, kirim form
    $('#confirm-delete').on('click', function () {
        $('#user-delete-form').submit();
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
        $('.eye-slashed').toggleClass('hidden');
    });

    $("#toggle-confirm-password").click(function(){
        $('.eye-slashedC').toggleClass('hidden');
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
                $('#preview-building-text').addClass('hidden');
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

// resources/js/app.js
function previewImage(event) {
    const image = document.getElementById('preview-room-image');
    const reader = new FileReader();

    reader.onload = function() {
        image.src = reader.result; // Mengatur src gambar dengan hasil upload
        image.classList.remove('hidden'); // Menampilkan gambar yang di-upload
    };

    if (event.target.files.length > 0) {
        reader.readAsDataURL(event.target.files[0]); // Membaca file
    }
}
document.getElementById('upload-room-Image').addEventListener('change', previewImage);
