// registration
const erConts = document.querySelectorAll('#erconts');
$('.form_reg > form').submit(function (reg) {
    reg.preventDefault();
    let th = $(this);
    $.ajax({
        url: 'vendor/action/login_reg/reg.php',
        type: 'POST',
        data: th.serialize(),
        success: function (data) {
            if (data == '1') {
                $(erConts).html("Такая почта уже существует");
            }
            if (data == '2') {
                $(erConts).html("Такой номер телефона уже существует");
            }
            if (data == '12') {
                $(erConts).html("Такая почта и номер телефона уже существуют");
            }
            if (data == '3') {
                th.trigger('reset');
                $(erConts).html("Аккаунт создан");
                setTimeout(function () {
                window.location.href = 'index.php';
                },3000)
            }
        },
    })
}); 
// end registration

// Authorization

$(".form_autorization").submit(function(login){
    login.preventDefault();
    let logPass = $(this);
    $.ajax({
        url: 'vendor/action/login_reg/login.php',
        type: 'POST',
        data: logPass.serialize(),
        success: function(data){
            if (data == '1') {
                console.log(data);
                $("#errLog").html("Неверные данные");
            }
            if (data == '3') {
                console.log(data);
                window.location.href = 'index.php';
            }
            if (data == '4') {
                console.log(data);
                $("#errLog").html("Ваш аккаун заблокирован");
            }
        },
    })
});
// end Authorization

//переключение форм авторизации/регистрации
if(document.querySelector('.form_autorization')){
    function show_hide(){
        const buttonLogOne = document.querySelector('#login_button_one');
        const buttonRegOne = document.querySelector('#reg_button_one');

        const buttonLogTwo = document.querySelector('#login_button_two');
        const buttonRegTwo = document.querySelector('#reg_button_two');

        const buttonFiz = document.querySelector('.login_button_fiz > button');
        const buttonYour = document.querySelector('.registration_button_yor > button');

        const login_form = document.querySelector('.login_form');
        const registration_form = document.querySelector('.registration_form');

        const form_reg_fiz = document.querySelector('.form_reg_fiz');
        const form_reg_org =document.querySelector('.form_reg_org');

        buttonLogOne.addEventListener('click', function(){
            login_form.style.display = "block";
            registration_form.style.display = "none";
        });
        buttonRegOne.addEventListener('click', function(){
            login_form.style.display = "none";
            form_reg_org.style.display = "none";
            buttonLogTwo.style.fontWeight = "350";
            buttonLogTwo.style.boxShadow = "none";
            buttonRegTwo.style.fontWeight = "400";
            buttonRegTwo.style.boxShadow = "0px 2px 0px #4174cb";
            registration_form.style.display = "flex";
            form_reg_org.style.display = "none";
            form_reg_fiz.style.display = "flex";
            buttonFiz.style.fontWeight = "400";
            buttonFiz.style.boxShadow = "0px 2px 0px #4174cb";
            buttonYour.style.fontWeight = "350";
            buttonYour.style.boxShadow = "none";
        });

        buttonLogTwo.addEventListener('click', function(){
            login_form.style.display = "block";
            registration_form.style.display = "none";
        });
        buttonRegTwo.addEventListener('click', function(){
            login_form.style.display = "none";
            registration_form.style.display = "flex";
        });

        buttonFiz.addEventListener('click', function(){
            form_reg_org.style.display = "none";
            form_reg_fiz.style.display = "flex";
            buttonYour.style.fontWeight = "350";
            buttonYour.style.boxShadow = "none";
            buttonFiz.style.fontWeight = "400";
            buttonFiz.style.boxShadow = "0px 2px 0px #4174cb";
        });
        buttonYour.addEventListener('click', function(){
            form_reg_fiz.style.display = "none";
            buttonFiz.style.fontWeight = "350";
            buttonFiz.style.boxShadow = "none";
            buttonYour.style.fontWeight = "400";
            buttonYour.style.boxShadow = "0px 2px 0px #4174cb";
            form_reg_org.style.display = "flex";
        });//
    }
    show_hide()
}