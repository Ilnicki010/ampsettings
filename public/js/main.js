"use strict";
let postId = 0;
const addStar = document.querySelectorAll('#addStar');
const header = document.querySelector('#header-bar');
const headerButton = document.querySelector('#searchButton');
const discoverText = document.querySelector('.discoversite__text');
const headerProfile = document.querySelector('#headerProfile');
const ratingDials = document.querySelectorAll('#ratingDial');
const getAdvanced = document.querySelectorAll('#getAdvanced');
var style = getComputedStyle(document.body);

[].forEach.call(addStar, function (star) {
    $(star).change(function (e) {
        console.log('star changed');
        let rate = e.target.value;
        postId = e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.dataset['postid'];
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
                console.log(data);
                if (data.status == 401)
                    swal("Wait...", "You can't judge others when you aren 't a part of AMPSettings family!", 'error', {
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

$(window).ready(function () {
    $(".dial").knob({
        fgColor: style.getPropertyValue('--accent-color'),
    });
    $('#pickupLayout').change(function (data) {
        let el;
        if ($(this).value != 'empty') {
            switch ($(this).val()) {
                case 'hh':

                    el = '<div class="pickups pickups--"' + $(this).val() + '><label>H-S-S</label><input type="checkbox" name="rGroup" value="SS01" id="r11" checked="" /><label class="pickup" for="r11"></label><input type="checkbox" name="rGroup" value="SS02" id="r12" checked="" /><label class="pickup" for="r12"></label></div';
                    break;
            }
            $('#form__pickups').empty().append(el);
        }
    })

    // var map = {};
    // $(".dial").each(function () {
    //     map[$(this).attr("name")] = $(this).val();
    //     if ($(this).val() <= 0.5) {
    //         $(this).css('opacity', '.3');
    //     }
    // });
    $('input[type=checkbox]').removeAttr('checked');
    $('#pickupNumber').on('input', function () {
        $('#pickupPositionText').text($(this).val());
        $('.pickup').css({
            'background': 'var(--accent-color)',
            'border': 'none',

        });
        console.log($(this).val());
        switch ($(this).val()) {
            case '1':
                $('.pickup:nth-child(2)').css({
                    'background': '#24273c',
                    'border': '1px solid #fff',

                });
                break;
            case '2':
                $('.pickup:nth-child(2)').css({
                    'background': '#24273c',
                    'border': '1px solid #fff',

                });
                $('.pickup:nth-child(3)').css({
                    'background': '#24273c',
                    'border': '1px solid #fff',

                });


                break;
            case '3':
                $('.pickup:nth-child(3)').css({
                    'background': '#24273c',
                    'border': '1px solid #fff',

                });

                break;
            case '4':
                $('.pickup:nth-child(3)').css({
                    'background': '#24273c',
                    'border': '1px solid #fff',

                });
                $('.pickup:nth-child(4)').css({
                    'background': '#24273c',
                    'border': '1px solid #fff',

                });

                break;
            case '5':
                $('.pickup:nth-child(4)').css({
                    'background': '#24273c',
                    'border': '1px solid #fff',

                });
                break;
        }
    });
    $('#pickupsLayout').change(function () {
        $('#pickupHSH').css('display', 'none');
        $('#pickupHSS').css('display', 'none');
        $('#pickupSSS').css('display', 'none');
        console.log('s');
        switch (this.value) {
            case 'H-S-H':
                $('#pickupHSH').css('display', 'flex');
                break;
            case 'H-S-S':
                $('#pickupHSS').css('display', 'flex');
                break;
            case 'S-S-S':
                $('#pickupSSS').css('display', 'flex');
                break;
        }
    })


    AOS.init();
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
    [].forEach.call(getAdvanced, function (advanced) {
        $(advanced).on('tap click', function () {
            console.log('clicked');
            $(this).next('.advanced__wrapped').slideToggle('fast');
        });
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
    $('#findSong').autocomplete({
        serviceUrl: '/find/song',
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
