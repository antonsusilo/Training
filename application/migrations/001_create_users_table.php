<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_users_table extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'username' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'null' => FALSE
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'null' => FALSE
                        ),

                        'email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100
                        ),
                        'first_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'null' => FALSE
                        ),
                        'last_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'null' => FALSE
                        ),
                        'created' => array(
                                'type' => 'INT',
                                'constraint' => 100,
                                'null' => TRUE
                        ),
                        'updated' => array(
                                'type' => 'INT',
                                'constraint' => 100,
                                'null' => TRUE
                        ),
                        'deleted' => array(
                                'type' => 'INT',
                                'constraint' => 100,
                                'null' => TRUE
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('users');

        }

        public function down()
        {
                $this->dbforge->drop_table('users');

        }
}
