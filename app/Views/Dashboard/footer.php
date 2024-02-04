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

<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
<script>
    function addDarkmodeWidget() {
        const options = {
            bottom: '64px', // default: '32px'
            right: '32px', // default: '32px'
            left: 'unset', // default: 'unset'
            time: '0.5s', // default: '0.3s'
            mixColor: '#fff', // default: '#fff'
            backgroundColor: '#fff',  // default: '#fff'
            buttonColorDark: '#100f2c',  // default: '#100f2c'
            buttonColorLight: '#fff', // default: '#fff'
            saveInCookies: true, // default: true,
            label: '🌓', // default: ''
            autoMatchOsTheme: true // default: true
        }
        new Darkmode(options).showWidget();
    }
    window.addEventListener('load', addDarkmodeWidget);
</script>