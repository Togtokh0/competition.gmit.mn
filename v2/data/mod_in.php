<?php
 include('../db.php');
 $output = '';
 $sql = "SELECT * FROM res WHERE in_user_id='$user_id' ";
 $result = mysqli_query($db, $sql);
 $output .= '
             <thead>
               <tr>
               <th title="Field #1" >Id</th>
               <th title="Field #2" >Нэр</th>
               <th title="Field #4" >Илгээгч</th>
               <th title="Field #5" >Хугцаа</th>
               </tr>
             </thead>
             <tbody>';
 $rows = mysqli_num_rows($result);

      while($row = mysqli_fetch_array($result))
      {
        if($row["active"]==null || $row["active"]==0){
          $row["active"]="Зөвшөөрөөгүй";
        }else{
          $row["active"]= "Зөвшөөрсөн";
        }
           $output .= '
                <tr >
                     <td class=""><a href="insert.php?id='.$row["id"].'" target="_blank">'.$row["id"].'</a></td>
                      <td class=""><a href="problem.php?id='.$row["pro_id"].'">'.pro_id_get($row['pro_id'])['name'].'</a></td>
                     <td class=""><a href="account.php?id='.$row["user_id"].'">'.user_id_get($row["user_id"])['user_name'].'</a></td>
                     <td class="">'.$row["in_date"].'</td>
                </tr>
           ';
      }

 $output .= '</tbody>';
 echo $output;
 ?>
