const dropZonePdf = document.querySelector("#nama_file");
dropZonePdf.addEventListener("change", function () {
    if (this.files.length > 0) {
        const textHelp = document.querySelector("#file_input_help");
        const textTipeFile = document.querySelector("#file_input_type");

        textHelp.textContent = dropZonePdf.files[0].name;
        textTipeFile.textContent = "";
    }
});
