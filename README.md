# Library-Management-System

## Library Management System in C

The library.c file reads the library.txt file. The txt file contains the number of instructions as the first line of input. The subsequent lines contain instructions in the format: 

{num}{book_title}{author_name}{book_genre}

The {num} determines what instruction the system must execute:

1 - Add book to library
2 - Delete book title from library
3 - Delete book by author name from library
4 - Search book by title 
5 - Search book by author
6 - List all books by author
7 - List all books by genre
8 - List all books in the library

The system was written using a Linked List. Whenever a book/node is deleted from the list, the second last node in the last replaces the position of the deleted node (this was done as a fun experiment to learn pointers and linked lists better).

## Library Management System Website

The website is a simple online library management system written using HTML, CSS, PHP, SQL and JS. The website allows users to search for books based on Title, Author, and ISBN number. Also allows to filter books by category/genre or borrow status.

It contains functions to borrow and return books to the library, with login system for admins and users. Admins are allowed to delete and add books to the library, while users are allowed to borrow and return.

The website contains proper login and sign-up features with verification and validation. (Future improvements would include better hashing of passwords to backend)