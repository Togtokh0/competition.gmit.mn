<?php
 include('../db.php');
 $output = '';
 $sql = "SELECT * FROM problems WHERE active=1 ";
 $result = mysqli_query($db, $sql);
 $output .= '
             <thead>
               <tr>
                 <th title="Field #1" >Id</th>
                 <th title="Field #2" >Захиалагч</th>
                 <th title="Field #3" >Нэр</th>
                 <th title="Field #4" >Үнэ</th>
                 <th title="Field #5" >Оруулсан</th>
                 <th title="Field #6" >Дуусах</th>
               </tr>
             </thead>
             <tbody>';
 $rows = mysqli_num_rows($result);

      while($row = mysqli_fetch_array($result))
      {
           $output .= '
                <tr >
                     <td class=""><a href="https://togtokh.dev/dev/Industry/v2/problem.php?id='.$row["id"].'">'.$row["id"].'</a></td>
                     <td class="">'.$row["user_id"].'</td>
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
