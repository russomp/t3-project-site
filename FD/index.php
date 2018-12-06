<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
  <title>Final Deliverables</title>
</head>

<body>
  <nav class="navbar is-fixed-top is-transparent">
    <div class="navbar-brand">
      <a class="navbar-item" href="/">
        <img src="../assets/img/t3-nav-logo.png" alt="Team 03 logo">
      </a>
      <div class="navbar-burger burger" data-target="main-navbar">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div id="main-navbar" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="../">
          Home
        </a>
        <a class="navbar-item" href="../#project-details">
          About
        </a>
        <a class="navbar-item" href="../#client-details">
          Clients
        </a>
        <a class="navbar-item" href="../#team-details">
          Team
        </a>
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link" href="#">
            Docs
          </a>
          <div class="navbar-dropdown is-boxed">
            <a class="navbar-item" href="../PR/">
              Progress reports
            </a>
            <a class="navbar-item" href="../CMN/">
              Meeting notes
            </a>
            <a class="navbar-item" href="../Exploration/">
              Exploration docs
            </a>
            <a class="navbar-item" href="../Valuation/">
              Valuation docs
            </a>
            <a class="navbar-item" href="../Foundations/">
              Foundations docs
            </a>
            <a class="navbar-item" href="../Development/">
              Development docs
            </a>
            <a class="navbar-item" href="../CodeReview/">
              Code Review
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" href="../FD/">
              Final deliverable
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <section id="project-details" class="hero is-fullheight">
    <div class="hero-body">
      <div class="container">
        <table class="table sortable">
          <thead>
            <tr>
              <th>Filename</th>
              <th>Type</th>
              <th>Size <small>(bytes)</small></th>
              <th>Date Modified</th>
            </tr>
          </thead>
          <tbody>
          <?php
  // Opens directory
  $myDirectory=opendir(".");
  
  // Gets each entry
  while($entryName=readdir($myDirectory)) {
    $dirArray[]=$entryName;
  }
  
  // Finds extensions of files
  function findexts ($filename) {
    $filename=strtolower($filename);
    $exts=explode("[/\\.]", $filename);
    $n=count($exts)-1;
    $exts=$exts[$n];
    return $exts;
  }
  
  // Closes directory
  closedir($myDirectory);
  
  // Counts elements in array
  $indexCount=count($dirArray);
  
  // Sorts files
  sort($dirArray);
  
  // Loops through the array of files
  for($index=0; $index < $indexCount; $index++) {
  
    // Allows ./?hidden to show hidden files
    if($_SERVER['QUERY_STRING']=="hidden") {
      $hide="";
      $ahref="./";
      $atext="Hide";
    } else {
      $hide=".";
      $ahref="./?hidden";
      $atext="Show";
    }
    
    if(substr("$dirArray[$index]", 0, 1) != $hide) {
    
      // Gets File Names
      $name=$dirArray[$index];
      $namehref=$dirArray[$index];
      
      // Gets Extensions 
      $extn=findexts($dirArray[$index]); 
      
      // Gets file size 
      $size=number_format(filesize($dirArray[$index]));
      
      // Gets Date Modified Data
      $modtime=date("M j Y g:i A", filemtime($dirArray[$index]));
      $timekey=date("YmdHis", filemtime($dirArray[$index]));
      
      // Prettifies File Types, add more to suit your needs.
      switch ($extn){
        case "php": $extn="php"; break;

        case "png": $extn="PNG Image"; break;
        case "jpg": $extn="JPEG Image"; break;
        case "svg": $extn="SVG Image"; break;
        case "gif": $extn="GIF Image"; break;
        
        case "txt": $extn="Text File"; break;
        case "log": $extn="Log File"; break;
        case "pdf": $extn="PDF Document"; break;
        
        case "zip": $extn="ZIP Archive"; break;
        case "mpp": $extn="Microsoft Project Plan"; break;
        
        default: $extn=strtoupper($extn)." File"; break;
      }
      
      // Separates directories
      if(is_dir($dirArray[$index])) {
        $extn="&lt;Directory&gt;"; 
        $size="&lt;Directory&gt;"; 
        $class="dir";
      } else {
        $class="file";
      }
      
      // Cleans up . and .. directories 
      if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;";}
      if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}

      // Print 'em
      if($extn!="php") {
        print("
        <tr class='$class'>
          <td><a href='./$namehref'>$name</a></td>
          <td>$extn</td>
          <td>$size</td>
          <td sorttable_customkey='$timekey'>$modtime</td>
        </tr>");
      }
    }
  }
?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</body>

</html>
