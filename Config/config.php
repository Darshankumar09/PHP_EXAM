<?php

class Config
{
    public $HOSTNAME = "127.0.0.1";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DB_NAME = "employee";
    public $con_res;

    public function connect()
    {
        $this->con_res = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);
        return $this->con_res;
    }

    public function insert($name, $post, $email, $salary)
    {
        $this->connect();

        $query = "INSERT INTO employee_data(name, post, email, salary) VALUES ('$name', '$post', '$email', $salary)";

        $res = mysqli_query($this->con_res, $query);
        return $res;
    }

    public function fetch()
    {
        $this->connect();

        $query = "SELECT *FROM employee_data;";

        $res = mysqli_query($this->con_res, $query);
        return $res;
    }

    public function update($name, $post, $email, $salary, $id)
    {
        $this->connect();

        $query = "UPDATE employee_data SET name='$name', post='$post', email='$email', salary=$salary WHERE id=$id;";

        $res = mysqli_query($this->con_res, $query);
        return $res;
    }

    public function delete($id)
    {
        $this->connect();

        $query = "DELETE FROM employee_data WHERE id=$id;";

        $res = mysqli_query($this->con_res, $query);
        return $res;
    }
}

?>