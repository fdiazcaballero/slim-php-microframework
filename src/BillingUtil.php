<?php

class BillingUtil{
    
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $connection;
       
    /**
     * 
     * @param type $servername
     * @param type $username
     * @param type $password
     * @param type $dbname
     * 
     */
    public function __construct($servername="localhost", $username="root", $password="", $dbname="billingtest")
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->connection = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        } 
    }
    
    /**
     * 
     * @param type $sql
     * @return type JSON
     * 
     */
    public function extractJsonFromDb($sql){
        
	try{
            $result = $this->connection->query($sql);

            if (!$result) {
                return json_encode("Error in query: " .$this->connection->error);
            }

            $output="";
            $result_array=array();
            $output_array=array();

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    array_push($result_array, $row);
                }
            }
            $this->connection->close();
            $customer_obj=$this->getCustomerEntryObj();
            $line_item=$this->getLineItemEntryObj();

            for ($i=0; $i<count($result_array); $i++){
                if(($i>0 && $result_array[$i]["zoho_books_contact_id"]!=$result_array[$i-1]["zoho_books_contact_id"]) || $i==0 )  {
                    $customer_obj=$this->getCustomerEntryObj();
                    $line_item=$this->getLineItemEntryObj();

                    $customer_obj->customer_id=$result_array[$i]["zoho_books_contact_id"];
                    $line_items=array();
                    $line_item->description=$result_array[$i]["description"];
                    $line_item->rate=$result_array[$i]["rate"];
                    array_push($line_items,$line_item);
                    $customer_obj->line_items=$line_items;
                    array_push($output_array, $customer_obj);

                } 
                else{
                    $line_item=$this->getLineItemEntryObj();
                    $line_item->description=$result_array[$i]["description"];
                    $line_item->rate=$result_array[$i]["rate"];
                    array_push($output_array[count($output_array)-1]->line_items,$line_item);
                }

            }
	}
	catch(Exception $e) {
		return json_encode("There was an error in the database handling");
	}

        return nl2br(json_encode($output_array, JSON_PRETTY_PRINT));        
    }
    
    /**
     * 
     * @return \stdClass
     * 
     */
    private function getCustomerEntryObj(){
        $customer_obj=new stdClass();
        $customer_obj->customer_id="";  //this will be filled from db
        $customer_obj->date="2013-08-05";
        $customer_obj->line_items=array();
        $customer_obj->notes="Thanks for your business.";
        
        return $customer_obj;
    }
    
    /**
     * 
     * @return \stdClass
     * 
     */
    private function getLineItemEntryObj(){
        $line_item=new stdClass();
        $line_item->item_id="460000000027017";
        $line_item->project_id= "";
        $line_item->expense_id="";
        $line_item->name="Print Services";
        $line_item->description=""; //this will be filled from db
        $line_item->item_order=1;
        $line_item->rate=""; //this will be filled from db
        $line_item->unit= "Nos";
        $line_item->quantity= 1.00;
        $line_item->discount=0.00;
        $line_item->tax_id="460000000027005";
        
        return $line_item;
    }    
    
}



