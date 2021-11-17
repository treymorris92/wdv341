<?php

    class event{
        public $eventId;
        public $eventName;
        public $eventDescription;
        public $eventPresenter;
        public $eventTime;
        public $eventDate;

        function setEventId($inId){
            $this->eventId = $inId;
        }

        function getEventId(){
            return $this->eventId;
        }

        function setEventName($inName){
            $this->eventName = $inName;
        }

        function getEventName(){
            return $this->eventName;
        }
        
        function setEventDescription($inDescription){
            $this->eventDescription = $inDescription;
        }

        function getEventDescription(){
            return $this->eventDescription;
        }

        public function getEventPresenter(){
            return $this->eventPresenter;
        }
    
        public function setEventPresenter($inEventPresenter){
            $this->eventPresenter = $inEventPresenter;
            return $this;
        }
        
        public function getEventTime(){
            return $this->eventTime;
        }

        public function setEventTime($ineventTime){
            $this->eventTime = $ineventTime;
            return $this;
        }

        public function getEventDate(){
            return $this->eventDate;
        }

        public function setEventDate($ineventDate){
            $this->eventDate = $ineventDate;
            return $this;
        }

    }//end event class

?>