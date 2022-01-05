<?php
 include('../db.php');
 $output = '';
 $sql = "SELECT * FROM problems WHERE user_id='$user_id' ";
 $result = mysqli_query($db, $sql);
 $output .= '
             <thead>
               <tr>
               <th title="Field #1" >Id</th>
               <th title="Field #2" >Төлөв</th>
               <th title="Field #4" >Нэр</th>
               <th title="Field #5" >Үнэ</th>
               <th title="Field #6" >Оруулсан</th>
               <th title="Field #7" >Дуусах</th>
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
                     <td class=""><a href="problem.php?id='.$row["id"].'" target="_blank">'.$row["id"].'</a></td>
                      <td class="">'.$row["active"].'</td>
                     <td class="">'.$row["name"].'</td>
                     <td class="">'.$row["amount"].'</td>
                     <td class="">'.$row["upload_date"].'</td>
                      <td class="">'.$row["ex_date"].'</td>
                </tr>
           ';
      }

 $output .= '</tbody>';
 echo $output;
 ?>
