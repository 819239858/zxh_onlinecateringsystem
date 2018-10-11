window.onload = function() {
	var faceimg = document.getElementById("faceimg");
	faceimg.onclick = function(){
		window.open('face.php','face','width=400,height=400,top=200,left=200,scrollbars=1');
	}
	code();
	//表单验证如下
	var fm = document.getElementsByTagName('form')[0];
	fm.onsubmit = function () {
		//能用客户端验证的，尽量用客户端
		//用户名验证
		if (fm.uname.value.length < 2 || fm.uname.value.length > 20) {
			alert('用户名不得小于2位或者大于20位');
			fm.uname.value = "";
			fm.uname.focus();
			return false;
		}
		if (/\[\<\>\'\"\]/.test(fm.uname.value)) {
			alert('用户名不得包含非法字符!');
			fm.uname.value = "";
			fm.uname.focus();
			return false;
		}

		//密码验证
		if (fm.pwd.value.length < 6) {
			alert('密码不得小于6位');
			fm.pwd.value = "";
			fm.pwd.focus();
			return false;
		}
		if (fm.pwd.value != fm.pwdagain.value) {
			alert('密码和密码确认必须一致!');
			fm.pwdagain.value = "";
			fm.pwdagain.focus();
			return false;
		}
		//验证码
		if (fm.code.value.length != 4) {
			alert('验证码必须为4位!');
			fm.code.value = "";
			fm.code.focus();
			return false;
		}
		return true;
	}
};


