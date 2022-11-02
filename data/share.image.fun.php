<?php
defined('OKTORUN+IMCOOL+GHSD3KFGDD5WDG4DFASFDBZDF') or exit('');
$on = "im_cool+>W$@`ov1e|Wu7W_q]-,Nx$;}TyL`b5g@l++gsz]6S!q9''zM15vR]nQVNNsT^lxx%(ou{EM)JjzH^X;R^,TYm8^[#AIvS@Sq7[!3";
include '../../_base/inc/base_v2.inc.php';

if ($appOptions["debug"]) {
    include("../" . $mainOptions["adoFolder"] . "adodb-exceptions.inc.php");
}
include("../" . $mainOptions["adoFolder"] . "adodb.inc.php");

class SquadSelectorApp extends BaseClass
{
    public function getImageData($id, $ref)
    {
        if (!is_object($this->DB)) {
            $this->connectDb();
        }

        $sql = "SELECT `url`, `ext` 
                FROM `wcss_images` 
                WHERE `id` = ? AND
                `ref` =?
            ;";

        $query = $this->DB->Prepare($sql);

        return $this->DB->getRow($query, array($id, $ref));
    }
}
