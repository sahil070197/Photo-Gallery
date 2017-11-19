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
		$object_vars=$this->all_object_attributes(); //it includes private attributes;
		return array_key_exists($attribute, $object_vars);
	}
        protected function all_object_attributes()
        {
           $attributes=array();
           foreach (self::$db_field as $field)
           {
               if(property_exists($this, $field))
               {
                   $attributes[$field]=$this->$field;
               }
           }
           return $attributes;
               
        }
        protected function escaped_value_attributes()
        {
            global $database;
            $attributes=  get_object_vars($this);
            $cleaned_attributes=array();
            foreach ($attributes as $key=>$value)
            {
            $cleaned_attributes[$key]=$database->escape_value($value);
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
            $sql="Insert into ".self::$table_name." Values('";
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
            $sql="Update ".self::$table_name." SET ".join(", ", $attribute_pairs);
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
            $sql="Delete from ".self::$table_name." where id='".$this->id."' Limit 1;";
            $database->query($sql);
            if($database->affected_rows()==1)
            {
                return true;
            }
 else {
                return false;
 }
                
        }
}
?>