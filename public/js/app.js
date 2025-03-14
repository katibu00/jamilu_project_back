document.addEventListener('DOMContentLoaded', function() {
    const topBar = document.getElementById('topBar');
    const mainHeader = document.getElementById('mainHeader');
    const userMenuToggle = document.getElementById('userMenuToggle');
    const userDropdown = document.getElementById('userDropdown');
    const notificationToggle = document.getElementById('notificationToggle');
    const notificationDropdown = document.getElementById('notificationDropdown');
    const searchToggle = document.getElementById('searchToggle');
    const searchBar = document.getElementById('searchBar');
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const languageToggle = document.getElementById('languageToggle');
    const languageDropdown = document.getElementById('languageDropdown');
    const selectedLanguage = document.getElementById('selectedLanguage');

    let lastScrollTop = 0;
    const scrollThreshold = 100;

    // Toggle dropdowns
    function toggleDropdown(toggle, dropdown) {
        toggle.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.classList.toggle('hidden');
        });
    }

    toggleDropdown(userMenuToggle, userDropdown);
    toggleDropdown(notificationToggle, notificationDropdown);
    toggleDropdown(languageToggle, languageDropdown);

    // Search bar toggle
    searchToggle.addEventListener('click', function() {
        searchBar.classList.toggle('hidden');
        if (!searchBar.classList.contains('hidden')) {
            searchBar.querySelector('input').focus();
        }
    });

    // Mobile menu toggle
    mobileMenuToggle.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
    });

    // Language selection
    languageDropdown.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            selectedLanguage.textContent = this.textContent;
            languageDropdown.classList.add('hidden');
        });
    });

    // Hide dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        if (!userMenuToggle.contains(event.target) && !userDropdown.contains(event.target)) {
            userDropdown.classList.add('hidden');
        }
        if (!notificationToggle.contains(event.target) && !notificationDropdown.contains(event.target)) {
            notificationDropdown.classList.add('hidden');
        }
        if (!languageToggle.contains(event.target) && !languageDropdown.contains(event.target)) {
            languageDropdown.classList.add('hidden');
        }
    });

    // Handle scroll events
    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop && scrollTop > scrollThreshold) {
            topBar.style.transform = 'translateY(-100%)';
        } else if (scrollTop <= scrollThreshold) {
            topBar.style.transform = 'translateY(0)';
        }

        lastScrollTop = scrollTop;
    });
});