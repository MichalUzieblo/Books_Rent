$(function() {
    
    var endpoint = "api/books.php";
//
    function loadAllBooks() {
        $.get(endpoint, function (json) {console.log(json);
            var books = $.parseJSON(json);
            console.log(books);
            for (var i = 0; i < books.length; i++) { 
                var singleBook = $.parseJSON(books[i]); console.log(singleBook.author);
                var book = $('<div><div>'
                        + singleBook.author
                        + '</div><div><b>'
                        + singleBook.name
                        + '</b></div>'
                        + '<div id="book_desc">'/*+ singleBook.book_desc +*/+'</div>'
                        + '<div id="remove_book"  data-book-id="' + singleBook.id + '">usuń</div><p>'
                        );
                $('#books').append($(book));
            }
        });
    }
    
    loadAllBooks();
});