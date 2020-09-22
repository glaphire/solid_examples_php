<?php

/**
 * Entities must depend on abstractions not on concretions.
 * High level module must not depend on the low level module, but they should depend on abstractions.
 * А particular class should not depend directly on another class but on an abstraction of this class.
 */

/**
 * Bad example.
 * UserModel1 depends on concrete type of connection - MySQLConnection class
 */
class User {}

class UserModel1 {

    private $dbConnection;

    public function __construct(MySQLConnection $dbConnection) {
        $this->$dbConnection = $dbConnection;
    }

    public function store(User $user) {
        // Store the user into a database...
    }
}

/**
 * Good example.
 * UserModel2 depends on interface of db connection,
 * so connection can be easily replaceable
 */
interface DBConnectionInterface {
    public function connect();
}

class MySQLConnection implements DBConnectionInterface {

    public function connect() {
        // Return the MySQL connection...
    }
}

class UserModel2 {

    private $dbConnection;

    public function __construct(DBConnectionInterface $dbConnection) {
        $this->$dbConnection = $dbConnection;
    }

    public function store(User $user) {
        // Store the user into a database...
    }
}
