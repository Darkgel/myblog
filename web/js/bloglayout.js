function scroll_to_top(){
    var position = $(window).scrollTop();
    var acceleration = 10;
    var clock=setInterval(function()
    {
        if(position<=0)
        {
            clearInterval(clock);
        }
        else
        {
            position-=acceleration;
            acceleration+=3;
            $(window).scrollTop(position);
        }
    },10);
}
