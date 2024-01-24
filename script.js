const modalController = ({ modal, btnClose, btnOpen }) => {
  const buttonElem = document.querySelector(btnOpen);
  const modalElem = document.querySelector(modal);

  modalElem.style.cssText = `
        display: flex;
        visibility: hidden;
        opacity: 0;
        transition: opacity 300ms ease-in-out;
    `;

  const closeModal = (event) => {
    const target = event.target;
    if (
      target === modalElem ||
      target.closest(btnClose) ||
      event.code === "Escape"
    ) {
      modalElem.style.opacity = 0;

      setTimeout(() => {
        modalElem.style.visibility = "hidden";
      }, 300);
      window.removeEventListener("keydown", closeModal);
    }
  };

  const openModal = () => {
    modalElem.style.visibility = "visible";
    modalElem.style.opacity = 1;
    window.addEventListener("keydown", closeModal);
  };

  buttonElem.addEventListener("click", openModal);

  modalElem.addEventListener("click", closeModal);
};

modalController({
  modal: ".modal",
  btnOpen: ".section__button",
  btnClose: ".modal-close",
});




{
  // Получаем текущую дату
  var today = new Date();

  // Форматируем дату в строку в формате YYYY-MM-DD
  var dd = String(today.getDate()).padStart(2, "0");
  var mm = String(today.getMonth() + 1).padStart(2, "0"); // Текущий месяц начинается с 0
  var yyyy = today.getFullYear();

  var formattedDate = yyyy + "-" + mm + "-" + dd;

  // Устанавливаем сегодняшнюю дату как значение по умолчанию
  document.getElementById("watchDate").value = formattedDate;
}
