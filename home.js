document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".feature-card");
  
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.transform = "translateY(0)";
          entry.target.style.opacity = 1;
        }
      });
    }, { threshold: 0.2 });
  
    cards.forEach(card => {
      observer.observe(card);
    });
  });
  