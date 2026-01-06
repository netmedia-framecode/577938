<?php

function handle_error($errno, $errstr, $errfile, $errline)
{
  // Create error log file path based on the file where the error occurred
  $errorLog = dirname(__FILE__) . '/error_log.log'; // Error log file location within the project folder

  // Format error message with additional information
  $error_message = "[" . date("Y-m-d H:i:s") . "] Error [$errno]: $errstr in $errfile on line $errline" . PHP_EOL;

  // Attempt to open the error log file in append mode, creating it if it doesn't exist
  $file_handle = fopen($errorLog, 'a');
  if ($file_handle !== false) {
    // Write error message to the log file
    fwrite($file_handle, $error_message);
    // Close the file handle
    fclose($file_handle);
  }

  // Save error message in session
  $_SESSION['error_message'] = $error_message;

  // Redirect user back to the same page only if there is no error
  if (!isset($_SESSION['error_flag'])) {
    // Set error flag to prevent infinite redirection loop
    $_SESSION['error_flag'] = true;
    // Redirect user back to the same page
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit(); // Stop further execution
  }
}

function valid($conn, $value)
{
  $valid = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $value))));
  return $valid;
}

function separateAlphaNumeric($string)
{
  $alpha = "";
  $numeric = "";
  // Mengiterasi setiap karakter dalam string
  for ($i = 0; $i < strlen($string); $i++) {
    // Memeriksa apakah karakter adalah huruf
    if (ctype_alpha($string[$i])) {
      $alpha .= $string[$i];
    }
    // Memeriksa apakah karakter adalah angka
    if (ctype_digit($string[$i])) {
      $numeric .= $string[$i];
    }
  }
  // Mengembalikan array yang berisi huruf dan angka terpisah
  return array(
    "alpha" => $alpha,
    "numeric" => $numeric
  );
}

function generateToken()
{
  // Generate a random 6-digit number
  $token = mt_rand(100000, 999999);
  return $token;
}

function compressImage($source, $destination, $quality)
{
  // mendapatkan info image
  $imgInfo = getimagesize($source);
  $mime = $imgInfo['mime'];
  // membuat image baru
  switch ($mime) {
    // proses kode memilih tipe tipe image 
    case 'image/jpeg':
      $image = imagecreatefromjpeg($source);
      break;
    case 'image/png':
      $image = imagecreatefrompng($source);
      break;
    default:
      $image = imagecreatefromjpeg($source);
  }

  // Menyimpan image dengan ukuran yang baru
  imagejpeg($image, $destination, $quality);

  // Return image
  return $destination;
}

function hapusFolderRecursively($folderPath)
{
  if (is_dir($folderPath)) {
    $files = glob($folderPath . '/*');
    foreach ($files as $file) {
      is_dir($file) ? hapusFolderRecursively($file) : unlink($file);
    }
    rmdir($folderPath);
  }
}

