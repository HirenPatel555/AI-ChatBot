# 🤖 AI Chatbot with API Integration

A simple AI-powered chatbot that sends user messages to an AI API and displays intelligent responses in a real-time chat interface.

---

## 📌 Overview
This project demonstrates:
- How to send requests to an AI API (e.g., **OpenAI**, **Hugging Face**, or any REST-based AI service**).
- How to handle asynchronous requests with `fetch()`.
- Real-time UI updates with JavaScript.
- Persistent message history for a chat-like experience.

---

## ⚙ How It Works
1. **User sends a message** through the input box.
2. **JavaScript captures the input** and immediately displays it in the chat.
3. **A `fetch()` request** is sent to the AI API with the user’s message as a prompt.
4. **The AI API processes the message** and returns a text response.
5. **JavaScript appends the bot’s reply** to the chat box.
6. Chat scrolls to the latest message automatically.

---

## Clone the Repository & Run the Project
**Just open index.php in your browser**

## 🔄 Message Flow
`User Input → Display in Chat → API Request → AI Processes → Bot Reply → Append to Chat`
