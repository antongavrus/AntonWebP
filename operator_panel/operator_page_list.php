<section class="op_pizzas">
                      
                  <?php

                       // подключаем  файл с коннектом к БД                
                      require_once 'db_config.php';
                      
                      $op_pizzas = mysqli_query($db, "SELECT * FROM `orders` WHERE `rejected`= 0"); // получаем данные из таблицы
                      if(mysqli_num_rows($op_pizzas) > 0){ ?>

                        <table class="table">
                            <tr>
                                <th>Идент. заказа</th>
                                <th>Название</th>
                                <th>Размер</th>
                                <th>Толщина</th>
                                <th>Цена</th>
                                <th></th>
                            </tr>

                <?php   // выводим их через цикл
                        foreach($op_pizzas as $op_pizza){
                        // записываем значения из базы данных в переменные, а затем
                        $order_id = $op_pizza['order_id'];
                        $pizza_id = $op_pizza['pizza_id'];
                        $size = $op_pizza['size'];
                        $thickness = $op_pizza['thickness'];
                        $delivered = $op_pizza['delivered'];
                        // вытаскиваем информацию по id из таблицы с пиццами
                        $pizzas_info_query = mysqli_query($db, "SELECT * FROM `pizzas` WHERE `id`='$pizza_id'");
                        $pizzas_info_array = mysqli_fetch_assoc($pizzas_info_query); // конвертируем в ассоциативный массив, чтобы вывести значения
                        $title = $pizzas_info_array['title'];
                        $price = $pizzas_info_array['price'];

                  ?>
      
      
                      <tr>
                          <td><?=$order_id;?></td>
                          <td><?=$title;?></td>
                          <td><?=$size;?></td>
                          <td><?=$thickness;?></td>
                          <td><?=$price;?></td>
                          <td>
                            <?php 

                            if($delivered == 1){ ?>

                              <a href="delivered_order.php?id=<?=$order_id;?>" class="delivered_button">Завершить</a>
                            
                            <?php } else { ?>
                              
                              <a href="access_order.php?id=<?=$order_id;?>" class="access_button">Принять</a><br>
                              <a href="reject_order.php?id=<?=$order_id;?>" class="reject_button">Отклонить</a>

                            <?php } ?>
                          </td>
                      </tr>
                  
          
                  <?php } // конец foreach 
                  
                    } else{ ?> <h2>Новых заказов еще нет!</h2> <?php } ?>
                  
                  <?php if(mysqli_num_rows($op_pizzas) > 0){ ?></table><?php } // закрываем тег?>

<?php // mb_strimwidth($ap_pizza['short_text'], 0, 15, "..."); ?>