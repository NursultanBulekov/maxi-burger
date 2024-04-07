<section class="registermodal">
	<div id="modal2" class="modal">
	    <div class="modal-content center">
			<!-- Entering the details of user -->
	      <h4>Регистрация</h4>
	      <h5><small class="center" id="reg_error" style="color: red;"></small></h5>
	      <form>
	      	<div class="row">
	      	<div class="input-field col s12">
	          <input onkeypress="return isAlphaNumSpace(event);" id="name_reg" type="text" class="validate">
	          <label for="name_reg">Полное имя</label>
	        </div>

	        <div class="input-field col s12">
	          <input onkeypress="return isEmail(event);" id="email_reg" type="email" class="validate">
	          <label for="email_reg">Почта</label>
	        </div>
			<div class="input-field col s12">
	          <input onkeypress="return isNumber(event);" id="number_reg" type="text" class="validate">
	          <label for="number_reg">Номер Телефона</label>
	        </div>
	    </div>
	    <div class="row">
		    <div class="input-field col s6">
	          <input id="password_reg" type="password" class="validate">
	          <label for="password_reg">Пароль</label>
	        </div>

	        <div class="input-field col s6">
	          <input id="con_password_reg" type="password" class="validate">
	          <label for="con_password_reg">Подтвердите пароль</label>
	        </div>
	        </div>
			<!-- Button submit to enter the user details to database -->
		<a href="javascript:void(0)" id="submit_reg" class="waves-effect waves-light btn" style="background: #ffe001 !important;">
		  Регистрация
		</a></form>
	    </div>
	  </div>
  </section>