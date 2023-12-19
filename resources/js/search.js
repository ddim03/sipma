const search = document.getElementById("default-search");
search.addEventListener("focus", function () {
    window.scrollBy(0, 200);

    const showAll = document.getElementById("show-all");
    showAll.setAttribute("href", `search/${this.value}`);
});
