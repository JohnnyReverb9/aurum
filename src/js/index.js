/*
    Авторизация
 */

$('.btn-sign-in').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: '/auth/sign_in',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email,
            password: password
        },
        success (data) {

            if (data.status)
            {
                document.location.href = '/home';
            }
            else
            {
                if (data.typeError === 2)
                {

                }
                else if (data.typeError === 1)
                {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }
                $('.msg').removeClass('none').text(data.msg);
            }
        }
    });

});

/*
    Получение аватарки с поля
 */

let avatar = false;

$('input[name="avatar"]').change(function (e) {
    avatar = e.target.files[0];
});

/*
    Регистрация
 */

$('.btn-sign-up').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let username = $('input[name="username"]').val(),
        login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        email = $('input[name="email"]').val(),
        passwordConfirm = $('input[name="passwordConfirm"]').val();

    let formData = new FormData();
    formData.append('login', login);
    formData.append('password', password);
    formData.append('passwordConfirm', passwordConfirm);
    formData.append('username', username);
    formData.append('email', email);
    formData.append('avatar', avatar);


    $.ajax({
        url: '/auth/sign_up',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                document.location.href = '/index.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);

            }

        }
    });

});
