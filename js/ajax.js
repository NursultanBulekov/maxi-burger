function isEmail(evt) {
    var charCode = evt.which || event.charCode || event.char;
    if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode != 64) && (charCode != 46) && (charCode != 95) && (charCode != 33) && (charCode > 31 && (charCode < 48 || charCode > 57)))
        return false;

    return true;
}

function isAlphaNumSpace(evt) {
    var charCode = evt.which || event.charCode || event.char;
    if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode != 64) && (charCode != 46) && (charCode != 95) && (charCode != 33) && (charCode > 31 && (charCode < 48 || charCode > 57)) && (charCode != 32))
        return false;


    return true;
}

function isNumber(evt) {
    var charCode = evt.which || event.charCode || event.char;
    if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode != 64) && (charCode != 46) && (charCode != 95) && (charCode != 33) && (charCode > 31 && (charCode < 48 || charCode > 57)) && (charCode != 32))
        return false;


    return true;
}

$(function(){
	$('#submit_reg').click(function(){

		var name = $('#name_reg').val()
		var email = $('#email_reg').val()
		var number = $('#number_reg').val()
		var password = $('#password_reg').val()
		var con_password = $('#con_password_reg').val()

		var mail_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;
		var name_regex = /^[(A-Z)?(a-z)?(А-Я)?(а-я)?(0-9)?\s*]+$/u;

		if ((name == "") || (email == "") || (number == "") || (password == "") || (con_password == "")) {

			$('#reg_error').text("Не оставляйте поля пустыми!");
		}
		else if (!mail_regex.test(email)) {

			$('#reg_error').text('Введите корректный Email!');
		}
		else if (!name_regex.test(name)) {

			$('#reg_error').text('Введите корректное имя!');
		}
		else if (password != con_password) {

			$('#reg_error').text("Пароли не совпадают!");
		} else {

			$.ajax({
	            url :'/MAXIBURGER/backends/register.php',
	            type:'POST',
	            data :{
	            'name':name,
	            'email':email,
				'number':number,
	            'password':password
	            },
	            dataType:'json',
	            beforeSend:function(){
	                $('#submit_reg').prop("disabled", true);

	            },
	            success  :function(data){

	            	$('#name_reg').val("")

	            	$('#email_reg').val("")

					$('#number_reg').val("")

	            	$('#password_reg').val("")

	            	$('#con_password_reg').val("")

	            	var instance2 = M.Modal.getInstance($('#modal2'));

	            	instance2.close();

	            	if (data['code'] == "0") {

	            		toggleModal('Ошибка!', data['msg']);

	            	} else if (data['code'] == "1") {

	            		toggleModal('Успешно!', data['msg']);

	            	}
	            	$('#submit_reg').prop("disabled", false);

	           }
	        });
		}
	})

	$('#login_btn').click(function(){
		var email = $('#email_login').val()
		var password = $('#password_login').val()

		var mail_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;

		if ((email == "") || (password == "")) {

			$('#reg_error').text("Не оставляйте поля пустыми!");
		}
		else if (!mail_regex.test(email)) {

			$('#reg_error').text('Введите корректную почту!');
		} else {

			$.ajax({
	            url :'/MAXIBURGER/backends/login.php',
	            type:'POST',
	            data :{
	            'name':name,
	            'email':email,
	            'password':password
	            },
	            dataType:'json',
	            beforeSend:function(){
	                $('#submit_reg').prop("disabled", true);

	            },
	            success  :function(data){

	            	$('#name_reg').val("")

	            	$('#email_reg').val("")

	            	$('#password_reg').val("")

	            	$('#con_password_reg').val("")

	            	var instance2 = M.Modal.getInstance($('#modal2'));

	            	instance2.close();

	            	if (data['code'] == "0") {

	            		toggleModal('Ошибка!', data['msg']);

	            	} else if (data['code'] == "1") {


	            		location.reload(true);

	            	}
	            	$('#login_btn').prop("disabled", false);

	           }
	        });


		}
	})
})