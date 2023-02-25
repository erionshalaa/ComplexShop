
function login()
	{
		var unamee = document.LoginForm.uname;
		var pwd = document.LoginForm.pword;

		if(unamee.value == "")
		{
			alert("Please enter email." );
			return false;
			
		}
		if(pwd.value == "")
		{
        	alert("Enter the password");
			return false;
		}
		
			return true;
	}
	


	
	
	function signup() {
		const emriREGEX = /^[A-Za-z]+$/
		const emailREGEX = /^[\w.+-]+@[\w.-]+\.[a-zA-Z]{2,}$/
		const passREGEX = /^[A-Z][A-Za-z0-9@$!%*?&]*[a-z][A-Za-z0-9@$!%*?&]*[0-9][A-Za-z0-9@$!%*?&]*$/
		let emrisu = document.SignUpForm.emrii;
		let suNamesu = document.SignUpForm.mbiemrii;
	    let emailsu = document.SignUpForm.emaili;
		let passSu = document.SignUpForm.passwordi;
	  
		if (emrisu.value == "") {
		  alert("Please enter your name!");
		  return false;
		}
		if (emrisu.value.length < 3) {
			alert("Name should be atleast 3 characters");
			return false;
		  }
		if (!emriREGEX.test(emrisu.value)) {
		  alert("Name must contain letters only!");
		  return false;
		}
	  
		if (suNamesu.value == "") {
		  alert("Please enter your Surname!");
		  return false;
		}
		if (suNamesu.value.length < 3) {
			alert("Surname should be atleast 3 characters");
			return false;
		  }
		if (!emriREGEX.test(suNamesu.value)) {
		  alert("Surname must contain letters only!");
		  return false;
		}
		if (emailsu.value == "") {
		  alert("Email can't be blank!");
		  return false;
		}
		if (!emailREGEX.test(emailsu.value)) {
		  alert("Please enter a valid email address!");
		  return false;
		}
		if (passSu.value == "") {
		  alert("Password can't be blank!");
		  return false;
		}
		if (passSu.value.length < 8) {
		  alert("Please enter a Password with at least 8 charachters!");
		  return false;
		}
		if (!passREGEX.test(passSu.value)) {
		  alert("Password must contasin one lowercase letter, one digit and the first letter must be Uppercase!");
		  return false;
		}
	  
		return true;
	  }



	  function contact()
	   {
		const emriREG = /^[A-Za-z]+$/
		const emailREG = /^[\w.+-]+@[\w.-]+\.[a-zA-Z]{2,}$/
		var emriC = document.ContactForm.nm;
		var emailC = document.ContactForm.em;
		var subjectC = document.ContactForm.sb;
		var messageC = document.ContactForm.msg;
	  
		if (emriC.value == "") {
		  alert("Please enter your name!");
		  return false;
		}
		if (emriC.value.length < 3) {
			alert("Name should be at least 3 characters!");
			return false;
		  }
		if (!emriREG.test(emriC.value)) {
		  alert("Name must contain letters only!");
		  return false;
		}
		if (emailC.value == "") {
		  alert("Email can't be blank!");
		  return false;
		}
		if (!emailREG.test(emailC.value)) {
		  alert("Please enter a valid email address!");
		  return false;
		}
		if (subjectC.value == "") {
			alert("Please enter the subject!");
			return false;
		  }
		if (messageC.value == "") {
		  alert("Please enter your message!");
		  return false;
		}
	  
		return true;
	  }
	  
	  