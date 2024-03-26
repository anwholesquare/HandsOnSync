<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

<script>

    const elementToToggle = document.getElementById("navigation");
    const toggleButton = document.getElementById("mobileMenu");
    console.log(window.screen.width);
    if (window.screen.width >= 768) {
        elementToToggle.style.zIndex = 1000;
    } else {
        elementToToggle.style.zIndex = -10;
    }

    window.addEventListener('resize', function (event) {
        console.log(window.screen.width);
        if (window.screen.width >= 768) {
            elementToToggle.style.zIndex = 1000;
        } else {
            elementToToggle.style.zIndex = -10;
        }
    }, true);



    toggleButton.addEventListener("click", () => {
        elementToToggle.style.zIndex = (elementToToggle.style.zIndex == -10 ? 1000 : -10);
    });

</script>