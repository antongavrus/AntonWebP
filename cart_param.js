$(document).ready(function(){

    $(".thickness_fl").click(function(){

        var id = this.id;   // получаем значение из запроса
        var split_id = id.split("_");

        var pizza_id = split_id[1];
        var thickness = split_id[3];

        if(thickness == 1){
            other_thickness = 0;
        } else{
            other_thickness = 1;
        }

        var add_param_action = "action"; // post-запрос, устанавливающий действие, просто строка

        // AJAX запрос
        $.ajax({
            url: 'update_param.php',
            type: 'post',
            data: {pizza_id:pizza_id, thickness:thickness, add_param_action:add_param_action},
            //dataType: 'json',
            success: function(data){
                $('.thickness_fl.active#id_' + pizza_id + '_var_' + other_thickness).removeClass('active');
                $('#id_' + pizza_id + '_var_' + thickness).attr('class', 'thickness_fl active');
            }
        });

    });

    $(".size_fl").click(function(){

        var id = this.id;
        var split_id = id.split("_");

        var pizza_id = split_id[1];
        var size = split_id[3];

        if(size == 26){
            os_1 = 30;
            os_2 = 40;
        } else if(size == 30){
            os_1 = 26;
            os_2 = 40;
        } else{
            os_1 = 26;
            os_2 = 30;
        }

        var add_param_action = "action"; // post-запрос, устанавливающий действие, просто строка

        // AJAX запрос
        $.ajax({
            url: 'update_param.php',
            type: 'post',
            data: {pizza_id:pizza_id, size:size, add_param_action:add_param_action},
            //dataType: 'json',
            success: function(data){
                $('.size_fl#id_' + pizza_id + '_var_' + os_1).removeClass('active');
                $('.size_fl#id_' + pizza_id + '_var_' + os_2).removeClass('active');
                $('#id_' + pizza_id + '_var_' + size).attr('class', 'size_fl active');
            }
        });

    });

    $(".button.button--outline.button--circle.cart_item-count-plus").click(function(){

        // var id_number = $(".pizza_num_cart").attr('id');
        var id_number_self = this.id;
        var split_id_self = id_number_self.split("_");
        var pizza_id = split_id_self[1];
        var number = split_id_self[3];

        // var id_number = $(".pizza_num_cart").attr('id');
        // var split_id = id_number.split("_");
        // var number = split_id[3];
        var number = parseInt(number);
        var pizza_all_num_cart = parseInt(pizza_all_num_cart);
        var add_param_action = "action"; // post-запрос, устанавливающий действие, просто строка

        if(number < 100){
            var new_num = number + 1;
        }

        // AJAX запрос
        $.ajax({
            url: 'update_param.php',
            type: 'post',
            data: {pizza_id:pizza_id, pizza_all_num_cart:pizza_all_num_cart, new_num:new_num, number:number, add_param_action:add_param_action},
            //dataType: 'json',
            success: function(data){
                $('.button.button--outline.button--circle.cart_item-count-plus#plus_' + pizza_id + '_num_' + number).attr('id' , 'plus_' + pizza_id + '_num_' + new_num);
                $('.button.button--outline.button--circle.cart_item-count-minus#minus_' + pizza_id + '_num_' + number).attr('id' , 'minus_' + pizza_id + '_num_' + new_num);
                $('.pizza_num_cart#id_' + pizza_id).text(new_num);
            }
        });

    });

    $(".button.button--outline.button--circle.cart_item-count-minus").click(function(){

        // var id_number = $(".pizza_num_cart").attr('id');
        var id_number_self = this.id;
        var split_id_self = id_number_self.split("_");
        var pizza_id = split_id_self[1];
        var number = split_id_self[3];

        // var id_number = $(".pizza_num_cart").attr('id');
        // var split_id = id_number.split("_");
        // var number = split_id[3];
        var number = parseInt(number);
        var pizza_all_num_cart = parseInt(pizza_all_num_cart);
        var add_param_action = "action"; // post-запрос, устанавливающий действие, просто строка

        if(number > 0){
            var new_num = number - 1;
        } else if(number < 2){
            var new_num = 0;
        }

        // AJAX запрос
        $.ajax({
            url: 'update_param.php',
            type: 'post',
            data: {pizza_id:pizza_id, new_num:new_num, number:number, add_param_action:add_param_action},
            //dataType: 'json',
            success: function(data){
                $('.button.button--outline.button--circle.cart_item-count-minus#minus_' + pizza_id + '_num_' + number).attr('id' , 'minus_' + pizza_id + '_num_' + new_num);
                $('.button.button--outline.button--circle.cart_item-count-plus#plus_' + pizza_id + '_num_' + number).attr('id' , 'plus_' + pizza_id + '_num_' + new_num);
                $('.pizza_num_cart#id_' + pizza_id).text(new_num);
            }
        });

    });

    $(".button.pay-btn").click(function(){

        var send_order_action = "action";

        // AJAX запрос
        $.ajax({
            url: 'send_order.php',
            type: 'post',
            data: {send_order_action:send_order_action},
            //dataType: 'json',
            success: function(data){
                location.reload();
            }
        });

    });

    $(".button.button--circle.button--outline.delete").click(function(){

        var delete_order_action = "action";
        var pizza_id = this.id;
    
        // AJAX запрос
        $.ajax({
            url: 'update_param.php',
            type: 'post',
            data: {pizza_id:pizza_id, delete_order_action:delete_order_action},
            //dataType: 'json',
            success: function(data){
                location.reload();
            }
        });

    });

    $(".cart_clear_span").click(function(){

        var delete_orders_action = "action";
    
        // AJAX запрос
        $.ajax({
            url: 'update_param.php',
            type: 'post',
            data: {delete_orders_action:delete_orders_action},
            //dataType: 'json',
            success: function(data){
                location.reload();
            }
        });

    });

});