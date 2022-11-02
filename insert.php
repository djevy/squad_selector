<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(120);

session_start();
$on = "im_cool+>W$@`ov1e|Wu7W_q]-,Nx$;}TyL`b5g@l++gsz]6S!q9''zM15vR]nQVNNsT^lxx%(ou{EM)JjzH^X;R^,TYm8^[#AIvS@Sq7[!3";
/*
 * CONFIG
 */
$localhosts = array("127.0.0.1", "::1");
$HTTP_HOST = array("hw024879");

$config["srg"] = "../";
include $config["srg"] . '/_base/inc/base_v2.inc.php';

include($config["srg"] . "adodb5_srg/adodb-exceptions.inc.php");
include($config["srg"] . "adodb5_srg/adodb.inc.php");

class cc
{

    private $DB;
    private $baseDB = false;

    public function setBaseDB($data)
    {
        $this->baseDB = $data;
    }

    private function connectDb()
    {
        $this->DB = NewADOConnection($this->baseDB["type"]);
        $this->DB->SetFetchMode(ADODB_FETCH_ASSOC);
        $this->DB->Connect($this->baseDB["ht"], $this->baseDB["us"], $this->baseDB["pa"], $this->baseDB["db"]);
        $this->DB->SetCharSet('utf8');
        $this->DB->debug = 1;
    }

    private function disconnectDb()
    {
        $this->DB->Disconnect();
        unset($this->DB);
    }

    public function x()
    {
        if (is_object($this->DB)) {
            $this->disconnectDb();
        }
        return true;
    }

    public function tableList()
    {
        if (!is_object($this->DB)) {
            $this->connectDb();
        }

        $sql = "SHOW COLUMNS FROM `tlg_forms`";
        $query = $this->DB->Prepare($sql);
        $x = $this->DB->getAll($query);
        print_r($x);
    }

