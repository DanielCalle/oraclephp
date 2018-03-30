<?php
  require "vendor/autoload.php";
  use Symfony\Component\Yaml\Yaml;

  $value = Yaml::parseFile('database.yml');

  conn = oci_connect($value['username'], $value['password', 'connection_string');
  if (!$conn) {
        $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  $stid = oci_parse($conn, 'SELECT * FROM employees');
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
  

