$(function(){
  var i=0;
  var timer=null;
  var firstimg=$('.img li').clone();
  $('.img').append(firstimg).width($('.img li').length*($('.img img').width()+10));
 // console.log($('.img li').length);
 // console.log($('.img').width());//3600

  // 下一个按钮
  $('.next').click(function(){
    i++;
    if (i==$('.img li').length-9){
      i=1;
      $('.img').css({left:0});
    };
    $('.img').stop().animate({left:-i*180},300);
  });

  // 上一个按钮
  $('.prev').click(function(){
    i--;
    if (i==-1){
      i=$('.img li').length-11;
      $('.img').css({left:-i*180});
    }
    $('.img').stop().animate({left:-i*180},300);
  });

  //设置按钮的显示和隐藏
  $('.banner').hover(function(){
    $('.carousel-btn').show();
  },function(){
    $('.carousel-btn').hide();
  });

  //定时器自动播放
  timer=setInterval(function(){
    i++;
    if (i==$('.img li').length-9){
      i=1;
      $('.img').css({left:0});
    };
    $('.img').stop().animate({left:-i*180},300);
  },2000)

  //鼠标移入，暂停自动播放，移出，开始自动播放
  $('.banner').hover(function(){
    clearInterval(timer);
  },function(){
    timer=setInterval(function(){
    i++;
    if (i==$('.img li').length-9){
      i=1;
      $('.img').css({left:0});
    };
    $('.img').stop().animate({left:-i*180},300);
    },2000)
  });

});



$(document).ready(function() {

  $("#owl-demo").owlCarousel({

      autoPlay: 3000, //Set AutoPlay to 3 seconds

      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]

  });

});
