function scrollToBottom() {
    var chatContainer = $('#chat-container');
    chatContainer.scrollTop(chatContainer[0].scrollHeight);
}

scrollToBottom();

$(document).ready(function() {
    $("#message-to-send").keydown(function(event) {
        if (event.which == 13) {
            const message = $(this).val();
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
            const studentId = $('#student-id').val();
            const userId = $('#user-id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                data: { 'userType' : userType, 'message' : message, 'studentId' : studentId, 'userId' : userId },
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
                    scrollToBottom();
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error("Error: " + error);
                }
            });
        }
    });
});
