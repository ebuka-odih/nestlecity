(function() {


  // Here's where we set up some embed options and do things with the player API when the video with id "df2872v5dr" is ready.
  window._wq = window._wq || [];
  _wq.push({
    id: "_all",
    options: {
      autoPlay: true,
      controlsVisibleOnLoad: true,
      wmode: "transparent"
    },
    onReady: function(video) {
    // for all existing and future videos, run this function
    video.bind('play', function() {
      // when one video plays, iterate over all the videos and pause each,
      // unless it's the video that just started playing.
      var allVideos = Wistia.api.all();
      for (var i = 0; i < allVideos.length; i++) {
        if (allVideos[i].hashedId() !== video.hashedId()) {
          allVideos[i].pause();
        }
      }
    });
  }});

  $('.team-member-reviews-reviews').owlCarousel({
    items: 1,
    loop: true
  });
  // $('.team-member-articles').owlCarousel({
  //   items: 1,
  //   loop: true
  // });

  $('.team-member-about-question').on('click', function(e) {
    if($(this).parents('.team-member-about-question-start').length > 0) return;
    $('.team-member-about-question-start .team-member-about-question-cap').addClass('changed').html($(this).html());
    resize_qa_box();
  });

  function resize_qa_box() {
    var $title = $('.team-member-about-question-start .team-member-about-question-cap .team-member-about-question-title span');
    $title.boxfit({
      align_center: false,
      multiline: true,
      step_size: 1,
      minimum_font_size: 12,
      // maximum_font_size: 32
    });
    var $content = $('.team-member-about-question-start .team-member-about-question-cap .team-member-about-question-content span');
    $content.boxfit({
      align_center: false,
      multiline: true,
      step_size: 1,
      minimum_font_size: 12,
      maximum_font_size: 25
    });
  }
  resize_qa_box();
  // Show image
  $('.team-member-profile-thumbnails img').on('click', function(e) {
      console.log('clicked');
    $('.team-member-profile-main #player').hide();
    $('.team-member-profile-main img').show();
    $('.team-member-profile-thumbnails img').removeClass('active');
    $('.team-member-profile-thumbnails > div.video').removeClass('active');
    $(this).addClass('active');
    $('.team-member-profile-main img').attr('src', $(this).data('image-path'));
  });
  // Show video
  $('.team-member-profile-thumbnails > div.video').on('click', function(e) {
    e.preventDefault();
    console.log('clicked1');
    $('.team-member-profile-main img').hide();
    $('.team-member-profile-main #player').show();
    $('html, body').animate({
        scrollTop: $("#player").offset().top
    }, 2000);
    $('.black-text').hide();
    $('.team-member-profile-thumbnails img').removeClass('active');
    $('.team-member-profile-thumbnails > div.video').removeClass('active');
    $(this).addClass('active');
    // Wistia
    var wistiaEmbedHtml = '<div class="wistia_embed wistia_async_{{hashed_id}}" style="width:480px;height:270px;">&nbsp;</div>';
    // Set video src/type
    var videoIndex = $(this).data('video-id');
    var videoHashedId = $(this).data('hashed-id');
    var videoSrc = $(this).data('video-src');
    var videoType = $(this).data('video-type');

    wistiaEmbedHtml = wistiaEmbedHtml.replace('{{hashed_id}}', videoHashedId);
    // Play video
    $('#player').html(wistiaEmbedHtml);
  });

  $('.team-member-profile-thumbnails img:eq(0)').addClass('active');

  // video thumbnails
  $('div.video-thumbnail').hover(function() {
    $(this).find('div.video-background').stop().animate({
      height: '130px',
      width: '230px',
      backgroundColor: 'rgba(0, 82, 149, 0.5)',
      left: '0px',
      top: '0px',
      mixBlendMode: 'multiply'
    });
  },
  function() {
    $(this).find('div.video-background').stop().animate({
      height: '28px',
      width: '50px',
      backgroundColor: 'rgba(0, 82, 149, 0.76)',
      left: '85px',
      top: '50px',
      'mix-blend-mode': 'normal'
    });
  });

  $(document).ready(function(){
    $('.show-articles.more').click(function(e){
      e.preventDefault();
      $(this).hide();
      $('.more-articles').slideDown(function(){
        $('.show-articles.less').show();
      });
    });
    $('.show-articles.less').click(function(e){
      e.preventDefault();
      $(this).hide();
      $('.more-articles').slideUp(function(){
        $('.show-articles.more').show();
      });
    });
  });

})();

$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 115;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >>";
    var lesstext = "Show less <<";
    

    $('.more').each(function() {
        var content = $(this).text();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});