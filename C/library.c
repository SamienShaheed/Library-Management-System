// Name: Samien Shaheed
// ID: 20291244

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#define SIZE 49 // Number of characters for each string

// Struct to store book information
struct book{
    char *title;
    char *author;
    char *subject;
};

// Struct to store library collection
struct library{
    struct book collection;
    int num_books;
    struct library *next;
};

typedef struct library Collection;
typedef Collection *CollectionPtr;

// Function prototypes
void addBook(CollectionPtr *startPtr, char *title, char *author, char *subject, int *bookNum, FILE *outputPtr);
void deleteTitle(CollectionPtr *startPtr, char *title, int *bookNum, FILE *outputPtr);
void deleteAuthor(CollectionPtr *startPtr, char *author, int *bookNum, FILE *outputPtr);
void searchTitle(CollectionPtr *startPtr, char *title, FILE *outputPtr);
void searchAuthor(CollectionPtr *startPtr,  char *author, FILE *outputPtr);
void listAuthor(CollectionPtr *startPtr, char *author, int *bookNum, FILE *outputPtr);
void listSubject(CollectionPtr *startPtr, char *subject, int *bookNum, FILE *outputPtr);
void listBooks(CollectionPtr *startPtr, FILE *outputPtr);
void copybook(struct book *dest, struct book *source);

int main()
{
    FILE *libraryPtr; // Pointer for library file
    FILE *outputPtr = fopen("output.txt", "w"); // Pointer for output file

    int instruction; // Variable to store instruction
    int book_num = 0; // Initially set number of books to 0
    int updates; // Variable to hold number of updates to library
    char *title; // Pointer to hold title string
    char *author; // Pointer to hold author string
    char *subject; // Pointer to hold subject string


    if((libraryPtr = fopen("library.txt", "r")) == NULL) { // Check if library.txt exists
        printf("Could not open library.txt file");
    } else {
        CollectionPtr startPtr = NULL; // Initialize startPtr to be Null

        fscanf(libraryPtr, "%d\n", &updates); // Scan the first unsigned integer in the file
        
        int i = 0;
        while(i < updates) // Loop as many times as mentioned by updates variable
        {
            if(!feof(libraryPtr)) { // Check if the file pointer does not reach end of file
                fscanf(libraryPtr, "%d ", &instruction); // Scan instruction from file

                switch(instruction)
                {
                    case 1: // Add book
                        // Allocate Memory to store strings read from file
                        title = calloc(SIZE, sizeof(char));
                        author = calloc(SIZE, sizeof(char));
                        subject = calloc(SIZE, sizeof(char));
                        fscanf(libraryPtr, "%s %s %s\n", title, author, subject); // Scan 3 strings from file
                        book_num++; // Increment number of books after each addition
                        addBook(&startPtr, title, author, subject, &book_num, outputPtr); // Add book to list
                        break;
                    case 2: // Delete book
                        // Allocate memory for title
                        title = calloc(SIZE, sizeof(char));
                        fscanf(libraryPtr, "%s\n", title); // Scan the title
                        deleteTitle(&startPtr, title, &book_num, outputPtr);
                        break;
                    case 3: // Delete all books by author
                        // Allocate memory for author
                        author = calloc(SIZE, sizeof(char));
                        fscanf(libraryPtr, "%s\n", author);
                        deleteAuthor(&startPtr, author, &book_num, outputPtr);
                        break;
                    case 4: // Search by title
                        // Allocate memory for title
                        title = calloc(SIZE, sizeof(char));
                        fscanf(libraryPtr, "%s\n", title);
                        searchTitle(&startPtr, title, outputPtr);
                        break;
                    case 5: // Search by Author
                        // Allocate memory for author
                        author = calloc(SIZE, sizeof(char));
                        fscanf(libraryPtr, "%s\n", author);
                        searchAuthor(&startPtr, author, outputPtr);
                        break;
                    case 6: // List all books by author
                        // Allocate memory for author
                        author = calloc(SIZE, sizeof(char));
                        fscanf(libraryPtr, "%s\n", author);
                        listAuthor(&startPtr, author, &book_num, outputPtr);
                        break;
                    case 7: // List all books by subject/genre
                        // Allocate memory for subject
                        subject = calloc(SIZE, sizeof(char));
                        fscanf(libraryPtr, "%s\n", subject);
                        listSubject(&startPtr, subject, &book_num, outputPtr);
                        break;
                    case 8: // list all books
                        listBooks(&startPtr, outputPtr);
                        break;
                    default:
                        break;
                }

                i++;
            } else { // If file pointer reaches end of file before while loop ends
                printf("\n%d updates done on file. No more updates found.\n", i);
                fprintf(outputPtr, "\n%d updates found on file. No more updates found.\n", i);
                break;
            }
        }
    }

    // Close file pointers
    fclose(libraryPtr);
    fclose(outputPtr);
    return 0;
}

