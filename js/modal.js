const openButton = document.querySelector("[data-open-modal]");
const closeButton = document.querySelector("[data-close-modal]");
const modal = document.querySelector("[data-modal]");
const form = modal.querySelector("form"); 

openButton.addEventListener("click", () => {
  modal.showModal();
});
closeButton.addEventListener("click", () => {
  modal.close();
});

