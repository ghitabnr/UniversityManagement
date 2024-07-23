 
<h1>Details de l'element <?=$element["id"]?> de la table :<?=$module?></h1>
<hr><br><br>

<div>
    <?php foreach($element as $key => $val){?>
        <b><?= $key ?> : </b><?= $val ?> <br>
    <?php }?>

    <div>
    <a href="index.php?module=<?=$module?>&action=edit&id=<?=$element["id"]?>">
                            modifier
    </a>|
    <a href="index.php?module=<?=$module?>&action=delete&id=<?=$element["id"]?>">
                            supprimer  
    </a> 
    </div>
</div>