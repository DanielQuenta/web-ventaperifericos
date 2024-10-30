// Esperar a que el documento esté completamente cargado
document.addEventListener("DOMContentLoaded", function () {
    // Obtener el botón y el contenedor de enlaces
    const toggleButton = document.getElementById("toggle-button");
    const linkContainer = document.getElementById("link-container");

    // Manejar el clic en el botón
    toggleButton.addEventListener("click", function () {
        // Alternar la visibilidad del contenedor de enlaces
        if (linkContainer.style.display === "block") {
            linkContainer.style.display = "none";
        } else {
            linkContainer.style.display = "block";
        }
    });
});
