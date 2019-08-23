<!DOCTYPE HTML>
<html lang="en">
  <head>
    <script async src="ping.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <title>Factorio Status</title>
    <meta charset="utf-8">
    <?php
      include 'Factorio.php';
    ?>
<meta http-equiv="refresh" content="30">
  </head>
  <body>
      <div>factorio.poli.fun <span id="ping-vps"></span></div>

              <meta name="application-name" content="netdata">

              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <meta name="apple-mobile-web-app-capable" content="yes">
              <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

              <meta property="og:locale" content="en_US" />
              <meta property="og:image" content="https://cloud.githubusercontent.com/assets/2662304/22945737/e98cd0c6-f2fd-11e6-96f1-5501934b0955.png"/>
              <meta property="og:url" content="http://my-netdata.io/"/>
              <meta property="og:type" content="website"/>
              <meta property="og:site_name" content="netdata"/>
              <meta property="og:title" content="netdata - real-time performance monitoring, done right!"/>
              <meta property="og:description" content="Stunning real-time dashboards, blazingly fast and extremely interactive. Zero configuration, zero dependencies, zero maintenance." />

          <script>
          // this section has to appear before loading dashboard.js

          // Select a theme.
          // uncomment on of the two themes:

          // var netdataTheme = 'default'; // this is white
          var netdataTheme = 'slate'; // this is dark


          // Set the default netdata server.
          // on charts without a 'data-host', this one will be used.
          // the default is the server that dashboard.js is downloaded from.

          // var netdataServer = 'http://my.server:19999/';
          </script>

          <!--
              Load dashboard.js

              to host this HTML file on your web server,
              you have to load dashboard.js from the netdata server.

              So, pick one the two below
              If you pick the first, set the server name/IP.

              The second assumes you host this file on /usr/share/netdata/web
              and that you have chown it to be owned by netdata:netdata
          -->
      <script type="text/javascript" src="http://vlpi01.poli.fun:19999/dashboard.js"></script>

          <script>
          // Set options for TV operation
          // This has to be done, after dashboard.js is loaded

          // destroy charts not shown (lowers memory on the browser)
          NETDATA.options.current.destroy_on_hide = true;

          // set this to false, to always show all dimensions
          NETDATA.options.current.eliminate_zero_dimensions = true;

          // lower the pressure on this browser
          NETDATA.options.current.concurrent_refreshes = false;

          // if the tv browser is too slow (a pi?)
          // set this to false
          NETDATA.options.current.parallel_refresher = true;

          // always update the charts, even if focus is lost
          // NETDATA.options.current.stop_updates_when_focus_is_lost = false;

          // Since you may render charts from many servers and any of them may
          // become offline for some time, the charts will break.
          // This will reload the page every RELOAD_EVERY minutes

          var RELOAD_EVERY = 5;
          setTimeout(function(){
              location.reload();
          }, RELOAD_EVERY * 60 * 1000);

          </script>

          <div style="width: 100%; text-align: center; display: inline-block;">

              <div style="width: 100%; height: 24vh; text-align: center; display: inline-block;">
                  <div style="width: 100%; height: calc(100% - 15px); text-align: center; display: inline-block;">
                      <br/>
                      <div data-netdata="system.cpu"
                              data-title="CPU usage of vlpi01.poli.fun"
                              data-chart-library="dygraph"
                              data-width="99%"
                              data-height="100%"
                              data-after="-300"
                              data-dygraph-valuerange="[0, 100]"
                              ></div>
                  </div>
              </div>


              <div style="width: 100%; height: 24vh; text-align: center; display: inline-block;">
                      <div data-netdata="system.io"
                              data-title="I/O on vlpi01.poli.fun"
                              data-common-max="io"
                              data-common-min="io"
                              data-chart-library="dygraph"
                              data-width="99%"
                              data-height="100%"
                              data-after="-300"
                              ></div>
                  </div>
              </div>


              <div style="width: 100%; height: 24vh; text-align: center; display: inline-block;">
                      <div data-netdata="system.net"
                              data-title="Network traffic on vlpi01.poli.fun"
                              data-common-max="ram"
                              data-common-min="ram"
                              data-chart-library="dygraph"
                              data-width="99%"
                              data-height="100%"
                              data-after="-300"
                              ></div>
                  </div>
              </div>
		<div style="width: 100%; height: 24vh; text-align: center; display: inline-block;">
                      <div data-netdata="system.ram"
                              data-title="Used RAM on vlpi01.poli.fun"
                              data-common-max="traffic"
                              data-common-min="traffic"
                              data-chart-library="dygraph"
                              data-width="99%"
                              data-height="100%"
                              data-after="-300"
                              ></div>
                  </div>
              </div>

    </body>
</html>
