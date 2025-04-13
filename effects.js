document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 1200, // Durasi animasi
        easing: 'ease-in-out', // Jenis easing
        once: false, // Trigger animasi hanya sekali
    });
});

// Scroll Button Interactivity
const scrollButton = document.querySelector('#scroll-btn');
const header = document.querySelector('.parallax');

scrollButton.addEventListener('click', () => {
    const aboutSection = document.querySelector('#about');
    aboutSection.scrollIntoView({ behavior: 'smooth' });
});

window.addEventListener('scroll', () => {
    // Update teks dan fungsi tombol scroll
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

// Floating Header Effect
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
