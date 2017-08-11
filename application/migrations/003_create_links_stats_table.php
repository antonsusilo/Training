<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_links_stats_table extends CI_Migration {

        public function up()
        {

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
                $this->dbforge->create_table('links_stats');
        }

        public function down()
        {

                $this->dbforge->drop_table('links_stats');
        }
}
