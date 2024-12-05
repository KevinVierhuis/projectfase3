document.addEventListener("DOMContentLoaded", () => {
    const paginaSelect = document.getElementById("pagina-select");
    const paginaLadenButton = document.getElementById("pagina-laden-button");
    const editorContainer = document.getElementById("editor-container");
    const paginaEditor = document.getElementById("pagina-editor");
    const opslaanButton = document.getElementById("opslaan-button");

    // Voorbeelddata voor pagina's
    const paginas = {
        home: "Welkom op onze homepage!",
        "over-ons": "Over ons: Wij zijn een innovatief bedrijf...",
        contact: "Neem contact met ons op via e-mail of telefoon.",
        blog: "Welkom bij onze blog! Hier delen we het laatste nieuws."
    };

    // Pagina-inhoud laden
    paginaLadenButton.addEventListener("click", () => {
        const geselecteerdePagina = paginaSelect.value;
        paginaEditor.value = paginas[geselecteerdePagina] || "";
        editorContainer.style.display = "flex"; // Toon de editor
    });

    // Inhoud opslaan
    opslaanButton.addEventListener("click", () => {
        const geselecteerdePagina = paginaSelect.value;
        paginas[geselecteerdePagina] = paginaEditor.value;
        alert(`De inhoud van de pagina "${geselecteerdePagina}" is opgeslagen.`);
    });
});
