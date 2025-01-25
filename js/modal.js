// Pobieranie przycisków otwierania i zamykania modali
const openModalButtons = document.querySelectorAll("[data-open-modal]");
const closeModalButtons = document.querySelectorAll("[data-close-modal]");

// Funkcja otwierania modala
function openModal(targetSelector) {
  const modal = document.querySelector(targetSelector); // Znajdź modal na podstawie selektora
  if (modal && typeof modal.showModal === "function") {
    modal.showModal(); // Otwórz modal (dla <dialog>)
  } else if (modal) {
    modal.classList.add("active"); // Alternatywa dla innych typów modali
  } else {
    console.error(`Modal o selektorze ${targetSelector} nie istnieje!`);
  }
}

// Funkcja zamykania modala
function closeModal(modal) {
  if (modal && typeof modal.close === "function") {
    modal.close(); // Zamknij modal (dla <dialog>)
  } else if (modal) {
    modal.classList.remove("active"); // Alternatywa dla innych typów modali
  }
}

// Obsługa otwierania modali
openModalButtons.forEach(button => {
  button.addEventListener("click", () => {
    const targetSelector = button.getAttribute("data-target"); // Pobierz selektor celu
    if (targetSelector) {
      openModal(targetSelector); // Otwórz modal na podstawie selektora
    }
  });
});

// Obsługa zamykania modali
closeModalButtons.forEach(button => {
  button.addEventListener("click", () => {
    const modal = button.closest("dialog") || button.closest(".modal"); // Znajdź najbliższy modal
    if (modal) {
      closeModal(modal); // Zamknij modal
    }
  });
});