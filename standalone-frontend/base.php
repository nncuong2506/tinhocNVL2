<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chatbot</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="chatbox">
            <div class="chatbox__support">
                <div class="chatbox__header">
                    <div class="chatbox__image--header">
                        <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-5--v1.png" alt="image">
                    </div>
                    <div class="chatbox__content--header">
                        <h4 class="chatbox__heading--header">Chat support</h4>
                        <p class="chatbox__description--header">Hi. My name is Sam. How can I help you?</p>
                    </div>
                </div>
                <div class="chatbox__messages">
                    <!-- Messages will be added dynamically by JavaScript -->
                    <div></div>
                </div>
                <div class="chatbox__footer">
                    <input type="text" placeholder="Write a message...">
                    <button class="chatbox__send--footer send__button">Send</button>
                </div>
            </div>
            <div class="chatbox__button">
                <button><img src="./images/chatbox-icon.svg" /></button>
            </div>
        </div>
    </div>
    <script>
        // Replace $SCRIPT_ROOT with the actual root URL in your Flask application
        $SCRIPT_ROOT = {{ request.script_root|tojson }};
    </script>
    <script src="app.js"></script>
    <script src="main.js"></script>
</body>

</html>
