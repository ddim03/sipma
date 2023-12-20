function tambahkanEventListenerByClass(className, eventName, callbakFunction) {
    let elementWithClass = document.getElementsByClassName(className);

    if (!elementWithClass) return;

    for (let i = 0; i < elementWithClass.length; i++) {
        elementWithClass[i].addEventListener(eventName, callbakFunction);
    }
}

function tambahkanEventListenerById(elementId, eventName, callbakFunction) {
    let elementWithId = document.getElementById(elementId);

    if (!elementWithId) return;

    elementWithId.addEventListener(eventName, callbakFunction);
}

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

document.addEventListener("DOMContentLoaded", function () {
    tambahkanEventListenerById("default-search", "focus", function () {
        if (window.scrollY <= 100) {
            window.scrollBy(0, 200);
            afterScroll = true;
        }
    });

    tambahkanEventListenerById("show-img", "click", function () {
        const popupImg = document.getElementById("popup-img");
        const popupBg = document.getElementById("popup-bg");
        popupBg.classList.remove("scale-0");
        popupBg.classList.remove("transition-all");
        popupBg.classList.remove("scale-1");
        popupImg.classList.remove("scale-0");
        popupImg.classList.add("scale-1");
    });

    tambahkanEventListenerById("close-btn", "click", function () {
        this.parentElement.classList.remove("scale-1");
        this.parentElement.classList.add("scale-0");
        this.parentElement.parentElement.classList.remove("scale-1");
        this.parentElement.parentElement.classList.add("scale-0");
        this.parentElement.parentElement.classList.add("transition-all");
    });

    tambahkanEventListenerById("show-all", "click", function () {
        let keyword = document.getElementById("default-search").value;
        if (keyword != "") {
            window.location.href = `/search/${keyword}`;
        }
        window.location.href = `/search/all`;
    });

    let isShow = false;
    tambahkanEventListenerById("show-password-btn", "click", function () {
        const passwordicon = document.querySelector("#pass-icon");
        if (isShow) {
            passwordicon.innerHTML =
                '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1.933 10.909A4.357 4.357 0 0 1 1 9c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 19 9c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M2 17 18 1m-5 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>';
            this.previousElementSibling.setAttribute("type", "text");
            this.classList.add("-mt-1");
            isShow = !isShow;
        } else {
            passwordicon.innerHTML =
                '<g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" /><path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" /></g>';
            this.previousElementSibling.setAttribute("type", "password");
            this.classList.remove("-mt-1");
            isShow = !isShow;
        }
    });

    tambahkanEventListenerById("gambar", "change", function () {
        if (this.files.length > 0) {
            const textHelp = document.querySelector("#file_input_help");
            const textTipeFile = document.querySelector("#file_input_type");

            textHelp.textContent = this.files[0].name;
            textTipeFile.textContent = "";
        }
    });
    tambahkanEventListenerById("nama_file", "change", function () {
        if (this.files.length > 0) {
            const textHelp = document.querySelector("#file_input_help");
            const textTipeFile = document.querySelector("#file_input_type");

            textHelp.textContent = this.files[0].name;
            textTipeFile.textContent = "";
        }
    });

    tambahkanEventListenerById("judul", "keyup", function () {
        const slugInput = document.getElementById("slug");
        let preslug = this.value
            .toLowerCase()
            .replace(/ /g, "-")
            .replace(/[^\w-]+/g, "");
        slugInput.value = preslug;
    });

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
    tambahkanEventListenerByClass("delete-button", "click", function () {
        id = this.value;
        const submitData = document.querySelector("#submit-data");
        submitData.setAttribute("action", `/post/${id}`);
    });
});
