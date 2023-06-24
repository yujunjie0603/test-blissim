<?php
/**
 * @author lyu 
 * @since 1.0.0 21/06/2023
 * pour le test blissim
 */

include_once('./AbstractBlissim.php');

class Client extends AbstractBlissim
{
    protected $_tablename = "clients";
    public $id;
    public $email;
    public $password;
    public $name;
    public $create_at;
    public $update_at;
    public $delete_at;

    public function __construct($id)
    {
        parent::__construct($id);
    }

    /**
     * Méthode magique pour donner la valeur du champ 
     * @param mixed $name
     * @param mixed $value
     * @return void
     */
    public function __set ($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * Méthode magique pour récupérer les données du client 
     *
     * @param  string   $name   Nom du champ dans la table
     * @return mixed
     */
    public function __get ($name)
    {
        return $this->$name;
    }    
    /**
     * Summary of create
     * @return bool
     */
    public function create()
    {
        $this->create_at = date('Y-m-d H:i:s');
        return $this->save("create");
    }

    /**
     * Summary of update
     * @return bool
     */
    public function update()
    {
        $this->update_at = date('Y-m-d H:i:s');
        return $this->save("update");
    }

    
    /**
     * pas de delete, delete = delete_at is not null
     * @return bool
     */
    public function delete()
    {
        $this->delete_at = date('Y-m-d H:i:s');
        return $this->save("update");
    }
}