<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>click demo</title>
  <style>
  p {
    color: red;
    margin: 5px;
    cursor: pointer;
  }
  p:hover {
    background: yellow;
  }
  </style>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>

<form  method="post" id="push_file"  enctype="multipart/form-data">
  <button type="button" name="button" id="add">+<button>
  <div class="" id="uploads_com">
    <input type="text" name="name_1"/>
  </div>
<hr>
<div class="">
    <button type="submit" id="submitBtn" name="button">upload</button>
</div>

</form>

<script>
let com_count =1;
$( "#add" ).click(function() {
  com_count++;
  $( '#uploads_com' ).html($( '#uploads_com' ).html()+'  <input type="text" name="name_'+com_count+'"/>');
});
$("#push_file").on('submit', function(e){
e.preventDefault();
$.ajax({
    type: 'POST',
    url: 'file_upload_api.php',
    data: new FormData(this),
    dataType: 'json',
    contentType: false,
    cache: false,
    processData:false,
    beforeSend: function(){
    },
    success: function(response){
      if(response.success){
         alert("Бүртгэгдлээ админ зөвшөөртөл түр хүлээнэ үү");
      }else{
        alert(response.errors);
      }
    }
});
});
</script>

</body>
</html>
