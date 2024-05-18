<?php
class Book {
 // TODO: Add properties as Private
 private $title;
 private $availableCopies;
 private $borrowedCopies;
 private $members;

 
 public function __construct($title, $availableCopies) {
     // TODO: Initialize properties
      $this->title = $title;
      $this->availableCopies = $availableCopies;
      $this->borrowedCopies = 0;
      $this->members = array();


     }
     // TODO: Add getTitle method
      
     public function getTitle() {
         return $this->title;
     }


 // TODO: Add getAvailableCopies method
  public function getAvailableCopies() {
      return $this->availableCopies;
  }
 


 // TODO: Add borrowBook method
 
 public function borrowBook($member) {
     if ($this->availableCopies > 0) {
         $this->availableCopies--;
         $this->borrowedCopies++;
         array_push($this->members, $member);
     }
 }
   // TODO: Add getBorrowedCopies method
   public function getBorrowedCopies() {
       return $this->borrowedCopies;
   }
   // TODO: Add getMembers method
   public function getMembers() {
     return $this->members;
 }



 // TODO: Add returnBook method
  public function returnBook($member) {
     if (in_array($member, $this->members)) {
         $this->availableCopies++;
         $this->borrowedCopies--;
         $key = array_search($member, $this->members);
         unset($this->members[$key]);
     }
 }


}

class Member {
 // TODO: Add properties as Private
  private $name;
  private $borrowedBooks;
  private $books;
  private $booksBorrowed;
  private $booksAvailable;
  private $booksBorrowedArray;
  private $booksAvailableArray;

 public function __construct($name) {
      // TODO: Initialize properties   
   $this->name = $name;
     $this->borrowedBooks = array();
     $this->books = array();
     $this->booksBorrowed = 0;
     $this->booksAvailable = 0;
     $this->booksBorrowedArray = array();
     $this->booksAvailableArray = array();
     }



 // TODO: Add getName method
   public function getName() {
       return $this->name;
   }
 
 // TODO: Add borrowBook method
  public function borrowBook($book) {
      if ($book->getAvailableCopies() > 0) {
          $book->borrowBook($this->name);
          array_push($this->borrowedBooks, $book);
          $this->booksBorrowed++;
          $this->booksAvailable--;
          array_push($this->booksBorrowedArray, $book->getTitle());
          array_push($this->booksAvailableArray, $book->getAvailableCopies());
      }
  }


 // TODO: Add returnBook method
  public function returnBook($book) {
  
      if (in_array($book, $this->borrowedBooks)) {
         $book->returnBook($this->name);
         $key = array_search($book, $this->borrowedBooks);
         unset($this->borrowedBooks[$key]);
         $this->booksBorrowed--;
         $this->booksAvailable++;
         array_push($this->booksBorrowedArray, $book->getTitle());
         array_push($this->booksAvailableArray, $book->getAvailableCopies());
      
      }

    }

}
// You have to create  2 books and 2 members. Members One should borrow  book 1 and Member Two should borrow  book 2.
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);
$member1 = new Member("John Doe");
$member2 = new Member("Jane Doe");
$member1->borrowBook($book1);

$member2->borrowBook($book2);

// TODO: Print Available Copies with their names:
 echo "Book 1 - Name: {$book1->getTitle()}, Available Copies: {$book1->getAvailableCopies()}.\n";
 echo "Book 2 - Name: {$book2->getTitle()}, Available Copies: {$book2->getAvailableCopies()}.\n";
 // TODO: Print Borrowed Copies with their names:
 //Book 2 - Name: To Kill a Mockingbird, Borrowed Copies: 1.
    echo "Book 2 - Name: {$book2->getTitle()}, Borrowed Copies: {$book2->getBorrowedCopies()}.\n";
 // TODO: Print Borrowed Copies with their names:
 //Book 1 - Name: The Great Gatsby, Borrowed Copies: 1.
 echo "Book 1 - Name: {$book1->getTitle()}, Borrowed Copies: {$book1->getBorrowedCopies()}.\n";
 
?>
