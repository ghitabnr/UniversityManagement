

<?php include("Views/Vhaut.php"); ?>
<html>
    <body>
    <table>
        <tr>
            <!-- Sidebar Menu -->
            <td class="menu" style="background-color: brown;">
                <?php include("menu.php"); // Embed the menu file ?>
            </td>
            
            <!-- Main Content Area -->
            <td class="content">
                <div>
                    <?php echo isset($view) ? $view : ""; // Display the view if it exists ?>
                </div>
            </td>
        </tr>
    </table>
    </body>
</html>
<?php include("Views/vBas.php"); ?>
