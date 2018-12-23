$(document).ready(function () {
    $('#pickupHSH').css('display', 'none');
    $('#pickupHSS').css('display', 'none');
    $('#pickupSSS').css('display', 'none');
    [].forEach.call($('.post__pickups'), function (post) {
        console.log($(post).find('#postPickupNumber').text());
        switch ($(post).find('#postPickupNumber').text()) {
            case 'H-S-H':
                $(post).find('#pickupHSH').css('display', 'flex');
                break;
            case 'S-S-S':
                $(post).find('#pickupSSS').css('display', 'flex');
                break;
            case 'H-S-S':
                $(post).find('#pickupHSS').css('display', 'flex');
        }
        switch ($(post).find('#postPickupPosition').text()) {
            case '1':
                $(post).find('.pickup:nth-child(1)').css({
                    'background': '#24273c',
                    'border': '1px solid #fff',

                });
                break;
            case '2':
                $(post).find('.pickup:nth-child(1)').css({
                    'background': '#24273c',
                    'border': '1px solid #fff',

                });
                $(post).find('.pickup:nth-child(2)').css({
                    'background': '#24273c',
                    'border': '1px solid #fff',

                });


                break;
            case '3':
                $(post).find('.pickup:nth-child(2)').css({
                    'background': '#24273c',
                    'border': '1px solid #fff',

                });

                break;
            case '4':
                $(post).find('.pickup:nth-child(2)').css({
                    'background': '#24273c',
                    'border': '1px solid #fff',

                });
                $(post).find('.pickup:nth-child(3)').css({
                    'background': '#24273c',
                    'border': '1px solid #fff',

                });

                break;
            case '5':
                $(post).find('.pickup:nth-child(3)').css({
                    'background': '#24273c',
                    'border': '1px solid #fff',

                });
                break;
        }
    });

});
