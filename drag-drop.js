document.addEventListener("DOMContentLoaded", () => {
    const editor = document.getElementById("drag-drop-editor");
    const opslaanButton = document.getElementById("opslaan-button");
    let draggedElement = null;

    // Voeg drag-and-drop functionaliteit toe
    editor.addEventListener("dragstart", (event) => {
        draggedElement = event.target;
        event.target.style.opacity = "0.5";
    });

    editor.addEventListener("dragend", (event) => {
        event.target.style.opacity = "1";
        draggedElement = null;
    });

    editor.addEventListener("dragover", (event) => {
        event.preventDefault();
    });

    editor.addEventListener("drop", (event) => {
        event.preventDefault();
        if (draggedElement && event.target.classList.contains("editable")) {
            const targetElement = event.target;
            const parent = targetElement.parentNode;

            // Wissel de posities van de gesleepte en doel-elementen
            parent.insertBefore(draggedElement, targetElement.nextSibling);
        }
    });

    // Opslaan van nieuwe inhoud
    opslaanButton.addEventListener("click", () => {
        const contentBlocks = Array.from(editor.children);
        const nieuweInhoud = contentBlocks.map((block) => block.outerHTML).join("");
        localStorage.setItem("stageInhoud", nieuweInhoud);
        alert("De inhoud van de stagepagina is opgeslagen.");
    });

    // Laad opgeslagen inhoud
    const opgeslagenInhoud = localStorage.getItem("stageInhoud");
    if (opgeslagenInhoud) {
        editor.innerHTML = opgeslagenInhoud;
    }
});
