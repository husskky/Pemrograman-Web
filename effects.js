document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 1200,
        easing: 'ease-in-out',
        once: false,
    });
});

const scrollButton = document.querySelector('#scroll-btn');
const header = document.querySelector('.parallax');

scrollButton.addEventListener('click', () => {
    const aboutSection = document.querySelector('#about');
    aboutSection.scrollIntoView({ behavior: 'smooth' });
});

window.addEventListener('scroll', () => {
    if (window.scrollY > header.offsetHeight) {
        scrollButton.innerHTML = '<i class="fas fa-arrow-up"></i> Kembali';
        scrollButton.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    } else {
        scrollButton.innerHTML = '<i class="fas fa-arrow-down"></i> Jelajahi';
        scrollButton.addEventListener('click', () => {
            const aboutSection = document.querySelector('#about');
            aboutSection.scrollIntoView({ behavior: 'smooth' });
        });
    }
});

const floatingHeader = document.querySelector('.floating-header');
const parallaxSection = document.querySelector('.parallax');
const parallaxHeight = parallaxSection.offsetHeight;

window.addEventListener('scroll', () => {
    if (window.scrollY > parallaxHeight / 2) {
        floatingHeader.classList.add('visible');
        floatingHeader.classList.remove('hidden');
    } else {
        floatingHeader.classList.add('hidden');
        floatingHeader.classList.remove('visible');
    }
});

const toggleButton = document.getElementById("modeToggle");
const body = document.body;

if (localStorage.getItem("theme") === "dark") {
    body.classList.add("dark-mode");
    toggleButton.textContent = "☀️ Light Mode";
}

toggleButton.addEventListener("click", () => {
    body.classList.toggle("dark-mode");

    if (body.classList.contains("dark-mode")) {
        toggleButton.textContent = "☀️ Light Mode";
        localStorage.setItem("theme", "dark");
    } else {
        toggleButton.textContent = "🌙 Dark Mode";
        localStorage.setItem("theme", "light");
    }
});