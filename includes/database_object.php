<?php

class Database_Object{
	protected static $table_name="";
        protected static $db_fields=array();
        public static function find_all()
	{
		global $database;
		$query="Select * from ".static::$table_name;
		return static::find_by_sql($query);
	}
	public static function find_by_id($id=0)
	{
		global $database;
		$query="Select * from ".static::$table_name." where id='{$id}'";
		$result_array=static::find_by_sql($query);
		
		return !empty($result_array)?array_shift($result_array):false;
	}
	public static function find_by_sql($sql="")
	{
		$object_array=array();
		global $database;
		$result_set=$database->query($sql);
		while($row=$database->fetch_array($result_set))
		{
			$object_array[]=static::instantiate($row);
		}
		return $object_array;
	}
	private function has_attribute($attribute)
	{
		$object_vars=$this->object_attributes();//it includes private attributes;
		return array_key_exists($attribute, $object_vars);
	}
        protected function object_attributes()
        {
            $attributes=array();
            foreach (static::$db_fields as $field)
            {
                if(property_exists($this, $field))
                {
                    $attributes[$field]=  $this->$field;
                }
            }
                return $attributes;
        }
        protected function escaped_value_attributes()
        {
                global $database;
                $cleaned_attributes=array();
                $attributes=$this->object_attributes();
                foreach($attributes as $attribute=>$key)
                {
                    $cleaned_attributes[$attribute]=$database->escape_value($key);
                }
                return $cleaned_attributes;
        }

        private static function instantiate($record)
	{
		$object=new static;
	//	$object->id=$record['id'];
	//	$object->username=$record['username'];
	//	$object->password=$record['password'];
	//	$object->first_name=$record['first_name'];
	//	$object->last_name=$record['last_name'];
		foreach($record as $attribute=>$value)
		{
			if($object->has_attribute($attribute))
			{
				$object->$attribute=$value;
			}
		}
		return $object;
	}
          public function save()
        {
            return isset($this->id)?$this->update():$this->create();
        }

        public function create()
        {
            global $database;
            $attributes=$this->escaped_value_attributes();
            $sql="Insert into ".static::$table_name." (". join(", ", array_keys($attributes)).") Values ('";
            $sql.=join("', '", array_values($attributes));
            $sql.="');";
            if($database->query($sql))
            {
                $this->id=$database->insert_id();
                return true;
            }
            else
            {
                return FALSE;
            }
                    
        }
        
        public function update()
        {
            global $database;
            $attributes=$this->escaped_value_attributes();
            foreach ($attributes as $key=>$value)
            {
            $attribute_pairs[]="{$key}='{$value}'";
            }   
            $sql="Update ".static::$table_name." SET ".join(", ", $attribute_pairs);
            $sql.="Where id=".$this->id.";";
            $database->query($sql);
            if($database->affected_rows()==1)
            {
                return true;
            }
             else {
                return false;
            }
        }
        public function delete()
        {
            global $database;
            $sql="Delete from ".static::$table_name." where id='".$this->id."' Limit 1;";
            $database->query($sql);
            if($database->affected_rows()==1)
            {
                return true;
            }
 else {         return false;
 }
                
        }
        public static function count_all()
        {
            $sql="Select count(*) from ".static::$table_name." ;";
            global $database;
            $result_set=$database->query($sql);
            $row=$database->fetch_array($result_set);
            return array_shift($row);
        
        }
}
?>