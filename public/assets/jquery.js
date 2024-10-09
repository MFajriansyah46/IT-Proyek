function toggleDropdown() {
    const dropdown = document.getElementById('dropdown-menu');
    dropdown.classList.toggle('hidden');
    }

    window.onclick = function(event) {
    const dropdown = document.getElementById('dropdown-menu');
    if (!event.target.closest('#menu-button')) {
    dropdown.classList.add('hidden');
    }
}