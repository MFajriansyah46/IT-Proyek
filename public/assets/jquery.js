// $(document).ready(function(){
//     $('#button-login-eror').click(function(){
//         $('#login-eror').hide();
//     });
// });

// $(document).ready(function(){
//     $('#buttonBar').click(function(){
//         $('#fullBar').fadeToggle(10);
//         // $(this).css('background-color', '#e5e7eb');
//     });
// });

// document.addEventListener("DOMContentLoaded", function () {
//     var fileInput = document.getElementById('fileInput');
//     var profileImage = document.getElementById('profileImage');

//     fileInput.addEventListener('change', function (event) {
//         var output = profileImage;
//         output.src = URL.createObjectURL(event.target.files[0]);
//         output.onload = function () {
//             URL.revokeObjectURL(output.src) // Free memory
//         }
//     });
// });

// $(document).ready(function () {
//     // Toggle dropdown menu when the button is clicked
//     $('#menu-button').on('click', function (event) {
//       event.stopPropagation(); // Prevent the event from bubbling up
//       $(this).next('div[role="menu"]').toggle(); // Show/hide the menu
//     });

//     // Close the dropdown menu if clicking outside of it
//     $(document).on('click', function (event) {
//       if (!$(event.target).closest('#menu-button').length) {
//         $('div[role="menu"]').hide(); // Hide the dropdown
//       }
//     });
// });