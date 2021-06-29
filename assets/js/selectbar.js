var selecteditem = 0;
var openinbrowser = "";
var openinvscode = "";



function ClearSelectionList() {
    var list = document.querySelectorAll(".list-view")
    list.forEach(element => {
        element.classList.remove("whiteborder")
    });
};

function SelectListitem(itemid) {
    if (dirlist.length == 0) {
        DAButton(".cbutton", -1)


        document.querySelector(".list").innerHTML = `
    <div class="list-view list-file" >
    <img class="list-img" src="assets/images/404.png" style="width:49px;height:48px">
    <h2 class="list-title">Folder is Empty</h2>
    </div>
`
        document.getElementById("total-projects").textContent = 0;
        document.getElementById("total-folders").textContent = 0;
        document.getElementById("total-files").textContent = 0;


    } else {
        ClearSelectionList();
        var list = document.querySelectorAll(".list-view");
        selecteditem = itemid;
        list[itemid].classList.add("whiteborder");

        // Vscode
        var vscodebtn = document.querySelector(".openinvscode");

        openinvscode = "vscode://file/" + rootdir.replace(":", ":/") + "/" + dirlist[selecteditem].replace(MainDIR, "")

        // Browser
        var list_url = document.querySelectorAll(".list-view > a")[selecteditem];
        openinbrowser = list_url.href


        DAButton(".openinbrowser", 1)


    }


}





function DAButton(id, type) {
    if (type == 0) {
        var button = document.querySelector(id);
        button.classList.add("btndisable")
        button.setAttribute("disabled", "");
    }
    if (type == 1) {
        var button = document.querySelector(id);
        button.classList.remove("btndisable")
        button.removeAttribute("disabled");

    }
    if (type == -1) {

        var button = document.querySelectorAll(id);
        for (let index = 0; index < button.length; index++) {
            if (document.querySelectorAll(".cbutton")[index].getAttribute("main") == "") {

            } else {
                const element = button[index];
                element.classList.add("btndisable");
                element.setAttribute("disabled", "");
            }
        };

    };
    if (type == -2) {
        var button = document.querySelectorAll(id);
        for (let index = 0; index < button.length; index++) {
            const element = button[index];
            element.classList.remove("whiteborder");
        };

    };



};
var OpeninINDEXID = "";
function openinindex(){
    for (let index = 0; index < dirlist.length; index++) {
        var element = dirlist[index].replace(MainDIR,"");
        if (element.search("index") > -1) {
            console.log(element)
            OpeninINDEXID = element;
            return true;
    }

}
}

if (openinindex() == true) {
    DAButton(".openindexfile", 1)

}else{
    DAButton(".openindexfile", 0)    
}



function Openin(type) {
    if (type == "browser") {
        window.open(openinbrowser, "_self");
    }
    if (type == "vscode") {
        window.open(openinvscode, "_self");
    }

    if (type == "index") {
        window.open(location.origin + "/" + OpeninINDEXID, "_self");
    }





}

function GetParam(param) {
    return location.search.split(param + "=")[1]
}


document.addEventListener('keydown', function (event) {
    if (event.key === "Escape") {
        if (document.querySelectorAll(".list-view").length > dirlist.length) {
            document.querySelectorAll(".list-view")[0].remove();
            SelectListitem(0)
            // alert("Escape Button Pressed")
        }
    }
});


function CreateFolder(value) {
    var address = "?v=" + paramv + "&actiontype=" + "createfolder" + "&action=" + value;
    window.open(address, "_self")
    console.log(address);
}
function CreateFile(value) {
    var address = "?v=" + paramv + "&actiontype=" + "createfile" + "&action=" + MainDIR + paramv + "/" + value;
    window.open(address, "_self")
    console.log(address);
}

