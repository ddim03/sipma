const judul = document.getElementById("judul");
const slugInput = document.getElementById("slug");

judul.addEventListener("keyup", function () {
    let preslug = judul.value
        .toLowerCase()
        .replace(/ /g, "-")
        .replace(/[^\w-]+/g, "");
    slugInput.value = preslug;
});
