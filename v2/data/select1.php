<?php
 include('../db.php');
 $output = '';
 $sql = "SELECT * FROM problems  ";
 $result = mysqli_query($db, $sql);
 $output .= '
             <thead>
               <tr>
                 <th title="Field #1" >Id</th>
                 <th title="Field #2" >Төлөв</th>
                 <th title="Field #3" >Захиалагч</th>
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
        $rt='<option >developer</option>';
        $rr="";
if($row["active"]==NULL){ $rt='<option value="0" >Нийтлэгдээгүй</option><option value="1" >Нийтлэх</option>';$rr='style="background-color:#34ebe5;"'; }
if($row["active"]==0){ $rt='<option value="0" >Нийтлэгдээгүй</option><option value="1" >Нийтлэх</option>';$rr='style="background-color:#34ebe5;"'; }
if($row["active"]==1){ $rt='<option value="1" >Нийтлэх</option><option value="0" >Нийтлэгдээгүй</option>';$rr='style="background-color:#9feb34;"'; }
           $output .= '
                <tr >
                     <td class="">	<a href="https://togtokh.dev/dev/Industry/v2/problem.php?id='.$row["id"].'">'.$row["id"].'</a></td>
                     <td class=""><select class="form-control form-control-lg  select_tg_pro" data-id2="'.$row["id"].'" '.$rr.'>
                     '.$rt.'
                     </select></td>
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
