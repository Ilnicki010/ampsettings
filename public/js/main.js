"use strict";
let postId = 0;
const addStar = document.querySelectorAll('#addStar');
const header = document.querySelector('#header-bar');
const headerButton = document.querySelector('#searchButton');
const discoverText = document.querySelector('.discoversite__text');
const headerProfile = document.querySelector('#headerProfile');
const ratingDials = document.querySelectorAll('#ratingDial');
[].forEach.call(addStar, function (star) {
    $(star).change(function (e) {
        console.log('star changed');
        let rate = e.target.value;
        postId = e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.dataset['postid'];
        console.log(e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode);
        $.ajax({
                method: 'POST',
                url: ratingUrl,
                data: {
                    rating: rate,
                    postId: postId,
                    _token: token
                }
            })
            .done(() => {
                const dial = $(e.target).parent().parent().parent().find('#ratingDial');
                getRate(dial);

            })
            .fail((data, textStatus) => {
                if (data.status == 401)
                    swal("Wait...", "You can't judge others when you aren 't a part of AMPSettings fammily!", 'error', {
                        buttons: ["Oh sorry...", "Join!"],
                    }).then(function (okay) {
                        if (okay) window.location.href = "/join";
                    });
            });

    });

});

function getRate(dial) {
    $.ajax({
            method: 'GET',
            url: ratingUrl + '/' + postId,
        })
        .fail((data) => {
            console.log(data);
        })
        .done((data) => {
            console.log('rate :' +
                data);
            dial.val(data).trigger('change');

        });
}

$(document).ready(function () {
    $(".dial").knob();
    var map = {};
    $(".dial").each(function () {
        map[$(this).attr("name")] = $(this).val();
        if ($(this).val() <= 0.5) {
            $(this).css('opacity', '.3');
        }
    });
    console.log($('.dial').val());
    if ($('.dial').val() <= 0.5) {
        $(this).css('opacity', '.3');
    }
    $(".dial").knob({
        'change': function (v) {
            console.log(v);
            if (v <= 0.5) {
                this.$.css('opacity', '.3');
            } else {
                this.$.css('opacity', '1');
            }
        }
    });
    AOS.init();
    $('#getAdvanced').on('click', function () {

        $(this).next('.advanced__wrapped').toggle('medium');
    });
    $('#artist').autocomplete({
        serviceUrl: '/find/artist',
        paramName: 'q',
        dataType: 'json',
        type: 'GET',
        onSelect: function (suggestion) {
            $(this).val(suggestion.value);
        },

    });

    $('#headerButton').click(function () {
        $(this).css('width', '38px').css('font-size', '12px').html('<i class="fas fa-search" aria-hidden="true"></i>');
    });
    window.addEventListener("scroll", data => {
        if (data.pageY < 40) {
            discoverText.style.paddingBottom = 100 - (data.pageY * 2.2) + 'px';
            discoverText.style.paddingTop = 100 - (data.pageY / 1.5) + 'px';
            discoverText.style.fontSize = 55 - (data.pageY) + 'px';
            discoverText.style.zIndex = -9999;
        }
        if (data.pageY >= 40) {
            discoverText.style.paddingBottom = 100 - (40 * 2.2) + 'px';
            discoverText.style.paddingTop = 100 - (40 / 1.5) + 'px';
            discoverText.style.fontSize = 55 - (40) + 'px';
            discoverText.style.zIndex = 9999;
        }
        if (data.pageY == 0) {
            discoverText.style.zIndex = -9999;
            discoverText.style.padding = '100px';
            discoverText.style.fontSize = '55px';
        }
    });
    let prevLabel, currLabel, currentLeterLI;
    artistElements.forEach(el => {
        currLabel = el.firstChild.text.substring(0, 1).toUpperCase();
        if (currLabel !== prevLabel) {

            currentLeterLI = document.createElement("li");
            currentLeterLI.appendChild(document.createTextNode(currLabel));
            currentLeterLI.className = 'artists-list__label'
            el.prepend(currentLeterLI);
            prevLabel = currLabel;
        }

    })
});
