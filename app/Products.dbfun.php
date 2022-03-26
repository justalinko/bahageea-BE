<?php

namespace Reiko;

/**
 * REIKO FRAMEWORK 
 *  
 * @package ReiKo Framework
 *
 * @author alinko <alinkokomansuby@gmail.com>
 * @author ReiYan <hariyantoriyan.hr@gmail.com>
 * @copyright (c) 2021 
 * 
 * @license MIT 
 * 
 */

use Reiko\Libraries\DB;
use Reiko\Libraries\Schema;
use Faker;

class Products extends DB
{
    protected $table = "products";
    protected $id    = "id";

    public function __construct()
    {
        parent::__construct();
        $this->table($this->table);
    }


    /**
     * migration method
     *
     * @param  string $method ( up , down , restart )
     * @return void
     */
    public function migration($method = 'up')
    {
        $schema = Schema::create(
            $this->table,
            [
                'primary_key' => 'id',
                'id' => 'int|11|increment',
                'created_at' => 'timestamp|on_create',
                'updated_at' => 'timestamp|on_update'
            ]
        );

        if ($method == 'up') {
            echo "[!] Running migration up ... \n";
            if ($this->exec($schema)) {
                echo "[+] Created table successfully \n";
            } else {
                echo "[-] Create table failed \n";
            }
        } elseif ($method == 'down') {
            echo "[!] Running migration down ... \n";
            if ($this->exec(Schema::dropIfExists($this->table))) {
                echo "[+] Delete table successfully \n";
            } else {
                echo "[-] Delete table failed \n";
            }
        } elseif ($method == 'restart') {
            echo "[!] Running migration down ... \n";
            if ($this->exec(Schema::dropIfExists($this->table))) {
                echo "[+] Delete table successfully \n";
            } else {
                echo "[-] Delete table failed \n";
            }

            echo "[!] Running migration up ... \n";
            if ($this->exec($schema)) {
                echo "[+] Created table successfully \n";
            } else {
                echo "[-] Create table failed \n";
            }
        }
    }

    /**
     * MAKE A SEEDER HERE
     *
     * @param  string  $method
     * @param  integer $total
     * @return void
     */
    public function seeder($method = 'up', $total = 10)
    {
        $faker = Faker\Factory::create();

        if ($method == 'up') {
            for ($i = 1; $i <= $total; $i++) {
                $this->create(
                    ['column' => 'value']
                );
                echo "[$i] DATA INSERTED SUCCESSFULLY \n";
            }
        } else {
            $this->truncate();
            echo "[{$this->table}] TABLE TRUNCATED SUCCESSFULLY \n";
        }
    }
    /**
     * The reiko framework generated basic function for CRUD 
     *  @method create
     *  @method readAll
     *  @method readById
     *  @method change
     *  @method remove
     * 
     **/
    public function create($data = [])
    {
        return $this->save($data);
    }

    public function readAll()
    {
        return $this->select('*')->get();
    }

    public function remove($id)
    {
        return $this->where([$this->id => $id])->delete();
    }

    public function readById($id)
    {
        return $this->find([$this->id => $id]);
    }

    public function change($data = [], $id)
    {
        return $this->set($data)->where([$this->id => $id])->update();
    }

    /** 
     *  You can add your method bellow
     */
}
