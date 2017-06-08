$(function() {
    
    //relative path
    var endpoint = "api/books.php";
    //empty div for cleanind book's list
    var resetList = $('#reset').clone();
    //for to book's update
    var newForm = '<form action="api/books.php" method="post" role="form" id="newForm">'
                    +'<div class="form-group">'
                        +'<input type="text" class="form-control" name="newAuthor" id="newAuthor" placeholder="new Author">'
                    +'</div>'
                    +'<div class="form-group">'
                        +'<input type="text" class="form-control" name="newTitle" id="newTitle" placeholder="new Title">'
                    +'</div>'
                    +'<div class="form-group">'
                         +'<input type="text" class="form-control" name="newDescription" id="newDescription" placeholder="new Description">'
                    +'</div>'
                    +'<center><button type="submit" name="submit" value="addBook" class="btn btn-success" id="newBtn">Update book</button></center>'
                +'</form>';
    
    //function to load all Books - only name and empty divs for other positions
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
                        + '<div class="book_new" data-book-id="' + singleBook.id + '"></div>'
                        + '<div class="delete_book"  data-book-id="' + singleBook.id + '"></div><p>'
                        );
                $('#books').append($(book));
            }
        });
    }
    
    //use function
    loadAllBooks();
    
    //Event on title of book, after click we have all descriptions of book 
    $(document).on('click', '.book_name', function () {

        var div = $(this);
        var bookId = $(this).data("book-id");

        var newEndpoint = endpoint + "?id=" + bookId;

        $.get(newEndpoint, function (json) {

            var book = $.parseJSON(json);

            div.next().html(book.author);
            div.next().next().html(book.book_desc);
            div.next().next().next().html(newForm);
            div.next().next().next().next().html('<center><u>Delete book</u></center>');
        });
    });
    
    //Event on button which add a new book and display a new list of books
    $(document).on('click', '#btn', function (event) {
        event.preventDefault();
        var formData = {
            'author': $('input[name=author]').val(),
            'title': $('input[name=title]').val(),
            'description': $('input[name=description]').val()
        };
        
        $.post(endpoint, formData, function(json) {
            var data = $.parseJSON(json);
            if (data.isOk === true) {
                $('#books').html(resetList);
                loadAllBooks();
            }
        });
        
    });
    
    //Event on div.delete_book which delete this book from DB and display a new list
    $(document).on('click', '.delete_book', function () { console.log('dziala');
        
        var bookId = $(this).data("book-id");

        $.ajax({
            type: 'DELETE',
            url: endpoint,
            data: {id: bookId},
            dataType: ''
        }).done(function () {
            $('#books').html(resetList);
            loadAllBooks();
        });
    });
    
    //Event on button in updating form which set new values of book attributes
    $(document).on('click', '#newBtn', function (event) { 
        var bookId = $(this).parent().parent().data('book-id'); 
        event.preventDefault();

        var formData = {
            'id': bookId,
            'author': $('input[name=newAuthor]').val(),
            'title': $('input[name=newTitle]').val(),
            'description': $('input[name=newDescription]').val()            
        };

        $.ajax({
            type: 'PUT',
            url: endpoint,
            data: formData,
            dataType: 'json'
        }).done(function (json) {
            $('#books').html(resetList);
            loadAllBooks();
        });
    });
});
