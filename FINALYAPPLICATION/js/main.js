function myfun(){
	var a = document.getElementById("password").value;
	
    if(a==""){
        document.getElementById("pw").innerHTML="**Please fill the Password";
        return false;
    }
    if(a.length < 5 ){
        document.getElementById("pw").innerHTML="**Password length must be greater, then 5 characters";
        return false;
    }
    if(a.length > 20 ){
        document.getElementById("pw").innerHTML="**Password length must be smaller, then 20 characters";
        return false;
    }
   }

   //email validation
   function myfun1(){
	   var e = document.getElementById("email").value;
	   var em = document.getElementById("em").value;
	   var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;;
	   
	   if(e==""){
        document.getElementById("em").innerHTML="**Please fill the Email";
        return false;
       }
	   if(!(e.match(pattern))){
		document.getElementById("em").innetHTML = "Please Enter a Valid Email Address";
		return false;
	   }
	   else{
		document.getElementById("em").innetHTML = "Your Email is Valid.";
		return true;
	   }  
   }

   function myfun2(){
	var u = document.getElementById("username").value;
	
    if(u==""){
        document.getElementById("us").innerHTML="**Please fill the Username";
        return false;
    }
    if(u.length < 5 ){
        document.getElementById("us").innerHTML="**Username length must be smaller, then 5 characters";
        return false;
    }
    if(u.length > 20 ){
        document.getElementById("us").innerHTML="**Username length must be greater, then 20 characters";
        return false;
	}
   }

   /*Register javascript
const usernameReg = /^[a-zA-Z0-9]{3,}$/; // new RegExp('')
const passwordReg = /^[A-Z]+$/; // new RegExp('')
const emailReg = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

function validate() {
   let inputs = document.querySelectorAll("input");
   username = inputs[0].value;
   email = inputs[1].value;
   password = inputs[2].value;
   if (usernameReg.test(username) && email && password != "") {
       return true;
   }
   return false;
  return true;
} */