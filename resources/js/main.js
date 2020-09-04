// rating system product details
$(document).ready(function(){
    // Check Radio-box
    $(".rating input:radio").attr("checked", false);

    $('.rating input').click(function () {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');
    });

    $('input:radio').change(
        function(){
            let userRating = this.value;
            //console.log(userRating);
        });

    // change language

    $('.changeLang').change(function () {
            let url = $(this).attr('data-url');
            //console.log(url)
            window.location.href = url + "?lang="+ $(this).val();
        });
});

