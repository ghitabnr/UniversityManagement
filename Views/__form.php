
<form name="myForm" action="" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($element["id"] ?? '') ?>" />

    <table >
        <tr >
            <td colspan="2">
                <span class="Err"> <?= htmlspecialchars($erreur ?? '') ?> </span>
            </td>
        </tr>
        <?php foreach ($keys as $key): ?>
            <?php if ($key != "id"): ?>
                <tr>
                    <td ><b><?= htmlspecialchars($key) ?></b></td>
                    <td >
                        <input name="<?= htmlspecialchars($key) ?>" value="<?= htmlspecialchars($element[$key] ?? '') ?>" />
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        <tr>
            <td >
                <input type="submit" value="Sauvegarder" />
                <input type="reset" value="Annuler" />
            </td>
        </tr>
    </table>
</form>