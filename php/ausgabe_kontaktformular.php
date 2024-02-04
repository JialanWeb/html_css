<!doctype html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Kontaktformular_ausgabe</title>
</head>
<body>

  <!--
  Datei muss über einen HTTP-Server aufgerufen und php Unterstützung bieten z.B. xampp

  Damit übermittelte Werte angezeigt werden können binden Sie diese Datei im Actionattribut ein:
  action="ausgabe.php"

  Dieses kleine Programmbeispiel beinhaltet keine Prüfung auf Mehrfachauswahl.
  Es wird somit immer nur der letzte value angezeigt wenn mehrfach der gleiche Wert für das name-Attribut verwendt wird.
  -->

  <?php
  #
  # declare(strict_types=1)
  #  Mit der direktive declare(strict_types=1) wird der strikte Modus aktiviert
  #  typecasting kann somit in den meisten Fällen unterbunden
  # bzw. zu bestimmten Datentypen erzwungen werden()
  ##

  /*
  mehrzeilliger
  kommentar
  */

  // einzeilliger Kommentar
  # einzeiliger kommentar


  # Zum weiteren testen entfernen Sie in der jeweiligen Zeile die //
  # (kommentarzeichen - einzeiliger kommentar)
  # kommentare die mit einer Raute # versehen sind sollten Sie nicht entfernen!
  # Variable deklarieren - Unsinnig -> Datentyp: undefined, Wert = NULL
  ##
  //$test;

  # Debugging mit der Methode var_dump() - zeigt informationen zu einer Variable an
  # https://www.php.net/manual/en/function.var-dump.php
  ##
  //var_dump($test);

  #
  # Variablen in PHP erhalten ihren Datentyp durch Wertzuweisung
  # und sind somit deklariert (Datentyp) und initalisiert(Wertzuweisung)
  #
  ##

  # Variable deklarieren und initialisieren
  # Beispiel mit unterschiedlichen Datentypen
  ##

  // $text = "Text";//Datentyp string (Zeichenkette)
  // $text='1'; //Datentyp integer (Ganzzahl)
  // $text='1.1'; //Datentyp float (Fließkommazahl)
  // $text=true; //Datentyp boolean (Wahrheitswert)

  # Debugging mit der Methode var_dump()
  ##

  // var_dump($text);

  #einfache Ausgabe mit echo
  ##

  /*
  echo "<p>Textabsatz mit php Ausgegeben</p>";
  */

  $formulardaten="";
  $methode="";
  $datei = "<p>Es wurde keine Datei übermittelt</p>";

  # Bei den Superglobalen Variable $_Post und $_GET handelt es sich im assoziative (benannte) arrays diese sind nicht über einen Array-index aufrufbar
  # https://www.php.net/manual/en/reserved.variables.get.php
  # https://www.php.net/manual/en/reserved.variables.post.php
  # https://www.php.net/manual/en/reserved.variables.files.php
  # https://www.php.net/manual/en/language.types.array.php

  # Kontrollstrukturen / Fallunterscheidungen mit if/elseif/else
  # https://www.php.net/manual/en/control-structures.if.php
  # https://www.php.net/manual/en/language.operators.php
  ##

  # wenn GET benutzt wurde und nicht leer ist
  if(isset($_GET) && !empty($_GET)){
    # https://www.php.net/manual/en/function.isset.php
    # https://www.php.net/manual/en/function.empty.php
    ##

    $methode="<h3>via GET erhalten</h3>";
    # wenn $_GET benutzt wurde und nicht leer ist
    $formulardaten=$_GET;
  }
  # wenn $_POST benutzt wurde und nicht leer ist
  else if(isset($_POST) && !empty($_POST)){

    $methode="<h3>via POST erhalten</h3>";
    # wenn $_POST benutzt wurde und nicht leer ist
    $formulardaten=$_POST;

    # $_FILES['file']  - entspricht dem Wert des Name-Attribut im Form
    if(!empty($_FILES) && $_FILES['file']['size'] != 0){
      $dateiname = "<li><b>dateiname:</b> ".$_FILES['file']['name'];
      $dateityp = "<li><b>dateityp:</b> ".$_FILES['file']['type'];
      $dateigroesse = "<li><b>dateigrösse:</b> ".$_FILES['file']['size']." bytes";
      $datei= "<h3>Übermittelte Datei:</h3><ul>".$dateiname."</li>".$dateityp."</li>".$dateigroesse."</li></ul>";
      }
      else{
      $datei="";
    }

  } else {
    # wenn nichts übermittelt wurde bzw. diese Datei direkt aufgerufen wurde
    $formulardaten="Du hast das script direkt ausgeführt bzw. aufgerufen.";
  }

  echo $methode;
  # ARRay rekursiv ausgeben
  var_dump($formulardaten);

  # Informationen zur Übermittelten Datei ausgeben
  # https://www.php.net/manual/en/function.echo.php
  echo $datei;

  ?>
 <br>
 <a href="../kontakt_formular.html">zurück zum Kontaktformular</a>

</body>
</html>