// Function to add book
void addBook(CollectionPtr *startPtr, char *title, char *author, char *subject, int *bookNum, FILE *outputPtr)
{
    CollectionPtr newPtr; // Pointer for new node
    CollectionPtr previous; // Pointer to previous node
    CollectionPtr current = *startPtr; // Pointer to current node initialized to start
    int duplicateFlag = 0; // Flag for duplicates

    // Allocate Memory
    newPtr = malloc(sizeof(Collection));

    // Check if the input title already exists in the collection
    while(current != NULL) {
        if(!strcmp(title, current->collection.title)) { // If title already exists in collection
            printf("The book %s already exists in the collection.\n\n", current->collection.title);
            fprintf(outputPtr, "The book %s already exists in the collection.\n\n", current->collection.title);
            duplicateFlag = 1; // Set duplicate flag to 1
            // Free memory for later use
            free(newPtr);
            free(title);
            free(author);
            free(subject);
            break;
        }
        current = current->next;
    }

    if(duplicateFlag == 0) {
        if(*bookNum <= 30) { // Check if collection limit is exceeded
            if(newPtr != NULL) {
                // Set the values of new node
                newPtr->collection.title = title;
                newPtr->collection.author = author;
                newPtr->collection.subject = subject;
                newPtr->num_books = *bookNum;

                newPtr->next = NULL; // new node does not link with other nodes
                previous = NULL; // Set previous pointer to Null
                current = *startPtr; // Start from heading node

                // Find the last node
                while(current != NULL) {
                    previous = current;
                    current = current->next;
                }

                // Add new pointer to start of the list if no previous node
                if(previous == NULL) {
                    newPtr->next = *startPtr;
                    *startPtr = newPtr;
                } else { // Else add new node to end of the list
                    previous->next = newPtr;
                    newPtr->next = current;
                }
            }
                // Write addition of book to both terminal and output.txt
                fprintf(outputPtr, "The book %s author %s subject %s has been added to the library\n\n", newPtr->collection.title, newPtr->collection.author, newPtr->collection.subject);
                printf("The book %s author %s subject %s has been added to the library\n\n", newPtr->collection.title, newPtr->collection.author, newPtr->collection.subject);
        } else { // If more than 30 books are added to collection
            fprintf(outputPtr, "The book %s author %s subject %s could not be added. Max limit of collection reached.\n\n", title, author, subject);
            printf("The book %s author %s subject %s could not be added. Max limit of collection reached.\n\n", title, author, subject);
            // Free memory if book cannnot be added
            free(newPtr);
            free(title);
            free(author);
            free(subject);
        }
    }
}