function DialogBOX(input) {
    // if (input == "createfolder") {
    //     if (document.querySelectorAll(".list-view").length > dirlist.length   ) {

    //     }else{
    //     var MainList = document.querySelector(".list");
    //     // var TempList = MainList.innerHTML;
    //     MainList.innerHTML = `
    //     <div class="list-view list-folder whiteborder" ">
    //     <img class="list-img" src="assets/images/Folder.png">
    //     <input class="list-input" value="" placeholder="Folder Name" onchange="CreateFolder(this.value)">
    //     </div>` + MainList.innerHTML;
    //     var mainview = document.querySelectorAll(".list-view")[0]
    //     mainview.querySelector("input").focus();
    //     var list = document.querySelectorAll(".list-view");
    //     DAButton(".list-view", -2)
    //     list[0].classList.add("whiteborder");
    // };
    //         return true;
    // };


    if (input == "createfolder") {
        var id = prompt("Please Type Folder Name", "Create By MLS");
        // var address = document.querySelector(".address").value
        if (id == null || id == "") {
            return false;
        } else {

            var address = "?v=" + paramv + "&actiontype=" + "createfolder" + "&action=" + id;
            window.open(address, "_self")
            console.log(address);
            //   console.log(id);

            return true;
        };
    };

    if (input == "createfile") {
        var id = prompt("Please Type File Name", "New.txt");
        // var address = document.querySelector(".address").value

        if (id == null || id == "") {
            return false;
        } else {

            var address = "?v=" + paramv + "&actiontype=" + "createfile" + "&action=" + MainDIR + paramv + "/" + id;
            window.open(address, "_self")
            console.log(address);
            //   console.log(id);

            return true;
        };
    };


    // if (input == "createfile") {
    //     if (document.querySelectorAll(".list-view").length > dirlist.length   ) {

    //     }else{
    //     var MainList = document.querySelector(".list");
    //     // var TempList = MainList.innerHTML;
    //     MainList.innerHTML = `
    //     <div class="list-view list-file whiteborder" ">
    //     <img class="list-img" src="assets/images/File.png">
    //     <input class="list-input" value="" placeholder="File Name" onchange="CreateFile(this.value)">
    //     </div>` + MainList.innerHTML;
    //     var mainview = document.querySelectorAll(".list-view")[0]
    //     mainview.querySelector("input").focus();
    //     var list = document.querySelectorAll(".list-view");
    //     DAButton(".list-view", -2)
    //     list[0].classList.add("whiteborder");
    // };
    //         return true;
    // };


    if (input == "rename") {
        var id = prompt("Please Type New Name", dirlist[selecteditem].split("/")[dirlist[selecteditem].split("/").length - 1]);
        // var address = document.querySelector(".address").value

        if (id == null || id == "") {
            return false;
        } else {

            var address = "?v=" + paramv + "&actiontype=" + "rename" + "&action=" + dirlist[selecteditem] +
                "&rename=" + MainDIR + paramv + "/" + id;
            window.open(address, "_self")
            // console.log(address);
            //   console.log(id);

            return true;
        };
    };
    // Api to Open File Explorer
    if (input == "openfolder") {

        var address = "?v=" + paramv + "&actiontype=" + "openfolder&action=openfolder";
        window.open(address, "_self")

        return true;
    };




    if (input == "deletefilefolder") {
        ListName = document.querySelectorAll(".list-view")[selecteditem].querySelector("a").querySelector("h2").innerText;

        if (dir_actionlist[selecteditem] == "Folder") {
            // Folder
            if (confirm(`Warning! Are you sure you want to Delete ${ListName} `)) {
                var address = "?v=" + paramv + "&actiontype=" + "deletefolder" + "&action=" + dirlist[selecteditem];
                window.open(address, "_self")
                return true;
            }
        } else {
            // File
            if (confirm(`Warning! Are you sure you want to Delete ${ListName}`)) {
                var address = "?v=" + paramv + "&actiontype=" + "deletefile" + "&action=" + dirlist[selecteditem];
                window.open(address, "_self")
                return true;
            };
        };

    };




};







SelectListitem(0)
