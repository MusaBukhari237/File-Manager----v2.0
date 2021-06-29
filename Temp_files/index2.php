<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="..//assets/css/style.css">
        <script src="..//assets/js/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="..//assets/fonts/font-awesome-4.7.0/css/font-awesome.css">

        <link rel="icon" href="..//assets/images/favicon.png" type="image/gif">
        <title>index2.php</title>
    </head>
    <body>

<?php

// Api to Create Folder
if (empty($_GET['folder'])){
    
}else{
    $address = "..//Html Projects/Vegetable List/" . $_GET['folder'];
    mkdir($address);
    echo $address;

};













// VSCode Button
if (empty($_GET['v'])){
    $subroot = "";
}else{
    $subroot = "/" . $_GET['v'] ;
};
$root = realpath($_SERVER["DOCUMENT_ROOT"]) ;
$vscodebtn = $root . $subroot;

?>

<div class="loader">
    <img src="..//assets/images/loader.png" alt="Loading..." class="spin" />
</div>

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

<!-- //  -->
<div class="sticky-bar">
<div class="Form-Search">
<i class="fa fa-search"></i>
<input type="text" id="search" placeholder="Search..." autocomplete="off" onkeyup="search()">

</div>

<div class="controlmenu">
    <!-- <img src="..//assets/images/File.png" alt="" width="20px"> -->

    <a href="vscode://file/<?php echo $vscodebtn; ?>"  id="openinvscode"><button class="cbutton openinvscode" >Vscode</button></a>
    <a href="#"  id="openinbrowser"><button class="cbutton openinbrowser">Open in Browser</button></a>
    <button class="cbutton" id="openinvscode">Delete</button>
    <button class="cbutton" id="openinvscode" onclick="DialogBOXInput()">New Folder</button>
    <button class="cbutton" id="openinvscode">New File</button>

    
</div>

</div>
<!-- List -->
<div class="list">
<?php
if (empty($_GET['v'])){
    $value = "";
}else{
    $value = $_GET['v'] . "//";
};
// echo $value;
$dir = glob("..//".$value."*");
$folders = array();
$files = array();
// print_r($dir);
// echo "<br>";
// echo "<br/>";
for($x=0; $x<sizeof($dir); $x++){
    if (strpos(str_replace("..//", "", $dir[$x]),".")){ 
        array_push($files,$dir[$x]);
    }else{
     array_push($folders,$dir[$x]);
    }};


// Folders and Files
$folderfiles = array_merge($folders,$files);

for($x=0; $x<sizeof($folderfiles); $x++){
    
    $name = str_replace("..//".$value,"",$folderfiles[$x]);
    $img = "Folder.png";
    $type = "folder";
    $url = 'index.php?v=' . str_replace("..//","",$folderfiles[$x]);;
    if (strpos(str_replace("..//", "", $folderfiles[$x]),".")) {
        $img = "File.png" ;
        $type = "file";
        $url = $folderfiles[$x];
    } else {
        $img = "Folder.png";
        $type = "folder";
        $url = 'index.php?v=' . str_replace("..//","",$folderfiles[$x]);
    }

    ?>
    
    <div class="list-view list-<?php echo $type;?>" onclick="SelectListitem(<?php echo $x ?>)">
    <img class="list-img" src="..//assets/images/<?php echo $img;?>">
    <a href="<?php echo $url;?>">
    <h2 class="list-title"><?php echo $name; ?></h2>
</a>
    </div>

    <?php
};
// echo window.location.pathname;
?>


</div>



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
    List_element = main_list.getElementsByTagName("a");
    for (i = 0; i < List_element.length; i++) {
        element_div = List_element[i].querySelector(".list-view")
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

<script src="..//assets/js/selectbar.js"></script>
<script src="..//assets/js/jquery-3.5.1.min.js"></script>
<script src="..//assets/js/sticky-bar.js"></script>


</div>
</body>

