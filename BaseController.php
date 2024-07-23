


<?php
require("BaseManager.php");

function render($view,$variables=[]){

    if(file_exists($view)){
        extract($variables);
        ob_start();
        require($view);
        $view=ob_get_clean();

        ob_start();
        require("Views/templates/template.php");
        $output=ob_get_clean();
        exit($output);
    }else{
        throw new Exception("la vue $view est introuvable");
    }
} 

function index(){
    render("Views/vIndex.php");
}

function liste($module){

    $view="Views/vListe.php";
    $variables= [
        "module"=>$module,
        "liste"=>findAll($module)

    ];
    render($view,$variables);

}

function detail($module){

    $view= "Views/vDetails.php";
    $variables=[ "module"=>$module,
                 "element"=>findOne($module, $_GET["id"])
    ];
    render($view,$variables);
}

function delete ($module){

    del($module,$_GET["id"]);
    header("location:index.php?module=".$module."&action=liste");
    exit;
}

function edit ($module){

    if ($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET["id"] ?? NULL;
        $element= empty($id)? NULL :findOne($module,$id);
        $erreur=NULL;
    } elseif ($_SERVER["REQUEST_METHOD"]=="POST"){
        $element=$_POST;
        if(save($module,$element)){
            header("location:index.php?module=".$module."&action=liste");
            exit;
        }
        else 
        $erreur="cette element n etait pas bien sauvegarde";
    }

    $view =empty($id)? "Views/vAjouter.php" : "Views/vModifier.php";
    $variables=[
                "keys"=>describe($module),
                "module"=>$module,
                "element"=>$element,
                "erreur"=>$erreur,
    ];
    render($view,$variables);
}


