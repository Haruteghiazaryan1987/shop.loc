<?php


interface iDatabase

{
    /*
     * change table
 * insert data into db
 * @para, $table string
 *      'age' => '25',
 * ]
 *  return Database
 */
    public function setTable($table);
    /*
     * insert data into db
     * @para, $data = [
     *      'firstname' => 'poghos',
     *      'lastname' => 'poghosyan',
     *      'age' => '25',
     * ]
     *
     */
    public function insert($data);

    /*
    * @para, $what = ['id', 'firstname'] default
    *
    */
    public function select($what);

    /*
    *  @para, $data = [
     *      'firstname' => 'petros',

    *
    */
    public function update($data);

    /*
    *
    */
    public function delete($what);


}