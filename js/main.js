let firstDiv = document.querySelector(".navbar0")


window.addEventListener("scroll",function(){
let x= this.window.scrollY

if(x > 100){
    firstDiv.style.display="none"
} else{
    firstDiv.style.display="block"
}
})



  window.onload = function () {
    const paymentBtn = document.getElementById("go-to-payment");
    if (paymentBtn) {
      paymentBtn.addEventListener("click", function () {
        localStorage.setItem("redirectAfterLogin", "subscribe.php");
        window.location.href = "expertLOGIN.php";
      });
    }
  
    const loginForm = document.getElementById("user-loginPage");
    if (loginForm) {
      loginForm.addEventListener("submit", function (e) {
        e.preventDefault();
  
        const redirectPage = localStorage.getItem("redirectAfterLogin");
  
        if (redirectPage) {
          localStorage.removeItem("redirectAfterLogin");
          window.location.href = redirectPage;
        } 
      });
    }
  };
  




  