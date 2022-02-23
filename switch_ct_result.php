<?php

require_once 'db_config.php';

if(isset($_POST['ct_action'])){

    $cnum = $_POST['category_num'];

    switch($cnum){
        case 1:
            $all_pizzas_sql = "SELECT * FROM `pizzas`";
            break;
        case 2:
            $all_pizzas_sql = "SELECT * FROM `pizzas` WHERE `category`= 2";
            break;
        case 3:
            $all_pizzas_sql = "SELECT * FROM `pizzas` WHERE `category`= 3";
            break;
        case 4:
            $all_pizzas_sql = "SELECT * FROM `pizzas` WHERE `category`= 4";
            break;
        case 5:
            $all_pizzas_sql = "SELECT * FROM `pizzas` WHERE `category`= 5";
            break;     
        case 6:
            $all_pizzas_sql = "SELECT * FROM `pizzas` WHERE `category`= 6";
    }

    $all_pizzas = mysqli_query($db, $all_pizzas_sql);

    if(mysqli_num_rows($all_pizzas) > 0){
        foreach($all_pizzas as $pizza){

        $id = $pizza['id'];
        $title = $pizza['title'];
        $price = $pizza['price'];

?>

                <div class="pizza_card">
                    <img src="https://dodopizza.azureedge.net/static/Img/Products/f035c7f46c0844069722f2bb3ee9f113_584x584.jpeg" alt="" class="pizza-card_image">
                    <h4 class="pizza-card_title"><?=$title;?></h4>

                    <div class="pizza-card_selector">
                        <ul>
                            <li class="thickness active">тонкое</li>
                            <li class="thickness">традиционное</li>
                        </ul>
                        <ul>
                            <li class="size active" id="26">26</li>
                            <li class="size" id="30">30</li>
                            <li class="size" id="40">40</li>
                        </ul>
                    </div>

                    <div class="pizza-card_bottom">
                        <div class="pizza-card_price">от <?=$price;?></div>
                        <button id="<?=$id;?>" class="button content--button button--add button--outline add-pizza_sub"> <!--button content--button button--add button--outline -->
                            <form action="add_pizza_result.php" method="post">
                                <input type="hidden" value="<?=$id;?>" name="pizza_id">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.8 4.8H7.2V1.2C7.2 0.5373 6.6627 0 6 0C5.3373 0 4.8 0.5373 4.8 1.2V4.8H1.2C0.5373 4.8 0 5.3373 0 6C0 6.6627 0.5373 7.2 1.2 7.2H4.8V10.8C4.8 11.4627 5.3373 12 6 12C6.6627 12 7.2 11.4627 7.2 10.8V7.2H10.8C11.4627 7.2 12 6.6627 12 6C12 5.3373 11.4627 4.8 10.8 4.8Z" fill="white"></path></svg><input type="submit" value="Добавить" id="add">
                            </form>
                        </button>
                    </div>
                </div>

    <?php } // конец foreach 

    } // конец if

} // конец if

?>