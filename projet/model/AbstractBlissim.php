<?php
include_once("MysqlConnect.php");
abstract class AbstractBlissim
{
	protected $_db;
	protected $_tablename;
	public $id;
    public $liste_fields; // un tableau avec tous les champs de table et la valeur defaut de table, example table client, array(id=>null, email => null, ...)
	public function __construct($id = "") {

		if(!isset($this->_tablename)) {
			throw new LogicException(get_class($this) . ' must have a $tablename');
		}
        $this->_db = MySQL::getInstance();
        $sql_params = "SHOW COLUMNS FROM " . $this->_tablename;
        $res_params = $this->_db->query($sql_params);

        if ($res_params->num_rows) {
            while($val_params = $res_params->fetch_assoc()) {
                $this->liste_fields[$val_params['Field']] = $val_params['Default'];
            }
        } else {
            throw new Exception('Dont find ' . $this->_tablename);
        }
        if ($id) {
            $id = $this->_db->real_escape_string($id);
            $sql = "SELECT * FROM " . $this->_tablename . " WHERE id = '" . $id . "'";
            $res = $this->_db->query($sql);
            if ($res->num_rows) {
                $val = $res->fetch_assoc();
                if ($val) {
                    $this->hydrate($val);
                } else {
                    throw new Exception('Error Get information ' . $id);
                }
            } else {
                throw new Exception('Dont find ' . $id);
            }
        }        
	}
    /**
     * Summary of save
     * @param mixed $type create ou update, pour créer ou modifier
     * @return bool
     */
    public function save($type)
    {
		$a_data = $this->getArrayDataBase();
        $insert_data = array();
        if (!$this->id && $type == "create"){
            // vérifier les data avec real_escape_string
            unset($a_data['id']);
            foreach($a_data as $value) {
                $insert_data[] = $value;
            }
            $sql_fields = "";
            $in = str_repeat('?,', count($a_data) - 1) . '?';
            $types = str_repeat('s', count($a_data));
            $sql = "INSERT INTO " . $this->_tablename . " (" . implode(',', array_keys($a_data)) . ") VALUES (" . $in . ")";
            $stmt = $this->_db->prepare($sql);
            var_dump($a_data);
            $stmt->bind_param($types, ...$insert_data);
            if ($stmt->execute()) {
                echo "33333333333333";
                // ini valeur id
                return $this->id = $stmt->insert_id;
            } else {
                throw new Exception('Erreur création');
            }
        } else {
            $sql = "UPDATE " . $this->_tablename . " SET ";
            $first_field = true;
            foreach ($a_data as $key => $value) {
                if (!in_array($key, array('id'))) {
                    if (!$first_field) {
                        $sql = $sql . ", " . $key . "= '" . $value . "'";
                    } else {
                        $sql = $sql . $key . "= '" . $value . "'";
                        $first_field = false;
                    }
                }
            }
            $sql = $sql . " WHERE id = " . $this->id;
            if (!$this->_db->query($sql)) {
                throw new Exception('Erreur modification');
            }
        }
        return false;
    }

    /**
     * Summary of create
     * @return bool
     */
    abstract public function create();

    abstract public function update();
    
    abstract public function delete();

/**
 * [ini data]
 * @param  array  $donnees 
 * @return [void]          
 */
	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value){
			$this->$key = $value;
		}
	}

/**
 * [getArrayDataBase vérifier les éléments]
 * @return [array] [valeurs parcouru par real_escape_string]
 */
	public function getArrayDataBase()
	{
		$a_data = array();
		foreach ($this->liste_fields as $key => $value) {
			if ($this->$key) {
				$a_data[$key] = $this->_db->real_escape_string( $this->$key );
			} else {
				$a_data[$key] = $value;
			}
		}
		return $a_data;
	}	
}

?>
