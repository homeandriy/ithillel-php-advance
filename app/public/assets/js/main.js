$(function () {
    $('#logout').click(
        function (e) {
            e.preventDefault();
            e.stopPropagation();

            $.post('/logout', {}, function (response) {
                console.log(response);
                if(response.redirect) {
                    window.location.href = response.redirect;
                }

            });
        }
    );
});
