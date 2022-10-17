<?php
defined('OKTORUN+IMCOOL+GHSD3KFGDD5WDG4DFASFDBZDF') or exit('');
$on = "im_cool+>W$@`ov1e|Wu7W_q]-,Nx$;}TyL`b5g@l++gsz]6S!q9''zM15vR]nQVNNsT^lxx%(ou{EM)JjzH^X;R^,TYm8^[#AIvS@Sq7[!3";
include '../../_base/inc/base_v2.inc.php';

if ($appOptions["debug"]) {
    include($mainOptions["adoFolder"] . "adodb-exceptions.inc.php");
}
include($mainOptions["adoFolder"] . "adodb.inc.php");

class SquadSelectorApp extends BaseClass
{
    /*     * ****************************************
     *          APP - DB
     */

    private function getVoteData($version, $show_res = 0)
    {
        if (!is_object($this->DB)) {
            $this->connectDb();
        }
        $extraRes = "";
        $order = " ORDER BY `player_id` ";
        if ($show_res) {
            $extraRes = "";
            $order = "  ";
        }
        $sql = "SELECT
                    `player_id` AS player_id,
                    `player_name` AS player_name,
                    `player_role` AS player_role,
                    `player_votes` AS player_votes,
                    `team` AS team
                FROM 
                    `wcss_player_votes`
                WHERE
                    `team`=?"
            . $order . ";";

        $query = $this->DB->Prepare($sql);

        return $this->DB->getAll($query, $version);
    }
    /*     * ****************************************
     *          APP - widget
     */

    private function saveReply($data)
    {
        if (!is_object($this->DB)) {
            $this->connectDb();
        }
        $votes = $data["votes"];

        // var_dump($votes);

        $sql = "UPDATE 
                    `wcss_player_votes`
                SET
                    `player_" . $data['what'] . "` = `player_" . $data['what'] . "`+1

                WHERE
                    `player_id`= ? AND
                    `player_name` = ?";

        // var_dump(gettype($sql));

        $query = $this->DB->Prepare($sql);

        foreach ($votes as $id => $value) {
            $this->DB->execute($query, array(urldecode($id), urldecode($value)));
        }


        return;
    }

    function storeReply($data)
    {
        print_r($data);
        $valid_what = array("votes");
        if (!isset($data['app']) || !isset($data['votes']) || (!isset($data['what']) && in_array($data['what'], $valid_what))) {
            return array("error" => "Missing data 1");
        }
        $this->saveReply($data);

        return array("ok");
    }


    function readyVoteData($data)
    {
        $res = array();
        foreach ($data as $key => $value) {
            $res[] = array(
                'player_id' => $value['player_id'],
                'player_name' => $value['player_name'],
                'player_role' => $value['player_role'],
                'player_votes' => $value['player_votes'],
                'team' => $value['team'],
            );
        }
        $res = array_values($res);
        return $res;
    }

    function readResults($data)
    {
        if (!isset($data['app']) || !isset($data['vers'])) {
            return array("error" => "Missing data 2");
        }

        $res = array();
        $res['votes'] = $this->readyVoteData($this->getVoteData($data['vers'], 1));
        $res['other_data'] = $data;


        return $res;
    }
    /*     * ****************************************
     *          APP - support
     */
}
