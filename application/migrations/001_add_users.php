<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration {

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
                $this->dbforge->create_table('Users');

                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'user_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE
                        ),
                        'code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100
                        ),
                        'link' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100
                        ),

                        'expired' => array(
                                'type' => 'INT',
                                'constraint' => 100,
                                'null' => TRUE
                        ),
                        'created' => array(
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
                $this->dbforge->create_table('Links');

                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'link_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE
                        ),
                        'ip' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'null' => FALSE
                        ),
                        'browser' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'null' => FALSE
                        ),

                        'time' => array(
                                'type' => 'INT',
                                'constraint' => 100,
                                'null' => TRUE
                        ),

                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('Links_stats');
        }

        public function down()
        {
                $this->dbforge->drop_table('Users');
                $this->dbforge->drop_table('Links');
                $this->dbforge->drop_table('Links_stats');
        }
}
