<?php

// FolkDB - R&D ICWR

class folkdb
{

    public function folkdb_encode($data)
    {

        for($i=0; $i < strlen($data); $i++) {

            if(!empty($data[$i])) {

                $tmp_char[$i] = "\\x" . ord($data[$i]);

            }

        }

        return join("", $tmp_char);

    }

    public function folkdb_decode($data)
    {

        $tmp_char = explode("\\x", $data);

        for($i=0; $i < count($tmp_char); $i++) {

            if(!empty($tmp_char[$i])) {

                $char[$i] = chr($tmp_char[$i]);

            }

        }

        return join("", $char);

    }

    public function folkdb_open($db)
    {

        if(substr($db, strrpos($db, '-') + 1) == "folkdb") {

            $data = json_decode(file_get_contents($db));
            return $data;

        }

    }

    public function folkdb_write($db, $data)
    {

        if(substr($db, strrpos($db, '-') + 1) == "folkdb" && file_put_contents($db, $data)) {

            return true;

        } else {

            return false;

        }

    }

}
