
function RemoveURLParams(){
    if (location.pathname.search("//") > -1) {
        location.pathname = location.pathname.replaceAll("//","/");
    }
    
    window.history.replaceState(null, null, window.location.pathname);
    
};




function Capitalize(string){
    var Letter = string.split(" ");
    var Output = "";
    for (let index = 0; index < Letter.length; index++) {
          Output = Output + Letter[index].charAt(0).toUpperCase() + Letter[index].slice(1) + " ";
    
    }
    return Output;
    }

// Folders and Files
var List, Listid, ListName, ListImg, ListType, ListUrl, ListView;

for (let index = 0; index < dirlist.length; index++) {

    List = dirlist[index];
    ListView = document.querySelector(".list");
    ListName = Capitalize(List.replace(MainDIR , "").replace(paramv + "//",""));
    // console.log(ListName);
    if (dir_actionlist[index] == "Folder") {
                // Folder
                ListImg = "Folder.png";
                ListType = "folder";
                ListUrl = "index.php?v=" + List.replace(MainDIR, "");


    } else {
                // File
                ListImg = "File.png";
                ListType = "file";
                ListUrl = List;


    }

    ListView.innerHTML += `
        <div class="list-view list-${ListType}" onclick="SelectListitem(${index})">
        <img class="list-img" src="assets/images/${ListImg}">
        <a href="${ListUrl}">
        <h2 class="list-title">${ListName}</h2>
        </a>
        </div>
   `


}

// for($x=0; $x<sizeof($folderfiles); $x++){

//     $name = str_replace($mainaddress.$value,"",$folderfiles[$x]);
//     $img = "Folder.png";
//     $type = "folder";
//     $url = 'index.php?v=' . str_replace($mainaddress,"",$folderfiles[$x]);;
//     if (strpos(str_replace($mainaddress, "", $folderfiles[$x]),".")) {
//         $img = "File.png" ;
//         $type = "file";
//         $url = $folderfiles[$x];
//     } else {
//         $img = "Folder.png";
//         $type = "folder";
//         $url = 'index.php?v=' . str_replace($mainaddress,"",$folderfiles[$x]);
//     }

//     ?>

//     <div class="list-view list-<?php echo $type;?>" onclick="SelectListitem(<?php echo $x ?>)">
//     <img class="list-img" src="assets/images/<?php echo $img;?>">
//     <a href="<?php echo $url;?>">
//     <h2 class="list-title"><?php echo $name; ?></h2>
// </a>
//     </div>

//     <?php
// };

// ?></div>


RemoveURLParams();