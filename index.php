<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI ChatBot</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
</head>

<body>
    <div class="chat-container">
        <div class="chat-header">🤖 AI ChatBot</div>
        <div id="chat-box"></div>
        <div class="input-container">
            <input type="text" id="user-input" placeholder="Ask anything..." onkeydown="if(event.key === 'Enter') sendMessage()">
        </div>
    </div>

    <script>
        function sendMessage() {
            const userInput = document.getElementById('user-input').value.trim();
            if (userInput === "") return;

            const chatBox = document.getElementById('chat-box');

            // User message
            const userMessage = document.createElement('div');
            userMessage.className = 'user-message';
            userMessage.textContent = `You: ${userInput}`;
            chatBox.appendChild(userMessage);

            // Typing indicator
            const typingMessage = document.createElement('div');
            typingMessage.className = 'bot-message typing';
            typingMessage.textContent = 'Bot is typing...';
            chatBox.appendChild(typingMessage);

            document.getElementById('user-input').value = '';

            scrollToBottom(chatBox);

            fetch("ajex.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        message: userInput
                    })
                })
                .then(response => response.json())
                .then(data => {
                    chatBox.removeChild(typingMessage);

                    const botMessage = document.createElement('div');
                    botMessage.className = 'bot-message';
                    botMessage.innerHTML = data.error ?
                        `<strong>Bot:</strong> ${data.error}` :
                        `<strong>Bot:</strong> ${marked.parse(data.response)}`;
                    chatBox.appendChild(botMessage);

                    document.getElementById('user-input').value = '';
                    scrollToBottom(chatBox);
                })
                .catch(() => {
                    chatBox.removeChild(typingMessage);

                    const errorMessage = document.createElement('div');
                    errorMessage.className = 'bot-message';
                    errorMessage.textContent = 'Bot: Failed to fetch response.';
                    chatBox.appendChild(errorMessage);

                    scrollToBottom(chatBox);
                });
        }

        function scrollToBottom(element) {
            element.scrollTo({
                top: element.scrollHeight,
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>