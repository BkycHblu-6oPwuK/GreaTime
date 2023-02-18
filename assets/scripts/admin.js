$('.add_block').click(function(){
    $('.block_sizes').append('<div class="block_size"><span>Размер</span><input type="text" name="size[]" required><span>Кол-во</span><input type="text" required name="amount[]"><div class="remove_block a_btn">Убрать</div></div>');
    $('.btn').show()
})
$(document).on('mousedown','.remove_block',function(){
    $(this).parent('.block_size').empty()
})

if($('.block_block').is(":visible")){
    function show(){
        if($('.filter_order').hasClass('active')){
            let status = $('.active').data('status');
            $.ajax({
                method: 'GET',
                data: {status:status},
                url: "vendor/components/admin/orders.php",
                success: function (data) {
                    $('.block_block').html(data)
                }
            });
        } else {
            $.ajax({
                method: 'GET',
                data: {status:'0'},
                url: "vendor/components/admin/orders.php",
                success: function (data) {
                    $('.block_block').html(data)
                }
            });
        }
    }
    $(document).ready(function(){
        show();
    })
    $(document).on('mousedown','.filter_order',function(e){
        let status = $(this).data('status');
        $('.filter_order').removeClass('active')
        $(this).addClass('active')
        $.ajax({
            type: "GET",
            url: "vendor/components/admin/orders.php",
            data: {status:status},
            success: function (data) {
                $('.block_block').html(data)
            }
        });
    })
    setInterval(show,20000);

    $(document).on('change','select[name="status"]',function(e){
        e.preventDefault();
        let id = $(this).data('id')
        let value = $(this).val()
        $.ajax({
            type: "POST",
            url: "vendor/action/admin/orders.php",
            data: {id:id,value:value},
            success: function (data) {
                show()
            }
        });
    })
}