if (!isset($_SESSION["project_sman_5_kota_komba"]["users"])) {
  function register($conn, $data, $action)
  {
    if ($action == "insert") {
      $checkEmail = "SELECT * FROM users WHERE email='$data[email]'";
      $checkEmail = mysqli_query($conn, $checkEmail);
      if (mysqli_num_rows($checkEmail) > 0) {
        $message = "Maaf, email yang anda masukan sudah terdaftar.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      } else {
        if ($data['password'] !== $data['re_password']) {
          $message = "Maaf, konfirmasi password yang anda masukan belum sama.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        } else {
          $password = password_hash($data['password'], PASSWORD_DEFAULT);
          $token = generateToken();
          $en_user = password_hash($token, PASSWORD_DEFAULT);
          $en_user = str_replace("$", "", $en_user);
          $en_user = str_replace("/", "", $en_user);
          $en_user = str_replace(".", "", $en_user);
          $to       = $data['email'];
          $subject  = "Account Verification - SMAN 5 Kota Komba";
          $message  = "<!doctype html>
          <html>
            <head>
                <meta name='viewport' content='width=device-width'>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <title>Account Verification</title>
                <style>
                    @media only screen and (max-width: 620px) {
                        table[class='body'] h1 {
                            font-size: 28px !important;
                            margin-bottom: 10px !important;}
                        table[class='body'] p,
                        table[class='body'] ul,
                        table[class='body'] ol,
                        table[class='body'] td,
                        table[class='body'] span,
                        table[class='body'] a {
                            font-size: 16px !important;}
                        table[class='body'] .wrapper,
                        table[class='body'] .article {
                            padding: 10px !important;}
                        table[class='body'] .content {
                            padding: 0 !important;}
                        table[class='body'] .container {
                            padding: 0 !important;
                            width: 100% !important;}
                        table[class='body'] .main {
                            border-left-width: 0 !important;
                            border-radius: 0 !important;
                            border-right-width: 0 !important;}
                        table[class='body'] .btn table {
                            width: 100% !important;}
                        table[class='body'] .btn a {
                            width: 100% !important;}
                        table[class='body'] .img-responsive {
                            height: auto !important;
                            max-width: 100% !important;
                            width: auto !important;}}
                    @media all {
                        .ExternalClass {
                            width: 100%;}
                        .ExternalClass,
                        .ExternalClass p,
                        .ExternalClass span,
                        .ExternalClass font,
                        .ExternalClass td,
                        .ExternalClass div {
                            line-height: 100%;}
                        .apple-link a {
                            color: inherit !important;
                            font-family: inherit !important;
                            font-size: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                            text-decoration: none !important;
                        .btn-primary table td:hover {
                            background-color: #d5075d !important;}
                        .btn-primary a:hover {
                            background-color: #000 !important;
                            border-color: #000 !important;
                            color: #fff !important;}}
                </style>
            </head>
            <body class style='background-color: #e1e3e5; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
                <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background-color: #e1e3e5; width: 100%;' width='100%' bgcolor='#e1e3e5'>
                <tr>
                    <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
                    <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;' width='580' valign='top'>
                    <div class='content' style='box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;'>
            
                        <!-- START CENTERED WHITE CONTAINER -->
                        <table role='presentation' class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background: #ffffff; border-radius: 3px; width: 100%;' width='100%'>
            
                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' valign='top'>
                            <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' width='100%'>
                                <tr>
                                <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
                                    <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Hi " . $data['name'] . ",</p>
                                    <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Selamat akun kamu sudah terdaftar, tinggal satu langkah lagi kamu sudah bisa menggunakan akun. Silakan salin kode token dibawah ini untuk memverifikasi akun kamu.</p>
                                    <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; min-width: 100%; width: 100%;' width='100%'>
                                    <tbody>
                                        <tr>
                                        <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' valign='top'>
                                            <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: auto; width: auto;'>
                                            <tbody>
                                                <tr>
                                                <td style='font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #ffffff; border-radius: 5px; text-align: center; font-weight: bold;' valign='top' bgcolor='#ffffff' align='center'>" . $token . "</td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Terima kasih telah mendaftar di SMAN 5 Kota Komba.</p>
                                    <small>Peringatan! Ini adalah pesan otomatis sehingga Anda tidak dapat membalas pesan ini.</small>
                                </td>
                                </tr>
                            </table>
                            </td>
                        </tr>
            
                        <!-- END MAIN CONTENT AREA -->
                        </table>
                        
                        <!-- START FOOTER -->
                        <div class='footer' style='clear: both; margin-top: 10px; text-align: center; width: 100%;'>
                        <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' width='100%'>
                            <tr>
                            <td class='content-block' style='font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #9a9ea6; font-size: 12px; text-align: center;' valign='top' align='center'>
                                <span class='apple-link' style='color: #9a9ea6; font-size: 12px; text-align: center;'>Workarea Jln. S. K. Lerik, Kota Baru, Kupang, NTT, Indonesia. (0380) 8438423</span>
                            </td>
                            </tr>
                            <tr>
                            <td class='content-block powered-by' style='font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #9a9ea6; font-size: 12px; text-align: center;' valign='top' align='center'>
                                Powered by <a href='https://www.netmedia-framecode.com' style='color: #9a9ea6; font-size: 12px; text-align: center; text-decoration: none;'>Netmedia Framecode</a>.
                            </td>
                            </tr>
                        </table>
                        </div>
                        <!-- END FOOTER -->
            
                    <!-- END CENTERED WHITE CONTAINER -->
                    </div>
                    </td>
                    <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
                </tr>
                </table>
            </body>
          </html>";
          smtp_mail($to, $subject, $message, "", "", 0, 0, true);
          $_SESSION['data_auth'] = ['en_user' => $en_user];
          $sql = "INSERT INTO users(en_user,token,name,email,password) VALUES('$en_user','$token','$data[name]','$data[email]','$password')";
        }
      }
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function re_verifikasi($conn, $data, $action)
  {
    if ($action == "update") {
      $checkEN = "SELECT * FROM users WHERE en_user='$data[en_user]'";
      $checkEN = mysqli_query($conn, $checkEN);
      if (mysqli_num_rows($checkEN) == 0) {
        $message = "Maaf, sepertinya ada kesalahan saat mendaftar.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      } else if (mysqli_num_rows($checkEN) > 0) {
        $row = mysqli_fetch_assoc($checkEN);
        $name = $row['name'];
        $email = $row['email'];
        $token = generateToken();
        $reen_user = password_hash($token, PASSWORD_DEFAULT);
        $reen_user = str_replace("$", "", $reen_user);
        $reen_user = str_replace("/", "", $reen_user);
        $reen_user = str_replace(".", "", $reen_user);
        $to       = $email;
        $subject  = "Account Verification - SMAN 5 Kota Komba";
        $message  = "<!doctype html>
        <html>
          <head>
              <meta name='viewport' content='width=device-width'>
              <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
              <title>Account Verification</title>
              <style>
                  @media only screen and (max-width: 620px) {
                      table[class='body'] h1 {
                          font-size: 28px !important;
                          margin-bottom: 10px !important;}
                      table[class='body'] p,
                      table[class='body'] ul,
                      table[class='body'] ol,
                      table[class='body'] td,
                      table[class='body'] span,
                      table[class='body'] a {
                          font-size: 16px !important;}
                      table[class='body'] .wrapper,
                      table[class='body'] .article {
                          padding: 10px !important;}
                      table[class='body'] .content {
                          padding: 0 !important;}
                      table[class='body'] .container {
                          padding: 0 !important;
                          width: 100% !important;}
                      table[class='body'] .main {
                          border-left-width: 0 !important;
                          border-radius: 0 !important;
                          border-right-width: 0 !important;}
                      table[class='body'] .btn table {
                          width: 100% !important;}
                      table[class='body'] .btn a {
                          width: 100% !important;}
                      table[class='body'] .img-responsive {
                          height: auto !important;
                          max-width: 100% !important;
                          width: auto !important;}}
                  @media all {
                      .ExternalClass {
                          width: 100%;}
                      .ExternalClass,
                      .ExternalClass p,
                      .ExternalClass span,
                      .ExternalClass font,
                      .ExternalClass td,
                      .ExternalClass div {
                          line-height: 100%;}
                      .apple-link a {
                          color: inherit !important;
                          font-family: inherit !important;
                          font-size: inherit !important;
                          font-weight: inherit !important;
                          line-height: inherit !important;
                          text-decoration: none !important;
                      .btn-primary table td:hover {
                          background-color: #d5075d !important;}
                      .btn-primary a:hover {
                          background-color: #000 !important;
                          border-color: #000 !important;
                          color: #fff !important;}}
              </style>
          </head>
          <body class style='background-color: #e1e3e5; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
              <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background-color: #e1e3e5; width: 100%;' width='100%' bgcolor='#e1e3e5'>
              <tr>
                  <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
                  <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;' width='580' valign='top'>
                  <div class='content' style='box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;'>
          
                      <!-- START CENTERED WHITE CONTAINER -->
                      <table role='presentation' class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background: #ffffff; border-radius: 3px; width: 100%;' width='100%'>
          
                      <!-- START MAIN CONTENT AREA -->
                      <tr>
                          <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' valign='top'>
                          <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' width='100%'>
                              <tr>
                              <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
                                  <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Hi " . $name . ",</p>
                                  <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Selamat akun kamu sudah terdaftar, tinggal satu langkah lagi kamu sudah bisa menggunakan akun. Silakan salin kode token dibawah ini untuk memverifikasi akun kamu.</p>
                                  <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; min-width: 100%; width: 100%;' width='100%'>
                                  <tbody>
                                      <tr>
                                      <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' valign='top'>
                                          <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: auto; width: auto;'>
                                          <tbody>
                                              <tr>
                                              <td style='font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #ffffff; border-radius: 5px; text-align: center; font-weight: bold;' valign='top' bgcolor='#ffffff' align='center'>" . $token . "</td>
                                              </tr>
                                          </tbody>
                                          </table>
                                      </td>
                                      </tr>
                                  </tbody>
                                  </table>
                                  <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Terima kasih telah mendaftar di SMAN 5 Kota Komba.</p>
                                  <small>Peringatan! Ini adalah pesan otomatis sehingga Anda tidak dapat membalas pesan ini.</small>
                              </td>
                              </tr>
                          </table>
                          </td>
                      </tr>
          
                      <!-- END MAIN CONTENT AREA -->
                      </table>
                      
                      <!-- START FOOTER -->
                      <div class='footer' style='clear: both; margin-top: 10px; text-align: center; width: 100%;'>
                      <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' width='100%'>
                          <tr>
                          <td class='content-block' style='font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #9a9ea6; font-size: 12px; text-align: center;' valign='top' align='center'>
                              <span class='apple-link' style='color: #9a9ea6; font-size: 12px; text-align: center;'>Workarea Jln. S. K. Lerik, Kota Baru, Kupang, NTT, Indonesia. (0380) 8438423</span>
                          </td>
                          </tr>
                          <tr>
                          <td class='content-block powered-by' style='font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #9a9ea6; font-size: 12px; text-align: center;' valign='top' align='center'>
                              Powered by <a href='https://www.netmedia-framecode.com' style='color: #9a9ea6; font-size: 12px; text-align: center; text-decoration: none;'>Netmedia Framecode</a>.
                          </td>
                          </tr>
                      </table>
                      </div>
                      <!-- END FOOTER -->
          
                  <!-- END CENTERED WHITE CONTAINER -->
                  </div>
                  </td>
                  <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
              </tr>
              </table>
          </body>
        </html>";
        smtp_mail($to, $subject, $message, "", "", 0, 0, true);
        $_SESSION['data_auth'] = ['en_user' => $reen_user];
        $sql = "UPDATE users SET en_user='$reen_user', token='$token', updated_at=current_timestamp WHERE en_user='$data[en_user]'";
      }
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function verifikasi($conn, $data, $action)
  {
    if ($action == "update") {
      $checkEN = "SELECT * FROM users WHERE en_user='$data[en_user]'";
      $checkEN = mysqli_query($conn, $checkEN);
      if (mysqli_num_rows($checkEN) == 0) {
        $message = "Maaf, sepertinya ada kesalahan saat mendaftar.";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      } else if (mysqli_num_rows($checkEN) > 0) {
        $row = mysqli_fetch_assoc($checkEN);
        $token_primary = $row['token'];
        $updated_at = strtotime($row['updated_at']);
        $current_time = time();
        if (($current_time - $updated_at) > (5 * 60)) {
          $message = "Maaf, waktu untuk verifikasi telah habis.";
          $message_type = "warning";
          alert($message, $message_type);
          $_SESSION["project_sman_5_kota_komba"] = [
            "message-warning" => "Maaf, waktu untuk verifikasi telah habis.",
            "time-message" => time()
          ];
          return false;
        }
        if ($data['token'] !== $token_primary) {
          $message = "Maaf, kode token yang anda masukan masih salah.";
          $message_type = "warning";
          alert($message, $message_type);
          return false;
        }
        $sql = "UPDATE users SET id_active='1', updated_at=current_timestamp WHERE en_user='$data[en_user]'";
      }
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function forgot_password($conn, $data, $action, $baseURL)
  {
    if ($action == "update") {
      $checkEmail = "SELECT * FROM users WHERE email='$data[email]'";
      $checkEmail = mysqli_query($conn, $checkEmail);
      if (mysqli_num_rows($checkEmail) === 0) {
        $message = "Maaf, email yang anda masukan belum terdaftar.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      } else {
        $row = mysqli_fetch_assoc($checkEmail);
        $name = valid($conn, $row['name']);
        $token = generateToken();
        $en_user = password_hash($token, PASSWORD_DEFAULT);
        $en_user = str_replace("$", "", $en_user);
        $en_user = str_replace("/", "", $en_user);
        $en_user = str_replace(".", "", $en_user);
        $to       = $data['email'];
        $subject  = "Reset password - SMAN 5 Kota Komba";
        $message  = "<!doctype html>
        <html>
          <head>
              <meta name='viewport' content='width=device-width'>
              <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
              <title>Reset password</title>
              <style>
                  @media only screen and (max-width: 620px) {
                      table[class='body'] h1 {
                          font-size: 28px !important;
                          margin-bottom: 10px !important;}
                      table[class='body'] p,
                      table[class='body'] ul,
                      table[class='body'] ol,
                      table[class='body'] td,
                      table[class='body'] span,
                      table[class='body'] a {
                          font-size: 16px !important;}
                      table[class='body'] .wrapper,
                      table[class='body'] .article {
                          padding: 10px !important;}
                      table[class='body'] .content {
                          padding: 0 !important;}
                      table[class='body'] .container {
                          padding: 0 !important;
                          width: 100% !important;}
                      table[class='body'] .main {
                          border-left-width: 0 !important;
                          border-radius: 0 !important;
                          border-right-width: 0 !important;}
                      table[class='body'] .btn table {
                          width: 100% !important;}
                      table[class='body'] .btn a {
                          width: 100% !important;}
                      table[class='body'] .img-responsive {
                          height: auto !important;
                          max-width: 100% !important;
                          width: auto !important;}}
                  @media all {
                      .ExternalClass {
                          width: 100%;}
                      .ExternalClass,
                      .ExternalClass p,
                      .ExternalClass span,
                      .ExternalClass font,
                      .ExternalClass td,
                      .ExternalClass div {
                          line-height: 100%;}
                      .apple-link a {
                          color: inherit !important;
                          font-family: inherit !important;
                          font-size: inherit !important;
                          font-weight: inherit !important;
                          line-height: inherit !important;
                          text-decoration: none !important;
                      .btn-primary table td:hover {
                          background-color: #d5075d !important;}
                      .btn-primary a:hover {
                          background-color: #000 !important;
                          border-color: #000 !important;
                          color: #fff !important;}}
              </style>
          </head>
          <body class style='background-color: #e1e3e5; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
              <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background-color: #e1e3e5; width: 100%;' width='100%' bgcolor='#e1e3e5'>
              <tr>
                  <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
                  <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;' width='580' valign='top'>
                  <div class='content' style='box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;'>
          
                      <!-- START CENTERED WHITE CONTAINER -->
                      <table role='presentation' class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background: #ffffff; border-radius: 3px; width: 100%;' width='100%'>
          
                      <!-- START MAIN CONTENT AREA -->
                      <tr>
                          <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' valign='top'>
                          <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' width='100%'>
                              <tr>
                              <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
                                  <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Hi " . $name . ",</p>
                                  <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Pesan ini secara otomatis dikirimkan kepada anda karena anda meminta untuk mereset kata sandi. Jika anda tidak sama sekali ingin mereset atau bukan anda yang ingin mereset abaikan saja. Klik tombol reset berikut untuk melanjutkan:</p>
                                  <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; min-width: 100%; width: 100%;' width='100%'>
                                  <tbody>
                                      <tr>
                                      <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' valign='top'>
                                          <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: auto; width: auto;'>
                                          <tbody>
                                              <tr>
                                                <td style='font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #ffffff; border-radius: 5px; text-align: center;' valign='top' bgcolor='#ffffff' align='center'>
                                                  <a href='" . $baseURL . "auth/new-password?en=" . $en_user . "' target='_blank' style='background-color: #ffffff; border: solid 1px #000; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; border-color: #000; color: #000;'>Atur Ulang Kata Sandi</a> 
                                                </td>
                                              </tr>
                                          </tbody>
                                          </table>
                                      </td>
                                      </tr>
                                  </tbody>
                                  </table>
                                  <small>Peringatan! Ini adalah pesan otomatis sehingga Anda tidak dapat membalas pesan ini.</small>
                              </td>
                              </tr>
                          </table>
                          </td>
                      </tr>
          
                      <!-- END MAIN CONTENT AREA -->
                      </table>
                      
                      <!-- START FOOTER -->
                      <div class='footer' style='clear: both; margin-top: 10px; text-align: center; width: 100%;'>
                      <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' width='100%'>
                          <tr>
                          <td class='content-block' style='font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #9a9ea6; font-size: 12px; text-align: center;' valign='top' align='center'>
                              <span class='apple-link' style='color: #9a9ea6; font-size: 12px; text-align: center;'>Workarea Jln. S. K. Lerik, Kota Baru, Kupang, NTT, Indonesia. (0380) 8438423</span>
                          </td>
                          </tr>
                          <tr>
                          <td class='content-block powered-by' style='font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #9a9ea6; font-size: 12px; text-align: center;' valign='top' align='center'>
                              Powered by <a href='https://www.netmedia-framecode.com' style='color: #9a9ea6; font-size: 12px; text-align: center; text-decoration: none;'>Netmedia Framecode</a>.
                          </td>
                          </tr>
                      </table>
                      </div>
                      <!-- END FOOTER -->
          
                  <!-- END CENTERED WHITE CONTAINER -->
                  </div>
                  </td>
                  <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
              </tr>
              </table>
          </body>
        </html>";
        smtp_mail($to, $subject, $message, "", "", 0, 0, true);
        $sql = "UPDATE users SET en_user='$en_user', token='$token', updated_at=current_timestamp WHERE email='$data[email]'";
      }
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function new_password($conn, $data, $action)
  {
    if ($action == "update") {
      $lenght = strlen($data['password']);
      if ($lenght < 8) {
        $message = "Maaf, password yang anda masukan harus 8 digit atau lebih.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      } else if ($data['password'] !== $data['re_password']) {
        $message = "Maaf, konfirmasi password yang anda masukan belum sama.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      } else {
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password='$password' WHERE email='$data[email]'";
      }
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function login($conn, $data)
  {
    // check account
    $checkAccount = mysqli_query($conn, "SELECT * FROM users JOIN user_role ON users.id_role=user_role.id_role WHERE users.email='$data[email]'");
    if (mysqli_num_rows($checkAccount) == 0) {
      $message = "Maaf, akun yang anda masukan belum terdaftar.";
      $message_type = "danger";
      alert($message, $message_type);
      return false;
    } else if (mysqli_num_rows($checkAccount) > 0) {
      $row = mysqli_fetch_assoc($checkAccount);
      if (password_verify($data['password'], $row["password"])) {
        $_SESSION["project_sman_5_kota_komba"]["users"] = [
          "id" => $row["id_user"],
          "id_role" => $row["id_role"],
          "role" => $row["role"],
          "email" => $row["email"],
          "name" => $row["name"],
          "image" => $row["image"]
        ];
        return mysqli_affected_rows($conn);
      } else {
        $message = "Maaf, kata sandi yang anda masukan salah.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      }
    }
  }
}

if (isset($_SESSION["project_sman_5_kota_komba"]["users"])) {

  function profil($conn, $data, $action, $id_user)
  {
    if ($action == "update") {
      $path = "../assets/img/profil/";
      if (!empty($_FILES['image']["name"])) {
        $fileName = basename($_FILES["image"]["name"]);
        $fileName = str_replace(" ", "-", $fileName);
        $fileName_encrypt = crc32($fileName);
        $ekstensiGambar = explode('.', $fileName);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        $imageUploadPath = $path . $fileName_encrypt . "." . $ekstensiGambar;
        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
          $imageTemp = $_FILES["image"]["tmp_name"];
          compressImage($imageTemp, $imageUploadPath, 75);
          $image = $fileName_encrypt . "." . $ekstensiGambar;
        } else {
          $message = "Maaf, hanya file gambar JPG, JPEG, dan PNG yang diizinkan.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
      }
      if (!empty($_FILES['image']["name"])) {
        $unwanted_characters = "../assets/img/profil/";
        $remove_image = str_replace($unwanted_characters, "", $data['imageOld']);
        if ($remove_image != "default.svg") {
          unlink($path . $remove_image);
        }
      } else if (empty($_FILE['image']["name"])) {
        $image = $data['imageOld'];
      }
      if (!empty($data['password'])) {
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE users SET name='$data[name]', image='$image', password='$password' WHERE id_user='$id_user'";
      } else {
        $sql = "UPDATE users SET name='$data[name]', image='$image' WHERE id_user='$id_user'";
      }
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function setting($conn, $data, $action)
  {

    if ($action == "update") {
      $path = "../assets/img/auth/";
      if (!empty($_FILES['image']["name"])) {
        $fileName = basename($_FILES["image"]["name"]);
        $fileName = str_replace(" ", "-", $fileName);
        $fileName_encrypt = crc32($fileName);
        $ekstensiGambar = explode('.', $fileName);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        $imageUploadPath = $path . $fileName_encrypt . "." . $ekstensiGambar;
        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
          $imageTemp = $_FILES["image"]["tmp_name"];
          move_uploaded_file($imageTemp, $imageUploadPath);
          $image = $fileName_encrypt . "." . $ekstensiGambar;
        } else {
          $message = "Maaf, hanya file gambar JPG, JPEG, dan PNG yang diizinkan.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
      }
      if (!empty($_FILES['image']["name"])) {
        $unwanted_characters = "../assets/img/auth/";
        $remove_image = str_replace($unwanted_characters, "", $data['imageOld']);
        unlink($path . $remove_image);
      } else if (empty($_FILE['image']["name"])) {
        $image = $data['imageOld'];
      }
      $sql = "UPDATE auth SET image='$image', bg='$data[bg]', model='$data[model]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function utilities($conn, $data, $action)
  {

    if ($action == "update") {
      $path = "../assets/img/";
      if (!empty($_FILES['logo']["name"])) {
        $fileName = basename($_FILES["logo"]["name"]);
        $fileName = str_replace(" ", "-", $fileName);
        $fileName_encrypt = crc32($fileName);
        $ekstensiGambar = explode('.', $fileName);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        $imageUploadPath = $path . $fileName_encrypt . "." . $ekstensiGambar;
        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
          $imageTemp = $_FILES["logo"]["tmp_name"];
          move_uploaded_file($imageTemp, $imageUploadPath);
          $logo = $fileName_encrypt . "." . $ekstensiGambar;
        } else {
          $message = "Maaf, hanya file gambar JPG, JPEG, dan PNG yang diizinkan.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
      }
      if (!empty($_FILES['logo']["name"])) {
        $unwanted_characters = "../assets/img/";
        $remove_image = str_replace($unwanted_characters, "", $data['logoOld']);
        unlink($path . $remove_image);
      } else if (empty($_FILE['logo']["name"])) {
        $logo = $data['logoOld'];
      }
      $sql = "UPDATE utilities SET logo='$logo', name_web='$data[name_web]', keyword='$data[keyword]', description='$data[description]', author='$data[author]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function users($conn, $data, $action)
  {

    if ($action == "update") {
      $sql = "UPDATE users SET id_role='$data[id_role]', id_active='$data[id_active]' WHERE id_user='$data[id_user]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function role($conn, $data, $action)
  {
    if ($action == "insert") {
      $checkRole = "SELECT * FROM user_role WHERE role LIKE '%$data[role]%'";
      $checkRole = mysqli_query($conn, $checkRole);
      if (mysqli_num_rows($checkRole) > 0) {
        $message = "Maaf, role yang anda masukan sudah ada.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      } else {
        $sql = "INSERT INTO user_role(role) VALUES('$data[role]')";
      }
    }

    if ($action == "update") {
      if ($data['role'] !== $data['roleOld']) {
        $checkRole = "SELECT * FROM user_role WHERE role LIKE '%$data[role]%'";
        $checkRole = mysqli_query($conn, $checkRole);
        if (mysqli_num_rows($checkRole) > 0) {
          $message = "Maaf, role yang anda masukan sudah ada.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
      }
      $sql = "UPDATE user_role SET role='$data[role]' WHERE id_role='$data[id_role]'";
    }

    if ($action == "delete") {
      $sql = "DELETE FROM user_role WHERE id_role='$data[id_role]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function menu($conn, $data, $action)
  {
    if ($action == "insert") {
      $namaFolder = strtolower($data['menu']);
      $namaFolder = str_replace(" ", "-", $namaFolder);
      $checkMenu = "SELECT * FROM user_menu WHERE menu='$data[menu]'";
      $checkMenu = mysqli_query($conn, $checkMenu);
      if (mysqli_num_rows($checkMenu) > 0) {
        $message = "Maaf, menu yang anda masukan sudah ada.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      } else {
        $pathFolder = __DIR__ . '/../views/' . $namaFolder;
        if (!is_dir($pathFolder)) {
          mkdir($pathFolder, 0777, true);
          $file = fopen($pathFolder . '/redirect.php', "w");
          fwrite($file, '<?php if (!isset($_SESSION["project_sman_5_kota_komba"]["users"])) {
            header("Location: ../../auth/");
            exit;
          }
          ');
          fclose($file);

          $file_controller = fopen("../controller/" . $namaFolder . ".php", "w");
          fwrite($file_controller, '<?php
  
          require_once("../../config/Base.php");
          require_once("../../config/Auth.php");
          require_once("../../config/Alert.php");
          require_once("../../views/' . $namaFolder . '/redirect.php");
          ');
          fclose($file_controller);
        } else {
          $message = "Folder $namaFolder sudah ada!";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
        $sql = "INSERT INTO user_menu(icon,menu) VALUES('$data[icon]','$data[menu]')";
      }
    }

    if ($action == "update") {
      $menu_baru = strtolower(str_replace(' ', '-', $data['menu']));
      $menu_lama = strtolower(str_replace(' ', '-', $data['menuOld']));
      if ($menu_baru !== $menu_lama) {
        $checkMenu = "SELECT * FROM user_menu WHERE menu='$data[menu]'";
        $checkMenu = mysqli_query($conn, $checkMenu);
        if (mysqli_num_rows($checkMenu) > 0) {
          $message = "Maaf, menu yang anda masukan sudah ada.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
        $folder_lama = __DIR__ . '/../views/' . $menu_lama;
        $folder_baru = __DIR__ . '/../views/' . $menu_baru;
        if (is_dir($folder_lama)) {
          if ($menu_baru !== $menu_lama) {
            if (rename($folder_lama, $folder_baru)) {
            } else {
              $message = "Gagal mengubah nama folder.";
              $message_type = "danger";
              alert($message, $message_type);
              return false;
            }
          }
        } else {
          $message = "Folder lama tidak ditemukan.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
      }
      $sql = "UPDATE user_menu SET icon='$data[icon]', menu='$data[menu]' WHERE id_menu='$data[id_menu]'";
    }

    if ($action == "delete") {
      $menu = strtolower(str_replace(' ', '-', $data['menu']));
      $pathFolder = __DIR__ . '/../views/' . $menu;
      unlink("../controller/" . $menu . ".php");
      hapusFolderRecursively($pathFolder);
      $sql = "DELETE FROM user_menu WHERE id_menu='$data[id_menu]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function sub_menu($conn, $data, $action, $baseURL)
  {
    $url = strtolower($data['title']);
    $url = str_replace(" ", "-", $url);

    if ($action == "insert") {
      $checkSubMenu = "SELECT * FROM user_sub_menu WHERE title='$data[title]'";
      $checkSubMenu = mysqli_query($conn, $checkSubMenu);
      if (mysqli_num_rows($checkSubMenu) > 0) {
        $message = "Maaf, nama sub menu yang anda masukan sudah ada.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      } else {
        $menu = "SELECT * FROM user_menu WHERE id_menu = '$data[id_menu]'";
        $view_menu = mysqli_query($conn, $menu);
        $data_menu = mysqli_fetch_assoc($view_menu);
        $menu = strtolower($data_menu['menu']);
        $menu = str_replace(" ", "-", $menu);

        $file_views = fopen("../views/" . $menu . "/" . $url . ".php", "w");
        fwrite($file_views, '<?php require_once("../../controller/' . $menu . '.php");
        $_SESSION["project_sman_5_kota_komba"]["name_page"] = "' . $data['title'] . '";
        require_once("../../templates/views_top.php"); ?>

        <div class="nxl-content" style="height: 100vh;">

          <!-- [ page-header ] start -->
          <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
              <div class="page-header-title">
                <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item">' . $data['title'] . '</li>
                <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></li>
              </ul>
            </div>
            <div class="page-header-right ms-auto">
              <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                  <a href="javascript:void(0)" class="page-header-right-close-toggle">
                    <i class="feather-arrow-left me-2"></i>
                    <span>Back</span>
                  </a>
                </div>
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                  <a href="add-' . $url . '" class="btn btn-primary">
                    <i class="feather-plus me-2"></i>
                    <span>Tambah</span>
                  </a>
                </div>
              </div>
              <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                  <i class="feather-align-right fs-20"></i>
                </a>
              </div>
            </div>
          </div>
          <!-- [ page-header ] end -->

          <!-- [ Main Content ] start -->
          <div class="main-content">
          </div>
          <!-- [ Main Content ] end -->

        </div>

        <?php require_once("../../templates/views_bottom.php") ?>
        ');
        fclose($file_views);

        $file_views_add = fopen("../views/" . $menu . "/add-" . $url . ".php", "w");
        fwrite($file_views_add, '<?php require_once("../../controller/' . $menu . '.php");
        $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah ' . $data['title'] . '";
        require_once("../../templates/views_top.php"); ?>

        <div class="nxl-content" style="height: 100vh;">

          <!-- [ page-header ] start -->
          <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
              <div class="page-header-title">
                <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item">' . $data['title'] . '</li>
                <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></li>
              </ul>
            </div>
          </div>
          <!-- [ page-header ] end -->

          <!-- [ Main Content ] start -->
          <div class="main-content">
          </div>
          <!-- [ Main Content ] end -->

        </div>

        <?php require_once("../../templates/views_bottom.php") ?>
        ');
        fclose($file_views_add);

        $petik = "'";
        $file_views_edit = fopen("../views/" . $menu . "/edit-" . $url . ".php", "w");
        fwrite($file_views_edit, '<?php require_once("../../controller/' . $menu . '.php");
        if(!isset($_GET["p"])){
          header("Location: menu");
          exit();
        }else{
          $id = valid($conn, $_GET["p"]); 
          $pull_data = "SELECT * FROM  WHERE  = ' . $petik . '$id' . $petik . '";
          $store_data = mysqli_query($conn, $pull_data);
          $view_data = mysqli_fetch_assoc($store_data);
        $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ubah ' . $data['title'] . '";
        require_once("../../templates/views_top.php"); ?>

        <div class="nxl-content" style="height: 100vh;">

          <!-- [ page-header ] start -->
          <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
              <div class="page-header-title">
                <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item">' . $data['title'] . '</li>
                <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"].' . $petik . ' ' . $petik . '.$view_data[""]  ?></li>
              </ul>
            </div>
          </div>
          <!-- [ page-header ] end -->

          <!-- [ Main Content ] start -->
          <div class="main-content">
          </div>
          <!-- [ Main Content ] end -->

        </div>

        <?php }
        require_once("../../templates/views_bottom.php") ?>
        ');
        fclose($file_views_edit);

        $url_sub = $menu . "/" . $url;
        $sql = "INSERT INTO user_sub_menu(id_menu,id_active,title,url) VALUES('$data[id_menu]','$data[id_active]','$data[title]','$url_sub')";
      }
    }

    if ($action == "update") {
      if ($data['title'] !== $data['titleOld']) {
        $checkSubMenu = "SELECT * FROM user_sub_menu WHERE title='$data[title]'";
        $checkSubMenu = mysqli_query($conn, $checkSubMenu);
        if (mysqli_num_rows($checkSubMenu) > 0) {
          $message = "Maaf, nama sub menu yang anda masukan sudah ada.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
      }
      $menu = "SELECT * FROM user_menu WHERE id_menu = '$data[id_menu]'";
      $view_menu = mysqli_query($conn, $menu);
      $data_menu = mysqli_fetch_assoc($view_menu);
      $menu = strtolower($data_menu['menu']);
      $menu = str_replace(" ", "-", $menu);
      rename($menu . '/' . $data['urlOld'] . '.php', $menu . '/' . $url . '.php');
      rename($menu . '/' . "add-" . $data['urlOld'] . '.php', $menu . '/' . "add-" . $url . '.php');
      rename($menu . '/' . "edit-" . $data['urlOld'] . '.php', $menu . '/' . "edit-" . $url . '.php');
      $sql = "UPDATE user_sub_menu SET id_menu='$data[id_menu]', id_active='$data[id_active]', title='$data[title]', url='$url' WHERE id_sub_menu='$data[id_sub_menu]'";
    }

    if ($action == "delete") {
      unlink("../views/" . $data['menu'] . "/" . $url . ".php");
      unlink("../views/" . $data['menu'] . "/" . "add-" . $url . ".php");
      unlink("../views/" . $data['menu'] . "/" . "edit-" . $url . ".php");
      $sql = "DELETE FROM user_sub_menu WHERE id_sub_menu='$data[id_sub_menu]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function menu_access($conn, $data, $action)
  {
    if ($action == "insert") {
      $sql = "INSERT INTO user_access_menu(id_role,id_menu) VALUES('$data[id_role]','$data[id_menu]')";
    }

    if ($action == "delete") {
      $sql = "DELETE FROM user_access_menu WHERE id_access_menu='$data[id_access_menu]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function sub_menu_access($conn, $data, $action)
  {
    if ($action == "insert") {
      $sql = "INSERT INTO user_access_sub_menu(id_role,id_sub_menu) VALUES('$data[id_role]','$data[id_sub_menu]')";
    }

    if ($action == "delete") {
      $sql = "DELETE FROM user_access_sub_menu WHERE id_access_sub_menu='$data[id_access_sub_menu]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  // ==================================================
  // BAGIAN 1: MENU PROFIL SEKOLAH (Relasi ke Users)
  // ==================================================

  function sejarah($conn, $data, $action, $konten, $id_user)
  {
    $path = "../../assets/img/";

    if ($action == "insert") {
      $gambar_gedung = "";
      if (!empty($_FILES['gambar_gedung']['name'])) {
        $fileName = $_FILES['gambar_gedung']['name'];
        $fileTmp = $_FILES['gambar_gedung']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $gambar_gedung = "sejarah_" . time() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $gambar_gedung);
      }

      $sql = "INSERT INTO sejarah(judul, konten, gambar_gedung, id_user) 
                VALUES('$data[judul]', '$konten', '$gambar_gedung', '$id_user')";
    }

    if ($action == "update") {
      $gambar_gedung = $data['gambar_gedungOld'];
      if (!empty($_FILES['gambar_gedung']['name'])) {
        $fileName = $_FILES['gambar_gedung']['name'];
        $fileTmp = $_FILES['gambar_gedung']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $gambar_gedung = "sejarah_" . time() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $gambar_gedung);
        if (file_exists($path . $data['gambar_gedungOld']) && $data['gambar_gedungOld'] != "") {
          unlink($path . $data['gambar_gedungOld']);
        }
      }

      $sql = "UPDATE sejarah SET 
                judul='$data[judul]', 
                konten='$konten', 
                gambar_gedung='$gambar_gedung'
                WHERE id='$data[id]'";
    }

    if ($action == "delete") {
      $query = mysqli_query($conn, "SELECT gambar_gedung FROM sejarah WHERE id='$data[id]'");
      $row = mysqli_fetch_assoc($query);
      if (file_exists($path . $row['gambar_gedung']) && $row['gambar_gedung'] != "") {
        unlink($path . $row['gambar_gedung']);
      }

      $sql = "DELETE FROM sejarah WHERE id='$data[id]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function visi_misi($conn, $data, $action, $visi, $misi, $tujuan_sekolah, $id_user)
  {
    if ($action == "insert") {
      $sql = "INSERT INTO visi_misi(visi, misi, tujuan_sekolah, id_user) 
                VALUES('$visi', '$misi', '$tujuan_sekolah', '$id_user')";
    }

    if ($action == "update") {
      $sql = "UPDATE visi_misi SET 
                visi='$visi', 
                misi='$misi', 
                tujuan_sekolah='$tujuan_sekolah'
                WHERE id='$data[id]'";
    }

    if ($action == "delete") {
      $sql = "DELETE FROM visi_misi WHERE id='$data[id]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function guru_staff($conn, $data, $action, $id_user)
  {
    $path = "../../assets/img/guru_staff/";

    $urutan = (int)$data['urutan'];
    $jabatan_otomatis = "";
    if ($urutan == 1) {
      $jabatan_otomatis = "Kepala Sekolah";
    } elseif ($urutan == 2) {
      $jabatan_otomatis = "Wakil Kepala Sekolah";
    } elseif ($urutan == 3) {
      $jabatan_otomatis = "Staff";
    } else {
      $jabatan_otomatis = "Guru Mata Pelajaran";
    }

    if ($action == "insert") {
      if (!empty($data['nip'])) {
        $checkNip = mysqli_query($conn, "SELECT * FROM guru_staff WHERE nip = '$data[nip]'");
        if (mysqli_num_rows($checkNip) > 0) {
          return false;
        }
      }
      $foto = "default_guru.jpg";
      if (!empty($_FILES['foto']['name'])) {
        $fileName = $_FILES['foto']['name'];
        $fileTmp = $_FILES['foto']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $foto = "guru_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $foto);
      }
      $sql = "INSERT INTO guru_staff(nama, nip, jabatan_atau_mapel, foto, jenis_kelamin, urutan, id_user) 
                VALUES('$data[nama]', '$data[nip]', '$jabatan_otomatis', '$foto', '$data[jenis_kelamin]', '$data[urutan]', '$id_user')";
    }

    if ($action == "update") {
      if (!empty($data['nip']) && $data['nip'] !== $data['nipOld']) {
        $checkNip = mysqli_query($conn, "SELECT * FROM guru_staff WHERE nip = '$data[nip]'");
        if (mysqli_num_rows($checkNip) > 0) {
          return false;
        }
      }
      $foto = $data['fotoOld'];
      if (!empty($_FILES['foto']['name'])) {
        $fileName = $_FILES['foto']['name'];
        $fileTmp = $_FILES['foto']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $foto = "guru_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $foto);
        if (file_exists($path . $data['fotoOld']) && $data['fotoOld'] != "default_guru.jpg" && $data['fotoOld'] != "") {
          unlink($path . $data['fotoOld']);
        }
      }
      $sql = "UPDATE guru_staff SET 
                nama='$data[nama]', 
                nip='$data[nip]', 
                jabatan_atau_mapel='$jabatan_otomatis', 
                foto='$foto', 
                jenis_kelamin='$data[jenis_kelamin]', 
                urutan='$data[urutan]'
                WHERE id='$data[id]'";
    }

    if ($action == "delete") {
      $query = mysqli_query($conn, "SELECT foto FROM guru_staff WHERE id='$data[id]'");
      $row = mysqli_fetch_assoc($query);
      if (file_exists($path . $row['foto']) && $row['foto'] != "default_guru.jpg" && $row['foto'] != "") {
        unlink($path . $row['foto']);
      }
      $sql = "DELETE FROM guru_staff WHERE id='$data[id]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function fasilitas($conn, $data, $action, $deskripsi, $id_user)
  {
    $path = "../../assets/img/fasilitas/";

    if ($action == "insert") {
      $gambar_fasilitas = "";
      if (!empty($_FILES['gambar_fasilitas']['name'])) {
        $fileName = $_FILES['gambar_fasilitas']['name'];
        $fileTmp = $_FILES['gambar_fasilitas']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $gambar_fasilitas = "fasilitas_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $gambar_fasilitas);
      } else {
        $gambar_fasilitas = "default_fasilitas.jpg";
      }
      $sql = "INSERT INTO fasilitas(nama_fasilitas, deskripsi, gambar_fasilitas, id_user) 
                VALUES('$data[nama_fasilitas]', '$deskripsi', '$gambar_fasilitas', '$id_user')";
    }

    if ($action == "update") {
      $gambar_fasilitas = $data['gambar_fasilitasOld'];
      if (!empty($_FILES['gambar_fasilitas']['name'])) {
        $fileName = $_FILES['gambar_fasilitas']['name'];
        $fileTmp = $_FILES['gambar_fasilitas']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $gambar_fasilitas = "fasilitas_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $gambar_fasilitas);
        if (file_exists($path . $data['gambar_fasilitasOld']) && $data['gambar_fasilitasOld'] != "default_fasilitas.jpg" && $data['gambar_fasilitasOld'] != "") {
          unlink($path . $data['gambar_fasilitasOld']);
        }
      }
      $sql = "UPDATE fasilitas SET 
                nama_fasilitas='$data[nama_fasilitas]', 
                deskripsi='$deskripsi', 
                gambar_fasilitas='$gambar_fasilitas'
                WHERE id='$data[id]'";
    }

    if ($action == "delete") {
      $query = mysqli_query($conn, "SELECT gambar_fasilitas FROM fasilitas WHERE id='$data[id]'");
      $row = mysqli_fetch_assoc($query);
      if (file_exists($path . $row['gambar_fasilitas']) && $row['gambar_fasilitas'] != "default_fasilitas.jpg" && $row['gambar_fasilitas'] != "") {
        unlink($path . $row['gambar_fasilitas']);
      }
      $sql = "DELETE FROM fasilitas WHERE id='$data[id]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  // ==================================================
  // BAGIAN 2: MENU AKADEMIK (Relasi ke Users)
  // ==================================================

  function info_kurikulum($conn, $data, $action, $deskripsi_umum, $id_user)
  {
    if ($action == "insert") {
      $sql = "INSERT INTO info_kurikulum(judul, deskripsi_umum, tahun_ajaran, id_user) 
                VALUES('$data[judul]', '$deskripsi_umum', '$data[tahun_ajaran]', '$id_user')";
    }

    if ($action == "update") {
      $sql = "UPDATE info_kurikulum SET 
                judul='$data[judul]', 
                deskripsi_umum='$deskripsi_umum', 
                tahun_ajaran='$data[tahun_ajaran]'
                WHERE id='$data[id]'";
    }

    if ($action == "delete") {
      $sql = "DELETE FROM info_kurikulum WHERE id='$data[id]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function jurusan($conn, $data, $action, $deskripsi, $id_user)
  {
    $path = "../../assets/img/jurusan/";

    if ($action == "insert") {
      $ikon_atau_gambar = "default_jurusan.jpg";
      if (!empty($_FILES['ikon_atau_gambar']['name'])) {
        $fileName = $_FILES['ikon_atau_gambar']['name'];
        $fileTmp = $_FILES['ikon_atau_gambar']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $ikon_atau_gambar = "jurusan_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $ikon_atau_gambar);
      }
      $sql = "INSERT INTO jurusan(nama_jurusan, deskripsi, ikon_atau_gambar, id_user) 
                VALUES('$data[nama_jurusan]', '$deskripsi', '$ikon_atau_gambar', '$id_user')";
    }

    if ($action == "update") {
      $ikon_atau_gambar = $data['ikon_atau_gambarOld'];
      if (!empty($_FILES['ikon_atau_gambar']['name'])) {
        $fileName = $_FILES['ikon_atau_gambar']['name'];
        $fileTmp = $_FILES['ikon_atau_gambar']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $ikon_atau_gambar = "jurusan_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $ikon_atau_gambar);
        if (file_exists($path . $data['ikon_atau_gambarOld']) && $data['ikon_atau_gambarOld'] != "default_jurusan.jpg" && $data['ikon_atau_gambarOld'] != "") {
          unlink($path . $data['ikon_atau_gambarOld']);
        }
      }
      $sql = "UPDATE jurusan SET 
                nama_jurusan='$data[nama_jurusan]', 
                deskripsi='$deskripsi', 
                ikon_atau_gambar='$ikon_atau_gambar'
                WHERE id='$data[id]'";
    }

    if ($action == "delete") {
      $query = mysqli_query($conn, "SELECT ikon_atau_gambar FROM jurusan WHERE id='$data[id]'");
      $row = mysqli_fetch_assoc($query);
      if (file_exists($path . $row['ikon_atau_gambar']) && $row['ikon_atau_gambar'] != "default_jurusan.jpg" && $row['ikon_atau_gambar'] != "") {
        unlink($path . $row['ikon_atau_gambar']);
      }
      $sql = "DELETE FROM jurusan WHERE id='$data[id]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function kalender_akademik($conn, $data, $action, $id_user)
  {
    if ($action == "insert") {
      $sql = "INSERT INTO kalender_akademik(nama_kegiatan, tanggal_mulai, tanggal_selesai, keterangan, id_user) 
                VALUES('$data[nama_kegiatan]', '$data[tanggal_mulai]', '$data[tanggal_selesai]', '$data[keterangan]', '$id_user')";
    }

    if ($action == "update") {
      $sql = "UPDATE kalender_akademik SET 
                nama_kegiatan='$data[nama_kegiatan]', 
                tanggal_mulai='$data[tanggal_mulai]', 
                tanggal_selesai='$data[tanggal_selesai]', 
                keterangan='$data[keterangan]'
                WHERE id='$data[id]'";
    }

    if ($action == "delete") {
      $sql = "DELETE FROM kalender_akademik WHERE id='$data[id]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  // ==================================================
  // BAGIAN 3: MENU KESISWAAN (Relasi ke Users)
  // ==================================================

  function ekstrakurikuler($conn, $data, $action, $deskripsi_kegiatan, $id_user)
  {
    $path = "../../assets/img/ekstrakurikuler/";

    if ($action == "insert") {
      $foto_kegiatan = "default_ekskul.jpg";
      if (!empty($_FILES['foto_kegiatan']['name'])) {
        $fileName = $_FILES['foto_kegiatan']['name'];
        $fileTmp = $_FILES['foto_kegiatan']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $foto_kegiatan = "ekskul_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $foto_kegiatan);
      }
      $sql = "INSERT INTO ekstrakurikuler(nama_ekskul, nama_pembina, jadwal_latihan, deskripsi_kegiatan, foto_kegiatan, id_user) 
                VALUES('$data[nama_ekskul]', '$data[nama_pembina]', '$data[jadwal_latihan]', '$deskripsi_kegiatan', '$foto_kegiatan', '$id_user')";
    }

    if ($action == "update") {
      $foto_kegiatan = $data['foto_kegiatanOld'];
      if (!empty($_FILES['foto_kegiatan']['name'])) {
        $fileName = $_FILES['foto_kegiatan']['name'];
        $fileTmp = $_FILES['foto_kegiatan']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $foto_kegiatan = "ekskul_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $foto_kegiatan);
        if (file_exists($path . $data['foto_kegiatanOld']) && $data['foto_kegiatanOld'] != "default_ekskul.jpg" && $data['foto_kegiatanOld'] != "") {
          unlink($path . $data['foto_kegiatanOld']);
        }
      }
      $sql = "UPDATE ekstrakurikuler SET 
                nama_ekskul='$data[nama_ekskul]', 
                nama_pembina='$data[nama_pembina]', 
                jadwal_latihan='$data[jadwal_latihan]', 
                deskripsi_kegiatan='$deskripsi_kegiatan', 
                foto_kegiatan='$foto_kegiatan'
                WHERE id='$data[id]'";
    }

    if ($action == "delete") {
      $query = mysqli_query($conn, "SELECT foto_kegiatan FROM ekstrakurikuler WHERE id='$data[id]'");
      $row = mysqli_fetch_assoc($query);
      if (file_exists($path . $row['foto_kegiatan']) && $row['foto_kegiatan'] != "default_ekskul.jpg" && $row['foto_kegiatan'] != "") {
        unlink($path . $row['foto_kegiatan']);
      }
      $sql = "DELETE FROM ekstrakurikuler WHERE id='$data[id]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function osis($conn, $data, $action, $id_user)
  {
    $path = "../../assets/img/osis/";

    if ($action == "insert") {
      $foto_siswa = "default_osis.jpg";
      if (!empty($_FILES['foto_siswa']['name'])) {
        $fileName = $_FILES['foto_siswa']['name'];
        $fileTmp = $_FILES['foto_siswa']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $foto_siswa = "osis_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $foto_siswa);
      }
      $sql = "INSERT INTO osis(nama_siswa, jabatan, periode, foto_siswa, id_user) 
                VALUES('$data[nama_siswa]', '$data[jabatan]', '$data[periode]', '$foto_siswa', '$id_user')";
    }

    if ($action == "update") {
      $foto_siswa = $data['foto_siswaOld'];
      if (!empty($_FILES['foto_siswa']['name'])) {
        $fileName = $_FILES['foto_siswa']['name'];
        $fileTmp = $_FILES['foto_siswa']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $foto_siswa = "osis_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $foto_siswa);
        if (file_exists($path . $data['foto_siswaOld']) && $data['foto_siswaOld'] != "default_osis.jpg" && $data['foto_siswaOld'] != "") {
          unlink($path . $data['foto_siswaOld']);
        }
      }

      $sql = "UPDATE osis SET 
                nama_siswa='$data[nama_siswa]', 
                jabatan='$data[jabatan]', 
                periode='$data[periode]', 
                foto_siswa='$foto_siswa'
                WHERE id='$data[id]'";
    }

    if ($action == "delete") {
      $query = mysqli_query($conn, "SELECT foto_siswa FROM osis WHERE id='$data[id]'");
      $row = mysqli_fetch_assoc($query);
      if (file_exists($path . $row['foto_siswa']) && $row['foto_siswa'] != "default_osis.jpg" && $row['foto_siswa'] != "") {
        unlink($path . $row['foto_siswa']);
      }
      $sql = "DELETE FROM osis WHERE id='$data[id]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function prestasi($conn, $data, $action, $id_user)
  {
    $path = "../../assets/img/prestasi/";

    if ($action == "insert") {
      $foto_penyerahan = "default_prestasi.jpg";
      if (!empty($_FILES['foto_penyerahan']['name'])) {
        $fileName = $_FILES['foto_penyerahan']['name'];
        $fileTmp = $_FILES['foto_penyerahan']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $foto_penyerahan = "prestasi_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $foto_penyerahan);
      }
      $sql = "INSERT INTO prestasi(nama_lomba, nama_juara, peringkat, tingkat, tahun, foto_penyerahan, id_user) 
                VALUES('$data[nama_lomba]', '$data[nama_juara]', '$data[peringkat]', '$data[tingkat]', '$data[tahun]', '$foto_penyerahan', '$id_user')";
    }

    if ($action == "update") {
      $foto_penyerahan = $data['foto_penyerahanOld'];
      if (!empty($_FILES['foto_penyerahan']['name'])) {
        $fileName = $_FILES['foto_penyerahan']['name'];
        $fileTmp = $_FILES['foto_penyerahan']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $foto_penyerahan = "prestasi_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $foto_penyerahan);
        if (file_exists($path . $data['foto_penyerahanOld']) && $data['foto_penyerahanOld'] != "default_prestasi.jpg" && $data['foto_penyerahanOld'] != "") {
          unlink($path . $data['foto_penyerahanOld']);
        }
      }
      $sql = "UPDATE prestasi SET 
                nama_lomba='$data[nama_lomba]', 
                nama_juara='$data[nama_juara]', 
                peringkat='$data[peringkat]', 
                tingkat='$data[tingkat]', 
                tahun='$data[tahun]', 
                foto_penyerahan='$foto_penyerahan'
                WHERE id='$data[id]'";
    }

    if ($action == "delete") {
      $query = mysqli_query($conn, "SELECT foto_penyerahan FROM prestasi WHERE id='$data[id]'");
      $row = mysqli_fetch_assoc($query);
      if (file_exists($path . $row['foto_penyerahan']) && $row['foto_penyerahan'] != "default_prestasi.jpg" && $row['foto_penyerahan'] != "") {
        unlink($path . $row['foto_penyerahan']);
      }
      $sql = "DELETE FROM prestasi WHERE id='$data[id]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  // ==================================================
  // BAGIAN 5: MENU GALERI (Relasi Berjenjang)
  // ==================================================

  function album($conn, $data, $action, $id_user)
  {
    $path = "../../assets/img/album/";

    if ($action == "insert") {
      $cover_album = "default_album.jpg";
      if (!empty($_FILES['cover_album']['name'])) {
        $fileName = $_FILES['cover_album']['name'];
        $fileTmp = $_FILES['cover_album']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $cover_album = "album_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $cover_album);
      }
      $sql = "INSERT INTO album(nama_album, keterangan, cover_album, id_user) 
                VALUES('$data[nama_album]', '$data[keterangan]', '$cover_album', '$id_user')";
    }

    if ($action == "update") {
      $cover_album = $data['cover_albumOld'];
      if (!empty($_FILES['cover_album']['name'])) {
        $fileName = $_FILES['cover_album']['name'];
        $fileTmp = $_FILES['cover_album']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $cover_album = "album_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $cover_album);
        if (file_exists($path . $data['cover_albumOld']) && $data['cover_albumOld'] != "default_album.jpg" && $data['cover_albumOld'] != "") {
          unlink($path . $data['cover_albumOld']);
        }
      }
      $sql = "UPDATE album SET 
                nama_album='$data[nama_album]', 
                keterangan='$data[keterangan]', 
                cover_album='$cover_album'
                WHERE id='$data[id]'";
    }

    if ($action == "delete") {
      $query = mysqli_query($conn, "SELECT cover_album FROM album WHERE id='$data[id]'");
      $row = mysqli_fetch_assoc($query);
      if (file_exists($path . $row['cover_album']) && $row['cover_album'] != "default_album.jpg" && $row['cover_album'] != "") {
        unlink($path . $row['cover_album']);
      }
      $sql = "DELETE FROM album WHERE id='$data[id]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function foto($conn, $data, $action)
  {
    $path = "../../assets/img/album/";

    if ($action == "insert") {
      $file_foto = "";
      if (!empty($_FILES['file_foto']['name'])) {
        $fileName = $_FILES['file_foto']['name'];
        $fileTmp = $_FILES['file_foto']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $file_foto = "foto_" . $data['id_album'] . "_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $file_foto);
      }
      $sql = "INSERT INTO foto(id_album, file_foto, caption) 
                VALUES('$data[id_album]', '$file_foto', '$data[caption]')";
    }

    if ($action == "delete") {
      $query = mysqli_query($conn, "SELECT file_foto FROM foto WHERE id='$data[id]'");
      $row = mysqli_fetch_assoc($query);
      if (file_exists($path . $row['file_foto']) && $row['file_foto'] != "") {
        unlink($path . $row['file_foto']);
      }
      $sql = "DELETE FROM foto WHERE id='$data[id]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }


  // ==================================================
  // BAGIAN 4: MENU BERITA (Relasi Antar Tabel & Users)
  // ==================================================

  function kategori_berita($conn, $data, $action, $id_user)
  {
    if ($action == "insert") {
      $sql = "INSERT INTO kategori_berita(nama_kategori, id_user) 
                VALUES('$data[nama_kategori]', '$id_user')";
    }

    if ($action == "update") {
      $sql = "UPDATE kategori_berita SET 
                nama_kategori='$data[nama_kategori]'
                WHERE id='$data[id]'";
    }

    if ($action == "delete") {
      $sql = "DELETE FROM kategori_berita WHERE id='$data[id]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function berita($conn, $data, $action, $isi_berita, $id_user)
  {
    $path = "../../assets/img/berita/";

    if (isset($data['judul'])) {
      $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['judul'])));
    }

    if ($action == "insert") {
      $gambar_utama = "default_berita.jpg";
      if (!empty($_FILES['gambar_utama']['name'])) {
        $fileName = $_FILES['gambar_utama']['name'];
        $fileTmp = $_FILES['gambar_utama']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $gambar_utama = "berita_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $gambar_utama);
      }
      $sql = "INSERT INTO berita(judul, slug, isi_berita, gambar_utama, id_kategori, id_user) 
                VALUES('$data[judul]', '$slug', '$isi_berita', '$gambar_utama', '$data[id_kategori]', '$id_user')";
    }

    if ($action == "update") {
      $gambar_utama = $data['gambar_utamaOld'];
      if (!empty($_FILES['gambar_utama']['name'])) {
        $fileName = $_FILES['gambar_utama']['name'];
        $fileTmp = $_FILES['gambar_utama']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $gambar_utama = "berita_" . time() . "_" . uniqid() . "." . $fileExt;
        move_uploaded_file($fileTmp, $path . $gambar_utama);
        if (file_exists($path . $data['gambar_utamaOld']) && $data['gambar_utamaOld'] != "default_berita.jpg" && $data['gambar_utamaOld'] != "") {
          unlink($path . $data['gambar_utamaOld']);
        }
      }
      $sql = "UPDATE berita SET 
                judul='$data[judul]', 
                slug='$slug', 
                isi_berita='$isi_berita', 
                gambar_utama='$gambar_utama', 
                id_kategori='$data[id_kategori]'
                WHERE id='$data[id]'";
    }

    if ($action == "delete") {
      $query = mysqli_query($conn, "SELECT gambar_utama FROM berita WHERE id='$data[id]'");
      $row = mysqli_fetch_assoc($query);
      if (file_exists($path . $row['gambar_utama']) && $row['gambar_utama'] != "default_berita.jpg" && $row['gambar_utama'] != "") {
        unlink($path . $row['gambar_utama']);
      }
      $sql = "DELETE FROM berita WHERE id='$data[id]'";
    }
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  // ==================================================
  // BAGIAN 5: PESAN KONTAK
  // ==================================================

  function pesan_kontak($conn, $data, $action)
  {
    if ($action == "delete") {
      $sql = "DELETE FROM pesan_kontak WHERE id='$data[id]'";
      mysqli_query($conn, $sql);
      return mysqli_affected_rows($conn);
    }

    return 0;
  }

  // ==================================================
  // BAGIAN 6: PPDB
  // ==================================================

  function upload_banner_ppdb()
  {
    $namaFile = $_FILES['gambar_banner']['name'];
    $ukuranFile = $_FILES['gambar_banner']['size'];
    $error = $_FILES['gambar_banner']['error'];
    $tmpName = $_FILES['gambar_banner']['tmp_name'];
    if ($error === 4) {
      return 'default.jpg';
    }
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "<script>alert('Yang anda upload bukan gambar!');</script>";
      return false;
    }
    if ($ukuranFile > 2000000) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
      return false;
    }
    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
    move_uploaded_file($tmpName, '../../assets/img/ppdb/' . $namaFileBaru);
    return $namaFileBaru;
  }

  function upload_icon_alur()
  {
    $namaFile = $_FILES['gambar_icon']['name'];
    $tmpName = $_FILES['gambar_icon']['tmp_name'];
    if ($_FILES['gambar_icon']['error'] === 4) {
      return 'default_icon.png';
    }
    $ekstensiValid = ['jpg', 'jpeg', 'png', 'svg'];
    $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    if (!in_array($ekstensi, $ekstensiValid)) {
      return false;
    }
    $namaFileBaru = uniqid() . '.' . $ekstensi;
    move_uploaded_file($tmpName, '../../assets/img/icon/' . $namaFileBaru);
    return $namaFileBaru;
  }

  function upload_file_brosur()
  {
    $namaFile = $_FILES['nama_file']['name'];
    $ukuranFile = $_FILES['nama_file']['size'];
    $tmpName = $_FILES['nama_file']['tmp_name'];
    $ekstensiValid = ['pdf', 'jpg', 'jpeg', 'png'];
    $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    if (!in_array($ekstensi, $ekstensiValid)) {
      echo "<script>alert('Format file harus PDF atau Gambar!');</script>";
      return false;
    }
    if ($ukuranFile > 5000000) {
      echo "<script>alert('Ukuran file terlalu besar (Max 5MB)!');</script>";
      return false;
    }
    $namaFileBaru = date('Ymd') . '_' . uniqid() . '.' . $ekstensi;
    move_uploaded_file($tmpName, '../../assets/files/' . $namaFileBaru);
    return $namaFileBaru;
  }

  function info_ppdb($conn, $data, $action, $deskripsi)
  {
    if ($action == "insert") {
      $gambar = upload_banner_ppdb();
      if (!$gambar) return false;
      $sql = "INSERT INTO info_ppdb (judul, deskripsi, tanggal_buka, tanggal_tutup, status, gambar_banner, is_active) 
                VALUES ('$data[judul]', '$deskripsi', '$data[tanggal_buka]', '$data[tanggal_tutup]', '$data[status]', '$gambar', '$data[is_active]')";
      mysqli_query($conn, $sql);
      return mysqli_affected_rows($conn);
    } elseif ($action == "update") {
      $gambar = upload_banner_ppdb();
      if ($_FILES['gambar_banner']['error'] === 4) {
        $gambar = $data['gambar_bannerOld'];
      } else {
        if ($data['gambar_bannerOld'] != 'default.jpg' && file_exists('../../assets/img/ppdb/' . $data['gambar_bannerOld'])) {
          unlink('../../assets/img/ppdb/' . $data['gambar_bannerOld']);
        }
      }
      $sql = "UPDATE info_ppdb SET 
                judul = '$data[judul]',
                deskripsi = '$deskripsi',
                tanggal_buka = '$data[tanggal_buka]',
                tanggal_tutup = '$data[tanggal_tutup]',
                status = '$data[status]',
                gambar_banner = '$gambar',
                is_active = '$data[is_active]'
                WHERE id = '$data[id]'";
      mysqli_query($conn, $sql);
      return mysqli_affected_rows($conn);
    } elseif ($action == "delete") {
      $query = mysqli_query($conn, "SELECT gambar_banner FROM info_ppdb WHERE id = '$data[id]'");
      $file = mysqli_fetch_assoc($query);
      if ($file['gambar_banner'] != 'default.jpg' && file_exists('../../assets/img/ppdb/' . $file['gambar_banner'])) {
        unlink('../../assets/img/ppdb/' . $file['gambar_banner']);
      }
      $sql = "DELETE FROM info_ppdb WHERE id = '$data[id]'";
      mysqli_query($conn, $sql);
      return mysqli_affected_rows($conn);
    }
  }

  function alur_ppdb($conn, $data, $action, $deskripsi)
  {
    if ($action == "insert") {
      $icon = upload_icon_alur();
      if (!$icon) return false;
      $sql = "INSERT INTO alur_ppdb (judul_langkah, deskripsi, urutan, gambar_icon) 
                VALUES ('$data[judul_langkah]', '$deskripsi', '$data[urutan]', '$icon')";
      mysqli_query($conn, $sql);
      return mysqli_affected_rows($conn);
    } elseif ($action == "update") {
      $icon = upload_icon_alur();
      if ($_FILES['gambar_icon']['error'] === 4) {
        $icon = $data['gambar_iconOld'];
      } else {
        if ($data['gambar_iconOld'] != 'default_icon.png' && file_exists('../../assets/img/icon/' . $data['gambar_iconOld'])) {
          unlink('../../assets/img/icon/' . $data['gambar_iconOld']);
        }
      }
      $sql = "UPDATE alur_ppdb SET 
                judul_langkah = '$data[judul_langkah]',
                deskripsi = '$deskripsi',
                urutan = '$data[urutan]',
                gambar_icon = '$icon'
                WHERE id = '$data[id]'";
      mysqli_query($conn, $sql);
      return mysqli_affected_rows($conn);
    } elseif ($action == "delete") {
      $query = mysqli_query($conn, "SELECT gambar_icon FROM alur_ppdb WHERE id = '$data[id]'");
      $file = mysqli_fetch_assoc($query);
      if ($file['gambar_icon'] != 'default_icon.png' && file_exists('../../assets/img/icon/' . $file['gambar_icon'])) {
        unlink('../../assets/img/icon/' . $file['gambar_icon']);
      }
      $sql = "DELETE FROM alur_ppdb WHERE id = '$data[id]'";
      mysqli_query($conn, $sql);
      return mysqli_affected_rows($conn);
    }
  }

  function brosur_ppdb($conn, $data, $action)
  {
    if ($action == "insert") {
      $file = upload_file_brosur();
      if (!$file) return false;
      $size_bytes = $_FILES['nama_file']['size'];
      $ukuran_file = round($size_bytes / 1024 / 1024, 2) . ' MB';
      $sql = "INSERT INTO brosur_ppdb (judul_file, nama_file, ukuran_file) 
                VALUES ('$data[judul_file]', '$file', '$ukuran_file')";
      mysqli_query($conn, $sql);
      return mysqli_affected_rows($conn);
    } elseif ($action == "delete") {
      $query = mysqli_query($conn, "SELECT nama_file FROM brosur_ppdb WHERE id = '$data[id]'");
      $file_db = mysqli_fetch_assoc($query);
      if (file_exists('../../assets/files/' . $file_db['nama_file'])) {
        unlink('../../assets/files/' . $file_db['nama_file']);
      }
      $sql = "DELETE FROM brosur_ppdb WHERE id = '$data[id]'";
      mysqli_query($conn, $sql);
      return mysqli_affected_rows($conn);
    }
  }

  function __name($conn, $data, $action)
  {
    if ($action == "insert") {
    }

    if ($action == "update") {
    }

    if ($action == "delete") {
    }

    // mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }
}
