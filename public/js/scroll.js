var outerPane = $('#content'),
    didScroll = false;

$(window).scroll(function () { //watches scroll of the window
    didScroll = true;
});

//Sets an interval so your window.scroll event doesn't fire constantly. This waits for the user to stop scrolling for not even a second and then fires the pageCountUpdate function (and then the getPost function)
setInterval(function () {
    if (didScroll) {
        didScroll = false;
        if (($(document).height() - $(window).height()) - $(window).scrollTop() < 10) {
            pageCountUpdate();
        }
    }
}, 250);

//This function runs when user scrolls. It will call the new posts if the max_page isn't met and will fade in/fade out the end of page message
function pageCountUpdate() {
    var page = parseInt($('#page').val());
    var max_page = parseInt($('#max_page').val());

    if (page < max_page) {
        $('#page').val(page + 1);
        getPosts();
        $('#end_of_page').hide();
    } else {
        $('#end_of_page').fadeIn();
    }
}


//Ajax call to get your new posts
function getPosts() {
    $.ajax({
        type: "POST",
        url: "/load", // whatever your URL is
        data: {
            page: page
        },
        beforeSend: function () { //This is your loading message ADD AN ID
            $('#content').append("<div id='loading' class='center'>Loading news items...</div>");
        },
        complete: function () { //remove the loading message
            $('#loading').remove
        },
        success: function (html) { // success! YAY!! Add HTML to content container
            $('#content').append(html);
        }
    });

} //end of getPosts functi
