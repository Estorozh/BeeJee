<?php

    $countTask = 3;
    $total = intval((count($tasks) - 1) / $countTask) + 1;

    $page = intval($_GET['page']);
    if(empty($page) || $page < 0 || !is_numeric($page)) {
        $page = 1;
    } elseif($page > $total) { 
        $page = $total; 
    }
    
    $start = $page * $countTask - $countTask;

    $paginator = "";
    for($i=1; $i < $total+1; $i++) {
        if($page == $i) {
            $a = "<a class='pagination-num active' href=index.php?page=$i>$i</a>";
        } else {
            $a = "<a class='pagination-num' href=index.php?page=$i>$i</a>";
        }
        
        $paginator = $paginator.$a;
    }

    $paginator = '<div class="pagination">'.$paginator.'</div>';