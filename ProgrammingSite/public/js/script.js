window.onload = function() {
    window.scrollTo(0, 0);
};


if (window.location.href === 'http://127.0.0.1:8000/'){
    var typed = new Typed('.auto-type' , {

        strings: ['Python ?' , 'C# ?' , 'JavaScript ?' , 'CSS ?' , 'PHP ?' , 'Java ?'],
        typeSpeed: 200,
        backSpeed: 150,
        loop: true
    })
}


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

$(document).ready(function(){
    $(".veen .rgstr-btn button").click(function(){
        $('.veen .wrapper').addClass('move');
        $('.body').css('background','#2b323c');
        $(".veen .login-btn button").removeClass('active');
        $(this).addClass('active');

    });
    $(".veen .login-btn button").click(function(){
        $('.veen .wrapper').removeClass('move');
        $('.body').css('background','#2b323c');
        $(".veen .rgstr-btn button").removeClass('active');
        $(this).addClass('active');
    });
});
