/*


$(document).ready(function () {
    $('#sign-in').click(function () {
        vex.dialog.open({
            message: 'Войти',
            input: [
                '<input name="username" type="email" placeholder="Email" required />',
                '<input name="password" type="password" placeholder="Password" required />'
            ].join(''),
            buttons: [
                $.extend({}, vex.dialog.buttons.YES, {text: 'Login'}),
                $.extend({}, vex.dialog.buttons.NO, {text: 'Cancel'})
            ],
            callback: function (data) {
                if (!data) {
                    console.log('Cancelled')
                } else {
                    console.log('Username', data.username, 'Password', data.password)
                }
            }
        });
    });
    $('#sign-up').click(function () {
        vex.dialog.open({
            message: 'Регистрация',
            input: [
                '<input name="name" type="text" placeholder="Ваше логин" required />',
                '<input name="username" type="email" placeholder="Email" required />',
                '<input name="password" type="password" placeholder="Password" required />'
            ].join(''),
            buttons: [
                $.extend({}, vex.dialog.buttons.YES, { text: 'Sign' }),
                $.extend({}, vex.dialog.buttons.NO, { text: 'Cancel' })
            ],
            callback: function (data) {
                if (!data) {
                    console.log('Cancelled')
                } else {
                    console.log('Username', data.username, 'Password', data.password)
                }
            }
        })
});*/
