$(function() {
    
    var endpoint = "api/books.php";

    function loadAllBooks() {
        $.get(endpoint, function (json) {
            var books = $.parseJSON(json);
            for (var i = 0; i < books.length; i++) { 
                var singleBook = $.parseJSON(books[i]);
                var book = $('<div><div class=book_name data-book-id="' + singleBook.id + '"><b>'
                        + singleBook.name
                        + '</b></div>'
                        + '<div class=book_author></div>'
                        + '<div class="book_desc"></div>'
                        + '<div class="remove_book"  data-book-id="' + singleBook.id + '"></div><p>'
                        );
                $('#books').append($(book));
            }
        });
    }
    
    loadAllBooks();
    
    $(function () {
        setTimeout(loadSingleBook, 1);
    });

    function loadSingleBook() {
        
        $('.book_name').on('click', function() {
            console.log('dziala');
            
            var div = $(this);
            var bookId = $(this).data("book-id");

            var newEndpoint = endpoint + "?id=" + bookId;
 
            $.get(newEndpoint, function (json) { console.log(json);
                
                var book = $.parseJSON(json);
                
                div.next().html(book.author);
                div.next().next().html(book.book_desc);
                div.next().next().next().html('delete');;
            });
        });
    }
    
});