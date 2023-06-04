@extends('admin.main')

@section('content')
{{-- <h1>Admin Chat</h1>

<div id="customerList">
  <h2>Customer List</h2>
  <ul>
    @foreach ($customers as $customer)
    <li>
      <a href="#" class="customerLink" data-customer-id="{{ $customer->id }}">{{ $customer->name }}</a>
    </li>
    @endforeach
  </ul>
</div>

<div id="chatBox">
  <h2>Chat Box</h2>
  <ul id="chatMessages"></ul>
  <form id="adminChatForm">
    <input type="hidden" name="customerId" value="">
    <input type="text" id="chatInput" name="message" placeholder="Type a message...">
    <button type="submit">Send</button>
  </form>
</div> --}}
<section class="main-chat">
  <div class="messaging">
    <div class="inbox_msg">
      <div class="inbox_people">
        <div class="headind_srch">
          <div class="recent_heading">
            <h4>Hỗ trợ</h4>
          </div>
          {{-- <div class="srch_bar">
            <div class="stylish-input-group">
              <input type="text" class="search-bar" placeholder="Search">
              <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
              </span> </div>
          </div> --}}
        </div>
        <div class="inbox_chat" id="myDIV">
          @foreach ($customers as $customer)
          <div class="chat_list customerLink" style="cursor: pointer" data-customer-id="{{ $customer->id }}">
            <div class="chat_people align-items-center d-flex">
              <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="chat_ib">
                <h5 class="mb-0">{{ $customer->name }}</h5>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="mesgs">
        <div class="msg_history" id="chatMessages">
        </div>
        <form id="adminChatForm" class="type_msg" method="POST">
          @csrf
          <div class="input_msg_write">
            <input type="hidden" id="customerIdInput" name="customerId" value="">
            <input type="text" id="chatInput" name="message" autocomplete="off" class="write_msg" placeholder="Nhập tin nhắn" />
            <button class="msg_send_btn" type="submit"><i class="fa-regular fa-paper-plane-top"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.6.1/socket.io.min.js" integrity="sha512-AI5A3zIoeRSEEX9z3Vyir8NqSMC1pY7r5h2cE+9J6FLsoEmSSGLFaqMQw8SWvoONXogkfFrkQiJfLeHLz3+HOg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  
</script>
<script>
  function scrollToBottom() {
    var chatMessages = document.getElementById("chatMessages");
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }
  
  let ip_address = '127.0.0.1';
  let socket_port = '3000';

  let socket = io.connect(ip_address + ':' + socket_port + '/admin');
  let currentCustomerId = null;
  $('.customerLink').click(function(e) {
    e.preventDefault();
    let customerId = $(this).data('customer-id');
    $('.customerLink').removeClass('active_chat');
    $(this).addClass('active_chat');
    currentCustomerId = customerId;
    $('#customerIdInput').val(customerId);
    socket.emit('selectCustomer', customerId);

    // Xóa các tin nhắn hiện tại
    $('#chatMessages').empty();

    // Lấy tin nhắn từ cơ sở dữ liệu cho cặp admin và customer hiện tại
    $.ajax({
      url: '/admin/contacts/messages/' + customerId,
      method: 'GET',
      success: function(response) {
        let messages = response.messages;
        // Hiển thị tin nhắn từ cơ sở dữ liệu
        for (let i = 0; i < messages.length; i++) {
          let message = messages[i];
          let messageTime = new Date(message.created_at); // Thời gian tin nhắn

          if (message.sender === 'admin') {
            $('#chatMessages').append("<div class='outgoing_msg'><div class='sent_msg'><p>" + message.message + "</p><span class='time_date'>" + messageTime.toLocaleString() + "</span></div></div>");
          } else {
            $('#chatMessages').append("<div class='incoming_msg mb-2'><div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div> <div class='received_msg'><div class='received_withd_msg'><p>"+ message.message +"</p><span class='time_date'>" + messageTime.toLocaleString() + "</span></div> </div></div>");
          }
        }
        scrollToBottom();
      },
      error: function(xhr, status, error) {
        console.log('Error retrieving messages:', error);
      }
    });
  });

  $('#adminChatForm').submit(function(e) {
    e.preventDefault();
    let message = $('#chatInput').val();
    if (currentCustomerId) {
      socket.emit('adminSendMessage', {customerId: currentCustomerId, message: message });
      $.post('/admin/contacts/send-message', {customerId: currentCustomerId, message: message});
      $('#chatInput').val('');
      $('#chatMessages').append("<div class='outgoing_msg'><div class='sent_msg'><p>" + message + "</p><span class='time_date'>" + new Date().toLocaleString() + "</span></div></div>");
      scrollToBottom();
    } else {
      alert('Vui lòng chọn một khách hàng để trò chuyện.');
    }
  });
  
  socket.on('customerMessage', function(data) {
    console.log(data);
    if (data.customerId == currentCustomerId) {
      $('#chatMessages').append("<div class='incoming_msg mb-2'><div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div> <div class='received_msg'><div class='received_withd_msg'><p>"+ data.message +"</p><span class='time_date'>" + new Date().toLocaleString() + "</span></div> </div></div>");
      scrollToBottom();
    }
  });

</script>
@endsection
