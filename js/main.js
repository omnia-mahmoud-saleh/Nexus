let firstDiv = document.querySelector(".navbar0")


window.addEventListener("scroll",function(){
let x= this.window.scrollY

if(x > 100){
    firstDiv.style.display="none"
} else{
    firstDiv.style.display="block"
}
})
  