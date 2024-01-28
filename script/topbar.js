const navbar = document.getElementById('navbar')
window.onscroll = function(){
	handleNavbar()
}
const sticky = navbar.offsetTop
const handleNavbar = ()=>{
	if(window.pageYOffset >=5){
		navbar.classList.add('active')
	}else{
		navbar.classList.remove('active')
	}
}
