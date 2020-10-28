<?php

    class Document {

        private $idAccess;
        private $numberDocument;
        private $documentType;
        private $documentOwner;
        private $documentTransit;
        private $documentProcessing;
        private $documentNature;
        private $documentInterested; 
        private $documentDestination; 
        private $documentSubject;

        public function getIdAccess (){
            return $this->idAccess;
        }
        public function getNumberDocument (){
            return $this->numberDocument;
        }
        public function getDocumentType (){
            return $this->documentType;
        }
        public function getDocumentOwner (){
            return $this->documentOwner;
        }
        public function getDocumentTransit (){
            return $this->documentTransit;
        }
        public function getDocumentProcessing (){
            return $this->documentProcessing;
        }
        public function getDocumentNature (){
            return $this->documentNature;
        }
        public function getDocumentInterested (){
            return $this->documentInterested;
        } 
        public function getDocumentDestination (){
            return $this->documentDestination;
        } 
        public function getDocumentSubject (){
            return $this->documentSubject;
        }
        public function setIdAccess ($idAccess){
            return $this->idAccess = $idAccess;
        }
        public function setNumberDocument ($numberDocument){
            return $this->numberDocument = $numberDocument;
        }
        public function setDocumentType ($type){
            return $this->documentType = $type;
        }
        public function setDocumentOwner ($documentOwner){
            return $this->documentOwner = $documentOwner;
        }
        public function setDocumentTransit ($documentTransit){
            return $this->documentTransit = $documentTransit;
        }
        public function setDocumentProcessing ($documentProcessing){
            return $this->documentProcessing = $documentProcessing;
        }
        public function setDocumentNature ($documentNature){
            return $this->documentNature;
        }
        public function setDocumentInterested ($documentInterested){
            return $this->documentInterested = $documentInterested;
        } 
        public function setDocumentDestination ($documentDestination){
            return $this->documentDestination = $documentDestination;
        } 
        public function setDocumentSubject ($documentSubject){
            return $this->documentSubject = $documentSubject;
        }
               
        function documentType($key){                  
            
            $key = array_filter($key, function($key){
                return $key->documentType == Document::getDocumentType(); 
            }); 

            return $key;                                
        }
        
        function documentTransit($key){  
            $key = array_filter($key, function($key){
                    return $key->documentTransit == $_POST['documentTransit'];   
                });  
            return $key;                               
        }
        function documentProcessing($key){  
            $key = array_filter($key, function($key){
                    return $key->documentProcessing == $_POST['documentProcessing'];   
                });  
            return $key;                               
        }
        function documentNature($key){  
            $key = array_filter($key, function($key){
                    return $key->documentNature == $_POST['documentNature'];   
                });
            return $key;                                 
        }
        function documentSubject($key) {
            $key = array_filter($key, function($key){
                return stristr($key->documentSubject, $_POST['documentSubject']);
            });
            return $key;
        }
        function documentInterested($key) {
            $key = array_filter($key, function($key){
                return stristr($key->documentInterested, $_POST['documentInterested']);
            });
            return $key;
        }
        function documentDestination($key) {
            $key = array_filter($key, function($key){
                return stristr($key->documentDestination, $_POST['documentDestination']);
            });
            return $key;
        }        
        function newNumber($dataDocument, $owner){        
            /*echo "<pre>";
            var_dump($dataDocument);
            echo "</pre>";*/
            Document::setDocumentType($dataDocument->documentType);
            //echo "Tipo".Document::getDocumentType();
            $selectedDocuments = DocumentNumerator::selectedByOwner($dataDocument->documentOwner);
           
            $number = array_keys(Document::documentType($selectedDocuments));


            
            echo "<pre>";
            
            print_r($number);
            print_r(Document::documentType($selectedDocuments));
            echo "</pre>";
            
            return $number;          
        }
    }
?>