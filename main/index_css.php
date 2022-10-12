<style>
    <?php
    /**
     * CLEARFIX
     */
    $cf = array(
        "div.du-header",
        ".du-container"
    );
    /**
     * include base css
     * has reset, fonts, sprites
     */
    include "index_css.base.php";

    /***
     * INCLUDE WIDGET CSS
     */
    include "index_css.widget.php";

    /**
     !* ___  ___          _       _           
     !* |  \/  |         | |     | |          
     !* | .  . | ___   __| |_   _| | ___  ___ 
     !* | |\/| |/ _ \ / _` | | | | |/ _ \/ __|
     !* | |  | | (_) | (_| | |_| | |  __/\__ \
     !* \_|  |_/\___/ \__,_|\__,_|_|\___||___/
     */
    foreach ($modules as $modulesKey => $modulesValue) {
        $moduleFilename = "modules/" . $modulesKey . ".css.php";
        if (
            $modulesValue &&
            file_exists($moduleFilename)
        ) {
            include $moduleFilename;
        }
    }
    ?>
</style>