// Function to delete book based on title
void deleteTitle(CollectionPtr *startPtr, char *title, int *bookNum, FILE *outputPtr)
{
    CollectionPtr previous; // Pointer for previous node
    CollectionPtr current; // Pointer to current node
    CollectionPtr secondLast; // Pointer to second last node
    CollectionPtr secondLastPrev; // Pointer to hold node before second last
    CollectionPtr temp; // Temp pointer to delete node

    current = *startPtr; // Start from first node
    previous = NULL; // Initially set previous to Null
    secondLast = *startPtr; // Start from first node
    secondLastPrev = NULL; // Initially set node to Null

    if(*bookNum > 1) { // Check if the list has more than 1 book
        // Search for second last node in list
        while(secondLast->next->next != NULL) {
            secondLastPrev = secondLast;
            secondLast = secondLast->next;
        }
    }

    // Find the node to be deleted
    while(current != NULL) {
        if(!strcmp(title, current->collection.title)) {
            break;
        }
        previous = current;
        current = current->next;
    }

    if(current != NULL) {
        if(previous->next == NULL) { // Check if current is last node
            if(previous == NULL) { // Check if current is the only node in list
                temp = current;
                printf("The book %s has been removed from the library.\n\n", current->collection.title);
                fprintf(outputPtr, "The book %s has been removed from the library.\n\n", current->collection.title);
                free(temp); // Empty list
                *startPtr = NULL;
                *bookNum = *bookNum - 1;
            } else {
                temp = current;
                previous->next = NULL; // Set previous node to be last node of the list
                printf("The book %s has been removed from the library.\n\n", current->collection.title);
                fprintf(outputPtr, "The book %s has been removed from the library.\n\n", current->collection.title);
                free(temp);
                *bookNum = *bookNum - 1;
            }
        } else if(current == secondLast) { // Check if second last node needs to be deleted
            if(previous == NULL) { // Check if current is first node
                temp = current;
                *startPtr = current->next; // Make the next node the head of the list
                printf("The book %s has been removed from the library.\n\n", current->collection.title);
                fprintf(outputPtr, "The book %s has been removed from the library.\n\n", current->collection.title);
                free(temp);
                *bookNum = *bookNum - 1;
            } else { // Else if current is not first node
                temp = current;
                secondLastPrev->next = secondLast->next;
                printf("The book %s has been removed from the library.\n\n", current->collection.title);
                fprintf(outputPtr, "The book %s has been removed from the library.\n\n", current->collection.title);
                free(temp);
                *bookNum = *bookNum - 1;
            }
        } else if(current->next == secondLast) { // Check if next node is second last node
            temp = current;
            previous->next = secondLast;
            printf("The book %s has been removed from the library.\n\n", current->collection.title);
            fprintf(outputPtr, "The book %s has been removed from the library.\n\n", current->collection.title);
            free(temp);
            *bookNum = *bookNum - 1;
        } else if(current != NULL) {
            if(current == *startPtr) { // Check if first node is to be deleted
                temp = current;
                *startPtr = secondLast;
                secondLastPrev->next = secondLast->next;
                secondLast->next = current->next;
                printf("The book %s has been removed from the library.\n\n", current->collection.title);
                fprintf(outputPtr, "The book %s has been removed from the library.\n\n", current->collection.title);
                free(temp);
                *bookNum = *bookNum - 1;
            } else { // Any other situation
                temp = current;
                previous->next = secondLast; // Previous node points to second last node
                secondLastPrev->next = secondLast->next;
                secondLast->next = current->next; // Second last node fills the deleted node
                printf("The book %s has been removed from the library.\n\n", current->collection.title);
                fprintf(outputPtr, "The book %s has been removed from the library.\n\n", current->collection.title);
                free(temp);
                *bookNum = *bookNum - 1;
            }
        }
    } else {
        printf("Deletion cannot be performed as the requested item does not exist.\n\n");
        fprintf(outputPtr,"Deletion cannot be performed as the requested item does not exist.\n\n");
    }
}

