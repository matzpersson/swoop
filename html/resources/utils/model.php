<?PHP
require '../resources/utils/db.php';

// Model template abstracted from db layer
class Model
{
    protected $db;

    public function select($sql, $params)
    {
        $result = $this->db->select($sql, $params);
        return $result;
    }    
}
?>