<?php

namespace Etewa\Model;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

/**
 * Class SportModel
 * @package Etewa\Model
 */
class SportModel
{
    /**
     * @return array
     */
    public function findAll()
    {
        $contents = Yaml::parse(file_get_contents('../src/yaml/sport.yml'));
        return $contents;
    }

    /**
     * @param int $id
     * @return array
     */
    public function findById(int $id) : array
    {
        try {
            $contents = $this->findAll();
            $filter = array_filter($contents['sports'], function ($value) use ($id) {
                return $value['id'] == $id;
            });

            if (empty($contents)) {
                return null;
            }

            return $filter;
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
    }

    /**
     * @param $value
     * @return int
     */
    public function add($value)
    {
        $id = $this->generateId();
        $array = [
            'id' => $id,
            'name' => $value
        ];

        $content_old = Yaml::parse(file_get_contents('../src/yaml/sport.yml'));
        array_push($content_old['sports'], $array);

        $yaml = Yaml::dump($content_old);

        return file_put_contents('../src/yaml/sport.yml', $yaml);

    }

    /**
     * @return int
     */
    public function generateId(): int
    {
        $content_old = Yaml::parse(file_get_contents('../src/yaml/sport.yml'));

        $new_id = array_map(function ($id_value) {
              return $id_value['id'];
        }, $content_old['sports']);

        return max($new_id) + 1;
    }

    public function getNewSport($name)
    {
        $new = [
            'id' =>$this->generateId(),
            'name' => $name
        ];
       return json_encode($new);
    }

}