@extends('Instructor.layots.main')

@section('title', 'Chat')
@section('main-container')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LMS Chat - Wider View</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-size: 14px;
    }

    .chat-container {
      max-width: 1100px;
      margin: 30px auto;
    }

    .chat-box {
      height: 500px;
      overflow-y: auto;
      padding: 15px;
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .message {
      margin-bottom: 10px;
    }

    .student-msg {
      text-align: right;
    }

    .instructor-msg {
      text-align: left;
    }

    .msg-content {
      display: inline-block;
      padding: 8px 14px;
      border-radius: 18px;
      max-width: 70%;
    }

    .student-msg .msg-content {
      background-color: #d1e7dd;
    }

    .instructor-msg .msg-content {
      background-color: #f8d7da;
    }

    .chat-footer input {
      font-size: 14px;
      padding: 6px 10px;
    }

    .chat-footer button {
      font-size: 14px;
      padding: 6px 16px;
    }
  </style>
</head>
<body style="margin-left: 250px"> 
  <div class="chat-container">
    <div class="card">
      <div class="card-header text-center py-2">
        <strong>LMS Chat - Student & Instructor</strong>
      </div>
      <div class="card-body chat-box" id="chatBox">
        <!-- Messages will go here -->
      </div>
      <div class="card-footer p-3">
        <form id="chatForm" class="d-flex">
          <input type="text" id="messageInput" class="form-control me-2" placeholder="Type your message..." required>
          <button class="btn btn-primary" type="submit">Send</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap & JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const chatForm = document.getElementById('chatForm');
    const messageInput = document.getElementById('messageInput');
    const chatBox = document.getElementById('chatBox');

    const replies = [
      "Hello! How can I help you today?",
      "Please check the course portal.",
      "Assignments are due on Friday.",
      "Let me know if you need any clarification.",
      "I’ve uploaded the notes under 'Resources'."
    ];

    function appendMessage(sender, text) {
      const msg = document.createElement('div');
      msg.className = `message ${sender}-msg`;
      msg.innerHTML = `<div class="msg-content">${text}</div>`;
      chatBox.appendChild(msg);
      chatBox.scrollTop = chatBox.scrollHeight;
    }

    chatForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const text = messageInput.value.trim();
      if (!text) return;
      appendMessage('student', text);
      messageInput.value = '';

      setTimeout(() => {
        const reply = replies[Math.floor(Math.random() * replies.length)];
        appendMessage('instructor', reply);
      }, 800);
    });
  </script>
</body>
</html>

@endsection