    // Update Table Contents
    // (If more than one key value must include both)
    public function updateTable()
    {
        if (!is_object($this->DB)) {
            $this->connectDb();
        }

        $sql = "INSERT INTO pyt_teams(t_id, t_name, t_l_id)
        VALUES(1, 'Aberdeen', 3),(2, 'Alloa Athletic', 4),(3, 'Arsenal', 1),(4, 'Aston Villa', 1),(5, 'Ballinamallard', 7),(6, 'Ballymena', 7),(7, 'Barcelona', 6),(8, 'Besiktas', 6),(9, 'Birmingham', 2),(10, 'Blackburn', 2),(11, 'Blackpool', 2),(12, 'Bolton', 10),(13, 'Bournemouth', 1),(14, 'Bradford', 8),(15, 'Brentford', 1),(16, 'Brighton', 1),(17, 'Burnley', 2),(18, 'Bury', 8),(19, 'Cambridge', 10),(20, 'Cardiff', 1),(21, 'Celtic', 3),(22, 'Charlton', 10),(23, 'Chelsea', 1),(24, 'Cliftonville', 7),(25, 'Coleraine', 7),(26, 'Coventry City', 2),(27, 'Cowdenbeath', 4),(28, 'Crusaders', 7),(29, 'Crystal Palace', 1),(30, 'Derby', 2),(31, 'Dumbarton', 4),(32, 'Dundee', 4),(33, 'Dundee United', 3),(34, 'Dungannon', 7),(35, 'Dynamo Kiev', 6),(36, 'England', 9),(37, 'Everton', 1),(38, 'Falkirk', 4),(39, 'Fulham', 1),(40, 'Glenavon', 7),(41, 'Glentoran', 7),(42, 'Hamilton', 4),(43, 'Hibernian', 3),(44, 'Huddersfield', 2),(45, 'Hull', 2),(46, 'Institute', 7),(47, 'Inverness CT', 4),(48, 'Ipswich', 10),(49, 'Kilmarnock', 3),(50, 'Leeds', 1),(51, 'Leicester', 1),(52, 'Linfield', 7),(53, 'Lithuania', 9),(54, 'Liverpool', 1),(55, 'Livingston', 3),(56, 'Man City', 1),(57, 'Man Utd', 1),(58, 'Middlesbrough', 2),(59, 'Millwall', 2),(60, 'Motherwell', 3),(61, 'N Ireland', 7),(62, 'Newcastle', 1),(63, 'Norwich', 2),(64, 'Nott Forest', 5),(65, 'Oldham', 8),(66, 'Partick', 4),(67, 'Portadown', 7),(68, 'QPR', 2),(69, 'Queen of South', 4),(70, 'Raith Rovers', 4),(71, 'Rangers', 3),(72, 'Reading', 2),(73, 'Rochdale', 8),(74, 'Ross County', 3),(75, 'Rotherham', 2),(76, 'Sheffield Wed', 10),(77, 'Southampton', 1),(78, 'St Johnstone', 3),(79, 'St Mirren', 3),(80, 'Stoke', 2),(81, 'Sunderland', 2),(82, 'Swansea', 2),(83, 'Tottenham', 1),(84, 'Walsall', 8),(85, 'Warrenpoint', 7),(86, 'Watford', 2),(87, 'West Brom', 2),(88, 'West Ham', 1),(89, 'Wigan', 2),(90, 'Wolves', 1),(91, 'Wrexham', 5),(92, 'my team', 5),(93, 'Chester FC', 5),(94, 'Swansea City', 2),(96, 'AFC Wimbledon', 8),(97, 'Aldershot', 5),(98, 'All comers', 5),(100, 'Anyone', 5),(102, 'Arsenaldcv', 5),(103, 'AS Roma', 6),(104, 'Astana', 6),(106, 'Atl Madrid', 6),(107, 'Augsburg', 6),(111, 'Barnet', 5),(112, 'Barnsley', 10),(113, 'Bayern Munich', 6),(115, 'Best XI', 5),(120, 'Bordeaux', 5),(121, 'Borussia', 6),(122, 'Borussia M', 5),(125, 'Braintree Town', 5),(128, 'Bristol City', 2),(129, 'Bristol Rovers', 10),(130, 'Bromley FC', 5),(132, 'Burton Albion', 10),(136, 'Carlisle', 8),(137, 'Carrick', 7),(142, 'Chesterfield', 5),(144, 'Club Brugge', 5),(145, 'Colchester Utd', 8),(149, 'Crewe Alex', 8),(152, 'CSKA Moscow', 6),(154, 'Dinamo Zagreb', 6),(155, 'Doncaster Rvs', 8),(156, 'Donetsk', 6),(157, 'Dortmund', 5),(163, 'Eastleigh', 5),(165, 'England/Spain', 5),(166, 'England/Wales', 11),(167, 'EverPool', 5),(171, 'FC Bate', 6),(172, 'FC Midtjylland', 6),(173, 'FC Porto', 6),(174, 'Fleetwood Town', 10),(175, 'Forest Green', 10),(177, 'Galatasaray', 6),(178, 'GB and Ireland', 5),(179, 'Germany', 9),(180, 'Gillingham', 8),(190, 'Ireland', 5),(191, 'Juventus', 6),(192, 'KAA Gent', 6),(193, 'Kidderminster', 5),(197, 'Leverkusen', 6),(198, 'Lillestrom', 6),(199, 'Lincoln City', 10),(204, 'Lyon', 6),(205, 'Malmö FF', 6),(210, 'Midtjylland', 5),(212, 'MK Dons', 10),(215, 'Netherlands', 9),(217, 'Northampton', 8),(221, 'Olympiacos FC', 6),(223, 'Peterborough U', 10),(224, 'Port Vale', 10),(226, 'Portsmouth', 10),(227, 'Premier League', 11),(228, 'Preston', 2),(229, 'PSG', 6),(230, 'PSV Eindhoven', 6),(236, 'Real Madrid', 6),(237, 'Rep Ireland', 9),(238, 'RFU Ireland', 11),(242, 'ROW', 5),(243, 'Rubin Kazan', 5),(244, 'Scotland', 9),(245, 'Scunthorpe Utd', 10),(246, 'Sevilla', 6),(247, 'Sheffield Utd', 2),(249, 'Shrewsbury', 10),(250, 'Sion', 5),(251, 'SL Benfica', 6),(253, 'Southend Utd', 10),(284, 'Russia', 9),(285, 'Spain', 9),(286, 'Italy', 9),(287, 'belarus', 9),(288, 'Belgium', 9),(289, 'Sweden', 9),(290, 'Slovakia', 9),(291, 'Poland', 9),(292, 'Portugal', 9),(293, 'Montpellier', 6),(294, 'Nyonnais', 6),(297, 'Sunderland XI', 5),(298, 'Hartlepool', 8),(299, 'Dijon', 6),(300, 'Nottm Forest', 1),(301, 'Euros XI', 11),(302, 'Malta', 9),(303, 'Cheltenham', 10),(304, 'Hapoel B.S.', 6),(305, 'Feyenoord', 6),(306, 'Fenerbahce', 6),(307, 'Zorya Luhansk', 6),(308, 'Gladbach', 6),(309, 'Exeter City', 10),(310, 'Wycombe', 10),(311, 'Accrington', 10),(312, 'Crawley', 8),(313, 'Grimsby Town', 8),(314, 'Leyton Orient', 8),(315, 'Luton Town', 2),(316, 'Mansfield', 8),(317, 'Morecambe', 10),(318, 'Newport', 8),(319, 'Notts County', 8),(320, 'Plymouth', 10),(321, 'Stevenage', 8),(322, 'Yeovil Town', 8),(323, 'Belenenses', 5),(324, 'Rostov', 6),(325, 'Manchester Utd', 5),(326, 'Coffee Escape', 5),(328, 'Livrpool', 5),(329, 'Leeds United', 5),(330, 'Macclesfield', 8),(333, 'Swindon Town', 8),(334, 'Tranmere', 8),(335, 'Oxford United', 10),(336, 'Ards', 7),(337, 'Newry', 7),(338, 'Hearts', 3),(339, 'ayr', 4),(340, 'greenock', 4),(341, 'Dunfermline', 4),(342, 'Stranraer', 5),(343, 'Airdrie', 5),(344, 'Arbroath', 4),(345, 'East Fife', 5),(346, 'Forfar', 5),(347, 'Stirling', 5),(348, 'Berwick', 5),(349, 'Brechin', 5),(350, 'Albion Rvs', 5),(351, 'East Stirling', 5),(352, 'Montrose', 5),(353, 'Stenhousemuir', 5),(354, 'Airdrie Utd', 5),(355, 'Peterhead', 5),(356, 'Annan Ath', 5),(357, 'Elgin', 5),(358, 'Gretna', 5),(359, 'Edinburgh', 5),(360, 'Clydebank', 5),(361, 'Hull FC', 5),(362, 'Hull KR', 5),(363, '2', 5),(364, 'Hull City', 2),(365, 'Salford City', 8),(391, 'Istanbul Basak', 5),(401, 'Rennes', 5),(417, 'Ludogorets', 5),(419, 'Molde', 5),(431, 'Sparta Prague', 5),(439, 'n/a', 5),(491, 'Ajax', 5),(511, 'Standard Liege', 5),(515, 'LASK', 5),(517, 'Rapid Vienna', 5),(521, 'Milan', 5),(557, 'Colchester Utd', 5),(581, 'RB Leipzig', 5),(585, 'None', 5),(593, 'Marseille', 5),(605, 'Lech Poznan', 5),(652, 'Ballon d\'Or XI', 5),(653, 'World', 5),(811, '2020', 5),(1215, 'Real Sociedad', 5),(1225, 'Antwerp', 5),(1231, 'France', 5),(1299, 'Harrogate', 8),(1333, 'Arsenal FC', 5),(1347, 'Liverpool FC', 5),(1403, 'Real Madrid CF', 5),(1465, 'aaa', 5),(1485, 'AC Milan', 5),(1507, 'Slavia Prague', 5),(1551, 'Austria', 5),(1629, 'Cove Rangers', 4),(1665, 'Granada CF', 5),(1961, 'Croatia', 5),(2123, 'THFC', 5),(2125, 'Spurs', 5),(2137, 'P', 5),(2141, 'Villarreal', 5),(2187, 'Barca', 5),(2193, 'Euro 2020', 5),(2231, 'First opponent', 5),(2273, 'Czech Republic', 5),(2341, 'Ukraine', 5),(2357, 'Denmark', 5),(2517, 'Man City FC', 5),(2555, 'Villa', 5),(2697, 'Starting XI', 5),(2735, 'Weymouth', 5),(2825, 'Cardiff City', 2),(3021, 'Norwich City', 5),(3101, 'Young Boys', 5),(3107, 'Napoli', 5),(3111, 'Zenit', 5),(3170, 'Derby County', 10),(3171, 'Stoke City', 5),(3357, 'Legia Warsaw', 5),(3449, 'Best Free XI', 5),(3478, 'Altrincham', 5),(3487, 'Newcastle Utd', 5),(3597, 'Atalanta', 5),(3603, 'Spartak Moscow', 5),(3853, 'Vitesse Arnhem', 5),(4083, 'NS Mura', 5),(4145, 'Boreham Wood', 5),(4271, 'Dagenham', 5),(4345, '#pnefc', 5),(4376, 'Stockport', 8),(4611, 'Halifax Town', 5),(4825, 'Wealdstone', 5),(4975, 'King\'s Lynn', 5),(4987, 'Al-Hilal', 5),(5055, 'Sporting', 5),(5063, 'Inter Milan', 5),(5069, 'LFC', 5),(5095, 'Randers', 5),(5139, 'Dover Athletic', 5),(5183, 'LFC 2024', 5),(5207, 'Peterborough', 5),(5219, 'Woking', 5),(5305, 'Chelsea FC', 5),(5415, 'Solihull Moors', 5),(5462, 'Town 2017', 5),(5463, 'Town 2022', 5),(5968, 'Lvierpool', 5),(6024, 'Warnock\'s XI', 5),(6075, 'Team FC', 5),(6107, '_____', 5),(6144, 'European Stars', 5),(6160, 'Melksham Town', 5),(6216, 'Paris SG', 5),(6230, 'Hertha Berlin', 5),(6236, 'Melbourne Vict', 5),(6237, 'Sutton', 8),(6238, 'Barrow', 8),(6239, 'Queens Park', 4)
        ON DUPLICATE KEY
        UPDATE
            t_l_id =
        VALUES(t_l_id)";

        $query = $this->DB->Prepare($sql);
        $this->DB->execute($query);
    }

