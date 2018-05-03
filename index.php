<?
    session_start();

    // instauro la connessione col db
    include "./webapi/wa_database.php"

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Codice Fiscale</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

<!--     <script src='https://www.google.com/recaptcha/api.js'></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-76460853-1', 'auto');
      ga('send', 'pageview');

    </script> -->

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/i18n/defaults-*.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="eupopup eupopup-top">

<section class="bg-primary">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll">CALCOLO CODICE FISCALE ONLINE</a>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h3>Calcola il tuo codice fiscale compilando con i dati corretti il form che è presente qui sotto. Ricordiamo che i dati non vengono in alcun modo salvati dal sito, nemmeno il codice fiscale generato.</h3>
            </div>
        </div>
    </div>
</section>

<?if(isset($_SESSION['s_cf'])){?>
    <div style="margin-top: 50px; float: left; width: 100%;"></div>
    <div class="container">
        <div class="row">
            <div class="alert alert-success text-center">
              <strong>Complimenti!</strong> Hai creato correttamente il tuo codice fiscale!
              <h1><strong><?echo $_SESSION['s_cf']?></strong></h1>
              <div style="margin-top: 30px; float: left; width: 100%;"></div>
              <a href="./webapi/wa_deletecf.php" class="btn btn-primary btn-l wow tada">Cancella codice fiscale <i class="fa fa-eraser"></i></a>
            </div>
        </div>
    </div>
    
<?}?>

<div style="margin-top: 50px; float: left; width: 100%;"></div>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 text-center">
            
            <form role="form" method="post" action="./webapi/wa_calcolacf.php">
              <div class="form-group">
                <label for="cognome">COGNOME</label>
                <input type="text" class="form-control" id="cognome" name="cognome">
              </div>
              <div class="form-group">
                <label for="nome">NOME</label>
                <input type="text" class="form-control" id="nome" name="nome">
              </div>
              <div class="form-group">
                <label for="pwd">DATA DI NASCITA</label>
                <div class="row">
                    <div class="col-lg-4 text-center">
                        <select class="form-control" name="giorno_nascita">
                            <?for ($i = 1; $i <= 31; $i++){?>
                                <option value="<?echo $i?>"><?echo $i?></option>
                            <?}?>
                        </select>
                    </div>
                    <div class="col-lg-4 text-center">
                        <select class="form-control" name="mese_nascita">
							<option value="1">Gennaio</option>
							<option value="2">Febbraio</option>
							<option value="3">Marzo</option>
							<option value="4">Aprile</option>
							<option value="5">Maggio</option>
							<option value="6">Giugno</option>
							<option value="7">Luglio</option>
							<option value="8">Agosto</option>
							<option value="9">Settembre</option>
							<option value="10">Ottobre</option>
							<option value="11">Novembre</option>
							<option value="12">Dicembre</option>
                        </select>
                    </div>
                    <div class="col-lg-4 text-center">
                        <select class="form-control" name="anno_nascita">
                            <?for ($i = 1900; $i <= date("Y"); $i++){?>
                                <option value="<?echo $i?>"><?echo $i?></option>
                            <?}?>
                        </select>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label for="pwd">SESSO</label>
                <select class="form-control" name="sesso">
                    <option value="M">Maschio</option>
                    <option value="F">Femmina</option>
                </select>
              </div>
              <div class="form-group">
                <label for="pwd">COMUNE DI NASCITA</label>
                <select class="form-control" data-live-search="true" name="cod_fisico">
                    <?
                        $query = "SELECT * FROM lista_comuni";

                        $res = $mysqli->query($query);

                        while($row = $res->fetch_array(MYSQL_ASSOC)){?>
                            <option value="<?echo $row['CodFisico']?>"><?echo $row['Comune']?> (<?echo $row['Provincia']?>)</option>
                        <?}?>
                </select>
                
                
                <div style="margin-top: 30px; float: left; width: 100%;"></div>

              <button type="submit" class="btn btn-primary wow tada">Calcola <i class="fa fa-fw fa-gavel"></i></button>
            </form>

        </div>
    </div>
</div>

</body>

</html>
