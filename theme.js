document.addEventListener("DOMContentLoaded", () => {
    const saved = localStorage.getItem("theme");

if (saved) {
  document.documentElement.setAttribute("data-theme", saved);
}

  document.querySelectorAll("[data-theme]").forEach(btn => {
    btn.addEventListener("click", () => {
      const mode = btn.dataset.theme;
      const root = document.documentElement;

      if (mode === "auto") {
        root.removeAttribute("data-theme");
        localStorage.removeItem("theme");
      } else {
        root.setAttribute("data-theme", mode);
        localStorage.setItem("theme", mode);
      }
    });
  });
});