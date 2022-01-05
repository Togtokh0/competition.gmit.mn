<?php
 include('../db.php');
 $output = '';
 $sql = "SELECT * FROM news order by time_s ";
 $result = mysqli_query($db, $sql);
 $output .= '
             <thead>
               <tr>
                 <th title="Field #1" >Id</th>
                 <th title="Field #2" >Нэр</th>
                 <th title="Field #3" >Цаг</th>
                 <th title="Field #5" >Үйлдэл</th>
               </tr>
             </thead>
             <tbody>';
 $rows = mysqli_num_rows($result);

      while($row = mysqli_fetch_array($result))
      {
           $output .= '
                <tr >
                     <td class=""><a href="https://togtokh.dev/dev/Industry/v2/post.php?id='.$row["id"].'">'.$row["id"].'</a></td>
                     <td class="">'.$row["title_mon"].'</td>
                     <td class="">'.$row["time_s"].'</td>
                        <td class=""><a class="btn btn-sm btn-icon btn-bg-light btn-text-primary btn-hover-danger delete_button" del_id="'.$row["id"].'" onclick="deletePost('.$row["id"].')"  >
                					X
                				</a></td>
                </tr>
           ';
      }

 $output .= '</tbody> ';

 echo $output;
 ?>