// Function to delete books from particular author
void deleteAuthor(CollectionPtr *startPtr, char *author, int *bookNum, FILE *outputPtr)
{
    CollectionPtr previous; // Pointer for previous node
    CollectionPtr current; // Pointer to current node
    CollectionPtr secondLast; // Pointer to second last node
    CollectionPtr secondLastPrev; // Pointer to hold node before second last
    CollectionPtr temp; // Temp pointer to delete node
    int duplicateFlag = 0; // Flag for duplicate
    // Temp arrays
    char compareAuthor[SIZE];
    char currentAuthor[SIZE];

    strcpy(compareAuthor, author); // Copy contents of input into temp array
    current = *startPtr; // Start from first node
    previous = NULL; // Initially set previous to Null
    secondLast = *startPtr; // Start from first node
    secondLastPrev = NULL; // Initially set node to Null

    while(current != NULL) { // Repeat for every book in the list
        if(*bookNum > 1) { // Check if the list has more than 1 book
            // Search for second last node in list
            while(secondLast->next->next != NULL) {
                secondLastPrev = secondLast;
                secondLast = secondLast->next;
            }
        }
        // Copy contents of input into temp array
        strcpy(currentAuthor, current->collection.author);

        if(!strcmp(strupr(compareAuthor), strupr(currentAuthor))) { // Search for author without capitalization preserved
            duplicateFlag = 1;

            if(current->next == NULL) { // Check if current is last node
                if(previous == NULL) { // Check if current is the only node in list
                    printf("The book %s authored by %s has been removed from the library.\n\n", current->collection.title, current->collection.author);
                    fprintf(outputPtr, "The book %s authored by %s has been removed from the library.\n\n", current->collection.title, current->collection.author);
                    free(current);
                    *startPtr = NULL; // Empty list
                    current = *startPtr;
                    *bookNum = *bookNum - 1;
                } else {
                    temp = current;
                    previous->next = NULL; // Set previous node to be last node of the list
                    printf("The book %s authored by %s has been removed from the library.\n\n", current->collection.title, current->collection.author);
                    fprintf(outputPtr, "The book %s authored by %s has been removed from the library.\n\n", current->collection.title, current->collection.author);
                    free(temp);
                    current = *startPtr;
                    *bookNum = *bookNum - 1;
                }
            } else if(current == secondLast) { // Check if second last node needs to be deleted
                if(previous == NULL) { // Check if current is first node
                    temp = current;
                    *startPtr = current->next; // Make the next node the head of the list
                    printf("The book %s authored by %s has been removed from the library.\n\n", current->collection.title, current->collection.author);
                    fprintf(outputPtr, "The book %s authored by %s has been removed from the library.\n\n", current->collection.title, current->collection.author);
                    free(temp);
                    current = *startPtr;
                    *bookNum = *bookNum - 1;
                } else { // Else if current is not first node
                    temp = current;
                    secondLastPrev->next = secondLast->next;
                    printf("The book %s authored by %s has been removed from the library.\n\n", current->collection.title, current->collection.author);
                    fprintf(outputPtr, "The book %s authored by %s has been removed from the library.\n\n", current->collection.title, current->collection.author);
                    free(temp);
                    current = *startPtr;
                    *bookNum = *bookNum - 1;
                }
            } else if(current->next == secondLast) { // Check if next node is second last node
                temp = current;
                previous->next = secondLast;
                printf("The book %s authored by %s has been removed from the library.\n\n", current->collection.title, current->collection.author);
                fprintf(outputPtr, "The book %s authored by %s has been removed from the library.\n\n", current->collection.title, current->collection.author);
                free(temp);
                current = *startPtr;
                *bookNum = *bookNum - 1;
            } else if(current != NULL) {
                if(current == *startPtr) { // Check if first node is to be deleted
                    temp = current;
                    *startPtr = secondLast;
                    secondLastPrev->next = secondLast->next;
                    secondLast->next = current->next;
                    printf("The book %s has been removed from the library.\n\n", current->collection.title);
                    fprintf(outputPtr, "The book %s has been removed from the library.\n\n", current->collection.title);
                    free(temp);
                    *bookNum = *bookNum - 1;
                } else { // Any other situation
                    temp = current;
                    previous->next = secondLast; // Previous node points to second last node
                    secondLastPrev->next = secondLast->next;
                    secondLast->next = current->next; // Second last node fills the deleted node
                    printf("The book %s authored by %s has been removed from the library.\n\n", current->collection.title, current->collection.author);
                    fprintf(outputPtr, "The book %s authored by %s has been removed from the library.\n\n", current->collection.title, current->collection.author);
                    free(temp);
                    current = *startPtr;
                    *bookNum = *bookNum - 1;
                }
            }
        }

        previous = current;
        current = current->next; // Traverse the linked list
    }

    // If the book does not exist in the list
    if(duplicateFlag == 0) {
        printf("Deletion cannot be performed as the requested item does not exist.\n\n");
        fprintf(outputPtr,"Deletion cannot be performed as the requested item does not exist.\n\n");
    }
}

