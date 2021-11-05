<?php

namespace App\Core;

use App\Core\Database\MySql\Database;

abstract class Model {
    protected $db;
    protected $table;

    // TODO6 : rabetey yek be chand ro piyadesazi konid
    // TODO emtiyazi : kollan system relation ha refactore shavad be tori ke tedad query haye kamtari zade shavad

    public function __construct() {
        $this->db = new Database; 
        $this->db->setTable($this->table);
    }

    public static function do() {
        return new static;
    }

    public function create(array $data) {
        $this->db->insert($data);
        return $this->db->lastId();
    }

    public function update(array $data, array $where) {
        $this->db->update($data, $where);
    }

    public function delete(array $where) {
        $this->db->remove($where);
    }

    public function find(string $value, string $column = 'id') {
        $model = $this->db->read([
            $column => $value
        ]);

        if (count($model) === 0)
            return null;

        return $model[0];
    }

    public function readIn($column, $values) {
        return $this->db->readIn($column, $values);
    }

    public function all() {
        return $this->db->read();
    }

    public function getManyToManyIds($id, $pivot_table, $foreign_key, $related_foreign_key) {
        $pivot = Database::onTable($pivot_table)->read([$foreign_key => $id]);
        $ids = [];
        foreach($pivot as $record) {
            array_push($ids, $record->$related_foreign_key);
        }

        return $ids;
    }

    public function getManyToManyRelation($id, $pivot_table, $related_table, $foreign_key, $related_foreign_key) {
        
        return Database::onTable($related_table)->readIn(
            'id',
            $this->getManyToManyIds($id, $pivot_table, $foreign_key, $related_foreign_key),
        );
    }

    public function setManyToManyRelation($clinic_id, $section_id, $pivot_table) {
        $pivot = Database::onTable($pivot_table)->insert(compact('clinic_id', 'section_id'));
    }

}