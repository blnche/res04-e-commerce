<?php
    class User {
        private ?int $id;
        private string $first_name;
        private string $last_name;
        private string $email;
        private string $password;
    
        public function __construct(string $first_name, string $last_name, string $email, string $password) {
            $this->id = null;
            $this->firstName = $first_name;
            $this->lastName = $last_name;
            $this->email = $email;
            $this->password = $password;
        }
        
        public function setId(int $id): void {
        $this->id = $id;
        }
    
        public function getId(): ?int {
            return $this->id;
        }
    
        public function getFirstName(): string {
            return $this->username;
        }
    
        public function setFirstName(string $name): void {
            $this->username = $name;
        }
    
        public function getEmail(): string {
            return $this->email;
        }
            
        public function getLastName(): string {
            return $this->username;
        }
    
        public function setLastName(string $name): void {
            $this->username = $name;
        }
    
        public function getEmail(): string {
            return $this->email;
        }
    
        public function setEmail(string $email): void {
            $this->email = $email;
        }
    
        public function getPassword(): string {
            return $this->password;
        }
    
        public function setPassword(string $password): void {
            $this->password = $password;
        }
    }
?>