// Function to search for particular title
void searchTitle(CollectionPtr *startPtr, char *title, FILE *outputPtr)
{
    CollectionPtr current; // Pointer to hold current node
    int foundFlag = 0; // Flag to check if title was found

    current = *startPtr; // Start from first node

    // Search for the title input
    while(current != NULL) {
        if(!strcmp(title, current->collection.title)) {
            printf("The book %s is currently in the library.\n\n", current->collection.title);
            fprintf(outputPtr, "The book %s is currently in the library.\n\n", current->collection.title);
            foundFlag = 1;
            break;
        }
        current = current->next;
    }

    // If book not found
    if(foundFlag == 0) {
        printf("The book %s is NOT currently in the library.\n\n", title);
        fprintf(outputPtr, "The book %s is NOT currently in the library.\n\n", title);
    }

    free(title); // Free memory after check is complete
}

// Function to search for all books by particular author
void searchAuthor(CollectionPtr *startPtr,  char *author, FILE *outputPtr)
{
    CollectionPtr current; // Pointer to hold current node
    // Temp arrays
    char compareAuthor[SIZE];
    char currentAuthor[SIZE];
    int foundFlag = 0; // Flag to check if title was found

    current = *startPtr; // Start from first node
    strcpy(compareAuthor, author); // Copy contents of input into temp array

    // Check entire list for all books by author
    while(current != NULL) {
        strcpy(currentAuthor, current->collection.author); // Copy current book's author into string
        if(!strcmp(strupr(compareAuthor), strupr(currentAuthor))) { // Compare without capitalization preserved
            printf("The book %s authored by %s is currently in the library.\n\n", current->collection.title, current->collection.author);
            fprintf(outputPtr, "The book %s authored by %s is currently in the library.\n\n", current->collection.title, current->collection.author);
            foundFlag = 1;
        }

        current = current->next;
    }

    // If no book was found
    if(foundFlag == 0) {
        printf("No book from author %s\n", author);
        fprintf(outputPtr, "No book from author %s\n", author);
    }

    free(author); // Free memory after check is complete
}

// Function to list all books by particular author alphabetically
void listAuthor(CollectionPtr *startPtr, char *author, int *bookNum, FILE *outputPtr)
{
    // Reference link: https://www.geeksforgeeks.org/sorting-a-dynamic-2-dimensional-array-of-strings/

    CollectionPtr current = *startPtr; // Begin search from first node
    int duplicateFlag = 0; // Set a flag for when books found
    char compareAuthor[SIZE];
    char currentAuthor[SIZE];
    strcpy(compareAuthor, author);
    // Create a 2D array to store string after search
    char **bookList = calloc(*bookNum, sizeof(char*)); // Allocate memory for 1st dimension
    int i = 0;

    printf("List of all books by %s\n", author);
    fprintf(outputPtr, "List of all books by %s\n", author);

    // Search through all books to find every book by author
    while(current != NULL) {
        strcpy(currentAuthor, current->collection.author);
        if(!strcmp(strupr(compareAuthor), strupr(currentAuthor))) { // Check without capitalization preserved
            duplicateFlag = 1;
            bookList[i] = (char*)calloc(SIZE, sizeof(char)); // Allocate memory for 2nd dimension of 2D array
            strcpy(bookList[i], current->collection.title); // Copy string into memory
            i++;
        }
        current = current->next;
    }

    if(duplicateFlag == 1) { // If books are found in the list
        // Bubble sort the strings in ascending order
        for(int n=0; n<i ; n++) {
            for(int j=0 ; j < i-n-1 ; j++) {
                if(strcmp(bookList[j], bookList[j + 1]) > 0) {
                    char *temp; // Pointer to hold string temporarily
                    temp = calloc(SIZE, sizeof(char)); // Allocate memory to store string temporarily
                    strcpy(temp, bookList[j]);
                    strcpy(bookList[j], bookList[j+1]);
                    strcpy(bookList[j+1], temp);
                }
            }
        }

        // Print the sorted list
        for(int j=0 ; j<i ; j++) {
            printf("%s\n", bookList[j]);
            fprintf(outputPtr, "%s\n", bookList[j]);
        }
    } else { // If no books are found
        printf("No book from author %s.\n\n", author);
        fprintf(outputPtr, "No book from author %s.\n\n", author);
    }

    printf("\n");
    fprintf(outputPtr, "\n");

    // Free memory after search for later use
    free(author);
    free(bookList);
}

