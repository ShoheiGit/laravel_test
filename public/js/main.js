$(document).ready(function () {
    $('#followForm').on('submit', function (event) {
        event.preventDefault(); // フォームのデフォルトの送信をキャンセル

        const followButton = $('#followButton');
        const formData = $(this).serialize();
        const actionUrl = $(this).attr('action');

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data.status === 'followed') {
                    followButton.text('Unfollow');
                } else if (data.status === 'unfollowed') {
                    followButton.text('Follow');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
