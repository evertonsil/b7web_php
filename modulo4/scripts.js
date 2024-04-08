document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('#loginForm');
    var inpUserName = document.querySelector('#username').value;
    var inpUserMail = document.querySelector('#usermail').value;

    var errUserName = document.querySelector('.errUserName');
    var errUserMail = document.querySelector('.errUserMail');

    form.addEventListener('submit', function (event) {
        console.log(inpUserMail);
        event.preventDefault();
        if (inpUserName == '') {
            errUserName.style.display = 'block';
        }
        else if (inpUserMail == '') {
            errUserMail.style.display = 'block';
        }
        else {
            form.submit();
        }
    });
});