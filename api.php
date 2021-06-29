<?php
    function NavigateToDirectory($Directory){
        $Directory = explode('\\', $Directory);
        for($i=0; $i<count($Directory); $i++)
            if(is_dir($Directory[$i]))
                chdir($Directory[$i]);
    };

    // VSCode Button
    if (empty($_GET['v'])){
        $subroot = "";
    }else{
        $subroot = "\\" . $_GET['v'] ;
    };
    $root = realpath($_SERVER["DOCUMENT_ROOT"]) ;
    $mroot = $root . "/" .  $subroot;




if (empty($_GET['actiontype']) || empty($_GET['action'])){
    
}else{

    // Api to Create Folder
    if ($_GET['actiontype'] == "createfolder"){
        // echo "<br>";
        $address = "..//" . $_GET['v'] . "//" . $_GET['action'];
        // echo $address;
        if(@mkdir($address)){
            // echo "created";
            
        }else{
            echo "<script>
            alert('Folder Already Exist');
            </script>";
        };

    };

    // Api to Create File
    if ($_GET['actiontype'] == "createfile"){
        // echo "<br>";
        $address = $_GET['action'];
        // echo $address;
        // fopen($address,"w");
        if(@fopen($address, "w")){
            // echo "created";
            
        }else{
            echo "<script>
            alert('File Already Exist');
            </script>";
        };

    };

    // Api to Rename
    if ($_GET['actiontype'] == "rename"){
        // echo "<br>";
        $address = $_GET['action'];
        // echo $address;
        // rename($address,$_GET['rename']);
        if(@rename($address,$_GET['rename'])){
            // echo "created";
            
        }else{
            echo "<script>
            alert('File Already Exist');
            </script>";
        };

    };


    // Api to Delete File
    if ($_GET['actiontype'] == "deletefile"){
        // echo "<br>";
        $address = $_GET['action'];
        if(unlink($address)){
            // echo "Deleted Successfully";
        }else{
            echo "<script>alert('Failed! To Delete : $address /n Reason! Folder Contains Files')</script>";
        };
};


    // Api to Delete Folder
//     if ($_GET['actiontype'] == "deletefolder"){
//         // echo "<br>";
//         $address = $_GET['action'];
//         if(rmdir($address)){
//             // echo "Deleted Successfully";
//         }else{
//             echo "<script>alert('Failed! To Delete : $address /n Reason! Folder Contains Files')</script>";
//         };
// };

    // Api to Delete Folder
    if ($_GET['actiontype'] == "deletefolder"){
        // echo "<br>";
        $address = $_GET['action'];
        // echo $address;

    
        $fileslist = glob($address."/*");

        if (@rmdir($address)) {
            
        }else{
        for ($i=0; $i < sizeof($fileslist) ; $i++) { 
            if (is_dir($fileslist[$i])) {
                // Folder
                if(@rmdir($fileslist[$i])){
                    // echo "Deleted Successfully";
                }else{
                    echo "<script>alert('Failed! To Delete : $address /n Reason! Folder Contains Files')</script>";
                };
            }else{
                // File
                if(unlink($fileslist[$i])){
                    // echo "Deleted Successfully";
                }else{
                    echo "<script>alert('Failed! To Delete : $address /n Reason! Folder Contains Files')</script>";
                };
            };
        };
        rmdir($address);
        // echo "<br>" . $folder . "<br>" . $file;

    }


        // if(rmdir($address)){
        //     // echo "Deleted Successfully";
        // }else{
        //     echo "<script>alert('Failed! To Delete : $address /n Reason! Folder Contains Files')</script>";
        // };
};


    // echo $_GET['actiontype'];
    // Api to Open Folder
    if ($_GET['actiontype'] == "openfolder"){
        // echo "musa";
        

        echo $root . $subroot;
        NavigateToDirectory($root . $subroot);


};



};


?>