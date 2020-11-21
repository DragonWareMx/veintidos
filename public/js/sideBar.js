jQuery('document').ready(function($){
    var menuBtn=$('.sideBar_button'),
        menu=$('.sideBar_left');

    var width=$(window).width();
    if(width < 1001){
        menu.removeClass('show'); 
    }
    menuBtn.click(function(){
        if(menu.hasClass('show')){
            menu.removeClass('show');
        }
        else{
            menu.addClass('show');
        }
    });
});