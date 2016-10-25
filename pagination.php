<?php
function pagination($query, $per_page,$page = 1, $url = '?'){        
    $total=mysql_num_rows(mysql_query($query));
    // $query = "SELECT COUNT(*) as `num` FROM {$query}";
    // $row = mysql_fetch_array(mysql_query($query));
    // echo "$query";
    // $total = $row['num'];
    $adjacents = "2"; 
    // echo $url;
    $page = ($page == 0 ? 1 : $page);  
    $start = ($page - 1) * $per_page;                               

    $prev = $page - 1;                          
    $next = $page + 1;
    $lastpage = ceil($total/$per_page);
    $lpm1 = $lastpage - 1;

    $pagination = "";
    if($lastpage > 1)
    {   
        $pagination .= "<div class='pagination'>";
        $pagination .= "<label class='details'>Page $page of $lastpage</label>";
        if ($lastpage < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<label><a class='current'>$counter</a></label>";
                else
                    $pagination.= "<label><a href='{$url}page=$counter'>$counter</a></label>";                    
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))     
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<label><a class='current'>$counter</a></label>";
                    else
                        $pagination.= "<label><a href='{$url}page=$counter'>$counter</a></label>";                    
                }
                $pagination.= "<label class='dot'>...</label>";
                $pagination.= "<label><a href='{$url}page=$lpm1'>$lpm1</a></label>";
                $pagination.= "<label><a href='{$url}page=$lastpage'>$lastpage</a></label>";      
            }
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<label><a href='{$url}page=1'>1</a></label>";
                $pagination.= "<label><a href='{$url}page=2'>2</a></label>";
                $pagination.= "<label class='dot'>...</label>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<label><a class='current'>$counter</a></label>";
                    else
                        $pagination.= "<label><a href='{$url}page=$counter'>$counter</a></label>";                    
                }
                $pagination.= "<label class='dot'>..</label>";
                $pagination.= "<label><a href='{$url}page=$lpm1'>$lpm1</a></label>";
                $pagination.= "<label><a href='{$url}page=$lastpage'>$lastpage</a></label>";      
            }
            else
            {
                $pagination.= "<label><a href='{$url}page=1'>1</a></label>";
                $pagination.= "<label><a href='{$url}page=2'>2</a></label>";
                $pagination.= "<label class='dot'>..</label>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<label><a class='current'>$counter</a></label>";
                    else
                        $pagination.= "<label><a href='{$url}page=$counter'>$counter</a></label>";                    
                }
            }
        }

        if ($page < $counter - 1){ 
            $pagination.= "<label><a href='{$url}page=$next'>Next</a></label>";
            $pagination.= "<label><a href='{$url}page=$lastpage'>Last</a></label>";
        }else{
            $pagination.= "<label><a class='current'>Next</a></label>";
            $pagination.= "<label><a class='current'>Last</a></label>";
        }
        $pagination.= "</div>\n";      
    }


    return $pagination;
} 
?>