function flash() {
    const flashElement = document.querySelector("#flash");
    flashElement.classList.remove("translate-x-full");
    flashElement.classList.remove("right-0");
    flashElement.classList.add("transition-transform");
    flashElement.classList.add("translate-x-0");
    flashElement.style.right = "2rem";
    const bar = document.querySelector("#barFlash");
    let progress = 100;
    bar.style.width = progress + "%";

    const intervalId = setInterval(() => {
        bar.style.width = progress + "%";
        progress -= 1;

        if (progress < 0) {
            clearInterval(intervalId);
        }
    }, 20);

    setTimeout(() => {
        flashElement.classList.add("translate-x-full");
        flashElement.classList.add("right-0");
        flashElement.classList.remove("translate-x-0");
        flashElement.style.right = "0";
    }, 2500);
}

function notif() {
    const flashElement = document.querySelector("#notification");
    flashElement.classList.remove("translate-x-full");
    flashElement.classList.remove("right-0");
    flashElement.classList.add("transition-transform");
    flashElement.classList.add("translate-x-0");
    flashElement.style.right = "2rem";
    const bar = document.querySelector("#bar");
    let progress = 100;
    bar.style.width = progress + "%";

    const intervalId = setInterval(() => {
        bar.style.width = progress + "%";
        progress -= 1;

        if (progress < 0) {
            clearInterval(intervalId);
        }
    }, 20);

    setTimeout(() => {
        flashElement.classList.add("transition-transform");
        flashElement.classList.add("translate-x-full");
        flashElement.classList.add("right-0");
        flashElement.classList.remove("translate-x-0");
        flashElement.style.right = "0";
    }, 2500);
}

const deleteButton = document.querySelectorAll(
    'button[data-modal-target="popup-modal"]'
);
deleteButton.forEach((e) => {
    e.addEventListener("click", function () {
        id = this.value;
        const submitData = document.querySelector("#submit-data");
        submitData.setAttribute("action", `/post/${id}`);
    });
});
