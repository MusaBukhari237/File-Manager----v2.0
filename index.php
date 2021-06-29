<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="assets/css/slider.css">
        <link rel="icon" href="assets/images/favicon.png" type="image/gif">
        <title>File Manager -- Version 2.0</title>
    </head>
    <body>

<?php
include "api.php";


if (empty($_GET['v'])){
    $value = "";
}else{
    $value = $_GET['v'] . "//";
};
// echo $value;
$mainaddress = "..//";
echo "
<script>
var MainDIR = '$mainaddress';
</script>
";


$folderfiles = glob($mainaddress.$value."*");
$folders = array();
$files = array();
for($x=0; $x<sizeof($folderfiles); $x++){
    if (is_dir($folderfiles[$x])){ 
        array_push($folders,$folderfiles[$x]);
    }else{
     array_push($files,$folderfiles[$x]);
    }};

$folderfiles = array_merge($folders,$files);



?>


<!-- Loader -->
<div class="loader">
    <img src="assets/images/loader.png" alt="Loading..." class="spin" />
</div>

<!-- MainContainer -->
<div class="container">

<!-- Details Card View -->
<div class="card-view">
<div class="card-paper">
    <h3>Total Projects</h3>
    <h1 id="total-projects"></h1>
</div>

<div class="card-paper total_folders">
    <h3>Total Folders</h3>
    <h1 id="total-folders"></h1>
</div>

<div class="card-paper total_files">
    <h3>Total Files</h3>
    <h1 id="total-files"></h1>
</div>


</div>

<!-- Sticky Nav Bar  -->
<div class="sticky-bar">
<div class="Form-Search">
<i class="fa fa-search"></i>
<input type="text" id="search" placeholder="Search..." autocomplete="off" onkeyup="search()">

</div>

<div class="controlmenu">
    <!-- <img src="assets/images/File.png" alt="" width="20px"> -->


    <button class="cbutton openinvscode"  onclick="Openin('vscode')" >Open in Vscode</button>
    <button class="cbutton openinbrowser" onclick="Openin('browser')">Open in Browser</button>
    <button class="cbutton openindexfile"  onclick="Openin('index')">Open Index</button>
    <!-- <button class="cbutton openinbrowser"  onclick="DialogBOX('openfolder')">Open in File Explore</button> -->
    <button class="cbutton newfolder" main onclick="DialogBOX('createfolder')">New Folder</button>
    <button class="cbutton newfile" main onclick="DialogBOX('createfile')">New File</button>
    <button class="cbutton newfile"  onclick="DialogBOX('rename')">Rename</button>
    <button class="cbutton deletefolder"  onclick="DialogBOX('deletefilefolder')">Delete</button>
    <!-- Rectangular switch -->
<label class="switch">
  <input type="checkbox">
  <div class="slider"></div>
</label>



    
</div>

</div>

<!-- List -->
<div class="list">




</div>

</div>





<script>

var rootdir = "<?php echo $root; ?>";
var paramv = "<?php
    if (empty($_GET['v'])){
        echo "";
    }else{
        echo $_GET['v'] ;
    };
?>";

var dirlist = [
<?php
        for ($i=0; $i < sizeof($folderfiles); $i++) { 
            echo '"';
            echo $folderfiles[$i];
            echo '"';
            echo ",";
        }
?>
];


var dir_actionlist = [
<?php
        for ($i=0; $i < sizeof($folderfiles); $i++) { 
            if (is_dir($folderfiles[$i])){
                echo '"';
                echo "Folder";
                echo '"';
                echo ",";
        }else{
            echo '"';
            echo "File";
            echo '"';
            echo ","; 
        }


    }

?>
];


</script>


<script src="assets/js/List.js"></script>


<script>



// Loader
window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});

document.getElementById("total-projects").textContent = document.querySelectorAll(".list-view").length;
document.getElementById("total-folders").textContent = document.querySelectorAll(".list-folder").length;
document.getElementById("total-files").textContent = document.querySelectorAll(".list-file").length;


 input = document.querySelector("#search").focus();
 function search() {
    var input, main_list, List_element, element_value, i, txtValue;
    input = document.querySelector("#search").value.toUpperCase();
    main_list = document.querySelector(".list");
    List_element = main_list.querySelectorAll(".list-view");
    for (i = 0; i < List_element.length; i++) {
        element_div = List_element[i].querySelector("a")
        element_value = element_div.getElementsByTagName("h2")[0];
        txtValue = element_value.textContent || element_value.innerText;
        if (txtValue.toUpperCase().indexOf(input) > -1) {
            List_element[i].style.display = "";
        } else {
            List_element[i].style.display = "none";
        }
    }
};

</script>

<script src="assets/js/selectbar.js"></script>
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/sticky-bar.js"></script>


</body>

