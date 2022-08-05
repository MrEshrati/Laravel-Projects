window.onload = function() {
    window.scrollTo(0, 0);
};

var typed = new Typed('.auto-type' , {

    strings: ['Python ?' , 'C# ?' , 'JavaScript ?' , 'CSS ?' , 'PHP ?' , 'Java ?'],
    typeSpeed: 200,
    backSpeed: 150,
    loop: true
})

window.addEventListener('scroll' , function(){

    element = document.querySelector('.main-header')
    if(window.scrollY > 64){

        element.classList.add('fixed-top');
        element.classList.add('ac');

    } else{

        element.classList.remove('fixed-top');
        element.classList.remove('ac');
        
    }
});