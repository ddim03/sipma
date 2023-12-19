const dropZone = document.querySelector("#gambar");
dropZone.addEventListener("change", function () {
    if (this.files.length > 0) {
        const textHelp = document.querySelector("#file_input_help");
        const textTipeFile = document.querySelector("#file_input_type");

        textHelp.textContent = dropZone.files[0].name;
        textTipeFile.textContent = "";
    }
});
