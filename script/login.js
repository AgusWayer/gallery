const pw = document.getElementById("password")
const eye = document.getElementById("eye")
eye.addEventListener("click",()=>{
	if(pw.type == "password"){
		pw.type = "text"
	}else{
		pw.type = "password"
	}
})