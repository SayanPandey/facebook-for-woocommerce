
document.addEventListener("DOMContentLoaded", function() {
    var books_library_togglerIconImg = document.querySelector(".toggler_icon img");
    var books_library_libraryTogglerBody = document.querySelector(".library_toggler_body");
    var books_library_closeButton = document.querySelector(".library_toggler_body .toggler_close");

    books_library_togglerIconImg.addEventListener("click", function() {
        if (books_library_libraryTogglerBody.style.display === "none" || !books_library_libraryTogglerBody.style.display) {
            books_library_libraryTogglerBody.style.display = "block";
            books_library_libraryTogglerBody.style.transition = "display 1s";
        } else {
            books_library_libraryTogglerBody.style.display = "none";
        }
    });

    books_library_closeButton.addEventListener("click", function() {
        books_library_libraryTogglerBody.style.display = "none";
    });
});