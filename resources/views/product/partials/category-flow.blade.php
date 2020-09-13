@if(isset($categoryFlow))
<p class="categories"><strong> Categories:</strong>
    @php
        if(!empty($categoryFlow)){
            $size = sizeof($categoryFlow);
            $categoriesFlow = "";
            for($i=$size-1; $i>=0; $i--){
                $categoriesFlow .= "<a href=''>".$categoryFlow[$i]['cat_name']."</a> -> ";
            }
            echo $categoriesFlow.$currentCategory->name;
        }
    @endphp
</p>
@endif