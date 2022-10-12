<?php
defined('OKTORUN+IMCOOL+GHSD3KFGDD5WDG4DFASFDBZDF') or exit('');
$on = "im_cool+>W$@`ov1e|Wu7W_q]-,Nx$;}TyL`b5g@l++gsz]6S!q9''zM15vR]nQVNNsT^lxx%(ou{EM)JjzH^X;R^,TYm8^[#AIvS@Sq7[!3";
include '../_base/inc/base_v2.inc.php';

if ($appOptions["debug"]) {
    include($mainOptions["adoFolder"] . "adodb-exceptions.inc.php");
}
include($mainOptions["adoFolder"] . "adodb.inc.php");

class DefaultCodeApp extends BaseClass
{
    /*     * ****************************************
     *          APP - DB
     */

    private function readPostcodeData($postcode)
    {
        if (!is_object($this->DB)) {
            $this->connectDb();
        }
        $sql = "SELECT
                    `pcds` AS `pc`,
                    `lad11cd` AS `la`,
                    `lat` AS `lat`,
                    `long` AS `long`
                FROM
                    `du_postcode_data`
                WHERE
                    `pcds` = ?;";

        $query = $this->DB->Prepare($sql);
        return $this->DB->GetRow($query, array($postcode));
    }
    /*     * ****************************************
     *          APP - widget
     */

    public function getPostcodeData($postcode)
    {
        $decodedPostcode = $postcode;
        if (base64_encode(base64_decode($postcode, true)) === $postcode) {
            $decodedPostcode = base64_decode($postcode);
        }
        $res = $this->readPostcodeData($decodedPostcode);

        if ($res) {
            return array(
                "res" => $res
            );
        }
        return array(
            "error" => "no data"
        );
    }
    /*     * ****************************************
     *          APP - support
     */
}
