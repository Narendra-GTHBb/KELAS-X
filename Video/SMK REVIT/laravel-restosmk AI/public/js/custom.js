// Custom JavaScript for Restaurant Application

document.addEventListener("DOMContentLoaded", function () {
    // Add animation to menu cards
    const menuCards = document.querySelectorAll(".card");
    if (menuCards.length > 0) {
        menuCards.forEach((card, index) => {
            card.style.opacity = "0";
            card.style.transform = "translateY(20px)";
            setTimeout(() => {
                card.style.transition =
                    "opacity 0.5s ease, transform 0.5s ease";
                card.style.opacity = "1";
                card.style.transform = "translateY(0)";
            }, 100 * index);
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const targetId = this.getAttribute("href");
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: "smooth",
                });
            }
        });
    });

    // Add hover effect to navigation items
    const navItems = document.querySelectorAll(".nav-item a");
    navItems.forEach((item) => {
        item.addEventListener("mouseenter", function () {
            this.style.transition = "all 0.3s ease";
            this.style.color = "#ff6b35";
        });
        item.addEventListener("mouseleave", function () {
            this.style.transition = "all 0.3s ease";
            this.style.color = "";
        });
    });

    // Add animation to tables
    const tables = document.querySelectorAll(".table");
    if (tables.length > 0) {
        tables.forEach((table) => {
            table.style.opacity = "0";
            table.style.transform = "translateY(20px)";
            setTimeout(() => {
                table.style.transition =
                    "opacity 0.5s ease, transform 0.5s ease";
                table.style.opacity = "1";
                table.style.transform = "translateY(0)";
            }, 200);
        });
    }

    // Add animation to form elements
    const formElements = document.querySelectorAll(
        ".form-control, .form-select, .btn"
    );
    if (formElements.length > 0) {
        formElements.forEach((element, index) => {
            element.style.opacity = "0";
            element.style.transform = "translateY(10px)";
            setTimeout(() => {
                element.style.transition =
                    "opacity 0.3s ease, transform 0.3s ease";
                element.style.opacity = "1";
                element.style.transform = "translateY(0)";
            }, 100 * index);
        });
    }

    // Add animation to alert messages
    const alerts = document.querySelectorAll(".alert");
    if (alerts.length > 0) {
        alerts.forEach((alert) => {
            alert.style.opacity = "0";
            alert.style.transform = "translateY(-10px)";
            setTimeout(() => {
                alert.style.transition =
                    "opacity 0.5s ease, transform 0.5s ease";
                alert.style.opacity = "1";
                alert.style.transform = "translateY(0)";
            }, 200);

            // Auto-hide alerts after 5 seconds
            setTimeout(() => {
                alert.style.opacity = "0";
                alert.style.transform = "translateY(-10px)";
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.parentNode.removeChild(alert);
                    }
                }, 500);
            }, 5000);
        });
    }

    // Add image hover effect
    const cardImages = document.querySelectorAll(".card-img-top");
    if (cardImages.length > 0) {
        cardImages.forEach((img) => {
            img.addEventListener("mouseenter", function () {
                this.style.transition = "transform 0.5s ease";
                this.style.transform = "scale(1.05)";
            });
            img.addEventListener("mouseleave", function () {
                this.style.transition = "transform 0.5s ease";
                this.style.transform = "scale(1)";
            });
        });
    }

    // Add quantity control animation in cart
    const quantityControls = document.querySelectorAll(".quantity-control a");
    if (quantityControls.length > 0) {
        quantityControls.forEach((control) => {
            control.addEventListener("click", function () {
                this.style.transition = "transform 0.2s ease";
                this.style.transform = "scale(1.2)";
                setTimeout(() => {
                    this.style.transform = "scale(1)";
                }, 200);
            });
        });
    }
});
