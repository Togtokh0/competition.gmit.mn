<?php
include '../../PHPMailer/phpmail_user.php';
$html ='<table cellpadding="0" cellspacing="0" border="0" style="font:16px/1.5 Avenir,Helvetica,Arial,sans-serif;color:#555;width:100%;margin:0;background:#fafafa">
  <tbody>
    <tr>
      <td style="padding:12px;margin:0;text-align:center;vertical-align:top">
        <img style="vertical-align:top;width:500px;height:0">
        <table width="500" cellpadding="0" cellspacing="0" border="0" style="width:500px;margin:0 auto">
          <tbody>
            <tr>
              <td align="left" valign="middle" style="padding:0;margin:0">
                <a href="http://nani.mn/"
                  style="display:block;text-decoration:none" target="_blank"
                  data-saferedirecturl="http://nani.mn/">
                  <img style="height:24px;margin:24px 0;vertical-align:top;border:none"
                    src="https://upload.togtokh.dev/photo/nani_mail_logo.png"
                    alt="NANI.MN" class="CToWUd">
                </a>
              </td>
              <td align="right" valign="middle" style="padding:0;margin:0 ">
                <img style="height:80px;vertical-align:top;border:none; padding-right:10px;"
                  src="https://upload.togtokh.dev/photo/mail.png"
                  alt="NANI.MN" class="CToWUd">
              </td>
            </tr>
          </tbody>
        </table>
        <table width="500" cellpadding="0" cellspacing="0" border="0" style="width:500px;margin:0 auto">
          <tbody>
            <tr>
              <td align="center" valign="middle" style="padding:0;margin:0">
                <div style="background:#fff;border:1px rgba(0,0,0,.1) solid;border-radius:12px;overflow:hidden;padding:24px;margin:0 0 24px;text-align:left;word-break:break-word">
                  <h3 style="font-size:1.25em;margin:0">Эрхэм хүндэт тогтохоо ,</h3>
                  <p style="margin:1em 0;color:rgba(0,0,0,.7)">Таны баталгаажуулах код: <span style="background:#c6cfcf; padding: 7px; border-radius:12px;">4563</span> </p>
                  <p style="margin:1em 0;color:rgba(0,0,0,.7)">Баярлалаа.</p>
                </div>
                <div style="text-align:left;margin:2em 0">
                  <p style="margin:1em 0">
                    * Хэрэв та нууц үгээ шинэчлэхийг хүсээгүй бол NANI<small>.mn</small> -ийн имэйлрүү илгээнэ үү <a href="mailto:m@togtokh.dev" target="_blank">m@togtokh.dev</a>*</p>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <table width="500" cellpadding="0" cellspacing="0" border="0" style="width:500px;margin:0 auto">
          <tbody>
            <tr>
              <td align="center" valign="middle" style="padding:0;margin:0">
                <div style="text-align:center;margin:24px 0;opacity:.7">
                  <a href=""
                    style="display:inline-block;vertical-align:top;background:rgba(0,0,0,.1);padding:6px;border-radius:12px;margin:0 6px" target="_blank"
                    data-saferedirecturl="">
                    <img style="width:24px;height:24px;vertical-align:top;border:none"
                      src="https://upload.togtokh.dev/photo/fap_1.png" class="CToWUd">
                  </a>
                  <a href=""
                    style="display:inline-block;vertical-align:top;background:rgba(0,0,0,.1);padding:6px;border-radius:12px;margin:0 6px" target="_blank"
                    data-saferedirecturl="">
                    <img style="width:24px;height:24px;vertical-align:top;border:none"
                      src="https://upload.togtokh.dev/photo/fap_2.png" class="CToWUd">
                  </a>
                  <a href=""
                    style="display:inline-block;vertical-align:top;background:rgba(0,0,0,.1);padding:6px;border-radius:12px;margin:0 6px" target="_blank"
                    data-saferedirecturl="">
                    <img style="width:24px;height:24px;vertical-align:top;border:none"
                      src="https://upload.togtokh.dev/photo/fap_3.png" class="CToWUd">
                  </a>
                  <a href=""
                    style="display:inline-block;vertical-align:top;background:rgba(0,0,0,.1);padding:6px;border-radius:12px;margin:0 6px" target="_blank"
                    data-saferedirecturl="">
                    <img style="width:24px;height:24px;vertical-align:top;border:none"
                      src="https://upload.togtokh.dev/photo/fap_4.png" class="CToWUd">
                  </a>
                </div>
                <div style="text-align:center;margin:24px 0">
                  <p style="font:14px/1.5 Avenir,Helvetica,Arial,sans-serif;margin:12px 0">
                    <a href="https://nani.togtokh.dev/app_2/about.php"
                      style="color:#000;text-decoration:underline" target="_blank"
                      data-saferedirecturl="https://nani.togtokh.dev/app_2/about.php">Terms
                      of Use</a> &amp; <a
                      href="https://nani.togtokh.dev/app_2/fag.php"
                      style="color:#000;text-decoration:underline" target="_blank"
                      data-saferedirecturl="">Privacy
                      Policy</a>
                  </p>
                  <p style="font:12px/1.5 Avenir,Helvetica,Arial,sans-serif;margin:12px 0;opacity:.5">
                    <b>Togtokh.DEV - ын харьяаны NANI.MN </b> (1001568-K)<br>
                    Central Tower , Ulaanbaatar , Mongolian
                  </p>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>';
// if(email_sent_user_fun('altanpurevmisheel@gmail.com','NANI.MN','Худалдан авалтын мэдэгдэл',$html)){
//   echo "sent";
// }else{
//   echo "sent false";
// }
$arrayName = array('  togtokh.dev@gmail.com' , );
if(email_sent_user_fun_array($arrayName,'test11','Худалдан авалтын мэдэгдэл','$html')){
  echo "sent";
}else{
  echo "sent false";
}
 ?>
