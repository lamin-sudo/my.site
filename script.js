// Typing Effect
document.addEventListener("DOMContentLoaded", () => {
    new Typed("#typing-effect", {
        strings: ["Web Developer", "Open Source Contributor", "Tech Enthusiast"],
        typeSpeed: 50,
        backSpeed: 25,
        loop: true,
    });

    /* Dark Mode Toggle with Icon */
    const toggleButton = document.getElementById("dark-mode-toggle");
    const updateDarkModeIcon = () => {
        toggleButton.textContent = document.body.classList.contains("dark-mode") ? "☀️" : "🌙";
    };
    toggleButton.addEventListener("click", () => {
        document.body.classList.toggle("dark-mode");
        updateDarkModeIcon();
    });
    updateDarkModeIcon(); // Initialize icon on page load

    const GITHUB_USERNAME = "lamin-sudo"; // Replace with your GitHub username
    
    // Fetch GitHub Stats
    const repoCountElement = document.getElementById("repo-count");
    const followerCountElement = document.getElementById("follower-count");
    fetch(`https://api.github.com/users/${GITHUB_USERNAME}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`GitHub API error: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            repoCountElement.textContent = data.public_repos;
            followerCountElement.textContent = data.followers;
        })
        .catch(error => {
            console.error("Error fetching GitHub stats:", error);
            repoCountElement.textContent = "N/A";
            followerCountElement.textContent = "N/A";
        });
    
    // Scroll Animations
    AOS.init({
        duration: 1000, // Animation duration in milliseconds
        once: true, // Whether animation should happen only once
    });

    // Portfolio Projects
    const projects = [
        { name: "Project 1", link: "https://github.com/your-username/project1", image: "https://via.placeholder.com/150" },
        { name: "Project 2", link: "https://github.com/your-username/project2", image: "https://via.placeholder.com/150" },
        { name: "Project 3", link: "https://github.com/your-username/project3", image: "https://via.placeholder.com/150" },
    ];

    const projectsContainer = document.querySelector(".projects");
    projects.forEach(project => {
        const projectDiv = document.createElement("div");
        projectDiv.innerHTML = `
            <a href="${project.link}" target="_blank">
                <img src="${project.image}" alt="${project.name}" style="width: 100%; border-radius: 8px;">
                <p>${project.name}</p>
            </a>
        `;
        projectsContainer.appendChild(projectDiv);
    });
});