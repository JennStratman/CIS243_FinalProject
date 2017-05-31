// JavaScript source code

/*
function changeOption()
purpose:		Make the options visible to user
parameters:		none
*/

/*
        $(document).ready(function () {
            var slideArray = ["maui.jpeg", "winery.jpeg", "horses.jpeg", "golf.jpeg", "dunebuggy.jpeg", "surfing.jpeg", "maui2.jpeg", "pillars.jpeg"];

            $('.container').before('<div class="slide-image"></div>');
            $('.slide-image').html('<img src="graphics/' + slideArray[0] + '"/>');
            $('.slide-image').after('<ul id="nav"></ul>');
            var slideLength = slideArray.length;

            for (i = 0; i < slideLength; i++) {
                var slideText = i + 1;
                $('#nav').append('<li><a href="#" rel="' + slideText + '">' + slideText + '</a></li>');
            }

            $('#nav li a').bind('click', function () {
                var numSlide = $(this).attr('rel') - 1;
                $('.slide-image').html('<img src="graphics/' + slideArray[numSlide] + '" style="display:inline"/>');
                $('slide-image img').fadeIn(10000);
                $('#nav li a').removeClass('active');
                $(this).addClass('active');
            });
        });
*/

/* Template from image gallery with descriptions */
        var i = 0;
        var slideArray = ["maui.jpeg", "winery.jpeg", "horses.jpeg", "golf.jpeg", "dunebuggy.jpeg", "surfing.jpeg", "maui2.jpeg", "pillars.jpeg"];
        var slideLength = slideArray.length;

        $(document).ready(function () {
            $('.next').click(function () {
                i++;
                if (i == slideLength) {
                    i = 0;
                }
                $('.images').attr('src', 'graphics/'+slideArray[i]);
            }).trigger('click');
        });

        $(document).ready(function () {
            $('.previous').click(function () {
                i--;
                if (i == -1) {
                    i = slideLength - 1;
                }
                $('.images').attr('src', 'graphics/' + slideArray[i]);
            }).trigger('click');
        });

        /* Template from image gallery with descriptions */
/*        var i = 0;
        var slideArray = ["maui.jpeg", "winery.jpeg", "horses.jpeg", "golf.jpeg", "dunebuggy.jpeg", "surfing.jpeg", "maui2.jpeg", "pillars.jpeg"];
        var slideLength = slideArray.length;

        $(document).ready(function () {
            $('.next').click(function () {
                i++;
                if (i == slideLength) {
                    i = 0;
                }
                $('.images').attr('src', 'graphics/' + slideArray[i]);
            }).trigger('click');
        });

        $(document).ready(function () {
            $('.previous').click(function () {
                i--;
                if (i == -1) {
                    i = slideLength - 1;
                }
                $('.images').attr('src', 'graphics/' + slideArray[i]);
            }).trigger('click');
        });
*/