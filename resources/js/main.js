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

    $('#editStatus').click(function (e) {
        e.preventDefault();

        $('.orderStatus').show();
        $('.statusContent').hide();
    });

    $('#updateStatus').click(function (e) {
        e.preventDefault();

        let orderId = $('#statusId').val();
        let value = $('#statusValue').val();
        const url = $('#urlOrderStatus').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url: url,
            data:{id: orderId, value: value},
            success:function(data){
                alert(data.success);
                window.location.reload(true);
            },
            error: function (err) {
                console.log(err)
            }
        });
    })


});

