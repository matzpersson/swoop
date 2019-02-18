<?PHP
require '../resources/utils/model.php';

// Messages class demonstrating class exetension from Model (even though overkill for this scenario)
class Messages extends Model
{
    public function __construct()
    {
        $this->db = New Db();
    }

    public function getCumulative($classType, $fromDate, $toDate) {
        $sql = "SELECT 
                    DATE_FORMAT(MessageDate,'%Y-%m-%d') as MessageDate,
                    count(MessageDate) as DayCount
                FROM messages 
                WHERE Class = :classType
                    AND MessageDate between :fromDate
                    AND :toDate
                GROUP by DATE_FORMAT(MessageDate,'%Y-%m-%d')";

        $params = ['classType' => $classType, 'fromDate' => $fromDate, 'toDate' => $toDate];
        return $this->select($sql, $params);
    }
}
?>
