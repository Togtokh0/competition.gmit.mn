<?php

 include('../db.php');
 $output = '';
 $sql = "SELECT * FROM users  ";
 $result = mysqli_query($db, $sql);
 $output .= '
             <thead>
               <tr>
                 <th title="Field #1" >Id</th>
                 <th title="Field #2" >Нэр</th>
                  <th title="Field #8" >Хаягын төрөл</th>
                 <th title="Field #3" >Цахим хаяг</th>
                 <th title="Field #4" >Утасны дугаар</th>
                 <th title="Field #5" >Вэб</th>
                 <th title="Field #6" >Хаяг</th>

                 <th title="Field #9" >Төрөл</th>
                 <th title="Field #10" >Бүртгэгдсэн</th>
                 <th title="Field #11" >Шинэчилэгдсэн</th>
               </tr>
             </thead>
             <tbody>';
 $rows = mysqli_num_rows($result);

      while($row = mysqli_fetch_array($result))
      {
        $rt='<option >developer</option>';
        $rr="";
if($row["user_role"]=='user'){ $rt='<option value="user" >Хэрэглэгч</option><option value="moderator" >moderator</option>';$rr='style="background-color:#34ebe5;"'; }
if($row["user_role"]=='admin'){ $rt='<option value="admin" >Admin</option>';$rr='style="background-color:#9feb34;"'; }
if($row["user_role"]=='moderator'){ $rt='<option value="moderator" >moderator</option><option value="user" >Хэрэглэгч</option>';$rr='style="background-color:#9feb34;"'; }
           $output .= '
                <tr >
                     <td class=""><a href="https://togtokh.dev/dev/Industry/v2/account.php?id='.$row["user_id"].'">'.$row["user_id"].'</a></td>
                     <td class="">'.$row["user_name"].'</td>
                     <td class=""><select class="form-control form-control-lg type select_tg" data-id2="'.$row["user_id"].'" '.$rr.'>
                     '.$rt.'
                     </select></td>
                     <td class="">'.$row["user_email"].'</td>
                     <td class="">'.$row["user_phone"].'</td>
                     <td class="">'.$row["user_web"].'</td>
                     <td class="">'.$row["user_address"].'</td>

                     <td class="">'.$row["user_type"].'</td>
                     <td class="">'.$row["cr_date"].'</td>
                     <td class="">'.$row["role_up_date"].'</td>
                </tr>
           ';
      }

 $output .= '</tbody>';
 echo $output;
 ?>
