<!DOCTYPE html>
    <head>
        <title>HandsOnSync</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="css/spinner.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
        <script defer type="module" src="./src/main.js"></script>
    </head>

    <body>
        <div id="loading-overlay-container">
            <div id="spinner-container">
                <div class="lds-ring" id="lds-ring"><div></div><div></div><div></div><div></div></div>
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
                    <button class="button control-button" id="new-word-button" style="margin-left: 0;" >Change word</button>
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
                            <input type="range" min="1" max="4" value="2" class="control-slider stylized-slider" id="speed-slider"/> 
                            <p class="slider-value-display" id="speed-slider-value">Medium</p>
                        </div>

                        <div class="settings-row-container">
                            <label class="setting-label" for="angle-slider">Angle</label>  
                            <input type="range" min="-180" max="180" value="0" class="control-slider stylized-slider" id="angle-slider" />
                            <p class="slider-value-display" id="angle-slider-value">0</p>
                        </div>

                        <div class="settings-row-container" style="margin-top:20px;margin-bottom:20px;flex-direction: column !important;justify-content: start;text-align: start;align-items: start; height:auto !Important;">
                            <label class="setting-label" style="
                                margin-bottom: 20px;
                            ">Quality</label> 
                            
                            <div class="quality-buttons-container" >
                                <button class="button quality-button quality-left" id="low-quality-button">Low</button>
                                <button class="button quality-button quality-right quality-selected" id="high-quality-button">High</button>
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
    </body>
</html>