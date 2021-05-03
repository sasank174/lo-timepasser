<?php
$temp = "";
if (isset($_SESSION["username"])) {
    $userdetails = mysqli_query($con,"SELECT * FROM users WHERE username='". $_SESSION['username'] ."'");
    $user = mysqli_fetch_array($userdetails);
    $temp = $user["username"];
    $profiledetails = explode(',', $user["friends"]);
}else {
    header("Location: login.php");
}
$sucess = "";

if (isset($_POST["accept"])) {
    $x3 = $_SESSION["friend"];
    $friendlist = $user["friends"] . ",$x3";
    $query = mysqli_query($con,"UPDATE users set friends='$friendlist' WHERE username='". $_SESSION['username'] ."'");
    header("refresh:1");
}


if (isset($_POST["post"])) {
    $username = $user["username"];
    $target = "public/images/posts/".basename($_FILES['image']['name']);
    $text = $_POST["text"];
    $time = date("Y-m-d H:i:s");
    $image = $_FILES['image']['name'];
    $query = mysqli_query($con,"INSERT INTO posts VALUES (',','$username','$target','$text','$time')");
    $noposts = $user["nopost"]+1;
    $nopo = mysqli_query($con,"UPDATE users set nopost='$noposts' WHERE username='". $_SESSION['username'] ."'");

    $stopWords = "a about above across after again against all almost alone along already
     also although always among am an and another any anybody anyone anything anywhere are
     area areas around as ask asked asking asks at away b back backed backing backs be became
     because become becomes been before began behind being beings best better between big
     both but by c came can cannot case cases certain certainly clear clearly come could
     d did differ different differently do does done down down downed downing downs during
     e each early either end ended ending ends enough even evenly ever every everybody
     everyone everything everywhere f face faces fact facts far felt few find finds first
     for four from full fully further furthered furthering furthers g gave general generally
     get gets give given gives go going good goods got great greater greatest group grouped
     grouping groups h had has have having he her here herself high high high higher
       highest him himself his how however i im if important in interest interested interesting
     interests into is it its itself j just k keep keeps kind knew know known knows
     large largely last later latest least less let lets like likely long longer
     longest m made make making man many may me member members men might more most
     mostly mr mrs much must my myself n necessary need needed needing needs never
     new new newer newest next no nobody non noone not nothing now nowhere number
     numbers o of off often old older oldest on once one only open opened opening
     opens or order ordered ordering orders other others our out over p part parted
     parting parts per perhaps place places point pointed pointing points possible
     present presented presenting presents problem problems put puts q quite r
     rather really right right room rooms s said same saw say says second seconds
     see seem seemed seeming seems sees several shall she should show showed
     showing shows side sides since small smaller smallest so some somebody
     someone something somewhere state states still still such sure t take
     taken than that the their them then there therefore these they thing
     things think thinks this those though thought thoughts three through
         thus to today together too took toward turn turned turning turns two
     u under until up upon us use used uses v very w want wanted wanting
     wants was way ways we well wells went were what when where whether
     which while who whole whose why will with within without work
     worked working works would x y year years yet you young younger
     youngest your yours z lol haha omg hey ill iframe wonder else like
           hate sleepy reason for some little yes bye choose";

           //Convert stop words into array - split at white space
    $stopWords = preg_split("/[\s,]+/", $stopWords);

    //Remove all punctionation
    $no_punctuation = preg_replace("/[^a-zA-Z 0-9]+/", "", $text);

    //Predict whether user is posting a url. If so, do not check for trending words
    if(strpos($no_punctuation, "height") === false && strpos($no_punctuation, "width") === false){
      //Convert users post (with punctuation removed) into array - split at white space
      $keywords = preg_split("/[\s,]+/", $no_punctuation);

      foreach($stopWords as $value) {
        foreach($keywords as $key => $value2){
          if(strtolower($value) == strtolower($value2))
            $keywords[$key] = "";
        }
      }

      foreach ($keywords as $value) {
          $term = ucfirst($value);
          if($term != '') {
           $query1 = mysqli_query($con, "SELECT * FROM trends WHERE title='$term'");

           if(mysqli_num_rows($query1) == 0)
             $insert_query = mysqli_query($con, "INSERT INTO trends(title,hits) VALUES('$term','1')");
           else
             $insert_query = mysqli_query($con, "UPDATE trends SET hits=hits+1 WHERE title='$term'");
          }
      }

           }

  
    if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
        $sucess = "sucessfilly posted";
        header("Location: home.php");
    }else{
        header("Location: profile.php");
    }
}

?>
