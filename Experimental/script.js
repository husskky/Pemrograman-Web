const toggleButton = document.getElementById("modeToggle");
const body = document.body;

if (localStorage.getItem("theme") === "dark") {
    body.classList.remove("light-mode");
    body.classList.add("dark-mode");
    toggleButton.textContent = "☀️ Light Mode";
}

toggleButton.addEventListener("click", () => {
    if (body.classList.contains("dark-mode")) {
        body.classList.remove("dark-mode");
        body.classList.add("light-mode");
        toggleButton.textContent = "🌙 Dark Mode";
        localStorage.setItem("theme", "light");
    } else {
        body.classList.remove("light-mode");
        body.classList.add("dark-mode");
        toggleButton.textContent = "☀️ Light Mode";
        localStorage.setItem("theme", "dark");
    }
});