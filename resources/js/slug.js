const title = document.getElementById("title");
const slugInput = document.getElementById("slug");

title.addEventListener("keyup", function () {
    let preslug = title.value
        .toLowerCase()
        .replace(/ /g, "-")
        .replace(/[^\w-]+/g, "");
    slugInput.value = preslug;
});