<?php
    /**
     * @author Stöger Florian D. M. (http://fdms.eu)
     * @license EUPL 1.1 (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf)
     * @copyright © (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf) Stöger Florian D. M. (http://fdms.eu)
     */
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Wikimedia OTRS release generator</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="//tools-static.wmflabs.org/cdnjs/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//tools-static.wmflabs.org/static/jquery-ui/1.11.1/jquery-ui.css">
    <script type="text/javascript" src="//tools-static.wmflabs.org/cdnjs/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="//tools-static.wmflabs.org/cdnjs/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
          $("#meta").popover({
              html:true,
          });
      });
    </script>
  </head>
  <body style="background: url('bg.png') no-repeat fixed right bottom;">
    <div class="container">
      <h1>Wikimedia OTRS release generator <small><a id="meta" tabindex="0" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="created and maintained by <a href='//meta.wikimedia.org/wiki/User:FDMS4' target='_blank'>FDMS</a><br />© (<a href='//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf' target='_blank'>EUPL 1.1</a>) <a href='http://fdms.eu' target='_blank'>Stöger Florian D. M.</a" style="color:#777;">stats</a></small></h1>
      <br />
      <?=date('Y')?> [ <a href="stats/<?=date('Y')?>.csv" target="_blank">source</a> ]
      <br /><br />
      <div class="col-md-7">
        <table class="table table-condensed">
          <tr>
            <th>date</th>
            <th>time visit began</th>
            <th>time release generated</th>
            <th>notes</th>
          </tr>
          <?php
            $stats = fopen("stats/" . date('Y') . ".csv", "r");
            while ($data = fgetcsv($stats, 40, ";")) {
              echo("<tr>");
              foreach ($data as $field) {
                echo("<td><p>$field</p></td>");
              }
              echo("</tr>");
            }
            fclose($stats);
          ?>
        </table>
      </div>
      <br />
    </div>
  </body>
</html>
