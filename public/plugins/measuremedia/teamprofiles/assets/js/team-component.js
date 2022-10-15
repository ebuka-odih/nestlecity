$(document).ready(function() {
    var input = $('#search-professionals');
    var header = input.parent().find('.section-header');
    var teamMembers = $('.team-members > div');

    teamMembers.find('a').matchHeight();

    input.on('focus', function() {
        $('html, body').animate({
            scrollTop: header.offset().top - 40
        }, 400);
    });

    filterMembers();

    input.on('keyup', function() {
        filterMembers();
    });

    function filterMembers() {
        if (input.val().length < 2) {
            teamMembers.removeClass('active');
            return;
        }

        teamMembers.each(function() {
            var name = $(this).find('h3').html().toLowerCase();

            if (name.indexOf(input.val().toLowerCase()) == -1) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
            }
        });
    }
});