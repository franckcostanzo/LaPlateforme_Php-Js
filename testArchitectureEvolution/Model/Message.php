<?php 

require_once 'Model/Model.php';

class Message extends Model 
{
    public function __construct() {}

    public function getAllMessages() 
    {
        $sql=   "SELECT messages.*, users.login 
                FROM messages
                INNER JOIN users ON messages.id_user = users.id_user";

        $getAllQuery = $this->requestExecute($sql);

        return $getAllQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addMessage($message, $id_user)
    {

        $params = array($message, $id_user);

        $sql=   "INSERT INTO messages (`message_id`, `message`, `id_user`) 
                VALUES (NULL, ?, ?)";

        $addQuery = $this->requestExecute($sql, $params);

        return $addQuery;
    }


}