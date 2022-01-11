<?php 

include ("vendor/autoload.php");



$search='';
 
    if(isset($_POST['submit'])){
    $search = $_POST['search'];


$mydir = 'uploads';
$myfiles = scandir($mydir);
//print_r($myfiles);
//die;
$total_pdf=count($myfiles);
//die;
$i=2;
while($i < $total_pdf){
    $file	=  "uploads/".$myfiles[$i];


$directory = getcwd();
$pdf = $file;
$fullfile = $directory . '/' . $pdf;
$content = '';
$out = '';
$data = '';
$parser = new \Smalot\PdfParser\Parser();

$document = $parser->parseFile($fullfile);
$pages    = $document->getPages();
$j=0;
for($j ; $j < sizeof($pages); $j++) {
  $page     = $pages[$j];
$data  = $page->getText();
$out      = $data;
//echo  $data;
if(strpos($data,$search) !== false){
    //echo $search;
    echo "Found on:-<a target='_blank' href='$file'> $file</a> page $j";
    echo "<br>";
    if($search == 'ÖZET'){
        $temp=explode("||",$data);
        echo  "$temp[1]<br>";
    }
    if($search == 'Anahtar'){
        $temp=explode("||",$data);
        echo  "$temp[2]<br>";
    }
    if($search == 'KONU'){
        $temp=explode("||",$data);
        echo  "$temp[5]<br>";
    }
    if($search == 'DÖNEM'){
        $temp=explode("||",$data);
        echo  "$temp[2]<br>";
    }
    if($search == 'TEZ'){
        $temp=explode("||",$data);
        echo  "$temp[3]<br>";
    }
    if($search == 'BÖLÜM'){
        $temp=explode("||",$data);
        echo  "$temp[1]<br>";
    }
    if($search == 'Danışman'){
        $temp=explode("||",$data);
        echo  "$temp[0]<br>";
    }
    if($search == 'Jüri'){
        $temp=explode("||",$data);
        echo  "$temp[0]<br>";
    }
    if($search == 'Öğrenciler'){
        $temp=explode("||",$data);
        echo  "$temp[2]<br>";
    }
    if($search == 'BİTİRME'){
        $temp=explode("||",$data);
        echo  "$temp[3]<br>";
    }
    if($search == 'ARAŞTIRMA'){
        $temp=explode("||",$data);
        echo  "$temp[3]<br>";
    }
    if($search == 'Tarih'){
        $temp=explode("||",$data);
        echo  "$temp[1]<br>";
    }
    

}else{
    //echo "No match found on:-<a target='_blank' href='$file'> $file</a> page $j";
    echo "<br>";
    

}
 }

    $i++;
}
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Form</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
        <body>
        <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center">Search From Uploaded PDF</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="admin_page.php" class="btn btn-outline-primary"> All Users and Documents</a>
                        <a href="add_user.php" class="btn btn-outline-primary">Add User</a>
                        <a href="search.php" class="btn btn-outline-primary">Search Form</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
            <main>
                <form action="" method="POST" class="row mt-4 g-3">
                <div class="col-6">
                <label for="search" class="form-label">Search</label>
                <input type="text" class="form-control" name="search"  value="<?php echo $search; ?>" required>
            </div>  
                          <button name ="submit"  class="btn btn-primary" >SEARCH</button>            
                </form>
            </main> 
            <footer></footer>
        </body>
     </html>   
    