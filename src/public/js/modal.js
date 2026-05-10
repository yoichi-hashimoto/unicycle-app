const modal = document.getElementById("uniModal");
const openButtons = document.querySelectorAll(".openModal");
const closeModal = document.getElementById("closeModal");
const modalName = document.getElementById("modalName")
const modalDescription = document.getElementById("modalDescription");

openButtons.forEach((button) => {
    button.addEventListener("click", () => {
        modalName.textContent = button.dataset.name;
        modalDescription.textContent = button.dataset.description;
        modal.classList.remove("hidden");
    });

closeModal.addEventListener("click", () => {
        modal.classList.add("hidden");
    });
});

modal.addEventListener("click", (event) => {
    if(event.target === modal)
    modal.classList.add("hidden")
});
