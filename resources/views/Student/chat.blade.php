@extends('Student.layots.main')

@section('title', 'chat')
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

    .my-message {
      text-align: right;
    }

    .other-message {
      text-align: left;
    }

    .msg-content {
      display: inline-block;
      padding: 8px 14px;
      border-radius: 18px;
      max-width: 70%;
      word-wrap: break-word;
    }

    .my-message .msg-content {
      background-color: #d1e7dd;
    }

    .other-message .msg-content {
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
        <!-- Display existing messages -->
        @foreach($chat as $message)
          <div class="message {{ $message->sender_id == $currentUserId ? 'my-message' : 'other-message' }}">
            <div class="msg-content">
              {{ $message->message }}
            </div>
          </div>
        @endforeach
      </div>
      <div class="card-footer p-3">
        <form id="chatForm" class="d-flex">
          @csrf
          <input type="hidden" name="course_id" value="{{ $id }}">
          {{-- <input type="hidden" name="course_id" > --}}
          <input type="hidden" name="sender_id" value="{{ $currentUserId }}">
          <input type="text" id="messageInput" name="message" class="form-control me-2" placeholder="Type your message..." required>
          <button class="btn btn-primary" type="submit">Send</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap & JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      const chatForm = $('#chatForm');
      const messageInput = $('#messageInput');
      const chatBox = $('#chatBox');

      function appendMessage(isMe, text) {
        const msgClass = isMe ? 'my-message' : 'other-message';
        const msg = `<div class="message ${msgClass}">
                      <div class="msg-content">${text}</div>
                    </div>`;
        chatBox.append(msg);
        chatBox.scrollTop(chatBox[0].scrollHeight);
      }

      chatForm.on('submit', function(e) {
        e.preventDefault();
        const text = messageInput.val().trim();
        if (!text) return;

        // Append the message immediately
        appendMessage(true, text);

        // Send the message to the server
        $.ajax({
          url: "{{ route('chat.store') }}",
          method: "POST",
          data: $(this).serialize(),
          success: function(response) {
            messageInput.val('');
          },
          error: function(xhr) {
            console.error(xhr.responseText);
          }
        });
      });



      // Poll every 3 seconds
      setInterval(pollForNewMessages, 3000);
    });
  </script>
</body>
</html>

@endsection
