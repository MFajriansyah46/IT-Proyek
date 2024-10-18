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

$(document).ready(function () {
    $('#upload-building-Image').on('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#preview-image').attr('src', e.target.result).removeClass('hidden');
                $('#preview-text').addClass('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
});
