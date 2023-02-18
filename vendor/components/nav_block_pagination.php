<div class="catalog_bottom">
    <ul class="pagination">
        <? if($_GET['page'] == 1){ ?>
        <li><?  if($page < $str_pag){echo "<a class=".'data'." data-page-number=". $_GET['page'] ." href=$filename?page=". $_GET['page'] .$get.">". $_GET['page'] ." </a>";} ?></li>
        <li><?  if($page < $str_pag){echo "<a data-page-number=". $page = $page + 1 ." href=$filename?page=". $page = $page + 1 .$get.">". $page = $page + 1 ." </a>";} ?></li>
        <li><?  if($page < $str_pag){echo "<a data-page-number=". $page = $page + 1 ." href=$filename?page=". $page = $page + 1 .$get.">". $page = $page + 1 ." </a>";} ?></li>
        <li><?  if($page < $str_pag){echo "<a data-page-number=". $page = $page + 1 ." href=$filename?page=". $page = $page + 1 .$get.">". $page = $page + 1 ." </a>";} ?></li>
        <li><?  if($page < $str_pag){echo "<a data-page-number=". $page = $page + 1 ." href=$filename?page=". $page = $page + 1 .$get.">". $page = $page + 1 ." </a>";} ?></li>
        <li><?  if($_GET['page'] < $str_pag){echo "<a data-page-number=". $page = $_GET['page'] + 1 ." href=$filename?page=". $page = $_GET['page'] + 1 .$get."><img src=vendor/img/icons/Arrow_Right_one.png></a>";} ?></li>
        <li><?  if($_GET['page'] < $str_pag){echo "<a data-page-number=". $str_pag ." href=$filename?page=". $str_pag .$get."><img src=vendor/img/icons/Arrow_Right_2.png></a>";} ?></li>
        <? } ?>

        <? if($_GET['page'] == 2){ ?>
        <li><?  if($_GET['page'] <= $str_pag){echo "<a data-page-number=". $page = 1 ." href=$filename?page=". $page = 1 .$get."><img src=vendor/img/icons/Arrow_Left_2.png></a>";} ?></li>
        <li><?  if($_GET['page'] <= $str_pag){echo "<a data-page-number=". $page = $_GET['page'] - 1 ." href=$filename?page=". $page = $_GET['page'] - 1 .$get."><img src=vendor/img/icons/Arrow_Left_one.png></a>";} ?></li>
        <li><?  if($page <= $str_pag - 1){echo "<a data-page-number=". 1 ." href=$filename?page=". $page = 1 .$get.">". 1 ." </a>";} ?></li>
        <li><?  if($page <= $str_pag - 1){echo "<a data-page-number=". $page = $page + 1 ." href=$filename?page=". $page = $page + 1 .$get.">". $page = $page + 1 ." </a>";} ?></li>
        <li><?  if($page <= $str_pag - 1){echo "<a data-page-number=". $page = $page + 1 ." href=$filename?page=". $page = $page + 1 .$get.">". $page = $page + 1 ." </a>";} ?></li>
        <li><?  if($page <= $str_pag - 1){echo "<a data-page-number=". $page = $page + 1 ." href=$filename?page=". $page = $page + 1 .$get.">". $page = $page + 1 ." </a>";} ?></li>
        <li><?  if($page <= $str_pag - 1){echo "<a data-page-number=". $page = $page + 1 ." href=$filename?page=". $page = $page + 1 .$get.">". $page = $page + 1 ." </a>";} ?></li>
        <? 
            if($_GET['page'] != $str_pag){
        ?>
        <li><?  if($_GET['page'] <= $str_pag){echo "<a data-page-number=". $page = $_GET['page'] + 1 ." href=$filename?page=". $page = $_GET['page'] + 1 .$get."><img src=vendor/img/icons/Arrow_Right_one.png></a>";} ?></li>
        <li><?  if($_GET['page'] <= $str_pag){echo "<a data-page-number=". $str_pag ." href=$filename?page=". $str_pag .$get."><img src=vendor/img/icons/Arrow_Right_2.png></a>";} ?></li>
        <? } ?>
        <? } ?>

        <? if($_GET['page'] >= 3){ ?>         
        <li><?  if($_GET['page'] <= $str_pag){echo "<a data-page-number=". $page = 1 ." href=$filename?page=". $page = 1 .$get."><img src=vendor/img/icons/Arrow_Left_2.png></a>";} ?></li>
        <li><?  if($_GET['page'] <= $str_pag){echo "<a data-page-number=". $page = $_GET['page'] - 1 ." href=$filename?page=". $page = $_GET['page'] - 1 .$get."><img src=vendor/img/icons/Arrow_Left_one.png></a>";} ?></li>
        <li><?  if($page <= $str_pag - 1){echo "<a data-page-number=". $page = $page - 1 ." href=$filename?page=". $page = $page - 1 .$get.">". $page = $page - 1 ." </a>";} ?></li>
        <li><?  if($page <= $str_pag - 1){echo "<a data-page-number=". $page = $page + 1 ." href=$filename?page=". $page = $page + 1 .$get.">". $page = $page + 1 ." </a>";} ?></li>
        <li><?  if($page <= $str_pag - 1){echo "<a data-page-number=". $page = $page + 1 ." href=$filename?page=". $page = $page + 1 .$get.">". $page = $page + 1 ." </a>";} ?></li>
        <li><?  if($page <= $str_pag - 1){echo "<a data-page-number=". $page = $page + 1 ." href=$filename?page=". $page = $page + 1 .$get.">". $page = $page + 1 ." </a>";} ?></li>
        <li><?  if($page <= $str_pag - 1){echo "<a data-page-number=". $page = $page + 1 ." href=$filename?page=". $page = $page + 1 .$get.">". $page = $page + 1 ." </a>";} ?></li>
        <? 
        if($_GET['page'] != $str_pag){
         ?>
        <li><?  if($_GET['page'] <= $str_pag){echo "<a data-page-number=". $page = $_GET['page'] + 1 ." href=$filename?page=". $page = $_GET['page'] + 1 .$get."><img src=vendor/img/icons/Arrow_Right_one.png></a>";} ?></li>
        <li><?  if($_GET['page'] <= $str_pag){echo "<a data-page-number=". $str_pag ." href=$filename?page=". $str_pag .$get."><img src=vendor/img/icons/Arrow_Right_2.png></a>";} ?></li>
        <? } ?>
        <? } ?>
    </ul>
</div>