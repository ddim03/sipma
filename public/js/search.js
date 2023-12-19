document.addEventListener("DOMContentLoaded", function () {
    const search = document.querySelector("#default-search");
    const showAll = document.querySelector("#show-all");
    showAll.setAttribute("href", `/search/${search.value}`);
});