    // Alter Table
    public function alterTable1()
    {
        if (!is_object($this->DB)) {
            $this->connectDb();
        }

        $sql = "ALTER TABLE `wcss_images`
        ADD PRIMARY KEY (`id`,`ref`);";

        $query = $this->DB->Prepare($sql);
        $this->DB->execute($query);
    }

    public function alterTable2()
    {
        if (!is_object($this->DB)) {
            $this->connectDb();
        }

        $sql = "ALTER TABLE `wcss_player_votes`
        MODIFY `player_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";

        $query = $this->DB->Prepare($sql);
        $this->DB->execute($query);
    }

    // Insert into Table
    public function insertIntoTable()
    {
        if (!is_object($this->DB)) {
            $this->connectDb();
        }


        $sql = "INSERT INTO `wcss_player_votes` (`player_id`, `player_name`, `player_role`, `player_votes`, `team`) VALUES
        (0, 'Calvert-Lewin', 'Forward', 0, 'England'),
        (1, 'Pope', 'Goal Keeper', 0, 'England'),
        (2, 'Ramsdale', 'Goal Keeper', 0, 'England'),
        (3, 'Henderson', 'Goal Keeper', 0, 'England'),
        (4, 'Pickford', 'Goal Keeper', 0, 'England'),
        (5, 'James', 'Defender', 0, 'England'),
        (6, 'Shaw', 'Defender', 0, 'England'),
        (7, 'Stones', 'Defender', 0, 'England'),
        (8, 'White', 'Defender', 0, 'England'),
        (9, 'Maddison', 'Midfielder', 0, 'England'),
        (10, 'Dier', 'Defender', 0, 'England'),
        (11, 'Maguire', 'Defender', 0, 'England'),
        (12, 'Trippier', 'Defender', 0, 'England'),
        (13, 'Walker', 'Defender', 0, 'England'),
        (14, 'Coady', 'Defender', 0, 'England'),
        (15, 'Guéhi', 'Defender', 0, 'England'),
        (16, 'Chilwell', 'Defender', 0, 'England'),
        (17, 'Alexander-Arnold', 'Defender', 0, 'England'),
        (18, 'Tomori', 'Defender', 0, 'England'),
        (19, 'Mings', 'Defender', 0, 'England'),
        (20, 'Rice', 'Midfielder', 0, 'England'),
        (21, 'Bellingham', 'Midfielder', 0, 'England'),
        (22, 'Henderson', 'Midfielder', 0, 'England'),
        (23, 'Mount', 'Midfielder', 0, 'England'),
        (24, 'Ward-Prowse', 'Midfielder', 0, 'England'),
        (25, 'Phillips', 'Midfielder', 0, 'England'),
        (26, 'Grealish', 'Midfielder', 0, 'England'),
        (27, 'Bowen', 'Forward', 0, 'England'),
        (28, 'Kane', 'Forward', 0, 'England'),
        (29, 'Sterling', 'Forward', 0, 'England'),
        (30, 'Foden', 'Forward', 0, 'England'),
        (31, 'Saka', 'Forward', 0, 'England'),
        (32, 'Toney', 'Forward', 0, 'England'),
        (33, 'Abraham', 'Forward', 0, 'England'),
        (34, 'Rashford', 'Forward', 0, 'England'),
        (35, 'Watkins', 'Forward', 0, 'England'),
        (36, 'Sancho', 'Forward', 0, 'England'),
        (37, 'Hennessey', 'Goal Keeper', 0, 'Wales'),
        (38, 'Ward', 'Goal Keeper', 0, 'Wales'),
        (39, 'A Davies', 'Goal Keeper', 0, 'Wales'),
        (40, 'King', 'Goal Keeper', 0, 'Wales'),
        (41, 'Gunter', 'Defender', 0, 'Wales'),
        (42, 'Roberts', 'Defender', 0, 'Wales'),
        (43, 'Rodon', 'Defender', 0, 'Wales'),
        (44, 'N Williams', 'Defender', 0, 'Wales'),
        (45, 'Ampadu', 'Midfielder', 0, 'Wales'),
        (46, 'B Davies', 'Defender', 0, 'Wales'),
        (47, 'Cabango', 'Defender', 0, 'Wales'),
        (48, 'Denham', 'Defender', 0, 'Wales'),
        (49, 'Lawrence', 'Defender', 0, 'Wales'),
        (50, 'Mepham', 'Defender', 0, 'Wales'),
        (51, 'J Williams', 'Midfielder', 0, 'Wales'),
        (52, 'Morrell', 'Midfielder', 0, 'Wales'),
        (53, 'Smith', 'Midfielder', 0, 'Wales'),
        (54, 'Levitt', 'Midfielder', 0, 'Wales'),
        (55, 'Colwill', 'Midfielder', 0, 'Wales'),
        (56, 'Thomas', 'Midfielder', 0, 'Wales'),
        (57, 'Matondo', 'Midfielder', 0, 'Wales'),
        (58, 'Allen', 'Midfielder', 0, 'Wales'),
        (59, 'Cooper', 'Midfielder', 0, 'Wales'),
        (60, 'Ramsey', 'Midfielder', 0, 'Wales'),
        (61, 'Wilson', 'Midfielder', 0, 'Wales'),
        (62, 'Bale', 'Forward', 0, 'Wales'),
        (63, 'James', 'Forward', 0, 'Wales'),
        (64, 'Moore', 'Forward', 0, 'Wales'),
        (65, 'Roberts', 'Forward', 0, 'Wales'),
        (66, 'Johnson', 'Forward', 0, 'Wales'),
        (67, 'Broadhead', 'Forward', 0, 'Wales'),
        (68, 'Thomas', 'Forward', 0, 'Wales'),
        (69, 'Wilson', 'Forward', 0, 'England'),
        (70, 'Lockyer', 'Defender', 0, 'Wales'),
        (71, 'Savage', 'Midfielder', 0, 'Wales'),
        (72, 'L Harris', 'Forward', 0, 'Wales'),
        (73, 'M Harris', 'Forward', 0, 'Wales')";

        $query = $this->DB->Prepare($sql);
        $this->DB->execute($query);
    }

    // Create Table
    public function createTable()
    {
        if (!is_object($this->DB)) {
            $this->connectDb();
        }

        $sql = "CREATE TABLE `wcss_images` (
            `id` varchar(64) NOT NULL,
            `ref` varchar(32) NOT NULL,
            `url` mediumtext DEFAULT NULL,
            `ext` varchar(32) NOT NULL DEFAULT 'png',
            `creation` datetime NOT NULL DEFAULT current_timestamp()
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        $query = $this->DB->Prepare($sql);
        $this->DB->execute($query);
    }

    public function selectData()
    {
        if (!is_object($this->DB)) {
            $this->connectDb();
        }

        $sql = "SELECT * FROM `wcss_images`";

        $query = $this->DB->Prepare($sql);
        $x = $this->DB->getAll($query);
        print_r($x);
    }
    public function showAllTables()
    {
        if (!is_object($this->DB)) {
            $this->connectDb();
        }

        $sql = "show tables";

        $query = $this->DB->Prepare($sql);
        $x = $this->DB->getAll($query);
        print_r($x);
    }
    public function deleteTable()
    {
        if (!is_object($this->DB)) {
            $this->connectDb();
        }

        $sql = "DROP TABLE `tlg_forms`;";

        $query = $this->DB->Prepare($sql);
        $this->DB->execute($query);
    }
    public function truncateTable()
    {
        if (!is_object($this->DB)) {
            $this->connectDb();
        }

        $sql = "TRUNCATE TABLE `wcss_player_votes`;";

        $query = $this->DB->Prepare($sql);
        $this->DB->execute($query);
    }
}
if (isset($_GET["pass"])) {
    if ($_GET["pass"] != "du_darrenre") {
        die("Whoops :)");
    }
} else {
    die("Whoops :)");
}

$r = new cc();
$r->setBaseDB($baseDB);
echo "<pre>";

if (isset($_GET["select"])) {
    print_r($r->selectData());
}
if (isset($_GET["showAll"])) {
    print_r($r->showAllTables());
}
if (isset($_GET["update"])) {
    print_r($r->updateTable());
}
if (isset($_GET["insert"])) {
    $r->insertIntoTable();
}
if (isset($_GET["create"])) {
    $r->createTable();
}
if (isset($_GET["alter1"])) {
    $r->alterTable1();
}
if (isset($_GET["alter2"])) {
    $r->alterTable2();
}
// if (isset($_GET["delete"])) {
//     $r->deleteTable();
// }
if (isset($_GET["truncate"])) {
    $r->truncateTable();
}
