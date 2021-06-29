<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New.php</title>
</head>

<body>
<?php


// actiontype
// action
if (empty($_GET['actiontype']) || empty($_GET['action'])){
    
}else{
    // Api to Create Folder
    if ($_GET['actiontype'] == "createfolder"){
        // $address = "..//Html Projects/Vegetable List/" . $_GET['folder'];
        mkdir($_GET['action']);

    }


};

if (empty($_GET['v'])){
    $subroot = "";
}else{
    $subroot = "/" . $_GET['v'] ;
};
$root = realpath($_SERVER["DOCUMENT_ROOT"]) ;
$vscodebtn = $root . $subroot;

echo $root;
echo "<br>";
echo $vscodebtn ;



?>
    <input type="text" class="address">
    <button onclick="DialogBOX()">Add Folder</button>


    <script>
// function DialogBOX(){
// var id = prompt("Please enter your name", "Harry Potter");
// var address = document.querySelector(".address").value
// if (id == null || id == "") {
//     return false;
// } else {
//   window.open("?actiontype=" + "createfolder" + "&action=" + address + id , "_self")
//   console.log(id);
//   // echo window.location.pathname;
//   return true;
// }}

    </script>
</body>

</html>