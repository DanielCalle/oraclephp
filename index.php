<?php
    require 'settings.php';

  conn = oci_connect(USERNAME, PASSWORD, CONNECTION_STRING);
  if (!$conn) {
        $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  $stid = oci_parse($conn, readfile("borrar-BDejemplo.sql"));
  oci_execute($stid);

  $stid = oci_parse($conn, readfile("crear-BDejemplo.sql"));
  oci_execute($stid);

  $stid = oci_parse($conn, 'INSERT INTO Cliente VALUES (\'00000PHP\',\'Client PHP\',\'dire PHP\');');
  oci_execute($stid);

  $stid = oci_parse($conn, 'SELECT * FROM Cliente;');
  oci_execute($stid);

  echo "<table border='1'>\n";
  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>\n";
            foreach ($row as $item) {
                      echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "</td>\n";
                          }
            echo "</tr>\n";
  }
  echo "</table>\n";

  $stid = oci_parse($conn, 'UPDATE Cliente SET DNI=\'000000JS\' WHERE DNI = \'00000PHP\'');
  oci_execute($stid);

  $stid = oci_parse($conn, 'SELECT * FROM Cliente;');
  oci_execute($stid);

  echo "<table border='1'>\n";
  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>\n";
            foreach ($row as $item) {
                      echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "</td>\n";
                          }
            echo "</tr>\n";
  }
  echo "</table>\n";
    
  $stid = oci_parse($conn, 'DELETE FROM Cliente WHERE DNI = \'000000JS\'');
  oci_execute($stid);

  $stid = oci_parse($conn, 'SELECT * FROM Cliente;');
  oci_execute($stid);

  echo "<table border='1'>\n";
  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>\n";
            foreach ($row as $item) {
                      echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "</td>\n";
                          }
            echo "</tr>\n";
  }
  echo "</table>\n";
  
  

