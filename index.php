<!DOCTYPE html>
<head>

  <?php
      require 'vendor/autoload.php';
      $instance_id = @file_get_contents("http://instance-data/latest/meta-data/instance-id");
      $az = @file_get_contents("http://instance-data/latest/meta-data/placement/availability-zone");
      $uptime = exec('uptime -s')    
  ?>

	<title>
    <?php echo $instance_id ?>
  </title>
	<style>
body {
  background-color: black;
  background-image: radial-gradient(
    rgba(0, 150, 0, 0.75), black 120%
  );
  height: 100vh;
  margin: 0;
  overflow: hidden;
  padding: 2rem;
  color: white;
  font: 1.3rem Inconsolata, monospace;
  text-shadow: 0 0 5px #C8C8C8;
  &::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: repeating-linear-gradient(
      0deg,
      rgba(black, 0.15),
      rgba(black, 0.15) 1px,
      transparent 1px,
      transparent 2px
    );
    pointer-events: none;
  }
}
::selection {
  background: #0080FF;
  text-shadow: none;
}
pre {
  margin: 0;
}

	</style>
</head>
<body>
	<?php 
    echo 'While this is going to be parsed.';
    require 'vendor/autoload.php';
  ?>
    <pre>        
    Page:      index.php
    instance:  <?php echo $instance_id ?> 
    az:        <?php echo $az ?> 
    Uptime:    <?php echo $uptime ?> 
    Load time: 123

    Time: 1337ms
    </pre>
</body>
</html>