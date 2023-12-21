function scrollToBottom() {
    var chatContainer = $('#chat-container');
    chatContainer.scrollTop(chatContainer[0].scrollHeight);
}

scrollToBottom();

$(document).ready(function() {
    $("#message-to-send").keydown(function(event) {
        if (event.which == 13) {
            sendMessage();
        }
    });

    $('#btn-send').click(function () {
        sendMessage();
    })

    function sendMessage() {
        const message = $('#message-to-send').val();
        if (message == '') {
            return;
        }
        // The Enter key (key code 13) was pressed
        event.preventDefault(); // Prevent the default behavior (form submission, line break, etc.)

        // Get the URL from the hidden input field
        const url = $("#url").val();
        const userType = $("#user-type").val();
        const formattedTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        const userImage = $('#user-image-link').val();
        const receiverId = $('#receiver-id').val();
        const userId = $('#user-id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#btn-send').prop("disabled", true);
        $('#btn-send').text('Wait....');
        $.ajax({
            url: url,
            type: 'POST',
            data: { 'userType' : userType, 'message' : message, 'receiverId' : receiverId, 'userId' : userId },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var liElement = `
                        <li>
                            <div class="message my-message"><img class="rounded-circle float-start chat-user-img img-30" src="${userImage}" alt="">
                                <div class="message-data text-end"><span class="message-data-time">${formattedTime}</span></div>
                                ${message}
                            </div>
                        </li>`;

                $("#chatUl").append(liElement);
                $("#message-to-send").val("");

                $('#btn-send').prop("disabled", false);
                $('#btn-send').text('SEND');

                scrollToBottom();
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.log("Error: " + error);
            }
        });
    }

    function newMessages() {
        const id = $('#receiver-id').val();
        console.log('/chat/new/'+id);
        const ul = $('#message-notification');
        var baseUrl = $('#base-url').val();
        $.ajax({
            url: baseUrl + '/chat/new/'+id, // Replace with your actual endpoint
            method: 'GET',
            success: function(data) {
                console.log(data);
                if (data && data.length > 0) {
                    // data = JSON.parse(data);
                    data.forEach(function(message) {
                        var liElement = `
                        <li class="clearfix">
                            <div class="message other-message pull-right"><img class="rounded-circle float-end chat-user-img img-30" src="/uploads/users_image/${message.profile_image}" alt="">
                                <div class="message-dat"><span class="message-data-time">${message.created_at}</span></div>
                                ${message.message}
                            </div>
                        </li>`;

                        $("#chatUl").append(liElement);
                        scrollToBottom();
                    })
                }
                // Handle the success response
                console.log(data);
            },
            error: function(error) {
                // Handle the error response
                console.error('Error:', error);
            }
        });
    }

    // Set up an interval to make the AJAX call every 15 seconds
    setInterval(newMessages, 15000);
});
