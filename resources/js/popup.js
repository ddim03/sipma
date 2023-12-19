const showImage = document.querySelector("#show-img");
showImage.addEventListener("click", () => {
    const popupImg = document.getElementById("popup-img");
    const popupBg = document.getElementById("popup-bg");
    popupBg.classList.remove("scale-0");
    popupBg.classList.remove("transition-all");
    popupBg.classList.remove("scale-1");
    popupImg.classList.remove("scale-0");
    popupImg.classList.add("scale-1");
});

const hideImage = document.querySelector("#close-btn");
hideImage.addEventListener("click", function () {
    this.parentElement.classList.remove("scale-1");
    this.parentElement.classList.add("scale-0");
    this.parentElement.parentElement.classList.remove("scale-1");
    this.parentElement.parentElement.classList.add("scale-0");
    this.parentElement.parentElement.classList.add("transition-all");
});