// Function to list all books by subject alphabetically
void listSubject(CollectionPtr *startPtr, char *subject, int *bookNum, FILE *outputPtr)
{
    // Reference link: https://www.geeksforgeeks.org/sorting-a-dynamic-2-dimensional-array-of-strings/

    CollectionPtr current = *startPtr; // Begin search from first node
    int duplicateFlag = 0; // Set a flag for when books found
    char compareSubject[SIZE];
    char currentSubject[SIZE];
    strcpy(compareSubject, subject);
    // Create a 2D array to store string after search
    char **subjectList = calloc(*bookNum, sizeof(char*)); // Allocate memory for 1st dimension
    int i = 0;

    printf("List of all books on %s\n", subject);
    fprintf(outputPtr, "List of all books on %s\n", subject);

    // Search through all books to find every book by subject
    while(current != NULL) {
        strcpy(currentSubject, current->collection.subject);
        if(!strcmp(strupr(compareSubject), strupr(currentSubject))) { // Check without capitalization preserved
            duplicateFlag = 1;
            subjectList[i] = (char*)calloc(SIZE, sizeof(char)); // Allocate memory for 2nd dimension of 2D array
            strcpy(subjectList[i], current->collection.title); // Copy string into memory
            i++;
        }
        current = current->next;
    }

    if(duplicateFlag == 1) { // If books found in the list
        // Bubble sort the strings descending order
        // This is a common code to sort strings alphabetically
        for(int n=0; n<i ; n++) {
            for(int j=0 ; j < i-n-1 ; j++) {
                if(strcmp(subjectList[j], subjectList[j + 1]) < 0) {
                    char *temp; // Pointer to hold string temporarily
                    temp = calloc(SIZE, sizeof(char)); // Allocate memory to store string temporarily
                    // Swap strings if needed
                    strcpy(temp, subjectList[j]);
                    strcpy(subjectList[j], subjectList[j+1]);
                    strcpy(subjectList[j+1], temp);
                }
            }
        }

        // Print out the book list in order
        for(int j=0 ; j<i ; j++) {
            printf("%s\n", subjectList[j]);
            fprintf(outputPtr, "%s\n", subjectList[j]);
        }
    } else { // If no books found
        printf("No related book for %s is found.\n\n", subject);
        fprintf(outputPtr, "No related book for %s is found.\n\n", subject);
    }

    printf("\n");
    fprintf(outputPtr, "\n");

    // Free memory for later use
    free(subject);
    free(subjectList);
}

// Function to list all the books in the original order
void listBooks(CollectionPtr *startPtr, FILE *outputPtr)
{
    CollectionPtr current;
    current = *startPtr;

    if(current == NULL) { // If there are no books in the list
        printf("List is empty.\n");
        fprintf(outputPtr, "List is empty.\n");
    } else {
        while(current != NULL) { // Repeat for all books in the list
            printf("%s %s %s\n", current->collection.title, current->collection.author, current->collection.subject);
            fprintf(outputPtr, "%s %s %s\n", current->collection.title, current->collection.author, current->collection.subject);
            current = current->next;
        }
    }

    printf("\n");
    fprintf(outputPtr, "\n");
}

// Function to copy contents of one struct to another
void copybook(struct book *dest, struct book *source)
{
    // Allocate memory for pointers in dest struct
    dest->title = calloc(SIZE, sizeof(char));
    dest->author = calloc(SIZE, sizeof(char));
    dest->subject = calloc(SIZE, sizeof(char));

    // Copy strings from source into dest
    strcpy(dest->title, source->title);
    strcpy(dest->author, source->author);
    strcpy(dest->subject, source->subject);
}