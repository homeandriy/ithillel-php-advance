$(function () {
    console.log('RUN');
    $('#logout').click(
        function (e) {
            e.preventDefault();
            e.stopPropagation();

            $.post('/logout', {}, function (response) {
                console.log(response);
                if(response.redirect) {
                    window.location.href = window.location.origin + '/' + response.redirect;
                }

            });
        }
    );
});
