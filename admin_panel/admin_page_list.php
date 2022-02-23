<section class="ap_pizzas">
              
              <table class="table">
                  <tr>
                      <th>Название</th>
                      <th>Категория</th>
                      <th>Ссылка</th>
                      <th>Цена</th>
                      <th></th>
                  </tr>
                      
                  <?php

                       // подключаем  файл с коннектом к БД                
                      require_once 'db_config.php';
                      
                      $ap_pizzas = mysqli_query($db, "SELECT * FROM `pizzas`"); // получаем данные из таблицы
                      // выводим их через цикл
                      foreach($ap_pizzas as $ap_pizza){
                  
                  ?>
      
      
                      <tr>
                          <td><?=$ap_pizza['title']?></td>
                          <td><?=$ap_pizza['category']?></td>
                          <td><?=$ap_pizza['image']?></td>
                          <td><?=$ap_pizza['price']?></td>
                          <td><a href="edit_pizza.php?id=<?=$ap_pizza['id']?>" class="post-edit_button">Изменить</a><br><a href="delete_pizza.php?id=<?=$ap_pizza['id']?>" class="post-delete_button">Удалить</a></td>
                      </tr>
                  
          
                  <?php } ?>
                  
                  </table>
</section>

<?php // mb_strimwidth($ap_pizza['short_text'], 0, 15, "..."); ?>