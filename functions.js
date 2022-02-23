$(document).ready(function(){

    $(".ct_item").click(function(){

        var category_num = this.id;   // получаем порядковый номер категории
        var ct_action = "action"; // post-запрос, устанавливающий действие, просто строка

        // AJAX запрос
        $.ajax({
            url: 'switch_ct_result.php',
            type: 'post',
            data: {category_num:category_num, ct_action:ct_action},
            //dataType: 'json',
            success: function(data){
                $('.content_items').html(data);
                $('.ct_item').removeClass('active');
                $('#' + category_num).attr('class', 'ct_item active');
            }
        });

    });

});