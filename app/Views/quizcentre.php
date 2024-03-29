<!DOCTYPE html>

<head>
    <title>HandsOnSync</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="<?= base_url('css/spinner.css') ?>">
    <link rel="icon" type="image/png" href="<?= base_url() ?>/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/main.css') ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

</head>

<body>
    <div id="loading-overlay-container">
        <div id="spinner-container">
            <div class="lds-ring" id="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div id="spinner-text-container">
                <p id="spinner-text">Loading assets</p>
            </div>
        </div>


    </div>

    <div class="ui-container fadeable" id="ui-container">
        <div class="ui-content" id="ui-content">

            <div class="score-display-container" id="score-display-container">
                <div id="score-display"> <b>Gained Point</b>&nbsp; 0</div>
            </div>

            <div class="word-input-container">
                <div class="guess-input-container">
                    <input type="text" class="guessword-input" id="guessword-input" placeholder="Your Guess">
                    <button class="button check-button" id="check-button">Submit</button>
                </div>

                <p class="word-input-message" id="word-input-message">Lorem ipsum dolor sit amet.</p>
            </div>

            <div class="button-controls-container" id="button-controls-container" style="max-width:330px;">
                <button class="button control-button" id="new-word-button" style="margin-left: 0;">Change word</button>
                <button class="button control-button fingerspell-button" id="play-button">Spell word</button>
            </div>

            <div class="collapsible" id="settings-collapsible">
                <i class="material-icons arrow-down" id="settings-arrow">expand_more</i>
                <p>Advanced settings</p>
            </div>
            <div class="collapsible-content" id="settings-collapsible-content">
                <div class="flex-grid">
                    <div class="settings-row-container">
                        <label class="setting-label" for="speed-slider">Speed</label>
                        <input type="range" min="1" max="4" value="2" class="control-slider stylized-slider"
                            id="speed-slider" />
                        <p class="slider-value-display" id="speed-slider-value">Medium</p>
                    </div>

                    <div class="settings-row-container">
                        <label class="setting-label" for="angle-slider">Angle</label>
                        <input type="range" min="-180" max="180" value="0" class="control-slider stylized-slider"
                            id="angle-slider" />
                        <p class="slider-value-display" id="angle-slider-value">0</p>
                    </div>

                    <div class="settings-row-container"
                        style="margin-top:20px;margin-bottom:20px;flex-direction: column !important;justify-content: start;text-align: start;align-items: start; height:auto !Important;">
                        <label class="setting-label" style="
                                margin-bottom: 20px;
                            ">Quality</label>

                        <div class="quality-buttons-container">
                            <button class="button quality-button quality-left" id="low-quality-button">Low</button>
                            <button class="button quality-button quality-right quality-selected"
                                id="high-quality-button">High</button>
                        </div>
                        <p class="slider-value-display" id="hidden-spacer-slider-value"></p>
                    </div>
                </div>
            </div>



            <div class="collapsible" id="info-collapsible" style="display:none;">
                <i class="material-icons arrow-down" id="info-arrow">expand_more</i>
                <p>Information</p>
                <hr>
            </div>
            <div class="collapsible-content" id="info-collapsible-content" style="display:none;">

                <table class="yellow" style="width:70%; margin-left: auto; margin-right: auto; margin-bottom: 20px;">
                    <tr>
                        <td>New Word</th>
                        <td style="text-align: right;">Alt + R</th>
                    </tr>
                    <tr>
                        <td>Fingerspell</td>
                        <td style="text-align: right;">Space</td>
                    </tr>
                    <tr>
                        <td>Toggle Menu</td>
                        <td style="text-align: right;">Alt + M</td>
                    </tr>
                    <tr>
                        <td>Increase Speed</td>
                        <td style="text-align: right;">Alt + ]</td>
                    </tr>
                    <tr>
                        <td>Decrease Speed</td>
                        <td style="text-align: right;">Alt + [</td>
                    </tr>
                    <tr>
                        <td>Rotate Hand</td>
                        <td style="text-align: right;">Mouse Drag</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: right;">Arrow Keys</td>
                    </tr>

                </table>
            </div>
        </div>

        <div class="feedback-container" id="feedback-container">

        </div>

        <div class="notice-container" id="notice-container" style="display: inline">

        </div>
    </div>

    <script defer type="module">
        import * as FSP from '../../src/handsonsync.js';
        let wordToGuess;
        let wordList = [];
        let score = 0;
        let useHighQuality = true;
        let currentlyPlaying = false;
        let userGuessInputIsFocused = false;

        const speedValues = ['Slow', 'Medium', 'Fast', 'Very Fast'];

        const userGuessInput = document.getElementById('guessword-input');
        const scoreDisplay = document.getElementById('score-display');
        const speedSlider = document.getElementById('speed-slider');
        const angleSlider = document.getElementById('angle-slider');
        const checkWordButton = document.getElementById('check-button');
        const playButton = document.getElementById('play-button');
        const newWordButton = document.getElementById('new-word-button');
        const loadingOverlay = document.getElementById('loading-overlay-container');
        const spinnerContainer = document.getElementById('spinner-container');
        const uiContainer = document.getElementById('ui-container');
        const uiContent = document.getElementById('ui-content');
        const settingsCollapsible = document.getElementById('settings-collapsible');
        const settingsCollapsibleContent = document.getElementById('settings-collapsible-content');
        const settingsArrow = document.getElementById('settings-arrow');
        const infoCollapsible = document.getElementById('info-collapsible');
        const infoCollapsibleContent = document.getElementById('info-collapsible-content');
        const infoArrow = document.getElementById('info-arrow');
        const wordInputMessage = document.getElementById('word-input-message');
        const highQualityButton = document.getElementById('high-quality-button');
        const lowQualityButton = document.getElementById('low-quality-button');
        const speedSliderValueDisplay = document.getElementById('speed-slider-value');
        const angleSliderValueDisplay = document.getElementById('angle-slider-value');
        const feedbackContainer = document.getElementById('feedback-container');
        const noticeContainer = document.getElementById('notice-container');
        const ldsRing = document.getElementById('lds-ring');
        const spinnerText = document.getElementById('spinner-text');

        // handle touch input for buttons - reset their style after user selection so the colour change would not get locked
        function setButtonStyle(button, color, background) {
            if (button == newWordButton || button == playButton || button == checkWordButton) {
                button.style.color = color;
                button.style.backgroundColor = background;
            }
        }

        window.addEventListener('touchstart', event => { setButtonStyle(event.target, 'rgb(29, 29, 29)', 'rgba(255,255,255, 1)'); })
        window.addEventListener('touchend', event => { setButtonStyle(event.target, 'white', 'rgba(0,0,0,0)'); })

        function resizeUI() {
            let aspectLower = 1.07;
            let aspectUpper = 1.39;

            let width = window.innerWidth;
            let height = window.innerHeight;
            let aspect = width / height;

            if (aspect > aspectUpper && width >= 1000) { // wide display
                uiContent.classList.remove('ui-content-mobile');
                uiContainer.classList.remove('ui-container-mobile');
                uiContainer.style.width = `${(width - height * 0.52) / 2}px`;
                uiContainer.style.height = '100vh';

                feedbackContainer.classList.remove('feedback-container-mobile');
                feedbackContainer.classList.add('feedback-container');

                noticeContainer.classList.remove('notice-container-center');
            } else if (aspect < aspectLower || width < 1000) { // mobile display
                uiContainer.classList.add('ui-container-mobile');
                uiContent.classList.add('ui-content-mobile');
                uiContainer.style.width = '100%';
                uiContainer.style.top = `${(window.innerWidth / aspectLower) * 0.8}px`;
                uiContainer.style.height = 'auto';

                feedbackContainer.classList.add('feedback-container-mobile');
                feedbackContainer.classList.remove('feedback-container');

                noticeContainer.classList.add('notice-container-center');
            } else { // default in-range display
                uiContent.classList.remove('ui-content-mobile');
                uiContainer.classList.remove('ui-container-mobile');
                uiContainer.style.width = '40vw';
                uiContainer.style.height = '100vh';

                feedbackContainer.classList.remove('feedback-container-mobile');
                feedbackContainer.classList.add('feedback-container');

                noticeContainer.classList.remove('notice-container-center');
            }

            // update max-height of the information collapsible to prevent cutting off the bottom of it
            updateCollapsibleMaxHeight(infoCollapsibleContent, infoArrow);
        }

        // if the UI cannot fit vertically due to collapsible changes, align it to the top to ensure that the top does not get hidden
        function resizeUIContainer() {
            if (window.innerHeight <= uiContent.scrollHeight) {
                uiContainer.classList.add('justify-start');
                uiContent.classList.add(`overflow`);
            } else {
                uiContainer.classList.remove('justify-start');
                uiContent.classList.remove(`overflow`);
            }
        }

        window.addEventListener('resize', resizeUI);

        function setNewWordToGuess() {
            wordToGuess = wordList[Math.floor(Math.random() * wordList.length)].replace(/[\r\n]+/gm, '');
            console.log(wordToGuess)
        }

        // load word list could be replaced to fetch the list from another source
        // or alternatively make per-word requests
        async function loadWordList() {
            wordList = await fetch('../../../wordList').then(res => res.text()).then(text => text.split('\n'));
            setNewWordToGuess();
        }

        function checkWordGuess() {
            let userGuess = userGuessInput.value.toLowerCase();
            let re = /^[A-Za-z]+$/;

            // check if the user guess is valid - display an error otherwise
            if (userGuess === '' || !userGuess.match(re)) {
                wordInputMessage.innerHTML = userGuess === '' ? 'Please enter your guess first' : 'Your guess contains invalid symbols';
                wordInputMessage.style.maxHeight = '20px';
                return;
            }

            // if the guess is valid for evaluation, clear the inputs and errors
            wordInputMessage.style.maxHeight = 0;
            userGuessInput.value = '';

            score = score + 1 * (userGuess == wordToGuess) - 1 * (userGuess != wordToGuess);
            scoreDisplay.innerHTML = `<b>Gained Point</b>&nbsp; ${score}`;

            let counterElement = document.createElement('p');
            counterElement.classList.add('score-point-effect');
            counterElement.classList.add(userGuess == wordToGuess ? 'score-add' : 'score-subtract');
            counterElement.innerHTML = userGuess == wordToGuess ? '+1' : '-1';

            scoreDisplay.appendChild(counterElement);
            setTimeout(() => scoreDisplay.removeChild(counterElement), 1000);

            if (userGuess == wordToGuess) {

                fetch(`<?= base_url('/api/word/') ?>${wordToGuess}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data['new_word']);

                    })
                    .catch(error => console.error('Error:', error));


                fetch(`<?= base_url('/api/score/') ?>${score}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data['highscore']);
                        if (data['highscore'] == score) {
                            let counterElement = document.createElement('p');
                            counterElement.classList.add('score-point-effect');
                            counterElement.classList.add('score-add');
                            counterElement.innerHTML = '**';
                            setTimeout(() => {
                                scoreDisplay.appendChild(counterElement);
                                setTimeout(() => scoreDisplay.removeChild(counterElement), 1000);
                            }, 2000);
                        }
                    })
                    .catch(error => console.error('Error:', error));


                setNewWordToGuess();
                setTimeout(() => showFeedbackMessage('New Word Generated'), 500);
            }
        }

        let dragging = false;
        let startX = 0;
        let startAngle = 0;
        let dampening = 0.4;

        function updateAngleSlider() {
            FSP.setHandAngle(angleSlider.value);
            updateRangeSliderStyle(angleSlider);
            updateRangeSliderDisplayValue(angleSliderValueDisplay);
        }

        // set up for hand rotation if mouse is down on the canvas only, not on the UI area
        function handleInputDragStart(event) {
            if (!uiContent.contains(event.target) && !currentlyPlaying) {
                startX = event.clientX;
                startAngle = parseFloat(angleSlider.value);
                document.body.style.cursor = 'grabbing';
                dragging = true;

                createAngleFeedbackMessage(`Angle ${angleSlider.value}`);
            }
        }

        function handleInputDragMove(event) {
            dragging ? rotateHand((event.clientX - startX) * dampening) : (document.body.style.cursor = uiContent.contains(event.target) || currentlyPlaying ? '' : 'grab');
        }

        function handleInputDragEnd(event) {
            document.body.style.cursor = uiContent.contains(event.target) ? '' : 'grab';
            dragging = false;
            checkForAngleFeedbackMessageRemoval();
        }

        // rotate in the range of -180 to 180: wrap values around in this range
        function rotateHand(offset) {
            let sign = offset >= 0 ? -1 : 1;
            angleSlider.value = sign * (180 - Math.abs(startAngle - 180 * sign + offset) % 360);
            updateAngleSlider();
            if (angleFeedbackElement) angleFeedbackElement.innerHTML = `Angle ${angleSlider.value}`;
        }

        window.addEventListener('mousedown', (event) => handleInputDragStart(event));
        window.addEventListener('mousemove', (event) => handleInputDragMove(event));
        window.addEventListener('mouseup', (event) => handleInputDragEnd(event));

        let firstTouch;

        function handleTouchDragStart(event) {
            if (!uiContent.contains(event.target) && !currentlyPlaying && !firstTouch) {
                firstTouch = event.changedTouches[0];
                startX = firstTouch.pageX;
                startAngle = parseFloat(angleSlider.value);
                dragging = true;

                createAngleFeedbackMessage(`Angle ${angleSlider.value}`);
            }
        }

        function handleTouchDragEnd() {
            dragging = false;
            firstTouch = null;
            checkForAngleFeedbackMessageRemoval();
        }

        function handleTouchDragMove(event) { if (dragging) rotateHand((event.changedTouches[0].pageX - startX) * dampening); }

        window.addEventListener('touchstart', (event) => handleTouchDragStart(event));
        window.addEventListener('touchmove', (event) => handleTouchDragMove(event));
        window.addEventListener('touchend', handleTouchDragEnd);
        window.addEventListener('touchcancel', handleTouchDragEnd);

        let angleValueIsChanging = false;
        let timeOut;
        let angleFeedbackElement;

        // rotate the hand incrementally if using arrow keys
        window.addEventListener('keydown', (event) => {
            if (!currentlyPlaying) {
                startAngle = parseFloat(angleSlider.value);
                if (event.key === 'ArrowRight' || event.key === 'ArrowLeft') {
                    rotateHand(event.key === 'ArrowRight' ? 10 : -10);
                    createAngleFeedbackMessage(`Angle ${angleSlider.value}`);
                }
            }
        });

        window.addEventListener('keyup', (event) => {
            if (event.key === 'ArrowRight' || event.key === 'ArrowLeft')
                checkForAngleFeedbackMessageRemoval();
        });

        function createAngleFeedbackMessage(text) {
            if (!angleFeedbackElement) {
                angleFeedbackElement = document.createElement('p');
                angleFeedbackElement.classList.add('angle-feedback-effect');
                angleFeedbackElement.innerHTML = text;
                feedbackContainer.appendChild(angleFeedbackElement);
            }
            angleValueIsChanging = true;
        }

        // angle feedback message gets faded out if no input was received for some time and reuses the same old element otherwise
        // this is more accomodating of key mashing rather than removing the element on keyup event
        function checkForAngleFeedbackMessageRemoval() {
            angleValueIsChanging = false;
            clearTimeout(timeOut);

            timeOut = setTimeout(() => {
                if (!angleValueIsChanging) {
                    if (angleFeedbackElement) {
                        angleFeedbackElement.classList.toggle('angle-fade');
                        setTimeout(() => {
                            feedbackContainer.removeChild(angleFeedbackElement);
                            angleFeedbackElement = null;
                        }, 500);
                    }
                }
            }, 1000);
        }

        angleSlider.addEventListener('input', updateAngleSlider);

        function toggleQualitySelection(button, isHighQualitySelected) {
            let selectionClass = 'quality-selected';

            if (!button.classList.contains(selectionClass)) {
                useHighQuality = isHighQualitySelected;
                highQualityButton.classList.toggle(selectionClass);
                lowQualityButton.classList.toggle(selectionClass);
                FSP.setQuality(useHighQuality);
            }
        }

        highQualityButton.addEventListener('click', () => toggleQualitySelection(highQualityButton, true));
        lowQualityButton.addEventListener('click', () => toggleQualitySelection(lowQualityButton, false));

        function updateCollapsibleMaxHeight(content, arrow) {
            content.style.maxHeight = !arrow.classList.contains('open') ? null : content.scrollHeight + 'px';
            FSP.handleWindowResize();
        }

        function toggleCollapsible(content, arrow) {
            arrow.classList.toggle('open');
            updateCollapsibleMaxHeight(content, arrow);
        }

        settingsCollapsible.addEventListener('click', () => toggleCollapsible(settingsCollapsibleContent, settingsArrow));
        infoCollapsible.addEventListener('click', () => toggleCollapsible(infoCollapsibleContent, infoArrow));

        function toggleUI(opacity) {
            uiContainer.style.opacity = opacity;
            uiContainer.classList.toggle('locked');
        }

        // fade the UI out and play the hand animation
        function play() {
            currentlyPlaying = true;
            document.body.style.cursor = '';
            toggleUI(0);
            setTimeout(() => {
                FSP.fingerspell(wordToGuess, () => {
                    console.log('finished fingerspelling')
                    currentlyPlaying = false;
                    toggleUI(1);
                });
            }, 200);
        }

        playButton.addEventListener('click', play);

        window.addEventListener('keyup', (event) => {
            if (!currentlyPlaying) {
                switch (event.ctrlKey && event.key) {
                    case 'n': // handle word generation
                        setNewWordToGuess();
                        showFeedbackMessage('New Word Generated');
                        break;
                    case ']': // increase speed
                        if (parseFloat(speedSlider.getAttribute('max')) > parseFloat(speedSlider.value)) {
                            speedSlider.value = parseFloat(speedSlider.value) + 1;
                            updateSpeedSlider();
                            showFeedbackMessage(`Speed - ${speedValues[speedSlider.value - 1]}`);
                        }
                        break;
                    case '[': // decrease speed
                        if (parseFloat(speedSlider.getAttribute('min')) < parseFloat(speedSlider.value)) {
                            speedSlider.value = parseFloat(speedSlider.value) - 1;
                            updateSpeedSlider();
                            showFeedbackMessage(`Speed - ${speedValues[speedSlider.value - 1]}`);
                        }
                        break;
                    case 'm': // toggle menu

                        toggleCollapsible(settingsCollapsibleContent, settingsArrow);
                        toggleCollapsible(infoCollapsibleContent, infoArrow);

                        break;
                    default: // play the animation
                        if (event.code === 'Space' && !userGuessInputIsFocused) play();
                        break;
                }
            }
        });

        function showFeedbackMessage(feedbackText) {
            let element = document.createElement('p');
            element.classList.add('word-generation-feedback-effect');
            element.innerHTML = feedbackText;

            feedbackContainer.appendChild(element);
            setTimeout(() => feedbackContainer.removeChild(element), 1200);
        }

        // prevent the page from scrolling when hitting Space for playback
        window.addEventListener('keydown', (event) => { if (event.code === 'Space') event.preventDefault(); });

        checkWordButton.addEventListener('click', checkWordGuess);
        userGuessInput.addEventListener('keyup', (event) => { if (event.key === 'Enter') checkWordGuess(); });

        // hide the warning message if the word input is focused again
        userGuessInput.addEventListener('click', () => {
            wordInputMessage.style.maxHeight = 0;
            userGuessInputIsFocused = true;
        });

        window.addEventListener('click', (event) => {
            if (event.target != userGuessInput) userGuessInputIsFocused = false;
        });

        newWordButton.addEventListener('click', () => {
            setNewWordToGuess();
            showFeedbackMessage('New Word Generated');
        });

        function updateSpeedSlider() {
            FSP.setAnimSpeed(speedSlider.value - 1);
            updateRangeSliderStyle(speedSlider);
            updateRangeSliderDisplayValue(speedSliderValueDisplay);
        }

        speedSlider.addEventListener('input', updateSpeedSlider);

        function updateRangeSliderDisplayValue(element) {
            switch (element) {
                case speedSliderValueDisplay:
                    speedSliderValueDisplay.innerHTML = speedValues[speedSlider.value - 1];
                    break;
                case angleSliderValueDisplay:
                    angleSliderValueDisplay.innerHTML = angleSlider.value;
                    break;
                default:
                    break;
            }
        }

        // to shade the left side of the slider track, a linear gradient with a hard step can be used as described by dargue3
        // ref: https://stackoverflow.com/questions/18389224/how-to-style-html5-range-input-to-have-different-color-before-and-after-slider
        function updateRangeSliderStyle(slider) {
            let value = (slider.value - slider.min) / (slider.max - slider.min) * 100;
            slider.style.background = `linear-gradient(to right, whitesmoke 0%, whitesmoke ${value}%, rgb(109, 109, 109) ${value}%, rgb(109, 109, 109) 100%)`;
        }

        async function init() {
            loadWordList();

            let err = await FSP.init('../../../models/hand_animated_v6.glb');
            if (err) {
                ldsRing.style.opacity = '0';
                spinnerText.innerHTML = 'error loading assets';
                return;
            }

            FSP.animate();

            resizeUI();

            let uiContentResizeObserver = new ResizeObserver(resizeUIContainer);
            uiContentResizeObserver.observe(uiContent);

            loadingOverlay.style.opacity = '0';
            spinnerContainer.style.opacity = '0';

            updateRangeSliderStyle(speedSlider);
            updateRangeSliderStyle(angleSlider);

            updateRangeSliderDisplayValue(speedSliderValueDisplay);
            updateRangeSliderDisplayValue(angleSliderValueDisplay);

            // expand the menus on first visit after a small delay for everything to have time to fade in
            // it is very important to keep the information section visible on first visit, whereas settings section can be hidden if desired
            // setTimeout(() => {
            //     toggleCollapsible(settingsCollapsibleContent, settingsArrow);
            //     toggleCollapsible(infoCollapsibleContent, infoArrow);

            //     FSP.handleWindowResize();
            // }, 500);
        }

        init();



    </script>
</body>

</html>