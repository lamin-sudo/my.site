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

    // Portfolio Projects (Dynamic Fetch)
    const projectsContainer = document.querySelector(".projects");
    
    fetch(`https://api.github.com/users/${GITHUB_USERNAME}/repos`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`GitHub API error: ${response.status}`);
            }
            return response.json();
        })
        .then(repos => {
            repos.forEach(repo => {
                const projectDiv = document.createElement("div");
                projectDiv.classList.add("project-card");
                projectDiv.innerHTML = `
                    <div class="card">
                        <h3>${repo.name}</h3>
                        <p>${repo.description || "No description available."}</p>
                        <a href="${repo.html_url}" target="_blank">View on GitHub</a>
                    </div>
                `;
                projectsContainer.appendChild(projectDiv);
            });
        })
        .catch(error => {
            console.error("Error fetching GitHub repositories:", error);
            projectsContainer.innerHTML = "<p>Unable to load projects.</p>";
        });
});