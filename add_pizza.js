$(document).ready(function(){

    $(".add-pizza_sub").click(function(){
        var pizza_id = this.id;
        var thickness = $(".thickness.active").attr('id'); // получаем состояние фильтра на thickness (толщина теста)
        var size = $(".size.active").attr('id'); // получаем состояние фильтра на size (размер)
        var add_action = "action"; // post-запрос, устанавливающий действие, просто строка
    
        // AJAX запрос
        $.ajax({
            url: 'add_pizza_result.php',
            type: 'post',
            data: {pizza_id:pizza_id, thickness:thickness, size:size, add_action:add_action},
            success: function(data){
                $('.ct_item').removeClass('active');
            }
        });
    });

});
